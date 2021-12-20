-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 19, 2021 lúc 02:09 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `citizen`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `citizen`
--

CREATE TABLE `citizen` (
  `id` int(11) NOT NULL,
  `cccd` int(12) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `gioi_tinh` varchar(50) NOT NULL,
  `que_quan` varchar(50) NOT NULL,
  `thuong_tru` varchar(200) NOT NULL,
  `tam_tru` varchar(200) NOT NULL,
  `ton_giao` varchar(50) NOT NULL,
  `hoc_van` varchar(50) NOT NULL,
  `nghe_nghiep` varchar(50) NOT NULL,
  `create_on` date NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `last_update_on` date NOT NULL,
  `last_update_by` varchar(50) NOT NULL,
  `ma_khu_vuc` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `citizen`
--

INSERT INTO `citizen` (`id`, `cccd`, `ho_ten`, `gioi_tinh`, `que_quan`, `thuong_tru`, `tam_tru`, `ton_giao`, `hoc_van`, `nghe_nghiep`, `create_on`, `create_by`, `last_update_on`, `last_update_by`, `ma_khu_vuc`) VALUES
(1, 122346114, 'Ninh Thị Tươi', 'Nữ', 'Bắc Giang', 'bg', 'bg', 'ko', 'dh', 'sv', '0000-00-00', '', '0000-00-00', '', '24120111'),
(2, 122346116, 'Nguyễn Thị Ánh Tuyết', 'Nữ', 'BG', 'bg', 'bg', 'ko', 'dh', 'sv', '0000-00-00', '', '0000-00-00', '', '24120106');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khu_vuc`
--

CREATE TABLE `khu_vuc` (
  `ma_tinh` varchar(50) NOT NULL,
  `ma_quan_huyen` varchar(50) NOT NULL,
  `ma_phuong_xa` varchar(50) NOT NULL,
  `ma_thon_ban` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `ma_khu_vuc` varchar(11) NOT NULL,
  `cccd` int(12) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `gioi_tinh` varchar(50) NOT NULL,
  `que_quan` varchar(50) NOT NULL,
  `thuong_tru` varchar(200) NOT NULL,
  `tam_tru` varchar(200) NOT NULL,
  `ton_giao` varchar(50) NOT NULL,
  `hoc_van` varchar(50) NOT NULL,
  `nghe_nghiep` varchar(50) NOT NULL,
  `create_on` date NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `last_update_on` date NOT NULL,
  `last_update_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `person`
--

INSERT INTO `person` (`id`, `ma_khu_vuc`, `cccd`, `ho_ten`, `ngay_sinh`, `gioi_tinh`, `que_quan`, `thuong_tru`, `tam_tru`, `ton_giao`, `hoc_van`, `nghe_nghiep`, `create_on`, `create_by`, `last_update_on`, `last_update_by`) VALUES
(1, '24120111', 122346114, 'Ninh Thị Tươi', '2001-03-02', 'Nữ', 'Bắc Giang', 'bg', 'bg', 'ko', 'dh', 'sv', '0000-00-00', '', '0000-00-00', ''),
(2, '24120106', 122346116, 'Nguyễn Thị Ánh Tuyết', '2001-06-18', 'Nữ', 'BG', 'bg', 'bg', 'ko', 'dh', 'sv', '0000-00-00', '', '0000-00-00', ''),
(3, '23124567', 12344, 'Lê Thanh Huyền', '2001-09-13', 'Nữ', 'Thanh Hoá', 'th', 'th', 'ko', 'dh', 'sv', '0000-00-00', '', '0000-00-00', ''),
(4, '12345678', 122567895, 'Phùng Thị Lý', '2001-12-30', 'Nữ', 'Phú Thọ', 'Phú Thọ', 'Phú Thọ', 'ko', 'dh', 'sv', '0000-00-00', '', '0000-00-00', ''),
(5, '24130111', 13256, 'Trần Văn Nam', '1999-02-26', 'Nam', 'Bắc Giang', 'bg', 'bg', 'ko', 'dh', 'sv', '0000-00-00', '', '0000-00-00', ''),
(6, '24120206', 538945, 'Phạm Trung Nghĩa', '1987-05-28', 'Nam', 'BG', 'bg', 'bg', 'ko', '12/12', 'kĩ sư', '0000-00-00', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuong_xa`
--

CREATE TABLE `phuong_xa` (
  `id` int(11) NOT NULL,
  `ma_phuong_xa` varchar(50) DEFAULT NULL,
  `ten_phuong_xa` varchar(50) NOT NULL,
  `id_quan_huyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phuong_xa`
--

INSERT INTO `phuong_xa` (`id`, `ma_phuong_xa`, `ten_phuong_xa`, `id_quan_huyen`) VALUES
(1, '241201', 'Đào Mỹ', 2),
(2, '241202', 'Tiên Lục', 2),
(3, NULL, 'Mỹ Hà', 2),
(4, NULL, 'Dương Đức', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_huyen`
--

CREATE TABLE `quan_huyen` (
  `id` int(11) NOT NULL,
  `ma_quan_huyen` varchar(50) DEFAULT NULL,
  `ten_quan_huyen` varchar(50) NOT NULL,
  `id_tinh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quan_huyen`
--

INSERT INTO `quan_huyen` (`id`, `ma_quan_huyen`, `ten_quan_huyen`, `id_tinh`) VALUES
(2, '2412', 'Lạng Giang', 6),
(3, '2413', 'Yên Thế', 6),
(4, '2415', 'Hiệp Hoà', 6),
(5, NULL, 'Lục Nam', 6),
(6, NULL, 'Yên Dũng', 6),
(7, NULL, 'Lục Ngạn', 6),
(8, NULL, 'Tân Yên', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoi_diem_khai_bao`
--

CREATE TABLE `thoi_diem_khai_bao` (
  `id_time` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `state` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thon_ban`
--

CREATE TABLE `thon_ban` (
  `id` int(11) NOT NULL,
  `ma_thon_ban` varchar(50) DEFAULT NULL,
  `ten_thon_ban` varchar(50) NOT NULL,
  `id_phuong_xa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thon_ban`
--

INSERT INTO `thon_ban` (`id`, `ma_thon_ban`, `ten_thon_ban`, `id_phuong_xa`) VALUES
(1, '24120111', 'Tân Hoa', 1),
(2, '24120110', 'Tân Trung', 1),
(3, '24120106', 'Mỹ Phúc', 1),
(4, '24120108', 'Đồng Quang', 1),
(5, NULL, 'Núi Dứa', 1),
(6, NULL, 'Tây Lò', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh`
--

CREATE TABLE `tinh` (
  `id` int(11) NOT NULL,
  `ma_tinh` varchar(50) DEFAULT NULL,
  `ten_tinh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tinh`
--

INSERT INTO `tinh` (`id`, `ma_tinh`, `ten_tinh`) VALUES
(4, '23', 'Thanh Hoá'),
(5, NULL, 'Phú Thọ'),
(6, '24', 'Bắc Giang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(2) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `create_on` date NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `last_update_on` date NOT NULL,
  `last_update_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`username`, `password`, `role`, `enable`, `start`, `end`, `create_on`, `create_by`, `last_update_on`, `last_update_by`) VALUES
('24', '24', 2, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', ''),
('a1', 'a1', 1, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', ''),
('a3', 'a3', 3, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', ''),
('b1', 'b1', 4, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', ''),
('b2', 'b2', 5, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `citizen`
--
ALTER TABLE `citizen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khu_vuc`
--
ALTER TABLE `khu_vuc`
  ADD PRIMARY KEY (`ma_tinh`,`ma_quan_huyen`,`ma_phuong_xa`,`ma_thon_ban`);

--
-- Chỉ mục cho bảng `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phuong_xa`
--
ALTER TABLE `phuong_xa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_quan_huyen` (`id_quan_huyen`);

--
-- Chỉ mục cho bảng `quan_huyen`
--
ALTER TABLE `quan_huyen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tinh` (`id_tinh`);

--
-- Chỉ mục cho bảng `thoi_diem_khai_bao`
--
ALTER TABLE `thoi_diem_khai_bao`
  ADD PRIMARY KEY (`id_time`);

--
-- Chỉ mục cho bảng `thon_ban`
--
ALTER TABLE `thon_ban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_phuong_xa` (`id_phuong_xa`);

--
-- Chỉ mục cho bảng `tinh`
--
ALTER TABLE `tinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `citizen`
--
ALTER TABLE `citizen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `phuong_xa`
--
ALTER TABLE `phuong_xa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `quan_huyen`
--
ALTER TABLE `quan_huyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `thon_ban`
--
ALTER TABLE `thon_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tinh`
--
ALTER TABLE `tinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `phuong_xa`
--
ALTER TABLE `phuong_xa`
  ADD CONSTRAINT `phuong_xa_ibfk_1` FOREIGN KEY (`id_quan_huyen`) REFERENCES `quan_huyen` (`id`);

--
-- Các ràng buộc cho bảng `quan_huyen`
--
ALTER TABLE `quan_huyen`
  ADD CONSTRAINT `quan_huyen_ibfk_1` FOREIGN KEY (`id_tinh`) REFERENCES `tinh` (`id`);

--
-- Các ràng buộc cho bảng `thon_ban`
--
ALTER TABLE `thon_ban`
  ADD CONSTRAINT `thon_ban_ibfk_1` FOREIGN KEY (`id_phuong_xa`) REFERENCES `phuong_xa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
