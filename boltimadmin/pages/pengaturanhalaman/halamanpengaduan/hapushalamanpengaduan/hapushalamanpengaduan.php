<?php

$idadmin = $_GET['id']; // Ambil ID dari parameter URL

// Kode untuk menghapus data dari database
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include '../conf/koneksi.php';

    $delete_id = $_GET['iduser'];
    $query = "DELETE FROM halaman_pengaduan WHERE id='$delete_id'"; // Sesuaikan dengan tabel Anda

    if (mysqli_query($conn, $query)) {
        // Jika update berhasil, arahkan pengguna ke halaman yang Anda inginkan
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

    // Tutup koneksi
    mysqli_close($conn);
}
