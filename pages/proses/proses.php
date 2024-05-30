//Kotabunan
if ($best_attribute == 'kecamatan' && $kecamatan == 'Kotabunan') {
$kelurahan_diterima = ['Buyat_Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur'];

if (in_array($kelurahan, $kelurahan_diterima)) {
$keputusan = 'Diterima';
} else {
$keputusan = 'Ditolak';
}
} else {
$kelurahan_ditolak = ['Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'];

if (in_array($kelurahan, $kelurahan_ditolak)) {
$keputusan = 'Ditolak';
} else {
$keputusan = 'Diterima';
}
}
//Modayag
if ($best_attribute == 'kecamatan' && $kecamatan == 'Modayag'){
$kelurahan_diterima = ['Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon'];

if (in_array($kelurahan, $kelurahan_diterima)) {
$keputusan = 'Diterima';
} else {
$keputusan = 'Ditolak';
}
} else {
$kelurahan_ditolak = ['Buyat_Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'];
if (in_array($kelurahan, $kelurahan_ditolak)) {
$keputusan = 'Ditolak';
} else {
$keputusan = 'Diterima';
}
}

//Modayag
if ($best_attribute == 'kecamatan' && $kecamatan == 'Modayag Barat'){
$kelurahan_diterima = ['Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton'];

if (in_array($kelurahan, $kelurahan_diterima)) {
$keputusan = 'Diterima';
} else {
$keputusan = 'Ditolak';
}
} else {
$kelurahan_ditolak = ['Buyat_Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'];
if (in_array($kelurahan, $kelurahan_ditolak)) {
$keputusan = 'Ditolak';
} else {
$keputusan = 'Diterima';
}
}

//Mooat
if ($best_attribute == 'kecamatan' && $kecamatan == 'Mooat'){
$kelurahan_diterima = ['Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian'];

if (in_array($kelurahan, $kelurahan_diterima)) {
$keputusan = 'Diterima';
} else {
$keputusan = 'Ditolak';
}

} else {
$kelurahan_ditolak = ['Buyat_Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'];
if (in_array($kelurahan, $kelurahan_ditolak)) {
$keputusan = 'Ditolak';
} else {
$keputusan = 'Diterima';
}
}


//Motongkad
if ($best_attribute == 'kecamatan' && $kecamatan == 'Motongkad'){
$kelurahan_diterima = ['Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara'];
if (in_array($kelurahan, $kelurahan_diterima)) {
$keputusan = 'Diterima';
} else {
$keputusan = 'Ditolak';
}

} else {
$kelurahan_ditolak = ['Buyat_Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'];
if (in_array($kelurahan, $kelurahan_ditolak)) {
$keputusan = 'Ditolak';
} else {
$keputusan = 'Diterima';
}
}

//Nuangan
if ($best_attribute == 'kecamatan' && $kecamatan == 'Motongkad'){
$kelurahan_diterima = ['Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan'];
if (in_array($kelurahan, $kelurahan_diterima)) {
$keputusan = 'Diterima';
} else {
$keputusan = 'Ditolak';
}

} else {
$kelurahan_ditolak = ['Buyat_Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'];
if (in_array($kelurahan, $kelurahan_ditolak)) {
$keputusan = 'Ditolak';
} else {
$keputusan = 'Diterima';
}

}

//Tutuyan
if ($best_attribute == 'kecamatan' && $kecamatan == 'Tutuyan'){
$kelurahan_diterima = ['Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi'];
if (in_array($kelurahan, $kelurahan_diterima)) {
$keputusan = 'Diterima';
} else {
$keputusan = 'Ditolak';
}

} else {
$kelurahan_ditolak = ['Buyat_Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan'];
}










































// Define array of accepted and rejected kelurahan for each kecamatan
$kecamatan_rules = [
'Kotabunan' => [
'accepted' => ['Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur'],
'rejected' => ['Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi']
],
];
// ... (add rules for other kecamatan here)
$kecamatan_rules = [
'Modayag' => [
'accepted' => ['Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon'],
'rejected' => ['Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi']
],
];

$kecamatan_rules = [
'Modayag Barat' => [
'accepted'=> ['Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton'],
'rejected' => ['Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi']
],
];

$kecamatan_rules = [
'Mooat' => [
'accepted' => ['Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian'],
'rejected' => ['Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi']
],
];

