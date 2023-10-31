<?php 
namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Models;

use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\Database;

class DataSiswa {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function count_page()
    {
        $query = "SELECT * FROM data_user";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function add($data)
    {
        $query = "INSERT INTO data_user(Id_User, NilaiX_SmtI, NilaiX_SmtII, NilaiXI_SmtI, NilaiXI_SmtII, NilaiXII_SmtI, NilaiXII_SmtII, Nilai_Rapor, Minat_Bakat, Prestasi_Akademik, Penghasilan_Ortu) VALUES (:id_user,:nilaix_xmti,:nilaix_xmtii,:nilaix_ximti,:nilaix_ximtii,:nilaix_xiimti,:nilaix_xiimtii,:nilai_rapor,:minat_bakat,:prestasi_akademik,:penghasilan_orang_tua)";

        $this->db->query($query);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('nilaix_xmti', $data['nilaix_xmti']);
        $this->db->bind('nilaix_xmtii', $data['nilaix_xmtii']);
        $this->db->bind('nilaix_ximti', $data['nilaix_ximti']);
        $this->db->bind('nilaix_ximtii', $data['nilaix_ximtii']);
        $this->db->bind('nilaix_xiimti', $data['nilaix_xiimti']);
        $this->db->bind('nilaix_xiimtii', $data['nilaix_xiimtii']);
        $this->db->bind('nilai_rapor', $data['nilai_rapor']);
        $this->db->bind('minat_bakat', $data['minat_bakat']);
        $this->db->bind('prestasi_akademik', $data['prestasi_akademik']);
        $this->db->bind('penghasilan_orang_tua', $data['penghasilan_orang_tua']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function edit($data,$Id_User)
    {
        $query = "UPDATE data_user SET Id_User=:id_user,NilaiX_SmtI=:nilaix_xmti,NilaiX_SmtII=:nilaix_xmtii,NilaiXI_SmtI=:nilaix_ximti,NilaiXI_SmtII=:nilaix_ximtii,NilaiXII_SmtI=:nilaix_xiimti,NilaiXII_SmtII=:nilaix_xiimtii,Nilai_Rapor=:nilai_rapor,Minat_Bakat=:minat_bakat,Prestasi_Akademik=:prestasi_akademik,Penghasilan_Ortu=:penghasilan_orang_tua WHERE Id_User = :id_user";

        $this->db->query($query);
        $this->db->bind('id_user', $Id_User);
        $this->db->bind('nilaix_xmti', $data['nilaix_xmti']);
        $this->db->bind('nilaix_xmtii', $data['nilaix_xmtii']);
        $this->db->bind('nilaix_ximti', $data['nilaix_ximti']);
        $this->db->bind('nilaix_ximtii', $data['nilaix_ximtii']);
        $this->db->bind('nilaix_xiimti', $data['nilaix_xiimti']);
        $this->db->bind('nilaix_xiimtii', $data['nilaix_xiimtii']);
        $this->db->bind('nilai_rapor', $data['nilai_rapor']);
        $this->db->bind('minat_bakat', $data['minat_bakat']);
        $this->db->bind('prestasi_akademik', $data['prestasi_akademik']);
        $this->db->bind('penghasilan_orang_tua', $data['penghasilan_orang_tua']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getWithParams($field, $data)
    {
        $query = "SELECT * FROM data_user WHERE {$field} = :data";
        $this->db->query($query);
        $this->db->bind('data', $data);
        return $this->db->single();
    }
}