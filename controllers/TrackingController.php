<?php
namespace Controllers;

use Core\Controller;
use Models\Resi;
use Models\Tracking;
use Models\Manifest;

/**
 * Controller CRUD Checkpoint Tracking Perjalanan & Status Serah Terima (POD)
 */
class TrackingController extends Controller
{
    private Resi $resiModel;
    private Tracking $trackingModel;
    private Manifest $manifestModel;

    public function __construct()
    {
        $this->resiModel = new Resi();
        $this->trackingModel = new Tracking();
        $this->manifestModel = new Manifest();
    }

    /**
     * Halaman Dashboard Tracking & Serah Terima
     */
    public function index(?string $noResi = null): void
    {
        $user = $this->requireAuth();

        if (empty($noResi)) {
            $noResi = $_GET['resi'] ?? 'KT-CRB-261030-0047';
        }

        $resi = $this->resiModel->getDetail($noResi);
        if (!$resi) {
            // Ambil resi pertama jika nomor tidak ditemukan
            $resi = $this->resiModel->all('*', 'id DESC')[0] ?? null;
            if ($resi) {
                $resi = $this->resiModel->getDetail($resi['id']);
            }
        }

        $checkpoints = [];
        if ($resi) {
            $checkpoints = $this->trackingModel->getCheckpointsByResi($resi['id']);
        }

        $allResi = $this->resiModel->getAllWithRute(null, 30);

        $this->view('tracking/index', [
            'user' => $user,
            'resi' => $resi,
            'checkpoints' => $checkpoints,
            'allResi' => $allResi,
            'pageTitle' => 'Tracking & Serah Terima - KargoTrack'
        ]);
    }

