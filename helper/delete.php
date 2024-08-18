<?php
include 'koneksi.php';
session_start();
// Mengambil nilai post
$id = $_POST['id'];

// Query
$query_hapus = "DELETE FROM pesanan WHERE id = '$id'";
$hapus = mysqli_query($db, $query_hapus);

// Cek
if ($hapus) {
    header("location: ../pembelian.php");
	exit();
} else {
    echo "Gagal menghapus data: " . mysqli_error($db);
}
?>