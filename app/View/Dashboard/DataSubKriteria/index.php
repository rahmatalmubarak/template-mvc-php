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
    $jumlah_data = isset($_GET['jumlah_data']) ? $_GET['jumlah_data'] : 10; ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="col-12" style="display: flex; justify-content: space-between; align-items: center;">
                        <h5 style="font-weight: bold;">Nilai Rapor</h5>
                        <button class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-tambah-nilai-rapor">Tambah</button>
                    </div>
                    <div class="card">
                        <div class="card-body table-responsive p-0 bg-danger" style="border-radius: 8px 8px 0 0;">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nilai</th>
                                        <th>Bobot</th>
                                        <th>Nilai</th>
                                        <th style="width: 150px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <?php $no = 1;
                                    foreach ($response['data']['dataNilaiRapor'] as $key => $data_sub_kriteria) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data_sub_kriteria['Nama']; ?></td>
                                            <td><?= $data_sub_kriteria['Bobot']; ?></td>
                                            <td><?= $data_sub_kriteria['Nilai']; ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#modal-edit-nilai-rapor-<?= $data_sub_kriteria['Id_Sub_Kriteria']; ?>" class="btn btn-sm bg-warning"><i class="fas fa-pen"></i></button>
                                                <a href="<?= BASE_URL; ?>dashboard/sub-kriteria/delete?id=<?= $data_sub_kriteria['Id_Sub_Kriteria']; ?>" class="badge bg-danger" style="padding: 10px;"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <!-- MODAL EDIT NILAI RAPOR -->
                                        <div class="modal fade show" id="modal-edit-nilai-rapor-<?= $data_sub_kriteria['Id_Sub_Kriteria']; ?>" aria-modal="true" role="dialog" style="color: black;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">+ Edit Nilai Rapor</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= BASE_URL; ?>dashboard/sub-kriteria/edit/proses-edit-sub-kriteria" method="POST" id="data_sub_kriteria_edit">
                                                        <div class="modal-body">
                                                            <div class="card-body p-0">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <select name="id_kriteria" id="id_kriteria" hidden>
                                                                            <?php foreach ($response['data']['dataKriteria'] as $key => $data_kriteria) :
                                                                                if ($data_kriteria['Nama_Kriteria'] == 'Nilai Rapor') : ?>
                                                                                    <option value="<?= $data_kriteria['Id_Kriteria'] ?>"><?= $data_kriteria['Nama_Kriteria'] ?></option>
                                                                            <?php endif;
                                                                            endforeach; ?>
                                                                        </select>
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
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="col-12" style="display: flex; justify-content: space-between; align-items: center;">
                        <h5 style="font-weight: bold;">Minat dan Bakat</h5>
                        <button class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-tambah-minat-bakat">Tambah</button>
                    </div>
                    <div class="card">
                        <div class="card-body table-responsive p-0 bg-danger" style="border-radius: 8px 8px 0 0;">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Minat dan Bakat</th>
                                        <th>Bobot</th>
                                        <th>Nilai</th>
                                        <th style="width: 150px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <?php $no = 1;
                                    foreach ($response['data']['dataMinatBakat'] as $key => $data_sub_kriteria) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data_sub_kriteria['Nama']; ?></td>
                                            <td><?= $data_sub_kriteria['Bobot']; ?></td>
                                            <td><?= $data_sub_kriteria['Nilai']; ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#modal-edit-minat-bakat-<?= $data_sub_kriteria['Id_Sub_Kriteria']; ?>" class="btn btn-sm bg-warning"><i class="fas fa-pen"></i></button>
                                                <a href="<?= BASE_URL; ?>dashboard/sub-kriteria/delete?id=<?= $data_sub_kriteria['Id_Sub_Kriteria']; ?>" class="badge bg-danger" style="padding: 10px;"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <!-- MODAL EDIT NILAI RAPOR -->
                                        <div class="modal fade show" id="modal-edit-minat-bakat-<?= $data_sub_kriteria['Id_Sub_Kriteria']; ?>" aria-modal="true" role="dialog" style="color: black;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">+ Edit Nilai Rapor</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= BASE_URL; ?>dashboard/sub-kriteria/edit/proses-edit-sub-kriteria" method="POST" id="data_sub_kriteria_edit">
                                                        <div class="modal-body">
                                                            <div class="card-body p-0">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <select name="id_kriteria" id="id_kriteria" hidden>
                                                                            <?php foreach ($response['data']['dataKriteria'] as $key => $data_kriteria) :
                                                                                if ($data_kriteria['Nama_Kriteria'] == 'Minat dan Bakat') : ?>
                                                                                    <option value="<?= $data_kriteria['Id_Kriteria'] ?>"><?= $data_kriteria['Nama_Kriteria'] ?></option>
                                                                            <?php endif;
                                                                            endforeach; ?>
                                                                        </select>
                                                                        <input type="text" value="<?= $data_sub_kriteria['Id_Sub_Kriteria']; ?>" name="id_sub_kriteria" hidden>
                                                                        <div class="form-group">
                                                                            <label for="nama">Minat dan Bakat</label>
                                                                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Minat dan Bakat" value="<?= $data_sub_kriteria['Nama']; ?>" required>
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
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="col-12" style="display: flex; justify-content: space-between; align-items: center;">
                        <h5 style="font-weight: bold;">Prestasi Akademik</h5>
                        <button class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-tambah-prestasi-akademik">Tambah</button>
                    </div>
                    <div class="card">
                        <div class="card-body table-responsive p-0 bg-danger" style="border-radius: 8px 8px 0 0;">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Prestasi Akademik</th>
                                        <th>Range</th>
                                        <th>Nilai</th>
                                        <th style="width: 150px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <?php $no = 1;
                                    foreach ($response['data']['dataPrestasiAkademik'] as $key => $data_sub_kriteria) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data_sub_kriteria['Nama']; ?></td>
                                            <td><?= $data_sub_kriteria['Bobot']; ?></td>
                                            <td><?= $data_sub_kriteria['Nilai']; ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#modal-edit-prestasi-akademik-<?= $data_sub_kriteria['Id_Sub_Kriteria']; ?>" class="btn btn-sm bg-warning"><i class="fas fa-pen"></i></button>
                                                <a href="<?= BASE_URL; ?>dashboard/sub-kriteria/delete?id=<?= $data_sub_kriteria['Id_Sub_Kriteria']; ?>" class="badge bg-danger" style="padding: 10px;"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <!-- MODAL EDIT NILAI RAPOR -->
                                        <div class="modal fade show" id="modal-edit-prestasi-akademik-<?= $data_sub_kriteria['Id_Sub_Kriteria']; ?>" aria-modal="true" role="dialog" style="color: black;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">+ Edit Nilai Rapor</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= BASE_URL; ?>dashboard/sub-kriteria/edit/proses-edit-sub-kriteria" method="POST" id="data_sub_kriteria_edit">
                                                        <div class="modal-body">
                                                            <div class="card-body p-0">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <select name="id_kriteria" id="id_kriteria" hidden>
                                                                            <?php foreach ($response['data']['dataKriteria'] as $key => $data_kriteria) :
                                                                                if ($data_kriteria['Nama_Kriteria'] == 'Prestasi Akademik') : ?>
                                                                                    <option value="<?= $data_kriteria['Id_Kriteria'] ?>"><?= $data_kriteria['Nama_Kriteria'] ?></option>
                                                                            <?php endif;
                                                                            endforeach; ?>
                                                                        </select>
                                                                        <input type="text" value="<?= $data_sub_kriteria['Id_Sub_Kriteria']; ?>" name="id_sub_kriteria" hidden>
                                                                        <div class="form-group">
                                                                            <label for="nama">Prestasi Akademik</label>
                                                                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Prestasi Akademik" value="<?= $data_sub_kriteria['Nama']; ?>" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="bobot">Range</label>
                                                                            <input type="text" name="bobot" class="form-control" id="bobot" placeholder="Range" value="<?= $data_sub_kriteria['Bobot']; ?>" required>
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
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="col-12" style="display: flex; justify-content: space-between; align-items: center;">
                        <h5 style="font-weight: bold;">Penghasilan Orang Tua</h5>
                        <button class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-tambah-penghasilan-orang-tua">Tambah</button>
                    </div>
                    <div class="card">
                        <div class="card-body table-responsive p-0 bg-danger" style="border-radius: 8px 8px 0 0;">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Penghasilan Orang Tua</th>
                                        <th>Bobot</th>
                                        <th>Nilai</th>
                                        <th style="width: 150px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <?php $no = 1;
                                    foreach ($response['data']['dataPenghasilanOrangTua'] as $key => $data_sub_kriteria) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data_sub_kriteria['Nama']; ?></td>
                                            <td><?= $data_sub_kriteria['Bobot']; ?></td>
                                            <td><?= $data_sub_kriteria['Nilai']; ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#modal-edit-penghasilan-orang-tua-<?= $data_sub_kriteria['Id_Sub_Kriteria']; ?>" class="btn btn-sm bg-warning"><i class="fas fa-pen"></i></button>
                                                <a href="<?= BASE_URL; ?>dashboard/sub-kriteria/delete?id=<?= $data_sub_kriteria['Id_Sub_Kriteria']; ?>" class="badge bg-danger" style="padding: 10px;"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <!-- MODAL EDIT NILAI RAPOR -->
                                        <div class="modal fade show" id="modal-edit-penghasilan-orang-tua-<?= $data_sub_kriteria['Id_Sub_Kriteria']; ?>" aria-modal="true" role="dialog" style="color: black;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">+ Edit Nilai Rapor</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= BASE_URL; ?>dashboard/sub-kriteria/edit/proses-edit-sub-kriteria" method="POST" id="data_sub_kriteria_edit">
                                                        <div class="modal-body">
                                                            <div class="card-body p-0">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <select name="id_kriteria" id="id_kriteria" hidden>
                                                                            <?php foreach ($response['data']['dataKriteria'] as $key => $data_kriteria) :
                                                                                if ($data_kriteria['Nama_Kriteria'] == 'Penghasilan Orang Tua') : ?>
                                                                                    <option value="<?= $data_kriteria['Id_Kriteria'] ?>"><?= $data_kriteria['Nama_Kriteria'] ?></option>
                                                                            <?php endif;
                                                                            endforeach; ?>
                                                                        </select>
                                                                        <input type="text" value="<?= $data_sub_kriteria['Id_Sub_Kriteria']; ?>" name="id_sub_kriteria" hidden>
                                                                        <div class="form-group">
                                                                            <label for="nama">Penghasilan Orang Tua</label>
                                                                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Penghasilan Orang Tua" value="<?= $data_sub_kriteria['Nama']; ?>" required>
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

