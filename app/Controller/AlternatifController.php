<?php

namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Controller;

use SistemPendukungKeputusan\UINIB\PHP\MVC\App\View;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Helpers\Helper;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataAlternatif;

class AlternatifController{
    private $dataAlternatif;
    private $helper;

    public function __construct() {
        $this->dataAlternatif = new DataAlternatif;
        $this->helper = new Helper;
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
        View::render('Dashboard/Templates/header', $data);
        View::render('Dashboard/Templates/sidebar');
        View::render('Dashboard/DataAlternatif/add');
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
        $dataAlternatifId = $this->dataAlternatif->getWithParams('Id_Alternatif', $id_alternatif);
        if($dataAlternatifId){
            $response = $this->helper->ResponseData($dataAlternatifId, 'Data Berhasil Ditampilkan', false);
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