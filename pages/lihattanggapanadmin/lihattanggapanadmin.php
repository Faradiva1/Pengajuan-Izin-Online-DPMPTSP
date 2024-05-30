<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Pengaduan
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Subject</th>
                                <th>Isi Pengaduan</th>
                                <th>Tanggal Dibuat</th>
                                <th>Tanggal Tanggapan</th>
                                <th>Tanggapan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include './conf/koneksi.php';

                            // Pastikan parameter 'id_pengaduan' dan 'id_user' ada dalam URL
                            if (isset($_GET['id_pengaduan']) && isset($_GET['id_user'])) {
                                $id_pengaduan = intval($_GET['id_pengaduan']); // Pastikan $id_pengaduan adalah bilangan bulat
                                $id_user = intval($_GET['id_user']); // Pastikan $id_user adalah bilangan bulat

                                // Query untuk mengambil detail pengaduan
                                $query_pengaduan = "SELECT * FROM form_pengaduan WHERE id_user = ? AND id = ?";
                                $stmt_pengaduan = mysqli_prepare($conn, $query_pengaduan);
                                mysqli_stmt_bind_param($stmt_pengaduan, "ii", $id_user, $id_pengaduan);
                                mysqli_stmt_execute($stmt_pengaduan);
                                $result_pengaduan = mysqli_stmt_get_result($stmt_pengaduan);

                                // Periksa apakah query pengaduan mengembalikan hasil
                                if ($result_pengaduan) {
                                    $row_pengaduan = mysqli_fetch_assoc($result_pengaduan);
                                    $subject = $row_pengaduan['subject'];
                                    $isi_pengaduan = $row_pengaduan['isi_pengaduan'];
                                    $tanggal_dibuat = $row_pengaduan['tanggal_dibuat'];
                                } else {
                                    echo "Pengaduan tidak ditemukan.";
                                }

                                // Query untuk mengambil tanggapan admin berdasarkan ID pengaduan
                                $query_tanggapan = "SELECT * FROM tanggapan_admin WHERE id_pengaduan = ?";
                                $stmt_tanggapan = mysqli_prepare($conn, $query_tanggapan);
                                mysqli_stmt_bind_param($stmt_tanggapan, "i", $id_pengaduan);
                                mysqli_stmt_execute($stmt_tanggapan);
                                $result_tanggapan = mysqli_stmt_get_result($stmt_tanggapan);

                                // Inisialisasi nomor urut
                                $no = 1;

                                // Loop untuk menampilkan tanggapan admin
                                while ($row_tanggapan = mysqli_fetch_assoc($result_tanggapan)) {
                            ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $subject ?></td>
                                        <td><?= $isi_pengaduan ?></td>
                                        <td><?= $tanggal_dibuat ?></td>
                                        <td><?= $row_tanggapan['tanggal_tanggapan'] ?></td>
                                        <td><?= $row_tanggapan['tanggapan'] ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="?q=tandaisudahdibaca&id=<?= $id ?>&id_pengaduan=<?= $id_pengaduan ?>&id_user=<?= $id_user ?>&notifikasi_id=<?= $row_tanggapan['id'] ?>" class="btn btn-primary-tandai btn-sm mx-2">Tandai</a>
                                                <a href="#" class="btn btn-primary-hapus btn-sm">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                    $no++;
                                }
                            } else {
                                echo "Parameter 'id_pengaduan' dan 'id_user' tidak ditemukan.";
                            }
                            ?>


                        </tbody>
                    </table>
                </div>
                <?php
                // Pastikan Anda menutup tag PHP dengan benar di sini jika ada kode PHP lain yang perlu ditambahkan setelah tabel.
                ?>
            </div>
        </div>
    </div>
</div>