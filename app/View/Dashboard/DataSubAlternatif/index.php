<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-12">
                    <h1 class="m-0" style="font-weight: bolder;"><?= $response['data']['title']; ?></h1>
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
                                    foreach ($response['data']['dataNilaiRapor'] as $key => $data_sub_alternatif) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data_sub_alternatif['Nama']; ?></td>
                                            <td><?= $data_sub_alternatif['Bobot']; ?></td>
                                            <td><?= $data_sub_alternatif['Nilai']; ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#modal-edit-nilai-rapor-<?= $data_sub_alternatif['Id_Sub_Alternatif']; ?>" class="btn btn-sm bg-warning"><i class="fas fa-pen"></i></button>
                                                <a href="<?= BASE_URL; ?>dashboard/alternatif/pembobotan/delete?id=<?= $data_sub_alternatif['Id_Sub_Alternatif']; ?>&alternatif=<?= $_GET['id']; ?>" class="badge bg-danger" style="padding: 10px;"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <!-- MODAL EDIT NILAI RAPOR -->
                                        <div class="modal fade show" id="modal-edit-nilai-rapor-<?= $data_sub_alternatif['Id_Sub_Alternatif']; ?>" aria-modal="true" role="dialog" style="color: black;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">+ Edit Nilai Rapor</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= BASE_URL; ?>dashboard/alternatif/pembobotan/edit/proses-edit-sub-alternatif" method="POST" id="data_sub_alternatif_edit">
                                                        <div class="modal-body">
                                                            <div class="card-body p-0">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <input type="text" name="id_alternatif" value="<?= $_GET['id']; ?>" hidden>
                                                                        <input type="text" value="<?= $data_sub_alternatif['Id_Sub_Alternatif']; ?>" name="id_sub_alternatif" hidden>
                                                                        <div class="form-group">
                                                                            <label for="nama">Nilai</label>
                                                                            <select class="form-control" name="nama" id="nama">
                                                                                <option value="0 – 50" <?php if ($data_sub_alternatif['Nama'] == '0 – 50') echo 'selected'; ?>>0 – 50</option>
                                                                                <option value="51– 65" <?php if ($data_sub_alternatif['Nama'] == '51– 65') echo 'selected'; ?>>51– 65</option>
                                                                                <option value="66 – 75" <?php if ($data_sub_alternatif['Nama'] == '66 – 75') echo 'selected'; ?>>66 – 75</option>
                                                                                <option value="76 – 85" <?php if ($data_sub_alternatif['Nama'] == '76 – 85') echo 'selected'; ?>>76 – 85</option>
                                                                                <option value="86 – 100" <?php if ($data_sub_alternatif['Nama'] == '86 – 100') echo 'selected'; ?>>86 – 100</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="bobot">Bobot</label>
                                                                            <input type="text" name="bobot" class="form-control" id="bobot" placeholder="Bobot" value="<?= $data_sub_alternatif['Bobot']; ?>" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="nilai">Nilai</label>
                                                                            <input type="text" name="nilai" class="form-control" id="nilai" placeholder="Nilai" value="<?= $data_sub_alternatif['Nilai']; ?>" required>
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
                                    foreach ($response['data']['dataMinatBakat'] as $key => $data_sub_alternatif) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data_sub_alternatif['Nama']; ?></td>
                                            <td><?= $data_sub_alternatif['Bobot']; ?></td>
                                            <td><?= $data_sub_alternatif['Nilai']; ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#modal-edit-minat-bakat-<?= $data_sub_alternatif['Id_Sub_Alternatif']; ?>" class="btn btn-sm bg-warning"><i class="fas fa-pen"></i></button>
                                                <a href="<?= BASE_URL; ?>dashboard/alternatif/pembobotan/delete?id=<?= $data_sub_alternatif['Id_Sub_Alternatif']; ?>&alternatif=<?= $_GET['id']; ?>" class="badge bg-danger" style="padding: 10px;"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <!-- MODAL EDIT MINAT BAKAT -->
                                        <div class="modal fade show" id="modal-edit-minat-bakat-<?= $data_sub_alternatif['Id_Sub_Alternatif']; ?>" aria-modal="true" role="dialog" style="color: black;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">+ Edit Minat Bakat</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= BASE_URL; ?>dashboard/alternatif/pembobotan/edit/proses-edit-sub-alternatif" method="POST" id="data_sub_alternatif_edit">
                                                        <div class="modal-body">
                                                            <div class="card-body p-0">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <input type="text" name="id_alternatif" value="<?= $_GET['id']; ?>" hidden>
                                                                        <input type="text" value="<?= $data_sub_alternatif['Id_Sub_Alternatif']; ?>" name="id_sub_alternatif" hidden>
                                                                        <div class="form-group">
                                                                            <label for="nama">Minat dan Bakat</label>
                                                                            <select class="form-control" name="nama" id="nama">
                                                                                <option value="Bahasa" <?php if ($data_sub_alternatif['Nama'] == 'Bahasa') echo 'selected'; ?>>Bahasa</option>
                                                                                <option value="Teknologi" <?php if ($data_sub_alternatif['Nama'] == 'Teknologi') echo 'selected'; ?>>Teknologi</option>
                                                                                <option value="Hukum" <?php if ($data_sub_alternatif['Nama'] == 'Hukum') echo 'selected'; ?>>Hukum</option>
                                                                                <option value="Agama" <?php if ($data_sub_alternatif['Nama'] == 'Agama') echo 'selected'; ?>>Agama</option>
                                                                                <option value="Pendidikan" <?php if ($data_sub_alternatif['Nama'] == 'Pendidikan') echo 'selected'; ?>>Pendidikan</option>
                                                                                <option value="Menajemen dan bisnis" <?php if ($data_sub_alternatif['Nama'] == 'Menajemen dan bisnis') echo 'selected'; ?>>Menajemen dan bisnis</option>
                                                                                <option value="Ekonomi" <?php if ($data_sub_alternatif['Nama'] == 'Ekonomi') echo 'selected'; ?>>Ekonomi</option>
                                                                                <option value="Matematika" <?php if ($data_sub_alternatif['Nama'] == 'Matematika') echo 'selected'; ?>>Matematika</option>
                                                                                <option value="Sejarah" <?php if ($data_sub_alternatif['Nama'] == 'Sejarah') echo 'selected'; ?>>Sejarah</option>
                                                                                <option value="Ilmu Kesejahteraan dan Pelayanan Sosial" <?php if ($data_sub_alternatif['Nama'] == 'Ilmu Kesejahteraan dan Pelayanan Sosial') echo 'selected'; ?>>Ilmu Kesejahteraan dan Pelayanan Sosial</option>
                                                                                <option value="Ilmu Sosial" <?php if ($data_sub_alternatif['Nama'] == 'Ilmu Sosial') echo 'selected'; ?>>Ilmu Sosial</option>
                                                                                <option value="Sains" <?php if ($data_sub_alternatif['Nama'] == 'Sains') echo 'selected'; ?>>Sains</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="bobot">Bobot</label>
                                                                            <input type="text" name="bobot" class="form-control" id="bobot" placeholder="Bobot" value="<?= $data_sub_alternatif['Bobot']; ?>" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="nilai">Nilai</label>
                                                                            <input type="text" name="nilai" class="form-control" id="nilai" placeholder="Nilai" value="<?= $data_sub_alternatif['Nilai']; ?>" required>
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
                                    foreach ($response['data']['dataPrestasiAkademik'] as $key => $data_sub_alternatif) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data_sub_alternatif['Nama']; ?></td>
                                            <td><?= $data_sub_alternatif['Bobot']; ?></td>
                                            <td><?= $data_sub_alternatif['Nilai']; ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#modal-edit-prestasi-akademik-<?= $data_sub_alternatif['Id_Sub_Alternatif']; ?>" class="btn btn-sm bg-warning"><i class="fas fa-pen"></i></button>
                                                <a href="<?= BASE_URL; ?>dashboard/alternatif/pembobotan/delete?id=<?= $data_sub_alternatif['Id_Sub_Alternatif']; ?>&alternatif=<?= $_GET['id']; ?>" class="badge bg-danger" style="padding: 10px;"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <!-- MODAL EDIT PRESTASI AKADEMIK -->
                                        <div class="modal fade show" id="modal-edit-prestasi-akademik-<?= $data_sub_alternatif['Id_Sub_Alternatif']; ?>" aria-modal="true" role="dialog" style="color: black;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">+ Edit Prestasi Akademik</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= BASE_URL; ?>dashboard/alternatif/pembobotan/edit/proses-edit-sub-alternatif" method="POST" id="data_sub_alternatif_edit">
                                                        <div class="modal-body">
                                                            <div class="card-body p-0">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <input type="text" name="id_alternatif" value="<?= $_GET['id']; ?>" hidden>
                                                                        <input type="text" value="<?= $data_sub_alternatif['Id_Sub_Alternatif']; ?>" name="id_sub_alternatif" hidden>
                                                                        <div class="form-group">
                                                                            <label for="nama">Prestasi Akademik</label>
                                                                            <select class="form-control" name="nama" id="nama">
                                                                                <option value="Juara Tingkat Nasional" <?php if ($data_sub_alternatif['Nama'] == 'Juara Tingkat Nasional') echo 'selected'; ?>>Juara Tingkat Nasional</option>
                                                                                <option value="Juara Tingkat Provinsi" <?php if ($data_sub_alternatif['Nama'] == 'Juara Tingkat Provinsi') echo 'selected'; ?>>Juara Tingkat Provinsi</option>
                                                                                <option value="Juara Tingkat Kabupaten/Kota" <?php if ($data_sub_alternatif['Nama'] == 'Juara Tingkat Kabupaten/Kota') echo 'selected'; ?>>Juara Tingkat Kabupaten/Kota</option>
                                                                                <option value="Juara Tingkat Sekolah" <?php if ($data_sub_alternatif['Nama'] == 'Juara Tingkat Sekolah') echo 'selected'; ?>>Juara Tingkat Sekolah</option>
                                                                                <option value="Tidak Ada" <?php if ($data_sub_alternatif['Nama'] == 'Tidak Ada') echo 'selected'; ?>>Tidak Ada</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="bobot">Bobot</label>
                                                                            <select class="form-control" name="bobot" id="bobot">
                                                                                <option value="-" <?php if ($data_sub_alternatif['Bobot'] == '-') echo 'selected'; ?>>-</option>
                                                                                <option value=">3" <?php if ($data_sub_alternatif['Bobot'] == '>3') echo 'selected'; ?>>>3</option>
                                                                                <option value="1-3" <?php if ($data_sub_alternatif['Bobot'] == '1-3') echo 'selected'; ?>>1-3</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="nilai">Nilai</label>
                                                                            <input type="text" name="nilai" class="form-control" id="nilai" placeholder="Nilai" value="<?= $data_sub_alternatif['Nilai']; ?>" required>
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
                                    foreach ($response['data']['dataPenghasilanOrangTua'] as $key => $data_sub_alternatif) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data_sub_alternatif['Nama']; ?></td>
                                            <td><?= $data_sub_alternatif['Bobot']; ?></td>
                                            <td><?= $data_sub_alternatif['Nilai']; ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#modal-edit-penghasilan-orang-tua-<?= $data_sub_alternatif['Id_Sub_Alternatif']; ?>" class="btn btn-sm bg-warning"><i class="fas fa-pen"></i></button>
                                                <a href="<?= BASE_URL; ?>dashboard/alternatif/pembobotan/delete?id=<?= $data_sub_alternatif['Id_Sub_Alternatif']; ?>&alternatif=<?= $_GET['id']; ?>" class="badge bg-danger" style="padding: 10px;"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <!-- MODAL EDIT PENGHASILAN ORANG TUA -->
                                        <div class="modal fade show" id="modal-edit-penghasilan-orang-tua-<?= $data_sub_alternatif['Id_Sub_Alternatif']; ?>" aria-modal="true" role="dialog" style="color: black;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">+ Edit Penghasilan Orang Tua</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= BASE_URL; ?>dashboard/alternatif/pembobotan/edit/proses-edit-sub-alternatif" method="POST" id="data_sub_alternatif_edit">
                                                        <div class="modal-body">
                                                            <div class="card-body p-0">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <input type="text" name="id_alternatif" value="<?= $_GET['id']; ?>" hidden>
                                                                        <input type="text" value="<?= $data_sub_alternatif['Id_Sub_Alternatif']; ?>" name="id_sub_alternatif" hidden>
                                                                        <div class="form-group">
                                                                            <label for="nama">Penghasilan Orang Tua</label>
                                                                            <select class="form-control" name="nama" id="nama">
                                                                                <option value="1.000.000 s/d 1.400.000" <?php if ($data_sub_alternatif['Id_Sub_Alternatif'] == '1.000.000 s/d 1.400.000') echo 'selected'; ?>>1.000.000 s/d 1.400.000</option>
                                                                                <option value="1.500.000 s/d 1.900.000" <?php if ($data_sub_alternatif['Id_Sub_Alternatif'] == '1.500.000 s/d 1.900.000') echo 'selected'; ?>>1.500.000 s/d 1.900.000</option>
                                                                                <option value="2.000.000 s/d 2.400.000" <?php if ($data_sub_alternatif['Id_Sub_Alternatif'] == '2.000.000 s/d 2.400.000') echo 'selected'; ?>>2.000.000 s/d 2.400.000</option>
                                                                                <option value="2.500.000 s/d 2.900.000" <?php if ($data_sub_alternatif['Id_Sub_Alternatif'] == '2.500.000 s/d 2.900.000') echo 'selected'; ?>>2.500.000 s/d 2.900.000</option>
                                                                                <option value="> 3.000.000" <?php if ($data_sub_alternatif['Id_Sub_Alternatif'] == '> 3.000.000') echo 'selected'; ?>>> 3.000.000</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="bobot">Bobot</label>
                                                                            <input type="text" name="bobot" class="form-control" id="bobot" placeholder="Bobot" value="<?= $data_sub_alternatif['Bobot']; ?>" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="nilai">Nilai</label>
                                                                            <input type="text" name="nilai" class="form-control" id="nilai" placeholder="Nilai" value="<?= $data_sub_alternatif['Nilai']; ?>" required>
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
            <form action="<?= BASE_URL; ?>dashboard/alternatif/pembobotan/add/proses-tambah-sub-alternatif" method="POST" id="data_sub_alternatif_add">
                <div class="modal-body">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <input type="text" name="id_alternatif" value="<?= $_GET['id']; ?>" hidden>
                                <input type="text" name="id_kriteria" value="27" hidden>
                                <div class="form-group">
                                    <label for="nama">Nilai</label>
                                    <select class="form-control" name="nama" id="nama">
                                        <option value="0 – 50">0 – 50</option>
                                        <option value="51– 65">51– 65</option>
                                        <option value="66 – 75">66 – 75</option>
                                        <option value="76 – 85">76 – 85</option>
                                        <option value="86 – 100">86 – 100</option>
                                    </select>
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
            <form action="<?= BASE_URL; ?>dashboard/alternatif/pembobotan/add/proses-tambah-sub-alternatif" method="POST" id="data_sub_alternatif_add">
                <div class="modal-body">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <input type="text" name="id_alternatif" value="<?= $_GET['id']; ?>" hidden>
                                <input type="text" name="id_kriteria" value="28" hidden>
                                <div class="form-group">
                                    <select class="form-control" name="nama" id="nama">
                                        <option value="Bahasa">Bahasa</option>
                                        <option value="Teknologi">Teknologi</option>
                                        <option value="Hukum">Hukum</option>
                                        <option value="Agama">Agama</option>
                                        <option value="Pendidikan">Pendidikan</option>
                                        <option value="Menajemen dan bisnis">Menajemen dan bisnis</option>
                                        <option value="Ekonomi">Ekonomi</option>
                                        <option value="Matematika">Matematika</option>
                                        <option value="Sejarah">Sejarah</option>
                                        <option value="Ilmu Kesejahteraan dan Pelayanan Sosial">Ilmu Kesejahteraan dan Pelayanan Sosial</option>
                                        <option value="Ilmu Sosial">Ilmu Sosial</option>
                                        <option value="Sains">Sains</option>
                                    </select>
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
            <form action="<?= BASE_URL; ?>dashboard/alternatif/pembobotan/add/proses-tambah-sub-alternatif" method="POST" id="data_sub_alternatif_add">
                <div class="modal-body">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <input type="text" name="id_alternatif" value="<?= $_GET['id']; ?>" hidden>
                                <input type="text" name="id_kriteria" value="29" hidden>
                                <div class="form-group">
                                    <label for="nama">Prestasi Akademik</label>
                                    <select class="form-control" name="nama" id="nama">
                                        <option value="Juara Tingkat Nasional">Juara Tingkat Nasional</option>
                                        <option value="Juara Tingkat Provinsi">Juara Tingkat Provinsi</option>
                                        <option value="Juara Tingkat Kabupaten/Kota">Juara Tingkat Kabupaten/Kota</option>
                                        <option value="Juara Tingkat Sekolah">Juara Tingkat Sekolah</option>
                                        <option value="Tidak Ada">Tidak Ada</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Bobot</label>
                                    <select class="form-control" name="bobot" id="bobot">
                                        <option value="-">-</option>
                                        <option value=">3">>3</option>
                                        <option value="1-3">1-3</option>
                                    </select>
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

<!-- MODAL TAMBAH PENGHASILAN ORANG TUA -->
<div class="modal fade show" id="modal-tambah-penghasilan-orang-tua" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">+ Tambah Penghasilan Orang Tua</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= BASE_URL; ?>dashboard/alternatif/pembobotan/add/proses-tambah-sub-alternatif" method="POST" id="data_sub_alternatif_add">
                <div class="modal-body">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <input type="text" name="id_alternatif" value="<?= $_GET['id']; ?>" hidden>
                                <input type="text" name="id_kriteria" value="31" hidden>
                                <div class="form-group">
                                    <label for="nama">Penghasilan Orang Tua</label>
                                    <select class="form-control" name="nama" id="nama">
                                        <option value="1.000.000 s/d 1.400.000">1.000.000 s/d 1.400.000</option>
                                        <option value="1.500.000 s/d 1.900.000">1.500.000 s/d 1.900.000</option>
                                        <option value="2.000.000 s/d 2.400.000">2.000.000 s/d 2.400.000</option>
                                        <option value="2.500.000 s/d 2.900.000">2.500.000 s/d 2.900.000</option>
                                        <option value="> 3.000.000">> 3.000.000</option>
                                    </select>
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