<?php
include 'config.php';

$id = $_GET['id_trans'];
$no_rm = $_GET['no_rm'];

mysqli_query($conn, "DELETE FROM trans_obat WHERE id_trans = '$id'");
header('Location:input_obat.php?no_rm=' . $no_rm);
