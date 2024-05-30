<?php
include '../conf/koneksi.php';

$idadmin = $_GET['id']; // Ambil ID dari parameter URL

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $checklist_1 = $_POST['checklist_1'];
    $checklist_2 = $_POST['checklist_2'];
    $checklist_3 = $_POST['checklist_3'];
    $checklist_4 = $_POST['checklist_4'];
    $checklist_5 = $_POST['checklist_5'];
    $checklist_6 = $_POST['checklist_6'];
    $checklist_7 = $_POST['checklist_7'];


    // Periksa apakah berkas telah diunggah
    if (isset($_FILES['gambar_url']) && $_FILES['gambar_url']['error'] === UPLOAD_ERR_OK) {
        // Mengunggah gambar ke direktori server
        $targetDir = "gambardb/section3/";
        $gambar = $_FILES['gambar_url']['name'];
        $targetFile = $targetDir . basename($_FILES["gambar_url"]["name"]);
        move_uploaded_file($_FILES["gambar_url"]["tmp_name"], $targetFile);
    } else {
        // Tidak ada berkas yang diunggah atau terjadi kesalahan
        $gambar = ''; // Atur gambar menjadi string kosong
    }

    $query = "INSERT INTO informasi_section_tiga_dua (judul, deskripsi, checklist_1, checklist_2, 
                            checklist_3, checklist_4, checklist_5, checklist_6, checklist_7, gambar_url) VALUES ('$judul', '$deskripsi',
                            '$checklist_1', '$checklist_2', '$checklist_3', '$checklist_4', '$checklist_5', 
                            '$checklist_6', '$checklist_7', '$gambar')";

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
}

mysqli_close($conn);
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
                            <form action="?q=add3_2&id=<?= $id; ?>" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar_url" class="form-label">Gambar</label>
                                    <input type="file" class="form-control" id="gambar_url" name="gambar_url" required>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="checklist_1" class="form-label">Checklist 1</label>
                                    <input type="text" class="form-control" id="checklist_1" name="checklist_1" required>
                                </div>
                                <div class="mb-3">
                                    <label for="checklist_2" class="form-label">Checklist 2</label>
                                    <input type="text" class="form-control" id="checklist_2" name="checklist_2" required>
                                </div>
                                <div class="mb-3">
                                    <label for="checklist_3" class="form-label">Checklist 3</label>
                                    <input type="text" class="form-control" id="checklist_3" name="checklist_3" required>
                                </div>
                                <div class="mb-3">
                                    <label for="checklist_4" class="form-label">Checklist 4</label>
                                    <input type="text" class="form-control" id="checklist_4" name="checklist_4" required>
                                </div>
                                <div class="mb-3">
                                    <label for="checklist_5" class="form-label">Checklist 5</label>
                                    <input type="text" class="form-control" id="checklist_5" name="checklist_5" required>
                                </div>
                                <div class="mb-3">
                                    <label for="checklist_6" class="form-label">Checklist 6</label>
                                    <input type="text" class="form-control" id="checklist_6" name="checklist_6" required>
                                </div>
                                <div class="mb-3">
                                    <label for="checklist_7" class="form-label">Checklist 7</label>
                                    <input type="text" class="form-control" id="checklist_7" name="checklist_7" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>