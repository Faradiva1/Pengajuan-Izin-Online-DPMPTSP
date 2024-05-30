<?php
include './conf/koneksi.php';
// include './conf/function.php';

$id =$_GET['id'];

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $fileFields = [
//         '', 'ktp', 'akta_pendirian', 'surat_lokasi', 'bukti_hak',
//         'izin_lingkungan', 'profil_klinik', 'nib', 'surat_dokter',
//         'sip_dokter', 'daftar_tenaga', 'surat_rekomendasi'
//     ];

//     $targetDir = "uploads/";
//     $errors = [];

//     foreach ($fileFields as $fieldName) {
//         if (!isset($_FILES[$fieldName])) {
//             $errors[] = "Berkas $fieldName tidak ditemukan";
//             continue;
//         }

//         $file = $_FILES[$fieldName];
//         $filePath = $targetDir . basename($file["name"]);

//         //pindah file upload ke filepath
//         if (move_uploaded_file($file["tmp_name"], $filePath)) {

//             //insert ke database
//             $sql = "INSERT INTO upload ('id', 'ktp', 'akta_pendirian', 'surat_lokasi', 'bukti_hak',
//             'izin_lingkungan', 'profil_klinik', 'nib', 'surat_dokter',
//             'sip_dokter', 'daftar_tenaga', 'surat_rekomendasi')
//             VALUES ('$filePath')";
//             if (!mysqli_query($conn, $sql)) {
//                 $errors[] = "Gagal menyimpan berkas $fieldName ke database";
//             }
//         } else {
//             $errors[] = "Gagal mengunggah berkas $fieldName";
//         }
//     }

//     if (empty($errors)) {
//         header("Location: ?q=izinproses");
//         exit();
//     } else {
//         foreach ($errors as $error) {
//             echo "Error: $error<br>";
//         }
//     }
// }
?>


<?php

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
        'id', 'ktp', 'akta_pendirian', 'surat_lokasi', 'bukti_hak',
        'izin_lingkungan', 'profil_klinik', 'nib', 'surat_dokter',
        'sip_dokter', 'daftar_tenaga', 'surat_rekomendasi'
    ];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $ktp = $_POST['ktp'];
  $ap = $_POST['akta_pendirian'];
  $sl = $_POST['surat_lokasi'];
  $bh = $_POST['bukti_hak'];
  $il = $_POST['izin_lingkungan'];
  $pk = $_POST['profil_klinik'];
  $nib = $_POST['nib'];
  $sd = $_POST['surat_dokter'];
  $sip = $_POST['sip_dokter'];
  $dt = $_POST['daftar_tenaga'];
  $sr = $_POST['surat_rekomendasi'];

  $targetDir = "uploads/";

        $filektp = $_FILES[$ktp];
        $fileap = $_FILES[$ap];
        $filesl = $_FILES[$sl];
        $filebh = $_FILES[$bh];
        $fileil = $_FILES[$il];
        $filepk = $_FILES[$pk];
        $filenib = $_FILES[$nib];
        $filesd = $_FILES[$sd];
        $filesip = $_FILES[$sip];
        $filedt = $_FILES[$dt];
        $filesr = $_FILES[$sr];


        $filePathktp = $targetDir . basename($filektp["name"]);
        $filePathap = $targetDir . basename($fileap["name"]);
        $filePathsl = $targetDir . basename($filesl["name"]);
        $filePathbh = $targetDir . basename($filebh["name"]);
        $filePathil = $targetDir . basename($fileil["name"]);
        $filePathpk = $targetDir . basename($filepk["name"]);
        $filePathnib = $targetDir . basename($filenib["name"]);
        $filePathsd = $targetDir . basename($filesd["name"]);
        $filePathsip = $targetDir . basename($filesip["name"]);
        $filePathdt = $targetDir . basename($filedt["name"]);
        $filePathsr = $targetDir . basename($filesr["name"]);



        //pindah file upload ke filepath
        if (move_uploaded_file($file["tmp_name"], $filePath)) {

        //   insert ke database
        $sql = "INSERT INTO upload ('id', 'ktp', 'akta_pendirian', 'surat_lokasi', 'bukti_hak',
        'izin_lingkungan', 'profil_klinik', 'nib', 'surat_dokter',
        'sip_dokter', 'daftar_tenaga', 'surat_rekomendasi')
        VALUES (
        '$id',
        '$filePathktp',
        '$filePathap',
        '$filePathsl',
        '$filePathbh',
        '$filePathil',
        '$filePathpk',
        '$filePathnib',
        '$filePathsd',
        '$filePathsip',
        '$filePathdt',
        '$filePathsr')";
            if (!mysqli_query($conn, $sql)) {
                $errors[] = "Gagal menyimpan berkas $fieldName ke database";
            }
        } else {
            $errors[] = "Gagal mengunggah berkas $fieldName";
        }
    }

  if (empty($name)) {
    echo "Name is empty";
  } else {
    echo $name;
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