<?php
include '../conf/koneksi.php';

$idfileget = isset($_GET["idfile"]) ? $_GET["idfile"] : "";
$idget = isset($_GET["id"]) ? $_GET["id"] : "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["izin_terbit_klinik"])) {
    $id_user = $_POST["id_user"];
    $target_dir = "gambardb/izin_terbit_klinik/";
    $target_file = $target_dir . basename($_FILES["izin_terbit_klinik"]["name"]);
    $uploadOk = 1;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Maaf, file tersebut sudah ada.";
        $uploadOk = 0;
    }

    // Check file size (adjust as needed)
    if ($_FILES["izin_terbit_klinik"]["size"] > 5000000) {
        echo "Maaf, ukuran file terlalu besar.";
        $uploadOk = 0;
    }

    // Allow certain file formats (adjust as needed)
    if ($file_type != "pdf") {
        echo "Maaf, hanya file PDF yang diizinkan.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Maaf, file Anda tidak diunggah.";
    } else {
        if (move_uploaded_file($_FILES["izin_terbit_klinik"]["tmp_name"], $target_file)) {
            // File berhasil diunggah, Anda dapat menyimpan data ke database di sini
            $query = "INSERT INTO izin_terbit_klinik (id_user, idfile, file_path) VALUES ('$id_user', '$idfileget', '$target_file')";
            if (mysqli_query($conn, $query)) {
                echo "File berhasil diunggah dan data disimpan ke database.";
            } else {
                echo "File berhasil diunggah, tetapi terjadi masalah dalam menyimpan data ke database.";
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file Anda.";
        }
    }
} else {
    echo "Permintaan tidak valid.";
}
?>

<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="dashboard-header d-flex align-items-center justify-content-center mb-4">
                <h4 class="text-center">Setuju Berkas</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Upload Izin Klinik Terbit
                        </div>
                        <div class="card-body">
                            <!-- Form untuk mengunggah izin terbit -->
                            <form action="?q=acceptizinklinik&id=<?= $idget; ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="izin_terbit_klinik">Unggah Izin Terbit</label>
                                    <input type="file" class="form-control" id="izin_terbit_klinik" name="izin_terbit_klinik" required>
                                </div>
                                <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                                <button type="submit" class="btn btn-primary">Unggah</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>