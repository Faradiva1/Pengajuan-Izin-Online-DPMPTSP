<?php
session_start();
include 'conf/koneksi.php';

// Periksa apakah pengguna sudah masuk, jika iya arahkan ke halaman dashboard
if (isset($_SESSION['id_user'])) {
    header("Location: dashboard.php?iduser=" . $_SESSION['id_user']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="loginuserr.css">

    <!-- Favicons -->
    <link href="assets/img/logofav.png" rel="icon">

    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login</title>
</head>

<body>

    <div id="menu_kiri">
        <div class="logo">
            <img src="assets/img/ptsp.png" width="25%">
        </div>
        <div class="isi">
            <div class="greetings">
                <!-- silahkan menambah kata sesuai keinginan dengan <span>text...</span -->
                <div class="greetings">
    <span>S</span>
    <span>E</span>
    <span>L</span>
    <span>A</span>
    <span>M</span>
    <span>A</span>
    <span>T</span>
    <span>&nbsp;</span>
    <span>D</span>
    <span>A</span>
    <span>T</span>
    <span>A</span>
    <span>N</span>
    <span>G</span>
    <br>
    <span>D</span>
    <span>E</span>
    <span>G</span>
    <span>A</span>
    <span>'</span>
    <span></span>
    <span>N</span>
    <span>I</span>
    <span>O</span>
    <span>N</span>
    <span>D</span>
    <span>O</span>
    <span>N</span>
    <span></span>
    <span>SIMPATI.</span>
</div>

            </div>
        </div>
    </div>

    <div class="login">
        <div class="login-container">
            <div class="user-avatar">
                <img src="./assets/img/u-1.jpg" alt="User Avatar">
            </div>
            <h1>Masuk</h1>
            <form action="link.php?q=loginproses" method="POST">
                <div class="form-group">
                    <label for="username">Nama Pengguna</label>
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username" name="username" placeholder="Username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <button type="submit">Masuk</button>
            </form>
            <p>Belum punya akun? <a href="userpageregister.php">Daftar disini</a></p>
        </div>
    </div>
</body>

</html>