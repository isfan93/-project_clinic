<?php
include 'config.php';

$no_rm = $_POST['no_rm'];
$namapx = $_POST['nama'];
$alamat = $_POST['alamat'];
$tgl_lahir = $_POST['tgl_lahir'];
$gender = $_POST['gender'];

mysqli_query($conn, "UPDATE mast_pasien SET nama='$namapx', alamat='$alamat', tgl_lahir='$tgl_lahir', gender='$gender' WHERE no_rm='$no_rm'");

header("Location:menu2.php");
