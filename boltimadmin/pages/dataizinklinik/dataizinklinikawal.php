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

                $query = "SELECT * FROM upload ORDER BY id";

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

                                        <!-- Kolom KTP -->
                                        <td><?php echo substr($row['ktp'], 0, 20); ?></td>
                                        <td>
                                            <button onclick='openPDF("../<?php echo $row['ktp']; ?>")' class='btn btn-primary'><i class='far fa-eye'></i> View</button>
                                        </td>

                                        <!-- Kolom Akta Pendirian -->
                                        <td><?php echo substr($row['akta_pendirian'], 0, 20); ?></td>
                                        <td>
                                            <button onclick='openPDF("../<?php echo $row['akta_pendirian']; ?>")' class='btn btn-primary'><i class='far fa-eye'></i> View</button>
                                        </td>

                                        <!-- Kolom Surat Lokasi -->
                                        <td><?php echo substr($row['surat_lokasi'], 0, 20); ?></td>
                                        <td>
                                            <button onclick='openPDF("../<?php echo $row['surat_lokasi']; ?>")' class='btn btn-primary'><i class='far fa-eye'></i> View</button>
                                        </td>

                                        <!-- Kolom Bukti Hak -->
                                        <td><?php echo substr($row['bukti_hak'], 0, 20); ?></td>
                                        <td>
                                            <button onclick='openPDF("../<?php echo $row['bukti_hak']; ?>")' class='btn btn-primary'><i class='far fa-eye'></i> View</button>
                                        </td>

                                        <!-- Kolom Izin Lingkungan -->
                                        <td><?php echo substr($row['izin_lingkungan'], 0, 20); ?></td>
                                        <td>
                                            <button onclick='openPDF("../<?php echo $row['izin_lingkungan']; ?>")' class='btn btn-primary'><i class='far fa-eye'></i> View</button>
                                        </td>

                                        <!-- Kolom Profil Klinik -->
                                        <td><?php echo substr($row['profil_klinik'], 0, 20); ?></td>
                                        <td>
                                            <button onclick='openPDF("../<?php echo $row['profil_klinik']; ?>")' class='btn btn-primary'><i class='far fa-eye'></i> View</button>
                                        </td>

                                        <!-- Kolom NIB -->
                                        <td><?php echo substr($row['nib'], 0, 20); ?></td>
                                        <td>
                                            <button onclick='openPDF("../<?php echo $row['nib']; ?>")' class='btn btn-primary'><i class='far fa-eye'></i> View</button>
                                        </td>

                                        <!-- Kolom Surat Dokter -->
                                        <td><?php echo substr($row['surat_dokter'], 0, 20); ?></td>
                                        <td>
                                            <button onclick='openPDF("../<?php echo $row['surat_dokter']; ?>")' class='btn btn-primary'><i class='far fa-eye'></i> View</button>
                                        </td>

                                        <!-- Kolom SIP Dokter -->
                                        <td><?php echo substr($row['sip_dokter'], 0, 20); ?></td>
                                        <td>
                                            <button onclick='openPDF("../<?php echo $row['sip_dokter']; ?>")' class='btn btn-primary'><i class='far fa-eye'></i> View</button>
                                        </td>

                                        <!-- Kolom Daftar Tenaga -->
                                        <td><?php echo substr($row['daftar_tenaga'], 0, 20); ?></td>
                                        <td>
                                            <button onclick='openPDF("../<?php echo $row['daftar_tenaga']; ?>")' class='btn btn-primary'><i class='far fa-eye'></i> View</button>
                                        </td>

                                        <!-- Kolom Surat Rekomendasi -->
                                        <td><?php echo substr($row['surat_rekomendasi'], 0, 20); ?></td>
                                        <td>
                                            <button onclick='openPDF("../<?php echo $row['surat_rekomendasi']; ?>")' class='btn btn-primary'><i class='far fa-eye'></i> View</button>
                                        </td>

                                        <!-- Kolom Delete -->
                                        <td>
                                            <a href='?q=deleteklinik&id=<?php echo $row['id']; ?>&iduser=<?php echo $id; ?>' class='btn btn-danger'><i class='fas fa-trash'></i> Delete</a>
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