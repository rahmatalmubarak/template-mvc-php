<?php

namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Controller;

use SistemPendukungKeputusan\UINIB\PHP\MVC\App\View;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Helpers\Helper;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataAlternatif;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataKlasifikasiMinatBakat;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataKriteria;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataSubKriteria;

class AlternatifController{
    private $dataAlternatif;
    private $dataSubKriteria;
    private $dataKriteria;
    private $dataKlasifikasiMinatBakat;
    private $kriteria_minat_bakat;
    private $helper;

    public function __construct() {
        $this->dataAlternatif = new DataAlternatif;
        $this->dataSubKriteria = new DataSubKriteria;
        $this->dataKriteria = new DataKriteria;
        $this->dataKlasifikasiMinatBakat = new DataKlasifikasiMinatBakat;
        $this->helper = new Helper;
        $this->kriteria_minat_bakat = $this->dataKriteria->getWithParams('Nama_Kriteria', 'Minat dan Bakat');
        if($_SESSION['user']['Level'] != 'admin'){
            $this->helper->ResponseSession([], 'Kamu Tidak diizinkan Mengakses ini', true);
            header('Location: ' . BASE_URL . 'dashboard/profil');
            exit();
        }
    }

    public function index(){
        $data['title'] = 'Daftar Data Alternatif';
        $no = isset($_GET['page']) > 0 ? ($_GET['page'] * $_GET['jumlah_data']) + 1 : 1;
        $count_result = $this->dataAlternatif->count_page();
        $result = $this->dataAlternatif->all($_GET);
        if(isset($_GET['jumlah_data'])){
            $page = floor(count($count_result) / $_GET['jumlah_data']);
        }else{
            $page = floor(count($count_result) / 10);
        }
        if($result){
            $result = [
                'dataAlternatif' => $result,
                'page' => $page,
                'no' => $no
            ];
            $response = $this->helper->ResponseData($result, "Data Berhasil Ditampilkan",false);
        }else{
            $result = [
                'dataAlternatif' => $result,
                'page' => $page,
                'no' => $no
            ];
            $response = $this->helper->ResponseData($result, "Data Berhasil Gagal",true);
        }
        View::render('Dashboard/Templates/header', $data);
        View::render('Dashboard/Templates/sidebar');
        View::render('Dashboard/DataAlternatif/index', $response);
        View::render('Dashboard/Templates/footer'); 
    }
    public function add(){
        $data['title'] = 'Tambah Data Alternatif';
        $data['minat_bakat'] = $this->dataSubKriteria->getWithParamsAll('Id_Kriteria', $this->kriteria_minat_bakat['Id_Kriteria']);
        View::render('Dashboard/Templates/header', $data);
        View::render('Dashboard/Templates/sidebar');
        View::render('Dashboard/DataAlternatif/add', $data);
        View::render('Dashboard/Templates/footer'); 
    }

    public function tambahAlternatif(){
        $result = $this->dataAlternatif->add($_POST);

        if($result){
            $this->helper->ResponseSession([],'Data Berhasil Ditambahkan', false);
            header('Location: ' . BASE_URL . 'dashboard/alternatif');
        }else{
            $this->helper->ResponseSession([],'Data Gagal Ditambahkan', true);
            header('Location: ' . BASE_URL . 'dashboard/alternatif/add');
        }
    }   
    public function edit(){
        $data['title'] = 'Edit Data Alternatif';
        $id_alternatif = $_GET['id'];
        $data['alternatif'] = $this->dataAlternatif->getWithParams('Id_Alternatif', $id_alternatif);

        $data['minat_bakat'] = $this->dataSubKriteria->getWithParamsAll('Id_Kriteria', $this->kriteria_minat_bakat['Id_Kriteria']);
        
        $data['klasifikasi_minat_bakat'] = $this->dataKlasifikasiMinatBakat->getWithParams('Id_Alternatif', $id_alternatif);

        if($data){
            $response = $this->helper->ResponseData($data, 'Data Berhasil Ditampilkan', false);
        }else{
            $this->helper->ResponseData([], 'Data Tidak Ditemukan', true);
            header('Location: ' . BASE_URL . 'dashboard/alternatif');
            exit();
        }
        View::render('Dashboard/Templates/header', $data);
        View::render('Dashboard/Templates/sidebar');
        View::render('Dashboard/DataAlternatif/edit', $response);
        View::render('Dashboard/Templates/footer'); 
    }

    public function ubahAlternatif(){
        $result = $this->dataAlternatif->edit($_POST);
        if($result){
            $this->helper->ResponseSession([], 'Data Berhasil Diupdate', false);
            header('Location: ' . BASE_URL . 'dashboard/alternatif');
        }else{
            $this->helper->ResponseSession([], 'Data Gagal Diupdate', true);
            header('Location: ' . BASE_URL . 'dashboard/alternatif/edit?id='.$_GET['id']);
        }
    }

    public function hapusAlternatif(){
        $result = $this->dataAlternatif->hapus($_GET['id']);

        if($result){
            $this->helper->ResponseSession([], 'Data Berhasil Dihapus', false);
        }else{
            $this->helper->ResponseSession([], 'Data Gagal Dihapus', true);
        }

        header('Location: ' . BASE_URL . 'dashboard/alternatif');
    }
}