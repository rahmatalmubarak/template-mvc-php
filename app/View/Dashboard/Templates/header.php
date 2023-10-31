<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $response['title'] ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/summernote/summernote-bs4.min.css">
    <!-- jQuery -->
    <script src="<?= BASE_URL; ?>plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= BASE_URL; ?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= BASE_URL; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= BASE_URL; ?>plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= BASE_URL; ?>plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?= BASE_URL; ?>plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= BASE_URL; ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= BASE_URL; ?>plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= BASE_URL; ?>plugins/moment/moment.min.js"></script>
    <script src="<?= BASE_URL; ?>plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= BASE_URL; ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?= BASE_URL; ?>plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= BASE_URL; ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= BASE_URL; ?>js/adminlte.js"></script>
</head>
<style>
    .nav-logout {
        display: flex;
        align-items: center;
    }

    .user-panel img {
        width: 3rem
    }

    .name-user {
        color: white;
        font-size: 15px;
    }

    .navbar-danger {
        background-color: #78201a;
    }

    .btn-danger {
        color: #fff;
        background-color: #78201a;
        border-color: #78201a;
        box-shadow: none;
    }

    .bg-danger {
        background-color: #78201a !important;
    }

    .card-danger.card-outline {
        border-top: 3px solid #78201a;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-danger navbar-light" style="height: 84px;">
            <!-- LEFT navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: #ffffff;"></i></a>
                </li>
            </ul>

            <!-- <ul class="navbar-nav" data-widget="pushmenu" href="#" role="button">
                <div style="display: flex; flex-direction: column; font-size: 14px; font-weight: bold; align-items: center;">
                    <span>Selemat Datang di SPK Pemilihan Program Studi</span>
                </div>
            </ul> -->
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link nav-logout" data-toggle="dropdown" href="#">
                        <div class="user-panel image">
                            <img src="<?= $_SESSION['user']['Foto'] != null ? BASE_URL . 'img/user/' . $_SESSION['user']['Foto'] : BASE_URL . 'img/user2-160x160.jpg' ?>" class="img-circle elevation-2 mr-2" alt="User Image">
                            <span class="name-user"><?= $_SESSION['user']['Nama_Lengkap']; ?></span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Pilihan</span>
                        <div class="dropdown-divider"></div>
                        <a href="<?= BASE_URL; ?>dashboard/profil/ubah-password" class="dropdown-item">
                            <i class="fas fa-lock mr-2"></i> Ubah Password
                        </a>
                        <a href="<?= BASE_URL; ?>/logout" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->