$kecamatan_rules = [
'Motongkad' => [
'accepted' => ['Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara'],
'rejected' => ['Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
'Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan',
'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi']
],
];

$kecamatan_rules = [
'Nuangan' => [
'accepted' => ['Bai', 'Idumun', 'Iyok', 'Jiko Blanga', 'Loyow', 'Matabulu', 'Matabulu Timur', 'Nuangan', 'Nuangan1', 'Nuangan Barat', 'Nuangan Selatan'],
'rejected' => ['Buyat Barat', 'Buyat Satu', 'Buyat Dua', 'Kotabunan Barat', 'Buyat Induk', 'Buyat Selatan', 'Buyat Tengah', 'Bukaka', 'Bulawan', 'Bulawan2', 'Bulawan1', 'Kotabunan Selatan', 'Kotabunan', 'Paret', 'Paret Timur',
'Badaro', 'Buyandi', 'Candi Rejo', 'Lanut', 'Liberia', 'Liberia Timur', 'Modayag', 'Modayag2', 'Modayag3', 'Purwerejo', 'Purwerejo Timur', 'Sumber Rejo', 'Tobongon',
'Bongkudai', 'Bongkudai Barat', 'Bangunan Wuwuk', 'Bangunan Wuwuk Timur', 'Moyongkota', 'Moonow', 'Moyongkota Baru', 'Inaton', 'Pinonobatuan', 'Tangaton',
'Bongkudai Baru', 'Bongkudai Selatan', 'Bongkudai Timur', 'Bongkudai Utara', 'Bongkudai Selatan', 'Guaan', 'Kokapoi', 'Kokapoi Timur', 'Mokitompia', 'Mooat', 'Mototompian',
'Atoga', 'Atoga Timur', 'Jiko', 'Jiko Utara', 'Molobog', 'Molobog Barat', 'Molobog Timur', 'Motongkad', 'Motongkad Selatan', 'Motongkad Tengah', 'Motongkad Utara',
'Dodap', 'Dodap Pantai', 'Dodap Mikasa', 'Tutuyan', 'Tutuyan2', 'Tutuyan3', 'Togid', 'Tombolikat Selatan', 'Tombolikat Induk', 'Kayumoyondi']
],
];

// Check if kecamatan rules exist
if (array_key_exists($kecamatan, $kecamatan_rules)) {
$accepted_kelurahan = $kecamatan_rules[$kecamatan]['accepted'];
$rejected_kelurahan = $kecamatan_rules[$kecamatan]['rejected'];

if (in_array($kelurahan, $accepted_kelurahan)) {
$keputusan = 'Diterima';
} elseif (in_array($kelurahan, $rejected_kelurahan)) {
$keputusan = 'Ditolak';
} else {
$keputusan = 'Diterima';
}
} else {
// Default action if kecamatan rules are not defined
$keputusan = 'Diterima';
}

























