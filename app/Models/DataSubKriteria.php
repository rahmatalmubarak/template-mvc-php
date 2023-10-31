<?php

namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Models;

use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\Database;

class DataSubKriteria{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function count_page()
    {
        $query = "SELECT * FROM sub_kriteria";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function all(){
        $query = "SELECT * FROM sub_kriteria";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function add($data){
        $query = "INSERT INTO sub_kriteria (Id_Kriteria, Nama, Bobot, Nilai) VALUES (:id_kriteria,:nama,:bobot,:nilai)";
        $this->db->query($query);
        $this->db->bind('id_kriteria', $data['id_kriteria']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('bobot', $data['bobot']);
        $this->db->bind('nilai', $data['nilai']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function edit($data){
        $query = "UPDATE sub_kriteria SET Id_Kriteria=:id_kriteria,Nama=:nama,Bobot=:bobot,Nilai=:nilai WHERE Id_Sub_Kriteria=:id_sub_kriteria";
        $this->db->query($query);
        $this->db->bind('id_sub_kriteria', $data['id_sub_kriteria']);
        $this->db->bind('id_kriteria', $data['id_kriteria']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('bobot', $data['bobot']);
        $this->db->bind('nilai', $data['nilai']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getWithParams($field, $data)
    {
        $query = "SELECT * FROM sub_kriteria WHERE {$field} = :data";
        $this->db->query($query);
        $this->db->bind('data', $data);
        $response = $this->db->single();
        return $response;
    }

    public function getWithParamsAll($field, $data)
    {
        $query = "SELECT * FROM sub_kriteria WHERE {$field} = :data";
        $this->db->query($query);
        $this->db->bind('data', $data);
        return $this->db->resultSet();
    }

    public function hapus($id_sub_kriteria){
        $query = "DELETE FROM sub_kriteria WHERE Id_Sub_Kriteria=:id_sub_kriteria";
        $this->db->query($query);
        $this->db->bind('id_sub_kriteria', $id_sub_kriteria);
        $this->db->execute();
        return $this->db->rowCount();
    }
}