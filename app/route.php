<?php
use SistemPendukungKeputusan\UINIB\PHP\MVC\App\Router;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Controller\AlternatifController;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Middleware\AuthMiddleware;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Controller\AuthController;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Controller\ProfilController;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Controller\DataSiswaController;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Controller\HasilAkhirController;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Controller\KriteriaController;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Controller\PenilaianController;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Controller\PerhitunganController;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Controller\SubAlternatifController;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Controller\SubKriteriaController;

// LOGIN
Router::add('GET', '/', AuthController::class, 'index');
Router::add('GET', '/login', AuthController::class, 'index');
Router::add('GET', '/logout', AuthController::class, 'logout');
Router::add('GET', '/register', AuthController::class, 'register');
Router::add('POST', '/register/add', AuthController::class, 'tambahUser');
Router::add('POST', '/login/proses', AuthController::class, 'prosesLogin');
Router::add('GET', '/dashboard/profil', ProfilController::class, 'index', [AuthMiddleware::class]);
Router::add('POST', '/dashboard/profil/edit', ProfilController::class, 'edit', [AuthMiddleware::class]);
Router::add('GET', '/dashboard/profil/ubah-password', ProfilController::class, 'ubahPassword', [AuthMiddleware::class]);
Router::add('POST', '/dashboard/profil/ubah-password/edit', ProfilController::class, 'prosesUbahPassword', [AuthMiddleware::class]);

// Siswa
Router::add('GET', '/dashboard/profil/data-siswa', DataSiswaController::class, 'personal', [AuthMiddleware::class]);
Router::add('POST', '/dashboard/profil/data-siswa/edit', DataSiswaController::class, 'prosesEditDataSiswa', [AuthMiddleware::class]);
Router::add('GET', '/dashboard/data-siswa', DataSiswaController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/dashboard/data-siswa/sub-alternatif', DataSiswaController::class, 'subAlternatif', [AuthMiddleware::class]);
Router::add('GET', '/dashboard/data-siswa/hasil', DataSiswaController::class, 'hasil', [AuthMiddleware::class]);
Router::add('GET', '/dashboard/data-siswa/cetak-hasil', DataSiswaController::class, 'cetakHasil', [AuthMiddleware::class]);
Router::add('GET', '/dashboard/data-siswa/cetak-view', DataSiswaController::class, 'cetakView');
Router::add('GET', '/dashboard/profil/data-siswa/hasil', DataSiswaController::class, 'hasil', [AuthMiddleware::class]);

// Data Kriteria
Router::add('GET', '/dashboard/kriteria', KriteriaController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/dashboard/kriteria/add', KriteriaController::class, 'add', [AuthMiddleware::class]);
Router::add('POST', '/dashboard/kriteria/add/proses-tambah-kriteria', KriteriaController::class, 'tambahKriteria', [AuthMiddleware::class]);
Router::add('GET', '/dashboard/kriteria/edit', KriteriaController::class, 'edit', [AuthMiddleware::class]);
Router::add('POST', '/dashboard/kriteria/edit/proses-edit-kriteria', KriteriaController::class, 'ubahKriteria', [AuthMiddleware::class]);
Router::add('GET', '/dashboard/kriteria/delete', KriteriaController::class, 'hapusKriteria', [AuthMiddleware::class]);

// Sub Kriteria
Router::add('GET', '/dashboard/sub-kriteria', SubKriteriaController ::class, 'index', [AuthMiddleware::class]);
Router::add('POST', '/dashboard/sub-kriteria/add/proses-tambah-sub-kriteria', SubKriteriaController::class, 'tambahSubKriteria', [AuthMiddleware::class]);
Router::add('POST', '/dashboard/sub-kriteria/edit/proses-edit-sub-kriteria', SubKriteriaController::class, 'ubahSubKriteria', [AuthMiddleware::class]);
Router::add('GET', '/dashboard/sub-kriteria/delete', SubKriteriaController::class, 'hapusSubKriteria', [AuthMiddleware::class]);

// Alternatif
Router::add('GET', '/dashboard/alternatif', AlternatifController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/dashboard/alternatif/edit', AlternatifController::class, 'edit', [AuthMiddleware::class]);
Router::add('GET', '/dashboard/alternatif/add', AlternatifController::class, 'add', [AuthMiddleware::class]);
Router::add('POST', '/dashboard/alternatif/add/proses-tambah-alternatif', AlternatifController::class, 'tambahAlternatif', [AuthMiddleware::class]);
Router::add('POST', '/dashboard/alternatif/edit/proses-edit-alternatif', AlternatifController::class, 'ubahAlternatif', [AuthMiddleware::class]);
Router::add('GET', '/dashboard/alternatif/delete', AlternatifController::class, 'hapusAlternatif', [AuthMiddleware::class]);

// Sub Alternatif
Router::add('GET', '/dashboard/alternatif/pembobotan', SubAlternatifController::class, 'index', [AuthMiddleware::class]);
Router::add('POST', '/dashboard/alternatif/pembobotan/add/proses-tambah-sub-alternatif', SubAlternatifController::class, 'tambahSubAlternatif', [AuthMiddleware::class]);
Router::add('POST', '/dashboard/alternatif/pembobotan/edit/proses-edit-sub-alternatif', SubAlternatifController::class, 'ubahSubAlternatif', [AuthMiddleware::class]);
Router::add('GET', '/dashboard/alternatif/pembobotan/delete', SubAlternatifController::class, 'hapusSubAlternatif', [AuthMiddleware::class]);

// Penilaian
Router::add('GET', '/dashboard/penilaian', PenilaianController::class, 'index', [AuthMiddleware::class]);
Router::add('POST', '/dashboard/penilaian/add/proses-tambah-penilaian', PenilaianController::class, 'tambahPenilaian', [AuthMiddleware::class]);
Router::add('POST', '/dashboard/penilaian/edit/proses-edit-penilaian', PenilaianController::class, 'ubahPenilaian', [AuthMiddleware::class]);

// Perhitungan
Router::add('GET', '/dashboard/perhitungan', PerhitunganController::class, 'index', [AuthMiddleware::class]);
Router::add('POST', '/dashboard/perhitungan/add/proses-tambah-perhitungan', PerhitunganController::class, 'tambahPerhitungan', [AuthMiddleware::class]);
Router::add('POST', '/dashboard/perhitungan/edit/proses-edit-perhitungan', PerhitunganController::class, 'ubahPerhitungan', [AuthMiddleware::class]);

// Hasil Akhir
Router::add('GET', '/dashboard/hasil-akhir', HasilAkhirController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/dashboard/hasil-akhir/cetak', HasilAkhirController::class, 'cetakHasilAkhir', [AuthMiddleware::class]);


Router::run();