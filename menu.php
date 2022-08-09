<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Pasien</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
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

        <!-- MAIN KONTEN -->
        <div class="content-wrapper">
            <br>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Masukan Data</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="tambah.php" method="post">
                                    <?php
                                    include "config.php";

                                    ?>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="id">No Rekam Medis</label>
                                            <?php
                                            $sql = mysqli_query($conn, "SELECT no_rm FROM mast_pasien");
                                            echo '<input type="text" class="form-control" id="id" value ="';
                                            $id = "01";

                                            if (mysqli_num_rows($sql) == 0) {
                                                echo $id;
                                            }

                                            $result = mysqli_num_rows($sql);
                                            $counter = 0;
                                            while (list($id) = mysqli_fetch_array($sql)) {
                                                if (++$counter == $result) {
                                                    $id++;
                                                    echo $id;
                                                }
                                            }

                                            echo '"name="no_rm" placeholder="Id" readonly';

                                            ?>


                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pasien</label>
                                            <input name="nama" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Pasien">
                                        </div>
                                        <div class=" form-group">
                                            <label>Alamat</label>
                                            <input name="alamat" type="text" class="form-control" id="exampleInputPassword1" placeholder="Alamat">
                                        </div>
                                        <div class=" form-group">
                                            <label>Tanggal Lahir</label>
                                            <input name="tgl_lahir" type="date" class="form-control" id="exampleInputPassword1" placeholder="Tanggal Lahir">
                                        </div>
                                        <div class=" form-group">
                                            <label>Jenis Kelamin</label>
                                            <input name="gender" type="text" class="form-control" id="exampleInputPassword1" placeholder="Jenis Kelamin">
                                        </div>
                                        <div class=" form-group">
                                            <!-- <label>Jenis Kelamin</label> -->
                                            <!-- <input name="tgl_daftar" type="date" class="form-control" id="exampleInputPassword1" value="<?= date("d m Y"); ?>" hidden> -->
                                        </div>
                                        <!-- <div class=" form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                        </div> -->
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button name="kirim" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </section>



        </div>



    </div>

</body>

</html>