<?php
// Ambil id user dari parameter URL
$iduser = isset($_GET['iduser']) ? $_GET['iduser'] : '';

// Query untuk data yang disetujui
// $query_approved = "SELECT i.*, pj.nama_pemilik, up.file_path 
//                     FROM izin_terbit_klinik i 
//                     INNER JOIN upload up ON i.id_upload = up.id_upload 
//                     INNER JOIN pengajuan pj ON up.id_pengajuan = pj.id_pengajuan 
//                     WHERE i.id_user = $iduser";

$query_approved = "SELECT * FROM izin_terbit_klinik  WHERE id_user = $iduser";

// Query untuk data yang ditolak
$query_rejected = "SELECT f.*, pj.nama_pemilik 
                    FROM feedback f 
                    INNER JOIN upload up ON f.id_upload = up.id_upload 
                    INNER JOIN pengajuan pj ON up.id_pengajuan = pj.id_pengajuan 
                    WHERE f.id_user = $iduser";

// Eksekusi query untuk data yang disetujui
$result_approved = mysqli_query($conn, $query_approved);

// Eksekusi query untuk data yang ditolak
$result_rejected = mysqli_query($conn, $query_rejected);
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <p class="card-text">Disetujui</p>
        </div>
        <div class="card-body">
            <?php if (mysqli_num_rows($result_approved) > 0) { ?>
            <table class="table table-bordered table-striped tabel-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemilik</th>
                        <th>File Sertifikat</th>
                        <th>Unduh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php while ($row_approved = mysqli_fetch_assoc($result_approved)) { ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><strong><?php echo $row_approved['nama_pemilik']; ?></strong></td>
                        <td><?php echo $row_approved['file_path']; ?></td>
                        <td><a href="boltimadmin/<?php echo $row_approved['file_path']; ?>" download>Unduh</a></td>
                    </tr>
                    <?php $i++;
                        } ?>
                </tbody>
            </table>
            <?php } else { ?>
            <p>Izin belum tersedia.</p>
            <?php } ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-header">
            <p class="card-text">Ditolak</p>
        </div>
        <div class="card-body">
            <?php if (mysqli_num_rows($result_rejected) > 0) { ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemilik</th>
                        <th>Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php while ($row_rejected = mysqli_fetch_assoc($result_rejected)) { ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><strong><?php echo $row_rejected['nama_pemilik']; ?></strong></td>
                        <td><?php echo $row_rejected['feedback_text']; ?></td>
                    </tr>
                    <?php $i++;
                        } ?>
                </tbody>
            </table>
            <?php } else { ?>
            <p>Izin belum tersedia.</p>
            <?php } ?>
        </div>
    </div>
</div>