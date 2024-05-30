<?php
include '../conf/koneksi.php'; // Pastikan Anda memiliki file koneksi yang sesuai

$idFileGet = isset($_GET["idfile"]) ? $_GET["idfile"] : "";
$idGet = isset($_GET["id"]) ? $_GET["id"] : "";

//query data
$query = "SELECT up.*,
us.id_user,
us.username,
dp.*
FROM upload_sipb up
INNER JOIN users us ON up.id = us.id_user
INNER JOIN data_praktik dp ON dp.id_user = us.id_user
ORDER BY up.id ASC";

$result = mysqli_query($conn, $query);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $idfileuser = $_POST["idfile"];
    $feedback_text = $_POST["feedback_text"];

    $query = "INSERT INTO feedback_sipb (user_id, idfile, feedback_text) VALUES ('$user_id', $idfileuser, '$feedback_text')";
    if (mysqli_query($conn, $query)) {
        mysqli_query($conn, "DELETE FROM data_praktik WHERE id_user = $idfileuser");
        mysqli_query($conn, "DELETE FROM upload_sipb WHERE id = $idfileuser");
        echo "Feedback berhasil dikirim.";
        echo "<script>";
        echo "alert('Feedback berhasil dikirim')";
        // echo "window.location.href = 'index.php';";
        echo "</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?id=$user_id'>";
        // echo "Data berhasil dihapus. <a href='../?q=dataizinklinik&id=$idGet'>Kembali</a>";
        // header("Location: index.php?id=$idGet");
        exit();
    } else {
        echo "Terjadi masalah dalam mengirim feedback.";
        echo "<script>";
        echo "alert('erjadi masalah dalam mengirim feedback.')";
        echo "</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?id=$user_id'>";
    }
}
?>


<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="dashboard-header d-flex align-items-center justify-content-center mb-4">
                <h4 class="text-center">Reject Izin</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Form Feedback
                        </div>
                        <div class="card-body">
                            <!-- Form untuk mengirim feedback -->
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="feedback_text">Feedback</label>
                                    <textarea class="form-control" id="feedback_text" name="feedback_text" rows="4" required></textarea>
                                </div>
                                <input type="hidden" name="user_id" value="<?php echo $idGet; ?>">
                                <input type="hidden" name="idfile" value="<?php echo $idFileGet; ?>">
                                <button type="submit" class="btn btn-primary">Kirim Feedback</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>