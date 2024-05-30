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

    // contoh Data yang diberikan
    $data = [
        'nama' => ['Nama Perusahaan 1', 'Nama Perusahaan 2'],
        'alamatpr' => ['Alamat Perusahaan 1', 'Alamat Perusahaan 2'],
        'email' => ['email1@example.com', 'email2@example.com'],
        'bentuk_usaha' => ['PO', 'BUMN', 'CV', 'PT', 'FA', 'Yayasan'],
        'namapj' => ['Penanggung Jawab 1', 'Penanggung Jawab 2'],
        'nomorktppj' => ['123456789', '987654321'],
        'alamatpj' => ['Alamat KTP Penanggung Jawab 1', 'Alamat KTP Penanggung Jawab 2'],
        'jenis_klinik' => ['Pratama', 'Utama'],
        'jenis_permohonan' => ['Izin Mendirikan Klinik', 'Izin Operasional Klinik'],
        'nama_klinik' => ['Klinik 1', 'Klinik 2'],
        'nama_pemilik' => ['Pemilik 1', 'Pemilik 2'],
        'kecamatan' => ['Kotabunan', 'Modayag'],
        'kelurahan' => ['Buyat Barat', 'Candi Rejo']
    ];

    function entropy($data)
    {
        $total_samples = count($data);
        $class_counts = array_count_values($data);

        $entropy = 0.0;
        foreach ($class_counts as $class => $count) {
            $probability = $count / $total_samples;
            $entropy -= $probability * log($probability, 2);
        }

        return $entropy;
    }

    function gain($data, $split_attribute)
    {
        $total_samples = count($data);
        $split_values = array_count_values($split_attribute);

        $weighted_entropy = 0.0;
        foreach ($split_values as $value => $count) {
            $subset = array();
            for ($i = 0; $i < $total_samples; $i++) {
                if ($split_attribute[$i] == $value) {
                    $subset[] = $data[$i];
                }
            }

            $subset_entropy = entropy($subset);
            $weighted_entropy += ($count / $total_samples) * $subset_entropy;
        }

        $information_gain = entropy($data) - $weighted_entropy;
        return $information_gain;
    }

    function buildDecisionTree($data, $attributes, $class_attribute)
    {
        if (count(array_unique($data[$class_attribute])) == 1) {
            return reset($data[$class_attribute]);
        }

        if (empty($attributes)) {
            $class_counts = array_count_values($data[$class_attribute]);
            return array_search(max($class_counts), $class_counts);
        }

        $gains = array();
        foreach ($attributes as $attribute) {
            $gains[$attribute] = gain($data[$class_attribute], $data[$attribute]);
        }

        $best_attribute = array_search(max($gains), $gains);

        $tree = array($best_attribute => array());
        $remaining_attributes = array_diff($attributes, array($best_attribute));

        foreach (array_unique($data[$best_attribute]) as $value) {
            $subset = array();
            for ($i = 0; $i < count($data[$class_attribute]); $i++) {
                if ($data[$best_attribute][$i] == $value) {
                    $subset[$class_attribute][] = $data[$class_attribute][$i];
                    foreach ($attributes as $attr) {
                        if ($attr != $best_attribute) {
                            $subset[$attr][] = $data[$attr][$i];
                        }
                    }
                }
            }

            $tree[$best_attribute][$value] = buildDecisionTree($subset, $remaining_attributes, $class_attribute);
        }

        return $tree;
    }

    $attributes = ['kecamatan', 'kelurahan', 'bentuk_usaha', 'jenis_klinik'];
    $class_attribute = 'jenis_permohonan';

    $decision_tree = buildDecisionTree($data, $attributes, $class_attribute);
    print_r($decision_tree);

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
        'Modayag' => [
            'accepted' => ['Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon'],
            'rejected' => [
                'Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
                'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
                'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
                'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
                'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
                'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'
            ]
        ],
        'Modayag Barat' => [
            'accepted' => ['Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton'],
            'rejected' => [
                'Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
                'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
                'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
                'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
                'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
                'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'
            ]
        ],
        'Mooat' => [
            'accepted' => ['Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian'],
            'rejected' => [
                'Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
                'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
                'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
                'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
                'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
                'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'
            ]
        ],
        'Motongkad' => [
            'accepted' => ['Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara'],
            'rejected' => [
                'Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
                'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
                'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
                'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
                'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
                'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'
            ]
        ],
        'Nuangan' => [
            'accepted' => ['Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan'],
            'rejected' => [
                'Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
                'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
                'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
                'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
                'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
                'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'
            ]
        ],
        'Tutuyan' => [
            'accepted' => ['Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'],
            'rejected' => [
                'Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
                'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
                'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
                'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
                'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
                'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan'
            ]
        ],
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

    // Tambahan logika untuk menolak berdasarkan bentuk_usaha
    if ($keputusan == 'Diterima') {
        $bentuk_usaha_rules = [
            'Kotabunan' => [
                'Buyat Barat' => ['PO'],
            ],
        ];

        if (
            isset($bentuk_usaha_rules[$kecamatan][$kelurahan]) &&
            in_array($bentuk_usaha, $bentuk_usaha_rules[$kecamatan][$kelurahan])
        ) {
            // Tambahkan pengecualian untuk jenis_klinik
            if ($bentuk_usaha != 'BUMN') {
                // Tambahkan pengecualian untuk jenis_klinik jika bentuk usahanya adalah PO
                if ($bentuk_usaha == 'PO') {
                    $keputusan = 'Diterima';
                } else {
                    // Tambahan logika sebelumnya untuk jenis_klinik
                    if ($jenis_klinik == 'Utama') {
                        $keputusan = 'Diterima';
                    } elseif ($jenis_klinik == 'Pratama') {
                        $keputusan = 'Ditolak';
                    }
                }
            } elseif ($bentuk_usaha == 'BUMN') {
                // Tambahkan aturan khusus untuk bentuk usaha BUMN
                if ($jenis_klinik == 'Utama') {
                    $keputusan = 'Diterima';
                } elseif ($jenis_klinik == 'Pratama') {
                    $keputusan = 'Ditolak';
                }
            }
        } elseif ($bentuk_usaha == 'BUMN' && $jenis_klinik == 'Pratama') {
            // Pengecualian untuk jenis_klinik jika bentuk_usaha adalah BUMN
            $keputusan = 'Ditolak';
        }
    }

    // Eksekusi SQL
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