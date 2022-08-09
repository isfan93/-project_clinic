<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->


        <nav class="main-header navbar navbar-expand navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="home.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

        </nav>
        <?php include 'aside.php' ?>

        <br>
        <div style="margin-left: 80px ;" class=" col-lg-12 col-2">
            <div class="small-box bg-primary">
                <center>
                    <h2><?= date('Y-m-d'); ?></h2>
                    <h3 style="font-size: 50px; font-family: arial;" id="jam"></h3>
                </center>
            </div>
        </div>
        <div style="margin-top: 10px ;" class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dashboard</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->

            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row" style="margin:auto;">
                        <?php
                        $count = mysqli_query($conn, "SELECT COUNT(*) AS total FROM mast_pasien");
                        $data = mysqli_fetch_array($count);
                        ?>
                        <!-- card bpx -->
                        <div class=" col-lg-3 col-12">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $data['total']; ?></h3>
                                    <p>Jumlah Semua Pasien</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-wheelchair"></i>
                                </div>
                                <a href="mast_pasien.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- end card-box -->
                        <!-- card bpx -->
                        <?php
                        $tgl = date("Y-m-d");
                        $px = mysqli_query($conn, "SELECT COUNT(*) as tot FROM mast_pasien WHERE tgl_daftar ='$tgl' ");
                        $dt = mysqli_fetch_array($px);
                        ?>
                        <div class="col-lg-3 col-12">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= $dt['tot']; ?></h3>
                                    <p>Pasien Hari ini</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="menu2.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- card bpx -->
                        <?php
                        $count_obt = mysqli_query($conn, "SELECT COUNT(*) AS total_o FROM mast_obat");
                        $dt = mysqli_fetch_array($count_obt);
                        ?>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= $dt['total_o']; ?></h3>
                                    <p>Daftar Obat</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="master.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- card bpx -->
                        <?php
                        $count_t = mysqli_query($conn, "SELECT COUNT(*) AS total_t FROM mast_tindakan");
                        $dt = mysqli_fetch_array($count_t);
                        ?>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= $dt['total_t']; ?></h3>
                                    <p>Daftar Tindakan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="master.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end card-box -->

                </div>
                <!-- end card-box -->



        </div>

    </div>




</body>

</html>
<script type="text/javascript">
    window.onload = function() {
        jam();
    }

    function jam() {
        var e = document.getElementById('jam'),
            d = new Date(),
            h, m, s;
        h = d.getHours();
        m = set(d.getMinutes());
        s = set(d.getSeconds());

        e.innerHTML = h + ':' + m + ':' + s;

        setTimeout('jam()', 1000);
    }

    function set(e) {
        e = e < 10 ? '0' + e : e;
        return e;
    }
</script>