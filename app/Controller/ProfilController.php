<?php

namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Controller;

use SistemPendukungKeputusan\UINIB\PHP\MVC\App\View;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Helpers\Helper;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\User;

class ProfilController
{
    private $user;
    private $response;
    private $helper;

    function __construct()
    {   
        $this->user = new User();
        $this->helper = new Helper;
    }
    function index(): void
    {
        $data['title'] = 'Profil Siswa';
        $result = $this->user->getWithParams('Id_User',$_SESSION['user']['Id_User']);
        if($result){
            $response = $this->helper->ResponseData($result, 'Data Berhasil Ditampilkan', false);
        }else{
            $response = $this->helper->ResponseData($result, 'Data Gagal Ditampilkan', true);
        }
        View::render('Dashboard/Templates/header', $data);
        View::render('Dashboard/Templates/sidebar');
        View::render('Dashboard/profil/index', $response);
        View::render('Dashboard/Templates/footer');
    }

    public function edit()
    {
        $ekstensi_diperbolehkan = array('png', 'jpg');
        $name_foto = $_SESSION['user']['foto'];
        if ($_FILES['foto'] && $_FILES['foto']['error'] == 0) {
            $name_gambar = $_FILES['foto']['name'];
            $explode = explode('.', $name_gambar);
            $ekstensi = strtolower(end($explode));
            $file_tmp = $_FILES['foto']['tmp_name'];
            $name_gambar = "user-" . random_int(999, 999999) . ".{$ekstensi}";
            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                $name_foto = $name_gambar;
                move_uploaded_file($file_tmp, __DIR__ . '/../../public/img/user/' . $name_foto);
                $_POST['foto'] = $name_foto;
            } else {
                $this->helper->ResponseSession([], 'Foto tidak bisa digunakan', true);
                header('Location: ' . BASE_URL . 'dashboard/profil');
                exit();
            }
        }
        
        $result = $this->user->edit($_POST);
        if($result){
            $data_user = $this->user->getWithParams('Id_User', $_SESSION['user']['Id_User']);
            $_SESSION['user'] = $data_user;
            $this->helper->ResponseSession($data_user, 'Data Berhasil Diupdate', false);
        }else{
            $this->helper->ResponseSession([], 'Data Gagal Diupdate', true);
        }
        header('Location: ' . BASE_URL . 'dashboard/profil');
    }

    function ubahPassword(): void
    {
        $data['title'] = 'Ubah Password Siswa';
        View::render('Dashboard/Templates/header', $data);
        View::render('Dashboard/Templates/sidebar');
        View::render('Dashboard/profil/edit-password', $this->response);
        View::render('Dashboard/Templates/footer');
    }

    function prosesUbahPassword(){
        $request['password_lama'] = md5($_POST['password_lama']);

        if($_SESSION['user']['Password'] != $request['password_lama']){
            $this->helper->ResponseSession([], 'Password Lama tidak sama', true);
            header('Location: ' . BASE_URL . 'dashboard/profil/ubah-password');
            exit();
        }else if($_POST['password_baru']
        != $_POST['konfirmasi_password_baru']){
            $this->helper->ResponseSession([], 'Password Tidak Sama', true);
            header('Location: ' . BASE_URL . 'dashboard/profil/ubah-password');
            exit();
        }
        $result = $this->user->updatePassword($_POST['password_baru'], $_SESSION['user']['Id_User']);

        if($result)
        {
            $_SESSION['user']['Password'] = md5($_POST['password_baru']);
            $this->helper->ResponseSession([], 'Password Berhasil Diubah', false);
        }else{
            $this->helper->ResponseSession([], 'Password Gagal Diubah', true);
        }
        header('Location: ' . BASE_URL . 'dashboard/profil/ubah-password');

    }
}