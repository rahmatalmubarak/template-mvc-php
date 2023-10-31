<?php

namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Controller;

use SistemPendukungKeputusan\UINIB\PHP\MVC\App\View;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Helpers\Helper;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataKriteria;

class KriteriaController{
    private $dataKriteria;
    private $helper;

    public function __construct() {
        $this->dataKriteria = new DataKriteria;
        $this->helper = new Helper;
        if ($_SESSION['user']['Level'] != 'admin') {
            $this->helper->ResponseSession([], 'Kamu Tidak diizinkan Mengakses ini', true);
            header('Location: ' . BASE_URL . 'dashboard/profil');
            exit();
        }
    }

    public function index(){
        $data['title'] = 'Daftar Data Kriteria';
        $no = isset($_GET['page']) > 0 ? ($_GET['page'] * $_GET['jumlah_data']) + 1 : 1;
        $count_result = $this->dataKriteria->count_page();
        $result = $this->dataKriteria->all($_GET);
        if(isset($_GET['jumlah_data'])){
            $page = floor(count($count_result) / $_GET['jumlah_data']);
        }else{
            $page = floor(count($count_result) / 10);
        }
        if($result){
            $result = [
                'dataKriteria' => $result,
                'page' => $page,
                'no' => $no
            ];
            $response = $this->helper->ResponseData($result, "Data Berhasil Ditampilkan",false);
        }else{
            $result = [
                'dataKriteria' => $result,
                'page' => $page,
                'no' => $no
            ];
            $response = $this->helper->ResponseData($result, "Data Berhasil Gagal",true);
        }
        View::render('Dashboard/Templates/header', $data);
        View::render('Dashboard/Templates/sidebar');
        View::render('Dashboard/DataKriteria/index', $response);
        View::render('Dashboard/Templates/footer'); 
    }
    public function add(){
        $data['title'] = 'Tambah Data Kriteria';
        View::render('Dashboard/Templates/header', $data);
        View::render('Dashboard/Templates/sidebar');
        View::render('Dashboard/DataKriteria/add');
        View::render('Dashboard/Templates/footer'); 
    }

    public function tambahKriteria(){
        $result = $this->dataKriteria->add($_POST);

        if($result){
            $this->helper->ResponseSession([],'Data Berhasil Ditambahkan', false);
            header('Location: ' . BASE_URL . 'dashboard/kriteria');
        }else{
            $this->helper->ResponseSession([],'Data Gagal Ditambahkan', true);
            header('Location: ' . BASE_URL . 'dashboard/kriteria/add');
        }
    }   
    public function edit(){
        $data['title'] = 'Edit Data Kriteria';
        $id_kriteria = $_GET['id'];
        $dataKriteriaId = $this->dataKriteria->getWithParams('Id_Kriteria', $id_kriteria);
        if($dataKriteriaId){
            $response = $this->helper->ResponseData($dataKriteriaId, 'Data Berhasil Ditampilkan', false);
        }else{
            $this->helper->ResponseData([], 'Data Tidak Ditemukan', true);
            header('Location: ' . BASE_URL . 'dashboard/kriteria');
            exit();
        }
        View::render('Dashboard/Templates/header', $data);
        View::render('Dashboard/Templates/sidebar');
        View::render('Dashboard/DataKriteria/edit', $response);
        View::render('Dashboard/Templates/footer'); 
    }

    public function ubahKriteria(){
        $result = $this->dataKriteria->edit($_POST);
        if($result){
            $this->helper->ResponseSession([], 'Data Berhasil Diupdate', false);
            header('Location: ' . BASE_URL . 'dashboard/kriteria');
        }else{
            $this->helper->ResponseSession([], 'Data Gagal Diupdate', true);
            header('Location: ' . BASE_URL . 'dashboard/kriteria/edit?id='.$_GET['id']);
        }
    }

    public function hapusKriteria(){
        $result = $this->dataKriteria->hapus($_GET['id']);

        if($result){
            $this->helper->ResponseSession([], 'Data Berhasil Dihapus', false);
        }else{
            $this->helper->ResponseSession([], 'Data Gagal Dihapus', true);
        }

        header('Location: ' . BASE_URL . 'dashboard/kriteria');
    }
}