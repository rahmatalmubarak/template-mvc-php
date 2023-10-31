<?php

namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Models;

use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\Database;

class DataPenilaian{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function count_page()
    {
        $query = "SELECT * FROM penilaian";
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
        $query = "INSERT INTO penilaian(Id_Sub_Kriteria,Id_Alternatif,Nilai) VALUES (:Id_Sub_Kriteria,:Id_Alternatif,:Nilai)";
        $this->db->query($query);
        $this->db->bind('Id_Sub_Kriteria', $data['Id_Sub_Kriteria']);
        $this->db->bind('Id_Alternatif', $data['Id_Alternatif']);
        $this->db->bind('Nilai', $data['Nilai']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function edit($data){
        $query = "UPDATE penilaian SET Id_Sub_Kriteria=:Id_Sub_Kriteria,Nilai=:Nilai WHERE Id_Penilaian=:Id_Penilaian";
        $this->db->query($query);
        $this->db->bind('Id_Penilaian', $data['Id_Penilaian']);
        $this->db->bind('Id_Sub_Kriteria', $data['Id_Sub_Kriteria']);
        $this->db->bind('Nilai', $data['Nilai']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getWithParams($field, $data)
    {
        $query = "SELECT * FROM penilaian WHERE {$field} = :data";
        $this->db->query($query);
        $this->db->bind('data', $data);
        $response = $this->db->single();
        return $response;
    }

    public function getWithParamsAll($field, $data)
    {
        $query = "SELECT * FROM penilaian WHERE {$field} = :data";
        $this->db->query($query);
        $this->db->bind('data', $data);
        return $this->db->resultSet();
    }
}