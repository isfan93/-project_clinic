<?php

include 'config.php';

$namao = $_POST['nama_obat'];

$ins = mysqli_query($conn, "INSERT INTO mast_obat VALUES ('','$namao')");

if ($ins) {
    echo "data berhasil disimpan";
} else {
    echo "data gagal disimpan";
}

header("Location:master.php");
