<?php
$iduser = $_GET['iduser'];

//DISETUJUI
// $query = "SELECT i.*, u.id_user, u.username FROM izin_terbit_klinik i INNER JOIN
// users u ON i.id_user = u.id_user WHERE u.id_user = $iduser;";

// $query = "SELECT i.*, u.id_user, u.username, pj.nama_pemilik, up.* FROM izin_terbit_klinik i
// INNER JOIN upload up ON i.id_upload = up.id_upload
// INNER JOIN pengajuan pj ON up.id_pengajuan = pj.id_pengajuan
// INNER JOIN
// users u ON i.id_user = u.id_user WHERE u.id_user = $iduser";

$query = "SELECT * FROM izin_terbit_sipb  WHERE id_user = $iduser";



//DITOLAK
// $query1 = "SELECT f.*, u.id_user, u.username FROM feedback f INNER JOIN
// users u ON f.id_user = u.id_user WHERE u.id_user = $iduser";

$query1 = "SELECT f.*, u.id_user, u.username, pj.nama, up.* FROM feedback_sipb f
INNER JOIN upload_sipb up ON f.id_upload = up.id_upload_sipb
INNER JOIN pengajuan_sipb pj ON up.id_pengajuan = pj.id_pengajuan
INNER JOIN
users u ON f.id_user = u.id_user WHERE u.id_user = $iduser";

$result = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query1);
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <p class="card-text">Disetujui</p>
        </div>
        <div class="card-body">
            <?php if (mysqli_num_rows($result) > 0) { ?>
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
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><strong><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['file_path']; ?></td>
                        <td><a href="boltimadmin/<?php echo $row['file_path']; ?>" download>Unduh</a></td>
                    </tr>
                    <?php $i++;
                        }
                        ?>
                </tbody>
            </table>
            <?php } elseif (mysqli_num_rows($result2) > 0) { ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Izin Ditolak</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                    <tr>
                        <td><?php echo $row2['feedback_text']; ?></td>
                    </tr>
                    <?php } ?>
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
            <?php if (mysqli_num_rows($result2) > 0) { ?>
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
                    <?php while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><strong><?php echo $row2['nama']; ?></strong></td>
                        <td><?php echo $row2['feedback_text']; ?></td>
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