<?php
include '../conf/koneksi.php';

$idadmin = $_GET['id']; // Ambil ID dari parameter URL

// Mendapatkan ID yang diambil dari URL
if (isset($_GET['iduser'])) {
    $id = $_GET['iduser'];

    // Query untuk mendapatkan data berdasarkan ID
    $query = mysqli_query($conn, "SELECT * FROM pengaduan_email WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);

    // Memeriksa apakah data ditemukan
    if ($row) {
        $judul_email = $row['judul_email'];
        $email = $row['email'];
        $kontak = $row['kontak'];
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
    $judul_email = $_POST['judul_email'];
    $email = $_POST['email'];
    $kontak = $_POST['kontak'];

    // Proses update data ke database
    $updateQuery = mysqli_query($conn, "UPDATE pengaduan_email SET judul_email = '$judul_email', email = '$email', kontak = '$kontak' WHERE id = '$id'");
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
                            $query = "SELECT * FROM pengaduan_email WHERE id='$edit_id'"; // Sesuaikan dengan tabel Anda
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            ?>

                            <form action="?q=edithalamanpengaduanemail&iduser=<?= $edit_id; ?>&id=<?php echo $idadmin; ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="form-group">
                                    <label for="judul_email">Judul email:</label>
                                    <input type="text" class="form-control" id="judul_email" name="judul_email" value="<?php echo $row['judul_email']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <textarea class="form-control" id="email" name="email" required><?php echo $row['email']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="kontak">Kontak:</label>
                                    <textarea class="form-control" id="kontak" name="kontak" required><?php echo $row['kontak']; ?></textarea>
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