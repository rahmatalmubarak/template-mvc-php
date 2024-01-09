<?php 
namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Controller;

use SistemPendukungKeputusan\UINIB\PHP\MVC\App\View;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Helpers\Helper;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataAlternatif;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataKlasifikasiMinatBakat;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataKriteria;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataPerhitungan;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataSiswa;
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
    private $dataKlasifikasiMinatBakat;

    public function __construct() {
        $this->dataSiswa = new DataSiswa;
        $this->user = new User();
        $this->dataSubKriteria = new DataSubKriteria;
        $this->dataKriteria = new DataKriteria;
        $this->helper = new Helper;
        $this->dataPerhitungan = new DataPerhitungan;
        $this->dataAlternatif = new DataAlternatif;
        $this->dataKlasifikasiMinatBakat = new DataKlasifikasiMinatBakat;
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
                'dataPrestasiAkademik'=>$sub_kriteria_split['data_prestasi_akademik']
            ];
            $response = $this->helper->ResponseData($result, "Data Berhasil Ditampilkan", false);
        }else{
            $result = [
                'userData' => $userData,
                'dataSiswaData' => [],
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
                $data_user['Nilai']['Minat_Bakat'] = $sub_kriteria['Nilai'];
            }
            if ($sub_kriteria['Id_Kriteria'] == $kriteria_nilai_rapor['Id_Kriteria']) {
                $range_nilai = explode('-', $sub_kriteria['Nama']);
                if ($range_nilai[0] <= $data_siswa['Nilai_Rapor'] && $range_nilai[1] >= $data_siswa['Nilai_Rapor']) {
                    $data_user['Nilai']['Nilai_Rapor'] = $sub_kriteria['Nilai'];
                }
            }
            if ($sub_kriteria['Nama'] == $data_siswa['Penghasilan_Ortu']) {
                $data_user['Nilai']['Penghasilan_Ortu'] = $sub_kriteria['Nilai'];
            }
            if ($sub_kriteria['Nama'] . " " . $sub_kriteria['Bobot'] == $data_siswa['Prestasi_Akademik']) {
                $data_user['Nilai']['Prestasi_Akademik'] = $sub_kriteria['Nilai'];
            }
        }
        $max_min_nilai = $this->helper->max_min_nilai($this->dataAlternatif->count_page(), $data_kriteria);
        $nilai_akhir = (round($data_user['Nilai']['Nilai_Rapor']/max($max_min_nilai['C1']),2) * $data_kriteria[0]['Bobot_Kriteria']) +
        (round($data_user['Nilai']['Minat_Bakat']/max($max_min_nilai['C2']),2) * $data_kriteria[1]['Bobot_Kriteria']) +
        (round($data_user['Nilai']['Prestasi_Akademik']/max($max_min_nilai['C3']),2) * $data_kriteria[2]['Bobot_Kriteria']) +
        (round(min($max_min_nilai['C4'])/ $data_user['Nilai']['Penghasilan_Ortu'],2) * $data_kriteria[3]['Bobot_Kriteria']);

        $data_perhitungan = $this->dataPerhitungan->rangking();

        $rekomendasi_prodi = [];
        foreach ($data_perhitungan as $key => $perhitungan) {
            if ($perhitungan['Nilai'] <= $nilai_akhir) {
                array_push($rekomendasi_prodi, $perhitungan);
                if (count($rekomendasi_prodi) == 3) {
                    break;
                }
            }
        }
        
        $id_sub_kriteria_minat_bakat = $this->dataSubKriteria->getWithParams('Nama', $data_user['dataSiswa']['Minat_Bakat']);
        $prodi_klasifikasi_minat_bakat = $this->dataKlasifikasiMinatBakat->getWithParamsAll('Id_Sub_Kriteria', $id_sub_kriteria_minat_bakat['Id_Sub_Kriteria']);
        $isSame = true;
        if(count($prodi_klasifikasi_minat_bakat) > 0){
            foreach ($prodi_klasifikasi_minat_bakat as $key => $prodi) {
                foreach ($rekomendasi_prodi as $key => $_prodi) {
                    if($_prodi['Nama'] == $prodi['Nama']){
                        unset($prodi['Id_Klasifikasi_Minat_Bakat']);
                        unset($prodi['Id_Sub_Kriteria']);
                        unset($prodi['Bobot']);
                        $isSame = false;
                    }
                }
                if($isSame){
                    array_push($rekomendasi_prodi, $prodi);
                }
                $isSame = true;
            }
        }
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
    
    public function cetakHasil(){
        $result = $this->nilaiHasilAkhir();
        $html = "<html>
                <h2>Hasil Rekomendasi Program Studi<h2>";
        $html .= "<div style='font-size:15px;font-weight:normal'><div style='padding-top: 1rem'>
            <table>
                <thead>
                    <tr class='font-weight-bold'>
                        <td style='width: 5 %;'>Nama</td>
                        <td style='width: 90%;'>: ".$result['dataSiswa']['Nama_Lengkap']."</td>
                    </tr>
                    <tr class='font-weight-bold'>
                        <td style='width: 5 %;'>Minat dan Bakat</td>
                        <td style='width: 90%;'>: ".$result['dataSiswa']['dataSiswa']['Minat_Bakat']."</td>
                    </tr>
                    <tr class='font-weight-bold'>
                        <td style='width: 5 %;'>Prestasi Akademik</td>
                        <td style='width: 90%;'>: ".$result['dataSiswa']['dataSiswa']['Prestasi_Akademik']."</td>
                    </tr>
                    <tr class='font-weight-bold'>
                        <td style='width: 5 %;'>Penghasilan Orang Tua</td>
                        <td style='width: 90%;'>: ".$result['dataSiswa']['dataSiswa']['Penghasilan_Ortu']."</td>
                </thead>
            </table>
            <div>
                <p>Berdasarkan hasil pertimbangan dari Nilai, Minat dan Bakat, Prestasi Akademik dan Penghasilan Orang Tua. Maka, Siswa yang bernama ". $result['dataSiswa']['Nama_Lengkap']. " direkomendasikan untuk memilih program studi berikut untuk melanjutkan pendidikan ke perguruan tinggi.</p>
            </div>
            <div style='border-radius: .2rem!important;'>
                <table style='width: 50%; border-collapse: collapse;'>
                    <thead style='background-color: #78201a; color: white; text-align: center; border: 1px solid black;'>
                        <tr class='font-weight-bold'>
                            <th style='width: 10%;height: 20px;'>No</th>
                            <th style='width: 80%;height: 20px;'>Program Studi</th>
                            <th style='width: 10%;height: 20px;'>Point</th>
                        </tr>
                    </thead>
                    <tbody>";
                    $tr = ''; 
                    $no = 1;
                    foreach($result['rekomendasiProdi'] as $key => $rekomendasi_prodi){
                        $tr .= "<tr>
                            <td style='border: 1px solid black;'> ". $no++ . "</td>
                            <td style='border: 1px solid black;'> " . $rekomendasi_prodi['Nama'] . "</td>
                            <td style='border: 1px solid black;'> " . $result['nilaiAkhirSiswa'] . "</td>
                        </tr>";
                    }
        $html .= $tr. "</tbody></table></div></div></div></html>";
        $nama_file = "Rekomendasi Program Studi - " . $result['dataSiswa']['Nama_Lengkap'];
        $this->helper->cetak_pdf($html, $nama_file);
    }
}