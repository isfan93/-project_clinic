<?php
include 'config.php';

$id = $_GET['id_trans'];
$no_rm = $_GET['no_rm'];

mysqli_query($conn, "DELETE FROM trans_tindakan WHERE id_trans = '$id'");
header('Location:periksa.php?no_rm=' . $no_rm);
