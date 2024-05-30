<?php
session_start();

include '../conf/koneksi.php'; // Pastikan Anda memiliki file koneksi yang sesuai

// Periksa apakah pengguna sudah masuk. Jika tidak, arahkan mereka kembali ke halaman login.
if (!isset($_SESSION['id_user'])) {
    header("Location: ../loginadmin/");
    exit();
}
$id = $_GET['id']; // Ambil ID dari parameter URL

$query = "SELECT username, role FROM users WHERE id_user = $id";
$result = $conn->query($query);

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $namauser = $row['username'];
    $role = $row['role'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Sistem Perizinan</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link rel="stylesheet" href="assets/css/bootstrapp.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/css/readyy.css">
    <link rel="stylesheet" href="assets/css/demo.css">
    <link rel="stylesheet" href="cssadmin222.css">

    <link href="../assets/img/logofav.png" rel="icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>


    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
</head>

<body>
    <div class="wrapper">
        <div class="main-header" style="background-color: #213b52;">
            <div class="logo-header">
                <a class="logo">
                    SIMPATI<span>.</span>
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
            </div>

            <!-- START NAVBAR -->
            <nav class="navbar navbar-header navbar-expand-lg">
                <div class="container-fluid">

                    <!-- <form class="navbar-left navbar-form nav-search mr-md-3" action="">
                        <div class="input-group">
                            <input type="text" placeholder="Search ..." class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-search search-icon"></i>
                                </span>
                            </div>
                        </div>
                    </form> -->
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <!-- <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-envelope"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li> -->
                        <!-- <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-bell"></i>
                                <span class="notification">3</span>
                            </a>
                            <ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
                                <li>
                                    <div class="dropdown-title">You have 4 new notification</div>
                                </li>
                                <li>
                                    <div class="notif-center">
                                        <a href="#">
                                            <div class="notif-icon notif-primary"> <i class="la la-user-plus"></i>
                                            </div>
                                            <div class="notif-content">
                                                <span class="block">
                                                    New user registered
                                                </span>
                                                <span class="time">5 minutes ago</span>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="notif-icon notif-success"> <i class="la la-comment"></i> </div>
                                            <div class="notif-content">
                                                <span class="block">
                                                    Rahmad commented on Admin
                                                </span>
                                                <span class="time">12 minutes ago</span>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="notif-img">
                                                <img src="assets/img/profile2.jpg" alt="Img Profile">
                                            </div>
                                            <div class="notif-content">
                                                <span class="block">
                                                    Reza send messages to you
                                                </span>
                                                <span class="time">12 minutes ago</span>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="notif-icon notif-danger"> <i class="la la-heart"></i> </div>
                                            <div class="notif-content">
                                                <span class="block">
                                                    Farrah liked Admin
                                                </span>
                                                <span class="time">17 minutes ago</span>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="see-all" href="javascript:void(0);"> <strong>See all
                                            notifications</strong> <i class="la la-angle-right"></i> </a>
                                </li>
                            </ul>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false"> <img src="assets/img/profile.jpg" alt="user-img" width="36"
                                    class="img-circle"><span><?= $namauser ?></span></span> </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li>
                                    <div class="user-box">
                                        <div class="u-img"><img src="assets/img/profile.jpg" alt="user"></div>
                                        <div class="u-text">
                                            <h4><?= $namauser ?></h4>
                                            <p class="text-muted">hello@themekita.com</p><a href=""
                                                class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                        </div>
                                    </div>
                                </li>
                                <div class="dropdown-divider"></div>
                                <!-- <a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
                                <a class="dropdown-item" href="#"></i> My Balance</a>
                                <a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- END NAVBAR -->

        <!-- START SIDEBAR -->
        <div class="sidebar" style="background-color: #213b52;">
            <div class="scrollbar-inner sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="assets/img/profile.jpg">
                    </div>
                    <div class="info">
                        <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                            <span>
                                <?= $namauser ?>
                                <span class="user-level"><?= $role ?></span>
                                <!-- <span class="caret"></span> -->
                            </span>
                        </a>
                        <div class="clearfix"></div>

                        <!-- <div class="collapse in" id="collapseExample" aria-expanded="true">
                            <ul class="nav">
                                <li>
                                    <a href="#profile">
                                        <span class="link-collapse">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#edit">
                                        <span class="link-collapse">Edit Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#settings">
                                        <span class="link-collapse">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a href="?q=beranda&id=<?= $id; ?>">
                            <i class="fa-solid fa-gauge"></i>
                            <p>Dashboard</p>
                            <!-- <span class="badge badge-count">5</span> -->
                        </a>
                    </li>
                </ul>
                <ul class="nav">
                    <li class="nav-item active">
                        <a href="?q=dataizinklinik&id=<?= $id; ?>">
                            <i class="fa-solid fa-file-lines"></i>
                            <p>Data Izin Klinik</p>
                            <!-- <span class="badge badge-count">5</span> -->
                        </a>
                    </li>
                </ul>
                <ul class="nav">
                    <li class="nav-item active">
                        <a href="?q=dataizinsipb&id=<?= $id; ?>">
                            <i class="fa-solid fa-file-lines"></i>
                            <p>Data Izin SIPB</p>
                            <!-- <span class="badge badge-count">5</span> -->
                        </a>
                    </li>
                </ul>
                <ul class="nav">
                    <li class="nav-item active">
                        <a href="?q=pengaduanadmin&id=<?= $id; ?>">
                            <i class="fa-solid fa-headset"></i>
                            <p>Pengaduan</p>
                            <!-- <span class="badge badge-count">5</span> -->
                        </a>
                    </li>
                </ul>
                <ul class="nav">
                    <li class="nav-item active">
                        <a href="?q=pengaturanhalaman&id=<?= $id; ?>">
                            <i class="fa-solid fa-gear"></i>
                            <p>Pengaturan Halaman</p>
                            <!-- <span class="badge badge-count">5</span> -->
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END SIDEBAR -->

        <!-- CONTENT -->
        <?php
        include 'link.php';
        ?>
        <!-- END CONTENT -->

        <footer class="footer">
            <div class="container-fluid">
                <!-- <nav class="pull-left">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="http://www.themekita.com">
                                ThemeKita
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Help
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://themewagon.com/license/#free-item">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav> -->
                <div class="copyright ml-auto">
                    2023, made with <i class="la la-heart heart text-danger"></i> by <a href="">Faradiva</a>
                </div>
            </div>

        </footer>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title"><i class="la la-frown-o"></i> Under Development</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <p>Currently the pro version of the <b>Ready Dashboard</b> Bootstrap is in progress development</p>
                    <p>
                        <b>We'll let you know when it's done</b>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/chartist/chartist.min.js"></script>
<script src="assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/ready.min.js"></script>
<script src="assets/js/demo.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</html>