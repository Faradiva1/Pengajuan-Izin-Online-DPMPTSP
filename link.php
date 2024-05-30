<?php
@$page = $_GET['q'];
if (!empty($page)) {
    switch ($page) {


        case 'pengaduan':
            include './pages/pengaduan/pengaduan.php';
            break;

        case 'berhasil':
            include './pages/pengaduan/berhasil/berhasil.php';
            break;

        case 'prosespengaduanuser':
            include './pages/pengaduan/prosespengaduanuser/prosespengaduanuser.php';
            break;

        case 'izin':
            include './pages/izin/izin.php';
            break;

        case 'ajukan':
            include './pages/ajukan/ajukan.php';
            break;

        case 'createprocess':
            include './pages/createprocess/createprocess.php';
            break;

        case 'success':
            include './pages/success/success.php';
            break;

        case 'delete':
            include './pages/delete/delete.php';
            break;

        case 'ubah':
            include './pages/ubah/ubah.php';
            break;

        case 'upload':
            include './pages/upload/upload.php';
            break;

        case 'uploadprocess':
            include './pages/upload/uploadprocess/exe.php';
            break;

        case 'izinproses':
            include './pages/izinproses/izinproses.php';
            break;

        case 'beranda':
            include './pages/beranda/beranda.php';
            break;

        case 'feautres':
            include './pages/feautres/feautres.php';
            break;

        case 'tracking':
            include './pages/tracking/tracking.php';
            break;

        case 'pengaduan':
            include './pages/pengaduan/pengaduan.php';
            break;

        case 'tentangaplikasi':
            include './pages/tentangaplikasi/tentangaplikasi.php';
            break;

        case 'registrasi':
            include './pages/registrasi/registrasi.php';
            break;

        case 'klinik1':
            include './pages/klinik1/klinik1.php';
            break;

        case 'pengajuanklinik':
            include './pages/pengajuanklinik/pengajuanklinik.php';
            break;

            //All About SIPB
        case 'SIPB':
            include './pages/SIPB/SIPB.php';
            break;

        case 'permohonansipb':
            include './pages/permohonansipb/permohonansipb.php';
            break;

        case 'createprocesssipb':
            include './pages/createprocesssipb/createprocesssipb.php';
            break;

        case 'successipb':
            include './pages/successipb/successipb.php';
            break;

        case 'uploadsipb':
            include './pages/uploadsipb/uploadsipb.php';
            break;

        case 'uploadprocesssipb':
            include './pages/uploadsipb/uploadprocesssipb/exesipb.php';
            break;

        case 'izinprosessipb':
            include './pages/izinprosessipb/izinprosessipb.php';
            break;

        case 'deletesipb':
            include './pages/deletesipb/deletesipb.php';
            break;

        case 'ubahsipb':
            include './pages/ubahsipb/ubahsipb.php';
            break;

            //end of SIPB

        case 'SIPP':
            include './pages/SIPP/SIPP.php';
            break;

        case 'proses':
            include './pages/proses/proses.php';
            break;


            // ADMIN
        case 'adminpagelogin':
            include './pages/adminpagelogin/adminpagelogin.php';
            break;
            // ADMIN
        case 'adminpageregister':
            include './pages/adminpageregister/adminpageregister.php';
            break;

            // USER
        case 'userpagelogin':
            include './pages/userpagelogin/userpagelogin.php';
            break;
            // USER
        case 'userpageregister':
            include './pages/userpageregister/userpageregister.php';
            break;

            // LOGINPROSES
        case 'loginproses':
            include './pages/loginproses/loginproses.php';
            break;

            // LOGINPROSESadmin
        case 'loginprosesadmin':
            include './pages/loginprosesadmin/loginprosesadmin.php';
            break;

            //REGISTER PROSES
        case 'register_proses':
            include './pages/register_proses/register_proses.php';
            break;

            //UPLOAD PROSES
        case 'uploadproses':
            include './pages/upload/uploadproses/uploadproses.php';
            break;

            //pengaduan
        case 'pengaduan':
            include './pages/pengaduan/pengaduan.php';
            break;

            //proses pengaduan
        case 'prosespengaduan':
            include './pages/pengaduan/prosespengaduan/prosespengaduan.php';
            break;

            //proses pengaduan
        case 'lihattanggapanadmin':
            include './pages/lihattanggapanadmin/lihattanggapanadmin.php';
            break;

            //tandai sudah dibaca
        case 'tandaisudahdibaca':
            include './pages/lihattanggapanadmin/tandaisudahdibaca/tandaisudahdibaca.php';
            break;


            //notifikasi
        case 'notifikasiuser':
            include './pages/notifikasiuser/notifikasiuser.php';
            break;

            //notifikasi
        case 'izinterbit':
            include './pages/izinterbit/izinterbit.php';
            break;


            //notifikasi
        case 'izinterbitsipb':
            include './pages/izinterbitsipb/izinterbitsipb.php';
            break;
    }
} else {
    include './pages/beranda/beranda.php';
}