<?php
include 'koneksi.php';
session_start();

// Mengambil Nilai Post
$id = $_POST['id'];
$username = $_POST['username'];
$nama = $_POST['nama'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_whatsapp = $_POST['no_whatsapp'];

// Daftar ekstensi file yang diperbolehkan
$allowed_extensions = ['jpg', 'jpeg', 'png'];

// Cek apakah ada file yang diunggah
if (isset($_FILES['foto_profil']) && $_FILES['foto_profil']['error'] == UPLOAD_ERR_OK) {
    // Mendapatkan informasi file
    $file_name = $_FILES['foto_profil']['name'];
    $file_tmp = $_FILES['foto_profil']['tmp_name'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Validasi ekstensi file
    if (!in_array($file_ext, $allowed_extensions)) {
        echo "Maaf, hanya file dengan ekstensi JPG, JPEG, dan PNG yang diperbolehkan.";
        exit();
    }

    // Direktori penyimpanan file
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($file_name);
    $name_file_db = basename($file_name);

    // Pindahkan file ke direktori tujuan
    if (move_uploaded_file($file_tmp, $target_file)) {
        // Update data pengguna beserta foto profilnya
        $query_update = "UPDATE users SET username = '$username', nama = '$nama', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', no_whatsapp = '$no_whatsapp', foto_profil = '$name_file_db' WHERE id = '$id'";
    } else {
        echo "Maaf, ada kesalahan saat mengunggah file Anda.";
        exit();
    }
} else {
    // Update data pengguna tanpa mengubah foto profil
    $query_update = "UPDATE users SET username = '$username', nama = '$nama', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', no_whatsapp = '$no_whatsapp' WHERE id = '$id'";
}

// Eksekusi query update
$update = mysqli_query($db, $query_update);

if ($update) {
    header("location: ../data_diri.php");
    exit();
} else {
    echo "Gagal mengupdate profil.";
}
?>
