<?php 
namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Controller;

use SistemPendukungKeputusan\UINIB\PHP\MVC\App\View;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Helpers\Helper;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataAlternatif;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataKriteria;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataPenilaian;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataPerhitungan;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataSubKriteria;

class PerhitunganController {
    private $dataPerhitungan;
    private $dataPenilaian;
    private $dataSubKriteria;
    private $dataKriteria;
    private $helper;
    private $dataAlternatif;
    
    public function __construct() {
        $this->dataPerhitungan = new DataPerhitungan;
        $this->dataPenilaian = new DataPenilaian;
        $this->dataSubKriteria = new DataSubKriteria;
        $this->dataKriteria = new DataKriteria;
        $this->helper = new Helper;
        $this->dataAlternatif = new DataAlternatif;
        if ($_SESSION['user']['Level'] != 'admin') {
            $this->helper->ResponseSession([], 'Kamu Tidak diizinkan Mengakses ini', true);
            header('Location: ' . BASE_URL . 'dashboard/profil');
            exit();
        }
    }

    public function index(){
        $data['title'] = 'Data Perhitungan';
        $data_kriteria = $this->dataKriteria->count_page();
        $data_alternatif = $this->dataAlternatif->count_page();

        $matriks = $this->helper->perhitungan_matriks($data_alternatif, $data_kriteria);
        
        $result = [
            'matriksKeputusan' => $matriks,
            'bobotPreferensi' => $this->dataKriteria->count_page()
        ];
        $response = $this->helper->ResponseData($result, 'Data Berhasil Ditampilkan', false);

        View::render('Dashboard/Templates/header', $data);
        View::render('Dashboard/Templates/sidebar');
        View::render('Dashboard/DataPerhitungan/index',$response);
        View::render('Dashboard/Templates/footer');
    }
}
