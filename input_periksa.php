<?php
include 'config.php';

if (isset($_POST['kirim'])) {
    $id_trx = $_POST['id_trans'];
    $no_rm = $_POST['no_rm'];
    $nama_px = $_POST['nama_px'];
    $nama_tdkn = $_POST['nama_tindakan'];
    $harga = $_POST['harga'];

    $insert = mysqli_query($conn, "INSERT INTO trans_tindakan VALUES ('$id_trx','$no_rm','$nama_px','$nama_tdkn','$harga')");

    if ($insert) {
        echo "Data Berhasil disimpan";
    } else {
        echo "Data GAGAL disimpan !!";
    }
}
header('Location:periksa.php?no_rm=' . $no_rm);
