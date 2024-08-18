<?php
session_start();

// Redirect if the user is already logged in
if (isset($_SESSION['status']) && $_SESSION['status'] === true) {
    header("Location: produk.php");
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="gambar/medicine.png">
    <style>
        .responsive-font {
            font-size: 3.9rem;
            /* Ukuran font default */
        }

        .padding {
            padding: 40px;
            border-radius: 30px;
        }

        /* Ukuran font untuk layar kecil (mobile) */
        @media (max-width: 576px) {
            .responsive-font {
                font-size: 2.5rem;
            }

            .container {
                max-width: 350px;
            }

            .padding {
                padding: 20px;
                border-radius: 20px;
            }

        }
    </style>

</head>

<body style="background-image: url(background_login.jpg); background-size: cover;">
    <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center">
        <h1 class="text-center mb-5 fw-bolder responsive-font" style="font-family: inter; text-shadow: 0px 4px 4px rgba(37, 117, 50, 1);  color: rgba(255, 255, 255, 1); -webkit-text-stroke: 1px rgba(37, 117, 50, 1);">Welcome To Apotek Medica Zis</h1>
        <div class="container bg-light padding" style="max-width: 700px;">
            <h2 class="mb-4">Login</h2>

            <form action="helper/login.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Username Anda" style="padding: 8px; background-color: rgba(68, 182, 86, 0.25);">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" style="padding: 8px; background-color: rgba(68, 182, 86, 0.25)" placeholder="Password Anda">
                    <?php
                    // memeriksa apakah ada pesan kesalahan
                    if (isset($_SESSION['error_message'])) {
                        echo '<i class="text-danger">' . $_SESSION['error_message'] . '</i>';
                        // hapus pesan kesalahan setelah ditampilkan
                        unset($_SESSION['error_message']);
                    }
                    ?>
                    <br>
                    Belum punya akun ? Daftar <a href="tampilan_register.php">Disini</a>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary fw-bold" name="login" style="background-color: rgba(68, 182, 86, 1);padding: 7px; width: 180px; border-radius: 10px;">Submit</button>
                </div>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        // Ensure the DOM is fully loaded before executing the alert
        window.onload = function() {
            <?php
            // Check if registration was successful and display an alert
            if (isset($_SESSION['regis']) && $_SESSION['regis'] === true) {
                echo "alert('Selamat! Anda berhasil mendaftar akun.');";
                unset($_SESSION['regis']); // Clear the registration session variable
            }
            ?>
        };
    </script>
</body>

</html>