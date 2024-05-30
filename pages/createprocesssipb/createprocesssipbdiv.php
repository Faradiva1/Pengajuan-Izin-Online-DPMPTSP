<?php
include './conf/koneksi.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari formulir pengajuan dan melakukan sanitasi
    $id = $_POST['id'];

    // Validasi data yang diterima dari formulir (gunakan prepared statement jika memungkinkan)
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
    $pendidikan_terakhir = isset($_POST['pendidikan_terakhir']) ? mysqli_real_escape_string($conn, $_POST['pendidikan_terakhir']) : '';
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


    // $iduser = $_GET['iduser'];
    // Data yang diberikan
    $data = [
        'nama_tempat_praktik' => ['Klinik ABC', 'Rumah Sakit XYZ', 'Praktek Mandiri'],
        'jenis_kelamin' => ['Laki-laki', 'Perempuan', 'Perempuan'],
        'pendidikan_terakhir' => ['S2', 'S3', 'S1'],
        'jenis_sip' => ['SIP Dokter', 'SIP Perawat', 'SIP Bidan'],
        'ketersediaan_ruang_tunggu' => ['Ya', 'Tidak', 'Ya'],
        'ketersediaan_ruang_pemeriksaan' => ['Ya', 'Ya', 'Ya'],
        'ketersediaan_ruang_persalinan' => ['Tidak', 'Ya', 'Tidak'],
        'ketersediaan_ruang_rawat_inap' => ['Tidak', 'Ya', 'Tidak'],
        'ketersediaan_wc' => ['Ya', 'Ya', 'Ya'],
        'ketersediaan_rppi' => ['Ya', 'Tidak', 'Ya'],
        'keputusan' => ['Diterima', 'Ditolak', 'Diterima'], // Atribut keputusan
    ];

    // Fungsi untuk menghitung entropi
    function entropy($data)
    {
        $total = count($data);
        $entropy = 0;

        foreach (array_count_values($data) as $value) {
            $probability = $value / $total;
            $entropy -= $probability * log($probability, 2);
        }

        return $entropy;
    }

    // Fungsi untuk menghitung gain informasi
    function informationGain($baseEntropy, $splitData, $data)
    {
        $newEntropy = 0;

        foreach ($splitData as $value => $subset) {
            $subsetEntropy = entropy(array_intersect_key($data['keputusan'], array_flip($subset)));
            $probability = count($subset) / count($data['nama_tempat_praktik']);
            $newEntropy += $probability * $subsetEntropy;
        }

        return $baseEntropy - $newEntropy;
    }

    // Fungsi untuk membagi data berdasarkan atribut tertentu
    function splitData($data, $attribute)
    {
        $splitData = [];

        foreach (array_unique($data[$attribute]) as $value) {
            $splitData[$value] = [];
        }

        foreach (range(0, count($data['nama_tempat_praktik']) - 1) as $i) {
            $value = $data[$attribute][$i];
            $splitData[$value][] = $i;
        }

        return $splitData;
    }

    // Fungsi untuk memilih atribut terbaik
    function chooseBestAttribute($data, $attributes)
    {
        $baseEntropy = entropy($data['keputusan']);
        $bestInfoGain = 0;
        $bestAttribute = '';

        foreach ($attributes as $attribute) {
            $splitData = splitData($data, $attribute);
            $infoGain = informationGain($baseEntropy, $splitData, $data);

            if ($infoGain > $bestInfoGain) {
                $bestInfoGain = $infoGain;
                $bestAttribute = $attribute;
            }
        }

        return $bestAttribute;
    }

    // Fungsi untuk membuat pohon keputusan
    function buildDecisionTree($data, $attributes)
    {
        if (count(array_unique($data['keputusan'])) === 1) {
            return reset($data['keputusan']);
        }

        if (empty($attributes)) {
            return array_search(max(array_count_values($data['keputusan'])), array_count_values($data['keputusan']));
        }

        $bestAttribute = chooseBestAttribute($data, $attributes);
        $tree = [$bestAttribute => []];
        $splitData = splitData($data, $bestAttribute);

        foreach ($splitData as $value => $subset) {
            $newAttributes = array_diff($attributes, [$bestAttribute]);
            $subData = [];

            foreach ($subset as $index) {
                foreach ($data as $key => $attributeData) {
                    $subData[$key][] = $data[$key][$index];
                }
            }

            $tree[$bestAttribute][$value] = buildDecisionTree($subData, $newAttributes);
        }

        return $tree;
    }

    // Atribut yang akan digunakan untuk membuat pohon keputusan
    $attributes = ['jenis_kelamin', 'pendidikan_terakhir', 'jenis_sip', 'ketersediaan_ruang_tunggu', 'ketersediaan_ruang_pemeriksaan', 'ketersediaan_ruang_persalinan', 'ketersediaan_ruang_rawat_inap', 'ketersediaan_wc', 'ketersediaan_rppi'];

    // Membangun pohon keputusan
    $decisionTree = buildDecisionTree($data, $attributes);

    // Fungsi untuk melakukan prediksi
    function predict($dataPoint, $tree)
    {
        while (is_array($tree)) {
            $attribute = key($tree);
            $value = $dataPoint[$attribute];
            $tree = $tree[$attribute][$value];
        }

        return $tree;
    }

    // Data yang akan diprediksi (Diterima)
    $newDataPointDiterima = [
        'jenis_kelamin' => 'Laki-laki',
        'pendidikan_terakhir' => 'S2',
        'jenis_sip' => 'SIP Dokter',
        'ketersediaan_ruang_tunggu' => 'Ya',
        'ketersediaan_ruang_pemeriksaan' => 'Ya',
        'ketersediaan_ruang_persalinan' => 'Ya',
        'ketersediaan_ruang_rawat_inap' => 'Ya',
        'ketersediaan_wc' => 'Ya',
        'ketersediaan_rppi' => 'Ya',
    ];

    // Data yang akan diprediksi (Ditolak)
    $newDataPointDitolak = [
        'jenis_kelamin' => 'Perempuan',
        'pendidikan_terakhir' => 'S3',
        'jenis_sip' => 'SIP Bidan',
        'ketersediaan_ruang_tunggu' => 'Tidak',
        'ketersediaan_ruang_pemeriksaan' => 'Ya',
        'ketersediaan_ruang_persalinan' => 'Ya',
        'ketersediaan_ruang_rawat_inap' => 'Ya',
        'ketersediaan_wc' => 'Ya',
        'ketersediaan_rppi' => 'Tidak',
    ];

    // Melakukan prediksi
    $predictionDiterima = predict($newDataPointDiterima, $decisionTree);
    $predictionDitolak = predict($newDataPointDitolak, $decisionTree);

    // Output hasil prediksi dalam format yang diingink
    echo "Hasil prediksi (Diterima): $predictionDiterima\n";
    echo "Hasil prediksi (Ditolak): $predictionDitolak\n";


    // Define array of accepted and rejected kelurahan for each kecamatan
    // $kecamatan_rules = [
    //     'Kotabunan' => [
    //         'accepted' => ['Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur'],
    //         'rejected' => [
    //             'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
    //             'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
    //             'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
    //             'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
    //             'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
    //             'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'
    //         ]
    //     ],
    //     'Modayag' => [
    //         'accepted' => ['Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon'],
    //         'rejected' => [
    //             'Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
    //             'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
    //             'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
    //             'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
    //             'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
    //             'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'
    //         ]
    //     ],
    //     'Modayag Barat' => [
    //         'accepted' => ['Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton'],
    //         'rejected' => [
    //             'Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
    //             'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
    //             'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
    //             'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
    //             'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
    //             'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'
    //         ]
    //     ],
    //     'Mooat' => [
    //         'accepted' => ['Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian'],
    //         'rejected' => [
    //             'Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
    //             'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
    //             'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
    //             'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
    //             'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
    //             'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'
    //         ]
    //     ],
    //     'Motongkad' => [
    //         'accepted' => ['Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara'],
    //         'rejected' => [
    //             'Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
    //             'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
    //             'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
    //             'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
    //             'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
    //             'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'
    //         ]
    //     ],
    //     'Nuangan' => [
    //         'accepted' => ['Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan'],
    //         'rejected' => [
    //             'Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
    //             'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
    //             'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
    //             'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
    //             'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
    //             'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'
    //         ]
    //     ],
    //     'Tutuyan' => [
    //         'accepted' => ['Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'],
    //         'rejected' => [
    //             'Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
    //             'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
    //             'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
    //             'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
    //             'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
    //             'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan'
    //         ]
    //     ],
    //     // ... (tambahkan aturan untuk kecamatan lain di sini)
    // ];

    // // Periksa apakah aturan kecamatan ada
    // if (array_key_exists($kecamatan, $kecamatan_rules)) {
    //     $accepted_kelurahan = $kecamatan_rules[$kecamatan]['accepted'];
    //     $rejected_kelurahan = $kecamatan_rules[$kecamatan]['rejected'];

    //     if (in_array($kelurahan, $accepted_kelurahan)) {
    //         $keputusan = 'Diterima';
    //     } elseif (in_array($kelurahan, $rejected_kelurahan)) {
    //         $keputusan = 'Ditolak';
    //     }
    // }

    // Create a prepared statement
    $sql = "INSERT INTO pengajuan_sipb 
    (id_user, nama_tempat_praktik, alamat_tempat_praktik, kecamatan, kelurahan, no_telepon, 
    email, nik, nama, tempat_lahir, 
    tanggal_lahir, jenis_kelamin, alamat_lengkap, no_hp_pemohon, email_pemohon, pendidikan_terakhir, no_str,
    masa_berlaku_str, no_rekomendasi, tanggal_rekomendasi,
    permohonan_sip_ke,
    jenis_sip,
    ketersediaan_ruang_tunggu,
    ketersediaan_ruang_pemeriksaan,
    ketersediaan_ruang_persalinan,
    ketersediaan_ruang_rawat_inap,
    ketersediaan_wc,
    ketersediaan_rppi,
    keputusan) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";



    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param(
            $stmt,
            "sssssssssssssssssssssssssssss",
            $id,
            $nama_tempat_praktik,
            $alamat_tempat_praktik,
            $kecamatan,
            $kelurahan,
            $no_telepon,
            $email,
            $nik,
            $nama,
            $tempat_lahir,
            $tanggal_lahir,
            $jenis_kelamin,
            $alamat_lengkap,
            $no_hp_pemohon,
            $email_pemohon,
            $pendidikan_terakhir,
            $no_str,
            $masa_berlaku_str,
            $no_rekomendasi,
            $tanggal_rekomendasi,
            $permohonan_sip_ke,
            $jenis_sip,
            $ketersediaan_ruang_tunggu,
            $ketersediaan_ruang_pemeriksaan,
            $ketersediaan_ruang_persalinan,
            $ketersediaan_ruang_rawat_inap,
            $ketersediaan_wc,
            $ketersediaan_rppi,
            $keputusan
        );

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // echo "Pengajuan berhasil disimpan. Silakan lihat apakah keputusannya diterima atau ditolak";
            // header("Location: ?q=successipb&iduser=$id");
            // exit;
            echo "<script>alert('Pengajuan berhasil disimpan. Silakan lihat apakah keputusannya diterima atau ditolak')</script>";
            echo "<script>window.location.href='?q=successipb&iduser=$id'</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}