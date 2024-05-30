<?php

include '../conf/koneksi.php'; // Pastikan Anda memiliki file koneksi yang sesuai


if (isset($_POST['update_status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $tanggapan = $_POST['tanggapan'];
    $query = "UPDATE status_pengajuan SET status = '$status', tanggapan = '$tanggapan' WHERE id_user = $id";
    mysqli_query($conn, $query);
    // Redirect kembali ke halaman ini atau halaman lain jika diperlukan.
}
