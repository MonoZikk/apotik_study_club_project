<?php
session_start();

// Redirect if the user is already logged in
if (isset($_SESSION['status']) && $_SESSION['status'] === true) {
    header("Location: dashboard.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="gambar/medicine.png">

    <style>
        .responsive-font {
            font-size: 3.9rem;
            /* Ukuran font default */
        }

        .padding {
            padding: 30px;
            border-radius: 30px;
        }

        /* Ukuran font untuk layar kecil (mobile) */
        @media (max-width: 576px) {
            .responsive-font {
                font-size: 2.5rem;
            }

            .container {
                max-width: 340px;
            }

            .padding {
                margin-top: 20px;
                padding: 15px;
                border-radius: 15px;
            }

        }
    </style>

</head>

<body style="background-image: url(background_login.jpg); background-size: cover;">

    <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="container bg-light padding" style="max-width: 700px;">
            <h2 class="mb-4">Register</h2>
            <form action="helper/register.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Username Anda" style="padding: 8px; background-color: rgba(68, 182, 86, 0.25);" required>
                </div>
                <div class="text-start">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password Baru</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password Anda" style="padding: 8px; background-color: rgba(68, 182, 86, 0.25)" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="password" class="form-label">Konfirmasi Password</label>
                                <input type="password" name="konfirmasi_password" class="form-control" id="password" placeholder="Password Anda" style="padding: 8px; background-color: rgba(68, 182, 86, 0.25)" required>
                            </div>
                        </div>
                        <?php
                            // memeriksa apakah ada pesan kesalahan
                            if (isset($_SESSION['error_message'])) {
                                echo '<i class="text-danger">' . $_SESSION['error_message'] . '</i>';
                                // hapus pesan kesalahan setelah ditampilkan
                                unset($_SESSION['error_message']);
                            }

                            ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Anda" style="padding: 8px; background-color: rgba(68, 182, 86, 0.25)" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" style="padding: 8px; background-color: rgba(68, 182, 86, 0.25)" required>
                </div>
                Jenis Kelamin
                <div class="form-check">
                    <input class="form-check-input" name="jenis_kelamin" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Laki-laki" required>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Laki-laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="jenis_kelamin" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="Perempuan" required>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Perempuan
                    </label>
                </div>
                <div class="mb-3">
                    <label for="no_wa" class="form-label">No Whatsapp</label>
                    <input type="number" name="no_whatsapp" class="form-control" id="no_wa" placeholder="Nomor Whatsapp" style="padding: 8px; background-color: rgba(68, 182, 86, 0.25)" required>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary fw-bold" name="register" style="background-color: rgba(68, 182, 86, 1);padding: 7px; width: 180px; border-radius: 10px;">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>