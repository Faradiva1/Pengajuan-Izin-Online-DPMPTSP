<?php
$iduser = $_GET['id'];
$iduser = isset($_GET['id']) ? $_GET['id'] : '';

?>


<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="dashboard-header d-flex align-items-center justify-content-center">
                <!-- Tambahkan class baru -->
                <h4 class="text-center">Data Izin Klinik</h4>
                <!-- Tambahkan class text-center untuk menengahkan teks -->
            </div>

            <?php
            include '../conf/koneksi.php';


            $query = "SELECT up.*,
            us.id_user,
            us.username,
            pj.*
            FROM upload up
            INNER JOIN users us ON up.id_user = us.id_user
            INNER JOIN pengajuan pj ON pj.id_pengajuan = up.id_pengajuan
            ORDER BY up.id_upload ASC";

            // $query = "SELECT up.*,
            //         us.id_user,
            //         us.username,
            //         pj.*
            //  FROM upload up
            //  INNER JOIN users us ON up.id_user = us.id_user
            //  INNER JOIN pengajuan pj ON pj.id_user = us.id_user
            //  WHERE respon = 1
            //    AND status IS NOT NULL
            //  ORDER BY up.id_user ASC;
            //  ";

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
                                <th>No</th>
                                <th>Tanggal Upload</th>
                                <th>Nama</th>
                                <th>Alamat Perusahaan</th>
                                <th>Email</th>
                                <th>Nama Klinik</th>
                                <th>Nama Pemilik</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Bentuk Usaha</th>
                                <th>Jenis Klinik</th>
                                <th>Nama Penanggung Jawab</th>
                                <th>Nomor Penanggung Jawab</th>
                                <th>Alamat Penganggung Jawab</th>
                                <th>Jenis Permohonan</th>

                                <th>KTP</th>
                                <th>View KTP</th>
                                <th>Akta Pendirian</th>
                                <th>View Akta Pendirian</th>
                                <th>Surat Lokasi</th>
                                <th>View Surat Lokasi</th>
                                <th>Bukti Hak</th>
                                <th>View Bukti Hak</th>
                                <th>Izin Lingkungan</th>
                                <th>View Izin Lingkungan</th>
                                <th>Profil Klinik</th>
                                <th>View Profil Klinik</th>
                                <th>NIB</th>
                                <th>View NIB</th>
                                <th>Surat Dokter</th>
                                <th>View Surat Dokter</th>
                                <th>SIP Dokter</th>
                                <th>View SIP Dokter</th>
                                <th>Daftar Tenaga</th>
                                <th>View Daftar Tenaga</th>
                                <th>Surat Rekomendasi</th>
                                <th>View Surat Rekomendasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            // Loop melalui hasil query dan menampilkan data dalam tabel
                            while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <th scope='row'><?php echo $no; ?></th>
                                <td><?php echo substr($row['waktu_upload'], 0, 20); ?>
                                    <?php echo $row['id_upload']; ?></td>
                                <td><?php echo substr($row['username'], 0, 20); ?></td>
                                <td><?php echo substr($row['alamatpr'], 0, 20); ?></td>
                                <td><?php echo substr($row['email'], 0, 20); ?></td>
                                <td><?php echo substr($row['nama_klinik'], 0, 20); ?></td>
                                <td><?php echo substr($row['nama_pemilik'], 0, 20); ?></td>
                                <td><?php echo substr($row['kecamatan'], 0, 20); ?></td>
                                <td><?php echo substr($row['kelurahan'], 0, 20); ?></td>
                                <td><?php echo substr($row['bentuk_usaha'], 0, 20); ?></td>
                                <td><?php echo substr($row['jenis_klinik'], 0, 20); ?></td>
                                <td><?php echo substr($row['nama_penanggung_jawab'], 0, 20); ?></td>
                                <td><?php echo substr($row['nomorktppj'], 0, 20); ?></td>
                                <td><?php echo substr($row['alamatpj'], 0, 20); ?></td>
                                <td><?php echo substr($row['jenis_permohonan'], 0, 20); ?></td>

                                <td><?php echo substr($row['ktp'], 0, 20); ?></td>
                                <td>
                                    <button onclick='openPDF("../<?php echo $row['ktp']; ?>")' class='btn btn-primary'>
                                        <i class='far fa-eye'></i> View
                                    </button>
                                </td>
                                <td><?php echo substr($row['akta_pendirian'], 0, 20); ?></td>
                                <td>
                                    <button onclick='openPDF("../<?php echo $row['akta_pendirian']; ?>")'
                                        class='btn btn-primary'>
                                        <i class='far fa-eye'></i> View
                                    </button>
                                </td>
                                <td><?php echo substr($row['surat_lokasi'], 0, 20); ?></td>
                                <td>
                                    <button onclick='openPDF("../<?php echo $row['surat_lokasi']; ?>")'
                                        class='btn btn-primary'>
                                        <i class='far fa-eye'></i> View
                                    </button>
                                </td>
                                <td><?php echo substr($row['bukti_hak'], 0, 20); ?></td>
                                <td>
                                    <button onclick='openPDF("../<?php echo $row['bukti_hak']; ?>")'
                                        class='btn btn-primary'>
                                        <i class='far fa-eye'></i> View
                                    </button>
                                </td>
                                <td><?php echo substr($row['izin_lingkungan'], 0, 20); ?></td>
                                <td>
                                    <button onclick='openPDF("../<?php echo $row['izin_lingkungan']; ?>")'
                                        class='btn btn-primary'>
                                        <i class='far fa-eye'></i> View
                                    </button>
                                </td>
                                <td><?php echo substr($row['profil_klinik'], 0, 20); ?></td>
                                <td>
                                    <button onclick='openPDF("../<?php echo $row['profil_klinik']; ?>")'
                                        class='btn btn-primary'>
                                        <i class='far fa-eye'></i> View
                                    </button>
                                </td>
                                <td><?php echo substr($row['nib'], 0, 20); ?></td>
                                <td>
                                    <button onclick='openPDF("../<?php echo $row['nib']; ?>")' class='btn btn-primary'>
                                        <i class='far fa-eye'></i> View
                                    </button>
                                </td>
                                <td><?php echo substr($row['surat_dokter'], 0, 20); ?></td>
                                <td>
                                    <button onclick='openPDF("../<?php echo $row['surat_dokter']; ?>")'
                                        class='btn btn-primary'>
                                        <i class='far fa-eye'></i> View
                                    </button>
                                </td>
                                <td><?php echo substr($row['sip_dokter'], 0, 20); ?></td>
                                <td>
                                    <button onclick='openPDF("../<?php echo $row['sip_dokter']; ?>")'
                                        class='btn btn-primary'>
                                        <i class='far fa-eye'></i> View
                                    </button>
                                </td>
                                <td><?php echo substr($row['daftar_tenaga'], 0, 20); ?></td>
                                <td>
                                    <button onclick='openPDF("../<?php echo $row['daftar_tenaga']; ?>")'
                                        class='btn btn-primary'>
                                        <i class='far fa-eye'></i> View
                                    </button>
                                </td>
                                <td><?php echo substr($row['surat_rekomendasi'], 0, 20); ?></td>
                                <td>
                                    <button onclick='openPDF("../<?php echo $row['surat_rekomendasi']; ?>")'
                                        class='btn btn-primary'>
                                        <i class='far fa-eye'></i> View
                                    </button>
                                </td>

                                <td>
                                    <?php
                                        // Tambahkan kondisi untuk menampilkan tombol berdasarkan status
                                        if ($row['status'] == 'Setuju') {
                                        ?>
                                    <button class='btn btn-success' disabled>Telah Disetujui</button>
                                    <a href='?q=hapusizinklinik&id=<?php echo $row["id_user"]; ?>&idfile=<?php echo $row['id_upload']; ?>&idpengajuan=<?php echo $row['id_pengajuan']; ?>&id_admin=<?php echo $iduser; ?>'
                                        class='btn btn-warning'>Hapus</a>
                                    <?php
                                        } elseif ($row['status'] == 'Ditolak') {
                                        ?>
                                    <button class='btn btn-danger' disabled>Ditolak</button>
                                    <a href='?q=hapusizinklinik&id=<?php echo $row["id_user"]; ?>&idfile=<?php echo $row['id_upload']; ?>&idpengajuan=<?php echo $row['id_pengajuan']; ?>&id_admin=<?php echo $iduser; ?>'
                                        class='btn btn-warning'>Hapus</a>
                                    <?php
                                        } else {
                                        ?>
                                    <div class="btn-group" role="group">
                                        <a href='?q=acceptizinklinik&id=<?php echo $row["id_user"]; ?>&idfile=<?php echo $row['id_upload']; ?>&namapemilik=<?php echo $row['nama_pemilik']; ?>&id_admin=<?php echo $iduser; ?>'
                                            class='btn btn-primary'>Setuju</a>
                                        <a href='?q=rejectizinklinik&id=<?php echo $row["id_user"]; ?>&idfile=<?php echo $row['id_upload']; ?>&id_admin=<?php echo $iduser; ?>'
                                            class='btn btn-danger'>Tolak</a>
                                        <!-- <a href='?q=hapusizinklinik&id=<?php echo $row["id_user"]; ?>&idfile=<?php echo $row['id_upload']; ?>&id_admin=<?php echo $iduser; ?>'
                                            class='btn btn-warning'>Hapus</a> -->
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