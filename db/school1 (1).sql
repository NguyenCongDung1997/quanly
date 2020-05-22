-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 22, 2020 lúc 10:08 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `school1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `AID` int(11) NOT NULL,
  `ANAME` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `APASS` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`AID`, `ANAME`, `APASS`) VALUES
(1, 'admin', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `ClassID` int(11) NOT NULL,
  `ClassName` varchar(150) NOT NULL,
  `ClassSection` varchar(150) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`ClassID`, `ClassName`, `ClassSection`, `CreatedAt`, `UpdatedAt`) VALUES
(2, '1', 'A', '2020-05-14 03:03:35', '2020-05-14 03:12:05'),
(16, '2', 'A', '2020-05-14 03:47:24', '2020-05-14 03:47:24'),
(29, '2', 'D', '2020-05-18 07:48:40', '2020-05-18 07:48:40'),
(32, '3', 'A', '2020-05-19 03:57:42', '2020-05-19 03:57:42'),
(33, '4', 'C', '2020-05-19 03:57:47', '2020-05-19 03:57:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exam`
--

CREATE TABLE `exam` (
  `ExamID` int(11) NOT NULL,
  `ENAME` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ETYPE` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `EDATE` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SESSION` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ClassId` int(11) NOT NULL,
  `SubjectsID` int(11) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `exam`
--

INSERT INTO `exam` (`ExamID`, `ENAME`, `ETYPE`, `EDATE`, `SESSION`, `ClassId`, `SubjectsID`, `CreatedAt`, `UpdatedAt`) VALUES
(5, 'KTT', '', '2020-05-13', '1', 32, 14, '2020-05-18 02:46:11', '2020-05-18 02:46:20'),
(6, 'KT2', '', '2020-05-05', '2', 33, 15, '2020-05-19 03:19:05', '2020-05-19 03:19:05'),
(7, 'KT2', '', '2020-05-13', '2', 32, 14, '2020-05-20 09:24:55', '2020-05-20 09:24:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `handledclass`
--

CREATE TABLE `handledclass` (
  `HID` int(11) NOT NULL,
  `TeacherID` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `SubjectsID` int(11) NOT NULL,
  `CreatedAt` timestamp NULL DEFAULT NULL,
  `UpdatedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `handledclass`
--

INSERT INTO `handledclass` (`HID`, `TeacherID`, `ClassID`, `SubjectsID`, `CreatedAt`, `UpdatedAt`) VALUES
(3, 1, 2, 5, NULL, NULL),
(4, 8, 33, 14, NULL, NULL),
(6, 1, 16, 14, NULL, NULL),
(7, 1, 16, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manage`
--

CREATE TABLE `manage` (
  `Id` int(11) NOT NULL,
  `TeacherID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mark`
--

CREATE TABLE `mark` (
  `MarkID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `Point` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ExamID` int(11) NOT NULL,
  `SubjectsID` int(11) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `mark`
--

INSERT INTO `mark` (`MarkID`, `StudentID`, `Point`, `ExamID`, `SubjectsID`, `CreatedAt`, `UpdatedAt`) VALUES
(6, 3, '7', 5, 5, '2020-05-22 02:36:37', '2020-05-22 02:36:37'),
(7, 2, '9', 7, 5, '2020-05-22 02:44:45', '2020-05-22 02:44:45'),
(8, 2, '9', 7, 14, '2020-05-22 02:45:03', '2020-05-22 02:45:03'),
(9, 3, '9', 6, 15, '2020-05-22 02:45:19', '2020-05-22 02:45:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `StudentNumber` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `StudentName` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `StudentDate` date NOT NULL,
  `gender` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `StudentPhone` int(11) NOT NULL,
  `Address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `HID` int(11) NOT NULL,
  `Images` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`StudentID`, `StudentNumber`, `StudentName`, `StudentDate`, `gender`, `StudentPhone`, `Address`, `HID`, `Images`, `CreatedAt`, `UpdateAt`) VALUES
(1, '', 'Nguyễn AB', '2020-05-02', 'Nam', 123, 'Nghệ An', 3, '', '2020-05-20 03:10:39', '2020-05-20 03:10:49'),
(2, '', 'Nguyễn B', '2020-05-06', 'Nam', 123, 'Nghệ An', 3, '', '2020-05-20 03:19:59', '2020-05-20 03:19:59'),
(3, '', 'Nguyễn T', '2020-05-16', 'Nam', 1234, 'Nghệ An', 6, '', '2020-05-20 09:25:26', '2020-05-20 09:25:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `SubjectsID` int(11) NOT NULL,
  `SubjectsName` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`SubjectsID`, `SubjectsName`) VALUES
(5, 'Tiếng việt'),
(14, 'Eng'),
(15, 'Rusian');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher`
--

CREATE TABLE `teacher` (
  `TeacherID` int(11) NOT NULL,
  `TeacherNumber` varchar(150) NOT NULL,
  `TeacherName` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TeacherPass` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `FullName` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gender` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TeacherDate` date NOT NULL,
  `TeacherPhone` int(11) NOT NULL,
  `TeacherMail` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Images` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `teacher`
--

INSERT INTO `teacher` (`TeacherID`, `TeacherNumber`, `TeacherName`, `TeacherPass`, `FullName`, `gender`, `TeacherDate`, `TeacherPhone`, `TeacherMail`, `Address`, `Images`, `CreatedAt`, `UpdatedAt`) VALUES
(1, '', 'dung', '1234', 'NCD', 'Nam', '2020-05-01', 234234, 'dun@gmai.com', 'Nghệ An', '1.jpg', '2020-05-14 07:29:40', '2020-05-14 07:29:40'),
(8, '', 'dung1', '1', 'PPT', 'Nam', '2020-05-27', 2342342, 'dunff@gmail.com', 'Nghệ An', 'exam.jpg', '2020-05-18 08:55:48', '2020-05-18 08:55:48');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`),
  ADD UNIQUE KEY `ANAME` (`ANAME`) USING BTREE;

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassID`);

--
-- Chỉ mục cho bảng `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`ExamID`),
  ADD KEY `ClassId` (`ClassId`),
  ADD KEY `SubjectsID` (`SubjectsID`);

