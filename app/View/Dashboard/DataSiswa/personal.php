<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0" style="font-weight: bolder;">Data Siswa</h1>
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
              <h3 class="card-title">Data Siswa</h3>
            </div>
            <form action="<?= BASE_URL; ?>dashboard/profil/data-siswa/edit" method="POST" id="data_siswa_edit">
              <div class="card-body">
                <input type="text" name="id_user" value="<?= $response['data']['userData']['Id_User']; ?>" hidden>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Siswa</label>
                  <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" value="<?= $response['data']['userData']['Nama_Lengkap']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">NISN</label>
                  <input type="text" name="nisn" class="form-control" id="nisn" value="<?= $response['data']['userData']['NISN']; ?>">
                </div>
              </div>
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nilai Rapor</label>
                      <input type="number" name="nilaix_xmti" class="nilai form-control" id="nilaix_xmti" value="<?= $response['data']['dataSiswaData']['NilaiX_SmtI'] ?? null; ?>" placeholder="Nilai Kelas X Semester 1" required>
                    </div>
                    <div class="form-group">
                      <input type="number" name="nilaix_xmtii" class="nilai form-control" id="nilaix_xmtii" value="<?= $response['data']['dataSiswaData']['NilaiX_SmtII'] ?? null; ?>" placeholder="Nilai Kelas X Semester 2" required>
                    </div>
                    <div class="form-group">
                      <input type="number" name="nilaix_ximti" class="nilai form-control" id="nilaix_ximti" value="<?= $response['data']['dataSiswaData']['NilaiXI_SmtI'] ?? null; ?>" placeholder="Nilai Kelas XI Semester 1" required>
                    </div>
                    <div class="form-group">
                      <input type="number" name="nilaix_ximtii" class="nilai form-control" id="nilaix_ximtii" value="<?= $response['data']['dataSiswaData']['NilaiXI_SmtII'] ?? null; ?>" placeholder="Nilai Kelas XI Semester 2" required>
                    </div>
                    <div class="form-group">
                      <input type="number" name="nilaix_xiimti" class="nilai form-control" id="nilaix_xiimti" value="<?= $response['data']['dataSiswaData']['NilaiXII_SmtI'] ?? null; ?>" placeholder="Nilai Kelas XII Semester 1" required>
                    </div>
                    <div class="form-group">
                      <input type="number" name="nilaix_xiimtii" class="nilai form-control" id="nilaix_xiimtii" value="<?= $response['data']['dataSiswaData']['NilaiXII_SmtII'] ?? null; ?>" placeholder="Nilai Kelas XII Semester 2" required>
                    </div>
                    <div class="form-group">
                      <label for="nilai_rapor">Nilai Rata-rata</label>
                      <input type="number" name="nilai_rapor" class="nilai form-control" id="nilai_rapor" value="<?= $response['data']['dataSiswaData']['Nilai_Rapor'] ?? null; ?>" placeholder="Nilai Rapor" step="any" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Minat dan Bakat</label>
                      <select class="form-control" name="minat_bakat" id="minat_bakat" required>
                        <option value="">Pilih</option>
                        <?php 
                            foreach ($response['data']['dataKriteria']['data_minat_dan_bakat'] as $key => $data_minat_bakat) :
                            ?>
                            <option value="<?= $data_minat_bakat['Nama']?>" <?php if(isset($response['data']['dataSiswaData']['Minat_Bakat']) && $data_minat_bakat['Nama'] == $response['data']['dataSiswaData']['Minat_Bakat']) echo 'selected' ?>><?= $data_minat_bakat['Nama']?></option>
                        <?php endforeach;?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Prestasi Akademik</label>
                      <select class="form-control" name="prestasi_akademik" id="prestasi_akademik" required>
                        <option value="">Pilih</option>
                        <?php foreach ($response['data']['dataPrestasiAkademik'] as $key => $prestasiAkademik) : ?>
                          <option value="<?= $prestasiAkademik['Nama'] ?>" <?= isset($response['data']['dataSiswaData']['Prestasi_Akademik']) && $prestasiAkademik['Nama'] == $response['data']['dataSiswaData']['Prestasi_Akademik'] ? 'selected' : NULL; ?>><?= $prestasiAkademik['Nama'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Penghasilan Orang Tua</label>
                      <select class="form-control" name="penghasilan_orang_tua" id="penghasilan_orang_tua" required>
                        <option value="">Pilih</option>
                        <?php 
                            foreach ($response['data']['dataKriteria']['data_penghasilan_orang_tua'] as $key => $data_penghasilan_orang_tua) :
                            ?>
                            <option value="<?= $data_penghasilan_orang_tua['Nama']?>" <?php if(isset($response['data']['dataSiswaData']['Penghasilan_Ortu']) && $data_penghasilan_orang_tua['Nama'] == $response['data']['dataSiswaData']['Penghasilan_Ortu']) echo 'selected' ?>><?= $data_penghasilan_orang_tua['Nama']?></option>
                        <?php endforeach;?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Hasil</button>
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