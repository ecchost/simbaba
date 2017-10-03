-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2016 at 02:19 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text,
  `id_pegawai` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `id_pegawai`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '00001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bangunan`
--

CREATE TABLE `bangunan` (
  `id_bangunan` varchar(30) NOT NULL,
  `kode_barang` varchar(30) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `no_reg` varchar(30) DEFAULT NULL,
  `kondisi` varchar(30) DEFAULT NULL,
  `tingkat` int(1) DEFAULT NULL,
  `beton` int(1) DEFAULT NULL,
  `luas_lantai` int(11) DEFAULT NULL,
  `letak` varchar(50) DEFAULT NULL,
  `tanggal_dokumen` varchar(10) DEFAULT NULL,
  `nomor_dokumen` varchar(30) DEFAULT NULL,
  `luas` int(11) DEFAULT NULL,
  `status_tanah` varchar(30) DEFAULT NULL,
  `nomor_kode_tanah` varchar(30) DEFAULT NULL,
  `asal` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `keterangan` text,
  `foto` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `id_subbid_barang` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(30) DEFAULT NULL,
  `kode_barang` varchar(30) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `id_subbid_barang` varchar(30) DEFAULT NULL,
  `id_bidang_barang` varchar(30) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `id_subbid_barang`, `id_bidang_barang`, `status`) VALUES
('01', '0101110401', 'Tanah Perkantoran', '0101', '01', 1),
('02', '0206010506', 'Pergantian Papan Nama', '0206', '02', 1),
('03', '0203010101', 'Sedan', '0203', '02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` varchar(10) NOT NULL,
  `nama_bidang` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama_bidang`, `status`) VALUES
('01', 'Sekretariat', 1),
('02', 'Bidang Pemerintahan', 1),
('03', 'Bidang Pembangunan/Ekonomi', 1),
('04', 'Bidang Kemasyarakatan', 1),
('05', 'Bidang Sarana Dan Prasarana', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bidang_barang`
--

CREATE TABLE `bidang_barang` (
  `id_bidang_barang` varchar(10) NOT NULL,
  `kode_bidang_barang` varchar(10) DEFAULT NULL,
  `nama_bidang_barang` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang_barang`
--

INSERT INTO `bidang_barang` (`id_bidang_barang`, `kode_bidang_barang`, `nama_bidang_barang`, `status`) VALUES
('01', '01', 'GOLONGAN TANAH', 1),
('02', '02', 'GOLONGAN PERALATAN DAN MESIN', 1),
('03', '03', 'GOLONGAN GEDUNG DAN BANGUNAN', 1),
('04', '04', 'GOLONGAN JALAN, IRIGASI DAN JARINGAN', 1),
('05', '05', 'GOLONGAN ASSET TETAP LAINNYA', 1),
('06', '06', 'GOLONGAN KONSTRUKSI DALAM PENGERJAAN', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` varchar(30) NOT NULL,
  `kode_lokasi` varchar(30) DEFAULT NULL,
  `lokasi` varchar(30) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `kode_lokasi`, `lokasi`, `status`) VALUES
('00001', '8079879', 'Lantai Atas', '1'),
('00002', '532532', 'Lantai Bawah', '1'),
('00003', '9083509', 'Lantai Tengah', '1');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_subbid`
--

CREATE TABLE `lokasi_subbid` (
  `id_lokasi` varchar(30) DEFAULT NULL,
  `id_subbid` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi_subbid`
--

INSERT INTO `lokasi_subbid` (`id_lokasi`, `id_subbid`) VALUES
('00001', '01'),
('00003', '01'),
('00001', '12');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id_merk` varchar(30) DEFAULT NULL,
  `kode_merk` varchar(30) DEFAULT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id_merk`, `kode_merk`, `merk`, `status`) VALUES
