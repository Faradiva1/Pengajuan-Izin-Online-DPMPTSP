<?php
include '../conf/koneksi.php';

$idadmin = $_GET['id']; // Ambil ID dari parameter URL

// Mendapatkan ID yang diambil dari URL
if (isset($_GET['iduser'])) {
    $id = $_GET['iduser'];

    // Query untuk mendapatkan data berdasarkan ID
    $query = mysqli_query($conn, "SELECT * FROM pengaduan_contact WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);

    // Memeriksa apakah data ditemukan
    if ($row) {
        $judul_kontak = $row['judul_kontak'];
        $no_kontak = $row['no_kontak'];
        $kontak = $row['no_kontak_dua'];
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
    $judul_kontak = $_POST['judul_kontak'];
    $no_kontak = $_POST['no_kontak'];
    $no_kontak_dua = $_POST['no_kontak_dua'];

    // Proses update data ke database
    $updateQuery = mysqli_query($conn, "UPDATE pengaduan_contact SET judul_kontak = '$judul_kontak', no_kontak = '$no_kontak', no_kontak_dua = '$no_kontak_dua' WHERE id = '$id'");
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
                            $query = "SELECT * FROM pengaduan_contact WHERE id='$edit_id'"; // Sesuaikan dengan tabel Anda
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            ?>

                            <form action="?q=edithalamanpengaduankontak&iduser=<?= $edit_id; ?>&id=<?php echo $idadmin; ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="form-group">
                                    <label for="judul_kontak">Judul no_kontak:</label>
                                    <input type="text" class="form-control" id="judul_kontak" name="judul_kontak" value="<?php echo $row['judul_kontak']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_kontak">Kontak 1:</label>
                                    <textarea class="form-control" id="no_kontak" name="no_kontak" required><?php echo $row['no_kontak']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="no_kontak_dua">Kontak 2:</label>
                                    <textarea class="form-control" id="no_kontak_dua" name="no_kontak_dua" required><?php echo $row['no_kontak_dua']; ?></textarea>
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