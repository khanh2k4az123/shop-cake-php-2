-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 04:46 AM
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
-- Database: `nguyenduykhanhphp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `Id_Bv` int(11) NOT NULL,
  `tieuDe` varchar(255) NOT NULL,
  `noiDung` text DEFAULT NULL,
  `ngayThangNam` date DEFAULT NULL,
  `id_dm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`Id_Bv`, `tieuDe`, `noiDung`, `ngayThangNam`, `id_dm`) VALUES
(1, 'Bài viết về loại bánh mới', 'Nội dung chi tiết về loại bánh mới được giới thiệu.', '2024-01-15', 1),
(2, 'Bí quyết làm bánh ngon', 'Chia sẻ bí quyết để làm bánh ngon và hấp dẫn.', '2024-01-16', 2),
(3, 'Cách chọn mua bánh trên thị trường', 'Hướng dẫn cách chọn mua bánh chất lượng khi đi mua sắm.', '2024-01-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `Id_Dm` int(11) NOT NULL,
  `Name_Dm` varchar(255) NOT NULL,
  `TrangThai` int(11) DEFAULT 2 COMMENT '1 : la hiện 2 là ẩn đi ',
  `Img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`Id_Dm`, `Name_Dm`, `TrangThai`, `Img`) VALUES
(1, 'Bánh Nước Ngọt', 1, 'product_2.jpg'),
(2, 'Bánh Kem', 1, 'product_1.jpg'),
(3, 'Bánh Chocolate', 1, 'product_3.jpg'),
(4, 'Nước Ngọt', 1, 'product_4.jpg'),
(5, 'Kẹo', 1, 'keo.jpg'),
(6, 'Bánh Nước Ép', 1, 'nuoc_ep.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `Id_DH` int(11) NOT NULL,
  `ngayDatHang` datetime DEFAULT NULL,
  `trangThai` varchar(50) DEFAULT NULL,
  `Id_Tk` int(11) DEFAULT NULL,
  `PhuongThucTT` tinyint(1) DEFAULT NULL COMMENT '1.Trả tiền mặt khi nhận hàng 2. Thanh toán bằng VNPAY 3.Thanh toan vi momo',
  `TrangThaiDatHang` tinyint(1) DEFAULT NULL COMMENT '	0.Đơn hàng mới 1.Đang xử lý 2. xác nhận đơn hàng 3.Đang giao hàng 4.Đã giao 5.Đã hủy 6.Giao hàng thất bại',
  `DiaChi` varchar(225) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donhangct`
--

CREATE TABLE `donhangct` (
  `Id_CT` int(11) NOT NULL,
  `Id_Sp` int(11) NOT NULL,
  `Price` double(10,0) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donhangct`
--

INSERT INTO `donhangct` (`Id_CT`, `Id_Sp`, `Price`, `SoLuong`) VALUES
(1, 1, 11, 2),
(2, 3, 2, 3),
(3, 5, 15, 1),
(4, 2, 8, 2),
(5, 4, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `Id_Sp` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Img` varchar(255) DEFAULT NULL,
  `TieuDe` varchar(255) DEFAULT NULL,
  `NoiDung` text DEFAULT NULL,
  `NamSX` int(11) DEFAULT NULL,
  `Id_Dm` int(11) DEFAULT NULL,
  `TrangThai` int(11) DEFAULT NULL,
  `View` int(11) NOT NULL,
  `Sale` double(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`Id_Sp`, `Name`, `Price`, `Img`, `TieuDe`, `NoiDung`, `NamSX`, `Id_Dm`, `TrangThai`, `View`, `Sale`) VALUES
(1, 'Bánh Tráng Trộn', 5.99, 'Product-1.jpg', 'Bánh Tráng Trộn', 'Món ăn vặt phổ biến, ngon và lạ miệng.', 2022, 1, 1, 200, 0),
(2, 'Bánh Sữa Trứng', 8.99, 'Product-2.jpg', 'Bánh Sữa Trứng', 'Bánh trứng ngon tuyệt vời từ những nguyên liệu tốt nhất.', 2022, 2, 1, 150, 0),
(3, 'Bánh Brownie', 12.99, 'Product-3.jpg', 'Bánh Brownie Sô Cô La', 'Bánh brownie ngon tuyệt vời với hương sô cô la đậm đà.', 2023, 3, 1, 180, 0),
(4, 'Nước Ngọt 7 ', 2.49, 'product_nuocngot_5.jpg', 'Coca-Cola', 'Đồ uống phổ biến với hương vị ngọt ngào và sảng khoái.', 2023, 4, 1, 250, 0),
(5, 'Bánh Gato Dâu', 15.99, 'Product-5.jpg', 'Bánh Gato Dâu', 'Bánh gato tươi ngon với hương vị dâu thơm ngon.', 2023, 2, 1, 120, 0),
(6, 'Bánh Pizza Hải Sản', 18.99, 'Product-6.jpg', 'Bánh Pizza Hải Sản', 'Pizza phong cách biển ngon đậm chất Ý với các loại hải sản tươi ngon.', 2022, 3, 1, 300, 0),
(7, 'Nước Ngọt Pepsi', 2.29, 'Product_nuocngot_4.jpg', 'Pepsi', 'Nước ngọt Pepsi với hương vị đặc trưng và sảng khoái.', 2023, 4, 1, 220, 0),
(8, 'Bánh Bông Lan Trứng Muối', 13.99, 'product_13.jpg', 'Bánh Bông Lan Trứng Muối', 'Bánh bông lan trứng muối tinh tế và ngon miệng.', 2022, 2, 1, 180, 0),
(9, 'Nước Suối Lavie', 1.49, 'product_nuocngot_3.jpg', 'Nước Suối Lavie', 'Nước suối Lavie với chất lượng nước tinh khiết.', 2023, 4, 1, 150, 0),
(10, 'Nước ngọt jump', 10.99, 'product_nuocngot_2.jpg', 'Bánh Cuộn Sô Cô La', 'Bánh cuộn sô cô la thơm ngon và ngọt ngào.', 2023, 4, 1, 150, 0),
(11, 'Cocacola', 8.49, 'product_nuocngot_1.jpg', 'Bánh Flan Caramel', 'Bánh flan thơm béo với caramel đặc trưng.', 2022, 4, 1, 120, 0),
(12, 'Kẹo socola', 2.09, 'product_keo_3.jpg', 'Fanta Cam', 'Nước ngọt Fanta vị cam tươi mới và sảng khoái.', 2023, 5, 1, 180, 0),
(13, 'Bánh Gạo Lứt Hạt Sen', 14.99, 'product_keo_2.jpg', 'Bánh Gạo Lứt Hạt Sen', 'Bánh gạo lứt hạt sen dinh dưỡng và ngon miệng.', 2022, 5, 1, 100, 0),
(14, 'Kẹo Dẽo', 2.79, 'product_keo_1.jpg', 'Schweppes Tonic', 'Nước ngọt tonic Schweppes dùng để pha chế đồ uống.', 2023, 5, 1, 200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_tk` int(11) NOT NULL,
  `tenDangNhap` varchar(255) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `hoTen` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ngayTao` datetime DEFAULT NULL,
  `id_sp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`Id_Bv`),
  ADD KEY `id_dm` (`id_dm`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`Id_Dm`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`Id_DH`),
  ADD KEY `idTaiKhoan` (`Id_Tk`);

--
-- Indexes for table `donhangct`
--
ALTER TABLE `donhangct`
  ADD PRIMARY KEY (`Id_CT`),
  ADD KEY `id_Sp` (`Id_Sp`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`Id_Sp`),
  ADD KEY `id_dm` (`Id_Dm`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_tk`),
  ADD KEY `id_sp` (`id_sp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `Id_Bv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `Id_Dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `Id_DH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `donhangct`
--
ALTER TABLE `donhangct`
  MODIFY `Id_CT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `Id_Sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_tk` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `baiviet_ibfk_1` FOREIGN KEY (`id_dm`) REFERENCES `danhmuc` (`Id_Dm`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`Id_Tk`) REFERENCES `taikhoan` (`id_tk`);

--
-- Constraints for table `donhangct`
--
ALTER TABLE `donhangct`
  ADD CONSTRAINT `donhangct_ibfk_1` FOREIGN KEY (`Id_Sp`) REFERENCES `sanpham` (`Id_Sp`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`Id_Dm`) REFERENCES `danhmuc` (`Id_Dm`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`Id_Sp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
