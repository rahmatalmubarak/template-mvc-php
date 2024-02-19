<?php
namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Helpers;

use Dompdf\Dompdf;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataKriteria;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataPenilaian;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataPerhitungan;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataSubAlternatif;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataSubKriteria;

class Helper{
    private $dataPerhitungan;
    private $dataPenilaian;
    private $dataSubKriteria;
    private $dataSubAlternatif;
    private $dataKriteria;
    private $dataAlternatif;

    public function __construct()
    {
        $this->dataPerhitungan = new DataPerhitungan;
        $this->dataPenilaian = new DataPenilaian;
        $this->dataSubKriteria = new DataSubKriteria;
        $this->dataSubAlternatif = new DataSubAlternatif;
        $this->dataKriteria = new DataKriteria;
        $this->dataAlternatif = new DataSubAlternatif;
    }
    public function ResponseSession($data,$message,$error){
        return $_SESSION['response'] = [
            'data' => $data,
            'message' => $message,
            'error' => $error == true ? 'true' : 'false'
        ];
    }

    public function ResponseData($data,$message,$error){
        return [
            'data' => $data,
            'message' => $message,
            'error' => $error
        ];
    }

    public function cetak_pdf($html,$nama_file){
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream($nama_file);
    }

    public function max_min_nilai($data_alternatif, $data_kriterias)
    {
        $nilai = [];
        foreach ($data_kriterias as $key => $data_kriteria) {
            $nilai[$data_kriteria['Kode_Kriteria']] = [];
        }

        foreach ($data_alternatif as $key_alternatif => $alternatif) {
            $data_penilaian = $this->dataPenilaian->getWithParamsAll('Id_Alternatif', $alternatif['Id_Alternatif']);
            if ($data_penilaian) {
                foreach ($data_penilaian as $key_penilaian => $penilaian) {
                    // $sub_kriteria = $this->dataSubKriteria->getWithParams('Id_Sub_Kriteria', $penilaian['Id_Sub_Kriteria']);
                    // $kriteria = $this->dataKriteria->getWithParams('Id_Kriteria', $sub_kriteria['Id_Kriteria']);
                    $kriteria = $this->dataKriteria->getWithParams('Id_Kriteria', $penilaian['Id_Kriteria']);
                    foreach ($data_kriterias as $key => $data_kriteria) {
                        if ($data_kriteria['Kode_Kriteria'] == $kriteria['Kode_Kriteria']) {
                            array_push($nilai[$data_kriteria['Kode_Kriteria']], $penilaian['Nilai']);
                        }
                    }
                }
            }
        }   
        return $nilai;
    }

    public function max_min_nilai_sub_alternatif($data_alternatif, $data_kriterias)
    {
        $nilai = [];
        foreach ($data_kriterias as $key => $data_kriteria) {
            $nilai[$data_kriteria['Kode_Kriteria']] = [];
        }

        foreach ($data_alternatif as $key_alternatif => $alternatif) {
            $kriteria = $this->dataKriteria->getWithParams('Id_Kriteria', $alternatif['Id_Kriteria']);
            
            foreach ($data_kriterias as $key => $data_kriteria) {
                if ($data_kriteria['Kode_Kriteria'] == $kriteria['Kode_Kriteria']) {
                    array_push($nilai[$data_kriteria['Kode_Kriteria']], $alternatif['Nilai']);
                }
            }
        }
        return $nilai;
    }

