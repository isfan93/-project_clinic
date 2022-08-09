<?php
session_start();

include 'config.php';

$usename = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($conn, "SELECT * FROM user WHERE username='$usename' AND password='$password'");
$cek = mysqli_num_rows($login);


if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    if ($data['level'] == "admin") {
        $_SESSION['username'] = $usename;
        $_SESSION['level'] = "admin";
        header("Location:home.php");
    } else if ($data['level'] == "client") {
        $_SESSION['username'] = $usename;
        $_SESSION['level'] = "client";
        header("Location:home.php");
    } else {
        header("Location:index.php");
    }
} else {
    header("Location:index.php");
}
