<?php
$iduser = $_GET['id'];
$iduser = isset($_GET['id']) ? $_GET['id'] : '';
?>

<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="dashboard-header d-flex align-items-center justify-content-center">
                <!-- Tambahkan class baru -->
                <h4 class="text-center">Data Izin SIPB</h4>
                <!-- Tambahkan class text-center untuk menengahkan teks -->
            </div>

            <?php
            include '../conf/koneksi.php';

            // $query = "SELECT * FROM upload_sipb ORDER BY id";
            $query = "SELECT up.*,
            us.id_user,
            us.username,
            pj.*
            FROM upload_sipb up
            INNER JOIN users us ON up.id_user = us.id_user
            INNER JOIN pengajuan_sipb pj ON pj.id_pengajuan = up.id_pengajuan
            ORDER BY up.id_upload_sipb ASC";
            $result = mysqli_query($conn, $query);

            ?>

            <!-- tabel -->
            <div class="card mt-4">
                <div class="card-header">
                    <div class="card-title">Hoverable Table</div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Waktu Upload</th>
                                <th scope="col">Nama Tempat Praktik</th>
                                <th scope="col">Alamat Tempat Praktik</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Kelurahan</th>
                                <th scope="col">No Telepon</th>
                                <th scope="col">Email</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat Lengkap</th>
                                <th scope="col">Nomor HP Pemohon</th>
                                <th scope="col">Email Pemohon</th>
                                <th scope="col">Pendidikan Terakhir</th>
                                <th scope="col">NO STR</th>
                                <th scope="col">Masa Berlaku STR</th>
                                <th scope="col">Nomor Rekomendasi</th>
                                <th scope="col">Tanggal Rekomendasi</th>
                                <th scope="col">Permohonan SIP Ke</th>
                                <th scope="col">Jenis SIP</th>
                                <th scope="col">Ketersediaan Ruang Tunggu</th>
                                <th scope="col">Ketersediaan Ruang Pemeriksaan</th>
                                <th scope="col">Ketersediaan Ruang Persalinan</th>
                                <th scope="col">Ketersediaan Ruang Rawat Inap</th>
                                <th scope="col">Ketersediaan Ruang Ketersediaan WC</th>
                                <th scope="col">Ketersediaan Ruang Ketersediaan RPPI</th>

                                <th scope="col">KTP</th>
                                <th scope="col">View KTP</th>
                                <th scope="col">Registrasi Bidan</th>
                                <th scope="col">View Registrasi Bidan</th>
                                <th scope="col">NPWP</th>
                                <th scope="col">View NPWP</th>
                                <th scope="col">Foto Lokasi</th>
                                <th scope="col">View Foto Lokasi</th>
                                <th scope="col">Daftar Sarana dan Prasarana</th>
                                <th scope="col">View Daftar Sarana dan Prasarana</th>
                                <th scope="col">Ijazah Terakhir</th>
                                <th scope="col">View Ijazah Terakhir</th>
                                <th scope="col">Surat Rekomendasi</th>
                                <th scope="col">View Surat Rekomendasi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            // Loop melalui hasil query dan menampilkan data dalam tabel
                            while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>

                                <td><?php echo substr($row['username'], 0, 20); ?></td>
                                <td><?php echo substr($row['waktu_upload'], 0, 20); ?></td>

                                <td><?php echo $row['nama_tempat_praktik']; ?></td>
                                <td><?php echo $row['alamat_tempat_praktik']; ?></td>
                                <td><?php echo $row['kecamatan']; ?></td>
                                <td><?php echo $row['kelurahan']; ?></td>
                                <td><?php echo $row['no_telepon']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['nik']; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['tempat_lahir']; ?></td>
                                <td><?php echo $row['tanggal_lahir']; ?></td>
                                <td><?php echo $row['jenis_kelamin']; ?></td>
                                <td><?php echo $row['alamat_lengkap']; ?></td>
                                <td><?php echo $row['no_hp_pemohon']; ?></td>
                                <td><?php echo $row['email_pemohon']; ?></td>
                                <td><?php echo $row['pendidikan_terakhir']; ?></td>
                                <td><?php echo $row['no_str']; ?></td>
                                <td><?php echo $row['masa_berlaku_str']; ?></td>
                                <td><?php echo $row['no_rekomendasi']; ?></td>
                                <td><?php echo $row['tanggal_rekomendasi']; ?></td>
                                <td><?php echo $row['permohonan_sip_ke']; ?></td>
                                <td><?php echo $row['jenis_sip']; ?></td>
                                <td><?php echo $row['ketersediaan_ruang_tunggu']; ?></td>
                                <td><?php echo $row['ketersediaan_ruang_pemeriksaan']; ?></td>
                                <td><?php echo $row['ketersediaan_ruang_persalinan']; ?></td>
                                <td><?php echo $row['ketersediaan_ruang_rawat_inap']; ?></td>
                                <td><?php echo $row['ketersediaan_wc']; ?></td>
                                <td><?php echo $row['ketersediaan_rppi']; ?></td>

                                <!-- Kolom KTP -->
                                <td><?= substr($row['ktp'], 0, 20) ?></td>
                                <td><button onclick="openPDF('../<?= $row['ktp'] ?>')" class="btn btn-primary"><i
                                            class="far fa-eye"></i> View</button></td>

                                <!-- Kolom Regis Bidan -->
                                <td><?= substr($row['regis_bidan'], 0, 20) ?></td>
                                <td><button onclick="openPDF('../<?= $row['regis_bidan'] ?>')"
                                        class="btn btn-primary"><i class="far fa-eye"></i> View</button></td>

                                <!-- Kolom NPWP -->
                                <td><?= substr($row['npwp'], 0, 20) ?></td>
                                <td><button onclick="openPDF('../<?= $row['npwp'] ?>')" class="btn btn-primary"><i
                                            class="far fa-eye"></i> View</button></td>

                                <!-- Kolom Foto Lokasi -->
                                <td><?= substr($row['foto_lokasi'], 0, 20) ?></td>
                                <td><button onclick="openPDF('../<?= $row['foto_lokasi'] ?>')"
                                        class="btn btn-primary"><i class="far fa-eye"></i> View</button></td>

                                <!-- Kolom Daftar Sarana Prasarana -->
                                <td><?= substr($row['daftar_sarana_prasarana'], 0, 20) ?></td>
                                <td><button onclick="openPDF('../<?= $row['daftar_sarana_prasarana'] ?>')"
                                        class="btn btn-primary"><i class="far fa-eye"></i> View</button></td>

                                <!-- Kolom Ijazah Terakhir -->
                                <td><?= substr($row['ijazah_terakhir'], 0, 20) ?></td>
                                <td><button onclick="openPDF('../<?= $row['ijazah_terakhir'] ?>')"
                                        class="btn btn-primary"><i class="far fa-eye"></i> View</button></td>

                                <!-- Kolom Surat Rekomendasi -->
                                <td><?= substr($row['surat_rekomendasi'], 0, 20) ?></td>
                                <td><button onclick="openPDF('../<?= $row['surat_rekomendasi'] ?>')"
                                        class="btn btn-primary"><i class="far fa-eye"></i> View</button></td>

                                <td>
                                    <?php
                                        // Tambahkan kondisi untuk menampilkan tombol berdasarkan status
                                        if ($row['status'] == 'Setuju') {
                                        ?>
                                    <button class='btn btn-success' disabled>Telah Disetujui</button>
                                    <a href='?q=hapusizinkliniksipb&id=<?php echo $row["id_user"]; ?>&idfile=<?php echo $row['id_upload_sipb']; ?>&idpengajuan=<?php echo $row['id_pengajuan']; ?>&id_admin=<?php echo $iduser; ?>'
                                        class='btn btn-warning'>Hapus</a>
                                    <?php
                                        } elseif ($row['status'] == 'Ditolak') {
                                        ?>
                                    <button class='btn btn-danger' disabled>Ditolak</button>
                                    <a href='?q=hapusizinkliniksipb&id=<?php echo $row["id_user"]; ?>&idfile=<?php echo $row['id_upload_sipb']; ?>&idpengajuan=<?php echo $row['id_pengajuan']; ?>&id_admin=<?php echo $iduser; ?>'
                                        class='btn btn-warning'>Hapus</a>
                                    <?php
                                        } else {
                                        ?>
                                    <div class="btn-group" role="group">
                                        <a href='?q=acceptizinsipb&id=<?php echo $row["id_user"]; ?>&idfile=<?php echo $row['id_upload_sipb']; ?>&nama=<?php echo $row['nama']; ?>&id_admin=<?php echo $iduser; ?>'
                                            class='btn btn-primary'>Setuju</a>
                                        <a href='?q=rejectizinsipb&id=<?php echo $row["id_user"]; ?>&idfile=<?php echo $row['id_upload_sipb']; ?>&id_admin=<?php echo $iduser; ?>'
                                            class='btn btn-danger'>Tolak</a>
                                    </div>
                                    <?php
                                        }
                                        ?>
                                </td>

                            </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
function openPDF(pdfURL) {
    window.open(pdfURL, "_blank");
}
</script>