<?php
include '../conf/koneksi.php';


$idadmin = $_GET['id']; // Ambil ID dari parameter URL

// Mendapatkan ID yang diambil dari URL
if (isset($_GET['iduser'])) {
    $id = $_GET['iduser'];

    // Query untuk mendapatkan data berdasarkan ID
    $query = mysqli_query($conn, "SELECT * FROM pengaduan_alamat WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);

    // Memeriksa apakah data ditemukan
    if ($row) {
        $judul_alamat = $row['judul_alamat'];
        $alamat = $row['alamat'];
    } else {
        // Redirect jika data tidak ditemukan
        header("Location: ?q=pengaturanhalaman&id=$id");
        exit();
    }
} else {
    // Redirect jika ID tidak ditemukan dalam URL
    header("Location: ?q=pengaturanhalaman&id=$id");
    exit();
}


// Proses penyimpanan data yang diubah
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul_alamat = $_POST['judul_alamat'];
    $alamat = $_POST['alamat'];

    // Proses update data ke database
    $updateQuery = mysqli_query($conn, "UPDATE pengaduan_alamat SET judul_alamat = '$judul_alamat', alamat = '$alamat' WHERE id = '$id'");
    if ($updateQuery) {
        // Jika update berhasil, tampilkan SweetAlert
        echo '<script>
        Swal.fire({
            title: "Berhasil!",
            text: "Data berhasil di Ubah.",
            icon: "success"
        }).then(function() {
            window.location = "?q=pengaturanhalaman&id=' . $idadmin . '";
        });
    </script>';
    } else {
        // Tampilkan pesan error jika terjadi kesalahan
        $error = "Terjadi kesalahan saat mengupdate data.";
    }
}
?>

<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Halaman Beranda</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Proses Edit</div>
                        </div>
                        <div class="card-body">
                            <?php
                            include '../conf/koneksi.php';

                            $edit_id = $_GET['iduser'];
                            $query = "SELECT * FROM pengaduan_alamat WHERE id='$edit_id'"; // Sesuaikan dengan tabel Anda
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            ?>

                            <form action="?q=edithalamanpengaduanalamat&iduser=<?= $edit_id; ?>&id=<?= $idadmin; ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="form-group">
                                    <label for="judul_alamat">Judul Alamat:</label>
                                    <input type="text" class="form-control" id="judul_alamat" name="judul_alamat" value="<?php echo $row['judul_alamat']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat:</label>
                                    <textarea class="form-control" id="alamat" name="alamat" required><?php echo $row['alamat']; ?></textarea>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Simpan">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>