    /**
     * Tambah Checkpoint Perjalanan Baru
     */
    public function storeCheckpoint(): void
    {
        $user = $this->requireAuth();
        $this->requireCsrf('tracking');
        $resiId = (int)($_POST['resi_id'] ?? 0);

        $resi = $this->resiModel->find($resiId);
        if (!$resi) {
            $this->json(['success' => false, 'message' => 'Resi tidak ditemukan.'], 404);
        }

        $status = trim($_POST['status'] ?? '');
        $lokasi = trim($_POST['lokasi'] ?? '');
        $waktu = trim($_POST['waktu'] ?? date('Y-m-d H:i:s'));
        $namaPenerima = trim($_POST['nama_penerima'] ?? '');
        $keterangan = trim($_POST['keterangan'] ?? '');

        if (empty($status) || empty($lokasi)) {
            $this->json(['success' => false, 'message' => 'Status dan lokasi checkpoint wajib diisi.'], 422);
        }

        $isDelivered = $status === 'Diterima penerima';
        if ($isDelivered && $namaPenerima === '') {
            $this->json(['success' => false, 'message' => 'Nama penerima wajib diisi untuk status serah terima.'], 422);
        }

        // Handle Upload Foto Bukti Serah Terima (POD)
        $fotoBuktiName = null;
        $file = $_FILES['foto_bukti'] ?? null;
        if ($isDelivered && $file && $file['error'] !== UPLOAD_ERR_NO_FILE && $file['error'] !== UPLOAD_ERR_OK) {
            $this->json(['success' => false, 'message' => 'Foto bukti gagal diunggah. Silakan coba kembali.'], 422);
        }
        if ($isDelivered && $file && $file['error'] === UPLOAD_ERR_OK) {
            $allowedExts = ['jpg', 'jpeg', 'png', 'webp'];
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $mimeType = (new \finfo(FILEINFO_MIME_TYPE))->file($file['tmp_name']);
            $mimeByExtension = [
                'jpg' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'png' => 'image/png',
                'webp' => 'image/webp'
            ];

            if (!in_array($ext, $allowedExts, true) || ($mimeByExtension[$ext] ?? null) !== $mimeType) {
                $this->json(['success' => false, 'message' => 'Format foto harus JPG, PNG, atau WEBP.'], 422);
            }

            if ($file['size'] > 5 * 1024 * 1024) { // Maks 5 MB
                $this->json(['success' => false, 'message' => 'Ukuran file foto maksimal 5 MB.'], 422);
            }

            $uploadDir = (defined('ROOT_DIR') ? ROOT_DIR : dirname(__DIR__)) . '/public/uploads/pod/';
            if (!is_dir($uploadDir)) {
                if (!mkdir($uploadDir, 0755, true) && !is_dir($uploadDir)) {
                    $this->json(['success' => false, 'message' => 'Direktori unggahan bukti tidak dapat dibuat.'], 500);
                }
            }

            $fotoBuktiName = 'pod_' . $resi['id'] . '_' . bin2hex(random_bytes(8)) . '.' . $ext;
            if (!move_uploaded_file($file['tmp_name'], $uploadDir . $fotoBuktiName)) {
                $this->json(['success' => false, 'message' => 'Foto bukti gagal disimpan. Silakan coba kembali.'], 500);
            }
        }

        // Handle Tanda Tangan Digital (Base64 dari Canvas)
        $ttdDigital = $isDelivered ? ($_POST['ttd_digital'] ?? null) : null;
        if ($ttdDigital !== null && $ttdDigital !== '') {
            if (strlen($ttdDigital) > 2 * 1024 * 1024
                || !preg_match('/^data:image\/png;base64,[A-Za-z0-9+\/]+={0,2}$/', $ttdDigital)) {
                $this->json(['success' => false, 'message' => 'Format tanda tangan digital tidak valid.'], 422);
            }
        } else {
            $ttdDigital = null;
        }

        if ($isDelivered && $fotoBuktiName === null && $ttdDigital === null) {
            $this->json(['success' => false, 'message' => 'Foto bukti atau tanda tangan wajib diisi untuk serah terima.'], 422);
        }

        $checkpointData = [
            'status' => $status,
            'lokasi' => $lokasi,
            'waktu' => $waktu,
            'nama_penerima' => $isDelivered ? $namaPenerima : null,
            'petugas' => ($user['nama'] ?? 'Rizqi') . ' - Petugas',
            'keterangan' => $keterangan,
            'foto_bukti' => $fotoBuktiName,
            'ttd_digital' => $ttdDigital
        ];

        $cpId = $this->trackingModel->addCheckpoint($resiId, $checkpointData);

        if ($this->isAjax()) {
            $this->json([
                'success' => true,
                'message' => "Checkpoint '{$status}' berhasil ditambahkan.",
                'checkpoint_id' => $cpId,
                'no_resi' => $resi['no_resi']
            ]);
        }

        $this->setFlash('success', "Checkpoint baru berhasil dicatat.");
        $this->redirect('tracking?resi=' . urlencode($resi['no_resi']));
    }

    /**
     * Pelacakan Publik Tanpa Login (Cek Resi Tanpa Login)
     */
    public function publicTrack(?string $noResi = null): void
    {
        if (empty($noResi)) {
            $noResi = trim($_GET['resi'] ?? '');
        }

        $resi = null;
        $checkpoints = [];

        if (!empty($noResi)) {
            $resi = $this->resiModel->getDetail($noResi);
            if ($resi) {
                $checkpoints = $this->trackingModel->getCheckpointsByResi($resi['id']);
            }
        }

        $this->view('tracking/public', [
            'noResi' => $noResi,
            'resi' => $resi,
            'checkpoints' => $checkpoints,
            'pageTitle' => 'Lacak Resi Kargo Publik - KargoTrack'
        ], null); // Tanpa layout dashboard admin
    }

    /**
     * JSON Live API Tracking Data
     */
    public function apiTrack(string $noResi): void
    {
        $cleanResi = trim($noResi);
        $resi = $this->resiModel->getDetail($cleanResi);

        if (!$resi) {
            $this->json(['success' => false, 'message' => "Nomor resi {$cleanResi} tidak ditemukan di sistem."], 404);
        }

        $checkpoints = $this->trackingModel->getCheckpointsByResi($resi['id']);

        $this->json([
            'success' => true,
            'resi' => $resi,
            'checkpoints' => $checkpoints
        ]);
    }
}
