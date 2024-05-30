<?php
include '../conf/koneksi.php';

$id_admin = isset($_GET["id_admin"]) ? $_GET["id_admin"] : "";
$idFileGet = isset($_GET["idfile"]) ? $_GET["idfile"] : "";
$idGet = isset($_GET["id"]) ? $_GET["id"] : "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_POST["id_user"];
    $idfileuser = $_POST["idfile"];
    $feedback_text = mysqli_real_escape_string($conn, $_POST["feedback"]); // Menghindari SQL Injection

    // Buat query INSERT feedback
    $insertQuery = "INSERT INTO feedback_sipb (id_user, id_upload, feedback_text) VALUES ('$id_user', '$idFileGet', '$feedback_text')";

    // Eksekusi query INSERT feedback
    if (mysqli_query($conn, $insertQuery)) {
        // Buat query UPDATE status
        // $updateQuery = "UPDATE upload SET status = 'Ditolak' WHERE id_upload = '$idfileuser'";
        $updateQuery = "UPDATE upload
        SET status = 'Ditolak'
        WHERE id_upload = $idFileGet";

        // Eksekusi query UPDATE status
        if (mysqli_query($conn, $updateQuery)) {
            echo "<script>";
            echo "alert('Feedback berhasil dikirim dan status diperbarui')";
            echo "</script>";
            echo "<meta http-equiv='refresh' content='0;url=index.php?id=$id_admin'>";
            exit();
        } else {
            echo "<script>";
            echo "alert('Terjadi masalah dalam mengupdate status.')";
            echo "</script>";
            echo "<meta http-equiv='refresh' content='0;url=index.php?id=$id_admin'>";
        }
    } else {
        echo "<script>";
        echo "alert('Terjadi masalah dalam mengirim feedback.')";
        echo "</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?id=$id_admin'>";
    }
}
?>



<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="dashboard-header d-flex align-items-center justify-content-center mb-4">
                <h4 class="text-center">Feedback</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Feedback Izin Klinik
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="feedback" class="form-label">Feedback:</label>
                                    <textarea id="feedback" name="feedback" rows="4" class="form-control"
                                        required></textarea>
                                </div>
                                <input type="hidden" name="id_user" value="<?php echo $idGet; ?>">
                                <input type="hidden" name="id_file" value="<?php echo $idFileGet; ?>">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Unggah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>