<!-- MODAL TAMBAH NILAI RAPOR -->
<div class="modal fade show" id="modal-tambah-nilai-rapor" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">+ Tambah Nilai Rapor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= BASE_URL; ?>dashboard/sub-kriteria/add/proses-tambah-sub-kriteria" method="POST" id="data_sub_kriteria_add">
                <div class="modal-body">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <select name="id_kriteria" id="id_kriteria" hidden>
                                    <?php foreach ($response['data']['dataKriteria'] as $key => $data_kriteria) :
                                        if ($data_kriteria['Nama_Kriteria'] == 'Nilai Rapor') : ?>
                                            <option value="<?= $data_kriteria['Id_Kriteria'] ?>"><?= $data_kriteria['Nama_Kriteria'] ?></option>
                                    <?php endif;
                                    endforeach; ?>
                                </select>
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

<!-- MODAL TAMBAH MINAT DAN BAKAT -->
<div class="modal fade show" id="modal-tambah-minat-bakat" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">+ Tambah Minat dan Bakat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= BASE_URL; ?>dashboard/sub-kriteria/add/proses-tambah-sub-kriteria" method="POST" id="data_sub_kriteria_add">
                <div class="modal-body">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <select name="id_kriteria" id="id_kriteria" hidden>
                                    <?php foreach ($response['data']['dataKriteria'] as $key => $data_kriteria) :
                                        if ($data_kriteria['Nama_Kriteria'] == 'Minat dan Bakat') : ?>
                                            <option value="<?= $data_kriteria['Id_Kriteria'] ?>"><?= $data_kriteria['Nama_Kriteria'] ?></option>
                                    <?php endif;
                                    endforeach; ?>
                                </select>
                                <div class="form-group">
                                    <label for="nama">Minat dan Bakat</label>
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Minat dan Bakat" required>
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

