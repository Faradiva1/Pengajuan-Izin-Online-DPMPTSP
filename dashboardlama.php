<?php
session_start();
include 'conf/koneksi.php'; // Pastikan Anda memiliki file koneksi yang sesuai

// Periksa apakah pengguna sudah masuk. Jika tidak, arahkan mereka kembali ke halaman login.
if (!isset($_SESSION['id_user'])) {
    header("Location: ?q=userpagelogin");
    exit();
}

$id = $_GET['id']; // Ambil ID dari parameter URL


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
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">

    <!-- Template Main CSS File -->
    <link href="assets/css/stylessss.css" rel="stylesheet">
    <link href="assets/css/styleppjjuxx.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="?q=beranda&id=<?= $id; ?>">SIMPATI<span>.</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="?q=beranda&id=<?= $id; ?>">Home</a></li>
                    <li><a class="nav-link scrollto" href="?q=izin&id=<?= $id; ?>">Izin Online</a></li>
                    <li><a class="nav-link scrollto" href="?q=pengaduan&id=<?= $id; ?>">Pengaduan</a></li>
                    <?php
                    $id_user = $_SESSION['id_user'];
                    $id_pengaduan = ''; // Atur nilai default

                    // Query untuk mengambil nilai id_pengaduan dari tabel notifikasi
                    $query_get_id_pengaduan = "SELECT id_pengaduan FROM notifikasi WHERE id_user = $id_user AND dibaca = 0";
                    $result_get_id_pengaduan = mysqli_query($conn, $query_get_id_pengaduan);

                    if ($result_get_id_pengaduan) {
                        $row_get_id_pengaduan = mysqli_fetch_assoc($result_get_id_pengaduan);
                        if ($row_get_id_pengaduan) {
                            $id_pengaduan = $row_get_id_pengaduan['id_pengaduan'];
                        }
                    }

                    // Query untuk menghitung jumlah notifikasi yang belum dibaca
                    $query_count = "SELECT COUNT(id) AS total FROM notifikasi WHERE id_user = $id_user AND dibaca = 0";
                    $result_count = mysqli_query($conn, $query_count);
                    $row_count = mysqli_fetch_assoc($result_count);
                    $total_notifikasi = $row_count['total'];
                    ?>

                    <li><a class="nav-link scrollto" href="?q=lihattanggapanadmin&id_pengaduan=<?= $id_pengaduan; ?>&id_user=<?= $id_user; ?>&id=<?= $id; ?>">Notifikasi</a></li>

                    <?php if ($total_notifikasi > 0) : ?>
                        <span class="badge"><?php echo $total_notifikasi; ?></span>
                    <?php endif; ?>


                    <li class="dropdown"><a href="#"><span>Hai <?= $namauser ?></span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="?q=success&id=<?= $id; ?>">Izin Klinik</a></li>
                            <li><a href="?q=successipb&id=<?= $id; ?>">Izin SIPB</a></li>
                            <li><a href="Logout.php">Logout</a></li>
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
                        $query = "SELECT * FROM footer_data LIMIT 1"; // Ambil satu baris pertama
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
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>