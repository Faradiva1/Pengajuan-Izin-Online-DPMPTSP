<?php
include '../conf/koneksi.php';

$idadmin = $_GET['id']; // Ambil ID dari parameter URL
// Kode untuk menyimpan data ke dalam database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul_kontak = $_POST['judul_kontak'];
    $no_kontak = $_POST['no_kontak'];
    $no_kontak_dua = $_POST['no_kontak_dua'];

    // Query untuk menyimpan data ke dalam database
    $query = "INSERT INTO pengaduan_contact (judul_kontak, no_kontak, no_kontak_dua) VALUES ('$judul_kontak', '$no_kontak', '$no_kontak_dua')"; // Sesuaikan dengan tabel Anda

    if (mysqli_query($conn, $query)) {
        echo '<script>
        Swal.fire({
            title: "Berhasil!",
            text: "Data berhasil ditambahkan.",
            icon: "success"
        }).then(function() {
            window.location = "?q=pengaturanhalaman&id=' . $idadmin . '";
        });
    </script>';
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
    // Tutup koneksi
    mysqli_close($conn);
}
?>

<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Tambah Data</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Proses Tambah Data</div>
                        </div>
                        <div class="card-body">
                            <form action="?q=addhalamanpengaduankontak&id=<?= $id; ?>" method="post">
                                <div class="form-group">
                                    <label for="judul_kontak">Judul Kontak:</label>
                                    <input type="text" class="form-control" id="judul_kontak" name="judul_kontak" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_kontak">Kontak 1:</label>
                                    <textarea class="form-control" id="no_kontak" name="no_kontak" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="no_kontak_dua">no_kontak_dua 2:</label>
                                    <textarea class="form-control" id="no_kontak_dua" name="no_kontak_dua" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>