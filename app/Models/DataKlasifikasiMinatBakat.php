<?php

namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Models;

use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\Database;

class DataKlasifikasiMinatBakat{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function add($data, $Id_Alternatif){
        $query = "INSERT INTO klasifikasi_minat_bakat (Id_Alternatif, Id_Sub_Kriteria) VALUES (:id_alternatif, :id_sub_kriteria)";
        $this->db->query($query);
        $this->db->bind('id_alternatif', $Id_Alternatif);
        $this->db->bind('id_sub_kriteria', $data['minat_bakat']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function edit($data){
        $query = "UPDATE klasifikasi_minat_bakat SET Id_Alternatif=:id_alternatif, Id_Sub_Kriteria=:id_sub_kriteria WHERE Id_Alternatif=:id_alternatif";
        $this->db->query($query);
        $this->db->bind('id_alternatif', $data['id_alternatif']);
        $this->db->bind('id_sub_kriteria', $data['minat_bakat']);
        $this->db->bind('nama', $data['nama']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getWithParams($field, $data)
    {
        $query = "SELECT klasifikasi_minat_bakat.*, alternatif.* , sub_kriteria.Id_Sub_Kriteria FROM klasifikasi_minat_bakat 
                INNER JOIN  alternatif ON klasifikasi_minat_bakat.Id_Alternatif = alternatif.Id_Alternatif 
                INNER JOIN  sub_kriteria ON klasifikasi_minat_bakat.Id_Sub_Kriteria = sub_kriteria.Id_Sub_Kriteria 
                WHERE klasifikasi_minat_bakat.{$field} = :data";
        $this->db->query($query);
        $this->db->bind('data', $data);
        $response = $this->db->single();
        return $response;
    }

    public function getWithParamsAll($field, $data)
    {
        $query = "SELECT klasifikasi_minat_bakat.*, alternatif.* , sub_kriteria.Id_Sub_Kriteria FROM klasifikasi_minat_bakat 
                INNER JOIN  alternatif ON klasifikasi_minat_bakat.Id_Alternatif = alternatif.Id_Alternatif 
                INNER JOIN  sub_kriteria ON klasifikasi_minat_bakat.Id_Sub_Kriteria = sub_kriteria.Id_Sub_Kriteria 
                WHERE klasifikasi_minat_bakat.{$field} = :data";
        $this->db->query($query);
        $this->db->bind('data', $data);
        $response = $this->db->resultSet();
        return $response;
    }
}