<?php
@$page = $_GET['q'];
if (!empty($page)) {
    switch ($page) {
            // beranda
        case 'beranda':
            include './pages/beranda/beranda.php';
            break;

            // pengaturan halaman
        case 'pengaturanhalaman':
            include './pages/pengaturanhalaman/pengaturanhalaman.php';
            break;


            // =====================SECTION 1 ===================================
            // add
        case 'add':
            include './pages/pengaturanhalaman/section1/add/add.php';
            break;

            // edit
        case 'edit':
            include './pages/pengaturanhalaman/section1/edit/edit.php';
            break;

            // hapus
        case 'hapus':
            include './pages/pengaturanhalaman/section1/hapus/hapus.php';
            break;

            // ===================== END SECTION 1 ===================================

            // =====================LOGO ===================================
            // add
        case 'addlogo':
            include './pages/pengaturanhalaman/logo/addlogo/addlogo.php';
            break;

            // edit
        case 'editlogo':
            include './pages/pengaturanhalaman/logo/editlogo/editlogo.php';
            break;

            // hapus
        case 'hapuslogo':
            include './pages/pengaturanhalaman/logo/hapuslogo/hapuslogo.php';
            break;

            // ===================== END LOGO ===================================


            // =====================SECTION 2 ===================================
            // add
        case 'add2':
            include './pages/pengaturanhalaman/section2/add2/add2.php';
            break;

            // edit
        case 'edit2':
            include './pages/pengaturanhalaman/section2/edit2/edit2.php';
            break;

            // hapus
        case 'hapus2':
            include './pages/pengaturanhalaman/section2/hapus2/hapus2.php';
            break;

            // ===================== END SECTION 2 ===================================


            // =====================SECTION 2_3 ===================================
            // add
        case 'add2_3':
            include './pages/pengaturanhalaman/section2_3/add2_3/add2_3.php';
            break;

            // edit
        case 'edit2_3':
            include './pages/pengaturanhalaman/section2_3/edit2_3/edit2_3.php';
            break;

            // hapus
        case 'hapus2_3':
            include './pages/pengaturanhalaman/section2_3/hapus2_3/hapus2_3.php';
            break;

            // ===================== END SECTION 2_3 ===================================

            // =====================SECTION 3 ===================================
            // add
        case 'add3':
            include './pages/pengaturanhalaman/section3/add3/add3.php';
            break;

            // edit
        case 'edit3':
            include './pages/pengaturanhalaman/section3/edit3/edit3.php';
            break;

            // hapus
        case 'hapus3':
            include './pages/pengaturanhalaman/section3/hapus3/hapus3.php';
            break;

            // ===================== END SECTION 3 ===================================

            // =====================SECTION 3_2 ===================================
            // add
        case 'add3_2':
            include './pages/pengaturanhalaman/section3_2/add3_2/add3_2.php';
            break;

            // edit
        case 'edit3_2':
            include './pages/pengaturanhalaman/section3_2/edit3_2/edit3_2.php';
            break;

            // hapus
        case 'hapus3_2':
            include './pages/pengaturanhalaman/section3_2/hapus3_2/hapus3_2.php';
            break;

            // ===================== END SECTION 3_2 ===================================


            // =====================FOOTER ===================================
            // add
        case 'addfooter':
            include './pages/pengaturanhalaman/footer/addfooter/addfooter.php';
            break;

            // edit
        case 'editfooter':
            include './pages/pengaturanhalaman/footer/editfooter/editfooter.php';
            break;

            // hapus
        case 'hapusfooter':
            include './pages/pengaturanhalaman/footer/hapusfooter/hapusfooter.php';
            break;

            // ===================== END FOOTER ===================================


            // =====================halamanizin ===================================
            // add
        case 'addhalamanizin':
            include './pages/pengaturanhalaman/halamanizin/addhalamanizin/addhalamanizin.php';
            break;

            // edit
        case 'edithalamanizin':
            include './pages/pengaturanhalaman/halamanizin/edithalamanizin/edithalamanizin.php';
            break;

            // hapus
        case 'hapushalamanizin':
            include './pages/pengaturanhalaman/halamanizin/hapushalamanizin/hapushalamanizin.php';
            break;

            // ===================== END halaman izin ===================================

            // =====================halaman izin sipb ===================================
            // add
        case 'addhalamanizinsipb':
            include './pages/pengaturanhalaman/halamanizinsipb/addhalamanizinsipb/addhalamanizinsipb.php';
            break;

            // edit
        case 'edithalamanizinsipb':
            include './pages/pengaturanhalaman/halamanizinsipb/edithalamanizinsipb/edithalamanizinsipb.php';
            break;

            // hapus
        case 'hapushalamanizinsipb':
            include './pages/pengaturanhalaman/halamanizinsipb/hapushalamanizinsipb/hapushalamanizinsipb.php';
            break;

            // ===================== END halaman izin sipb ===================================


            // =====================SECTION Halaman Pengaduan ===================================
            // add
        case 'addhalamanpengaduan':
            include './pages/pengaturanhalaman/halamanpengaduan/addhalamanpengaduan/addhalamanpengaduan.php';
            break;

            // edit
        case 'edithalamanpengaduan':
            include './pages/pengaturanhalaman/halamanpengaduan/edithalamanpengaduan/edithalamanpengaduan.php';
            break;

            // hapus
        case 'hapushalamanpengaduan':
            include './pages/pengaturanhalaman/halamanpengaduan/hapushalamanpengaduan/hapushalamanpengaduan.php';
            break;

            // ===================== END Halaman Pengaduan ===================================


            // =====================SECTION Halaman Pengaduan (ALAMAT) ===================================
            // add
        case 'addhalamanpengaduanalamat':
            include './pages/pengaturanhalaman/halamanpengaduanalamat/addhalamanpengaduanalamat/addhalamanpengaduanalamat.php';
            break;

            // edit
        case 'edithalamanpengaduanalamat':
            include './pages/pengaturanhalaman/halamanpengaduanalamat/edithalamanpengaduanalamat/edithalamanpengaduanalamat.php';
            break;

            // hapus
        case 'hapushalamanpengaduanalamat':
            include './pages/pengaturanhalaman/halamanpengaduanalamat/hapushalamanpengaduanalamat/hapushalamanpengaduanalamat.php';
            break;

            // ===================== END Halaman Pengaduan (ALAMAT) ===================================


            // =====================SECTION Halaman Pengaduan (EMAIL DAN KONTAK) ===================================
            // add
        case 'addhalamanpengaduanemail':
            include './pages/pengaturanhalaman/halamanpengaduanemail/addhalamanpengaduanemail/addhalamanpengaduanemail.php';
            break;

            // edit
        case 'edithalamanpengaduanemail':
            include './pages/pengaturanhalaman/halamanpengaduanemail/edithalamanpengaduanemail/edithalamanpengaduanemail.php';
            break;

            // hapus
        case 'hapushalamanpengaduanemail':
            include './pages/pengaturanhalaman/halamanpengaduanemail/hapushalamanpengaduanemail/hapushalamanpengaduanemail.php';
            break;

            // ===================== END Halaman Pengaduan (KONTAK) ===================================


            // add
        case 'addhalamanpengaduankontak':
            include './pages/pengaturanhalaman/halamanpengaduankontak/addhalamanpengaduankontak/addhalamanpengaduankontak.php';
            break;

            // edit
        case 'edithalamanpengaduankontak':
            include './pages/pengaturanhalaman/halamanpengaduankontak/edithalamanpengaduankontak/edithalamanpengaduankontak.php';
            break;

            // hapus
        case 'hapushalamanpengaduankontak':
            include './pages/pengaturanhalaman/halamanpengaduankontak/hapushalamanpengaduankontak/hapushalamanpengaduankontak.php';
            break;



            // ===================== END Halaman Pengaduan (KONTAK) ===================================


            // ===================== PROSES DELETE PENGADUAN ===================================
            // tanggapipengaduan
        case 'tanggapipengaduan':
            include './pages/pengaduanadmin/tanggapipengaduan/tanggapipengaduan.php';
            break;

            // prosestanggapanadmin
        case 'prosestanggapanadmin':
            include './pages/pengaduanadmin/prosestanggapanadmin/prosestanggapanadmin.php';
            break;

            // prosesdeletepengaduan
        case 'prosesdeletepengaduan':
            include './pages/pengaduanadmin/prosesdeletepengaduan/prosesdeletepengaduan.php';
            break;




            // dataizinklinik
        case 'dataizinklinik':
            include './pages/dataizinklinik/dataizinklinik.php';
            break;

            // dataizinklinik
        case 'hapusizinklinik':
            include './pages/dataizinklinik/hapusizinklinik/hapusizinklinik.php';
            break;

            // dataizinsipb
        case 'dataizinsipb':
            include './pages/dataizinsipb/dataizinsipb.php';
            break;
            // pengaduan
        case 'pengaduanadmin':
            include './pages/pengaduanadmin/pengaduanadmin.php';
            break;

            // tanggapi pengaduan
        case 'tanggapipengaduan':
            include './pages/pengaduanadmin/tanggapipengaduan/tanggapipengaduan.php';
            break;

        case 'acceptizinklinik':
            include './pages/dataizinklinik/acceptizinklinik/acceptizinklinik.php';
            break;

        case 'rejectizinklinik':
            include './pages/dataizinklinik/rejectizinklinik/rejectizinklinik.php';
            break;

        case 'acceptizinsipb':
            include './pages/dataizinsipb/acceptizinsipb/acceptizinsipb.php';
            break;

        case 'rejectizinsipb':
            include './pages/dataizinsipb/rejectizinsipb/rejectizinsipb.php';
            break;

        case 'hapusizinkliniksipb':
            include './pages/dataizinsipb/hapusizinkliniksipb/hapusizinkliniksipb.php';
            break;

        case 'izinterbitsipb':
            include './pages/dataizinsipb/izinterbitsipb/izinterbitsipb.php';
            break;
    }
} else {
    include './pages/beranda/beranda.php';
}
