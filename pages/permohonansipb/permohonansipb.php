<?php
// Menghubungkan ke database
include './conf/koneksi.php';
$id = $_GET['iduser'];
// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi data yang diterima dari formulir
    $nama_tempat_praktik = isset($_POST['nama_tempat_praktik']) ? mysqli_real_escape_string($conn, $_POST['nama_tempat_praktik']) : '';
    $alamat_tempat_praktik = isset($_POST['alamat_tempat_praktik']) ? mysqli_real_escape_string($conn, $_POST['alamat_tempat_praktik']) : '';
    $kecamatan = isset($_POST['kecamatan']) ? mysqli_real_escape_string($conn, $_POST['kecamatan']) : '';
    $kelurahan = isset($_POST['kelurahan']) ? mysqli_real_escape_string($conn, $_POST['kelurahan']) : '';
    $no_telepon = isset($_POST['no_telepon']) ? mysqli_real_escape_string($conn, $_POST['no_telepon']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $nik = isset($_POST['nik']) ? mysqli_real_escape_string($conn, $_POST['nik']) : '';
    $nama = isset($_POST['nama']) ? mysqli_real_escape_string($conn, $_POST['nama']) : '';
    $tempat_lahir = isset($_POST['tempat_lahir']) ? mysqli_real_escape_string($conn, $_POST['tempat_lahir']) : '';
    $tanggal_lahir = isset($_POST['tanggal_lahir']) ? mysqli_real_escape_string($conn, $_POST['tanggal_lahir']) : '';
    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? mysqli_real_escape_string($conn, $_POST['jenis_kelamin']) : '';
    $alamat_lengkap = isset($_POST['alamat_lengkap']) ? mysqli_real_escape_string($conn, $_POST['alamat_lengkap']) : '';
    $no_hp_pemohon = isset($_POST['no_hp_pemohon']) ? mysqli_real_escape_string($conn, $_POST['no_hp_pemohon']) : '';
    $email_pemohon = isset($_POST['email_pemohon']) ? mysqli_real_escape_string($conn, $_POST['email_pemohon']) : '';
    $no_str = isset($_POST['no_str']) ? mysqli_real_escape_string($conn, $_POST['no_str']) : '';
    $masa_berlaku_str = isset($_POST['masa_berlaku_str']) ? mysqli_real_escape_string($conn, $_POST['masa_berlaku_str']) : '';
    $no_rekomendasi = isset($_POST['no_rekomendasi']) ? mysqli_real_escape_string($conn, $_POST['no_rekomendasi']) : '';
    $tanggal_rekomendasi = isset($_POST['tanggal_rekomendasi']) ? mysqli_real_escape_string($conn, $_POST['tanggal_rekomendasi']) : '';
    $permohonan_sip_ke = isset($_POST['permohonan_sip_ke']) ? mysqli_real_escape_string($conn, $_POST['permohonan_sip_ke']) : '';
    $jenis_sip = isset($_POST['jenis_sip']) ? mysqli_real_escape_string($conn, $_POST['jenis_sip']) : '';
    $ketersediaan_ruang_tunggu = isset($_POST['ketersediaan_ruang_tunggu']) ? mysqli_real_escape_string($conn, $_POST['ketersediaan_ruang_tunggu']) : '';
    $ketersediaan_ruang_pemeriksaan = isset($_POST['ketersediaan_ruang_pemeriksaan']) ? mysqli_real_escape_string($conn, $_POST['ketersediaan_ruang_pemeriksaan']) : '';
    $ketersediaan_ruang_persalinan = isset($_POST['ketersediaan_ruang_persalinan']) ? mysqli_real_escape_string($conn, $_POST['ketersediaan_ruang_persalinan']) : '';
    $ketersediaan_ruang_rawat_inap = isset($_POST['ketersediaan_ruang_rawat_inap']) ? mysqli_real_escape_string($conn, $_POST['ketersediaan_ruang_rawat_inap']) : '';
    $ketersediaan_wc = isset($_POST['ketersediaan_wc']) ? mysqli_real_escape_string($conn, $_POST['ketersediaan_wc']) : '';
    $ketersediaan_rppi = isset($_POST['ketersediaan_rppi']) ? mysqli_real_escape_string($conn, $_POST['ketersediaan_rppi']) : '';


    // Query SQL untuk menyimpan data ke database menggunakan prepared statements
    $stmt = $conn->prepare("INSERT INTO data_praktik (nama_tempat_praktik, alamat_tempat_praktik, kecamatan, kelurahan, no_telepon, email, nik, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat_lengkap, no_hp_pemohon, email_pemohon, no_str, masa_berlaku_str, no_rekomendasi, tanggal_rekomendasi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssssssss", $nama_tempat_praktik, $alamat_tempat_praktik, $kecamatan, $kelurahan, $no_telepon, $email, $nik, $nama, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $alamat_lengkap, $no_hp_pemohon, $email_pemohon, $no_str, $masa_berlaku_str, $no_rekomendasi, $tanggal_rekomendasi);

    if (mysqli_query($conn, $sql)) {
        // Jika sukses, arahkan pengguna ke halaman yang sesuai
        header("Location: ?q=success");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan kesalahan
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

?>


<div class="container">
    <form action="?q=createprocesssipb&iduser=<?= $_GET["iduser"]; ?>" method="POST">
        <input type="hidden" id="id" name="id" value="<?= $id; ?>">

        <div class="card">
            <div class="card-header">
                <p class="card-text"> IDENTITAS FASILITAS KESEHATAN (TEMPAT PRAKTEK)</p>
            </div>
            <div class="card-body">
                <input type="hidden" id="id" name="id" value="<?= $id; ?>">

                <div class="mb-3">
                    <label for="nama_tempat_praktik" class="form-label">Nama Tempat Praktik:</label>
                    <input type="text" id="nama_tempat_praktik" name="nama_tempat_praktik" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="alamat_tempat_praktik" class="form-label">Alamat Tempat Praktik:</label>
                    <input type="text" id="alamat_tempat_praktik" name="alamat_tempat_praktik" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="no_telepon" class="form-label">No Telepon:</label>
                    <input type="number" id="no_telepon" name="no_telepon" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <p class="card-text"> IDENTITAS PEMOHON</p>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK:</label>
                    <input type="number" id="nik" name="nik" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Pemohon:</label>
                    <input type="text" id="nama" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan :</label>
                    <select name="kecamatan" id="kecamatan" class="form-select">
                        <option value="Kotabunan">Kotabunan</option>
                        <option value="Modayag">Modayag </option>
                        <option value="Modayag Barat">Modayag Barat</option>
                        <option value="Mooat">Mooat</option>
                        <option value="Motongkad">Motongkad</option>
                        <option value="Nuangan">Nuangan</option>
                        <option value="Tutuyan">Tutuyan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="kelurahan" class="form-label">Kelurahan :</label>
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
                </div>

                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir:</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin:</label>
                    <div class="form-check">
                        <input type="radio" id="laki_laki" name="jenis_kelamin" value="Laki-laki" class="form-check-input" required>
                        <label for="laki_laki" class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" class="form-check-input" required>
                        <label for="perempuan" class="form-check-label">Perempuan</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="alamat_lengkap" class="form-label">Alamat Lengkap:</label>
                    <textarea id="alamat_lengkap" name="alamat_lengkap" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="no_hp_pemohon" class="form-label">No HP Pemohon:</label>
                    <input type="number" id="no_hp_pemohon" name="no_hp_pemohon" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email_pemohon" class="form-label">Email Pemohon:</label>
                    <input type="email" id="email_pemohon" name="email_pemohon" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir:</label>
                    <select id="pendidikan_terakhir" name="pendidikan_terakhir" class="form-select" required>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA/sederajat">SMA/Sederajat</option>
                        <option value="D1">D1</option>
                        <option value="D2">D2</option>
                        <option value="D3">D3</option>
                        <option value="D4/S1">D4/S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <p class="card-text"> DATA DETAIL PERMOHONAN</p>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="no_str" class="form-label">No STR:</label>
                    <input type="number" id="no_str" name="no_str" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="masa_berlaku_str" class="form-label">Masa Berlaku STR:</label>
                    <input type="date" id="masa_berlaku_str" name="masa_berlaku_str" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="no_rekomendasi" class="form-label">No Rekomendasi:</label>
                    <input type="text" id="no_rekomendasi" name="no_rekomendasi" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_rekomendasi" class="form-label">Tanggal Rekomendasi:</label>
                    <input type="date" id="tanggal_rekomendasi" name="tanggal_rekomendasi" class="form-control" required>
                </div>




            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <p class="card-text">DETAIL PRAKTIK MANDIRI</p>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="permohonan_sip_ke" class="form-label">Permohonan SIP Ke:</label>
                    <input type="number" id="permohonan_sip_ke" name="permohonan_sip_ke" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="jenis_sip" class="form-label">Jenis SIP:</label>
                    <input type="text" id="jenis_sip" name="jenis_sip" class="form-control" required>
                </div>

                            <div class="mb-3">
                <label for="ketersediaan_ruang_tunggu" class="form-label">Ketersediaan Ruang Tunggu:</label>
                <select id="ketersediaan_ruang_tunggu" name="ketersediaan_ruang_tunggu" class="form-select" required>
                
                    <option value="ada">Ada</option>
                    <option value="tidak ada">Tidak Ada</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="ketersediaan_ruang_pemeriksaan" class="form-label">Ketersediaan Ruang Pemeriksaan:</label>
                <select id="ketersediaan_ruang_pemeriksaan" name="ketersediaan_ruang_pemeriksaan" class="form-select" required>
                
                    <option value="ada">Ada</option>
                    <option value="tidak ada">Tidak Ada</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="ketersediaan_ruang_persalinan" class="form-label">Ketersediaan Ruang Persalinan:</label>
                <select id="ketersediaan_ruang_persalinan" name="ketersediaan_ruang_persalinan" class="form-select" required>
                    <option value="ada">Ada</option>
                    <option value="tidak ada">Tidak Ada</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="ketersediaan_ruang_rawat_inap" class="form-label">Ketersediaan Ruang Rawat Inap:</label>
                <select id="ketersediaan_ruang_rawat_inap" name="ketersediaan_ruang_rawat_inap" class="form-select" required>
                    <option value="ada">Ada</option>
                    <option value="tidak ada">Tidak Ada</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="ketersediaan_wc" class="form-label">Ketersediaan WC:</label>
                <select id="ketersediaan_wc" name="ketersediaan_wc" class="form-select" required>
                    
                    <option value="ada">Ada</option>
                    <option value="tidak ada">Tidak Ada</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="ketersediaan_rppi" class="form-label">Ketersediaan RPPI:</label>
                <select id="ketersediaan_rppi" name="ketersediaan_rppi" class="form-select" required>
                    <option value="ada">Ada</option>
                    <option value="tidak ada">Tidak Ada</option>
                </select>
            </div>



    
        <!-- <a class="btn btn-primary-sipb" href="?q=SIPB&iduser=<?= $_GET["iduser"]; ?>"><i class="fa-solid fa-hand-point-left"></i> Kembali</a> -->
        <input type="submit" value="Kirim Pengajuan" class="btn btn-primary-sipb">
        <br>
        <br>
    </form>
</div>
</div>
3