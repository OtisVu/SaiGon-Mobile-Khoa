 Server: localhost -  Database: saigon_mobile
-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 18, 2024 at 01:42 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `saigon_mobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `BrandID` int(11) NOT NULL auto_increment,
  `BrandName` varchar(255) NOT NULL,
  PRIMARY KEY  (`BrandID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `brand`
--


-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaChiTietHoaDon` int(11) NOT NULL auto_increment,
  `TongTien` double NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `MaHoaDon` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  PRIMARY KEY  (`MaChiTietHoaDon`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=156 ;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaChiTietHoaDon`, `TongTien`, `MaSanPham`, `MaHoaDon`, `SoLuong`) VALUES
(132, 198000, 2, 222, 2),
(133, 1380000, 4, 222, 3),
(134, 460000, 4, 223, 1),
(135, 99000, 2, 224, 1),
(136, 460000, 4, 225, 1),
(137, 9, 2, 227, 1),
(138, 198000, 2, 228, 2),
(139, 99000, 2, 229, 1),
(140, 12177000, 2, 230, 123),
(141, 12177000, 2, 231, 123),
(142, 198000, 2, 232, 2),
(143, 356000, 4, 232, 4),
(144, 600000, 5, 233, 6),
(145, 179000, 1, 234, 1),
(146, 179000, 1, 235, 1),
(147, 179000, 1, 236, 1),
(148, 300000, 6, 237, 1),
(149, 100000, 5, 238, 1),
(150, 693000, 2, 239, 7),
(151, 300000, 6, 239, 1),
(152, 6690000, 2, 240, 1),
(153, 14290000, 5, 240, 1),
(154, 50000, 13, 240, 1),
(155, 14290000, 5, 241, 1);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `MaGioHang` int(11) NOT NULL auto_increment,
  `SoLuong` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  PRIMARY KEY  (`MaGioHang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=133 ;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`MaGioHang`, `SoLuong`, `MaKhachHang`, `MaSanPham`) VALUES
(116, 4, 1, 2),
(117, 3, 1, 4),
(120, 2, 2, 1),
(124, 1, 13, 2),
(131, 1, 11, 7),
(132, 9, 11, 15);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHoaDon` int(11) NOT NULL auto_increment,
  `TongTien` double NOT NULL,
  `NgayLap` date NOT NULL,
  `MaNhanVien` int(11) default NULL,
  `MaKhachHang` int(11) default NULL,
  `DiaChiGiaoHang` varchar(100) character set utf8 NOT NULL,
  `HoTen` varchar(100) character set utf8 NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `Email` varchar(50) character set utf8 NOT NULL,
  PRIMARY KEY  (`MaHoaDon`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=242 ;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHoaDon`, `TongTien`, `NgayLap`, `MaNhanVien`, `MaKhachHang`, `DiaChiGiaoHang`, `HoTen`, `SoDienThoai`, `Email`) VALUES
(230, 12177000, '2024-04-27', NULL, 10, 'Biên Hòa', 'Vũ Đình Khoa', '947720832', 'nuocmia22@gmail.com'),
(231, 12177000, '2024-05-04', NULL, 12, 'Binhoi', 'Vũ Đình Thuyết', '947720832', 'ThuyetVu@gmail.com'),
(232, 554000, '2024-05-04', NULL, 12, 'Bienhoa', 'Vũ Đình Thuyết', '947720832', 'ThuyetVu@gmail.com'),
(233, 600000, '2024-05-05', NULL, 12, 'Quận 1', 'Vũ Đình Thuyết', '947720832', 'ThuyetVu@gmail.com'),
(234, 179000, '2024-05-05', NULL, 12, 'Quận 2', 'Vũ Đình Thuyết', '947720832', 'ThuyetVu@gmail.com'),
(235, 179000, '2024-05-05', NULL, 12, 'Quaaanj 4', 'Vũ Đình Thuyết', '947720832', 'ThuyetVu@gmail.com'),
(236, 179000, '2024-05-05', NULL, 12, 'Dauuu', 'Vũ Đình Thuyết', '947720832', 'ThuyetVu@gmail.com'),
(237, 300000, '2024-05-06', NULL, 11, 'Quận 1', 'Vũ Đình Khoa', '328710708', 'vudinhkhoa2k2@gmail.com'),
(238, 100000, '2024-05-12', NULL, 11, 'Quận 1', 'Vũ Đình Khoa', '328710708', 'vudinhkhoa2k2@gmail.com'),
(239, 993000, '2024-05-12', NULL, 11, 'Quan1', 'Vũ Đình Khoa', '328710708', 'vudinhkhoa2k2@gmail.com'),
(240, 21030000, '2024-07-05', NULL, 11, 'Gò Vấp', 'Vũ Đình Khoa', '328710708', 'vudinhkhoa2k2@gmail.com'),
(241, 14290000, '2024-07-05', NULL, 11, 'Gò Vấp', 'Vũ Đình Khoa', '328710708', 'vudinhkhoa2k2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` int(11) NOT NULL auto_increment,
  `HoTen` varchar(20) character set utf8 collate utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(20) character set utf8 collate utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `Email` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
  `trangThai` int(11) NOT NULL default '1',
  PRIMARY KEY  (`MaKhachHang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `HoTen`, `SoDienThoai`, `DiaChi`, `MatKhau`, `Email`, `trangThai`) VALUES
(11, 'Vũ Đình Khoa', '0328710708', 'Gò Vấp', '183286df04eb99fa9df1d6672e75e7d4', 'vudinhkhoa2k2@gmail.com', 1),
(12, 'Vũ Đình Thuyết', '0947720832', ' Biên Hòa', '3affe71b4591bbad4bc5ecaa97e6acdd', 'ThuyetVu@gmail.com', 1),
(13, 'Vũ Trọng Bình', '0123456789', ' Biên Hòa 2', 'ac2c643bf26ac24281efd0dc7cca5fa7', 'trongbinh@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loainhanvien`
--

CREATE TABLE `loainhanvien` (
  `MaLoaiNhanVien` int(11) NOT NULL auto_increment,
  `TenLoaiNhanVien` varchar(100) collate utf8_unicode_ci NOT NULL,
  `GhiChu` varchar(100) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`MaLoaiNhanVien`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `loainhanvien`
--

INSERT INTO `loainhanvien` (`MaLoaiNhanVien`, `TenLoaiNhanVien`, `GhiChu`) VALUES
(1, 'Bán Hàng', 'Bán hàng tại khu vực Gò Vấp'),
(2, 'Quản lý kho', 'Quản lý kho tại khu vực Gò Vấp'),
(3, 'Admin', 'Chủ của hàng');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MaLoai` int(11) NOT NULL auto_increment,
  `TenLoai` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `GhiChu` varchar(100) character set utf8 collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`MaLoai`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`MaLoai`, `TenLoai`, `GhiChu`) VALUES
(1, 'SS', 'SAMSUNG'),
(2, 'APPLE', 'APPLE'),
(3, 'OPPO', 'OPPO'),
(4, 'NOKIA', 'NOKIA'),
(5, 'XIAOMI', 'XIAOMI'),
(6, 'PHỤ KIỆN', 'PHỤ KIỆN');

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNhaCungCap` int(11) NOT NULL auto_increment,
  `TenNhaCungCap` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `GhiChu` varchar(100) character set utf8 collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`MaNhaCungCap`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNhaCungCap`, `TenNhaCungCap`, `GhiChu`) VALUES
(1, 'SAMSUNG', 'Cung cấp các sản và phụ kiện về SAMSUNG'),
(2, 'APPLE', 'Cung cấp các sản và phụ kiện về APPLE'),
(3, 'OPPO', 'Cung cấp các sản và phụ kiện về OPPO'),
(4, 'NOKIA', 'Cung cấp các sản và phụ kiện về NOKIA'),
(5, 'XIAOMI', 'Cung cấp các sản và phụ kiện về XIAOMI'),
(6, 'PHỤ KIỆN', 'PHỤ KIỆN CHO TẤT CẢ CÁC DÒNG ĐIỆN THOẠI ');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` int(11) NOT NULL auto_increment,
  `HoTen` varchar(50) collate utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(15) collate utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(200) collate utf8_unicode_ci NOT NULL,
  `LoaiNhanVien` int(11) NOT NULL,
  `trangThai` int(11) NOT NULL default '1',
  PRIMARY KEY  (`MaNhanVien`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `HoTen`, `MatKhau`, `Email`, `SoDienThoai`, `DiaChi`, `LoaiNhanVien`, `trangThai`) VALUES
(1, 'Vũ Đình Khoa', '123456Khoa@', 'vudinhkhoa2k2@gmail.com', '0328710708', 'Biên Hòa', 1, 1),
(2, 'Vũ Trọng Bình', '123456Binh@', 'vutrongbinh@gmail.com', '03656324740', 'Biên Hòa', 2, 2),
(3, 'Vũ Đình Thuyết', '123456Thuyet@', 'vudinhthuyet@gmail.com', '0947720832', 'Biên Hòa', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `noidungdanhgia`
--

CREATE TABLE `noidungdanhgia` (
  `MaDanhGia` int(11) NOT NULL auto_increment,
  `MaSanPham` int(11) NOT NULL,
  `ThoiGianDanhGia` date NOT NULL,
  `NoiDungDanhGia` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
  `HinhAnh` char(200) NOT NULL,
  `SoSao` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  PRIMARY KEY  (`MaDanhGia`),
  KEY `MaSanPham` (`MaSanPham`),
  KEY `MaKhachHang` (`MaKhachHang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `noidungdanhgia`
--

INSERT INTO `noidungdanhgia` (`MaDanhGia`, `MaSanPham`, `ThoiGianDanhGia`, `NoiDungDanhGia`, `HinhAnh`, `SoSao`, `MaKhachHang`) VALUES
(1, 1, '2023-10-16', 'Kem rất tốt, sử dụng cảm thấy rất an toàn và hiệu quả.', '', 0, 1),
(2, 2, '2023-10-22', 'Sản phẩm đúng như mô tả, sẽ ủng hộ shop tiếp.', '', 0, 0),
(3, 3, '2023-10-23', 'Phấn đẹp, rất lâu phai.', '', 0, 0),
(14, 1, '2023-12-14', 'Sản phẩm đẹp quá', '', 3, 1),
(15, 2, '2023-12-01', '', '', 3, 0),
(16, 2, '2023-12-01', '', '', 3, 0),
(17, 2, '2023-12-01', 'Sản phẩm rất tuyệt', '', 3, 0),
(18, 2, '2023-12-01', 'Sản phẩm tốt quá', '', 3, 1),
(19, 2, '2024-05-04', '', '', 3, 12),
(20, 5, '2024-05-05', 'Rât oke nha mg', '', 5, 12),
(21, 1, '2024-05-05', 'okoeko', '', 1, 12),
(22, 6, '2024-05-06', 'OKe nhá', '', 5, 11),
(23, 2, '2024-05-12', 'oke oke', '', 3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `phieudathang`
--

CREATE TABLE `phieudathang` (
  `MaDatHang` int(11) NOT NULL auto_increment,
  `SoLuong` int(11) NOT NULL,
  `ThoiGianDatHang` date NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  PRIMARY KEY  (`MaDatHang`),
  KEY `MaKhachHang` (`MaKhachHang`,`MaSanPham`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `phieudathang`
--

INSERT INTO `phieudathang` (`MaDatHang`, `SoLuong`, `ThoiGianDatHang`, `MaKhachHang`, `MaSanPham`) VALUES
(1, 2, '2023-10-01', 2, 2),
(2, 4, '2023-10-02', 2, 2),
(3, 1, '2023-10-03', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `phieukiemtrakho`
--

CREATE TABLE `phieukiemtrakho` (
  `NgayKiemTra` date NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `MaNhanVien` int(11) NOT NULL,
  `TrangThaiKiemTra` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `MaPhieuKiemTraKho` tinyint(4) NOT NULL auto_increment,
  `PhieuShow` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`MaPhieuKiemTraKho`),
  KEY `MaSanPham` (`MaSanPham`,`MaNhanVien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `phieukiemtrakho`
--

INSERT INTO `phieukiemtrakho` (`NgayKiemTra`, `MaSanPham`, `MaNhanVien`, `TrangThaiKiemTra`, `MaPhieuKiemTraKho`, `PhieuShow`) VALUES
('2023-11-25', 1, 1, 'sản phẩm ổn không hư hỏng', 6, 1),
('2023-11-22', 2, 2, 'sản phẩm ổn không hư hỏng', 7, 1),
('2023-11-22', 3, 3, 'sản phẩm ổn không hư hỏng', 8, 1),
('2023-11-22', 4, 4, 'sản phẩm ổn không hư hỏng', 9, 1),
('2023-11-22', 3, 4, 'sản phẩm ổn không hư hỏng', 10, 1),
('2023-12-06', 5, 2, 'sản phẩm ổn không hư hỏng', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phieunhapkho`
--

CREATE TABLE `phieunhapkho` (
  `MaPhieuNhapKho` int(11) NOT NULL auto_increment,
  `NgayLapPhieuNhapKho` date NOT NULL,
  `TrangThaiPhieuNhapKho` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `MaNhanVien` int(11) NOT NULL,
  `PhieuShow` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`MaPhieuNhapKho`),
  KEY `MaSanPham` (`MaSanPham`,`MaNhanVien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `phieunhapkho`
--

INSERT INTO `phieunhapkho` (`MaPhieuNhapKho`, `NgayLapPhieuNhapKho`, `TrangThaiPhieuNhapKho`, `MaSanPham`, `MaNhanVien`, `PhieuShow`) VALUES
(1, '2023-10-30', 'Chưa duyệt', 1, 1, 1),
(2, '2023-10-30', 'Chưa duyệt', 2, 2, 1),
(3, '2023-10-30', 'Được duyệt', 3, 3, 1),
(4, '2023-10-30', 'Được duyệt', 4, 4, 1),
(21, '2023-11-14', 'Được duyệt', 1, 1, 1),
(22, '2023-11-14', 'Được duyệt', 1, 1, 0),
(23, '2023-11-16', 'Được duyệt', 3, 3, 0),
(24, '2023-11-16', 'Được duyệt', 3, 3, 0),
(25, '2023-11-16', 'Được duyệt', 3, 3, 0),
(26, '2023-11-16', 'Được duyệt', 3, 3, 0),
(27, '2023-11-28', 'Được duyệt', 1, 1, 1),
(28, '2023-11-28', 'Được duyệt', 1, 1, 0),
(29, '2023-11-22', 'Được duyệt', 5, 2, 1),
(30, '2023-11-22', 'Được duyệt', 5, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phieutrahang`
--

CREATE TABLE `phieutrahang` (
  `MaPhieuTraHang` int(10) NOT NULL auto_increment,
  `MaChiTietDonHang` int(11) NOT NULL,
  `ThoiGianTraHang` date NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `LyDoTraHang` varchar(100) NOT NULL,
  `HinhAnh` char(200) NOT NULL,
  PRIMARY KEY  (`MaPhieuTraHang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `phieutrahang`
--

INSERT INTO `phieutrahang` (`MaPhieuTraHang`, `MaChiTietDonHang`, `ThoiGianTraHang`, `SoLuong`, `LyDoTraHang`, `HinhAnh`) VALUES
(1, 1, '2023-12-21', 12, 'Hàng bị hỏng', '134a'),
(2, 133, '2023-12-01', 2, 'Hàng bị vỡ', 'hinh anh 123'),
(3, 132, '2023-12-09', 0, '', 'hinh anh 123'),
(4, 132, '2023-12-09', 0, '', 'hinh anh 123'),
(5, 132, '2023-12-09', 0, '', 'hinh anh 123'),
(6, 132, '2023-12-09', 0, '', 'hinh anh 123'),
(7, 132, '2023-12-09', 0, '', 'hinh anh 123'),
(8, 132, '2023-12-09', 0, '', 'hinh anh 123'),
(9, 132, '2023-12-09', 0, '', 'hinh anh 123'),
(10, 132, '2023-12-09', 0, '', 'hinh anh 123'),
(11, 141, '2024-05-04', 0, 'đâsdas', 'hinh anh 123'),
(12, 145, '2024-05-05', 0, 'ko đúng ý ', 'hinh anh 123');

-- --------------------------------------------------------

--
-- Table structure for table `phieuxuatkho`
--

CREATE TABLE `phieuxuatkho` (
  `MaPhieuXuatKho` int(11) NOT NULL auto_increment,
  `NgayLapPhieuXuatKho` date NOT NULL,
  `TrangThaiPhieuXuatKho` varchar(50) character set utf8 collate utf8_unicode_ci default NULL,
  `MaNhanVien` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `PhieuShow` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`MaPhieuXuatKho`),
  KEY `MaNhanVien` (`MaNhanVien`,`MaSanPham`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `phieuxuatkho`
--

INSERT INTO `phieuxuatkho` (`MaPhieuXuatKho`, `NgayLapPhieuXuatKho`, `TrangThaiPhieuXuatKho`, `MaNhanVien`, `MaSanPham`, `PhieuShow`) VALUES
(1, '2023-11-02', 'Chưa duyệt', 1, 1, 1),
(2, '2023-11-08', 'Chưa duyệt', 2, 2, 1),
(5, '2023-11-14', 'Được duyệt', 1, 1, 1),
(6, '2023-11-15', 'Được duyệt', 3, 3, 1),
(7, '2023-11-15', 'Được duyệt', 3, 3, 0),
(8, '2023-11-22', 'Được duyệt', 1, 1, 1),
(9, '2023-11-22', 'Được duyệt', 1, 1, 1),
(10, '2023-11-23', 'Được duyệt', 4, 5, 0),
(11, '2023-11-23', 'Được duyệt', 4, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL auto_increment,
  `TenSanPham` varchar(500) character set utf8 collate utf8_unicode_ci NOT NULL,
  `SoLuongTon` int(11) NOT NULL default '1',
  `MoTa` varchar(100) character set utf8 collate utf8_unicode_ci default NULL,
  `GiaBan` double NOT NULL,
  `GiaNhap` double NOT NULL,
  `ThuongHieu` varchar(100) character set utf8 collate utf8_unicode_ci default NULL,
  `HinhAnh` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `HanSuDung` date default NULL,
  `LoaiSanPham` int(11) NOT NULL,
  `NhaCungCap` int(11) NOT NULL,
  `trangThai` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`MaSanPham`),
  KEY `LoaiSanPham` (`LoaiSanPham`,`NhaCungCap`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `SoLuongTon`, `MoTa`, `GiaBan`, `GiaNhap`, `ThuongHieu`, `HinhAnh`, `HanSuDung`, `LoaiSanPham`, `NhaCungCap`, `trangThai`) VALUES
(1, 'Samsung Galaxy S23 Ultra', 10, '- Chính hãng, Mới 100%, Nguyên seal\r\n- Màn hình: 6.8" Dynamic AMOLED 2X\r\n- Camera sau: 200MP, 12 MP,', 30490000, 25490000, 'SAMSUNG', 'ss1.png', '2026-03-21', 1, 1, 1),
(2, 'Xiaomi 14 5G', 125, 'Xiaomi 14 được ra mắt với tâm hướng mang đến những trải nghiệm mới mẻ và chất lượng', 24490000, 21490000, 'Xiaomi', 'xiaomi-14-green-thumbnew.png', '2025-03-18', 1, 1, 1),
(3, 'iPhone 15 Pro 128GB', 10, '- Chính hãng, Mới 100%, Nguyên seal - Màn hình: OLED Super Retina XDR - Camera sau: 48MP, 12MP - Cam', 24490000, 20490000, 'APPLE', 'ap1.png', '2025-01-04', 2, 2, 1),
(4, 'iPad mini 6 2021 Wifi 64GB', 10, '- Chính hãng, Mới 100%, Nguyên seal - Màn hình: 8.3" LED-backlit IPS LCD - Camera sau: 12MP - Camera', 11490000, 10490000, 'APPLE', 'ap2.png', '2025-05-25', 2, 2, 1),
(5, ' iPad Air 5 10.9 inch 2022 M1 ', 8, '- Chính hãng, Mới 100%, Nguyên seal - Màn hình: 10.9" - Liquid Retina display - IPS - Camera sau: 12', 14290000, 12290000, 'APPLE', 'ap3.png', '2025-05-25', 2, 2, 1),
(6, 'Samsung Galaxy Z Fold 5 512GB', 10, '- Chính hãng, Mới 100%, Nguyên seal - Màn hình: - Chính 7.6" & Phụ 6.2" - Dynamic AMOLED 2X - Camera', 44990000, 40990000, 'SAMSUNG', 'ss2.png', '2025-08-22', 1, 1, 1),
(7, 'Cáp sạc Quick MF Lightning Type-C', 10, 'Cáp sạc Lightning & Type-C Công suất sạc: 20W Chiều dài: 1m', 189000, 150000, 'APPLE', 'pk1.png', '2025-10-24', 1, 1, 0),
(8, 'Điện thoại Nokia 8210 4G ', 10, 'Màn hình:  2.8" SIM:  2 Nano SIMHỗ trợ 4G Danh bạ:  2000 số Thẻ nhớ:  MicroSD, hỗ trợ tối đa 32 GB C', 1590000, 1090000, 'NOKIA', 'no1.png', '2025-01-31', 4, 4, 1),
(9, 'Điện thoại Nokia 110 4G Pro', 10, 'Màn hình:  IPS LCD1.77"65.000 màu SIM:  2 Nano SIMHỗ trợ 4G VoLTE Danh bạ:  2000 số Thẻ nhớ:  MicroS', 720000, 520000, 'NOKIA', 'no2.png', '2025-02-25', 4, 4, 1),
(10, 'Điện thoại Nokia 105 4G Pro', 10, 'Màn hình:  IPS LCD1.77"QQVGA Hệ điều hành:  Series 30+ Chip:  Unisoc T107 RAM:  48 MB Dung lượng lưu', 680000, 580000, 'NOKIA', 'no3.png', '2025-03-12', 4, 4, 1),
(11, 'OPPO Reno11 F 5G 8GB/256GB', 10, 'Màn hình:\r\n\r\nAMOLED6.7"Full HD+\r\nHệ điều hành:\r\n\r\nAndroid 14\r\nCamera sau:\r\n\r\nChính 64 MP & Phụ 8 MP,', 8990000, 7990000, 'OPPO', 'op1.png', '2025-02-04', 3, 3, 0),
(12, 'SP11', 12, 'DEMOOOOO', 5000000000, 120000000, 'APPLE', 'SP11.png', '2025-03-06', 2, 2, 0),
(13, 'Phụ kiện cho Apple', 12, 'Dùng cho điện thoại có cổng USB và Type C', 50000, 30000, 'APPLE', 'donghonam1.png', '2026-06-05', 2, 2, 0),
(14, 'SP14', 111, 'dsadas', 5555552, 1233333, 'SamSung', 'SP14.png', '2024-08-17', 1, 1, 0),
(15, 'Samsung Galaxy A55 5G', 300, 'Samsung Galaxy A55 5G, mẫu điện thoại mới của dòng Galaxy A', 11090000, 8000000, 'SAMSUNG', 'samsung-galaxy-a55-5g-xanh-1-1.jpg', '2028-05-11', 1, 1, 1),
(16, 'Samsung Galaxy M35 5G', 100, 'Galaxy M35 5G có camera chính 50 MP cùng công nghệ chống rung quang học OIS, VDIS cho hình ảnh sắc n', 8290000, 729000, 'SAMSUNG', 'Samsung Galaxy M35 5G.jpg', '2024-07-27', 1, 1, 1),
(17, 'Điện thoại iPhone 13 128GB', 3000, 'Trong khi sức hút đến từ bộ 4 phiên bản iPhone 12 vẫn chưa nguội đi, thì hãng điện thoại Apple đã ma', 17790000, 14190000, 'APPLE', 'iphone-13-xanh-la.jpg', '2024-10-05', 2, 2, 1),
(18, 'OPPO Reno11 F 5G', 100, 'OPPO Reno11 F 5G là một chiếc điện thoại tầm trung mới được OPPO ', 8990000, 8490000, 'OPPO', 'oppo-reno11-f-purple.jpg', '2026-07-09', 1, 1, 1),
(19, 'OPPO A58', 222, 'Thị trường điện thoại di động ngày nay, OPPO A58 8G siêu hot', 5990000, 5290000, 'OPPO', 'OPPO A58.jpg', '2026-11-03', 1, 1, 1),
(20, ' OPPO Reno11 Pro 5G', 212, 'OPPO Reno11 Pro 5G sự tiếp nối thành công từ thế hệ trước, với thiết kế lôi cuốn, cấu hình mạnh mẽ ', 16999000, 14999000, 'OPPO', ' OPPO Reno11 Pro 5G.jpg', '2026-05-04', 1, 1, 1),
(21, 'OPPO Find N3 5G', 333, ' OPPO Find N3 5G, một chiếc điện thoại thông minh với thiết kế gập ngang hoàn toàn hiện đại ', 44999000, 41999000, 'OPPO', 'OPPO Find N3 5G.jpg', '2026-05-13', 3, 3, 1),
(22, 'Điện thoại Nokia 3210 4G', 222, 'Nokia 3210 4G, một biểu tượng trường tồn của hãng Nokia, nay trở lại với vẻ ngoài cải tiến và công n', 1590000, 1000000, 'Nokia', 'no4.png', '2026-07-16', 1, 1, 1),
(23, 'Xiaomi 13T 5G', 555, 'Xiaomi 13T ra mắt tại thị trường Việt Nam vào tháng 09/2023, là một sản phẩm độc đáo thu hút sự chú ', 12990000, 10990000, 'Xiaomi', 'Xiaomi 13T 5G.png', '2025-08-26', 5, 5, 1),
(24, 'Xiaomi Redmi Note 13 Pro', 666, 'Trong phân khúc tầm trung, Xiaomi Redmi Note 13 Pro 128GB nổi lên như một ứng cử viên sáng giá', 7290000, 7000000, 'Xiaomi', 'Xiaomi Redmi Note 13 Pro.png', '2025-08-04', 5, 5, 1),
(25, 'Xiaomi Redmi A3', 854, 'Xiaomi Redmi A3 là một sản phẩm giá rẻ vừa được Xiaomi ra mắt trong dịp đầu năm 2024', 3030000, 2490000, 'Xiaomi', 'Xiaomi Redmi A3.png', '2027-01-12', 5, 5, 1),
(26, 'Adapter USB C 6 in 1 Ugreen 60384', 150, 'Khe đọc thẻ nhớ SD , Khe đọc thẻ nhớ microSD,  1 HDMI (4K), 1 Type C (PD 100W) , 2 USB 3.0 ', 1500000, 1130000, 'Phụ kiện ', 'Adapter USB C 6 in 1 Ugreen 60384.png', '2027-03-10', 6, 6, 1);

