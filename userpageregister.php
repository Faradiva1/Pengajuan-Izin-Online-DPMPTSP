<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginadmin2.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>User Registrasi</title>
</head>

<body>
    <div class="login">
        <div class="register-container">
            <div class="user-avatar">
                <img src="./assets/img/u-1.jpg" alt="User Avatar">
            </div>
            <h1>Registrasi</h1>

            <?php
            if (isset($_GET['success']) && $_GET['success'] == 1) {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Registrasi Berhasil",
                            text: "Silakan login.",
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function() {
                            window.location.href = "index.php";
                        });
                    </script>';
            } elseif (isset($_GET['error']) && $_GET['error'] == 1) {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Konfirmasi Password tidak cocok."
                        });
                    </script>';
            } elseif (isset($_GET['error']) && $_GET['error'] == 2) {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Username sudah terdaftar."
                        });
                    </script>';
            } elseif (isset($_GET['error']) && $_GET['error'] == 3) {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Terjadi kesalahan saat registrasi."
                        });
                    </script>';
            }
            ?>

            <form action="proses_register.php" method="POST">
                <div class="form-group">
                    <label for="new_username_user" aria-hidden="true">Registrasi User</label>
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" id="new_username_user" name="new_username_user" placeholder="Username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="new_password_user" aria-hidden="true">Password</label>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="new_password_user" name="new_password_user" placeholder="Password" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm_password" aria-hidden="true">Konfirmasi Password</label>
                    <div class="input-icon">
                        <i class="fa-solid fa-circle-check"></i>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password" required>
                    </div>
                </div>

                <!-- Pilihan Role -->
                <div class="form-group">
                    <label for="role_user">Role</label>
                    <select id="role_user" name="role_user" disabled>
                        <option value="user" selected>user</option>
                    </select>
                </div>

                <button type="submit">Registrasi</button>
            </form>
            <p>Sudah punya akun? <a href="index.php">Login disini</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>