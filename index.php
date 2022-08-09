<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <h1> APLIKASI KLINIK</h1>
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Log</b>in</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Masukan Username dan Password</p>

                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    if ($username == '' || $password == '') {  ?>
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <?php
                            echo "<strong>ERROR!!</strong> FORM Belum Lengkap !!";
                            ?>
                        </div>
                        <?php
                    } else {
                        include 'config.php';
                        $login = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
                        $jml = mysqli_num_rows($login);
                        $d = mysqli_fetch_array($login);

                        if ($jml > 0) {
                            session_start();
                            $_SESSION['login'] = TRUE;
                            $_SESSION['usernmae'] = $d['username'];
                            $_SESSION['password'] = $d['password'];
                            $_SESSION['email'] = $d['email'];
                            header("Location:menu.php");
                        } else {


                        ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <?php
                                echo "<strong>Error!</strong> Username dan Password anda Salah!!!";
                                ?>
                            </div>
                <?php
                        }
                    }
                } ?>

                <form action="cek_login.php" method="post">
                    <div class="input-group mb-3">
                        <input name="username" type="text" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div> -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <!-- <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div> -->
                <!-- /.social-auth-links -->

                <!-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p> -->
                <!-- <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <style>
        #footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px;
            /* tinggi dari footer */
            background: #6cf;
        }
    </style>
    <footer id="footer" class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-dark" href="#">Ispan F.F</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

</body>


</html>