--
-- Chỉ mục cho bảng `handledclass`
--
ALTER TABLE `handledclass`
  ADD PRIMARY KEY (`HID`),
  ADD KEY `ClassID` (`ClassID`),
  ADD KEY `TeacherID` (`TeacherID`),
  ADD KEY `SubjectsID` (`SubjectsID`);

--
-- Chỉ mục cho bảng `manage`
--
ALTER TABLE `manage`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `TeacherID` (`TeacherID`);

--
-- Chỉ mục cho bảng `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`MarkID`),
  ADD KEY `ExamID` (`ExamID`),
  ADD KEY `StudenID` (`StudentID`),
  ADD KEY `SubjectsID` (`SubjectsID`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `student_ibfk_1` (`HID`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`SubjectsID`);

--
-- Chỉ mục cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`TeacherID`),
  ADD UNIQUE KEY `TeacherName` (`TeacherName`) USING BTREE,
  ADD UNIQUE KEY `TeacherPhone` (`TeacherPhone`),
  ADD UNIQUE KEY `TeacherMail` (`TeacherMail`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `class`
--
ALTER TABLE `class`
  MODIFY `ClassID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `exam`
--
ALTER TABLE `exam`
  MODIFY `ExamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `handledclass`
--
ALTER TABLE `handledclass`
  MODIFY `HID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `manage`
--
ALTER TABLE `manage`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `mark`
--
ALTER TABLE `mark`
  MODIFY `MarkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `SubjectsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `teacher`
--
ALTER TABLE `teacher`
  MODIFY `TeacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`ClassId`) REFERENCES `class` (`ClassID`),
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`SubjectsID`) REFERENCES `subjects` (`SubjectsID`);

--
-- Các ràng buộc cho bảng `handledclass`
--
ALTER TABLE `handledclass`
  ADD CONSTRAINT `handledclass_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ClassID`),
  ADD CONSTRAINT `handledclass_ibfk_2` FOREIGN KEY (`TeacherID`) REFERENCES `teacher` (`TeacherID`),
  ADD CONSTRAINT `handledclass_ibfk_3` FOREIGN KEY (`SubjectsID`) REFERENCES `subjects` (`SubjectsID`);

--
-- Các ràng buộc cho bảng `manage`
--
ALTER TABLE `manage`
  ADD CONSTRAINT `manage_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`),
  ADD CONSTRAINT `manage_ibfk_2` FOREIGN KEY (`TeacherID`) REFERENCES `teacher` (`TeacherID`);

--
-- Các ràng buộc cho bảng `mark`
--
ALTER TABLE `mark`
  ADD CONSTRAINT `mark_ibfk_2` FOREIGN KEY (`ExamID`) REFERENCES `exam` (`ExamID`),
  ADD CONSTRAINT `mark_ibfk_3` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`),
  ADD CONSTRAINT `mark_ibfk_4` FOREIGN KEY (`SubjectsID`) REFERENCES `subjects` (`SubjectsID`);

--
-- Các ràng buộc cho bảng `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`HID`) REFERENCES `handledclass` (`HID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
