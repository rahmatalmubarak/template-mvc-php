<?php

namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Controller;

use SistemPendukungKeputusan\UINIB\PHP\MVC\App\View;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Helpers\Helper;
use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\User;

class AuthController
{
    private $user;
    private $response;
    private $helper;
    public function __construct()
    {
        $this->user = new User();
        $this->helper = new Helper;
        session_start();
    }
    function index(): void 
    {
        $data['title'] = 'Login';
        View::render('Dashboard/Auth/login',$data);
    }
    public function prosesLogin(){
        $result = $this->user->login($_POST);
        if($result){
            $_SESSION['user'] = $result;
            $this->helper->ResponseSession([],'Login Berhasil',false);
            $result['Level'] == 'admin' ? header('Location: ' . BASE_URL . 'dashboard/data-siswa') : header('Location: ' . BASE_URL . 'dashboard/profil');
        }else{
            $this->helper->ResponseSession([], 'Login Tidak berhasil. Periksa lagi data anda',true);
            header('Location: ' . BASE_URL . 'login');
        }
    }
    function register(): void 
    {
        $data['title'] = 'Register';
        View::render('Dashboard/Auth/register',$data);
    }
    
    public function tambahUser()
    {
        $result = $this->user->register($_POST);
        if($result == 1){
            $this->helper->ResponseSession([], 'Registarasi Berhasil', false);
            header('Location: ' . BASE_URL . 'login');
        }else{
            $this->helper->ResponseSession([], 'Registrasi Tidak berhasil. Periksa kembali data anda.', true);
            header('Location: ' . BASE_URL . 'register');
        }
    }
    
    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: ' . BASE_URL . 'login');
    }



}