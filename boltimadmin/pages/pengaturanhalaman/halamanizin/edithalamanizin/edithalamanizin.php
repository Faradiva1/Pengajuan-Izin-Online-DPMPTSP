<?php
include '../conf/koneksi.php';

$idadmin = $_GET['id']; // Ambil ID dari parameter URL

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $judul_dua = $_POST['judul_dua'];
    $deskripsi = $_POST['deskripsi'];

    // Mengunggah gambar ke direktori server jika ada perubahan gambar
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $targetDir = "gambardb/halamanizinonline/";
        $targetFile = $targetDir . basename($_FILES["gambar"]["name"]);
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile);

        // Update data termasuk nama file gambar
        $query = "UPDATE izin_klinik 
                  SET judul = '$judul', judul_dua = '$judul_dua', deskripsi = '$deskripsi', gambar = '$gambar' 
                  WHERE id = '$id'";

        if (mysqli_query($conn, $query)) {
            // Jika update berhasil, arahkan pengguna ke halaman yang Anda inginkan
            echo '<script>alert("Berhasil Update"); window.location = "?q=pengaturanhalaman&id=' . $idadmin . '";</script>';
        } else {
            // Tampilkan pesan error jika terjadi kesalahan
            $error = "Terjadi kesalahan saat mengupdate data: " . mysqli_error($conn);
        }
    } else {
        // Jika tidak ada perubahan gambar, update data tanpa mengubah gambar
        $query = "UPDATE izin_klinik 
                  SET judul = '$judul', judul_dua = '$judul_dua', deskripsi = '$deskripsi' 
                  WHERE id = '$id'";

        if (mysqli_query($conn, $query)) {
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
            $error = "Terjadi kesalahan saat mengupdate data: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
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

                            if (isset($_GET['iduser'])) {
                                $edit_id = $_GET['iduser'];
                                $query = "SELECT * FROM izin_klinik WHERE id='$edit_id'"; // Sesuaikan dengan tabel Anda
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_assoc($result);
                            }
                            ?>

                            <form action="?q=edithalamanizin&iduser=<?= $edit_id ?>&id=<?php echo $idadmin; ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $row['judul']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="judul_dua" class="form-label">Judul Dua</label>
                                    <input type="text" class="form-control" id="judul_dua" name="judul_dua" value="<?php echo $row['judul_dua']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" required><?php echo $row['deskripsi']; ?></textarea>
                                </div>
                                <div class=" mb-3">
                                    <label for="gambar" class="form-label">Gambar :</label>
                                    <div style="display: flex; align-items: center;">
                                        <?php if (!empty($row['gambar'])) : ?>
                                            <div style="margin-right: 10px;">
                                                <img src="gambardb/halamanizinonline/<?php echo $row['gambar']; ?>" alt="Gambar saat ini" style="max-width: 100px;">
                                            </div>
                                        <?php endif; ?>
                                        <p style="margin: 0; flex: 1; margin-right: 10px;">Ingin merubah gambar?</p>
                                        <input type="file" class="form-control" id="gambar" name="gambar">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>