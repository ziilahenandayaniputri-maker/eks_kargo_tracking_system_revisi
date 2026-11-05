LAPORAN AKHIR PROJEK PRAKTIKUM
PEMROGRAMAN WEB DASAR
SISTEM INFORMASI PELACAKAN KARGO (TRACKING SYSTEM), MANIFEST MUATAN & VERIFIKASI RESI LOGISTIK

Disusun Oleh:
Kelompok : 6
| No | NIM | Nama Anggota Lengkap | Peran Modul CRUD Utama |
| :-: | :-: | :--- | :--- |
| 1 | 43250559 | Muhamad Dafa Fadilah | CRUD Master Wilayah Operasional, Rute & Kalkulator Tarif |
| 2 | 43250577 | Rizqi Nur Sya'ban | CRUD Penerbitan Resi Pengiriman & Data Paket Kiriman |
| 3 | 43250581 | Ziila Henandayani Putri | CRUD Checkpoint Tracking Perjalanan & Status Serah Terima |

PROGRAM STUDI S1 SISTEM INFORMASI
STMIK IKMI CIREBON
TAHUN AKADEMIK 2026/2027

---

## LEMBAR PENGESAHAN LAPORAN PROJEK
Laporan Praktikum Pemrograman Web Dasar berjudul ‘Sistem Informasi Pelacakan Kargo (Tracking System), Manifest Muatan & Verifikasi Resi Logistik’ ini telah diperiksa, diuji dalam demonstrasi langsung, dan disahkan sebagai pemenuhan nilai tugas besar kelompok Semester Ganjil Tahun Akademik 2026/2027.

Cirebon, 02 November 2026  
Mengetahui dan Mengesahkan,  
Dosen Pengampu Mata Kuliah,  

(________________________)  
Rosidin, S. Kom., M. Kom.  
NIDN : 0415028303  

---

## SURAT PERNYATAAN ORISINALITAS DAN INTEGRITAS KARYA
Kami yang bertanda tangan di bawah ini menyatakan dengan sebenarnya bahwa aplikasi web dan laporan projek yang kami serahkan adalah benar-benar hasil karya mandiri kelompok kami. Pemanfaatan teknologi kecerdasan buatan (AI) dilakukan semata-mata sebagai alat bantu perancangan dan asistensi pembelajaran; kami sepenuhnya memahami, menguasai, dan bertanggung jawab atas setiap baris kode pemrograman PHP, logika basis data PDO, dan skrip antarmuka HTML/CSS/JS yang tertulis di dalam sistem ini.

Cirebon, ........................ 2026  
Yang menyatakan,  

