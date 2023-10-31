<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: bolder;">Data Kriteria</h1>
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
                            <h3 class="card-title">Tambah Data Kriteria</h3>
                        </div>
                        <form action="<?= BASE_URL; ?>dashboard/kriteria/add/proses-tambah-kriteria" method="POST" id="data_kriteria_add">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 mr-5">
                                        <div class="form-group">
                                            <label for="kode_kriteria">Kode Kriteria</label>
                                            <input type="text" name="kode_kriteria" class="form-control" id="kode_kriteria" placeholder="Kode Kriteria" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="bobot_kriteria">Bobot Kriteria</label>
                                            <input type="text" name="bobot_kriteria" class="form-control" id="bobot_kriteria" placeholder="Bobot Kriteria" required>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label for="nama_kriteria">Nama Kriteria</label>
                                            <input type="text" name="nama_kriteria" class="form-control" id="nama_kriteria" placeholder="Nama Kriteria" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kriteria">Jenis Kriteria</label>
                                            <select class="form-control" name="jenis_kriteria" id="jenis_kriteria" required>
                                                <option value="">Pilih</option>
                                                <option value="Benefit">Benefit</option>
                                                <option value="Cost">Cost</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tambah Kriteria</button>
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