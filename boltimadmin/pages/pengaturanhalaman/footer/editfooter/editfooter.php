<?php
include '../conf/koneksi.php';

$idadmin = $_GET['id']; // Ambil ID dari parameter URL

if (isset($_GET['iduser'])) {
    $id = $_GET['iduser'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_GET['iduser'];
        $title = $_POST['title'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $twitter_link = $_POST['twitter_link'];
        $facebook_link = $_POST['facebook_link'];
        $instagram_link = $_POST['instagram_link'];
        $youtube_link = $_POST['youtube_link'];

        // Proses update data ke database
        $query = "UPDATE footer_data SET
                    title = '$title',
                    address = '$address',
                    phone = '$phone',
                    email = '$email',
                    twitter_link = '$twitter_link',
                    facebook_link = '$facebook_link',
                    instagram_link = '$instagram_link',
                    youtube_link = '$youtube_link'
                WHERE id = $id";

        $Query = mysqli_query($conn, $query);

        if ($Query) {
            // Jika update berhasil, tampilkan SweetAlert
            echo '<script>
             Swal.fire({
                 title: "Berhasil!",
                 text: "Data berhasil di Ubah.",
                 icon: "success"
             }).then(function() {
                 window.location = "?q=pengaturanhalaman&id=' . $idadmin . '";
             });
         </script>';
        } else {
            // Tampilkan pesan error jika terjadi kesalahan
            $error = "Terjadi kesalahan saat mengupdate data.";
        }
    }
}

?>

<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Edit Data</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Data</div>
                        </div>
                        <div class="card-body">
                            <?php
                            // Ambil data yang akan diedit berdasarkan ID
                            $iduser = $_GET['iduser'];
                            $query = "SELECT * FROM footer_data WHERE id = $iduser";
                            $result = mysqli_query($conn, $query);
                            $data = mysqli_fetch_assoc($result);
                            ?>

                            <form action="?q=editfooter&iduser=<?= $iduser; ?>&id=<?php echo $idadmin; ?>" method="POST">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?= $data['title']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="address" name="address" required><?= $data['address']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?= $data['phone']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for "email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $data['email']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="twitter_link" class="form-label">Twitter</label>
                                    <input type="text" class="form-control" id="twitter_link" name="twitter_link" value="<?= $data['twitter_link']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="facebook_link" class="form-label">Facebook</label>
                                    <input type="text" class="form-control" id="facebook_link" name="facebook_link" value="<?= $data['facebook_link']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="instagram_link" class="form-label">Instagram</label>
                                    <input type="text" class="form-control" id="instagram_link" name="instagram_link" value="<?= $data['instagram_link']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="youtube_link" class="form-label">Youtube</label>
                                    <input type="text" class="form-control" id="youtube_link" name="youtube_link" value="<?= $data['youtube_link']; ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>