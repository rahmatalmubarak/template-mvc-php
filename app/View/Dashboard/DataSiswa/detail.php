<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: bolder;">Daftar Siswa</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-header bg-white">
                        <h3 class="font-weight-bold">Hasil Rekomendasi Program Studi</h3>
                    </div>
                    <div class="card border-top-0">
                        <div class="card-body p-0">
                            <div class="p-3 pt-0 mb-3">
                                <table class="mb-2">
                                    <thead>
                                        <tr>
                                            <td style="width: 50%;">Nama</td>
                                            <td>: <?= $response['data']['dataSiswa']['Nama_Lengkap'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Minat dan Bakat</td>
                                            <td>: <?= $response['data']['dataSiswa']['dataSiswa']['Minat_Bakat'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Prestasi Akademik</td>
                                            <td>: <?= $response['data']['dataSiswa']['dataSiswa']['Prestasi_Akademik'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Penghasilan Orang Tua</td>
                                            <td>: <?= $response['data']['dataSiswa']['dataSiswa']['Penghasilan_Ortu'] ?></td>
                                        </tr>
                                    </thead>
                                </table>
                                <div>
                                    <p>Berdasarkan hasil pertimbangan dari Nilai, Minat dan Bakat, Prestasi Akademik dan Penghasilan Orang Tua. Maka, Siswa yang bernama <?= $response['data']['dataSiswa']['Nama_Lengkap'] ?> direkomendasikan untuk memilih program studi berikut untuk melanjutkan pendidikan ke perguruan tinggi.</p>
                                </div>
                                <div class="card-body table-responsive p-0 col-6 rounded-sm">
                                    <table class="table table-hover">
                                        <thead class="bg-danger">
                                            <tr>
                                                <th>No</th>
                                                <th>Program Studi</th>
                                                <th>Point</th>
                                                <th>Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($response['data']['rekomendasiProdi'] as $key => $rekomendasi_prodi) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $rekomendasi_prodi['Nama'] ?></td>
                                                    <td><?= $response['data']['nilaiAkhirSiswa'] ?></td>
                                                    <td><?= $rekomendasi_prodi['Nilai'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 d-flex">
                    <div class="col-3 pl-0 d-flex">
                        <!-- <form action="<?= BASE_URL; ?>dashboard/data-siswa/cetak-hasil" method="POST">
                            <input type="text" value="">
                        </form> -->
                        <a href="<?= BASE_URL; ?>dashboard/data-siswa/cetak-hasil?id=<?= $_GET['id'] ?>" class="btn btn-primary mb-3">Cetak</a>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->