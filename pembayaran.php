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
        <?php
        include 'aside.php';
        include 'config.php';

        session_start();

        $no = 1;
        $no_rm = $_GET['no_rm'];
        ?>

        <!-- MAIN KONTEN -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 style="text-align: center ;">DAFTAR YANG HARUS DIBAYAR</h1>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="container">
                                <table>
                                    <?php
                                    $pasien = mysqli_query($conn, "SELECT * FROM trans_tindakan WHERE no_rm ='$no_rm'");
                                    $ps = mysqli_fetch_array($pasien);
                                    ?>
                                    <tr>
                                        <td>Nama Pasien</td>
                                        <td>:</td>
                                        <td><?= $ps['nama_px']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No Rekam Medis </td>
                                        <td>:</td>
                                        <td><?= $ps['no_rm']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal </td>
                                        <td>:</td>
                                        <td>1 Januari 2022</td>
                                    </tr>

                                </table>
                                <div class="card mt-2">
                                    <div class="card-body">

                                        <table class="table-striped" style="width:100% ;">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tindakan dan Alkes</th>
                                                    <th>Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = mysqli_query($conn, "SELECT * FROM trans_tindakan WHERE no_rm = '$no_rm'");
                                                $sql2 = mysqli_query($conn, "SELECT SUM(harga) as subtot FROM trans_tindakan WHERE no_rm ='$no_rm'");
                                                $tot1 = mysqli_fetch_array($sql2);

                                                while ($byrt = mysqli_fetch_array($sql)) { ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $byrt['nama_tindakan']; ?></td>
                                                        <td><?= $byrt['harga']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                                <!-- <td style="background-color: blue ; font-size: 20px;">Sub Total </td>
                                                <td style="background-color: blue ;"></td>
                                                <td style="background-color: blue ; font-size: 20px;"><?= $tot1['subtot']; ?></td> -->

                                                <?php
                                                $sql = mysqli_query($conn, "SELECT * FROM trans_obat WHERE no_rm = '$no_rm'");
                                                $sql2 = mysqli_query($conn, "SELECT SUM(harga) as subtot FROM trans_obat WHERE no_rm ='$no_rm'");
                                                $tot2 = mysqli_fetch_array($sql2);
                                                while ($byrt = mysqli_fetch_array($sql)) { ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $byrt['nama_obat']; ?></td>
                                                        <td><?= $byrt['harga']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                                <!-- <td style="background-color: blue ; font-size: 20px;">Sub Total </td>
                                                <td style="background-color: blue ;"></td>
                                                <td style="background-color: blue ; font-size: 20px;"><?= $tot2['subtot']; ?></td>
                                            </tbody> -->
                                            </tbody>
                                            <tfoot>
                                                <?php
                                                $total = $tot1['subtot'] + $tot2['subtot'];
                                                ?>
                                                <td>TOTAL</td>
                                                <td></td>
                                                <td style=" font-size: 25px;"><?= $total; ?></td>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                <a href="cetak_pembayaran.php?no_rm=<?= $ps['no_rm'] ?>" class="btn btn-success col-sm-2" target="#">Bayar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>

    <!-- <script src=" https://code.jquery.com/jquery-3.1.0.js">
                                                    </script>
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