<?php
include 'koneksi.php';
session_start();
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
}

if ($update) {
    header("location: ../edit_data_diri.php");
    exit();
} else {
    echo "Gagal mengupdate profil.";
}

?>