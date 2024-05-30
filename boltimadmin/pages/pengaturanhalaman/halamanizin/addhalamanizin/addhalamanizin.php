<?php
include '../conf/koneksi.php';

$idadmin = $_GET['id']; // Ambil ID dari parameter URL

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $judul_dua = $_POST['judul_dua'];
    $deskripsi = $_POST['deskripsi'];

    // Periksa apakah file gambar telah diunggah
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $gambar = $_FILES['gambar']['name'];

        // Proses upload file gambar
        $targetDir = "gambardb/halamanizinonline/";
        $targetFile = $targetDir . basename($gambar);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile);
    } else {
        // Handle ketika tidak ada file gambar diunggah
        $gambar = ""; // Atur gambar menjadi string kosong atau sesuai dengan kebutuhan Anda
    }

    // Tambahkan nilai tanggal_dibuat dan tanggal_diperbarui
    $tanggal_dibuat = date('Y-m-d H:i:s'); // Waktu saat ini
    $tanggal_diperbarui = date('Y-m-d H:i:s'); // Waktu saat ini

    // Query untuk menyimpan data ke dalam database
    $query = "INSERT INTO izin_klinik (judul, judul_dua, deskripsi, gambar, tanggal_dibuat, tanggal_diperbarui) 
                VALUES ('$judul', '$judul_dua', '$deskripsi', '$gambar', '$tanggal_dibuat', '$tanggal_diperbarui')";

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
                            <form action="?q=addhalamanizin&id=<?= $id; ?>" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" required>
                                </div>
                                <div class="mb-3">
                                    <label for="judul_dua" class="form-label">Judul Dua</label>
                                    <input type="text" class="form-control" id="judul_dua" name="judul_dua" required>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                                </div>

                                <!-- Input tersembunyi untuk tanggal_dibuat -->
                                <input type="hidden" name="tanggal_dibuat" value="<?= date('Y-m-d H:i:s'); ?>">

                                <!-- Input tersembunyi untuk tanggal_diperbarui -->
                                <input type="hidden" name="tanggal_diperbarui" value="<?= date('Y-m-d H:i:s'); ?>">

                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>