-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2024 at 11:28 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datn`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`) VALUES
(2, 'admin', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int NOT NULL,
  `id_khachhang` int NOT NULL,
  `code_cart` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `cart_status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_cart`, `id_khachhang`, `code_cart`, `cart_status`) VALUES
(28, 10, '3046', 0),
(34, 11, '3765', 0),
(35, 11, '9522', 1),
(36, 12, '2769', 0),
(37, 12, '2071', 1),
(38, 12, '1279', 1),
(39, 12, '870', 1),
(40, 12, '5596', 1),
(41, 12, '749', 1),
(42, 12, '3397', 1),
(43, 12, '668ee012e161f', 1),
(44, 32, '7364', 1),
(45, 32, '6005', 1),
(46, 32, '6618', 1),
(47, 33, '5509', 0),
(48, 37, '1541', 1),
(49, 37, '9109', 1),
(50, 41, '7793', 1),
(51, 53, '7181', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_detail`
--

CREATE TABLE `tbl_cart_detail` (
  `id_cart_detail` int NOT NULL,
  `code_cart` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id_sanpham` int NOT NULL,
  `soluongmua` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart_detail`
--

INSERT INTO `tbl_cart_detail` (`id_cart_detail`, `code_cart`, `id_sanpham`, `soluongmua`) VALUES
(14, '892', 62, 2),
(15, '892', 47, 1),
(16, '3046', 36, 3),
(17, '3046', 34, 2),
(18, '3765', 33, 1),
(19, '3765', 35, 1),
(20, '9522', 35, 2),
(23, '2071', 35, 2),
(24, '2071', 75, 1),
(25, '2071', 73, 3),
(26, '1279', 75, 2),
(27, '870', 34, 1),
(28, '5596', 35, 1),
(29, '749', 35, 1),
(30, '3397', 35, 1),
(31, '668ee012e161f', 36, 1),
(32, '668ee012e161f', 35, 3),
(33, '7364', 38, 1),
(34, '6005', 33, 1),
(35, '6618', 73, 1),
(36, '5509', 33, 1),
(37, '1541', 34, 2),
(38, '1541', 45, 2),
(39, '9109', 34, 1),
(40, '9109', 61, 2),
(41, '9109', 73, 2),
(42, '7793', 45, 2),
(43, '7181', 56, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_dangky` int NOT NULL,
  `tenkhachhang` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `diachi` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `matkhau` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `dienthoai` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_dangky`, `tenkhachhang`, `email`, `diachi`, `matkhau`, `dienthoai`) VALUES
(9, 'Huyền Bab', 'thuyduong@gmail.com', 'Hai Bà Trưng - Hà Nội', '77996899c5e95fade5daa83c9d82d57b', '9876599999'),
(24, 'Nguyen Nma', 'fullstackDeveloper@gmail.com', '1234567', 'e10adc3949ba59abbe56e057f20f883e', '1234567'),
(25, 'Nguyễn bug', 'thuyduodng@gmail.com', '123456', '81dc9bdb52d04dc20036dbd8313ed055', '12345'),
(26, 'BlaBlaBla', 'ThuyduongUpdates@gmail.com', '1', 'c4ca4238a0b923820dcc509a6f75849b', '1'),
(27, 'Nguyen V', 'ThuyduongsssUpdate@gmail.com', '1', 'c4ca4238a0b923820dcc509a6f75849b', '1'),
(28, 'HAcnnfe', 'csfffefefe@gmail.com', '123456', '81b073de9370ea873f548e31b8adc081', '123456'),
(29, 'Kàmefefe', 'ThuyduscongUd@gmail.com', '1', 'c4ca4238a0b923820dcc509a6f75849b', '1'),
(30, 'Tâttatat', 'ThuyduongjUpdate@gmail.com', '12345', 'd81f9c1be2e08964bf9f24b15f0e4900', '12345'),
(31, 'Testtesst', 'test@gmail.com', '1', 'c4ca4238a0b923820dcc509a6f75849b', '1'),
(32, 'Namblalval', 'namcosffi1029@gmail.com', 'ưer', 'c4ca4238a0b923820dcc509a6f75849b', '12'),
(33, 'Faads@gmail.com', 'faads@gmail.com', '1', 'c4ca4238a0b923820dcc509a6f75849b', '1'),
(35, 'FullStack', 'thuyduonssg@gmail.com', '12345678', '0d4e40afa0f287e14ba0964b890105e8', '1234567891'),
(36, 'FullStack2', 'grhthth102s9@gmail.com', 'Hoang Mai - Ha Noi', '29207bcd98efa6d6b26b729efdb661ef', '1234567898'),
(37, 'FullStackDev', 'fullstack@gmail.com', 'Hai Bà Trưng - Hà Nội', '7cd75bfaf87b87efbcf363d05fa7513e', '0988764365'),
(38, 'FullStack3', 'u1@gmail.com', '12345678', 'd56f587b03f3b4c52cacce815d5c2b32', '12345678345'),
(39, 'KullStack', 'f@gmail.com', 'Hai Bà Trưng - Hà Nội', '4def402f664633b4681eefbacd42142a', '0987642346'),
(40, 'Nguylms', 'nguy@gmail.com', 'Hai Bà Trưng - Hà Nội', '074295cb2d0bda5f66303fb531c338ce', '1234567898'),
(41, 'FullStackDeve', 'ggg@gmail.com', 'Hai Bà Trưng - Hà Nội', '005f47cddf568dacb8d03e20ba682cf9', '12345678944'),
(42, 'FullStackDev', 'fff@gmail.com', 'Hai Bà Trưng - Hà Nội', 'fa5469d76a240882ed91dba730405c2f', '12345678909'),
(43, 'HaiDevvv', 'gdgdgg@gmail.com', 'ádfghwerty', 'ea97cc953ed9418541a0ef64598faf4c', '1234567890234'),
(44, 'Haiii87566', 'dgdg@gmail.com', '12345671234', '67ad2c1b0da5a0544eb0a92447537e33', '1234567891234'),
(45, 'Haihhhhd', 'hdhhfhf@gmail.com', 'Hai Bà Trưng - Hà Nội', '70179f1caa7fc1c87e06e450ed21957f', '12345678123456'),
(46, 'HaiiiiFull2', 'tranbinh192@gmail.com', 'Hai Bà Trưng - Hà Nội', '5dec5dbf7fe7a7163626b0a63caea3ab', '12345612345'),
(47, 'FullStackcss', 'cscc@gmail.com', 'Hai Bà Trưng - Hà Nội', '5dec5dbf7fe7a7163626b0a63caea3ab', '12345672345'),
(48, 'FullStackDevfee', 'sff@gmail.com', '123452345', 'b2c2d2c4c682c615e6f26cdadc97dedf', '1234562345'),
(49, 'Rfefefe', 'fasdadg@gmail.com', 'Hai Bà Trưng - Hà Nội', '502c60f372f55db0a2e416f9d6a7608f', '1234567891234'),
(52, 'FullStack', 'cscccsccmk@gmail.com', 'Hai Bà Trưng - Hà Nội', '8b3a0b53769ad71ded431e424ac9a3c8', '1234567891234'),
(53, 'FullStack6556', 'cscccssvsccmk@gmail.com', 'Hai Bà Trưng - Hà Nội', '5dec5dbf7fe7a7163626b0a63caea3ab', '1234567891234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int NOT NULL,
  `tendanhmuc` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `thutu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(2, 'Computers', 2),
(3, 'Cameras', 1),
(4, 'Gaming', 5),
(5, 'Headphones', 6),
(6, 'Phones', 2),
(7, 'Watches', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int NOT NULL,
  `tensanpham` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `masp` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `giasp` float NOT NULL,
  `giaban` float NOT NULL,
  `soluong` int NOT NULL,
  `hinhanh` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tomtat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_general_ci NOT NULL,
  `thuctrang` int NOT NULL,
  `id_danhmuc` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masp`, `giasp`, `giaban`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `thuctrang`, `id_danhmuc`) VALUES
(33, 'Apple Macbook Air M2 2022 update22', 'MT01', 30000000, 23900000, 7, '1719769923_macbook_air_m2_1_1.webp', '                                                                                    Thiết kế sang trọng, lịch lãm - siêu mỏng 11.3mm, chỉ 1.24kg\r\nHiệu năng hàng đầu - Chip Apple M2, 8 nhân GPU, hỗ trợ tốt các phần mềm như Word, Axel, Adoble Premier\r\nĐa nhiệm mượt mà - Ram 8GB, SSD 256GB cho phép                                                                            ', '                                                                                    Thiết kế sang trọng, lịch lãm - siêu mỏng 11.3mm, chỉ 1.24kg\r\nHiệu năng hàng đầu - Chip Apple M2, 8 nhân GPU, hỗ trợ tốt các phần mềm như Word, Axel, Adoble Premier\r\nĐa nhiệm mượt mà - Ram 8GB, SSD 256GB cho phép vừa làm việc, vừa nghe nhạc\r\nMàn hình sắc nét - Độ phân giải 2560 x 1664 cùng độ sáng 500 nits\r\nÂm thanh sống động - 4 loa tramg bị công nghệ Dolby Atmos và âm thanh đa chiều                                                                           ', 0, 2),
(34, 'Laptop MSI Gaming Bravo 15 tyytyty', 'MT02', 16490000, 15890000, 4, '1719770496_msi_1.webp', '                                                                                                                Chip AMD Ryzen 5 - 7535HS xử lý nhanh chóng các tác vụ như văn phòng, đồ hoạ, coding hay chiến game\r\nGPU AMD Radeon RX 6550M 4 GB cho đồ hoạ cao, mượt mà và ổn định ở các pha giao tranh\r\nRAM 16 GB cho phép máy vận h                                                                                                    ', '                                                                                                                Chip AMD Ryzen 5 - 7535HS xử lý nhanh chóng các tác vụ như văn phòng, đồ hoạ, coding hay chiến game\r\nGPU AMD Radeon RX 6550M 4 GB cho đồ hoạ cao, mượt mà và ổn định ở các pha giao tranh\r\nRAM 16 GB cho phép máy vận hành mượt mà, mở cùng lúc nhiều tác vụ\r\nỔ cứng 512 GB hỗ trợ khởi động laptop, truy xuất dữ liệu nhanh hơn\r\nTần số quét 144 Hz giúp hình ảnh không bị rách hay nhoè mờ khi chơi game                                                                                                    ', 0, 2),
(35, 'Apple MacBook Air M1 ', 'MT03', 18990000, 17000000, 0, '1719770659_air_m2.webp', 'Phù hợp cho lập trình viên, thiết kế đồ họa 2D, dân văn phòng\r\nHiệu năng vượt trội - Cân mọi tác vụ từ word, exel đến chỉnh sửa ảnh trên các phần mềm như AI, PTS\r\nĐa nhiệm mượt mà - Ram 8GB cho ph', 'Phù hợp cho lập trình viên, thiết kế đồ họa 2D, dân văn phòng\r\nHiệu năng vượt trội - Cân mọi tác vụ từ word, exel đến chỉnh sửa ảnh trên các phần mềm như AI, PTS\r\nĐa nhiệm mượt mà - Ram 8GB cho phép vừa mở trình duyệt để tra cứu thông tin, vừa làm việc trên phần mềm\r\nTrang bị SSD 256GB - Cho thời gian khởi động nhanh chóng, tối ưu hoá thời gian load ứng dụng\r\nChất lượng hình ảnh sắc nét - Màn hình Retina cao cấp cùng công nghệ TrueTone cân bằng màu sắc\r\nThiết kế sang trọng - Nặng chỉ 1.29KG, độ dày 16.1mm. Tiện lợi mang theo mọi nơi', 1, 2),
(36, 'Laptop ASUS VivoBook 15 ', 'MT04', 25000000, 24750000, 2, '1719770883_text_ng_n_1__1_120.webp', 'Màn hình 15.6 inch tấm nền OLED cho khả năng tái tạo hoàn hảo\r\nCPU Intel Core i5-13500H mạnh mẽ có thể xử lý mượt mà mọi tác vụ\r\nCard Intel Iris XE cho trải nghiệm giải trí cao\r\nRAM 16 GB chạy đa ứng dụng m', 'Màn hình 15.6 inch tấm nền OLED cho khả năng tái tạo hoàn hảo\r\nCPU Intel Core i5-13500H mạnh mẽ có thể xử lý mượt mà mọi tác vụ\r\nCard Intel Iris XE cho trải nghiệm giải trí cao\r\nRAM 16 GB chạy đa ứng dụng mượt mà không lo giật, lag\r\nỔ cứng SSD 512 GB cho tốc độ truy xuất dữ liệu nhanh, không gian lưu trữ đủ lớn', 1, 2),
(37, 'Laptop ASUS TUF Gaming F15', 'MT05', 20000000, 19570000, 6, '1719802410_text_ng_n_10__2_80.webp', 'CPU Intel Core i5 12500H dễ dàng xử lý các tác vụ nặng và chơi game AAA cấu hình cao\r\nCard NVIDIA GeForce RTX 3050 cải thiện hiệu suất xử lý đồ họa và đảm bảo trải nghiệm chơi game tuyệt vời\r\nMàn hình 15.6', 'CPU Intel Core i5 12500H dễ dàng xử lý các tác vụ nặng và chơi game AAA cấu hình cao\r\nCard NVIDIA GeForce RTX 3050 cải thiện hiệu suất xử lý đồ họa và đảm bảo trải nghiệm chơi game tuyệt vời\r\nMàn hình 15.6 inch Full HD cùng tần số quét 144 Hz hỗ trợ chơi game sống động với tốc độ cực nhanh\r\nRAM 8GB cùng ổ cứng 512 GB SSD rút ngắn thời gian mở máy, khởi động ứng dụng', 1, 2),
(38, 'Laptop Asus ROG Zephyrus M16', 'MT06', 64000000, 63750000, 1, '1719802427_text_ng_n_10__2_62.webp', 'Sở hữu thiết kế mạnh mẽ với lớp vỏ màu đen cá tính\r\nCPU Intel Core i9-13900H cân mọi tác vụ học tập, văn phòng\r\nRAM DDR5 4800Mhz tăng tốc độ xử lý mọi tác vụ từ gaming, duyệt web và giải trí\r\nỔ c', 'Sở hữu thiết kế mạnh mẽ với lớp vỏ màu đen cá tính\r\nCPU Intel Core i9-13900H cân mọi tác vụ học tập, văn phòng\r\nRAM DDR5 4800Mhz tăng tốc độ xử lý mọi tác vụ từ gaming, duyệt web và giải trí\r\nỔ cứng SSD PCIe 4.0 1TB cho phép bạn lưu trữ hàng trăm tựa game cùng nhiều phần mềm chuyên dụng', 1, 2),
(39, 'Laptop Dell Inspiron 15', 'MT07', 9800000, 9750000, 5, '1719802715_text_ng_n_2__4_28.webp', 'Thiết kế đơn giản, trẻ trung với tone màu đen bao phủ.\r\nMàn hình cảm ứng 15.6 inch Full HD cho trải nghiệm hình ảnh vô cùng sắc nét.\r\nCPU Intel core i5-1155G7 cùng 8 GB RAM DDR4 xử lý mượt các tác vụ văn phòn', 'Thiết kế đơn giản, trẻ trung với tone màu đen bao phủ.\r\nMàn hình cảm ứng 15.6 inch Full HD cho trải nghiệm hình ảnh vô cùng sắc nét.\r\nCPU Intel core i5-1155G7 cùng 8 GB RAM DDR4 xử lý mượt các tác vụ văn phòng: Word, Excel,...\r\nCard đồ họa Intel Iris Xe Graphics hỗ trợ chỉnh ảnh đơn giản.\r\nKhông gian lưu trữ vừa phải với ổ cứng 256 GB SSD.', 1, 2),
(43, 'Macbook Air M3 13 inch 2024 8GB ', 'MT08', 1000000, 9750000, 7, '1719849585_air_m3.webp', 'Sức mạnh xử lý hàng đầu trên chip Apple M3 - Cân tốt mọi tác vụ từ đồ hoạ đến lập trình\r\nMàn hình Liquid Retina 13,6 inch - Màu sắc hiển thị rực rỡ, sắc nét\r\nCamera FaceTime HD 1080p - Đàm thoại, hội ', 'Sức mạnh xử lý hàng đầu trên chip Apple M3 - Cân tốt mọi tác vụ từ đồ hoạ đến lập trình\r\nMàn hình Liquid Retina 13,6 inch - Màu sắc hiển thị rực rỡ, sắc nét\r\nCamera FaceTime HD 1080p - Đàm thoại, hội họp mọi lúc mọi nơi\r\nHỗ trợ sạc 35W - Nhanh chóng nạp đầy pin khi bạn cần', 1, 2),
(44, 'Samsung Galaxy S24', 'DT1', 1700000, 1690000, 7, '1719849746_ss-s24-ultra-xam-222.webp', 'Trải nghiệm đỉnh cao với hiệu năng mạnh mẽ từ vi xử lý tân tiến, kết hợp cùng RAM 12GB cho khả năng đa nhiệm mượt mà.\r\nLưu trữ thoải mái mọi ứng dụng, hình ảnh và video với bộ nhớ trong 256GB.\r\n', 'Trải nghiệm đỉnh cao với hiệu năng mạnh mẽ từ vi xử lý tân tiến, kết hợp cùng RAM 12GB cho khả năng đa nhiệm mượt mà.\r\nLưu trữ thoải mái mọi ứng dụng, hình ảnh và video với bộ nhớ trong 256GB.\r\nNâng tầm nhiếp ảnh di động với hệ thống camera tiên tiến, cho ra đời những bức ảnh và video chất lượng chuyên nghiệp.', 1, 6),
(45, 'iPhone 13 128GB', 'DT2', 13479000, 10000000, 10, '1719849851_iphone-13_2_.webp', 'Hiệu năng vượt trội - Chip Apple A15 Bionic mạnh mẽ, hỗ trợ mạng 5G tốc độ cao\r\nKhông gian hiển thị sống động - Màn hình 6.1\" Super Retina XDR độ sáng cao, sắc nét\r\nTrải nghiệm điện ảnh đỉnh cao - Came', 'Hiệu năng vượt trội - Chip Apple A15 Bionic mạnh mẽ, hỗ trợ mạng 5G tốc độ cao\r\nKhông gian hiển thị sống động - Màn hình 6.1\" Super Retina XDR độ sáng cao, sắc nét\r\nTrải nghiệm điện ảnh đỉnh cao - Camera kép 12MP, hỗ trợ ổn định hình ảnh quang học\r\nTối ưu điện năng - Sạc nhanh 20 W, đầy 50% pin trong khoảng 30 phút', 1, 6),
(46, 'Xiaomi Redmi Note 13', 'DT3', 30000000, 29750000, 7, '1719849999_xiaomi-redmi-note-13_1__1_1.webp', 'Bắt trọn khoảnh khắc - Cụm camera Redmi Note 13 đến 108MP mạnh mẽ cùng khả năng thu phóng 3x\r\nMàn hình đẳng cấp - Kích thước lớn 6.67\" AMOLED 120hz cuộn lướt mượt mà\r\nHiệu suất ổn định, đa nhiệm dễ', 'Bắt trọn khoảnh khắc - Cụm camera Redmi Note 13 đến 108MP mạnh mẽ cùng khả năng thu phóng 3x\r\nMàn hình đẳng cấp - Kích thước lớn 6.67\" AMOLED 120hz cuộn lướt mượt mà\r\nHiệu suất ổn định, đa nhiệm dễ dàng - Snapdragon 685 8 nhân cùng RAM 6GB\r\nTrải nghiệm Xiaomi Redmi Note 13 cả ngày không lo lắng - pin 5000mAh cùng sạc nhanh 33W', 1, 6),
(47, 'Xiaomi POCO X6 Pro 5G 8GB 256GB', 'DT4', 1000000, 960000, 5, '1719850090_t_i_xu_ng_22__6.webp', 'Màn hình sống động, tần số 120Hz - Đem đến chất lượng hình ảnh sắc nét, màu sắc sống động.\r\nHiệu năng đỉnh cao với chip Dimensity 8300 Ultra - Chiến được hầu hết các tựa game mobile phổ biến.\r\nB', 'Màn hình sống động, tần số 120Hz - Đem đến chất lượng hình ảnh sắc nét, màu sắc sống động.\r\nHiệu năng đỉnh cao với chip Dimensity 8300 Ultra - Chiến được hầu hết các tựa game mobile phổ biến.\r\nBộ 3 camera chất lượng, quay chụp sắc nét - Đem đến cho bạn những bức hình chân dung chất lượng cao.\r\nTrang bị pin 5000mAh đi cùng sạc nhanh 67 W giúp bạn thoải mái sử dụng điện thoại suốt cả ngày dài.', 1, 6),
(48, 'Samsung Galaxy Z Flip5 256GB', 'DT5', 19800000, 16000000, 0, '1719850179_samsung-z-lip5_3_.webp', 'Galaxy AI tiện ích - Khoanh vùng search đa năng, là trợ lý chỉnh ảnh, trợ lý chat thông minh, phiên dịch trực tiếp\r\nThần thái nổi bật, cân mọi phong cách- Lấy cảm hứng từ thiên nhiên với màu sắc thời th', 'Galaxy AI tiện ích - Khoanh vùng search đa năng, là trợ lý chỉnh ảnh, trợ lý chat thông minh, phiên dịch trực tiếp\r\nThần thái nổi bật, cân mọi phong cách- Lấy cảm hứng từ thiên nhiên với màu sắc thời thượng, xu hướng\r\nThiết kế thu hút ánh nhìn - Gập không kẽ hỡ, dẫn đầu công nghệ bản lề Flex\r\nTuyệt tác selfie thoả sức sáng tạo - Camera sau hỗ trợ AI xử lí cực sắc nét ngay cả trên màn hình ngoài', 1, 6),
(50, 'Điện thoại Nubia Neo 2', 'DT7', 13479000, 12789000, 3, '1719850365_nubia-neo-2_1_.webp', 'Trải nghiệm hình ảnh mượt mà, sống động - Màn hình 6.72\" Full HD+ 120Hz\r\nChơi game liên tục không lo gián đoạn - Pin 6.000 mAh, sạc nhanh 33W\r\nÂm thanh sống động, nhập vai - Hệ thống âm thanh nổi DTS:X Ultra', 'Trải nghiệm hình ảnh mượt mà, sống động - Màn hình 6.72\" Full HD+ 120Hz\r\nChơi game liên tục không lo gián đoạn - Pin 6.000 mAh, sạc nhanh 33W\r\nÂm thanh sống động, nhập vai - Hệ thống âm thanh nổi DTS:X Ultra', 1, 6),
(53, 'Cameras A54', 'CA1', 7500000, 7000000, 5, '1719850682_item-10.png', 'Khả năng chống đống băng, thời lượng sử dụng lên tới 160 phút.\r\n10-bit D-Log M cung cấp cho bạn hơn 1 tỷ màu để sử dụng.\r\nGóc quay 155 độ siêu rộng, với góc nhìn gần với những gì mắt người nhìn ', 'Khả năng chống đống băng, thời lượng sử dụng lên tới 160 phút.\r\n10-bit D-Log M cung cấp cho bạn hơn 1 tỷ màu để sử dụng.\r\nGóc quay 155 độ siêu rộng, với góc nhìn gần với những gì mắt người nhìn thấy.', 1, 3),
(54, 'Tay cầm chơi game PS5 Dualsense', 'G1', 1890000, 1780000, 8, '1719850821_tay-cam-choi-game-ps5-dualsense-1.webp', 'Người dùng hoàn toàn có thể chơi game và sạc pin một cách dễ dàng\r\nHiệu ứng âm thanh chân thực nhờ vào sự tích hợp loa ngoài\r\nMicro tích hợp trên sản phẩm hỗ trợ người dùng trò chuyện, giao lưu\r\nKế', 'Người dùng hoàn toàn có thể chơi game và sạc pin một cách dễ dàng\r\nHiệu ứng âm thanh chân thực nhờ vào sự tích hợp loa ngoài\r\nMicro tích hợp trên sản phẩm hỗ trợ người dùng trò chuyện, giao lưu\r\nKết nối tai nghe thông qua jack cắm 3.5mm dễ dàng, tiện lợi', 1, 4),
(56, 'Tay cầm chơi game không dây Rapoo V600S', 'T2', 750000, 745000, 4, '1719851003_tay-cam-choi-game-rapoo.webp', 'Thiết kế bắt mắt với lớp vỏ bên ngoài được bo tròn, những đường cong đầy quyến rũ.\r\nKết nối ổn định, tính năng cao cấp giúp người dùng thuận tiện hơn trong việc sử dụng rất nhiều.\r\nVới kh', 'Thiết kế bắt mắt với lớp vỏ bên ngoài được bo tròn, những đường cong đầy quyến rũ.\r\nKết nối ổn định, tính năng cao cấp giúp người dùng thuận tiện hơn trong việc sử dụng rất nhiều.\r\nVới khả năng kết nối không dây, bạn có thể thoải mái ngồi, nằm ở các tư thế thoải mái khác nhau mà vẫn có thể sử dụng mà không gặp phải khó khăn gì.', 1, 4),
(57, 'Tay cầm chơi game Sony PS5 Dualsense Edge', 'T3', 1479000, 1179000, 8, '1719851182_item-1.png', 'Sản phẩm được dùng để kết nối chơi game trên PS5/PC\r\nCó thể tùy chỉnh nâng cao với đầy đủ các tính năng từ tay cầm\r\nTùy chỉnh hành trình hai nút Trigger, vùng chết, cường độ rung và độ nhạy ', 'Sản phẩm được dùng để kết nối chơi game trên PS5/PC\r\nCó thể tùy chỉnh nâng cao với đầy đủ các tính năng từ tay cầm\r\nTùy chỉnh hành trình hai nút Trigger, vùng chết, cường độ rung và độ nhạy', 1, 4),
(58, 'Bàn Phím A70', 'T4', 490000, 470000, 6, '1719851288_item-2.png', 'Sản phẩm được dùng để kết nối chơi game trên PS5/PC\r\nCó thể tùy chỉnh nâng cao với đầy đủ các tính năng từ tay cầm\r\nTùy chỉnh hành trình hai nút Trigger, vùng chết, cường độ rung và độ nhạy', 'Sản phẩm được dùng để kết nối chơi game trên PS5/PC\r\nCó thể tùy chỉnh nâng cao với đầy đủ các tính năng từ tay cầm\r\nTùy chỉnh hành trình hai nút Trigger, vùng chết, cường độ rung và độ nhạy', 1, 4),
(59, 'Đồng hồ thông minh Huawei Watch Fit 3', 'W1', 1200000, 1950000, 4, '1719851482_huawei_1__1_2.webp', 'Thiết kế viền siêu mỏng, mang lại cảm giác nhẹ tay, thoải mái\r\nMàn hình 1.82 inch Amoled rất sắc nét, hình vuông tràn viền\r\nTích hợp công nghệ giúp chăm sóc sức khoẻ cực tốt\r\nCó nhiều chức năng tập l', 'Thiết kế viền siêu mỏng, mang lại cảm giác nhẹ tay, thoải mái\r\nMàn hình 1.82 inch Amoled rất sắc nét, hình vuông tràn viền\r\nTích hợp công nghệ giúp chăm sóc sức khoẻ cực tốt\r\nCó nhiều chức năng tập luyện thể thao tiện lợi, hiện đại', 1, 7),
(60, 'Vòng đeo tay thông minh Xiaomi A ', '001', 1349000, 1200000, 9, '1719851679_band_8_active.webp', 'Màn hình lớn hơn đến 1.47 inch cho phép hiển thị nhiều thông tin hơn\r\nĐeo mọi nơi không ngại mưa rơi với kháng nước chuẩn 5ATM\r\nGiữ sức khoẻ luôn ổn định với cảm biến nhịp tim PPG\r\nTập luyện tốt ', 'Màn hình lớn hơn đến 1.47 inch cho phép hiển thị nhiều thông tin hơn\r\nĐeo mọi nơi không ngại mưa rơi với kháng nước chuẩn 5ATM\r\nGiữ sức khoẻ luôn ổn định với cảm biến nhịp tim PPG\r\nTập luyện tốt hơn với 50 chế độ thể thao', 1, 2),
(61, 'Đồng hồ Samsung Galaxy Watch6', '002', 1349000, 1100000, 3, '1719851767_watch6_thumb_1.webp', 'Tính năng theo dõi giấc ngủ giúp bạn có thể phân tích và hiểu rõ hơn về thói quen ngủ của mình\r\nĐột phá công nghệ theo dõi sức khoẻ với khả năng phân tích thành phần cơ thể, đo huyết áp\r\nCảm biế', 'Tính năng theo dõi giấc ngủ giúp bạn có thể phân tích và hiểu rõ hơn về thói quen ngủ của mình\r\nĐột phá công nghệ theo dõi sức khoẻ với khả năng phân tích thành phần cơ thể, đo huyết áp\r\nCảm biến hiện đại với khả năng đo và cảnh báo nhịp tim bất thường', 1, 7),
(62, 'Đồng hồ thông minh Amazfit Cheetah', '003', 1347000, 900000, 4, '1719851862_amazfit_1.webp', 'Trang bị màn hình AMOLED Always-On kích thước 1.39 inch có độ phân giải 454 x 454 Pixels\r\nTích hợp hơn 150 chế độ thể thao như: Chạy bộ, ba môn phối hợp, HIIT,...\r\nDễ dàng theo dõi sức khỏe với các tính năn', 'Trang bị màn hình AMOLED Always-On kích thước 1.39 inch có độ phân giải 454 x 454 Pixels\r\nTích hợp hơn 150 chế độ thể thao như: Chạy bộ, ba môn phối hợp, HIIT,...\r\nDễ dàng theo dõi sức khỏe với các tính năng đo nhịp tim, theo dõ giấc ngủ', 1, 7),
(63, 'Đồng hồ thông minh Amazfit T-rex 2', '006', 1649000, 1500000, 5, '1719851967_garmin_53_.webp', 'Độ bền chuẩn quân đội - chống chịu nhiệt độ -30 - 70 độ. Kháng nước chuẩn 10 ATM\r\nPin cực trâu lên đến 24 ngày sử dụng cơ bản\r\nTích hợp GPS cho phép chinh phục mọi cung đường hiểm trở\r\nLuyện t', 'Độ bền chuẩn quân đội - chống chịu nhiệt độ -30 - 70 độ. Kháng nước chuẩn 10 ATM\r\nPin cực trâu lên đến 24 ngày sử dụng cơ bản\r\nTích hợp GPS cho phép chinh phục mọi cung đường hiểm trở\r\nLuyện tập tốt - tích hợp 150 chế độ thể thao', 1, 7),
(73, 'LOA BLUETOOTH B&O BEOSOUND A1 2ND GEN', 'lb', 8900000, 6500000, 73, '1720513205_loa.jpg', 'B&O Beosound A1 2nd Gen được giới thiệu là mẫu loa Bluetooth di động thông minh đầu tiên trên thế giới có khả năng điều khiển bằng giọng nói nhờ trợ lý ảo Amazon Alexa.', 'Ngoài ra Beosound A1 2nd Gen cũng được nâng cấp toàn diện từ chất lượng âm thanh, thời lượng pin, khả năng chống nước.\r\n– Beosound A1 2nd Gen không cần sử dụng WiFi mà cần phải kết nối với điện thoại có ứng dụng Alexa đang kết nối mạng thông qua Bluetooth.\r\n– Beosound A1 2nd Gen sử dụng chuẩn kết nối Bluetooth 5.1 cùng với codec aptX adaptive vẫn còn khá mới.\r\n– Sản phẩm cũng có thể kết nối nhanh với Windows và Android nhờ Microsoft Swift Pair và Google Fast Pair.\r\n– Beosound A1 2nd sử dụng đến 3 microphone far-field thu âm lên đến hơn 5m.\r\n– Loa cũng có khả năng tự động bật khi nghe từ khóa wake-word dù các bạn đã tắt loa trong vòng 3 giờ.', 1, 5),
(74, 'DÂY DA APPLE WATCH ATTELAGE GENUINE LEATHER WATCH BANDS', 'appD', 700000, 500000, 56, '1720513451_Orange.png', 'B&O Beosound A1 2nd Gen được giới thiệu là mẫu loa Bluetooth di động thông minh đầu tiên trên thế giới có khả năng điều khiển bằng giọng nói nhờ trợ lý ảo Amazon Alexa.', 'Ngoài ra Beosound A1 2nd Gen cũng được nâng cấp toàn diện từ chất lượng âm thanh, thời lượng pin, khả năng chống nước.\r\n– Beosound A1 2nd Gen không cần sử dụng WiFi mà cần phải kết nối với điện thoại có ứng dụng Alexa đang kết nối mạng thông qua Bluetooth.\r\n– Beosound A1 2nd Gen sử dụng chuẩn kết nối Bluetooth 5.1 cùng với codec aptX adaptive vẫn còn khá mới.\r\n– Sản phẩm cũng có thể kết nối nhanh với Windows và Android nhờ Microsoft Swift Pair và Google Fast Pair.\r\n– Beosound A1 2nd sử dụng đến 3 microphone far-field thu âm lên đến hơn 5m.\r\n– Loa cũng có khả năng tự động bật khi nghe từ khóa wake-word dù các bạn đã tắt loa trong vòng 3 giờ.', 1, 7),
(75, 'Canon EOS M50', 'CNM', 9080000, 8700000, 66, '1720514229_canon.jpg', 'Canon EOS M50 hứa hẹn sẽ tạo nên một bức phá lớn cho Canon trong thời gian tới.  Canon EOS M50 được tăng cường khả năng ghi hình 4K cũng như khả năng tương thích ngàm ống kính EF-M. ', 'Canon có thể yên tâm là EOS M50 vẫn sẽ sử dụng cảm biến APS-C CMOS mạnh mẽ như những người anh em trước đó. Ngoài ra, độ phân giải của M50 cũng đạt mức 24,1 Megapixel mang lại một chuẩn hình ảnh đẹp mà bạn luôn ao ước. Quan trọng hơn hết là khả từ nay, Canon EOS M50 cũng sẽ mang trong mình sức mạnh quay video lên đến 4K. Không chỉ hình ảnh mà những đoạn phim cũng sẽ trở nên hoàn hảo hơn hẳn.\r\n\r\nVới ISO lên đến 100-25600 thậm chí có thể mở rộng lên tận ISO 51200 cho bức ảnh của bạn tuyệt vời hơn bao giờ hết. Không những vậy, Canon EOS M50 còn có khả năng chụp Liên tục lên đến 10 khung hình/giây (ở servo AF: lên đến 7,4 khung hình/giây). Kèm theo đó là màn hình EVF với 2,36 điểm ảnh, một cải tiến xuất sắc từ trước đến nay.\r\n\r\nNgoài ra, Canon EOS M50  còn hỗ trợ định dạng RAW CR3 thế hệ tiếp theo và định dạng nén C-RAW mới. Theo Canon thì định dạng C-RAW có kích thước tệp nhỏ hơn 40% so với RAW thông thường, giúp bạn có thể lưu được nhiều hình ảnh hơn gấp nhiều lần so với những “người anh em” trước đó\r\n\r\nMột vài tính năng nổi bật của Canon EOS M50\r\nCảm biến CMOS APS-C 24.1MP và Bộ xử lý hình ảnh DIGIC 8', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `tbl_cart_detail`
--
ALTER TABLE `tbl_cart_detail`
  ADD PRIMARY KEY (`id_cart_detail`);

--
-- Indexes for table `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_dangky`);

--
-- Indexes for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_cart_detail`
--
ALTER TABLE `tbl_cart_detail`
  MODIFY `id_cart_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_dangky` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
