-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2016 at 02:30 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `montesa_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `acara` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `tgl_mulai`, `tgl_selesai`, `tempat`, `acara`, `deskripsi`) VALUES
(3, '2015-12-01', '2015-12-06', 'SMP Negeri 2 Moyudan', 'Ujian Akhir Semester Gasal 2014/2015', 'Ujian Akhir Semester Gasal 2014/2015\r\nkepada seluruh siswa kelas IX agar memepersiapkan diri '),
(4, '2016-01-05', '2016-01-06', 'SMP Negeri 2 moyudan', 'Latihan ujian kelas IX', 'Kepada seluruh siswa IX agar memeprsiapkan diri');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `file` varchar(250) NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `hits` int(5) NOT NULL,
  `tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id`, `nama`, `file`, `deskripsi`, `hits`, `tgl_input`) VALUES
(10, 'Kisi-Kisi Ujian Nasional 2016', 'KISI-KISI-UJIAN-NASIONAL-2016-SMP_(1).pdf', 'Kisi-Kisi Ujian Nasional 2016', 0, '2015-02-21 10:23:50');

-- --------------------------------------------------------

--
-- Table structure for table `galeri_album`
--

CREATE TABLE IF NOT EXISTS `galeri_album` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `jenis` enum('url','file') NOT NULL,
  `admin` int(2) NOT NULL,
  `tampil` enum('Ya','Tidak') NOT NULL,
  `tgl` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `galeri_album`
--

INSERT INTO `galeri_album` (`id`, `nama`, `jenis`, `admin`, `tampil`, `tgl`) VALUES
(6, 'Kegiatan Pesantren', 'file', 1, 'Ya', '2016-04-04 08:45:33'),
(7, 'Kartinian', 'file', 1, 'Ya', '2016-05-05 00:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `galeri_file`
--

CREATE TABLE IF NOT EXISTS `galeri_file` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_album` int(4) NOT NULL,
  `file_url` varchar(250) NOT NULL,
  `ket` varchar(200) NOT NULL,
  `tgl` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_album` (`id_album`),
  KEY `id_album_2` (`id_album`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `galeri_file`
--

INSERT INTO `galeri_file` (`id`, `id_album`, `file_url`, `ket`, `tgl`) VALUES
(22, 6, 'IMG_21331.JPG', 'pesantren', '2016-04-04 08:45:54'),
(23, 6, 'IMG_21451.JPG', 'pesantren', '2016-04-04 08:46:12'),
(24, 6, 'IMG_213311.JPG', 'pesantren', '2016-04-04 08:46:26'),
(25, 7, 'DSC02951.JPG', 'kartinian', '2016-05-05 00:26:42'),
(27, 7, 'DSC02974.JPG', 'kartinian', '2016-05-05 00:27:22'),
(28, 7, 'DSC02945.JPG', 'kartinian', '2016-05-05 00:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE IF NOT EXISTS `halaman` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(200) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `topik` int(4) NOT NULL,
  `jenis` enum('profil','berita','pengumuman','artikel','fasilitas','ekstra') NOT NULL,
  `isi` longtext NOT NULL,
  `tgl_post` datetime NOT NULL,
  `tgl_edit` datetime NOT NULL,
  `admin` int(2) NOT NULL,
  `hits` int(4) NOT NULL,
  `komen` enum('Ya','Tidak') NOT NULL,
  `tampil` enum('Ya','Tidak') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=147 ;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`id`, `gambar`, `judul`, `topik`, `jenis`, `isi`, `tgl_post`, `tgl_edit`, `admin`, `hits`, `komen`, `tampil`) VALUES
(23, '', 'Pramuka', 0, 'ekstra', '<p>Pramuka merupakan ekstrakurikuler wajib bagi siswa kelas VII dan VIII. Dalam ekstrakurikuler ini para peserta dididik dan dilatih tentang kepanduan, dimana outputnya para peserta dapat mengamalkan Dasadharma Pramuka dalam setiap kehidupannya.</p>\r\n<p><strong>Pelaksanaan : jumat</strong>, pukul 14.00 - 16.00 WIB</p>\r\n<p><strong>Guru Pembimbing : </strong></p>\r\n<ol>\r\n<li>Sudiman, S.Pd</li>\r\n<li>Bejo</li>\r\n</ol>', '2014-03-20 12:20:30', '2016-02-03 10:40:25', 1, 325, 'Tidak', 'Ya'),
(27, '', 'Launching Website MTs N Sidoharjo Versi 3', 0, 'artikel', '<p>Bertepatan dengan peringatan Hari Pendidikan Nasional, Rabu, 2 Mei 2012, MTs N Sidoharjo memperbarui websitenya yang saat ini merupakan versi ke-3.&nbsp;<br /><br /> Seperti kita ketahui, website MTs N Sidoharjo sudah eksis sejak Februari 2009, dan berkali-kali mengalami perubahan baik dari segi desain tampilan maupun dari segi maintenance. Walaupun masih hadir, hanya dengan menggunakan domain dan hosting gratisan <img title="Frown" src="../JS/editor/plugins/emotions/img/smiley-frown.gif" alt="Frown" border="0" />, diharapkan website ini bisa digunakan sebagai media komunikasi dan informasi MTs N Sidoaharjo dengan masyarakat.</p>', '2012-04-05 17:31:02', '0000-00-00 00:00:00', 0, 344, 'Ya', 'Ya'),
(100, 'IMG_2133.JPG', 'SMP Negeri 2 Moyudan selenggarakan Pengajian Isra'' Mi''raj', 2, 'berita', '<p>Sabtu, 23 Mei 2015, SMP mengadakan&nbsp;Pengajian Isra\\'' Mi\\''raj Nabi Muhammad SAW, 1436 Hijriah di halaman sekolah. Kegiatan ini merupakan salah satu program tahunan smp 2 moyudan. Hadir sebagai pengisi utama dalam pengajian ini adalah Kak Bimo dari Yogyakarta, yang merupakan ustadz sekaligus pendongeng nasional, yang sudah malang melintang mengisi acara pelatihan mendongeng di seluruh Indonesia. Adapun, yang mengikuti&nbsp;pengajian ini adalah siswa siswi sekolah dasar di sekitar smp 2 moyudan, seperti SDN Sidoharjo, SDN Muhammadiyah Munggangwetan, SDN Sulur, SDN Madigondo, dan lain-lain. Hadir pula Kepala KUA Samigaluh, perwakilan dari Kecamatan Samigaluh, perangkat desa Sidoharjo, dan tokoh-tokoh masyarakat.&nbsp;</p>\r\n<p>&nbsp;</p>', '2015-05-28 09:15:37', '2016-02-09 10:31:53', 1, 81, 'Tidak', 'Ya'),
(104, 'anisbaswedan-11.jpg', 'Mendikbud: Pendidikan Harus Ajarkan Peduli Lingkungan', 2, 'berita', '<p><strong>Liputan6.com, Yogyakarta - </strong> Kualitas lingkungan hidup memengaruhi tingkat pendidikan suatu negara dan sebaliknya. Menteri Pendidikan dan Kebudayaan (<a title=\\"\\\\\\\\\\" href=\\"\\\\\\\\\\">Mendikbud</a>) Anies Baswedan menegaskan lingkungan ialah hal mendasar dalam hidup yang berkaitan dengan pendidikan suatu negara.</p>\r\n<p><br />Anies menyebut konflik yang terjadi di Suriah dan Afrika sebagai contoh nyata atas dampak dari pengelolaan sumber daya yang tidak benar. Akibat hal itu, proses pendidikan di kedua negara terganggu. <br /><br />\\\\\\"Pengelolaan tidak selalu dijalankan secara benar. Konflik berkepanjangan seperti di Afrika itu justru sumbernya karena lingkungan hidup. Faktor lingkungan menjadi sangat mendasar. Presiden ungkapkan hal yang sama saat pidato perubahan iklim di Paris,\\\\\\" kata Anies dalam <em>National Academic Meeting Pendidikan Hijau: Peluang dan Tantangan</em> di Universitas Janabadra, Yogyakarta, Kamis, 3 Desember 2015.</p>\r\n<p>Anies mengatakan masalah<a title=\\"\\\\\\\\\\" href=\\"\\\\\\\\\\"> lingkungan </a>kini menjadi masalah global. Berkaca pada pandangan Bapak Pendidikan Indonesia Ki Hadjar Dewantara, Anies menyatakan sistem pendidikan tidak boleh hanya berfokus di lingkungan sekolah. Pendidikan justru harus menyertakan lingkungan keluarga dan lingkungan sekitar sebagai bagian sistem pendidikan. &nbsp;<br />\\\\\\"Ki Hadjar sudah mencontohkan cara mendidik yang juga sudah dilakukan banyak negara dan terbukti sukses. Bahkan, buku itu sudah ditulis sejak 80 tahun lalu,\\\\\\" ungkap Anies.<br /><br />Berangkat dari kesadaran itu, sejumlah 3 universitas dan 5 lembaga swadaya masyarakat (LSM) mendirikan Konsorsium Hijau. Konsorsium mengemban kampanye gerakan hijau di Indonesia. Ketua Konsorsium Hijau Maryatmo menyatakan kampanye itu penting seiring dengan&nbsp;<a title=\\"\\\\\\\\\\" href=\\"\\\\\\\\\\">kerusakan lingkungan</a> yang semakin merajalela. <br /><br />Dia menyatakan perlu adanya perubahan pola pikir masyarakat tentang pengelolaan lingkungan yang harus dimulai dari sekolah tingkat dasar. Jika konsisten dilakukan, perubahan paradigma bisa terjadi dan diteruskan ke generasi selanjutnya.<br /><br />\\\\\\"Paradigma yang baru yang diperjuangkan manusia dan lingkungan nerupakan satu kesatuan. Manusia tidak bisa sejahtera tanpa didukung lingkungan. Gerakan paling efektif adalah paradigma atau cara berpikir saat anak-anak kita masih di sekolah dasar,\\\\\\" ujar Maryatmo.</p>\r\n<p>&nbsp;</p>\r\n<p><em>SUMBER:</em></p>\r\n<p><em>http://news.liputan6.com/read/2381814/mendikbud-pendidikan-harus-ajarkan-peduli-lingkungan</em></p>\r\n<p>&nbsp;</p>\r\n<p><strong>&nbsp;</strong></p>', '2015-10-13 08:59:26', '2016-01-12 13:08:23', 1, 61, 'Tidak', 'Ya'),
(106, '', 'Tips Menghadapi Siswa Nakal', 2, 'artikel', '<p>Sebagai insan yang berada di sebuah lembaga pendidikan, apalagi Sekolah Menegah Kejuruan yang notabene siswanya adalah laki-laki menghadapi siswa &ldquo;nakal&rdquo; adalah hal yang biasa. Mulai dari siswa yang sering terlambat atau bolos sekolah, tidak mengerjakan tugas/ PR, ribut di kelas, jajan saat jam pelajaran, tidak sholat, dan masih banyak contoh &ldquo;kenakalan&rdquo; lain yang kerap dilakukan siswa. Hal-hal tersebut memang benar-benar menguji kesabaran kita. Dibutuhkan kesabaran dan keuletan tingkat tinggi.<br /> <span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\"> <span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\"><br /> Sebenarnya apakah benar ada anak diberi label &ldquo;nakal&rdquo;? Penulis sendiri tidak setuju bila ada siswa yang dilabeli &ldquo;nakal&rdquo;. Apalagi tidak sedikit guru yang memberi label &ldquo;nakal&rdquo; apabila ia merasa tidak sanggup mengendalikan siswanya. Di sisilain ukuran &ldquo;nakal&rdquo; tiap guru berbeda-beda. Sebagian guru akan menganggap siswanya &ldquo;nakal&rdquo; bila siswanya tidak mengerjakan PR, guru lain berpendapat siswa yang sering bolos/ tidak masuk sekolah adalah siswa yang &ldquo;nakal&rdquo;, sebagian lainnya menganggap siswa yang ribut saat pembelajaran adalah siswa yang &ldquo;nakal&rdquo;.&nbsp;</span><br /> <span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\"><br /> Menurut saya tidak ada yang namanya siswa &ldquo;nakal&rdquo;, yang ada adalah;</span><br /> </span></p>\r\n<ul>\r\n<ul>\r\n<li><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\"><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\"> Siswa yang krisis identitas. Perubahan biologis dan sosiologis pada diri remaja memungkinkan terjadinya dua bentuk integrasi. Pertama, terbentuknya perasaan akan konsistensi dalam kehidupannya. Kedua, tercapainya identitas peran. Kenakalan siswa terjadi karena siswa gagal mencapai masa integrasi kedua.</span></span></li>\r\n</ul>\r\n</ul>\r\n<ul>\r\n<li><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\">Siswa yang memiliki kontrol diri yang lemah. Siswa yang tidak bisa mempelajari dan membedakan tingkah laku yang dapat diterima dengan yang tidak dapat diterima akan terseret pada perilaku &ldquo;nakal&rdquo;. Begitupun bagi mereka yang telah mengetahui perbedaan dua tingkah laku tersebut, namun tidak bisa mengembangkan kontrol diri untuk bertingkah laku sesuai dengan pengetahuannya.</span></li>\r\n<li><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\">Siswa yang kurang kasih sayang orang tua. Orang tua yang terlalu sibuk dengan pekerjaan menyebabkan kurang perhatian kepada anaknya. Tidak mengenalkan dan mengajarkan norma-norma agama kepada anaknya. Akibatnya dia akan sering bolos atau terlambat sekolah. Saat di sekolah ia akan berulah macam-macam untuk mendapat perhatian dari orang lain, termasuk kepada gurunya.</span></li>\r\n<li><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\"> Siswa yang kedua orang tuanya tidak harmois atau bahkan bercerai. Suasana di rumah yang tidak nyaman akan menyebabkan anak tidak fokus saat pelajaran. Kedua orang tua yang seharusnya melidungi dan memberi contoh yang baik justru menjadi akar permasalahan anaknya. </span></li>\r\n<li><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\"> Siswa yang menjadi &ldquo;korban&rdquo; dari saudara atau teman sepermainannya. Tipe anak seperti ini akan melakukan hal yang sama pada anak lainnya karena ia adalah &lsquo;korban&rsquo; dan berusaha untuk membalas dendam.</span></li>\r\n<li><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\"> Siswa yang mendapat tekanan dari orang tua. Tekanan ini bisa berupa tuntutan orang tua yang terlalu tinggi akan prstasi anaknya di sekolah atau peraturan di rumah yang terlalu ketat/ mengekang. Akibatnya bisa bermacam, siswa bisa pendiam tapi juga bisa &ldquo;nakal&rdquo; karena merasa ingin bebas.</span></li>\r\n<li><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\"> Siswa yang mengalami kekerasan dalam lingkungan keluarga. Hal ini disebabkan oleh beberapa faktor, di antaranya masalah ekonomi. Siswa yang mengalami kekerasan di rumah, maka saat di sekolah ia akan menunjukkan sikap memberontak kepada gurunya atau bahkan melakukan kekersaan seperti apa yang ia alami.</span></li>\r\n<li><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\"> Siswa yang salah bergaul. Lingkungan memang sangat memberikan pengaruh yang sangat besar terhadap perkembangan sikap siswa. Pergaulan yang kurang tepat atau menyimpang salah bisa menyebabkan perilaku yang menyimpang. </span></li>\r\n</ul>\r\n<p><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\"><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\"> Itulah beberapa sebab mengapa siswa berperilaku &ldquo;nakal&rdquo; saat di sekolah. Saat kita tahu latar belakang masalah perikau murid kita, tentunya kita akan merasa iba dan kasihan. Oleh karena itu mari kita sebagai pendidik mulai untuk menghentikan label negatif kepada siswa. <br /> <br /> Beberapa tips di bawah ini bisa kita coba untuk mengatasi perilaku siswa yang &ldquo;nakal&rdquo;, adalah:</span><br /> </span></p>\r\n<ul>\r\n<li><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\">Berdo&rsquo;a untuk anak terebut. Ucapkan namanya setiap kita berdo&rsquo;a. Berharaplah apa yang kita minta akan dikabulkan Allah dan saat kita menghadapinya Allah mengkaruniakan kesabaran pada diri kita. Yakinlah dia akan berubah, karena keyakinan itu adalah doa. Dia pasti berubah, entah itu besok, lusa, atau kapanpun.</span></li>\r\n<li><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\">Carilah info yang lengkap tentang siswa yang dianggap &ldquo;nakal&rdquo;. Tujuannya adalah agar kita lebih paham tentang latar belakanngya. Harapanya kita akan lebih bisa bersabar dan pengertian dalam menangani perilakunya.</span></li>\r\n<li><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\">Hentikan ucapan atau label &ldquo;nakal&rdquo; pada siswa tersebut. Kita tahu ucapan adalah do&rsquo;a. jika kita mengucapakan kata nakal, secara tidak langsung kita berdo&rsquo;a agar dia menjadi nakal. Katakanlah yang baik-baik untuknya, walau bagaimana pun perilaku dan perkataannya.</span></li>\r\n<li><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\">Panggilah dia ke runag BK atau masjid. Ajaklah dia berbicara empat mata dan dari hati ke hati. Tanyakanlah kepada siswa tersebut tentang harapannya, permasalahannya, atau sebab dia berbuat &ldquo;nakal&rdquo;. Dengan hal ini kita jadi lebih tahu tentang dirinya dan permasalahan yang sedang ia hadapi. Pada akhirnya, berilah ia solusi, motivasi dan arahan.</span></li>\r\n<li><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\">Latilah dia dengan rasa tanggung jawab. Hal ini bisa dilakukan dengan kita memberikan dia kepercayaan. Contoh: menjadi muadzin, mengumpulkan kas kelas, membantu kita merekap buku tabungan, atau dengan melibatkan dia dalam kegiatan OSIS dan ROIS (meskipun dia bukan penggurus OSIS dan ROIS). Hal ini akan membuat dia merasa dibutuhkan dan diperhatikan. Tujuan akhirnya adalah agar dia tahu mana hak dan kewajibannya/ tanggung jawabnya sebagai siswa.</span></li>\r\n<li><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\">Apabila siswa tersebut berbuat &ldquo;nakal&rdquo;. Maka, tergurlah dengan pelan-pelan dan jangan dibentak atau dimarahi. Karena siswa tipe seperti ini tidak akan berubah bila dimarahi. Mereka butuh didekati, diperhatikan, dan diajak berdiskusi, serta berilah mereka motivasi agar bisa berubah menjadi lebih baik. Katakan pada mereka &ldquo;saya yakin kamu bisa lebih baik lagi dari kamu yang sekarang&rdquo;. &ldquo;saya akan merasa bangga bila kamu bisa lebih baik dari kamu yang sekarang&rdquo;.</span></li>\r\n<li><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\">&nbsp;</span><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\">Apabila siswa tersebut berbuat &ldquo;nakal&rdquo;. janganlah diberikan hukuman fisik, seperti push up, set up, atau jalan jongkok. karena, hal ini justru akan menimbulkan rasa dendam dan jiwa melawan/ membangkang pada siswa. Tapi berikanlah dia hukuman seperti sholat dhuaha atau membaca Al-Qur\\\\\\''an.</span></li>\r\n<li><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\">Buatlah perjanjian bila siswa tersebut berbuat &ldquo;nakal&rdquo;. Rekamlah dengan HP dan suruhlah dia mengucapkan janji agar tidak mengulangi perbuatannya. Bila dia mengulangi lagi, panggillah siswa tersebut dan putarlah rekamannya.</span></li>\r\n<li><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\">Berilah dia pilihan. Berbuat baik konsekuensinya baik atau berbuat &ldquo;buruk&rdquo; konsekuensinya buruk.</span></li>\r\n<li><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\"> Bila siswa tersebut berbuat baik. Maka, pujilah dia. Pujian kita akan mebuat dia merasa bahwa usahanya dihargai dan diperhatikan oleh orang lain.</span></li>\r\n</ul>\r\n<p><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\"> <span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\"> Itulah sedikit tips dari penulis. Semoga dapat memberikan manfaat. Prinsipnya adalah tidak ada siswa yang &ldquo;nakal&rdquo;. Yang ada adalah siswa kurang perhatian dan salah bergaul. Percayalah mereka bisa berubah. Perubahan itu akan bisa terjadi bila dimulai dengan strategi dengan menggunakan pendekatan hati. Bisa melalui tangan kita, atau mungkin tangan orang lain. Semoga bermanfaat dan selamat mencoba.<br /> <br /> Sumber:</span></span></p>\r\n<p><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\">http://nadhirin.blogspot.co.id/2013/11/tips-menghadapi-siswa-nakal.html<br /> <span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\"><strong><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\"><strong><span lang=\\"\\\\\\\\\\"IN\\\\\\\\\\"\\"><a href=\\"\\\\\\\\\\" target=\\"\\\\\\\\\\">http://gurukreatif.wordpress.com</a></span></strong></span></strong></span></span></p>\r\n<div><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\"><strong><span lang=\\"\\\\\\\\\\"IN\\\\\\\\\\"\\"><a href=\\"\\\\\\\\\\" target=\\"\\\\\\\\\\">http://www.ilmuku.net/</a></span><span class=\\"\\\\\\\\\\"fullpost\\\\\\\\\\"\\"><strong>&nbsp; </strong></span></strong></span></div>', '2016-01-11 12:13:24', '2016-01-12 13:02:33', 2, 7, 'Tidak', 'Ya'),
(108, '', 'jadwal pendalaman materi kelas IX', 1, 'pengumuman', '<p>jadwal</p>', '2016-01-12 13:32:23', '0000-00-00 00:00:00', 2, 7, 'Tidak', 'Ya'),
(109, '', 'Perpustakaan', 0, 'fasilitas', '<p>Di SMP Negeri 2 moyudan terdapat 1 ruang perpustakaan yang menyediakan bermacam-macam judul buku wajib pelajaran dan buku-buku umum</p>', '2016-01-14 07:19:07', '2016-03-14 08:24:44', 1, 25, 'Tidak', 'Ya'),
(110, '', 'Mushola', 0, 'fasilitas', '<p>Di SMP Negeri 2 Moyudan Terdapat 1 Ruang&nbsp; Mushola</p>', '2016-01-14 07:20:51', '2016-03-14 08:22:14', 1, 17, 'Tidak', 'Ya'),
(111, '', 'Ruang Laboratorium', 0, 'fasilitas', '<p>Di SMP Negeri 2 Moyudan terdapat 3 ruang laboratorium , terdiri dari ruang laboratorium ipa, laboratorium komputer dan laboratorium bahasa</p>', '2016-01-14 07:22:38', '2016-03-14 08:23:33', 1, 12, 'Tidak', 'Ya'),
(112, '', 'Ruang Kelas', 0, 'fasilitas', '<p>terdapat 18 kelas dan setiap kelas memiliki daya tampung 32 siswa</p>', '2016-01-14 07:23:42', '0000-00-00 00:00:00', 1, 10, 'Tidak', 'Ya'),
(113, '', 'Ruang Ketrampilan', 0, 'fasilitas', '<p>Di SMP negeri 2 moyudan terdapat 3 ruang Ketrampilan ruang ketrampilan seni musik, ruamg ketrampilan karawitan dan ruang ketrampilan pkk.</p>', '2016-01-14 07:24:15', '2016-03-14 08:22:35', 1, 12, 'Tidak', 'Ya'),
(115, '', 'Sambutan Kepala Sekolah', 0, 'profil', '<p>Assalamualaikum</p>\r\n<p>Kami ucapkan selamat datang dan terima kasih yang sebesar-besarnya karena Anda telah berkunjung di website smp negeri 2 moyudan. Website ini dibangun untuk memfasilitasi komunikasi dan informasi bagi warga sekolah SMP Negeri 2 Moyudan khususnya dan masyarakat pendidikan pada umumnya.<br /><br />Sebelumya kami mohon maaf, karena mungkin website ini jauh dari sempurna dan terkesan apa adanya. Hal itu mungkin dikarenakan keterbatasan dan kekurangan dari kami. Oleh karena itu kami mohon para pengunjung sekalian untuk memberikan saran dan kritik yang bersifat membangun Akhir kata kami ucapkan terima kasih dan mudah-mudahan website ini dapat bermanfaat.</p>\r\n<p>Wassallamualaikum</p>', '2016-01-20 11:19:42', '2016-02-21 07:07:03', 2, 88, 'Tidak', 'Ya'),
(117, '', 'Visi dan Misi Sekolah ', 0, 'profil', '<p>VISI SMP NEGERI 2 MOYUDAN SLEMAN</p>\r\n<p>\\"Terwujudnya Generasi yang berpribadi yaitu generasi yang berprestasi, Bersifat Refleksif, Inovatif,</p>\r\n<p>Berbudi Pekerti luhur, Aktif, Dinamis, Berdasarkan Imtaq\\"</p>\r\n<ul>\r\n<li>Unggul dalam dibidang Agama.</li>\r\n<li>Unggul dalam prestasi Akademis.</li>\r\n<li>Unggul dalam bidang non Akademis.</li>\r\n<li>Unggul dalam prestasi seni/budaya.</li>\r\n</ul>\r\n<p>MISI SMP NEGERI 2 MOYUDAN SLEMAN</p>\r\n<ul>\r\n<li>Mengupayakan agar setiap komponen sekolah termotivasi untuk meningkatkan prestasi yang di miliki.</li>\r\n</ul>', '2016-01-20 11:48:32', '2016-01-27 15:01:17', 1, 49, 'Tidak', 'Ya'),
(118, '', 'Prestasi SMP Negei 2 Moyudan', 0, 'profil', '<p><em><strong>Prestasi Akademik</strong></em></p>\r\n<ul>\r\n<li>Olimpiade MIPA : Juara I Tingkat Kabupaten Sleman Tahun 2007</li>\r\n<li>Olimpiade SAINS : Juara II Tingkat Kabupaten Sleman Tahun 2008</li>\r\n</ul>\r\n<p><em><strong>Prestasi Non</strong></em><strong> Akademik</strong></p>\r\n<ul>\r\n<li>Pemilihan Siswa Teladan : Juara II Tingkat Propinsi DIY Tahun 2007</li>\r\n<li>Lomba Terampil Koperasi : Juara II Tingkat Kabupaten Sleman Tahun 2007</li>\r\n<li>Lomba Karya Tulis \\"Benda Cagar Budaya\\" : Juara III Tingkat Kabupaten Sleman Tahun 2008</li>\r\n<li>Tenis Meja : Juara I Tingkat Kabupaten Sleman Tahun 2009</li>\r\n<li>Olimpiade Olah Raga SMP Bidang \\" Catur\\" : Juara II Tingkat Propinsi DIY Tahun 2009</li>\r\n<li>Kompetisi Futsal : Juara II Tingkat Kabupaten Sleman Tahun 2010</li>\r\n<li>Kompeteisi Futsal : Juara II kejuaraan futsal antar pelajar 2016</li>\r\n</ul>', '2016-01-20 12:28:22', '2016-05-05 00:41:18', 1, 17, 'Tidak', 'Ya'),
(119, '', 'Data Umum SMP Negeri 2 Moyudan', 0, 'profil', '<p>A. IDENTITAS SEKOLAH</p>\r\n<table class=\\"table table-hover\\">\r\n<tbody>\r\n<tr>\r\n<td>&nbsp;Nama Sekolah</td>\r\n<td>&nbsp; Smp Negeri 2 Moyudan Sleman&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>&nbsp;Alamat Sekolah</td>\r\n<td>&nbsp; Setran Sumberarum Moyudan Sleman&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>&nbsp;Kode Pos</td>\r\n<td>&nbsp; 55563</td>\r\n</tr>\r\n<tr>\r\n<td>&nbsp;No Tlp</td>\r\n<td>&nbsp; -</td>\r\n</tr>\r\n<tr>\r\n<td>&nbsp;Akreditasi</td>\r\n<td>&nbsp; A</td>\r\n</tr>\r\n<tr>\r\n<td>&nbsp;Nomor Induk Sekolah</td>\r\n<td>&nbsp; 201400250012</td>\r\n</tr>\r\n<tr>\r\n<td>&nbsp;Nomor Pokok Sekolah Nasional&nbsp;</td>\r\n<td>&nbsp; 20401062</td>\r\n</tr>\r\n<tr>\r\n<td>&nbsp;Status Sekolah</td>\r\n<td>&nbsp; Negeri</td>\r\n</tr>\r\n<tr>\r\n<td>&nbsp;Tahun di Dirikan</td>\r\n<td>&nbsp; 1 juli 1984</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>B. USUR PEMBANTU KEPALA SEKOLAH</p>\r\n<p>1. Waka 1 Ur. Kurikulum</p>\r\n<table width=\\"424\\">\r\n<tbody>\r\n<tr>\r\n<td>Sarana dan Prasarana</td>\r\n<td>&nbsp;Didik Saifurakhman, S.Pd.</td>\r\n</tr>\r\n<tr>\r\n<td>Staf</td>\r\n<td>&nbsp;Yuliyanto, S.Pd.</td>\r\n</tr>\r\n<tr>\r\n<td>Staf</td>\r\n<td>&nbsp;Bibit Lestari, S.Pd.</td>\r\n</tr>\r\n<tr>\r\n<td>Staf</td>\r\n<td>&nbsp;Sardi, S.Pd.</td>\r\n</tr>\r\n<tr>\r\n<td>2. Waka 2 Ur. Kesiswaan</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>Urusan Humas</td>\r\n<td>&nbsp;Sriwidada, S.Pd.</td>\r\n</tr>\r\n<tr>\r\n<td>Staf</td>\r\n<td>&nbsp;Slamet, S.Pd</td>\r\n</tr>\r\n<tr>\r\n<td>Staf</td>\r\n<td>&nbsp;Sudiman, S.Pd</td>\r\n</tr>\r\n<tr>\r\n<td>Staf</td>\r\n<td>&nbsp;Tukiman, S.Pd</td>\r\n</tr>\r\n<tr>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', '2016-01-20 12:37:03', '2016-03-23 10:13:55', 1, 52, 'Tidak', 'Ya'),
(121, '', 'Struktur SMP Negeri 2 Moyudan', 0, 'profil', '<p><img src=\\"https://4.bp.blogspot.com/-72lt41goljw/VuOMYWXSjkI/AAAAAAAAAfg/f9af-9aUvasnBiRXq9LE5joaVHgICeLgA/s1600/a.jpg\\" alt=\\"\\" width=\\"360\\" height=\\"514\\" /></p>', '2016-01-20 12:53:44', '2016-03-23 08:21:28', 1, 59, 'Tidak', 'Ya'),
(124, '', 'Pengumuan Jadwal Pemakaian Seragam Batik SMP Negeri 2 Moyudan', 0, 'pengumuman', '<p>berikut ini jadwal :</p>\r\n<table class=\\"table table-hover\\">\r\n<tbody>\r\n<tr>\r\n<td>NO</td>\r\n<td>&nbsp;HARI</td>\r\n<td>&nbsp;SERAGAM</td>\r\n<td>&nbsp;KETERANGAN</td>\r\n</tr>\r\n<tr>\r\n<td>1</td>\r\n<td>Kamis I</td>\r\n<td>&nbsp;Seragam Batik Merah Parijotho</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>2</td>\r\n<td>Kamis II</td>\r\n<td>&nbsp;Seragam Batik Merah bata Coklat Muda</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>3</td>\r\n<td>Kamis III</td>\r\n<td>&nbsp;Seragan Batik Ungu</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>4</td>\r\n<td>Kamis IV</td>\r\n<td>&nbsp;Seragam Batik Coklat</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>5</td>\r\n<td>Kamis V</td>\r\n<td>&nbsp;Batik Bebas</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><strong>NB. </strong>Jadwal mulai berlaku Kamis 21 Januari 2016</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bagi bapak ibu yang tidak mempunyai seragam tersebut dapat menyesuaikan.</p>', '2016-02-01 10:48:51', '2016-02-20 10:47:33', 2, 14, 'Tidak', 'Ya'),
(125, '099616100_1448343818-Foto02841.jpg', '2,9 juta gurur ikut UKG', 2, 'berita', '<p>Liputan6.com, Yogyakarta - Menteri Pendidikan dan Kebudayaan (Mendikbud) Anies Baswedan menyebutkan, 2,9 juta guru telah mengikuti uji kompetensi guru (UKG) 2015. Dia menegaskan, uji kompetensi dibutuhkan demi meningkatkan kualitas pendidikan di Indonesia.<br />Untuk itu, pemerintah menyediakan testing center di setiap kabupaten agar para guru bisa meningkatkan kompetensinya secara berkala.<br />\\"Di setiap kabupaten sudah ada. Sudah ada sekolah-sekolah yang menjadi testing center dan LPMP (lembaga penjamin mutu pendidikan) kita juga jadi tempat ujian,\\" ujar Anies di Kampus Janabadra, Yogyakarta, Kamis (3 Desember 2015). Anies berharap, para guru mau menggunakan hasil ujian itu sebagai alat bercermin guru tentang kompetensinya. Berdasarkan hasil ujian itu, ia meminta agar para guru meningkatkan kualitas mengajarnya. Ia meyakini proses tersebut akan semakin menggairahkan kegiatan belajar mengajar.<br />\\"Tentu orang tua mau anaknya dididik orang-orang kompeten. Guru-guru pasti juga mau (menyatakan) kami adalah orang kompeten. Diharapkan alat untuk bercermin dan tahu di mana alat-alat yang harus dikembangkan dari gurunya,\\" ujar Anies. UKG 2015 berlangsung pada 9-27 November 2015. Kementerian Pendidikan dan Kebudayaan menganggarkan Rp 261 miliar untuk ujian itu. UKG dilaksanakan dengan dua cara, yaitu dalam jaringan (daring) dan luar jaringan (luring). Hanya 36 dari 520 kabupaten/kota yang tidak melaksanakan UKG secara luring. Kemdikbud menyiapkan 200 paket soal untuk 200 mata pelajaran program keahlian. Waktu pelaksanaan berlangsung selama 120 menit dengan bentuk soal pilihan ganda sejumlah 60-100 soal. Usai UKG, Kemdikbud akan melangsungkan pendidikan dan pelatihan bagi guru.<br />&nbsp;Ada 4 kemampuan yang harus dimiliki seorang guru yakni pedagogik, profesional, sosial, dan pribadi. Standar minimum UKG tahun ini 5,5. Pada 2009, nilai standar UKG minimal mencapai 8.</p>', '2016-02-01 11:06:22', '2016-02-09 09:58:53', 2, 9, 'Tidak', 'Ya'),
(127, '', 'q', 2, '', '<p>asas</p>', '2016-02-03 08:26:25', '2016-02-14 00:00:00', 1, 0, 'Tidak', 'Ya'),
(128, '', 'Tips Menjalin Persahabatan', 2, 'artikel', '<p>Tips / 10 langkah menjalin persahabatan</p>\r\n<ol>\r\n<li>Pikirkanlah apa yang dapat kamu berikan kepada sahabatmu bukan apa yang dapat kamu peroleh dari persahabatan. Jangan bersahabat hanya demi memperoleh kesenangan , karena jika demikian ,kamu bukanlah sahabat sejati. Hargailah sahabatmu seperti kamu ingin dihargai.</li>\r\n<li>Dukunglah sahabatmu, karena Sahabat Sejati selalu saling menyemangati dan selalu mendorong&nbsp; supaya mereka bersama&nbsp; sama dapat menjadi yang terbaik, dan bukan saling menjatuhkan apalagi menjelek-jelekan. Sahabat Sejati turut bahagia ketika sahabatnya berhasil mencapai apa yang diinginkan nya ( Prestasi ) dan tidak merasa tersaingi.</li>\r\n<li>Bersedia untuk memaafkan jangan biarkan &ldquo; LUKA &ldquo; berkembang menjadi kepahitan. Karena hal ini akan menghan curkan persahabatan yang ada. Maafkan kesalahan yang diperbuat oleh Sahabatmu dan jangan biarkan &ldquo; LUKA &ldquo; itu merusak persahabatan.</li>\r\n<li>Jangan biarkan sendiri setelah dia melakukan kesalahan. Bersahabatlah dan tuntunlah dia untuk berubah, sadarlah bahwa tidak ada orang yang sempurna.</li>\r\n<li>Sahabat dapat menempatkan diri dan posisi. Konsisten antara ucapan dan perbuatan.</li>\r\n<li>Jangan mencoba untuk mengontrol sahabatmu bukan berarti harus selalu bersama &ndash; sama. Memang akan sangat menyenangkan bila dapat selalu bersama dengan orang yang kita sayangi. Namun ingat, sahabat kita itu bukan monopoli kita sendiri karena ia juga mempunya teman lain selain kita. Untuk itu jangan merasa dikhianati ketika temanmu bergaul dengan orang lain , sebaliknya usahakan kamu juga dapat berteman dengan mereka. Hal ini akan membuat kita dan sahabat kita lebih menghargai satu sama lain.</li>\r\n<li>Selalu ada disaat senang maupun susah. Jangan&nbsp; hanya ada saat senang saja. Ketika sahabatmu sedang BAD MOOD, Berikan perhatian kepadanya. Karen yang dia butuh sepasang telinga yang mau memahami perasaannya.</li>\r\n<li>Menerima apa adanya sahabatmu jangan menuntut sahabat kita untuk bereaksi dengan cara yang sama seperti yang biasa kita lakukan. Hargailah dia apa adanya termasuk juga keputusan yang dia ambil yang mungkin tidak sesuai dgn kehendak kita.</li>\r\n<li>Sahabat sejati&nbsp; selalu menepati janji, memegang amanah dan pandai menyimpan rahasia. Jangan membuka Aib sahabat, pandai-pandailah menjaga rahasianya.&nbsp; Janganlah sekali-kali &ldquo; ngember &ldquo;&nbsp; hanya karena kepentingan diri sendiri.</li>\r\n<li>Jangan biarkan perbedaan pendapat menghancurkan persahabatan hanya karna beda persepsi<br />Jika itu terjadi, jangan berdebat karena tidak akan menyelesaikan masalah dan akan membuat kamu dongkol &amp; sakit hati selesaikan masalah dengan kepala dingan dan terimalah kekalahan dengan lapang dada. Lepaskanlah hasrat untuk menang sendiri demi&nbsp; PERSAHABAT kamu.</li>\r\n</ol>', '2016-02-03 09:56:53', '2016-02-14 00:00:00', 1, 2, 'Tidak', 'Ya'),
(129, '', 'Etika Berjumpa dengan Metode 5S', 2, 'artikel', '<p>Etika berjumpa merupakan salah satu dari etika sosial. Etika sosial di lain hal membahas kewajiban serta norma-norma sosial yang seharusnya dipatuhi dalam hubungan sesama manusia, masyarakat, bangsa dan Negara<br />Manusia sebagai mahluk sosial tidak bisa hidup tanpa berinteraksi dengan orang lain,salah satunya ketika kita berjumpa dengan orang hendaknya kita bertegur sapa. Sebagai seorang muslim hendaknya kita mengucapkan assalamualaikum yang mana didalamnya terkandung doa.<br />Agar kita dapat menjalin hubungan yang baik dengan orang lain, maka harus memahami tata cara bergaul,antara lain menerapkanmetode 5S, yaitu :</p>\r\n<ol>\r\n<li>SENYUM <br />Senyum adalah ekspresi jiwa yang menggambarkan orang yang bersahabat dan merupakan perhatian terhadap orang yang diajak senyum. Senyum yang tulus walaupun yang senyum itu orang yang sudah tua dengan kulit keriput tetapi nilainya tetap sama, dapat menyejukkan hati yang sedang gundah gulana. Senyum sangat mudah dilakukan, tidak perlu modal dan tidak menurunkan derajat seseorang. Karena itu tersenyumlah kepada orang-orang di sekitar kita.</li>\r\n<li>SALAM<br />Sewaktu kita berjumpa maupun berpisah hendaknya mengucapkan salam,hal ini menunjukkan kalau kita menghargai keberadaan orang lain,sebagaimana yang dicontohkan oleh nabi Muhammad SAW ,ketika beliau berjumpa dengan para sahabatnya selalu mengucapkan salam dan bersalaman dengan hangat. Misalnya: selamat pagi, selamat siang, selamat sore, hai, hallo, horas, assalamu&rsquo;alaikum wr.wb. Kita boleh menggunkan sesuai dengan situasi dan kondisi.</li>\r\n<li>SAPA<br />Sapa artinya menegur. Setelah tersenyum dan mengucap salam, sebaiknya dilanjutkan dengan menyapa, seperti: Apa kabar? Bagaimana keadaanmu? Apakah Anda baik-baik saja?<br />Bila kita berjumpa dengan orang yang lebih tua hendaknya kita menyapa lebih duluan,hal ini kita lakukan untuk menghormati. Kalau menyapa orang yang sebaya atau lebih muda dengan kita agar terasa lebih akrab.</li>\r\n<li>&nbsp;&nbsp;&nbsp; SOPAN<br />Sopan artinya pantas, etis, wajar, tidak berlebihan, cocok, sesuai, terhormat, terpuji, dan bersikap menghargai, sesuai dengan norma agama dan norma masyarakat yang berlaku. Sopan dalam sikap dan perilaku artiya perilaku setiap hari baik, terpuji, terhormat sesuai denga norma. Sopan berpakaian artinya rapi, bersih, model dan warna cocok, sesuai, pantas dan tidak berlebihan. Sopan dalam perkataan artinya berbicara baik, tidak menyakiti orang lain, jujur, luwes, enak didengar, mudah dimengerti.</li>\r\n<li>SANTUN<br />Santun artinya membantu, menyayangi, melindungi, mengayomi, mengasihi. Kita sebaiknya membiasakan diri bersikap santun kepada orang-orang di sekitar kita.</li>\r\n</ol>', '2016-02-03 09:59:32', '2016-02-14 00:00:00', 1, 7, 'Tidak', 'Ya'),
(130, '', 'Motivasi Belajar', 2, 'artikel', '<p>Hari-hari pertama di kelas VII atau kelas IX adalah suatu kebanggan tersendiri, karena telah berhasil melampaui perjuangan yang cukup berat. Namun hasil yang telah dicapai tersebut sekarang harus dipertanggungjawabkan. Perjuangan belum akhir, dimana kita harus mengakhiri masa belajar SMP dan untuk kemudian melanjutkan ke SMA/MA atau SMK, Perguruan Tinggi, Bekerja dan seterusnya. Pada prinsip sepanjang hidupnya manusia akan menghadapi perjuangan, dan untuk dapat melampaui setiap perjuangan perlu adanya semangat atau motivasi. Perhatikan ilustrasi berikut :<br />1.&nbsp;&nbsp;&nbsp; Ani ingin menjadi dokter, maka setiap hari Ani selalu berusaha menyiapkan diri dengan seabik-baiknya mulai dari belajar, mengerjakan tugas-tugas, latihan soal, membuat catatan, diskusi/belajar kelompok, sampai berusaha memahami bagaimana seharusnya berkepribadian seorang dokter, disamping selalu berdoa dan rajin beribadah. Karena kerja kerasnya&nbsp; itu maka Ani selalu mendapat peringkat terbaik disekolahnya. Keinginan yang kuat ANi dapat memotivasi dirinya dalam belajar.<br />2.&nbsp;&nbsp;&nbsp; Roni mempunyai kegemaran main gitar. Ia ingin sekali memiliki gitar, tetapi tabungannya belum cukup. Mengetahui hal tersebut orang tua Roni mengatakan bahwa kalau ingin dibelikan gitar, nanti kalau naik kelas dan nilainya dapat mencapai peringkat 5 besar. Mendengar kata-kata ayahnya, Roni menjadi tambah semangat belajarnya. Ia betul-betul belajar keras dan berdoa agar memenuhi harapan orang tuanya. Contoh diatas memberikan gambaran bahwa semangat belajar Roni timbul karena factor luar, yaitu ingin mendapat&nbsp; gitar dan ingin memenuhi harapan orang tuanya.<br />3.&nbsp;&nbsp;&nbsp; Rudi adalah anak pertama dari tiga bersaudara, adiknya masih kecil-kecil, Rudi adalah harapan satu-satunya orang tuanya yang akan dapat membantu ekonomi keluarga. Tapi sayangnya Rudi mempunyai pandangan yang berbeda dengan orang tuanya. Sebagai anak yang mulai berangkat remaja, ia ingin &lsquo;gaul&rsquo; seperti teman-temannya. Dengan dalih kebebasan, ia tidak segan-segan membantah nasehat orang tuanya. Hampir setiap hari ia &lsquo;nongkrong&rsquo; bersama teman-temannya, kadang-kadang sampai larut malam, sehingga paginya malas untuk masuk sekolah. Kalau sudah demikian itu ia terus bolos sekolah, juga tidak pulang ke rumah, melainkan jalan-jalan kebeberapa tempat hiburan. Suatu hari ditanya oleh guru pembimbing kenapa tidak masuk sekolah, jawabnya sederhan yaitu &lsquo;malas&rsquo;<br />Memperhatikan cerita Rudi, timbul pertanyaan &ldquo;kenapa Rudi malas?&rdquo; Rudi malas karena pada dirinya ridak ada motivasi. Mengapa tidak ada motivasi ? Jawabnya adalah karena Rudi :<br />a.&nbsp;&nbsp;&nbsp; Tidak mempunyai tujuan/cita-cita yang jelas dan kuat.<br />b.&nbsp;&nbsp;&nbsp; Tidak memahami keinginan orang tuanya<br />c.&nbsp;&nbsp;&nbsp; Tidak memahahi bahwa hidup itu penuh kesulitan</p>\r\n<p>Hari-hari pertama di kelas VII atau kelas IX adalah suatu kebanggan tersendiri, karena telah berhasil melampaui perjuangan yang cukup berat. Namun hasil yang telah dicapai tersebut sekarang harus dipertanggungjawabkan. Perjuangan belum akhir, dimana kita harus mengakhiri masa belajar SMP dan untuk kemudian melanjutkan ke SMA/MA atau SMK, Perguruan Tinggi, Bekerja dan seterusnya. Pada prinsip sepanjang hidupnya manusia akan menghadapi perjuangan, dan untuk dapat melampaui setiap perjuangan perlu adanya semangat atau motivasi. Perhatikan ilustrasi berikut :<br />1.&nbsp;&nbsp;&nbsp; Ani ingin menjadi dokter, maka setiap hari Ani selalu berusaha menyiapkan diri dengan seabik-baiknya mulai dari belajar, mengerjakan tugas-tugas, latihan soal, membuat catatan, diskusi/belajar kelompok, sampai berusaha memahami bagaimana seharusnya berkepribadian seorang dokter, disamping selalu berdoa dan rajin beribadah. Karena kerja kerasnya&nbsp; itu maka Ani selalu mendapat peringkat terbaik disekolahnya. Keinginan yang kuat ANi dapat memotivasi dirinya dalam belajar.<br />2.&nbsp;&nbsp;&nbsp; Roni mempunyai kegemaran main gitar. Ia ingin sekali memiliki gitar, tetapi tabungannya belum cukup. Mengetahui hal tersebut orang tua Roni mengatakan bahwa kalau ingin dibelikan gitar, nanti kalau naik kelas dan nilainya dapat mencapai peringkat 5 besar. Mendengar kata-kata ayahnya, Roni menjadi tambah semangat belajarnya. Ia betul-betul belajar keras dan berdoa agar memenuhi harapan orang tuanya. Contoh diatas memberikan gambaran bahwa semangat belajar Roni timbul karena factor luar, yaitu ingin mendapat&nbsp; gitar dan ingin memenuhi harapan orang tuanya.<br />3.&nbsp;&nbsp;&nbsp; Rudi adalah anak pertama dari tiga bersaudara, adiknya masih kecil-kecil, Rudi adalah harapan satu-satunya orang tuanya yang akan dapat membantu ekonomi keluarga. Tapi sayangnya Rudi mempunyai pandangan yang berbeda dengan orang tuanya. Sebagai anak yang mulai berangkat remaja, ia ingin &lsquo;gaul&rsquo; seperti teman-temannya. Dengan dalih kebebasan, ia tidak segan-segan membantah nasehat orang tuanya. Hampir setiap hari ia &lsquo;nongkrong&rsquo; bersama teman-temannya, kadang-kadang sampai larut malam, sehingga paginya malas untuk masuk sekolah. Kalau sudah demikian itu ia terus bolos sekolah, juga tidak pulang ke rumah, melainkan jalan-jalan kebeberapa tempat hiburan. Suatu hari ditanya oleh guru pembimbing kenapa tidak masuk sekolah, jawabnya sederhan yaitu &lsquo;malas&rsquo;<br />Memperhatikan cerita Rudi, timbul pertanyaan &ldquo;kenapa Rudi malas?&rdquo; Rudi malas karena pada dirinya ridak ada motivasi. Mengapa tidak ada motivasi ? Jawabnya adalah karena Rudi :<br />a.&nbsp;&nbsp;&nbsp; Tidak mempunyai tujuan/cita-cita yang jelas dan kuat.<br />b.&nbsp;&nbsp;&nbsp; Tidak memahami keinginan orang tuanya<br />c.&nbsp;&nbsp;&nbsp; Tidak memahahi bahwa hidup itu penuh kesulitan<br />d.&nbsp;&nbsp;&nbsp; Tidak memahami aturan dan tata tertib sekolah<br />e.&nbsp;&nbsp;&nbsp; Tidak memahami diri (tugas dan kewajiban sendiri<br />Dari beberapa ilustrasi dapat diketahui bahwa motivasi sangat diperlukan dalam mencapai suatu tujuan. Juga dapat diketahui bahwa motivasi ada yang berasal dari dalam diri dan ada yang berasal dari luar diri.<br />Adapun factor-faktor yang harus diperhatikan dalam mengembangkan motivasi belajar adalah :<br />-&nbsp;&nbsp;&nbsp; Setiap usaha belajar perlu ditetapkan niat dan tujuan yang jelas<br />-&nbsp;&nbsp;&nbsp; Merencanakan kegitan belajar sebaik-baiknya<br />-&nbsp;&nbsp;&nbsp; Memahami setiap hambatan yang dihadapi dalam belajar.<br />-&nbsp;&nbsp;&nbsp; Berdoa untuk keberhasilan<br />-&nbsp;&nbsp;&nbsp; Selalu mawas diri dan mengembangkan kesadaran untuk lebih memahami diri. Semakin dalam pemahaman diri seseorang semakin besar semangata yang akan muncul.<br />-&nbsp;&nbsp;&nbsp; Mau menerima masukan dari orang lain<br />-&nbsp;&nbsp;&nbsp; Memahami norma-norma tentang belajar yang baik<br />-&nbsp;&nbsp;&nbsp; Mempunyai rencana masa depan.<br />Motivasi harus selau ada dan dipelihara, agar senantiasa hidup menggelora didalam jiwa kita semuanya. Kalau kita kehilangan semangat, badan rasanya lemah, malas, tidak bergairah, tidak berdaya, bahkan merasa tidak berharga. Sungguh ini sangat merugikan. Jadi motivasi sangat diperlukan untuk keberhasilan seseorang dalam belajar adalah idaman setiap orang dalam berusaha. Agar kita memahami usaha-usaha apakah yang perlu diperhatikan, perhatikan hal-hal berikut ini :<br />A.&nbsp;&nbsp;&nbsp; Persyaratan akademis, meliputi :<br />1.&nbsp;&nbsp;&nbsp; Hasil ulangan yang diperoleh sudah tuntas/lulus<br />2.&nbsp;&nbsp;&nbsp; Kehadiran disekolah hendaknya sesuai dengan ketentuan<br />3.&nbsp;&nbsp;&nbsp; Konsentrasi belajar baik dirumah maupuan di sekolah<br />4.&nbsp;&nbsp;&nbsp; Kesehatan fisik maupun mental yang menunjang kegiatan belajar<br />5.&nbsp;&nbsp;&nbsp; Kelengkapan catatan pelajaran<br />6.&nbsp;&nbsp;&nbsp; Mengerjakan tugas (PR) dengan baik</p>\r\n<p><br />B.&nbsp;&nbsp;&nbsp; Persyaratan Budi Pekerti, meliputi :<br />1.&nbsp;&nbsp;&nbsp; Kelakuan :<br />-&nbsp;&nbsp;&nbsp; Ketaatan terhadap tata tertib sekolah<br />-&nbsp;&nbsp;&nbsp; Bersikap santun dan ramah kepada guru/karyawan sekolah<br />-&nbsp;&nbsp;&nbsp; Menjalin hubungan baik dengan teman sebaya<br />-&nbsp;&nbsp;&nbsp; Menperhatikan pelajaran<br />2.&nbsp;&nbsp;&nbsp; Kerajinan<br />-&nbsp;&nbsp;&nbsp; Kehadiran dalam kegiatan belajar mengajar<br />-&nbsp;&nbsp;&nbsp; Kehadiran dalam kegiatan ekstra&nbsp; kurikuler<br />-&nbsp;&nbsp;&nbsp; Aktif mengikuti kegiatan peringatan hari-hari besar nasional maupun agama<br />-&nbsp;&nbsp;&nbsp; Kehadiran dalam kegiatan upacara bendera<br />-&nbsp;&nbsp;&nbsp; Mengerjakan PR atau tugas-tugas lain dari guru.<br />-&nbsp;&nbsp;&nbsp; Kelengkapan dan kerajinan buku catatan<br />3.&nbsp;&nbsp;&nbsp; Kerapian/kebersihan<br />-&nbsp;&nbsp;&nbsp; Memakai seragam lengkap sesuai ketentuan<br />-&nbsp;&nbsp;&nbsp; Memakai pakaian bersih dan rapi<br />-&nbsp;&nbsp;&nbsp; Rambut di sisir rapi, tidak mengenakan pewarna rambut.<br />-&nbsp;&nbsp;&nbsp; Menjaga keberhasilan diri dan lingkungannya.<br />-&nbsp;&nbsp;&nbsp; Buku-buku pelajaran diampul rapid an bersih<br />-&nbsp;&nbsp;&nbsp; Membuang sampah ditempatnya.<br />C.&nbsp;&nbsp;&nbsp; Faktor &lsquo;X&rsquo;<br />Untuk dapat naik kelas, selain memperhatikan persyaratan akademis dan budi pekerti masih ada hal lain yang menentukan yaitu factor &lsquo;X&rsquo;. Manusia hanya dapat berusaha, tetapi Tuhan Yang Maha Esa jualah yang menentukan usaha kita berhasil atau tidak, itulah sebabnya dengan factor &lsquo;X&rsquo;. Oleh karena itu setelah kita memperhatikan semua usaha, sebaiknya kita selalu berdoa baik sebelum maupun sesudah belajar, dan setiap selesai sembahyang, agar Tuhan Yang Maha Esa senantiasa&nbsp; ember petunjuk dan kemudahan kepada kita serta meridhoi semua yang telah kita lakukan</p>', '2016-02-03 10:01:34', '2016-05-23 06:54:44', 1, 9, 'Tidak', 'Ya'),
(131, 'IMG_2175.JPG', 'Motivasi Siswa Kelas IX untuk Mengahadapi UN', 1, 'berita', '<p>Dalam rangka menghadapi ujian naisional tahun 2016 selurauh siswa kelas IX di berikan motivasi semngat dalam belajar dan semangat dalam menghadapi ujian naional.</p>\r\n<p>&nbsp;</p>', '2016-02-03 10:07:27', '2016-02-09 10:32:44', 1, 16, 'Tidak', 'Ya'),
(132, '', 'Bola Volly', 0, 'ekstra', '<p>Ekstrakulikuler Bola Volly di laksanakan setiap hari selasa jam 13.30 sampai jam 15.00</p>\r\n<p><strong>Pembimbing : </strong>Tukiman, S.Pd</p>', '2016-02-03 10:37:24', '2016-02-21 14:54:34', 1, 15, 'Tidak', 'Ya'),
(133, '', 'Futsal ', 0, 'ekstra', '<p>Ekstrakulikuler Futsal di laksanakan pada hari sabtu jam 15.00 sampai 16.30</p>\r\n<p><strong>Pendamping : Dedy rosman ispriyanto, S.Pd</strong></p>', '2016-02-03 10:42:21', '0000-00-00 00:00:00', 1, 4, 'Tidak', 'Ya'),
(134, '', 'Karawitan', 0, 'ekstra', '<p>Ekstra karawitan bagi siswa kelas XIII dilaksanakan pada hari sabtu jam 13.00 sampai jam 14.00</p>\r\n<p><strong>Pendamping : Karsinah, S.Pd</strong></p>', '2016-02-03 10:43:59', '2016-02-21 14:59:59', 1, 6, 'Tidak', 'Ya'),
(135, '', 'Karate', 0, 'ekstra', '<p>Ekstra Karate di laksannkan pada hari sabtu jam 14.00 sampai 15.00</p>\r\n<p><strong>Pendamping : R Dekky Yuwono</strong></p>', '2016-02-03 10:45:15', '0000-00-00 00:00:00', 1, 9, 'Tidak', 'Ya'),
(136, '', 'Drum Band', 0, 'ekstra', '<p>Ekstra Drum band dilaksanakan pada hari sabtu jam 14.00 sampai 15.00</p>\r\n<p><strong>Pendamping : Edy purwanto, S.Pd</strong></p>', '2016-02-03 10:46:49', '0000-00-00 00:00:00', 1, 6, 'Tidak', 'Ya'),
(137, '', 'Seni Baca Tulis Al qu''ran', 0, 'ekstra', '<p>Ekstra BATUHA ini di laksanakan pada hari jumat Jam 13.00 sampai jam 14.00</p>\r\n<p><strong>Pendamping : Ngadino</strong></p>', '2016-02-03 10:48:50', '0000-00-00 00:00:00', 1, 8, 'Tidak', 'Ya'),
(140, 'DSC066991.JPG', 'Kejuaran Karate', 2, 'berita', '<p>Tim Futsal SMP Negeri 2 Moyudan Sleman, mendapatakan juara 2 lomba Futsal antar pelajar yang di selenggarakan oleh smp bina umat.<br /><br />Demikian dikatakan Dedy selaku pelatih sekaligus guru olahraga sekolah ini, Selasa (16/2). Dia mengatakan, prestasi ini diharapkan tidak membuat para anak muridnya puas sampai di sini, namun terus mengembangkan prestasinya dalam bidang olah raga di ivent yang akan datang.<br /><br />Lanjut Dedy mengatakan, perjalanan Tim futsal SMP negeri 2&nbsp; moyudan tampil sebagai juara&nbsp; 2 tidak dilalui dengan mudah, tetapi melalui perjuangan yang tidak mengenal lelah,sangatlah luar biasa peperjuangannya.<br /><br />Sementara itu, Kepala Sekolah SMP Negeri 2 moyudan&nbsp; merasa bangga dengan prestasi yang di raih oleh anak didiknya.</p>', '2016-02-05 09:49:06', '2016-05-05 00:28:57', 1, 17, 'Tidak', 'Tidak'),
(142, '20160226_081400.jpg', 'Lomba Futsal Antar Pelajar', 2, 'berita', '<p>Tim Futsal SMP Negeri 2 Moyudan Sleman, mendapatakan juara 2 lomba Futsal antar pelajar yang di selenggarakan oleh smp bina umat.<br /><br />Demikian dikatakan Dedy selaku pelatih sekaligus guru olahraga sekolah ini, Selasa (16/2). Dia mengatakan, prestasi ini diharapkan tidak membuat para anak muridnya puas sampai di sini, namun terus mengembangkan prestasinya dalam bidang olah raga di ivent yang akan datang.<br /><br />Lanjut Dedy mengatakan, perjalanan Tim futsal SMP negeri 2&nbsp; moyudan tampil sebagai juara&nbsp; 2 tidak dilalui dengan mudah, tetapi melalui perjuangan yang tidak mengenal lelah,sangatlah luar biasa peperjuangannya.<br /><br />Sementara itu, Kepala Sekolah SMP Negeri 2 moyudan&nbsp; merasa bangga dengan prestasi yang di raih oleh anak didiknya.</p>', '2016-03-11 09:35:55', '2016-03-28 18:54:18', 1, 5, 'Tidak', 'Ya'),
(143, '', 'Sejarah SMP negeri 2 moyudan', 0, 'profil', '<p>SMP negeri 2 Moyudan beridi pada 1 juli 1984 Secara umum, SMP N 2 Moyudan memiliki gedung sekolah permanen. Di dalam gedumg terdapat berbagai fasilitas yang dapat menunjang kegiatan belajar mengajar di sekolah, antara lain ruang guru, karyawan, perpustakaan, uks, koperasi, mushola dan berbagai fasilitas sekolah lainnya. Sekolah memiliki 2 gebang, yaitu pintu gerbang utama terletak di sebelah selatandan pintu gerbang sekolah sebelah utara. Fasilitas yang dimiliki SMP N 2 Moyudan dikatakan cukup baik dan layak untuk mendukung kegitaan belajar mengajar.</p>', '2016-03-23 08:27:41', '2016-03-27 19:25:55', 1, 9, 'Tidak', 'Ya'),
(144, '', 'Lokasi SMP negeri 2 Moyudan', 0, 'profil', '<p>Lokasinya&nbsp; disini :njcxkc</p>\r\n<p>Alamat setran sumberarum moyudan sleman dd fdfdfdf</p>\r\n<p>&lt;iframe src=\\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.6518967389247!2d110.22761181448546!3d-7.771153094399363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7af0cdfb9d2d01:0x6dda64837ce2da69!2sSMPN+2+Moyudan!5e1!3m2!1sid!2sid!4v1458698590485\\" width=\\"600\\" height=\\"450\\" frameborder=\\"0\\" allowfullscreen=\\"\\"&gt;&lt;/iframe></p>', '2016-03-23 08:57:41', '2016-05-10 17:50:37', 1, 19, 'Tidak', 'Ya'),
(145, 'DSC02951.JPG', 'Upacara Peringatan Hari Kartini 2016', 2, 'berita', '<p>Upacara memperingati Hari Kartini di SMP Negeri 2 Moyudan Sleman dilaksanakan tepat tanggal 21 April 2002. Seluruh petugas upacara adalah guru dan karyawan SMP Negeri 2 Moyudan Sleman&nbsp; , dari petugas lapangan sampai Pembina upacara semua adalah Wanita. Hal ini dimaksudkan untuk menumbuhkan rasa tanggung jawab sebagai wanita Indonesia penerus perjuangan Raden Ajeng Kartini.</p>', '2016-05-05 00:38:05', '0000-00-00 00:00:00', 1, 0, 'Tidak', 'Ya'),
(146, 'DSCN0012.JPG', 'Pemberian Motivasi Mengahadapi UN ', 1, 'berita', '<p>Dalam rangka memepersiapan diri untuk menghadapi ujian nasional SMP Negeri 2 moyudan memberikan motivasi kepada anak2 kelas 9 agar semgat dalam berlajar.</p>\r\n<p>&nbsp;</p>', '2016-05-05 00:48:38', '2016-05-05 00:49:20', 1, 4, 'Tidak', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `pengelola`
--

CREATE TABLE IF NOT EXISTS `pengelola` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('1','2') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pengelola`
--

