<?php
$id = $_GET['iduser']; // Ambil ID dari parameter URL
?>
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">

        <?php
    // Include file koneksi database
    include './conf/koneksi.php';

    // Query untuk mengambil data dari database
    $query = "SELECT * FROM halaman_pengaduan"; // Sesuaikan dengan tabel Anda

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    ?>

        <div class="section-title">
            <h2><?php echo $row['judul']; ?></h2>
            <p>
                <?php echo $row['deskripsi']; ?>
            </p>
        </div>
        <?php
    }
    ?>

        <div class="row">

            <div class="col-lg-6">

                <div class="row">
                    <?php
          // Include file koneksi database
          include './conf/koneksi.php';

          // Query untuk mengambil data dari database
          $query = "SELECT * FROM pengaduan_alamat"; // Sesuaikan dengan tabel Anda

          $result = mysqli_query($conn, $query);

          if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
          ?>
                    <div class="col-md-12">
                        <div class="info-box" data-aos="fade-up">
                            <i class="bx bx-map"></i>
                            <h3><?php echo $row['judul_alamat']; ?></h3>
                            <p><?php echo $row['alamat']; ?></p>
                        </div>
                    </div>
                    <?php
          }
          ?>

                    <?php
          // Include file koneksi database
          include './conf/koneksi.php';

          // Query untuk mengambil data dari database
          $query = "SELECT * FROM pengaduan_email"; // Sesuaikan dengan tabel Anda

          $result = mysqli_query($conn, $query);

          if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
          ?>
                    <div class="col-md-6">
                        <div class="info-box mt-4" data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-envelope"></i>
                            <h3><?php echo $row['judul_email']; ?></h3>
                            <p><?php echo $row['email']; ?><br><?php echo $row['kontak']; ?></p>
                        </div>
                    </div>
                    <?php
          }
          ?>

                    <?php
          // Include file koneksi database
          include './conf/koneksi.php';

          // Query untuk mengambil data dari database
          $query = "SELECT * FROM pengaduan_contact"; // Sesuaikan dengan tabel Anda

          $result = mysqli_query($conn, $query);

          if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
          ?>

                    <div class="col-md-6">
                        <div class="info-box mt-4" data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-phone-call"></i>
                            <h3><?php echo $row['judul_kontak']; ?></h3>
                            <p><?php echo $row['no_kontak']; ?><br><?php echo $row['no_kontak_dua']; ?></p>
                        </div>
                    </div>
                    <?php
        }
        ?>
                </div>
            </div>

            <div class="col-lg-6 mt-4 mt-lg-0">
                <form action="?q=prosespengaduanuser&iduser=<?= $_GET["iduser"]; ?>" method="post" data-aos="fade-up">
                    <input type="hidden" id="custId" name="custId" value="<?= $_GET["iduser"]; ?>">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="nama_pengadu" class="form-control" id="name"
                                placeholder="Nama" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" name="email_pengadu" class="form-control" id="email"
                                placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                            required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea name="isi_pengaduan" class="form-control" rows="5" placeholder="Tuliskan Pengaduan"
                            required></textarea>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-warning" style="color: white;">Kirim Pengaduan</button>
                    </div>
                </form>
            </div>

            </form>
        </div>

    </div>

    </div>
</section><!-- End Contact Section -->