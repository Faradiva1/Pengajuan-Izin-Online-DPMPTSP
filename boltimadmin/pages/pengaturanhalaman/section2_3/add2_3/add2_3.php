<?php
include '../conf/koneksi.php';

$idadmin = $_GET['id']; // Ambil ID dari parameter URL
// Kode untuk menyimpan data ke dalam database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    // Periksa apakah file gambar_url telah diunggah
    if (isset($_FILES['gambar_url']) && $_FILES['gambar_url']['error'] === UPLOAD_ERR_OK) {
        $gambar_url = $_FILES['gambar_url']['name'];

        // Proses upload file gambar_url
        $targetDir = "gambardb/section2_3/";
        $targetFile = $targetDir . basename($gambar_url);
        move_uploaded_file($_FILES['gambar_url']['tmp_name'], $targetFile);
    } else {
        // Handle ketika tidak ada file gambar_url diunggah
        $gambar_url = ""; // Atur gambar_url menjadi string kosong atau sesuai dengan kebutuhan Anda
    }

    // Query untuk menyimpan data ke dalam database
    $query = "INSERT INTO gambar_satu (judul, deskripsi, gambar_url) VALUES ('$judul', '$deskripsi', '$gambar_url')"; // Sesuaikan dengan tabel Anda

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
                            <form action="?q=add2_3&id=<?= $id; ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="judul">Judul:</label>
                                    <input type="text" class="form-control" id="judul" name="judul" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi:</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gambar_url">Gambar:</label>
                                    <input type="file" class="form-control" id="gambar_url" name="gambar_url" required>
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