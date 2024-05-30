<?php
include '../conf/koneksi.php';

$idadmin = $_GET['id']; // Ambil ID dari parameter URL
// Kode untuk menyimpan data ke dalam database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    // Periksa apakah file gambar telah diunggah
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $gambar = $_FILES['gambar']['name'];

        // Proses upload file gambar
        $targetDir = "gambardb/";
        $targetFile = $targetDir . basename($gambar);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile);
    } else {
        // Handle ketika tidak ada file gambar diunggah
        $gambar = ""; // Atur gambar menjadi string kosong atau sesuai dengan kebutuhan Anda
    }

    // Query untuk menyimpan data ke dalam database
    $query = "INSERT INTO konfigurasi (judul, deskripsi, gambar) VALUES ('$judul', '$deskripsi', '$gambar')"; // Sesuaikan dengan tabel Anda

    if (mysqli_query($conn, $query)) {
        // Jika update berhasil, tampilkan SweetAlert
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
                            <form action="?q=add&id=<?= $id; ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="judul">Judul:</label>
                                    <input type="text" class="form-control" id="judul" name="judul" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi:</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar:</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar" required>
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