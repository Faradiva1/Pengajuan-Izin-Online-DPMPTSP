-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 02:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `divaboltim`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_izin`
--

CREATE TABLE `daftar_izin` (
  `id` int(11) NOT NULL,
  `izin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_izin`
--

INSERT INTO `daftar_izin` (`id`, `izin`) VALUES
(1, 'Izin Klinik (Klinik)'),
(2, 'Surat Izin Praktik Bidan (SIPB)'),
(3, 'Surat Izin Praktik Perawat (SIPP)'),
(4, 'Surat Izin Praktik Tenaga Teknis Kefarmasian'),
(5, 'Surat Izin Praktik Apoteker');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_upload` int(10) NOT NULL,
  `feedback_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `id_user`, `id_upload`, `feedback_text`, `created_at`) VALUES
(24, 28, 17, 'ktp anda salaah', '2023-10-09 13:29:48'),
(25, 28, 64, 'Ktp anda tidak terbaca di capil', '2023-10-10 05:17:00'),
(26, 28, 74, 'ktp tidak sinkron atau tidak terbaca', '2023-10-24 03:25:38'),
(27, 28, 75, 'Ktp tidak terdaftar di Capil Bolaang Mongondow Timur', '2024-03-13 12:29:47'),
(28, 32, 76, 'rekomendasi dinkes tidak sesuai', '2024-03-22 01:36:36'),
(29, 32, 77, 'hsdjasdjsajd', '2024-03-22 01:46:26'),
(30, 32, 78, 'hjbhgfsu', '2024-03-22 01:54:24'),
(31, 33, 79, 'dsafsfasfafs', '2024-03-23 17:13:24'),
(32, 28, 80, 'saaatt', '2024-03-25 05:37:29'),
(33, 31, 81, 'saaatt!', '2024-03-25 05:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_sipb`
--

