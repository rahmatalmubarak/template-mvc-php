<?php if (isset($_SESSION['response'])) : ?>
    <script>
        let message = '<?= $_SESSION['response']['message'] ?>';
        let is_error = '<?= $_SESSION['response']['error'] ?>' == 'true' ? true : false;
        Swal.fire(
            'Alert!',
            message,
            is_error ? 'error' : 'success',
        )
    </script>
<?php unset($_SESSION['response']);
endif; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/adminlte.min.css">
    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    .btn-danger {
        color: #fff;
        background-color: #78201a;
        border-color: #78201a;
        box-shadow: none;
    }

    .card-danger.card-outline {
        border-top: 3px solid #78201a;
    }
</style>

<body>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6" style="display: flex; flex-direction: column; justify-content: center; align-items: center;height: 100vh;background-color: #78201a; padding: 150px 0px">
                    <img src="img/uin_login.jpg" alt="uin_login" style="border-radius: 50%; height: 15rem;">
                    <div style="margin: 20px 40px; ">
                        <p style="font-size: 35px;text-align: center;color: aliceblue;font-weight: 500; text-transform: uppercase;">Sistem Pendukung Keputusan Pemilihan Program Studi di UIN Imam Bonjol Padang</p>
                    </div>
                </div>
                <div class="col-lg-6 hold-transition login-page">
                    <div class="login-box">
                        <!-- /.login-logo -->
                        <div class="card card-outline card-danger">
                            <div class="card-header text-center">
                                <div style="display: flex; flex-direction: column; align-items: center; font-weight: 500;">
                                    <img class="img-circle elevation-2" style="max-height: 50px; max-width: 50px;" src="img/logo_uin.jpg" alt="">
                                    <span>UIN Imam Bonjol <br> Padang</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="login-box-msg" style="font-weight: 800;">Register</h3>
                                <form action="<?= BASE_URL; ?>register/add" method="post">
                                    <input type="text" name="level" id="level" value="Siswa" hidden>
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        <input type="number" name="nisn" id="nisn" class="form-control" placeholder="NISN" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-home"></span>
                                            </div>
                                        </div>
                                        <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" placeholder="Asal Sekolah" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="<?= BASE_URL; ?>login" style="color: blue;">Login</a>
                                        </div>
                                    </div>
                                    <div class="social-auth-links text-center mt-2 mb-3">
                                        <button href="#" class="btn btn-block btn-danger">Register</button>
                                    </div>
                                </form>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= BASE_URL; ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= BASE_URL; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= BASE_URL; ?>js/adminlte.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <?php ?>
</body>

</html>