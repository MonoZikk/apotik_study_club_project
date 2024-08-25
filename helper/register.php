<?php
include "koneksi.php";
session_start();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_whatsapp = $_POST['no_whatsapp'];
    $foto_profil = 'anonym.png';

    $check_username = mysqli_query($db, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($check_username) > 0) {
        $_SESSION['error_username'] = "Username sudah digunakan";
        header("location:../tampilan_register.php");
        exit;
    }

    if ($password !== $konfirmasi_password) {
        $_SESSION['error_password'] = "Konfirmasi password tidak sesuai";
        header("location:../tampilan_register.php");
        exit; 
    }


    $simpan = mysqli_query($db, "INSERT INTO users (username,password,nama,tanggal_lahir,jenis_kelamin,no_whatsapp,foto_profil) values ('$username','$password','$nama','$tanggal_lahir','$jenis_kelamin','$no_whatsapp','$foto_profil')");
    if ($simpan) {
        $_SESSION['regis'] = true;
        header("location:../tampilan_login.php");
        exit;
    }
}
?>
