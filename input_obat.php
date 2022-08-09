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

        $no_rm = $_GET['no_rm'];
        $data1 = mysqli_query($conn, "SELECT * FROM mast_pasien WHERE no_rm = '$no_rm'");

        while ($p = mysqli_fetch_array($data1)) { ?>
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h2>MASUKAN RESEP OBAT</h2>
                            </div>

                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Masukan Data Obat</h3>
                                    </div>
                                    <form action="simpan_obat.php" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <!-- <label>ID Transaksi</label> -->
                                                <?php
                                                $sql = mysqli_query($conn, "SELECT id_trans FROM trans_obat");
                                                echo '<input type="text" class="form-control" id="id" value="';
                                                $id = "F01";

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
                                                echo '"name="id_trans" readonly hidden>';
                                                ?>
                                            </div>

                                            <div class="form-group">
                                                <!-- <label>No Rekam Medis</label> -->
                                                <input name="no_rm" type="text" class="form-control" value="<?php echo $p['no_rm']; ?>" readonly hidden>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Pasien</label>
                                                <input name="nama_px" type="text" class="form-control" value="<?php echo $p['nama']; ?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Nama Obat</label>
                                                <select class="form-control" name="nama_obat" id="">
                                                    <option value="">--Pilih--</option>
                                                    <?php
                                                    $sql1 = mysqli_query($conn, "SELECT * FROM mast_obat");
                                                    while ($dt = mysqli_fetch_array($sql1)) {

                                                    ?>
                                                        <option value="<?php echo $dt['nama_obat']; ?> "><?php echo $dt['nama_obat']; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input name="harga" type="text" class="form-control">
                                            </div>




                                            <!-- <div class="form-group">
                                                <label>Jumlah</label>
                                                <input name="jumlah" type="number" class="form-control" placeholder="Jumlah">
                                            </div> -->

                                        </div>
                                        <div class="card-footer">
                                            <button name="kirim_obat" type="submit" class="btn btn-primary">Simpan</button>
                                        </div>


                                    </form>
                                <?php } ?>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="card card-warning">
                                    <div class="card-header">
                                        <h3 class="card-title">Daftar Obat Pasien</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">No</th>
                                                    <th>Nama Tindakan</th>
                                                    <th>Harga</th>
                                                    <th>Batal</th>
                                                </tr>
                                            </thead>
                                            <form action="simpan_hasil.php" method="post">
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $no_rm = $_GET['no_rm'];
                                                    $dta_periksa = mysqli_query($conn, "SELECT * FROM trans_obat WHERE no_rm = $no_rm");
                                                    while ($d = mysqli_fetch_array($dta_periksa)) {
                                                    ?>
                                                        <tr>
                                                            <td name="no_rm" value="" hidden><?php echo $d['no_rm']; ?></td>
                                                            <td><?php echo $no++; ?></td>
                                                            <td name="nama_obat"><?php echo $d['nama_obat']; ?></td>
                                                            <td name="harga"><?php echo $d['harga']; ?></td>
                                                            <td>
                                                                <a href="delete_obat.php?id_trans=<?= $d['id_trans']; ?>&no_rm=<?= $d['no_rm']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Mau Hapus Tindakan ?');">X</a>
                                                            </td>

                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <?php
                                                    $q = mysqli_query($conn, "SELECT SUM(harga) as total FROM trans_obat WHERE no_rm = $no_rm");
                                                    $dat = mysqli_fetch_array($q);
                                                    ?>
                                                    <tr style="font-size:20px ;">
                                                        <td colspan="2">Total</td>
                                                        <td><?php echo $dat['total'] ?></td>
                                                    </tr>

                                                </tfoot>

                                        </table>

                                        <!-- <div class="card-footer">
                                            <button name="simpan" type="submit" class="btn btn-primary">Simpan</button>
                                        </div> -->
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </section>
            </div>


            <!-- MAIN KONTEN -->

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
<script type="text/javascript">
    function kali() {
        var jumlah = document.getElementById('jumlah').value;
        var harga = document.getElementById('harga').value;
        var result = parseInt(jumlah) * parseInt(harga);

        if (!isNaN(result)) {
            document.getElementById('total').value = result;
        }
    }
</script>

</html>