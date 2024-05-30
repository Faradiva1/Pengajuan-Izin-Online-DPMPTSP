<?php
include './conf/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fileFields = [
        'ktp', 'akta_pendirian', 'surat_lokasi', 'bukti_hak',
        'izin_lingkungan', 'profil_klinik', 'nib', 'surat_dokter',
        'sip_dokter', 'daftar_tenaga', 'surat_rekomendasi'
    ];

    $targetDir = "uploads/";
    $errors = [];

    foreach ($fileFields as $fieldName) {
        if (!isset($_FILES[$fieldName])) {
            $errors[] = "Berkas $fieldName tidak ditemukan";
            continue;
        }

        $file = $_FILES[$fieldName];
        $filePath = $targetDir . basename($file["name"]);

        if (move_uploaded_file($file["tmp_name"], $filePath)) {
            // Gunakan prepared statement
            $stmt = $conn->prepare("INSERT INTO upload ($fieldName) VALUES (?)");
            $stmt->bind_param("s", $filePath);

            if ($stmt->execute() === false) {
                $errors[] = "Gagal menyimpan berkas $fieldName ke database";
            }

            $stmt->close();
        } else {
            $errors[] = "Gagal mengunggah berkas $fieldName";
        }
    }

    if (empty($errors)) {
        header("Location: ?q=izinproses");
        exit();
    } else {
        foreach ($errors as $error) {
            echo "Error: $error<br>";
        }
    }
}
?>


<div class="container">
    <div class="card">
        <div class="card-header">
            <p class="card-text">Upload Berkas Pengajuan</p>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="table table-striped">
                    <thead>
                        <tr class="bg-gradient-theme text-dark">
                            <td>NO</td>
                            <td>Persyaratan</td>
                            <td>Upload Berkas</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($fileFields as $index => $fieldName) { ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo ucwords(str_replace('_', ' ', $fieldName)); ?></td>
                            <td><input type="file" name="<?php echo $fieldName; ?>" accept=".pdf" required></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Kirim Berkas</button>
            </form>
        </div>
    </div>
</div>