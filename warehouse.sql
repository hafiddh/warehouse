-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Jan 2018 pada 02.00
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouse`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_kamar`
--

CREATE TABLE `dim_kamar` (
  `IDkamar` varchar(10) NOT NULL,
  `kd_kamar` varchar(10) NOT NULL,
  `no_kelas` varchar(10) NOT NULL,
  `nama_pavilun` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dim_kamar`
--

INSERT INTO `dim_kamar` (`IDkamar`, `kd_kamar`, `no_kelas`, `nama_pavilun`) VALUES
('kmr_001', 'melati_1', 'A', 'melati'),
('kmr_002', 'melati_2', 'A', 'melati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_pasien`
--

CREATE TABLE `dim_pasien` (
  `IDpasien` varchar(10) NOT NULL,
  `nama_pasien` varchar(250) NOT NULL,
  `umur` int(3) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dim_pasien`
--

INSERT INTO `dim_pasien` (`IDpasien`, `nama_pasien`, `umur`, `jenis_kelamin`) VALUES
('psn_001', 'agung', 21, 'laki-laki'),
('psn_002', 'indah', 33, 'perempuan'),
('psn_003', 'ahmad', 20, 'laki-laki'),
('psn_004', 'kos', 33, 'perempuan'),
('psn_005', 'ipul', 20, 'laki-laki'),
('psn_006', 'a', 22, 'laki-laki'),
('psn_007', 'b', 24, 'perempuan'),
('psn_008', 'c', 26, 'laki-laki'),
('psn_009', 'd', 23, 'perempuan'),
('psn_010', 'e', 25, 'perempuan'),
('psn_011', 'f', 21, 'perempuan'),
('psn_012', 'g', 23, 'laki-laki'),
('psn_013', 'h', 17, 'laki-laki'),
('psn_014', 'i', 15, 'laki-laki'),
('psn_015', 'j', 28, 'laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_status`
--

CREATE TABLE `dim_status` (
  `IDstatus` varchar(10) NOT NULL,
  `nama_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dim_status`
--

INSERT INTO `dim_status` (`IDstatus`, `nama_status`) VALUES
('stat1', 'Aktif'),
('stat2', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_waktu`
--

CREATE TABLE `dim_waktu` (
  `ID_waktu` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dim_waktu`
--

INSERT INTO `dim_waktu` (`ID_waktu`, `tanggal`, `tahun`) VALUES
('16', '2013-11-09', 2013),
('17', '2013-10-01', 2013),
('18', '2013-02-10', 2013),
('19', '2013-08-02', 2013),
('2', '2017-12-04', 2017),
('20', '2014-05-02', 2014),
('21', '2014-11-09', 2014),
('22', '2014-10-01', 2014),
('23', '2014-02-10', 2014),
('24', '2014-08-02', 2014),
('25', '2015-05-02', 2015),
('26', '2015-11-09', 2015),
('27', '2015-10-01', 2015),
('28', '2015-02-10', 2015),
('29', '2015-08-02', 2015),
('3', '2016-12-04', 2016),
('30', '2016-05-02', 2016),
('31', '2016-11-09', 2016),
('32', '2016-10-01', 2016),
('33', '2016-02-10', 2016),
('34', '2016-08-02', 2016),
('35', '2017-05-02', 2017),
('36', '2017-11-09', 2017),
('37', '2017-10-01', 2017),
('38', '2017-02-10', 2017),
('39', '2017-08-02', 2017),
('4', '2015-03-10', 2015),
('45', '2012-05-02', 2012),
('46', '2012-11-09', 2012),
('47', '2012-10-01', 2012),
('48', '2012-02-10', 2012),
('49', '2012-08-02', 2012),
('5', '2014-09-29', 2014),
('6', '2013-06-17', 2013);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dm_diagnosa`
--

CREATE TABLE `dm_diagnosa` (
  `IDdiagnosa` varchar(10) NOT NULL,
  `kd_diagnosa` varchar(10) NOT NULL,
  `nama_diagnosa` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dm_diagnosa`
--

INSERT INTO `dm_diagnosa` (`IDdiagnosa`, `kd_diagnosa`, `nama_diagnosa`) VALUES
('dgn_001', '1', 'batouk'),
('dgn_002', '2', 'flu'),
('dgn_003', '3', 'cacingan'),
('dgn_004', '4', 'panu kronis'),
('dgn_005', '5', 'patah tulang belakang'),
('dgn_006', '6', 'kekurangan rusuk'),
('dgn_007', '7', 'hilang naluri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fact_pasien_rawat`
--

CREATE TABLE `fact_pasien_rawat` (
  `ID_waktu` varchar(10) NOT NULL,
  `IDpasien` varchar(10) NOT NULL,
  `IDstatus` varchar(10) NOT NULL,
  `IDdiagnosa` varchar(10) NOT NULL,
  `IDkamar` varchar(10) NOT NULL,
  `Jml_pasien` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fact_pasien_rawat`
--

INSERT INTO `fact_pasien_rawat` (`ID_waktu`, `IDpasien`, `IDstatus`, `IDdiagnosa`, `IDkamar`, `Jml_pasien`) VALUES
('16', 'psn_009', 'stat2', 'dgn_001', 'kmr_001', '1'),
('17', 'psn_015', 'stat2', 'dgn_003', 'kmr_002', '1'),
('18', 'psn_009', 'stat2', 'dgn_003', 'kmr_002', '1'),
('19', 'psn_007', 'stat2', 'dgn_001', 'kmr_002', '1'),
('2', 'psn_001', 'stat2', 'dgn_001', 'kmr_002', '1'),
('20', 'psn_014', 'stat2', 'dgn_007', 'kmr_001', '1'),
('21', 'psn_005', 'stat1', 'dgn_003', 'kmr_002', '1'),
('22', 'psn_014', 'stat1', 'dgn_003', 'kmr_002', '1'),
('23', 'psn_013', 'stat1', 'dgn_004', 'kmr_002', '1'),
('24', 'psn_006', 'stat2', 'dgn_001', 'kmr_002', '1'),
('25', 'psn_005', 'stat2', 'dgn_003', 'kmr_002', '1'),
('26', 'psn_006', 'stat2', 'dgn_004', 'kmr_002', '1'),
('27', 'psn_009', 'stat2', 'dgn_004', 'kmr_002', '1'),
('28', 'psn_006', 'stat2', 'dgn_002', 'kmr_002', '1'),
('29', 'psn_008', 'stat2', 'dgn_004', 'kmr_001', '1'),
('29', 'psn_011', 'stat2', 'dgn_006', 'kmr_001', '1'),
('3', 'psn_002', 'stat1', 'dgn_002', 'kmr_002', '1'),
('30', 'psn_009', 'stat1', 'dgn_004', 'kmr_002', '1'),
('31', 'psn_006', 'stat2', 'dgn_005', 'kmr_001', '1'),
('32', 'psn_007', 'stat2', 'dgn_006', 'kmr_001', '1'),
('33', 'psn_006', 'stat2', 'dgn_004', 'kmr_002', '1'),
('34', 'psn_011', 'stat1', 'dgn_003', 'kmr_002', '1'),
('35', 'psn_008', 'stat1', 'dgn_005', 'kmr_002', '1'),
('36', 'psn_003', 'stat2', 'dgn_003', 'kmr_001', '1'),
('37', 'psn_003', 'stat1', 'dgn_003', 'kmr_001', '1'),
('38', 'psn_003', 'stat2', 'dgn_006', 'kmr_002', '1'),
('39', 'psn_008', 'stat2', 'dgn_003', 'kmr_001', '1'),
('4', 'psn_005', 'stat2', 'dgn_003', 'kmr_002', '1'),
('45', 'psn_005', 'stat2', 'dgn_002', 'kmr_002', '1'),
('46', 'psn_005', 'stat2', 'dgn_005', 'kmr_001', '1'),
('47', 'psn_005', 'stat2', 'dgn_003', 'kmr_002', '1'),
('48', 'psn_003', 'stat1', 'dgn_005', 'kmr_001', '1'),
('49', 'psn_013', 'stat2', 'dgn_002', 'kmr_002', '1'),
('5', 'psn_010', 'stat2', 'dgn_007', 'kmr_002', '1'),
('6', 'psn_011', 'stat2', 'dgn_004', 'kmr_002', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dim_kamar`
--
ALTER TABLE `dim_kamar`
  ADD PRIMARY KEY (`IDkamar`);

--
-- Indexes for table `dim_pasien`
--
ALTER TABLE `dim_pasien`
  ADD PRIMARY KEY (`IDpasien`);

--
-- Indexes for table `dim_status`
--
ALTER TABLE `dim_status`
  ADD PRIMARY KEY (`IDstatus`);

--
-- Indexes for table `dim_waktu`
--
ALTER TABLE `dim_waktu`
  ADD PRIMARY KEY (`ID_waktu`);

--
-- Indexes for table `dm_diagnosa`
--
ALTER TABLE `dm_diagnosa`
  ADD PRIMARY KEY (`IDdiagnosa`);

--
-- Indexes for table `fact_pasien_rawat`
--
ALTER TABLE `fact_pasien_rawat`
  ADD KEY `ID_waktu` (`ID_waktu`,`IDpasien`,`IDstatus`,`IDdiagnosa`,`IDkamar`,`Jml_pasien`),
  ADD KEY `IDkamar` (`IDkamar`),
  ADD KEY `IDdiagnosa` (`IDdiagnosa`),
  ADD KEY `IDpasien` (`IDpasien`),
  ADD KEY `IDstatus` (`IDstatus`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `fact_pasien_rawat`
--
ALTER TABLE `fact_pasien_rawat`
  ADD CONSTRAINT `fact_pasien_rawat_ibfk_1` FOREIGN KEY (`IDkamar`) REFERENCES `dim_kamar` (`IDkamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_pasien_rawat_ibfk_2` FOREIGN KEY (`IDdiagnosa`) REFERENCES `dm_diagnosa` (`IDdiagnosa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_pasien_rawat_ibfk_3` FOREIGN KEY (`ID_waktu`) REFERENCES `dim_waktu` (`ID_waktu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_pasien_rawat_ibfk_4` FOREIGN KEY (`IDpasien`) REFERENCES `dim_pasien` (`IDpasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact_pasien_rawat_ibfk_5` FOREIGN KEY (`IDstatus`) REFERENCES `dim_status` (`IDstatus`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
