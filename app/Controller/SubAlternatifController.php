<?php

namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Controller;

use SistemPendukungKeputusan\UINIB\PHP\MVC\App\View;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Helpers\AlternatifHelper;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Helpers\Helper;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataAlternatif;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataSubAlternatif;

class SubAlternatifController{
    private $dataSubAlternatif;
    private $dataAlternatif;
    private $helper;

    public function __construct() {
        $this->dataSubAlternatif = new DataSubAlternatif;
        $this->dataAlternatif = new DataAlternatif; 
        $this->helper = new Helper;
        if ($_SESSION['user']['Level'] != 'admin') {
            $this->helper->ResponseSession([], 'Kamu Tidak diizinkan Mengakses ini', true);
            header('Location: ' . BASE_URL . 'dashboard/profil');
            exit();
        }
    }

    public function index(){
        $id_alternatif = $_GET['id'];
        $dataAlternatifId = $this->dataAlternatif->getWithParams('Id_Alternatif', $id_alternatif);
        $data['title'] = 'Pembobotan Program Studi ' . $dataAlternatifId['Nama'];
        $data_alternatif = $this->dataAlternatif->all($_GET);
        $data_sub_alternatif = $this->dataSubAlternatif->all();

        $sub_alternatif_split =$this->helper->sub_alternatif_split($data_sub_alternatif);
        
        if($data_sub_alternatif){
            $result = [
                'title' => $data['title'],
                'dataAlternatif' => $data_alternatif,
                'dataSubAlternatif' => $data_sub_alternatif,
                'dataNilaiRapor' => $sub_alternatif_split['data_nilai_rapor'],
                'dataMinatBakat' => $sub_alternatif_split['data_minat_bakat'],
                'dataPrestasiAkademik' => $sub_alternatif_split['data_prestasi_akademik'],
                'dataPenghasilanOrangTua' => $sub_alternatif_split['data_penghasilan_orang_tua']
            ];
            $response = $this->helper->ResponseData($result, "Data Berhasil Ditampilkan",false);
        }else{
            $result = [
                'title' => $data['title'],
                'dataAlternatif' => $data_alternatif,
                'dataSubAlternatif' => $data_sub_alternatif,
                'dataNilaiRapor' => $sub_alternatif_split['data_nilai_rapor'],
                'dataMinatBakat' => $sub_alternatif_split['data_minat_bakat'],
                'dataPrestasiAkademik' => $sub_alternatif_split['data_prestasi_akademik'],
                'dataPenghasilanOrangTua' => $sub_alternatif_split['data_penghasilan_orang_tua']
            ];
            $response = $this->helper->ResponseData($result, "Data Berhasil Gagal",true);
        }
        View::render('Dashboard/Templates/header', $data);
        View::render('Dashboard/Templates/sidebar');
        View::render('Dashboard/DataSubAlternatif/index', $response);
        View::render('Dashboard/Templates/footer'); 
    }

    public function tambahSubAlternatif(){
        $result = $this->dataSubAlternatif->add($_POST);
        if($result){
            $this->helper->ResponseSession([],'Data Berhasil Ditambahkan', false);
        }else{
            $this->helper->ResponseSession([],'Data Gagal Ditambahkan', true);
        }
        header('Location: ' . BASE_URL . 'dashboard/alternatif/pembobotan?id='.$_POST['id_alternatif']);
    }

    public function ubahSubAlternatif(){
        $result = $this->dataSubAlternatif->edit($_POST);
        if($result){
            $this->helper->ResponseSession([], 'Data Berhasil Diupdate', false);
        }else{
            $this->helper->ResponseSession([], 'Data Gagal Diupdate', true);
        }
        header('Location: ' . BASE_URL . 'dashboard/alternatif/pembobotan?id=' . $_POST['id_alternatif']);
    }

    public function hapusSubAlternatif(){
        $result = $this->dataSubAlternatif->hapus($_GET['id']);

        if($result){
            $this->helper->ResponseSession([], 'Data Berhasil Dihapus', false);
        }else{
            $this->helper->ResponseSession([], 'Data Gagal Dihapus', true);
        }
        header('Location: ' . BASE_URL . 'dashboard/alternatif/pembobotan?id=' . $_GET['alternatif']);
    }
}