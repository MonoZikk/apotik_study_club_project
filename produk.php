<?php
include 'helper/koneksi.php';
session_start();
$id = $_SESSION['id']; // Get the user ID from the session

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
                            <a class="nav-link huruf text-hijau sentuh" href="pembelian.php"
                                style="transition: color 0.3s;">
                                <i class="bi bi-coin me-1 ms-2"></i>Beli</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle huruf text-hijau sentuh" href="#" role="button"
                                aria-expanded="false" data-bs-toggle="dropdown" style="transition: color 0.3s;">
                                <img src="uploads/<?php echo $data['foto_profil'] ?>"
                                    class="img-profile d-md-inline rounded-circle responsive-image me-1 ms-2">
                                <?php echo $data['nama'] ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a role="button" href="data_diri.php"
                                        class="dropdown-item huruf sentuh text-hijau border-0 bg-transparent w-100 text-start"
                                        style="transition: color 0.3s;">
                                        Profil
                                    </a>
                                </li>
                                <li>
                                    <form action="helper/logout.php" method="POST">
                                        <button type="submit"
                                            class="dropdown-item huruf sentuh text-hijau border-0 bg-transparent w-100 text-start"
                                            style="transition: color 0.3s;">
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

    <!-- Akhir Section Hero -->
    <section class="barang pt-5 bg-hijau pb-5">
        <div class="container pt-4 bg-light ps-5 pe-5 pb-5">
            <h2 class="mb-5" style="color:#2e7e3a;">Daftar Produk Apotik Medica Zis</h2>

            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header bg-hijau">
                            Obat Batuk Anak
                        </div>
                        <div class="card-body text-center d-flex flex-column">

                            <img src="gambar/obat2.jpg" class="img-fluid mb-3" alt="obat1">
                            <div class="card-text mb-1" style="font-weight:bold; font-size:15px;">OBH Combi Junior 60 ml
                            </div>
                            <h5 class="card-title">Rp. 19.000</h5>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-success me-2 mb-2" data-bs-toggle="modal"
                                    data-bs-target="#obat1">
                                    <i class="bi bi-bag-plus-fill me-1"></i>Beli sekarang
                                </button>

                                <div class="modal fade" id="obat1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="beli" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="beli">Silahkan diisi untuk membeli Obat</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="helper/add.php" method="POST">

                                                <input type="text" name="jenis_obat" value="Sirup" hidden>
                                                <input type="text" name="nama_obat" value="OBH Combi Junior 60 ml" hidden>
                                                <input type="text" name="jumlah_dibeli" value="1" hidden>
                                                <div class="modal-body text-start">
                                                    Apakah kamu ingin membeli OBH Combi Junior 60 ml ?
                                                    <div class="mb-3">
                                                        <label for="jumlah_dibeli_obat1" class="form-label">Jumlah yang dibeli:</label>
                                                        <div class="input-group" style="max-width: 150px;">
                                                            <button type="button" class="btn btn-outline-secondary" onclick="decrementValue1()">-</button>
                                                            <input type="number" class="form-control text-center" id="jumlah_dibeli_obat1" name="jumlah_dibeli" value="1" min="1">
                                                            <button type="button" class="btn btn-outline-secondary" onclick="incrementValue1()">+</button>
                                                        </div>
                                                    </div>

                                                    <script>
                                                        function incrementValue1() {
                                                            var value = parseInt(document.getElementById('jumlah_dibeli_obat1').value, 10);
                                                            value = isNaN(value) ? 0 : value;
                                                            value++;
                                                            document.getElementById('jumlah_dibeli_obat1').value = value;
                                                        }

                                                        function decrementValue1() {
                                                            var value = parseInt(document.getElementById('jumlah_dibeli_obat1').value, 10);
                                                            value = isNaN(value) ? 0 : value;
                                                            if (value > 1) {
                                                                value--;
                                                                document.getElementById('jumlah_dibeli_obat1').value = value;
                                                            }
                                                        }
                                                    </script>


                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn bg-success btn-primary">Lakukan Pesanan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header bg-hijau">
                            Meningkatkan nafsu makan anak
                        </div>
                        <div class="card-body text-center d-flex flex-column">

                            <img src="gambar/obat5.jpg" class="img-fluid mb-3" alt="obat1">
                            <div class="card-text mb-1" style="font-weight:bold; font-size:15px;">
                                Apialys Sirup 100 ml
                            </div>
                            <h5 class="card-title">Rp. 45.000</h5>

                            <div class="mt-auto">
                                <button type="button" class="btn btn-success me-2 mb-2" data-bs-toggle="modal"
                                    data-bs-target="#obat2">
                                    <i class="bi bi-bag-plus-fill me-1"></i>Beli sekarang
                                </button>

                                <div class="modal fade" id="obat2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="beli" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="beli">Silahkan diisi untuk membeli Obat</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="helper/add.php" method="POST">

                                                <input type="text" name="jenis_obat" value="Sirup" hidden>
                                                <input type="text" name="nama_obat" value="Apialys Sirup 100 ml" hidden>
                                                <input type="text" name="jumlah_dibeli" value="1" hidden>
                                                <div class="modal-body text-start">
                                                    Apakah kamu ingin membeli Apialys Sirup 100 ml ?
                                                    <div class="mb-3">
                                                        <label for="jumlah_dibeli_obat2" class="form-label">Jumlah yang dibeli:</label>
                                                        <div class="input-group" style="max-width: 150px;">
                                                            <button type="button" class="btn btn-outline-secondary" onclick="decrementValue2()">-</button>
                                                            <input type="number" class="form-control text-center" id="jumlah_dibeli_obat2" name="jumlah_dibeli" value="1" min="1">
                                                            <button type="button" class="btn btn-outline-secondary" onclick="incrementValue2()">+</button>
                                                        </div>
                                                    </div>

                                                    <script>
                                                        function incrementValue2() {
                                                            var value = parseInt(document.getElementById('jumlah_dibeli_obat2').value, 10);
                                                            value = isNaN(value) ? 0 : value;
                                                            value++;
                                                            document.getElementById('jumlah_dibeli_obat2').value = value;
                                                        }

                                                        function decrementValue2() {
                                                            var value = parseInt(document.getElementById('jumlah_dibeli_obat2').value, 10);
                                                            value = isNaN(value) ? 0 : value;
                                                            if (value > 1) {
                                                                value--;
                                                                document.getElementById('jumlah_dibeli_obat2').value = value;
                                                            }
                                                        }
                                                    </script>


                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn bg-success btn-primary">Lakukan Pesanan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header bg-hijau">
                            Obat Demam Dewasa
                        </div>
                        <div class="card-body text-center d-flex flex-column">

                            <img src="gambar/obat3.jpg" class="img-fluid mb-3" alt="obat1">
                            <div class="card-text mb-1" style="font-weight:bold; font-size:15px;">Sanmol Forte
                            </div>
                            <h5 class="card-title">Rp. 2.500</h5>
                            <div class="mt-auto">
                                <button type="button" class="btn btn-success me-2 mb-2" data-bs-toggle="modal"
                                    data-bs-target="#obat3">
                                    <i class="bi bi-bag-plus-fill me-1"></i>Beli sekarang
                                </button>

                                <div class="modal fade" id="obat3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="beli" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="beli">Silahkan diisi untuk membeli Obat</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="helper/add.php" method="POST">

                                                <input type="text" name="jenis_obat" value="Tablet" hidden>
                                                <input type="text" name="nama_obat" value="Sanmol Forte" hidden>
                                                <input type="text" name="jumlah_dibeli" value="1" hidden>
                                                <div class="modal-body text-start">
                                                    Apakah kamu ingin membeli Sanmol Forte ?
                                                    <div class="mb-3">
                                                        <label for="jumlah_dibeli_obat3" class="form-label">Jumlah yang dibeli:</label>
                                                        <div class="input-group" style="max-width: 150px;">
                                                            <button type="button" class="btn btn-outline-secondary" onclick="decrementValue3()">-</button>
                                                            <input type="number" class="form-control text-center" id="jumlah_dibeli_obat3" name="jumlah_dibeli" value="1" min="1">
                                                            <button type="button" class="btn btn-outline-secondary" onclick="incrementValue3()">+</button>
                                                        </div>
                                                    </div>

                                                    <script>
                                                        function incrementValue3() {
                                                            var value = parseInt(document.getElementById('jumlah_dibeli_obat3').value, 10);
                                                            value = isNaN(value) ? 0 : value;
                                                            value++;
                                                            document.getElementById('jumlah_dibeli_obat3').value = value;
                                                        }

                                                        function decrementValue3() {
                                                            var value = parseInt(document.getElementById('jumlah_dibeli_obat3').value, 10);
                                                            value = isNaN(value) ? 0 : value;
                                                            if (value > 1) {
                                                                value--;
                                                                document.getElementById('jumlah_dibeli_obat3').value = value;
                                                            }
                                                        }
                                                    </script>


                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn bg-success btn-primary">Lakukan Pesanan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header bg-hijau">
                            Obat Flu Dewasa
                        </div>
                        <div class="card-body text-center d-flex flex-column">

                            <img src="gambar/obat1.jpg" class="img-fluid mb-3" alt="obat1">
                            <div class="card-text mb-1" style="font-weight:bold; font-size:15px;">Rhinos Sr</div>
                            <h5 class="card-title">Rp. 105.000</h5>
                            <div class="mt-auto">
                            <button type="button" class="btn btn-success me-2 mb-2" data-bs-toggle="modal"
                                    data-bs-target="#obat4">
                                    <i class="bi bi-bag-plus-fill me-1"></i>Beli sekarang
                                </button>

                                <div class="modal fade" id="obat4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="beli" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="beli">Silahkan diisi untuk membeli Obat</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="helper/add.php" method="POST">

                                                <input type="text" name="jenis_obat" value="Kapsul" hidden>
                                                <input type="text" name="nama_obat" value="Rhinos Sr" hidden>
                                                <input type="text" name="jumlah_dibeli" value="1" hidden>
                                                <div class="modal-body text-start">
                                                    Apakah kamu ingin membeli Rhinos Sr ?
                                                    <div class="mb-3">
                                                        <label for="jumlah_dibeli_obat4" class="form-label">Jumlah yang dibeli:</label>
                                                        <div class="input-group" style="max-width: 150px;">
                                                            <button type="button" class="btn btn-outline-secondary" onclick="decrementValue4()">-</button>
                                                            <input type="number" class="form-control text-center" id="jumlah_dibeli_obat4" name="jumlah_dibeli" value="1" min="1">
                                                            <button type="button" class="btn btn-outline-secondary" onclick="incrementValue4()">+</button>
                                                        </div>
                                                    </div>

                                                    <script>
                                                        function incrementValue4() {
                                                            var value = parseInt(document.getElementById('jumlah_dibeli_obat4').value, 10);
                                                            value = isNaN(value) ? 0 : value;
                                                            value++;
                                                            document.getElementById('jumlah_dibeli_obat4').value = value;
                                                        }

                                                        function decrementValue4() {
                                                            var value = parseInt(document.getElementById('jumlah_dibeli_obat4').value, 10);
                                                            value = isNaN(value) ? 0 : value;
                                                            if (value > 1) {
                                                                value--;
                                                                document.getElementById('jumlah_dibeli_obat4').value = value;
                                                            }
                                                        }
                                                    </script>


                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn bg-success btn-primary">Lakukan Pesanan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


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