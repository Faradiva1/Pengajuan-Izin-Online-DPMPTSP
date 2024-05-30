<?php
include './conf/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_notifikasi"])) {
    $idNotifikasi = $_POST["id_notifikasi"];

    // Query untuk mengubah status notifikasi menjadi "Telah Dibaca"
    $queryUpdate = "UPDATE notifikasi SET dibaca = 1 WHERE id = $idNotifikasi";
    if (mysqli_query($conn, $queryUpdate)) {
        // Perbarui jumlah notifikasi yang belum dibaca
        $id_user = $_SESSION['id_user'];
        $query_count_unread = "SELECT COUNT(id) AS total FROM notifikasi WHERE id_user = $id_user AND dibaca = 0";
        $result_count_unread = mysqli_query($conn, $query_count_unread);
        $row_count_unread = mysqli_fetch_assoc($result_count_unread);
        $total_notifikasi_unread = $row_count_unread['total'];

        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "invalid_request";
}
