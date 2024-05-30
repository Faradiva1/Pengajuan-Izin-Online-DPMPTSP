<?php
include './conf/koneksi.php';



 // Contoh data dengan atribut dan target
    $data = [
    'Atribut1' => ['X', 'X', 'Y', 'Y', 'X', 'Y'],
    'Atribut2' => ['1', '2', '1', '1', '2', '2'],
    'Target' => ['Tidak', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Ya']
];

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
    $nama = isset($_POST['nama']) ? mysqli_real_escape_string($conn, $_POST['nama']) : '';
    $alamatpr = isset($_POST['alamatpr']) ? mysqli_real_escape_string($conn, $_POST['alamatpr']) : '';
    $nama_klinik = isset($_POST['nama_klinik']) ? mysqli_real_escape_string($conn, $_POST['nama_klinik']) : '';
    $nama_pemilik = isset($_POST['nama_pemilik']) ? mysqli_real_escape_string($conn, $_POST['nama_pemilik']) : '';
    $kecamatan = isset($_POST['kecamatan']) ? mysqli_real_escape_string($conn, $_POST['kecamatan']) : '';
    $kelurahan = isset($_POST['kelurahan']) ? mysqli_real_escape_string($conn, $_POST['kelurahan']) : '';
    $bentuk_usaha = isset($_POST['bentuk_usaha']) ? mysqli_real_escape_string($conn, $_POST['bentuk_usaha']) : '';
    $jenis_permohonan = isset($_POST['jenis_permohonan']) ? mysqli_real_escape_string($conn, $_POST['jenis_permohonan']) : '';
    $jenis_klinik = isset($_POST['jenis_klinik']) ? mysqli_real_escape_string($conn, $_POST['jenis_klinik']) : '';

   

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

    $sql = "INSERT INTO pengajuan (id_user, nama, alamatpr, nama_klinik, nama_pemilik, kecamatan, kelurahan, bentuk_usaha, jenis_permohonan, jenis_klinik, keputusan) VALUES ('$id','$nama','$alamatpr', '$nama_klinik', '$nama_pemilik','$kecamatan', '$kelurahan', '$bentuk_usaha', '$jenis_permohonan', '$jenis_klinik', '$keputusan')";

    if (mysqli_query($conn, $sql)) {
        echo "Pengajuan berhasil disimpan. Silakan lihat apakah keputusannya diterima atau ditolak";
        header("Location: ?q=success&id=$id");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}