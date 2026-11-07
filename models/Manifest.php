<?php
namespace Models;

use Core\Model;
use RuntimeException;
use Throwable;

/**
 * Model Manifest Muatan Armada Truk Kargo Antar-Kota
 */
class Manifest extends Model
{
    protected string $table = 'manifest';

    /**
     * Ambil data manifest beserta relasi wilayah kota asal dan tujuan
     */
    public function getAllWithDetails(): array
    {
        $sql = "SELECT 
                    m.*,
                    w_asal.nama_kota as asal_nama,
                    w_asal.kode_kota as asal_kode,
                    w_tujuan.nama_kota as tujuan_nama,
                    w_tujuan.kode_kota as tujuan_kode,
                    COUNT(r.id) as total_resi,
                    COALESCE(SUM(r.jumlah_koli), 0) as total_koli,
                    COALESCE(SUM(r.berat_dikenakan), 0) as total_berat_kg
                FROM `{$this->table}` m
                JOIN `wilayah` w_asal ON m.kota_asal_id = w_asal.id
                JOIN `wilayah` w_tujuan ON m.kota_tujuan_id = w_tujuan.id
                LEFT JOIN `resi` r ON r.manifest_id = m.id
                GROUP BY m.id
                ORDER BY m.id DESC";

        return $this->query($sql);
    }

    /**
     * Ambil daftar resi yang tergabung dalam manifest tertentu
     */
    public function getResiInManifest(int $manifestId): array
    {
        $sql = "SELECT r.*, rt.kode_rute 
                FROM `resi` r
                JOIN `rute` rt ON r.rute_id = rt.id
                WHERE r.manifest_id = :mid
                ORDER BY r.id ASC";

        return $this->query($sql, [':mid' => $manifestId]);
    }

    /**
     * Generate Nomor Manifest Baru (MF-XXXX)
     */
    public function generateNoManifest(): string
    {
        $sql = "SELECT no_manifest FROM `{$this->table}` ORDER BY id DESC LIMIT 1";
        $last = $this->db->query($sql)->fetchColumn();
        if ($last && preg_match('/MF-(\d+)/', $last, $m)) {
            $next = (int)$m[1] + 1;
        } else {
            $next = 232;
        }
        return 'MF-' . str_pad((string)$next, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Create a manifest and atomically assign only available warehouse shipments.
     */
    public function createWithResi(array $data, array $resiIds): int
    {
        $normalizedIds = [];
        foreach ($resiIds as $resiId) {
            if (!is_scalar($resiId) || !ctype_digit((string)$resiId) || (int)$resiId <= 0) {
                throw new RuntimeException('Salah satu ID resi muatan tidak valid.');
            }
            $normalizedIds[] = (int)$resiId;
        }
        $resiIds = array_values(array_unique($normalizedIds));
        $this->db->beginTransaction();

        try {
            $manifestId = $this->create($data);
            $select = $this->db->prepare(
                "SELECT `id` FROM `resi`
                 WHERE `id` = :id
                   AND `manifest_id` IS NULL
                   AND `status_pengiriman` = 'Paket diterima gudang'
                 FOR UPDATE"
            );
            $assign = $this->db->prepare(
                "UPDATE `resi` SET `manifest_id` = :manifest_id
                 WHERE `id` = :id
                   AND `manifest_id` IS NULL
                   AND `status_pengiriman` = 'Paket diterima gudang'"
            );

            foreach ($resiIds as $resiId) {
                $select->execute([':id' => $resiId]);
                if (!$select->fetchColumn()) {
                    throw new RuntimeException('Salah satu resi sudah masuk manifest lain atau belum siap dimuat. Muat ulang halaman.');
                }

                $assign->execute([':manifest_id' => $manifestId, ':id' => $resiId]);
                if ($assign->rowCount() !== 1) {
                    throw new RuntimeException('Resi gagal dimasukkan ke manifest. Muat ulang halaman.');
                }
            }

            $this->db->commit();
            return $manifestId;
        } catch (Throwable $e) {
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }
            throw $e;
        }
    }

    /**
     * Berangkatkan Truk Manifest
     * Otomatis mengupdate status semua paket di manifest menjadi "Dalam perjalanan"
     * dan menambahkan tracking checkpoint "Dimuat ke truk [no_polisi] · Manifest [no_manifest]"
     */
    public function berangkatkan(int $manifestId, string $petugas = 'Petugas Dispatch'): bool
    {
        $this->db->beginTransaction();

        try {
            $stmt = $this->db->prepare("SELECT * FROM `{$this->table}` WHERE `id` = :id FOR UPDATE");
            $stmt->execute([':id' => $manifestId]);
            $manifest = $stmt->fetch();
            if (!$manifest || !in_array($manifest['status'], ['Draft', 'Siap Berangkat'], true)) {
                $this->db->rollBack();
                return false;
            }

            $this->update($manifestId, ['status' => 'Dalam Perjalanan']);
            $resiList = $this->getResiInManifest($manifestId);
            $trackingModel = new Tracking();
            $resiModel = new Resi();
            $waktu = date('Y-m-d H:i:s');
            $statusText = "Dimuat ke truk {$manifest['no_polisi']}";
            $keterangan = "Manifest {$manifest['no_manifest']} keberangkatan armada";

            $originStmt = $this->db->prepare('SELECT `nama_kota` FROM `wilayah` WHERE `id` = :id');
            $originStmt->execute([':id' => $manifest['kota_asal_id']]);
            $lokasi = 'Gudang ' . ($originStmt->fetchColumn() ?: 'Cabang');

            foreach ($resiList as $item) {
                $resiModel->updateStatus((int)$item['id'], 'Dalam perjalanan');
                $trackingModel->create([
                    'resi_id' => $item['id'],
                    'status' => $statusText,
                    'lokasi' => $lokasi,
                    'waktu' => $waktu,
                    'petugas' => $manifest['nama_sopir'] . ' (Sopir) / ' . $petugas,
                    'keterangan' => $keterangan
                ]);
            }

            $this->db->commit();
            return true;
        } catch (Throwable $e) {
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }
            throw $e;
        }
    }
}
