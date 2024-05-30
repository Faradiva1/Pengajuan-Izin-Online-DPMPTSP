<?php

include './conf/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idpengaduan = $_POST['id'];
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

    // Keamanan: Menggunakan prepared statement untuk menghindari SQL injection
    $sql = "UPDATE pengajuan SET respon = 1 WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $idpengaduan);

    if (mysqli_stmt_execute($stmt)) {
        foreach ($fileColumns as $fieldName => $columnName) {
            if (!isset($_FILES[$fieldName])) {
                $errors[] = "Error: Berkas $fieldName tidak ditemukan";
                continue;
            }

            $file = $_FILES[$fieldName];
            $fileName = basename($file["name"]);
            $filePath = $targetDir . $fileName;

            if (move_uploaded_file($file["tmp_name"], $filePath)) {
                // Validasi tipe berkas di sini jika diperlukan

                // Menggunakan prepared statement untuk menghindari SQL injection
                $sql = "INSERT INTO upload ($columnName) VALUES (?)";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "s", $filePath);

                if (!mysqli_stmt_execute($stmt)) {
                    $errors[] = "Error: Gagal menyimpan berkas $fieldName ke database";
                }
            } else {
                $errors[] = "Error: Gagal mengunggah berkas $fieldName";
            }
        }

        if (empty($errors)) {
            echo "Berkas berhasil diunggah dan disimpan ke database.";
        } else {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
    } else {
        // Kesalahan dalam query UPDATE
        echo "Error: " . mysqli_error($conn);
    }
}
