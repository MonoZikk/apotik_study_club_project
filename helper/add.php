<?php
include 'koneksi.php'; 
//mengambil nilai post
session_start();

$jenis_obat=$_POST['jenis_obat'];
$nama_obat=$_POST['nama_obat'];
$jumlah_dibeli=$_POST['jumlah_dibeli'];
$id = $_SESSION['id'];

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
$query_simpan="INSERT INTO pesanan (id_users,jenis_obat,nama_obat,jumlah_dibeli,harga,total_harga) 
				values ('$id','$jenis_obat','$nama_obat','$jumlah_dibeli','$harga' ,'$total_harga')";
$simpan=mysqli_query($db,$query_simpan);

//cek
if ($simpan) {
	header("location: ../pembelian.php");
}
else{
	echo "gagal <br>";
}
 ?>