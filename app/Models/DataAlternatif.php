<?php

namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Models;

use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\Database;

class DataAlternatif{
    private $db;
    private $dataKlasifikasiMinatBakat;

    public function __construct()
    {
        $this->db = new Database;
        $this->dataKlasifikasiMinatBakat = new DataKlasifikasiMinatBakat;
    }
    public function count_page()
    {
        $query = "SELECT * FROM alternatif";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function all($data){
        $query = "SELECT * FROM alternatif";
        if(isset($data['cari_data']) && $data['cari_data'] != null){
            $cari_data = $data['cari_data'];
            $query = $query . " WHERE Nama LIKE '%$cari_data%'";
        }
        if(isset($data['jumlah_data'])){
            $jumlah_data = $data['jumlah_data'];
            $query = $query . " LIMIT $jumlah_data";
        }else{
            $query = $query . " LIMIT 10";
        }
        if(isset($data['page'])){
            $page = (int)$data['page'];
            $page = $page * $data['jumlah_data'];   
            $query = $query . " OFFSET $page";
        }
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function add($data){
        $query = "INSERT INTO alternatif(Nama) VALUES (:nama)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->execute();
        $this->db->rowCount();

        $alternatif = $this->getWithParams('Nama', $data['nama']);
        $this->dataKlasifikasiMinatBakat->add($data, $alternatif['Id_Alternatif']);
        return true;
    }

    public function edit($data){
        $query = "UPDATE alternatif SET Nama=:nama WHERE Id_Alternatif=:id_alternatif";
        $this->db->query($query);
        $this->db->bind('id_alternatif', $data['id_alternatif']);
        $this->db->bind('nama', $data['nama']);
        $this->db->execute();

        $isKlasifikasi_minat_bakat = $this->dataKlasifikasiMinatBakat->getWithParams('Id_Alternatif', $data['id_alternatif']);
        if($isKlasifikasi_minat_bakat){
            $this->dataKlasifikasiMinatBakat->edit($data);
        }else{
            $this->dataKlasifikasiMinatBakat->add($data, $data['id_alternatif']);
        }
        return true;
    }

    public function getWithParams($field, $data)
    {
        $query = "SELECT * FROM alternatif WHERE {$field} = :data";
        $this->db->query($query);
        $this->db->bind('data', $data);
        $response = $this->db->single();
        return $response;
    }

    public function hapus($id_alternatif){
        $query = "DELETE FROM alternatif WHERE Id_Alternatif =:id_alternatif";
        $this->db->query($query);
        $this->db->bind('id_alternatif', $id_alternatif);
        $this->db->execute();
        return $this->db->rowCount();
    }
}