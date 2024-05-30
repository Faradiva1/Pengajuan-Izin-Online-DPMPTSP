<?php
session_start();

// Periksa apakah pengguna sudah masuk. Jika sudah, lakukan logout.
if (isset($_SESSION['id_user'])) {
    // Hapus semua data sesi
    session_unset();

    // Hapus sesi
    session_destroy();

    // Redirect ke halaman login
    header("Location: ../loginadmin/");
    exit();
} else {
    // Jika pengguna belum masuk, bisa langsung mengarahkan ke halaman login tanpa perlu logout.
    header("Location: ../loginadmin/");
    exit();
}
