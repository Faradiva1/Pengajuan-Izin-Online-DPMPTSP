<!-- ======= Izin ======= -->
<section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="info-box" data-aos="fade-up" >
                    <h2 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif ;">Daftar
                        Perizinan</h2>
                </div>
            </div>
        </div>


        <div class="row">
            <?php
            include './conf/koneksi.php';

            // Query untuk mengambil data dari tabel izin_klinik
            $query = "SELECT * FROM izin_klinik"; // Sesuaikan dengan tabel Anda
            $result = mysqli_query($conn, $query);

            // Loop melalui hasil query untuk menampilkan data
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-6">
                <div class="info-box" data-aos="fade-up">
                    <h2 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                        <?php echo $row['judul']; ?></h2>
                </div>
                <div class="info-box" data-aos="fade-up">
                    <div class="container">
                        <div class="d-flex flex-row justify-content-center">

                            <!-- Kartu - Izin Klinik (KLinik) -->
                            <div class="card border-0 bg-transparent">
                                <img src="boltimadmin/gambardb/halamanizinonline/<?php echo $row['gambar']; ?>"
                                    class="card-img-top mx-auto rounded-circle" style="width: 100px; height: 100px;">
                                <div class="card-body">
                                    <div class="judul">
                                        <!-- Judul -->
                                        <h5 class="card-title"><?php echo $row['judul_dua']; ?></h5>
                                        <p class="mb-3"><?php echo $row['deskripsi']; ?></p>
                                    </div>
                                    <div class="tombol">
                                        <!-- Tombol -->
                                        <a href="?q=klinik1&iduser=<?= $_GET["iduser"]; ?>">Buat Izin Klinik</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }

                            ?>
                        </div>
                    </div>
                </div>
            </div>


            <?php
                include './conf/koneksi.php';

                // Query untuk mengambil data dari tabel izin_klinik
                $query = "SELECT * FROM izin_sipb"; // Sesuaikan dengan tabel Anda
                $result = mysqli_query($conn, $query);

                // Loop melalui hasil query untuk menampilkan data
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
            <div class="col-md-6">
                <div class="info-box" data-aos="fade-up">
                    <h2 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                        <?php echo $row['judul']; ?></h2>
                </div>
                <div class="info-box" data-aos="fade-up">
                    <div class="container">
                        <div class="d-flex flex-row justify-content-center">
                            <!-- Kartu 1 - Izin SIPB -->
                            <div class="card border-0 bg-transparent">
                                <img src="boltimadmin/gambardb/halamanizinonline/<?php echo $row['gambar']; ?>"
                                    class="card-img-top mx-auto  rounded-circle" style="width: 100px; height: 100px;">
                                <div class="card-body">
                                    <div class="judul">
                                        <!-- Judul -->
                                        <h5 class="card-title"><?php echo $row['judul_dua']; ?></h5>
                                        <p class="mb-3"><?php echo $row['deskripsi']; ?></p>
                                    </div>
                                    <div class="tombol" style="margin-top: 64px;">
                                        <!-- Tombol -->
                                        <a href="?q=SIPB&iduser=<?= $_GET["iduser"]; ?>">Buat Izin SIPB</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }

                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Contact Section -->