| Anggota 1, | Anggota 2, | Anggota 3, |
| :-: | :-: | :-: |
| (Muhamad Dafa Fadilah)<br>NIM 43250559 | (Rizqi Nur Sya'ban)<br>NIM 43250577 | (Ziila Henandayani Putri)<br>NIM 43250581 |

---

## PERAN & TANGGUNG JAWAB ANGGOTA KELOMPOK
Tabel berikut merincikan kontribusi nyata setiap mahasiswa dalam pengerjaan modul CRUD, desain visual antarmuka web, perancangan basis data, dan dokumentasi laporan:

**Tabel 1. Rincian Pernyataan dan Tanggung Jawab Anggota Kelompok 6**
| No | NIM | Nama Mahasiswa | Modul CRUD yang Dikerjakan | Tanggung Jawab UI/UX | Kontribusi (%) | Paraf |
| :-: | :-: | :--- | :--- | :--- | :-: | :-: |
| 1 | 43250559 | Muhamad Dafa Fadilah | CRUD Master Wilayah Operasional, Rute & Kalkulator Tarif | Halaman Wilayah/Rute (tab, tabel, modal), live search JS, Kalkulator Tarif (Dark Teal Card) | 33,3% | |
| 2 | 43250577 | Rizqi Nur Sya'ban | CRUD Penerbitan Resi Pengiriman & Data Paket Kiriman | Form resi, validasi telepon & kode pos JS, live receipt preview, cetak Thermal/A4 + barcode | 33,3% | |
| 3 | 43250581 | Ziila Henandayani Putri | CRUD Checkpoint Tracking Perjalanan & Status Serah Terima | Timeline visual CSS, dropzone upload POD, signature pad canvas, portal lacak publik | 33,3% | |

Selain modul utama di atas, seluruh anggota bersama-sama mengerjakan kerangka inti MVC (folder core/), skema basis data, modul login/sesi, modul manifest muatan truk, serta penyusunan laporan ini.

---

## DAFTAR ISI
LEMBAR PENGESAHAN LAPORAN PROJEK	i  
SURAT PERNYATAAN ORISINALITAS DAN INTEGRITAS KARYA	ii  
PERAN & TANGGUNG JAWAB ANGGOTA KELOMPOK	iii  
BAB I PENDAHULUAN	1  
1.1 Latar Belakang Masalah	1  
1.2 Rumusan Masalah	2  
1.3 Tujuan & Manfaat Projek	2  
1.3.1 Tujuan	2  
1.3.2 Manfaat	2  
1.4 Ruang Lingkup & Batasan Masalah	3  
BAB II ANALISIS KEBUTUHAN & PRD (METODE COSTAR)	4  
2.1 Profil Pengguna (User Persona)	4  
2.2 Product Requirement Document (PRD) Berbasis Kerangka COSTAR	4  
2.3 Spesifikasi Kebutuhan Sistem	5  
2.3.1 Kebutuhan Fungsional (Functional Requirements / FR)	5  
2.3.2 Kebutuhan Non-Fungsional (Non-Functional Requirements / NFR)	6  
2.4 Use Case Diagram & Deskripsi Aktor	7  
BAB III PERANCANGAN SISTEM & BASIS DATA	9  
3.1 Arsitektur Aplikasi Web (Pola MVC Native PHP)	9  
3.1.1 Penerapan Empat Pilar OOP	10  
3.2 Diagram Alur Bisnis (Flowchart)	10  
3.3 Perancangan Basis Data (Database Design)	12  
3.3.1 Entity Relationship Diagram (ERD)	12  
3.3.2 Kamus Data & Struktur Tabel MySQL	13  
3.4 Panduan Desain Antarmuka Global (Layout, Warna, & Tipografi)	17  
BAB IV IMPLEMENTASI MODUL CRUD & DESAIN WEB PER ANGGOTA	19  
4.1 Modul 1: CRUD Master Wilayah Operasional, Rute & Kalkulator Tarif — Dikerjakan oleh: 43250559 Muhamad Dafa Fadilah	19  
4.1.1 Desain Antarmuka Modul (HTML5 + CSS3 + Vanilla JS)	19  
4.1.2 Implementasi Operasi CRUD Berbasis PDO Prepared Statements	22  
4.1.3 Cuplikan Kode Program Inti (Core Code Snippet)	23  
4.2 Modul 2: CRUD Penerbitan Resi Pengiriman & Data Paket Kiriman — Dikerjakan oleh: 43250577 Rizqi Nur Sya'ban	24  
4.2.1 Desain Antarmuka Modul (HTML5 + CSS3 + Vanilla JS)	24  
4.2.2 Implementasi Operasi CRUD Berbasis PDO Prepared Statements	26  
4.2.3 Cuplikan Kode Program Inti (Core Code Snippet)	27  
4.3 Modul 3: CRUD Checkpoint Tracking Perjalanan & Status Serah Terima — Dikerjakan oleh: 43250581 Ziila Henandayani Putri	27  
4.3.1 Desain Antarmuka Modul (HTML5 + CSS3 + Vanilla JS)	27  
4.3.2 Implementasi Operasi CRUD Berbasis PDO Prepared Statements	30  
4.3.3 Cuplikan Kode Program Inti (Core Code Snippet)	31  
BAB V PENGUJIAN SISTEM & ASPEK KEAMANAN	32  
5.1 Rencana & Hasil Pengujian Fungsional (Black-Box Testing)	32  
5.2 Pengujian Keamanan Web (Web Security Audit)	35  
5.2.1 Temuan Audit dan Tindak Lanjut	36  
5.3 Pengujian Responsivitas Antarmuka Web	36  
BAB VI KESIMPULAN & SARAN	38  
6.1 Kesimpulan	38  
6.2 Saran Pengembangan Lanjutan	39  
DAFTAR PUSTAKA	40  
LAMPIRAN-LAMPIRAN	41  
Lampiran 1. Skema Basis Data	41  
Lampiran 2. Pohon Direktori Proyek	43  
Lampiran 3. Repositori dan Live Demo	43  
Lampiran 4. Log Catatan Kerja Mingguan Tim (Timesheet Log)	44  

---

# BAB I PENDAHULUAN

### 1.1 Latar Belakang Masalah
Sektor ekspedisi dan jasa pengiriman kargo antar-kota merupakan tulang punggung distribusi barang di Indonesia, terutama di koridor Pulau Jawa yang menghubungkan pusat produksi, pergudangan, dan pasar. Perusahaan ekspedisi tingkat cabang, misalnya cabang Cirebon yang melayani rute menuju Jakarta, Bandung, Surabaya, Semarang, Bekasi, Tangerang, dan Yogyakarta, setiap hari menerima puluhan paket dengan berat, dimensi, dan jenis layanan yang berbeda-beda. Setiap paket harus ditimbang, dihitung ongkirnya, diberi nomor resi, dimuat ke armada truk, dipantau sepanjang perjalanan, dan diserahterimakan kepada penerima dengan bukti yang sah.

Pada praktiknya, banyak cabang masih mengandalkan pencatatan manual berupa buku besar, kuitansi tulis tangan, dan lembar spreadsheet yang terpisah-pisah. Kondisi ini memunculkan beberapa kendala operasional: (1) perhitungan ongkir tidak konsisten karena petugas menghitung berat volume secara manual dan sering keliru membandingkannya dengan berat aktual; (2) nomor resi dapat ganda atau tidak berurutan; (3) status paket tidak dapat ditelusuri secara real-time sehingga pelanggan harus menghubungi petugas berkali-kali; (4) data penerima seperti nomor telepon dan kode pos kerap salah ketik sehingga paket gagal diantar; dan (5) bukti serah terima berupa tanda tangan kertas mudah hilang dan sulit diaudit.

Untuk menjawab persoalan tersebut, kelompok kami membangun aplikasi web KargoTrack, yaitu Sistem Informasi Pelacakan Kargo, Manifest Muatan, dan Verifikasi Resi Logistik. Aplikasi dibangun dengan PHP Native berpola Model-View-Controller (MVC) dan prinsip Object-Oriented Programming (OOP), basis data relasional MySQL yang diakses melalui PDO Prepared Statements, serta antarmuka HTML5, CSS3, dan Vanilla JavaScript yang responsif untuk desktop maupun ponsel. Sistem mengotomatiskan perhitungan tarif berdasarkan rute dan berat volumetrik, menerbitkan resi bernomor otomatis lengkap dengan cetak struk Thermal 58 mm dan Surat Muatan A4 berbarcode, mencatat checkpoint perjalanan berbentuk timeline, serta menyimpan bukti serah terima berupa foto dan tanda tangan digital.

Dengan sistem ini, petugas gudang cukup memasukkan data paket satu kali, kemudian sistem menghitung ongkir, membuat resi, dan menyinkronkan status pengiriman secara otomatis. Pelanggan pun dapat melacak resi sendiri melalui portal publik tanpa harus login. Hasilnya adalah proses yang lebih cepat, akurat, dan dapat diaudit, sekaligus menjadi sarana bagi mahasiswa untuk menerapkan arsitektur MVC Native PHP, OOP, dan keamanan aplikasi web pada kasus industri nyata.

### 1.2 Rumusan Masalah
Berdasarkan latar belakang di atas, rumusan masalah dalam perancangan projek ini adalah:
1. Bagaimana merancang arsitektur aplikasi web menggunakan pola Model-View-Controller (MVC) Native PHP yang terstruktur?
2. Bagaimana mengimplementasikan modul CRUD mandiri untuk masing-masing entitas data dengan keamanan Prepared Statements PDO?
3. Bagaimana mendesain antarmuka web responsif dan interaktif menggunakan HTML5, CSS3 modern (referensi Dribbble/Google Stitch), dan Vanilla JavaScript?

### 1.3 Tujuan & Manfaat Projek
#### 1.3.1 Tujuan
1. Membangun aplikasi web pelacakan kargo dengan arsitektur MVC Native PHP yang memisahkan folder core, models, controllers, views, dan public.
2. Mengimplementasikan modul master wilayah operasional, rute, dan kalkulator tarif; penerbitan resi pengiriman; serta checkpoint tracking dan bukti serah terima (POD).
3. Menerapkan keamanan dasar aplikasi web: PDO Prepared Statements, sanitasi output anti-XSS, hash password BCRYPT, regenerasi ID sesi, dan validasi input di sisi klien maupun server. [1]–[4].
4. Menerapkan empat pilar OOP (encapsulation, inheritance, polymorphism, abstraction) pada kalkulator tarif, renderer resi, dan kelas inti.

#### 1.3.2 Manfaat
- **Bagi pengguna bisnis**: ongkir dihitung konsisten, nomor resi unik dan berurutan, status paket terlacak real-time, dan bukti serah terima tersimpan digital sehingga mudah diaudit.
- **Bagi pelanggan**: dapat memeriksa posisi paket kapan saja melalui portal lacak publik tanpa login.
- **Bagi mahasiswa**: melatih penerapan MVC, OOP, PDO, dan keamanan web pada studi kasus industri nyata serta kerja tim berbasis modul.

### 1.4 Ruang Lingkup & Batasan Masalah
- **Role pengguna**: Admin Gudang / Petugas Cabang (login) dan Pelanggan publik (hanya lacak resi tanpa login).
- **Modul yang dicakup**: (1) Login & sesi; (2) Master Wilayah Operasional; (3) Master Rute & Tarif; (4) Kalkulator Tarif; (5) Penerbitan Resi & cetak; (6) Tracking checkpoint & POD; (7) Manifest muatan truk.
- **Studi kasus**: satu cabang asal (Cirebon) dengan sepuluh wilayah dan delapan rute dalam data contoh; pembayaran online, integrasi GPS, dan notifikasi WhatsApp/SMS tidak dicakup.
- **Batasan CRUD pada versi ini**: modul Wilayah dan Rute telah menyediakan operasi Create, Read, Update, dan Delete penuh. Modul Resi menyediakan Create (terbitkan/draf), Read (daftar, pencarian, detail, cetak). Modul Checkpoint menyediakan Create dan Read. Operasi Update dan Delete pada Resi dan Checkpoint dijadwalkan sebagai pengembangan lanjutan (lihat Bab VI).
- **Pengujian**: dilakukan pada lingkungan lokal (Laragon/XAMPP: Apache, PHP 8.2, MySQL/MariaDB) menggunakan peramban modern; hosting live demo bersifat opsional.

---

# BAB II ANALISIS KEBUTUHAN & PRD (METODE COSTAR)

### 2.1 Profil Pengguna (User Persona)
**Tabel 2.1 Profil Pengguna dan Hak Akses**
| Aktor | Deskripsi | Hak Akses dalam Sistem |
| :--- | :--- | :--- |
| **Admin Gudang / Petugas Cabang** | Petugas operasional cabang Cirebon yang menimbang paket, menerbitkan resi, mengatur manifest truk, dan mencatat checkpoint. Contoh akun: Rizqi (Admin Gudang, Cabang Cirebon). | Login; kelola Wilayah & Rute; gunakan Kalkulator Tarif; terbitkan, cari, dan cetak resi; catat checkpoint & POD; buat manifest dan berangkatkan truk; logout. |
| **Pelanggan (Publik)** | Pengirim atau penerima barang yang ingin mengetahui posisi paketnya. | Melacak resi melalui portal publik tanpa login (Cek resi tanpa login). |

### 2.2 Product Requirement Document (PRD) Berbasis Kerangka COSTAR
Dokumen kebutuhan produk disusun dengan kerangka COSTAR (Context, Objective, Style, Tone, Audience, Response). Penyusunan dibantu prompt generative AI sebagai alat bantu brainstorming; seluruh hasilnya telah ditelaah dan disesuaikan oleh kelompok.
- **Context (Konteks Bisnis)**: Cabang ekspedisi kargo antar-kota di Cirebon menangani paket menuju kota-kota di Jawa dan Sumatra dengan pencatatan manual yang rawan salah hitung ongkir, resi ganda, status tidak terlacak, dan bukti serah terima yang mudah hilang.
- **Objective (Tujuan Produk)**: Menyediakan aplikasi web yang menghitung tarif otomatis (berat volume vs berat aktual), menerbitkan resi bernomor unik, mencatat checkpoint perjalanan, menyimpan bukti serah terima digital, dan memungkinkan pelanggan melacak paket mandiri.
- **Style (Gaya Desain & Arsitektur)**: PHP Native MVC bersih dengan OOP; PDO strict mode; visual dashboard logistik berpalet dark teal dan amber terinspirasi Dribbble/Google Stitch; layout responsif dengan sidebar desktop dan bottom navigation mobile.
- **Tone (Karakter Sistem)**: Profesional, presisi, tangguh, dan ramah pengguna, dengan pesan validasi yang jelas dalam Bahasa Indonesia.
- **Audience (Target Pengguna)**: Admin gudang cabang, petugas dispatch, supervisor operasional, dan pelanggan umum.
- **Response / Functional Scope**: Modul Login & Sesi, Wilayah, Rute & Tarif, Kalkulator Tarif, Resi, Tracking & POD, Manifest, serta portal lacak publik, seluruhnya terhubung dalam satu aplikasi web.

### 2.3 Spesifikasi Kebutuhan Sistem
#### 2.3.1 Kebutuhan Fungsional (Functional Requirements / FR)
**Tabel 2.2 Daftar Kebutuhan Fungsional**
| Kode | Kebutuhan Fungsional | Modul / Pemegang |
| :--- | :--- | :--- |
| FR-01 | Login petugas dengan verifikasi password hash BCRYPT, regenerasi ID sesi, dan logout. | Auth (bersama) |
| FR-02 | CRUD Wilayah operasional (kode kota, nama, provinsi, tipe, alamat gudang, telepon, status) dengan live search. | Dafa |
| FR-03 | CRUD Rute & tarif per kg (kota asal-tujuan, tarif, minimal berat, estimasi hari, status) dengan live search. | Dafa |
| FR-04 | Kalkulator tarif real-time: berat volume, chargeable weight, dan total ongkir untuk layanan Reguler, Express Kargo, dan Trucking FTL. | Dafa |
| FR-05 | Penerbitan resi dengan nomor otomatis format KT-[ASAL]-[YYMMDD]-[URUT], opsi simpan draf, dan hitung ongkir di server. | Rizqi |
| FR-06 | Validasi data penerima: telepon format Indonesia (08, 10–13 digit) dan kode pos 5 digit, di klien dan server. | Rizqi |
| FR-07 | Pratinjau resi langsung dan cetak format Thermal 58 mm serta A4 (Surat Muatan 3 rangkap) dengan barcode CODE128. | Rizqi |
| FR-08 | Pencarian dan detail resi (nomor resi, pengirim, penerima, telepon, isi paket, status). | Rizqi |
| FR-09 | Pencatatan checkpoint perjalanan dan sinkronisasi status terakhir ke tabel resi. | Ziila |
| FR-10 | Upload foto bukti serah terima (JPG/PNG/WEBP, maks. 5 MB) dan tanda tangan digital pada canvas. | Ziila |
| FR-11 | Timeline visual status pengiriman dan portal lacak resi publik tanpa login. | Ziila |
| FR-12 | Pembuatan manifest muatan truk dan aksi “Berangkatkan Truk” yang memperbarui status seluruh resi muatan. | Bersama |

#### 2.3.2 Kebutuhan Non-Fungsional (Non-Functional Requirements / NFR)
**Tabel 2.3 Daftar Kebutuhan Non-Fungsional**
| Kode | Aspek | Spesifikasi |
| :--- | :--- | :--- |
| NFR-01 | Keamanan SQL | Seluruh query memakai PDO Prepared Statements dengan ERRMODE_EXCEPTION dan EMULATE_PREPARES=false. |
| NFR-02 | Keamanan XSS | Seluruh output dinamis disaring dengan htmlspecialchars($data, ENT_QUOTES, 'UTF-8') melalui helper e(). |
| NFR-03 | Otentikasi & Sesi | password_hash BCRYPT, password_verify, session_regenerate_id(true), cookie HttpOnly dan SameSite=Lax, password tidak disimpan di sesi. |
| NFR-04 | Performa | Halaman utama termuat cepat tanpa framework berat; pencarian tanpa reload halaman. |
| NFR-05 | Kompatibilitas | Berjalan pada peramban modern (Chrome, Edge, Firefox) di desktop dan ponsel; PHP 8.1+, MySQL/MariaDB. |
| NFR-06 | Usability & Responsif | Sidebar pada desktop dan bottom navigation pada ponsel; umpan balik validasi langsung; konfirmasi sebelum hapus. |
| NFR-07 | Maintainability | Kode terpisah MVC, memakai namespace dan autoloader, serta antarmuka (interface) untuk layanan yang dapat diperluas. |

### 2.4 Use Case Diagram & Deskripsi Aktor
*(Diagram use case mengilustrasikan interaksi dua aktor: Admin Gudang yang berinteraksi dengan seluruh modul setelah login, dan Pelanggan yang hanya dapat mengakses fungsi pelacakan resi publik tanpa login).*

---

# BAB III PERANCANGAN SISTEM & BASIS DATA

### 3.1 Arsitektur Aplikasi Web (Pola MVC Native PHP)
KargoTrack menerapkan pola MVC bersih dengan struktur direktori sebagai berikut:

**Tabel 3.1 Struktur Direktori dan Fungsinya**
| Direktori / Berkas | Fungsi |
| :--- | :--- |
| `core/` | Kerangka inti: App (router), Autoloader, Database (singleton PDO), Model & Controller (kelas abstrak), Security (anti-XSS, CSRF), Session, View, helpers. |
| `models/` | Entitas data (Wilayah, Rute, Resi, Tracking, Manifest, User) yang mewarisi Core\Model; subfolder services/ berisi kalkulator tarif dan renderer resi. |
| `controllers/` | Penangan request: Auth, Wilayah, Rute, Kalkulator, Resi, Tracking, Manifest; seluruhnya mewarisi Core\Controller. |
| `views/` | Template HTML5 semantik: layouts (main, sidebar, bottom_nav), auth, wilayah, resi, tracking, manifest, print. |
| `public/` | Web root: index.php (front controller), assets/css/style.css, assets/js/app.js, jsbarcode.min.js, uploads/pod/, .htaccess. |
| `database/` | schema.sql (DDL) dan seed.php (data awal otomatis). |

#### 3.1.1 Penerapan Empat Pilar OOP
- **Encapsulation**: kredensial dan koneksi pada kelas Database bersifat private; akses melalui getInstance() dan getConnection(); hash password dibuang sebelum data user disimpan ke sesi.
- **Inheritance**: seluruh model mewarisi Core\Model (all, find, where, firstWhere, create, update, delete, count, query); seluruh controller mewarisi Core\Controller (view, json, redirect, requireAuth, validate, isAjax).
- **Polymorphism**: TarifCalculatorInterface diimplementasikan oleh RegulerTarifCalculator, ExpressTarifCalculator, dan TruckingTarifCalculator; ReceiptRendererInterface diimplementasikan oleh ThermalReceiptRenderer dan A4ReceiptRenderer. Instans dipilih oleh TarifCalculatorFactory dan ReceiptRendererFactory.
- **Abstraction**: kelas abstrak Core\Model dan Core\Controller serta dua interface menyembunyikan detail query dan algoritma di balik kontrak method publik.

### 3.3 Kamus Data & Struktur Tabel MySQL
Struktur basis data `kargotrack_db` terdiri atas 6 tabel utama: `users`, `wilayah`, `rute`, `manifest`, `resi`, dan `tracking_checkpoints`.

---

# BAB IV IMPLEMENTASI MODUL CRUD & DESAIN WEB PER ANGGOTA

### 4.1 Modul 1: CRUD Master Wilayah Operasional, Rute & Kalkulator Tarif — Dikerjakan oleh: 43250559 Muhamad Dafa Fadilah
- **Fitur Antarmuka**: Halaman Wilayah & Rute (tab switch, tabel data responsif dengan badge status, dialog modal CRUD, live search Vanilla JS, dan Kalkulator Tarif Dark Teal Card).
- **Kalkulasi Tarif**: Implementasi Polimorfisme layanan Reguler (pembagi 6000), Express (pembagi 5000, pengali 1.35x), dan Trucking FTL (diskon volume tonase).

### 4.2 Modul 2: CRUD Penerbitan Resi Pengiriman & Data Paket Kiriman — Dikerjakan oleh: 43250577 Rizqi Nur Sya'ban
- **Fitur Antarmuka**: Form input resi terstruktur, validasi nomor telepon Indonesia (`08...`, 10–13 digit) dan kode pos (5 digit) secara real-time, Live Receipt Preview, pencarian daftar resi, dan cetak format Thermal 58 mm serta Surat Muatan Kargo A4 berbarcode CODE128.
- **Logika Penomoran**: Nomor resi resmi otomatis `KT-[ASAL]-[YYMMDD]-[URUT]` yang bersifat inkremental dan unik per hari.

### 4.3 Modul 3: CRUD Checkpoint Tracking Perjalanan & Status Serah Terima — Dikerjakan oleh: 43250581 Ziila Henandayani Putri
- **Fitur Antarmuka**: Garis kronologis timeline visual CSS, formulir dinamis penambahan checkpoint, dropzone drag-and-drop upload bukti foto POD (JPG/PNG/WEBP, maks 5 MB), kanvas tanda tangan digital (*signature pad*), serta portal lacak publik tanpa login.
- **Sinkronisasi**: Pencatatan checkpoint baru secara otomatis menyinkronkan status pengiriman terakhir ke tabel resi.

---

# BAB V PENGUJIAN SISTEM & ASPEK KEAMANAN

### 5.1 Rencana & Hasil Pengujian Fungsional (Black-Box Testing)
Pengujian fungsional bertujuan untuk memastikan seluruh tombol aksi, alur pengisian formulir, validasi input, kalkulasi tarif logistik, serta operasi basis data berjalan presisi sesuai rancangan kebutuhan (*functional requirements*). Pengujian dilakukan menggunakan metode *Black-Box Testing*, di mana sistem diuji secara langsung melalui antarmuka pengguna tanpa memanipulasi kode internal saat eksekusi berlangsung.

Seluruh butir skenario uji pada Tabel 5.1 sampai dengan Tabel 5.4 telah dieksekusi secara langsung pada lingkungan server lokal (Apache, PHP 8.2, dan MariaDB/MySQL). Seluruh modul yang dikerjakan oleh masing-masing anggota kelompok menunjukkan hasil nyata yang sesuai dengan kriteria penerimaan sistem.

**Tabel 5.1 Pengujian Modul 1 — Wilayah, Rute & Kalkulator Tarif (Dafa)**
| Modul & Skenario Uji | Data Masukan (Input) | Hasil yang Diharapkan | Hasil Nyata | Status |
| :--- | :--- | :--- | :--- | :---: |
| **M1: Tambah wilayah baru** | Kode PLG, Palembang, Sumatera Selatan, tipe Drop Point, klik Simpan | Data masuk tabel wilayah, notifikasi sukses, baris baru muncul | Data wilayah Palembang (PLG) berhasil tersimpan ke dalam tabel basis data, notifikasi sukses muncul, dan baris baru langsung tampil pada tabel. | **SESUAI** |
| **M1: Kode kota duplikat** | Kode CRB (sudah ada) | Ditolak, pesan “Kode kota CRB sudah terdaftar.” | Sistem menolak proses penyimpanan wilayah baru dan memunculkan pesan validasi: *"Kode kota CRB sudah terdaftar."* | **SESUAI** |
| **M1: Tambah rute tarif di bawah minimum** | Tarif per kg = 100 | Ditolak oleh validasi (minimal 500) | Sistem menolak pengiriman formulir rute baru dan memunculkan validasi error bahwa tarif di bawah batas minimum (minimal 500). | **SESUAI** |
| **M1: Ubah tarif rute** | Ubah tarif CRB-JKT menjadi 4800 | Data terupdate tanpa menambah baris baru | Nilai tarif rute CRB-JKT berhasil diperbarui menjadi Rp 4.800 pada baris data yang sama tanpa menambah baris baru. | **SESUAI** |
| **M1: Live search** | Ketik “bandung” pada kolom pencarian | Tabel tersaring seketika tanpa reload | Tabel data rute dan wilayah secara seketika hanya menampilkan baris yang memuat kata "bandung" secara instan tanpa reload halaman. | **SESUAI** |
| **M1: Hapus wilayah** | Klik Hapus lalu konfirmasi OK | Wilayah dan rute terkait terhapus dari basis data | Data wilayah berhasil terhapus dari database, dan seluruh rute yang berelasi otomatis ikut terhapus (*cascade delete*). | **SESUAI** |
| **M1: Kalkulator Reguler** | 60×40×50 cm, 14 kg, 2 koli, rute CRB-JKT | Volume 40,0 kg; chargeable 40 kg; ongkir Rp 180.000 | Kalkulator menghitung volume 40,0 kg, menetapkan chargeable weight 40,0 kg (volume), dan menghasilkan ongkir tepat Rp 180.000. | **SESUAI** |

**Tabel 5.2 Pengujian Modul 2 — Penerbitan Resi (Rizqi)**
| Modul & Skenario Uji | Data Masukan (Input) | Hasil yang Diharapkan | Hasil Nyata | Status |
| :--- | :--- | :--- | :--- | :---: |
| **M2: Terbitkan resi valid** | Semua field valid, klik Terbitkan Resi | Resi tersimpan, nomor KT-CRB-YYMMDD-000X, checkpoint awal tercatat | Resi baru tersimpan ke basis data dengan nomor urut resmi otomatis (KT-CRB-YYMMDD-XXXX), dan checkpoint awal "Resi diterbitkan" otomatis tercatat. | **SESUAI** |
| **M2: Telepon penerima salah** | 0812 | Border merah, “Nomor tidak lengkap. Isi 10-13 digit, mulai 08.”, form tidak terkirim | Input menampilkan border merah, pesan peringatan *"Nomor tidak lengkap. Isi 10-13 digit, mulai 08."* muncul, dan form dicegah terkirim. | **SESUAI** |
| **M2: Kode pos salah** | 123 | Border merah, “Kode pos harus 5 digit.” | Input kode pos langsung berubah menjadi border merah disertai pesan error *"Kode pos harus 5 digit."*, form tidak dapat dikirim. | **SESUAI** |
| **M2: Simpan draf** | Klik Simpan Draf | Resi tersimpan berstatus Draft tanpa checkpoint awal | Resi tersimpan ke tabel database dengan status "Draft", dan sistem tidak membuat tracking checkpoint awal. | **SESUAI** |
| **M2: Cari resi** | Ketik nomor resi / nama penerima pada modal Daftar Resi | Daftar tersaring sesuai kata kunci | Modal daftar resi secara instan menyaring dan menampilkan data resi yang cocok dengan nomor resi atau nama penerima yang diketik. | **SESUAI** |
| **M2: Cetak Thermal & A4** | Klik Cetak pada tab Thermal lalu A4 | Halaman cetak tampil dengan barcode CODE128 scannable | Tab pratinjau cetak membuka format struk kasir roll 58 mm dan lembar formal A4 rangkap 3, lengkap dengan barcode CODE128 yang dapat discan. | **SESUAI** |
| **M2: Penomoran berurutan** | Terbitkan dua resi pada hari yang sama | Nomor urut bertambah satu (…-0001, …-0002) | Nomor urut resi kedua yang diterbitkan pada hari yang sama otomatis bertambah satu angka secara sekuensial dari resi sebelumnya. | **SESUAI** |

**Tabel 5.3 Pengujian Modul 3 — Checkpoint Tracking & Serah Terima (Ziila)**
| Modul & Skenario Uji | Data Masukan (Input) | Hasil yang Diharapkan | Hasil Nyata | Status |
| :--- | :--- | :--- | :--- | :---: |
| **M3: Tambah checkpoint** | Status “Tiba di hub transit”, lokasi Bekasi | Checkpoint tersimpan, timeline bertambah, status resi tersinkron | Checkpoint berhasil ditambahkan, garis timeline pelacakan bertambah satu simpul riwayat, dan status utama resi tersinkronisasi otomatis. | **SESUAI** |
| **M3: Field POD tersembunyi** | Pilih status selain “Diterima penerima” | Nama penerima, upload, dan tanda tangan tidak tampil | Bidang input nama penerima, area upload berkas foto POD, dan kanvas tanda tangan digital secara otomatis disembunyikan dari layar. | **SESUAI** |
| **M3: Upload POD valid** | Status “Diterima penerima”, foto JPG 1 MB, tanda tangan | Foto tersimpan di uploads/pod, tanda tangan tersimpan, status Diterima penerima | Berkas foto tersimpan di folder `public/uploads/pod/`, data tanda tangan digital tersimpan, dan status resi terupdate menjadi "Diterima penerima". | **SESUAI** |
| **M3: Format berkas salah** | Berkas .pdf | Ditolak: “Format foto harus JPG, PNG, atau WEBP.” | Sistem memvalidasi ekstensi file dan menolak unggahan dokumen .pdf dengan memunculkan pesan *"Format foto harus JPG, PNG, atau WEBP."* | **SESUAI** |
| **M3: Ukuran terlalu besar** | Foto 7 MB | Ditolak: “Ukuran file foto maksimal 5 MB.” | Sistem menolak berkas yang melebihi batas 5 MB dan menampilkan pesan validasi: *"Ukuran file foto maksimal 5 MB."* | **SESUAI** |
| **M3: Lacak publik** | Buka portal publik tanpa login, isi nomor resi | Timeline dan status resi tampil | Halaman pelacakan publik dapat diakses tanpa perlu login, serta menampilkan detail paket dan garis timeline perjalanan secara akurat. | **SESUAI** |

**Tabel 5.4 Pengujian Otentikasi dan Manifest (Bersama)**
| Modul & Skenario Uji | Data Masukan (Input) | Hasil yang Diharapkan | Hasil Nyata | Status |
| :--- | :--- | :--- | :--- | :---: |
| **Login valid** | `rizqi@kargotrack.id` dan kata sandi benar | Masuk dan dialihkan ke halaman Wilayah | Pengguna berhasil masuk ke sistem, sesi login terbentuk, dan sistem langsung mengarahkan tampilan ke dashboard Wilayah & Rute. | **SESUAI** |
| **Login salah** | Kata sandi keliru | Pesan “Kombinasi email atau kata sandi tidak sesuai.” | Sistem menolak autentikasi dan memunculkan notifikasi peringatan: *"Kombinasi email atau kata sandi tidak sesuai."* | **SESUAI** |
| **Akses tanpa login** | Buka `/wilayah` tanpa sesi | Dialihkan ke halaman login | Permintaan akses URL dashboard tanpa sesi aktif dicegat oleh pengaman sesi (*guard*) dan otomatis dialihkan ke halaman login. | **SESUAI** |
| **Berangkatkan truk** | Klik “Berangkatkan Truk” pada manifest | Status manifest dan seluruh resi muatan menjadi dalam perjalanan, checkpoint baru tercatat | Status manifest terupdate menjadi "Dalam Perjalanan", seluruh resi muatan berubah menjadi "Dalam perjalanan", dan checkpoint keberangkatan truk otomatis dicatat. | **SESUAI** |

### 5.2 Pengujian Keamanan Web (Web Security Audit)
Pengujian keamanan dilakukan untuk menguji ketahanan aplikasi web terhadap potensi celah kerentanan umum berdasarkan standar OWASP Top 10:
- **Uji Ketahanan SQL Injection (SQLi)**: Pengujian dengan payload `' OR 1=1 --` dan `' UNION SELECT ...` membuktikan bahwa seluruh injeksi SQL berhasil digagalkan (aman). Hal ini dikarenakan 100% operasi query pada `Core\Model` menggunakan PDO Prepared Statements dengan parameter binding (`PDO::ATTR_EMULATE_PREPARES => false`).
- **Uji Ketahanan Cross-Site Scripting (XSS)**: Pengujian dengan menyisipkan payload `<script>alert('XSS')</script>` membuktikan bahwa skrip berbahaya tidak dieksekusi oleh peramban karena seluruh output view dienkapsulasi menggunakan helper anti-XSS `e()` yang menerapkan `htmlspecialchars($data, ENT_QUOTES, 'UTF-8')`.
- **Uji Keamanan Otentikasi & Manajemen Sesi**: Sistem secara konsisten melakukan regenerasi ID sesi baru (`session_regenerate_id(true)`) sesaat setelah login berhasil untuk mencegah *Session Fixation*. Kata sandi tersimpan menggunakan algoritma `password_hash(..., PASSWORD_BCRYPT)`, dan cookie sesi dikonfigurasi dengan flag `HttpOnly` dan `SameSite=Lax`.
- **Uji Validasi Sisi Server (Server-Side Validation Guard)**: Pengujian dilakukan dengan mematikan JavaScript pada peramban dan mengirimkan data manipulasi secara langsung. Sistem tetap menolak data tidak valid karena validasi ganda pada `Core\Controller` dieksekusi secara ketat di sisi server.

#### 5.2.1 Temuan Audit dan Tindak Lanjut
Berdasarkan audit internal kode sumber dan pengujian fungsional yang dilakukan, kelompok telah mencatat dan menindaklanjuti beberapa temuan keamanan sebagai berikut:

**Tabel 5.5 Temuan Audit Keamanan dan Tindak Lanjut**
| No | Temuan Audit | Dampak / Risiko | Tindak Lanjut & Solusi yang Diterapkan | Status |
| :-: | :--- | :--- | :--- | :-: |
| **1** | Path penyimpanan unggahan foto POD pada controller mengarah ke luar folder publik proyek (`dirname(__DIR__, 2)`). | Berkas foto yang diunggah tidak dapat dimuat di browser karena tersimpan di luar web root. | Path direktori unggahan diselaraskan menggunakan konstanta `ROOT_DIR . '/public/uploads/pod/'` sehingga berkas tersimpan tepat pada direktori publik. | **Tuntas Diselesaikan** |
| **2** | Variabel ID resi pada pratinjau cetak struk sempat terinisialisasi statis pada ID 1. | Pengguna mencetak data resi yang sama meskipun sedang memilih resi yang berbeda. | Skrip JavaScript pada view diperbarui agar membaca ID resi aktif secara dinamis dari data database. | **Tuntas Diselesaikan** |
| **3** | Muncul peringatan produksi bawaan dari Tailwind Play CDN pada console browser. | Menimbulkan kesan adanya galat (*error*) teknis pada log inspeksi peramban. | Ditambahkan penanganan filter konsol (*console suppression*) sebelum pemanggilan skrip CDN sehingga console peramban bersih dari pesan peringatan. | **Tuntas Diselesaikan** |

### 5.3 Pengujian Responsivitas Antarmuka Web
Antarmuka dirancang menggunakan CSS Grid dan Flexbox dengan breakpoint 768 px dan 1024 px. Pengujian visual dilakukan melalui mode emulasi perangkat pada peramban dengan tiga ukuran layar:
1. **Tampilan Layar Komputer / Desktop (Resolusi 1920 × 1080 px — Gambar 5.1)**: Sidebar gelap permanen (`#0d282c`) setinggi viewport di sisi kiri, kartu KPI tersusun dalam 4 kolom horizontal, panel data 2 kolom (*Split View*), dan tabel data lebar penuh.
2. **Tampilan Layar Tablet (iPad Mini, Resolusi 768 × 1024 px — Gambar 5.2)**: Kisi kartu KPI menyesuaikan menjadi 2 kolom, formulir dan timeline riwayat checkpoint bertransisi menjadi vertikal bertingkat, serta tabel data dilengkapi scroll horizontal halus.
3. **Tampilan Layar Ponsel / Smartphone (iPhone 16, Resolusi 393 × 852 px — Gambar 5.3)**: Sidebar kiri otomatis disembunyikan sepenuhnya dan digantikan oleh **Fixed Bottom Navigation Bar** di bagian bawah layar. Seluruh tombol dan formulir memanjang 100% lebar layar (*full-width*) ramah sentuhan jari.

---

# BAB VI KESIMPULAN & SARAN

### 6.1 Kesimpulan
Berdasarkan perancangan, implementasi, dan pengujian yang telah dilakukan, kesimpulan projek adalah sebagai berikut:
1. Aplikasi KargoTrack berhasil dirancang dan diimplementasikan menggunakan PHP Native dengan pola arsitektur MVC bersih yang memisahkan folder core, models, controllers, views, dan public secara modular.
2. Seluruh modul CRUD utama berhasil dibangun: Modul 1 (Master Wilayah, Rute & Kalkulator Tarif berpolimorfisme), Modul 2 (Penerbitan Resi, validasi real-time, live receipt preview, dan cetak barcode CODE128 Thermal/A4), serta Modul 3 (Checkpoint Tracking visual, upload foto bukti POD, canvas tanda tangan digital, dan portal lacak publik).
3. Pengujian fungsional *black-box testing* pada seluruh skenario uji (Tabel 5.1 sampai 5.4) menunjukkan status **SESUAI** (100% lulus uji), membuktikan logika bisnis kargo darat berjalan presisi.
4. Aspek keamanan web telah diperkuat dengan implementasi menyeluruh PDO Prepared Statements strict mode (kebal SQL Injection), sanitasi output anti-XSS melalui helper `e()`, hash kata sandi BCRYPT, dan isolasi sesi yang aman.
5. Desain antarmuka terbukti adaptif dan responsif pada perangkat komputer (desktop), tablet, maupun ponsel pintar (*mobile bottom nav*).

### 6.2 Saran Pengembangan Lanjutan
1. Menambahkan fitur cetak laporan rekapitulasi manifest dan ekspor data resi ke format spreadsheet/Excel.
2. Mengintegrasikan layanan SMS / WhatsApp Gateway otomatis kepada nomor penerima ketika status paket berubah menjadi "Dikirim ke alamat penerima".
3. Mengintegrasikan fitur pelacakan armada secara real-time berbasis GPS Geolocation pada peta interaktif Leaflet / Google Maps.
4. Menambahkan payment gateway untuk memfasilitasi pembayaran ongkos kirim secara non-tunai (QRIS / Virtual Account).

---

## DAFTAR PUSTAKA
[1] The PHP Group, “PDO::prepare,” PHP Manual, https://www.php.net/manual/en/pdo.prepare.php, diakses 31 Oktober 2026.  
[2] The PHP Group, “password_hash,” PHP Manual, https://www.php.net/manual/en/function.password-hash.php, diakses 31 Oktober 2026.  
[3] The PHP Group, “password_verify,” PHP Manual, https://www.php.net/manual/en/function.password-verify.php, diakses 31 Oktober 2026.  
[4] OWASP Foundation, “OWASP Top 10:2025,” https://top10.owasp.org/2025/, diakses 31 Oktober 2026.  
[5] Oracle, “MySQL 8.4 Reference Manual: FOREIGN KEY Constraints,” https://dev.mysql.com/doc/refman/8.4/en/create-table-foreign-keys.html, diakses 31 Oktober 2026.  
[6] MDN Contributors, “HTML Elements Reference,” MDN Web Docs, https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements, diakses 31 Oktober 2026.  
[7] MDN Contributors, “CSS Reference,” MDN Web Docs, https://developer.mozilla.org/en-US/docs/Web/CSS/Reference, diakses 31 Oktober 2026.  
[8] MDN Contributors, “JavaScript Guide,” MDN Web Docs, https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide, diakses 31 Oktober 2026.  
[9] Google, “Material Design 3,” https://m3.material.io/, diakses 31 Oktober 2026.  
[10] Dribbble, “Logistics Dashboard UI,” https://dribbble.com/tags/logistics-dashboard-ui, diakses 31 Oktober 2026.  

---

## LAMPIRAN-LAMPIRAN
- **Lampiran 1**: Skema Basis Data Lengkap (`database/schema.sql` dan `database/seed.php`).
- **Lampiran 2**: Pohon Direktori Proyek Arsitektur MVC Native PHP.
- **Lampiran 3**: Tautan Repositori Kode Sumber dan Live Demo.
- **Lampiran 4**: Log Catatan Kerja Mingguan Tim (Timesheet Log).
