<?php 
namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Controller;

use SistemPendukungKeputusan\UINIB\PHP\MVC\App\View;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Helpers\Helper;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataAlternatif;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataKlasifikasiMinatBakat;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataKriteria;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataPerhitungan;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataSiswa;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataSubAlternatif;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataSubKriteria;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\User;

class DataSiswaController {
    private $dataSiswa;
    private $user;
    private $helper;
    private $dataKriteria;
    private $dataSubKriteria;
    private $dataPerhitungan;
    private $dataAlternatif;
    private $dataSubAlternatif;

    public function __construct() {
        $this->dataSiswa = new DataSiswa;
        $this->user = new User();
        $this->dataSubKriteria = new DataSubKriteria;
        $this->dataKriteria = new DataKriteria;
        $this->helper = new Helper;
        $this->dataPerhitungan = new DataPerhitungan;
        $this->dataAlternatif = new DataAlternatif;
        $this->dataSubAlternatif = new DataSubAlternatif;
    }

    public function index(){
        $data['title'] = 'Daftar Siswa';
        $no = isset($_GET['page']) > 0 ? ($_GET['page'] * $_GET['jumlah_data']) + 1 : 1;
        $users = $this->user->all($_GET);
        $data_siswa = $this->dataSiswa->count_page();
        
        $all_data_siswa = array_map(function($user) use ($data_siswa){
            foreach ($data_siswa as $key => $siswa) {
                if($user['Id_User'] == $siswa['Id_User']){
                    $user['detailSiswa'] = $siswa;
                    return $user;
                }
            }
        }, $users);
        $all_data_siswa = array_filter($all_data_siswa);

        if (isset($_GET['jumlah_data'])) {
            $page = floor(count($all_data_siswa) / $_GET['jumlah_data']);
        } else {
            $page = floor(count($all_data_siswa) / 10);
        }

        if($all_data_siswa){
            $result = [
                'dataSiswa' =>$all_data_siswa,
                'page'=> $page,
                'no' => $no
            ];
            $response = $this->helper->ResponseData($result, 'Data Berhasil Ditampilkan', false);
        }else{
            $result = [
                'dataSiswa' =>[],
                'page' => $page,
                'no' => $no
            ];
            $response = $this->helper->ResponseData($result, 'Data Gagal Ditampilkan', true);
        }
        View::render('Dashboard/Templates/header', $data);
        View::render('Dashboard/Templates/sidebar');
        View::render('Dashboard/DataSiswa/index',$response);
        View::render('Dashboard/Templates/footer'); 

    }
    public function personal()
    {
        $data['title'] = "Data Siswa - ". $_SESSION['user']['Nama_Lengkap'];
        $userData = $this->user->getWithParams('Id_User',$_SESSION['user']['Id_User']);
        $dataSiswaData = $this->dataSiswa->getWithParams('Id_User', $userData['Id_User']);

        $data_sub_kriteria = $this->dataSubKriteria->all();
        $sub_kriteria_split = $this->helper->sub_kriteria_split($data_sub_kriteria);
        if($dataSiswaData){
            $result = [
                'userData' => $userData,
                'dataSiswaData'=>$dataSiswaData,
                'dataKriteria'=>$sub_kriteria_split,
                'dataPrestasiAkademik'=>$sub_kriteria_split['data_prestasi_akademik']
            ];
            $response = $this->helper->ResponseData($result, "Data Berhasil Ditampilkan", false);
        }else{
            $result = [
                'userData' => $userData,
                'dataSiswaData' => [],
                'dataKriteria' => $sub_kriteria_split,
                'dataPrestasiAkademik' => $sub_kriteria_split['data_prestasi_akademik']
            ];
            $response = $this->helper->ResponseData($result, "Data Gagal Ditampilkan", true);
        }
        View::render('Dashboard/Templates/header', $data);
        View::render('Dashboard/Templates/sidebar');
        View::render('Dashboard/DataSiswa/personal', $response);
        View::render('Dashboard/Templates/footer');        
    }

