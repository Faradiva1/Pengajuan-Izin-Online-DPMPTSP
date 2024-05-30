<!-- ======= Hero Section ======= -->
<section id="hero">

  <div class="container">
    <div class="row d-flex align-items-center">
      <?php
      // Include file koneksi database
      include './conf/koneksi.php';

      // Query untuk mengambil data dari database
      $query = "SELECT * FROM konfigurasi"; // Sesuaikan dengan tabel Anda

      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
      ?>
        <div class="col-lg-6 py-5 py-lg-0 order-2 order-lg-1" data-aos="fade-right">
          <h1><?php echo $row['judul']; ?></h1>
          <h2><?php echo $row['deskripsi']; ?></h2>
          <a href="" class="btn-get-started scrollto">Ajukan Permohonan</a>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
          <img src="boltimadmin/gambardb/<?php echo $row['gambar']; ?>" class="img-fluid" alt="">
        </div>
      <?php
      } else {
        echo "Tidak ada data yang ditemukan.";
      }

      // Tutup koneksi
      mysqli_close($conn);
      ?>
    </div>
  </div>




</section><!-- End Hero -->

<main id="main">

<!-- ======= Clients Section ======= -->
<section id="clients" class="clients section-bg">
    <div class="container">
      <div class="row no-gutters clients-wrap clearfix wow fadeInUp">
        <?php
        // Include file koneksi database
        include './conf/koneksi.php';

        // Query untuk mengambil data dari database
        $query = "SELECT * FROM gambar_logos WHERE id = 10"; // Sesuaikan dengan tabel Anda

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
        ?>
          <div class="col-lg-2 col-md-4 col-6">
            <div class="client-logo">
              <img src="boltimadmin/gambardb/logo/<?php echo $row['gambar_url']; ?>">
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        // Include file koneksi database
        include './conf/koneksi.php';

        // Query untuk mengambil data dari database
        $query = "SELECT * FROM gambar_logos WHERE id = 13"; // Sesuaikan dengan tabel Anda

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
        ?>
          <div class="col-lg-2 col-md-4 col-6">
            <div class="client-logo">
              <img src="boltimadmin/gambardb/logo/<?php echo $row['gambar_url']; ?>">
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        // Include file koneksi database
        include './conf/koneksi.php';

        // Query untuk mengambil data dari database
        $query = "SELECT * FROM gambar_logos WHERE id = 12"; // Sesuaikan dengan tabel Anda

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
        ?>
          <div class="col-lg-2 col-md-4 col-6">
            <div class="client-logo">
              <img src="boltimadmin/gambardb/logo/<?php echo $row['gambar_url']; ?>">
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        // Include file koneksi database
        include './conf/koneksi.php';

        // Query untuk mengambil data dari database
        $query = "SELECT * FROM gambar_logos WHERE id = 11"; // Sesuaikan dengan tabel Anda

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
        ?>
          <div class="col-lg-2 col-md-4 col-6">
            <div class="client-logo">
              <img src="boltimadmin/gambardb/logo/<?php echo $row['gambar_url']; ?>">
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        // Include file koneksi database
        include './conf/koneksi.php';

        // Query untuk mengambil data dari database
        $query = "SELECT * FROM gambar_logos WHERE id = 14"; // Sesuaikan dengan tabel Anda

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
        ?>
          <div class="col-lg-2 col-md-4 col-6">
            <div class="client-logo">
              <img src="boltimadmin/gambardb/logo/<?php echo $row['gambar_url']; ?>">
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        // Include file koneksi database
        include './conf/koneksi.php';

        // Query untuk mengambil data dari database
        $query = "SELECT * FROM gambar_logos WHERE id = 15"; // Sesuaikan dengan tabel Anda

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
        ?>
          <div class="col-lg-2 col-md-4 col-6">
            <div class="client-logo">
              <img src="boltimadmin/gambardb/logo/<?php echo $row['gambar_url']; ?>">
            </div>
          </div>
        <?php
        }
        ?>



      </div>

    </div>
  </section>

  <!-- ======= Services Section ======= -->
  <section id="services" class="services section-bg">
    <div class="container">
      <div class="row">

        <?php
        include './conf/koneksi.php';

        // Query untuk mengambil data dari database
        $query = "SELECT * FROM informasi_simpati"; // Sesuaikan dengan tabel Anda

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
        ?>
          <div class="section-title" data-aos="fade-in">
            <h2><?= $row['judul']; ?></h2>
            <p><?= $row['deskripsi']; ?></p>
          </div>
        <?php
        } else {
          echo "Tidak ada data yang ditemukan.";
        }

        // Tutup koneksi
        mysqli_close($conn);
        ?>

        <!-- GAMBAR 1 -->
        <?php
        include './conf/koneksi.php';

        // Query untuk mengambil data dari tabel gambar_satu
        $query = "SELECT * FROM gambar_satu WHERE id = 2"; // Sesuaikan dengan nama tabel yang telah diubah

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
        ?>
          <!-- GAMBAR 1 -->
          <div class="col-md-6 d-flex" data-aos="fade-right">
            <div class="card">
              <div class="card-img">
                <img src="boltimadmin/gambardb/section2_3/<?php echo $row['gambar_url']; ?>" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href=""><?php echo $row['judul']; ?></a></h5>
                <p class="card-text"><?php echo $row['deskripsi']; ?></p>
                <!-- <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div> -->
              </div>
            </div>
          </div>
        <?php
        }
        ?>


        <!-- GAMBAR 2 -->
        <?php
        // Query untuk mengambil data dari tabel gambar_satu
        $query = "SELECT * FROM gambar_satu WHERE id = 3"; // Sesuaikan dengan nama tabel yang telah diubah

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
        ?>
          <!-- GAMBAR 2 -->
          <div class="col-md-6 d-flex" data-aos="fade-right">
            <div class="card">
              <div class="card-img">
                <img src="boltimadmin/gambardb/section2_3/<?php echo $row['gambar_url']; ?>" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href=""><?php echo $row['judul']; ?></a></h5>
                <p class="card-text"><?php echo $row['deskripsi']; ?></p>
                <!-- <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div> -->
              </div>
            </div>
          </div>
        <?php
        }
        ?>

        <!-- GAMBAR 3 -->
        <?php
        // Query untuk mengambil data dari tabel gambar_satu
        $query = "SELECT * FROM gambar_satu WHERE id = 4"; // Sesuaikan dengan nama tabel yang telah diubah

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
        ?>
          <!-- GAMBAR 3 -->
          <div class="col-md-6 d-flex" data-aos="fade-right">
            <div class="card">
              <div class="card-img">
                <img src="boltimadmin/gambardb/section2_3/<?php echo $row['gambar_url']; ?>" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href=""><?php echo $row['judul']; ?></a></h5>
                <p class="card-text"><?php echo $row['deskripsi']; ?></p>
                <!-- <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div> -->
              </div>
            </div>
          </div>
        <?php
        }
        ?>


        <!-- GAMBAR 4 -->
        <?php
        // Query untuk mengambil data dari tabel gambar_satu
        $query = "SELECT * FROM gambar_satu WHERE id = 5"; // Sesuaikan dengan nama tabel yang telah diubah

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
        ?>
          <!-- GAMBAR 4 -->
          <div class="col-md-6 d-flex" data-aos="fade-right">
            <div class="card">
              <div class="card-img">
                <img src="boltimadmin/gambardb/section2_3/<?php echo $row['gambar_url']; ?>" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href=""><?php echo $row['judul']; ?></a></h5>
                <p class="card-text"><?php echo $row['deskripsi']; ?></p>
                <!-- <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div> -->
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </section><!-- End Services Section -->


  <!-- ======= Features Section ======= -->
  <section id="features" class="features section-bg">
    <div class="container">

      <?php
      include './conf/koneksi.php';

      // Query untuk mengambil data dari database
      $query = "SELECT * FROM informasi_simpati_section_tiga"; // Sesuaikan dengan tabel Anda

      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
      ?>
        <div class="section-title" data-aos="fade-in">
          <h2><?= $row['judul']; ?></h2>
          <p><?= $row['deskripsi']; ?></p>
        </div>
      <?php
      } else {
        echo "Tidak ada data yang ditemukan.";
      }

      // Tutup koneksi
      mysqli_close($conn);
      ?>

      <?php
      include './conf/koneksi.php';

      // Query untuk mengambil data dari database
      $query = "SELECT * FROM informasi_section_tiga"; // Sesuaikan dengan tabel Anda
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
      ?>
        <div class="row content">
          <div class="col-md-5" data-aos="fade-right">
            <img src="assets/img/<?php echo $row['gambar_url']; ?>" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-4" data-aos="fade-left">
            <h3><?php echo $row['judul']; ?></h3>
            <p class="fst-italic">
              <?php echo $row['deskripsi']; ?>
            </p>
            <ul>
              <li><i class="bi bi-check"></i> <?php echo $row['checklist_1']; ?></li>
              <li><i class="bi bi-check"></i> <?php echo $row['checklist_2']; ?></li>
              <li><i class="bi bi-check"></i> <?php echo $row['checklist_3']; ?></li>
              <li><i class="bi bi-check"></i> <?php echo $row['checklist_4']; ?></li>
              <li><i class="bi bi-check"></i> <?php echo $row['checklist_5']; ?></li>
              <li><i class="bi bi-check"></i> <?php echo $row['checklist_6']; ?></li>
              <li><i class="bi bi-check"></i> <?php echo $row['checklist_7']; ?></li>
              <li><i class="bi bi-check"></i> <?php echo $row['checklist_8']; ?></li>
              <li><i class="bi bi-check"></i> <?php echo $row['checklist_9']; ?></li>
              <li><i class="bi bi-check"></i> <?php echo $row['checklist_10']; ?></li>
              <li><i class="bi bi-check"></i> <?php echo $row['checklist_11']; ?></li>
            </ul>
          </div>
        </div>
      <?php
      }
      ?>

      <?php
      include './conf/koneksi.php';

      // Query untuk mengambil data dari database
      $query = "SELECT * FROM informasi_section_tiga_dua"; // Sesuaikan dengan tabel Anda
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
      ?>
        <div class="row content">
          <div class="col-md-5 order-1 order-md-2" data-aos="fade-right">
            <img src="assets/img/<?php echo $row['gambar_url']; ?>" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-4" data-aos="fade-left">
            <h3><?php echo $row['judul']; ?></h3>
            <p class="fst-italic">
              <?php echo $row['deskripsi']; ?>
            </p>
            <ul>
              <li><i class="bi bi-check"></i> <?php echo $row['checklist_1']; ?></li>
              <li><i class="bi bi-check"></i> <?php echo $row['checklist_2']; ?></li>
              <li><i class="bi bi-check"></i> <?php echo $row['checklist_3']; ?></li>
              <li><i class="bi bi-check"></i> <?php echo $row['checklist_4']; ?></li>
              <li><i class="bi bi-check"></i> <?php echo $row['checklist_5']; ?></li>
              <li><i class="bi bi-check"></i> <?php echo $row['checklist_6']; ?></li>
              <li><i class="bi bi-check"></i> <?php echo $row['checklist_7']; ?></li>
            </ul>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </section><!-- End Features Section -->
</main><!-- End #main -->