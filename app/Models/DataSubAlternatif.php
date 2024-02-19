<?php

namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Models;

use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\Database;

class DataSubAlternatif{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function count_page()
    {
        $query = "SELECT * FROM sub_alternatif";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function all(){
        $query = "SELECT * FROM sub_alternatif";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function add($data){
        $query = "INSERT INTO sub_alternatif (Id_Alternatif, Id_Kriteria, Nama, Bobot, Nilai) VALUES (:id_alternatif,:id_kriteria,:nama,:bobot,:nilai)";
        $this->db->query($query);
        $this->db->bind('id_alternatif', $data['id_alternatif']);
        $this->db->bind('id_kriteria', $data['id_kriteria']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('bobot', $data['bobot']);
        $this->db->bind('nilai', $data['nilai']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function edit($data){
        $query = "UPDATE sub_alternatif SET Id_Alternatif=:id_alternatif,Nama=:nama,Bobot=:bobot,Nilai=:nilai WHERE Id_Sub_Alternatif=:id_sub_alternatif";
        $this->db->query($query);
        $this->db->bind('id_sub_alternatif', $data['id_sub_alternatif']);
        $this->db->bind('id_alternatif', $data['id_alternatif']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('bobot', $data['bobot']);
        $this->db->bind('nilai', $data['nilai']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getWithParams($field, $data)
    {
        $query = "SELECT * FROM sub_alternatif WHERE {$field} = :data";
        $this->db->query($query);
        $this->db->bind('data', $data);
        $response = $this->db->single();
        return $response;
    }

    public function getWithParamsAll($field, $data)
    {
        $query = "SELECT * FROM sub_alternatif WHERE {$field} = :data";
        $this->db->query($query);
        $this->db->bind('data', $data);
        return $this->db->resultSet();
    }

    public function getWithNilaiParams($id_kriteria, $id_alternatif)
    {
        $query = "SELECT * FROM sub_alternatif WHERE Id_kriteria = :id_kriteria AND Id_Alternatif = :id_alternatif";
        $this->db->query($query);
        $this->db->bind('id_kriteria', $id_kriteria);
        $this->db->bind('id_alternatif', $id_alternatif);
        return $this->db->resultSet();
    }

    public function hapus($id_sub_alternatif){
        $query = "DELETE FROM sub_alternatif WHERE Id_Sub_Alternatif=:id_sub_alternatif";
        $this->db->query($query);
        $this->db->bind('id_sub_alternatif', $id_sub_alternatif);
        $this->db->execute();
        return $this->db->rowCount();
    }
}