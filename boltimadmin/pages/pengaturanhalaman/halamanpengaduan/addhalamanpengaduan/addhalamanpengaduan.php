<?php
include '../conf/koneksi.php';

$idadmin = $_GET['id']; // Ambil ID dari parameter URL
// Kode untuk menyimpan data ke dalam database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    // Query untuk menyimpan data ke dalam database
    $query = "INSERT INTO halaman_pengaduan (judul, deskripsi) VALUES ('$judul', '$deskripsi')"; // Sesuaikan dengan tabel Anda

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
                            <form action="?q=addhalamanpengaduan&id=<?= $id; ?>" method="post">
                                <div class="form-group">
                                    <label for="judul">Judul:</label>
                                    <input type="text" class="form-control" id="judul" name="judul" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi:</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
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