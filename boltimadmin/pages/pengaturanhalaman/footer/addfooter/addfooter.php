<?php
include '../conf/koneksi.php';

$idadmin = $_GET['id']; // Ambil ID dari parameter URL

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $twitter_link = $_POST['twitter_link'];
    $facebook_link = $_POST['facebook_link'];
    $instagram_link = $_POST['instagram_link'];
    $youtube_link = $_POST['youtube_link'];


    $query = "INSERT INTO footer_data (title, address, phone, email, 
                            twitter_link, facebook_link, instagram_link, youtube_link   ) 
                            VALUES ('$title', '$address',
                            '$phone', '$email', '$twitter_link', '$facebook_link', '$instagram_link', 
                            '$youtube_link')";

    if (mysqli_query($conn, $query)) {
        echo '<script>
    Swal.fire({
        title: "Berhasil!",
        text: "Data berhasil ditambahkan.",
        icon: "success"
    }).then(function() {
        window.location = "?q=pengaturanhalaman&id=' . $idadmin . '";
    });
</script>';
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>


<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Tambah Data</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Proses Tambah Data</div>
                        </div>
                        <div class="card-body">
                            <form action="?q=addfooter&id=<?= $id; ?>" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="address" name="address" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="twitter_link" class="form-label">Twitter</label>
                                    <input type="text" class="form-control" id="twitter_link" name="twitter_link" required>
                                </div>
                                <div class="mb-3">
                                    <label for="facebook_link" class="form-label">Facebook</label>
                                    <input type="text" class="form-control" id="facebook_link" name="facebook_link" required>
                                </div>
                                <div class="mb-3">
                                    <label for="instagram_link" class="form-label">Instagram</label>
                                    <input type="text" class="form-control" id="instagram_link" name="instagram_link" required>
                                </div>
                                <div class="mb-3">
                                    <label for="youtube_link" class="form-label">Youtube</label>
                                    <input type="text" class="form-control" id="youtube_link" name="youtube_link" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>