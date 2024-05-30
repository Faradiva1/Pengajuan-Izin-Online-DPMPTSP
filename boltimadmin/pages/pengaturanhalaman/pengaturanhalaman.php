<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Konfigurasi Halaman Website SIMPATI.</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">SIMPATI Section 1 (Judul Web)</div>
                        </div>
                        <div class="card-body">
                            <div class="card-sub">
                                Tabel ini<code class="highlighter-rouge"> Untuk Konfigurasi</code> tampilan judul web
                                SIMPATI dan Gambar.
                            </div>
                            <a href="?q=add&id=<?= $id; ?>" class="btn btn-primary mb-2">Tambah</a>
                            <table class="table table-bordered table-responsive">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../conf/koneksi.php';

                                    // Query untuk mengambil data dari database
                                    $query = "SELECT * FROM konfigurasi"; // Sesuaikan dengan tabel Anda

                                    $result = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($result) > 0) {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['judul']; ?></td>
                                        <td><?php echo $row['deskripsi']; ?></td>
                                        <td><img src='gambardb/<?php echo $row['gambar']; ?>' alt='Gambar'
                                                style='max-width: 100px;'></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-warning mx-1"
                                                    href='?q=edit&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Edit</a>
                                                <a class="btn btn-danger mx-1"
                                                    href='?q=hapus&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Hapus</a>
                                            </div>
                                        </td>



                                    </tr>
                                    <?php
                                            $no++;
                                        }
                                    } else {
                                        echo "Tidak ada data yang ditemukan.";
                                    }

                                    // Tutup koneksi
                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">SIMPATI Section 2</div>
                        </div>
                        <div class="card-body">
                            <div class="card-sub">
                                Tabel ini<code class="highlighter-rouge"> Untuk Konfigurasi</code> tampilan section 2
                                web SIMPATI.
                            </div>
                            <a id="tombolTambah" href="?q=add2&id=<?= $id; ?>" class="btn btn-primary mb-2">Tambah</a>
                            <?php
                            include '../conf/koneksi.php';

                            // Query untuk mengambil data dari database
                            $query = "SELECT * FROM informasi_simpati"; // Sesuaikan dengan tabel Anda
                            $result = mysqli_query($conn, $query);
                            // Membuka tag HTML untuk tabel
                            ?>
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Menampilkan data dalam bentuk baris HTML
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['judul']; ?></td>
                                        <td><?php echo $row['deskripsi']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-warning mx-1"
                                                    href='?q=edit2&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Edit</a>
                                                <a class="btn btn-danger mx-1"
                                                    href='?q=hapus2&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                            $no++;
                                        }
                                    } else {
                                        echo "Tidak ada data yang ditemukan.";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">SIMPATI Section 2.3</div>
                        </div>
                        <div class="card-body">
                            <div class="card-sub">
                                Tabel ini<code class="highlighter-rouge"> Untuk Konfigurasi</code> tampilan section 2.3
                                card web SIMPATI.
                            </div>
                            <a href="?q=add2_3&id=<?= $id; ?>" class="btn btn-primary mb-2">Tambah</a>
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    include '../conf/koneksi.php';

                                    // Query untuk mengambil data dari database
                                    $query = "SELECT * FROM gambar_satu"; // Sesuaikan dengan tabel Anda

                                    $result = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($result) > 0) {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['judul']; ?></td>
                                        <td><?php echo $row['deskripsi']; ?></td>
                                        <td><img src='gambardb/section2_3/<?php echo $row['gambar_url']; ?>' alt='_url'
                                                style='max-width: 100px;'></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-warning mx-1"
                                                    href='?q=edit2_3&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Edit</a>
                                                <a class="btn btn-danger mx-1"
                                                    href='?q=hapus2_3&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                            $no++;
                                        }
                                    } else {
                                        echo "Tidak ada data yang ditemukan.";
                                    }

                                    // Tutup koneksi
                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">SIMPATI Section 3</div>
                        </div>
                        <div class="card-body">
                            <div class="card-sub">
                                Tabel ini<code class="highlighter-rouge"> Untuk Konfigurasi</code> tampilan section 3
                                web SIMPATI.
                            </div>
                            <a href="?q=add3&id=<?= $id; ?>" class="btn btn-primary mb-2">Tambah</a>

                            <table class="table table-bordered table-responsive ">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Checklist 1</th>
                                        <th scope="col">Checklist 2</th>
                                        <th scope="col">Checklist 3</th>
                                        <th scope="col">Checklist 4</th>
                                        <th scope="col">Checklist 5</th>
                                        <th scope="col">Checklist 6</th>
                                        <th scope="col">Checklist 7</th>
                                        <th scope="col">Checklist 8</th>
                                        <th scope="col">Checklist 9</th>
                                        <th scope="col">Checklist 10</th>
                                        <th scope="col">Checklist 11</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../conf/koneksi.php';

                                    // Query untuk mengambil data dari tabel informasi_section_tiga
                                    $query = "SELECT * FROM informasi_section_tiga"; // Sesuaikan dengan nama tabel yang telah diubah

                                    $result = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($result) > 0) {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $row['judul']; ?></td>
                                        <td><img src='gambardb/section3/<?php echo $row['gambar_url']; ?>' alt='_url'
                                                style='max-width: 100px;'></td>
                                        <td><?= $row['deskripsi']; ?></td>
                                        <td><?= $row['checklist_1']; ?></td>
                                        <td><?= $row['checklist_2']; ?></td>
                                        <td><?= $row['checklist_3']; ?></td>
                                        <td><?= $row['checklist_4']; ?></td>
                                        <td><?= $row['checklist_5']; ?></td>
                                        <td><?= $row['checklist_6']; ?></td>
                                        <td><?= $row['checklist_7']; ?></td>
                                        <td><?= $row['checklist_8']; ?></td>
                                        <td><?= $row['checklist_9']; ?></td>
                                        <td><?= $row['checklist_10']; ?></td>
                                        <td><?= $row['checklist_11']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-warning mx-1"
                                                    href='?q=edit3&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Edit</a>
                                                <a class="btn btn-danger mx-1"
                                                    href='?q=hapus3&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                            $no++;
                                        }
                                    } else {
                                        echo "Tidak ada data yang ditemukan.";
                                    }

                                    // Tutup koneksi
                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">SIMPATI Section 3_2</div>
                        </div>
                        <div class="card-body">
                            <div class="card-sub">
                                Tabel ini<code class="highlighter-rouge"> Untuk Konfigurasi</code> tampilan judul awal
                                web SIMPATI.
                            </div>
                            <a href="?q=add3_2&id=<?= $id; ?>" class="btn btn-primary mb-2">Tambah</a>

                            <table class="table table-bordered table-responsive">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Checklist 1</th>
                                        <th scope="col">Checklist 2</th>
                                        <th scope="col">Checklist 3</th>
                                        <th scope="col">Checklist 4</th>
                                        <th scope="col">Checklist 5</th>
                                        <th scope="col">Checklist 6</th>
                                        <th scope="col">Checklist 7</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../conf/koneksi.php';

                                    // Query untuk mengambil data dari tabel informasi_section_tiga
                                    $query = "SELECT * FROM informasi_section_tiga_dua"; // Sesuaikan dengan nama tabel yang telah diubah

                                    $result = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($result) > 0) {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $row['judul']; ?></td>
                                        <td><img src='gambardb/section3/<?php echo $row['gambar_url']; ?>' alt='_url'
                                                style='max-width: 100px;'></td>
                                        <td><?= $row['deskripsi']; ?></td>
                                        <td><?= $row['checklist_1']; ?></td>
                                        <td><?= $row['checklist_2']; ?></td>
                                        <td><?= $row['checklist_3']; ?></td>
                                        <td><?= $row['checklist_4']; ?></td>
                                        <td><?= $row['checklist_5']; ?></td>
                                        <td><?= $row['checklist_6']; ?></td>
                                        <td><?= $row['checklist_7']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-warning mx-1"
                                                    href='?q=edit3_2&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Edit</a>
                                                <a class="btn btn-danger mx-1"
                                                    href='?q=hapus3_2&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                            $no++;
                                        }
                                    } else {
                                        echo "Tidak ada data yang ditemukan.";
                                    }

                                    // Tutup koneksi
                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">SIMPATI Footer</div>
                        </div>
                        <div class="card-body">
                            <div class="card-sub">
                                Tabel ini <code class="highlighter-rouge">Untuk Konfigurasi</code> tampilan Footer web
                                SIMPATI.
                            </div>
                            <a href="?q=addfooter&id=<?= $id; ?>" class="btn btn-primary mb-2">Tambah</a>
                            <table class="table table-bordered table-responsive">
                                <thead class="text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Judul</th>
                                        <th>Alamat</th>
                                        <th>Nomor Telepon</th>
                                        <th>Email</th>
                                        <th>Twitter</th>
                                        <th>Facebook</th>
                                        <th>Instagram</th>
                                        <th>YouTube</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    include '../conf/koneksi.php';

                                    // Query untuk mengambil data dari database
                                    $query = "SELECT * FROM footer_data"; // Sesuaikan dengan tabel Anda

                                    $result = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($result) > 0) {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['twitter_link']; ?></td>
                                        <td><?php echo $row['facebook_link']; ?></td>
                                        <td><?php echo $row['instagram_link']; ?></td>
                                        <td><?php echo $row['youtube_link']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-warning mx-1"
                                                    href='?q=editfooter&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Edit</a>
                                                <a class="btn btn-danger mx-1"
                                                    href='?q=hapusfooter&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                            $no++;
                                        }
                                    } else {
                                        echo "Tidak ada data yang ditemukan.";
                                    }

                                    // Tutup koneksi
                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">SIMPATI Halaman Izin Online Klinik</div>
                        </div>
                        <div class="card-body">
                            <div class="card-sub">
                                Tabel ini<code class="highlighter-rouge"> Untuk Konfigurasi</code> tampilan halaman izin
                                online klinik web SIMPATI.
                            </div>
                            <a href="?q=addhalamanizin&id=<?= $id; ?>" class="btn btn-primary mb-2">Tambah</a>
                            <table class="table table-bordered table-responsive">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Judul Dua</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Tanggal dibuat</th>
                                        <th scope="col">Tanggal diperbarui</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    include '../conf/koneksi.php';

                                    // Query untuk mengambil data dari tabel informasi_section_tiga
                                    $query = "SELECT * FROM izin_klinik"; // Sesuaikan dengan nama tabel yang telah diubah

                                    $result = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($result) > 0) {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $row['judul']; ?></td>
                                        <td><?= $row['judul_dua']; ?></td>
                                        <td><?= $row['deskripsi']; ?></td>
                                        <td><img src='gambardb/halamanizinonline/<?php echo $row['gambar']; ?>'
                                                alt='_url' style='max-width: 100px;'></td>
                                        <td><?= $row['tanggal_dibuat']; ?></td>
                                        <td><?= $row['tanggal_diperbarui']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-warning mx-1"
                                                    href='?q=edithalamanizin&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Edit</a>
                                                <a class="btn btn-danger mx-1"
                                                    href='?q=hapushalamanizin&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                            $no++;
                                        }
                                    } else {
                                        echo "Tidak ada data yang ditemukan.";
                                    }

                                    // Tutup koneksi
                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">SIMPATI Halaman Izin Online SIPB</div>
                        </div>
                        <div class="card-body">
                            <div class="card-sub">
                                Tabel ini<code class="highlighter-rouge"> Untuk Konfigurasi</code> tampilan halaman izin
                                online SIPB web SIMPATI.
                            </div>
                            <a href="?q=addhalamanizinsipb&id=<?= $id; ?>" class="btn btn-primary mb-2">Tambah</a>
                            <table class="table table-bordered table-responsive">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Judul Dua</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Tanggal dibuat</th>
                                        <th scope="col">Tanggal diperbarui</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../conf/koneksi.php';

                                    // Query untuk mengambil data dari tabel informasi_section_tiga
                                    $query = "SELECT * FROM izin_sipb"; // Sesuaikan dengan nama tabel yang telah diubah

                                    $result = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($result) > 0) {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $row['judul']; ?></td>
                                        <td><?= $row['judul_dua']; ?></td>
                                        <td><?= $row['deskripsi']; ?></td>
                                        <td><img src='gambardb/halamanizinonline/<?php echo $row['gambar']; ?>'
                                                alt='_url' style='max-width: 100px;'></td>
                                        <td><?= $row['tanggal_dibuat']; ?></td>
                                        <td><?= $row['tanggal_diperbarui']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-warning mx-1"
                                                    href='?q=edithalamanizinsipb&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Edit</a>
                                                <a class="btn btn-danger mx-1"
                                                    href='?q=hapushalamanizinsipb&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                            $no++;
                                        }
                                    } else {
                                        echo "Tidak ada data yang ditemukan.";
                                    }

                                    // Tutup koneksi
                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">SIMPATI Judul Halaman Pengaduan</div>
                        </div>
                        <div class="card-body">
                            <div class="card-sub">
                                Tabel ini<code class="highlighter-rouge"> Untuk Konfigurasi</code> tampilan judul
                                halaman pengaduan web SIMPATI.
                            </div>
                            <a href="?q=addhalamanpengaduan&id=<?= $id; ?>" class="btn btn-primary mb-2">Tambah</a>
                            <?php
                            include '../conf/koneksi.php';

                            // Query untuk mengambil data dari database
                            $query = "SELECT * FROM halaman_pengaduan"; // Sesuaikan dengan tabel Anda
                            $result = mysqli_query($conn, $query);
                            // Membuka tag HTML untuk tabel
                            ?>
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Menampilkan data dalam bentuk baris HTML
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['judul']; ?></td>
                                        <td><?php echo $row['deskripsi']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-warning mx-1"
                                                    href='?q=edithalamanpengaduan&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Edit</a>
                                                <a class="btn btn-danger mx-1"
                                                    href='?q=hapushalamanpengaduan&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                            $no++;
                                        }
                                    } else {
                                        echo "Tidak ada data yang ditemukan.";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">SIMPATI Judul Halaman Pengaduan (Alamat)</div>
                        </div>
                        <div class="card-body">
                            <div class="card-sub">
                                Tabel ini<code class="highlighter-rouge"> Untuk Konfigurasi</code> tampilan judul
                                halaman pengaduan (Alamat) web SIMPATI.
                            </div>
                            <a href="?q=addhalamanpengaduanalamat&id=<?= $id; ?>"
                                class="btn btn-primary mb-2">Tambah</a>
                            <?php
                            include '../conf/koneksi.php';

                            // Query untuk mengambil data dari database
                            $query = "SELECT * FROM pengaduan_alamat"; // Sesuaikan dengan tabel Anda
                            $result = mysqli_query($conn, $query);
                            // Membuka tag HTML untuk tabel
                            ?>
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul Alamat</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Menampilkan data dalam bentuk baris HTML
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['judul_alamat']; ?></td>
                                        <td><?php echo $row['alamat']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-warning mx-1"
                                                    href='?q=edithalamanpengaduanalamat&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Edit</a>
                                                <a class="btn btn-danger mx-1"
                                                    href='?q=hapushalamanpengaduanalamat&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                            $no++;
                                        }
                                    } else {
                                        echo "Tidak ada data yang ditemukan.";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">SIMPATI Judul Halaman Pengaduan (Email dan Kontak)</div>
                        </div>
                        <div class="card-body">
                            <div class="card-sub">
                                Tabel ini<code class="highlighter-rouge"> Untuk Konfigurasi</code> tampilan judul
                                halaman pengaduan (Email dan Kontak) web SIMPATI.
                            </div>
                            <a href="?q=addhalamanpengaduanemail&id=<?= $id; ?>" class="btn btn-primary mb-2">Tambah</a>
                            <?php
                            include '../conf/koneksi.php';

                            // Query untuk mengambil data dari database
                            $query = "SELECT * FROM pengaduan_email"; // Sesuaikan dengan tabel Anda
                            $result = mysqli_query($conn, $query);
                            // Membuka tag HTML untuk tabel
                            ?>
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul Email</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Kontak</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Menampilkan data dalam bentuk baris HTML
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['judul_email']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['kontak']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-warning mx-1"
                                                    href='?q=edithalamanpengaduanemail&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Edit</a>
                                                <a class="btn btn-danger mx-1"
                                                    href='?q=hapushalamanpengaduanemail&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                            $no++;
                                        }
                                    } else {
                                        echo "Tidak ada data yang ditemukan.";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">SIMPATI Judul Halaman Pengaduan (Kontak)</div>
                        </div>
                        <div class="card-body">
                            <div class="card-sub">
                                Tabel ini<code class="highlighter-rouge"> Untuk Konfigurasi</code> tampilan judul
                                halaman pengaduan (Kontak) web SIMPATI.
                            </div>
                            <a href="?q=addhalamanpengaduankontak&id=<?= $id; ?>"
                                class="btn btn-primary mb-2">Tambah</a>
                            <?php
                            include '../conf/koneksi.php';

                            // Query untuk mengambil data dari database
                            $query = "SELECT * FROM pengaduan_contact"; // Sesuaikan dengan tabel Anda
                            $result = mysqli_query($conn, $query);
                            // Membuka tag HTML untuk tabel
                            ?>
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul Kontak</th>
                                        <th scope="col">Kontak 1</th>
                                        <th scope="col">Kontak 2</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Menampilkan data dalam bentuk baris HTML
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['judul_kontak']; ?></td>
                                        <td><?php echo $row['no_kontak']; ?></td>
                                        <td><?php echo $row['no_kontak_dua']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-warning mx-1"
                                                    href='?q=edithalamanpengaduankontak&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Edit</a>
                                                <a class="btn btn-danger mx-1"
                                                    href='?q=hapushalamanpengaduankontak&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                            $no++;
                                        }
                                    } else {
                                        echo "Tidak ada data yang ditemukan.";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">SIMPATI LOGO</div>
                        </div>
                        <div class="card-body">
                            <div class="card-sub">
                                Tabel ini<code class="highlighter-rouge"> Untuk Konfigurasi</code> tampilan LOGO
                                web SIMPATI.
                            </div>
                            <a href="?q=addlogo&id=<?= $id; ?>" class="btn btn-primary mb-2">Tambah</a>
                            <?php
                            include '../conf/koneksi.php';

                            // Query untuk mengambil data dari database
                            $query = "SELECT * FROM gambar_logos"; // Sesuaikan dengan tabel Anda
                            $result = mysqli_query($conn, $query);
                            // Membuka tag HTML untuk tabel
                            ?>
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">LOGO</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Menampilkan data dalam bentuk baris HTML
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><img src='gambardb/logo/<?php echo $row['gambar_url']; ?>' alt='_url'
                                                style='max-width: 100px;'></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-warning mx-1"
                                                    href='?q=editlogo&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Edit</a>
                                                <a class="btn btn-danger mx-1"
                                                    href='?q=hapuslogo&iduser=<?php echo $row['id']; ?>&id=<?php echo $id; ?>'>Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                            $no++;
                                        }
                                    } else {
                                        echo "Tidak ada data yang ditemukan.";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>