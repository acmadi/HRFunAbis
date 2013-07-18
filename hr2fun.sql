-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 18, 2013 at 03:33 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hr2fun`
--

-- --------------------------------------------------------

--
-- Table structure for table `esms_disposisi_tree`
--

CREATE TABLE IF NOT EXISTS `esms_disposisi_tree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `esms_disposisi_tree`
--

INSERT INTO `esms_disposisi_tree` (`id`, `employee_id`, `name`, `parent_id`, `created_by`, `created_date`) VALUES
(5, '1110002', 'p Yaqub', 0, NULL, NULL),
(14, '1110004', 'Zia Ulhaq', 5, NULL, NULL),
(15, '1310057', 'Dwi Priyanto', 14, NULL, NULL),
(16, '1110003', 'Abdillah', 0, NULL, NULL),
(17, '1110019', 'Nanang Irawan', 16, NULL, NULL),
(18, '1110005', 'Supono', 17, NULL, NULL),
(19, '1110020', 'Pagi Apriyadi Arsay', 17, NULL, NULL),
(20, '1110005', 'Supono', 17, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `esms_inside_letter`
--

CREATE TABLE IF NOT EXISTS `esms_inside_letter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` varchar(10) NOT NULL,
  `version_date` date NOT NULL,
  `number` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `inisiator` varchar(50) NOT NULL,
  `ferivicator` varchar(50) NOT NULL,
  `to_division` varchar(50) NOT NULL,
  `to_company` varchar(50) NOT NULL,
  `to_contact` varchar(50) NOT NULL,
  `to_position` varchar(50) NOT NULL,
  `to_address` varchar(200) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `esms_outside_disposisi`
--

CREATE TABLE IF NOT EXISTS `esms_outside_disposisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `outside_id` int(11) NOT NULL,
  `number` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `disposisi_task` varchar(200) NOT NULL,
  `disposisi_from` varchar(50) NOT NULL,
  `disposisi_verified` varchar(20) NOT NULL,
  `disposisi_to` varchar(50) NOT NULL,
  `created_date` year(4) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `esms_outside_disposisi`
--

INSERT INTO `esms_outside_disposisi` (`id`, `parent_id`, `outside_id`, `number`, `subject`, `disposisi_task`, `disposisi_from`, `disposisi_verified`, `disposisi_to`, `created_date`, `created_by`) VALUES
(32, 0, 14, '005550.S/TK/DIR-TK/XI/2012', 'surat pengajuan gugatan perdata', 'New Letter', 'PT PGAS SOLUTION', '', '1110002', NULL, NULL),
(34, 32, 14, '005550.S/TK/DIR-TK/XI/2012', 'surat pengajuan gugatan perdata', 'harap ditindak lanjuti ', '1110002', 'sign', '1110004', NULL, NULL),
(35, 34, 14, '005550.S/TK/DIR-TK/XI/2012', 'surat pengajuan gugatan perdata', 'mohon dilaksanakan depe', '1110004', 'zia', '1310057', NULL, NULL),
(36, 0, 15, '11.23.333', 'surat untuk pak abdillah', 'New Letter', 'PT Energi indonesia', '', '1110003', NULL, NULL),
(37, 36, 15, '11.23.333', 'surat untuk pak abdillah', 'nanang lakukan pekerjaan berikut ', '1110003', 'sign', '1110019', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `esms_outside_letter`
--

CREATE TABLE IF NOT EXISTS `esms_outside_letter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` varchar(10) NOT NULL,
  `version_date` date NOT NULL,
  `number` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `summary` text NOT NULL,
  `date` date NOT NULL,
  `to` varchar(50) NOT NULL,
  `to_division` varchar(50) NOT NULL,
  `from_company` varchar(50) NOT NULL,
  `from_contact` varchar(50) NOT NULL,
  `from_position` varchar(50) NOT NULL,
  `file_upload` varchar(200) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `esms_outside_letter`
--

INSERT INTO `esms_outside_letter` (`id`, `version`, `version_date`, `number`, `subject`, `summary`, `date`, `to`, `to_division`, `from_company`, `from_contact`, `from_position`, `file_upload`, `created_date`, `created_by`) VALUES
(13, '1.0', '2013-06-11', '005550.S/TK/DIR-TK/XI/2012', 'surat pengajuan gugatan perdata', '', '2013-06-11', '1110002', 'Kepala. Divisi Teknologi Informasi & Komunikasi', 'PT PGAS<br/> SOLUTION', 'duma', '', '/upload/surat/Undangan_UAT_ERP_PJC_8.pdf', '0000-00-00', ''),
(14, '1.0', '2013-06-11', '005550.S/TK/DIR-TK/XI/2012', 'surat pengajuan gugatan perdata', '', '2013-06-11', '1110002', 'Kepala. Divisi Teknologi Informasi & Komunikasi', 'PT PGAS SOLUTION', 'duma', '', '/upload/surat/Undangan_UAT_ERP_PJC_8.pdf', '0000-00-00', ''),
(15, '1.0', '2013-06-11', '11.23.333', 'surat untuk pak abdillah', 'ringkasan isi surat<br>', '2013-06-11', '1110003', 'Kepala. Divisi Teknologi Informasi & Komunikasi', 'PT Energi indonesia', '9090090', '09090', '/upload/surat/Undangan_UAT_ERP_PJC_8.pdf', '0000-00-00', ''),
(16, '1.0', '2013-06-13', '', '', '', '0000-00-00', '', '', '', '', '', '/upload/surat/Undangan_UAT_ERP_PJC_8.pdf', '0000-00-00', ''),
(17, '1.0', '2013-06-18', '', '', '', '0000-00-00', '', '', '', '', '', '/upload/surat/gateway.pdf', '0000-00-00', ''),
(18, '1.0', '2013-06-18', '', '', '', '2013-06-17', '', '', '', '', '', '/upload/surat/gateway.pdf', '0000-00-00', ''),
(19, '1.0', '2013-06-19', '', '', '', '0000-00-00', '', '', '', '', '', '/upload/surat/gateway.pdf', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `fin_elbi`
--

CREATE TABLE IF NOT EXISTS `fin_elbi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `akun` varchar(20) NOT NULL,
  `elbi` varchar(20) NOT NULL,
  `elbi_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `fin_elbi`
--

INSERT INTO `fin_elbi` (`id`, `akun`, `elbi`, `elbi_desc`) VALUES
(1, '90600', '100', 'Beban Umum dan Administrasi'),
(2, '90600', '200', 'Beban Material'),
(3, '90600', '221', 'Bahan Kimia'),
(4, '90600', '222', 'Bahan Bakar'),
(5, '90600', '223', 'Inventaris dan Peralatan Kantor'),
(6, '90600', '224', 'Perlengkapan Kantor'),
(7, '90600', '225', 'Cetakan'),
(8, '90600', '226', 'Peralatan/Perlengkapan K3'),
(9, '90600', '227', 'Alat-alat (Tools)'),
(10, '90600', '228', 'Suku Cadang'),
(11, '90600', '229', 'Material Umum'),
(12, '90600', '300', 'Beban Jasa'),
(13, '90600', '301', 'Pemakaian Listrik (PLN)'),
(14, '90600', '302', 'Pemakaian Air'),
(15, '90600', '303', 'Survey dan Study'),
(16, '90600', '304', 'Komunikasi'),
(17, '90600', '305', 'Pengangkutan'),
(18, '90600', '306', 'Transport Lokal'),
(19, '90600', '307', 'Promosi/Humas'),
(20, '90600', '308', 'Sewa'),
(21, '90600', '309', 'Jasa dan Konsultan'),
(22, '90600', '310', 'Administrasi Biaya Bank'),
(23, '90600', '311', 'Pemeliharaan Bangunan Kantor dan Bangunan Penunjang Operasi'),
(24, '90600', '316', 'Pemeliharaan Peralatan Kantor'),
(25, '90600', '318', 'Premi Pensiun'),
(26, '90600', '319', 'Asuransi Aset'),
(27, '90600', '321', 'Makan dan/atau Minum Pekerja'),
(28, '90600', '400', 'Beban Penyusutan/Penyisihan dan Amortisasi'),
(29, '90600', '406', 'Penyusutan Peralatan Kantor'),
(30, '90600', '500', 'Beban Umum'),
(31, '90600', '501', 'Perjalanan Dinas'),
(32, '90600', '502', 'Jamuan'),
(33, '90600', '503', 'Penerimaan/Pemindahan Pekerja'),
(34, '90600', '504', 'Pembinaan/Pendidikan'),
(35, '90600', '505', 'Perayaan'),
(36, '90600', '507', 'Perijinan'),
(37, '90600', '509', 'Penugasan Sementara (Detasering)'),
(38, '90600', '510', 'Pakaian Dinas'),
(39, '90600', '511', 'Pajak Bumi dan Bangunan'),
(40, '90600', '512', 'Keanggotaan'),
(41, '90600', '513', 'Pajak dan Retribusi Daerah'),
(42, '90600', '514', 'Majalah/Surat Kabar'),
(43, '90600', '517', 'Tanggung Jawab Sosial dan Lingkungan (CSR)');

-- --------------------------------------------------------

--
-- Table structure for table `fin_kas`
--

CREATE TABLE IF NOT EXISTS `fin_kas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_kas` varchar(20) NOT NULL,
  `nama_kas` varchar(200) NOT NULL,
  `code_proyek` varchar(20) NOT NULL,
  `proyek_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fin_kas`
--

INSERT INTO `fin_kas` (`id`, `code_kas`, `nama_kas`, `code_proyek`, `proyek_desc`) VALUES
(1, '76-11', '76-11', 'PJR-1', 'Proyek Bekasi 1'),
(2, '999', '999', '999', '999');

-- --------------------------------------------------------

--
-- Table structure for table `fin_kas_dc`
--

CREATE TABLE IF NOT EXISTS `fin_kas_dc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_kas` varchar(20) NOT NULL,
  `elbi` varchar(20) NOT NULL,
  `debit` decimal(11,2) NOT NULL,
  `credit` decimal(11,2) NOT NULL,
  `currency` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `transaction` text NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `fin_kas_dc`
--

INSERT INTO `fin_kas_dc` (`id`, `code_kas`, `elbi`, `debit`, `credit`, `currency`, `date`, `transaction`, `created_date`, `created_by`) VALUES
(35, '999', '221', '0.00', '10000.00', 'IDR', '2013-06-03', 'pembayawan tol', NULL, NULL),
(37, '999', '221', '0.00', '5000.00', 'IDR', '2013-06-03', 'bayar tol', NULL, NULL),
(38, '999', '200', '0.00', '5000.00', 'IDR', '2013-06-03', 'bayar tol', NULL, NULL),
(39, '999', '223', '0.00', '100000.00', 'IDR', '2013-06-03', 'tes', NULL, NULL),
(40, '999', '223', '0.00', '100000.00', 'IDR', '2013-06-03', 'tes', NULL, NULL),
(41, '999', '223', '0.00', '50000.00', 'IDR', '2013-06-03', 'tes', NULL, NULL),
(50, '76-11', '200', '0.00', '1000000.00', 'IDR', '2013-06-12', 'tes 123', NULL, NULL),
(51, '76-11', '03306', '0.00', '1000.00', 'IDR', '2013-06-12', 'PPN - tes 123', NULL, NULL),
(52, '76-11', '40301', '0.00', '2000.00', 'IDR', '2013-06-12', 'PPh 21 - tes 123', NULL, NULL),
(53, '76-11', '40303', '0.00', '3000.00', 'IDR', '2013-06-12', 'PPh 23 - tes 123', NULL, NULL),
(54, '76-11', '', '10000000.00', '0.00', 'IDR', '2013-06-12', 'tes', NULL, NULL),
(55, '76-11', '200', '0.00', '1000000.00', 'IDR', '2013-06-12', 'tes', NULL, NULL),
(56, '76-11', '03306', '0.00', '1000.00', 'IDR', '2013-06-12', 'PPN - tes', NULL, NULL),
(57, '76-11', '40301', '2000.00', '0.00', 'IDR', '2013-06-12', 'PPh 21 - tes', NULL, NULL),
(58, '76-11', '40303', '3000.00', '0.00', 'IDR', '2013-06-12', 'PPh 23 - tes', NULL, NULL),
(59, '76-11', '', '777777.00', '0.00', 'IDR', '2013-06-12', 'input kas', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fin_kas_expense`
--

CREATE TABLE IF NOT EXISTS `fin_kas_expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_kas` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `elbi` varchar(20) NOT NULL,
  `transaction` text NOT NULL,
  `currency` varchar(5) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `ppn` decimal(11,2) NOT NULL,
  `pph21` decimal(11,2) NOT NULL,
  `pph23` decimal(11,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `fin_kas_expense`
--

INSERT INTO `fin_kas_expense` (`id`, `code_kas`, `date`, `elbi`, `transaction`, `currency`, `amount`, `ppn`, `pph21`, `pph23`, `status`, `created_date`, `created_by`) VALUES
(54, '76-11', '2013-06-03', '222', 'tes', 'IDR', '5000.00', '0.00', '0.00', '0.00', 'AF', NULL, NULL),
(55, '76-11', '2013-06-03', '222', 'tes', 'IDR', '1000000.00', '0.00', '0.00', '0.00', 'AF', NULL, NULL),
(56, '76-11', '2013-06-05', '226', 'doremi', 'IDR', '1000000.00', '0.00', '0.00', '0.00', 'AF', NULL, NULL),
(57, '76-11', '2013-06-04', '224', 'pengeluaran kas', 'IDR', '1000000.00', '0.00', '0.00', '0.00', 'AF', NULL, NULL),
(59, '76-11', '2013-06-12', '221', 'tes pajak 3 3n3', 'IDR', '1000000.00', '1000.00', '2000.00', '3000.00', 'AF', NULL, NULL),
(60, '76-11', '2013-06-12', '200', 'tes 123', 'IDR', '1000000.00', '1000.00', '2000.00', '3000.00', 'AF', NULL, NULL),
(61, '76-11', '2013-06-12', '200', 'tes', 'IDR', '1000000.00', '1000.00', '2000.00', '3000.00', 'AF', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fin_kas_saldo`
--

CREATE TABLE IF NOT EXISTS `fin_kas_saldo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_kas` varchar(20) NOT NULL,
  `akumulasi_saldo` decimal(11,2) NOT NULL,
  `transaksi` decimal(11,2) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `transac_date` date NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `fin_kas_saldo`
--

INSERT INTO `fin_kas_saldo` (`id`, `code_kas`, `akumulasi_saldo`, `transaksi`, `description`, `date`, `transac_date`, `created_by`, `created_date`) VALUES
(4, '76-11', '500000.00', '500000.00', 'ambil kas lima ratus ribu rupiah untuk kas Proyek 1', '2013-06-03 05:34:57', '0000-00-00', NULL, NULL),
(5, '76-11', '600000.00', '100000.00', 'tes', '2013-06-03 05:39:30', '0000-00-00', NULL, NULL),
(9, '76-11', '1100000.00', '500000.00', 'input kas lagi', '2013-06-03 05:50:53', '0000-00-00', NULL, NULL),
(14, '76-11', '1095000.00', '5000.00', 'tes', '2013-06-03 06:09:33', '0000-00-00', NULL, NULL),
(15, '76-11', '95000.00', '1000000.00', 'doremi', '2013-06-03 09:58:04', '0000-00-00', NULL, NULL),
(16, '76-11', '-905000.00', '1000000.00', 'tes', '2013-06-03 09:58:05', '0000-00-00', NULL, NULL),
(17, '76-11', '-1905000.00', '1000000.00', 'pengeluaran kas', '2013-06-03 11:16:56', '0000-00-00', NULL, NULL),
(18, '76-11', '-2905000.00', '1000000.00', 'tes pajak 3 3n3', '2013-06-12 05:05:40', '0000-00-00', NULL, NULL),
(19, '76-11', '-3905000.00', '1000000.00', 'tes 123', '2013-06-12 05:08:57', '0000-00-00', NULL, NULL),
(20, '76-11', '6095000.00', '10000000.00', 'tes', '2013-06-12 05:36:42', '0000-00-00', NULL, NULL),
(21, '76-11', '5095000.00', '-1000000.00', 'tes', '2013-06-12 05:37:44', '0000-00-00', NULL, NULL),
(22, '76-11', '5872777.00', '777777.00', 'input kas', '2013-06-12 06:09:48', '0000-00-00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fin_period`
--

CREATE TABLE IF NOT EXISTS `fin_period` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period_tag` varchar(10) NOT NULL,
  `period_start` date NOT NULL,
  `period_finish` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fin_period`
--

INSERT INTO `fin_period` (`id`, `period_tag`, `period_start`, `period_finish`) VALUES
(2, '88888', '2013-05-02', '2013-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `fin_rekening`
--

CREATE TABLE IF NOT EXISTS `fin_rekening` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `akun` varchar(20) NOT NULL,
  `kode_pembantu` varchar(20) NOT NULL,
  `nomor_rek` varchar(20) NOT NULL,
  `bank` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fin_rekening`
--

INSERT INTO `fin_rekening` (`id`, `akun`, `kode_pembantu`, `nomor_rek`, `bank`) VALUES
(1, '203.715', '511', '119-000-800-8003', 'Mandiri Jakarta - PJOPJPG'),
(2, '203.715', '517', '115-000-080-0062', 'Mandiri Jakarta - PIPDTPGP');

-- --------------------------------------------------------

--
-- Table structure for table `fin_rekening_dc`
--

CREATE TABLE IF NOT EXISTS `fin_rekening_dc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `akun` varchar(20) NOT NULL,
  `kode_pembantu` varchar(20) NOT NULL,
  `nomor_rek` varchar(20) NOT NULL,
  `debit` decimal(11,2) NOT NULL,
  `credit` decimal(11,2) NOT NULL,
  `currency` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fin_rekening_dc`
--

INSERT INTO `fin_rekening_dc` (`id`, `akun`, `kode_pembantu`, `nomor_rek`, `debit`, `credit`, `currency`, `date`, `description`, `created_date`, `created_by`) VALUES
(1, '203.715', '517', '115-000-080-0062', '12000000.00', '0.00', 'IDR', '2013-06-12', 'input ya ', NULL, NULL),
(2, '203.715', '517', '115-000-080-0062', '0.00', '300000.00', 'IDR', '2013-06-12', 'tes', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fin_rekening_saldo`
--

CREATE TABLE IF NOT EXISTS `fin_rekening_saldo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_rek` varchar(20) NOT NULL,
  `akumulasi_saldo` decimal(11,2) NOT NULL,
  `transaksi` decimal(11,2) NOT NULL,
  `description` varchar(200) NOT NULL,
  `transac_date` date NOT NULL,
  `date` datetime NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `fin_rekening_saldo`
--

INSERT INTO `fin_rekening_saldo` (`id`, `nomor_rek`, `akumulasi_saldo`, `transaksi`, `description`, `transac_date`, `date`, `created_by`, `created_date`) VALUES
(1, '115-000-080-0062', '10000000.00', '10000000.00', 'input ya ', '2013-06-12', '2013-06-12 11:16:38', NULL, NULL),
(2, '115-000-080-0062', '0.00', '-10000000.00', 'input ya ', '2013-06-12', '2013-06-12 11:16:52', NULL, NULL),
(3, '115-000-080-0062', '8000000.00', '8000000.00', 'input ya ', '2013-06-12', '2013-06-12 11:16:52', NULL, NULL),
(4, '115-000-080-0062', '0.00', '-8000000.00', 'input ya ', '2013-06-12', '2013-06-12 11:16:53', NULL, NULL),
(5, '115-000-080-0062', '8000000.00', '8000000.00', 'input ya ', '2013-06-12', '2013-06-12 11:16:53', NULL, NULL),
(6, '115-000-080-0062', '7500000.00', '-500000.00', 'tes', '2013-06-12', '2013-06-12 11:17:08', NULL, NULL),
(7, '115-000-080-0062', '8000000.00', '500000.00', 'tes', '2013-06-12', '2013-06-12 11:17:21', NULL, NULL),
(8, '115-000-080-0062', '7700000.00', '-300000.00', 'tes', '2013-06-12', '2013-06-12 11:17:21', NULL, NULL),
(9, '115-000-080-0062', '8000000.00', '300000.00', 'tes', '2013-06-12', '2013-06-12 11:17:22', NULL, NULL),
(10, '115-000-080-0062', '7700000.00', '-300000.00', 'tes', '2013-06-12', '2013-06-12 11:17:22', NULL, NULL),
(11, '115-000-080-0062', '-300000.00', '-8000000.00', 'input ya ', '2013-06-12', '2013-06-12 11:28:51', NULL, NULL),
(12, '115-000-080-0062', '11700000.00', '12000000.00', 'input ya ', '2013-06-12', '2013-06-12 11:28:51', NULL, NULL),
(13, '115-000-080-0062', '-300000.00', '-12000000.00', 'input ya ', '2013-06-12', '2013-06-12 11:28:51', NULL, NULL),
(14, '115-000-080-0062', '11700000.00', '12000000.00', 'input ya ', '2013-06-12', '2013-06-12 11:28:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fin_setup_user_bank`
--

CREATE TABLE IF NOT EXISTS `fin_setup_user_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) NOT NULL,
  `nomor_rek` varchar(20) NOT NULL,
  `active_since` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fin_setup_user_bank`
--

INSERT INTO `fin_setup_user_bank` (`id`, `employee_id`, `nomor_rek`, `active_since`, `status`) VALUES
(1, 'bekasi1', '115-000-080-0062', '2013-06-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fin_setup_user_kas`
--

CREATE TABLE IF NOT EXISTS `fin_setup_user_kas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) NOT NULL,
  `code_kas` varchar(20) NOT NULL,
  `active_since` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `fin_setup_user_kas`
--

INSERT INTO `fin_setup_user_kas` (`id`, `employee_id`, `code_kas`, `active_since`, `status`) VALUES
(1, 'bekasi1', '76-11', '2013-06-03', 1),
(2, 'medan1', '999', '2013-06-03', 1),
(3, 'medan1', '999', '2013-06-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `have_fun`
--

CREATE TABLE IF NOT EXISTS `have_fun` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto increment id',
  `title` varchar(255) NOT NULL COMMENT 'image title',
  `textOnImage` text COMMENT 'simple text written on image',
  `photoDescription` text COMMENT 'photo description to show as from where the photo is taken and copyright etc',
  `imagePath` text NOT NULL COMMENT 'photo stored database path',
  `createDate` datetime NOT NULL COMMENT 'photo uploaded date and time',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `have_fun`
--

INSERT INTO `have_fun` (`id`, `title`, `textOnImage`, `photoDescription`, `imagePath`, `createDate`) VALUES
(2, 'Group punishment', '', '', '1355249781-401918_2902910191687_41893809_n.jpg', '2012-12-11 06:16:21'),
(3, 'Perspective', '', '', '1355250138-148258_10200105229983398_2021612485_n.jpg', '2012-12-11 06:22:18'),
(4, 'Cross Join', '', '', '1355306664-cross join.jpg', '2012-12-12 10:04:24'),
(5, 'babies', '', '', '1355306700-395076_4964833928532_1885681215_n.jpg', '2012-12-12 10:05:00'),
(6, 'Sad story', '', '', '1355306743-283258_4964775927082_1691280961_n.jpg', '2012-12-12 10:05:43'),
(7, 'The manual how to catch a cata', '', '', '1355312454-5924932_700b.jpg', '2012-12-12 11:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `hrrec_certification`
--

CREATE TABLE IF NOT EXISTS `hrrec_certification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `type` varchar(40) NOT NULL,
  `certification_name` varchar(50) NOT NULL,
  `year_certification` date NOT NULL,
  `year_expired` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hrrec_certification`
--

INSERT INTO `hrrec_certification` (`id`, `employee_id`, `type`, `certification_name`, `year_certification`, `year_expired`) VALUES
(1, 10, 'sisko', 'sisko', '2013-03-19', '2013-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `hrrec_department`
--

CREATE TABLE IF NOT EXISTS `hrrec_department` (
  `department` varchar(20) NOT NULL,
  `branch_office` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`department`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hrrec_department`
--

INSERT INTO `hrrec_department` (`department`, `branch_office`, `description`) VALUES
('Engineering', 'Jakarta', 'Jakarta Engineering'),
('IT', 'Jakarta', 'Pengerjaan IT'),
('Finance', 'Jakarta', 'Jakarta Finance'),
('Legal', 'Jakarta', 'Jakarta Legal');

-- --------------------------------------------------------

--
-- Table structure for table `hrrec_dependent`
--

CREATE TABLE IF NOT EXISTS `hrrec_dependent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `relationship` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hrrec_dependent`
--

INSERT INTO `hrrec_dependent` (`id`, `employee_id`, `name`, `relationship`, `gender`, `date_of_birth`) VALUES
(3, 10, 'duoo', 'istri', 'male', '2013-04-02'),
(4, 12, 'wiwit', 'istri', 'female', '2013-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `hrrec_education`
--

CREATE TABLE IF NOT EXISTS `hrrec_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `university` varchar(30) NOT NULL,
  `formal_edu` varchar(50) NOT NULL,
  `major` varchar(50) NOT NULL,
  `town` varchar(20) NOT NULL,
  `status_university` varchar(10) NOT NULL,
  `is_foreign` varchar(10) NOT NULL,
  `year_start` date NOT NULL,
  `year_finish` date NOT NULL,
  `strata` varchar(10) NOT NULL,
  `rating_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hrrec_education`
--

INSERT INTO `hrrec_education` (`id`, `employee_id`, `university`, `formal_edu`, `major`, `town`, `status_university`, `is_foreign`, `year_start`, `year_finish`, `strata`, `rating_type`) VALUES
(1, 10, 'asdf', 'hk', 'h', 'jalan', 'negeri', 'negeri', '2013-03-07', '2013-04-03', 'S1', '3');

-- --------------------------------------------------------

--
-- Table structure for table `hrrec_emergency_record`
--

CREATE TABLE IF NOT EXISTS `hrrec_emergency_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `relationship` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `hrrec_emergency_record`
--

INSERT INTO `hrrec_emergency_record` (`id`, `employee_id`, `name`, `relationship`, `contact`, `address`, `phone`) VALUES
(5, 10, 'doam', 'istri', '80809', 'depok', '080809'),
(6, 13, '89', 'istri', '89', '89', '8');

-- --------------------------------------------------------

--
-- Table structure for table `hrrec_employee`
--

CREATE TABLE IF NOT EXISTS `hrrec_employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `pgassol_email` varchar(50) NOT NULL,
  `department` varchar(20) NOT NULL,
  `position` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `date_employee` date NOT NULL,
  `employee_status` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `place_of_birth` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `religion` varchar(10) NOT NULL,
  `blood_type` varchar(5) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `number_of_dependent` int(11) NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `passport` varchar(50) NOT NULL,
  `driver_licence` varchar(50) NOT NULL,
  `jamsostek` varchar(50) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `phone_home` varchar(20) NOT NULL,
  `phone_mobile` varchar(20) NOT NULL,
  `address_current_1` varchar(200) NOT NULL,
  `address_current_2` varchar(200) NOT NULL,
  `address_ktp` varchar(200) NOT NULL,
  `cv` varchar(100) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `hrrec_employee`
--

INSERT INTO `hrrec_employee` (`employee_id`, `name`, `full_name`, `pgassol_email`, `department`, `position`, `photo`, `date_employee`, `employee_status`, `gender`, `place_of_birth`, `birth_date`, `religion`, `blood_type`, `marital_status`, `number_of_dependent`, `ktp`, `passport`, `driver_licence`, `jamsostek`, `npwp`, `phone_home`, `phone_mobile`, `address_current_1`, `address_current_2`, `address_ktp`, `cv`) VALUES
(13, 'hi', 'dome', 'em@mail.com', '', '555', 'photo/0606101295.jpg', '0000-00-00', '', 'male', 'u', '2013-03-05', 'islam', 'A', 'Married', 0, '89', '5555555', '89', '7', '98', '98', '809', 'depok', 'depok', 'depok', 'photo/CV_Dwi_Priyanto.pdf'),
(11, 'doremi', 'doremifasol', 'em@mail.com', 'Engineering', '555', 'photo/483126_411058112283208_1052908903_n.jpg', '0000-00-00', '', 'male', 'depok', '2013-03-19', 'islam', 'A', 'Single', 0, '89', '89', '89', '98', '98', '98', '98', '98', '98', '9', 'photo/aris_budiarto.sql'),
(12, 'Dede', 'Priyanto', 'keindahan120288@gmaill.com', '', '555', 'photo/Photo0144.jpg', '0000-00-00', '', 'male', 'kebumen', '2013-02-26', 'islam', 'A', 'Single', 1, '89', '89', '89', '89', '8', '989', '8', '98', '98', '09', 'photo/1-click-retweetsharelike.5.0.1.zip');

-- --------------------------------------------------------

--
-- Table structure for table `hrrec_job_experience`
--

CREATE TABLE IF NOT EXISTS `hrrec_job_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) NOT NULL,
  `period_start` date NOT NULL,
  `period_finish` date NOT NULL,
  `company` varchar(100) NOT NULL,
  `position` varchar(20) NOT NULL,
  `job_description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hrrec_job_experience`
--

INSERT INTO `hrrec_job_experience` (`id`, `employee_id`, `period_start`, `period_finish`, `company`, `position`, `job_description`) VALUES
(1, '10', '2013-03-05', '2013-04-04', 'PT abc', 'asdf', 'job');

-- --------------------------------------------------------

--
-- Table structure for table `hrrec_position_offered`
--

CREATE TABLE IF NOT EXISTS `hrrec_position_offered` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_code` varchar(50) NOT NULL,
  `position_description` text NOT NULL,
  `valid_from` date NOT NULL,
  `valid_to` date NOT NULL,
  `requirement` text NOT NULL,
  `created_date` varchar(50) NOT NULL,
  `created_by` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hrrec_position_offered`
--

INSERT INTO `hrrec_position_offered` (`id`, `position_code`, `position_description`, `valid_from`, `valid_to`, `requirement`, `created_date`, `created_by`) VALUES
(1, '555', 'IT ya', '2013-03-26', '2013-03-29', 'tes req - simple sik sak wetoro', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_certification`
--

CREATE TABLE IF NOT EXISTS `hr_certification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) NOT NULL,
  `type` varchar(40) NOT NULL,
  `certification_name` varchar(50) NOT NULL,
  `year_certification` date NOT NULL,
  `year_expired` date NOT NULL,
  `attached` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `hr_certification`
--

INSERT INTO `hr_certification` (`id`, `employee_id`, `type`, `certification_name`, `year_certification`, `year_expired`, `attached`) VALUES
(2, '34', 'cisco', 'cisco galry', '2012-02-07', '2012-02-12', ''),
(4, 'dome', 'sisko', 'sisko', '0000-00-00', '0000-00-00', ''),
(9, 'dwi priyanto', 'asdf', 'adsf', '0000-00-00', '0000-00-00', ''),
(10, '1000', 'tes', 'tes', '2013-02-20', '2013-03-06', ''),
(11, '1', 'io', 'io', '2013-05-22', '2013-06-06', ''),
(16, '1110002', 'jenis', 'tes', '2013-05-28', '0000-00-00', ''),
(17, '1110002', 'tanah baru', 'tes', '2013-05-14', '0000-00-00', 'C:\\xampp\\htdocs\\hr2fun\\protected/../upload/certification/BA Data Terintegrasi.pdf'),
(18, '1110002', 'tanah baru lagi', 'tes', '2013-05-22', '0000-00-00', 'C:\\xampp\\htdocs\\hr2fun\\protected/../upload/certification/importcsv.zip');

-- --------------------------------------------------------

--
-- Table structure for table `hr_department`
--

CREATE TABLE IF NOT EXISTS `hr_department` (
  `department` varchar(20) NOT NULL,
  `branch_office` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`department`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_department`
--

INSERT INTO `hr_department` (`department`, `branch_office`, `description`) VALUES
('Engineering', 'Jakarta', 'Jakarta Engineering'),
('IT', 'Jakarta', 'Pengerjaan IT'),
('Finance', 'Jakarta', 'Jakarta Finance'),
('Legal', 'Jakarta', 'Jakarta Legal');

-- --------------------------------------------------------

--
-- Table structure for table `hr_dependent`
--

CREATE TABLE IF NOT EXISTS `hr_dependent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `relationship` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `hr_dependent`
--

INSERT INTO `hr_dependent` (`id`, `employee_id`, `name`, `relationship`, `gender`, `date_of_birth`) VALUES
(11, '34', 'tes', 'istri', 'female', '2012-02-15'),
(13, 'asdf', 'asdf', 'istri', 'male', '2012-02-08'),
(14, '34563', 'duha', 'istri', 'male', '2012-03-04'),
(16, 'duha', 'asf', 'istri', 'male', '2012-03-20'),
(17, 'dwi priyanto', 'Wiwit', 'istri', 'female', '1988-12-12'),
(19, 'dome', 'ibul', 'istri', 'male', '2013-02-05'),
(20, 'dome', 'asdf', 'istri', 'male', '2013-02-20'),
(21, '1000', 'tes', 'istri', 'female', '2013-02-19'),
(22, '1000', 'tes', 'istri', 'male', '2013-02-27'),
(25, '101', 'top', 'istri', 'male', '2013-05-23'),
(26, '1', 'bu harsi', 'istri', 'male', '2011-03-09'),
(31, '1', 'domal', 'anak', 'male', '2013-05-06'),
(33, '001210027', 'nezwa', 'anak', 'female', '2013-05-29'),
(34, '1110002', 'donalia', 'istri', 'female', '2013-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `hr_education`
--

CREATE TABLE IF NOT EXISTS `hr_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) NOT NULL,
  `university` varchar(30) NOT NULL,
  `formal_edu` varchar(50) NOT NULL,
  `major` varchar(50) NOT NULL,
  `town` varchar(20) NOT NULL,
  `status_university` varchar(10) NOT NULL,
  `is_foreign` varchar(10) NOT NULL,
  `year_start` date NOT NULL,
  `year_finish` date NOT NULL,
  `strata` varchar(10) NOT NULL,
  `rating_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hr_education`
--

INSERT INTO `hr_education` (`id`, `employee_id`, `university`, `formal_edu`, `major`, `town`, `status_university`, `is_foreign`, `year_start`, `year_finish`, `strata`, `rating_type`) VALUES
(1, '001310057', 'indonesia', 'ilkom', 'ilkom', 'depok', '', '', '2013-05-29', '2013-07-04', 'S1', '3'),
(2, '1110002', 'Universitas Atma Jaya Jogjakar', 'Teknik', 'Teknik', 'Depok', '', '', '2008-06-25', '2013-06-13', 'S1', '3.4');

-- --------------------------------------------------------

--
-- Table structure for table `hr_emergency_record`
--

CREATE TABLE IF NOT EXISTS `hr_emergency_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `relationship` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `hr_emergency_record`
--

INSERT INTO `hr_emergency_record` (`id`, `employee_id`, `name`, `relationship`, `contact`, `address`, `phone`) VALUES
(1, '34', 'tesa', 'istri', 'tesa', 'tesa', 'tesa'),
(2, 'dome', 'sdfg', 'istri', 'sdfg', 'sdfg', '3456'),
(3, 'dwi priyanto', 'Wiwit', 'istri', '88888', 'depok', '888888'),
(4, '1000', 'tos', 'anak', '89', '8', '098'),
(5, '1', 'e', 'istri', '8', '8', '8'),
(6, '1', '9', 'istri', '98', '89', '89'),
(7, '1110002', '9', 'istri', '8', '89', '8'),
(8, '1110002', 'doma', 'istri', '', 'depok', '898989');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee`
--

CREATE TABLE IF NOT EXISTS `hr_employee` (
  `employee_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `pgassol_email` varchar(50) NOT NULL,
  `department` varchar(20) NOT NULL,
  `position` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `date_employee` date NOT NULL,
  `employee_status` varchar(10) NOT NULL,
  `effective_date` date NOT NULL,
  `previous_employee_id` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `place_of_birth` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `religion` varchar(10) NOT NULL,
  `blood_type` varchar(5) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `number_of_dependent` int(11) NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `passport` varchar(50) NOT NULL,
  `driver_licence` varchar(50) NOT NULL,
  `jamsostek` varchar(50) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `phone_home` varchar(20) NOT NULL,
  `phone_mobile` varchar(20) NOT NULL,
  `address_current_1` varchar(200) NOT NULL,
  `address_current_2` varchar(200) NOT NULL,
  `address_ktp` varchar(200) NOT NULL,
  `private_email` varchar(50) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_employee`
--

INSERT INTO `hr_employee` (`employee_id`, `name`, `full_name`, `pgassol_email`, `department`, `position`, `photo`, `date_employee`, `employee_status`, `effective_date`, `previous_employee_id`, `gender`, `place_of_birth`, `birth_date`, `religion`, `blood_type`, `marital_status`, `number_of_dependent`, `ktp`, `passport`, `driver_licence`, `jamsostek`, `npwp`, `phone_home`, `phone_mobile`, `address_current_1`, `address_current_2`, `address_ktp`, `private_email`) VALUES
('001110001', 'Lorentius Harsi Suryawan', 'Lorentius Harsi Suryawan', '', '', '', 'photo/Foto_654.jpg', '2013-05-30', '', '0000-00-00', '', 'male', 'kebumen', '0000-00-00', 'islam', '', 'Single', 0, '8989', '', '', '', '', '', '', '', '', '', ''),
('1110002', 'Yaqub', 'Yaqub', 'yaqub@pgas-solution.co.id', 'IT', 'GM Engineering Procu', 'photo/Foto_668t.jpg', '2013-05-22', '', '0000-00-00', '', 'female', 'kebumen', '0000-00-00', 'islam', 'A', 'Married', 2, '89', '4444', '5656565', '345345', '345346546', '55', '456456', 'jalan bla oh bla', 'tesll', 'jalan objektif', 'email@email.com'),
('1110003', 'Abdillah', 'Abdillah', '', '', '', '', '2013-05-30', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('1110004', 'Zia Ulhaq', 'Zia Ulhaq', '', '', '', '', '2013-06-11', '', '0000-00-00', '', 'male', 'kebumen', '0000-00-00', 'islam', '', 'Single', 0, '89', '', '', '', '', '', '', '', '', '', ''),
('1110005', 'Supono', 'Supono', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001110007', 'Ryan Novel', 'Ryan Novel', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001110009', 'Syaiful Alam', 'Syaiful Alam', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001110010', 'Muharrir Asyari Saraswan', 'Muharrir Asyari Saraswan', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001110012', 'Ratna Sari', 'Ratna Sari', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001110013', 'Mulyadi', 'Mulyadi', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001110015', 'Yosua Sondang Apriyanto', 'Yosua Sondang Apriyanto', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001110016', 'Bayu Firdaus', 'Bayu Firdaus', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001110017', 'Shanty Rahayu', 'Shanty Rahayu', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001110018', 'Muhammad Muzrin', 'Muhammad Muzrin', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('1110019', 'Nanang Irawan', 'Nanang Irawan', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('1110020', 'Pagi Apriyadi Arsay', 'Pagi Apriyadi Arsay', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001110021', 'Syamsudin', 'Syamsudin', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210024', 'Nino Zulfikar Andhikananda', 'Nino Zulfikar Andhikananda', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210025', 'Ahmad Syamsudin', 'Ahmad Syamsudin', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210026', 'Irwan Indrawijaya', 'Irwan Indrawijaya', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210027', 'Muhamad Azhar', 'Muhamad Azhar', '', '', '', '', '2013-06-17', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 1, '', '', '', '', '', '', '', '', '', '', ''),
('001210028', 'Sayid Abu Bakar', 'Sayid Abu Bakar', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210029', 'Andri Firdaus Fardianto', 'Andri Firdaus Fardianto', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210030', 'Aryo Nurwadi', 'Aryo Nurwadi', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210031', 'Felic Halim', 'Felic Halim', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210032', 'Mirliansyah', 'Mirliansyah', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210033', 'M. Gunawan Raditya', 'M. Gunawan Raditya', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210034', 'Priyo Sunu Wicaksono', 'Priyo Sunu Wicaksono', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210035', 'Hadi Famili Yanto', 'Hadi Famili Yanto', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210036', 'Rahmat', 'Rahmat', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210037', 'Tri Vita Sari', 'Tri Vita Sari', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210038', 'Syarif Hidayatullah', 'Syarif Hidayatullah', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210039', 'Muhdiar', 'Muhdiar', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210040', 'Siti Solihah', 'Siti Solihah', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210041', 'Richard Tito', 'Richard Tito', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210042', 'Nugraha Sampurna', 'Nugraha Sampurna', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210043', 'Ferdi Yosha', 'Ferdi Yosha', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210044', 'Gonna Richa Amalia Putri', 'Gonna Richa Amalia Putri', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210045', 'Micha Farid Priambodo', 'Micha Farid Priambodo', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001210046', 'Tegar Adiwijaya', 'Tegar Adiwijaya', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001310047', 'Anisatur Rokhmah', 'Anisatur Rokhmah', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001310048', 'R. Bagus', 'R. Bagus', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001310049', 'Antonius Purwadi', 'Antonius Purwadi', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001310050', 'I Gusti Ayu', 'I Gusti Ayu', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001310051', 'Anggi Saputra', 'Anggi Saputra', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001310052', 'Ricky Wardhana', 'Ricky Wardhana', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001310053', 'Andrie Irmansyah', 'Andrie Irmansyah', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001310054', 'Doddy Roesilawandie', 'Doddy Roesilawandie', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001310055', 'Hasbi Fahada', 'Hasbi Fahada', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('001310056', 'Ronald Hasian M.', 'Ronald Hasian M.', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', ''),
('1310057', 'Dwi Priyanto', 'Dwi Priyanto', '', '', '', 'photo/map2.jpg', '2013-06-04', '', '0000-00-00', '', 'male', 'kebumen', '0000-00-00', 'islam', '', 'Married', 0, '555', '', '', '', '', '', '', '', '', '', ''),
('7777777', 'AP', 'Afrishal', '', 'IT', 'Junior IT Engineer', '', '2013-07-15', '', '0000-00-00', '', 'male', 'Bandung', '1992-04-07', 'islam', 'A', 'Single', 0, '123', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_status`
--

CREATE TABLE IF NOT EXISTS `hr_employee_status` (
  `status_en` varchar(50) NOT NULL,
  `status_id` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`status_en`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_employee_status`
--

INSERT INTO `hr_employee_status` (`status_en`, `status_id`, `description`) VALUES
('organik', 'pegawai tetap', 'pegawai tetap');

-- --------------------------------------------------------

--
-- Table structure for table `hr_file_publication`
--

CREATE TABLE IF NOT EXISTS `hr_file_publication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `version` varchar(10) DEFAULT NULL,
  `version_date` date DEFAULT NULL,
  `file_upload` varchar(200) NOT NULL,
  `craeted_by` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hr_file_publication`
--

INSERT INTO `hr_file_publication` (`id`, `name`, `version`, `version_date`, `file_upload`, `craeted_by`, `created_date`) VALUES
(1, 'Tes File Upload', '1.1', '2013-06-05', 'C:\\xampp\\htdocs\\hr2fun\\protected/../upload/hrpublish/Undangan_UAT_ERP_PJC_8.pdf', NULL, NULL),
(2, 'tes lagi', '1.1', '2013-06-05', 'C:\\xampp\\htdocs\\hr2fun\\protected/../upload/hrpublish/Undangan_UAT_ERP_PJC_8.pdf', NULL, NULL),
(3, 'fasdf', '1.1', '2013-06-05', 'C:\\xampp\\htdocs\\hr2fun\\protected/../upload/hrpublish/elbi.csv', NULL, NULL),
(4, 'Tes File Upload', '1.1', '2013-06-05', 'C:\\xampp\\htdocs\\hr2fun\\protected/../upload/hrpublish/BA Data Terintegrasi.pdf', NULL, NULL),
(5, 'Tes File Upload', '1.1', '2013-06-05', 'C:\\xampp\\htdocs\\hr2fun\\protected/../upload/hrpublish/clevertech-YiiBooster-1.0.6-89-g778e07b.zip', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr_job_experience`
--

CREATE TABLE IF NOT EXISTS `hr_job_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) NOT NULL,
  `period_start` date NOT NULL,
  `period_finish` date NOT NULL,
  `company` varchar(100) NOT NULL,
  `position` varchar(20) NOT NULL,
  `job_description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hr_job_experience`
--

INSERT INTO `hr_job_experience` (`id`, `employee_id`, `period_start`, `period_finish`, `company`, `position`, `job_description`) VALUES
(1, '1110002', '2013-05-08', '2013-05-29', 'ee', 'ee', 'ee'),
(2, '1110002', '2013-05-08', '2013-05-22', 'ee', 'ee', 'ee'),
(3, '1110002', '2013-05-08', '2013-05-30', 'gsd', 'gdqgd', 'gdq'),
(4, '1310057', '2013-06-04', '2013-06-27', 'ICT', 'Menteri', 'Menteri');

-- --------------------------------------------------------

--
-- Table structure for table `hr_kpi`
--

CREATE TABLE IF NOT EXISTS `hr_kpi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) NOT NULL,
  `start` date NOT NULL,
  `finish` date NOT NULL,
  `sasaran_kerja` text NOT NULL,
  `bentuk_target` text NOT NULL,
  `realisasi` text NOT NULL,
  `bobot` decimal(11,2) NOT NULL,
  `nilai` decimal(11,2) NOT NULL,
  `nilai_kinerja` decimal(11,2) NOT NULL,
  `created_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `hr_kpi`
--

INSERT INTO `hr_kpi` (`id`, `employee_id`, `start`, `finish`, `sasaran_kerja`, `bentuk_target`, `realisasi`, `bobot`, `nilai`, `nilai_kinerja`, `created_date`, `update_by`) VALUES
(6, '12', '0000-00-00', '0000-00-00', 'tes target kerja', '0', '', '0.00', '0.00', '0.00', '0000-00-00', ''),
(7, '1110002', '0000-00-00', '0000-00-00', 'tes', '1. apa \n2. apa \n3. apa ', 'tes\n1. tes\n2. tes\n3. tes lagi', '40.33', '0.00', '0.00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `hr_level_position`
--

CREATE TABLE IF NOT EXISTS `hr_level_position` (
  `position` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `qualification` text NOT NULL,
  PRIMARY KEY (`position`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_level_position`
--

INSERT INTO `hr_level_position` (`position`, `description`, `qualification`) VALUES
('GM Engineering Procu', 'GM Engineering Procurement Construction', 'GM Engineering Procurement Construction'),
('GM Engineering', 'GM Engineering', 'GM Engineering'),
('GM Operation &amp; M', 'GM Operation &amp; Maintenance', 'GM Operation &amp; Maintenance'),
('Senior IT Engineer', 'Senior IT Engineer', 'Senior IT Engineer'),
('Senior Drafter', 'Senior Drafter', 'Senior Drafter'),
('Electrical Engineer', 'Electrical Engineer', 'Electrical Engineer'),
('Integrity Engineer', 'Integrity Engineer', 'Integrity Engineer'),
('General Affair Offic', 'General Affair Officer', 'General Affair Officer'),
('Treasury Officer', 'Treasury Officer', 'Treasury Officer'),
('Sales Engineer', 'Sales Engineer', 'Sales Engineer'),
('Commersial Engineer ', 'Commersial Engineer ', 'Commersial Engineer '),
('Accounting Officer', 'Accounting Officer', 'Accounting Officer'),
('Mechanical Engineer', 'Mechanical Engineer', 'Mechanical Engineer'),
('Junior IT Engineer', 'Junior IT Engineer', 'Junior IT Engineer'),
('O &amp; M Technician', 'O &amp; M Technician', 'O &amp; M Technician'),
('Document Controller', 'Document Controller', 'Document Controller'),
('Contract Administrat', 'Contract Administration', 'Contract Administration'),
('Project Manager PIPD', 'Project Manager PIPDTPGP SBU I', 'Project Manager PIPDTPGP SBU I'),
('Civil Engineer', 'Civil Engineer', 'Civil Engineer'),
('Pipeline Engineer', 'Pipeline Engineer', 'Pipeline Engineer'),
('Tes', 'Tes', 'Tes');

-- --------------------------------------------------------

--
-- Table structure for table `hr_organization`
--

CREATE TABLE IF NOT EXISTS `hr_organization` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `lft` int(10) unsigned NOT NULL,
  `rgt` int(10) unsigned NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `visible` int(1) NOT NULL,
  `task` varchar(64) DEFAULT NULL,
  `pic` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `hr_organization`
--

INSERT INTO `hr_organization` (`id`, `year`, `title`, `lft`, `rgt`, `url`, `visible`, `task`, `pic`) VALUES
(12, 2013, 'Presiden Director', 1, 28, '#', 1, NULL, '4555'),
(13, 2013, 'PROCUREMENT & LOGISTICS ', 2, 3, '#', 1, NULL, 'dwi priyanto'),
(14, 2013, 'LEGAL SERVICES', 4, 5, '#', 1, NULL, 'dome'),
(15, 2013, 'S H E ', 6, 7, '#', 1, NULL, 'dome'),
(16, 2013, 'CORPORATE SECRETARY ', 8, 9, '#', 1, NULL, 'dome'),
(17, 2013, 'Commercial Director ', 10, 13, '#', 1, NULL, 'dome'),
(18, 2013, 'Engineering & Operation Director ', 14, 21, '#', 1, NULL, 'dome'),
(19, 2013, 'Administrative & Finance Director ', 22, 27, '#', 1, NULL, 'dome'),
(20, 2013, 'BUSINESS DEVELOPMENT UNIT ', 11, 12, '#', 1, NULL, 'dome'),
(21, 2013, 'ENGINEERING SERVICES ', 15, 16, '#', 1, NULL, 'dome'),
(22, 2013, 'EPC SERVICES ', 17, 18, 'fasdf', 1, NULL, 'dome'),
(23, 2013, 'OPERATION & MAINTENACE SERVICES ', 19, 20, '#', 1, NULL, 'dome'),
(24, 2013, 'ADMINISTRATIVE ', 23, 24, '#', 1, NULL, 'dome'),
(25, 2013, 'FINANCE', 25, 26, '#', 1, NULL, 'dome');

-- --------------------------------------------------------

--
-- Table structure for table `hr_position_exp`
--

CREATE TABLE IF NOT EXISTS `hr_position_exp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) NOT NULL,
  `period_start` date NOT NULL,
  `period_finish` date NOT NULL,
  `position` varchar(100) NOT NULL,
  `job_description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hr_position_exp`
--

INSERT INTO `hr_position_exp` (`id`, `employee_id`, `period_start`, `period_finish`, `position`, `job_description`) VALUES
(1, '1310057', '2012-02-06', '2013-06-13', 'IT engineer', 'Development Aplikasi');

-- --------------------------------------------------------

--
-- Table structure for table `lv_employee_request`
--

CREATE TABLE IF NOT EXISTS `lv_employee_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `pgassol_email` varchar(50) NOT NULL,
  `department` varchar(20) NOT NULL,
  `position` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `purpose` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `approval_date` date NOT NULL,
  `approval_by` varchar(50) NOT NULL,
  `approval_notes` varchar(200) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lv_employee_request`
--

INSERT INTO `lv_employee_request` (`id`, `employee_id`, `full_name`, `pgassol_email`, `department`, `position`, `start_date`, `end_date`, `purpose`, `status`, `approval_date`, `approval_by`, `approval_notes`, `created_by`, `created_date`) VALUES
(3, 'dwi priyanto', 'dwi', 'dwi.priyanto@pgas.com', 'tes', 'jabatan 1', '2013-01-21', '2013-01-25', 'asdf', 'new', '0000-00-00', '', '', '', '0000-00-00'),
(4, '4555', 'ina kinantri', 'ina@pgas-solution.co.id', 'tes', 'jabatan 1', '2013-01-17', '2013-01-31', 'madang', 'new', '0000-00-00', '', '', '', '0000-00-00'),
(5, 'dwi priyanto', 'dwi', 'dwi.priyanto@pgas.com', 'tes', 'jabatan 1', '2013-02-01', '2013-02-08', 'asdf', 'new', '0000-00-00', 'ibu', 'jangan main main ya', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `mst_country`
--

CREATE TABLE IF NOT EXISTS `mst_country` (
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `printable_name` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`iso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_country`
--

INSERT INTO `mst_country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES
('AD', 'ANDORRA', 'Andorra', 'AND', 20),
('AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784),
('AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4),
('AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28),
('AI', 'ANGUILLA', 'Anguilla', 'AIA', 660),
('AL', 'ALBANIA', 'Albania', 'ALB', 8),
('AM', 'ARMENIA', 'Armenia', 'ARM', 51),
('AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530),
('AO', 'ANGOLA', 'Angola', 'AGO', 24),
('AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL),
('AR', 'ARGENTINA', 'Argentina', 'ARG', 32),
('AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16),
('AT', 'AUSTRIA', 'Austria', 'AUT', 40),
('AU', 'AUSTRALIA', 'Australia', 'AUS', 36),
('AW', 'ARUBA', 'Aruba', 'ABW', 533),
('AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31),
('BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70),
('BB', 'BARBADOS', 'Barbados', 'BRB', 52),
('BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50),
('BE', 'BELGIUM', 'Belgium', 'BEL', 56),
('BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854),
('BG', 'BULGARIA', 'Bulgaria', 'BGR', 100),
('BH', 'BAHRAIN', 'Bahrain', 'BHR', 48),
('BI', 'BURUNDI', 'Burundi', 'BDI', 108),
('BJ', 'BENIN', 'Benin', 'BEN', 204),
('BM', 'BERMUDA', 'Bermuda', 'BMU', 60),
('BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96),
('BO', 'BOLIVIA', 'Bolivia', 'BOL', 68),
('BR', 'BRAZIL', 'Brazil', 'BRA', 76),
('BS', 'BAHAMAS', 'Bahamas', 'BHS', 44),
('BT', 'BHUTAN', 'Bhutan', 'BTN', 64),
('BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL),
('BW', 'BOTSWANA', 'Botswana', 'BWA', 72),
('BY', 'BELARUS', 'Belarus', 'BLR', 112),
('BZ', 'BELIZE', 'Belize', 'BLZ', 84),
('CA', 'CANADA', 'Canada', 'CAN', 124),
('CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL),
('CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180),
('CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140),
('CG', 'CONGO', 'Congo', 'COG', 178),
('CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756),
('CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', 384),
('CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184),
('CL', 'CHILE', 'Chile', 'CHL', 152),
('CM', 'CAMEROON', 'Cameroon', 'CMR', 120),
('CN', 'CHINA', 'China', 'CHN', 156),
('CO', 'COLOMBIA', 'Colombia', 'COL', 170),
('CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188),
('CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL),
('CU', 'CUBA', 'Cuba', 'CUB', 192),
('CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132),
('CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL),
('CY', 'CYPRUS', 'Cyprus', 'CYP', 196),
('CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203),
('DE', 'GERMANY', 'Germany', 'DEU', 276),
('DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262),
('DK', 'DENMARK', 'Denmark', 'DNK', 208),
('DM', 'DOMINICA', 'Dominica', 'DMA', 212),
('DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214),
('DZ', 'ALGERIA', 'Algeria', 'DZA', 12),
('EC', 'ECUADOR', 'Ecuador', 'ECU', 218),
('EE', 'ESTONIA', 'Estonia', 'EST', 233),
('EG', 'EGYPT', 'Egypt', 'EGY', 818),
('EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732),
('ER', 'ERITREA', 'Eritrea', 'ERI', 232),
('ES', 'SPAIN', 'Spain', 'ESP', 724),
('ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231),
('FI', 'FINLAND', 'Finland', 'FIN', 246),
('FJ', 'FIJI', 'Fiji', 'FJI', 242),
('FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238),
('FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583),
('FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234),
('FR', 'FRANCE', 'France', 'FRA', 250),
('GA', 'GABON', 'Gabon', 'GAB', 266),
('GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826),
('GD', 'GRENADA', 'Grenada', 'GRD', 308),
('GE', 'GEORGIA', 'Georgia', 'GEO', 268),
('GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254),
('GH', 'GHANA', 'Ghana', 'GHA', 288),
('GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292),
('GL', 'GREENLAND', 'Greenland', 'GRL', 304),
('GM', 'GAMBIA', 'Gambia', 'GMB', 270),
('GN', 'GUINEA', 'Guinea', 'GIN', 324),
('GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312),
('GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226),
('GR', 'GREECE', 'Greece', 'GRC', 300),
('GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL),
('GT', 'GUATEMALA', 'Guatemala', 'GTM', 320),
('GU', 'GUAM', 'Guam', 'GUM', 316),
('GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624),
('GY', 'GUYANA', 'Guyana', 'GUY', 328),
('HK', 'HONG KONG', 'Hong Kong', 'HKG', 344),
('HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL),
('HN', 'HONDURAS', 'Honduras', 'HND', 340),
('HR', 'CROATIA', 'Croatia', 'HRV', 191),
('HT', 'HAITI', 'Haiti', 'HTI', 332),
('HU', 'HUNGARY', 'Hungary', 'HUN', 348),
('ID', 'INDONESIA', 'Indonesia', 'IDN', 360),
('IE', 'IRELAND', 'Ireland', 'IRL', 372),
('IL', 'ISRAEL', 'Israel', 'ISR', 376),
('IN', 'INDIA', 'India', 'IND', 356),
('IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL),
('IQ', 'IRAQ', 'Iraq', 'IRQ', 368),
('IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364),
('IS', 'ICELAND', 'Iceland', 'ISL', 352),
('IT', 'ITALY', 'Italy', 'ITA', 380),
('JM', 'JAMAICA', 'Jamaica', 'JAM', 388),
('JO', 'JORDAN', 'Jordan', 'JOR', 400),
('JP', 'JAPAN', 'Japan', 'JPN', 392),
('KE', 'KENYA', 'Kenya', 'KEN', 404),
('KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417),
('KH', 'CAMBODIA', 'Cambodia', 'KHM', 116),
('KI', 'KIRIBATI', 'Kiribati', 'KIR', 296),
('KM', 'COMOROS', 'Comoros', 'COM', 174),
('KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659),
('KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 'PRK', 408),
('KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410),
('KW', 'KUWAIT', 'Kuwait', 'KWT', 414),
('KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136),
('KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398),
('LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', 418),
('LB', 'LEBANON', 'Lebanon', 'LBN', 422),
('LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662),
('LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438),
('LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144),
('LR', 'LIBERIA', 'Liberia', 'LBR', 430),
('LS', 'LESOTHO', 'Lesotho', 'LSO', 426),
('LT', 'LITHUANIA', 'Lithuania', 'LTU', 440),
('LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442),
('LV', 'LATVIA', 'Latvia', 'LVA', 428),
('LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434),
('MA', 'MOROCCO', 'Morocco', 'MAR', 504),
('MC', 'MONACO', 'Monaco', 'MCO', 492),
('MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498),
('MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450),
('MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584),
('MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807),
('ML', 'MALI', 'Mali', 'MLI', 466),
('MM', 'MYANMAR', 'Myanmar', 'MMR', 104),
('MN', 'MONGOLIA', 'Mongolia', 'MNG', 496),
('MO', 'MACAO', 'Macao', 'MAC', 446),
('MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580),
('MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474),
('MR', 'MAURITANIA', 'Mauritania', 'MRT', 478),
('MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500),
('MT', 'MALTA', 'Malta', 'MLT', 470),
('MU', 'MAURITIUS', 'Mauritius', 'MUS', 480),
('MV', 'MALDIVES', 'Maldives', 'MDV', 462),
('MW', 'MALAWI', 'Malawi', 'MWI', 454),
('MX', 'MEXICO', 'Mexico', 'MEX', 484),
('MY', 'MALAYSIA', 'Malaysia', 'MYS', 458),
('MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508),
('NA', 'NAMIBIA', 'Namibia', 'NAM', 516),
('NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540),
('NE', 'NIGER', 'Niger', 'NER', 562),
('NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574),
('NG', 'NIGERIA', 'Nigeria', 'NGA', 566),
('NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558),
('NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528),
('NO', 'NORWAY', 'Norway', 'NOR', 578),
('NP', 'NEPAL', 'Nepal', 'NPL', 524),
('NR', 'NAURU', 'Nauru', 'NRU', 520),
('NU', 'NIUE', 'Niue', 'NIU', 570),
('NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554),
('OM', 'OMAN', 'Oman', 'OMN', 512),
('PA', 'PANAMA', 'Panama', 'PAN', 591),
('PE', 'PERU', 'Peru', 'PER', 604),
('PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258),
('PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598),
('PH', 'PHILIPPINES', 'Philippines', 'PHL', 608),
('PK', 'PAKISTAN', 'Pakistan', 'PAK', 586),
('PL', 'POLAND', 'Poland', 'POL', 616),
('PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666),
('PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612),
('PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630),
('PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL),
('PT', 'PORTUGAL', 'Portugal', 'PRT', 620),
('PW', 'PALAU', 'Palau', 'PLW', 585),
('PY', 'PARAGUAY', 'Paraguay', 'PRY', 600),
('QA', 'QATAR', 'Qatar', 'QAT', 634),
('RE', 'REUNION', 'Reunion', 'REU', 638),
('RO', 'ROMANIA', 'Romania', 'ROM', 642),
('RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643),
('RW', 'RWANDA', 'Rwanda', 'RWA', 646),
('SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682),
('SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90),
('SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690),
('SD', 'SUDAN', 'Sudan', 'SDN', 736),
('SE', 'SWEDEN', 'Sweden', 'SWE', 752),
('SG', 'SINGAPORE', 'Singapore', 'SGP', 702),
('SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654),
('SI', 'SLOVENIA', 'Slovenia', 'SVN', 705),
('SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744),
('SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703),
('SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694),
('SM', 'SAN MARINO', 'San Marino', 'SMR', 674),
('SN', 'SENEGAL', 'Senegal', 'SEN', 686),
('SO', 'SOMALIA', 'Somalia', 'SOM', 706),
('SR', 'SURINAME', 'Suriname', 'SUR', 740),
('ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678),
('SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222),
('SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760),
('SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748),
('TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796),
('TD', 'CHAD', 'Chad', 'TCD', 148),
('TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL),
('TG', 'TOGO', 'Togo', 'TGO', 768),
('TH', 'THAILAND', 'Thailand', 'THA', 764),
('TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762),
('TK', 'TOKELAU', 'Tokelau', 'TKL', 772),
('TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL),
('TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795),
('TN', 'TUNISIA', 'Tunisia', 'TUN', 788),
('TO', 'TONGA', 'Tonga', 'TON', 776),
('TR', 'TURKEY', 'Turkey', 'TUR', 792),
('TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780),
('TV', 'TUVALU', 'Tuvalu', 'TUV', 798),
('TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158),
('TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834),
('UA', 'UKRAINE', 'Ukraine', 'UKR', 804),
('UG', 'UGANDA', 'Uganda', 'UGA', 800),
('UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL),
('US', 'UNITED STATES', 'United States', 'USA', 840),
('UY', 'URUGUAY', 'Uruguay', 'URY', 858),
('UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860),
('VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336),
('VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670),
('VE', 'VENEZUELA', 'Venezuela', 'VEN', 862),
('VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92),
('VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850),
('VN', 'VIET NAM', 'Viet Nam', 'VNM', 704),
('VU', 'VANUATU', 'Vanuatu', 'VUT', 548),
('WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876),
('WS', 'SAMOA', 'Samoa', 'WSM', 882),
('YE', 'YEMEN', 'Yemen', 'YEM', 887),
('YT', 'MAYOTTE', 'Mayotte', NULL, NULL),
('ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710),
('ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894),
('ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716);

-- --------------------------------------------------------

--
-- Table structure for table `pdct_document`
--

CREATE TABLE IF NOT EXISTS `pdct_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE latin1_bin NOT NULL,
  `description` text COLLATE latin1_bin,
  `file_upload` varchar(200) COLLATE latin1_bin NOT NULL,
  `version` varchar(10) COLLATE latin1_bin NOT NULL,
  `version_date` date NOT NULL,
  `created_by` varchar(50) COLLATE latin1_bin NOT NULL,
  `created_date` date NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `prj_document`
--

CREATE TABLE IF NOT EXISTS `prj_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_number` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `document_number` varchar(50) NOT NULL,
  `version` varchar(10) NOT NULL,
  `version_date` date NOT NULL,
  `owner` varchar(50) NOT NULL,
  `distribution` varchar(200) NOT NULL,
  `document_description` text NOT NULL,
  `file_attached` varchar(200) NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `prj_document`
--

INSERT INTO `prj_document` (`id`, `project_number`, `type`, `task_id`, `document_number`, `version`, `version_date`, `owner`, `distribution`, `document_description`, `file_attached`, `created_date`, `created_by`) VALUES
(8, '5656', 'Lain-Lain', NULL, '1003', '1.0', '2013-07-08', 'A', 'aa', 'a', 'scer.txt', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prj_finance`
--

CREATE TABLE IF NOT EXISTS `prj_finance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_number` varchar(50) NOT NULL,
  `elbi` varchar(20) NOT NULL,
  `elbi_desc` varchar(100) NOT NULL,
  `period_month` varchar(10) NOT NULL,
  `debit` decimal(11,2) NOT NULL,
  `credit` decimal(11,2) NOT NULL,
  `remarks` text NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `prj_finance`
--

INSERT INTO `prj_finance` (`id`, `project_number`, `elbi`, `elbi_desc`, `period_month`, `debit`, `credit`, `remarks`, `created_by`, `created_date`) VALUES
(3, '5656', '222', 'Bahan Bakar', 'Juli', '2000000.00', '1232000.00', '-', NULL, NULL),
(4, '5656', '221', 'Bahan Kimia', 'Juni', '125000.00', '0.00', '-', NULL, NULL),
(5, '10011', '223', 'Tanggung Jawab Sosial dan Lingkungan (CSR)', 'Juli', '10000000.00', '0.00', '-', NULL, NULL),
(6, '10011', '301', 'Pemakaian Listrik (PLN)', 'Juni', '0.00', '25000000.00', '-', NULL, NULL),
(7, '5656', '223', 'Inventaris dan Peralatan Kantor', 'September', '2000000.00', '0.00', '-', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prj_personel`
--

CREATE TABLE IF NOT EXISTS `prj_personel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_number` varchar(50) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `position_task` text NOT NULL,
  `start_join` date NOT NULL,
  `end_join` date NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `prj_personel`
--

INSERT INTO `prj_personel` (`id`, `project_number`, `employee_id`, `name`, `position`, `position_task`, `start_join`, `end_join`, `telepon`, `email`, `remarks`, `created_by`, `created_date`) VALUES
(2, '5656', '10011021', 'Afri', 'A', 'B', '2013-07-04', '2013-07-11', '012133123', 'afri@s.com', 'hahaha', NULL, NULL),
(3, '10011', '10001', 'Namama', 'Project Manager', 'manage project', '2013-07-10', '2013-07-31', '1001', 'namama@mail.com', '-', NULL, NULL),
(4, '10011', '10002', 'Nama', 'Engineer', 'engineer', '2013-07-10', '2013-07-24', '1312', 'nama@mail.com', '-', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prj_personel_mandays`
--

CREATE TABLE IF NOT EXISTS `prj_personel_mandays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(50) NOT NULL,
  `project_number` varchar(50) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(11) NOT NULL,
  `mandays` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `prj_personel_mandays`
--

INSERT INTO `prj_personel_mandays` (`id`, `employee_id`, `project_number`, `month`, `year`, `mandays`) VALUES
(3, '10011021', '5656', 'Juni', 2013, 13),
(4, '10001', '10011', 'Januari', 2013, 12),
(5, '10001', '10011', 'April', 2013, 21),
(6, '10002', '10011', 'Februari', 2013, 10);

-- --------------------------------------------------------

--
-- Table structure for table `prj_procurement`
--

CREATE TABLE IF NOT EXISTS `prj_procurement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_number` varchar(50) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `contract` varchar(50) NOT NULL,
  `contract_start_date` date NOT NULL,
  `contract_end_date` date NOT NULL,
  `period_month` varchar(10) NOT NULL,
  `item` varchar(200) NOT NULL,
  `unit_price` decimal(11,2) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `total_price` decimal(11,2) NOT NULL,
  `location` varchar(100) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `prj_procurement`
--

INSERT INTO `prj_procurement` (`id`, `project_number`, `vendor`, `contract`, `contract_start_date`, `contract_end_date`, `period_month`, `item`, `unit_price`, `amount`, `total_price`, `location`, `created_by`, `created_date`) VALUES
(3, '5656', 'Toyota', '2000000000', '2013-07-04', '2013-07-04', '4', 'Avanza', '420000000.00', '3.00', '999999999.99', 'Jakarta', 'Dummy', '2013-07-04'),
(4, '5656', 'Toyota', '1001', '2013-07-08', '2013-07-15', 'Juli', 'Avanza', '12500000.00', '5.00', '62500000.00', 'Jakarta', 'Dummy', '2013-07-08'),
(5, '10011', 'Toyota', '1002', '2013-07-11', '2013-07-25', 'Juli', 'Avanza', '12500000.00', '2.00', '25000000.00', 'Jakarta', 'Dummy', '2013-07-11'),
(6, '10011', 'Truk', '1003', '2013-07-11', '2013-07-25', 'Juli', 'Truk', '25000000.00', '3.00', '75000000.00', 'Jakarta', 'Dummy', '2013-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `prj_progress`
--

CREATE TABLE IF NOT EXISTS `prj_progress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_number` varchar(50) NOT NULL,
  `period_date` date NOT NULL,
  `period_date_to` date NOT NULL,
  `period_week` int(11) NOT NULL,
  `description` text NOT NULL,
  `termin_pgn` text NOT NULL,
  `termin_vendor` text NOT NULL,
  `progress_actual` float(11,2) NOT NULL,
  `progress_plan` float(11,2) NOT NULL,
  `progress_this_week` text NOT NULL,
  `completed_work` text NOT NULL,
  `work_remaining` text NOT NULL,
  `reason_of_delay` text NOT NULL,
  `pic` varchar(50) NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `prj_progress`
--

INSERT INTO `prj_progress` (`id`, `project_number`, `period_date`, `period_date_to`, `period_week`, `description`, `termin_pgn`, `termin_vendor`, `progress_actual`, `progress_plan`, `progress_this_week`, `completed_work`, `work_remaining`, `reason_of_delay`, `pic`, `created_date`, `created_by`) VALUES
(8, '10010', '2013-07-04', '2013-07-31', 1, '-', '-', '-', 18.02, 20.00, '-', '-', '-', '-', 'imam', NULL, NULL),
(9, '10010', '2013-07-04', '2013-07-31', 2, '-', '-', '-', 27.95, 33.00, '-', '-', '-', '-', 'imam', NULL, NULL),
(10, '10010', '2013-07-04', '2013-07-31', 3, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(11, '10010', '2013-07-04', '2013-07-31', 4, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(13, '5656', '2013-07-04', '2013-07-04', 1, 'asd', '', '', 12.00, 13.00, 'asd', 'asd', 'asd', 'asd', 'imam', NULL, NULL),
(14, '5656', '2013-07-04', '2013-07-04', 2, 'asdsa', '', '', 25.00, 36.00, 'asd', 'asd', 'asd', 'asd', 'imam', NULL, NULL),
(16, '5656', '2013-07-04', '2013-07-04', 3, 'asd', '', '', 80.00, 80.00, 'asd', 'asd', 'asd', 'asd', 'imam', NULL, NULL),
(18, '10011', '2013-07-05', '2013-07-26', 1, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(19, '10011', '2013-07-05', '2013-07-26', 2, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(20, '10011', '2013-07-05', '2013-07-26', 3, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(21, '10012', '2013-07-05', '2013-08-02', 1, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(22, '10012', '2013-07-05', '2013-08-02', 2, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(23, '10012', '2013-07-05', '2013-08-02', 3, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(24, '10012', '2013-07-05', '2013-08-02', 4, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(25, '100101', '2013-07-08', '2013-08-05', 1, '-', '-', '-', 10.00, 12.00, '-', '-', 'Test Outstanding\n', '-', '-', NULL, NULL),
(26, '100101', '2013-07-08', '2013-08-05', 2, '-', '-', '-', 22.97, 23.00, '-', '-', 'test1\ntest2\ntest3\ntest4\ntest5\ntest6\ntest7', '-', '-', NULL, NULL),
(27, '100101', '2013-07-08', '2013-08-05', 3, '-', '-', '-', 0.00, 46.00, '-', '-', '-', '-', '-', NULL, NULL),
(28, '100101', '2013-07-08', '2013-08-05', 4, '-', '-', '-', 0.00, 100.00, '-', '-', '-', '-', '-', NULL, NULL),
(29, '123', '2013-07-10', '2013-07-31', 1, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(30, '123', '2013-07-10', '2013-07-31', 2, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(31, '123', '2013-07-10', '2013-07-31', 3, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(32, '123', '2013-07-10', '2013-07-31', 4, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(33, '123', '2013-07-10', '2013-07-31', 5, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(34, '123', '2013-07-10', '2013-07-31', 6, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(35, '123', '2013-07-10', '2013-07-31', 7, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(36, '123', '2013-07-10', '2013-07-31', 8, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(37, '123', '2013-07-10', '2013-07-31', 9, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(38, '123', '2013-07-10', '2013-07-31', 10, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(39, 'r111', '2013-07-10', '2013-07-24', 1, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(40, 'r111', '2013-07-10', '2013-07-24', 2, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(41, 'r111', '2013-07-10', '2013-07-24', 3, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(42, 'r111', '2013-07-10', '2013-07-24', 4, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(43, 'r111', '2013-07-10', '2013-07-24', 5, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(44, 'r111', '2013-07-10', '2013-07-24', 6, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(45, 'r111', '2013-07-10', '2013-07-24', 7, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(46, 'r111', '2013-07-10', '2013-07-24', 8, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(47, 'r111', '2013-07-10', '2013-07-24', 9, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(48, 'r111', '2013-07-10', '2013-07-24', 10, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(49, 'r111', '2013-07-10', '2013-07-24', 1, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(50, 'r111', '2013-07-10', '2013-07-24', 2, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(51, 'a123', '2013-07-10', '2013-07-31', 1, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(52, 'a123', '2013-07-10', '2013-07-31', 2, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(53, 'a123', '2013-07-10', '2013-07-31', 3, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(54, 'b213', '2013-07-10', '2013-07-31', 1, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(55, 'b213', '2013-07-10', '2013-07-31', 2, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(56, 'b213', '2013-07-10', '2013-07-31', 3, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(57, 'b213', '2013-07-10', '2013-07-31', 4, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(58, 'b213', '2013-07-10', '2013-07-31', 5, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(59, 'b213', '2013-07-10', '2013-07-31', 6, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(60, 'b213', '2013-07-10', '2013-07-31', 7, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(61, 'b213', '2013-07-10', '2013-07-31', 8, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(62, 'b213', '2013-07-10', '2013-07-31', 9, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(63, 'b213', '2013-07-10', '2013-07-31', 10, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(64, 'b123', '2013-07-10', '2013-07-31', 1, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(65, 'b123', '2013-07-10', '2013-07-31', 2, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(66, 'b123', '2013-07-10', '2013-07-31', 3, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(67, 'b123', '2013-07-10', '2013-07-31', 4, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(68, 'b123', '2013-07-10', '2013-07-31', 5, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(69, 'b123', '2013-07-10', '2013-07-31', 6, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(70, 'b123', '2013-07-10', '2013-07-31', 7, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(71, 'b123', '2013-07-10', '2013-07-31', 8, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(72, 'b123', '2013-07-10', '2013-07-31', 9, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(73, 'b123', '2013-07-10', '2013-07-31', 10, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(74, 'c123', '2013-07-10', '2013-07-31', 1, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(75, 'c123', '2013-07-10', '2013-07-31', 2, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL),
(76, 'c123', '2013-07-10', '2013-07-31', 3, '-', '-', '-', 0.00, 0.00, '-', '-', '-', '-', '-', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prj_project`
--

CREATE TABLE IF NOT EXISTS `prj_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(50) NOT NULL,
  `name` varchar(300) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `version` varchar(20) NOT NULL,
  `version_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `status_date` date NOT NULL,
  `location` varchar(200) NOT NULL,
  `plan_start_date` date NOT NULL,
  `plan_end_date` date NOT NULL,
  `act_start_date` date NOT NULL,
  `act_end_date` date NOT NULL,
  `duration` smallint(6) NOT NULL,
  `spmk_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `progress` int(11) NOT NULL,
  `progress_plan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `prj_project`
--

INSERT INTO `prj_project` (`id`, `number`, `name`, `owner`, `description`, `version`, `version_date`, `status`, `status_date`, `location`, `plan_start_date`, `plan_end_date`, `act_start_date`, `act_end_date`, `duration`, `spmk_date`, `amount`, `pic`, `created_by`, `created_date`, `progress`, `progress_plan`) VALUES
(2, '5656', 'Operasional Kantor Pusat', 'SBU 1', '0', '0', '0000-00-00', '', '0000-00-00', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, '0000-00-00', 0, '7777777', NULL, NULL, 80, 99),
(3, '10010231', 'Proyek Test', 'Pemilik', 'test doang', '1', '2013-06-20', 'Open', '2013-06-20', 'Jakarta', '2013-06-20', '2013-06-20', '2013-06-20', '2013-06-20', 1, '2013-06-20', 1000000, 'Imam', NULL, NULL, 36, 0),
(7, '10010', 'Percobaan', '1', '1', '1', '2013-07-04', '1', '2013-07-04', '1', '2013-07-04', '2013-07-31', '2013-07-04', '2013-07-31', 27, '2013-07-04', 2000000000, '1', NULL, NULL, 27, 33),
(8, '10011', 'Pembangunan Pipa Gas', 'PGAS', 'bangun pipa', '1', '2013-07-05', '1', '2013-07-05', 'Jakarta', '2013-07-05', '2013-07-26', '2013-07-05', '2013-07-26', 21, '2013-07-05', 125000000, 'Imam', NULL, NULL, 0, 0),
(9, '10012', 'aaatest', 'test', 'testq', '1', '2013-07-05', '1', '2013-07-05', 'Jakarta', '2013-07-05', '2013-08-02', '2013-07-05', '2013-08-09', 28, '2013-07-05', 2147483647, 'a', NULL, NULL, 0, 0),
(10, '100101', 'Testing', 'Pemilik', 'Deskripsi', '1.0', '2013-07-08', 'Aktif', '0000-00-00', '', '2013-07-08', '2013-08-05', '0000-00-00', '0000-00-00', 28, '0000-00-00', 72000000, 'imam', NULL, NULL, 0, 0),
(13, 'c123', 'asda', 'asdad', 'asd', '1.0', '2013-07-10', 'Aktif', '0000-00-00', '', '2013-07-10', '2013-07-31', '0000-00-00', '0000-00-00', 21, '0000-00-00', 123, '7777777', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prj_task`
--

CREATE TABLE IF NOT EXISTS `prj_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `project_number` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `plan_start_date` date NOT NULL,
  `plan_end_date` date NOT NULL,
  `plan_progress` decimal(11,2) NOT NULL,
  `act_start_date` date NOT NULL,
  `act_end_date` date NOT NULL,
  `actual_progress` decimal(11,2) NOT NULL,
  `remarks` text NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `prj_task`
--

INSERT INTO `prj_task` (`id`, `parent_id`, `project_number`, `code`, `name`, `description`, `plan_start_date`, `plan_end_date`, `plan_progress`, `act_start_date`, `act_end_date`, `actual_progress`, `remarks`, `created_date`, `created_by`) VALUES
(21, 0, '5656', '101', 'Planning', 'planning', '2013-07-04', '2013-07-11', '25.00', '2013-07-04', '2013-07-11', '25.00', 'test', NULL, NULL),
(22, 0, '5656', '201', 'Analysis', 'Analisis', '2013-07-11', '2013-07-18', '45.00', '2013-07-11', '2013-07-18', '45.00', '-', NULL, NULL),
(23, 21, '5656', '102', 'Problem Statement', 'problem statement', '2013-07-04', '2013-07-06', '12.00', '2013-07-04', '2013-07-06', '11.95', '-', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rbac_authassignment`
--

CREATE TABLE IF NOT EXISTS `rbac_authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rbac_authassignment`
--

INSERT INTO `rbac_authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;'),
('Admin->User', '1', NULL, 'N;'),
('Admin->User', '4', NULL, 'N;'),
('Modadmin.TestTable.*', '123', NULL, 'N;'),
('Site.Kirimemail', '1', NULL, 'N;'),
('Super->Project->Finance', '131', NULL, 'N;'),
('Super->Project->PIC', '129', NULL, 'N;'),
('Super->Project->Procurement', '130', NULL, 'N;'),
('Super->Super->Project', '128', NULL, 'N;'),
('Super->Super->Sppd', '129', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `rbac_authitem`
--

CREATE TABLE IF NOT EXISTS `rbac_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rbac_authitem`
--

INSERT INTO `rbac_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, NULL, NULL, 'N;'),
('Admin->User', 2, 'Admin User', NULL, 'N;'),
('Importcsv.Default.*', 1, NULL, NULL, 'N;'),
('Importcsv.Default.Index', 0, NULL, NULL, 'N;'),
('Importcsv.Default.Upload', 0, NULL, NULL, 'N;'),
('Modadmin.Default.*', 1, NULL, NULL, 'N;'),
('Modadmin.Default.Index', 0, NULL, NULL, 'N;'),
('Modadmin.TestTable.*', 1, NULL, NULL, 'N;'),
('Modadmin.TestTable.Admin', 0, NULL, NULL, 'N;'),
('Modadmin.TestTable.Create', 0, NULL, NULL, 'N;'),
('Modadmin.TestTable.Delete', 0, NULL, NULL, 'N;'),
('Modadmin.TestTable.Index', 0, NULL, NULL, 'N;'),
('Modadmin.TestTable.Update', 0, NULL, NULL, 'N;'),
('Modadmin.TestTable.View', 0, NULL, NULL, 'N;'),
('Modadmin.User.*', 1, NULL, NULL, 'N;'),
('Modadmin.User.Admin', 0, NULL, NULL, 'N;'),
('Modadmin.User.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modadmin.User.Aktif', 0, NULL, NULL, 'N;'),
('Modadmin.User.Create', 0, NULL, NULL, 'N;'),
('Modadmin.User.Delete', 0, NULL, NULL, 'N;'),
('Modadmin.User.Index', 0, NULL, NULL, 'N;'),
('Modadmin.User.Update', 0, NULL, NULL, 'N;'),
('Modadmin.User.View', 0, NULL, NULL, 'N;'),
('Modesms.DisposisiTree.*', 1, NULL, NULL, 'N;'),
('Modesms.DisposisiTree.Admin', 0, NULL, NULL, 'N;'),
('Modesms.DisposisiTree.AdminTree', 0, NULL, NULL, 'N;'),
('Modesms.DisposisiTree.Create', 0, NULL, NULL, 'N;'),
('Modesms.DisposisiTree.Delete', 0, NULL, NULL, 'N;'),
('Modesms.DisposisiTree.Index', 0, NULL, NULL, 'N;'),
('Modesms.DisposisiTree.Update', 0, NULL, NULL, 'N;'),
('Modesms.DisposisiTree.View', 0, NULL, NULL, 'N;'),
('Modesms.InsideLetter.*', 1, NULL, NULL, 'N;'),
('Modesms.InsideLetter.Admin', 0, NULL, NULL, 'N;'),
('Modesms.InsideLetter.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modesms.InsideLetter.BatchDelete', 0, NULL, NULL, 'N;'),
('Modesms.InsideLetter.Create', 0, NULL, NULL, 'N;'),
('Modesms.InsideLetter.Delete', 0, NULL, NULL, 'N;'),
('Modesms.InsideLetter.Index', 0, NULL, NULL, 'N;'),
('Modesms.InsideLetter.Update', 0, NULL, NULL, 'N;'),
('Modesms.InsideLetter.View', 0, NULL, NULL, 'N;'),
('Modesms.InsideLetter.ViewPdf', 0, NULL, NULL, 'N;'),
('Modesms.OutsideDisposisi.*', 1, NULL, NULL, 'N;'),
('Modesms.OutsideDisposisi.Admin', 0, NULL, NULL, 'N;'),
('Modesms.OutsideDisposisi.Create', 0, NULL, NULL, 'N;'),
('Modesms.OutsideDisposisi.Delete', 0, NULL, NULL, 'N;'),
('Modesms.OutsideDisposisi.Disposisi', 0, NULL, NULL, 'N;'),
('Modesms.OutsideDisposisi.Index', 0, NULL, NULL, 'N;'),
('Modesms.OutsideDisposisi.Tree', 0, NULL, NULL, 'N;'),
('Modesms.OutsideDisposisi.Update', 0, NULL, NULL, 'N;'),
('Modesms.OutsideDisposisi.View', 0, NULL, NULL, 'N;'),
('Modesms.OutsideLetter.*', 1, NULL, NULL, 'N;'),
('Modesms.OutsideLetter.Admin', 0, NULL, NULL, 'N;'),
('Modesms.OutsideLetter.AfterSubmit', 0, NULL, NULL, 'N;'),
('Modesms.OutsideLetter.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modesms.OutsideLetter.BatchDelete', 0, NULL, NULL, 'N;'),
('Modesms.OutsideLetter.Create', 0, NULL, NULL, 'N;'),
('Modesms.OutsideLetter.Delete', 0, NULL, NULL, 'N;'),
('Modesms.OutsideLetter.Index', 0, NULL, NULL, 'N;'),
('Modesms.OutsideLetter.Update', 0, NULL, NULL, 'N;'),
('Modesms.OutsideLetter.View', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Elbicode.*', 1, NULL, NULL, 'N;'),
('Modfinance - Copy.Elbicode.Admin', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Elbicode.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Elbicode.Create', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Elbicode.Delete', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Elbicode.Index', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Elbicode.Update', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Elbicode.View', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Kas.*', 1, NULL, NULL, 'N;'),
('Modfinance - Copy.Kas.Admin', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Kas.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Kas.Create', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Kas.Delete', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Kas.Index', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Kas.Update', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Kas.View', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasDc.*', 1, NULL, NULL, 'N;'),
('Modfinance - Copy.KasDc.Admin', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasDc.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasDc.BatchDelete', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasDc.Create', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasDc.Delete', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasDc.Index', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasDc.LaporanKas', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasDc.LaporanKasPdf', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasDc.Update', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasDc.View', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasExpense.*', 1, NULL, NULL, 'N;'),
('Modfinance - Copy.KasExpense.Admin', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasExpense.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasExpense.BatchDelete', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasExpense.BatchSubmit', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasExpense.Create', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasExpense.Delete', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasExpense.Index', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasExpense.Update', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasExpense.View', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasSaldo.*', 1, NULL, NULL, 'N;'),
('Modfinance - Copy.KasSaldo.Admin', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasSaldo.Create', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasSaldo.Delete', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasSaldo.Index', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasSaldo.Update', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.KasSaldo.View', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Period.*', 1, NULL, NULL, 'N;'),
('Modfinance - Copy.Period.Admin', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Period.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Period.Create', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Period.Delete', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Period.Index', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Period.Update', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Period.View', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Rekening.*', 1, NULL, NULL, 'N;'),
('Modfinance - Copy.Rekening.Admin', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Rekening.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Rekening.Create', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Rekening.Delete', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Rekening.Index', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Rekening.Update', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.Rekening.View', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningDc.*', 1, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningDc.Admin', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningDc.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningDc.BatchDelete', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningDc.BukuBank', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningDc.BukuBankPdf', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningDc.Create', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningDc.Delete', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningDc.Index', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningDc.LaporanBank', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningDc.LaporanBankPdf', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningDc.TarikBank', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningDc.Update', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningDc.View', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningSaldo.*', 1, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningSaldo.Admin', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningSaldo.Create', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningSaldo.Delete', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningSaldo.Index', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningSaldo.Update', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.RekeningSaldo.View', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.SetupUserBank.*', 1, NULL, NULL, 'N;'),
('Modfinance - Copy.SetupUserBank.Admin', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.SetupUserBank.Create', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.SetupUserBank.Delete', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.SetupUserBank.Index', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.SetupUserBank.Update', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.SetupUserBank.View', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.SetupUserKas.*', 1, NULL, NULL, 'N;'),
('Modfinance - Copy.SetupUserKas.Admin', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.SetupUserKas.Create', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.SetupUserKas.Delete', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.SetupUserKas.Index', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.SetupUserKas.Update', 0, NULL, NULL, 'N;'),
('Modfinance - Copy.SetupUserKas.View', 0, NULL, NULL, 'N;'),
('Modfinance.Elbicode.*', 1, NULL, NULL, 'N;'),
('Modfinance.Elbicode.Admin', 0, NULL, NULL, 'N;'),
('Modfinance.Elbicode.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modfinance.Elbicode.Create', 0, NULL, NULL, 'N;'),
('Modfinance.Elbicode.Delete', 0, NULL, NULL, 'N;'),
('Modfinance.Elbicode.Index', 0, NULL, NULL, 'N;'),
('Modfinance.Elbicode.Update', 0, NULL, NULL, 'N;'),
('Modfinance.Elbicode.View', 0, NULL, NULL, 'N;'),
('Modfinance.Kas.*', 1, NULL, NULL, 'N;'),
('Modfinance.Kas.Admin', 0, NULL, NULL, 'N;'),
('Modfinance.Kas.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modfinance.Kas.Create', 0, NULL, NULL, 'N;'),
('Modfinance.Kas.Delete', 0, NULL, NULL, 'N;'),
('Modfinance.Kas.Index', 0, NULL, NULL, 'N;'),
('Modfinance.Kas.Update', 0, NULL, NULL, 'N;'),
('Modfinance.Kas.View', 0, NULL, NULL, 'N;'),
('Modfinance.KasDc.*', 1, NULL, NULL, 'N;'),
('Modfinance.KasDc.Admin', 0, NULL, NULL, 'N;'),
('Modfinance.KasDc.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modfinance.KasDc.BatchDelete', 0, NULL, NULL, 'N;'),
('Modfinance.KasDc.Create', 0, NULL, NULL, 'N;'),
('Modfinance.KasDc.Delete', 0, NULL, NULL, 'N;'),
('Modfinance.KasDc.Index', 0, NULL, NULL, 'N;'),
('Modfinance.KasDc.LaporanKas', 0, NULL, NULL, 'N;'),
('Modfinance.KasDc.LaporanKasPdf', 0, NULL, NULL, 'N;'),
('Modfinance.KasDc.Update', 0, NULL, NULL, 'N;'),
('Modfinance.KasDc.View', 0, NULL, NULL, 'N;'),
('Modfinance.KasExpense.*', 1, NULL, NULL, 'N;'),
('Modfinance.KasExpense.Admin', 0, NULL, NULL, 'N;'),
('Modfinance.KasExpense.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modfinance.KasExpense.BatchDelete', 0, NULL, NULL, 'N;'),
('Modfinance.KasExpense.BatchSubmit', 0, NULL, NULL, 'N;'),
('Modfinance.KasExpense.Create', 0, NULL, NULL, 'N;'),
('Modfinance.KasExpense.Delete', 0, NULL, NULL, 'N;'),
('Modfinance.KasExpense.Index', 0, NULL, NULL, 'N;'),
('Modfinance.KasExpense.Update', 0, NULL, NULL, 'N;'),
('Modfinance.KasExpense.View', 0, NULL, NULL, 'N;'),
('Modfinance.KasSaldo.*', 1, NULL, NULL, 'N;'),
('Modfinance.KasSaldo.Admin', 0, NULL, NULL, 'N;'),
('Modfinance.KasSaldo.Create', 0, NULL, NULL, 'N;'),
('Modfinance.KasSaldo.Delete', 0, NULL, NULL, 'N;'),
('Modfinance.KasSaldo.Index', 0, NULL, NULL, 'N;'),
('Modfinance.KasSaldo.Update', 0, NULL, NULL, 'N;'),
('Modfinance.KasSaldo.View', 0, NULL, NULL, 'N;'),
('Modfinance.Period.*', 1, NULL, NULL, 'N;'),
('Modfinance.Period.Admin', 0, NULL, NULL, 'N;'),
('Modfinance.Period.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modfinance.Period.Create', 0, NULL, NULL, 'N;'),
('Modfinance.Period.Delete', 0, NULL, NULL, 'N;'),
('Modfinance.Period.Index', 0, NULL, NULL, 'N;'),
('Modfinance.Period.Update', 0, NULL, NULL, 'N;'),
('Modfinance.Period.View', 0, NULL, NULL, 'N;'),
('Modfinance.Rekening.*', 1, NULL, NULL, 'N;'),
('Modfinance.Rekening.Admin', 0, NULL, NULL, 'N;'),
('Modfinance.Rekening.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modfinance.Rekening.Create', 0, NULL, NULL, 'N;'),
('Modfinance.Rekening.Delete', 0, NULL, NULL, 'N;'),
('Modfinance.Rekening.Index', 0, NULL, NULL, 'N;'),
('Modfinance.Rekening.Update', 0, NULL, NULL, 'N;'),
('Modfinance.Rekening.View', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningBankDc.*', 1, NULL, NULL, 'N;'),
('Modfinance.RekeningBankDc.Admin', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningBankDc.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningBankDc.Create', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningBankDc.Delete', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningBankDc.Index', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningBankDc.Update', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningBankDc.View', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningDc.*', 1, NULL, NULL, 'N;'),
('Modfinance.RekeningDc.Admin', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningDc.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningDc.BatchDelete', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningDc.BukuBank', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningDc.BukuBankPdf', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningDc.Create', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningDc.Delete', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningDc.Index', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningDc.LaporanBank', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningDc.LaporanBankPdf', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningDc.TarikBank', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningDc.Update', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningDc.View', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningSaldo.*', 1, NULL, NULL, 'N;'),
('Modfinance.RekeningSaldo.Admin', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningSaldo.Create', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningSaldo.Delete', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningSaldo.Index', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningSaldo.Update', 0, NULL, NULL, 'N;'),
('Modfinance.RekeningSaldo.View', 0, NULL, NULL, 'N;'),
('Modfinance.SetupUserBank.*', 1, NULL, NULL, 'N;'),
('Modfinance.SetupUserBank.Admin', 0, NULL, NULL, 'N;'),
('Modfinance.SetupUserBank.Create', 0, NULL, NULL, 'N;'),
('Modfinance.SetupUserBank.Delete', 0, NULL, NULL, 'N;'),
('Modfinance.SetupUserBank.Index', 0, NULL, NULL, 'N;'),
('Modfinance.SetupUserBank.Update', 0, NULL, NULL, 'N;'),
('Modfinance.SetupUserBank.View', 0, NULL, NULL, 'N;'),
('Modfinance.SetupUserKas.*', 1, NULL, NULL, 'N;'),
('Modfinance.SetupUserKas.Admin', 0, NULL, NULL, 'N;'),
('Modfinance.SetupUserKas.Create', 0, NULL, NULL, 'N;'),
('Modfinance.SetupUserKas.Delete', 0, NULL, NULL, 'N;'),
('Modfinance.SetupUserKas.Index', 0, NULL, NULL, 'N;'),
('Modfinance.SetupUserKas.Update', 0, NULL, NULL, 'N;'),
('Modfinance.SetupUserKas.View', 0, NULL, NULL, 'N;'),
('Modhumanresources.Certification.*', 1, NULL, NULL, 'N;'),
('Modhumanresources.Certification.AddNew', 0, NULL, NULL, 'N;'),
('Modhumanresources.Certification.Admin', 0, NULL, NULL, 'N;'),
('Modhumanresources.Certification.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modhumanresources.Certification.Certification', 0, NULL, NULL, 'N;'),
('Modhumanresources.Certification.Create', 0, NULL, NULL, 'N;'),
('Modhumanresources.Certification.Delete', 0, NULL, NULL, 'N;'),
('Modhumanresources.Certification.Download', 0, NULL, NULL, 'N;'),
('Modhumanresources.Certification.Index', 0, NULL, NULL, 'N;'),
('Modhumanresources.Certification.Update', 0, NULL, NULL, 'N;'),
('Modhumanresources.Certification.UpdateAjax', 0, NULL, NULL, 'N;'),
('Modhumanresources.Certification.View', 0, NULL, NULL, 'N;'),
('Modhumanresources.Default.*', 1, NULL, NULL, 'N;'),
('Modhumanresources.Default.Index', 0, NULL, NULL, 'N;'),
('Modhumanresources.Department.*', 1, NULL, NULL, 'N;'),
('Modhumanresources.Department.Admin', 0, NULL, NULL, 'N;'),
('Modhumanresources.Department.Create', 0, NULL, NULL, 'N;'),
('Modhumanresources.Department.Delete', 0, NULL, NULL, 'N;'),
('Modhumanresources.Department.Index', 0, NULL, NULL, 'N;'),
('Modhumanresources.Department.Update', 0, NULL, NULL, 'N;'),
('Modhumanresources.Department.View', 0, NULL, NULL, 'N;'),
('Modhumanresources.Dependent.*', 1, NULL, NULL, 'N;'),
('Modhumanresources.Dependent.AddNew', 0, NULL, NULL, 'N;'),
('Modhumanresources.Dependent.Admin', 0, NULL, NULL, 'N;'),
('Modhumanresources.Dependent.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modhumanresources.Dependent.Create', 0, NULL, NULL, 'N;'),
('Modhumanresources.Dependent.Delete', 0, NULL, NULL, 'N;'),
('Modhumanresources.Dependent.Dependent', 0, NULL, NULL, 'N;'),
('Modhumanresources.Dependent.Index', 0, NULL, NULL, 'N;'),
('Modhumanresources.Dependent.Update', 0, NULL, NULL, 'N;'),
('Modhumanresources.Dependent.UpdateAjax', 0, NULL, NULL, 'N;'),
('Modhumanresources.Dependent.View', 0, NULL, NULL, 'N;'),
('Modhumanresources.Education.*', 1, NULL, NULL, 'N;'),
('Modhumanresources.Education.AddNew', 0, NULL, NULL, 'N;'),
('Modhumanresources.Education.Admin', 0, NULL, NULL, 'N;'),
('Modhumanresources.Education.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modhumanresources.Education.Create', 0, NULL, NULL, 'N;'),
('Modhumanresources.Education.Delete', 0, NULL, NULL, 'N;'),
('Modhumanresources.Education.Education', 0, NULL, NULL, 'N;'),
('Modhumanresources.Education.Index', 0, NULL, NULL, 'N;'),
('Modhumanresources.Education.Update', 0, NULL, NULL, 'N;'),
('Modhumanresources.Education.UpdateAjax', 0, NULL, NULL, 'N;'),
('Modhumanresources.Education.View', 0, NULL, NULL, 'N;'),
('Modhumanresources.EmergencyRecord.*', 1, NULL, NULL, 'N;'),
('Modhumanresources.EmergencyRecord.AddNew', 0, NULL, NULL, 'N;'),
('Modhumanresources.EmergencyRecord.Admin', 0, NULL, NULL, 'N;'),
('Modhumanresources.EmergencyRecord.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modhumanresources.EmergencyRecord.Create', 0, NULL, NULL, 'N;'),
('Modhumanresources.EmergencyRecord.Delete', 0, NULL, NULL, 'N;'),
('Modhumanresources.EmergencyRecord.Emergency', 0, NULL, NULL, 'N;'),
('Modhumanresources.EmergencyRecord.Index', 0, NULL, NULL, 'N;'),
('Modhumanresources.EmergencyRecord.Update', 0, NULL, NULL, 'N;'),
('Modhumanresources.EmergencyRecord.UpdateAjax', 0, NULL, NULL, 'N;'),
('Modhumanresources.EmergencyRecord.View', 0, NULL, NULL, 'N;'),
('Modhumanresources.Employee.*', 1, NULL, NULL, 'N;'),
('Modhumanresources.Employee.Admin', 0, 'modhumanresources Employee Admin', NULL, 'N;'),
('Modhumanresources.Employee.AdminByDepartment', 0, NULL, NULL, 'N;'),
('Modhumanresources.Employee.AdminByposition', 0, NULL, NULL, 'N;'),
('Modhumanresources.Employee.AdminExel', 0, NULL, NULL, 'N;'),
('Modhumanresources.Employee.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modhumanresources.Employee.Create', 0, NULL, NULL, 'N;'),
('Modhumanresources.Employee.Delete', 0, NULL, NULL, 'N;'),
('Modhumanresources.Employee.Index', 0, NULL, NULL, 'N;'),
('Modhumanresources.Employee.Update', 0, NULL, NULL, 'N;'),
('Modhumanresources.Employee.UpdatePassword', 0, NULL, NULL, 'N;'),
('Modhumanresources.Employee.View', 0, NULL, NULL, 'N;'),
('Modhumanresources.EmployeeStatus.*', 1, NULL, NULL, 'N;'),
('Modhumanresources.EmployeeStatus.Admin', 0, NULL, NULL, 'N;'),
('Modhumanresources.EmployeeStatus.Create', 0, NULL, NULL, 'N;'),
('Modhumanresources.EmployeeStatus.Delete', 0, NULL, NULL, 'N;'),
('Modhumanresources.EmployeeStatus.Index', 0, NULL, NULL, 'N;'),
('Modhumanresources.EmployeeStatus.Update', 0, NULL, NULL, 'N;'),
('Modhumanresources.EmployeeStatus.View', 0, NULL, NULL, 'N;'),
('Modhumanresources.FilePublication.*', 1, NULL, NULL, 'N;'),
('Modhumanresources.FilePublication.Admin', 0, NULL, NULL, 'N;'),
('Modhumanresources.FilePublication.BatchDelete', 0, NULL, NULL, 'N;'),
('Modhumanresources.FilePublication.Create', 0, NULL, NULL, 'N;'),
('Modhumanresources.FilePublication.Delete', 0, NULL, NULL, 'N;'),
('Modhumanresources.FilePublication.Download', 0, NULL, NULL, 'N;'),
('Modhumanresources.FilePublication.Index', 0, NULL, NULL, 'N;'),
('Modhumanresources.FilePublication.Update', 0, NULL, NULL, 'N;'),
('Modhumanresources.FilePublication.View', 0, NULL, NULL, 'N;'),
('Modhumanresources.FilePublicationDownload.*', 1, NULL, NULL, 'N;'),
('Modhumanresources.FilePublicationDownload.Download', 0, NULL, NULL, 'N;'),
('Modhumanresources.JobExperience.*', 1, NULL, NULL, 'N;'),
('Modhumanresources.JobExperience.AddNew', 0, NULL, NULL, 'N;'),
('Modhumanresources.JobExperience.Admin', 0, NULL, NULL, 'N;'),
('Modhumanresources.JobExperience.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modhumanresources.JobExperience.Create', 0, NULL, NULL, 'N;'),
('Modhumanresources.JobExperience.Delete', 0, NULL, NULL, 'N;'),
('Modhumanresources.JobExperience.Experience', 0, NULL, NULL, 'N;'),
('Modhumanresources.JobExperience.Index', 0, NULL, NULL, 'N;'),
('Modhumanresources.JobExperience.Update', 0, NULL, NULL, 'N;'),
('Modhumanresources.JobExperience.UpdateAjax', 0, NULL, NULL, 'N;'),
('Modhumanresources.JobExperience.View', 0, NULL, NULL, 'N;'),
('Modhumanresources.Kpi.*', 1, NULL, NULL, 'N;'),
('Modhumanresources.Kpi.AddNew', 0, NULL, NULL, 'N;'),
('Modhumanresources.Kpi.Admin', 0, NULL, NULL, 'N;'),
('Modhumanresources.Kpi.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modhumanresources.Kpi.Create', 0, NULL, NULL, 'N;'),
('Modhumanresources.Kpi.Delete', 0, NULL, NULL, 'N;'),
('Modhumanresources.Kpi.Index', 0, NULL, NULL, 'N;'),
('Modhumanresources.Kpi.Kpi', 0, NULL, NULL, 'N;'),
('Modhumanresources.Kpi.Update', 0, NULL, NULL, 'N;'),
('Modhumanresources.Kpi.View', 0, NULL, NULL, 'N;'),
('Modhumanresources.LevelPosition.*', 1, NULL, NULL, 'N;'),
('Modhumanresources.LevelPosition.Admin', 0, NULL, NULL, 'N;'),
('Modhumanresources.LevelPosition.Create', 0, NULL, NULL, 'N;'),
('Modhumanresources.LevelPosition.Delete', 0, NULL, NULL, 'N;'),
('Modhumanresources.LevelPosition.Index', 0, NULL, NULL, 'N;'),
('Modhumanresources.LevelPosition.Update', 0, NULL, NULL, 'N;'),
('Modhumanresources.LevelPosition.View', 0, NULL, NULL, 'N;'),
('Modhumanresources.Organization.*', 1, NULL, NULL, 'N;'),
('Modhumanresources.Organization.Admin', 0, NULL, NULL, 'N;'),
('Modhumanresources.Organization.Create', 0, NULL, NULL, 'N;'),
('Modhumanresources.Organization.Delete', 0, NULL, NULL, 'N;'),
('Modhumanresources.Organization.Index', 0, NULL, NULL, 'N;'),
('Modhumanresources.Organization.Tree', 0, NULL, NULL, 'N;'),
('Modhumanresources.Organization.Update', 0, NULL, NULL, 'N;'),
('Modhumanresources.Organization.View', 0, NULL, NULL, 'N;'),
('Modhumanresources.PositionExp.*', 1, NULL, NULL, 'N;'),
('Modhumanresources.PositionExp.Admin', 0, NULL, NULL, 'N;'),
('Modhumanresources.PositionExp.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modhumanresources.PositionExp.Create', 0, NULL, NULL, 'N;'),
('Modhumanresources.PositionExp.Delete', 0, NULL, NULL, 'N;'),
('Modhumanresources.PositionExp.Experience', 0, NULL, NULL, 'N;'),
('Modhumanresources.PositionExp.Index', 0, NULL, NULL, 'N;'),
('Modhumanresources.PositionExp.Update', 0, NULL, NULL, 'N;'),
('Modhumanresources.PositionExp.View', 0, NULL, NULL, 'N;'),
('Modhumanresources._Dependent.*', 1, NULL, NULL, 'N;'),
('Modhumanresources._Dependent.AddNew', 0, NULL, NULL, 'N;'),
('Modhumanresources._Dependent.Admin', 0, NULL, NULL, 'N;'),
('Modhumanresources._Dependent.Create', 0, NULL, NULL, 'N;'),
('Modhumanresources._Dependent.Delete', 0, NULL, NULL, 'N;'),
('Modhumanresources._Dependent.Dependent', 0, NULL, NULL, 'N;'),
('Modhumanresources._Dependent.Index', 0, NULL, NULL, 'N;'),
('Modhumanresources._Dependent.Update', 0, NULL, NULL, 'N;'),
('Modhumanresources._Dependent.UpdateAjax', 0, NULL, NULL, 'N;'),
('Modhumanresources._Dependent.View', 0, NULL, NULL, 'N;'),
('Modleave.Default.*', 1, NULL, NULL, 'N;'),
('Modleave.Default.Index', 0, NULL, NULL, 'N;'),
('Modleave.EmployeeRequest.*', 1, NULL, NULL, 'N;'),
('Modleave.EmployeeRequest.Admin', 0, NULL, NULL, 'N;'),
('Modleave.EmployeeRequest.AdminApproval', 0, NULL, NULL, 'N;'),
('Modleave.EmployeeRequest.Approval', 0, NULL, NULL, 'N;'),
('Modleave.EmployeeRequest.Create', 0, NULL, NULL, 'N;'),
('Modleave.EmployeeRequest.Delete', 0, NULL, NULL, 'N;'),
('Modleave.EmployeeRequest.Index', 0, NULL, NULL, 'N;'),
('Modleave.EmployeeRequest.ReportLeaveRequest', 0, NULL, NULL, 'N;'),
('Modleave.EmployeeRequest.Update', 0, NULL, NULL, 'N;'),
('Modleave.EmployeeRequest.View', 0, NULL, NULL, 'N;'),
('Modleave.EmployeeRequest.ViewApproval', 0, NULL, NULL, 'N;'),
('Modprojdocctrl.Default.*', 1, NULL, NULL, 'N;'),
('Modprojdocctrl.Default.Index', 0, NULL, NULL, 'N;'),
('Modprojdocctrl.Document.*', 1, NULL, NULL, 'N;'),
('Modprojdocctrl.Document.Admin', 0, NULL, NULL, 'N;'),
('Modprojdocctrl.Document.Create', 0, NULL, NULL, 'N;'),
('Modprojdocctrl.Document.Delete', 0, NULL, NULL, 'N;'),
('Modprojdocctrl.Document.Download', 0, NULL, NULL, 'N;'),
('Modprojdocctrl.Document.Index', 0, NULL, NULL, 'N;'),
('Modprojdocctrl.Document.Update', 0, NULL, NULL, 'N;'),
('Modprojdocctrl.Document.View', 0, NULL, NULL, 'N;'),
('Modproject.Document.*', 1, NULL, NULL, 'N;'),
('Modproject.Document.Admin', 0, NULL, NULL, 'N;'),
('Modproject.Document.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modproject.Document.Create', 0, NULL, NULL, 'N;'),
('Modproject.Document.Delete', 0, NULL, NULL, 'N;'),
('Modproject.Document.Download', 0, NULL, NULL, 'N;'),
('Modproject.Document.Index', 0, NULL, NULL, 'N;'),
('Modproject.Document.Update', 0, NULL, NULL, 'N;'),
('Modproject.Document.View', 0, NULL, NULL, 'N;'),
('Modproject.Finance.*', 1, NULL, NULL, 'N;'),
('Modproject.Finance.Admin', 0, NULL, NULL, 'N;'),
('Modproject.Finance.AjaxUpdate', 0, NULL, NULL, 'N;'),
('Modproject.Finance.Create', 0, NULL, NULL, 'N;'),
('Modproject.Finance.Delete', 0, NULL, NULL, 'N;'),
('Modproject.Finance.Index', 0, NULL, NULL, 'N;'),
('Modproject.Finance.Update', 0, NULL, NULL, 'N;'),
('Modproject.Finance.View', 0, NULL, NULL, 'N;'),
('Modproject.Personel.*', 1, NULL, NULL, 'N;'),
('Modproject.Personel.Admin', 0, NULL, NULL, 'N;'),
('Modproject.Personel.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modproject.Personel.Create', 0, NULL, NULL, 'N;'),
('Modproject.Personel.Delete', 0, NULL, NULL, 'N;'),
('Modproject.Personel.Index', 0, NULL, NULL, 'N;'),
('Modproject.Personel.Update', 0, NULL, NULL, 'N;'),
('Modproject.Personel.View', 0, NULL, NULL, 'N;'),
('Modproject.PersonelMandays.*', 1, NULL, NULL, 'N;'),
('Modproject.PersonelMandays.Admin', 0, NULL, NULL, 'N;'),
('Modproject.PersonelMandays.AjaxUpdate', 0, NULL, NULL, 'N;'),
('Modproject.PersonelMandays.Create', 0, NULL, NULL, 'N;'),
('Modproject.PersonelMandays.Delete', 0, NULL, NULL, 'N;'),
('Modproject.PersonelMandays.Detail', 0, NULL, NULL, 'N;'),
('Modproject.PersonelMandays.Index', 0, NULL, NULL, 'N;'),
('Modproject.PersonelMandays.Update', 0, NULL, NULL, 'N;'),
('Modproject.PersonelMandays.View', 0, NULL, NULL, 'N;'),
('Modproject.Procurement.*', 1, NULL, NULL, 'N;'),
('Modproject.Procurement.Admin', 0, NULL, NULL, 'N;'),
('Modproject.Procurement.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modproject.Procurement.Create', 0, NULL, NULL, 'N;'),
('Modproject.Procurement.Delete', 0, NULL, NULL, 'N;'),
('Modproject.Procurement.Index', 0, NULL, NULL, 'N;'),
('Modproject.Procurement.Update', 0, NULL, NULL, 'N;'),
('Modproject.Procurement.View', 0, NULL, NULL, 'N;'),
('Modproject.Progress.*', 1, NULL, NULL, 'N;'),
('Modproject.Progress.Admin', 0, NULL, NULL, 'N;'),
('Modproject.Progress.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modproject.Progress.Create', 0, NULL, NULL, 'N;'),
('Modproject.Progress.Delete', 0, NULL, NULL, 'N;'),
('Modproject.Progress.Index', 0, NULL, NULL, 'N;'),
('Modproject.Progress.Update', 0, NULL, NULL, 'N;'),
('Modproject.Progress.View', 0, NULL, NULL, 'N;'),
('Modproject.Project.*', 1, NULL, NULL, 'N;'),
('Modproject.Project.Admin', 0, NULL, NULL, 'N;'),
('Modproject.Project.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modproject.Project.Create', 0, NULL, NULL, 'N;'),
('Modproject.Project.Delete', 0, NULL, NULL, 'N;'),
('Modproject.Project.Excel', 0, NULL, NULL, 'N;'),
('Modproject.Project.Index', 0, NULL, NULL, 'N;'),
('Modproject.Project.Report', 0, NULL, NULL, 'N;'),
('Modproject.Project.Test', 0, NULL, NULL, 'N;'),
('Modproject.Project.Update', 0, NULL, NULL, 'N;'),
('Modproject.Project.View', 0, NULL, NULL, 'N;'),
('Modproject.Task.*', 1, NULL, NULL, 'N;'),
('Modproject.Task.Admin', 0, NULL, NULL, 'N;'),
('Modproject.Task.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modproject.Task.Create', 0, NULL, NULL, 'N;'),
('Modproject.Task.Delete', 0, NULL, NULL, 'N;'),
('Modproject.Task.Index', 0, NULL, NULL, 'N;'),
('Modproject.Task.Update', 0, NULL, NULL, 'N;'),
('Modproject.Task.View', 0, NULL, NULL, 'N;'),
('Modproject._User.*', 1, NULL, NULL, 'N;'),
('Modproject._User.Admin', 0, NULL, NULL, 'N;'),
('Modproject._User.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modproject._User.Create', 0, NULL, NULL, 'N;'),
('Modproject._User.Delete', 0, NULL, NULL, 'N;'),
('Modproject._User.Index', 0, NULL, NULL, 'N;'),
('Modproject._User.Update', 0, NULL, NULL, 'N;'),
('Modproject._User.View', 0, NULL, NULL, 'N;'),
('Modrecruitments.Certification.*', 1, NULL, NULL, 'N;'),
('Modrecruitments.Certification.UpdateAjax', 0, NULL, NULL, 'N;'),
('Modrecruitments.Certification.View', 0, NULL, NULL, 'N;'),
('Modrecruitments.Default.*', 1, NULL, NULL, 'N;'),
('Modrecruitments.Default.Index', 0, NULL, NULL, 'N;'),
('Modrecruitments.Department.*', 1, NULL, NULL, 'N;'),
('Modrecruitments.Department.Admin', 0, NULL, NULL, 'N;'),
('Modrecruitments.Department.Create', 0, NULL, NULL, 'N;'),
('Modrecruitments.Department.Delete', 0, NULL, NULL, 'N;'),
('Modrecruitments.Department.Index', 0, NULL, NULL, 'N;'),
('Modrecruitments.Department.Update', 0, NULL, NULL, 'N;'),
('Modrecruitments.Department.View', 0, NULL, NULL, 'N;'),
('Modrecruitments.Dependent.*', 1, NULL, NULL, 'N;'),
('Modrecruitments.Dependent.AddNew', 0, NULL, NULL, 'N;'),
('Modrecruitments.Dependent.Admin', 0, NULL, NULL, 'N;'),
('Modrecruitments.Dependent.Create', 0, NULL, NULL, 'N;'),
('Modrecruitments.Dependent.Delete', 0, NULL, NULL, 'N;'),
('Modrecruitments.Dependent.Dependent', 0, NULL, NULL, 'N;'),
('Modrecruitments.Dependent.Index', 0, NULL, NULL, 'N;'),
('Modrecruitments.Dependent.Update', 0, NULL, NULL, 'N;'),
('Modrecruitments.Dependent.UpdateAjax', 0, NULL, NULL, 'N;'),
('Modrecruitments.Dependent.View', 0, NULL, NULL, 'N;'),
('Modrecruitments.Education.*', 1, NULL, NULL, 'N;'),
('Modrecruitments.Education.AddNew', 0, NULL, NULL, 'N;'),
('Modrecruitments.Education.Admin', 0, NULL, NULL, 'N;'),
('Modrecruitments.Education.Create', 0, NULL, NULL, 'N;'),
('Modrecruitments.Education.Delete', 0, NULL, NULL, 'N;'),
('Modrecruitments.Education.Education', 0, NULL, NULL, 'N;'),
('Modrecruitments.Education.Index', 0, NULL, NULL, 'N;'),
('Modrecruitments.Education.Update', 0, NULL, NULL, 'N;'),
('Modrecruitments.Education.UpdateAjax', 0, NULL, NULL, 'N;'),
('Modrecruitments.Education.View', 0, NULL, NULL, 'N;'),
('Modrecruitments.EmergencyRecord.*', 1, NULL, NULL, 'N;'),
('Modrecruitments.EmergencyRecord.AddNew', 0, NULL, NULL, 'N;'),
('Modrecruitments.EmergencyRecord.Admin', 0, NULL, NULL, 'N;'),
('Modrecruitments.EmergencyRecord.Create', 0, NULL, NULL, 'N;'),
('Modrecruitments.EmergencyRecord.Delete', 0, NULL, NULL, 'N;'),
('Modrecruitments.EmergencyRecord.Emergency', 0, NULL, NULL, 'N;'),
('Modrecruitments.EmergencyRecord.Index', 0, NULL, NULL, 'N;'),
('Modrecruitments.EmergencyRecord.Update', 0, NULL, NULL, 'N;'),
('Modrecruitments.EmergencyRecord.UpdateAjax', 0, NULL, NULL, 'N;'),
('Modrecruitments.EmergencyRecord.View', 0, NULL, NULL, 'N;'),
('Modrecruitments.Employee.*', 1, NULL, NULL, 'N;'),
('Modrecruitments.Employee.Admin', 0, NULL, NULL, 'N;'),
('Modrecruitments.Employee.AdminByDepartment', 0, NULL, NULL, 'N;'),
('Modrecruitments.Employee.AdminByposition', 0, NULL, NULL, 'N;'),
('Modrecruitments.Employee.AdminExel', 0, NULL, NULL, 'N;'),
('Modrecruitments.Employee.Create', 0, NULL, NULL, 'N;'),
('Modrecruitments.Employee.Delete', 0, NULL, NULL, 'N;'),
('Modrecruitments.Employee.Index', 0, NULL, NULL, 'N;'),
('Modrecruitments.Employee.Update', 0, NULL, NULL, 'N;'),
('Modrecruitments.Employee.View', 0, NULL, NULL, 'N;'),
('Modrecruitments.JobExperience.*', 1, NULL, NULL, 'N;'),
('Modrecruitments.JobExperience.AddNew', 0, NULL, NULL, 'N;'),
('Modrecruitments.JobExperience.Admin', 0, NULL, NULL, 'N;'),
('Modrecruitments.JobExperience.Create', 0, NULL, NULL, 'N;'),
('Modrecruitments.JobExperience.Delete', 0, NULL, NULL, 'N;'),
('Modrecruitments.JobExperience.Experience', 0, NULL, NULL, 'N;'),
('Modrecruitments.JobExperience.Index', 0, NULL, NULL, 'N;'),
('Modrecruitments.JobExperience.Update', 0, NULL, NULL, 'N;'),
('Modrecruitments.JobExperience.UpdateAjax', 0, NULL, NULL, 'N;'),
('Modrecruitments.JobExperience.View', 0, NULL, NULL, 'N;'),
('Modrecruitments.PositionOffered.*', 1, NULL, NULL, 'N;'),
('Modrecruitments.PositionOffered.Admin', 0, NULL, NULL, 'N;'),
('Modrecruitments.PositionOffered.Create', 0, NULL, NULL, 'N;'),
('Modrecruitments.PositionOffered.Delete', 0, NULL, NULL, 'N;'),
('Modrecruitments.PositionOffered.Index', 0, NULL, NULL, 'N;'),
('Modrecruitments.PositionOffered.Update', 0, NULL, NULL, 'N;'),
('Modrecruitments.PositionOffered.View', 0, NULL, NULL, 'N;'),
('Modservices.DataRequest.*', 1, NULL, NULL, 'N;'),
('Modservices.DataRequest.Admin', 0, NULL, NULL, 'N;'),
('Modservices.DataRequest.Create', 0, NULL, NULL, 'N;'),
('Modservices.DataRequest.Delete', 0, NULL, NULL, 'N;'),
('Modservices.DataRequest.Index', 0, NULL, NULL, 'N;'),
('Modservices.DataRequest.Update', 0, NULL, NULL, 'N;'),
('Modservices.DataRequest.View', 0, NULL, NULL, 'N;'),
('Modservices.Default.*', 1, NULL, NULL, 'N;'),
('Modservices.Default.Index', 0, NULL, NULL, 'N;'),
('Modservices.ServiceType.*', 1, NULL, NULL, 'N;'),
('Modservices.ServiceType.Admin', 0, NULL, NULL, 'N;'),
('Modservices.ServiceType.Create', 0, NULL, NULL, 'N;'),
('Modservices.ServiceType.Delete', 0, NULL, NULL, 'N;'),
('Modservices.ServiceType.Index', 0, NULL, NULL, 'N;'),
('Modservices.ServiceType.Update', 0, NULL, NULL, 'N;'),
('Modservices.ServiceType.View', 0, NULL, NULL, 'N;'),
('Modsppd.Approval.*', 1, NULL, NULL, 'N;'),
('Modsppd.Approval.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.Approval.ApproveGeneralManager', 0, NULL, NULL, 'N;'),
('Modsppd.Approval.ApproveKeuangan', 0, NULL, NULL, 'N;'),
('Modsppd.Approval.ApproveManager', 0, NULL, NULL, 'N;'),
('Modsppd.Approval.Close', 0, NULL, NULL, 'N;'),
('Modsppd.Approval.Create', 0, NULL, NULL, 'N;'),
('Modsppd.Approval.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.Approval.FinishCreate', 0, NULL, NULL, 'N;'),
('Modsppd.Approval.FinishVerifikasi', 0, NULL, NULL, 'N;'),
('Modsppd.Approval.Index', 0, NULL, NULL, 'N;'),
('Modsppd.Approval.PertanggungJawaban', 0, NULL, NULL, 'N;'),
('Modsppd.Approval.Update', 0, NULL, NULL, 'N;'),
('Modsppd.Approval.View', 0, NULL, NULL, 'N;'),
('Modsppd.BiayaSppd.*', 1, NULL, NULL, 'N;'),
('Modsppd.BiayaSppd.AddNew', 0, NULL, NULL, 'N;'),
('Modsppd.BiayaSppd.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.BiayaSppd.Biaya', 0, NULL, NULL, 'N;'),
('Modsppd.BiayaSppd.BiayaPdf', 0, NULL, NULL, 'N;'),
('Modsppd.BiayaSppd.Create', 0, NULL, NULL, 'N;'),
('Modsppd.BiayaSppd.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.BiayaSppd.Index', 0, NULL, NULL, 'N;'),
('Modsppd.BiayaSppd.Update', 0, NULL, NULL, 'N;'),
('Modsppd.BiayaSppd.UpdateAjax', 0, NULL, NULL, 'N;'),
('Modsppd.BiayaSppd.View', 0, NULL, NULL, 'N;'),
('Modsppd.Default.*', 1, NULL, NULL, 'N;'),
('Modsppd.Default.Index', 0, NULL, NULL, 'N;'),
('Modsppd.Form.*', 1, NULL, NULL, 'N;'),
('Modsppd.Form.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.Form.Create', 0, NULL, NULL, 'N;'),
('Modsppd.Form.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.Form.Index', 0, NULL, NULL, 'N;'),
('Modsppd.Form.Update', 0, NULL, NULL, 'N;'),
('Modsppd.Form.View', 0, NULL, NULL, 'N;'),
('Modsppd.FormSppd.*', 1, NULL, NULL, 'N;'),
('Modsppd.FormSppd.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.FormSppd.AdminApproveGeneralManager', 0, NULL, NULL, 'N;'),
('Modsppd.FormSppd.AdminApproveKeuangan', 0, NULL, NULL, 'N;'),
('Modsppd.FormSppd.AdminApproveManager', 0, NULL, NULL, 'N;'),
('Modsppd.FormSppd.AdminClose', 0, NULL, NULL, 'N;'),
('Modsppd.FormSppd.AdminPengecekan', 0, NULL, NULL, 'N;'),
('Modsppd.FormSppd.AdminPertanggungjawaban', 0, NULL, NULL, 'N;'),
('Modsppd.FormSppd.Create', 0, NULL, NULL, 'N;'),
('Modsppd.FormSppd.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.FormSppd.Index', 0, NULL, NULL, 'N;'),
('Modsppd.FormSppd.Update', 0, NULL, NULL, 'N;'),
('Modsppd.FormSppd.View', 0, NULL, NULL, 'N;'),
('Modsppd.FormSppd.ViewPdf', 0, NULL, NULL, 'N;'),
('Modsppd.KotaTujuan.*', 1, NULL, NULL, 'N;'),
('Modsppd.KotaTujuan.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.KotaTujuan.Create', 0, NULL, NULL, 'N;'),
('Modsppd.KotaTujuan.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.KotaTujuan.Index', 0, NULL, NULL, 'N;'),
('Modsppd.KotaTujuan.Update', 0, NULL, NULL, 'N;'),
('Modsppd.KotaTujuan.View', 0, NULL, NULL, 'N;'),
('Modsppd.LaporanRekap.*', 1, NULL, NULL, 'N;'),
('Modsppd.LaporanRekap.AddNew', 0, NULL, NULL, 'N;'),
('Modsppd.LaporanRekap.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.LaporanRekap.Create', 0, NULL, NULL, 'N;'),
('Modsppd.LaporanRekap.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.LaporanRekap.Index', 0, NULL, NULL, 'N;'),
('Modsppd.LaporanRekap.Rekap', 0, NULL, NULL, 'N;'),
('Modsppd.LaporanRekap.RekapPdf', 0, NULL, NULL, 'N;'),
('Modsppd.LaporanRekap.Update', 0, NULL, NULL, 'N;'),
('Modsppd.LaporanRekap.UpdateAjax', 0, NULL, NULL, 'N;'),
('Modsppd.LaporanRekap.View', 0, NULL, NULL, 'N;'),
('Modsppd.LetterCost.*', 1, NULL, NULL, 'N;'),
('Modsppd.LetterCost.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.LetterCost.Create', 0, NULL, NULL, 'N;'),
('Modsppd.LetterCost.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.LetterCost.Index', 0, NULL, NULL, 'N;'),
('Modsppd.LetterCost.Update', 0, NULL, NULL, 'N;'),
('Modsppd.LetterCost.View', 0, NULL, NULL, 'N;'),
('Modsppd.MailViaYahoo.*', 1, NULL, NULL, 'N;'),
('Modsppd.MailViaYahoo.Mail', 0, NULL, NULL, 'N;'),
('Modsppd.MasterCost.*', 1, NULL, NULL, 'N;'),
('Modsppd.MasterCost.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.MasterCost.Create', 0, NULL, NULL, 'N;'),
('Modsppd.MasterCost.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.MasterCost.Index', 0, NULL, NULL, 'N;'),
('Modsppd.MasterCost.Update', 0, NULL, NULL, 'N;'),
('Modsppd.MasterCost.View', 0, NULL, NULL, 'N;'),
('Modsppd.MasterDestination.*', 1, NULL, NULL, 'N;'),
('Modsppd.MasterDestination.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.MasterDestination.Create', 0, NULL, NULL, 'N;'),
('Modsppd.MasterDestination.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.MasterDestination.Index', 0, NULL, NULL, 'N;'),
('Modsppd.MasterDestination.Update', 0, NULL, NULL, 'N;'),
('Modsppd.MasterDestination.View', 0, NULL, NULL, 'N;'),
('Modsppd.OtherReimburse.*', 1, NULL, NULL, 'N;'),
('Modsppd.OtherReimburse.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.OtherReimburse.Create', 0, NULL, NULL, 'N;'),
('Modsppd.OtherReimburse.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.OtherReimburse.Index', 0, NULL, NULL, 'N;'),
('Modsppd.OtherReimburse.Update', 0, NULL, NULL, 'N;'),
('Modsppd.OtherReimburse.View', 0, NULL, NULL, 'N;'),
('Modsppd.Period.*', 1, NULL, NULL, 'N;'),
('Modsppd.Period.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.Period.Create', 0, NULL, NULL, 'N;'),
('Modsppd.Period.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.Period.Index', 0, NULL, NULL, 'N;'),
('Modsppd.Period.Update', 0, NULL, NULL, 'N;'),
('Modsppd.Period.View', 0, NULL, NULL, 'N;'),
('Modsppd.Persekot.*', 1, NULL, NULL, 'N;'),
('Modsppd.Persekot.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.Persekot.Ajaxupdate', 0, NULL, NULL, 'N;'),
('Modsppd.Persekot.Create', 0, NULL, NULL, 'N;'),
('Modsppd.Persekot.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.Persekot.Index', 0, NULL, NULL, 'N;'),
('Modsppd.Persekot.Update', 0, NULL, NULL, 'N;'),
('Modsppd.Persekot.View', 0, NULL, NULL, 'N;'),
('Modsppd.PersekotDetail.*', 1, NULL, NULL, 'N;'),
('Modsppd.PersekotDetail.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.PersekotDetail.Create', 0, NULL, NULL, 'N;'),
('Modsppd.PersekotDetail.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.PersekotDetail.Index', 0, NULL, NULL, 'N;'),
('Modsppd.PersekotDetail.Update', 0, NULL, NULL, 'N;'),
('Modsppd.PersekotDetail.View', 0, NULL, NULL, 'N;'),
('Modsppd.Personnel.*', 1, NULL, NULL, 'N;'),
('Modsppd.Personnel.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.Personnel.Create', 0, NULL, NULL, 'N;'),
('Modsppd.Personnel.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.Personnel.Index', 0, NULL, NULL, 'N;'),
('Modsppd.Personnel.Update', 0, NULL, NULL, 'N;'),
('Modsppd.Personnel.View', 0, NULL, NULL, 'N;'),
('Modsppd.RABDinas.*', 1, NULL, NULL, 'N;'),
('Modsppd.RABDinas.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.RABDinas.Create', 0, NULL, NULL, 'N;'),
('Modsppd.RABDinas.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.RABDinas.Index', 0, NULL, NULL, 'N;'),
('Modsppd.RABDinas.Update', 0, NULL, NULL, 'N;'),
('Modsppd.RABDinas.View', 0, NULL, NULL, 'N;'),
('Modsppd.RABNonDinas.*', 1, NULL, NULL, 'N;'),
('Modsppd.RABNonDinas.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.RABNonDinas.Create', 0, NULL, NULL, 'N;'),
('Modsppd.RABNonDinas.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.RABNonDinas.Index', 0, NULL, NULL, 'N;'),
('Modsppd.RABNonDinas.Update', 0, NULL, NULL, 'N;'),
('Modsppd.RABNonDinas.View', 0, NULL, NULL, 'N;'),
('Modsppd.ReimburseBBM.*', 1, NULL, NULL, 'N;'),
('Modsppd.ReimburseBBM.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.ReimburseBBM.Create', 0, NULL, NULL, 'N;'),
('Modsppd.ReimburseBBM.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.ReimburseBBM.Index', 0, NULL, NULL, 'N;'),
('Modsppd.ReimburseBBM.Update', 0, NULL, NULL, 'N;'),
('Modsppd.ReimburseBBM.View', 0, NULL, NULL, 'N;'),
('Modsppd.ReimburseJamuan.*', 1, NULL, NULL, 'N;'),
('Modsppd.ReimburseJamuan.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.ReimburseJamuan.Create', 0, NULL, NULL, 'N;'),
('Modsppd.ReimburseJamuan.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.ReimburseJamuan.Index', 0, NULL, NULL, 'N;'),
('Modsppd.ReimburseJamuan.Update', 0, NULL, NULL, 'N;'),
('Modsppd.ReimburseJamuan.View', 0, NULL, NULL, 'N;'),
('Modsppd.ReportsSppd.*', 1, NULL, NULL, 'N;'),
('Modsppd.ReportsSppd.RekapSppd', 0, NULL, NULL, 'N;'),
('Modsppd.SetupBiaya.*', 1, NULL, NULL, 'N;'),
('Modsppd.SetupBiaya.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.SetupBiaya.Create', 0, NULL, NULL, 'N;'),
('Modsppd.SetupBiaya.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.SetupBiaya.Index', 0, NULL, NULL, 'N;'),
('Modsppd.SetupBiaya.Update', 0, NULL, NULL, 'N;'),
('Modsppd.SetupBiaya.View', 0, NULL, NULL, 'N;'),
('Modsppd.UnitKerja.*', 1, NULL, NULL, 'N;'),
('Modsppd.UnitKerja.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.UnitKerja.Create', 0, NULL, NULL, 'N;'),
('Modsppd.UnitKerja.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.UnitKerja.Index', 0, NULL, NULL, 'N;'),
('Modsppd.UnitKerja.Update', 0, NULL, NULL, 'N;'),
('Modsppd.UnitKerja.View', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherBiaya.*', 1, NULL, NULL, 'N;'),
('Modsppd.VoucherBiaya.AddNew', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherBiaya.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherBiaya.Create', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherBiaya.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherBiaya.Index', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherBiaya.Update', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherBiaya.UpdateAjax', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherBiaya.View', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherBiaya.Voucher', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherBiaya.VoucherPdf', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherInfo.*', 1, NULL, NULL, 'N;'),
('Modsppd.VoucherInfo.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherInfo.Create', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherInfo.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherInfo.Index', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherInfo.InfoVoucherBiaya', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherInfo.InfoVoucherPersekot', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherInfo.InfoVoucherSetPersekot', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherInfo.Update', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherInfo.View', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherPersekot.*', 1, NULL, NULL, 'N;'),
('Modsppd.VoucherPersekot.AddNew', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherPersekot.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherPersekot.Create', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherPersekot.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherPersekot.Index', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherPersekot.Update', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherPersekot.UpdateAjax', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherPersekot.View', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherPersekot.Voucher', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherPersekot.VoucherPdf', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherSetPersekot.*', 1, NULL, NULL, 'N;'),
('Modsppd.VoucherSetPersekot.AddNew', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherSetPersekot.Admin', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherSetPersekot.Create', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherSetPersekot.Delete', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherSetPersekot.Index', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherSetPersekot.Update', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherSetPersekot.UpdateAjax', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherSetPersekot.View', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherSetPersekot.Voucher', 0, NULL, NULL, 'N;'),
('Modsppd.VoucherSetPersekot.VoucherPdf', 0, NULL, NULL, 'N;'),
('Period.*', 1, NULL, NULL, 'N;'),
('Period.Admin', 0, NULL, NULL, 'N;'),
('Period.Create', 0, NULL, NULL, 'N;'),
('Period.Delete', 0, NULL, NULL, 'N;'),
('Period.Index', 0, NULL, NULL, 'N;'),
('Period.Update', 0, NULL, NULL, 'N;'),
('Period.View', 0, NULL, NULL, 'N;'),
('Rights.authItem.Admin', 0, 'rights admin', NULL, 'N;'),
('Site.*', 1, NULL, NULL, 'N;'),
('Site.Contact', 0, NULL, NULL, 'N;'),
('Site.Error', 0, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('Site.Kirimemail', 0, NULL, NULL, 'N;'),
('Site.Login', 0, NULL, NULL, 'N;'),
('Site.Logout', 0, NULL, NULL, 'N;'),
('Site.Mail', 0, NULL, NULL, 'N;'),
('Site.MovePersons', 0, NULL, NULL, 'N;'),
('Site.Upload', 0, NULL, NULL, 'N;'),
('Super->Project->Finance', 2, 'Super->Project->Finance', NULL, 'N;'),
('Super->Project->PIC', 2, 'Super->Project->PIC', NULL, 'N;'),
('Super->Project->Procurement', 2, 'Super->Project->Procurement', NULL, 'N;'),
('Super->Super->Project', 2, 'Super->Super->Project', NULL, 'N;'),
('Super->Super->Sppd', 2, 'Super->Super->Sppd', NULL, 'N;'),
('Testing.*', 1, NULL, NULL, 'N;'),
('Testing.Admin', 0, NULL, NULL, 'N;'),
('Testing.Create', 0, NULL, NULL, 'N;'),
('Testing.Delete', 0, NULL, NULL, 'N;'),
('Testing.Index', 0, NULL, NULL, 'N;'),
('Testing.Update', 0, NULL, NULL, 'N;'),
('Testing.View', 0, NULL, NULL, 'N;'),
('User.*', 1, NULL, NULL, 'N;'),
('User.Admin', 0, NULL, NULL, 'N;'),
('User.Create', 0, NULL, NULL, 'N;'),
('User.Delete', 0, NULL, NULL, 'N;'),
('User.Index', 0, NULL, NULL, 'N;'),
('User.Update', 0, NULL, NULL, 'N;'),
('User.View', 0, NULL, NULL, 'N;'),
('_HaveFun.*', 1, NULL, NULL, 'N;'),
('_HaveFun.Admin', 0, NULL, NULL, 'N;'),
('_HaveFun.Create', 0, NULL, NULL, 'N;'),
('_HaveFun.Delete', 0, NULL, NULL, 'N;'),
('_HaveFun.Index', 0, NULL, NULL, 'N;'),
('_HaveFun.Language', 0, NULL, NULL, 'N;'),
('_HaveFun.Update', 0, NULL, NULL, 'N;'),
('_HaveFun.View', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `rbac_authitemchild`
--

CREATE TABLE IF NOT EXISTS `rbac_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rbac_authitemchild`
--

INSERT INTO `rbac_authitemchild` (`parent`, `child`) VALUES
('Editor', 'Authenticated'),
('CommentAdministration', 'Comment.*'),
('Editor', 'CommentAdministration'),
('Authenticated', 'CommentUpdateOwn'),
('SuperSuperHR', 'Employee.Admin'),
('Authenticated', 'Guest'),
('Admin->User', 'Importcsv.Default.*'),
('Admin->User', 'Importcsv.Default.Index'),
('Admin->User', 'Importcsv.Default.Upload'),
('Admin->User', 'Modadmin.Default.Index'),
('Esms-user', 'Modadmin.TestTable.Admin'),
('Esms-user', 'Modadmin.TestTable.Create'),
('Esms-user', 'Modadmin.TestTable.Delete'),
('Esms-user', 'Modadmin.TestTable.Index'),
('Esms-user', 'Modadmin.TestTable.Update'),
('Esms-user', 'Modadmin.TestTable.View'),
('Admin->User', 'Modadmin.User.Ajaxupdate'),
('Super->Super->HR', 'Modadmin.User.Ajaxupdate'),
('Admin->User', 'Modadmin.User.Aktif'),
('Admin->User', 'Modadmin.User.Create'),
('Admin->User', 'Modadmin.User.Delete'),
('Admin->User', 'Modadmin.User.Index'),
('Admin->User', 'Modadmin.User.Update'),
('Admin->User', 'Modadmin.User.View'),
('Super->Super->Esms', 'Modesms.DisposisiTree.Admin'),
('Super->Super->Esms', 'Modesms.DisposisiTree.AdminTree'),
('Super->Super->Esms', 'Modesms.DisposisiTree.Create'),
('Super->Super->Esms', 'Modesms.DisposisiTree.Delete'),
('Super->Super->Esms', 'Modesms.DisposisiTree.Index'),
('Super->Super->Esms', 'Modesms.DisposisiTree.Update'),
('Super->Super->Esms', 'Modesms.DisposisiTree.View'),
('Super->Super->Esms', 'Modesms.InsideLetter.Admin'),
('Super->Super->Esms', 'Modesms.InsideLetter.Ajaxupdate'),
('Super->Super->Esms', 'Modesms.InsideLetter.BatchDelete'),
('Super->Super->Esms', 'Modesms.InsideLetter.Create'),
('Super->Super->Esms', 'Modesms.InsideLetter.Delete'),
('Super->Super->Esms', 'Modesms.InsideLetter.Index'),
('Super->Super->Esms', 'Modesms.InsideLetter.Update'),
('Super->Super->Esms', 'Modesms.InsideLetter.View'),
('Super->Super->Esms', 'Modesms.InsideLetter.ViewPdf'),
('Esms-user', 'Modesms.OutsideDisposisi.Admin'),
('Super->Super->Esms', 'Modesms.OutsideDisposisi.Admin'),
('Esms-user', 'Modesms.OutsideDisposisi.Create'),
('Super->Super->Esms', 'Modesms.OutsideDisposisi.Create'),
('Esms-user', 'Modesms.OutsideDisposisi.Delete'),
('Super->Super->Esms', 'Modesms.OutsideDisposisi.Delete'),
('Esms-user', 'Modesms.OutsideDisposisi.Disposisi'),
('Super->Super->Esms', 'Modesms.OutsideDisposisi.Disposisi'),
('Esms-user', 'Modesms.OutsideDisposisi.Index'),
('Super->Super->Esms', 'Modesms.OutsideDisposisi.Index'),
('Super->Super->Esms', 'Modesms.OutsideDisposisi.Tree'),
('Esms-user', 'Modesms.OutsideDisposisi.Update'),
('Super->Super->Esms', 'Modesms.OutsideDisposisi.Update'),
('Esms-user', 'Modesms.OutsideDisposisi.View'),
('Super->Super->Esms', 'Modesms.OutsideDisposisi.View'),
('Super->Super->Esms', 'Modesms.OutsideLetter.*'),
('Super->Super->Esms', 'Modesms.OutsideLetter.Admin'),
('Super->Super->Esms', 'Modesms.OutsideLetter.Create'),
('Super->Super->Esms', 'Modesms.OutsideLetter.Delete'),
('Super->Super->Esms', 'Modesms.OutsideLetter.Index'),
('Super->Super->Esms', 'Modesms.OutsideLetter.Update'),
('Super->Super->Esms', 'Modesms.OutsideLetter.View'),
('Super->Super->Finance', 'Modfinance.Elbicode.*'),
('Super->Super->Finance', 'Modfinance.Elbicode.Admin'),
('Super->Super->Finance', 'Modfinance.Elbicode.Create'),
('Super->Super->Finance', 'Modfinance.Elbicode.Delete'),
('Super->Super->Finance', 'Modfinance.Elbicode.Index'),
('Super->Super->Finance', 'Modfinance.Elbicode.Update'),
('Super->Super->Finance', 'Modfinance.Elbicode.View'),
('Super->Super->Finance', 'Modfinance.Kas.*'),
('Super->Super->Finance', 'Modfinance.Kas.Admin'),
('Super->Super->Finance', 'Modfinance.Kas.Ajaxupdate'),
('Super->Super->Finance', 'Modfinance.Kas.Create'),
('Super->Super->Finance', 'Modfinance.Kas.Delete'),
('Super->Super->Finance', 'Modfinance.Kas.Index'),
('Super->Super->Finance', 'Modfinance.Kas.Update'),
('Super->Super->Finance', 'Modfinance.Kas.View'),
('Super->Super->Finance', 'Modfinance.KasDc.*'),
('finance->wilayah', 'Modfinance.KasDc.Admin'),
('Super->Super->Finance', 'Modfinance.KasDc.Admin'),
('finance->wilayah', 'Modfinance.KasDc.Ajaxupdate'),
('Super->Super->Finance', 'Modfinance.KasDc.Ajaxupdate'),
('finance->wilayah', 'Modfinance.KasDc.BatchDelete'),
('finance->wilayah', 'Modfinance.KasDc.Create'),
('Super->Super->Finance', 'Modfinance.KasDc.Create'),
('finance->wilayah', 'Modfinance.KasDc.Delete'),
('Super->Super->Finance', 'Modfinance.KasDc.Delete'),
('finance->wilayah', 'Modfinance.KasDc.Index'),
('Super->Super->Finance', 'Modfinance.KasDc.Index'),
('finance->wilayah', 'Modfinance.KasDc.LaporanKas'),
('finance->wilayah', 'Modfinance.KasDc.LaporanKasPdf'),
('finance->wilayah', 'Modfinance.KasDc.Update'),
('Super->Super->Finance', 'Modfinance.KasDc.Update'),
('finance->wilayah', 'Modfinance.KasDc.View'),
('Super->Super->Finance', 'Modfinance.KasDc.View'),
('Super->Super->Finance', 'Modfinance.KasExpense.*'),
('finance->wilayah', 'Modfinance.KasExpense.Admin'),
('Super->Super->Finance', 'Modfinance.KasExpense.Admin'),
('finance->wilayah', 'Modfinance.KasExpense.Ajaxupdate'),
('finance->wilayah', 'Modfinance.KasExpense.BatchDelete'),
('finance->wilayah', 'Modfinance.KasExpense.BatchSubmit'),
('finance->wilayah', 'Modfinance.KasExpense.Create'),
('Super->Super->Finance', 'Modfinance.KasExpense.Create'),
('finance->wilayah', 'Modfinance.KasExpense.Delete'),
('Super->Super->Finance', 'Modfinance.KasExpense.Delete'),
('finance->wilayah', 'Modfinance.KasExpense.Index'),
('Super->Super->Finance', 'Modfinance.KasExpense.Index'),
('finance->wilayah', 'Modfinance.KasExpense.Update'),
('Super->Super->Finance', 'Modfinance.KasExpense.Update'),
('finance->wilayah', 'Modfinance.KasExpense.View'),
('Super->Super->Finance', 'Modfinance.KasExpense.View'),
('hr->profile', 'Modfinance.KasSaldo.*'),
('finance->wilayah', 'Modfinance.KasSaldo.Admin'),
('hr->profile', 'Modfinance.KasSaldo.Admin'),
('Super->Super->Finance', 'Modfinance.KasSaldo.Admin'),
('finance->wilayah', 'Modfinance.KasSaldo.Create'),
('hr->profile', 'Modfinance.KasSaldo.Create'),
('Super->Super->Finance', 'Modfinance.KasSaldo.Create'),
('finance->wilayah', 'Modfinance.KasSaldo.Delete'),
('hr->profile', 'Modfinance.KasSaldo.Delete'),
('Super->Super->Finance', 'Modfinance.KasSaldo.Delete'),
('finance->wilayah', 'Modfinance.KasSaldo.Index'),
('hr->profile', 'Modfinance.KasSaldo.Index'),
('Super->Super->Finance', 'Modfinance.KasSaldo.Index'),
('finance->wilayah', 'Modfinance.KasSaldo.Update'),
('Super->Super->Finance', 'Modfinance.KasSaldo.Update'),
('finance->wilayah', 'Modfinance.KasSaldo.View'),
('hr->profile', 'Modfinance.KasSaldo.View'),
('Super->Super->Finance', 'Modfinance.KasSaldo.View'),
('Super->Super->Finance', 'Modfinance.Period.*'),
('super->super->finance', 'Modfinance.Period.Admin'),
('super->super->finance', 'Modfinance.Period.Create'),
('super->super->finance', 'Modfinance.Period.Delete'),
('super->super->finance', 'Modfinance.Period.Index'),
('super->super->finance', 'Modfinance.Period.Update'),
('super->super->finance', 'Modfinance.Period.View'),
('Super->Super->Finance', 'Modfinance.Rekening.*'),
('Super->Super->Finance', 'Modfinance.Rekening.Admin'),
('Super->Super->Finance', 'Modfinance.Rekening.Create'),
('Super->Super->Finance', 'Modfinance.Rekening.Delete'),
('Super->Super->Finance', 'Modfinance.Rekening.Index'),
('Super->Super->Finance', 'Modfinance.Rekening.Update'),
('Super->Super->Finance', 'Modfinance.Rekening.View'),
('finance->wilayah', 'Modfinance.RekeningBankDc.Admin'),
('finance->wilayah', 'Modfinance.RekeningBankDc.Ajaxupdate'),
('finance->wilayah', 'Modfinance.RekeningBankDc.Create'),
('finance->wilayah', 'Modfinance.RekeningBankDc.Delete'),
('finance->wilayah', 'Modfinance.RekeningBankDc.Index'),
('finance->wilayah', 'Modfinance.RekeningBankDc.Update'),
('finance->wilayah', 'Modfinance.RekeningBankDc.View'),
('Super->Super->Finance', 'Modfinance.RekeningDc.*'),
('finance->wilayah', 'Modfinance.RekeningDc.Admin'),
('Super->Super->Finance', 'Modfinance.RekeningDc.Admin'),
('finance->wilayah', 'Modfinance.RekeningDc.Ajaxupdate'),
('Super->Super->Finance', 'Modfinance.RekeningDc.Ajaxupdate'),
('finance->wilayah', 'Modfinance.RekeningDc.BatchDelete'),
('finance->wilayah', 'Modfinance.RekeningDc.BukuBank'),
('finance->wilayah', 'Modfinance.RekeningDc.BukuBankPdf'),
('finance->wilayah', 'Modfinance.RekeningDc.Create'),
('Super->Super->Finance', 'Modfinance.RekeningDc.Create'),
('Super->Super->Finance', 'Modfinance.RekeningDc.Delete'),
('finance->wilayah', 'Modfinance.RekeningDc.Index'),
('Super->Super->Finance', 'Modfinance.RekeningDc.Index'),
('finance->wilayah', 'Modfinance.RekeningDc.LaporanBank'),
('finance->wilayah', 'Modfinance.RekeningDc.LaporanBankPdf'),
('finance->wilayah', 'Modfinance.RekeningDc.TarikBank'),
('finance->wilayah', 'Modfinance.RekeningDc.Update'),
('Super->Super->Finance', 'Modfinance.RekeningDc.Update'),
('finance->wilayah', 'Modfinance.RekeningDc.View'),
('Super->Super->Finance', 'Modfinance.RekeningDc.View'),
('finance->wilayah', 'Modfinance.RekeningSaldo.Admin'),
('hr->profile', 'Modfinance.RekeningSaldo.Admin'),
('Super->Super->Finance', 'Modfinance.RekeningSaldo.Admin'),
('finance->wilayah', 'Modfinance.RekeningSaldo.Create'),
('hr->profile', 'Modfinance.RekeningSaldo.Create'),
('Super->Super->Finance', 'Modfinance.RekeningSaldo.Create'),
('finance->wilayah', 'Modfinance.RekeningSaldo.Delete'),
('hr->profile', 'Modfinance.RekeningSaldo.Delete'),
('Super->Super->Finance', 'Modfinance.RekeningSaldo.Delete'),
('finance->wilayah', 'Modfinance.RekeningSaldo.Index'),
('Super->Super->Finance', 'Modfinance.RekeningSaldo.Index'),
('finance->wilayah', 'Modfinance.RekeningSaldo.Update'),
('hr->profile', 'Modfinance.RekeningSaldo.Update'),
('Super->Super->Finance', 'Modfinance.RekeningSaldo.Update'),
('finance->wilayah', 'Modfinance.RekeningSaldo.View'),
('Super->Super->Finance', 'Modfinance.RekeningSaldo.View'),
('Super->Super->Finance', 'Modfinance.SetupUserBank.Admin'),
('Super->Super->Finance', 'Modfinance.SetupUserBank.Create'),
('Super->Super->Finance', 'Modfinance.SetupUserBank.Delete'),
('Super->Super->Finance', 'Modfinance.SetupUserBank.Index'),
('Super->Super->Finance', 'Modfinance.SetupUserBank.Update'),
('Super->Super->Finance', 'Modfinance.SetupUserBank.View'),
('finance->wilayah', 'Modfinance.SetupUserKas.Admin'),
('Super->Super->Finance', 'Modfinance.SetupUserKas.Admin'),
('Super->Super->Finance', 'Modfinance.SetupUserKas.Create'),
('Super->Super->Finance', 'Modfinance.SetupUserKas.Delete'),
('Super->Super->Finance', 'Modfinance.SetupUserKas.Index'),
('Super->Super->Finance', 'Modfinance.SetupUserKas.Update'),
('Super->Super->Finance', 'Modfinance.SetupUserKas.View'),
('Employee->Profile', 'Modhumanresources.Certification.AddNew'),
('hr->profile', 'Modhumanresources.Certification.AddNew'),
('Super->Super->HR', 'Modhumanresources.Certification.AddNew'),
('Employee->Profile', 'Modhumanresources.Certification.Admin'),
('hr->profile', 'Modhumanresources.Certification.Admin'),
('Super->Super->HR', 'Modhumanresources.Certification.Admin'),
('Employee->Profile', 'Modhumanresources.Certification.Certification'),
('hr->profile', 'Modhumanresources.Certification.Certification'),
('Super->Super->HR', 'Modhumanresources.Certification.Certification'),
('Employee->Profile', 'Modhumanresources.Certification.Create'),
('hr->profile', 'Modhumanresources.Certification.Create'),
('Super->Super->HR', 'Modhumanresources.Certification.Create'),
('Employee->Profile', 'Modhumanresources.Certification.Delete'),
('hr->profile', 'Modhumanresources.Certification.Delete'),
('Super->Super->HR', 'Modhumanresources.Certification.Delete'),
('hr->profile', 'Modhumanresources.Certification.Download'),
('Employee->Profile', 'Modhumanresources.Certification.Index'),
('hr->profile', 'Modhumanresources.Certification.Index'),
('Super->Super->HR', 'Modhumanresources.Certification.Index'),
('Employee->Profile', 'Modhumanresources.Certification.Update'),
('hr->profile', 'Modhumanresources.Certification.Update'),
('Super->Super->HR', 'Modhumanresources.Certification.Update'),
('Employee->Profile', 'Modhumanresources.Certification.UpdateAjax'),
('hr->profile', 'Modhumanresources.Certification.UpdateAjax'),
('Super->Super->HR', 'Modhumanresources.Certification.UpdateAjax'),
('Employee->Profile', 'Modhumanresources.Certification.View'),
('hr->profile', 'Modhumanresources.Certification.View'),
('Super->Super->HR', 'Modhumanresources.Certification.View'),
('hr->profile', 'Modhumanresources.Default.Index'),
('Super->Super->HR', 'Modhumanresources.Default.Index'),
('Super->Super->HR', 'Modhumanresources.Department.Admin'),
('Super->Super->HR', 'Modhumanresources.Department.Create'),
('Super->Super->HR', 'Modhumanresources.Department.Delete'),
('Super->Super->HR', 'Modhumanresources.Department.Index'),
('Super->Super->HR', 'Modhumanresources.Department.Update'),
('Super->Super->HR', 'Modhumanresources.Department.View'),
('Employee->Profile', 'Modhumanresources.Dependent.AddNew'),
('hr->profile', 'Modhumanresources.Dependent.AddNew'),
('Super->Super->HR', 'Modhumanresources.Dependent.AddNew'),
('Employee->Profile', 'Modhumanresources.Dependent.Admin'),
('hr->profile', 'Modhumanresources.Dependent.Admin'),
('Super->Super->HR', 'Modhumanresources.Dependent.Admin'),
('Admin->User', 'Modhumanresources.Dependent.Ajaxupdate'),
('Employee->Profile', 'Modhumanresources.Dependent.Ajaxupdate'),
('hr->profile', 'Modhumanresources.Dependent.Ajaxupdate'),
('Super->Super->HR', 'Modhumanresources.Dependent.Ajaxupdate'),
('Super->Super->Services', 'Modhumanresources.Dependent.Ajaxupdate'),
('Employee->Profile', 'Modhumanresources.Dependent.Create'),
('hr->profile', 'Modhumanresources.Dependent.Create'),
('Super->Super->HR', 'Modhumanresources.Dependent.Create'),
('Employee->Profile', 'Modhumanresources.Dependent.Delete'),
('hr->profile', 'Modhumanresources.Dependent.Delete'),
('Super->Super->HR', 'Modhumanresources.Dependent.Delete'),
('Employee->Profile', 'Modhumanresources.Dependent.Dependent'),
('hr->profile', 'Modhumanresources.Dependent.Dependent'),
('Super->Super->HR', 'Modhumanresources.Dependent.Dependent'),
('Employee->Profile', 'Modhumanresources.Dependent.Index'),
('hr->profile', 'Modhumanresources.Dependent.Index'),
('Super->Super->HR', 'Modhumanresources.Dependent.Index'),
('Employee->Profile', 'Modhumanresources.Dependent.Update'),
('hr->profile', 'Modhumanresources.Dependent.Update'),
('Super->Super->HR', 'Modhumanresources.Dependent.Update'),
('Employee->Profile', 'Modhumanresources.Dependent.UpdateAjax'),
('Super->Super->HR', 'Modhumanresources.Dependent.UpdateAjax'),
('Employee->Profile', 'Modhumanresources.Dependent.View'),
('hr->profile', 'Modhumanresources.Dependent.View'),
('Super->Super->HR', 'Modhumanresources.Dependent.View'),
('Employee->Profile', 'Modhumanresources.Education.AddNew'),
('hr->profile', 'Modhumanresources.Education.AddNew'),
('Super->Super->HR', 'Modhumanresources.Education.AddNew'),
('Employee->Profile', 'Modhumanresources.Education.Admin'),
('hr->profile', 'Modhumanresources.Education.Admin'),
('Super->Super->HR', 'Modhumanresources.Education.Admin'),
('Employee->Profile', 'Modhumanresources.Education.Create'),
('hr->profile', 'Modhumanresources.Education.Create'),
('Super->Super->HR', 'Modhumanresources.Education.Create'),
('Employee->Profile', 'Modhumanresources.Education.Delete'),
('hr->profile', 'Modhumanresources.Education.Delete'),
('Super->Super->HR', 'Modhumanresources.Education.Delete'),
('Employee->Profile', 'Modhumanresources.Education.Education'),
('hr->profile', 'Modhumanresources.Education.Education'),
('Super->Super->HR', 'Modhumanresources.Education.Education'),
('Employee->Profile', 'Modhumanresources.Education.Index'),
('hr->profile', 'Modhumanresources.Education.Index'),
('Super->Super->HR', 'Modhumanresources.Education.Index'),
('Employee->Profile', 'Modhumanresources.Education.Update'),
('hr->profile', 'Modhumanresources.Education.Update'),
('Super->Super->HR', 'Modhumanresources.Education.Update'),
('Employee->Profile', 'Modhumanresources.Education.UpdateAjax'),
('hr->profile', 'Modhumanresources.Education.UpdateAjax'),
('Super->Super->HR', 'Modhumanresources.Education.UpdateAjax'),
('Employee->Profile', 'Modhumanresources.Education.View'),
('hr->profile', 'Modhumanresources.Education.View'),
('Super->Super->HR', 'Modhumanresources.Education.View'),
('Employee->Profile', 'Modhumanresources.EmergencyRecord.AddNew'),
('hr->profile', 'Modhumanresources.EmergencyRecord.AddNew'),
('Super->Super->HR', 'Modhumanresources.EmergencyRecord.AddNew'),
('Employee->Profile', 'Modhumanresources.EmergencyRecord.Admin'),
('hr->profile', 'Modhumanresources.EmergencyRecord.Admin'),
('Super->Super->HR', 'Modhumanresources.EmergencyRecord.Admin'),
('Employee->Profile', 'Modhumanresources.EmergencyRecord.Create'),
('hr->profile', 'Modhumanresources.EmergencyRecord.Create'),
('Super->Super->HR', 'Modhumanresources.EmergencyRecord.Create'),
('Employee->Profile', 'Modhumanresources.EmergencyRecord.Delete'),
('hr->profile', 'Modhumanresources.EmergencyRecord.Delete'),
('Super->Super->HR', 'Modhumanresources.EmergencyRecord.Delete'),
('Employee->Profile', 'Modhumanresources.EmergencyRecord.Emergency'),
('hr->profile', 'Modhumanresources.EmergencyRecord.Emergency'),
('Super->Super->HR', 'Modhumanresources.EmergencyRecord.Emergency'),
('Employee->Profile', 'Modhumanresources.EmergencyRecord.Index'),
('Employee->Profile', 'Modhumanresources.EmergencyRecord.Update'),
('Super->Super->HR', 'Modhumanresources.EmergencyRecord.Update'),
('Employee->Profile', 'Modhumanresources.EmergencyRecord.UpdateAjax'),
('hr->profile', 'Modhumanresources.EmergencyRecord.UpdateAjax'),
('Super->Super->HR', 'Modhumanresources.EmergencyRecord.UpdateAjax'),
('Employee->Profile', 'Modhumanresources.EmergencyRecord.View'),
('hr->profile', 'Modhumanresources.EmergencyRecord.View'),
('Super->Super->HR', 'Modhumanresources.EmergencyRecord.View'),
('Employee->Profile', 'Modhumanresources.Employee.Admin'),
('hr->profile', 'Modhumanresources.Employee.Admin'),
('Super->Super->HR', 'Modhumanresources.Employee.Admin'),
('SuperSuperHR', 'Modhumanresources.Employee.Admin'),
('Employee->Profile', 'Modhumanresources.Employee.AdminByDepartment'),
('Super->Super->HR', 'Modhumanresources.Employee.AdminByDepartment'),
('Employee->Profile', 'Modhumanresources.Employee.AdminByposition'),
('Super->Super->HR', 'Modhumanresources.Employee.AdminByposition'),
('Employee->Profile', 'Modhumanresources.Employee.AdminExel'),
('Super->Super->HR', 'Modhumanresources.Employee.AdminExel'),
('Admin->User', 'Modhumanresources.Employee.Ajaxupdate'),
('Employee->Profile', 'Modhumanresources.Employee.Ajaxupdate'),
('hr->profile', 'Modhumanresources.Employee.Ajaxupdate'),
('Super->Super->HR', 'Modhumanresources.Employee.Ajaxupdate'),
('Employee->Profile', 'Modhumanresources.Employee.Create'),
('hr->profile', 'Modhumanresources.Employee.Create'),
('Super->Super->HR', 'Modhumanresources.Employee.Create'),
('Employee->Profile', 'Modhumanresources.Employee.Delete'),
('hr->profile', 'Modhumanresources.Employee.Delete'),
('Super->Super->HR', 'Modhumanresources.Employee.Delete'),
('Employee->Profile', 'Modhumanresources.Employee.Index'),
('hr->profile', 'Modhumanresources.Employee.Index'),
('Super->Super->HR', 'Modhumanresources.Employee.Index'),
('Admin->User', 'Modhumanresources.Employee.Update'),
('hr->profile', 'Modhumanresources.Employee.Update'),
('Super->Super->HR', 'Modhumanresources.Employee.Update'),
('hr->profile', 'Modhumanresources.Employee.UpdatePassword'),
('Admin->User', 'Modhumanresources.Employee.View'),
('Employee->Profile', 'Modhumanresources.Employee.View'),
('hr->profile', 'Modhumanresources.Employee.View'),
('Super->Super->HR', 'Modhumanresources.Employee.View'),
('Super->Super->HR', 'Modhumanresources.EmployeeStatus.Admin'),
('Admin->User', 'Modhumanresources.EmployeeStatus.Create'),
('Super->Super->HR', 'Modhumanresources.EmployeeStatus.Create'),
('Super->Super->HR', 'Modhumanresources.EmployeeStatus.Delete'),
('Super->Super->HR', 'Modhumanresources.EmployeeStatus.Index'),
('Super->Super->HR', 'Modhumanresources.EmployeeStatus.Update'),
('Super->Super->HR', 'Modhumanresources.EmployeeStatus.View'),
('Super->Super->HR', 'Modhumanresources.FilePublication.Admin'),
('Super->Super->HR', 'Modhumanresources.FilePublication.Create'),
('Super->Super->HR', 'Modhumanresources.FilePublication.Delete'),
('Super->Super->HR', 'Modhumanresources.FilePublication.Download'),
('Super->Super->HR', 'Modhumanresources.FilePublication.Index'),
('Super->Super->HR', 'Modhumanresources.FilePublication.Update'),
('Super->Super->HR', 'Modhumanresources.FilePublication.View'),
('Admin->User', 'Modhumanresources.JobExperience.AddNew'),
('Employee->Profile', 'Modhumanresources.JobExperience.AddNew'),
('Super->Super->HR', 'Modhumanresources.JobExperience.AddNew'),
('Admin->User', 'Modhumanresources.JobExperience.Admin'),
('Employee->Profile', 'Modhumanresources.JobExperience.Admin'),
('hr->profile', 'Modhumanresources.JobExperience.Admin'),
('Admin->User', 'Modhumanresources.JobExperience.Create'),
('Employee->Profile', 'Modhumanresources.JobExperience.Create'),
('hr->profile', 'Modhumanresources.JobExperience.Create'),
('Super->Super->HR', 'Modhumanresources.JobExperience.Create'),
('Admin->User', 'Modhumanresources.JobExperience.Delete'),
('Employee->Profile', 'Modhumanresources.JobExperience.Delete'),
('Super->Super->HR', 'Modhumanresources.JobExperience.Delete'),
('Admin->User', 'Modhumanresources.JobExperience.Experience'),
('Employee->Profile', 'Modhumanresources.JobExperience.Experience'),
('hr->profile', 'Modhumanresources.JobExperience.Experience'),
('Super->Super->HR', 'Modhumanresources.JobExperience.Experience'),
('Admin->User', 'Modhumanresources.JobExperience.Index'),
('Employee->Profile', 'Modhumanresources.JobExperience.Index'),
('Super->Super->HR', 'Modhumanresources.JobExperience.Index'),
('Admin->User', 'Modhumanresources.JobExperience.Update'),
('Employee->Profile', 'Modhumanresources.JobExperience.Update'),
('hr->profile', 'Modhumanresources.JobExperience.Update'),
('Super->Super->HR', 'Modhumanresources.JobExperience.Update'),
('Admin->User', 'Modhumanresources.JobExperience.UpdateAjax'),
('Employee->Profile', 'Modhumanresources.JobExperience.UpdateAjax'),
('hr->profile', 'Modhumanresources.JobExperience.UpdateAjax'),
('Super->Super->HR', 'Modhumanresources.JobExperience.UpdateAjax'),
('Admin->User', 'Modhumanresources.JobExperience.View'),
('Employee->Profile', 'Modhumanresources.JobExperience.View'),
('hr->profile', 'Modhumanresources.JobExperience.View'),
('Super->Super->HR', 'Modhumanresources.JobExperience.View'),
('hr->profile', 'Modhumanresources.Kpi.*'),
('hr->profile', 'Modhumanresources.Kpi.AddNew'),
('Super->Super->HR', 'Modhumanresources.Kpi.AddNew'),
('hr->profile', 'Modhumanresources.Kpi.Admin'),
('Super->Super->HR', 'Modhumanresources.Kpi.Admin'),
('hr->profile', 'Modhumanresources.Kpi.Ajaxupdate'),
('hr->profile', 'Modhumanresources.Kpi.Create'),
('Super->Super->HR', 'Modhumanresources.Kpi.Create'),
('hr->profile', 'Modhumanresources.Kpi.Delete'),
('Super->Super->HR', 'Modhumanresources.Kpi.Delete'),
('hr->profile', 'Modhumanresources.Kpi.Index'),
('Super->Super->HR', 'Modhumanresources.Kpi.Index'),
('hr->profile', 'Modhumanresources.Kpi.Kpi'),
('hr->profile', 'Modhumanresources.Kpi.Update'),
('Super->Super->HR', 'Modhumanresources.Kpi.Update'),
('hr->profile', 'Modhumanresources.Kpi.View'),
('Super->Super->HR', 'Modhumanresources.Kpi.View'),
('Super->Super->HR', 'Modhumanresources.LevelPosition.Admin'),
('Super->Super->HR', 'Modhumanresources.LevelPosition.Create'),
('Super->Super->HR', 'Modhumanresources.LevelPosition.Delete'),
('Super->Super->HR', 'Modhumanresources.LevelPosition.Index'),
('Super->Super->HR', 'Modhumanresources.LevelPosition.Update'),
('Super->Super->HR', 'Modhumanresources.LevelPosition.View'),
('Super->Super->HR', 'Modhumanresources.Organization.Admin'),
('Super->Super->HR', 'Modhumanresources.Organization.Create'),
('Super->Super->HR', 'Modhumanresources.Organization.Delete'),
('Super->Super->HR', 'Modhumanresources.Organization.Index'),
('Super->Super->HR', 'Modhumanresources.Organization.Tree'),
('Super->Super->HR', 'Modhumanresources.Organization.Update'),
('Super->Super->HR', 'Modhumanresources.Organization.View'),
('hr->profile', 'Modhumanresources.PositionExp.*'),
('hr->profile', 'Modhumanresources.PositionExp.Admin'),
('hr->profile', 'Modhumanresources.PositionExp.Ajaxupdate'),
('hr->profile', 'Modhumanresources.PositionExp.Create'),
('hr->profile', 'Modhumanresources.PositionExp.Delete'),
('hr->profile', 'Modhumanresources.PositionExp.Experience'),
('hr->profile', 'Modhumanresources.PositionExp.Index'),
('hr->profile', 'Modhumanresources.PositionExp.Update'),
('hr->profile', 'Modhumanresources.PositionExp.View'),
('Admin->User', 'Modhumanresources._Dependent.AddNew'),
('Employee->Profile', 'Modhumanresources._Dependent.AddNew'),
('Employee->Profile', 'Modhumanresources._Dependent.Admin'),
('Admin->User', 'Modhumanresources._Dependent.Create'),
('Employee->Profile', 'Modhumanresources._Dependent.Create'),
('Admin->User', 'Modhumanresources._Dependent.Delete'),
('Employee->Profile', 'Modhumanresources._Dependent.Delete'),
('Admin->User', 'Modhumanresources._Dependent.Dependent'),
('Admin->User', 'Modhumanresources._Dependent.Index'),
('Admin->User', 'Modhumanresources._Dependent.Update'),
('Employee->Profile', 'Modhumanresources._Dependent.Update'),
('Admin->User', 'Modhumanresources._Dependent.View'),
('Employee->Profile', 'Modhumanresources._Dependent.View'),
('Super->Project->PIC', 'Modprojdocctrl.Document.View'),
('Super->Project->PIC', 'Modproject.Document.*'),
('Super->Super->Project', 'Modproject.Document.*'),
('Super->Project->PIC', 'Modproject.Document.Admin'),
('Super->Super->Project', 'Modproject.Document.Admin'),
('Super->Project->PIC', 'Modproject.Document.Ajaxupdate'),
('Super->Super->Project', 'Modproject.Document.Ajaxupdate'),
('Super->Project->PIC', 'Modproject.Document.Create'),
('Super->Super->Project', 'Modproject.Document.Create'),
('Super->Project->PIC', 'Modproject.Document.Delete'),
('Super->Super->Project', 'Modproject.Document.Delete'),
('Super->Project->PIC', 'Modproject.Document.Download'),
('Super->Super->Project', 'Modproject.Document.Download'),
('Super->Project->PIC', 'Modproject.Document.Index'),
('Super->Super->Project', 'Modproject.Document.Index'),
('Super->Project->PIC', 'Modproject.Document.Update'),
('Super->Super->Project', 'Modproject.Document.Update'),
('Super->Project->PIC', 'Modproject.Document.View'),
('Super->Super->Project', 'Modproject.Document.View'),
('Super->Project->PIC', 'Modproject.Finance.*'),
('Super->Super->Project', 'Modproject.Finance.*'),
('Super->Project->PIC', 'Modproject.Finance.Admin'),
('Super->Super->Project', 'Modproject.Finance.Admin'),
('Super->Project->PIC', 'Modproject.Finance.AjaxUpdate'),
('Super->Super->Project', 'Modproject.Finance.AjaxUpdate'),
('Super->Project->PIC', 'Modproject.Finance.Create'),
('Super->Super->Project', 'Modproject.Finance.Create'),
('Super->Project->PIC', 'Modproject.Finance.Delete'),
('Super->Super->Project', 'Modproject.Finance.Delete'),
('Super->Project->PIC', 'Modproject.Finance.Index'),
('Super->Super->Project', 'Modproject.Finance.Index'),
('Super->Project->PIC', 'Modproject.Finance.Update'),
('Super->Super->Project', 'Modproject.Finance.Update'),
('Super->Project->PIC', 'Modproject.Finance.View'),
('Super->Super->Project', 'Modproject.Finance.View'),
('Super->Project->PIC', 'Modproject.Personel.*'),
('Super->Super->Project', 'Modproject.Personel.*'),
('Super->Project->PIC', 'Modproject.Personel.Admin'),
('Super->Super->Project', 'Modproject.Personel.Admin'),
('Super->Project->PIC', 'Modproject.Personel.Create'),
('Super->Super->Project', 'Modproject.Personel.Create'),
('Super->Project->PIC', 'Modproject.Personel.Delete'),
('Super->Super->Project', 'Modproject.Personel.Delete'),
('Super->Project->PIC', 'Modproject.Personel.Index'),
('Super->Super->Project', 'Modproject.Personel.Index'),
('Super->Project->PIC', 'Modproject.Personel.Update'),
('Super->Super->Project', 'Modproject.Personel.Update'),
('Super->Project->PIC', 'Modproject.Personel.View'),
('Super->Super->Project', 'Modproject.Personel.View'),
('Super->Project->PIC', 'Modproject.PersonelMandays.*'),
('Super->Super->Project', 'Modproject.PersonelMandays.*'),
('Super->Project->PIC', 'Modproject.PersonelMandays.Admin'),
('Super->Super->Project', 'Modproject.PersonelMandays.Admin'),
('Super->Project->PIC', 'Modproject.PersonelMandays.Create'),
('Super->Super->Project', 'Modproject.PersonelMandays.Create'),
('Super->Project->PIC', 'Modproject.PersonelMandays.Delete'),
('Super->Super->Project', 'Modproject.PersonelMandays.Delete'),
('Super->Project->PIC', 'Modproject.PersonelMandays.Index'),
('Super->Super->Project', 'Modproject.PersonelMandays.Index'),
('Super->Project->PIC', 'Modproject.PersonelMandays.Update'),
('Super->Super->Project', 'Modproject.PersonelMandays.Update'),
('Super->Project->PIC', 'Modproject.PersonelMandays.View'),
('Super->Super->Project', 'Modproject.PersonelMandays.View'),
('Super->Project->PIC', 'Modproject.Procurement.*'),
('Super->Super->Project', 'Modproject.Procurement.*'),
('Super->Project->PIC', 'Modproject.Procurement.Admin'),
('Super->Super->Project', 'Modproject.Procurement.Admin'),
('Super->Project->PIC', 'Modproject.Procurement.Ajaxupdate'),
('Super->Super->Project', 'Modproject.Procurement.Ajaxupdate'),
('Super->Project->PIC', 'Modproject.Procurement.Create'),
('Super->Super->Project', 'Modproject.Procurement.Create'),
('Super->Project->PIC', 'Modproject.Procurement.Delete'),
('Super->Super->Project', 'Modproject.Procurement.Delete'),
('Super->Project->PIC', 'Modproject.Procurement.Index'),
('Super->Super->Project', 'Modproject.Procurement.Index'),
('Super->Project->PIC', 'Modproject.Procurement.Update'),
('Super->Super->Project', 'Modproject.Procurement.Update'),
('Super->Project->PIC', 'Modproject.Procurement.View'),
('Super->Super->Project', 'Modproject.Procurement.View'),
('Super->Project->PIC', 'Modproject.Progress.*'),
('Super->Super->Project', 'Modproject.Progress.*'),
('Super->Project->PIC', 'Modproject.Progress.Admin'),
('Super->Super->Project', 'Modproject.Progress.Admin'),
('Super->Project->PIC', 'Modproject.Progress.Create'),
('Super->Super->Project', 'Modproject.Progress.Create'),
('Super->Project->PIC', 'Modproject.Progress.Delete'),
('Super->Super->Project', 'Modproject.Progress.Delete'),
('Super->Project->PIC', 'Modproject.Progress.Index'),
('Super->Super->Project', 'Modproject.Progress.Index'),
('Super->Project->PIC', 'Modproject.Progress.Update'),
('Super->Super->Project', 'Modproject.Progress.Update'),
('Super->Project->PIC', 'Modproject.Progress.View'),
('Super->Super->Project', 'Modproject.Progress.View'),
('Super->Project->PIC', 'Modproject.Project.*'),
('Super->Super->Project', 'Modproject.Project.*'),
('Super->Project->PIC', 'Modproject.Project.Admin'),
('Super->Super->Project', 'Modproject.Project.Admin'),
('Super->Project->PIC', 'Modproject.Project.Ajaxupdate'),
('Super->Super->Project', 'Modproject.Project.Ajaxupdate'),
('Super->Project->PIC', 'Modproject.Project.Create'),
('Super->Super->Project', 'Modproject.Project.Create'),
('Super->Project->PIC', 'Modproject.Project.Delete'),
('Super->Super->Project', 'Modproject.Project.Delete'),
('Super->Project->PIC', 'Modproject.Project.Index'),
('Super->Super->Project', 'Modproject.Project.Index'),
('Super->Project->PIC', 'Modproject.Project.Update'),
('Super->Super->Project', 'Modproject.Project.Update'),
('Super->Project->PIC', 'Modproject.Project.View'),
('Super->Super->Project', 'Modproject.Project.View'),
('Super->Project->PIC', 'Modproject.Task.*'),
('Super->Super->Project', 'Modproject.Task.*'),
('Super->Project->PIC', 'Modproject.Task.Admin'),
('Super->Super->Project', 'Modproject.Task.Admin'),
('Super->Project->PIC', 'Modproject.Task.Ajaxupdate'),
('Super->Super->Project', 'Modproject.Task.Ajaxupdate'),
('Super->Project->PIC', 'Modproject.Task.Create'),
('Super->Super->Project', 'Modproject.Task.Create'),
('Super->Project->PIC', 'Modproject.Task.Delete'),
('Super->Super->Project', 'Modproject.Task.Delete'),
('Super->Project->PIC', 'Modproject.Task.Index'),
('Super->Super->Project', 'Modproject.Task.Index'),
('Super->Project->PIC', 'Modproject.Task.Update'),
('Super->Super->Project', 'Modproject.Task.Update'),
('Super->Super->Project', 'Modproject.Task.View'),
('Super->Project->PIC', 'Modproject._User.*'),
('Super->Super->Project', 'Modproject._User.*'),
('Super->Project->PIC', 'Modproject._User.Admin'),
('Super->Super->Project', 'Modproject._User.Admin'),
('Super->Project->PIC', 'Modproject._User.Ajaxupdate'),
('Super->Super->Project', 'Modproject._User.Ajaxupdate'),
('Super->Project->PIC', 'Modproject._User.Create'),
('Super->Super->Project', 'Modproject._User.Create'),
('Super->Project->PIC', 'Modproject._User.Delete'),
('Super->Super->Project', 'Modproject._User.Delete'),
('Super->Project->PIC', 'Modproject._User.Index'),
('Super->Super->Project', 'Modproject._User.Index'),
('Super->Project->PIC', 'Modproject._User.Update'),
('Super->Super->Project', 'Modproject._User.Update'),
('Super->Project->PIC', 'Modproject._User.View'),
('Super->Super->Project', 'Modproject._User.View'),
('Admin->User', 'Modrecruitments.Certification.AddNew'),
('Employee->Profile', 'Modrecruitments.Certification.AddNew'),
('Admin->User', 'Modrecruitments.Certification.Admin'),
('Employee->Profile', 'Modrecruitments.Certification.Admin'),
('Admin->User', 'Modrecruitments.Certification.Certification'),
('Employee->Profile', 'Modrecruitments.Certification.Certification'),
('Admin->User', 'Modrecruitments.Certification.Create'),
('Employee->Profile', 'Modrecruitments.Certification.Create'),
('Admin->User', 'Modrecruitments.Certification.Delete'),
('Employee->Profile', 'Modrecruitments.Certification.Delete'),
('Admin->User', 'Modrecruitments.Certification.Index'),
('Employee->Profile', 'Modrecruitments.Certification.Index'),
('Admin->User', 'Modrecruitments.Certification.Update'),
('Employee->Profile', 'Modrecruitments.Certification.Update'),
('Admin->User', 'Modrecruitments.Certification.UpdateAjax'),
('Employee->Profile', 'Modrecruitments.Certification.UpdateAjax'),
('Admin->User', 'Modrecruitments.Certification.View'),
('Admin->User', 'Modrecruitments.Dependent.AddNew'),
('Employee->Profile', 'Modrecruitments.Dependent.AddNew'),
('Admin->User', 'Modrecruitments.Dependent.Admin'),
('Employee->Profile', 'Modrecruitments.Dependent.Admin'),
('Admin->User', 'Modrecruitments.Dependent.Create'),
('Employee->Profile', 'Modrecruitments.Dependent.Create'),
('Admin->User', 'Modrecruitments.Dependent.Delete'),
('Employee->Profile', 'Modrecruitments.Dependent.Delete'),
('Employee->Profile', 'Modrecruitments.Dependent.Dependent'),
('Employee->Profile', 'Modrecruitments.Dependent.Index'),
('Admin->User', 'Modrecruitments.Dependent.Update'),
('Employee->Profile', 'Modrecruitments.Dependent.Update'),
('Admin->User', 'Modrecruitments.Dependent.UpdateAjax'),
('Employee->Profile', 'Modrecruitments.Dependent.UpdateAjax'),
('Employee->Profile', 'Modrecruitments.Dependent.View'),
('Employee->Profile', 'Modrecruitments.Education.AddNew'),
('Employee->Profile', 'Modrecruitments.Education.Admin'),
('Employee->Profile', 'Modrecruitments.Education.Create'),
('Employee->Profile', 'Modrecruitments.Education.Delete'),
('Employee->Profile', 'Modrecruitments.Education.Education'),
('Employee->Profile', 'Modrecruitments.Education.Index'),
('Employee->Profile', 'Modrecruitments.Education.Update'),
('Employee->Profile', 'Modrecruitments.Education.UpdateAjax'),
('Employee->Profile', 'Modrecruitments.Education.View'),
('Employee->Profile', 'Modrecruitments.EmergencyRecord.AddNew'),
('Employee->Profile', 'Modrecruitments.EmergencyRecord.Create'),
('Employee->Profile', 'Modrecruitments.EmergencyRecord.Delete'),
('Employee->Profile', 'Modrecruitments.EmergencyRecord.Emergency'),
('Employee->Profile', 'Modrecruitments.EmergencyRecord.Index'),
('Employee->Profile', 'Modrecruitments.EmergencyRecord.Update'),
('Employee->Profile', 'Modrecruitments.EmergencyRecord.UpdateAjax'),
('Employee->Profile', 'Modrecruitments.EmergencyRecord.View'),
('Employee->Profile', 'Modrecruitments.JobExperience.AddNew'),
('Employee->Profile', 'Modrecruitments.JobExperience.Admin'),
('Employee->Profile', 'Modrecruitments.JobExperience.Create'),
('Employee->Profile', 'Modrecruitments.JobExperience.Experience'),
('Employee->Profile', 'Modrecruitments.JobExperience.Index'),
('Employee->Profile', 'Modrecruitments.JobExperience.Update'),
('Employee->Profile', 'Modrecruitments.JobExperience.UpdateAjax'),
('Employee->Profile', 'Modrecruitments.JobExperience.View'),
('Employee->Profile', 'Modrecruitments.PositionOffered.Admin'),
('Employee->Profile', 'Modrecruitments.PositionOffered.Create'),
('Employee->Profile', 'Modrecruitments.PositionOffered.Delete'),
('Employee->Profile', 'Modrecruitments.PositionOffered.Index'),
('Employee->Profile', 'Modrecruitments.PositionOffered.Update'),
('Employee->Profile', 'Modrecruitments.PositionOffered.View'),
('Super->Super->Services', 'Modservices.DataRequest.Admin'),
('Super->Super->Services', 'Modservices.DataRequest.Create'),
('Super->Super->Services', 'Modservices.DataRequest.Delete'),
('Super->Super->Services', 'Modservices.DataRequest.Index'),
('Super->Super->Services', 'Modservices.DataRequest.Update'),
('Super->Super->Services', 'Modservices.DataRequest.View'),
('Super->Super->Services', 'Modservices.Default.Index'),
('Super->Super->Services', 'Modservices.ServiceType.Admin'),
('Super->Super->Services', 'Modservices.ServiceType.Create'),
('Super->Super->Services', 'Modservices.ServiceType.Delete'),
('Super->Super->Services', 'Modservices.ServiceType.Index'),
('Super->Super->Services', 'Modservices.ServiceType.Update'),
('Super->Super->Services', 'Modservices.ServiceType.View'),
('Super->Super->Sppd', 'Modsppd.Approval.*'),
('Admin->User', 'Modsppd.Approval.Admin'),
('Employee->Profile', 'Modsppd.Approval.Admin'),
('Super->Super->Sppd', 'Modsppd.Approval.Admin'),
('Admin->User', 'Modsppd.Approval.ApproveGeneralManager'),
('Super->Super->Sppd', 'Modsppd.Approval.ApproveGeneralManager'),
('Admin->User', 'Modsppd.Approval.ApproveKeuangan'),
('Employee->Profile', 'Modsppd.Approval.ApproveKeuangan'),
('Super->Super->Sppd', 'Modsppd.Approval.ApproveKeuangan'),
('Employee->Profile', 'Modsppd.Approval.ApproveManager'),
('Super->Super->Sppd', 'Modsppd.Approval.ApproveManager'),
('Admin->User', 'Modsppd.Approval.Close'),
('Employee->Profile', 'Modsppd.Approval.Close'),
('Super->Super->Sppd', 'Modsppd.Approval.Close'),
('Admin->User', 'Modsppd.Approval.Create'),
('Employee->Profile', 'Modsppd.Approval.Create'),
('Super->Super->Sppd', 'Modsppd.Approval.Create'),
('Admin->User', 'Modsppd.Approval.Delete'),
('Employee->Profile', 'Modsppd.Approval.Delete'),
('Super->Super->Sppd', 'Modsppd.Approval.Delete'),
('Admin->User', 'Modsppd.Approval.FinishCreate'),
('Employee->Profile', 'Modsppd.Approval.FinishCreate'),
('Super->Super->Sppd', 'Modsppd.Approval.FinishCreate'),
('Employee->Profile', 'Modsppd.Approval.FinishVerifikasi'),
('Super->Super->Sppd', 'Modsppd.Approval.FinishVerifikasi'),
('Admin->User', 'Modsppd.Approval.Index'),
('Employee->Profile', 'Modsppd.Approval.Index'),
('Super->Super->Sppd', 'Modsppd.Approval.Index'),
('Admin->User', 'Modsppd.Approval.PertanggungJawaban'),
('Employee->Profile', 'Modsppd.Approval.PertanggungJawaban'),
('Super->Super->Sppd', 'Modsppd.Approval.PertanggungJawaban'),
('Admin->User', 'Modsppd.Approval.Update'),
('Employee->Profile', 'Modsppd.Approval.Update'),
('Super->Super->Sppd', 'Modsppd.Approval.Update'),
('Admin->User', 'Modsppd.Approval.View'),
('Employee->Profile', 'Modsppd.Approval.View'),
('Super->Super->Sppd', 'Modsppd.Approval.View'),
('Super->Super->Sppd', 'Modsppd.BiayaSppd.*'),
('Admin->User', 'Modsppd.BiayaSppd.AddNew'),
('Employee->Profile', 'Modsppd.BiayaSppd.AddNew'),
('Super->Super->Sppd', 'Modsppd.BiayaSppd.AddNew'),
('Admin->User', 'Modsppd.BiayaSppd.Admin'),
('Super->Super->Sppd', 'Modsppd.BiayaSppd.Admin'),
('Admin->User', 'Modsppd.BiayaSppd.Biaya'),
('Employee->Profile', 'Modsppd.BiayaSppd.Biaya'),
('Super->Super->Sppd', 'Modsppd.BiayaSppd.Biaya'),
('Admin->User', 'Modsppd.BiayaSppd.BiayaPdf'),
('Super->Super->Sppd', 'Modsppd.BiayaSppd.BiayaPdf'),
('Admin->User', 'Modsppd.BiayaSppd.Create'),
('Super->Super->Sppd', 'Modsppd.BiayaSppd.Create'),
('Admin->User', 'Modsppd.BiayaSppd.Delete'),
('Super->Super->Sppd', 'Modsppd.BiayaSppd.Delete'),
('Admin->User', 'Modsppd.BiayaSppd.Index'),
('Super->Super->Sppd', 'Modsppd.BiayaSppd.Index'),
('Super->Super->Sppd', 'Modsppd.BiayaSppd.Update'),
('Admin->User', 'Modsppd.BiayaSppd.UpdateAjax'),
('Super->Super->Sppd', 'Modsppd.BiayaSppd.UpdateAjax'),
('Super->Super->Sppd', 'Modsppd.BiayaSppd.View'),
('Super->Super->Sppd', 'Modsppd.Default.*'),
('Admin->User', 'Modsppd.Default.Index'),
('Super->Super->Sppd', 'Modsppd.Default.Index'),
('Super->Super->Sppd', 'Modsppd.Form.*'),
('Super->Super->Sppd', 'Modsppd.Form.Admin'),
('Super->Super->Sppd', 'Modsppd.Form.Create'),
('Super->Super->Sppd', 'Modsppd.Form.Delete'),
('Super->Super->Sppd', 'Modsppd.Form.Index'),
('Super->Super->Sppd', 'Modsppd.Form.Update'),
('Super->Super->Sppd', 'Modsppd.Form.View'),
('Super->Super->Sppd', 'Modsppd.FormSppd.*'),
('Admin->User', 'Modsppd.FormSppd.Admin'),
('Super->Super->Sppd', 'Modsppd.FormSppd.Admin'),
('Admin->User', 'Modsppd.FormSppd.AdminApproveGeneralManager'),
('Super->Super->Sppd', 'Modsppd.FormSppd.AdminApproveGeneralManager'),
('Admin->User', 'Modsppd.FormSppd.AdminApproveKeuangan'),
('Super->Super->Sppd', 'Modsppd.FormSppd.AdminApproveKeuangan'),
('Admin->User', 'Modsppd.FormSppd.AdminApproveManager'),
('Super->Super->Sppd', 'Modsppd.FormSppd.AdminApproveManager'),
('Admin->User', 'Modsppd.FormSppd.AdminClose'),
('Super->Super->Sppd', 'Modsppd.FormSppd.AdminClose'),
('Admin->User', 'Modsppd.FormSppd.AdminPengecekan'),
('Super->Super->Sppd', 'Modsppd.FormSppd.AdminPengecekan'),
('Super->Super->Sppd', 'Modsppd.FormSppd.AdminPertanggungjawaban'),
('Admin->User', 'Modsppd.FormSppd.Create'),
('Super->Super->Sppd', 'Modsppd.FormSppd.Create'),
('Admin->User', 'Modsppd.FormSppd.Delete'),
('Super->Super->Sppd', 'Modsppd.FormSppd.Delete'),
('Super->Super->Sppd', 'Modsppd.FormSppd.Index'),
('Super->Super->Sppd', 'Modsppd.FormSppd.Update'),
('Admin->User', 'Modsppd.FormSppd.View'),
('Super->Super->Sppd', 'Modsppd.FormSppd.View'),
('Admin->User', 'Modsppd.FormSppd.ViewPdf'),
('Super->Super->Sppd', 'Modsppd.FormSppd.ViewPdf'),
('Super->Super->Sppd', 'Modsppd.KotaTujuan.*'),
('Admin->User', 'Modsppd.KotaTujuan.Admin'),
('Super->Super->Sppd', 'Modsppd.KotaTujuan.Admin'),
('Admin->User', 'Modsppd.KotaTujuan.Create'),
('Super->Super->Sppd', 'Modsppd.KotaTujuan.Create'),
('Admin->User', 'Modsppd.KotaTujuan.Delete'),
('Super->Super->Sppd', 'Modsppd.KotaTujuan.Delete'),
('Super->Super->Sppd', 'Modsppd.KotaTujuan.Index'),
('Admin->User', 'Modsppd.KotaTujuan.Update'),
('Super->Super->Sppd', 'Modsppd.KotaTujuan.Update'),
('Admin->User', 'Modsppd.KotaTujuan.View'),
('Super->Super->Sppd', 'Modsppd.KotaTujuan.View'),
('Super->Super->Sppd', 'Modsppd.LaporanRekap.*'),
('Admin->User', 'Modsppd.LaporanRekap.AddNew'),
('Super->Super->Sppd', 'Modsppd.LaporanRekap.AddNew'),
('Super->Super->Sppd', 'Modsppd.LaporanRekap.Admin'),
('Super->Super->Sppd', 'Modsppd.LaporanRekap.Create'),
('Super->Super->Sppd', 'Modsppd.LaporanRekap.Delete'),
('Super->Super->Sppd', 'Modsppd.LaporanRekap.Index'),
('Super->Super->Sppd', 'Modsppd.LaporanRekap.Rekap'),
('Super->Super->Sppd', 'Modsppd.LaporanRekap.RekapPdf'),
('Admin->User', 'Modsppd.LaporanRekap.Update'),
('Super->Super->Sppd', 'Modsppd.LaporanRekap.Update'),
('Admin->User', 'Modsppd.LaporanRekap.UpdateAjax'),
('Super->Super->Sppd', 'Modsppd.LaporanRekap.UpdateAjax'),
('Admin->User', 'Modsppd.LaporanRekap.View'),
('Super->Super->Sppd', 'Modsppd.LaporanRekap.View'),
('Super->Super->Sppd', 'Modsppd.LetterCost.*'),
('Super->Super->Sppd', 'Modsppd.LetterCost.Admin'),
('Super->Super->Sppd', 'Modsppd.LetterCost.Create'),
('Super->Super->Sppd', 'Modsppd.LetterCost.Delete'),
('Super->Super->Sppd', 'Modsppd.LetterCost.Index'),
('Super->Super->Sppd', 'Modsppd.LetterCost.Update'),
('Super->Super->Sppd', 'Modsppd.LetterCost.View'),
('Super->Super->Sppd', 'Modsppd.MailViaYahoo.*'),
('Admin->User', 'Modsppd.MailViaYahoo.Mail'),
('Super->Super->Sppd', 'Modsppd.MailViaYahoo.Mail'),
('Super->Super->Sppd', 'Modsppd.MasterCost.*'),
('Super->Super->Sppd', 'Modsppd.MasterCost.Admin'),
('Super->Super->Sppd', 'Modsppd.MasterCost.Create'),
('Super->Super->Sppd', 'Modsppd.MasterCost.Delete'),
('Super->Super->Sppd', 'Modsppd.MasterCost.Index'),
('Super->Super->Sppd', 'Modsppd.MasterCost.Update'),
('Super->Super->Sppd', 'Modsppd.MasterCost.View'),
('Super->Super->Sppd', 'Modsppd.MasterDestination.*'),
('Super->Super->Sppd', 'Modsppd.MasterDestination.Admin'),
('Super->Super->Sppd', 'Modsppd.MasterDestination.Create'),
('Super->Super->Sppd', 'Modsppd.MasterDestination.Delete'),
('Super->Super->Sppd', 'Modsppd.MasterDestination.Index'),
('Super->Super->Sppd', 'Modsppd.MasterDestination.Update'),
('Super->Super->Sppd', 'Modsppd.MasterDestination.View'),
('Super->Super->Sppd', 'Modsppd.OtherReimburse.*'),
('Super->Super->Sppd', 'Modsppd.OtherReimburse.Admin'),
('Super->Super->Sppd', 'Modsppd.OtherReimburse.Create'),
('Super->Super->Sppd', 'Modsppd.OtherReimburse.Delete'),
('Super->Super->Sppd', 'Modsppd.OtherReimburse.Index'),
('Super->Super->Sppd', 'Modsppd.OtherReimburse.Update'),
('Super->Super->Sppd', 'Modsppd.OtherReimburse.View'),
('Super->Super->Sppd', 'Modsppd.Period.*'),
('Admin->User', 'Modsppd.Period.Admin'),
('Super->Super->Sppd', 'Modsppd.Period.Admin'),
('Admin->User', 'Modsppd.Period.Create'),
('Super->Super->Sppd', 'Modsppd.Period.Create'),
('Admin->User', 'Modsppd.Period.Delete'),
('Super->Super->Sppd', 'Modsppd.Period.Delete'),
('Admin->User', 'Modsppd.Period.Index'),
('Super->Super->Sppd', 'Modsppd.Period.Index'),
('Admin->User', 'Modsppd.Period.Update'),
('Super->Super->Sppd', 'Modsppd.Period.Update'),
('Admin->User', 'Modsppd.Period.View'),
('Super->Super->Sppd', 'Modsppd.Period.View'),
('Super->Super->Sppd', 'Modsppd.Persekot.*'),
('Super->Super->Sppd', 'Modsppd.Persekot.Admin'),
('Super->Super->Sppd', 'Modsppd.Persekot.Ajaxupdate'),
('Super->Super->Sppd', 'Modsppd.Persekot.Create'),
('Super->Super->Sppd', 'Modsppd.Persekot.Delete'),
('Super->Super->Sppd', 'Modsppd.Persekot.Index'),
('Super->Super->Sppd', 'Modsppd.Persekot.Update'),
('Super->Super->Sppd', 'Modsppd.Persekot.View'),
('Super->Super->Sppd', 'Modsppd.PersekotDetail.*'),
('Super->Super->Sppd', 'Modsppd.PersekotDetail.Admin'),
('Super->Super->Sppd', 'Modsppd.PersekotDetail.Create'),
('Super->Super->Sppd', 'Modsppd.PersekotDetail.Delete'),
('Super->Super->Sppd', 'Modsppd.PersekotDetail.Index'),
('Super->Super->Sppd', 'Modsppd.PersekotDetail.Update'),
('Super->Super->Sppd', 'Modsppd.PersekotDetail.View'),
('Super->Super->Sppd', 'Modsppd.Personnel.*'),
('Super->Super->Sppd', 'Modsppd.Personnel.Admin'),
('Super->Super->Sppd', 'Modsppd.Personnel.Create'),
('Super->Super->Sppd', 'Modsppd.Personnel.Delete'),
('Super->Super->Sppd', 'Modsppd.Personnel.Index'),
('Super->Super->Sppd', 'Modsppd.Personnel.Update'),
('Super->Super->Sppd', 'Modsppd.Personnel.View'),
('Super->Super->Sppd', 'Modsppd.RABDinas.*'),
('Super->Super->Sppd', 'Modsppd.RABDinas.Admin'),
('Super->Super->Sppd', 'Modsppd.RABDinas.Create'),
('Super->Super->Sppd', 'Modsppd.RABDinas.Delete'),
('Super->Super->Sppd', 'Modsppd.RABDinas.Index'),
('Super->Super->Sppd', 'Modsppd.RABDinas.Update'),
('Super->Super->Sppd', 'Modsppd.RABDinas.View'),
('Super->Super->Sppd', 'Modsppd.RABNonDinas.*'),
('Super->Super->Sppd', 'Modsppd.RABNonDinas.Admin'),
('Super->Super->Sppd', 'Modsppd.RABNonDinas.Create'),
('Super->Super->Sppd', 'Modsppd.RABNonDinas.Delete'),
('Super->Super->Sppd', 'Modsppd.RABNonDinas.Index'),
('Super->Super->Sppd', 'Modsppd.RABNonDinas.Update'),
('Super->Super->Sppd', 'Modsppd.RABNonDinas.View'),
('Super->Super->Sppd', 'Modsppd.ReimburseBBM.*'),
('Super->Super->Sppd', 'Modsppd.ReimburseBBM.Admin'),
('Super->Super->Sppd', 'Modsppd.ReimburseBBM.Create'),
('Super->Super->Sppd', 'Modsppd.ReimburseBBM.Delete'),
('Super->Super->Sppd', 'Modsppd.ReimburseBBM.Index'),
('Super->Super->Sppd', 'Modsppd.ReimburseBBM.Update'),
('Super->Super->Sppd', 'Modsppd.ReimburseBBM.View'),
('Super->Super->Sppd', 'Modsppd.ReimburseJamuan.*'),
('Super->Super->Sppd', 'Modsppd.ReimburseJamuan.Admin'),
('Super->Super->Sppd', 'Modsppd.ReimburseJamuan.Create'),
('Super->Super->Sppd', 'Modsppd.ReimburseJamuan.Delete'),
('Super->Super->Sppd', 'Modsppd.ReimburseJamuan.Index'),
('Super->Super->Sppd', 'Modsppd.ReimburseJamuan.Update'),
('Super->Super->Sppd', 'Modsppd.ReimburseJamuan.View'),
('Super->Super->Sppd', 'Modsppd.ReportsSppd.*'),
('Admin->User', 'Modsppd.ReportsSppd.RekapSppd'),
('Super->Super->Sppd', 'Modsppd.ReportsSppd.RekapSppd'),
('Super->Super->Sppd', 'Modsppd.SetupBiaya.*'),
('Super->Super->Sppd', 'Modsppd.SetupBiaya.Admin'),
('Admin->User', 'Modsppd.SetupBiaya.Create'),
('Super->Super->Sppd', 'Modsppd.SetupBiaya.Create'),
('Admin->User', 'Modsppd.SetupBiaya.Delete'),
('Super->Super->Sppd', 'Modsppd.SetupBiaya.Delete'),
('Super->Super->Sppd', 'Modsppd.SetupBiaya.Index'),
('Super->Super->Sppd', 'Modsppd.SetupBiaya.Update'),
('Admin->User', 'Modsppd.SetupBiaya.View'),
('Super->Super->Sppd', 'Modsppd.SetupBiaya.View'),
('Super->Super->Sppd', 'Modsppd.UnitKerja.*'),
('Admin->User', 'Modsppd.UnitKerja.Admin'),
('Super->Super->Sppd', 'Modsppd.UnitKerja.Admin'),
('Admin->User', 'Modsppd.UnitKerja.Create'),
('Super->Super->Sppd', 'Modsppd.UnitKerja.Create'),
('Super->Super->Sppd', 'Modsppd.UnitKerja.Delete'),
('Super->Super->Sppd', 'Modsppd.UnitKerja.Index'),
('Super->Super->Sppd', 'Modsppd.UnitKerja.Update'),
('Admin->User', 'Modsppd.UnitKerja.View'),
('Super->Super->Sppd', 'Modsppd.UnitKerja.View'),
('Super->Super->Sppd', 'Modsppd.VoucherBiaya.*'),
('Admin->User', 'Modsppd.VoucherBiaya.AddNew'),
('Super->Super->Sppd', 'Modsppd.VoucherBiaya.AddNew'),
('Admin->User', 'Modsppd.VoucherBiaya.Admin'),
('Super->Super->Sppd', 'Modsppd.VoucherBiaya.Admin'),
('Admin->User', 'Modsppd.VoucherBiaya.Create'),
('Super->Super->Sppd', 'Modsppd.VoucherBiaya.Create'),
('Admin->User', 'Modsppd.VoucherBiaya.Delete'),
('Super->Super->Sppd', 'Modsppd.VoucherBiaya.Delete'),
('Admin->User', 'Modsppd.VoucherBiaya.Index'),
('Super->Super->Sppd', 'Modsppd.VoucherBiaya.Index'),
('Admin->User', 'Modsppd.VoucherBiaya.Update'),
('Super->Super->Sppd', 'Modsppd.VoucherBiaya.Update'),
('Admin->User', 'Modsppd.VoucherBiaya.UpdateAjax'),
('Super->Super->Sppd', 'Modsppd.VoucherBiaya.UpdateAjax'),
('Admin->User', 'Modsppd.VoucherBiaya.View'),
('Super->Super->Sppd', 'Modsppd.VoucherBiaya.View'),
('Admin->User', 'Modsppd.VoucherBiaya.Voucher'),
('Super->Super->Sppd', 'Modsppd.VoucherBiaya.Voucher'),
('Admin->User', 'Modsppd.VoucherBiaya.VoucherPdf'),
('Super->Super->Sppd', 'Modsppd.VoucherBiaya.VoucherPdf'),
('Super->Super->Sppd', 'Modsppd.VoucherInfo.*'),
('Admin->User', 'Modsppd.VoucherInfo.Admin'),
('Super->Super->Sppd', 'Modsppd.VoucherInfo.Admin'),
('Admin->User', 'Modsppd.VoucherInfo.Create'),
('Super->Super->Sppd', 'Modsppd.VoucherInfo.Create'),
('Admin->User', 'Modsppd.VoucherInfo.Delete'),
('Super->Super->Sppd', 'Modsppd.VoucherInfo.Delete'),
('Admin->User', 'Modsppd.VoucherInfo.Index'),
('Super->Super->Sppd', 'Modsppd.VoucherInfo.Index'),
('Admin->User', 'Modsppd.VoucherInfo.InfoVoucherBiaya'),
('Super->Super->Sppd', 'Modsppd.VoucherInfo.InfoVoucherBiaya'),
('Admin->User', 'Modsppd.VoucherInfo.InfoVoucherPersekot');
INSERT INTO `rbac_authitemchild` (`parent`, `child`) VALUES
('Super->Super->Sppd', 'Modsppd.VoucherInfo.InfoVoucherPersekot'),
('Admin->User', 'Modsppd.VoucherInfo.InfoVoucherSetPersekot'),
('Super->Super->Sppd', 'Modsppd.VoucherInfo.InfoVoucherSetPersekot'),
('Admin->User', 'Modsppd.VoucherInfo.Update'),
('Super->Super->Sppd', 'Modsppd.VoucherInfo.Update'),
('Admin->User', 'Modsppd.VoucherInfo.View'),
('Super->Super->Sppd', 'Modsppd.VoucherInfo.View'),
('Super->Super->Sppd', 'Modsppd.VoucherPersekot.*'),
('Admin->User', 'Modsppd.VoucherPersekot.AddNew'),
('Super->Super->Sppd', 'Modsppd.VoucherPersekot.AddNew'),
('Admin->User', 'Modsppd.VoucherPersekot.Admin'),
('Super->Super->Sppd', 'Modsppd.VoucherPersekot.Admin'),
('Admin->User', 'Modsppd.VoucherPersekot.Create'),
('Super->Super->Sppd', 'Modsppd.VoucherPersekot.Create'),
('Admin->User', 'Modsppd.VoucherPersekot.Delete'),
('Super->Super->Sppd', 'Modsppd.VoucherPersekot.Delete'),
('Admin->User', 'Modsppd.VoucherPersekot.Index'),
('Super->Super->Sppd', 'Modsppd.VoucherPersekot.Index'),
('Admin->User', 'Modsppd.VoucherPersekot.Update'),
('Super->Super->Sppd', 'Modsppd.VoucherPersekot.Update'),
('Admin->User', 'Modsppd.VoucherPersekot.UpdateAjax'),
('Super->Super->Sppd', 'Modsppd.VoucherPersekot.UpdateAjax'),
('Admin->User', 'Modsppd.VoucherPersekot.View'),
('Super->Super->Sppd', 'Modsppd.VoucherPersekot.View'),
('Admin->User', 'Modsppd.VoucherPersekot.Voucher'),
('Super->Super->Sppd', 'Modsppd.VoucherPersekot.Voucher'),
('Admin->User', 'Modsppd.VoucherPersekot.VoucherPdf'),
('Super->Super->Sppd', 'Modsppd.VoucherPersekot.VoucherPdf'),
('Super->Super->Sppd', 'Modsppd.VoucherSetPersekot.*'),
('Admin->User', 'Modsppd.VoucherSetPersekot.AddNew'),
('Super->Super->Sppd', 'Modsppd.VoucherSetPersekot.AddNew'),
('Admin->User', 'Modsppd.VoucherSetPersekot.Admin'),
('Super->Super->Sppd', 'Modsppd.VoucherSetPersekot.Admin'),
('Admin->User', 'Modsppd.VoucherSetPersekot.Create'),
('Super->Super->Sppd', 'Modsppd.VoucherSetPersekot.Create'),
('Admin->User', 'Modsppd.VoucherSetPersekot.Delete'),
('Super->Super->Sppd', 'Modsppd.VoucherSetPersekot.Delete'),
('Admin->User', 'Modsppd.VoucherSetPersekot.Index'),
('Super->Super->Sppd', 'Modsppd.VoucherSetPersekot.Index'),
('Admin->User', 'Modsppd.VoucherSetPersekot.Update'),
('Super->Super->Sppd', 'Modsppd.VoucherSetPersekot.Update'),
('Admin->User', 'Modsppd.VoucherSetPersekot.UpdateAjax'),
('Super->Super->Sppd', 'Modsppd.VoucherSetPersekot.UpdateAjax'),
('Admin->User', 'Modsppd.VoucherSetPersekot.View'),
('Super->Super->Sppd', 'Modsppd.VoucherSetPersekot.View'),
('Admin->User', 'Modsppd.VoucherSetPersekot.Voucher'),
('Super->Super->Sppd', 'Modsppd.VoucherSetPersekot.Voucher'),
('Admin->User', 'Modsppd.VoucherSetPersekot.VoucherPdf'),
('Super->Super->Sppd', 'Modsppd.VoucherSetPersekot.VoucherPdf'),
('PostAdministrator', 'Post.*'),
('PostAdministrator', 'Post.Admin'),
('Authenticated', 'Post.Create'),
('PostAdministrator', 'Post.Create'),
('Authenticated', 'Post.Delete'),
('PostAdministrator', 'Post.Delete'),
('PostAdministrator', 'Post.Update'),
('Guest', 'Post.View'),
('Editor', 'PostAdministrator'),
('Authenticated', 'PostUpdateOwn'),
('Editor', 'Site.*');

-- --------------------------------------------------------

--
-- Table structure for table `rbac_rights`
--

CREATE TABLE IF NOT EXISTS `rbac_rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rbac_user`
--

CREATE TABLE IF NOT EXISTS `rbac_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `salt` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `profile` text,
  `status` int(11) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=132 ;

--
-- Dumping data for table `rbac_user`
--

INSERT INTO `rbac_user` (`id`, `username`, `password`, `salt`, `email`, `profile`, `status`, `employee_id`) VALUES
(1, 'admin', '9401b8c7297832c567ae922cc596a4dd', '28b206548469ce62182048fd9cf91760', 'webmaster@example.com', NULL, 0, ''),
(14, 'resta', 'a6d43cc0e61ce74ce8a3a2e0872fa5a4', '519f0e9f677240.82335901', 'resta@mail.com', 'e', 1, 'resta'),
(70, 'lorentius.harsi', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001110001'),
(71, 'yaqub', '٢', '51b9698e028db8.26548997', 'tes@mail.com', '1', 1, '1110002'),
(72, 'abdillah', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '1110003'),
(73, 'zia.ulhaq', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '1110004'),
(74, 'supono', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '1110005'),
(75, 'ryan.novel', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001110007'),
(76, 'syaiful.alam', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001110009'),
(77, 'muharrir.asyari', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001110010'),
(78, 'ratna.sari', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001110012'),
(79, 'mulyadi', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001110013'),
(80, 'yosua.sondang', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001110015'),
(81, 'bayu.firdaus', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001110016'),
(82, 'shanty.rahayu', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001110017'),
(83, 'muhammad.muzrin', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001110018'),
(84, 'nanang.irawan', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '1110019'),
(85, 'pagi.apriyadi', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '1110020'),
(86, 'syamsudin', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001110021'),
(87, 'nino.zulfikar', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210024'),
(88, 'ahmad.syamsudin', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210025'),
(89, 'irwan.indrawijaya', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210026'),
(90, 'muhamad.azhar', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210027'),
(91, 'sayid.abu', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210028'),
(92, 'andri.firdaus', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210029'),
(93, 'ary.nurwadi', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210030'),
(94, 'felic.halim', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210031'),
(95, 'mirliansyah', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210032'),
(96, 'gunawan.raditya', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210033'),
(97, 'sunu.wicaksono', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210034'),
(98, 'hadi.famili', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210035'),
(99, 'rahmat', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210036'),
(100, 'tri.vita', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210037'),
(101, 'syarif.hidayatullah', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210038'),
(102, 'muhdiar', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210039'),
(103, 'siti.solihah', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210040'),
(104, 'richard.tito', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210041'),
(105, 'nugraha.sampurna', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210042'),
(106, 'ferdi.yosha', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210043'),
(107, 'gonna.richa', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210044'),
(108, 'micha.farid', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210045'),
(109, 'tegar.adiwijaya', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001210046'),
(110, 'anisatur.rokhmah', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001310047'),
(111, 'bagus', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001310048'),
(112, 'antonius.purwadi', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001310049'),
(113, 'gusti.ayu', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001310050'),
(114, 'anggi.saputra', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001310051'),
(115, 'ricky.wardhana', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001310052'),
(116, 'andrie.irmansyah', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001310053'),
(117, 'doddy.roesilawandie', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001310054'),
(118, 'hasbi.fahada', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001310055'),
(119, 'ronald.hasian', '35ee3f1468e8fe103bda49d9b4e535f8', '51a57b34f0cf13.09188382', 'tes@mail.com', '1', 1, '001310056'),
(120, 'dwipri', '03f55e417dbdcc25e6c639f7fbe4f5a5', '51b96c5119ffe3.80674645', 'tes@mail.com', '1', 1, '1310057'),
(121, 'bekasi1', 'caa9a5057bdf5c2419b928a089cf375d', '51ac19f166ad69.88699205', 'bekasi1@mail.com', 'tes', 1, 'bekasi1'),
(122, 'medan1', '32843a48ab80b0659fcd72ed69998aee', '51ac477b5deee6.42312353', 'medan1@yahoo.com', 'medan', 1, 'medan1'),
(123, 'ratna', '69d980df562500c1e7972f5c8e513c3f', '51ad4d3eeaf1e1.46673120', 'ratna@mail.com', '', 1, 'ratna'),
(124, 'doddy', '0f4c28dd3581d9e03c5acef56dfb44da', '51aee3a960ade7.04190910', 'doddy@mail.com', 'doddy', 1, 'doddy'),
(125, 'supriyadi', '69aff09437222f5d13899a453f454401', '51b18e69942740.11057468', 'supriyadi@mail.com', '', 1, 'supriyadi'),
(126, 'admintes', '1528033fdb9a3ef7e3796eef683ee864', '51babf15858259.54939592', 'email', 'tes', 1, 'admintes'),
(127, 'depepepep', '6d6adec04a67a47a7f46bc8191082d70', '51babf69855228.23747168', 'depe@mail.com', 'tes', 1, 'dedededepe'),
(128, 'imam', 'f039d1d277148b62a8441173bbc6c615', '51c28b5ab57512.37502832', 'imam@mail.com', '', 1, 'imam'),
(129, 'ishal', '42b4fbc943350bdfa94a2f59dbd83e9d', '51db704c69e7e3.17919205', 'ishal@mail.com', 'Testing', 1, '7777777'),
(130, 'ajeng', '7969d30c87927937e37dd7a13a352e5f', '51dbbed8b46ef7.62519957', 'ajeng@mail.com', '', 1, '100000101'),
(131, 'hanifa', '9d5c4ec77bf29f3f9aaba45b089fd9ab', '51dbbeec140022.01369225', 'hanifa@mail.com', '', 1, '10000102');

-- --------------------------------------------------------

--
-- Table structure for table `sppd_form`
--

CREATE TABLE IF NOT EXISTS `sppd_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(50) COLLATE latin1_bin NOT NULL,
  `name` varchar(50) COLLATE latin1_bin NOT NULL,
  `service_provider` varchar(20) COLLATE latin1_bin NOT NULL,
  `unit` varchar(20) COLLATE latin1_bin NOT NULL,
  `class` char(1) COLLATE latin1_bin NOT NULL,
  `destination` varchar(100) COLLATE latin1_bin NOT NULL,
  `purpose` text COLLATE latin1_bin NOT NULL,
  `departure` date NOT NULL,
  `arrival` date NOT NULL,
  `transport_type` varchar(15) COLLATE latin1_bin NOT NULL,
  `transport_vehicle` varchar(15) COLLATE latin1_bin NOT NULL,
  `sppd_type` varchar(10) COLLATE latin1_bin NOT NULL,
  `statement_letter` varchar(200) COLLATE latin1_bin DEFAULT NULL,
  `support_letter` varchar(200) COLLATE latin1_bin DEFAULT NULL,
  `created_by` varchar(50) COLLATE latin1_bin NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(10) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sppd_form`
--

INSERT INTO `sppd_form` (`id`, `employee_id`, `name`, `service_provider`, `unit`, `class`, `destination`, `purpose`, `departure`, `arrival`, `transport_type`, `transport_vehicle`, `sppd_type`, `statement_letter`, `support_letter`, `created_by`, `created_date`, `status`) VALUES
(1, '7777777', 'Afrishal', 'PGN SOLUTION', 'PGN SOLUTION', 'B', 'Jakarta', 'testing dinas', '2013-07-18', '2013-07-20', 'Sendiri', 'Pesawat Udara', 'Dinas', '', '', 'Dummy', '2013-07-18', 'created'),
(2, '7777777', 'Afrishal', 'PGN SOLUTION', 'PGN SOLUTION', 'A', 'Jakarta', 'test non dinas', '2013-07-18', '2013-07-19', 'Kendaraan Dinas', 'Pesawat Udara', 'Non-Dinas', '', '', 'Dummy', '2013-07-18', 'created');

-- --------------------------------------------------------

--
-- Table structure for table `sppd_form_persekot`
--

CREATE TABLE IF NOT EXISTS `sppd_form_persekot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sppd_id` int(11) NOT NULL,
  `paid_to` varchar(50) COLLATE latin1_bin NOT NULL,
  `received_from` varchar(50) COLLATE latin1_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_in_words` text COLLATE latin1_bin NOT NULL,
  `check_giro_date` date NOT NULL,
  `check_giro_number` varchar(20) COLLATE latin1_bin NOT NULL,
  `currency_code` char(3) COLLATE latin1_bin NOT NULL,
  `bank_code` char(3) COLLATE latin1_bin NOT NULL,
  `journal_number` varchar(20) COLLATE latin1_bin NOT NULL,
  `voucher_number` varchar(20) COLLATE latin1_bin NOT NULL,
  `voucher_date` date NOT NULL,
  `notes` text COLLATE latin1_bin,
  `created_by` varchar(50) COLLATE latin1_bin NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sppd_form_persekot`
--

INSERT INTO `sppd_form_persekot` (`id`, `sppd_id`, `paid_to`, `received_from`, `amount`, `amount_in_words`, `check_giro_date`, `check_giro_number`, `currency_code`, `bank_code`, `journal_number`, `voucher_number`, `voucher_date`, `notes`, `created_by`, `created_date`) VALUES
(1, 1, 'Afrishal', '-', 12541000, '-', '2013-07-18', '-', '-', '-', '-', '-', '2013-07-18', NULL, 'Dummy', '2013-07-18'),
(2, 2, 'Afrishal', '-', 350000, '-', '2013-07-18', '-', '-', '-', '-', '-', '2013-07-18', NULL, 'Dummy', '2013-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `sppd_letter_cost`
--

CREATE TABLE IF NOT EXISTS `sppd_letter_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `airport_tax_cost` int(11) NOT NULL,
  `airport_tax_quantity` int(11) NOT NULL,
  `laundry_cost` int(11) NOT NULL,
  `laundry_quantity` int(11) NOT NULL,
  `airline_cost` int(11) NOT NULL,
  `airline_quantity` int(11) NOT NULL,
  `hotel_cost` int(11) NOT NULL,
  `hotel_quantity` int(11) NOT NULL,
  `transportation_cost` int(11) NOT NULL,
  `transportation_quantity` int(11) NOT NULL,
  `from_to_cost` int(11) NOT NULL,
  `from_to_quantity` int(11) NOT NULL,
  `lumpsum_cost` int(11) NOT NULL,
  `lumpsum_quantity` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sppd_master_cost`
--

CREATE TABLE IF NOT EXISTS `sppd_master_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` char(1) COLLATE latin1_bin NOT NULL,
  `code` varchar(10) COLLATE latin1_bin NOT NULL,
  `description` varchar(100) COLLATE latin1_bin NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=36 ;

--
-- Dumping data for table `sppd_master_cost`
--

INSERT INTO `sppd_master_cost` (`id`, `class`, `code`, `description`, `amount`) VALUES
(4, 'A', 'btdk', 'Biaya Transport Dari & Ke', 100000),
(6, 'A', 'btst', 'Biaya Transport Sarana Transportasi', 200000),
(7, 'A', 'btdt', 'Biaya Transport Di Tempat Tujuan', 75000),
(8, 'A', 'bph', 'Biaya Penginapan Hotel', 500000),
(9, 'A', 'bum', 'Biaya Uang Makan', 75000),
(10, 'A', 'bm', 'Biaya Makan', 100000),
(11, 'A', 'uash', 'Uang Angkutan Setempat Harian', 70000),
(12, 'A', 'ush', 'Uang Saku Harian', 100000),
(13, 'A', 'da', 'Daily Allowance', 120000),
(14, 'A', 'pbp', 'Penggantian Biaya Penginapan', 400000),
(15, 'A', 'atd', 'Airport Tax Domestik', 50000),
(16, 'A', 'ati', 'Airport Tax Internasional', 150000),
(17, 'A', 'bcp', 'Biaya Cuci Pakaian', 50000),
(18, 'A', 'btp', 'Biaya Tunjangan Perlengkapan', 200000),
(19, 'A', 'us', 'Uang Saku', 100000),
(20, 'B', 'btdk', 'Biaya Transport Dari & Ke', 100000),
(22, 'B', 'btst', 'Biaya Transport Sarana Transportasi', 200000),
(23, 'B', 'btdt', 'Biaya Transport Di Tempat Tujuan', 75000),
(24, 'B', 'bph', 'Biaya Penginapan Hotel', 500000),
(25, 'B', 'bum', 'Biaya Uang Makan', 75000),
(26, 'B', 'bm', 'Biaya Makan', 100000),
(27, 'B', 'uash', 'Uang Angkutan Setempat Harian', 70000),
(28, 'B', 'ush', 'Uang Saku Harian', 100000),
(29, 'B', 'da', 'Daily Allowance', 120000),
(30, 'B', 'pbp', 'Penggantian Biaya Penginapan', 400000),
(31, 'B', 'atd', 'Airport Tax Domestik', 50000),
(32, 'B', 'ati', 'Airport Tax Internasional', 150000),
(33, 'B', 'bcp', 'Biaya Cuci Pakaian', 50000),
(34, 'B', 'btp', 'Biaya Tunjangan Perlengkapan', 200000),
(35, 'B', 'us', 'Uang Saku', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `sppd_master_destination`
--

CREATE TABLE IF NOT EXISTS `sppd_master_destination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sppd_master_destination`
--

INSERT INTO `sppd_master_destination` (`id`, `city`) VALUES
(1, 'Jakarta'),
(2, 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `sppd_other_reimburse`
--

CREATE TABLE IF NOT EXISTS `sppd_other_reimburse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `cc` varchar(50) COLLATE latin1_bin NOT NULL,
  `elbi` varchar(20) COLLATE latin1_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sppd_persekot_detail`
--

CREATE TABLE IF NOT EXISTS `sppd_persekot_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `account_code` char(6) COLLATE latin1_bin NOT NULL,
  `description` varchar(100) COLLATE latin1_bin NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sppd_persekot_detail`
--

INSERT INTO `sppd_persekot_detail` (`id`, `parent_id`, `account_code`, `description`, `debit`, `credit`, `created_date`, `created_by`) VALUES
(1, 1, '-', 'Persekot', 12541000, 0, '2013-07-18', 'Dummy'),
(2, 2, '-', 'Persekot', 350000, 0, '2013-07-18', 'Dummy');

-- --------------------------------------------------------

--
-- Table structure for table `sppd_personnel`
--

CREATE TABLE IF NOT EXISTS `sppd_personnel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sppd_id` int(11) NOT NULL,
  `employee_id` varchar(50) COLLATE latin1_bin NOT NULL,
  `name` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sppd_personnel`
--

INSERT INTO `sppd_personnel` (`id`, `sppd_id`, `employee_id`, `name`) VALUES
(1, 1, '7777777', 'Afrishal'),
(2, 1, '1310057', 'Dwi Priyanto'),
(3, 2, '7777777', 'Afrishal'),
(4, 2, '1310057', 'Dwi Priyanto');

-- --------------------------------------------------------

--
-- Table structure for table `sppd_rab_dinas`
--

CREATE TABLE IF NOT EXISTS `sppd_rab_dinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(50) COLLATE latin1_bin NOT NULL,
  `name` varchar(50) COLLATE latin1_bin NOT NULL,
  `sppd_id` int(11) NOT NULL,
  `cost_description` text COLLATE latin1_bin NOT NULL,
  `days` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=32 ;

--
-- Dumping data for table `sppd_rab_dinas`
--

INSERT INTO `sppd_rab_dinas` (`id`, `employee_id`, `name`, `sppd_id`, `cost_description`, `days`, `amount`, `created_date`, `created_by`) VALUES
(1, '7777777', 'Afrishal', 1, 'Biaya Transport Dari & Ke', 3, 200000, '2013-07-18', 'Dummy'),
(2, '7777777', 'Afrishal', 1, 'Biaya Transport Sarana Transportasi', 3, 600000, '2013-07-18', 'Dummy'),
(3, '7777777', 'Afrishal', 1, 'Biaya Transport Di Tempat Tujuan', 3, 225000, '2013-07-18', 'Dummy'),
(4, '7777777', 'Afrishal', 1, 'Biaya Penginapan Hotel', 3, 1500000, '2013-07-18', 'Dummy'),
(5, '7777777', 'Afrishal', 1, 'Biaya Uang Makan', 3, 225000, '2013-07-18', 'Dummy'),
(6, '7777777', 'Afrishal', 1, 'Biaya Makan', 3, 300000, '2013-07-18', 'Dummy'),
(7, '7777777', 'Afrishal', 1, 'Uang Angkutan Setempat Harian', 3, 210000, '2013-07-18', 'Dummy'),
(8, '7777777', 'Afrishal', 1, 'Uang Saku Harian', 3, 300000, '2013-07-18', 'Dummy'),
(9, '7777777', 'Afrishal', 1, 'Daily Allowance', 3, 360000, '2013-07-18', 'Dummy'),
(10, '7777777', 'Afrishal', 1, 'Penggantian Biaya Penginapan', 3, 1200000, '2013-07-18', 'Dummy'),
(11, '7777777', 'Afrishal', 1, 'Airport Tax Domestik', 3, 100000, '2013-07-18', 'Dummy'),
(12, '7777777', 'Afrishal', 1, 'Airport Tax Internasional', 3, 0, '2013-07-18', 'Dummy'),
(13, '7777777', 'Afrishal', 1, 'Biaya Cuci Pakaian', 3, 150000, '2013-07-18', 'Dummy'),
(14, '7777777', 'Afrishal', 1, 'Biaya Tunjangan Perlengkapan', 3, 600000, '2013-07-18', 'Dummy'),
(15, '7777777', 'Afrishal', 1, 'Uang Saku', 3, 300000, '2013-07-18', 'Dummy'),
(16, '1310057', 'Dwi Priyanto', 1, 'Biaya Transport Dari & Ke', 3, 200000, '2013-07-18', 'Dummy'),
(17, '1310057', 'Dwi Priyanto', 1, 'Biaya Transport Sarana Transportasi', 3, 600000, '2013-07-18', 'Dummy'),
(18, '1310057', 'Dwi Priyanto', 1, 'Biaya Transport Di Tempat Tujuan', 3, 225000, '2013-07-18', 'Dummy'),
(19, '1310057', 'Dwi Priyanto', 1, 'Biaya Penginapan Hotel', 3, 1500000, '2013-07-18', 'Dummy'),
(20, '1310057', 'Dwi Priyanto', 1, 'Biaya Uang Makan', 3, 225000, '2013-07-18', 'Dummy'),
(21, '1310057', 'Dwi Priyanto', 1, 'Biaya Makan', 3, 300000, '2013-07-18', 'Dummy'),
(22, '1310057', 'Dwi Priyanto', 1, 'Uang Angkutan Setempat Harian', 3, 210000, '2013-07-18', 'Dummy'),
(23, '1310057', 'Dwi Priyanto', 1, 'Uang Saku Harian', 3, 300000, '2013-07-18', 'Dummy'),
(24, '1310057', 'Dwi Priyanto', 1, 'Daily Allowance', 3, 360000, '2013-07-18', 'Dummy'),
(25, '1310057', 'Dwi Priyanto', 1, 'Penggantian Biaya Penginapan', 3, 1200000, '2013-07-18', 'Dummy'),
(26, '1310057', 'Dwi Priyanto', 1, 'Airport Tax Domestik', 3, 100000, '2013-07-18', 'Dummy'),
(27, '1310057', 'Dwi Priyanto', 1, 'Airport Tax Internasional', 3, 0, '2013-07-18', 'Dummy'),
(28, '1310057', 'Dwi Priyanto', 1, 'Biaya Cuci Pakaian', 3, 150000, '2013-07-18', 'Dummy'),
(29, '1310057', 'Dwi Priyanto', 1, 'Biaya Tunjangan Perlengkapan', 3, 600000, '2013-07-18', 'Dummy'),
(30, '1310057', 'Dwi Priyanto', 1, 'Uang Saku', 3, 300000, '2013-07-18', 'Dummy'),
(31, '7777777', 'Afrishal', 1, 'Tambahan Uang Jajan', 3, 1000, '2013-07-18', 'Dummy');

-- --------------------------------------------------------

--
-- Table structure for table `sppd_rab_nondinas`
--

CREATE TABLE IF NOT EXISTS `sppd_rab_nondinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(50) COLLATE latin1_bin NOT NULL,
  `name` varchar(50) COLLATE latin1_bin NOT NULL,
  `sppd_id` int(11) NOT NULL,
  `explanation` text COLLATE latin1_bin NOT NULL,
  `days` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `additional_description` text COLLATE latin1_bin NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sppd_rab_nondinas`
--

INSERT INTO `sppd_rab_nondinas` (`id`, `employee_id`, `name`, `sppd_id`, `explanation`, `days`, `amount`, `additional_description`, `created_date`, `created_by`) VALUES
(1, '7777777', 'Afrishal', 2, 'Jajan', 2, 100000, 'makan-makan', '2013-07-18', 'Dummy'),
(2, '1310057', 'Dwi Priyanto', 2, 'Komunikasi', 2, 250000, 'pulsa', '2013-07-18', 'Dummy');

-- --------------------------------------------------------

--
-- Table structure for table `sppd_reimburse_bbm`
--

CREATE TABLE IF NOT EXISTS `sppd_reimburse_bbm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `transaction_description` text COLLATE latin1_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `cc` varchar(50) COLLATE latin1_bin NOT NULL,
  `usage_type` varchar(20) COLLATE latin1_bin NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sppd_reimburse_jamuan`
--

CREATE TABLE IF NOT EXISTS `sppd_reimburse_jamuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `transaction_description` date NOT NULL,
  `amount` int(11) NOT NULL,
  `cc` varchar(50) COLLATE latin1_bin NOT NULL,
  `usage_type` varchar(50) COLLATE latin1_bin NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `srv_amr_data_request`
--

CREATE TABLE IF NOT EXISTS `srv_amr_data_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_type` varchar(30) NOT NULL,
  `request_date` date NOT NULL,
  `request_by` varchar(50) NOT NULL,
  `request_phone_email` varchar(30) NOT NULL,
  `request_division` varchar(30) NOT NULL,
  `request_issue` varchar(50) NOT NULL,
  `request_description` text NOT NULL,
  `request_solved_by` varchar(50) NOT NULL,
  `request_answer` text NOT NULL,
  `request_attachment` varchar(100) NOT NULL,
  `request_close_date` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `srv_amr_data_request`
--

INSERT INTO `srv_amr_data_request` (`id`, `request_type`, `request_date`, `request_by`, `request_phone_email`, `request_division`, `request_issue`, `request_description`, `request_solved_by`, `request_answer`, `request_attachment`, `request_close_date`, `created_by`, `created_date`) VALUES
(5, 'data pump', '2013-05-14', 'tes', 'Phone', 'Engineering', 'tes', 'gjh', 'dwi', '', 'attachment/requestattachment/screen.png', '0000-00-00', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `srv_amr_service_type`
--

CREATE TABLE IF NOT EXISTS `srv_amr_service_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `srv_amr_service_type`
--

INSERT INTO `srv_amr_service_type` (`id`, `type`, `description`) VALUES
(1, 'data pump', 'prosedur for data pump'),
(2, 'data bridge', 'request data from oracle bridge'),
(3, 'other ave function', 'other ave based function');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_help`
--

CREATE TABLE IF NOT EXISTS `tbl_help` (
  `id` int(11) NOT NULL,
  `code` varchar(64) DEFAULT NULL,
  `title_et` varchar(256) DEFAULT NULL,
  `content_et` text,
  `title_en` varchar(256) DEFAULT NULL,
  `content_en` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_table`
--

CREATE TABLE IF NOT EXISTS `test_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test` varchar(10) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `test_table`
--

INSERT INTO `test_table` (`id`, `test`) VALUES
(1, 'ahahahh'),
(2, 'as');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rbac_authassignment`
--
ALTER TABLE `rbac_authassignment`
  ADD CONSTRAINT `rbac_authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `rbac_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rbac_rights`
--
ALTER TABLE `rbac_rights`
  ADD CONSTRAINT `rbac_rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `rbac_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
