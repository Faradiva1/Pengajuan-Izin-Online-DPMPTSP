<?php
include './conf/koneksi.php';
// include './conf/function.php';

// $id =$_GET['id'];

// $ktp = $_POST['ktp'];
// $ap = $_POST['akta_pendirian'];
// $sl = $_POST['surat_lokasi'];
// $bh = $_POST['bukti_hak'];
// $il = $_POST['izin_lingkungan'];
// $pk = $_POST['profil_klinik'];
// $nib = $_POST['nib'];
// $sd = $_POST['surat_dokter'];
// $sip = $_POST['sip_dokter'];
// $dt = $_POST['daftar_tenaga'];
// $sr = $_POST['surat_rekomendasi'];

Function SelectAllData() {
    include './conf/koneksi.php';
    $Query = "SELECT * FROM upload";
    $Result = Mysqli_query($conn, $Query);
    Return $Result;
}

Function InsertData($Data) {
    include './conf/koneksi.php';
    $Query = "INSERT INTO upload VALUES
    ('".$Data['id']. "','" . $Data['ktp'] . "','" . $Data['akta_pendirian'] . "','" . $Data['surat_lokasi'] . "',
    '" . $Data['bukti_hak'] . "','" . $Data['izin_lingkungan'] . "','" . $Data['profil_klinik'] . "',
    '" . $Data['nib'] . "','" . $Data['surat_dokter'] . "','" . $Data['sip_dokter'] . "',
    '" . $Data['daftar_tenaga'] . "','" . $Data['surat_rekomendasi'] . "') ";

    $Result = Mysqli_query($conn, $Query);

    If (!$Result) {
        Return 0;
    } Else {
        Return 1;
    }
}



    $fileFields = [
        'ktp', 'akta_pendirian', 'surat_lokasi', 'bukti_hak',
        'izin_lingkungan', 'profil_klinik', 'nib', 'surat_dokter',
        'sip_dokter', 'daftar_tenaga', 'surat_rekomendasi'
    ];


        foreach ($fileFields as $fieldName) {
        if (!isset($_FILES[$fieldName])) {
            $errors[] = "Berkas $fieldName tidak ditemukan";
            continue;
        }

        $targetDir = "uploads/";
        $file = $_FILES[$fieldName];
        $filePath = $targetDir . basename($file["name"]);

    }

        //pindah file upload ke filepath
        // $terupload = move_uploaded_file($file["tmp_name"], $filePath);


            // $DataArr = Array(
            //     'id' => $id,
            //     'ktp' => $ktp,
            //     'akta_pendirian'=>$ap,
            //     'surat_lokasi'=>$sl,
            //     'bukti_hak'=>$bh,
            //     'izin_lingkungan'=>$il,
            //     'profil_klinik'=>$pk,
            //     'nib'=>$nib,
            //     'surat_dokter'=>$sd,
            //     'sip_dokter'=>$sip,
            //     'daftar_tenaga'=>$dt,
            //     'surat_rekomendasi'=>$sr
            // );

            //insert ke database
            If ($terupload && (InsertData($DataArr) == 1)) {
                Echo "Upload Berhasil!";
                Header("Location: ?q=izinproses");
                Exit();
            } else {
                Echo "Upload Gagal!";
                Header("Location:upload.Php");
                Exit();
            }


    if (empty($errors)) {
        header("Location: ?q=izinproses");
        exit();
    } else {
        foreach ($errors as $error) {
            echo "Error: $error<br>";
        }
    }

?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <p class="card-text">Upload Berkas Pengajuan</p>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="table table-striped">
                    <thead>
                        <tr class="bg-gradient-theme text-dark">
                            <td>NO</td>
                            <td>Persyaratan</td>
                            <td>Upload Berkas</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($fileFields as $index => $fieldName) { ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo ucwords(str_replace('_', ' ', $fieldName)); ?></td>
                            <td><input type="file" name="<?php echo $fieldName; ?>" accept=".pdf" required></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Kirim Berkas</button>
            </form>
        </div>
    </div>
</div>