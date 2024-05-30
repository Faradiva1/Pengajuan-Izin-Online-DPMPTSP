<?php
$iduser = $_GET['id'];
$iduser = isset($_GET['id']) ? $_GET['id'] : '';
?>

<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="dashboard-header d-flex align-items-center justify-content-center mb-4">
                <h4 class="text-center">Pengaduan</h4>
            </div>
            <!-- Tambahkan tabel di bawah ini -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Data Pengaduan
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pengadu</th>
                                        <th>Email Pengadu</th>
                                        <th>Subject</th>
                                        <th>Isi Pengaduan</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Aksi</th> <!-- Kolom Aksi -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									include '../conf/koneksi.php';

									// $query = "SELECT form_pengaduan1.*, users.username
									// 			FROM form_pengaduan1
									// 			INNER JOIN users ON form_pengaduan1.id_form_pengaduan = users.id_user";

									$query = "SELECT *
												FROM form_pengaduan1";

									$result = mysqli_query($conn, $query);

									if (mysqli_num_rows($result) > 0) {
										$no = 1;
										while ($row = mysqli_fetch_assoc($result)) {
									?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['nama_pengadu']; ?></td>
                                        <td><?php echo $row['email_pengadu']; ?></td>
                                        <td><?php echo $row['subject']; ?></td>
                                        <td><?php echo $row['isi_pengaduan']; ?></td>
                                        <td><?php echo $row['tanggal_dibuat']; ?></td>
                                        <td>
                                        <td>
                                            <!-- <a href="?q=tanggapipengaduan&id_user=<?php echo $row['id_user']; ?>&id=<?= $id; ?>"
                                                class="btn btn-primary">Tanggapi</a> -->
                                            <a href="?q=prosesdeletepengaduan&id_form_pengaduan=<?php echo $row['id_form_pengaduan']; ?>&id=<?= $id; ?>"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
											$no++;
										}
									} else {
										?>
                                    <tr>
                                        <td colspan='7'>Tidak ada data pengaduan.</td>
                                    </tr>
                                    <?php
									}

									mysqli_close($conn);
									?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Akhir dari tabel -->
        </div>
    </div>
</div>