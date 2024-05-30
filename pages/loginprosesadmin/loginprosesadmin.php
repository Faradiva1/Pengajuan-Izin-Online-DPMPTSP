<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/img/logofav.png" rel="icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Proses Login</title>
</head>

<body>

    <?php
    session_start();
    include './conf/koneksi.php'; // Pastikan Anda memiliki file koneksi yang sesuai

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        // Lakukan kueri ke database untuk mencari pengguna dengan username yang sesuai
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($query);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $stored_password = $row["password"];

            // Gunakan password_verify untuk memeriksa apakah password cocok
            if (password_verify($password, $stored_password)) {
                // Jika password cocok, set variabel $password_match dan $role sesuai
                $password_match = true;
                $role = $row["role"];
                $id = $row["id_user"];
            } else {
                // Jika password tidak cocok, set $password_match menjadi false
                $password_match = false;

                // Tampilkan SweetAlert bahwa login gagal
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Login Gagal",
                    text: "Username atau password salah.",
                }).then(function() {
                    window.location.href = "loginadmin/";
                });
            </script>';
            }
        } else {
            // Jika tidak ada pengguna dengan username yang sesuai, set $password_match menjadi false
            $password_match = false;

            // Tampilkan SweetAlert bahwa login gagal
            echo '<script>
            Swal.fire({
                icon: "error",
                title: "Login Gagal",
                text: "Username atau password salah.",
            }).then(function() {
                window.location.href = "loginadmin/";
            });
        </script>';
        }

        if ($password_match) {
            $_SESSION['id_user'] = $id;

            // Arahkan pengguna ke halaman yang sesuai
            if ($role === "admin") {
                // Tampilkan SweetAlert bahwa login berhasil
                echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Login Berhasil",
                    text: "Selamat datang!",
                    showConfirmButton: false,
                    timer: 2000 // 2 detik
                }).then(function() {
                    window.location.href = "boltimadmin?id=' . $id . '";
                });
            </script>';
            } elseif ($role === "user") {
                // Tampilkan SweetAlert bahwa login berhasil
                echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "Login Berhasil",
                    text: "Selamat datang!",
                    showConfirmButton: false,
                    timer: 2000 // 2 detik
                }).then(function() {
                    window.location.href = "dashboard.php?iduser=' . $id . '";
                });
            </script>';
            }
            exit(); // Hentikan eksekusi lebih lanjut
        }
    }
    ?>


</body>

</html>