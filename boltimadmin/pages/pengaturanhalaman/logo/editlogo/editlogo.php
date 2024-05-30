<?php

include '../conf/koneksi.php';

$idadmin = $_GET['id']; // Ambil ID dari parameter URL

// Mendapatkan ID yang diambil dari URL
if (isset($_GET['iduser'])) {
    $id = $_GET['iduser'];

    // Query untuk mendapatkan data berdasarkan ID
    $query = mysqli_query($conn, "SELECT * FROM gambar_logos WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);

    // Memeriksa apakah data ditemukan
    if ($row) {
        $gambar_url = $row['gambar_url'];
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
    $gambar_url = $row['gambar_url'];

    // Proses upload file gambar_url jika ada perubahan
    if (!empty($_FILES['gambar_url']['name'])) {
        $gambar_url = $_FILES['gambar_url']['name'];
        $targetDir = "gambardb/logo/";
        $targetFile = $targetDir . basename($_FILES["gambar_url"]["name"]);
        move_uploaded_file($_FILES["gambar_url"]["tmp_name"], $targetFile);
    }

    // Proses update data ke database
    $updateQuery = mysqli_query($conn, "UPDATE gambar_logos SET gambar_url = '$gambar_url' WHERE id = '$id'");
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
                            // Periksa koneksi
                            if (!$conn) {
                                die("Koneksi ke database gagal: " . mysqli_connect_error());
                            }

                            $edit_id = $_GET['iduser'];
                            $query = "SELECT * FROM gambar_logos WHERE id='$edit_id'"; // Sesuaikan dengan tabel Anda
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            ?>

                            <form action="?q=editlogo&iduser=<?= $edit_id; ?>&id=<?php echo $idadmin; ?>" method="post"
                                enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="form-group">
                                    <label for="gambar_url">Gambar:</label>
                                    <div style="display: flex; align-items: center;">
                                        <?php if (!empty($row['gambar_url'])) : ?>
                                        <div style="margin-right: 10px; margin-bottom:20px;">
                                            <img src="gambardb/logo/<?php echo $row['gambar_url']; ?>"
                                                alt="Gambar saat ini" style="max-width: 100px;">
                                        </div>
                                        <?php endif; ?>
                                        <p style="margin: 0; flex: 1; margin-right: 10px;">Ingin merubah gambar?</p>
                                        <input type="file" class="form-control" id="gambar_url" name="gambar_url">
                                    </div>
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