<?php

namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Controller;

use SistemPendukungKeputusan\UINIB\PHP\MVC\App\View;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Helpers\KriteriaHelper;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Helpers\Helper;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataKriteria;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataSubKriteria;

class SubKriteriaController{
    private $dataSubKriteria;
    private $dataKriteria;
    private $helper;

    public function __construct() {
        $this->dataSubKriteria = new DataSubKriteria;
        $this->dataKriteria = new DataKriteria; 
        $this->helper = new Helper;
        if ($_SESSION['user']['Level'] != 'admin') {
            $this->helper->ResponseSession([], 'Kamu Tidak diizinkan Mengakses ini', true);
            header('Location: ' . BASE_URL . 'dashboard/profil');
            exit();
        }
    }

    public function index(){
        $data['title'] = 'Daftar Data Sub Kriteria';
        $data_kriteria = $this->dataKriteria->all($_GET);
        $data_sub_kriteria = $this->dataSubKriteria->all();

        $sub_kriteria_split =$this->helper->sub_kriteria_split($data_sub_kriteria);
        if($data_sub_kriteria){
            $result = [
                'dataKriteria' => $data_kriteria,
                'dataSubKriteria' => $sub_kriteria_split,
            ];
            $response = $this->helper->ResponseData($result, "Data Berhasil Ditampilkan",false);
        }else{
            $result = [
                'dataKriteria' => $data_kriteria,
                'dataSubKriteria' => $sub_kriteria_split,
            ];
            $response = $this->helper->ResponseData($result, "Data Berhasil Gagal",true);
        }
        View::render('Dashboard/Templates/header', $data);
        View::render('Dashboard/Templates/sidebar');
        View::render('Dashboard/DataSubKriteria/index', $response);
        View::render('Dashboard/Templates/footer'); 
    }

    public function tambahSubKriteria(){
        $result = $this->dataSubKriteria->add($_POST);

        if($result){
            $this->helper->ResponseSession([],'Data Berhasil Ditambahkan', false);
        }else{
            $this->helper->ResponseSession([],'Data Gagal Ditambahkan', true);
        }
        header('Location: ' . BASE_URL . 'dashboard/sub-kriteria');
    }

    public function ubahSubKriteria(){
        $result = $this->dataSubKriteria->edit($_POST);
        if($result){
            $this->helper->ResponseSession([], 'Data Berhasil Diupdate', false);
        }else{
            $this->helper->ResponseSession([], 'Data Gagal Diupdate', true);
        }
        header('Location: ' . BASE_URL . 'dashboard/sub-kriteria');
    }

    public function hapusSubKriteria(){
        $result = $this->dataSubKriteria->hapus($_GET['id']);

        if($result){
            $this->helper->ResponseSession([], 'Data Berhasil Dihapus', false);
        }else{
            $this->helper->ResponseSession([], 'Data Gagal Dihapus', true);
        }
        header('Location: ' . BASE_URL . 'dashboard/sub-kriteria');
    }
}