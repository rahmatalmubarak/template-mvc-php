<?php

namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Controller;

use SistemPendukungKeputusan\UINIB\PHP\MVC\App\View;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Helpers\KriteriaHelper;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Helpers\Helper;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataAlternatif;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataKriteria;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataPenilaian;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataSubAlternatif;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataSubKriteria;

class PenilaianController{
    private $dataAlternatif;
    private $dataPenilaian;
    private $dataSubKriteria;
    private $helper;
    private $dataKriteria;
    private $dataSubAlternatif;

    public function __construct() {
        $this->dataAlternatif = new DataAlternatif;
        $this->dataPenilaian = new DataPenilaian;
        $this->helper = new Helper;
        $this->dataSubKriteria = new DataSubKriteria;
        $this->dataKriteria = new DataKriteria;
        $this->dataSubAlternatif = new DataSubAlternatif;
        if ($_SESSION['user']['Level'] != 'admin') {
            $this->helper->ResponseSession([], 'Kamu Tidak diizinkan Mengakses ini', true);
            header('Location: ' . BASE_URL . 'dashboard/profil');
            exit();
        }
    }

    public function index(){
        $data['title'] = 'Daftar Data Penilaian';
        $no = isset($_GET['page']) > 0 ? ($_GET['page'] *$_GET['jumlah_data'])+1 : 1;
        // Menampilkan semua data alternatif
        $count_result = $this->dataAlternatif->count_page();
        $data_alternatif = $this->dataAlternatif->all($_GET);
        
        // Menampilkan data sub kriteria
        $data_sub_kriteria = $this->dataSubKriteria->all();
        $sub_kriteria_split = $this->helper->sub_kriteria_split($data_sub_kriteria);

        if(isset($_GET['jumlah_data'])){
            $page = floor(count($count_result) / $_GET['jumlah_data']);
        }else{
            $page = floor(count($count_result) / 10);
        }

        if($data_alternatif){
            $result = [
                'dataAlternatif' => $data_alternatif,
                'dataNilaiRapor' => $sub_kriteria_split['data_nilai_rapor'],
                'dataMinatBakat' => $sub_kriteria_split['data_minat_bakat'],
                'dataPrestasiAkademik' => $sub_kriteria_split['data_prestasi_akademik'],
                'dataPenghasilanOrangTua' => $sub_kriteria_split['data_penghasilan_orang_tua'],
                'page' => $page,
                'no' => $no
            ];
            $response = $this->helper->ResponseData($result, "Data Berhasil Ditampilkan",false);
        }else{
            $result = [
                'dataAlternatif' => $data_alternatif,
                'dataNilaiRapor' => $sub_kriteria_split['data_nilai_rapor'],
                'dataMinatBakat' => $sub_kriteria_split['data_minat_bakat'],
                'dataPrestasiAkademik' => $sub_kriteria_split['data_prestasi_akademik'],
                'dataPenghasilanOrangTua' => $sub_kriteria_split['data_penghasilan_orang_tua'],
                'page' => $page,
                'no' => $no
            ];
            $response = $this->helper->ResponseData($result, "Data Berhasil Gagal",true);
        }
        View::render('Dashboard/Templates/header', $data);
        View::render('Dashboard/Templates/sidebar');
        View::render('Dashboard/DataPenilaian/index', $response);
        View::render('Dashboard/Templates/footer'); 
    }
    public function tambahPenilaian(){
        $id_alternatif = $_POST['id_alternatif'];
        unset($_POST['id_alternatif']);
        foreach ($_POST as $key => $sub_kriteria_id) {
            // Fitur Lama
            // $data_sub_kriteria = $this->dataSubKriteria->getWithParamsAll('Id_Sub_Kriteria', $sub_kriteria_id);

            // foreach ($data_sub_kriteria as $key => $sub_kriteria) {
            //     if($sub_kriteria['Id_Sub_Kriteria'] == $sub_kriteria_id){
            //         $sub_kriteria['Id_Alternatif'] = $id_alternatif;
            //         $result = $this->dataPenilaian->add($sub_kriteria);
            //     }
            // }

            // Fitur Baru 
            $data_sub_alternatif = $this->dataSubAlternatif->getWithParamsAll('Id_Sub_Alternatif', $sub_kriteria_id);

            foreach ($data_sub_alternatif as $key => $sub_alternatif) {
                if($sub_alternatif['Id_Sub_Alternatif'] == $sub_kriteria_id){
                    $sub_alternatif['Id_Alternatif'] = $id_alternatif;
                    $result = $this->dataPenilaian->addWithSubAlternatif($sub_alternatif);
                }
            }
        }
        // exit();
        if($result){
            $data_kriteria = $this->dataKriteria->count_page();
            $data_alternatif = $this->dataAlternatif->count_page();
            
            $matriks = $this->helper->perhitungan_matriks($data_alternatif, $data_kriteria);
            $this->helper->refresh_hasil_akhir($matriks);
            $this->helper->ResponseSession([],'Data Berhasil Ditambahkan', false);
            header('Location: ' . BASE_URL . 'dashboard/penilaian');
        }else{
            $this->helper->ResponseSession([],'Data Gagal Ditambahkan', true);
            header('Location: ' . BASE_URL . 'dashboard/penilaian/add');
        }
    }   

