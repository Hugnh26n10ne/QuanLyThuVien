-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2024 at 06:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlythuvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin1', 1999),
(2, 'admin2', 2999),
(3, 'admin3', 3999),
(4, 'luong', 1),
(5, 'luong', 2),
(6, 'luong', 1),
(7, 'admin7', 0),
(8, 'admin8', 0),
(9, 'admin9', 0),
(10, 'admin10', 0),
(11, 'admin11', 0),
(12, 'admin12', 0),
(13, 'admin13', 0),
(14, 'admin14', 0),
(15, 'admin15', 0),
(16, 'admin16', 0),
(17, 'admin17', 0),
(18, 'admin18', 0),
(19, 'admin19', 0),
(20, 'admin20', 0),
(21, 'admin21', 0),
(22, 'admin22', 0),
(23, 'admin23', 0),
(24, 'admin24', 0),
(25, 'admin25', 0),
(26, 'admin26', 0),
(27, 'admin27', 0),
(28, 'admin28', 0),
(29, 'admin29', 0),
(30, 'admin30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `muontrasach`
--

CREATE TABLE `muontrasach` (
  `mamuontra` int(11) NOT NULL,
  `masach` int(20) NOT NULL,
  `mauser` varchar(100) NOT NULL,
  `ngaymuon` date NOT NULL,
  `ngayphaitra` date NOT NULL,
  `ngaytra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `muontrasach`
--

INSERT INTO `muontrasach` (`mamuontra`, `masach`, `mauser`, `ngaymuon`, `ngayphaitra`, `ngaytra`) VALUES
(1, 1, 'sv1', '2024-12-10', '2024-12-12', '2024-12-13'),
(3, 3, 'sv3', '2024-12-12', '2024-12-14', '2024-12-15'),
(4, 4, 'sv4', '2024-12-13', '2024-12-15', '2024-12-16'),
(5, 5, 'sv5', '2024-12-14', '2024-12-16', '2024-12-17'),
(6, 6, 'sv6', '2024-12-15', '2024-12-17', '2024-12-18'),
(7, 7, 'sv7', '2024-12-16', '2024-12-18', '2024-12-19'),
(8, 8, 'sv8', '2024-12-17', '2024-12-19', '2024-12-20'),
(9, 9, 'sv9', '2024-12-18', '2024-12-20', '2024-12-21'),
(10, 10, 'sv10', '2024-12-19', '2024-12-21', '2024-12-22'),
(11, 11, 'sv11', '2024-12-20', '2024-12-22', '2024-12-23'),
(12, 12, 'sv12', '2024-12-21', '2024-12-23', '2024-12-24'),
(13, 13, 'sv13', '2024-12-22', '2024-12-24', '2024-12-25'),
(14, 14, 'sv14', '2024-12-23', '2024-12-25', '2024-12-26'),
(15, 15, 'sv15', '2024-12-24', '2024-12-26', '2024-12-27'),
(17, 17, 'sv17', '2024-12-26', '2024-12-28', '2024-12-29'),
(18, 18, 'sv18', '2024-12-27', '2024-12-29', '2024-12-30'),
(19, 19, 'sv19', '2024-12-28', '2024-12-30', '2024-12-31'),
(20, 20, 'sv20', '2024-12-29', '2024-12-31', '2025-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `mauser` varchar(100) NOT NULL,
  `masinhvien` varchar(100) NOT NULL,
  `matkhau` varchar(20) NOT NULL,
  `tensinhvien` varchar(200) NOT NULL,
  `namsinh` int(100) NOT NULL,
  `gioitinh` varchar(100) NOT NULL,
  `sodienthoai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`mauser`, `masinhvien`, `matkhau`, `tensinhvien`, `namsinh`, `gioitinh`, `sodienthoai`) VALUES
('sv1', 'msv001', 'mk1', 'Phạm Văn Tân', 2005, 'Nam', '0154786513'),
('sv10', 'msv010', 'mk10', 'Hoang Van E', 2003, 'nam', '0123456793'),
('sv11', 'msv011', 'mk11', 'Do Thi F', 2001, 'nu', '0123456794'),
('sv12', 'msv012', 'mk12', 'Bui Van G', 2000, 'nam', '0123456795'),
('sv13', 'msv013', 'mk13', 'Nguyen Thi H', 2002, 'nu', '0123456796'),
('sv14', 'msv014', 'mk14', 'Tran Van I', 1999, 'nam', '0123456797'),
('sv15', 'msv015', 'mk15', 'Le Thi J', 2003, 'nu', '0123456798'),
('sv16', 'msv016', 'mk16', 'Pham Van K', 2001, 'nam', '0123456799'),
('sv17', 'msv017', 'mk17', 'Hoang Thi L', 2000, 'nu', '0123456700'),
('sv18', 'msv018', 'mk18', 'Do Van M', 2002, 'nam', '0123456701'),
('sv19', 'msv019', 'mk19', 'Bui Thi N', 1999, 'nu', '0123456702'),
('sv2', 'msv002', '1', 'Trần Văn Quý', 2002, 'nam', '0154548447'),
('sv20', 'msv020', 'mk20', 'Nguyen Van O', 2003, 'nam', '0123456703'),
('sv21', 'msv021', 'mk21', 'Tran Thi P', 2001, 'nu', '0123456704'),
('sv22', 'msv022', 'mk22', 'Le Van Q', 2000, 'nam', '0123456705'),
('sv23', 'msv023', 'mk23', 'Pham Thi R', 2002, 'nu', '0123456706'),
('sv24', 'msv024', 'mk24', 'Hoang Van S', 1999, 'nam', '0123456707'),
('sv25', 'msv025', 'mk25', 'Do Thi T', 2003, 'nu', '0123456708'),
('sv26', 'msv026', 'mk26', 'Bui Van U', 2001, 'nam', '0123456709'),
('sv27', 'msv027', 'mk27', 'Nguyen Thi V', 2000, 'nu', '0123456710'),
('sv28', 'msv028', 'mk28', 'Tran Van W', 2002, 'nam', '0123456711'),
('sv29', 'msv029', 'mk29', 'Le Thi X', 1999, 'nu', '0123456712'),
('sv3', 'msv003', '2', 'Nguyễn Văn Tân', 1999, 'nam', '0987565513'),
('sv30', 'msv030', 'mk30', 'Pham Van Y', 2003, 'nam', '0123456713'),
('sv31', 'msv031', 'mk31', 'Hoang Thi Z', 2001, 'nu', '0123456714'),
('sv32', 'msv032', 'mk32', 'Do Van AA', 2000, 'nam', '0123456715'),
('sv33', 'msv033', 'mk33', 'Bui Thi BB', 2002, 'nu', '0123456716'),
('sv34', 'msv034', 'mk34', 'Nguyen Van CC', 1999, 'nam', '0123456717'),
('sv35', 'msv035', 'mk35', 'Tran Thi DD', 2003, 'nu', '0123456718'),
('sv4', 'msv004', '2', 'Phạm Văn Hồng', 1998, 'nữ', '0154568753'),
('sv5', 'msv005', '3', 'Trần Ngọc Lương', 2004, 'nam', '0064786513'),
('sv6', 'msv006', 'mk6', 'Nguyen Van A', 2001, 'nam', '0123456789'),
('sv7', 'msv007', 'mk7', 'Tran Thi B', 2000, 'nu', '0123456790'),
('sv8', 'msv008', 'mk8', 'Le Van C', 2002, 'nam', '0123456791'),
('sv9', 'msv009', 'mk9', 'Pham Thi D', 1999, 'nu', '0123456792');

-- --------------------------------------------------------

--
-- Table structure for table `ttinsach`
--

CREATE TABLE `ttinsach` (
  `masach` int(20) NOT NULL,
  `tensach` varchar(100) NOT NULL,
  `tacgia` varchar(100) NOT NULL,
  `namxb` varchar(100) NOT NULL,
  `theloai` varchar(100) NOT NULL,
  `ngaynhap` date NOT NULL,
  `tinhtrang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ttinsach`
--

INSERT INTO `ttinsach` (`masach`, `tensach`, `tacgia`, `namxb`, `theloai`, `ngaynhap`, `tinhtrang`) VALUES
(1, 'Sách Toán Cao Cấp', 'Nguyễn Hữu Trung', '2005', 'Toán họcc', '2020-12-02', '1'),
(3, 'Giáo Trình Lập Trình C#', 'Trần Đại Nghĩa', '2010', 'Công nghệ thông tin', '2022-03-10', '0'),
(4, 'Học Máy Cơ Bản', 'Nguyễn Minh Đức', '2018', 'Công nghệ thông tin', '2023-01-20', '1'),
(5, 'Vật Lý Đại Cương', 'Hoàng Văn Bình', '2012', 'Vật lý', '2021-07-08', '0'),
(6, 'Cơ Sở Dữ Liệu', 'Phạm Anh Tuấn', '2015', 'Công nghệ thông tin', '2022-11-18', '1'),
(7, 'Nhập Môn Xác Suất Thống Kê', 'Lê Hồng Phúc', '2011', 'Toán học', '2020-09-12', '0'),
(8, 'Phân Tích Kinh Tế', 'Nguyễn Thị Hạnh', '2013', 'Kinh tế', '2021-06-14', '1'),
(9, 'Lịch Sử Việt Nam', 'Phạm Văn Dũng', '2005', 'Lịch sử', '2022-02-25', '0'),
(10, 'Hóa Học Hữu Cơ', 'Trần Thanh Hương', '2009', 'Hóa học', '2023-03-19', '1'),
(11, 'Kỹ Thuật Lập Trình', 'Nguyễn Văn Quang', '2016', 'Công nghệ thông tin', '2020-10-10', '0'),
(12, 'Tiếng Anh Chuyên Ngành', 'Lê Minh Tâm', '2014', 'Ngoại ngữ', '2022-08-05', '1'),
(13, 'Marketing Cơ Bản', 'Hoàng Thị Lan', '2019', 'Kinh tế', '2023-04-12', '0'),
(14, 'Hướng Dẫn Sử Dụng AutoCAD', 'Phạm Quốc Bảo', '2020', 'Kỹ thuật', '2023-07-15', '1'),
(15, 'Tâm Lý Học Căn Bản', 'Nguyễn Thị Thanh Mai', '2017', 'Tâm lý học', '2021-11-22', '1'),
(17, 'Sách 1', 'Tác giả 1', '2020', 'Thể loại 1', '2023-01-01', 'Mới'),
(18, 'Sách 2', 'Tác giả 2', '2020', 'Thể loại 2', '2023-01-02', 'Mới'),
(19, 'Sách 3', 'Tác giả 3', '2020', 'Thể loại 3', '2023-01-03', 'Mới'),
(20, 'Sách 4', 'Tác giả 4', '2020', 'Thể loại 4', '2023-01-04', 'Mới'),
(21, 'Sách 5', 'Tác giả 5', '2020', 'Thể loại 5', '2023-01-05', 'Mới'),
(22, 'Sách 6', 'Tác giả 6', '2020', 'Thể loại 6', '2023-01-06', 'Mới'),
(23, 'Sách 7', 'Tác giả 7', '2020', 'Thể loại 7', '2023-01-07', 'Mới'),
(24, 'Sách 8', 'Tác giả 8', '2020', 'Thể loại 8', '2023-01-08', 'Mới'),
(25, 'Sách 9', 'Tác giả 9', '2020', 'Thể loại 9', '2023-01-09', 'Mới'),
(26, 'Sách 10', 'Tác giả 10', '2020', 'Thể loại 10', '2023-01-10', 'Mới'),
(27, 'Sách 11', 'Tác giả 11', '2020', 'Thể loại 11', '2023-01-11', 'Mới'),
(28, 'Sách 12', 'Tác giả 12', '2020', 'Thể loại 12', '2023-01-12', 'Mới'),
(29, 'Sách 13', 'Tác giả 13', '2020', 'Thể loại 13', '2023-01-13', 'Mới'),
(30, 'Sách 14', 'Tác giả 14', '2020', 'Thể loại 14', '2023-01-14', 'Mới'),
(31, 'Sách 15', 'Tác giả 15', '2020', 'Thể loại 15', '2023-01-15', 'Mới'),
(32, 'Sách 16', 'Tác giả 16', '2020', 'Thể loại 16', '2023-01-16', 'Mới'),
(33, 'Sách 17', 'Tác giả 17', '2020', 'Thể loại 17', '2023-01-17', 'Mới'),
(34, 'Sách 18', 'Tác giả 18', '2020', 'Thể loại 18', '2023-01-18', 'Mới'),
(35, 'Sách 19', 'Tác giả 19', '2020', 'Thể loại 19', '2023-01-19', 'Mới'),
(36, 'Sách 20', 'Tác giả 20', '2020', 'Thể loại 20', '2023-01-20', 'Mới'),
(37, 'Sách 21', 'Tác giả 21', '2020', 'Thể loại 21', '2023-01-21', 'Mới'),
(38, 'Sách 22', 'Tác giả 22', '2020', 'Thể loại 22', '2023-01-22', 'Mới'),
(39, 'Sách 23', 'Tác giả 23', '2020', 'Thể loại 23', '2023-01-23', 'Mới'),
(40, 'Sách 24', 'Tác giả 24', '2020', 'Thể loại 24', '2023-01-24', 'Mới'),
(41, 'Sách 25', 'Tác giả 25', '2020', 'Thể loại 25', '2023-01-25', 'Mới'),
(42, 'Sách 26', 'Tác giả 26', '2020', 'Thể loại 26', '2023-01-26', 'Mới'),
(43, 'Sách 27', 'Tác giả 27', '2020', 'Thể loại 27', '2023-01-27', 'Mới'),
(44, 'Sách 28', 'Tác giả 28', '2020', 'Thể loại 28', '2023-01-28', 'Mới'),
(45, 'Sách 29', 'Tác giả 29', '2020', 'Thể loại 29', '2023-01-29', 'Mới'),
(46, 'Sách 30', 'Tác giả 30', '2020', 'Thể loại 30', '2023-01-30', 'Mới'),
(51, '51', 'tavgia51', '5151', 'sex', '2024-12-19', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muontrasach`
--
ALTER TABLE `muontrasach`
  ADD PRIMARY KEY (`mamuontra`),
  ADD KEY `fk_masach` (`masach`),
  ADD KEY `fk_mauer` (`mauser`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`mauser`),
  ADD UNIQUE KEY `nhanvien_constraint` (`masinhvien`);

--
-- Indexes for table `ttinsach`
--
ALTER TABLE `ttinsach`
  ADD PRIMARY KEY (`masach`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `muontrasach`
--
ALTER TABLE `muontrasach`
  MODIFY `mamuontra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ttinsach`
--
ALTER TABLE `ttinsach`
  MODIFY `masach` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `muontrasach`
--
ALTER TABLE `muontrasach`
  ADD CONSTRAINT `fk_masach` FOREIGN KEY (`masach`) REFERENCES `ttinsach` (`masach`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mauer` FOREIGN KEY (`mauser`) REFERENCES `sinhvien` (`mauser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