    public function perhitungan_matriks($data_alternatif, $data_kriteria)
    {
        $max_min_nilai = $this->max_min_nilai($data_alternatif, $data_kriteria);
        $matriks = [];
        foreach ($data_alternatif as $key_alternatif => $alternatif) {
            $data_penilaian = $this->dataPenilaian->getWithParamsAll('Id_Alternatif', $alternatif['Id_Alternatif']);
            if ($data_penilaian) {
                $matriks[$key_alternatif] = $alternatif;
                $nilai_akhir = 0;
                foreach ($data_penilaian as $key_penilaian => $penilaian) {
                    // $sub_kriteria = $this->dataSubKriteria->getWithParams('Id_Sub_Kriteria', $penilaian['Id_Sub_Kriteria']);
                    // $kriteria = $this->dataKriteria->getWithParams('Id_Kriteria', $sub_kriteria['Id_Kriteria']);
                    $kriteria = $this->dataKriteria->getWithParams('Id_Kriteria', $penilaian['Id_Kriteria']);

                    if ($kriteria['Jenis_Kriteria'] == 'Benefit') {
                        $nilai_ternormalisasi = $penilaian['Nilai'] / max($max_min_nilai[$kriteria['Kode_Kriteria']]);
                    } else {
                        $nilai_ternormalisasi = min($max_min_nilai[$kriteria['Kode_Kriteria']]) / $penilaian['Nilai'];
                    }

                    $nilai_total = round($nilai_ternormalisasi, 2) * $kriteria['Bobot_Kriteria'];
                    $nilai_akhir += $nilai_total;
                    $matriks[$key_alternatif]['Penilaian'][$key_penilaian] = [
                        // 'Id_Penilaian' => $penilaian['Id_Penilaian'],
                        // 'Id_Kriteria' => $kriteria['Id_Kriteria'],
                        // 'Id_Sub_Kriteria' => $penilaian['Id_Sub_Kriteria'],
                        // 'Kode_Kriteria' => $kriteria['Kode_Kriteria'],
                        // 'Jenis_Kriteria' => $kriteria['Jenis_Kriteria'],
                        // 'Nilai_Total' => round($nilai_total, 2)
                        'Bobot_Kriteria' => $kriteria['Bobot_Kriteria'],
                        'Nilai' => $penilaian['Nilai'],
                        'Nilai_Ternormalisasi' => round($nilai_ternormalisasi, 2)
                    ];
                }
                $matriks[$key_alternatif]['Nilai_Akhir'] = $nilai_akhir;
            }
        }
        return $matriks;
    }

    public function perhitungan_matriks_sub_alternatif($data_sub_alternatif, $data_kriteria)
    {
        $max_min_nilai = $this->max_min_nilai_sub_alternatif($data_sub_alternatif, $data_kriteria);
        $matriks = [];
        foreach ($data_sub_alternatif as $key_alternatif => $alternatif) {
                $matriks[$key_alternatif] = $alternatif;
                $nilai_akhir = 0;
                $kriteria = $this->dataKriteria->getWithParams('Id_Kriteria', $alternatif['Id_Kriteria']);

                // if ($kriteria['Jenis_Kriteria'] == 'Benefit') {
                //     $nilai_ternormalisasi = $alternatif['Nilai'] / max($max_min_nilai[$kriteria['Kode_Kriteria']]);
                // } else {
                //     $nilai_ternormalisasi = min($max_min_nilai[$kriteria['Kode_Kriteria']]) / $alternatif['Nilai'];
                // }
                $nilai_ternormalisasi = $alternatif['Nilai'] / max($max_min_nilai[$kriteria['Kode_Kriteria']]);
                $nilai_total = round($nilai_ternormalisasi, 2) * $kriteria['Bobot_Kriteria'];
                $nilai_akhir += $nilai_total;
                // echo $alternatif['Nama'] . ' = ' . $alternatif['Nilai'] . ' / ' . max($max_min_nilai[$kriteria['Kode_Kriteria']]) . ' = ' . $nilai_ternormalisasi  .  '<br>';
                // $matriks[$key_alternatif]['Penilaian'][$key_penilaian] = [
                //     // 'Id_Penilaian' => $penilaian['Id_Penilaian'],
                //     // 'Id_Kriteria' => $kriteria['Id_Kriteria'],
                //     // 'Id_Sub_Kriteria' => $penilaian['Id_Sub_Kriteria'],
                //     // 'Kode_Kriteria' => $kriteria['Kode_Kriteria'],
                //     // 'Jenis_Kriteria' => $kriteria['Jenis_Kriteria'],
                //     // 'Nilai_Total' => round($nilai_total, 2)
                //     'Bobot_Kriteria' => $kriteria['Bobot_Kriteria'],
                //     'Nilai' => $penilaian['Nilai'],
                //     'Nilai_Ternormalisasi' => round($nilai_ternormalisasi, 2)
                // ];
                $matriks[$key_alternatif]['Nilai_Akhir'] = $nilai_akhir;
        }
        return $matriks;
    }

