-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 04:22 PM
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
-- Database: `dwp_pupr`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_about`
--

CREATE TABLE `tb_about` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `files` varchar(100) NOT NULL,
  `date_insert` varchar(20) NOT NULL,
  `date_update` varchar(20) NOT NULL,
  `type` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_about`
--

INSERT INTO `tb_about` (`id`, `image`, `description`, `files`, `date_insert`, `date_update`, `type`) VALUES
(1, 'dwp-gorontalo.jpg_658a9f676ee23.jpg', '<p>Dharma Wanita Persatuan Pekerja Kementerian Pekerjaan Umum dan Perumahan Rakyat (Dharma Wanita PUPR) adalah sebuah organisasi yang bergerak di lingkungan Kementerian Pekerjaan Umum dan Perumahan Rakyat Republik Indonesia. Organisasi ini didirikan dengan tujuan untuk meningkatkan kesejahteraan dan kualitas hidup anggota, serta berperan aktif dalam pembangunan nasional.</p><p>Dharma Wanita PUPR merupakan bagian dari Dharma Wanita Persatuan Republik Indonesia (DWP RI), yang merupakan organisasi serupa yang memiliki cakupan nasional dan melibatkan istri atau anggota keluarga pegawai negeri sipil di berbagai kementerian dan lembaga di Indonesia.</p><p>Fungsi utama dari Dharma Wanita PUPR melibatkan kegiatan sosial, pendidikan, dan keagamaan guna mendukung pengembangan pribadi anggotanya, serta berkontribusi pada pembangunan di bidang pekerjaan umum dan perumahan rakyat. Organisasi ini seringkali juga terlibat dalam kegiatan amal, sosial, dan kemanusiaan untuk membantu masyarakat dan lingkungan sekitarnya.</p>', 'SURAT PEMBERITAHUAN - LPA-PKP Regional Gorontalo.pdf', '', '2023-12-26 17:56', 'update');

-- --------------------------------------------------------

--
-- Table structure for table `tb_attendances`
--

CREATE TABLE `tb_attendances` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_work_program` int(11) NOT NULL,
  `tgl` varchar(255) DEFAULT NULL,
  `clock_in` varchar(255) DEFAULT NULL,
  `clock_out` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_attendances`
--

