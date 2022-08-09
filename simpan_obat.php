<?php
include 'config.php';

if (isset($_POST['kirim_obat'])) {
    $id_trx = $_POST['id_trans'];
    $no_rm = $_POST['no_rm'];
    $nama_px = $_POST['nama_px'];
    $nama_obt = $_POST['nama_obat'];
    $harga = $_POST['harga'];

    $insert = mysqli_query($conn, "INSERT INTO trans_obat VALUES ('$id_trx','$no_rm','$nama_px','$nama_obt','$harga')");

    if ($insert) {
        echo "Data Berhasil disimpan";
    } else {
        echo "Data GAGAL disimpan !!";
    }
}
header('Location:input_obat.php?no_rm=' . $no_rm);
