<?php
include './conf/koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari formulir pengajuan dan melakukan sanitasi
    $id = $_POST['id'];
    $nama = isset($_POST['nama']) ? mysqli_real_escape_string($conn, $_POST['nama']) : '';
    $alamatpr = isset($_POST['alamatpr']) ? mysqli_real_escape_string($conn, $_POST['alamatpr']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $nama_klinik = isset($_POST['nama_klinik']) ? mysqli_real_escape_string($conn, $_POST['nama_klinik']) : '';
    $nama_pemilik = isset($_POST['nama_pemilik']) ? mysqli_real_escape_string($conn, $_POST['nama_pemilik']) : '';
    $kecamatan = isset($_POST['kecamatan']) ? mysqli_real_escape_string($conn, $_POST['kecamatan']) : '';
    $kelurahan = isset($_POST['kelurahan']) ? mysqli_real_escape_string($conn, $_POST['kelurahan']) : '';
    $bentuk_usaha = isset($_POST['bentuk_usaha']) ? mysqli_real_escape_string($conn, $_POST['bentuk_usaha']) : '';
    $jenis_permohonan = isset($_POST['jenis_permohonan']) ? mysqli_real_escape_string($conn, $_POST['jenis_permohonan']) : '';
    $jenis_klinik = isset($_POST['jenis_klinik']) ? mysqli_real_escape_string($conn, $_POST['jenis_klinik']) : '';
    $namapj = isset($_POST['namapj']) ? mysqli_real_escape_string($conn, $_POST['namapj']) : '';
    $nomorktppj = isset($_POST['nomorktppj']) ? mysqli_real_escape_string($conn, $_POST['nomorktppj']) : '';
    $alamatpj = isset($_POST['alamatpj']) ? mysqli_real_escape_string($conn, $_POST['alamatpj']) : '';

    // Data yang diberikan
    $data = [
        'nama' => ['Nama Perusahaan 1', 'Nama Perusahaan 2', 'Nama Perusahaan 3'],
        'bentuk_usaha' => ['PT', 'CV', 'BUMN'],
        'jenis_klinik' => ['Pratama', 'Utama', 'Pratama'],
        'jenis_permohonan' => ['Izin Mendirikan Klinik', 'Izin Operasional Klinik', 'Izin Mendirikan Klinik'],
        'nama_pemilik' => ['Pemilik 1', 'Pemilik 2', 'Pemilik 3'],
        'keputusan' => ['Diterima', 'Ditolak', 'Ditolak'], // Atribut keputusan
    ];
    
    // Fungsi untuk menghitung entropi
    function entropy($data) {
        $total = count($data);
        $entropy = 0;
        
        foreach (array_count_values($data) as $value) {
            $probability = $value / $total;
            $entropy -= $probability * log($probability, 2);
        }
        
        return $entropy;
    }
    
    // Fungsi untuk menghitung gain informasi
    function informationGain($baseEntropy, $splitData, $data) {
        $newEntropy = 0;
        
        foreach ($splitData as $value => $subset) {
            $subsetEntropy = entropy(array_intersect_key($data['keputusan'], array_flip($subset)));
            $probability = count($subset) / count($data['nama']);
            $newEntropy += $probability * $subsetEntropy;
        }
        
        return $baseEntropy - $newEntropy;
    }
    
    // Fungsi untuk membagi data berdasarkan atribut tertentu
    function splitData($data, $attribute) {
        $splitData = [];
        
        foreach (array_unique($data[$attribute]) as $value) {
            $splitData[$value] = [];
        }
        
        foreach (range(0, count($data['nama']) - 1) as $i) {
            $value = $data[$attribute][$i];
            $splitData[$value][] = $i;
        }
        
        return $splitData;
    }
    
    // Fungsi untuk memilih atribut terbaik
    function chooseBestAttribute($data, $attributes) {
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
    function buildDecisionTree($data, $attributes) {
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
    $attributes = ['bentuk_usaha', 'jenis_klinik', 'jenis_permohonan', 'nama_pemilik'];
    
    // Membangun pohon keputusan
    $decisionTree = buildDecisionTree($data, $attributes);
    
    // Fungsi untuk melakukan prediksi
    function predict($dataPoint, $tree) {
        while (is_array($tree)) {
            $attribute = key($tree);
            $value = $dataPoint[$attribute];
            $tree = $tree[$attribute][$value];
        }
        
        return $tree;
    }
    
    // Data yang akan diprediksi (Diterima)
    $newDataPointDiterima = [
        'bentuk_usaha' => 'PT',
        'jenis_klinik' => 'Pratama',
        'jenis_permohonan' => 'Izin Mendirikan Klinik',
        'nama_pemilik' => 'Pemilik 1',
    ];
    
    // Melakukan prediksi (Diterima)
    $predictionDiterima = predict($newDataPointDiterima, $decisionTree);
    
    // Data yang akan diprediksi (Ditolak)
    $newDataPointDitolak = [
        'bentuk_usaha' => 'BUMN',
        'jenis_klinik' => 'Pratama',
        'jenis_permohonan' => 'Izin Mendirikan Klinik',
        'nama_pemilik' => 'Pemilik 3',
    ];
    
    // Melakukan prediksi (Ditolak)
    $predictionDitolak = predict($newDataPointDitolak, $decisionTree);
   // Melakukan prediksi
$predictionDiterima = predict($newDataPointDiterima, $decisionTree);
$predictionDitolak = predict($newDataPointDitolak, $decisionTree);

// Output hasil prediksi dalam format yang diinginkan
echo "Hasil prediksi (Diterima): $predictionDiterima\n";
echo "Hasil prediksi (Ditolak): $predictionDitolak\n";
    


    // // Define array of accepted and rejected kelurahan for each kecamatan
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

    $sql = "INSERT INTO pengajuan (id_user, nama, alamatpr, email, nama_klinik, nama_pemilik, 
    kecamatan, kelurahan, bentuk_usaha, jenis_permohonan, jenis_klinik, nama_penanggung_jawab, 
    nomorktppj, alamatpj, keputusan) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "issssssssssssss", $id, $nama, $alamatpr, $email, $nama_klinik, $nama_pemilik, $kecamatan, $kelurahan, $bentuk_usaha, $jenis_permohonan, $jenis_klinik, $namapj, $nomorktppj, $alamatpj, $keputusan);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Pengajuan berhasil disimpan. Silakan lihat apakah keputusannya diterima atau ditolak')</script>";
            echo "<script>window.location.href='?q=success&iduser=$id'</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
