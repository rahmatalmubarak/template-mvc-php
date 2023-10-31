<?php 
namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Models;

class DataPerhitungan{
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function all(){
        $query = "SELECT * FROM hasil_perhitungan_SAW";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function add($data){
        $query = "INSERT INTO hasil_perhitungan_SAW (Id_Alternatif, Nilai) VALUES (:Id_Alternatif, :Nilai_Akhir)";
        $this->db->query($query);
        $this->db->bind('Id_Alternatif', $data['Id_Alternatif']);
        $this->db->bind('Nilai_Akhir', $data['Nilai_Akhir']);
        $this->db->execute();
        return $this->db->rowCount();
    }   

    public function edit($data){
        $query = "UPDATE hasil_perhitungan_saw SET Id_Alternatif=:Id_Alternatif,Nilai=:Nilai_Akhir WHERE Id_Hasil_SAW=:Id_Hasil_SAW";
        $this->db->query($query);   
        $this->db->bind('Id_Alternatif', $data['Id_Alternatif']);
        $this->db->bind('Nilai_Akhir', $data['Nilai_Akhir']);
        $this->db->bind('Id_Hasil_SAW', $data['Id_Hasil_SAW']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getWithParams($field, $data)
    {
        $query = "SELECT * FROM hasil_perhitungan_saw WHERE {$field} = :data";
        $this->db->query($query);
        $this->db->bind('data', $data);
        $response = $this->db->single();
        return $response;
    }

    public function rangking()
    {
        $query = "SELECT * FROM hasil_perhitungan_saw JOIN alternatif ON hasil_perhitungan_saw.Id_Alternatif = alternatif.Id_Alternatif
                    ORDER BY Nilai DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }
}