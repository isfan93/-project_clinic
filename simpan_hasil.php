<?php
include 'config.php';
if (isset($_POST['simpan'])) {
    $no_rm = $_POST['no_rm'];
    $nama_t = $_POST['nama_tindakan'];
    $harga = $_POST['harga'];
    $total = $_POST['total'];

    $insert = mysqli_query($conn, "INSERT INTO data_transaksi VALUES ('','$no_rm','$nama_t','$harga','$total') ");
    if ($insert) {
        echo "Data Berhasil disimpan";
    } else {
        echo "Data GAGAL disimpan !!";
    }
}
header('Location:periksa.php?no_rm=' . $no_rm);
