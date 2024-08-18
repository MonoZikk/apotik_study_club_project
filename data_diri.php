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

    <!-- My Bootstrap -->
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
    <section id="hero" class="bg-hijau pt-5 pb-5 ps-3 pe-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="card mt-3 mt-md-2">
                        <div class="card-body p-3 p-md-4">
                            <div class="card-header bg-hijau d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 text-white">Data Profil</h5>
                                <a href="edit_data_diri.php" class="btn btn-light mb-2 mb-md-0 btn-light px-3 py-2">
                                    Edit Profil
                                </a>
                            </div>
                            <?php
                            include "helper/koneksi.php";
                            $query_tampil = "select * from users where id= '$id' ";
                            $tampil = mysqli_query($db, $query_tampil);
                            while ($data = mysqli_fetch_array($tampil)) {
                            ?>
                                <div class="mt-4">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6 text-center mt-4">
                                            <img src="uploads/<?php echo $data['foto_profil'] ?>" alt="Foto Profil" class="img-fluid rounded-circle mb-3" style="width: 200px; height: 200px; object-fit: cover;">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <h4 class="card-title text-hijau"><?php echo $data['nama'] ?>/<i><?php echo $data['username'] ?></i></h4>
                                                    <hr>
                                                    <p class="card-text"><i class="bi bi-calendar me-2"></i><?php echo $data['tanggal_lahir'] ?></p>
                                                    <p class="card-text"><i class="bi bi-gender-ambiguous me-2"></i><?php echo $data['jenis_kelamin'] ?></p>
                                                    <p class="card-text"><i class="bi bi-telephone me-2"></i><?php echo $data['no_whatsapp'] ?></p>
                                                </div>
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