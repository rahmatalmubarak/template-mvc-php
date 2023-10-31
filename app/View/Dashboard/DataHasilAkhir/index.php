<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header pb-0">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: bolder;">Data Hasil Akhir</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <?php $cari_data = isset($_GET['cari_data']) ? $_GET['cari_data'] : null;
    $jumlah_data = isset($_GET['jumlah_data']) ? $_GET['jumlah_data'] : 10; ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="col-12 d-flex justify-content-end">
                        <div class="col-3 pl-0 d-flex justify-content-end">
                            <a href="<?= BASE_URL; ?>dashboard/hasil-akhir/cetak" class="btn btn-primary mb-3">Cetak</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead class="bg-danger">
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>Nilai</th>
                                        <th style="width: 150px;">Rangking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($response['data']['dataHasilAkhir'] as $key => $dataHasilAkhir) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $dataHasilAkhir['Nama']; ?></td>
                                            <td><?= $dataHasilAkhir['Nilai']; ?></td>
                                            <td><?= $dataHasilAkhir['Rangking']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->