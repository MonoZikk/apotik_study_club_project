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
                            <a class="nav-link huruf text-hijau sentuh ms-2" href="#"
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
                                    <a role="button" href="data_diri.php" class="dropdown-item huruf sentuh text-hijau border-0 bg-transparent w-100 text-start" style="transition: color 0.3s;">
                                        Profil
                                    </a>
                                </li>
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



    

    <section id="keranjang-beli" class="bg-hijau pt-5 pb-5 min-vh-100">
        <div class="container p-2">
            <div class="card">
                <div class="card-header pt-2 pt-md-2 bg-hijau-tua d-flex justify-content-between align-items-center"
                    style="color:#3f4d41;">
                    <h4 class="">Data Obat</h4>

                    <!-- Tambah Obat -->
                    <button type="button" data-bs-toggle="modal" data-bs-target="#beli"
                        class="btn btn-light mb-2 mb-md-0 bg-success text-white">
                        <i class="bi bi-bag-plus-fill me-1"></i> Beli
                    </button>

                    <div class="modal fade" id="beli" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="beli" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="beli">Silahkan diisi untuk membeli Obat</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="helper/add.php" method="POST">

                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="jenisobat" class="form-label">Jenis Obat</label>
                                            <select class="form-select" id="jenisobat" name="jenis_obat" required onchange="updateNamaObat()">
                                                <option value="" selected disabled>Pilih jenis obat</option>
                                                <option value="Tablet">Tablet</option>
                                                <option value="Sirup">Sirup</option>
                                                <option value="Kapsul">Kapsul</option>
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <label for="namaobat" class="form-label">Nama Obat</label>
                                            <select class="form-select" id="namaobat" name="nama_obat" required>
                                                <option value="" selected disabled>Pilih nama obat</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Jumlah Dibeli</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="jumlah_dibeli" required>
                                        </div>
                                    </div>
                                    <script>
                                        function updateNamaObat() {
                                            var jenisobat = document.getElementById("jenisobat").value;
                                            var namaObat = document.getElementById("namaobat");
                                            namaObat.innerHTML = '<option value="" selected disabled>Pilih nama obat</option>';
                                            if (jenisobat === "Tablet") {
                                                namaObat.innerHTML += '<option value="Sanmol Forte">Sanmol Forte</option>';
                                            } else if (jenisobat === "Sirup") {
                                                namaObat.innerHTML += '<option value="OBH Combi Junior 60 ml">OBH Combi Junior 60 ml</option>';
                                                namaObat.innerHTML += '<option value="Apialys Sirup 100 ml">Apialys Sirup 100 ml</option>';
                                            } else if (jenisobat === "Kapsul") {
                                                namaObat.innerHTML += '<option value="Rhinos Sr">Rhinos Sr</option>';
                                            }
                                        }
                                    </script>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn bg-success btn-primary">Lakukan Pesanan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Data Pembelian Obat</h5>
                    <p class="card-text">Data Pembelian Obat-Obatan yang Tersedia di Apotik Medica Zis.</p>

                    <div class="table-responsive text-center ">
                        <table class="table align-middle table-stripped table-bordered">
                            <thead class="table-light">
                                <th>Jenis</th>
                                <th>Nama</th>
                                <th>Jumlah Beli</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php
                                include 'helper/koneksi.php';
                                $query_tampil = "SELECT * FROM pesanan WHERE id_users = '$id'";
                                $tampil = mysqli_query($db, $query_tampil);
                                while ($data = mysqli_fetch_array($tampil)) {
                                ?>
                                    <tr>
                                        <td><?php echo $data['jenis_obat']; ?></td>
                                        <td><?php echo $data['nama_obat']; ?></td>
                                        <td><?php echo $data['jumlah_dibeli']; ?></td>
                                        <!-- Format harga dengan pemisah ribuan -->
                                        <td><?php echo "Rp " . number_format($data['harga'], 0, ',', '.'); ?></td>
                                        <td><?php echo "Rp " . number_format($data['total_harga'], 0, ',', '.'); ?></td>
                                        <td class="small">
                                            <!-- Edit -->
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $data['id']; ?>" class="btn btn-warning mb-2 mb-md-0">
                                                <i class="bi bi-pencil" style="color: white;"></i> </button>

                                            <div class="modal fade" id="exampleModal<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="helper/update_pesanan.php" method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                                            <div class="modal-body text-start">
                                                                <div class="mb-3">
                                                                    <label for="jenisobat<?php echo $data['id']; ?>" class="form-label">Jenis Obat</label>
                                                                    <select class="form-select" id="jenisobat<?php echo $data['id']; ?>" name="jenis_obat" required onchange="updateNamaObat<?php echo $data['id']; ?>()">
                                                                        <option value="" disabled>Pilih jenis obat</option>
                                                                        <option value="Tablet" <?php echo ($data['jenis_obat'] == 'Tablet') ? 'selected' : ''; ?>>Tablet</option>
                                                                        <option value="Sirup" <?php echo ($data['jenis_obat'] == 'Sirup') ? 'selected' : ''; ?>>Sirup</option>
                                                                        <option value="Kapsul" <?php echo ($data['jenis_obat'] == 'Kapsul') ? 'selected' : ''; ?>>Kapsul</option>
                                                                    </select>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="namaobat<?php echo $data['id']; ?>" class="form-label">Nama Obat</label>
                                                                    <select class="form-select" id="namaobat<?php echo $data['id']; ?>" name="nama_obat" required>
                                                                        <option value="" disabled>Pilih nama obat</option>
                                                                        <?php if ($data['jenis_obat'] == 'Tablet'): ?>
                                                                            <option value="Sanmol Forte" <?php echo ($data['nama_obat'] == 'Sanmol Forte') ? 'selected' : ''; ?>>Sanmol Forte</option>
                                                                        <?php elseif ($data['jenis_obat'] == 'Sirup'): ?>
                                                                            <option value="OBH Combi Junior 60 ml" <?php echo ($data['nama_obat'] == 'OBH Combi Junior 60 ml') ? 'selected' : ''; ?>>OBH Combi Junior 60 ml</option>
                                                                            <option value="Apialys Sirup 100 ml" <?php echo ($data['nama_obat'] == 'Apialys Sirup 100 ml') ? 'selected' : ''; ?>>Apialys Sirup 100 ml</option>
                                                                        <?php elseif ($data['jenis_obat'] == 'Kapsul'): ?>
                                                                            <option value="Rhinos Sr" <?php echo ($data['nama_obat'] == 'Rhinos Sr') ? 'selected' : ''; ?>>Rhinos Sr</option>
                                                                        <?php endif; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="jumlahDibeli<?php echo $data['id']; ?>" class="form-label">Jumlah Dibeli</label>
                                                                    <input type="number" class="form-control" id="jumlahDibeli<?php echo $data['id']; ?>" name="jumlah_dibeli" value="<?php echo $data['jumlah_dibeli']; ?>" required>
                                                                </div>
                                                            </div>
                                                            <script>
                                                                function updateNamaObat<?php echo $data['id']; ?>() {
                                                                    var jenisobat = document.getElementById("jenisobat<?php echo $data['id']; ?>").value;
                                                                    var namaObat = document.getElementById("namaobat<?php echo $data['id']; ?>");
                                                                    namaObat.innerHTML = '<option value="" disabled>Pilih nama obat</option>';
                                                                    if (jenisobat === "Tablet") {
                                                                        namaObat.innerHTML += '<option value="Sanmol Forte">Sanmol Forte</option>';
                                                                    } else if (jenisobat === "Sirup") {
                                                                        namaObat.innerHTML += '<option value="OBH Combi Junior 60 ml">OBH Combi Junior 60 ml</option>';
                                                                        namaObat.innerHTML += '<option value="Apialys Sirup 100 ml">Apialys Sirup 100 ml</option>';
                                                                    } else if (jenisobat === "Kapsul") {
                                                                        namaObat.innerHTML += '<option value="Rhinos Sr">Rhinos Sr</option>';
                                                                    }
                                                                }
                                                            </script>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Hapus -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['id']; ?>">
                                                <i class="bi bi-trash3-fill"></i> </button>

                                            <div class="modal fade" id="hapus<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="helper/delete.php" method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                                            <div class="modal-body text-start">
                                                                Yakin ingin hapus obat <?php echo $data['nama_obat']; ?>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                        </table>
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