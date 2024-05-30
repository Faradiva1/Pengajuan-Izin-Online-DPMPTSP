<?php
// Sertakan file koneksi.php atau konfigurasi database Anda di sini
include './conf/koneksi.php';

$iduser = $_GET['iduser'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pastikan variabel-variabel ini sesuai dengan kolom-kolom yang sesuai di tabel database Anda
    $id = $_POST['idpengaduan'];
    $date = $_POST['date'];
    $ktp = $_FILES['ktp'];
    $akta_pendirian = $_FILES['akta_pendirian'];
    $surat_lokasi = $_FILES['surat_lokasi'];
    // Lanjutkan dengan berkas-berkas lainnya
    $bh = $_FILES['bukti_hak'];
    $il = $_FILES['izin_lingkungan'];
    $pk = $_FILES['profil_klinik'];
    $nib = $_FILES['nib'];
    $sd = $_FILES['surat_dokter'];
    $sip = $_FILES['sip_dokter'];
    $dt = $_FILES['daftar_tenaga'];
    $sr = $_FILES['surat_rekomendasi'];

    // Direktori tempat menyimpan berkas
    $uploadDir = "uploads/";

    // Menggunakan fungsi untuk memproses unggahan berkas
    function uploadFile($file, $uploadDir)
    {
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $filePath = $uploadDir . $fileName;

        // Memindahkan berkas ke direktori yang ditentukan
        if (move_uploaded_file($fileTmpName, $filePath)) {
            return $filePath; // Mengembalikan path berkas yang berhasil diunggah
        } else {
            return false; // Gagal memindahkan berkas
        }
    }

    // Mengunggah dan memproses setiap berkas
    $ktpPath = uploadFile($ktp, $uploadDir);
    $aktaPendirianPath = uploadFile($akta_pendirian, $uploadDir);
    $suratLokasiPath = uploadFile($surat_lokasi, $uploadDir);
    // Lanjutkan untuk semua berkas yang diperlukan
    $suratbhPath = uploadFile($bh, $uploadDir);
    $suratilPath = uploadFile($il, $uploadDir);
    $suratpkPath = uploadFile($pk, $uploadDir);
    $suratnibPath = uploadFile($nib, $uploadDir);
    $suratsdPath = uploadFile($sd, $uploadDir);
    $suratsipPath = uploadFile($sip, $uploadDir);
    $suratdtPath = uploadFile($dt, $uploadDir);
    $suratsrPath = uploadFile($sr, $uploadDir);



    // Membuka koneksi ke database (sesuai dengan informasi di koneksi.php)
    // $conn = mysqli_connect($host, $username, $password, $database);

    // Memeriksa apakah koneksi berhasil
    // if (!$conn) {
    //     die("Koneksi ke database gagal: " . mysqli_connect_error());
    // }

    // Kueri SQL INSERT untuk menyimpan informasi ke database
    $sql = "INSERT INTO upload (id_user, id_pengajuan, waktu_upload, ktp, akta_pendirian, surat_lokasi, 
    bukti_hak, izin_lingkungan,
    profil_klinik, nib, surat_dokter, sip_dokter, daftar_tenaga, surat_rekomendasi)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Menyiapkan pernyataan SQL dengan parameter
    $stmt = mysqli_prepare($conn, $sql);

    // Mengikat parameter ke pernyataan SQL
    mysqli_stmt_bind_param(
        $stmt,
        'ssssssssssssss',
        $iduser,
        $id,
        $date,
        $ktpPath,
        $aktaPendirianPath,
        $suratLokasiPath,
        $suratbhPath,
        $suratilPath,
        $suratpkPath,
        $suratnibPath,
        $suratsdPath,
        $suratsipPath,
        $suratdtPath,
        $suratsrPath
    );

    // // Menjalankan pernyataan SQL
    // if (mysqli_stmt_execute($stmt)) {
    //     mysqli_query($conn, "UPDATE pengajuan set respon = 1 WHERE id_pengajuan = $id");
    //     echo "Berkas berhasil diunggah dan informasi disimpan ke database.";
    //     header("Location: ?q=izinproses&iduser=$iduser");
    //     exit();
    // } else {
    //     echo "Gagal menyimpan informasi ke database: " . mysqli_error($conn);
    // }

// Menjalankan pernyataan SQL
if (mysqli_stmt_execute($stmt)) {
    mysqli_query($conn, "UPDATE pengajuan set respon = 1 WHERE id_pengajuan = $id");

    // Menampilkan pesan sukses dengan popup
    echo '<script>';
    echo 'alert("Berkas berhasil diunggah. Menunggu Verifikasi Dari Dinas");';
    echo "window.location.href = '?q=success&iduser=$iduser';"; // Ganti "halaman_anda.php" dengan URL halaman yang Anda inginkan
    echo '</script>';
} else {
    echo "Gagal menyimpan informasi ke database: " . mysqli_error($conn);
}



    // // Menutup pernyataan dan koneksi
    // mysqli_stmt_close($stmt);
    // mysqli_close($conn);
}