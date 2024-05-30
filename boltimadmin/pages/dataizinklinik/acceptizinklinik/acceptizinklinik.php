<?php
include '../conf/koneksi.php';

$id_admin = isset($_GET["id_admin"]) ? $_GET["id_admin"] : "";
$idFileGet = isset($_GET["idfile"]) ? $_GET["idfile"] : "";
$idGet = isset($_GET["id"]) ? $_GET["id"] : "";
$namapemilik = isset($_GET["namapemilik"]) ? $_GET["namapemilik"] : "";

// Periksa apakah admin sudah login dan memiliki hak akses yang sesuai di sini
// Misalnya, jika Anda memiliki sistem login yang memvalidasi admin, Anda dapat melakukan pemeriksaan di sini.

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["izin_terbit_klinik"])) {
    $id_user = $_POST["id_user"];
    $id_file = $_POST["id_upload"];
    $target_dir = "gambardb/izin_terbit_klinik/";
    $target_file = $target_dir . basename($_FILES["izin_terbit_klinik"]["name"]);
    $uploadOk = 1;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<script>";
        echo "alert('Maaf, file tersebut sudah ada.');";
        echo "window.location.href='index.php?id=$id_admin';";
        echo "</script>";
        $uploadOk = 0;
    }

    // Check file size (adjust as needed)
    if ($_FILES["izin_terbit_klinik"]["size"] > 5000000) {
        echo "<script>";
        echo "alert('Maaf, ukuran file terlalu besar.');";
        echo "window.location.href='index.php?id=$id_admin';";
        echo "</script>";
        $uploadOk = 0;
    }

    // Allow certain file formats (adjust as needed)
    if ($file_type != "pdf") {
        echo "<script>";
        echo "alert('Maaf, hanya file PDF yang diizinkan.');";
        echo "window.location.href='index.php?id=$id_admin';";
        echo "</script>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Maaf, file Anda tidak diunggah.";
    } else {
        if (move_uploaded_file($_FILES["izin_terbit_klinik"]["tmp_name"], $target_file)) {
            // File berhasil diunggah, Anda dapat menyimpan data ke database di sini
            $query = "INSERT INTO izin_terbit_klinik (id_user, id_upload, file_path, nama_pemilik) VALUES ('$id_user', '$id_file', '$target_file', '$namapemilik')";

            // Ubah status menjadi "Setuju" di dalam query di atas
            $updateQuery = "UPDATE upload
                            SET status = 'Setuju'
                            WHERE id_upload = $idFileGet";

            if (mysqli_query($conn, $query) && mysqli_query($conn, $updateQuery)) {
                echo "<script>";
                echo "alert('File berhasil diunggah');";
                echo "window.location.href='index.php?id=$id_admin';";
                echo "</script>";
            } else {
                echo "<script>";
                echo "alert('File berhasil diunggah, tetapi terjadi masalah dalam menyimpan data ke database.');";
                echo "window.location.href='index.php?id=$id_admin';";
                echo "</script>";
            }
        } else {
            echo "<script>";
            echo "alert('Maaf, terjadi kesalahan saat mengunggah file Anda.');";
            echo "window.location.href='index.php?id=$id_admin';";
            echo "</script>";
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
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="izin_terbit_klinik">Unggah Izin Terbit</label>
                                    <input type="file" class="form-control" id="izin_terbit_klinik"
                                        name="izin_terbit_klinik" required>
                                </div>
                                <input type="hidden" name="id_user" value="<?php echo $idGet; ?>">
                                <input type="hidden" name="id_upload" value="<?php echo $idFileGet; ?>">
                                <button type="submit" class="btn btn-primary">Unggah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>