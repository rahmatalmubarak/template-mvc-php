<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: bolder;">Data Sub Kriteria</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <?php $cari_data = isset($_GET['cari_data']) ? $_GET['cari_data'] : null;
    $jumlah_data = isset($_GET['jumlah_data']) ? $_GET['jumlah_data'] : 10;
    $dataKriteria = $response['data']['dataKriteria'];
    $dataSubKriteria = $response['data']['dataSubKriteria'];
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php foreach ($dataKriteria as $key => $kriteria) : ?>
                    <div class="col-12">
                        <div class="col-12" style="display: flex; justify-content: space-between; align-items: center;">
                            <h5 style="font-weight: bold;"><?= $kriteria['Nama_Kriteria'] ?></h5>
                            <button class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-tambah-<?= str_replace(' ', '-', strtolower($kriteria['Nama_Kriteria'])) ?>">Tambah</button>
                        </div>
                        <div class="card">
                            <div class="card-body table-responsive p-0 bg-danger" style="border-radius: 8px 8px 0 0;">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th><?= $kriteria['Nama_Kriteria'] ?></th>
                                            <th>Bobot</th>
                                            <th>Nilai</th>
                                            <th style="width: 150px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        <?php $no = 1;
                                        foreach ($dataSubKriteria['data_' . str_replace(' ', '_', strtolower($kriteria['Nama_Kriteria']))] as $key => $data_sub_kriteria) :
                                            if ($data_sub_kriteria['Id_Kriteria'] == $kriteria['Id_Kriteria']) :
                                        ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data_sub_kriteria['Nama']; ?></td>
                                                    <td><?= $data_sub_kriteria['Bobot']; ?></td>
                                                    <td><?= $data_sub_kriteria['Nilai']; ?></td>
                                                    <td>
                                                        <button data-toggle="modal" data-target="#modal-edit-<?= str_replace(' ', '-', strtolower($kriteria['Nama_Kriteria'])) . $data_sub_kriteria['Id_Sub_Kriteria']; ?>" class="btn btn-sm bg-warning"><i class="fas fa-pen"></i></button>
                                                        <a href="<?= BASE_URL; ?>dashboard/sub-kriteria/delete?id=<?= $data_sub_kriteria['Id_Sub_Kriteria']; ?>" class="badge bg-danger" style="padding: 10px;"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>

                                                <!-- MODAL EDIT NILAI RAPOR -->
                                                <div class="modal fade show" id="modal-edit-<?= str_replace(' ', '-', strtolower($kriteria['Nama_Kriteria'])) . $data_sub_kriteria['Id_Sub_Kriteria']; ?>" aria-modal="true" role="dialog" style="color: black;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">+ Edit <?= $kriteria['Nama_Kriteria'] ?></h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <form action="<?= BASE_URL; ?>dashboard/sub-kriteria/edit/proses-edit-sub-kriteria" method="POST" id="data_sub_kriteria_edit">
                                                                <div class="modal-body">
                                                                    <div class="card-body p-0">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <input name="id_kriteria" id="id_kriteria" value="<?= $kriteria['Id_Kriteria'] ?>" hidden>
                                                                                <input type="text" value="<?= $data_sub_kriteria['Id_Sub_Kriteria']; ?>" name="id_sub_kriteria" hidden>
                                                                                <div class="form-group">
                                                                                    <label for="nama">Nilai</label>
                                                                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nilai Rapor" value="<?= $data_sub_kriteria['Nama']; ?>" required>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="bobot">Bobot</label>
                                                                                    <input type="text" name="bobot" class="form-control" id="bobot" placeholder="Bobot" value="<?= $data_sub_kriteria['Bobot']; ?>" required>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="nilai">Nilai</label>
                                                                                    <input type="text" name="nilai" class="form-control" id="nilai" placeholder="Nilai" value="<?= $data_sub_kriteria['Nilai']; ?>" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php endif;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- MODAL TAMBAH NILAI RAPOR -->

<?php foreach ($dataKriteria as $key => $kriteria) :
?>

    <div class="modal fade show" id="modal-tambah-<?= str_replace(' ', '-', strtolower($kriteria['Nama_Kriteria'])) ?>" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">+ Tambah <?php $kriteria['Nama_Kriteria'] ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= BASE_URL; ?>dashboard/sub-kriteria/add/proses-tambah-sub-kriteria" method="POST" id="data_sub_kriteria_add">
                    <div class="modal-body">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <input name="id_kriteria" id="id_kriteria" value="<?= $kriteria['Id_Kriteria'] ?>" hidden>
                                    <div class="form-group">
                                        <label for="nama">Nilai</label>
                                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nilai Rapor" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="bobot">Bobot</label>
                                        <input type="text" name="bobot" class="form-control" id="bobot" placeholder="Bobot" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nilai">Nilai</label>
                                        <input type="text" name="nilai" class="form-control" id="nilai" placeholder="Nilai" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>