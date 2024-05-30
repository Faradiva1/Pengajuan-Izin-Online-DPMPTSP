<?php
include './conf/koneksi.php';

// Mendapatkan ID data yang akan diubah
// $id = isset($_GET['id']) ? $_GET['id'] : '';
$iduser = isset($_GET['iduser']) ? $_GET['iduser'] : '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari formulir pengajuan
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $kecamatan = isset($_POST['kecamatan']) ? $_POST['kecamatan'] : '';
    $kelurahan = isset($_POST['kelurahan']) ? $_POST['kelurahan'] : '';
    $bentuk_usaha = isset($_POST['bentuk_usaha']) ? $_POST['bentuk_usaha'] : '';
    $jenis_klinik = isset($_POST['jenis_klinik']) ? $_POST['jenis_klinik'] : '';

    // Update data ke database
    $sql = "UPDATE pengajuan SET kecamatan='$kecamatan', kelurahan='$kelurahan', bentuk_usaha='$bentuk_usaha', jenis_klinik='$jenis_klinik' WHERE id='$id'";
    mysqli_query($conn, $sql);

    // Mengarahkan pengguna kembali ke halaman keputusan
    header('Location: ?q=success&id='.$iduser.'');
    exit();
}



// Mengambil data pengajuan berdasarkan ID
$sql = "SELECT * FROM pengajuan WHERE id='$id'";
$result = mysqli_query($conn, $sql);

// Memeriksa apakah data ditemukan
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Data tidak ditemukan.";
    exit();
}
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <p class="card-text">Ubah Data</p>
        </div>
        <div class="card-body">

            <!-- Formulir pengubahan data -->
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan :</label>
                    <select name="kecamatan" id="kecamatan" class="form-select">
                        <option value="Kotabunan" <?php if ($row['kecamatan'] == 'Kotabunan') echo 'selected'; ?>>
                            Kotabunan</option>
                        <option value="Modayag" <?php if ($row['kecamatan'] == 'Modayag') echo 'selected'; ?>>Modayag
                        </option>
                        <option value="Modayag_Barat"
                            <?php if ($row['kecamatan'] == 'Modayag_Barat') echo 'selected'; ?>>Modayag Barat</option>
                        <option value="Mooat" <?php if ($row['kecamatan'] == 'Mooat') echo 'selected'; ?>>Mooat</option>
                        <option value="Motongkat" <?php if ($row['kecamatan'] == 'Motongkat') echo 'selected'; ?>>
                            Motongkat</option>
                        <option value="Nuangan" <?php if ($row['kecamatan'] == 'Nuangan') echo 'selected'; ?>>Nuangan
                        </option>
                        <option value="Tutuyan" <?php if ($row['kecamatan'] == 'Tutuyan') echo 'selected'; ?>>Tutuyan
                        </option>
                    </select>
                    <br>
                    <label for="kelurahan" class="form-label">Kelurahan :</label>
                    <select name="kelurahan" id="kelurahan" class="form-select">
                        <option value="Buyat_Barat" <?php if ($row['kelurahan'] == 'Buyat_Barat') echo 'selected'; ?>>
                            Buyat Barat</option>
                        <option value="Badaro" <?php if ($row['kelurahan'] == 'Badaro') echo 'selected'; ?>>Badaro
                        </option>
                        <option value="Bongkudai" <?php if ($row['kelurahan'] == 'Bongkudai') echo 'selected'; ?>>
                            Bongkudai</option>
                        <option value="Atoga" <?php if ($row['kelurahan'] == 'Atoga') echo 'selected'; ?>>Atoga</option>
                        <option value="Nuangan" <?php if ($row['kelurahan'] == 'Nuangan') echo 'selected'; ?>>Nuangan
                        </option>
                        <option value="Tombolikat" <?php if ($row['kelurahan'] == 'Tombolikat') echo 'selected'; ?>>
                            Tombolikat</option>
                        <option value="Kokapoi" <?php if ($row['kelurahan'] == 'Kokapoi') echo 'selected'; ?>>Kokapoi
                        </option>
                    </select>
                    <br>
                    <label for="bentuk_usaha" class="form-label">Bentuk Usaha :</label>
                    <select name="bentuk_usaha" id="bentuk_usaha" class="form-select">
                        <option value="PO" <?php if ($row['bentuk_usaha'] == 'PO') echo 'selected'; ?>>Perusahaan
                            Perorangan (PO)</option>
                        <option value="BUMN" <?php if ($row['bentuk_usaha'] == 'BUMN') echo 'selected'; ?>>BUMN</option>
                        <option value="CV" <?php if ($row['bentuk_usaha'] == 'CV') echo 'selected'; ?>>Persekutuan
                            Komanditer (CV)</option>
                        <option value="PT" <?php if ($row['bentuk_usaha'] == 'PT') echo 'selected'; ?>>Perseroan
                            Terbatas (PT)</option>
                        <option value="FA" <?php if ($row['bentuk_usaha'] == 'FA') echo 'selected'; ?>>Persekutuan Firma
                            (FA)</option>
                        <option value="Yayasan" <?php if ($row['bentuk_usaha'] == 'Yayasan') echo 'selected'; ?>>Yayasan
                        </option>
                    </select>
                    <br>
                    <label for="jenis_klinik" class="form-label">Jenis Klinik :</label>
                    <select name="jenis_klinik" id="jenis_klinik" class="form-select">
                        <option value="Pratama" <?php if ($row['jenis_klinik'] == 'Pratama') echo 'selected'; ?>>Pratama
                        </option>
                        <option value="Utama" <?php if ($row['jenis_klinik'] == 'Utama') echo 'selected'; ?>>Utama
                        </option>
                    </select>
                    <br>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="submit" name="submit" value="Ubah" class="btn btn-primary">
                </div>
            </form>

        </div>
    </div>
</div>