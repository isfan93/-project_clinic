<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <script src="dt/jquery-3.5.1.js"></script>
    <!-- <script src="jquery.dataTables.min.js"></script> -->
    <!-- <link rel="stylesheet" href="dt/bootstrap.min.css"> -->

    <link rel="stylesheet" href="dt/dataTables.bootstrap5.min.css">

    <!-- Theme style -->
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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Daftar Pasien</h1>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="">
                                <!-- <div class="card-header">
                                    <h3 class="card-title">dataTable</h3>
                                </div> -->
                                <!-- card body -->
                                <div class="container">

                                    <!-- <a href="menu.php" class="btn btn-success">Tambah Data</a> -->


                                    <div class="card mt-2">
                                        <div class="card-body">
                                            <table id="example1" class="table table-striped" style="width:100%">
                                                <thead>
                                                    <tr style="text-align :center ;">
                                                        <th>No</th>
                                                        <th>No Rekam Medis</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Alamat</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th style="text-align: center ;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    include 'config.php';
                                                    $sql = mysqli_query($conn, "SELECT * FROM mast_pasien");
                                                    $no = 1;

                                                    while ($d = mysqli_fetch_array($sql)) : ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $d['no_rm']; ?></td>
                                                            <td><?php echo $d['nama']; ?></td>
                                                            <td><?php echo $d['alamat']; ?></td>
                                                            <td><?php echo date("d M Y", strtotime($d['tgl_lahir'])) ?></td>
                                                            <td><?php echo $d['gender']; ?></td>
                                                            <td style=" text-align: center ;">
                                                                <div class="btn-group">
                                                                    <a href="input_obat.php?no_rm=<?php echo $d['no_rm']; ?>" type="button" class="btn btn-info">Tambah Obat</a>
                                                                    <!-- <a href="edit_pasien.php?no_rm=<?= $d['no_rm']; ?>" type="button" class="btn btn-danger">Batal</a> -->
                                                                </div>
                                                                <!-- <a class="btn btn-block btn-outline-success btn-md" href="#">Detail</a>
                                                            <a class="btn btn-block btn-outline-primary btn-md" href="#">Edit</a>
                                                            <a class="btn btn-block btn-outline-danger btn-md" href="#">Hapus</a> -->
                                                            </td>
                                                        </tr>
                                                    <?php endwhile ?>
                                                </tbody>

                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->

    <script src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="DataTables/assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="DataTables/assets/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        });
    </script>
</body>

</html>