<?php

use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataPenilaian;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Helpers\Helper;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataSubAlternatif;

$data_penilaian = new DataPenilaian;
$data_sub_alternatif = new DataSubAlternatif;
$helper = new Helper;
$cari_data = isset($_GET['cari_data']) ? $_GET['cari_data'] : null;
$jumlah_data = isset($_GET['jumlah_data']) ? $_GET['jumlah_data'] : 10;
$dataSubKriteria = $response['data']['dataSubkriteria'];
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
                                    foreach ($dataSubKriteria as $key => $data_sub_kriteria) {
                                        $id_kriteria[str_replace('data_', '', $key)] = $data_sub_kriteria[0]['Id_Kriteria'];
                                    }
                                    foreach ($response['data']['dataAlternatif'] as $key => $data_alternatif) :
                                        $dataPenilaian = $data_penilaian->getWithParamsAll('Id_Alternatif', $data_alternatif['Id_Alternatif']);
                                          
                                        foreach ($id_kriteria as $key => $kriteria) {
                                            $dataSubAlternatif[$key] = $data_sub_alternatif->getWithNilaiParams($kriteria, $data_alternatif['Id_Alternatif']);
                                        }
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
                                                                            <?php foreach ($dataSubAlternatif as $key => $sub_alternatif) : ?>
                                                                                <div class="form-group">
                                                                                    <label for="<?= $key?>"><?= str_replace('_', ' ', ucwords($key)) ?></label>
                                                                                    <select class="form-control" name="<?= $key?>" id="<?= $key?>" required>
                                                                                        <option value="">Pilih</option>
                                                                                        <!-- Fitur Baru -->
                                                                                        <?php foreach ($sub_alternatif as $key => $sub_kriteria) : ?>
                                                                                            <option value="<?= $sub_kriteria['Id_Sub_Alternatif'] ?>"><?= $sub_kriteria['Nama'] ?></option>
                                                                                        <?php endforeach; ?>
                                                                                    </select>
                                                                                </div>
                                                                            <?php endforeach; ?>
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
                                                                            <?php
                                                                                $index = 0;
                                                                                foreach ($dataSubAlternatif as $key => $sub_alternatif) : ?>
                                                                                <div class="form-group">
                                                                                    <label for="<?= $key?>"><?= str_replace('_', ' ', ucwords($key)) ?></label>
                                                                                    <select class="form-control" name="<?= $key?>" id="<?= $key?>" required>
                                                                                        <option value="">Pilih</option>
                                                                                        <!-- Fitur Baru -->
                                                                                        <?php
                                                                                        foreach ($sub_alternatif as $key => $sub_kriteria) :
                                                                                            ?> 
                                                                                            <option value="<?= $sub_kriteria['Id_Sub_Alternatif'] ?>" <?= isset($dataPenilaian[$index]['Id_Sub_Alternatif']) && $dataPenilaian[$index]['Id_Sub_Alternatif']  === $sub_kriteria['Id_Sub_Alternatif'] ? 'selected' : NULL ?>><?= $sub_kriteria['Nama'] ?></option>
                                                                                        <?php endforeach; ?>
                                                                                    </select>
                                                                                </div>
                                                                            <?php $index++; endforeach; ?>
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