<?php
include './conf/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari formulir pengajuan
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $alamatpr = isset($_POST['alamatpr']) ? $_POST['alamatpr'] : '';
    $nama_klinik = isset($_POST['nama_klinik']) ? $_POST['nama_klinik'] : '';
    $nama_pemilik = isset($_POST['nama_pemilik']) ? $_POST['nama_pemilik'] : '';
    $kecamatan = isset($_POST['kecamatan']) ? $_POST['kecamatan'] : '';
    $kelurahan = isset($_POST['kelurahan']) ? $_POST['kelurahan'] : '';
    $bentuk_usaha = isset($_POST['bentuk_usaha']) ? $_POST['bentuk_usaha'] : '';
    $jenis_permohonan = isset($_POST['jenis_permohonan']) ? $_POST['jenis_permohonan'] : '';
    $jenis_klinik = isset($_POST['jenis_klinik']) ? $_POST['jenis_klinik'] : '';
    $keputusan = '';
}
// Implementasi Decision Tree untuk menentukan keputusan
//KOTABUNAN-Buyat Barat diterima
if ($kecamatan == 'Kotabunan' && $kelurahan == 'Buyat_Barat' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Pratama') {
    $keputusan = 'Diterima';
} elseif ($kecamatan == 'Kotabunan' && $kelurahan == 'Buyat_Barat' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Utama') {
    $keputusan = 'Diterima';
} elseif ($kecamatan == 'Kotabunan' && $kelurahan == 'Buyat_Barat' && $bentuk_usaha == 'PO' && $jenis_klinik == 'Utama') {
    $keputusan = 'Diterima';
} elseif ($kecamatan == 'Kotabunan' && $kelurahan == 'Buyat_Barat' && $bentuk_usaha == 'PO' && $jenis_klinik == 'Pratama') {
    $keputusan = 'Diterima';
} elseif ($kecamatan == 'Kotabunan' && $kelurahan == 'Buyat_Barat' && $bentuk_usaha == 'BUMN' && $jenis_klinik == 'Utama') {
    $keputusan = 'Diterima';
} elseif ($kecamatan == 'Kotabunan' && $kelurahan == 'Buyat_Barat' && $bentuk_usaha == 'BUMN' && $jenis_klinik == 'Utama') {
    $keputusan = 'Diterima';
} elseif ($kecamatan == 'Kotabunan' && $kelurahan == 'Badaro' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Utama') {
    $keputusan = 'Ditolak';
} elseif ($kecamatan == 'Kotabunan' && $kelurahan == 'Bongkudai' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Utama') {
    $keputusan = 'Ditolak';
} elseif ($kecamatan == 'Kotabunan' && $kelurahan == 'Atoga' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Utama') {
    $keputusan = 'Ditolak';
} elseif ($kecamatan == 'Kotabunan' && $kelurahan == 'Nuangan' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Utama') {
    $keputusan = 'Ditolak';
} elseif ($kecamatan == 'Kotabunan' && $kelurahan == 'Tombolikat' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Utama') {
    $keputusan = 'Ditolak';
} elseif ($kecamatan == 'Kotabunan' && $kelurahan == 'Kokapoi' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Utama') {
    $keputusan = 'Ditolak';


    //MODAYAG

} elseif ($kecamatan == 'Modayag' && $kelurahan == 'Badaro' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Utama') {
    $keputusan = 'Ditolak';
} elseif ($kecamatan == 'Modayag' && $kelurahan == 'Badaro' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Utama') {
    $keputusan = 'Ditolak';
} elseif ($kecamatan == 'Modayag' && $kelurahan == 'Bongkudai' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Utama') {
    $keputusan = 'Diterima';
} elseif ($kecamatan == 'Modayag' && $kelurahan == 'Bongkudai' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Pratama') {
    $keputusan = 'Diterima';
} else {
    $keputusan = 'Ditolak';
}


// Menyimpan pengajuan ke database
$sql = "INSERT INTO pengajuan (nama, alamatpr, nama_klinik, nama_pemilik, kecamatan, kelurahan, bentuk_usaha, jenis_permohonan, jenis_klinik, keputusan) VALUES ('$nama','$alamatpr', '$nama_klinik', '$nama_pemilik','$kecamatan', '$kelurahan', '$bentuk_usaha', '$jenis_permohonan', '$jenis_klinik', '$keputusan')";

if (mysqli_query($conn, $sql)) {
    echo "Pengajuan berhasil disimpan. Silahkan lihat apakah keputusannya diterima atau ditolak";
    header("Location: ?q=success");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



?>

<?php
if (mysqli_num_rows($result) > 0) {
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
?>
        <tr>
            <th scope="row"><?= $no++ ?></th>
            <td><?= $row['kecamatan'] ?></td>
            <td><?= $row['kelurahan'] ?></td>
            <td><?= $row['bentuk_usaha'] ?></td>
            <td><?= $row['jenis_klinik'] ?></td>
            <td><?= $row['jenis_permohonan'] ?></td>
            <td><?= $row['keputusan'] ?></td>
            <td>
                <?php if ($row['keputusan'] == 'Diterima') { ?>
                    <a href="?q=upload&id=<?= $row['id'] ?>">Diterima Lanjut ke Halaman Berikutnya</a>
                <?php } else { ?>
                    <a href="?q=delete&id=<?= $row['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    <a href="?q=ubah&id=<?= $row['id'] ?>">Ubah</a>
                <?php } ?>
            </td>
        </tr>
    <?php
    }
} else {
    ?>
    <tr>
        <td colspan="8">Tidak ada pengajuan.</td>
    </tr>
<?php
}
?>