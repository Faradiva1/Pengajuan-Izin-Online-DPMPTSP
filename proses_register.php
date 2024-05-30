<?php
session_start();
include 'conf/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_username = $_POST['new_username_user'];
    $new_password = $_POST['new_password_user'];
    $confirm_password = $_POST['confirm_password'];
    $role = "user"; // Atur default role sebagai "user"

    // Validasi password
    if ($new_password !== $confirm_password) {
        header("Location: userpageregister.php?error=1");
        exit();
    }

    // Cek apakah username sudah terdaftar sebelumnya
    $check_query = "SELECT id_user FROM users WHERE username = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("s", $new_username);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        header("Location: userpageregister.php?error=2");
        exit();
    }

    // Hash password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Jika tidak ada kesalahan, lakukan proses registrasi dengan password yang di-hash
    $insert_query = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_query);
    $insert_stmt->bind_param("sss", $new_username, $hashed_password, $role);

    if ($insert_stmt->execute()) {
        header("Location: userpageregister.php?success=1");
        exit();
    } else {
        header("Location: userpageregister.php?error=3");
        exit();
    }
}