    public function prosesEditDataSiswa()
    {
        $chek_data_siswa = $this->dataSiswa->getWithParams('Id_User', $_SESSION['user']['Id_User']);
        if(!$chek_data_siswa){
            $result = $this->dataSiswa->add($_POST);
            if($result){
               $this->helper->ResponseSession($result, "Data Berhasil Ditambahkan", false);
            }else{
               $this->helper->ResponseSession($result, "Data Gagal Ditambahkan", false);
            }
            header('Location: ' . BASE_URL . 'dashboard/profil/data-siswa');
            exit();
        }
        
        $result = $this->dataSiswa->edit($_POST, $_SESSION['user']['Id_User']);

        $this->helper->ResponseSession($result, "Hasil Nilai Akhir", false);
        header('Location: ' . BASE_URL . 'dashboard/profil/data-siswa/hasil?id='. $_SESSION['user']['Id_User']);
        exit();
    }
    public function nilaiHasilAkhir(){
        $data_user = $this->user->getWithParams('Id_User', $_GET['id']);
        $data_siswa = $this->dataSiswa->getWithParams('Id_User', $data_user['Id_User']);
        $kriteria_nilai_rapor = $this->dataKriteria->getWithParams('Nama_Kriteria', 'Nilai Rapor');
        $data_kriteria = $this->dataKriteria->count_page();
        $data_user['dataSiswa'] = $data_siswa;

        $data_sub_kriteria = $this->dataSubKriteria->all();
        foreach ($data_sub_kriteria as $key => $sub_kriteria) {
            if ($sub_kriteria['Nama'] == $data_siswa['Minat_Bakat']) {
                $data_user['Nilai']['Minat_dan_Bakat'] = $sub_kriteria['Nilai'];
            }
            if ($sub_kriteria['Id_Kriteria'] == $kriteria_nilai_rapor['Id_Kriteria']) {
                $range_nilai = explode('-', $sub_kriteria['Nama']);
                if ($range_nilai[0] <= $data_siswa['Nilai_Rapor'] && $range_nilai[1] >= $data_siswa['Nilai_Rapor']) {
                    $data_user['Nilai']['Nilai_Rapor'] = $sub_kriteria['Nilai'];
                }
            }
            if ($sub_kriteria['Nama'] == $data_siswa['Penghasilan_Ortu']) {
                $data_user['Nilai']['Penghasilan_Orang_Tua'] = $sub_kriteria['Nilai'];
            }
            if ($sub_kriteria['Nama'] . " " . $sub_kriteria['Bobot'] == $data_siswa['Prestasi_Akademik']) {
                $data_user['Nilai']['Prestasi_Akademik'] = $sub_kriteria['Nilai'];
            }
        }
        $max_min_nilai = $this->helper->max_min_nilai($this->dataAlternatif->count_page(), $data_kriteria);
        $nilai_akhir = 0;
        foreach ($data_kriteria as $key => $kriteria) {
            if($kriteria['Jenis_Kriteria'] == 'Benefit'){
                $nilai_akhir += round($data_user['Nilai'][str_replace(' ','_', $kriteria['Nama_Kriteria'])]/max($max_min_nilai[$kriteria['Kode_Kriteria']]),2) * $kriteria['Bobot_Kriteria'];
            }else{
                $nilai_akhir += round(min($max_min_nilai[$kriteria['Kode_Kriteria']])/$data_user['Nilai'][str_replace(' ','_', $kriteria['Nama_Kriteria'])],2) * $kriteria['Bobot_Kriteria'];
            }
        }
        
        $data_perhitungan = $this->dataPerhitungan->rangking();

        $rekomendasi_prodi = [];
        foreach ($data_perhitungan as $key => $perhitungan) {
            if ($perhitungan['Nilai'] <= $nilai_akhir) {
                // Rekomendasi prodi berdasarkan perhitungan
                array_push($rekomendasi_prodi, $perhitungan); 
                if (count($rekomendasi_prodi) == 2) {
                    break;
                }
            }
        }

        $data_kriteria = $this->dataKriteria->count_page();
        $data_sub_alternatif = $this->dataSubAlternatif->count_page();
        $dataAlternatif = $this->dataAlternatif->count_page();
        $data_sub_alternatif_filter = [];
        foreach ($data_sub_alternatif as $key => $sub_alternatif) {
            if($data_siswa['Nilai_Rapor'] < 50 && $sub_alternatif['Nama'] == "0 - 50"){
                $data_sub_alternatif_filter[$key] = $sub_alternatif;
            }else if($data_siswa['Nilai_Rapor'] >= 51 && $data_siswa['Nilai_Rapor'] <= 65 && $sub_alternatif['Nama'] == "51- 65"){
                $data_sub_alternatif_filter[$key] = $sub_alternatif;
            }else if($data_siswa['Nilai_Rapor'] >= 66 && $data_siswa['Nilai_Rapor'] <= 75 && $sub_alternatif['Nama'] == "66 - 75"){
                $data_sub_alternatif_filter[$key] = $sub_alternatif;
            }else if($data_siswa['Nilai_Rapor'] >= 76 && $data_siswa['Nilai_Rapor'] <= 85 && $sub_alternatif['Nama'] == "76 - 85"){
                $data_sub_alternatif_filter[$key] = $sub_alternatif;
            } else if ($data_siswa['Nilai_Rapor'] >= 86 && $data_siswa['Nilai_Rapor'] <= 100 && $sub_alternatif['Nama'] == "86 - 100") {
                $data_sub_alternatif_filter[$key] = $sub_alternatif;
            }

            if($data_siswa['Minat_Bakat'] == $sub_alternatif['Nama']){
                $data_sub_alternatif_filter[$key] = $sub_alternatif;
            }

            if($data_siswa['Prestasi_Akademik'] == $sub_alternatif['Nama']. ' ' . $sub_alternatif['Bobot']){
                $data_sub_alternatif_filter[$key] = $sub_alternatif;
            }

            if($data_siswa['Penghasilan_Ortu'] == $sub_alternatif['Nama']){
                $data_sub_alternatif_filter[$key] = $sub_alternatif;
            }
        }

        $matriks = $this->helper->perhitungan_matriks_sub_alternatif($data_sub_alternatif_filter, $data_kriteria);
        foreach ($dataAlternatif as $key => $alternatif) {
            $nilai = 0;
            foreach ($matriks as $key2 => $sub_alternatif) {
                if($sub_alternatif['Id_Alternatif'] == $alternatif['Id_Alternatif']){
                    $nilai += $sub_alternatif['Nilai_Akhir'];
                }
            }
            $dataAlternatif[$key]['Nilai'] = $nilai;
        }
        $a = 0;
        $alternatif_new= [];
        foreach ($dataAlternatif as $key => $alternatif) {
            if($alternatif['Nilai'] > $a){
                $alternatif_new = $alternatif;
                $a = $alternatif['Nilai'];
            }  
        }
        if($alternatif_new){
            array_push($rekomendasi_prodi, $alternatif_new);
        }

        usort($rekomendasi_prodi, function ($a, $b) {
            $retval = $a['Nilai'] <=> $b['Nilai'];
            if ($retval == -1) {
                return $a;
            }
        });
        
        $result = [
            'dataSiswa' => $data_user,
            'rekomendasiProdi' => $rekomendasi_prodi,
            'nilaiAkhirSiswa' => round($nilai_akhir,2)
        ];
        return $result;
    }
    public function hasil()
    {
        $data['title'] = 'Hasil Rekomendasi Program Studi';
        $result = $this->nilaiHasilAkhir();
        $response = $this->helper->ResponseData($result, 'Data Berhasil Ditampilkan', false);
        View::render('Dashboard/Templates/header', $data);
        View::render('Dashboard/Templates/sidebar');
        View::render('Dashboard/DataSiswa/detail', $response);
        View::render('Dashboard/Templates/footer'); 
    }

    public function subAlternatif()
    {
        $data['title'] = 'Hasil Rekomendasi Program Studi';
        $result = $this->nilaiHasilAkhir();
        $response = $this->helper->ResponseData($result, 'Data Berhasil Ditampilkan', false);
        View::render('Dashboard/DataSiswa/tes',$response);
    }
    
    public function cetakHasil(){
        $result = $this->nilaiHasilAkhir();
        $uri = $_SERVER['REQUEST_URI'];
        $uri = explode('/', $uri);
        $html = file_get_contents("http://localhost/" . $uri[1] . '/public/dashboard/data-siswa/cetak-view?id='.$_GET['id'] );
        $nama_file = "Rekomendasi Program Studi - " . $result['dataSiswa']['Nama_Lengkap'];
        $this->helper->cetak_pdf($html, $nama_file);
    }

    public function cetakView(){
        $data['title'] = 'Hasil Rekomendasi Program Studi';
        $result = $this->nilaiHasilAkhir();
        $response = $this->helper->ResponseData($result, 'Data Berhasil Ditampilkan', false);
        View::render('Dashboard/DataSiswa/cetak', $response);
    }
}