<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: bolder;">Data Perhitungan</h1>
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
                        <h5 style="font-weight: bold;">Matriks Keputusan (X)</h5>
                    </div>
                    <div class="card">
                        <div class="card-body table-responsive p-0 bg-danger" style="border-radius: 8px 8px 0 0;">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <?php $no = 1;
                                    foreach ($response['data']['matriksKeputusan'] as $key => $matriksKeputusan) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $matriksKeputusan['Nama']; ?></td>
                                            <?php foreach ($matriksKeputusan['Penilaian'] as $key => $penilaian) : ?>
                                                <td><?= $penilaian['Nilai']; ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="col-12" style="display: flex; justify-content: space-between; align-items: center;">
                        <h5 style="font-weight: bold;">Matriks Ternomalisasi (R)</h5>
                    </div>
                    <div class="card">
                        <div class="card-body table-responsive p-0 bg-danger" style="border-radius: 8px 8px 0 0;">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <?php $no = 1;
                                    foreach ($response['data']['matriksKeputusan'] as $key => $matriksKeputusan) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $matriksKeputusan['Nama']; ?></td>
                                            <?php foreach ($matriksKeputusan['Penilaian'] as $key => $penilaian) : ?>
                                                <td><?= $penilaian['Nilai_Ternormalisasi']; ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="col-12" style="display: flex; justify-content: space-between; align-items: center;">
                        <h5 style="font-weight: bold;">Bobot Preferensi (W)</h5>
                    </div>
                    <div class="card">
                        <div class="card-body table-responsive p-0 bg-danger" style="border-radius: 8px 8px 0 0;">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <tr>
                                        <td>1</td>
                                        <?php foreach ($response['data']['bobotPreferensi'] as $key => $bobot_preferensi) : ?>
                                            <td><?= $bobot_preferensi['Bobot_Kriteria']; ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="col-12" style="display: flex; justify-content: space-between; align-items: center;">
                        <h5 style="font-weight: bold;">Perhitungan</h5>
                    </div>
                    <div class="card">
                        <div class="card-body table-responsive p-0 bg-danger" style="border-radius: 8px 8px 0 0;">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>Perhitungan</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <?php $no = 1;
                                    foreach ($response['data']['matriksKeputusan'] as $key => $matriksKeputusan) : 
                                        $penilaian = $matriksKeputusan['Penilaian'];?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $matriksKeputusan['Nama']; ?></td>
                                            <td><?= '{'.
                                                    $penilaian[0]['Nilai_Ternormalisasi']. 'x' .$penilaian[0]['Bobot_Kriteria'] . '+'.
                                                    $penilaian[1]['Nilai_Ternormalisasi']. 'x' .$penilaian[1]['Bobot_Kriteria'] . '+'.
                                                    $penilaian[2]['Nilai_Ternormalisasi']. 'x' .$penilaian[2]['Bobot_Kriteria'] . '+'.
                                                    $penilaian[3]['Nilai_Ternormalisasi']. 'x' .$penilaian[3]['Bobot_Kriteria'] .
                                                    '}';
                                                ?>
                                            </td>
                                            <td><?= $matriksKeputusan['Nilai_Akhir']; ?></td>
                                        </tr>
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