-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 01, 2022 at 01:15 PM
-- Server version: 10.3.35-MariaDB-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jualika3_ikanku`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `edukasi`
--

CREATE TABLE `edukasi` (
  `idedukasi` int(11) NOT NULL,
  `judul` text COLLATE utf8_unicode_ci NOT NULL,
  `kategoriedukasi` text COLLATE utf8_unicode_ci NOT NULL,
  `isi` text COLLATE utf8_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `sumber` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `edukasi`
--

INSERT INTO `edukasi` (`idedukasi`, `judul`, `kategoriedukasi`, `isi`, `gambar`, `link`, `sumber`) VALUES
(1, 'budidaya lele (Video)', '', '', '', 'J-um6J-dtEw', ''),
(2, 'edukasi lele (Artikel)', '', 'budidaya lele dapat dilakukan dengan menggunakan media terpal di halaman rumah', 'https://jualikanku.my.id/gambar/edukasi/Ikan-Lele-Dumbo.jpg', '', ''),
(3, 'edukasi ikan gurame (Video)', '', '', '', 'p_RCUzM7wps', ''),
(5, 'Peluang Usaha Budidaya Ikan Nila Bioflok Panen Cepat dan Untung 2 Juta Per Kolam (Video)', '', '', '', 'eH8nCmolkXY', 'https://www.youtube.com/c/CapCapungProduction');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `idkabupaten` int(11) NOT NULL,
  `namakabupaten` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`idkabupaten`, `namakabupaten`) VALUES
(1, 'Kabupaten Malang');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `namakategori` text NOT NULL,
  `gambarkategori` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`, `gambarkategori`) VALUES
(1, 'Ikan', 'https://jualikanku.my.id/gambar/kategori/ikan.png'),
(2, 'Bibit', 'https://jualikanku.my.id/gambar/kategori/bibit.png'),
(3, 'Pakan', 'https://jualikanku.my.id/gambar/kategori/pakan.png'),
(4, 'Perlengkapan', 'https://jualikanku.my.id/gambar/kategori/perlengkapan.png'),
(5, 'Obat', 'https://jualikanku.my.id/gambar/kategori/obat.png');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `idkecamatan` int(11) NOT NULL,
  `namakecamatan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`idkecamatan`, `namakecamatan`) VALUES
(1, 'Kecamatan Kepanjen'),
(2, 'Kecamatan Gondanglegi');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `idkeranjang` int(11) NOT NULL,
  `idpengguna` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`idkeranjang`, `idpengguna`, `idproduk`, `jumlah`) VALUES
(1, 11, 1, 25),
(2, 11, 1, 25),
(3, 11, 1, 25),
(5, 1, 2, 2),
(6, 3, 2, 5),
(23, 15, 4, 10),
(26, 15, 16, 5),
(27, 15, 15, 6),
(28, 22, 4, 2),
(29, 22, 3, 2),
(30, 22, 4, 5),
(31, 22, 18, 2),
(32, 15, 18, 1),
(33, 22, 16, 5),
(34, 22, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(50) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telp` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `provinsi` text COLLATE utf8_unicode_ci NOT NULL,
  `kabupaten` text COLLATE utf8_unicode_ci NOT NULL,
  `kecamatan` text COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `namatoko` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `nama`, `telp`, `password`, `provinsi`, `kabupaten`, `kecamatan`, `alamat`, `namatoko`, `photo`, `status`) VALUES
