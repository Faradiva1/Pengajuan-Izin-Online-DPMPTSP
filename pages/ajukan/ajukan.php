<?php
include './conf/koneksi.php';

$id = $_GET['iduser'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi data yang diterima dari formulir
    $nama = isset($_POST['nama']) ? mysqli_real_escape_string($conn, $_POST['nama']) : '';
    $alamatpr = isset($_POST['alamatpr']) ? mysqli_real_escape_string($conn, $_POST['alamatpr']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $nama_klinik = isset($_POST['nama_klinik']) ? mysqli_real_escape_string($conn, $_POST['nama_klinik']) : '';
    $nama_pemilik = isset($_POST['nama_pemilik']) ? mysqli_real_escape_string($conn, $_POST['nama_pemilik']) : '';
    $kecamatan = isset($_POST['kecamatan']) ? mysqli_real_escape_string($conn, $_POST['kecamatan']) : '';
    $kelurahan = isset($_POST['kelurahan']) ? mysqli_real_escape_string($conn, $_POST['kelurahan']) : '';
    $bentuk_usaha = isset($_POST['bentuk_usaha']) ? mysqli_real_escape_string($conn, $_POST['bentuk_usaha']) : '';
    $jenis_klinik = isset($_POST['jenis_klinik']) ? mysqli_real_escape_string($conn, $_POST['jenis_klinik']) : '';
    $namapj = isset($_POST['namapj']) ? mysqli_real_escape_string($conn, $_POST['namapj']) : '';
    $nomorktppj = isset($_POST['nomorktppj']) ? mysqli_real_escape_string($conn, $_POST['nomorktppj']) : '';
    $alamatpj = isset($_POST['alamatpj']) ? mysqli_real_escape_string($conn, $_POST['alamatpj']) : '';
    $jenis_permohonan = isset($_POST['jenis_permohonan']) ? mysqli_real_escape_string($conn, $_POST['jenis_permohonan']) : '';

    // Query SQL untuk menyimpan data ke database (gunakan prepared statements jika mungkin)
    $sql = "INSERT INTO pengajuan (nama, alamatpr, email, nama_klinik, nama_pemilik, kecamatan, kelurahan, bentuk_usaha, jenis_klinik, nama_penanggung_jawab, nomorktppj, alamatpj, jenis_permohonan) VALUES
    ('$nama', '$alamatpr', '$email', '$nama_klinik', '$nama_pemilik', '$kecamatan', '$kelurahan', '$bentuk_usaha', '$jenis_klinik', '$namapj', '$nomorktppj', '$alamatpj', '$jenis_permohonan')";

    if (mysqli_query($conn, $sql)) {
        // Jika sukses, arahkan pengguna ke halaman yang sesuai
        header("Location: ?q=success");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan kesalahan
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
}


// Selanjutnya, tampilkan formulir pengajuan di sini
?>

<div class="container">
    <div class="row">

        <!-- Kolom gambar (sebelah kanan) -->
        <div class="col-md-6">
            <div class="card border-0">
                <!-- Ganti dengan tag gambar atau konten gambar yang sesuai -->
                <img src="./assets/img/izin-u.png" alt="Gambar Persyaratan" class="img-fluid">
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <p class="card-text">Formulir Pengajuan</p>
                </div>

                <div class="card-body">
                    <br>
                    <div class="card-header">
                        <p class="card-text">1. Identitas Perusahaan</p>
                    </div>
                    <br>
                    <form action="?q=createprocess&iduser=<?= $_GET["iduser"]; ?>" method="POST">
                        <input type="hidden" id="id" name="id" value="<?= $id; ?>">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Perusahaan<span class="required">*</span></label>
                            <input type=" text" name="nama" class="form-control" id="nama" placeholder="Nama Perusahaan" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamatpr" class="form-label">Alamat Perusahaan<span class="required">*</span></label>
                            <input type="text" name="alamatpr" class="form-control" id="alamatpr" placeholder="Alamat Perusahaan" required>
                        </div>

                        <!-- baru -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email<span class="required">*</span></label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                        </div>

                        <div class="mb-3">
                            <label for="bentuk_usaha" class="form-label">Bentuk Usaha<span class="required">*</span> :</label>
                            <select name="bentuk_usaha" id="bentuk_usaha" class="form-select">
                                <option value="PO">Perusahaan Perorangan (PO)</option>
                                <option value="BUMN">BUMN</option>
                                <option value="CV">Persekutuan Komanditer (CV)</option>
                                <option value="PT">Perseroan Terbatas (PT)</option>
                                <option value="FA">Persekutuan Firma (FA)</option>
                                <option value="Yayasan">Yayasan</option>
                            </select>


                            <!-- penanggung jawab -->
                            <!-- baru -->
                            <br>
                            <div class="card-header">
                                <p class="card-text">2. Penanggung Jawab</p>
                            </div>
                            <br>
                            <div class="mb-3">
                                <label for="namapj" class="form-label">Nama Penanggung Jawab<span class="required">*</span></label>
                                <input type="text" name="namapj" class="form-control" id="namapj" placeholder="Nama Penanggung Jawab" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomorktppj" class="form-label">Nomor KTP Penanggung Jawab<span class="required">*</span></label>
                                <input type="number" name="nomorktppj" class="form-control" id="nomorktppj" placeholder="Nomor KTP Penanggung Jawab" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamatpj" class="form-label">Alamat Penanggung Jawab<span class="required">*</span></label>
                                <input type="text" name="alamatpj" class="form-control" id="alamatpj" placeholder="Alamat KTP Penanggung Jawab" required>
                            </div>


                            <!-- informasi permohonan -->
                            <div class="card-header">
                                <p class="card-text">3. Informasi Permohonan</p>
                            </div>
                            <br>
                            <label for="jenis_klinik" class="form-label">Jenis Klinik<span class="required">*</span> :</label>
                            <select name="jenis_klinik" id="jenis_klinik" class="form-select">
                                <option value="Pratama">Pratama</option>
                                <option value="Utama">Utama</option>
                            </select>
                            <br>
                            <label for="jenis_permohonan" class="form-label">Jenis Permohonan<span class="required">*</span> :</label>
                            <select name="jenis_permohonan" id="jenis_permohonan" class="form-select">
                                <option value="Izin Mendirikan Klinik">Izin Mendirikan Klinik</option>
                                <option value="Izin Operasional Klinik">Izin Operasional Klinik</option>
                            </select>
                            <br>
                            <div class="mb-3">
                                <label for="nama_klinik" class="form-label">Nama Klinik<span class="required">*</span></label>
                                <input type="text" name="nama_klinik" class="form-control" id="nama_klinik" placeholder="Nama Klinik Anda" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_pemilik" class="form-label">Nama Pemilik<span class="required">*</span></label>
                                <input type="text" name="nama_pemilik" class="form-control" id="nama_pemilik" placeholder="Nama Pemilik Klinik" required>
                            </div>
                            <label for="kecamatan" class="form-label">Kecamatan<span class="required">*</span>:</label>
                            <select name="kecamatan" id="kecamatan" class="form-select">
                                <option value="Kotabunan">Kotabunan</option>
                                <option value="Modayag">Modayag </option>
                                <option value="Modayag Barat">Modayag Barat</option>
                                <option value="Mooat">Mooat</option>
                                <option value="Motongkad">Motongkad</option>
                                <option value="Nuangan">Nuangan</option>
                                <option value="Tutuyan">Tutuyan</option>
                            </select>
                            <br>
                            <label for="kelurahan" class="form-label">Kelurahan<span class="required">*</span> :</label>
                            <select name="kelurahan" id="kelurahan" class="form-select">
                                <!-- Kotabunan -->
                                <option value="Buyat Barat">Buyat Barat</option>
                                <option value="Buyat Satu">Buyat Satu</option>
                                <option value="Buyat Dua">Buyat Dua</option>
                                <option value="Buyat Induk">Buyat Induk</option>
                                <option value="Buyat Selatan">Buyat Selatan</option>
                                <option value="Buyat Tengah">Buyat Tengah</option>
                                <option value="Bukaka">Bukaka</option>
                                <option value="Bulawan">Bulawan</option>
                                <option value="Bulawan2">Bulawan Dua</option>
                                <option value="Bulawan1">Bulawan Satu</option>
                                <option value="Kotabunan Barat">Kotabunan Barat</option>
                                <option value="Kotabunan Selatan">Kotabunan Selatan</option>
                                <option value="Kotabunan">Kotabunan</option>
                                <option value="Paret">Paret</option>
                                <option value="Paret Timur">Kotabunan</option>
                                <!-- Modayag -->
                                <option value="Badaro">Badaro</option>
                                <option value="Buyandi">Buyandi</option>
                                <option value="Candi Rejo">Candi Rejo</option>
                                <option value="Lanut">Lanut</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Liberia Timur">Liberia Timur</option>
                                <option value="Modayag">Modayag</option>
                                <option value="Modayag2">Modayag Dua</option>
                                <option value="Modayag3">Modayag Tiga</option>
                                <option value="Purwerejo">Purwerejo</option>
                                <option value="Purwerejo Timur">Purwerejo Timur</option>
                                <option value="Sumber Rejo">Sumber Rejo</option>
                                <option value="Tobongon">Tobongon</option>
                                <!-- Modayag Barat -->
                                <option value="Bongkudai">Bongkudai</option>
                                <option value="Bongkudai Barat">Bongkudai Barat</option>
                                <option value="Bangunan Wuwuk">Bangunan Wuwuk</option>
                                <option value="Bangunan Wuwuk Timur">Bangunan Wuwuk Timur</option>
                                <option value="Moyongkota">Moyongkota</option>
                                <option value="Moonow">Moonow</option>
                                <option value="Moyongkota Baru">Moyongkota Baru</option>
                                <option value="Inaton">Inaton</option>
                                <option value="Pinonobatuan">Pinonobatuan</option>
                                <option value="Tangaton">Tangaton</option>
                                <!-- Mooat -->
                                <option value="Bongkudai Baru">Bongkudai Baru</option>
                                <option value="Bongkudai Selatan">Bongkudai Selatan</option>
                                <option value="Bongkudai Timur">Bongkudai Timur</option>
                                <option value="Bongkudai Utara">Bongkudai Utara</option>
                                <option value="Bongkudai Selatan">Bongkudai Selatan</option>
                                <option value="Guaan">Guaan</option>
                                <option value="Kokapoi">Kokapoi</option>
                                <option value="Kokapoi Timur">Kokapoi Timur</option>
                                <option value="Mokitompia">Mokitompia</option>
                                <option value="Mooat">Mooat</option>
                                <option value="Mototompian">Mototompian</option>
                                <!-- Motongkad -->
                                <option value="Atoga">Atoga</option>
                                <option value="Atoga Timur">Atoga Timur</option>
                                <option value="Jiko">Jiko</option>
                                <option value="Jiko Utara">Jiko Utara</option>
                                <option value="Molobog">Molobog</option>
                                <option value="Molobog Barat">Molobog Barat</option>
                                <option value="Molobog Timur">Molobog Timur</option>
                                <option value="Motongkad">Motongkad</option>
                                <option value="Motongkad Selatan">Motongkad Selatan</option>
                                <option value="Motongkad Tengah">Motongkad Tengah</option>
                                <option value="Motongkad Utara">Motongkad Utara</option>
                                <!-- Nuangan -->
                                <option value="Bai">Bai</option>
                                <option value="Idumun">Idumun</option>
                                <option value="Iyok">Iyok</option>
                                <option value="Jiko Blanga">Jiko Blanga</option>
                                <option value="Loyow">Loyow</option>
                                <option value="Matabulu">Matabulu</option>
                                <option value="Matabulu Timur">Matabulu Timur</option>
                                <option value="Nuangan">Nuangan</option>
                                <option value="Nuangan1">Nuangan Satu</option>
                                <option value="Nuangan Barat">Nuangan Barat</option>
                                <option value="Nuangan Selatan">Nuangan Selatan</option>
                                <!-- Tutuyan -->
                                <option value="Dodap">Dodap</option>
                                <option value="Dodap Pantai">Dodap Pantai</option>
                                <option value="Dodap Mikasa">Dodap Mikasa</option>
                                <option value="Tutuyan">Tutuyan</option>
                                <option value="Tutuyan2">Tutuyan Dua</option>
                                <option value="Tutuyan3">Tutuyan Tiga</option>
                                <option value="Togid">Togid</option>
                                <option value="Tombolikat Selatan">Tombolikat Selatan</option>
                                <option value="Tombolikat Induk">Tombolikat Induk</option>
                                <option value="Kayumoyondi">Kayumoyondi</option>
                            </select>
                            <br>
                            <input type="submit" name="submit" value="Ajukan Permohonan" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>