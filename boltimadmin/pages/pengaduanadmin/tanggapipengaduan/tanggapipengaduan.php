<?php
include '../conf/koneksi.php';

$id = $_GET['id']; // Ambil ID dari parameter URL

if (isset($_GET['id_user'])) {
    $id = $_GET['id_user'];

    // Query untuk mengambil detail pengaduan
    $query = "SELECT form_pengaduan.*, users.username
              FROM form_pengaduan
              INNER JOIN users ON form_pengaduan.id_user = users.id_user
              WHERE form_pengaduan.id_user = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Ambil data-data pengaduan
        $subject = $row['subject'];
        $username = $row['username'];
        $isi_pengaduan = $row['isi_pengaduan'];
        $tanggal_dibuat = $row['tanggal_dibuat'];
    } else {
        // Handle jika pengaduan tidak ditemukan
        echo "Pengaduan tidak ditemukan.";
        exit;
    }
} else {
    // Handle jika ID pengaduan tidak valid
    echo "ID pengaduan tidak valid.";
    exit;
}

mysqli_close($conn);

?>

<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="dashboard-header d-flex align-items-center justify-content-center mb-4">
                <h4 class="text-center">Pengaduan</h4>
            </div>
            <!-- Form tanggapan -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Tanggapi Pengaduan
                        </div>
                        <div class="card-body">
                            <form action="?q=prosestanggapanadmin&id_user=<?php echo $row['id_user']; ?>&id=<?php echo $id; ?>" method="post">
                                <div class="form-group">
                                    <label for="subject">Subject:</label>
                                    <input type="text" class="form-control" id="subject" value="<?php echo $subject; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="username">Nama Pengadu:</label>
                                    <input type="text" class="form-control" id="username" value="<?php echo $username; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="isi_pengaduan">Isi Pengaduan:</label>
                                    <textarea class="form-control" id="isi_pengaduan" rows="4" readonly><?php echo $isi_pengaduan; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_dibuat">Tanggal Dibuat:</label>
                                    <input type="text" class="form-control" id="tanggal_dibuat" value="<?php echo $tanggal_dibuat; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tanggapan">Tanggapan:</label>
                                    <textarea class="form-control" name="tanggapan" id="tanggapan" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim Tanggapan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Akhir dari form tanggapan -->
        </div>
    </div>
</div>