INSERT INTO `tb_attendances` (`id`, `id_user`, `id_work_program`, `tgl`, `clock_in`, `clock_out`, `location`, `description`) VALUES
(44, 20, 6, '2024-01-27', '19-32-57', '19-33-16', '1.4778368,124.8526336', '0'),
(45, 20, 6, '2024-01-29', '1', '1', '1.4778368,124.8526336', 'sakit saya pak'),
(46, 20, 1, '2024-01-28', '1', '1', '1.4778368,124.8526336', 'sakit saya pak'),
(47, 47, 1, '2024-01-28', '1', '1', '1.4778368,124.8526336', 'sakit saya pak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `date_insert` varchar(20) NOT NULL,
  `date_update` varchar(20) NOT NULL,
  `type` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id` int(11) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `alamat` varchar(512) NOT NULL,
  `service_hours` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`id`, `no_telp`, `email`, `facebook`, `instagram`, `alamat`, `service_hours`) VALUES
(1, '082346455079', 'singgimokodompit@gmail.com', 'singgimokodompit.it', 'singgi_mokodompit', '<p>Jl. Prof. Dr. Aloe Saboe, Wongkaditi, Kec. Kota Utara, Kota Gorontalo, Gorontalo 96128</p>', '<p>Senin - Jumat, Pukul. 07.30â€“16.30</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_documents`
--

CREATE TABLE `tb_documents` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_documents`
--

INSERT INTO `tb_documents` (`id`, `title`, `file`, `date`) VALUES
(3, 'Contoh Dokumen', 'LMBR PRSETUJUAN PMBMBING SCAAN.docx_65a6337854228.docx', '2024-01-16'),
(4, 'Permohonan Bidikmisi', 'Surat Permohanan Penurunan SPP.docx_65a6354b16398.docx', '2024-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gallery`
--

CREATE TABLE `tb_gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `date_insert` varchar(20) NOT NULL,
  `date_update` varchar(20) NOT NULL,
  `type` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_information`
--

CREATE TABLE `tb_information` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(1) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_information`
--

INSERT INTO `tb_information` (`id`, `description`, `status`, `date`) VALUES
(1, '<p>Masih Dalam Pengembangan :</p><ul><li>Pencarian informasi</li><li>Struktur Organisasi</li><li>Program Kerja</li><li>Absensi</li></ul>', '', '2023-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_locations`
--

CREATE TABLE `tb_locations` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_locations`
--

INSERT INTO `tb_locations` (`id`, `id_user`, `latitude`, `longitude`, `date`) VALUES
(1, 20, '1.4778368', '124.8526336', '2024-01-16 21:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_messages`
--

CREATE TABLE `tb_messages` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `ip_user` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `read_one_message` varchar(1) NOT NULL,
  `read_all_message` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_messages`
--

INSERT INTO `tb_messages` (`id`, `id_user`, `name`, `email`, `subject`, `message`, `ip_user`, `date`, `read_one_message`, `read_all_message`) VALUES
(16, 20, 'Jodi', 'singgi@gmail.com', 'dasdsad', 'sdfsdf', '::1', '2023-12-28 16:54', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_news`
--

CREATE TABLE `tb_news` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `title` varchar(512) NOT NULL,
  `thumbnail` varchar(200) NOT NULL,
  `thumbnail_caption` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `posted` int(11) NOT NULL,
  `shared` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_news`
--

INSERT INTO `tb_news` (`id`, `id_category`, `title`, `thumbnail`, `thumbnail_caption`, `description`, `category`, `tags`, `posted`, `shared`, `date`, `time`) VALUES
(1, 12, 'Penasehat DWP Kemenpora Berikan Bantuan ke Petani Budi Daya Ulat Sutra Pakan Daun Singkong di Gunung Kidull', '86Penasehat-DWP-Kemenpora-Berikan-Bantuan-ke-Petani-Budi-Daya-Ulat-Sutra-Pakan-Daun-Singkong-di-Gunung-Kidul.jpeg', 'Penasehat DWP Kementerian Niena Kirana Riskyana Dito Ariotedjo memberikan bantuan ke UMKM Sentra Pemberdayaan Pemuda, Budi Daya Ulat Sutra Pakan Daun Singkong di Dusun Garotan, Bendung, Semin, Gunung Kidul, DI Yogyakarta. (foto:yayan/humas kemenpora)', '<p>Gunung Kidul: Penasehat Dharma Wanita Persatuan (DWP) Kementerian Pemuda dan Olahraga Republik Indonesia (Kemenpora RI) Niena Kirana Riskyana Dito Ariotedjo, melakukan kunjungan kerja dan memberikan bantuan ke Usaha Mikro, Kecil dan Menengah (UMKM) Sentra Pemberdayaan Pemuda, Budi Daya Ulat Sutra Pakan Daun Singkong di Dusun Garotan, Bendung, Semin, Gunung Kidul, DI Yogyakarta. Penasehat DWP Kemenpora RI Niena berharap, kedatangan para Pengurus DWP Kemenpora serta bantuan yang disampaikan kepada petani dan penggiat UMKM Budi Daya Ulat Sutra Pakan Daun Singkong binaan Kemenpora ini bermanfaat dan menambah semangat dalam berkarya. \"Iya kunjungan kerja kali ini merupakan program kerja dari kami di DWP Kemenpora RI di bidang pendidikan, ekonomi, sosial dan budaya tahun 2023,\" kata Niena didampingi Ketua DWP Kemenpora Sunarti Gunawan Suswantoro dan jajaran pengurus DWP Kemenpora lainnya saat di lokasi, Jumat (25/8). \"Saya harap dengan sedikit bantuan dari kami ini dapat menambah semangat para pengrajin dan penggiat UMKM,\" tambahnya. Niena menilai, UMKM berperan penting dalam menyumbang dalam perputaran perekonomian baik ekonomi lokal dan perputaran ekonomi nasional. \"Karena kami menyadari betapa pentingnya peran UMKM seperti ini jika dibina dengan lebih baik untuk membantu jalannya roda perekonomian, khususnya di daerah Gunung Kidul ini dan negara kita pada umumnya,\" ujarnya. Penasehat DWP Kabupaten Gunung Kidul Dyah Purwanti Sunaryanta, sampaikan terima kasih atas kehadiran dan serta bantuan dari DWP Kemenpora RI. Menurutnya kehadiran rombongan DWP Kemenpora memberi semangat tersendiri untuk UMKM Gunung Kidul. \"Selamat datang di Kabupaten Gunung Kidul. Atas nama pemerintah kabupaten Gunung Kidul, kami ucapkan terima kasih kepada Ibu penasehat, ketua serta anggota DWP Kemenpora atas kunjungan kerja dan bantuannya,\" ujar Dyah. \"Kehadiran ibu dan rombongan sangat memberikan kami semangat untuk kemajuan di Gunung Kidul khususnya di bidang UMKM. Menjadi kebanggaan kami ketika masyarakat kami bisa mengharumkan nama kabupatennya ke tingkat lebih tinggi lagi,\" pungkasnya. (ben)</p>', 'Kemenpora', 'DWP Kemenpora, dharma wanita, KemenporaRI', 1, '0', '2023-12-26', '14:44:05'),
(2, 12, 'Penasihat DWP Kemenpora Ingin Peringatan Maulid Nabi Muhammad SAW Jadi Momentum Tanamkan Rasa Cinta Kepada Rasulullah\n', '5166Penasihat-DWP-Kemenpora-Ingin-Peringatan-Maulid-Nabi-Muhammad-SAW-Jadi-Momentum-Tanamkan-Rasa-Cinta-Kepada-Rasulullah.jpeg', 'Penasihat Dharma Wanita Persatuan (DWP) Kementerian Pemuda dan Olahraga Republik Indonesia (Kemenpora RI) Nadiah Zainudin Amali bersama jajaran menggelar peringatan Maulid Nabi Muhammad SAW tahun 2022 di Masjid Pemuda Al Muwahidin Kemenpora, Jakarta, Kami\r\n', 'Jakarta: Penasihat Dharma Wanita Persatuan (DWP) Kementerian Pemuda dan Olahraga Republik Indonesia (Kemenpora RI) Nadiah Zainudin Amali bersama jajaran menggelar peringatan Maulid Nabi Muhammad SAW tahun 2022 di Masjid Pemuda Al Muwahidin Kemenpora, Jakarta, Kamis (13/10). Kegiatan yang dilakukan bersama anak yatim piatu ini berlangsung dengan khidmat. \r\n\r\nDalam kesempatan tersebut, Penasihat DWP Kemenpora RI Nadiah Zainudin Amali menyampaikan kegiatan peringatan Maulid Nabi Muhammad SAW bertujuan agar secara bersama-sama menanamkan rasa cinta kepada Rasulullah. \r\n\r\n\"Peringatan Maulid Nabi Muhammad SAW dilaksanakan agar kita dapat menanamkan rasa cinta kita kepada Rasulullah. Dan juga mari kita mengambil contoh teladan beliau dalam menjalani aktivitas kehidupan kita sehari-hari,\" ujarnya.\r\n\r\nLebih lanjut, Penasihat DWP Kemenpora RI Nadiah Zainudin Amali bersyukur kegiatan tersebut bisa berjalan dengan baik dan lancar. Dia memberikan apresiasi kepada seluruh jajaran DWP Kemenpora yang telah hadir dan ikut berpartisipasi. \r\n\r\n\"Selain itu, tentunya mari lah kita jadikan Nabi Muhammad SAW teladan bagi kita dalam aktivitas ibadah dan rutinitas kita. Saya juga mengapresiasi kehadiran dari seluruh jemaah dan jajaran pengurus DWP Kemenpora. Semoga kegiatan ini mendapat kebaikan untuk kita, kantor kita Kemenpora, keluarga, dan juga bangsa,\" jelas Penasihat DWP Kemenpora RI Nadiah Zainudin Amali. \r\n\r\nPeringatan Maulid Nabi Muhammad SAW yang dilakukan DWP Kemenpora RI diisi berbagai kegiatan, seperti pembacaan ayat Alquran. Lalu dilanjukan dengan tausiah. Tausiah disampaikan Ustazah Huriyyah Al Muthohar. \r\n\r\nKemudian dilakukan pemberian santunan kepada 46 anak yatim piatu yang berasal dari Majelis Taklim dan pengajian Al Ausar Rawa Domba dan Rumah Pintar Aisyah. Santunan tersebut diberikan langsung Penasihat DWP Kemenpora Nadiah Zainudin Amali.', 'Kemenpora', 'Dharma wanita, KemenporaRI', 1, '0', '2023-12-27', '14:44:05'),
(3, 6, 'Talk Show Bersama Kantor Berita Radio, Menpora RI Ajak Masyarakat Semangat Sambut Haornas 2020', '379Talk-Show-Bersama-Kantor-Berita-Radio--Menpora-RI-Ajak-Masyarakat-Semangat-Sambut-Haornas-2020.jpeg', 'Penasihat Dharma Wanita Persatuan (DWP) Kementerian Pemuda dan Olahraga Republik Indonesia (Kemenpora RI) Nadiah Zainudin Amali bersama jajaran menggelar peringatan Maulid Nabi Muhammad SAW tahun 2022 di Masjid Pemuda Al Muwahidin Kemenpora, Jakarta, Kami', '<p>Naskah Lorem Ipsum standar yang digunakan sejak tahun 1500an \"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\" Bagian 1.10.32 dari \"de Finibus Bonorum et Malorum\", ditulis oleh Cicero pada tahun 45 sebelum masehi \"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\" Terjemahan tahun 1914 oleh H. Rackham \"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\" Bagian 1.10.33 dari \"de Finibus Bonorum et Malorum\", ditulis oleh Cicero pada tahun 45 sebelum masehi \"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\" Terjemahan tahun 1914 oleh H. Rackham \"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"</p>', 'Talk Show', 'Inspirasi', 1, '0', '2023-12-28', '14:44:05'),
(14, 7, 'Mahasiswa yang meretas situs siat.ung.ac.id kini diwawancarai oleh Rektor Universitas Negeri Gorontalo', 'ProCker.jpg_658b394cde090.jpg', 'foto hacker peretas situs siat.ung.ac.id', '<p>Blog ini menceritakan kisah unik seorang mahasiswa berinisial SM yang tanpa sengaja terlibat dalam petualangan di dunia siber. Meskipun awalnya hanya seorang mahasiswa biasa di Universitas Negeri Gorontalo, SM menemukan dirinya terjerat dalam kejadian misterius yang menguji kecerdasan dan kreativitasnya.</p><p>Saat menggali lebih dalam ke dalam dunia teknologi informasi, SM secara tidak sengaja menemukan celah keamanan dalam situs web siat.ung.ac.id milik universitasnya sendiri. Namun, alih-alih memanfaatkannya dengan cara yang merugikan, SM memutuskan untuk mengambil langkah-langkah etis dengan segera memberi tahu pihak berwenang tentang temuannya.</p><p>Dalam perjalanan ini, SM belajar banyak tentang keamanan siber dan dampak positif dari keputusan etis. Blog ini tidak hanya menceritakan kisah seru, tetapi juga mengangkat nilai-nilai seperti integritas, kecerdasan, dan tanggung jawab dalam dunia siber. Mari bersama-sama mengeksplorasi petualangan mahasiswa berinisial SM dan melihat bagaimana keputusan etisnya membuka pintu menuju pengembangan pribadi dan pemahaman yang lebih dalam tentang keamanan siber.</p>', 'Teknologi', 'Hacker, Universitas Negeri Gorontalo, UNG, Peretas, Teknologi Informasi, Mahasiswa', 1, '0', '2023-12-27', '00:00:04'),
(30, 9, 'Momentum Kebaikan: Mahasiswa Organisasi ROTASI 19 Bagi-Bagi Takjil di Bulan Suci Ramadan', 'IMG-20220417-WA0035.jpg_658f6ee5add40.jpg', 'foto mahasiswa organisasi Rotasi UNG 2019', '<p>Bulan suci Ramadan, sebagai bulan penuh berkah dan keberkahan, tidak hanya menjadi waktu untuk meningkatkan ibadah, tetapi juga untuk berbagi kebaikan dengan sesama. Di tengah semangat kebersamaan dan kepedulian sosial, mahasiswa dari organisasi ROTASI 19, yang merupakan mahasiswa Bidik Misi angkatan 2019 di Universitas Negeri Gorontalo, mengambil inisiatif untuk melakukan kegiatan bagi-bagi takjil sebagai wujud kepedulian mereka terhadap masyarakat sekitar.</p><p>ROTASI 19, singkatan dari \'Revolusi Angkatan Berprestasi 19\', merupakan organisasi mahasiswa yang tidak hanya fokus pada pengembangan diri, tetapi juga aktif dalam kegiatan sosial yang bertujuan untuk memberikan dampak positif pada lingkungan sekitar. Kegiatan bagi-bagi takjil ini menjadi salah satu bentuk aksi nyata mereka dalam merespons kebutuhan masyarakat di bulan Ramadan.</p><p>Para mahasiswa ROTASI 19 menyadari pentingnya semangat berbagi dan kepedulian di tengah situasi yang mungkin tidak mudah bagi beberapa keluarga. Dengan penuh semangat dan tekad, mereka bersama-sama merencanakan dan melaksanakan kegiatan ini dengan harapan dapat meringankan beban masyarakat yang tengah menjalani ibadah puasa.</p><p>Kegiatan bagi-bagi takjil ini dilakukan dengan penuh keceriaan dan kehangatan di berbagai lokasi strategis yang dikunjungi oleh masyarakat sekitar. Tak hanya sekadar memberikan takjil, para mahasiswa juga berinteraksi dengan masyarakat, menjalin keakraban, dan menyampaikan pesan-pesan kebaikan serta semangat Ramadan. Dengan adanya kegiatan ini, diharapkan dapat tercipta atmosfer kebersamaan dan kebahagiaan di tengah-tengah masyarakat.</p><p>Melalui aksi ini, ROTASI 19 ingin mengajak semua pihak untuk bersama-sama merasakan kebahagiaan berbagi di bulan Ramadan. Mereka berharap bahwa kegiatan ini tidak hanya memberikan manfaat langsung bagi masyarakat yang menerima takjil, tetapi juga menjadi inspirasi bagi mahasiswa lainnya untuk aktif berkontribusi dalam kegiatan sosial yang sejalan dengan nilai-nilai kebersamaan dan kepedulian.</p><p>Bukan hanya sebagai mahasiswa yang mencari ilmu di bangku perkuliahan, namun ROTASI 19 membuktikan bahwa mereka juga memiliki peran yang signifikan dalam membentuk karakter dan kepedulian sosial. Keberhasilan kegiatan ini tidak hanya diukur dari jumlah takjil yang dibagikan, tetapi lebih pada dampak positif yang dihasilkan dalam membentuk rasa kebersamaan dan kepedulian di tengah-tengah masyarakat.</p><p>Semoga kegiatan positif ini dapat menjadi inspirasi bagi banyak pihak, baik mahasiswa maupun masyarakat umum, untuk selalu berkontribusi dalam membentuk lingkungan sosial yang lebih baik dan penuh kebaikan, terutama di bulan Ramadan yang penuh berkah ini.</p>', 'Sosial', 'mahasiswa, rotasi 2019, ramadan, takjil, mahasiswa bidikmisi', 1, '0', '2023-12-30', '00:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_news_category`
--

CREATE TABLE `tb_news_category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_news_category`
--

INSERT INTO `tb_news_category` (`id`, `category`) VALUES
(6, 'Kemenpora'),
(7, 'Talk Show'),
(9, 'Teknologi'),
(12, 'Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `tb_organization`
--

CREATE TABLE `tb_organization` (
  `id` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_organization`
--

INSERT INTO `tb_organization` (`id`, `gambar`) VALUES
(1, 'gambar-struktur-organisasi.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_team`
--

CREATE TABLE `tb_team` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `date_insert` varchar(20) NOT NULL,
  `date_update` varchar(20) NOT NULL,
  `type` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_team`
--

INSERT INTO `tb_team` (`id`, `image`, `name`, `position`, `description`, `facebook`, `instagram`, `date_insert`, `date_update`, `type`) VALUES
(31, 'Singgi Mokodompit 1-1.jpg_65885217abefd.jpg', 'Singgi Mokodompit', 'Web Programmer', '', '', '', '2023-12-24 23:44', '2023-12-24 23:44', 'update'),
(32, 'IMG-20220704-WA0011.jpg_658d28443e3f5.jpg', 'Meri Hurudji', 'Kesehatan', '', '', '', '2023-12-24 23:44', '2023-12-28 15:47', 'update');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `full_name` varchar(40) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `password2` varchar(200) NOT NULL,
  `tac` varchar(1) NOT NULL,
  `level` varchar(12) NOT NULL,
  `status_account` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `gambar`, `full_name`, `no_hp`, `username`, `password`, `password2`, `tac`, `level`, `status_account`) VALUES
(1, 'logo_dharma_wanita_persatuan.png_658f71827173a.png', 'Administrator', '', 'admin', '$2y$10$pN5vLOkJOnzYqINHa1oqIePAg8ZncQ22Lw8wn/IgGZ4ChMxy3gp.m', 'admin123', '1', 'superadmin', ''),
(20, 'user-default.png', 'Meri Hurudji', '085343668259', 'merihurudji', '$2y$10$C95/52Hd0uLAR0yVaX4A7.CGT7i3Cc6sOi/dtqIiQoQLigr4ANOB.', 'lpa_*0ntdu4!', '1', 'user', '1'),
(47, 'user-default.png', 'Singgi Mokodompit', '082346455079', 'singgimokodompit@gmail.com', '$2y$10$qz61D3ZYnuStUYDJGXX5fezbQQTl6/50Itq5KzGI7TnCwkmgZQpiC', 'dwppupr_x2nrwy5s', '1', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_visitor`
--

CREATE TABLE `tb_visitor` (
  `id` int(11) NOT NULL,
  `ip_visitor` varchar(255) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_visitor`
--

INSERT INTO `tb_visitor` (`id`, `ip_visitor`, `date`) VALUES
(1, '::1', '2023-12-26 17:49'),
(2, '127.0.0.1', '2023-12-28 15:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_work_program`
--

CREATE TABLE `tb_work_program` (
  `id` int(11) NOT NULL,
  `kegiatan` varchar(512) NOT NULL,
  `tujuan` varchar(512) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `anggaran` varchar(255) NOT NULL,
  `ket` varchar(512) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_work_program`
--

INSERT INTO `tb_work_program` (`id`, `kegiatan`, `tujuan`, `waktu`, `penanggung_jawab`, `anggaran`, `ket`, `date`, `time`) VALUES
(1, 'Live Promo di Sosial Media (IG, TikTok)', 'Meningkatkan penjualan', 'Setiap Hari', '31', '150.000', 'Anggaran untuk talent host', '2023-12-28', '00:00:15'),
(6, 'Posting Testimoni', 'Meningkatkan kepercayaan	', '3 Minggu', '32', '200.000', '', '2024-01-17', '00:00:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_attendances`
--
ALTER TABLE `tb_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_work_program` (`id_work_program`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_documents`
--
ALTER TABLE `tb_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_information`
--
ALTER TABLE `tb_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_locations`
--
ALTER TABLE `tb_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_messages`
--
ALTER TABLE `tb_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `tb_news_category`
--
ALTER TABLE `tb_news_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_organization`
--
ALTER TABLE `tb_organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_team`
--
ALTER TABLE `tb_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_visitor`
--
ALTER TABLE `tb_visitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_work_program`
--
ALTER TABLE `tb_work_program`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_attendances`
--
ALTER TABLE `tb_attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_documents`
--
ALTER TABLE `tb_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tb_information`
--
ALTER TABLE `tb_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_locations`
--
ALTER TABLE `tb_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_messages`
--
ALTER TABLE `tb_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_news_category`
--
ALTER TABLE `tb_news_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_organization`
--
ALTER TABLE `tb_organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_team`
--
ALTER TABLE `tb_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tb_visitor`
--
ALTER TABLE `tb_visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_work_program`
--
ALTER TABLE `tb_work_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_attendances`
--
ALTER TABLE `tb_attendances`
  ADD CONSTRAINT `tb_attendances_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id`),
  ADD CONSTRAINT `tb_attendances_ibfk_2` FOREIGN KEY (`id_work_program`) REFERENCES `tb_work_program` (`id`);

--
-- Constraints for table `tb_locations`
--
ALTER TABLE `tb_locations`
  ADD CONSTRAINT `tb_locations_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id`);

--
-- Constraints for table `tb_messages`
--
ALTER TABLE `tb_messages`
  ADD CONSTRAINT `tb_messages_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id`);

--
-- Constraints for table `tb_news`
--
ALTER TABLE `tb_news`
  ADD CONSTRAINT `tb_news_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `tb_news_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
