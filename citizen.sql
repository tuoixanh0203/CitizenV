-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 16, 2021 lúc 05:11 PM
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
  `last_update_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Cấu trúc bảng cho bảng `phuong_xa`
--

CREATE TABLE `phuong_xa` (
  `ma_phuong_xa` varchar(50) NOT NULL,
  `ten_phuong_xa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_huyen`
--

CREATE TABLE `quan_huyen` (
  `ma_quan_huyen` varchar(50) NOT NULL,
  `ten_quan_huyen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `ma_thon_ban` varchar(50) NOT NULL,
  `ten_thon_ban` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh`
--

CREATE TABLE `tinh` (
  `ma_tinh` varchar(50) NOT NULL,
  `ten_tinh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(2) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  `create_on` date NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `last_update_on` date NOT NULL,
  `last_update_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`username`, `password`, `role`, `enable`, `create_on`, `create_by`, `last_update_on`, `last_update_by`) VALUES
('a1', 'a1', 1, 0, '0000-00-00', '', '0000-00-00', ''),
('a2', 'a2', 2, 0, '0000-00-00', '', '0000-00-00', ''),
('a3', 'a3', 3, 0, '0000-00-00', '', '0000-00-00', ''),
('b1', 'b1', 4, 0, '0000-00-00', '', '0000-00-00', ''),
('b2', 'b2', 5, 0, '0000-00-00', '', '0000-00-00', '');

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
-- Chỉ mục cho bảng `phuong_xa`
--
ALTER TABLE `phuong_xa`
  ADD PRIMARY KEY (`ma_phuong_xa`);

--
-- Chỉ mục cho bảng `quan_huyen`
--
ALTER TABLE `quan_huyen`
  ADD PRIMARY KEY (`ma_quan_huyen`);

--
-- Chỉ mục cho bảng `thoi_diem_khai_bao`
--
ALTER TABLE `thoi_diem_khai_bao`
  ADD PRIMARY KEY (`id_time`);

--
-- Chỉ mục cho bảng `thon_ban`
--
ALTER TABLE `thon_ban`
  ADD PRIMARY KEY (`ma_thon_ban`);

--
-- Chỉ mục cho bảng `tinh`
--
ALTER TABLE `tinh`
  ADD PRIMARY KEY (`ma_tinh`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
