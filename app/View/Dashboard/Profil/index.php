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
              <h3 class="card-title">Edit Profil</h3>
            </div>
            <form action="<?= BASE_URL; ?>dashboard/profil/edit" method="POST" id="profile_edit" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">NISN</label>
                  <input type="text" name="nisn" class="form-control" id="nisn" value="<?= $response['data']['NISN']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" value="<?= $response['data']['Nama_Lengkap']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Asal Sekolah</label>
                  <input type="text" name="asal_sekolah" class="form-control" id="asal_sekolah" value="<?= $response['data']['Asal_Sekolah']; ?>">
                </div>
              </div>
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-2">
                    <div class="form-group">
                      <img src="<?= $response['data']['Foto'] != null ? BASE_URL . 'img/user/' . $response['data']['Foto'] :  BASE_URL . '/img/avatar.png' ?>" alt="" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-10">
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto">
                        <label class="custom-file-label" for="foto"><?= isset($response['data']['Foto']) ? $response['data']['Foto'] : 'Choose file' ?></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Edit Profil</button>
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