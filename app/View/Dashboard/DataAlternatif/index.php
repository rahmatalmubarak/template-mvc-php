<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: bolder;">Data Alternatif</h1>
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
                    <div class="col-3 pl-0">
                        <a href="<?= BASE_URL; ?>dashboard/alternatif/add" class="btn btn-success mb-3">Tambah Alternatif</a>
                    </div>
                    <div class="card">
                        <div class="card-header bg-danger">
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
                                    <?php foreach ($response['data']['dataAlternatif'] as $key => $data_alternatif) : ?>
                                        <tr>
                                            <td><?= $response['data']['no']++ ?></td>
                                            <td><?= $data_alternatif['Nama']; ?></td>
                                            <td>
                                                <a href="<?= BASE_URL; ?>dashboard/alternatif/edit?id=<?= $data_alternatif['Id_Alternatif']; ?>" class="badge bg-warning" style="padding: 10px;"><i class="fas fa-pen"></i></a>
                                                <a href="<?= BASE_URL; ?>dashboard/alternatif/delete?id=<?= $data_alternatif['Id_Alternatif']; ?>" class="badge bg-danger" style="padding: 10px;"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php $page = $response['data']['page'];
                        $page_now = isset($_GET['page']) ? $_GET['page'] : NULL; ?>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <?php if ($page_now > 0) : ?>
                                    <li class="page-item"><a class="page-link" href="<?= BASE_URL; ?>dashboard/alternatif?jumlah_data=<?= $jumlah_data; ?>&cari_data=<?= $cari_data; ?>&page=<?= $page_now - 1; ?>">«</a></li>
                                <?php endif;
                                for ($i = 0; $i <= $page; $i++) : ?>
                                    <li class="page-item"><a class="page-link" href="<?= BASE_URL; ?>dashboard/alternatif?jumlah_data=<?= $jumlah_data; ?>&cari_data=<?= $cari_data; ?>&page=<?= $i; ?>"><?= $i + 1; ?></a></li>
                                <?php endfor;
                                if ($page > $page_now) : ?>
                                    <li class="page-item"><a class="page-link" href="<?= BASE_URL; ?>dashboard/alternatif?jumlah_data=<?= $jumlah_data; ?>&cari_data=<?= $cari_data; ?>&page=<?= $page_now + 1; ?>">»</a></li>
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