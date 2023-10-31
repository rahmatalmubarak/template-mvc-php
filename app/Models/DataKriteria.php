<?php

namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Models;

use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\Database;

class DataKriteria{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function count_page()
    {
        $query = "SELECT * FROM kriteria";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function all($data){
        $query = "SELECT * FROM kriteria";
        if(isset($data['cari_data']) && $data['cari_data'] != null){
            $cari_data = $data['cari_data'];
            $query = $query . " WHERE Nama_Kriteria LIKE '%$cari_data%' OR 
                        Bobot_Kriteria LIKE '%$cari_data%' OR
                        Jenis_Kriteria LIKE '%$cari_data%'";
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
        $query = "INSERT INTO kriteria(Kode_Kriteria, Nama_Kriteria, Bobot_Kriteria, Jenis_Kriteria) VALUES (:kode_kriteria,:nama_kriteria,:bobot_kriteria,:jenis_kriteria)";
        $this->db->query($query);
        $this->db->bind('kode_kriteria', $data['kode_kriteria']);
        $this->db->bind('nama_kriteria', $data['nama_kriteria']);
        $this->db->bind('bobot_kriteria', $data['bobot_kriteria']);
        $this->db->bind('jenis_kriteria', $data['jenis_kriteria']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function edit($data){
        $query = "UPDATE kriteria SET Kode_Kriteria=:kode_kriteria,Nama_Kriteria=:nama_kriteria,Bobot_Kriteria=:bobot_kriteria,Jenis_Kriteria=:jenis_kriteria WHERE Id_Kriteria=:id_kriteria";
        $this->db->query($query);
        $this->db->bind('id_kriteria', $data['id_kriteria']);
        $this->db->bind('kode_kriteria', $data['kode_kriteria']);
        $this->db->bind('nama_kriteria', $data['nama_kriteria']);
        $this->db->bind('bobot_kriteria', $data['bobot_kriteria']);
        $this->db->bind('jenis_kriteria', $data['jenis_kriteria']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getWithParams($field, $data)
    {
        $query = "SELECT * FROM kriteria WHERE {$field} = :data";
        $this->db->query($query);
        $this->db->bind('data', $data);
        $response = $this->db->single();
        return $response;
    }

    public function hapus($id_kriteria){
        $query = "DELETE FROM `kriteria` WHERE Id_Kriteria =:id_kriteria";
        $this->db->query($query);
        $this->db->bind('id_kriteria', $id_kriteria);
        $this->db->execute();
        return $this->db->rowCount();
    }
}