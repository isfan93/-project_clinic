<?php
include 'config.php';

if (isset($_POST['kirim'])) {
    $no_rm = $_POST['no_rm'];
    $nama_px = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $gender = $_POST['gender'];
    $tgl = date("Y-m-d");


    $insert = mysqli_query($conn, "INSERT INTO mast_pasien VALUES ('$no_rm','$nama_px','$alamat','$tgl_lahir','$gender','$tgl')");

    if ($insert) {
        echo "Data Berhasil disimpan";
    } else {
        echo "Data Gagal disimpan";
    }
}
header("Location:menu2.php");
