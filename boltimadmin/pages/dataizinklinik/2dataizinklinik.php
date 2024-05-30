<!-- tabel -->
<?php
$iduser = isset($_GET['id']) ? $_GET['id'] : '';

include '../conf/koneksi.php';

$query = "SELECT u.*, s.status, s.tanggapan
          FROM upload u
          LEFT JOIN status_pengajuan s ON u.id = s.id_user
          ORDER BY u.id";

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
                    <th>Status</th>
                    <th>Tanggapan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                // Loop melalui hasil query dan menampilkan data dalam tabel
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $no . "</th>";

                    // Kolom KTP
                    echo "<td>" . substr($row['ktp'], 0, 20) . "</td>";
                    echo "<td><button onclick='openPDF(\"../" . $row['ktp'] . "\")' class='btn btn-primary'><i class='far fa-eye'></i> View</button></td>";

                    // Kolom Akta Pendirian
                    echo "<td>" . substr($row['akta_pendirian'], 0, 20) . "</td>";
                    echo "<td><button onclick='openPDF(\"../" . $row['akta_pendirian'] . "\")' class='btn btn-primary'><i class='far fa-eye'></i> View</button></td>";

                    // Kolom Surat Lokasi
                    echo "<td>" . substr($row['surat_lokasi'], 0, 20) . "</td>";
                    echo "<td><button onclick='openPDF(\"../" . $row['surat_lokasi'] . "\")' class='btn btn-primary'><i class='far fa-eye'></i> View</button></td>";

                    // Kolom Bukti Hak
                    echo "<td>" . substr($row['bukti_hak'], 0, 20) . "</td>";
                    echo "<td><button onclick='openPDF(\"../" . $row['bukti_hak'] . "\")' class='btn btn-primary'><i class='far fa-eye'></i> View</button></td>";

                    // Kolom Izin Lingkungan
                    echo "<td>" . substr($row['izin_lingkungan'], 0, 20) . "</td>";
                    echo "<td><button onclick='openPDF(\"../" . $row['izin_lingkungan'] . "\")' class='btn btn-primary'><i class='far fa-eye'></i> View</button></td>";

                    // Kolom Profil Klinik
                    echo "<td>" . substr($row['profil_klinik'], 0, 20) . "</td>";
                    echo "<td><button onclick='openPDF(\"../" . $row['profil_klinik'] . "\")' class='btn btn-primary'><i class='far fa-eye'></i> View</button></td>";

                    // Kolom NIB
                    echo "<td>" . substr($row['nib'], 0, 20) . "</td>";
                    echo "<td><button onclick='openPDF(\"../" . $row['nib'] . "\")' class='btn btn-primary'><i class='far fa-eye'></i> View</button></td>";

                    // Kolom Surat Dokter
                    echo "<td>" . substr($row['surat_dokter'], 0, 20) . "</td>";
                    echo "<td><button onclick='openPDF(\"../" . $row['surat_dokter'] . "\")' class='btn btn-primary'><i class='far fa-eye'></i> View</button></td>";

                    // Kolom SIP Dokter
                    echo "<td>" . substr($row['sip_dokter'], 0, 20) . "</td>";
                    echo "<td><button onclick='openPDF(\"../" . $row['sip_dokter'] . "\")' class='btn btn-primary'><i class='far fa-eye'></i> View</button></td>";

                    // Kolom Daftar Tenaga
                    echo "<td>" . substr($row['daftar_tenaga'], 0, 20) . "</td>";
                    echo "<td><button onclick='openPDF(\"../" . $row['daftar_tenaga'] . "\")' class='btn btn-primary'><i class='far fa-eye'></i> View</button></td>";

                    // Kolom Surat Rekomendasi
                    echo "<td>" . substr($row['surat_rekomendasi'], 0, 20) . "</td>";
                    echo "<td><button onclick='openPDF(\"../" . $row['surat_rekomendasi'] . "\")' class='btn btn-primary'><i class='far fa-eye'></i> View</button></td>";


                    // Kolom Status
                    echo "<td>" . $row['status'] . "</td>";

                    // Kolom Tanggapan
                    echo "<td>" . $row['tanggapan'] . "</td>";

                    // Kolom Aksi (untuk mengubah status dan tanggapan)
                    echo "<td>";
                    echo "<a href='?q=acceptizinklinik&id=" . $row['id'] . "' class='btn btn-success'><i class='fas fa-check'></i> Diterima</a> ";
                    echo "<a href='?q=rejectizinklinik&id=" . $row['id'] . "' class='btn btn-danger'><i class='fas fa-times'></i> Ditolak</a>";
                    echo "</td>";

                    echo "</tr>";
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