('00001', 'KJG', 'Kijang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `id_mutasi` varchar(30) NOT NULL,
  `id_subbid_barang` varchar(10) DEFAULT NULL,
  `jumlah_awal` varchar(30) DEFAULT NULL,
  `nilai_awal` varchar(30) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `nilai` varchar(20) DEFAULT NULL,
  `jenis` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `tanggal` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(20) NOT NULL,
  `nip` varchar(25) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `pangkat` varchar(60) DEFAULT NULL,
  `jabatan` varchar(40) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama`, `pangkat`, `jabatan`, `status`) VALUES
('00001', '19570414 198603 1 007', 'Drs. AGUNG HARIANTO.,M.Si', 'Pembina Utama Madya', 'KEPALA BAKORWIL BOJONEGORO', 1),
('00002', '19581210 198509 1 001', 'DEDDY FERDINAND IZAAC., SH.,M.Si', 'Pembina Tk. I', 'SEKRETARIS BAKORWIL BOJONEGORO', 1),
('00003', '19610403 198701 1 002', 'Ir. TEGUH SATOTO., MM', 'Pembina Tk. I', 'KEPALA BIDANG PEMBANGUNAN EKONOMI', 1),
('00004', '19600523 198003 2 002', 'Dra. SULARNI., MM', 'Pembina Tk. I', 'KEPALA BIDANG KEMASYARAKATAN', 1),
('00005', '19670530 198903 1 006', 'EDI SUPAJI, SH.,MM', 'Pembina             ', 'KEPALA BIDANG SARANA PRASARANA', 1),
('00006', ' 19620103 198503 1 013', 'SOLEMAN.,SH.,MM', 'Pembina             ', 'KASUBBID. TRANTIB & LINMAS', 1),
('00007', '19650612 198701 1 002', 'RAMSES PANJAITAN, S.Sos., MM', 'Pembina             ', 'KASUBBAG. SUNGRAM', 1),
('00008', '19660210 199003 1 012', 'Drs. EDHI SIGIT SATYANTO.,MM', 'Pembina             ', 'KASUBBID. LINGK. HIDUP', 1),
('00009', '19620626 198903 1 010', 'Ir. SUHARNO', 'Penata Tk. I   ', 'KASUBBAG. KEUANGAN', 1),
('00010', '19591218 198208 1 002', 'SUHARTO,SE', 'Penata Tk. I   ', 'KASUBBID. FISIK SARPRAS', 1),
('00011', '19630629 198603 1 006', 'ASMURIJONO, SH.,MA', 'Penata Tk. I   ', 'KASUBBID. PEMBERDAYAAN MASYARAKAT', 1),
('00012', '19620615 199003 1 009', 'HARY SUSANTO', 'Penata          ', 'KASUBBID. PEREKONOMIAN', 1),
('00013', '19680810 199010 2 001', 'ISMUNDIYAH ,S.Sos', 'Penata          ', 'KASUBBID. SOSIAL BUDAYA', 1),
('00014', '19701021 199503 1 003', 'JIYOTOMO, S.Sos', 'Penata          ', 'KASUBBAG. TATA USAHA', 1),
('00015', '19701123 201001 1 001', 'YOTO, ST', 'Penata          ', 'KASUBBID. PDU', 1),
('00016', '19781204 201001 2 002', 'VIVIT NURHIDAYAH, SH', 'Penata          ', 'KASUBBID. PEMERINTAHAN UMUM', 1),
('00017', '19850816 201101 1 008', 'AHMAD SYU''AIB JAMALI, S.Kom.,M.Si', 'Penata Md Tk. I ', 'STAF SUBBAG. SUNGRAM', 1),
('00018', '19830125 201001 1 014', 'YANUAR OKKY PRIBADI KRR.,ST', 'Penata Md.', 'STAF SUBBID. SARANA PRASARANA', 1),
('00019', '19681025 199010 1 001', 'SUROSO, S.Sos', 'Penata Md.', 'STAF SUBBAG. KEUANGAN ', 1),
('00020', '19680609 199803 2 001', 'JUNIATI INDRIASTUTI', 'Pengatur Tk. I ', 'STAF SUBBID. PEMERINTAHAN', 1),
('00021', '19681107 199803 2 002', 'MARIJANIK', 'Pengatur Tk. I ', 'STAF SUBBID. KEMASYARAKATAN', 1),
('00022', '19690510 199903 1 013', 'MINANUR ROHMAN', 'Pengatur Tk. I ', 'STAF SUBBAG. TATA USAHA', 1),
('00023', '19620612 198508 1 007', 'IRIANTO', 'Pengatur ', 'STAF SUBBAG. TATA USAHA', 1),
('00024', '19590706 198207 1 001', 'SUWARDI', 'Pengatur ', 'STAF SUBBAG. TATA USAHA', 1),
('00025', '19911203 201503 2 004', 'LAELY RIFATIN.,A.Md', 'Pengatur ', 'STAF SUBBAG. SUNGRAM', 1),
('00026', '19930518 201503 2 004', 'FITRI NUR AISYAH PUSPITASARI.,A.Md', 'Pengatur ', 'STAF SUBBAG. KEUANGAN', 1),
('00027', '19700403 200801 2 019', 'SITI FATIMAH', 'Pengatur ', 'STAF SUBBAG. TATA USAHA', 1),
('00028', '19710108 200801 1 005', 'SUTRISNO', 'Pengatur ', 'STAF SUBBAG. TATA USAHA', 1),
('00029', '19751228 200801 1 005', 'ANANG HERDIYANTO', 'Pengatur ', 'STAF SUBBAG. TATA USAHA', 1),
('00030', '19750716 200901 1 003', 'AHMAD SAMSUL HADI', 'Pengatur Md Tk.I ', 'STAF SUBBID. PEREKONOMIAN', 1),
('00031', '19680310 201001 1 003', 'R. ARIF MARTONO A.S.', 'Pengatur Md Tk.I ', 'STAF SUBBAG. TATA USAHA', 1),
('00032', '19720709 201001 1 001', 'JUWARI', 'Pengatur Md Tk.I ', 'STAF SUBBAG. TATA USAHA', 1),
('00033', '19740515 201001 1 004', 'SUTAJI', 'Pengatur Md Tk.I ', 'STAF SUBBAG. KEUANGAN', 1),
('00034', '19780128 201001 1 006', 'MOCH. YUSRON', 'Pengatur Md Tk.I ', 'STAF SUBBID. KEMASYARAKATANi', 1),
('00035', '19790305 201001 2 006', 'TARMINI', 'Pengatur Md Tk.I ', 'STAF SUBBAG. KEUANGAN', 1),
('00036', '19790418 201001 1 002', 'SYAEFUDDIN', 'Pengatur Md Tk.I ', 'STAF SUBBAG. TATA USAHA', 1),
('00037', '19800309 201001 1 002', 'DENDY WINARKO', 'Pengatur Md Tk.I ', 'STAF SUBBID. PEREKONOMIAN', 1),
('00038', '19750216 200701 1 016', 'MOCH. MA''RUF', 'Pengatur Md Tk.I ', 'STAF SUBBAG. KEUANGAN', 1),
('00039', '19750616 200901 1 007', 'JAMIRAN', 'Pengatur Md Tk.I ', 'STAF SUBBAG. TATA USAHA', 1),
('00040', '19760910 200801 1 012', 'SURYADI', 'Pengatur Md Tk.I ', 'STAF SUBBID. PEMERINTAHAN', 1),
('00041', '19690301 200701 1 019', 'MAT MA''UN', 'Pengatur Md Tk.I ', 'STAF SUBBAG. TATA USAHA', 1),
('00042', '19610313 198507 1 001', 'DASIYO', 'Pengatur Md  ', 'STAF SUBBAG. TATA USAHA', 1),
('00043', '19640626 199211 2 002', 'KUSTIANIK', 'Pengatur Md  ', 'STAF SUBBAG. TATA USAHA', 1),
('00044', '19710403 200801 1 016', 'MASRUM', 'Pengatur Md  ', 'STAF SUBBID. PEMERINTAHAN', 1),
('00045', '19691222 200701 1 014', 'MUSAFAK', 'Juru    ', 'STAF SUBBID. SARANA PRASARANA', 1),
('00046', '215-10031985-062010-3766', 'ANTON PRASETYADI,S.S.os.', 'PTT', 'STAF SUBBAG. TATA USAHA', 1),
('00047', '215-18051988-012012-3767', 'MOCHAMAD ARIEF FITRIANZYAH,SH    ', 'PTT', 'STAF SUBBAG. KEUANGAN', 1),
('00048', '215-15031984-012012-3768', 'RIZA WAHYUWIDYA, SE                  ', 'PTT', 'STAF SUBBAG. SUNGRAM', 1),
('00049', '215-21041983-012012-3769', 'KARTINI PUSPITASARI, SE              ', 'PTT', 'STAF SUBBAG. KEUANGAN', 1),
('00050', '215-12021991-012012-3770', 'SITI NURCAHYANINGSIH             ', 'PTT', 'STAF SUBBID. LINGK. HIDUP', 1),
('00051', '215-04021990-062010-3771', 'SUPITA AGUNG SUSELO', 'PTT', 'STAF SUBBAG. KEUANGAN', 1),
('00052', '215-16071987-062010-3772', 'YULI ROKIMIN', 'PTT', 'STAF SUBBID. PENGEMB. DUNIA USAHA', 1),
('00053', '215-26031990-062010-3773', 'MOCH. MISBAKUL MUNIB', 'PTT', 'STAF SUBBAG. TATA USAHA', 1),
('00054', '215-16071989-062010-3774', 'JOKO SUSILO', 'PTT', 'STAF SUBBAG. TATA USAHA', 1),
('00055', '215-29041985-062010-3775', 'ANDI SUDARSONO', 'PTT', 'STAF SUBBAG. TATA USAHA', 1),
('00056', '215-10091978-012011-3776', 'KAFID SUYUDI', 'PTT', 'STAF SUBBAG. TATA USAHA', 1),
('00057', '215-20021988-012012-3777', 'RIEZA DWANGGA PUTRA                ', 'PTT', 'STAF SUBBID. PEMBERD. MASYARAKAT', 1),
('00058', '215-05051980-012012-3778', 'M. KHUNDLORI                            ', 'PTT', 'STAF SUBBAG. TATA USAHA', 1),
('00059', '215-12031993-012012-3779', 'ARIESTA HERU SETIYAWAN  ', 'PTT', 'STAF SUBBAG. TATA USAHA', 1),
('00060', '215-12021991-012012-3780', 'MUHAMMAD DIAN FEBUANTO                            ', 'PTT', 'STAF SUBBAG. TATA USAHA', 1),
('00061', '215-17041990-012012-3781', 'RENGGA JUDA PURNAMAHADI                           ', 'PTT', 'STAF SUBBAG. TATA USAHA', 1),
('00062', '215-03051972-012012-3782', 'SAMI''NAH                                  ', 'PTT', 'STAF SUBBAG. TATA USAHA', 1),
('00063', '215-18011967-062010-3783', 'PARMO', 'PTT', 'STAF SUBBAG. TATA USAHA', 1),
('00064', '215-27031989-012014-3784', 'RAHMANDA FIRMANSYAH', 'PTT', 'STAF SUBBAG. TATA USAHA', 1),
('00065', '215-15101980-012016-7700', 'ISLAM SAKSONO', 'PTT', 'STAF SUBBAG. TATA USAHA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `peralatan_mesin`
--

CREATE TABLE `peralatan_mesin` (
  `id_peralatan_mesin` varchar(30) NOT NULL,
  `kode_barang` varchar(20) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `no_reg` varchar(20) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `ukuran` varchar(30) DEFAULT NULL,
  `bahan` varchar(50) DEFAULT NULL,
  `tahun_pembelian` year(4) DEFAULT NULL,
  `no_pabrik` varchar(50) DEFAULT NULL,
  `no_rangka` varchar(50) DEFAULT NULL,
  `no_mesin` varchar(50) DEFAULT NULL,
  `no_polisi` varchar(50) DEFAULT NULL,
  `no_bpkb` varchar(50) DEFAULT NULL,
  `asal` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `scan_bpkb` varchar(50) DEFAULT NULL,
  `scan_stnk` varchar(50) DEFAULT NULL,
  `scan_foto` varchar(50) DEFAULT NULL,
  `id_pemegang` varchar(30) DEFAULT NULL,
  `tanggal_pajak` varchar(10) DEFAULT NULL,
  `kondisi` varchar(30) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `id_subbid_barang` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subbid`
--

CREATE TABLE `subbid` (
  `id_subbid` varchar(10) NOT NULL,
  `nama_subbid` varchar(50) DEFAULT NULL,
  `id_bidang` varchar(10) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subbid`
--

INSERT INTO `subbid` (`id_subbid`, `nama_subbid`, `id_bidang`, `status`) VALUES
('01', 'SUNGRAM', '01', 1),
('02', 'Keuangan', '01', 1),
('03', 'Tata Usaha', '01', 1),
('04', 'Pemerintahan Umum', '02', 1),
('05', 'TRANTIB/LINMAS', '02', 1),
('06', 'Ekonomi', '03', 1),
('07', 'PDU', '03', 1),
('08', 'Sosial Budaya', '04', 1),
('09', 'Pemberdayaan Masyarakat', '04', 1),
('10', 'Lingkungan Hidup', '05', 1),
('11', 'Sarana Dan Prasarana', '05', 1),
('12', 'Bagian Keuangan', '01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subbid_barang`
--

CREATE TABLE `subbid_barang` (
  `id_subbid_barang` varchar(10) NOT NULL,
  `kode_subbid_barang` varchar(10) DEFAULT NULL,
  `nama_subbid_barang` varchar(50) DEFAULT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `id_bidang_barang` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subbid_barang`
--

INSERT INTO `subbid_barang` (`id_subbid_barang`, `kode_subbid_barang`, `nama_subbid_barang`, `satuan`, `status`, `id_bidang_barang`) VALUES
('0101', '0101', 'TANAH', 'Bidang', 1, '01'),
('0202', '0202', 'ALAT-ALAT BESAR', 'Buah / Set', 1, '02'),
('0203', '0203', 'ALAT-ALAT ANGKUTAN', 'Buah / Set', 1, '02'),
('0204', '0204', 'ALAT BENGKEL DAN ALAT UKUR', 'Buah', 1, '02'),
('0205', '0205', 'ALAT PERTANIAN', 'Buah/Set', 1, '02'),
('0206', '0206', 'ALAT KANTOR DAN RUMAH TANGGA', 'Buah', 1, '02'),
('0207', '0207', 'ALAT STUDIO DAN ALAT KOMUNIKASI', 'Buah', 1, '02'),
('0208', '0208', 'ALAT-ALAT KEDOKTERAN', 'Buah', 1, '02'),
('0209', '0209', 'ALAT LABORATORIUM', 'Buah', 1, '02'),
('0210', '0210', 'ALAT-ALAT PERSENJATAAN/KEAMANAN', 'Buah', 1, '02'),
('0311', '0311', 'BANGUNAN GEDUNG', 'Buah', 1, '03'),
('0312', '0312', 'MONUMEN', 'Buah', 1, '03'),
('0413', '0413', 'JALAN DAN JEMBATAN', 'Buah', 1, '04'),
('0414', '0414', 'BANGUNAN AIR IRIGASI', 'Buah', 1, '04'),
('0415', '0415', 'INSTALASI', 'Buah', 1, '04'),
('0416', '0416', 'JARINGAN', 'Buah', 1, '04'),
('0517', '0517', 'BUKU DAN PERPUSTAKAAN', 'Buah', 1, '05'),
('0518', '0518', 'BARANG BERCORAK KEBUDAYAAN', 'Buah', 1, '05'),
('0519', '0519', 'HEWAN TERNAK SERTA TANAMAN', 'Buah', 1, '05');

-- --------------------------------------------------------

--
-- Table structure for table `tanah`
--

CREATE TABLE `tanah` (
  `id_tanah` varchar(30) NOT NULL,
  `kode_barang` varchar(30) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `register` varchar(30) DEFAULT NULL,
  `luas` int(11) DEFAULT NULL,
  `tahun_pengadaan` year(4) DEFAULT NULL,
  `letak` text,
  `hak` varchar(30) DEFAULT NULL,
  `tanggal_sertifikat` varchar(10) DEFAULT NULL,
  `nomor_sertifikat` varchar(10) DEFAULT NULL,
  `penggunaan` varchar(50) DEFAULT NULL,
  `asal` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `scan_sertifikat` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `id_subbid_barang` varchar(30) DEFAULT NULL,
  `tanggal` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bangunan`
--
ALTER TABLE `bangunan`
  ADD PRIMARY KEY (`id_bangunan`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `bidang_barang`
--
ALTER TABLE `bidang_barang`
  ADD PRIMARY KEY (`id_bidang_barang`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id_mutasi`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `peralatan_mesin`
--
ALTER TABLE `peralatan_mesin`
  ADD PRIMARY KEY (`id_peralatan_mesin`);

--
-- Indexes for table `subbid`
--
ALTER TABLE `subbid`
  ADD PRIMARY KEY (`id_subbid`);

--
-- Indexes for table `subbid_barang`
--
ALTER TABLE `subbid_barang`
  ADD PRIMARY KEY (`id_subbid_barang`);

--
-- Indexes for table `tanah`
--
ALTER TABLE `tanah`
  ADD PRIMARY KEY (`id_tanah`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
