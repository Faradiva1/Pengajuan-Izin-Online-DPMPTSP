<?php
// Sertakan file koneksi.php atau konfigurasi database Anda di sini
include './koneksi.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pastikan variabel-variabel ini sesuai dengan kolom-kolom yang sesuai di tabel database Anda
    $id = $_POST['id'];
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
    function uploadFile($file, $uploadDir) {
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
    $suratbhPath = uploadFile($bh,$uploadDir);
    $suratilPath = uploadFile($il,$uploadDir);
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
    $sql = "INSERT INTO upload (id, ktp, akta_pendirian, surat_lokasi, bukti_hak, izin_lingkungan,
    profil_klinik, nib, surat_dokter, sip_dokter, daftar_tenaga, surat_rekomendasi)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Menyiapkan pernyataan SQL dengan parameter
    $stmt = mysqli_prepare($conn, $sql);

    // Mengikat parameter ke pernyataan SQL
    mysqli_stmt_bind_param($stmt, 'ssssssssssss', $id, $ktpPath, $aktaPendirianPath, $suratLokasiPath,
    $suratbhPath, $suratilPath, $suratpkPath, $suratnibPath, $suratsdPath,
    $suratsipPath, $suratdtPath, $suratsrPath);
    
    // Menjalankan pernyataan SQL
    if (mysqli_stmt_execute($stmt)) {
        echo "Berkas berhasil diunggah dan informasi disimpan ke database.";
    } else {
        echo "Gagal menyimpan informasi ke database: " . mysqli_error($conn);
    }

    // Menutup pernyataan dan koneksi
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

<!-- Tampilkan formulir upload berkas -->
<div class="container">
    <div class="card">
        <div class="card-header">
            <p class="card-text">Upload Berkas Pengajuan</p>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <table>
                    <!-- Tambahkan baris untuk setiap berkas yang diunggah -->
                    <tr>
                        <td><label for="ktp">KTP (PDF)</label></td>
                        <td><input type="file" name="ktp" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="akta_pendirian">Akta Pendirian (PDF)</label></td>
                        <td><input type="file" name="akta_pendirian" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="surat_lokasi">Surat Lokasi (PDF)</label></td>
                        <td><input type="file" name="surat_lokasi" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="bukti_hak">Bukti Hak (PDF)</label></td>
                        <td><input type="file" name="bukti_hak" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="izin_lingkungan">Izin Lingkungan (PDF)</label></td>
                        <td><input type="file" name="izin_lingkungan" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="profil_klinik">Profil Klinik (PDF)</label></td>
                        <td><input type="file" name="profil_klinik" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="nib">NIB (PDF)</label></td>
                        <td><input type="file" name="nib" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="surat_dokter">Surat Dokter (PDF)</label></td>
                        <td><input type="file" name="surat_dokter" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="sip_dokter">SIP Dokter (PDF)</label></td>
                        <td><input type="file" name="sip_dokter" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="daftar_tenaga">Daftar Tenaga (PDF)</label></td>
                        <td><input type="file" name="daftar_tenaga" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="surat_rekomendasi">Surat Rekomendasi (PDF)</label></td>
                        <td><input type="file" name="surat_rekomendasi" accept=".pdf" required></td>
                    </tr>
                    <!-- Lanjutkan untuk semua berkas yang diperlukan -->
                </table>
                <input type="submit" value="Upload">
            </form>
        </div>
    </div>
</div>