<!-- MODAL TAMBAH PRESTASI AKADEMIK -->
<div class="modal fade show" id="modal-tambah-prestasi-akademik" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">+ Tambah Prestasi Akademik</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= BASE_URL; ?>dashboard/sub-kriteria/add/proses-tambah-sub-kriteria" method="POST" id="data_sub_kriteria_add">
                <div class="modal-body">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <select name="id_kriteria" id="id_kriteria" hidden>
                                    <?php foreach ($response['data']['dataKriteria'] as $key => $data_kriteria) :
                                        if ($data_kriteria['Nama_Kriteria'] == 'Prestasi Akademik') : ?>
                                            <option value="<?= $data_kriteria['Id_Kriteria'] ?>"><?= $data_kriteria['Nama_Kriteria'] ?></option>
                                    <?php endif;
                                    endforeach; ?>
                                </select>
                                <div class="form-group">
                                    <label for="nama">Nilai</label>
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nilai Rapor" required>
                                </div>
                                <div class="form-group">
                                    <label for="bobot">Range</label>
                                    <input type="text" name="bobot" class="form-control" id="bobot" placeholder="Range" required>
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

<!-- MODAL TAMBAH PRESTASI AKADEMIK -->
<div class="modal fade show" id="modal-tambah-penghasilan-orang-tua" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">+ Tambah Penghasilan Orang Tua</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= BASE_URL; ?>dashboard/sub-kriteria/add/proses-tambah-sub-kriteria" method="POST" id="data_sub_kriteria_add">
                <div class="modal-body">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <select name="id_kriteria" id="id_kriteria" hidden>
                                    <?php foreach ($response['data']['dataKriteria'] as $key => $data_kriteria) :
                                        if ($data_kriteria['Nama_Kriteria'] == 'Penghasilan Orang Tua') : ?>
                                            <option value="<?= $data_kriteria['Id_Kriteria'] ?>"><?= $data_kriteria['Nama_Kriteria'] ?></option>
                                    <?php endif;
                                    endforeach; ?>
                                </select>
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