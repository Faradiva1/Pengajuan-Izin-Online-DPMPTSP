<?php
session_start();

// Periksa apakah pengguna sudah masuk
if (isset($_SESSION['id_user'])) {
    // Jika sudah masuk, arahkan ke halaman yang sesuai (misalnya, dashboard)
    header("Location: ../boltimadmin?id=" . $_SESSION['id_user']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../assets/img/logofav.png" rel="icon">

    <link rel="stylesheet" href="../loginadmin2.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <title>Login Admin</title>
</head>

<body>
    <div class="login">
        <div class="login-container">
            <div class="user-avatar">
                <img src="../assets/img/a-1.jpg" alt="User Avatar">
            </div>
            <h1>Login Admin</h1>
            <form action="../link.php?q=loginprosesadmin&id=<?php $id ?>" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
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
                <button type="submit">Login</button>
            </form>
            <p>Belum punya akun? <a href="adminpageregister.php">Daftar disini</a></p>
        </div>
    </div>
</body>

</html>