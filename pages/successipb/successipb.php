<?php
include './conf/koneksi.php';

$iduser = isset($_GET['iduser']) ? $_GET['iduser'] : '';

// $iduser = isset($_GET['id']) ? $_GET['id'] : '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari formulir pengajuan dan ID
    $id_data_praktik = isset($_POST['id_data_praktik']) ? mysqli_real_escape_string($conn, $_POST['id_data_praktik']) : '';
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
    $keputusan = '';

    // Update data ke database
    $sql = "UPDATE pengajuan_sipb SET
            nama_tempat_praktik = '$nama_tempat_praktik',
            alamat_tempat_praktik = '$alamat_tempat_praktik',
            kecamatan = '$kecamatan',
            kelurahan = '$kelurahan',
            no_telepon = '$no_telepon',
            email = '$email',
            nik = '$nik',
            nama = '$nama',
            tempat_lahir = '$tempat_lahir',
            tanggal_lahir = '$tanggal_lahir',
            jenis_kelamin = '$jenis_kelamin',
            alamat_lengkap = '$alamat_lengkap',
            no_hp_pemohon = '$no_hp_pemohon',
            pendidikan_terakhir = '$pendidikan_terakhir',
            email_pemohon = '$email_pemohon',
            no_str = '$no_str',
            masa_berlaku_str = '$masa_berlaku_str',
            no_rekomendasi = '$no_rekomendasi',
            tanggal_rekomendasi = '$tanggal_rekomendasi',
            permohonan_sip_ke = '$permohonan_sip_ke',
            jenis_sip = '$jenis_sip',
            ketersediaan_ruang_tunggu = '$ketersediaan_ruang_tunggu',
            ketersediaan_ruang_pemeriksaan = '$ketersediaan_ruang_pemeriksaan',
            ketersediaan_ruang_persalinan = '$ketersediaan_ruang_persalinan',
            ketersediaan_ruang_rawat_inap = '$ketersediaan_ruang_rawat_inap',
            ketersediaan_wc = '$ketersediaan_wc',
            ketersediaan_rppi = '$ketersediaan_rppi'
            WHERE id_data_praktik = '$id_data_praktik'";

    mysqli_query($conn, $sql);
    // Mengarahkan pengguna kembali ke halaman keputusan
    header("Location: ?q=successsipb");
    exit();
}

// $sql = "SELECT * FROM pengajuan SIPB";
$sql = "SELECT p.*, u.id_user, u.username, u.role FROM pengajuan_sipb p INNER JOIN users u
on p.id_user = u.id_user
WHERE u.id_user = $iduser
ORDER BY p.id_pengajuan DESC";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <p class="card-text">Hasil Keputusan</p>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Nama</th>
                        <th scope="col" class="text-center">Kecamatan</th>
                        <th scope="col" class="text-center">Kelurahan</th>
                        <th scope="col" class="text-center">Jenis Kelamin</th>
                        <th scope="col" class="text-center">Pendidikan Terakhir</th>
                        <th scope="col" class="text-center">Alamat Lengkap</th>
                        <th scope="col" class="text-center">Ruang Tunggu</th>
                        <th scope="col" class="text-center">Ruang Pemeriksaan</th>
                        <th scope="col" class="text-center">Ruang Persalinan</th>
                        <th scope="col" class="text-center">Ruang Inap</th>
                        <th scope="col" class="text-center">WC</th>
                        <th scope="col" class="text-center">Ruang RPPI</th>
                        <th scope="col" class="text-center">Keputusan</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $no++ ?></th>
                                <td class="text-center"><?= $row['nama'] ?></td>
                                <td class="text-center"><?= $row['kecamatan'] ?></td>
                                <td class="text-center"><?= $row['kelurahan'] ?></td>
                                <td class="text-center"><?= $row['jenis_kelamin'] ?></td>
                                <td class="text-center"><?= $row['pendidikan_terakhir'] ?></td>
                                <td class="text-center"><?= $row['alamat_lengkap'] ?></td>
                                <td class="text-center"><?= $row['ketersediaan_ruang_tunggu'] ?></td>
                                <td class="text-center"><?= $row['ketersediaan_ruang_pemeriksaan'] ?></td>
                                <td class="text-center"><?= $row['ketersediaan_ruang_persalinan'] ?></td>
                                <td class="text-center"><?= $row['ketersediaan_ruang_rawat_inap'] ?></td>
                                <td class="text-center"><?= $row['ketersediaan_wc'] ?></td>
                                <td class="text-center"><?= $row['ketersediaan_rppi'] ?></td>
                                <td class="text-center"><?= $row['keputusan'] ?></td>
                                <td class="text-center d-flex justify-content-between">
                                    <?php if ($row['keputusan'] == 'Diterima' && $row['respon'] < 1) { ?>
                                        <form action="?q=uploadsipb&idpengajuan=<?= $row['id_pengajuan'] ?>&iduser=<?= $iduser; ?>" method="post">
                                            <button type="submit" class="btn btn-primary mx-1">Upload</button>
                                        </form>
                                    <?php } ?>
                                    <a href="?q=deletesipb&idpengajuan=<?= $row['id_pengajuan'] ?>&iduser=<?= $iduser; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                                    <!-- <a href="?q=ubah&idpengajuan=<?= $row['id_pengajuan'] ?>&iduser=<?= $iduser; ?>"
                                class="btn btn-warning mx-1">Ubah</a> -->
                                    <?php if ($row['respon'] == 1) { ?>
                                        <p>Pengajuan ini Telah dikirimkan, silahkan cek izin
                                        <?php } ?>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada pengajuan.</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>