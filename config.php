<?php
$conn = mysqli_connect("localhost", "root", "", "klinik");

if (mysqli_connect_errno()) {
    echo "koneksi ke database gagal " . mysqli_connect_errno();
}
