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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-danger">
                            <h3 class="card-title">Edit Data Alternatif</h3>
                        </div>
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
                        <form action="<?= BASE_URL; ?>dashboard/alternatif/edit/proses-edit-alternatif" method="POST" id="data_alternatif_add">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="text" name="id_alternatif" id="id_alternatif" value=" <?= $response['data']['alternatif']['Id_Alternatif']; ?>" hidden>
                                        <div class="form-group">
                                            <label for="nama">Alternatif</label>
                                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Alternatif" value="<?= $response['data']['alternatif']['Nama']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Ubah Alternatif</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->