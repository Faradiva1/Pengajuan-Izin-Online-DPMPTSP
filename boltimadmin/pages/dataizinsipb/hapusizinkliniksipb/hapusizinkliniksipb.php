<?php
// Pastikan Anda memiliki koneksi ke database di sini
include '../conf/koneksi.php';


$id_user = $_GET['id'];
$id_upload = $_GET['idfile'];
$id_admin = $_GET['id_admin'];
$id_pengajuan = $_GET['idpengajuan'];


// Query SQL untuk menghapus data izin klinik
$query = "DELETE FROM upload_sipb WHERE id_upload_sipb = $id_upload";
mysqli_query($conn, $query);

$query2 = "DELETE FROM feedback_sipb WHERE id_upload = $id_upload";
mysqli_query($conn, $query2);

$query1 = "DELETE FROM pengajuan_sipb WHERE id_pengajuan = $id_pengajuan";

if (mysqli_query($conn, $query1)) {
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