INSERT INTO `pengelola` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', '1'),
(2, 'yuli', 'yuli', '596090b2351f7403677da1014a13a87e', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ref_topik`
--

CREATE TABLE IF NOT EXISTS `ref_topik` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ref_topik`
--

INSERT INTO `ref_topik` (`id`, `nama`) VALUES
(1, 'Ujian Nasional'),
(2, 'Kesiswaan'),
(3, 'Kepegawaian'),
(4, 'Sarana Prasarana');

-- --------------------------------------------------------

--
-- Table structure for table `tanya_jawab`
--

CREATE TABLE IF NOT EXISTS `tanya_jawab` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp_hp` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `pesan` mediumtext NOT NULL,
  `jawaban` mediumtext NOT NULL,
  `tgl_post` datetime NOT NULL,
  `tgl_jawab` datetime NOT NULL,
  `is_view` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tanya_jawab`
--

INSERT INTO `tanya_jawab` (`id`, `nama`, `email`, `telp_hp`, `alamat`, `pesan`, `jawaban`, `tgl_post`, `tgl_jawab`, `is_view`) VALUES
(16, 'dfdsd', 'jkfg', '8', ',mg.', ',gj.fd', '', '2016-02-17 23:22:23', '0000-00-00 00:00:00', 'N'),
(17, 'aa', 'a@yahoo.com', '9090', 'alamat', 'pesan', '', '2016-02-17 23:35:46', '0000-00-00 00:00:00', 'N'),
(18, 'yuli', 'kdsfh', '1212', 'dkslfj', 'lds;jfk', '', '2016-03-08 11:26:54', '0000-00-00 00:00:00', 'N'),
(19, 'yuli subagya', 'yulisubagya@gmail.com', '083840117986', 'pengasih kulon progo', 'maju terus montesa', '', '2016-03-18 10:45:02', '0000-00-00 00:00:00', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `t_absen`
--

CREATE TABLE IF NOT EXISTS `t_absen` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(6) DEFAULT NULL,
  `tgl` date NOT NULL,
  `ket` enum('H','A','S','I') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_siswa` (`id_siswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `t_absen`
--

INSERT INTO `t_absen` (`id`, `id_siswa`, `tgl`, `ket`) VALUES
(1, 31, '2016-05-10', 'H'),
(2, 32, '2016-05-10', 'H'),
(3, 33, '2016-05-10', 'S'),
(4, 34, '2016-05-10', 'H'),
(5, 35, '2016-05-10', 'H'),
(6, 36, '2016-05-10', 'A'),
(7, 37, '2016-05-10', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `t_ptk`
--

CREATE TABLE IF NOT EXISTS `t_ptk` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `blog` varchar(100) NOT NULL,
  `tugas` enum('guru','tu') NOT NULL,
  `tugas_detil` varchar(100) NOT NULL,
  `foto` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `t_ptk`
--

INSERT INTO `t_ptk` (`id`, `nip`, `nama`, `tmp_lahir`, `tgl_lahir`, `email`, `blog`, `tugas`, `tugas_detil`, `foto`) VALUES
(1, '19610618 198403 2 006', 'SITI ROSIDAH S.Pd.', 'Sleman', '1961-06-18', '-', '-', 'guru', 'Bahasa Indoesia, Kepala Sekolah', '1._SITI_R_.jpg'),
(2, '19730221 199802 1 001', 'DIDIK SAIFURRAKHMAN, S.Pd.', 'Sleman', '1973-12-02', '-', '-', 'guru', 'Bimbingan Konseling', '31._DIDIK_._S_.jpg'),
(3, '19610822 198303 1 008', 'PRIYO DWI HARYANTO, M.Pd. ', 'Yogyakarta', '1961-08-22', '-', '-', 'guru', 'Bahasa Inggris', '5._PRIYO_DH_.jpg'),
(4, '19650105 198601 2 003', 'DWIYANTI, S.Pd. ', 'Klaten', '1965-01-05', '-', '-', 'guru', 'Ilmu Pengetahuan Sosial', 'DWIYANTI_UNGGAH.jpg'),
(5, '19590721 198103 2 005', 'C. SUHARTI, S.Pd.', 'Sleman', '1959-07-21', '-', '-', 'guru', 'Bahasa Indonesia', '6._C_SUHARTI_unggah_.jpg'),
(6, '19640321 198903 2 003', 'SRI WIDADA, S.Pd. ', 'Sleman', '1964-03-21', '-', '-', 'guru', 'Matematika', 'Sri_Widada_Unggah.jpg'),
(7, '19580331 198503 1 004', 'SARDI, S.Pd. ', 'Sleman', '1958-03-31', '-', '-', 'guru', 'IPS', 'Sarkowi_S.Pd_.I_.jpg'),
(8, '19611104 198501 1 001', 'TUKIMAN, SPd. ', 'Sleman', '1961-11-04', '-', '-', 'guru', 'Penjaskes', 'Asnah_Al_Amien_S.Ag_.jpg'),
(9, '19640306 198412 2 004', 'SUTI ARSIYAH, S.Pd.', 'Yogyakarta', '1964-03-06', '-', '-', 'guru', 'Bahasa indonesia', 'Suharisman_S.Pd_.jpg'),
(10, '19660317 199003 2 003', 'YUSTINA WIDIYATI, S.Pd.', 'Sleman', '1966-03-12', '-', '-', 'guru', 'Bahasa Inggris', 'Syamsudi_S.Pd_.jpg'),
(11, '19560705 198602 2 003', 'SUPRIHATIN, B.A. ', 'Sleman', '1959-07-05', '-', '-', 'guru', 'Bimbingan Konseling', 'merah.jpg'),
(12, '19680420 199603 2 002', 'KARSINAH, S.Pd ', 'Sleman', '1964-07-16', '-', '-', 'guru', 'Bahasa Seni Tari', 'Dra.Sugiyatmi2_.jpg'),
(13, '19580706 198303 1 022', 'L. YUSUP SUDIYANA, S.Pd. ', 'Sleman', '1958-07-06', '-', '-', 'guru', 'Bahasa Indonesia', 'Annurrahman_S.Pd_.jpg'),
(14, '19590705 198003 1 013', 'SUDIMAN, S.Pd ', 'Sleman', '1959-07-05', '-', '-', 'guru', 'Bahasa PKN', 'Titin_Purwati_S.Pd_.jpg'),
(15, '19590917 198803 1 005', 'Drs.A. TRI NUGROHO ', 'Sleman', '1959-09-17', '-', '-', 'guru', 'Bahasa Jawa', 'Komarudin_S.Pd_.Jas_.jpg'),
(16, '19621015 198403 2 008', 'UMU HIKMATIN, A.Md.', 'Sleman', '1962-10-15', '-', '-', 'guru', 'Jasa', 'Musdi_S.Pd_.jpg'),
(17, '19631231 198501 1 011', 'BIBIT LESTARI, S.Pd. ', 'Sleman', '1963-12-31', '-', '-', 'guru', 'IPA', 'Drs_Heriyanto.jpg'),
(18, '19660105 198903 2 007', 'SRI HARTATI, S.Pd. ', 'Kulonprogo', '1966-01-05', '-', '-', 'guru', 'Matematika', 'Ismunandar_S.Pd_.I_.jpg'),
(19, '19661026 199002 1 001', 'SUNARTO, S.Pd. ', 'SLEMAN', '1966-10-26', '-', '-', 'guru', 'IPA', ''),
(22, '-', 'RUMINI, A.Ma', 'SLEMAN', '1963-09-24', '-', '-', 'tu', 'Kepala Tata Usaha', 'Rumini_unggah.jpg'),
(25, '-', 'SANGSANG', 'SLEMAN', '1973-03-04', '-', '-', 'tu', 'Staff TU', 'Harwanto.jpg'),
(26, '-', 'IS MARYANI', 'SLEMAN', '1953-12-01', '-', '-', 'tu', 'Staff TU', '44._IS_SUMARYANI_.jpg'),
(27, '-', 'ATIK', 'SLEMAN', '1959-07-26', '-', '-', 'tu', 'Staff TU', 'Atik_Widayati_Unggah.jpg'),
(28, '-', 'MARIYEM', 'SLEMAN', '1962-10-12', '-', '-', 'tu', 'Staff TU', 'Mariyem_Unggah.jpg'),
(29, '-', 'RIDWAN', 'SLEMAN', '1964-07-22', '-', '-', 'tu', 'Pengurus Barang', 'Ridwan_Unggah1.jpg'),
(30, '-', 'HARINTOKO', 'SLEMAN', '1988-01-30', '-', '-', 'tu', 'Staff TU', 'Harintoko_Unggah1.jpg'),
(39, '-', 'PRANYOTO', 'Sleman', '1980-03-29', '-', '-', 'tu', 'TU', ''),
(40, '-', 'YULI SUBAGYA', 'Kulon Progo', '1991-07-17', 'yulisubagya@gmail.com', 'alwayhbahagya.blogspot.com', 'tu', 'TU', 'yuli.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_siswa`
--

CREATE TABLE IF NOT EXISTS `t_siswa` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nis` varchar(10) NOT NULL DEFAULT '0',
  `nama` varchar(50) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `agama` enum('Islam','Katholik','Kristen','Hindu','Budha','Konghucu','Lainnya') NOT NULL,
  `kelas` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `t_siswa`
--

INSERT INTO `t_siswa` (`id`, `nis`, `nama`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `kelas`) VALUES
(1, '5505', 'ALIF NUR ARI MAQFIROH', 'SLEMAN', '2003-12-13', 'P', 'Islam', '7a'),
(2, '5506', 'ANNGIE KUMALASARI WASONONPUTRI', 'SLEMAN', '2003-08-03', 'P', 'Islam', '7a'),
(3, '5507', 'APRIYONO', 'SLEMAN', '2002-04-16', 'L', 'Islam', '7a'),
(4, '5508', 'ASEP WIJAYANTO', 'SLEMAN', '2002-09-12', 'L', 'Islam', '7a'),
(5, '5509', 'BAYU RIDWAN', 'DEPOK', '2004-03-23', 'L', 'Islam', '7a'),
(6, '5510', 'DHANU FEBRI KURNIAWAN', 'SLEMAN', '2003-02-20', 'L', 'Islam', '7a'),
(7, '5511', 'DIKI CAHYO ASTIANTO', 'SLEMAN', '2002-12-19', 'L', 'Islam', '7a'),
(8, '5512', 'EKA BIMA PRAKOSO', 'SLEMAN', '2001-05-09', 'L', 'Islam', '7a'),
(9, '5513', 'FAJAR DWI PRASETYA', 'SLEMAN', '2002-09-07', 'L', 'Islam', '7a'),
(10, '5514', 'FEBRI NUROHMAN', 'GUNUNG KIDUL', '2002-02-04', 'L', 'Islam', '7a'),
(11, '5515', 'HAMIM RAFA MAULANA', 'SLEMAN', '2003-06-29', 'L', 'Islam', '7a'),
(12, '5516', 'ILHAM AGUNG SETIADJI', 'SLEMAN', '2002-02-08', 'L', 'Islam', '7a'),
(13, '5517', 'JOHAN PRASETYO', 'BANTUL', '2002-02-13', 'L', 'Islam', '7a'),
(14, '5518', 'MIKAL MUSYARRAF', 'SLEMAN', '2002-04-02', 'L', 'Islam', '7a'),
(15, '5519', 'MOHAMMAD DEDY PUTRA PRATAMA', 'SLEMAN', '2002-11-03', 'L', 'Islam', '7a'),
(16, '5520', 'MUHAMMAD AJIB IRAWAN ', 'SLEMAN', '2002-10-02', 'L', 'Islam', '7a'),
(17, '5521', 'NANDA ARYA PUTRA', 'SLEMAN', '2001-07-06', 'L', 'Islam', '7a'),
(18, '5522', 'NANDA SETIAWAN', 'SLEMAN', '2003-01-03', 'L', 'Islam', '7a'),
(19, '5523', 'RAHLAN YUDHI SAPUTRA', 'SLEMAN', '2002-03-22', 'L', 'Islam', '7a'),
(20, '5524', 'RANI NUR HANDAYANI', 'SLEMAN', '2003-08-03', 'P', 'Islam', '7a'),
(21, '5525', 'SALSABILA LINTANG AYU PERDANA', 'SLEMAN', '2003-06-09', 'P', 'Islam', '7a'),
(22, '5526', 'SHIERYL SAFFA'' ALISA', 'SLEMAN', '2003-03-15', 'P', 'Islam', '7a'),
(23, '5527', 'TAUFIK ARDIYANTO', 'SLEMAN', '2003-03-30', 'L', 'Islam', '7a'),
(24, '5528', 'TYASA SAFA AMELIA', 'SLEMAN', '2002-05-02', 'P', 'Islam', '7a'),
(25, '5529', 'WAHYUNI EKA PUTRI', 'SLEMAN', '2003-07-12', 'P', 'Islam', '7a'),
(26, '5530', 'WENI LISTIYANI', 'SLEMAN', '2002-12-21', 'P', 'Islam', '7a'),
(27, '5531', 'WILDAN ABDUL HASAN', 'SLEMAN', '2002-10-09', 'L', 'Islam', '7a'),
(28, '5532', 'YURIKO ARDHI', 'SLEMAN', '2003-01-24', 'L', 'Islam', '7a'),
(29, '5533', 'YULITA NUR AINI', 'SLEMAN', '2003-07-07', 'P', 'Islam', '7a'),
(30, '5534', 'ZAENAL ARIFIN', 'SLEMAN', '2004-02-12', 'L', 'Islam', '7a'),
(31, '5535', 'AGUNG NUGROHO', 'SLEMAN', '2002-11-14', 'L', 'Islam', '7b'),
(32, '5536', 'AINUR RIDHO OKTAVIANTO', 'SLEMAN', '2002-10-16', 'L', 'Islam', '7b'),
(33, '5537', 'AMRAN PRABOWO', 'SLEMAN', '2002-04-03', 'L', 'Islam', '7b'),
(34, '5538', 'BAYU NURCAHYA', 'SLEMAN', '2002-01-04', 'L', 'Islam', '7b'),
(35, '5539', 'BHENTA ARDYAWAN PUTRA', 'YOGYAKARTA', '2003-03-16', 'L', 'Islam', '7b'),
(36, '5540', 'DEVI KURNIA SARI', 'SLEMAN', '2002-07-12', 'P', 'Islam', '7b'),
(37, '5541', 'DEWI MEGARANTI', 'JAKARTA', '2003-09-11', 'P', 'Islam', '7b'),
(38, '122', 'hsdjfds', 'djkh', '2016-05-10', 'L', 'Islam', '7c');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galeri_file`
--
ALTER TABLE `galeri_file`
  ADD CONSTRAINT `galeri_file_ibfk_1` FOREIGN KEY (`id_album`) REFERENCES `galeri_album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_absen`
--
ALTER TABLE `t_absen`
  ADD CONSTRAINT `t_absen_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `t_siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
