<?php

namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Controller;

use SistemPendukungKeputusan\UINIB\PHP\MVC\App\View;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Helpers\Helper;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataAlternatif;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataKriteria;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataPerhitungan;

class HasilAkhirController{
    private $dataPerhitungan;
    private $dataAlternatif;
    private $helper;
    private $dataKriteria;

    public function __construct() {
        $this->dataPerhitungan = new DataPerhitungan;
        $this->dataAlternatif = new DataAlternatif;
        $this->dataKriteria = new DataKriteria;
        $this->helper = new Helper;
        if ($_SESSION['user']['Level'] != 'admin') {
            $this->helper->ResponseSession([], 'Kamu Tidak diizinkan Mengakses ini', true);
            header('Location: ' . BASE_URL . 'dashboard/profil');
            exit();
        }
    }

    public function index(){
        $data['title'] = 'Daftar Hasil Akhir';
        $data_kriteria = $this->dataKriteria->count_page();
        $data_alternatif = $this->dataAlternatif->count_page();

        $matriks = $this->helper->perhitungan_matriks($data_alternatif, $data_kriteria);
        $this->helper->refresh_hasil_akhir($matriks);

        $data_perhitungan = $this->dataPerhitungan->rangking();
        $rangking = 1;
        foreach ($data_perhitungan as $key => $perhitungan) {
            $data_perhitungan[$key]['Rangking'] = $rangking++; 
        }
        
        if($data_perhitungan){
            $result = [
                'dataHasilAkhir' => $data_perhitungan
            ];
            $response = $this->helper->ResponseData($result, "Data Berhasil Ditampilkan",false);
        }else{
            $result = [
                'dataHasilAkhir' => $data_perhitungan   
            ];
            $response = $this->helper->ResponseData($result, "Data Berhasil Gagal",true);
        }
        View::render('Dashboard/Templates/header', $data);
        View::render('Dashboard/Templates/sidebar');
        View::render('Dashboard/DataHasilAkhir/index', $response);
        View::render('Dashboard/Templates/footer'); 
    }

    public function cetakHasilAkhir(){

        $data_perhitungan = $this->dataPerhitungan->rangking();
        $rangking = 1;
        foreach ($data_perhitungan as $key => $perhitungan) {
            $alternatif = $this->dataAlternatif->getWithParams('Id_Alternatif', $perhitungan['Id_Alternatif']);
            $data_perhitungan[$key]['Alternatif'] = $alternatif;
            $data_perhitungan[$key]['Rangking'] = $rangking++;
        }

        $html = "<html>
                <h2 style='text-align: center;'>Hasil Akhir Alternatif<h2>
                <table style='display: table;
                                box-sizing: border-box;
                                text-indent: initial;
                                border-spacing: 2px;
                                width: 100%;
                                border-color: gray;
                                border-collapse: collapse;'>
                                <thead style='background-color: #dc3545!important;'>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>Nilai</th>
                                        <th style='width: 150px;'>Rangking</th>
                                    </tr>
                                </thead>
                                <tbody>";
            $tr='';
            $no = 1;
            foreach ( $data_perhitungan  as $key => $data_perhitungan) {
                $tr .= "<tr style='border: 1px solid #dddddd;'>
                <td style='border: 1px solid #dddddd;text-align: center;'>". $no++. "</td>
                <td style='border: 1px solid #dddddd;'>". $data_perhitungan['Alternatif']['Nama']. "</td>
                <td style='border: 1px solid #dddddd;text-align: center;s'>". $data_perhitungan['Nilai']. "</td>
                <td style='border: 1px solid #dddddd;text-align: center;'>". $data_perhitungan['Rangking']. "</td>
                </tr>";
            }

        $html .= $tr . "</tbody></table></html>";
        $nama_file = 'Laporan Hasil Akhir Alternatif ' . random_int(0, 9999);
        $this->helper->cetak_pdf($html, $nama_file);
    }
}