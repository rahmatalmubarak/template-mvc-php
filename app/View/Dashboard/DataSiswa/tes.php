<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <img src="<?= BASE_URL ?>img/logo_uin.jpg" alt="logo uin" style="display: block; float:left; width: 50px; height: auto">
    <h2 style="display: flex; width: 80%; justify-content: center; ">Laporan Hasil Rekomendasi Program Studi <?= $response["data"]["dataSiswa"]["Nama_Lengkap"]; ?><h2>
            <div style="font-size:15px;font-weight:normal">
                <div style="padding-top: 1rem">
                    <table>
                        <thead>
                            <tr class="font-weight-bold">
                                <td style="width: 5%;">Nama</td>
                                <td style="width: 90%;">: <?= $response["data"]["dataSiswa"]["Nama_Lengkap"]; ?></td>
                            </tr>
                            <tr class="font-weight-bold">
                                <td style="width: 5%;">Minat dan Bakat</td>
                                <td style="width: 90%;">: <?= $response["data"]["dataSiswa"]["dataSiswa"]["Minat_Bakat"] ?></td>
                            </tr>
                            <tr class="font-weight-bold">
                                <td style="width: 5%;">Prestasi Akademik</td>
                                <td style="width: 90%;">: <?= $response["data"]["dataSiswa"]["dataSiswa"]["Prestasi_Akademik"] ?></td>
                            </tr>
                            <tr class="font-weight-bold">
                                <td style="width: 5%;">Penghasilan Orang Tua</td>
                                <td style="width: 90%;">: <?= $response["data"]["dataSiswa"]["dataSiswa"]["Penghasilan_Ortu"] ?></td>
                        </thead>
                    </table>
                    <div>
                        <p>Berdasarkan hasil pertimbangan dari Nilai, Minat dan Bakat, Prestasi Akademik dan Penghasilan Orang Tua. Maka, Siswa yang bernama <?= $response["data"]["dataSiswa"]["Nama_Lengkap"]; ?> direkomendasikan untuk memilih program studi berikut untuk melanjutkan pendidikan ke perguruan tinggi.</p>
                    </div>
                    <div style="border-radius: .2rem!important">
                        <table style="width: 50%; border-collapse: collapse;">
                            <thead style="background-color: #78201a; color: white; text-align: center; border: 1px solid black;">
                                <tr class="font-weight-bold">
                                    <th style="width: 10%;height: 20px;">No</th>
                                    <th style="width: 80%;height: 20px;">Program Studi</th>
                                    <th style="width: 10%;height: 20px;">Point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($response["data"]["rekomendasiProdi"] as $key => $rekomendasi_prodi) :
                                ?>
                                    <tr>
                                        <td style="border: 1px solid black;"> <?= $no++ ?></td>
                                        <td style="border: 1px solid black;"> <?= $rekomendasi_prodi["Nama"]?></td>
                                        <td style="border: 1px solid black;"> <?= $response["data"]["nilaiAkhirSiswa"]?></td>
                                    </tr>;
                                    <tr>
                                        <td style="border: 1px solid black;"> <?= $no++ ?></td>
                                        <td style="border: 1px solid black;"> <?= $rekomendasi_prodi["Nama"]?></td>
                                        <td style="border: 1px solid black;"> <?= $response["data"]["nilaiAkhirSiswa"]?></td>
                                    </tr>;
                                    <tr>
                                        <td style="border: 1px solid black;"> <?= $no++ ?></td>
                                        <td style="border: 1px solid black;"> <?= $rekomendasi_prodi["Nama"]?></td>
                                        <td style="border: 1px solid black;"> <?= $response["data"]["nilaiAkhirSiswa"]?></td>
                                    </tr>;
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</body>

</html>