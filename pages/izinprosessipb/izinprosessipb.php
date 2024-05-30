<?php
$iduser = $_GET['id'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Izin Diproses</title>
    <style>
    body {
        font-family: Arial, sans-serif, Bold;
        background-color: #dddddd;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 50px;
    }

    .card {
        background-color: burlywood;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #002366;
        padding: 20px;
        border-bottom: 1px solid #dddddd;
    }

    .card-text {
        margin: 0;
        font-size: 18px;
        font-weight: bold;
    }

    .card-body {
        padding: 70px;
    }

    h3 {
        margin-top: 0;
    }

    p {
        margin-bottom: 10px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <p class="card-text">Izin Diproses</p>
            </div>
            <div class="card-body">
                <h3>Terima kasih!</h3>
                <p>Permohonan izin Anda sedang diproses. Kami akan melakukan verifikasi terhadap berkas yang Anda
                    kirimkan. Mohon tunggu konfirmasi lebih lanjut.</p>
            </div>
        </div>
    </div>
</body>

</html>