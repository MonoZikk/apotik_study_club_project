<?php
include 'koneksi.php';
session_start();
//mengambil Nilai Post
$id = $_POST['id'];
$jenis_obat=$_POST['jenis_obat'];
$nama_obat=$_POST['nama_obat'];
$jumlah_dibeli=$_POST['jumlah_dibeli'];
$id_users = $_SESSION['id'];

$harga=0;
if ($nama_obat == "OBH Combi Junior 60 ml") {
    $harga = 19000;
} elseif ($nama_obat == "Apialys Sirup 100 ml") {
    $harga = 45000;
} elseif ($nama_obat == "Sanmol Forte") {
    $harga = 2500;
} elseif ($nama_obat == "Rhinos Sr") {
    $harga = 105000;
}

$total_harga = $harga * $jumlah_dibeli;

//query 
$query_update = "UPDATE pesanan SET jenis_obat = '$jenis_obat', nama_obat = '$nama_obat', jumlah_dibeli = '$jumlah_dibeli' , harga = '$harga' , total_harga = '$total_harga' WHERE id = '$id'";
$update = mysqli_query($db, $query_update);


if ($update) {
	header("location: ../pembelian.php");
	exit();
} else {
	echo "gagal <br>";
}

?>

<!-- <a href="tampil_anggota.php">Tampil Anggota</a> -->