<?php
include '../conf/koneksi.php';

$id = $_GET['id']; // Ambil ID dari parameter URL

// Pastikan metode yang digunakan adalah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pastikan parameter 'id_user' ada dalam URL
    if (isset($_GET['id_user'])) {
        $id_pengaduan = $_GET['id_user'];

        // Query untuk memeriksa apakah ID pengaduan valid
        $query_check = "SELECT id FROM form_pengaduan WHERE id_user = $id_pengaduan";
        $result_check = mysqli_query($conn, $query_check);

        if (mysqli_num_rows($result_check) > 0) {
            // Ambil ID pengaduan yang sesuai
            $row_check = mysqli_fetch_assoc($result_check);
            $id_pengaduan = $row_check['id'];

            // Ambil data dari formulir tanggapan
            $tanggapan = $_POST['tanggapan'];

            $id_user = $_SESSION['id_user'];

            // Query untuk menyimpan tanggapan admin ke dalam tabel tanggapan_admin
            $query = "INSERT INTO tanggapan_admin (id_pengaduan, tanggapan) VALUES ($id_pengaduan, '$tanggapan')";

            if (mysqli_query($conn, $query)) {
                // Jika tanggapan berhasil disimpan, dapatkan ID tanggapan admin yang baru saja disimpan
                $id_tanggapan_admin = mysqli_insert_id($conn);

                // Tambahkan notifikasi dengan ID tanggapan admin yang sesuai
                $pesan_notifikasi = "Tanggapan admin telah diterima.";
                $query_notifikasi = "INSERT INTO notifikasi (id_pengaduan, id_user, id_tanggapan_admin, pesan) VALUES ($id_pengaduan, $id_user, $id_tanggapan_admin, '$pesan_notifikasi')";

                if (mysqli_query($conn, $query_notifikasi)) {
                    echo "Tanggapan berhasil disimpan dan notifikasi telah ditambahkan.";
                } else {
                    echo "Notifikasi gagal ditambahkan: " . mysqli_error($conn);
                }
            } else {
                // Handle jika terjadi kesalahan saat menyimpan tanggapan
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "ID pengaduan tidak valid.";
        }
    } else {
        echo "Parameter 'id_user' tidak ditemukan.";
    }
} else {
    echo "Metode yang digunakan bukan POST.";
}

mysqli_close($conn);
