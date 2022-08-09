<?php

include 'config.php';

$namat = $_POST['nama_tindakan'];

$ins = mysqli_query($conn, "INSERT INTO mast_tindakan VALUES ('','$namat')");

if ($ins) {
    echo "data berhasil disimpan";
} else {
    echo "data gagal disimpan";
}

header("Location:master.php");
