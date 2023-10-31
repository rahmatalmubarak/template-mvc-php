<?php

namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Models;

use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\Database;

class User {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function count_page(){
        $query = "SELECT * FROM user WHERE NOT Level = 'admin'";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function all($data)
    {
        $query = "SELECT * FROM user";
        if (isset($data['cari_data']) && $data['cari_data'] != null) {
            $cari_data = $data['cari_data'];
            $query = $query . " WHERE Nama_Lengkap LIKE '%$cari_data%'  AND NOT Level = 'admin'";
        }else{
            $query = $query . " WHERE NOT Level = 'admin'";
        }
        if (isset($data['jumlah_data'])) {
            $jumlah_data = $data['jumlah_data'];
            $query = $query . " LIMIT $jumlah_data";
        } else {
            $query = $query . " LIMIT 10";
        }
        if (isset($data['page'])) {
            $page = (int)$data['page'];
            $page = $page * $data['jumlah_data'];
            $query = $query . " OFFSET $page";
        }
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function login($data){
        $query = "SELECT * FROM user WHERE username = :username AND password = :password";
        $this->db->query($query);
        $this->db->bind('username',$data['username']);
        $this->db->bind('password',md5($data['password']));
        $response = $this->db->single();
        return $response;
    }

    public function register($data){
        $query = "INSERT INTO user(NISN,Nama_Lengkap,Asal_Sekolah,Level,Username,Password) VALUES (:nisn,:nama_lengkap,:asal_sekolah,:level,:username,:password)";
        $this->db->query($query);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('asal_sekolah', $data['asal_sekolah']);
        $this->db->bind('level', $data['level']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', md5($data['password']));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function edit($data)
    {
        if($data['foto'] == NULL){
          $query = "UPDATE user SET NISN=:nisn, Nama_Lengkap=:nama_lengkap, Asal_Sekolah=:asal_sekolah WHERE Id_User = :id_user";  
        }else{
            $query = "UPDATE user SET Foto=:foto, NISN=:nisn, Nama_Lengkap=:nama_lengkap, Asal_Sekolah=:asal_sekolah WHERE Id_User = :id_user";
        }
        $this->db->query($query);
        $this->db->bind('id_user', $_SESSION['user']['Id_User']);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('asal_sekolah', $data['asal_sekolah']);
        $data['foto'] == NULL ? NULL : $this->db->bind('foto', $data['foto']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getWithParams($field,$data)
    {
        $query = "SELECT * FROM user WHERE {$field} = :data";
        $this->db->query($query);
        $this->db->bind('data', $data);
        $response = $this->db->single();
        return $response;
    }

    public function updatePassword($data, $id_user)
    {
        $query = "UPDATE user SET password=:password WHERE Id_User = :id_user";
        $this->db->query($query);
        $this->db->bind('password', md5($data));
        $this->db->bind('id_user', $id_user);
        $this->db->execute();
        return $this->db->rowCount();
    }
}