<?php
session_start();
include 'conf/koneksi.php'; // Pastikan Anda memiliki file koneksi yang sesuai

// Periksa apakah pengguna sudah masuk. Jika tidak, arahkan mereka kembali ke halaman login.
if (!isset($_SESSION['id_user'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['iduser']; // Ambil ID dari parameter URL


$query = "SELECT username FROM users WHERE id_user = $id";
$result = $conn->query($query);

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $namauser = $row['username'];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sistem Perizinan - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/logofav.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <!-- <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrapp.min.css"> -->
    <link rel="stylesheet" href="boltimadmin/assets/css/bootstrapp.min.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">

    <!-- Template Main CSS File -->
    <link href="assets/css/stylessss11.css" rel="stylesheet">
    <link href="assets/css/styleppjjuxx.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="?q=beranda&iduser=<?= $id; ?>">SIMPATI<span>.</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="?q=beranda&iduser=<?= $id; ?>">Home</a></li>
                    <li><a class="nav-link scrollto" href="?q=izin&iduser=<?= $id; ?>">Izin Online</a></li>
                    <li><a class="nav-link scrollto" href="?q=pengaduan&iduser=<?= $id; ?>">Pengaduan</a></li>



                    <li class="dropdown"><a href="#"><span>Izin Terbit</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>

                            <li><a href="?q=izinterbit&iduser=<?= $id; ?>">Klinik</a></li>
                            <li><a href="?q=izinterbitsipb&iduser=<?= $id; ?>">SIPB (Surat Izin Praktik Bidan)</a></li>
                        </ul>
                    </li>

                    <li class="dropdown"><a href="#"><span>Hai <?= $namauser ?></span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="?q=success&iduser=<?= $id; ?>">Izin Klinik</a></li>
                            <li><a href="?q=successipb&iduser=<?= $id; ?>">Izin SIPB</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                    <!-- <li><a class="getstarted scrollto" href="login.php">Login</a></li> -->

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <?php
    include 'link.php';
    ?>


    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">

            <div class="container">

                <div class="row  justify-content-center">
                    <div class="col-lg-6">
                        <?php

                        // Ambil data footer dari database
                        $query = "SELECT * FROM footer_data f LIMIT 1"; // Ambil satu baris pertama
                        $result = mysqli_query($conn, $query);
                        $footerData = mysqli_fetch_assoc($result);

                        if ($footerData) {
                            echo "<h2>" . $footerData['title'] . "</h2>";
                            echo "<p>" . $footerData['address'] . "</p>";
                            echo "<p>No. Telp: " . $footerData['phone'] . " | E-mail: " . $footerData['email'] . "</p>";
                        }
                        ?>
                    </div>
                </div>

                <div class="social-links">
                    <?php
                    // Tampilkan tautan sosial media dari data footer
                    if ($footerData) {
                        echo '<a href="' . $footerData['twitter_link'] . '" class="twitter"><i class="bx bxl-twitter"></i></a>';
                        echo '<a href="' . $footerData['facebook_link'] . '" class="facebook"><i class="bx bxl-facebook"></i></a>';
                        echo '<a href="' . $footerData['instagram_link'] . '" class="instagram"><i class="bx bxl-instagram"></i></a>';
                        echo '<a href="' . $footerData['youtube_link'] . '" class="youtube"><i class="bx bxl-youtube"></i></a>';
                    }
                    ?>
                </div>


            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>Faradiva</span></strong>. All Rights Reserved
            </div>
            <div class="credits">

                Designed by <a href="#">Faradiva Mokoagow</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>

</html>