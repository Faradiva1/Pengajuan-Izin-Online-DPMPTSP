<?php
include './conf/koneksi.php';


// Pastikan variabel $id ada dan merupakan angka (sebagai tindakan pencegahan)
if (isset($_GET['idpengajuan'])) {
    $iduser = intval($_GET['iduser']);
    $idpengajuan = intval($_GET['idpengajuan']);

    // Mulai transaksi
    mysqli_begin_transaction($conn);

    // Buat prepared statement untuk menghapus data pada tabel 'pengajuan'
    $stmt1 = mysqli_prepare($conn, "DELETE FROM pengajuan WHERE id_pengajuan = ?");
    mysqli_stmt_bind_param($stmt1, "i", $idpengajuan);

    // Buat prepared statement untuk menghapus data pada tabel 'upload'
    // $stmt2 = mysqli_prepare($conn, "DELETE FROM upload WHERE  = ?");
    // mysqli_stmt_bind_param($stmt2, "i", $id);

    // Eksekusi prepared statement untuk tabel 'pengajuan'
    if (mysqli_stmt_execute($stmt1)) {
        // Commit transaksi jika penghapusan berhasil
        mysqli_commit($conn);
        echo "<script>";
        echo "alert('Pengajuan Berhasil Dihapus!')";
        echo "</script>";
        header('Location: ?q=success&iduser=' . $iduser);
        exit;
    } else {
        // Rollback transaksi jika terjadi kesalahan
        mysqli_rollback($conn);
        echo "Error: " . mysqli_error($conn);
    }

    // Tutup prepared statement
    mysqli_stmt_close($stmt1);
    mysqli_stmt_close($stmt2);
} else {
    echo "ID not found.";
}

// Tutup koneksi ke database
// mysqli_close($conn);
