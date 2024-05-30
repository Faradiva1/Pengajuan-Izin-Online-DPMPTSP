<?php
include '../conf/koneksi.php';

$idadmin = $_GET['id']; // Ambil ID dari parameter URL

// Mendapatkan ID yang diambil dari URL
if (isset($_GET['iduser'])) {
    $id = $_GET['iduser'];

    // Query untuk mendapatkan data berdasarkan ID
    $query = mysqli_query($conn, "SELECT * FROM informasi_section_tiga_dua WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $gambar_url = $row['gambar_url'];
    $deskripsi = $_POST['deskripsi'];
    $checklist_1 = $_POST['checklist_1'];
    $checklist_2 = $_POST['checklist_2'];
    $checklist_3 = $_POST['checklist_3'];
    $checklist_4 = $_POST['checklist_4'];
    $checklist_5 = $_POST['checklist_5'];
    $checklist_6 = $_POST['checklist_6'];
    $checklist_7 = $_POST['checklist_7'];


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $gambar = $row['gambar'];
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];


        // Mengunggah gambar ke direktori server jika ada perubahan gambar
        if (!empty($_FILES['gambar_url']['name'])) {
            $gambar_url = $_FILES['gambar_url']['name'];
            $targetDir = "gambardb/section3/";
            $targetFile = $targetDir . basename($_FILES["gambar_url"]["name"]);
            move_uploaded_file($_FILES["gambar_url"]["tmp_name"], $targetFile);
        }
        // Update data termasuk nama file gambar
        $query = mysqli_query($conn, "UPDATE informasi_section_tiga_dua SET judul = '$judul', deskripsi = '$deskripsi', 
                gambar_url = '$gambar_url', 
                checklist_1 = '$checklist_1', checklist_2 = '$checklist_2', checklist_3 = '$checklist_3', 
                checklist_4 = '$checklist_4', checklist_5 = '$checklist_5', checklist_6 = '$checklist_6', 
                checklist_7 = '$checklist_7' WHERE id = '$id'");
        if ($query) {
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

                            $edit_id = $_GET['iduser'];
                            $query = "SELECT * FROM informasi_section_tiga_dua WHERE id='$edit_id'"; // Sesuaikan dengan tabel Anda
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            ?>

                            <form action="?q=edit3_2&iduser=<?= $edit_id; ?>&id=<?php echo $idadmin; ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $row['judul']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar_url" class="form-label">Gambar :</label>
                                    <div style="display: flex; align-items: center;">
                                        <?php if (!empty($row['gambar_url'])) : ?>
                                            <div style="margin-right: 10px;">
                                                <img src="gambardb/section3/<?php echo $row['gambar_url']; ?>" alt="Gambar saat ini" style="max-width: 100px;">
                                            </div>
                                        <?php endif; ?>
                                        <p style="margin: 0; flex: 1; margin-right: 10px;">Ingin merubah gambar?</p>
                                        <input type="file" class="form-control" id="gambar_url" name="gambar_url">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?php echo $row['deskripsi']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="checklist_1" class="form-label">Checklist 1</label>
                                    <input type="text" class="form-control" id="checklist_1" name="checklist_1" value="<?php echo $row['checklist_1']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="checklist_2" class="form-label">Checklist 2</label>
                                    <input type="text" class="form-control" id="checklist_2" name="checklist_2" value="<?php echo $row['checklist_2']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="checklist_3" class="form-label">Checklist 3</label>
                                    <input type="text" class="form-control" id="checklist_3" name="checklist_3" value="<?php echo $row['checklist_3']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="checklist_4" class="form-label">Checklist 4</label>
                                    <input type="text" class="form-control" id="checklist_4" name="checklist_4" value="<?php echo $row['checklist_4']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="checklist_5" class="form-label">Checklist 5</label>
                                    <input type="text" class="form-control" id="checklist_5" name="checklist_5" value="<?php echo $row['checklist_5']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="checklist_6" class="form-label">Checklist 6</label>
                                    <input type="text" class="form-control" id="checklist_6" name="checklist_6" value="<?php echo $row['checklist_6']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="checklist_7" class="form-label">Checklist 7</label>
                                    <input type="text" class="form-control" id="checklist_7" name="checklist_7" value="<?php echo $row['checklist_7']; ?>" required>
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