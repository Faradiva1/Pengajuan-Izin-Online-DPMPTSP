<?php
// Pastikan Anda memiliki koneksi ke database di sini
include '../conf/koneksi.php';


$id_user = $_GET['id'];
$id_upload = $_GET['idfile'];
$id_admin = $_GET['id_admin'];
$id_pengajuan = $_GET['idpengajuan'];


// Query SQL untuk menghapus data izin klinik
$query1 = "DELETE FROM upload WHERE id_user = $id_user AND id_upload = $id_upload";
mysqli_query($conn, $query1);

$query2 = "DELETE FROM feedback WHERE id_user = $id_user AND id_upload = $id_upload";
mysqli_query($conn, $query2);

$query = "DELETE FROM pengajuan WHERE id_user = $id_user AND id_pengajuan = $id_pengajuan";

if (mysqli_query($conn, $query)) {
    // Data berhasil dihapus
    // header("Location: daftar_izin_klinik.php"); // Ganti dengan halaman yang sesuai
    // exit();
    echo "<script>";
    echo "alert('Data berhasil di hapus');";
    echo "window.location.href='index.php?id=$id_admin';";
    echo "</script>";
} else {
    // Terjadi kesalahan saat menghapus data
    echo "Error: " . mysqli_error($conn);
}