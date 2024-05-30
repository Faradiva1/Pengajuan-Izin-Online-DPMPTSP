<?php
include '../conf/koneksi.php';

$idadmin = $_GET['id']; // Ambil ID dari parameter URL

if (isset($_GET['iduser'])) {
    $id = $_GET['iduser'];

    // Query untuk mengambil nama file gambar sebelum menghapus data
    $query = "SELECT gambar FROM izin_klinik WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Hapus file gambar dari server jika ada
        if (!empty($row['gambar'])) {
            $gambarPath = "gambardb/halamanizinonline/" . $row['gambar'];
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
        }

        // Hapus data dari tabel
        $queryHapus = "DELETE FROM izin_klinik WHERE id=$id";
        if (mysqli_query($conn, $queryHapus)) {
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
} else {
    echo "Tidak ada data yang dipilih untuk dihapus.";
}

mysqli_close($conn);
