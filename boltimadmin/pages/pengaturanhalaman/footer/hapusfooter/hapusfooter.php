<?php
include '../conf/koneksi.php';

$idadmin = $_GET['id']; // Ambil ID dari parameter URL

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['iduser'];

    // Periksa apakah data dengan ID tersebut ada dalam database
    $query = "SELECT * FROM footer_data WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Data ditemukan, maka lakukan proses penghapusan
        $deleteQuery = "DELETE FROM footer_data WHERE id = $id";
        if (mysqli_query($conn, $deleteQuery)) {
            // Jika update berhasil, tampilkan SweetAlert
            // Tambahkan SweetAlert konfirmasi
            echo '<script>
        Swal.fire({
            title: "Konfirmasi",
            text: "Apakah Anda yakin ingin menghapus data ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus",
            cancelButtonText: "Batal"
        }).then(function(result) {
            if (result.isConfirmed) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "?q=pengaturanhalaman&id=' . $idadmin . '&iduser=' . $delete_id . '", true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Data berhasil dihapus.",
                            icon: "success"
                        }).then(function() {
                            window.location = "?q=pengaturanhalaman&id=' . $idadmin . '";
                        });
                    } else {
                        Swal.fire("Error", "Gagal menghapus data.", "error");
                    }
                };
                xhr.send();
            }
        });
    </script>';
        } else {
            echo "Gagal menghapus data: " . mysqli_error($conn);
        }
    } else {
        echo "Data tidak ditemukan.";
    }
}

mysqli_close($conn);
