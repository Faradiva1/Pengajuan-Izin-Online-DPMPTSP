<?php
// Sertakan file koneksi.php atau konfigurasi database Anda di sini
include './conf/koneksi.php';

$iduser = $_GET['iduser'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pastikan variabel-variabel ini sesuai dengan kolom-kolom yang sesuai di tabel database Anda
    $id = $_POST['idpengaduan'];
    $date = $_POST['date'];
    $ktp = $_FILES['ktp'];
    $regis_bidan = $_FILES['regis_bidan'];
    $npwp = $_FILES['npwp'];
    // Lanjutkan dengan berkas-berkas lainnya
    $foto = $_FILES['foto_lokasi'];
    $pr = $_FILES['daftar_sarana_prasarana'];
    $ijazah = $_FILES['ijazah_terakhir'];
    $suratr = $_FILES['surat_rekomendasi'];
    // $sd = $_FILES['surat_dokter'];
    // $sip = $_FILES['sip_dokter'];
    // $dt = $_FILES['daftar_tenaga'];
    // $sr = $_FILES['surat_rekomendasi'];

    // Direktori tempat menyimpan berkas
    $uploadDir = "uploadsipb/";

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
    $regis_bidanPath = uploadFile($regis_bidan, $uploadDir);
    $npwpPath = uploadFile($npwp, $uploadDir);
    // Lanjutkan untuk semua berkas yang diperlukan
    $foto_lokasiPath = uploadFile($foto, $uploadDir);
    $daftar_sarana_prasaranaPath = uploadFile($pr, $uploadDir);
    $ijazah_terakhirPath = uploadFile($ijazah, $uploadDir);
    $surat_rekomendasiPath = uploadFile($suratr, $uploadDir);
    // $suratsdPath = uploadFile($sd, $uploadDir);
    // $suratsipPath = uploadFile($sip, $uploadDir);
    // $suratdtPath = uploadFile($dt, $uploadDir);
    // $suratsrPath = uploadFile($sr, $uploadDir);



    // Membuka koneksi ke database (sesuai dengan informasi di koneksi.php)
    // $conn = mysqli_connect($host, $username, $password, $database);

    // Memeriksa apakah koneksi berhasil
    // if (!$conn) {
    //     die("Koneksi ke database gagal: " . mysqli_connect_error());
    // }

    // Kueri SQL INSERT untuk menyimpan informasi ke database
    $sql = "INSERT INTO upload_sipb (id_user, id_pengajuan, waktu_upload, 
    ktp, regis_bidan, npwp, foto_lokasi, daftar_sarana_prasarana,
    ijazah_terakhir, surat_rekomendasi)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Menyiapkan pernyataan SQL dengan parameter
    $stmt = mysqli_prepare($conn, $sql);

    // Mengikat parameter ke pernyataan SQL
    mysqli_stmt_bind_param(
        $stmt,
        'ssssssssss',
        $iduser,
        $id,
        $date,
        $ktpPath,
        $regis_bidanPath,
        $npwpPath,
        $foto_lokasiPath,
        $daftar_sarana_prasaranaPath,
        $ijazah_terakhirPath,
        $surat_rekomendasiPath
    );

    // Menjalankan pernyataan SQL
    if (mysqli_stmt_execute($stmt)) {
        mysqli_query($conn, "UPDATE pengajuan_sipb set respon = 1 WHERE id_pengajuan = $id");
        // echo "Berkas berhasil diunggah dan informasi disimpan ke database.";
        // header("Location: ?q=izinproses&iduser=$iduser");
        // exit();
         // Menampilkan pesan sukses dengan popup
        echo '<script>';
        echo 'alert("Berkas berhasil diunggah. Menunggu Verifikasi Dari Dinas");';
        echo "window.location.href = '?q=successipb&iduser=$iduser';"; // Ganti "halaman_anda.php" dengan URL halaman yang Anda inginkan
        echo '</script>';
    } else {
        echo "Gagal menyimpan informasi ke database: " . mysqli_error($conn);
    }

    // Menutup pernyataan dan koneksi
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}