<?php
include './conf/koneksi.php';

$iduser = isset($_GET['iduser']) ? $_GET['iduser'] : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari formulir pengajuan dan ID
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $alamatpr = isset($_POST['alamatpr']) ? $_POST['alamatpr'] : '';
    $nama_klinik = isset($_POST['nama_klinik']) ? $_POST['nama_klinik'] : '';
    $nama_pemilik = isset($_POST['nama_pemilik']) ? $_POST['nama_pemilik'] : '';
    $kecamatan = isset($_POST['kecamatan']) ? $_POST['kecamatan'] : '';
    $kelurahan = isset($_POST['kelurahan']) ? $_POST['kelurahan'] : '';
    $bentuk_usaha = isset($_POST['bentuk_usaha']) ? $_POST['bentuk_usaha'] : '';
    $jenis_klinik = isset($_POST['jenis_klinik']) ? $_POST['jenis_klinik'] : '';
    $jenis_permohonan = isset($_POST['jenis_permohonan']) ? $_POST['jenis_permohonan'] : '';

    // Update data ke database (pastikan untuk menghindari SQL Injection)
    $stmt = $conn->prepare("UPDATE pengajuan SET nama=?, alamatpr=?, nama_klinik=?, nama_pemilik=?, kecamatan=?, kelurahan=?, bentuk_usaha=?, jenis_klinik=?, jenis_permohonan=? WHERE id=?");
    $stmt->bind_param("sssssssssi", $nama, $alamatpr, $nama_klinik, $nama_pemilik, $kecamatan, $kelurahan, $bentuk_usaha, $jenis_klinik, $jenis_permohonan, $id);

    if ($stmt->execute()) {
        // Mengarahkan pengguna kembali ke halaman keputusan jika berhasil
        header('Location: ?q=success');
        exit();
    } else {
        echo "Gagal mengupdate data: " . $conn->error;
    }
}

$sql = "SELECT p.*, u.id_user, u.username, u.role FROM pengajuan p INNER JOIN users u
on p.id_user = u.id_user
WHERE u.id_user = $iduser
ORDER BY p.id_pengajuan DESC";

// $sql = "SELECT p.*, u.id_user, u.username, u.role, up.* FROM pengajuan p INNER JOIN users u
// on p.id_user = u.id_user INNER JOIN upload up
// on up.id = u.id_user
// WHERE u.id_user = $iduser
// ORDER BY p.id DESC;";
$result = mysqli_query($conn, $sql);
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <p class="card-text">Hasil Keputusan</p>
        </div>
        <div class="card-body">
            <table class="table table-bordered tabel-responsive">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No</th>
                        <th class="text-center" scope="col">Nama</th>
                        <th class="text-center" scope="col">Kecamatan</th>
                        <th class="text-center" scope="col">Kelurahan</th>
                        <th class="text-center" scope="col">Bentuk Usaha</th>
                        <th class="text-center" scope="col">Jenis Klinik</th>
                        <th class="text-center" scope="col">Jenis Permohonan</th>
                        <th class="text-center" scope="col">Keputusan</th>
                        <th class="text-center" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <th class="text-center" scope="row"><?= $no++ ?></th>
                                <td class="text-center"><?= $row['nama'] ?></td>
                                <td class="text-center"><?= $row['kecamatan'] ?></td>
                                <td class="text-center"><?= $row['kelurahan'] ?></td>
                                <td class="text-center"><?= $row['bentuk_usaha'] ?></td>
                                <td class="text-center"><?= $row['jenis_klinik'] ?></td>
                                <td class="text-center"><?= $row['jenis_permohonan'] ?></td>
                                <td class="text-center"><?= $row['keputusan'] ?></td>
                                <td class="text-center d-flex justify-content-between">
                                    <?php if ($row['keputusan'] == 'Diterima' && $row['respon'] < 1) { ?>
                                        <form action="?q=upload&idpengajuan=<?= $row['id_pengajuan'] ?>&iduser=<?= $iduser; ?>" method="post">
                                            <button type="submit" class="btn btn-primary mx-1">Upload</button>
                                        </form>
                                    <?php } ?>
                                    <a href="?q=delete&idpengajuan=<?= $row['id_pengajuan'] ?>&iduser=<?= $iduser; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                                    <!-- <a href="?q=ubah&idpengajuan=<?= $row['id_pengajuan'] ?>&iduser=<?= $iduser; ?>"
                                class="btn btn-warning mx-1">Ubah</a> -->
                                    <?php if ($row['respon'] == 1) { ?>
                                        <p>Pengajuan ini Telah dikirimkan, silahkan cek izin </p>
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