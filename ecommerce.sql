-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 15, 2021 lúc 04:25 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ecommerce`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `CateID` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`CateID`, `CategoryName`, `Description`) VALUES
(1, 'Điện thoại', 'DT'),
(2, 'Máy Tính Bảng', 'MTB'),
(3, 'Laptop', 'LT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderproduct`
--

CREATE TABLE `orderproduct` (
  `OrderID` int(11) NOT NULL,
  `OrderDate` datetime NOT NULL,
  `ShipDate` datetime NOT NULL,
  `ShipName` varchar(150) NOT NULL,
  `ShipAddress` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(150) DEFAULT NULL,
  `CateID` int(11) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Descriptions` varchar(500) DEFAULT NULL,
  `Picture` varchar(200) DEFAULT NULL,
  `ram` char(5) NOT NULL,
  `brand` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `CateID`, `Price`, `Quantity`, `Descriptions`, `Picture`, `ram`, `brand`) VALUES
(10, '1', 3, 1, 1, '1', 'uploads/202103300508200798adf9c191e928d86114726aaee261.jpg', '4', 'Honor'),
(11, 'dien thoai', 3, 10000000, 56, 'cc', 'uploads/202103300606170798adf9c191e928d86114726aaee261.jpg', '4', 'Infinix'),
(12, 'test', 2, 5000, 200, 'aaa', 'uploads/20210405051757banner-web-nhaxinh-online.jpg', '3', 'Infinix'),
(14, 'dien thoai', 3, 10000000, 56, 'cc', 'uploads/202103300606170798adf9c191e928d86114726aaee261.jpg', '6', 'Honor'),
(15, 'dien thoai', 3, 10000000, 56, 'cc', 'uploads/202103300606170798adf9c191e928d86114726aaee261.jpg', '8', 'VIVO'),
(16, 'test', 2, 5000, 200, 'aaa', 'uploads/20210405051757banner-web-nhaxinh-online.jpg', '4', 'VIVO'),
(17, 'test', 2, 5000, 200, 'aaa', 'uploads/20210405051757banner-web-nhaxinh-online.jpg', '3', 'Lenevo'),
(18, 'dien thoai', 3, 10000000, 56, 'cc', 'uploads/202103300606170798adf9c191e928d86114726aaee261.jpg', '8', 'Lenevo'),
(19, '1', 3, 1, 1, '1', 'uploads/202103300508200798adf9c191e928d86114726aaee261.jpg', '', 'Samsung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product2`
--

CREATE TABLE `product2` (
  `product_id` int(20) NOT NULL,
  `product_name` varchar(120) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `product_ram` char(5) NOT NULL,
  `product_storage` varchar(50) NOT NULL,
  `product_camera` varchar(20) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_quantity` mediumint(5) NOT NULL,
  `product_status` enum('0','1') NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product2`
--

INSERT INTO `product2` (`product_id`, `product_name`, `product_brand`, `product_price`, `product_ram`, `product_storage`, `product_camera`, `product_image`, `product_quantity`, `product_status`) VALUES
(1, 'Honor 9 Lite (Sapphire Blue, 64 GB)  (4 GB RAM)', 'Honor', '14499.00', '4', '64', '13', '202103300508200798adf9c191e928d86114726aaee261.jpg', 10, '1'),
(2, '\r\nInfinix Hot S3 (Sandstone Black, 32 GB)  (3 GB RAM)', 'Infinix', '8999.00', '3', '32', '13', '202103300508200798adf9c191e928d86114726aaee261.jpg', 10, '1'),
(3, 'VIVO V9 Youth (Gold, 32 GB)  (4 GB RAM)', 'VIVO', '16990.00', '4', '32', '16', '202103300508200798adf9c191e928d86114726aaee261.jpg', 10, '1'),
(4, 'Moto E4 Plus (Fine Gold, 32 GB)  (3 GB RAM)', 'Moto', '11499.00', '3', '32', '8', '202103300508200798adf9c191e928d86114726aaee261.jpg', 10, '1'),
(5, 'Lenovo K8 Plus (Venom Black, 32 GB)  (3 GB RAM)', 'Lenevo', '9999.00', '3', '32', '13', '202103300508200798adf9c191e928d86114726aaee261.jpg', 10, '1'),
(6, 'Samsung Galaxy On Nxt (Gold, 16 GB)  (3 GB RAM)', 'Samsung', '10990.00', '3', '16', '13', '202103300508200798adf9c191e928d86114726aaee261.jpg', 10, '1'),
(7, 'Moto C Plus (Pearl White, 16 GB)  (2 GB RAM)', 'Moto', '7799.00', '2', '16', '8', '202103300508200798adf9c191e928d86114726aaee261.jpg', 10, '1'),
(8, 'Panasonic P77 (White, 16 GB)  (1 GB RAM)', 'Panasonic', '5999.00', '1', '16', '8', '202103300508200798adf9c191e928d86114726aaee261.jpg', 10, '1'),
(9, 'OPPO F5 (Black, 64 GB)  (6 GB RAM)', 'OPPO', '19990.00', '6', '64', '16', '202103300508200798adf9c191e928d86114726aaee261.jpg', 10, '1'),
(10, 'Honor 7A (Gold, 32 GB)  (3 GB RAM)', 'Honor', '8999.00', '3', '32', '13', '202103300508200798adf9c191e928d86114726aaee261.jpg', 10, '1'),
(11, 'Asus ZenFone 5Z (Midnight Blue, 64 GB)  (6 GB RAM)', 'Asus', '29999.00', '6', '128', '12', '202103300508200798adf9c191e928d86114726aaee261.jpg', 10, '1'),
(12, 'Redmi 5A (Gold, 32 GB)  (3 GB RAM)', 'MI', '5999.00', '3', '32', '13', '202103300508200798adf9c191e928d86114726aaee261.jpg', 10, '1'),
(13, 'Intex Indie 5 (Black, 16 GB)  (2 GB RAM)', 'Intex', '4999.00', '2', '16', '8', '202103300508200798adf9c191e928d86114726aaee261.jpg', 10, '1'),
(14, 'Google Pixel 2 XL (18:9 Display, 64 GB) White', 'Google', '61990.00', '4', '64', '12', '202103300508200798adf9c191e928d86114726aaee261.jpg', 10, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `UserID` int(5) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Email`, `Password`) VALUES
(1, 'test', 'congthanh23599@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'test2', 'congthanh23599@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'ThanhCong', 'yeah177@yahoo.com', '202cb962ac59075b964b07152d234b70');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CateID`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderID`,`ProductID`),
  ADD UNIQUE KEY `ProductID` (`ProductID`);

--
-- Chỉ mục cho bảng `orderproduct`
--
ALTER TABLE `orderproduct`
  ADD PRIMARY KEY (`OrderID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CateID` (`CateID`);

--
-- Chỉ mục cho bảng `product2`
--
ALTER TABLE `product2`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `CateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orderproduct`
--
ALTER TABLE `orderproduct`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `product2`
--
ALTER TABLE `product2`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orderproduct` (`OrderID`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CateID`) REFERENCES `category` (`CateID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
