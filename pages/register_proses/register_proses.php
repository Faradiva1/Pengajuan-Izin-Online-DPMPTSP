<?php
include './conf/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah data yang diterima adalah untuk registrasi admin atau user
    if (isset($_POST["role_admin"])) {
        $role = $_POST["role_admin"];
    } elseif (isset($_POST["role_user"])) {
        $role = $_POST["role_user"];
    } else {
        die("Pengiriman data tidak valid");
    }

    $username = $_POST["new_username_" . $role];
    $password = $_POST["new_password_" . $role];
    $confirm_password = $_POST["confirm_password"];

    // Validasi kata sandi dan konfirmasi kata sandi
    if ($password !== $confirm_password) {
        die("Kata sandi dan konfirmasi kata sandi tidak cocok");
    }

    // Hash kata sandi menggunakan password_hash() sebelum menyimpannya
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', '$role')";

    if ($conn->query($sql) === TRUE) {
        // Registrasi berhasil, arahkan pengguna ke halaman login yang sesuai dengan peran
        if ($role === "admin") {
            header("Location: link.php?q=adminpagelogin&success=1");
        } elseif ($role === "user") {
            header("Location: link.php?q=userpagelogin&success=1");
        } else {
            // Jika peran tidak valid, Anda dapat menangani kasus ini sesuai kebutuhan Anda
            echo "Registrasi berhasil, tetapi peran tidak valid.";
        }
        exit(); // Pastikan tidak ada kode berikutnya yang dijalankan
    } else {
        echo "Registrasi gagal: " . $conn->error;
    }
}
