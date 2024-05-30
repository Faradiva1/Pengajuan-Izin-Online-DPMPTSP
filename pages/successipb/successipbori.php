<?php
include './conf/koneksi.php';
// $iduser = $_GET['id'];
$iduser = isset($_GET['id']) ? $_GET['id'] : '';
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
    $sql = "UPDATE data_praktik SET
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

// $sql = "SELECT * FROM pengajuan";
$sql = "SELECT * FROM pengajuan_sipb as p INNER JOIN users u
        on p.id_user = u.id
        WHERE u.id = $iduser
        ORDER BY p.id;";
$result = mysqli_query($conn, $sql);
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <p class="card-text">Hasil Keputusan</p>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <!-- <th scope="col">NIK</th> -->
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Pekerjaan</th>
                        <!-- <th scope="col">Tempat Lahir</th> -->
                        <!-- <th scope="col">Tanggal Lahir</th> -->
                        <!-- <th scope="col">Agama</th> -->
                        <th scope="col">Pendidikan Terakhir</th>
                        <th scope="col">Alamat</th>
                        <!-- <th scope="col">No Hp</th> -->
                        <!-- <th scope="col">Email</th> -->
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['jenis_kelamin'] ?></td>
                        <td><?= $row['pekerjaan'] ?></td>
                        <td><?= $row['pendidikan_terakhir'] ?></td>
                        <td><?= $row['alamat_lengkap'] ?></td>
                        <td><?= $row['keputusan'] ?></td>
                        <td>
                            <?php if ($row['keputusan'] == 'Diterima') { ?>
                            <form action="?q=uploadsipb&id=<?= $row['id'] ?>" method="post" style="display: inline;">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                            <a href="?q=deletesipb&id=<?= $row['id'] ?>"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                class="btn btn-danger">Hapus</a>
                            <a href="?q=ubahsipb&id=<?= $row['id'] ?>" class="btn btn-warning">Ubah</a>
                            <?php } elseif ($row['keputusan'] == 'Ditolak') { ?>
                            <a href="?q=deletesipb&id=<?= $row['id'] ?>"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                class="btn btn-danger">Hapus</a>
                            <a href="?q=ubahsipb&id=<?= $row['id'] ?>" class="btn btn-warning">Ubah</a>
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
                </tbody>
            </table>
        </div>
    </div>
</div>