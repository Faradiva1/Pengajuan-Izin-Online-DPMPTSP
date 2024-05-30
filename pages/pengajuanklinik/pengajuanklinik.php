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


    // Implementasi Decision Tree untuk menentukan keputusan
}

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
}  elseif ($kecamatan == 'Kotabunan' && $kelurahan == 'Bongkudai' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Utama') {
    $keputusan = 'Ditolak';
}  elseif ($kecamatan == 'Kotabunan' && $kelurahan == 'Atoga' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Utama') {
    $keputusan = 'Ditolak';
}  elseif ($kecamatan == 'Kotabunan' && $kelurahan == 'Nuangan' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Utama') {
    $keputusan = 'Ditolak';
}  elseif ($kecamatan == 'Kotabunan' && $kelurahan == 'Tombolikat' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Utama') {
    $keputusan = 'Ditolak';
}  elseif ($kecamatan == 'Kotabunan' && $kelurahan == 'Kokapoi' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Utama') {
    $keputusan = 'Ditolak';


//MODAYAG

}  elseif ($kecamatan == 'Modayag' && $kelurahan == 'Badaro' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Utama') {
    $keputusan = 'Ditolak';
}  elseif ($kecamatan == 'Modayag' && $kelurahan == 'Badaro' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Utama') {
    $keputusan = 'Ditolak';
}   elseif ($kecamatan == 'Modayag' && $kelurahan == 'Bongkudai' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Utama') {
    $keputusan = 'Diterima';
} elseif ($kecamatan == 'Modayag' && $kelurahan == 'Bongkudai' && $bentuk_usaha == 'Yayasan' && $jenis_klinik == 'Pratama') {
    $keputusan = 'Diterima';
}
else { 
    $keputusan = 'Ditolak';
}


// Menyimpan pengajuan ke database
$sql = "INSERT INTO pengajuan (nama, alamatpr, nama_klinik, nama_pemilik, kecamatan, kelurahan, bentuk_usaha, jenis_klinik, keputusan) VALUES ('$nama','$alamatpr', '$nama_klinik', '$nama_pemilik','$kecamatan', '$kelurahan', '$bentuk_usaha', '$jenis_klinik', '$keputusan')";

if (mysqli_query($conn, $sql)) {
    echo "Pengajuan berhasil disimpan. Silahkan lihat apakah keputusannya diterima atau ditolak";
    header("Location: ?q=success");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



?>
