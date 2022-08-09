<?php
include 'config.php';

$no_rm = $_GET['no_rm'];

mysqli_query($conn, "DELETE FROM mast_pasien WHERE no_rm = '$no_rm'");
header('Location:menu2.php');
