<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0" style="font-weight: bolder;">Profil User</h1>
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
              <h3 class="card-title">Ubah Password</h3>
            </div>
            <form action="<?= BASE_URL; ?>dashboard/profil/ubah-password/edit" method="POST" id="ubah_password" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Password Lama</label>
                  <input type="password" name="password_lama" class="form-control" id="password_lama" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password Baru</label>
                  <input type="password" name="password_baru" class="form-control" id="password_baru" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Konfirmasi Password Baru</label>
                  <input type="password" name="konfirmasi_password_baru" class="form-control" id="konfirmasi_password_baru" required>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Ubah Password</button>
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