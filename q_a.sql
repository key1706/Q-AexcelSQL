-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 19, 2017 lúc 09:28 AM
-- Phiên bản máy phục vụ: 10.1.25-MariaDB
-- Phiên bản PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `q_a`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answer`
--

CREATE TABLE `answer` (
  `answer_code` int(4) NOT NULL,
  `question_code` int(4) NOT NULL,
  `answer` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `answer_by` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `data_answer` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `answer`
--

INSERT INTO `answer` (`answer_code`, `question_code`, `answer`, `answer_by`, `data_answer`) VALUES
(1, 2, 'hay quá', 'Key', '2017-10-19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question`
--

CREATE TABLE `question` (
  `question_code` int(4) NOT NULL COMMENT 'Mã câu hỏi',
  `document` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tài liệu',
  `question` varchar(10000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'câu hỏi',
  `status` tinyint(1) DEFAULT NULL COMMENT 'trạng thái',
  `raised_by` char(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'người hỏi',
  `date_raised` date DEFAULT NULL COMMENT 'ngày hỏi',
  `Required_finish_date` date DEFAULT NULL COMMENT 'ngày kết thúc bắt buộc',
  `date_closed` date DEFAULT NULL COMMENT 'ngày kết thúc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `question`
--

INSERT INTO `question` (`question_code`, `document`, `question`, `status`, `raised_by`, `date_raised`, `Required_finish_date`, `date_closed`) VALUES
(1, 'hello', 'oke', 1, 'khuongnhq', '2017-10-19', '2017-10-20', '2017-10-19'),
(2, 'khuong', 'khuong', 1, 'kuongnhq', '2017-10-19', '2017-10-20', '2017-10-19'),
(3, 'key', 'key', 1, 'key', '2017-10-19', '2017-10-20', '2017-10-19');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_code`),
  ADD KEY `question_code` (`question_code`);

--
-- Chỉ mục cho bảng `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_code`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_code` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `question`
--
ALTER TABLE `question`
  MODIFY `question_code` int(4) NOT NULL AUTO_INCREMENT COMMENT 'Mã câu hỏi', AUTO_INCREMENT=4;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`question_code`) REFERENCES `question` (`question_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
