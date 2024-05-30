<?php
include './conf/koneksi.php';

// Pastikan pengguna telah login dan Anda memiliki informasi pengguna saat ini
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama_pengadu = $_POST['nama_pengadu'];
        $email_pengadu = $_POST['email_pengadu'];
        $subject = $_POST['subject'];
        $isi_pengaduan = $_POST['isi_pengaduan'];

        // Query untuk menyimpan data pengaduan ke dalam tabel form_pengaduan dengan id_user yang sesuai
        $query = "INSERT INTO form_pengaduan1 (nama_pengadu, email_pengadu, subject, isi_pengaduan) 
                VALUES ('$nama_pengadu','$email_pengadu', '$subject', '$isi_pengaduan')";

        if (mysqli_query($conn, $query)) {
            echo "Pengaduan berhasil dikirim.";
        } else {
            echo "Gagal mengirim pengaduan: " . mysqli_error($conn);
        }
    }
} else {
    echo "Anda harus login untuk mengirimkan pengaduan.";
}