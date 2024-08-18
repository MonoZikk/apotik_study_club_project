<?php
session_start();
$id = $_SESSION['id'];
include 'helper/koneksi.php';

// Fetch user data
$query_tampil = "SELECT * FROM users WHERE id = '$id'";
$tampil = mysqli_query($db, $query_tampil);
$data = mysqli_fetch_array($tampil);

if (!isset($_SESSION['id'])) {
    // User is not logged in, redirect to login page
    header("Location: tampilan_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Apotik Medika Zis</title>

    <!-- My Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- My Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <link rel="icon" href="gambar/medicine.png">


    <!-- My CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navbar-->
    <nav class="navbar navbar-expand-md bg-white p-2 w-100 border-bottom border-success pb-2 border-top border-top-xl pt-2 sticky-top"
        style="box-shadow:0 2px 5px rgba(0,0,0,.3);">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <button type="button" class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#menu-navigasi">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="nav-link navbar-brand text-hijau font-tebal judul ms-2" href="#"
                    style="pointer-events: none;">Apotik
                    Medika Zis
                    <img class="img-profile d-md-inline rounded-circle responsive-image" src="gambar/medicine.png"
                        alt="Logo">
                </a>
            </div>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="menu-navigasi"
                aria-labelledby="menu-navigasiLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="menu-navigasiLabel huruf">KLINIK MEDICA ZIS MENU</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body flex-row-reverse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link huruf text-hijau sentuh" href="index.php"
                                style="transition: color 0.3s;">
                                <i class="bi bi-house-door-fill me-1 ms-2"></i>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link huruf text-hijau sentuh" href="produk.php"
                                style="transition: color 0.3s;">
                                <i class="bi bi-cart-fill me-1 ms-2"></i>Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link huruf text-hijau sentuh ms-2" href="pembelian.php"
                                style="transition: color 0.3s;">
                                <i class="bi bi-coin me-1"></i>Beli</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle huruf text-hijau sentuh" href="#" role="button"
                                aria-expanded="false" data-bs-toggle="dropdown" style="transition: color 0.3s;">
                                <img src="uploads/<?php echo $data['foto_profil'] ?>"
                                    class="img-profile d-md-inline rounded-circle responsive-image me-1 ms-1"> <?php echo $data['nama'] ?> </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <form action="helper/logout.php" method="POST">
                                        <button type="submit" class="dropdown-item huruf sentuh text-hijau border-0 bg-transparent w-100 text-start" style="transition: color 0.3s;">
                                            <i class="bi bi-box-arrow-in-left me-1"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Section Hero -->
    <section id="hero" class="bg-hijau pt-5 pb-5 ps-5 pe-5" style="min-height: 615px;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-white">
                    <div class="card mt-3 mt-md-2">
                        <div class="card-body w-100 p-3 p-md-4">
                            <div class="card-header bg-hijau d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Edit Data Kamu</h5>
                                <a href="data_diri.php">
                                    <button class="btn btn-light mb-2 mb-md-0 btn-light px-3 py-2">Kembali</button>
                                </a>
                            </div>
                            <?php
                            include "helper/koneksi.php";
                            $query_tampil = "SELECT * FROM users WHERE id= '$id' ";
                            $tampil = mysqli_query($db, $query_tampil);
                            while ($data = mysqli_fetch_array($tampil)) {
                            ?>
                                <div class="table-responsive">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 text-center mt-4">
                                            <form action="helper/update_data_profil.php" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                                <input type="hidden" name="username" value="<?php echo $data['username']; ?>">

                                                <img src="uploads/<?php echo $data['foto_profil'] ?>" alt="Foto Profil" id="previewImage" class="img-fluid rounded-circle mb-3" style="width: 200px; height: 200px; object-fit: cover;">
                                                <div class="mt-2">
                                                    <label for="profileImage" class="btn btn-primary btn-sm">
                                                        <i class="bi bi-upload"></i> Ganti Foto
                                                    </label>
                                                    <input type="file" id="profileImage" name="foto_profil" accept="image/*" style="display: none;" onchange="previewFile()">
                                                </div>
                                                <script>
                                                    function previewFile() {
                                                        var preview = document.getElementById('previewImage');
                                                        var file = document.getElementById('profileImage').files[0];
                                                        var reader = new FileReader();

                                                        reader.onloadend = function() {
                                                            preview.src = reader.result;
                                                        }

                                                        if (file) {
                                                            reader.readAsDataURL(file);
                                                        } else {
                                                            preview.src = "uploads/<?php echo $data['foto_profil'] ?>";
                                                        }
                                                    }
                                                </script>
                                        </div>
                                        <div class="col-md-8 mt-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Nama</label>
                                                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                                            <option value="Laki-laki" <?php echo ($data['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                                            <option value="Perempuan" <?php echo ($data['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="telepon" class="form-label">Nomor Telepon</label>
                                                        <input type="tel" class="form-control" id="telepon" name="no_whatsapp" value="<?php echo $data['no_whatsapp']; ?>">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Section Hero -->

    <div class="card-footer d-flex bg-white justify-content-between align-items-center" style="height: 50px;">
        <i class="bi bi-plus-circle text-success ms-3"></i>
        <p class="mb-0 text-center" style="color:black; font-size:15px;">
            Info Kontak <i class="bi bi-whatsapp me-1 ms-1" style="color:green;"></i> 08538383421151 |
            www.apotikmedikazis.com
        </p>
        <i class="bi bi-plus-circle text-success me-3"></i>
    </div>

    <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>

</html>