    public function refresh_hasil_akhir($matriks)
    {
        foreach ($matriks as $key_alternatif => $alternatif) {
            if ($result = $this->dataPerhitungan->getWithParams('Id_Alternatif', $alternatif['Id_Alternatif'])) {
                $alternatif['Id_Hasil_SAW'] = $result['Id_Hasil_SAW'];
                $this->dataPerhitungan->edit($alternatif);
            } else {
                $this->dataPerhitungan->add($alternatif);
            }
        }
    }


    public function sub_kriteria_split($data_sub_kriteria)
    {
        $data_nilai_rapor = [];
        $data_minat_bakat = [];
        $data_prestasi_akademik = [];
        $data_penghasilan_orang_tua = [];
        foreach ($data_sub_kriteria as $key => $sub_kriteria) {
            $data_kriteria_ = $this->dataKriteria->getWithParams('Id_Kriteria', $sub_kriteria['Id_Kriteria']);
            if ($data_kriteria_['Nama_Kriteria'] == 'Nilai Rapor') {
                array_push($data_nilai_rapor, $sub_kriteria);
            }
            if ($data_kriteria_['Nama_Kriteria'] == 'Minat dan Bakat') {
                array_push($data_minat_bakat, $sub_kriteria);
            }
            if ($data_kriteria_['Nama_Kriteria'] == 'Prestasi Akademik') {
                array_push($data_prestasi_akademik, $sub_kriteria);
            }
            if ($data_kriteria_['Nama_Kriteria'] == 'Penghasilan Orang Tua') {
                array_push($data_penghasilan_orang_tua, $sub_kriteria);
            }
        }
        return [
            'data_nilai_rapor' => $data_nilai_rapor,
            'data_minat_bakat' => $data_minat_bakat,
            'data_prestasi_akademik' => $data_prestasi_akademik,
            'data_penghasilan_orang_tua' => $data_penghasilan_orang_tua,
        ];
    }
    public function sub_alternatif_split($data_sub_alternatif)
    {
        $id_alternatif = $_GET['id'];
        $data_nilai_rapor = [];
        $data_minat_bakat = [];
        $data_prestasi_akademik = [];
        $data_penghasilan_orang_tua = [];
        foreach ($data_sub_alternatif as $key => $sub_alternatif) {
            if ($sub_alternatif['Id_Alternatif'] == $id_alternatif) {
                $data_kriteria_ = $this->dataKriteria->getWithParams('Id_Kriteria', $sub_alternatif['Id_Kriteria']);
                if ($data_kriteria_['Nama_Kriteria'] == 'Nilai Rapor') {
                    array_push($data_nilai_rapor, $sub_alternatif);
                }
                if ($data_kriteria_['Nama_Kriteria'] == 'Minat dan Bakat') {
                    array_push($data_minat_bakat, $sub_alternatif);
                }
                if ($data_kriteria_['Nama_Kriteria'] == 'Prestasi Akademik') {
                    array_push($data_prestasi_akademik, $sub_alternatif);
                }
                if ($data_kriteria_['Nama_Kriteria'] == 'Penghasilan Orang Tua') {
                    array_push($data_penghasilan_orang_tua, $sub_alternatif);
                }
            }
        }
        return [
            'data_nilai_rapor' => $data_nilai_rapor,
            'data_minat_bakat' => $data_minat_bakat,
            'data_prestasi_akademik' => $data_prestasi_akademik,
            'data_penghasilan_orang_tua' => $data_penghasilan_orang_tua,
        ];
    }
}