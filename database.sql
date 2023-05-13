-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 07, 2023 lúc 11:46 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cgv_cinema`
--

CREATE DATABASE IF NOT EXISTS `cgv_cinema` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `cgv_cinema`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `username` varchar(64) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `activated` bit(1) DEFAULT b'0',
  `activate_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`username`, `firstname`, `lastname`, `email`, `password`, `activated`, `activate_token`) VALUES
('admin', 'Đạt', 'Phạm', 'admin@gmail.com', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm', b'1', '123456'),
('tiendat2003', 'Đạt', 'Phạm', 'phamvantiendat2@gmail.com', '$2y$10$XAFRRHDWqMPnBpvvcsDAmOcnuZJ0IWShkhhnTR5bpB5zWDHFJ5mBu', b'1', ''),
('chinhngo123', 'Chính', 'Ngô', 'chinhngo150503@gmail.com', '$2y$10$Ht819qwoj0FFMKNCiLzoPeHGJ97t8bcgaT4qJssFjUrz4/05gRIGu', b'1', ''),
('tiendat2023', 'Đạt', 'Phạm', 'kiettiger2@gmail.com', '$2y$10$1mFXzkm3KSrFJYtscGiaA.7GvEOyJQ6paUR1ybnZDspFEy49emBhK', b'1', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `event`
--

CREATE TABLE `event` (
  `name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `event`
--

INSERT INTO `event` (`name`, `image`) VALUES
('Culture Day', '2023_culture_day.png'),
('Wednesday Happy', '2023_happy_wed.png'),
('U22', '2023_u22.png'),
('Birthday Popcorn', 'birthday_popcorn.png'),
('Birthday Combo', 'birthday-combo.png'),
('Book Ticket', 'dat-ve-online.png'),
('Refill thả ga', 'refill-tha-ga.png'),
('Thanh toán online', 'thanh-toan-online.png'),
('Tính năng online dành cho vip', 'vip-vvip.jpg'),
('VN-Bank', 'vnbank.jpg'),
('MB-Bank', 'mbbank.png'),
('Thông báo lễ Tết 2023', 'Thong_bao_Le_Tet_2023_3_.png'),
('Zalo Pay', 'zalo-pay.jpg'),
('Vietcombank', 'viet-com-bank.jpg'),
('Ưu đãi hội viên', 'uu-dai-thanh-vien.jpg'),
('VIBank', 'vi-bank.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `film_chair`
--

CREATE TABLE `film_chair` (
  `film` varchar(50) NOT NULL,
  `name_chair` varchar(10) NOT NULL,
  `num_chair` varchar(10) NOT NULL,
  `selected` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `film_chair`
--

INSERT INTO `film_chair` (`film`, `name_chair`, `num_chair`, `selected`) VALUES
('KHẮC TINH CỦA QUỶ', 'A', 'A1', 1),
('KHẮC TINH CỦA QUỶ', 'A', 'A2', 0),
('KHẮC TINH CỦA QUỶ', 'A', 'A3', 0),
('KHẮC TINH CỦA QUỶ', 'A', 'A4', 0),
('KHẮC TINH CỦA QUỶ', 'A', 'A5', 0),
('KHẮC TINH CỦA QUỶ', 'A', 'A6', 0),
('KHẮC TINH CỦA QUỶ', 'A', 'A7', 0),
('KHẮC TINH CỦA QUỶ', 'A', 'A8', 0),
('KHẮC TINH CỦA QUỶ', 'B', 'B1', 0),
('KHẮC TINH CỦA QUỶ', 'B', 'B2', 0),
('KHẮC TINH CỦA QUỶ', 'B', 'B3', 0),
('KHẮC TINH CỦA QUỶ', 'B', 'B4', 0),
('KHẮC TINH CỦA QUỶ', 'B', 'B5', 0),
('KHẮC TINH CỦA QUỶ', 'B', 'B6', 0),
('KHẮC TINH CỦA QUỶ', 'B', 'B7', 0),
('KHẮC TINH CỦA QUỶ', 'B', 'B8', 0),
('KHẮC TINH CỦA QUỶ', 'C', 'C1', 0),
('KHẮC TINH CỦA QUỶ', 'C', 'C2', 0),
('KHẮC TINH CỦA QUỶ', 'C', 'C3', 0),
('KHẮC TINH CỦA QUỶ', 'C', 'C4', 1),
('KHẮC TINH CỦA QUỶ', 'C', 'C5', 0),
('KHẮC TINH CỦA QUỶ', 'C', 'C6', 0),
('KHẮC TINH CỦA QUỶ', 'C', 'C7', 0),
('KHẮC TINH CỦA QUỶ', 'C', 'C8', 0),
('KHẮC TINH CỦA QUỶ', 'D', 'D1', 0),
('KHẮC TINH CỦA QUỶ', 'D', 'D2', 0),
('KHẮC TINH CỦA QUỶ', 'D', 'D3', 0),
('KHẮC TINH CỦA QUỶ', 'D', 'D4', 0),
('KHẮC TINH CỦA QUỶ', 'D', 'D5', 0),
('KHẮC TINH CỦA QUỶ', 'D', 'D6', 0),
('KHẮC TINH CỦA QUỶ', 'D', 'D7', 0),
('KHẮC TINH CỦA QUỶ', 'D', 'D8', 0),
('KHẮC TINH CỦA QUỶ', 'E', 'E1', 0),
('KHẮC TINH CỦA QUỶ', 'E', 'E2', 0),
('KHẮC TINH CỦA QUỶ', 'E', 'E3', 0),
('KHẮC TINH CỦA QUỶ', 'E', 'E4', 0),
('KHẮC TINH CỦA QUỶ', 'E', 'E5', 0),
('KHẮC TINH CỦA QUỶ', 'E', 'E6', 0),
('KHẮC TINH CỦA QUỶ', 'E', 'E7', 0),
('KHẮC TINH CỦA QUỶ', 'E', 'E8', 0),
('ANH EM SUPER MARIO', 'A', 'A1', 0),
('ANH EM SUPER MARIO', 'A', 'A2', 0),
('ANH EM SUPER MARIO', 'A', 'A3', 0),
('ANH EM SUPER MARIO', 'A', 'A4', 0),
('ANH EM SUPER MARIO', 'A', 'A5', 0),
('ANH EM SUPER MARIO', 'A', 'A6', 0),
('ANH EM SUPER MARIO', 'A', 'A7', 0),
('ANH EM SUPER MARIO', 'A', 'A8', 0),
('ANH EM SUPER MARIO', 'B', 'B1', 0),
('ANH EM SUPER MARIO', 'B', 'B2', 0),
('ANH EM SUPER MARIO', 'B', 'B3', 0),
('ANH EM SUPER MARIO', 'B', 'B4', 0),
('ANH EM SUPER MARIO', 'B', 'B5', 0),
('ANH EM SUPER MARIO', 'B', 'B6', 0),
('ANH EM SUPER MARIO', 'B', 'B7', 0),
('ANH EM SUPER MARIO', 'B', 'B8', 0),
('ANH EM SUPER MARIO', 'C', 'C1', 0),
('ANH EM SUPER MARIO', 'C', 'C2', 0),
('ANH EM SUPER MARIO', 'C', 'C3', 0),
('ANH EM SUPER MARIO', 'C', 'C4', 0),
('ANH EM SUPER MARIO', 'C', 'C5', 0),
('ANH EM SUPER MARIO', 'C', 'C6', 0),
('ANH EM SUPER MARIO', 'C', 'C7', 0),
('ANH EM SUPER MARIO', 'C', 'C8', 0),
('ANH EM SUPER MARIO', 'D', 'D1', 0),
('ANH EM SUPER MARIO', 'D', 'D2', 0),
('ANH EM SUPER MARIO', 'D', 'D3', 0),
('ANH EM SUPER MARIO', 'D', 'D4', 0),
('ANH EM SUPER MARIO', 'D', 'D5', 0),
('ANH EM SUPER MARIO', 'D', 'D6', 0),
('ANH EM SUPER MARIO', 'D', 'D7', 0),
('ANH EM SUPER MARIO', 'D', 'D8', 0),
('ANH EM SUPER MARIO', 'E', 'E1', 0),
('ANH EM SUPER MARIO', 'E', 'E2', 0),
('ANH EM SUPER MARIO', 'E', 'E3', 0),
('ANH EM SUPER MARIO', 'E', 'E4', 0),
('ANH EM SUPER MARIO', 'E', 'E5', 0),
('ANH EM SUPER MARIO', 'E', 'E6', 0),
('ANH EM SUPER MARIO', 'E', 'E7', 0),
('ANH EM SUPER MARIO', 'E', 'E8', 0),
('TRI KỶ', 'A', 'A1', 1),
('TRI KỶ', 'A', 'A2', 0),
('TRI KỶ', 'A', 'A3', 0),
('TRI KỶ', 'A', 'A4', 0),
('TRI KỶ', 'A', 'A5', 0),
('TRI KỶ', 'A', 'A6', 0),
('TRI KỶ', 'A', 'A7', 0),
('TRI KỶ', 'A', 'A8', 0),
('TRI KỶ', 'B', 'B1', 0),
('TRI KỶ', 'B', 'B2', 0),
('TRI KỶ', 'B', 'B3', 0),
('TRI KỶ', 'B', 'B4', 0),
('TRI KỶ', 'B', 'B5', 0),
('TRI KỶ', 'B', 'B6', 0),
('TRI KỶ', 'B', 'B7', 0),
('TRI KỶ', 'B', 'B8', 0),
('TRI KỶ', 'C', 'C1', 0),
('TRI KỶ', 'C', 'C2', 0),
('TRI KỶ', 'C', 'C3', 0),
('TRI KỶ', 'C', 'C4', 0),
('TRI KỶ', 'C', 'C5', 0),
('TRI KỶ', 'C', 'C6', 0),
('TRI KỶ', 'C', 'C7', 0),
('TRI KỶ', 'C', 'C8', 0),
('TRI KỶ', 'D', 'D1', 0),
('TRI KỶ', 'D', 'D2', 0),
('TRI KỶ', 'D', 'D3', 0),
('TRI KỶ', 'D', 'D4', 0),
('TRI KỶ', 'D', 'D5', 0),
('TRI KỶ', 'D', 'D6', 0),
('TRI KỶ', 'D', 'D7', 0),
('TRI KỶ', 'D', 'D8', 0),
('TRI KỶ', 'E', 'E1', 0),
('TRI KỶ', 'E', 'E2', 0),
('TRI KỶ', 'E', 'E3', 0),
('TRI KỶ', 'E', 'E4', 0),
('TRI KỶ', 'E', 'E5', 0),
('TRI KỶ', 'E', 'E6', 0),
('TRI KỶ', 'E', 'E7', 0),
('TRI KỶ', 'E', 'E8', 0),
('TÌNH CHỊ DUYÊN EM', 'A', 'A1', 0),
('TÌNH CHỊ DUYÊN EM', 'A', 'A2', 0),
('TÌNH CHỊ DUYÊN EM', 'A', 'A3', 0),
('TÌNH CHỊ DUYÊN EM', 'A', 'A4', 0),
('TÌNH CHỊ DUYÊN EM', 'A', 'A5', 0),
('TÌNH CHỊ DUYÊN EM', 'A', 'A6', 0),
('TÌNH CHỊ DUYÊN EM', 'A', 'A7', 0),
('TÌNH CHỊ DUYÊN EM', 'A', 'A8', 0),
('TÌNH CHỊ DUYÊN EM', 'B', 'B1', 0),
('TÌNH CHỊ DUYÊN EM', 'B', 'B2', 0),
('TÌNH CHỊ DUYÊN EM', 'B', 'B3', 0),
('TÌNH CHỊ DUYÊN EM', 'B', 'B4', 0),
('TÌNH CHỊ DUYÊN EM', 'B', 'B5', 0),
('TÌNH CHỊ DUYÊN EM', 'B', 'B6', 0),
('TÌNH CHỊ DUYÊN EM', 'B', 'B7', 0),
('TÌNH CHỊ DUYÊN EM', 'B', 'B8', 0),
('TÌNH CHỊ DUYÊN EM', 'C', 'C1', 0),
('TÌNH CHỊ DUYÊN EM', 'C', 'C2', 0),
('TÌNH CHỊ DUYÊN EM', 'C', 'C3', 0),
('TÌNH CHỊ DUYÊN EM', 'C', 'C4', 1),
('TÌNH CHỊ DUYÊN EM', 'C', 'C5', 0),
('TÌNH CHỊ DUYÊN EM', 'C', 'C6', 0),
('TÌNH CHỊ DUYÊN EM', 'C', 'C7', 0),
('TÌNH CHỊ DUYÊN EM', 'C', 'C8', 0),
('TÌNH CHỊ DUYÊN EM', 'D', 'D1', 0),
('TÌNH CHỊ DUYÊN EM', 'D', 'D2', 0),
('TÌNH CHỊ DUYÊN EM', 'D', 'D3', 0),
('TÌNH CHỊ DUYÊN EM', 'D', 'D4', 0),
('TÌNH CHỊ DUYÊN EM', 'D', 'D5', 0),
('TÌNH CHỊ DUYÊN EM', 'D', 'D6', 0),
('TÌNH CHỊ DUYÊN EM', 'D', 'D7', 0),
('TÌNH CHỊ DUYÊN EM', 'D', 'D8', 0),
('TÌNH CHỊ DUYÊN EM', 'E', 'E1', 0),
('TÌNH CHỊ DUYÊN EM', 'E', 'E2', 0),
('TÌNH CHỊ DUYÊN EM', 'E', 'E3', 0),
('TÌNH CHỊ DUYÊN EM', 'E', 'E4', 0),
('TÌNH CHỊ DUYÊN EM', 'E', 'E5', 0),
('TÌNH CHỊ DUYÊN EM', 'E', 'E6', 0),
('TÌNH CHỊ DUYÊN EM', 'E', 'E7', 0),
('TÌNH CHỊ DUYÊN EM', 'E', 'E8', 0),
('MẶT NẠ QUỶ', 'A', 'A1', 0),
('MẶT NẠ QUỶ', 'A', 'A2', 0),
('MẶT NẠ QUỶ', 'A', 'A3', 0),
('MẶT NẠ QUỶ', 'A', 'A4', 0),
('MẶT NẠ QUỶ', 'A', 'A5', 0),
('MẶT NẠ QUỶ', 'A', 'A6', 0),
('MẶT NẠ QUỶ', 'A', 'A7', 0),
('MẶT NẠ QUỶ', 'A', 'A8', 0),
('MẶT NẠ QUỶ', 'B', 'B1', 0),
('MẶT NẠ QUỶ', 'B', 'B2', 0),
('MẶT NẠ QUỶ', 'B', 'B3', 0),
('MẶT NẠ QUỶ', 'B', 'B4', 0),
('MẶT NẠ QUỶ', 'B', 'B5', 0),
('MẶT NẠ QUỶ', 'B', 'B6', 0),
('MẶT NẠ QUỶ', 'B', 'B7', 0),
('MẶT NẠ QUỶ', 'B', 'B8', 0),
('MẶT NẠ QUỶ', 'C', 'C1', 0),
('MẶT NẠ QUỶ', 'C', 'C2', 0),
('MẶT NẠ QUỶ', 'C', 'C3', 0),
('MẶT NẠ QUỶ', 'C', 'C4', 1),
('MẶT NẠ QUỶ', 'C', 'C5', 1),
('MẶT NẠ QUỶ', 'C', 'C6', 0),
('MẶT NẠ QUỶ', 'C', 'C7', 0),
('MẶT NẠ QUỶ', 'C', 'C8', 0),
('MẶT NẠ QUỶ', 'D', 'D1', 0),
('MẶT NẠ QUỶ', 'D', 'D2', 0),
('MẶT NẠ QUỶ', 'D', 'D3', 0),
('MẶT NẠ QUỶ', 'D', 'D4', 0),
('MẶT NẠ QUỶ', 'D', 'D5', 0),
('MẶT NẠ QUỶ', 'D', 'D6', 0),
('MẶT NẠ QUỶ', 'D', 'D7', 0),
('MẶT NẠ QUỶ', 'D', 'D8', 0),
('MẶT NẠ QUỶ', 'E', 'E1', 0),
('MẶT NẠ QUỶ', 'E', 'E2', 0),
('MẶT NẠ QUỶ', 'E', 'E3', 0),
('MẶT NẠ QUỶ', 'E', 'E4', 0),
('MẶT NẠ QUỶ', 'E', 'E5', 0),
('MẶT NẠ QUỶ', 'E', 'E6', 0),
('MẶT NẠ QUỶ', 'E', 'E7', 0),
('MẶT NẠ QUỶ', 'E', 'E8', 0),
('AIR - THEO ĐUỔI...', 'A', 'A1', 0),
('AIR - THEO ĐUỔI...', 'A', 'A2', 0),
('AIR - THEO ĐUỔI...', 'A', 'A3', 0),
('AIR - THEO ĐUỔI...', 'A', 'A4', 0),
('AIR - THEO ĐUỔI...', 'A', 'A5', 0),
('AIR - THEO ĐUỔI...', 'A', 'A6', 0),
('AIR - THEO ĐUỔI...', 'A', 'A7', 0),
('AIR - THEO ĐUỔI...', 'A', 'A8', 0),
('AIR - THEO ĐUỔI...', 'B', 'B1', 0),
('AIR - THEO ĐUỔI...', 'B', 'B2', 0),
('AIR - THEO ĐUỔI...', 'B', 'B3', 0),
('AIR - THEO ĐUỔI...', 'B', 'B4', 0),
('AIR - THEO ĐUỔI...', 'B', 'B5', 0),
('AIR - THEO ĐUỔI...', 'B', 'B6', 0),
('AIR - THEO ĐUỔI...', 'B', 'B7', 0),
('AIR - THEO ĐUỔI...', 'B', 'B8', 0),
('AIR - THEO ĐUỔI...', 'C', 'C1', 0),
('AIR - THEO ĐUỔI...', 'C', 'C2', 0),
('AIR - THEO ĐUỔI...', 'C', 'C3', 0),
('AIR - THEO ĐUỔI...', 'C', 'C4', 0),
('AIR - THEO ĐUỔI...', 'C', 'C5', 0),
('AIR - THEO ĐUỔI...', 'C', 'C6', 0),
('AIR - THEO ĐUỔI...', 'C', 'C7', 0),
('AIR - THEO ĐUỔI...', 'C', 'C8', 0),
('AIR - THEO ĐUỔI...', 'D', 'D1', 0),
('AIR - THEO ĐUỔI...', 'D', 'D2', 0),
('AIR - THEO ĐUỔI...', 'D', 'D3', 0),
('AIR - THEO ĐUỔI...', 'D', 'D4', 0),
('AIR - THEO ĐUỔI...', 'D', 'D5', 0),
('AIR - THEO ĐUỔI...', 'D', 'D6', 0),
('AIR - THEO ĐUỔI...', 'D', 'D7', 0),
('AIR - THEO ĐUỔI...', 'D', 'D8', 0),
('AIR - THEO ĐUỔI...', 'E', 'E1', 0),
('AIR - THEO ĐUỔI...', 'E', 'E2', 0),
('AIR - THEO ĐUỔI...', 'E', 'E3', 0),
('AIR - THEO ĐUỔI...', 'E', 'E4', 0),
('AIR - THEO ĐUỔI...', 'E', 'E5', 0),
('AIR - THEO ĐUỔI...', 'E', 'E6', 0),
('AIR - THEO ĐUỔI...', 'E', 'E7', 0),
('AIR - THEO ĐUỔI...', 'E', 'E8', 0),
('SIÊU LỪA GẶP SIÊU...', 'A', 'A1', 0),
('SIÊU LỪA GẶP SIÊU...', 'A', 'A2', 0),
('SIÊU LỪA GẶP SIÊU...', 'A', 'A3', 0),
('SIÊU LỪA GẶP SIÊU...', 'A', 'A4', 0),
('SIÊU LỪA GẶP SIÊU...', 'A', 'A5', 0),
('SIÊU LỪA GẶP SIÊU...', 'A', 'A6', 0),
('SIÊU LỪA GẶP SIÊU...', 'A', 'A7', 0),
('SIÊU LỪA GẶP SIÊU...', 'A', 'A8', 0),
('SIÊU LỪA GẶP SIÊU...', 'B', 'B1', 0),
('SIÊU LỪA GẶP SIÊU...', 'B', 'B2', 0),
('SIÊU LỪA GẶP SIÊU...', 'B', 'B3', 0),
('SIÊU LỪA GẶP SIÊU...', 'B', 'B4', 0),
('SIÊU LỪA GẶP SIÊU...', 'B', 'B5', 0),
('SIÊU LỪA GẶP SIÊU...', 'B', 'B6', 0),
('SIÊU LỪA GẶP SIÊU...', 'B', 'B7', 0),
('SIÊU LỪA GẶP SIÊU...', 'B', 'B8', 0),
('SIÊU LỪA GẶP SIÊU...', 'C', 'C1', 0),
('SIÊU LỪA GẶP SIÊU...', 'C', 'C2', 0),
('SIÊU LỪA GẶP SIÊU...', 'C', 'C3', 0),
('SIÊU LỪA GẶP SIÊU...', 'C', 'C4', 0),
('SIÊU LỪA GẶP SIÊU...', 'C', 'C5', 1),
('SIÊU LỪA GẶP SIÊU...', 'C', 'C6', 0),
('SIÊU LỪA GẶP SIÊU...', 'C', 'C7', 0),
('SIÊU LỪA GẶP SIÊU...', 'C', 'C8', 0),
('SIÊU LỪA GẶP SIÊU...', 'D', 'D1', 0),
('SIÊU LỪA GẶP SIÊU...', 'D', 'D2', 0),
('SIÊU LỪA GẶP SIÊU...', 'D', 'D3', 0),
('SIÊU LỪA GẶP SIÊU...', 'D', 'D4', 0),
('SIÊU LỪA GẶP SIÊU...', 'D', 'D5', 0),
('SIÊU LỪA GẶP SIÊU...', 'D', 'D6', 0),
('SIÊU LỪA GẶP SIÊU...', 'D', 'D7', 0),
('SIÊU LỪA GẶP SIÊU...', 'D', 'D8', 0),
('SIÊU LỪA GẶP SIÊU...', 'E', 'E1', 0),
('SIÊU LỪA GẶP SIÊU...', 'E', 'E2', 0),
('SIÊU LỪA GẶP SIÊU...', 'E', 'E3', 0),
('SIÊU LỪA GẶP SIÊU...', 'E', 'E4', 0),
('SIÊU LỪA GẶP SIÊU...', 'E', 'E5', 0),
('SIÊU LỪA GẶP SIÊU...', 'E', 'E6', 0),
('SIÊU LỪA GẶP SIÊU...', 'E', 'E7', 0),
('SIÊU LỪA GẶP SIÊU...', 'E', 'E8', 0),
('TAY SAI CỦA QUỶ', 'A', 'A1', 0),
('TAY SAI CỦA QUỶ', 'A', 'A2', 0),
('TAY SAI CỦA QUỶ', 'A', 'A3', 0),
('TAY SAI CỦA QUỶ', 'A', 'A4', 0),
('TAY SAI CỦA QUỶ', 'A', 'A5', 0),
('TAY SAI CỦA QUỶ', 'A', 'A6', 0),
('TAY SAI CỦA QUỶ', 'A', 'A7', 0),
('TAY SAI CỦA QUỶ', 'A', 'A8', 0),
('TAY SAI CỦA QUỶ', 'B', 'B1', 0),
('TAY SAI CỦA QUỶ', 'B', 'B2', 0),
('TAY SAI CỦA QUỶ', 'B', 'B3', 0),
('TAY SAI CỦA QUỶ', 'B', 'B4', 0),
('TAY SAI CỦA QUỶ', 'B', 'B5', 0),
('TAY SAI CỦA QUỶ', 'B', 'B6', 0),
('TAY SAI CỦA QUỶ', 'B', 'B7', 0),
('TAY SAI CỦA QUỶ', 'B', 'B8', 0),
('TAY SAI CỦA QUỶ', 'C', 'C1', 0),
('TAY SAI CỦA QUỶ', 'C', 'C2', 0),
('TAY SAI CỦA QUỶ', 'C', 'C3', 1),
('TAY SAI CỦA QUỶ', 'C', 'C4', 0),
('TAY SAI CỦA QUỶ', 'C', 'C5', 0),
('TAY SAI CỦA QUỶ', 'C', 'C6', 0),
('TAY SAI CỦA QUỶ', 'C', 'C7', 0),
('TAY SAI CỦA QUỶ', 'C', 'C8', 0),
('TAY SAI CỦA QUỶ', 'D', 'D1', 0),
('TAY SAI CỦA QUỶ', 'D', 'D2', 0),
('TAY SAI CỦA QUỶ', 'D', 'D3', 0),
('TAY SAI CỦA QUỶ', 'D', 'D4', 0),
('TAY SAI CỦA QUỶ', 'D', 'D5', 0),
('TAY SAI CỦA QUỶ', 'D', 'D6', 0),
('TAY SAI CỦA QUỶ', 'D', 'D7', 0),
('TAY SAI CỦA QUỶ', 'D', 'D8', 0),
('TAY SAI CỦA QUỶ', 'E', 'E1', 0),
('TAY SAI CỦA QUỶ', 'E', 'E2', 0),
('TAY SAI CỦA QUỶ', 'E', 'E3', 0),
('TAY SAI CỦA QUỶ', 'E', 'E4', 0),
('TAY SAI CỦA QUỶ', 'E', 'E5', 0),
('TAY SAI CỦA QUỶ', 'E', 'E6', 0),
('TAY SAI CỦA QUỶ', 'E', 'E7', 0),
('TAY SAI CỦA QUỶ', 'E', 'E8', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `film_day`
--

CREATE TABLE `film_day` (
  `film` varchar(50) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `film_day`
--

INSERT INTO `film_day` (`film`, `day`) VALUES
('KHẮC TINH CỦA QUỶ', 'Mon 14/05'),
('KHẮC TINH CỦA QUỶ', 'Tue 15/05'),
('KHẮC TINH CỦA QUỶ', 'Wed 16/05'),
('KHẮC TINH CỦA QUỶ', 'Thu 17/05'),
('KHẮC TINH CỦA QUỶ', 'Fri 18/05'),
('KHẮC TINH CỦA QUỶ', 'Sat 19/05'),
('ANH EM SUPER MARIO', 'Mon 14/05'),
('ANH EM SUPER MARIO', 'Tue 15/05'),
('ANH EM SUPER MARIO', 'Wed 16/05'),
('ANH EM SUPER MARIO', 'Thu 17/05'),
('ANH EM SUPER MARIO', 'Fri 18/05'),
('ANH EM SUPER MARIO', 'Sat 19/05'),
('TRI KỶ', 'Mon 14/05'),
('TRI KỶ', 'Tue 15/05'),
('TRI KỶ', 'Wed 16/05'),
('TRI KỶ', 'Thu 17/05'),
('TRI KỶ', 'Fri 18/05'),
('TRI KỶ', 'Sat 19/05'),
('MẶT NẠ QUỶ', 'Mon 21/05'),
('MẶT NẠ QUỶ', 'Tue 22/05'),
('MẶT NẠ QUỶ', 'Wed 23/05'),
('MẶT NẠ QUỶ', 'Thu 24/05'),
('MẶT NẠ QUỶ', 'Fri 25/05'),
('MẶT NẠ QUỶ', 'Sat 26/05'),
('AIR - THEO ĐUỔI...', 'Mon 21/05'),
('AIR - THEO ĐUỔI...', 'Tue 22/05'),
('AIR - THEO ĐUỔI...', 'Wed 23/05'),
('AIR - THEO ĐUỔI...', 'Thu 24/05'),
('AIR - THEO ĐUỔI...', 'Fri 25/05'),
('AIR - THEO ĐUỔI...', 'Sat 26/05'),
('SIÊU LỪA GẶP SIÊU...', 'Mon 21/05'),
('SIÊU LỪA GẶP SIÊU...', 'Tue 22/05'),
('SIÊU LỪA GẶP SIÊU...', 'Wed 23/05'),
('SIÊU LỪA GẶP SIÊU...', 'Thu 24/05'),
('SIÊU LỪA GẶP SIÊU...', 'Fri 25/05'),
('SIÊU LỪA GẶP SIÊU...', 'Sat 26/05'),
('TAY SAI CỦA QUỶ', 'Mon 21/05'),
('TAY SAI CỦA QUỶ', 'Tue 22/05'),
('TAY SAI CỦA QUỶ', 'Wed 23/05'),
('TAY SAI CỦA QUỶ', 'Thu 24/05'),
('TAY SAI CỦA QUỶ', 'Fri 25/05'),
('TAY SAI CỦA QUỶ', 'Sat 26/05'),
('TÌNH CHỊ DUYÊN EM', 'Mon 29/05'),
('TÌNH CHỊ DUYÊN EM', 'Tue 30/05'),
('TÌNH CHỊ DUYÊN EM', 'Wed 31/05'),
('TÌNH CHỊ DUYÊN EM', 'Thu 01/06'),
('TÌNH CHỊ DUYÊN EM', 'Fri 02/06'),
('TÌNH CHỊ DUYÊN EM', 'Sat 03/06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `film_theater`
--

CREATE TABLE `film_theater` (
  `film` varchar(50) NOT NULL,
  `theater` varchar(50) NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `film_theater`
--

INSERT INTO `film_theater` (`film`, `theater`, `time`) VALUES
('KHẮC TINH CỦA QUỶ', 'CGV Giga Mall Thủ Đức', '15:30 PM'),
('KHẮC TINH CỦA QUỶ', 'CGV Giga Mall Thủ Đức', '17:00 PM'),
('KHẮC TINH CỦA QUỶ', 'CGV Giga Mall Thủ Đức', '21:00 PM'),
('KHẮC TINH CỦA QUỶ', 'CGV Giga Mall Thủ Đức', '23:10 PM'),
('KHẮC TINH CỦA QUỶ', 'CGV Vivo City', '15:35 PM'),
('KHẮC TINH CỦA QUỶ', 'CGV Vivo City', '18:20 PM'),
('KHẮC TINH CỦA QUỶ', 'CGV Vivo City', '19:45 PM'),
('KHẮC TINH CỦA QUỶ', 'CGV Vivo City', '21:00 PM'),
('KHẮC TINH CỦA QUỶ', 'CGV Sư Vạn Hạnh', '23:05 PM'),
('KHẮC TINH CỦA QUỶ', 'CGV Crescent Mall', '23:30 PM'),
('KHẮC TINH CỦA QUỶ', 'CGV Crescent Mall', '22:10 PM'),
('KHẮC TINH CỦA QUỶ', 'CGV Vincom Đồng Khởi', '10:00 AM'),
('KHẮC TINH CỦA QUỶ', 'CGV Vincom Đồng Khởi', '18:35 AM'),
('KHẮC TINH CỦA QUỶ', 'CGV Vincom Đồng Khởi', '21:00 AM'),
('KHẮC TINH CỦA QUỶ', 'CGV Vincom Đồng Khởi', '22:10 AM'),
('KHẮC TINH CỦA QUỶ', 'CGV Vincom Đồng Khởi', '23:50 PM'),
('ANH EM SUPER MARIO', 'CGV Giga Mall Thủ Đức', '18:15 PM'),
('ANH EM SUPER MARIO', 'CGV Giga Mall Thủ Đức', '19:40 PM'),
('ANH EM SUPER MARIO', 'CGV Giga Mall Thủ Đức', '20:15 PM'),
('ANH EM SUPER MARIO', 'CGV Giga Mall Thủ Đức', '21:45 PM'),
('ANH EM SUPER MARIO', 'CGV Giga Mall Thủ Đức', '23:15 PM'),
('ANH EM SUPER MARIO', 'CGV Vivo City', '16:00 PM'),
('ANH EM SUPER MARIO', 'CGV Vivo City', '18:00 PM'),
('ANH EM SUPER MARIO', 'CGV Vivo City', '21:00 PM'),
('ANH EM SUPER MARIO', 'CGV Vivo City', '23:00 PM'),
('ANH EM SUPER MARIO', 'CGV Sư Vạn Hạnh', '20:10 PM'),
('ANH EM SUPER MARIO', 'CGV Sư Vạn Hạnh', '21:10 PM'),
('ANH EM SUPER MARIO', 'CGV Sư Vạn Hạnh', '22:10 PM'),
('ANH EM SUPER MARIO', 'CGV Crescent Mall', '17:15 PM'),
('ANH EM SUPER MARIO', 'CGV Crescent Mall', '18:45 PM'),
('ANH EM SUPER MARIO', 'CGV Crescent Mall', '19:30 PM'),
('ANH EM SUPER MARIO', 'CGV Crescent Mall', '22:10 PM'),
('ANH EM SUPER MARIO', 'CGV Crescent Mall', '23:00 PM'),
('ANH EM SUPER MARIO', 'CGV Vincom Đồng Khởi', '9:00 AM'),
('ANH EM SUPER MARIO', 'CGV Vincom Đồng Khởi', '13:30 PM'),
('ANH EM SUPER MARIO', 'CGV Vincom Đồng Khởi', '15:00 PM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Giga Mall Thủ Đức', '18:15 PM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Giga Mall Thủ Đức', '19:40 PM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Giga Mall Thủ Đức', '20:15 PM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Giga Mall Thủ Đức', '21:45 PM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Giga Mall Thủ Đức', '23:15 PM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Vivo City', '16:00 PM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Vivo City', '18:00 PM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Vivo City', '21:00 PM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Vivo City', '23:00 PM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Sư Vạn Hạnh', '20:10 PM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Sư Vạn Hạnh', '21:10 PM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Sư Vạn Hạnh', '22:10 PM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Crescent Mall', '17:15 PM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Crescent Mall', '18:45 PM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Crescent Mall', '19:30 PM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Crescent Mall', '22:10 PM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Crescent Mall', '23:00 PM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Vincom Đồng Khởi', '9:00 AM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Vincom Đồng Khởi', '13:30 PM'),
('SIÊU LỪA GẶP SIÊU...', 'CGV Vincom Đồng Khởi', '15:00 PM'),
('TRI KỶ', 'CGV Giga Mall Thủ Đức', '18:15 PM'),
('TRI KỶ', 'CGV Giga Mall Thủ Đức', '19:40 PM'),
('TRI KỶ', 'CGV Giga Mall Thủ Đức', '21:45 PM'),
('TRI KỶ', 'CGV Giga Mall Thủ Đức', '23:15 PM'),
('TRI KỶ', 'CGV Vivo City', '16:00 PM'),
('TRI KỶ', 'CGV Vivo City', '18:00 PM'),
('TRI KỶ', 'CGV Sư Vạn Hạnh', '20:10 PM'),
('TRI KỶ', 'CGV Crescent Mall', '17:15 PM'),
('TRI KỶ', 'CGV Crescent Mall', '18:45 PM'),
('TRI KỶ', 'CGV Crescent Mall', '22:10 PM'),
('TRI KỶ', 'CGV Vincom Đồng Khởi', '9:00 AM'),
('TRI KỶ', 'CGV Vincom Đồng Khởi', '13:30 PM'),
('TRI KỶ', 'CGV Vincom Đồng Khởi', '15:00 PM'),
('TAY SAI CỦA QUỶ', 'CGV Giga Mall Thủ Đức', '18:15 PM'),
('TAY SAI CỦA QUỶ', 'CGV Giga Mall Thủ Đức', '19:40 PM'),
('TAY SAI CỦA QUỶ', 'CGV Giga Mall Thủ Đức', '21:45 PM'),
('TAY SAI CỦA QUỶ', 'CGV Giga Mall Thủ Đức', '23:15 PM'),
('TAY SAI CỦA QUỶ', 'CGV Vivo City', '16:00 PM'),
('TAY SAI CỦA QUỶ', 'CGV Vivo City', '18:00 PM'),
('TAY SAI CỦA QUỶ', 'CGV Sư Vạn Hạnh', '20:10 PM'),
('TAY SAI CỦA QUỶ', 'CGV Crescent Mall', '17:15 PM'),
('TAY SAI CỦA QUỶ', 'CGV Crescent Mall', '18:45 PM'),
('TAY SAI CỦA QUỶ', 'CGV Crescent Mall', '22:10 PM'),
('TAY SAI CỦA QUỶ', 'CGV Vincom Đồng Khởi', '9:00 AM'),
('TAY SAI CỦA QUỶ', 'CGV Vincom Đồng Khởi', '13:30 PM'),
('TAY SAI CỦA QUỶ', 'CGV Vincom Đồng Khởi', '15:00 PM'),
('AIR - THEO ĐUỔI...', 'CGV Giga Mall Thủ Đức', '23:15 PM'),
('AIR - THEO ĐUỔI...', 'CGV Vivo City', '16:00 PM'),
('AIR - THEO ĐUỔI...', 'CGV Vivo City', '18:00 PM'),
('AIR - THEO ĐUỔI...', 'CGV Vivo City', '21:00 PM'),
('AIR - THEO ĐUỔI...', 'CGV Vivo City', '23:00 PM'),
('AIR - THEO ĐUỔI...', 'CGV Sư Vạn Hạnh', '20:10 PM'),
('AIR - THEO ĐUỔI...', 'CGV Sư Vạn Hạnh', '21:10 PM'),
('AIR - THEO ĐUỔI...', 'CGV Sư Vạn Hạnh', '22:10 PM'),
('AIR - THEO ĐUỔI...', 'CGV Crescent Mall', '17:15 PM'),
('AIR - THEO ĐUỔI...', 'CGV Crescent Mall', '18:45 PM'),
('AIR - THEO ĐUỔI...', 'CGV Vincom Đồng Khởi', '9:00 AM'),
('AIR - THEO ĐUỔI...', 'CGV Vincom Đồng Khởi', '15:00 PM'),
('MẶT NẠ QUỶ', 'CGV Giga Mall Thủ Đức', '18:15 PM'),
('MẶT NẠ QUỶ', 'CGV Vivo City', '16:00 PM'),
('MẶT NẠ QUỶ', 'CGV Vivo City', '18:00 PM'),
('MẶT NẠ QUỶ', 'CGV Sư Vạn Hạnh', '20:10 PM'),
('MẶT NẠ QUỶ', 'CGV Sư Vạn Hạnh', '21:10 PM'),
('MẶT NẠ QUỶ', 'CGV Sư Vạn Hạnh', '22:10 PM'),
('MẶT NẠ QUỶ', 'CGV Crescent Mall', '17:15 PM'),
('MẶT NẠ QUỶ', 'CGV Crescent Mall', '18:45 PM'),
('MẶT NẠ QUỶ', 'CGV Crescent Mall', '19:30 PM'),
('MẶT NẠ QUỶ', 'CGV Crescent Mall', '22:10 PM'),
('MẶT NẠ QUỶ', 'CGV Crescent Mall', '23:00 PM'),
('MẶT NẠ QUỶ', 'CGV Vincom Đồng Khởi', '15:00 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Giga Mall Thủ Đức', '18:15 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Giga Mall Thủ Đức', '19:40 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Giga Mall Thủ Đức', '20:15 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Giga Mall Thủ Đức', '21:45 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Giga Mall Thủ Đức', '23:15 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Vivo City', '16:00 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Vivo City', '18:00 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Vivo City', '21:00 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Vivo City', '23:00 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Vivo City', '23:50 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Sư Vạn Hạnh', '20:10 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Sư Vạn Hạnh', '21:10 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Sư Vạn Hạnh', '22:10 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Sư Vạn Hạnh', '22:50 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Sư Vạn Hạnh', '23:15 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Crescent Mall', '17:15 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Crescent Mall', '18:45 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Crescent Mall', '19:30 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Crescent Mall', '22:10 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Crescent Mall', '23:00 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Vincom Đồng Khởi', '9:00 AM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Vincom Đồng Khởi', '10:30 AM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Vincom Đồng Khởi', '13:30 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Vincom Đồng Khởi', '14:25 PM'),
('TÌNH CHỊ DUYÊN EM', 'CGV Vincom Đồng Khởi', '15:40 PM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `future_films`
--

CREATE TABLE `future_films` (
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `image` varchar(250) NOT NULL,
  `time` varchar(50) NOT NULL,
  `detail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `future_films`
--

INSERT INTO `future_films` (`name`, `image`, `time`, `detail`) VALUES
('CON NHÓT MÓT CHỒNG', 'con-nhot-mot-chong.jpg', 'Khởi chiếu 21/04/2023', 'f_film1.html'),
('NGỤC TỐI & RỒNG:...', 'nguc-toi-rong.jpg', 'Khởi chiếu 21/04/2023', 'f_film2.html'),
('ĐẦU GẤU ĐỤNG ĐẦU...', 'dau-gau-dung-dau-dat.jpg', 'Khởi chiếu 21/04/2023', 'f_film3.html'),
('KHÊ ƯỚC', 'khe-uoc.jpg', 'Khởi chiếu 21/04/2023', 'f_film4.html'),
('TRẠM TÀU MA', 'tram-tau-ma.jpg', 'Khởi chiếu 27/04/2023', 'f_film5.html'),
('LẬT MẶT 6: TẤM VÉ...', 'lat-mat-6.jpg', 'Khởi chiếu 28/04/2023', 'f_film6.html'),
('MÈO SIÊU QUẬY Ở...', 'meo-sieu-quay-o-vien-bao-tang.jpg', 'Khởi chiếu 28/04/2023', 'f_film7.html'),
('VỆ BINH GIẢI NGÂN HÀ 3', 've-binh-dai-ngan-ha-3.jpg', 'Khởi chiếu 03/05/2023', 'f_film8.html');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `information_customer`
--

CREATE TABLE `information_customer` (
  `username` varchar(50) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `age` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `information_customer`
--

INSERT INTO `information_customer` (`username`, `name`, `age`, `gender`, `email`, `phone`) VALUES
('Yến Võ', 'Võ Ngọc Yến', '20', 'Nữ', 'vongocyen2402@gmail.com', '0123456789'),
('Đạt Phạm', 'Đạt Phạm', '20', 'Male', 'kiettiger2@gmail.com', '0123456789');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `my_ticket`
--

CREATE TABLE `my_ticket` (
  `username` varchar(50) NOT NULL,
  `film` varchar(50) NOT NULL,
  `day` varchar(30) NOT NULL,
  `theater_time` varchar(40) NOT NULL,
  `chair` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `my_ticket`
--

INSERT INTO `my_ticket` (`username`, `film`, `day`, `theater_time`, `chair`, `name`) VALUES
('beut2402', 'KHẮC TINH CỦA QUỶ', 'Mon 14/05', 'CGV Vincom Đồng Khởi 23:50 PM', 'A1', 'Yến Võ'),
('beut2402', 'TÌNH CHỊ DUYÊN EM', 'Sat 03/06', 'CGV Giga Mall Thủ Đức 23:15 PM', 'C4', 'Yến Võ'),
('tiendat2003', 'SIÊU LỪA GẶP SIÊU...', 'Fri 25/05', 'CGV Giga Mall Thủ Đức 20:15 PM', 'C5', 'Đạt Phạm'),
('tiendat2003', 'TAY SAI CỦA QUỶ', 'Fri 25/05', 'CGV Sư Vạn Hạnh 20:10 PM', 'C3', 'Đạt Phạm'),
('tiendat2003', 'KHẮC TINH CỦA QUỶ', 'Tue 15/05', 'CGV Giga Mall Thủ Đức 17:00 PM', 'C4', 'Đạt Phạm'),
('tiendat2023', 'TRI KỶ', 'Sat 19/05', 'CGV Vivo City 18:00 PM', 'A1', 'Đạt Phạm'),
('tiendat2023', 'MẶT NẠ QUỶ', 'Mon 21/05', 'CGV Crescent Mall 23:00 PM', 'C4', 'Đạt Phạm'),
('tiendat2003', 'MẶT NẠ QUỶ', 'Wed 23/05', 'CGV Crescent Mall 23:00 PM', 'C5', 'Đạt Phạm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `now_films`
--

CREATE TABLE `now_films` (
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `image` varchar(250) NOT NULL,
  `time` varchar(50) NOT NULL,
  `detail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `now_films`
--

INSERT INTO `now_films` (`name`, `image`, `time`, `detail`) VALUES
('KHẮC TINH CỦA QUỶ', 'khac-tinh-cua-quy.jpg', '104 Phút 12/04/2023', 'n_film1.php'),
('ANH EM SUPER MARIO', 'super-mario.jpg', '93 Phút 07/04/2023', 'n_film2.php'),
('TRI KỶ', 'tri-ky.jpg', '124 phút 24/03/2023', 'n_film3.php'),
('TÌNH CHỊ DUYÊN EM', 'tinh-chi-duyen-em.jpg', '121 Phút 07/04/2023', 'n_film4.php'),
('MẶT NẠ QUỶ', 'mat-na-quy.jpg', '102 Phút 14/04/2023', 'n_film5.php'),
('AIR - THEO ĐUỔI...', 'air.jpg', '112 Phút 14/04/2023', 'n_film6.php'),
('SIÊU LỪA GẶP SIÊU...', 'sieu-lua-gap-sieu-lay.jpg', '112 Phút 01/03/2023', 'n_film7.php'),
('TAY SAI CỦA QUỶ', 'renfield.jpg', '92 Phút 14/04/2023<', 'n_film8.php');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `poster`
--

CREATE TABLE `poster` (
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `image` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `poster`
--

INSERT INTO `poster` (`name`, `image`, `position`) VALUES
('Khắc tinh của quỷ', 'khac-tinh-cua-quy.jpg', 'Top 1'),
('Chuyện tôi và ma quỷ thành người một nhà', 'chuyen-toi-va-ma-quy-thanh-nguoi-mot-nha.jpg', 'Top 2'),
('Người giữ thời gian', 'nguoi-giu-thoi-gian.jpg', 'Top 3'),
('Super Mario', 'super-mario.jpg', 'Top 4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reset_token`
--

CREATE TABLE `reset_token` (
  `email` varchar(64) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expire_on` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reset_token`
--

INSERT INTO `reset_token` (`email`, `token`, `expire_on`) VALUES
('kiettiger2@gmail.com', '05c459890623e4fbc85f46c97108b961', 1682092655),
('phamvantiendat2@gmail.com', '23d374bb0ba2a002f463a1ce3544b5d5', 1683008659);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
