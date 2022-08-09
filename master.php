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


                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6">
                            <div class="">
                                <!-- <div class="card-header">
                                    <h3 class="card-title">dataTable</h3>
                                </div> -->
                                <!-- card body -->
                                <div class="container">

                                    <!-- <a href="menu.php" class="btn btn-success">Tambah Data</a> -->

                                    <a href="tambah_tindakan.php" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#add_data_Modal">Tambah Tindakan Baru</a>
                                    <div class="card mt-2">
                                        <div class="card-body">
                                            <h2>Master Tindakan</h2>
                                            <table id="example1" class="table table-striped" style="width:100%">
                                                <thead>
                                                    <tr style="text-align :center ;">
                                                        <th>No</th>
                                                        <th>No Rekam Medis</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    include 'config.php';
                                                    $sql = mysqli_query($conn, "SELECT * FROM mast_tindakan");
                                                    $no = 1;

                                                    while ($d = mysqli_fetch_array($sql)) : ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $d['nama_tindakan']; ?></td>

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
                        <div class="col-6">
                            <div class="">
                                <!-- <div class="card-header">
                                    <h3 class="card-title">dataTable</h3>
                                </div> -->
                                <!-- card body -->
                                <div class="container">

                                    <!-- <a href="menu.php" class="btn btn-success">Tambah Data</a> -->

                                    <a href="tambah_tindakan.php" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#add_data_Modal2">Tambah Obat Baru</a>
                                    <div class="card mt-2">
                                        <div class="card-body">
                                            <h2>Master Obat</h2>
                                            <table id="example2" class="table table-striped" style="width:100%">
                                                <thead>
                                                    <tr style="text-align :center ;">
                                                        <th>No</th>
                                                        <th>No Rekam Medis</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    include 'config.php';
                                                    $sql = mysqli_query($conn, "SELECT * FROM mast_obat");
                                                    $no = 1;

                                                    while ($d = mysqli_fetch_array($sql)) : ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $d['nama_obat']; ?></td>

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

        $(document).ready(function() {
            $('#example2').DataTable();
        });
    </script>
</body>

</html>

<!-- MODAL INPUT -->
<div class="modal fade" id="add_data_Modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Data Tindakan</h4>
            </div>
            <div class="modal-body">
                <form action="tambah_tindakan.php" method="post">
                    <label for="">Id Tindakan</label>
                    <?php
                    include 'config.php';

                    $sql = mysqli_query($conn, "SELECT id_tindakan FROM mast_tindakan");
                    echo '<input type="text" class="form-control" value="';
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
                    echo '" name="id_tindakan" readonly';
                    ?>

                    <br>
                    <label for="">Nama Tindakan</label>
                    <input type="text" name="nama_tindakan" class="form-control">
                    <br>
                    <input type="submit" name="insert" id="insert" value="Submit" class="btn btn-success">
                </form>
            </div>
            <div class="modal-footer">
                <button name="kirim" align="right" type="button" class="btn btn-default" data-bs-dismiss="modal">CLose</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Obat -->
<div class="modal fade" id="add_data_Modal2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Data Obat</h4>
            </div>
            <div class="modal-body">
                <form action="tambah_obat.php" method="post">
                    <label for="">Id Obat</label>
                    <?php
                    include 'config.php';

                    $sql = mysqli_query($conn, "SELECT id_obat FROM mast_obat");
                    echo '<input type="text" class="form-control" value="';
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
                    echo '" name="id_tindakan" readonly';
                    ?>
                    <br>
                    <label for="">Nama Obat</label>
                    <input type="text" name="nama_obat" class="form-control">
                    <br>
                    <input type="submit" name="insert" id="insert" value="Submit" class="btn btn-success">
                </form>
            </div>
            <div class="modal-footer">
                <button name="kirim" align="right" type="button" class="btn btn-default" data-bs-dismiss="modal">CLose</button>
            </div>
        </div>
    </div>
</div>