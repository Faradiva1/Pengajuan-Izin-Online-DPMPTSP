<?php
// Pastikan Anda memiliki koneksi ke database di sini
include '../conf/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_form_pengaduan']) && isset($_GET['id'])) {
    // Ambil parameter dari URL
    $id = $_GET['id'];
    $ifp = $_GET['id_form_pengaduan'];

    // Query SQL untuk menghapus pengaduan
    $query = "DELETE FROM form_pengaduan1 WHERE id_form_pengaduan = '$ifp'";

    // if (mysqli_query($conn, $query)) {
    //     // Data berhasil dihapus
    //     header("Location: index.php?id=$id_admin"); // Ganti dengan halaman yang sesuai
    //     exit();
    // } else {
    //     // Terjadi kesalahan saat menghapus data
    //     echo "Error: " . mysqli_error($conn);
    // }
    if (mysqli_query($conn, $query)) {
        // Data berhasil dihapus
        // header("Location: daftar_izin_klinik.php"); // Ganti dengan halaman yang sesuai
        // exit();
        echo "<script>";
        echo "alert('Berhasil di Hapus');";
        echo "window.location.href='index.php?id=$id';";
        echo "</script>";
    } else {
        // Terjadi kesalahan saat menghapus data
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Jika parameter tidak lengkap atau tidak valid
    echo "Invalid request.";
}