CREATE TABLE `feedback_sipb` (
  `id_feedback` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_upload` int(11) NOT NULL,
  `feedback_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback_sipb`
--

INSERT INTO `feedback_sipb` (`id_feedback`, `id_user`, `id_upload`, `feedback_text`, `created_at`) VALUES
(4, 28, 17, 'cbsahbc', '2023-10-09 13:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `footer_data`
--

CREATE TABLE `footer_data` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `footer_data`
--

INSERT INTO `footer_data` (`id`, `title`, `address`, `phone`, `email`, `twitter_link`, `facebook_link`, `instagram_link`, `youtube_link`) VALUES
(3, 'DPMPTSP KAB. BOLAANG MONGONDOW TIMUR', 'Jln. Trans Sulawesi Lingkar Selatan. Kabupaten Bolaang Mongondow Timur, Provinsi: Sulawesi Utara', '123123321', 'support@dpmptsp-boltim.com', 'https://twitter.com/dpmptsp_boltim', 'https://www.facebook.com/dpmptsp_boltim', 'https://www.instagram.com/dpmptsp_boltim/', 'https://www.youtube.com/c/dpmptsp_boltim'),
(5, 'DSJHFJSkhdfkjsahf', 'dshfjhijsdjf\r\n\r\n\r\n', '389498324', 'mokoagowfaradiva@gmail.com', 'efdjfjsdkljfs', 'sdjhfdsfsudf', 'dsfhsduhfudshfusihf', 'sjdhfuisdhfusdf');

-- --------------------------------------------------------

--
-- Table structure for table `form_pengaduan`
--

CREATE TABLE `form_pengaduan` (
  `id_form_pengaduan` int(11) NOT NULL,
  `nama_pengadu` varchar(255) NOT NULL,
  `email_pengadu` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `isi_pengaduan` text NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_pengaduan`
--

INSERT INTO `form_pengaduan` (`id_form_pengaduan`, `nama_pengadu`, `email_pengadu`, `subject`, `isi_pengaduan`, `tanggal_dibuat`, `id_user`) VALUES
(9, '', 'asa@asasas', 'sa', 'sasas', '2023-09-25 16:27:16', 15),
(11, '', 'sadasd@sdasdas', 'sada', 'sdasdasda', '2023-09-25 23:56:56', 28);

-- --------------------------------------------------------

--
-- Table structure for table `form_pengaduan1`
--

CREATE TABLE `form_pengaduan1` (
  `id_form_pengaduan` int(11) NOT NULL,
  `nama_pengadu` varchar(255) DEFAULT NULL,
  `email_pengadu` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `isi_pengaduan` text DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_pengaduan1`
--

INSERT INTO `form_pengaduan1` (`id_form_pengaduan`, `nama_pengadu`, `email_pengadu`, `subject`, `isi_pengaduan`, `tanggal_dibuat`) VALUES
(2, 'knknk', 'knknk@kn', 'knkn', 'knknk', '2023-10-09 05:50:12'),
(3, 'Frendy', 'endy@gmail.com', 'Harga bawang mahal', 'Harga bawang saat ini terlalu mahal, yang membuat  pembuatan miedal tidak menggunakan bawang', '2024-03-26 05:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_logos`
--

CREATE TABLE `gambar_logos` (
  `id` int(11) NOT NULL,
  `gambar_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gambar_logos`
--

INSERT INTO `gambar_logos` (`id`, `gambar_url`) VALUES
(10, 'Ro_7hJbB_400x400.jpeg'),
(11, 'logo-kemenkes_landscape.jpg'),
(12, 'Departemen_Pekerjaan_Umum-logo-7E29323DFE-seeklogo.com.png'),
(13, 'LogoBKPM.png'),
(14, 'Lambang_Kementerian_Lingkungan_Hidup_dan_Kehutanan.png'),
(15, 'Logo_Kementerian_Perdagangan_Republik_Indonesia_(2021).svg.png');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_satu`
--

CREATE TABLE `gambar_satu` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gambar_satu`
--

INSERT INTO `gambar_satu` (`id`, `judul`, `deskripsi`, `gambar_url`) VALUES
(2, 'PERIZINAN', 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu (DPMPTSP) Bolaang Mongondow Timur adalah mitra utama dalam mendukung investasi dan pertumbuhan ekonomi di wilayah ini. Kami memahami betapa pentingnya peran pengusaha dan pemohon izin dalam menciptakan lapangan kerja, menggerakkan perekonomian, dan meningkatkan kesejahteraan masyarakat. Oleh karena itu, kami telah berkomitmen untuk memberikan layanan terbaik dalam proses pengajuan izin usaha. Kami menawarkan kemudahan dan efisiensi melalui pelayanan terpadu satu pintu, yang memungkinkan Anda mengurus semua izin dan perizinan di satu tempat.', 'WhatsApp Image 2023-10-13 at 08.22.20 (2).jpeg'),
(3, 'PERIZINAN BERUSAHA', 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu (DPMPTSP) Kab. Bolaang Mongondow Timur melaksanakan Sosialisasi Implementasi Perizinan Berusaha Berbasis Resiko dan Implementasi Pengawasan Perizinan Berusaha Berbasis Resiko Tahun 2023 pada pelaku usaha di wilayah Kecamatan Tutuyan dan Kotabunan yang dilaksanakan di CEO Cafe, Selasa s.d Rabu (29-30 Agustus 2023). Proses pengajuan izin melalui DPMPTSP Bolaang Mongondow Timur didesain agar menjadi pengalaman yang transparan. Kami menjelaskan dengan jelas setiap tahap dalam proses ini, sehingga Anda dapat mengikuti perkembangan pengajuan izin Anda dengan nyaman. Kami juga memastikan bahwa seluruh proses berjalan sesuai dengan peraturan dan persyaratan yang berlaku, memberikan keamanan hukum bagi investasi dan usaha Anda.', 'WhatsApp Image 2023-10-13 at 08.18.02.jpeg'),
(4, 'PELAYANAN', 'DPMPTSP Bolaang Mongondow Timur adalah pilihan terbaik untuk mereka yang menginginkan pelayanan yang mudah, transparan, dan berkomitmen pada pertumbuhan ekonomi yang berkelanjutan. Kami di sini untuk Anda, siap mendukung kesuksesan investasi Anda di Bolaang Mongondow Timur.', 'WhatsApp Image 2023-10-13 at 08.20.31.jpeg'),
(5, 'PERIZINAN SUKES', 'Kami menganggap Anda sebagai mitra dalam menggerakkan roda ekonomi Bolaang Mongondow Timur. DPMPTSP kami siap bekerja sama dengan Anda dalam setiap langkah pengajuan izin dan investasi Anda. Kami mengajak Anda untuk segera menghubungi kami dan memulai proses pengajuan izin usaha Anda. Kami siap membantu Anda mewujudkan rencana bisnis dan investasi Anda di wilayah kami.', 'WhatsApp Image 2023-10-13 at 08.17.05.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `halaman_pengaduan`
--

CREATE TABLE `halaman_pengaduan` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `halaman_pengaduan`
--

INSERT INTO `halaman_pengaduan` (`id`, `judul`, `deskripsi`) VALUES
(1, 'LAKUKAN PENGADUAN', 'Lakukan Pengaduan kepada kami jika anda memiliki pertanyaan atau mendapatkan masalah');

-- --------------------------------------------------------

--
-- Table structure for table `informasi_section_tiga`
--

CREATE TABLE `informasi_section_tiga` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar_url` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `checklist_1` text NOT NULL,
  `checklist_2` text NOT NULL,
  `checklist_3` text NOT NULL,
  `checklist_4` text NOT NULL,
  `checklist_5` text NOT NULL,
  `checklist_6` text NOT NULL,
  `checklist_7` text NOT NULL,
  `checklist_8` text NOT NULL,
  `checklist_9` text NOT NULL,
  `checklist_10` text NOT NULL,
  `checklist_11` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informasi_section_tiga`
--

INSERT INTO `informasi_section_tiga` (`id`, `judul`, `gambar_url`, `deskripsi`, `checklist_1`, `checklist_2`, `checklist_3`, `checklist_4`, `checklist_5`, `checklist_6`, `checklist_7`, `checklist_8`, `checklist_9`, `checklist_10`, `checklist_11`) VALUES
(5, 'Lakukan Pengajuan Izin Klinik', 'features-1.png', 'Izin Klinik adalah Izin untuk Fasilitas pelayanan kesehatan yang menyelenggarakan pelayanan kesehatan perorangan yang menyediakan pelayanan medis dasar dan atau Spesialistik baik yang dimiliki pemerintah, pemerintah daerah atau masyrakat dengan rawat inap.', 'Scanan KTP Asli Pemohon.', 'Foto Akta Pendirian Badan Usaha kecuali untuk kepemilikan perorangan.', 'Surat Persetujuan lokasi dari Pemerintah setempat.', 'Foto Bukti hak kepemilikan atau penggunaan tanah atau izin penggunaan bangunan untuk penyelenggaraan kegiatan bagi milik pribadi atau surat kontrak minimal 5 tahun bagi menyewa bangunan untuk penyelenggaraan kegiatan.', 'Izin lingkungan hidup SPKPPLH untuk klinik rawat jalan dan UPL-UKL untuk klinik rawat inap sesuai ketentuan perundang-undangan yang berlaku.', 'Profil Klinik yang akan didirikan meliputi struktur organisasi, tenaga kesehatan, sarana dan prasarana serta pelayanan yang diberikan.', 'Foto Nomor Induk Berusaha (NIB).', 'Surat Pernyataan sebagai dokter penanggung jawab.', 'Surat Izin Praktik (SIP) Dokter penanggung jawab.', 'Daftar tenaga medis/kesehatan yang bekerja di klinik (Sertai foto SIP/SIK).', 'Surat Rekomendasi Dinas Kesehatan Kabupaten Bolaang Mongondow Timur.');

-- --------------------------------------------------------

--
-- Table structure for table `informasi_section_tiga_dua`
--

CREATE TABLE `informasi_section_tiga_dua` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar_url` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `checklist_1` text NOT NULL,
  `checklist_2` text NOT NULL,
  `checklist_3` text NOT NULL,
  `checklist_4` text NOT NULL,
  `checklist_5` text NOT NULL,
  `checklist_6` text NOT NULL,
  `checklist_7` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informasi_section_tiga_dua`
--

INSERT INTO `informasi_section_tiga_dua` (`id`, `judul`, `gambar_url`, `deskripsi`, `checklist_1`, `checklist_2`, `checklist_3`, `checklist_4`, `checklist_5`, `checklist_6`, `checklist_7`) VALUES
(3, 'Lakukan Pengajuan Izin Klinik', 'features-2.png', 'SIPB (Surat Izin Praktik Bidan) adalah bukti tertulis yang diberikan oleh pemerintah daerah kabupaten/kota kepada Bidan sebagai pemberian kewenangan untuk menjalankan praktik kebidanan.', 'Scanan KTP Asli Pemohon', 'Scan surat tanda registrasi Bidan atau keterangan Legalitas sebagai Bidan', 'Scan NPWP', 'Foto Peta Lokasi dan denah bangunan', 'Daftar Prasarana, sarana dan peralatan', 'Scan Foto Ijasah terakhir', 'Surat rekomendasi dari Dinas Kesehatan Kabupaten Bolaang Mongondow Timur');

-- --------------------------------------------------------

--
-- Table structure for table `informasi_simpati`
--

CREATE TABLE `informasi_simpati` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informasi_simpati`
--

INSERT INTO `informasi_simpati` (`id`, `judul`, `deskripsi`) VALUES
(1, 'SIMPATI ', 'SIMPATI adalah sistem informasi Manajemen Perizinan Terintegrasi yang dibuat oleh Dinas Penanaman Modal & Pelayanan Terpadu Satu Pintu Bolaang Mongondow Timur. Sistem ini dibuat untuk masyarakat Bolaang Mongondow Timur untuk mengurus Perizinan');

-- --------------------------------------------------------

--
-- Table structure for table `informasi_simpati_section_tiga`
--

CREATE TABLE `informasi_simpati_section_tiga` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informasi_simpati_section_tiga`
--

INSERT INTO `informasi_simpati_section_tiga` (`id`, `judul`, `deskripsi`) VALUES
(1, 'YUK!! AJUKAN IZINMU', 'sasa');

-- --------------------------------------------------------

--
-- Table structure for table `izin_klinik`
--

CREATE TABLE `izin_klinik` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `judul_dua` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_diperbarui` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `izin_klinik`
--

INSERT INTO `izin_klinik` (`id`, `judul`, `judul_dua`, `deskripsi`, `gambar`, `tanggal_dibuat`, `tanggal_diperbarui`) VALUES
(1, 'Izin Klinik', 'Izin Klinik', 'Izin Klinik adalah Izin untuk Fasilitas pelayanan kesehatan yang menyelenggarakan pelayanan kesehatan perorangan yang menyediakan pelayanan medis dasar dan atau Spesialistik baik yang dimiliki pemerintah, pemerintah daerah atau masyrakat dengan rawat inap.', 'WhatsApp Image 2023-12-19 at 18.38.08.jpeg', '2023-09-25 05:25:21', '2024-02-26 14:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `izin_sipb`
--

CREATE TABLE `izin_sipb` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `judul_dua` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_diperbarui` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `izin_sipb`
--

INSERT INTO `izin_sipb` (`id`, `judul`, `judul_dua`, `deskripsi`, `gambar`, `tanggal_dibuat`, `tanggal_diperbarui`) VALUES
(1, 'Izin SIPB', 'Izin SIPB', 'SIPB (Surat Izin Praktik Bidan) adalah bukti tertulis yang diberikan oleh pemerintah daerah kabupaten/kota kepada Bidan sebagai pemberian kewenangan untuk menjalankan praktik kebidanan.', 'WhatsApp Image 2023-12-24 at 13.12.18.jpeg', '2023-09-25 05:41:44', '2024-02-26 14:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `izin_terbit_klinik`
--

CREATE TABLE `izin_terbit_klinik` (
  `id_izin_terbit_klinik` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_upload` int(10) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `nama_pemilik` varchar(25) NOT NULL,
  `upload_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `izin_terbit_klinik`
--

INSERT INTO `izin_terbit_klinik` (`id_izin_terbit_klinik`, `id_user`, `id_upload`, `file_path`, `nama_pemilik`, `upload_timestamp`) VALUES
(21, 28, 63, 'gambardb/izin_terbit_klinik/persetujuan orang tua.pdf', 'Faradiva', '2023-10-09 12:37:49'),
(22, 28, 73, 'gambardb/izin_terbit_klinik/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'sadasd', '2023-10-24 01:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `izin_terbit_sipb`
--

CREATE TABLE `izin_terbit_sipb` (
  `id_izin_terbit_sipb` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_upload` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `upload_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `izin_terbit_sipb`
--

INSERT INTO `izin_terbit_sipb` (`id_izin_terbit_sipb`, `id_user`, `id_upload`, `file_path`, `nama`, `upload_timestamp`) VALUES
(8, 28, 0, 'gambardb/izin_terbit_sipb/CV_Faradiva mokoagow.pdf', 'FARADIVA MOKOAGOW', '2023-10-09 12:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tgl_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id`, `judul`, `deskripsi`, `gambar`, `tgl_dibuat`) VALUES
(11, 'SIMPATI Boltim. Dinas Penanaman Modal & Pelayanan Terpadu Satu Pintu Boltim', 'Sistem Informasi Manajemen Perizinan Terintegrasi Daftarkan diri anda di SIMPATI dan ajukan permohonan izin secara mandiri, dimana dan kapan saja.', 'izin.png', '2023-09-23 09:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `id_pengaduan` int(11) DEFAULT NULL,
  `id_tanggapan_admin` int(11) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `tanggal_notifikasi` timestamp NOT NULL DEFAULT current_timestamp(),
  `dibaca` tinyint(1) DEFAULT 0,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `id_pengaduan`, `id_tanggapan_admin`, `pesan`, `tanggal_notifikasi`, `dibaca`, `id_user`) VALUES
(6, 11, 15, 'Tanggapan admin telah diterima.', '2023-09-26 00:42:20', 0, 28),
(7, 11, 16, 'Tanggapan admin telah diterima.', '2023-09-26 00:43:06', 0, 28),
(8, 11, 17, 'Tanggapan admin telah diterima.', '2023-09-26 11:34:01', 0, 28),
(9, 11, 18, 'Tanggapan admin telah diterima.', '2023-09-26 17:07:15', 0, 28),
(10, 11, 19, 'Tanggapan admin telah diterima.', '2023-09-26 17:24:51', 0, 28),
(11, 9, 20, 'Tanggapan admin telah diterima.', '2023-09-26 17:33:36', 0, 28),
(12, 9, 21, 'Tanggapan admin telah diterima.', '2023-09-26 17:33:53', 0, 28);

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan_alamat`
--

CREATE TABLE `pengaduan_alamat` (
  `id` int(11) NOT NULL,
  `judul_alamat` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan_alamat`
--

INSERT INTO `pengaduan_alamat` (`id`, `judul_alamat`, `alamat`) VALUES
(1, 'Lokasi', 'Jln. Trans Sulawesi Lingkar Selatan. Kabupaten Bolaang Mongondow Timur, Provinsi: Sulawesi Utara');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan_contact`
--

CREATE TABLE `pengaduan_contact` (
  `id` int(11) NOT NULL,
  `judul_kontak` varchar(255) NOT NULL,
  `no_kontak` text NOT NULL,
  `no_kontak_dua` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan_contact`
--

INSERT INTO `pengaduan_contact` (`id`, `judul_kontak`, `no_kontak`, `no_kontak_dua`) VALUES
(1, 'assas', 'asaasa', 'sassa');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan_email`
--

CREATE TABLE `pengaduan_email` (
  `id` int(11) NOT NULL,
  `judul_email` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `kontak` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan_email`
--

INSERT INTO `pengaduan_email` (`id`, `judul_email`, `email`, `kontak`) VALUES
(1, 'Email Us', ' support@dpmptsp-boltim.com', ' support@dpmptsp-boltim.com');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamatpr` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_klinik` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `bentuk_usaha` varchar(50) DEFAULT NULL,
  `jenis_klinik` varchar(50) DEFAULT NULL,
  `nama_penanggung_jawab` varchar(255) NOT NULL,
  `nomorktppj` varchar(16) NOT NULL,
  `alamatpj` varchar(25) NOT NULL,
  `jenis_permohonan` text DEFAULT NULL,
  `keputusan` varchar(50) DEFAULT NULL,
  `respon` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_user`, `nama`, `alamatpr`, `email`, `nama_klinik`, `nama_pemilik`, `kecamatan`, `kelurahan`, `bentuk_usaha`, `jenis_klinik`, `nama_penanggung_jawab`, `nomorktppj`, `alamatpj`, `jenis_permohonan`, `keputusan`, `respon`) VALUES
(512, 15, 'Onal', 'Kilongan', 'Onal RS', 'onal@gmail.com', 'Onal', 'Kotabunan', 'Buyat Barat', 'PO', 'Pratama', 'Onal', '1234', 'Kilongan', 'Izin Mendirikan Klinik', 'Diterima', 1),
(523, 15, 'dsfasf', 'ghf', 'werwer', 'ghf@ssa', 'qewqew', 'Kotabunan', 'Buyat Barat', 'PO', 'Pratama', 'fh', '21414', 'wqqwwqe', 'Izin Mendirikan Klinik', 'Diterima', 1),
(524, 15, 'fdsfg', 'sfsd', 'wwer1', 'dsfs@2sdsadf', 'dsf', 'Kotabunan', 'Buyat Barat', 'PO', 'Pratama', 'sd', '213213', 'qsfsdf', 'Izin Mendirikan Klinik', 'Diterima', 1),
(551, 32, 'cv q', 'kota', 'michael@gmai.com', 'clinik q', 'michael', 'Kotabunan', 'Kotabunan', 'PO', 'Pratama', 'michael', '7111111', 'kota8', 'Izin Operasional Klinik', 'Diterima', 1),
(552, 32, 'jaya abadi-*-', 'ghfghh/', 'Dewisenja200530@gmail.com', 'ahsgd', 'jshadja', 'Kotabunan', 'Buyat Barat', 'PO', 'Pratama', 'hsadhja', '23131', 'sahdjsa', 'Izin Mendirikan Klinik', 'Diterima', 1),
(553, 32, 'FARADIVA MOKOAGOW', 'buyat barat, dusun iii, boltim', 'Dewisenja200530@gmail.com', 'Diva', 'Faradiva', 'Kotabunan', 'Buyat Barat', 'Yayasan', 'Utama', 'Faradiva Mokoagow', '65677654', 'kotabunan', 'Izin Mendirikan Klinik', 'Diterima', 1),
(554, 33, 'jaya selalu', 'afad', 'mokoagowfaradiva@gmail.com', 'DSAAD', 'Faradiva', 'Kotabunan', 'Buyat Barat', 'PO', 'Pratama', 'Indra', '24324242', 'Modayag barat', 'Izin Mendirikan Klinik', 'Diterima', 1),
(555, 28, 'jaya abadi', 'buyat barat, dusun iii, boltim', 'mokoagowfaradiva@gmail.com', 'sadasd', 'adas', 'Kotabunan', 'Buyat Barat', 'PO', 'Pratama', 'jerry', '2131', 'paret', 'Izin Mendirikan Klinik', 'Diterima', 1),
(556, 31, 'FARADIVA MOKOAGOW', 'sDADAD', 'Dewisenja200530@gmail.com', 'Faradila', 'jhdsfjs', 'Kotabunan', 'Buyat Barat', 'PO', 'Pratama', 'Faradiva Mokoagow', '2131', 'kotabunan barat', 'Izin Mendirikan Klinik', 'Diterima', 1),
(557, 34, 'pt jaya udara laut', 'Buyat Barat, Dusun III', 'tinamonolimay@gmail.com', 'Loren', 'Tina', 'Kotabunan', 'Kotabunan Selatan', 'PO', 'Pratama', 'Tina Lorensa', '7210030702520001', 'Desa makmur', 'Izin Mendirikan Klinik', 'Diterima', 1),
(558, 34, 'Rikal Green Cloud', 'Raanan Baru 2', 'endy@gmail.com', 'Kimia Farma', 'Sasuke', 'Kotabunan', 'Buyat Barat', 'PO', 'Pratama', 'Naruto', '1209374928382712', 'Konohagakure', 'Izin Mendirikan Klinik', 'Diterima', 0),
(559, 36, 'sweet home', 'jalan malioboro', 'auliasmln@gmail.com', 'a2f', 'aulia', 'Kotabunan', 'Buyat Barat', 'PO', 'Pratama', 'aulia samlan', '7119283866827346', 'bobakan', 'Izin Mendirikan Klinik', 'Diterima', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_sipb`
--

CREATE TABLE `pengajuan_sipb` (
  `id_pengajuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_tempat_praktik` varchar(255) NOT NULL,
  `alamat_tempat_praktik` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `alamat_lengkap` varchar(255) NOT NULL,
  `no_hp_pemohon` varchar(12) NOT NULL,
  `email_pemohon` varchar(255) NOT NULL,
  `pendidikan_terakhir` varchar(255) NOT NULL,
  `no_str` int(30) NOT NULL,
  `masa_berlaku_str` date NOT NULL,
  `no_rekomendasi` varchar(255) NOT NULL,
  `tanggal_rekomendasi` date NOT NULL,
  `permohonan_sip_ke` int(11) NOT NULL,
  `jenis_sip` varchar(255) NOT NULL,
  `ketersediaan_ruang_tunggu` enum('ada','tidak ada') NOT NULL,
  `ketersediaan_ruang_pemeriksaan` enum('ada','tidak ada') NOT NULL,
  `ketersediaan_ruang_persalinan` enum('ada','tidak ada') NOT NULL,
  `ketersediaan_ruang_rawat_inap` enum('ada','tidak ada') NOT NULL,
  `ketersediaan_wc` enum('ada','tidak ada') NOT NULL,
  `ketersediaan_rppi` enum('ada','tidak ada') NOT NULL,
  `keputusan` varchar(25) NOT NULL,
  `respon` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan_sipb`
--

INSERT INTO `pengajuan_sipb` (`id_pengajuan`, `id_user`, `nama_tempat_praktik`, `alamat_tempat_praktik`, `kecamatan`, `kelurahan`, `no_telepon`, `email`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat_lengkap`, `no_hp_pemohon`, `email_pemohon`, `pendidikan_terakhir`, `no_str`, `masa_berlaku_str`, `no_rekomendasi`, `tanggal_rekomendasi`, `permohonan_sip_ke`, `jenis_sip`, `ketersediaan_ruang_tunggu`, `ketersediaan_ruang_pemeriksaan`, `ketersediaan_ruang_persalinan`, `ketersediaan_ruang_rawat_inap`, `ketersediaan_wc`, `ketersediaan_rppi`, `keputusan`, `respon`) VALUES
(47, 28, 'rm diva', 'Buyat Barat, Kotabunan ', 'Kotabunan', 'Buyat Barat', '2313131', 'mokoagowfaradiva@gmail.com', '7110027003020001', 'PT kilo', 'rT', '2000-02-12', 'Perempuan', 'ewrwer', '13131231', 'mokoagowfaradiva@gmail.com', 'S2', 42, '2024-04-06', '4234', '2024-03-01', 2, 'Bidan', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'Diterima', 0),
(48, 28, 'rm diva', 'Buyat Barat, Kotabunan ', 'Kotabunan', 'Buyat Barat', '2313131', 'mokoagowfaradiva@gmail.com', '7110027003020001', 'PT kilo', 'rT', '2000-02-12', 'Perempuan', 'ewrwer', '13131231', 'mokoagowfaradiva@gmail.com', 'S2', 42, '2024-04-06', '4234', '2024-03-01', 2, 'Bidan', 'tidak ada', 'tidak ada', 'ada', 'ada', 'ada', 'ada', 'Diterima', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan_admin`
--

CREATE TABLE `tanggapan_admin` (
  `id` int(11) NOT NULL,
  `id_pengaduan` int(11) DEFAULT NULL,
  `tanggapan` text DEFAULT NULL,
  `tanggal_tanggapan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tanggapan_admin`
--

INSERT INTO `tanggapan_admin` (`id`, `id_pengaduan`, `tanggapan`, `tanggal_tanggapan`) VALUES
(15, 11, 'asas', '2023-09-26 00:42:20'),
(16, 11, 'asas', '2023-09-26 00:43:06'),
(17, 11, 'sdssdfdggdsjksdhsdjgdshjgdsjkgdsgd', '2023-09-26 11:34:01'),
(18, 11, 'sasa', '2023-09-26 17:07:15'),
(19, 11, 'yoi bro\r\n', '2023-09-26 17:24:51'),
(20, 9, 'Anjas KELAZZZ', '2023-09-26 17:33:36'),
(21, 9, 'Anjas KELAZZZ', '2023-09-26 17:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id_upload` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `waktu_upload` date DEFAULT current_timestamp(),
  `ktp` varchar(255) NOT NULL,
  `akta_pendirian` varchar(255) NOT NULL,
  `surat_lokasi` varchar(255) NOT NULL,
  `bukti_hak` varchar(255) NOT NULL,
  `izin_lingkungan` varchar(255) NOT NULL,
  `profil_klinik` varchar(255) NOT NULL,
  `nib` varchar(255) NOT NULL,
  `surat_dokter` varchar(255) NOT NULL,
  `sip_dokter` varchar(255) NOT NULL,
  `daftar_tenaga` varchar(255) NOT NULL,
  `surat_rekomendasi` varchar(255) NOT NULL,
  `status` enum('Setuju','Ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id_upload`, `id_user`, `id_pengajuan`, `waktu_upload`, `ktp`, `akta_pendirian`, `surat_lokasi`, `bukti_hak`, `izin_lingkungan`, `profil_klinik`, `nib`, `surat_dokter`, `sip_dokter`, `daftar_tenaga`, `surat_rekomendasi`, `status`) VALUES
(74, 28, 536, '2023-10-24', 'uploads/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploads/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploads/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploads/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploads/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploads/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploads/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploads/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploads/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploads/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploads/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'Ditolak'),
(75, 28, 545, '2024-02-26', 'uploads/Sistem Perizinan - Index.pdf', 'uploads/Sistem Perizinan - Index.pdf', 'uploads/Sistem Perizinan - Index.pdf', 'uploads/Sistem Perizinan - Index.pdf', 'uploads/Sistem Perizinan - Index.pdf', 'uploads/Sistem Perizinan - Index.pdf', 'uploads/Sistem Perizinan - Index.pdf', 'uploads/Sistem Perizinan - Index.pdf', 'uploads/Sistem Perizinan - Index.pdf', 'uploads/Sistem Perizinan - Index.pdf', 'uploads/Sistem Perizinan - Index.pdf', 'Ditolak'),
(76, 32, 551, '2024-03-22', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/425-1167-1-PB (1).pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'Ditolak'),
(77, 32, 552, '2024-03-22', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'Ditolak'),
(78, 32, 553, '2024-03-22', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'Ditolak'),
(79, 33, 554, '2024-03-23', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'Ditolak'),
(80, 28, 555, '2024-03-25', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/BUMI TOTABUAN.pdf', 'uploads/UU Nomor 19 Tahun 2003.pdf', 'uploads/UU Nomor 19 Tahun 2003.pdf', 'uploads/UU Nomor 19 Tahun 2003.pdf', 'uploads/JADWAL KEGIATAN PERKEMAHAN-2.pdf', 'uploads/UU Nomor 19 Tahun 2003.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/UU Nomor 19 Tahun 2003.pdf', 'Ditolak'),
(81, 31, 556, '2024-03-25', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/15759-47391-1-PB.pdf', 'uploads/15759-47391-1-PB.pdf', 'uploads/15759-47391-1-PB.pdf', 'uploads/15759-47391-1-PB.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/11. SPA 2 NELVA NANO (1) _koreksi ncNv.pdf', 'uploads/15759-47391-1-PB.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'Ditolak'),
(82, 34, 557, '2024-03-26', 'uploads/BUMI TOTABUAN.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploads/persetujuan orang tua.pdf', 'uploads/scribd.vdownloaders.com_susunan-acara-mubes-ix.pdf', 'uploads/Bukti Pendaftaran_FARADIVA MOKOAGOW_Junior Web Developer (1).pdf', 'uploads/1632-Article Text-5671-1-10-20220525.pdf', 'uploads/UNDANGAN_KEMAH_BAKTI_PENEGAKPRAMUKA_PAHLAWAN_KWARCAB_BOLTIM.pdf', 'uploads/UU Nomor 19 Tahun 2003.pdf', 'uploads/scribd.vdownloaders.com_susunan-acara-mubes-ix.pdf', 'uploads/BAB II LANDASAN TEORI.pdf', NULL),
(83, 36, 559, '2024-03-26', 'uploads/UU Nomor 19 Tahun 2003.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/UU Nomor 19 Tahun 2003.pdf', 'uploads/UU Nomor 19 Tahun 2003.pdf', 'uploads/UU Nomor 19 Tahun 2003.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', 'uploads/Lampiran Perwako SPM.pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `upload_sipb`
--

CREATE TABLE `upload_sipb` (
  `id_upload_sipb` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `waktu_upload` date DEFAULT current_timestamp(),
  `ktp` varchar(255) NOT NULL,
  `regis_bidan` varchar(255) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `foto_lokasi` varchar(255) NOT NULL,
  `daftar_sarana_prasarana` varchar(255) NOT NULL,
  `ijazah_terakhir` varchar(255) NOT NULL,
  `surat_rekomendasi` varchar(255) NOT NULL,
  `status` enum('Setuju','Ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upload_sipb`
--

INSERT INTO `upload_sipb` (`id_upload_sipb`, `id_user`, `id_pengajuan`, `waktu_upload`, `ktp`, `regis_bidan`, `npwp`, `foto_lokasi`, `daftar_sarana_prasarana`, `ijazah_terakhir`, `surat_rekomendasi`, `status`) VALUES
(16, 28, 4, '2023-10-09', 'uploadsipb/CV_Faradiva mokoagow.pdf', 'uploadsipb/CV_Faradiva mokoagow.pdf', 'uploadsipb/CV_Faradiva mokoagow.pdf', 'uploadsipb/CV_Faradiva mokoagow.pdf', 'uploadsipb/CV_Faradiva mokoagow.pdf', 'uploadsipb/CV_Faradiva mokoagow.pdf', 'uploadsipb/CV_Faradiva mokoagow.pdf', 'Setuju'),
(17, 28, 5, '2023-10-09', 'uploadsipb/CV_Faradiva mokoagow.pdf', 'uploadsipb/CV_Faradiva mokoagow.pdf', 'uploadsipb/CV_Faradiva mokoagow.pdf', 'uploadsipb/CV_Faradiva mokoagow.pdf', 'uploadsipb/CV_Faradiva mokoagow.pdf', 'uploadsipb/CV_Faradiva mokoagow.pdf', 'uploadsipb/CV_Faradiva mokoagow.pdf', NULL),
(18, 28, 7, '2023-10-17', 'uploadsipb/ADART Edelweis(1).pdf', 'uploadsipb/ADART Edelweis(1).pdf', 'uploadsipb/ADART Edelweis(1).pdf', 'uploadsipb/ADART Edelweis(1).pdf', 'uploadsipb/ADART Edelweis(1).pdf', 'uploadsipb/ADART Edelweis(1).pdf', 'uploadsipb/ADART Edelweis(1).pdf', NULL),
(19, 28, 9, '2023-11-01', 'uploadsipb/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploadsipb/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploadsipb/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploadsipb/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploadsipb/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploadsipb/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploadsipb/scribd.vdownloaders.com_juknis-hut-ok.pdf', NULL),
(20, 28, 8, '2023-11-01', 'uploadsipb/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploadsipb/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploadsipb/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploadsipb/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploadsipb/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploadsipb/scribd.vdownloaders.com_juknis-hut-ok.pdf', 'uploadsipb/scribd.vdownloaders.com_juknis-hut-ok.pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`) VALUES
(9, 'admin', '$2y$10$D3FJsJX.M4zUEUgsrrDnzeiZQOTmTmJYCsUpWOxoD8hv/RqLMqdUG', 'admin'),
(14, 'admin2', '$2y$10$.c6qTPrxPEoNnpggrmA0COdLuHadld2fWSleCxhAJnQ..U8WMtZtW', 'admin'),
(15, 'user1', '$2y$10$QJYW5YP3GoEayLyjmsVdIu6RigNDePhBo/92qD1JgZxdrFIbt6ZXq', 'user'),
(16, 'user2', '$2y$10$pODOHXAdyk3uczA1poA/luAphvCMSVzczw/rb2BxEaOR59zOg6BEq', 'user'),
(20, 'admin', '$2y$10$BLrkhytq7h60OkvtXuJVL.7iU9p6F2feZR4k6IrcDQYd1Kd7IJOUi', 'admin'),
(21, 'zidan', 'zidan', 'admin'),
(22, 'zidan', '$2y$10$RDq1pm3erpKyf9ncOWgzC..L1/Q6kwHpj.n8VMQKXe2ZWPuxzMbN6', 'admin'),
(23, 'sudosu', '$2y$10$txmTK5HVUcJPHtThekImXexS2VhJSql0AoqGDZpoEilttzjgSn//O', 'admin'),
(24, 'user3', '$2y$10$4AxX78JCpwO6p8fgMIVRnekCRcysMdoz3yrpF4uNzzmHdYGa/fUyC', 'user'),
(25, 'user5', '$2y$10$WR72xOrbaNY1CrdWbWkmful50G9mPU5tKYcuKuJcBHxCsr/uYDpO6', 'user'),
(26, 'admin', '$2y$10$sDvTujsIVsygbg/1F/wiCuun3sMcKPZrzimqm5mYyPOrFEreLYrZi', 'admin'),
(27, 'camel', '$2y$10$KSfeuFxBIq8rYApVdk4XfuNrihFm3eHiVRkPnrdd4ruoBEYZnKNbm', 'admin'),
(28, 'anjas', '$2y$10$FksfNkSYFyJJrSfVQX8fQeauvt86P/RxRi.jTMrGoYrZX70BE1Yle', 'user'),
(29, 'ini', '$2y$10$9TP/PL3PWASx0kMth7NLlOx1VcFPH43M0OQedhURzLR9/f47dUwSi', 'user'),
(30, 'diva', '$2y$10$ACkoHv0PctprdeYt24tO6umYbELxwcHgBSdyQ5Md1X.DDi0LPHa1m', 'user'),
(31, 'faradiva', '$2y$10$rpnQXX16o4Z2ZDCF7kh8OOgnFSOV309gJxJ7g5xmyyem3VhjRDkUS', 'user'),
(32, 'michael', '$2y$10$aHjORrv4QQwJ04.6hb5jkOXr3X3WS12VgI9Ql6r5Dgm9yNn7Pil7K', 'user'),
(33, 'nelva', '$2y$10$OdCR3fxMd6tkwoD14coXN.txh7AafJXpfw5efmH.zg37K5ewH5En2', 'user'),
(34, 'tina', '$2y$10$afKmpGrTQS.scp9I9VF2AO9SIuNvZWwZkvT2XFmnGa5ww5YLuiwVG', 'user'),
(35, 'frendy', '$2y$10$rlJp3MryBgdGdqds6sc87OFtbltdiHfqgn7UzwCrK4rJ/9tA82p1y', 'user'),
(36, 'aulia samlan', '$2y$10$5NnqAHjK7FoY5P5wK5X74ONLOvobxZPi/J8tbqHjXVvrtqmIKU/2G', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_izin`
--
ALTER TABLE `daftar_izin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `user_id` (`id_user`);

--
-- Indexes for table `feedback_sipb`
--
ALTER TABLE `feedback_sipb`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `user_id` (`id_user`);

--
-- Indexes for table `footer_data`
--
ALTER TABLE `footer_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_pengaduan`
--
ALTER TABLE `form_pengaduan`
  ADD PRIMARY KEY (`id_form_pengaduan`),
  ADD UNIQUE KEY `id_user_3` (`id_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `form_pengaduan1`
--
ALTER TABLE `form_pengaduan1`
  ADD PRIMARY KEY (`id_form_pengaduan`);

--
-- Indexes for table `gambar_logos`
--
ALTER TABLE `gambar_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar_satu`
--
ALTER TABLE `gambar_satu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halaman_pengaduan`
--
ALTER TABLE `halaman_pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi_section_tiga`
--
ALTER TABLE `informasi_section_tiga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi_section_tiga_dua`
--
ALTER TABLE `informasi_section_tiga_dua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi_simpati`
--
ALTER TABLE `informasi_simpati`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi_simpati_section_tiga`
--
ALTER TABLE `informasi_simpati_section_tiga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `izin_klinik`
--
ALTER TABLE `izin_klinik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `izin_sipb`
--
ALTER TABLE `izin_sipb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `izin_terbit_klinik`
--
ALTER TABLE `izin_terbit_klinik`
  ADD PRIMARY KEY (`id_izin_terbit_klinik`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `izin_terbit_sipb`
--
ALTER TABLE `izin_terbit_sipb`
  ADD PRIMARY KEY (`id_izin_terbit_sipb`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_user` (`id_user`);

--
-- Indexes for table `pengaduan_alamat`
--
ALTER TABLE `pengaduan_alamat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan_contact`
--
ALTER TABLE `pengaduan_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan_email`
--
ALTER TABLE `pengaduan_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `pengajuan_sipb`
--
ALTER TABLE `pengajuan_sipb`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `tanggapan_admin`
--
ALTER TABLE `tanggapan_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengaduan` (`id_pengaduan`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id_upload`);

--
-- Indexes for table `upload_sipb`
--
ALTER TABLE `upload_sipb`
  ADD PRIMARY KEY (`id_upload_sipb`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_izin`
--
ALTER TABLE `daftar_izin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `feedback_sipb`
--
ALTER TABLE `feedback_sipb`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `footer_data`
--
ALTER TABLE `footer_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `form_pengaduan`
--
ALTER TABLE `form_pengaduan`
  MODIFY `id_form_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `form_pengaduan1`
--
ALTER TABLE `form_pengaduan1`
  MODIFY `id_form_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gambar_logos`
--
ALTER TABLE `gambar_logos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gambar_satu`
--
ALTER TABLE `gambar_satu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `halaman_pengaduan`
--
ALTER TABLE `halaman_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `informasi_section_tiga`
--
ALTER TABLE `informasi_section_tiga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `informasi_section_tiga_dua`
--
ALTER TABLE `informasi_section_tiga_dua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `informasi_simpati`
--
ALTER TABLE `informasi_simpati`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `informasi_simpati_section_tiga`
--
ALTER TABLE `informasi_simpati_section_tiga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `izin_klinik`
--
ALTER TABLE `izin_klinik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `izin_sipb`
--
ALTER TABLE `izin_sipb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `izin_terbit_klinik`
--
ALTER TABLE `izin_terbit_klinik`
  MODIFY `id_izin_terbit_klinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `izin_terbit_sipb`
--
ALTER TABLE `izin_terbit_sipb`
  MODIFY `id_izin_terbit_sipb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengaduan_alamat`
--
ALTER TABLE `pengaduan_alamat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengaduan_contact`
--
ALTER TABLE `pengaduan_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengaduan_email`
--
ALTER TABLE `pengaduan_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=560;

--
-- AUTO_INCREMENT for table `pengajuan_sipb`
--
ALTER TABLE `pengajuan_sipb`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tanggapan_admin`
--
ALTER TABLE `tanggapan_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id_upload` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `upload_sipb`
--
ALTER TABLE `upload_sipb`
  MODIFY `id_upload_sipb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `feedback_sipb`
--
ALTER TABLE `feedback_sipb`
  ADD CONSTRAINT `feedback_sipb_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `form_pengaduan`
--
ALTER TABLE `form_pengaduan`
  ADD CONSTRAINT `form_pengaduan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `izin_terbit_klinik`
--
ALTER TABLE `izin_terbit_klinik`
  ADD CONSTRAINT `izin_terbit_klinik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `izin_terbit_sipb`
--
ALTER TABLE `izin_terbit_sipb`
  ADD CONSTRAINT `izin_terbit_sipb_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `tanggapan_admin`
--
ALTER TABLE `tanggapan_admin`
  ADD CONSTRAINT `tanggapan_admin_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `form_pengaduan` (`id_form_pengaduan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