    public function ubahPenilaian(){
        $id_alternatif = $_POST['id_alternatif'];
        unset($_POST['id_alternatif']);
        $data_penilaian = $this->dataPenilaian->getWithParamsAll('Id_Alternatif', $id_alternatif); 
        foreach ($data_penilaian as $key => $penilaian) {
            // if(!in_array($penilaian['Id_Sub_Kriteria'],$_POST)){
            if(!in_array($penilaian['Id_Sub_Alternatif'],$_POST)){
                // $sub_kriteria = $this->dataSubKriteria->getWithParams('Id_Sub_Kriteria', $penilaian['Id_Sub_Kriteria']);
                $kriteria = $this->dataKriteria->getWithParams('Id_Kriteria', $penilaian['Id_Kriteria']);
                // switch ($kriteria['Nama_Kriteria']) {
                //     case 'Nilai Rapor':
                //         $sub_kriteria_new = $this->dataSubKriteria->getWithParams('Id_Sub_Kriteria', $_POST['nilai']);
                //         break;

                //     case 'Minat dan Bakat':
                //         $sub_kriteria_new = $this->dataSubKriteria->getWithParams('Id_Sub_Kriteria', $_POST['minat_bakat']);
                //         break;

                //     case 'Prestasi Akademik':
                //         $sub_kriteria_new = $this->dataSubKriteria->getWithParams('Id_Sub_Kriteria', $_POST['prestasi_akademik']);
                //         break;
                        
                //     case 'Penghasilan Orang Tua':
                //         $sub_kriteria_new = $this->dataSubKriteria->getWithParams('Id_Sub_Kriteria', $_POST['penghasilan_orang_tua']);
                //         break;
                //     }
                switch ($kriteria['Nama_Kriteria']) {
                    case 'Nilai Rapor':
                        $sub_kriteria_new = $this->dataSubAlternatif->getWithParams('Id_Sub_Alternatif', $_POST['nilai']);
                        break;

                    case 'Minat dan Bakat':
                        $sub_kriteria_new = $this->dataSubAlternatif->getWithParams('Id_Sub_Alternatif', $_POST['minat_bakat']);
                        break;

                    case 'Prestasi Akademik':
                        $sub_kriteria_new = $this->dataSubAlternatif->getWithParams('Id_Sub_Alternatif', $_POST['prestasi_akademik']);
                        break;
                        
                    case 'Penghasilan Orang Tua':
                        $sub_kriteria_new = $this->dataSubAlternatif->getWithParams('Id_Sub_Alternatif', $_POST['penghasilan_orang_tua']);
                        break;
                    }
                $sub_kriteria_new['Id_Penilaian'] = $penilaian['Id_Penilaian'];
                $result = $this->dataPenilaian->editWithSubAlternatif($sub_kriteria_new);
                
            }
        }
        
        if($result){
            $data_kriteria = $this->dataKriteria->count_page();
            $data_alternatif = $this->dataAlternatif->count_page();
            $matriks = $this->helper->perhitungan_matriks($data_alternatif, $data_kriteria);
            $this->helper->refresh_hasil_akhir($matriks);
            $this->helper->ResponseSession([], 'Data Berhasil Diupdate', false);
            header('Location: ' . BASE_URL . 'dashboard/penilaian');
        }else{
            $this->helper->ResponseSession([], 'Data Gagal Diupdate', true);
            header('Location: ' . BASE_URL . 'dashboard/penilaian');
        }
    }
}