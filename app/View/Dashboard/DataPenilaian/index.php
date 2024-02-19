<?php

use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataPenilaian;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Helpers\Helper;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataSubAlternatif;

$data_penilaian = new DataPenilaian;
$data_sub_alternatif = new DataSubAlternatif;
$helper = new Helper;
$cari_data = isset($_GET['cari_data']) ? $_GET['cari_data'] : null;
$jumlah_data = isset($_GET['jumlah_data']) ? $_GET['jumlah_data'] : 10;

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: bolder;">Data Penilaian</h1>
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
                    <div class="card">
                        <div class="card-header bg-danger">
                            <?php if (isset($_SESSION['response'])) : ?>
                                <script>
                                    let message = '<?= $_SESSION['response']['message'] ?>';
                                    let is_error = '<?= $_SESSION['response']['error'] ?>' == 'true' ? true : false;
                                    Swal.fire(
                                        'Alert!',
                                        message,
                                        is_error ? 'error' : 'success',
                                    )
                                </script>
                            <?php unset($_SESSION['response']);
                            endif; ?>
                            <form action="<?= BASE_URL; ?>dashboard/alternatif" method="GET">
                                <div style="display: flex; align-items: center; justify-content: space-between;">
                                    <div style="display: flex;gap: 5px; align-items: center; ">
                                        <h3 class="card-title">Show</h3>
                                        <select class="form-control-sm" name="jumlah_data" id="jumlah_data">
                                            <option value="10" <?= $jumlah_data == 10 ? 'selected' : NULL ?>>10</option>
                                            <option value="20" <?= $jumlah_data == 20 ? 'selected' : NULL ?>>20</option>
                                            <option value="50" <?= $jumlah_data == 50 ? 'selected' : NULL ?>>50</option>
                                            <option value="100" <?= $jumlah_data == 100 ? 'selected' : NULL ?>>100</option>
                                        </select>
                                        <h3 class="card-title">entries</h3>
                                    </div>
                                    <div>
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="cari_data" class="form-control float-right" placeholder="Search" value="<?= $cari_data ? $cari_data : NULL ?>">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th style="width: 150px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $id_kriteria_rapor = $response['data']['dataNilaiRapor'][0]['Id_Kriteria'];
                                    $id_kriteria_minat_bakat = $response['data']['dataMinatBakat'][0]['Id_Kriteria'];
                                    $id_kriteria_prestasi = $response['data']['dataPrestasiAkademik'][0]['Id_Kriteria'];
                                    $id_kriteria_penghasilan = $response['data']['dataPenghasilanOrangTua'][0]['Id_Kriteria'];

                                    foreach ($response['data']['dataAlternatif'] as $key => $data_alternatif) :
                                        $dataPenilaian = $data_penilaian->getWithParamsAll('Id_Alternatif', $data_alternatif['Id_Alternatif']);

                                        // Rapor
                                        $dataSubAlternatifRapor = $data_sub_alternatif->getWithNilaiParams($id_kriteria_rapor, $data_alternatif['Id_Alternatif']);

                                        // Minat Bakat
                                        $dataSubAlternatifMinatBakat = $data_sub_alternatif->getWithNilaiParams($id_kriteria_minat_bakat, $data_alternatif['Id_Alternatif']);

                                        // Prestasi Akademik
                                        $dataSubAlternatifPrestasiAkademik = $data_sub_alternatif->getWithNilaiParams($id_kriteria_prestasi, $data_alternatif['Id_Alternatif']);

                                        // Penghasilan Orang Tua
                                        $dataSubAlternatifPenghasilanOrangTua = $data_sub_alternatif->getWithNilaiParams($id_kriteria_penghasilan, $data_alternatif['Id_Alternatif']);
                                    ?>
                                        <tr>
                                            <td><?= $response['data']['no']++ ?></td>
                                            <td><?= $data_alternatif['Nama']; ?></td>
                                            <td>
                                                <?php if (!$dataPenilaian) : ?>
                                                    <button data-toggle="modal" data-target="#modal-tambah-penilaian-<?= $data_alternatif['Id_Alternatif'] ?>" class="btn btn-sm bg-success"><i class="fas fa-plus"></i></button>
                                                <?php else : ?>
                                                    <button data-toggle="modal" data-target="#modal-edit-penilaian-<?= $data_alternatif['Id_Alternatif']; ?>" class="btn btn-sm bg-warning"><i class="fas fa-pen"></i></button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php
                                        if (!$dataPenilaian) :
                                        ?>
                                            <!-- MODAL TAMBAH -->
                                            <div class="modal fade show" id="modal-tambah-penilaian-<?= $data_alternatif['Id_Alternatif'] ?>" aria-modal="true" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">+ Input Penilaian</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <form action="<?= BASE_URL; ?>dashboard/penilaian/add/proses-tambah-penilaian" method="POST" id="data_penilaian_add">
                                                            <div class="modal-body">
                                                                <div class="card-body p-0">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <input type="text" name="id_alternatif" value="<?= $data_alternatif['Id_Alternatif'] ?>" hidden>
                                                                            <div class="form-group">
                                                                                <label for="nilai">Nilai</label>
                                                                                <select class="form-control" name="nilai" id="nilai" required>
                                                                                    <option value="">Pilih</option>
                                                                                    <!-- Fitur Lama -->
                                                                                    <!-- <?php foreach ($response['data']['dataNilaiRapor'] as $key => $sub_kriteria) : ?>
                                                                                        <option value="<?= $sub_kriteria['Id_Sub_Kriteria'] ?>"><?= $sub_kriteria['Nama'] ?></option>
                                                                                    <?php endforeach; ?> -->

                                                                                    <!-- Fitur Baru -->
                                                                                    <?php foreach ($dataSubAlternatifRapor as $key => $sub_kriteria) : ?>
                                                                                        <option value="<?= $sub_kriteria['Id_Sub_Alternatif'] ?>"><?= $sub_kriteria['Nama'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="minat_bakat">Minat dan Bakat</label>
                                                                                <select class="form-control" name="minat_bakat" id="minat_bakat" required>
                                                                                    <option value="">Pilih</option>
                                                                                    <!-- Fitur Lama -->
                                                                                    <!-- <?php foreach ($response['data']['dataMinatBakat'] as $key => $sub_kriteria) : ?>
                                                                                        <option value="<?= $sub_kriteria['Id_Sub_Kriteria'] ?>"><?= $sub_kriteria['Nama'] ?></option>
                                                                                    <?php endforeach; ?> -->

                                                                                    <!-- Fitur Baru -->
                                                                                    <?php foreach ($dataSubAlternatifMinatBakat as $key => $sub_kriteria) : ?>
                                                                                        <option value="<?= $sub_kriteria['Id_Sub_Alternatif'] ?>"><?= $sub_kriteria['Nama'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="prestasi_akademik">Prestasi Akademik</label>
                                                                                <select class="form-control" name="prestasi_akademik" id="prestasi_akademik" required>
                                                                                    <option value="">Pilih</option>
                                                                                    <!-- Fitur Lama -->
                                                                                    <!-- <?php foreach ($response['data']['dataPrestasiAkademik'] as $key => $sub_kriteria) : ?>
                                                                                        <option value="<?= $sub_kriteria['Id_Sub_Kriteria'] ?>"><?= $sub_kriteria['Nama'] . " " . $sub_kriteria['Bobot'] ?></option>
                                                                                    <?php endforeach; ?> -->

                                                                                    <!-- Fitur Baru -->
                                                                                    <?php foreach ($dataSubAlternatifPrestasiAkademik as $key => $sub_kriteria) : ?>
                                                                                        <option value="<?= $sub_kriteria['Id_Sub_Alternatif'] ?>"><?= $sub_kriteria['Nama'] . " " . $sub_kriteria['Bobot'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="penghasilan_orang_tua">Penghasilan Orang Tua</label>
                                                                                <select class="form-control" name="penghasilan_orang_tua" id="penghasilan_orang_tua" required>
                                                                                    <option value="">Pilih</option>
                                                                                    <!-- Fitur Lama -->
                                                                                    <!-- <?php foreach ($response['data']['dataPenghasilanOrangTua'] as $key => $sub_kriteria) : ?>
                                                                                        <option value="<?= $sub_kriteria['Id_Sub_Kriteria'] ?>"><?= $sub_kriteria['Nama'] ?></option>
                                                                                    <?php endforeach; ?> -->

                                                                                    <!-- Fitur Baru -->
                                                                                    <?php foreach ($dataSubAlternatifPenghasilanOrangTua as $key => $sub_kriteria) : ?>
                                                                                        <option value="<?= $sub_kriteria['Id_Sub_Alternatif'] ?>"><?= $sub_kriteria['Nama'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
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
                                        <?php else : ?>
                                            <!-- MODAL EDIT -->
                                            <div class="modal fade show" id="modal-edit-penilaian-<?= $data_alternatif['Id_Alternatif'] ?>" aria-modal="true" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Penilaian</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <form action="<?= BASE_URL; ?>dashboard/penilaian/edit/proses-edit-penilaian" method="POST" id="data_penilaian_edit">
                                                            <div class="modal-body">
                                                                <div class="card-body p-0">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <input type="text" name="id_alternatif" value="<?= $data_alternatif['Id_Alternatif'] ?>" hidden>
                                                                            <div class="form-group">
                                                                                <label for="nilai">Nilai</label>
                                                                                <select class="form-control" name="nilai" id="nilai" required>
                                                                                    <option value="">Pilih</option>
                                                                                    <!-- Fitur Baru -->
                                                                                    <?php foreach ($dataSubAlternatifRapor as $key => $sub_kriteria) : ?>
                                                                                        <option value="<?= $sub_kriteria['Id_Sub_Alternatif'] ?>" <?= isset($dataPenilaian[0]['Id_Sub_Alternatif']) && $dataPenilaian[0]['Id_Sub_Alternatif']  == $sub_kriteria['Id_Sub_Alternatif'] ? 'selected' : NULL; ?>><?= $sub_kriteria['Nama'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="minat_bakat">Minat dan Bakat</label>
                                                                                <select class="form-control" name="minat_bakat" id="minat_bakat" required>
                                                                                    <option value="">Pilih</option>
                                                                                    <!-- Fitur Baru -->
                                                                                    <?php foreach ($dataSubAlternatifMinatBakat as $key => $sub_kriteria) : ?>
                                                                                        <option value="<?= $sub_kriteria['Id_Sub_Alternatif'] ?>" <?= isset($dataPenilaian[1]['Id_Sub_Alternatif']) && $dataPenilaian[1]['Id_Sub_Alternatif']  == $sub_kriteria['Id_Sub_Alternatif'] ? 'selected' : NULL; ?>><?= $sub_kriteria['Nama'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="prestasi_akademik">Prestasi Akademik</label>
                                                                                <select class="form-control" name="prestasi_akademik" id="prestasi_akademik" required>
                                                                                    <option value="">Pilih</option>
                                                                                    <!-- Fitur Baru -->
                                                                                    <?php foreach ($dataSubAlternatifPrestasiAkademik as $key => $sub_kriteria) : ?>
                                                                                        <option value="<?= $sub_kriteria['Id_Sub_Alternatif'] ?>" <?= isset($dataPenilaian[2]['Id_Sub_Alternatif']) && $dataPenilaian[2]['Id_Sub_Alternatif']  == $sub_kriteria['Id_Sub_Alternatif'] ? 'selected' : NULL; ?>><?= $sub_kriteria['Nama'] . ' ' . $sub_kriteria['Bobot']?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="penghasilan_orang_tua">Penghasilan Orang Tua</label>
                                                                                <select class="form-control" name="penghasilan_orang_tua" id="penghasilan_orang_tua" required>
                                                                                    <option value="">Pilih</option>
                                                                                    <!-- Fitur Baru -->
                                                                                    <?php foreach ($dataSubAlternatifPenghasilanOrangTua as $key => $sub_kriteria) : ?>
                                                                                        <option value="<?= $sub_kriteria['Id_Sub_Alternatif'] ?>" <?= isset($dataPenilaian[3]['Id_Sub_Alternatif']) && $dataPenilaian[3]['Id_Sub_Alternatif']  == $sub_kriteria['Id_Sub_Alternatif'] ? 'selected' : NULL; ?>><?= $sub_kriteria['Nama'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
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
                        <?php $page = $response['data']['page'];
                        $page_now = isset($_GET['page']) ? $_GET['page'] : NULL; ?>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <?php if ($page_now > 0) : ?>
                                    <li class="page-item"><a class="page-link" href="<?= BASE_URL; ?>dashboard/penilaian?jumlah_data=<?= $jumlah_data; ?>&cari_data=<?= $cari_data; ?>&page=<?= $page_now - 1; ?>">«</a></li>
                                <?php endif;
                                for ($i = 0; $i <= $page; $i++) : ?>
                                    <li class="page-item"><a class="page-link" href="<?= BASE_URL; ?>dashboard/penilaian?jumlah_data=<?= $jumlah_data; ?>&cari_data=<?= $cari_data; ?>&page=<?= $i; ?>"><?= $i + 1; ?></a></li>
                                <?php endfor;
                                if ($page > $page_now) : ?>
                                    <li class="page-item"><a class="page-link" href="<?= BASE_URL; ?>dashboard/penilaian?jumlah_data=<?= $jumlah_data; ?>&cari_data=<?= $cari_data; ?>&page=<?= $page_now + 1; ?>">»</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->