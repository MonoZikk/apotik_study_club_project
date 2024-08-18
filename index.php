<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Medika Zis</title>

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
                    <h5 class="offcanvas-title" id="menu-navigasiLabel">KLINIK MEDICA ZIS MENU</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body flex-row-reverse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link huruf text-hijau sentuh" href="#" style="transition: color 0.3s;">
                                <i class="bi bi-house-door-fill me-1 ms-2"></i>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link huruf text-hijau sentuh" href="tampilan_login.php"
                                style="transition: color 0.3s;">
                                <i class="bi bi-cart-fill me-1 ms-2"></i>Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link huruf text-hijau sentuh" href="#about-us"
                                style="transition: color 0.3s;">
                                <i class="bi bi-emoji-smile-fill me-1 ms-2"></i>About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle huruf text-hijau sentuh" href="#" role="button"
                                aria-expanded="false" data-bs-toggle="dropdown" style="transition: color 0.3s;">
                                <i class="bi bi-person-circle me-1 ms-2"></i>SIGN-IN</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item huruf sentuh text-hijau" href="tampilan_register.php"
                                        style="transition: color 0.3s;"> <i
                                            class="bi bi-r-circle-fill me-1"></i>Register</a>
                                </li>
                                <li>
                                    <a class="dropdown-item huruf sentuh text-hijau" href="tampilan_login.php"
                                        style="transition:color 0.3s;"><i
                                            class="bi bi-box-arrow-in-right me-1"></i>Login</a>
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
    <section id="hero" class="bg-hijau pt-5 pb-5 ps-5 pe-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-white">
                    <h3 class="" style="font-family: 'Roboto', sans-serif; font-weight:bold;">Selamat Datang di
                        Apotik Medika Zis</h3>
                    <div class="mt-3" style="font-size:14px;">
                        Apotik Medika Zis hadir sebagai solusi kesehatan Anda dengan menyediakan
                        layanan pembelian obat secara online. Kami berkomitmen untuk memberikan
                        kemudahan dan kenyamanan bagi Anda dalam memenuhi kebutuhan obat-obatan tanpa harus keluar rumah.
                        Di Apotek Medika Siz, kesehatan Anda adalah prioritas utama kami.
                        Dengan tim apoteker berpengalaman dan fasilitas modern, kami berkomitmen untuk menyediakan
                        obat-obatan berkualitas serta layanan konsultasi yang tepat. Dari resep obat rutin hingga
                        kebutuhan kesehatan lainnya, kami hadir untuk memenuhi kebutuhan Anda dengan pendekatan yang
                        ramah dan profesional. Percayakan kesehatan Anda pada kami, dan nikmati layanan farmasi terbaik
                        di lingkungan yang nyaman dan aman.
                    </div>
                </div>
                <div class="col-md-6 mt-5 mt-md-0">
                    <img src="gambar/klinik.jpg" alt="Klinik Medika Zis"
                        class="img-fluid rounded rounded-circle ms-md-5"
                        style="width:300px; box-shadow:0 0 15px 5px rgba(32,118,5,.5);">
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Section Hero -->

    <!-- Section Produk -->
    <section id="produk" class="pt-5">
        <div class="container">
            <h3 class="mb-5 text-center text-hijau" style="font-family:robot,sans-serif; font-weight:bold;">Produk
                rekomendasi..</h3>
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 border border-success-subtle">
                        <h5 class="card-header bg-hijau">Obat Flu Dewasa</h5>
                        <img src="gambar/obat1.jpg" class="card-img-top img-fluid p-3" alt="Obat 1">
                        <div class="card-body">
                            <p class="card-text">Rhinos Sr 10 Kapsul</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 border border-success-subtle">
                        <h5 class="card-header bg-hijau">Obat Batuk Anak</h5>
                        <img src="gambar/obat2.jpg" class="card-img-top img-fluid p-3" alt="Obat 2">
                        <div class="card-body">
                            <p class="card-text">OBH Herbar Junior 30 ml</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 border border-success-subtle">
                        <h5 class="card-header bg-hijau">Obat Demam Dewasa</h5>
                        <img src="gambar/obat3.jpg" class="card-img-top img-fluid p-3" alt="Obat 3">
                        <div class="card-body">
                            <div class="card-text mt-2">Sanmol Forte 4 Tablet</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 mb-4">
                    <div class="card h-100 border border-success-subtle">
                        <h5 class="card-header bg-hijau">Obat Hidung Tersumbat</h5>
                        <img src="gambar/obat4.jpg" class="card-img-top img-fluid p-4" alt="Obat 4">
                        <div class="card-body">
                            <p class="card-text">Cap Lang Minyak Kayu Putih 60 ml</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Section Produk -->

    <!-- Section Tentang -->
    <section id="about-us" class="pt-5 bg-hijau">
        <div class="container">
            <h2 class="text-center mb-5 font-tebal">About Us</h2>
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-xl-4 text-center ps-5 pe-5 mb-4">
                    <img src="gambar/irfan3.jpg" alt="Muammar Irfan" class="img-fluid img-size rounded-circle mb-3"
                        style="box-shadow: 0 0 5px 3px white; width:150px; max-width:70%;">
                    <div>
                        <h5 class="mb-2 font-tebal">Front End</h5>
                        <p class="mb-0">Muammar Irfan</p>
                        <a href="https://www.instagram.com/marrmr04" class="btn btn-success mt-2"
                            id="instagram-follow"><i class="bi bi-instagram me-1"></i>Follow</a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4 text-center ps-5 pe-5 mb-4">
                    <img src="gambar/sabrina.jpg" alt="Sabrina" class="img-fluid img-size rounded-circle mb-3"
                        style="box-shadow: 0 0 5px 3px white; width:150px; max-width:70%;">
                    <div>
                        <h5 class="mb-2 font-tebal">UI/UX Design</h5>
                        <p class="mb-0">Sabrina Wahida Ramadhani</p>
                        <a href="https://www.instagram.com/sabrinaa.16" class="btn btn-success mt-2"
                            id="instagram2-follow"><i class="bi bi-instagram me-1"></i>Follow</a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4 text-center ps-5 pe-5 mb-4">
                    <img src="gambar/zikra.jpg" alt="Zikra Zana" class="img-fluid rounded-circle mb-3"
                        style="box-shadow: 0 0 5px 3px white; width: 150px; max-width: 70%;">
                    <div>
                        <h5 class="mb-2 font-tebal">Back End</h5>
                        <p class="mb-0">Zikra Zana</p>
                        <a href="https://www.instagram.com/zikrazana_" class="btn btn-success mt-2 text-white"
                            id="instagram3-follow"><i class="bi bi-instagram me-1"></i>Follow</a>
                    </div>
                </div>

                <style>

                </style>
            </div>
        </div>
    </section>
    <!-- Akhir Section Tentang -->

    <div class="card-footer d-flex bg-white justify-content-between align-items-center" style="height: 50px;">
        <i class="bi bi-plus-circle text-success ms-3"></i>
        <p class="mb-0 text-center" style="color:black; font-size:15px;">
            Info Kontak <i class="bi bi-whatsapp me-1 ms-1" style="color:green;"></i> 08538383421151 | www.apotikmedikazis.com
        </p>
        <i class="bi bi-plus-circle text-success me-3"></i>
    </div>

    <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>

</html>