<?php
include '../conf/koneksi.php';

$id = $_GET['id'];
if (isset($_GET['idfile'])) {
    $idfile = $_GET['idfile'];

    // Delete data based on ID
    mysqli_query($conn, "DELETE FROM pengajuan WHERE id_user = $idfile");

    $sql = "DELETE FROM upload WHERE id = $idfile";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil dihapus. <a href='../?q=dataizinklinik&id=$id'>Kembali</a>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "ID not found.";
}
