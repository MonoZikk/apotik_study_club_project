<?php
// Start the session
session_start();

// Include the database connection
include 'koneksi.php';

if (isset($_POST['login'])) {
    // Capture data from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        // Save error message in the session
        $_SESSION['error_message'] = "Username dan password harus diisi";
        header("location:../tampilan_login.php");
        exit;
    }

    // Select user data with the matching username and password
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $data = mysqli_query($db, $query);
    $cek = mysqli_num_rows($data);

    if ($cek > 0) {
        $user = mysqli_fetch_array($data);
        // Save user details in session
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $user['id']; // Save user ID
        $_SESSION['status'] = true;
        header("location:../produk.php");
    } else {
        // Save error message in the session
        $_SESSION['error_message'] = "Username atau password salah";
        header("location:../tampilan_login.php");
    }
}
?>