<?php
include './conf/koneksi.php';

function calculateEntropy($data)
{
    $totalData = count($data);

    // Hitung frekuensi kemunculan setiap nilai dalam data
    $valueCounts = array_count_values($data);

    // Hitung entropy
    $entropy = 0;
    foreach ($valueCounts as $valueCount) {
        $probability = $valueCount / $totalData;
        $entropy -= $probability * log($probability, 2);
    }

    return $entropy;
}

function calculateGain($data, $attributeValues, $targetAttribute)
{
    $totalData = count($data[$targetAttribute]);
    $originalEntropy = calculateEntropy($data[$targetAttribute]);

    $weightedEntropy = 0;
    foreach ($attributeValues as $attributeValue) {
        $subset = array_filter($data[$targetAttribute], function ($value) use ($attributeValue) {
            return $value === $attributeValue;
        });

        $subsetEntropy = calculateEntropy($subset);
        $subsetCount = count($subset);

        $weightedEntropy += ($subsetCount / $totalData) * $subsetEntropy;
    }

    $gain = $originalEntropy - $weightedEntropy;
    return $gain;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari formulir pengajuan dan melakukan sanitasi
    $id = $_POST['id'];
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

    // Contoh data dengan atribut dan target
    $data = [
        'Atribut1' => ['X', 'X', 'Y', 'Y', 'X', 'Y'],
        'Atribut2' => ['1', '2', '1', '1', '2', '2'],
        'Target' => ['Tidak', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Ya']
    ];

    // Daftar nilai-nilai atribut
    $attributeValues = array_unique($data['Atribut1']);

    // Atribut target
    $targetAttribute = 'Target';

    $gain = calculateGain($data, $attributeValues, $targetAttribute);

    echo "Gain: " . $gain;

    // Define array of accepted and rejected kelurahan for each kecamatan
    $kecamatan_rules = [
        'Kotabunan' => [
            'accepted' => ['Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur'],
            'rejected' => [
                'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
                'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
                'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
                'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
                'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
                'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'
            ]
        ],
        // ... (tambahkan aturan untuk kecamatan lain di sini)
    ];

    // Periksa apakah aturan kecamatan ada
    if (array_key_exists($kecamatan, $kecamatan_rules)) {
        $accepted_kelurahan = $kecamatan_rules[$kecamatan]['accepted'];
        $rejected_kelurahan = $kecamatan_rules[$kecamatan]['rejected'];

        if (in_array($kelurahan, $accepted_kelurahan)) {
            $keputusan = 'Diterima';
        } elseif (in_array($kelurahan, $rejected_kelurahan)) {
            $keputusan = 'Ditolak';
        }
    }

    $sql = "INSERT INTO pengajuan_sipb
    (id_user, nik, nama, jenis_kelamin, pekerjaan,
    tempat_lahir, tanggal_lahir, agama, pendidikan_terakhir,
    alamat, no_hp, email, keputusan)
    VALUES
    ('$id','$nama','$alamatpr', '$nama_klinik', '$nama_pemilik',
    '$kecamatan','$kelurahan', '$bentuk_usaha', '$jenis_klinik',
    '$jenis_permohonan', '$nomorhp', '$email' '$keputusan')";

    if (mysqli_query($conn, $sql)) {
        echo "Pengajuan berhasil disimpan. Silakan lihat apakah keputusannya diterima atau ditolak";
        echo "<script>window.location.href='?q=successsipb&id=$id'</script>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}