(1, 'abi', 'abiyusuf', '082230309981', '$2y$10$AxCJ1VlglcP3t9Eea7dp9Oiq0ISiCkgX2sUGqr9khoWZv1tX7XzfK', '', '', '', 'jl. sumber sari pagelaran kabupaten malang', NULL, NULL, 1),
(2, 'Gabriella', 'Gabriella Alicia Putri', '081335811912', '$2y$10$Z1FXhZOQZdsVlXYdItFqoeazYpLJmcYrP7SZtimXh0ruQXRL/9sNa', '', '', '', 'jl. ....', NULL, NULL, 1),
(3, 'aji', 'Aji Sampurno', '082334059852', '$2y$10$zSlkWl0haqSBw3ZYVmyiE.yS.C5cJrJHvhweRusnv9cfdEku57Bsa', '', '', '', 'jl.kyai saman, desa tegalsari, kecamatan kepanjen, kabupaten malang', 'berkah lele', NULL, 2),
(4, 'amanda_', 'Amanda Retno Fitriani', '0895335420342', '$2y$10$V7Bngeove1ZSb3Y.f44tTOySFSkO0umM7IgXu/cYmjTJmYAtfnkzW', '', '', '', 'Gondanglegi Malang', NULL, NULL, 1),
(5, 'anhar', 'Muhammad Lutfi Anhar', '081335360250', '$2y$10$I464X9fITFtg.ffa1SfvPes71cY33vda.2YpiS1.BSkCRpKyXGFIW', '', '', '', 'kanigoro', NULL, NULL, 1),
(6, 'vivi', 'Alvian Abidatus Soliha', '081216781594', '$2y$10$.ZZzG8oPDlDmF8ahgiEsjOr/vC/WzzdhxNjnYVZYDWM..EGhsXnKi', '', '', '', 'Kebonjati', NULL, NULL, 1),
(7, 'hayana02', 'Hayana Rochimatus Saidah', '083841731344', '$2y$10$kBp5wXtCwsAL3MHvrn2gC.iRSH9OzQmZ8602A4Jm7AcX5eHJ0NIIm', '', '', '', 'Malang', NULL, NULL, 1),
(8, 'sasa', 'Khoirotun N.', '089507050403', '$2y$10$rrLaiyHlCIcA97/aO2kEOuNWGlP3oFdhQ655LRM5TkL7W2dny65jy', '', '', '', 'Ds. Wonokerto RT 20 RW 05', NULL, NULL, 1),
(9, 'udiltopia', 'Muhammad Fatha Madanil Ilmi', '0881026220434', '$2y$10$BxOxkMfmu2NsAk1edfQl0..VlnpCetDM4GVzV6kd/a1t5Qx/B7F96', '', '', '', 'Kademangan, Pagelaran, Malang', NULL, NULL, 1),
(10, 'Rendi', 'Rendi Ar', '085806331771', '$2y$10$MFXt4mkDwsb9MEvVANKDKeSdCwcY6f1Gg0k.A7cPDnkJe02h/eQpO', '', '', '', 'Karangsuko, Pagelaran', NULL, NULL, 1),
(11, 'tika', 'tika sulastri', '082333212345', '$2y$10$QmTYoviqsGdrThkjQCSi9.ss3MRjoe6q5WIRIalsTApQTho.Haa26', '', '', '', 'Mojokerto', NULL, NULL, 1),
(12, 'Nopnop', 'Novita Dwi Cahyaning', '083862598397', '$2y$10$Im0/8QNaSKu6NR9M79lN6OvJVcvKNk7rIEGt.HbbJnRXPALXH.QHa', '', '', '', 'Jl. Ahmad Yani, Banjarejo', NULL, NULL, 1),
(13, 'Nopnop', 'Novita Dwi Cahyaning', '083862598397', '$2y$10$COmv4rLUkY4ltN988SGqy.ohxu6YowFWqebkkMcFuFDjzvNiwwrXq', '', '', '', 'Jl. Ahmad Yani, Banjarejo', NULL, NULL, 1),
(14, 'nopnop', 'Novita Dwi Cahyaning', '083862598397', '$2y$10$oq0VM49.y2vOrY/2vYFBv.IE3s5sucTDQE87NtAMGNsnBX/Far/3K', '', '', '', 'Jl. Ahmad Yani, Banjarejo', NULL, NULL, 1),
(15, 'penjual', 'penjual', '082334059852', '$2y$10$mjDnS5w7i4iLtDCjwLL6SefXv.lmefoc9vnszQthB9.obIW8KlFeq', '', '', '', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', NULL, NULL, 2),
(16, 'pembeli', 'pembeli', '082334059852', '$2y$10$q06kY/F50znrhmIykGcW6O9Gp4izI0vPhLHndoI44LkIfz7CIS1Tu', '', '', '', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', 'berkahlele', NULL, 1),
(17, 'ajisampurno1', 'Aji Sampurno', '082334059852', '$2y$10$MJhEm7aLtxBacqX1rMbzI.kSkV2djSvjjVz0ZCf34sVPs0IGwuhkm', '', '', '', 'jl kayi saman, tegalsari, kepanjen, malang', NULL, NULL, 1),
(18, 'sam', 'sampurno', '082334059852', '$2y$10$pFy54tdOPqTq1LjTd0TFhOAjs3cdP5Pn.7glB1NqqP.YPIYLjL4sa', 'Jawa Timur', 'Kabupaten Malang', 'Kecamatan Kepanjen', 'tegalsari', NULL, NULL, 1),
(19, 'ji', 'aji', '082334059852', '$2y$10$vN42KQJzy4Y9.ONm10Rziu2qqDZJfE2Yu1HjGq5o7OYKZXnbZU67y', 'Jawa Timur', 'Kabupaten Malang', 'Kecamatan Kepanjen', 'tegalsari', NULL, NULL, 1),
(20, '', '', '', '$2y$10$Q4z8aq3daulo27kDIKZkM.JxIelDMVvgqa93Bd3k2TdAgxYLWWPkK', 'Jawa Timur', 'Kabupaten Malang', 'Kecamatan Gondanglegi', '', NULL, NULL, 1),
(21, 'login', 'login', '82334059852', '$2y$10$ajHtxjoDGAaQTkt3WilOE.l33.PEATVBNJ1Iw0AXOx0o5HLwZZiUG', 'Jawa Timur', 'Kabupaten Malang', 'Kecamatan Kepanjen', 'tegalsari', NULL, NULL, 1),
(22, 'phone', 'phone', '82334059852', '$2y$10$NgMoRYeDb.5ACqszK.OiGuzPPqRRZICmJIJ7zST9mvOty9/xACQme', 'Jawa Timur', 'Kabupaten Malang', 'Kecamatan Kepanjen', 'tegalsari', NULL, NULL, 1),
(23, 'regis', 'regis', '85156251693', '$2y$10$7eKfze5pBpfmvC/UG5uF.udPPwok/1lJ4jWZTQ/E8WjCtS/22uOYu', 'Jawa Timur', 'Kabupaten Malang', 'Kecamatan Gondanglegi', 'ketawang', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `idpesanan` int(11) NOT NULL,
  `invoice` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pembeli` int(11) DEFAULT NULL,
  `idproduk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `pengiriman` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `telp` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tglpesanan` date NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`idpesanan`, `invoice`, `pembeli`, `idproduk`, `jumlah`, `bayar`, `pengiriman`, `alamat`, `telp`, `tglpesanan`, `status`) VALUES
(1, 'IKN584941429', 11, 2, 8, 20000, 'COD', 'Mojokerto', '082333212345', '2022-06-11', 'baru'),
(2, 'IKN153551881', 15, 4, 2, 100000, 'COD', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', '082334059852', '2022-06-12', 'selesai'),
(16, 'IKN1230954126', 15, 4, 10, 500000, 'COD', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', '082334059852', '2022-06-12', 'baru'),
(17, 'IKN1600956197', 15, 3, 5, 225000, 'COD', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', '082334059852', '2022-06-13', 'baru'),
(18, 'IKN1476208003', 15, 4, 10, 500000, 'COD', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', '082334059852', '2022-06-13', 'baru'),
(19, 'IKN498001976', 17, 1, 12, 180000, 'COD', 'jl kayi saman, tegalsari, kepanjen, malang', '082334059852', '2022-06-14', 'baru'),
(20, 'IKN736377514', 17, 14, 2, 140000, 'COD', 'jl kayi saman, tegalsari, kepanjen, malang', '082334059852', '2022-06-14', 'selesai'),
(21, 'IKN498001976', 17, 1, 12, 180000, 'COD', 'jl kayi saman, tegalsari, kepanjen, malang', '082334059852', '2022-06-14', 'baru'),
(22, 'IKN736377514', 17, 14, 2, 140000, 'COD', 'jl kayi saman, tegalsari, kepanjen, malang', '082334059852', '2022-06-14', 'selesai'),
(23, 'IKN1114303238', 15, 2, 5, 105000, 'COD', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', '082334059852', '2022-06-26', 'baru'),
(24, 'IKN1242627929', 15, 6, 5, 60000, 'COD', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', '082334059852', '2022-06-26', 'baru'),
(25, 'IKN1255499359', 15, 1, 15, 225000, 'COD', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', '082334059852', '2022-06-26', 'baru'),
(26, 'IKN453388577', 15, 1, 15, 225000, 'COD', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', '082334059852', '2022-06-26', 'baru'),
(27, 'IKN1109175789', 15, 1, 10, 150000, 'COD', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', '082334059852', '2022-06-26', 'baru'),
(30, 'IKN1114303238', 15, 2, 5, 105000, 'COD', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', '082334059852', '2022-06-26', 'baru'),
(31, 'IKN1242627929', 15, 6, 5, 60000, 'COD', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', '082334059852', '2022-06-26', 'baru'),
(32, 'IKN1255499359', 15, 1, 15, 225000, 'COD', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', '082334059852', '2022-06-26', 'baru'),
(33, 'IKN453388577', 15, 1, 15, 225000, 'COD', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', '082334059852', '2022-06-26', 'baru'),
(34, 'IKN1109175789', 15, 1, 10, 150000, 'COD', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', '082334059852', '2022-06-26', 'baru'),
(35, 'IKN662219872', 15, 2, 9, 185000, 'COD', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', '082334059852', '2022-06-26', 'baru');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `idpenjual` int(11) NOT NULL,
  `namaproduk` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kategoriproduk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `hargaproduk` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  `gambarproduk` text COLLATE utf8_unicode_ci NOT NULL,
  `laporan` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `idpenjual`, `namaproduk`, `kategoriproduk`, `stok`, `hargaproduk`, `deskripsi`, `gambarproduk`, `laporan`) VALUES
(1, 3, 'lele lokal', 'Ikan', -24, 15000, 'ikan lele lokal segar yang di budidayakan dengan pakan terbaik', 'https://jualikanku.my.id/gambar/produk/790232359_1654395960.jpeg', 'dilaporkan'),
(2, 3, 'lele dumbo', 'Ikan', 0, 20000, 'lele dumbo dengan kualitas daging ikan yang enak harga jual per 1Kg', 'https://jualikanku.my.id/gambar/produk/1074438486_1654396085.jpeg', 'dilaporkan'),
(3, 15, 'Ikan gurame 1 kg', 'Ikan', 35, 45000, 'ikan gurame segar harga 1 kg', 'https://jualikanku.my.id/gambar/produk/1045580837_1655048315.jpeg', ''),
(4, 15, 'ikan gurame', 'Ikan', 20, 50000, 'ikan gurame segar siap goreng harga per 1 kg', 'https://jualikanku.my.id/gambar/produk/1780543959_1655048412.jpeg', ''),
(5, 15, 'bibit gurame', 'Bibit', 1000, 1500, 'bibit gurame dengan minimal pembelian 50 ekor,  kurang dari 50 ekor pesanan tidak dikirim', 'https://jualikanku.my.id/gambar/produk/979217060_1655051233.jpeg', ''),
(6, 15, 'pakan ikan repack 1kg', 'Pakan', 45, 12000, 'pakan ikan super cocok untuk pembesaran bibit ikan gurame', 'https://jualikanku.my.id/gambar/produk/382902776_1655051531.jpeg', ''),
(7, 15, 'serokan ikan', 'Perlengkapan', 10, 5000, 'serokan untuk memisahkan ikan kecil guna pembibitan ', 'https://jualikanku.my.id/gambar/produk/1298264873_1655080730.jpeg', ''),
(8, 15, 'terpal kolam ikan A15', 'Perlengkapan', 50, 60000, 'terpal untui budidaya ikan air tawar skala rumahan dengan kualitas A15', 'https://jualikanku.my.id/gambar/produk/410374518_1655080784.jpeg', ''),
(9, 15, 'terpal kolam ikan A5', 'Perlengkapan', 30, 60000, 'terpal untui budidaya ikan air tawar skala rumahan dengan kualitas A5', 'https://jualikanku.my.id/gambar/produk/1139404846_1655080828.jpeg', ''),
(10, 15, 'selang air ', 'Perlengkapan', 1500, 5000, 'selang air untuk proses budidaya ikan air tawar harga per meter', 'https://jualikanku.my.id/gambar/produk/69849387_1655080938.jpeg', ''),
(12, 15, 'selang air permeter', 'Perlengkapan', 5000, 5200, 'selang air harga meteran', 'https://jualikanku.my.id/gambar/produk/1508567513_1655081431.jpeg', ''),
(14, 15, 'obat ikan lele ', 'Obat', 48, 70000, 'obat ikan lele mengatasi bakteri maupun virus pada ikan', 'https://jualikanku.my.id/gambar/produk/879082229_1655081551.jpeg', ''),
(15, 15, 'ikan nila ukuran besar', 'Ikan', 3, 20000, 'ikan nila dengan ukuran besar harga per ekor', 'https://jualikanku.my.id/gambar/produk/655103029_1655081722.jpeg', ''),
(16, 15, 'ikan nila sedang', 'Ikan', 30, 16000, 'ikan nila ukuran sedang harga per ekor', 'https://jualikanku.my.id/gambar/produk/1625810160_1655081754.jpeg', ''),
(17, 15, 'ikan lele jumbo', 'Ikan', 20, 15000, 'ikan lele segar harga perkilo', 'https://jualikanku.my.id/gambar/produk/1751347940_1655085418.jpeg', ''),
(18, 15, 'ikan lele', 'Ikan', 25, 15000, 'ikan lele harga per 1kg,  gratis ongkir dengan minimal pembelian 10kg', 'https://jualikanku.my.id/gambar/produk/2026169349_1656265296.jpeg', '');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `idprovinsi` int(11) NOT NULL,
  `namaprovinsi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`idprovinsi`, `namaprovinsi`) VALUES
(1, 'Jawa Timur');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `idpesanan` int(11) NOT NULL,
  `invoice` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pembeli` int(11) DEFAULT NULL,
  `idproduk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `pengiriman` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `telp` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tglpesanan` date NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`idpesanan`, `invoice`, `pembeli`, `idproduk`, `jumlah`, `bayar`, `pengiriman`, `alamat`, `telp`, `tglpesanan`, `status`) VALUES
(19, 'IKN498001976', 17, 1, 12, 180000, 'COD', 'jl kayi saman, tegalsari, kepanjen, malang', '082334059852', '2022-06-14', 'baru'),
(20, 'IKN736377514', 17, 14, 2, 140000, 'COD', 'jl kayi saman, tegalsari, kepanjen, malang', '082334059852', '2022-06-14', 'selesai'),
(27, 'IKN1553959374', 15, 2, 5, 105000, 'COD', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', '082334059852', '2022-06-26', 'baru'),
(28, 'IKN420690723', 16, 3, 10, 450000, 'COD', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', '082334059852', '2022-06-26', 'baru'),
(29, 'IKN1089222164', 22, 2, 1, 20000, 'COD', 'tegalsari', '82334059852', '2022-06-29', 'baru'),
(30, 'IKN1933575057', 22, 15, 2, 40000, 'COD', 'tegalsari', '82334059852', '2022-07-01', 'baru'),
(31, 'IKN2067040011', 15, 15, 15, 300000, 'COD', 'Jl.Kyai Saman, Rt 01/ Rw 01, Tegalsari, Kepanjen, Malang', '082334059852', '2022-07-01', 'baru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `edukasi`
--
ALTER TABLE `edukasi`
  ADD PRIMARY KEY (`idedukasi`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`idkabupaten`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`idkecamatan`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`idkeranjang`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`idpesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`idprovinsi`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`idpesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `edukasi`
--
ALTER TABLE `edukasi`
  MODIFY `idedukasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `idkabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `idkecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `idkeranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `idpesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `idprovinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `idpesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
