<?php
include './conf/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $targetDir = "uploads/";
    $errors = [];

    $fileColumns = [
        'ktp' => 'ktp',
        'akta_pendirian' => 'akta_pendirian',
        'surat_lokasi' => 'surat_lokasi',
        'bukti_hak' => 'bukti_hak',
        'izin_lingkungan' => 'izin_lingkungan',
        'profil_klinik' => 'profil_klinik',
        'nib' => 'nib',
        'surat_dokter' => 'surat_dokter',
        'sip_dokter' => 'sip_dokter',
        'daftar_tenaga' => 'daftar_tenaga',
        'surat_rekomendasi' => 'surat_rekomendasi'
    ];

    foreach ($fileColumns as $fieldName => $columnName) {
        if (!isset($_FILES[$fieldName])) {
            $errors[] = "Error: Berkas $fieldName tidak ditemukan";
            continue;
        }

        $file = $_FILES[$fieldName];
        $fileName = basename($file["name"]);
        $filePath = $targetDir . $fileName;

        if (move_uploaded_file($file["tmp_name"], $filePath)) {
            // Menggunakan query UPDATE untuk mengupdate nama berkas di database
            $sql = "INSERT INTO upload ($columnName) VALUES ('$filePath')";
            if (!mysqli_query($conn, $sql)) {
                $errors[] = "Error: Gagal menyimpan berkas $fieldName ke database";
            }
        } else {
            $errors[] = "Error: Gagal mengunggah berkas $fieldName";
        }
    }

    if (empty($errors)) {
        // Menggunakan prepared statement untuk menghindari SQL Injection
        $sql = "UPDATE pengajuan SET respon = 1 WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            if (mysqli_stmt_execute($stmt)) {
                echo "Berkas berhasil diunggah dan disimpan ke database.";
            } else {
                $errors[] = "Error: Gagal mengubah status respon di database";
            }
            mysqli_stmt_close($stmt);
        } else {
            $errors[] = "Error: Gagal membuat pernyataan SQL";
        }
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
