-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2024 at 05:40 AM
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
-- Database: `du_an_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int NOT NULL,
  `idsanpham` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaydang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `idsanpham`, `image`, `ngaydang`) VALUES
(3, 18, 'banner3.webp', '2023-12-06'),
(4, 19, 'banner2.webp', '2023-12-06'),
(5, 26, 'banner5.webp', '2023-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int NOT NULL,
  `idtaikhoan` int NOT NULL,
  `idsanpham` int NOT NULL,
  `noidung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaybinhluan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id`, `idtaikhoan`, `idsanpham`, `noidung`, `ngaybinhluan`) VALUES
(17, 24, 25, 'I am back', '2023-12-01'),
(18, 24, 26, 'ok nhi', '2023-12-01'),
(19, 1, 26, 'nhin dep nhi', '2023-12-01'),
(25, 1, 27, 'kkk', '2023-12-04'),
(26, 1, 34, 'okkkk', '2023-12-04'),
(27, 1, 19, 'đẹp', '2023-12-06'),
(28, 1, 26, 'okkk', '2023-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int NOT NULL,
  `iddonhang` int NOT NULL,
  `idsanpham` int NOT NULL,
  `soluong` int NOT NULL,
  `dongia` int NOT NULL,
  `thanhtien` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `iddonhang`, `idsanpham`, `soluong`, `dongia`, `thanhtien`) VALUES
(158, 109, 26, 1, 32792000, 32792000),
(159, 109, 34, 1, 25042500, 25042500),
(160, 110, 1, 1, 17213000, 17213000),
(161, 110, 9, 1, 11333000, 11333000);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int NOT NULL,
  `tendm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendm`) VALUES
(1, 'Iphone'),
(2, 'Samsung'),
(3, 'Xiaomi'),
(4, 'Oppo');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int NOT NULL,
  `idtaikhoan` int NOT NULL,
  `hovatennhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaydathang` datetime NOT NULL,
  `diachinhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodienthoainhan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phuongthuctt` tinyint(1) NOT NULL COMMENT '0. thanh toán khi nhận hàng 1. Chuyển khoản',
  `trangthai` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0. chưa duyệt 1.Đã duyệt 2.Đơn hàng mới  3. Đang giao 4. Đã giao 5. Đã hủy',
  `thanhtoan` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0. chưa thanh toán 1. Đã thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `idtaikhoan`, `hovatennhan`, `ngaydathang`, `diachinhan`, `sodienthoainhan`, `phuongthuctt`, `trangthai`, `thanhtoan`) VALUES
(109, 1, 'Nguyễn Đình Cường', '2023-12-07 18:14:08', 'Phú Nghĩa, Chương Mỹ, Hà Nội', '0964426518', 0, 5, 0),
(110, 1, 'Nguyễn Đình Cường', '2023-12-07 18:12:50', 'Phú Nghĩa, Chương Mỹ, Hà Nội', '0964426518', 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id` int NOT NULL,
  `idtaikhoan` int NOT NULL,
  `idsanpham` int NOT NULL,
  `soluong` int NOT NULL,
  `thanhtien` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int NOT NULL,
  `hovaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodienthoai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaygui` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`id`, `hovaten`, `email`, `sodienthoai`, `noidung`, `ngaygui`) VALUES
(1, 'Nguyễn Đình Cường', 'cuongndph38237@fpt.edu.vn', '0123456789', 'Tôi muốn được hướng dẫn', '2023-12-07 20:53:25'),
(2, 'Tống hoàng bách', 'tonghoangbach123@gmail.com', '0123456789', 'Đẹp zai lỗi tại ai', '2023-12-07 20:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int NOT NULL,
  `iddm` int NOT NULL,
  `tensp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giasp` int NOT NULL DEFAULT '0',
  `giakm` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soluong` int NOT NULL DEFAULT '0',
  `trangthai` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0. còn hàng 1. hết hàng',
  `khuyenmai` int NOT NULL DEFAULT '0',
  `mota` text COLLATE utf8mb4_unicode_ci,
  `luotxem` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `iddm`, `tensp`, `giasp`, `giakm`, `image`, `soluong`, `trangthai`, `khuyenmai`, `mota`, `luotxem`) VALUES
(1, 1, 'iPhone 14 Pro 128GB | Chính hãng VN/A', 24590000, 17213000, '1.webp', 97, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nMàn hình Dynamic Island - Sự biến mất của màn hình tai thỏ thay thế bằng thiết kế viên thuốc, OLED 6,7 inch, hỗ trợ always-on display\r\nCấu hình iPhone 14 Pro Max mạnh mẽ, hiệu năng cực khủng từ chipset A16 Bionic\r\nLàm chủ công nghệ nhiếp ảnh - Camera sau 48MP, cảm biến TOF sống động\r\nPin liền lithium-ion kết hợp cùng công nghệ sạc nhanh cải tiến', 1309),
(3, 2, 'Samsung Galaxy Z Flip5 256GB', 21990000, 15393000, '10.webp', 99, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nThần thái nổi bật, cân mọi phong cách- Lấy cảm hứng từ thiên nhiên với màu sắc thời thượng, xu hướng\r\nThiết kế thu hút ánh nhìn - Gập không kẽ hỡ, dẫn đầu công nghệ bản lề Flex\r\nTuyệt tác selfie thoả sức sáng tạo - Camera sau hỗ trợ AI xử lí cực sắc nét ngay cả trên màn hình ngoài\r\nBền bỉ bất chấp mọi tình huống - Đạt chuẩn kháng bụi và nước IP68 cùng chất liệu nhôm Armor Aluminum giúp hạn chế cong và xước', 809),
(4, 2, 'Samsung Galaxy S23 Ultra 256GB', 23990000, 16793000, '4.webp', 100, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nThoả sức chụp ảnh, quay video chuyên nghiệp - Camera đến 200MP, chế độ chụp đêm cải tiến, bộ xử lí ảnh thông minh\r\nChiến game bùng nổ - chip Snapdragon 8 Gen 2 8 nhân tăng tốc độ xử lí, màn hình 120Hz, pin 5.000mAh\r\nNâng cao hiệu suất làm việc với Siêu bút S Pen tích hợp, dễ dàng đánh dấu sự kiện từ hình ảnh hoặc video\r\nThiết kế bền bỉ, thân thiện - Màu sắc lấy cảm hứng từ thiên nhiên, chất liệu kính và lớp phim phủ PET tái chế', 957),
(9, 1, 'iPhone 13 128GB | Chính hãng VN/A', 16190000, 11333000, '3.webp', 96, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nHiệu năng vượt trội - Chip Apple A15 Bionic mạnh mẽ, hỗ trợ mạng 5G tốc độ cao\r\nKhông gian hiển thị sống động - Màn hình 6.1\" Super Retina XDR độ sáng cao, sắc nét\r\nTrải nghiệm điện ảnh đỉnh cao - Camera kép 12MP, hỗ trợ ổn định hình ảnh quang học\r\nTối ưu điện năng - Sạc nhanh 20 W, đầy 50% pin trong khoảng 30 phút', 1155),
(11, 1, 'iPhone 14 128GB | Chính hãng VN/A', 18590000, 13013000, '9.webp', 95, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nTuyệt đỉnh thiết kế, tỉ mỉ từng đường nét - Nâng cấp toàn diện với kiểu dáng mới, nhiều lựa chọn màu sắc trẻ trung\r\nNâng tầm trải ngiệm giải trí đỉnh cao - Màn hình 6,1\"\" cùng tấm nền OLED có công nghệ Super Retina XDR cao cấp\r\nChụp ảnh chuyên nghiệp hơn - Cụm 2 camera 12 MP đi kèm nhiều chế độ và chức năng chụp hiện đại\r\nHiệu năng hàng đầu thế giới - Apple A15 Bionic 6 nhân xử lí nhanh, ổn định', 1202),
(12, 1, 'iPhone 11 128GB | Chính hãng VN/A', 12190000, 8533000, '7.webp', 98, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nMàu sắc phù hợp cá tính - 6 màu sắc bắt mắt để lựa chọn\r\nHiệu năng mượt mà, ổn định - Chip A13, RAM 4GB\r\nBắt trọn khung hình - Camera kép hỗ trợ góc rộng, chế độ Night Mode\r\nYên tâm sử dụng - Kháng nước, kháng bụi IP68, kính cường lực Gorilla Glass', 1002),
(13, 4, 'OPPO Find N3 Flip 12GB 256GB', 22990000, 16093000, '11.webp', 100, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nThiết kế gập linh hoạt, đường cong 3D, đường cắt kim cương - biểu tượng của sự phong cách giúp bạn luôn toả sáng\r\nĐiện thoại gập sở hữu 3 camera sắc nét - Chụp hình đơn giản hơn với Chế độ Flexform\r\nMàn hình phụ vạn năng - dễ dàng thao tác các tác vụ ngay trên màn hình phụ và tuỳ biến theo sở thích\r\nMàn hình sống động đáng kinh ngạc - Kích thước 6.8i nches, hỗ trợ 120Hz, HDR10+', 1101),
(14, 2, 'Samsung Galaxy M34 5G 8GB 128GB', 7490000, 5243000, '12.webp', 100, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nNâng cao hiệu suất của bạn với bộ xử lý cực nhanh Exynos 1280 - 5nm.\r\nCông nghệ Voice Focus - Cuộc gọi video và âm thanh của bạn luôn được rõ ràng hơn.\r\nPin cực khỏe 6000mAh cho bạn thoải mái sử dụng cả ngày dài.\r\nThiết kế sang trọng, sở hữu những gam màu thời thượng khơi dậy những ngày mới của bạn.', 0),
(15, 4, 'OPPO Find N3 16GB 512GB', 44990000, 31493000, '13.webp', 99, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nBậc thầy thiết kế, siêu mỏng nhe - Mỏng chỉ 239g, nhẹ chỉ 5.8mm với nếp gấp tàng hình\r\nRực rõ mọi màn hình hiển thị - Kích thước lên đến 7.8mm, độ phân giải 2K+ cùng tần số quét 120Hz mượt mà\r\nBậc thầy nhiếp ảnh - 3 camera hàng đầu đến 64MP kết hợp cùng đa dạng chế độ chụp hoàn hảo\r\nNâng cao hiệu suất sử dụng - Chip MediaTek Dimensity 9200 5G mạnh mẽ cùng hàng loạt tính năng đa nhiệm thông tinh', 0),
(16, 3, 'Xiaomi Redmi Note 12 8GB 128GB', 4990000, 3493000, '14.webp', 100, 0, 30, 'ĐẶC ĐIỂM NỔI BẬT\r\nTrải nghiệm hình ảnh mượt mà và liền mạch nhờ tốc độ làm mới cao 120Hz.\r\nHiệu năng vượt trội và được tăng cường với chip xử lý Snapdragon® 685 6nm mạnh mẽ.\r\nNăng lượng cho cả ngày dài nhờ vào viên pin lên đến 5000mAh đi kèm sạc nhanh 33W\r\nBắt trọn mọi khoảnh khắc của bạn với bộ 3 camera 50MP.', 0),
(17, 3, 'Xiaomi Redmi 13C 6GB 128GB', 3290000, 2632000, '15.webp', 100, 0, 20, 'ĐẶC ĐIỂM NỔI BẬT\r\nChipset Helio G85 cho hiệu năng ổn định - Hoạt động mượt mà cho các tác vụ cơ bản hàng ngày.\r\nHệ thống camera kép mạnh mẽ - Cải thiện độ chi tiết và độ sắc nét cho từng bức ảnh.\r\nDung lượng pin khổng lồ lên đến 5000 mAh - Giúp bạn thoải mái trải nghiệm nhiều giờ sử dụng liên tục.\r\nMàn hình lớn kích thước 6.71 inch - Mang lại trải nghiệm xem ấn tượng.', 0),
(18, 4, 'OPPO Reno10 5G 8GB 256GB', 10990000, 9891000, '2.webp', 98, 0, 10, 'ĐẶC ĐIỂM NỔI BẬT\r\nChuyên gia chân dung thế hệ thứ 10 - Camera chân dung 32MP siêu nét, chụp xa từ 2X-5X không lo biến dạng khung hình\r\nThiết kế nổi bật, dẫn đầu xu hướng - Cạnh viền cong 3D, các phiên bản màu sắc phù hợp đa cá tính, thu hút mọi ánh nhìn\r\nĐa nhiệm mạnh mẽ hơn ai hết - RAM mở rộng đến 16GB, ROM 256GB mang đến trải nghiệm đa tác vụ thoải mái\r\nPin bất tận, sạc siêu tốc - pin 5000mAh và sạc nhanh 67W cùng chế độ tiết kiệm pin siêu tiện ích', 2),
(19, 1, 'iPhone 15 128GB | Chính hãng VN/A', 22990000, 19541500, '16.webp', 100, 0, 15, 'ĐẶC ĐIỂM NỔI BẬT\r\nThiết kế thời thượng và bền bỉ - Mặt lưng kính được pha màu xu hướng cùng khung viền nhôm bền bỉ\r\nDynamic Island hiển thị linh động mọi thông báo ngay lập tức giúp bạn nắm bắt mọi thông tin\r\nChụp ảnh đẹp nức lòng - Camera chính 48MP, Độ phân giải lên đến 4x và Tele 2x chụp chân dung hoàn hảo\r\nPin dùng cả ngày không lắng lo - Thời gian xem video lên đến 20 giờ và sạc nhanh qua cổng USB-C tiện lợi\r\nCải tiến hiệu năng vượt bậc - A16 Bionic mạnh mẽ giúp bạn cân mọi tác vụ dù có yêu cầu đồ hoạ cao', 2),
(20, 3, 'Xiaomi 13T Pro 5G (12GB - 512GB)', 16990000, 13592000, '17.webp', 100, 0, 20, 'ĐẶC ĐIỂM NỔI BẬT\r\nNhiếp ảnh chuyên ngiệp, nắm giữ tuyệt tác trong tầm tay - Cụm camera đến, ống kính Leica với 2 phong cách ảnh\r\nHiệu năng bất chấp mọi tác vụ - Bộ vi xử lý Dimensity 9200+ Ultra mạnh mẽ cùng RAM 12GB cho đa nhiệm mượt mà\r\nNăng lượng bất tận cả ngày - Pin 5000mAh cùng sạc nhanh 120W, sạc đầy chỉ trong 19 phút\r\nMàn hình sáng rực rỡ, cuộn lướt thật mượt mà - Màn hình 144hz cùng công nghệ AMOLED CrystalRes', 0),
(21, 3, 'Xiaomi Redmi 12C 4GB 64GB', 3590000, 3051500, '18.webp', 100, 0, 15, 'ĐẶC ĐIỂM NỔI BẬT\r\nỔn định hiệu năng - Chip MediaTek Helio G85 mạnh mẽ xử lí tốt các tác vụ thường ngày\r\nSử dụng đa nhiệm nhiều ứng dụng, thao tác cùng lúc tốt hơn - Hỗ trợ bộ nhớ mở rộng\r\nGiải trí thả ga - Màn hình 6.71\" HD+ cho khung hình rõ nét\r\nẢnh sắc nét với chế độ chụp đêm - Camera kép AI 50MP', 0),
(22, 3, 'Xiaomi POCO X5 5G 8GB 256GB', 7490000, 5992000, '19.webp', 100, 0, 20, 'ĐẶC ĐIỂM NỔI BẬT\r\nKhông gian gaming đúng chuẩn - Màn hình lớn 6.67\" AMOLED DotDisplay và 120Hz cho khung hình sắc nét và chuyển động mượt mà\r\nChiến game dài lâu, không lo thiếu pin - Viên pin dung lượng 5000mAh cho thời gian xem video liên tục đến 21 giờ\r\nHiệu năng chiến binh mạnh mẽ - Snapdragon® 695 cùng tốc độ 5G giúp bạn thoải mái chiến game và bắt kịp mọi trận đấu\r\nThiết kế chuẩn gaming - Phong cách độc đáo với 3 phiên bản màu sắc thời thượng phù hợp với bất kể cá tính nào', 0),
(23, 4, 'OPPO Reno8 T 4G 256GB', 8490000, 7216500, '20.webp', 100, 0, 15, 'ĐẶC ĐIỂM NỔI BẬT\r\nThiết kế thời thượng - Tràn viền, mỏng nhẹ đặc biệt phù hợp với các bạn trẻ, yêu khám phá xu hướng mới\r\nGiải trí ấn tượng - Màn hình 16 triệu màu, tần số quét 90Hz ấn tượng\r\nChụp ảnh chân dung chuyên nghiệp - Camera 100MP sắc nét đi kèm thuật toán AI\r\nPin dùng cả ngày - Viên pin lớn 5000 mAh, sạc siêu nhanh đến 67 W', 0),
(24, 4, 'OPPO A77s', 6290000, 5032000, '21.webp', 88, 0, 20, 'ĐẶC ĐIỂM NỔI BẬT\r\nNâng tầm trải nghiệm thị giác - Tấm nền IPS LCD với kích thước 6.56 inch, tần số quét 90Hz\r\nNăng lượng tiếp sức cho cả ngày dài - 5000 mAh, sạc siêu nhanh SuperVOOC 33 W\r\nLong lanh từ trong ra ngoài với thiết kế OPPO Glow, mặt lưng hoàn thiện từ thủy tinh hữu cơ\r\nTrải nghiệm ổn định mọi tác vụ - Chip Snapdragon 680 8, RAM 8 GB và khả năng mở rộng RAM', 2),
(25, 4, 'OPPO Reno7 4G (8GB - 128GB)', 7990000, 6392000, '22.webp', 74, 0, 20, 'ĐẶC ĐIỂM NỔI BẬT\r\nMàn hình chất lượng, thoả sức khám phá và giải trí - 6.43 inches, AMOLED, Full HD+\r\nCamera chất lượng với cảm biến thế hệ mới - Cụm 3 camera 64 MP, đa dạng chế độ chụp\r\nChiến game ổn định nhờ con chip mạnh mẽ - Snapdragon™ 680, RAM 8GB\r\nKhông lo gián đoạn với viên pin lớn 4500 mAh, sạc nhanh SUPERVOOCTM 33W', 28),
(26, 2, 'Samsung Galaxy Z Fold5 12GB 256GB', 40990000, 32792000, '23.webp', 84, 0, 20, 'ĐẶC ĐIỂM NỔI BẬT\r\nThiết kế tinh tế với nếp gấp vô hình - Cải tiến nếp gấp thẩm mĩ hơn và gập không kẽ hở\r\nBền bỉ bất chấp mọi tình huống - Đạt chuẩn kháng bụi và nước IP68 cùng chất liệu nhôm Armor Aluminum giúp hạn chế cong và xước\r\nMở ra không gian giải trí cực đại với màn hình trong 7.6\"\" cùng bản lề Flex dẫn đầu công nghệ\r\nThoải mái sáng tạo mọi lúc - Bút Spen tiện dụng giúp bạn phác hoạ và ghi chép không cần đến sổ tay\r\nHiệu năng cân mọi tác vụ - Snapdragon® 8 Gen 2 for Galaxy xử lí mượt mà, đa nhiệm mượt mà', 863),
(27, 2, 'Samsung Galaxy S23 8GB 128GB', 22990000, 18392000, '24.webp', 88, 0, 20, 'ĐẶC ĐIỂM NỔI BẬT\r\nHiệu năng vượt trội với con chip hàng đầu Qualcomm - Phục vụ tốt nhu cầu đa nhiệm ngày của người dùng.\r\nTrang bị bộ 3 ống kính với camera chính 50MP - Đem lại khả năng quay video và chụp ra những bức ảnh tốt, hài hòa, sống động hơn.\r\nNâng cấp trải nghiệm với màn hình Dynamic AMOLED 2X - Phù hợp dùng để xem phim hay chơi các tựa game có nội dung hình ảnh đồ họa cao.\r\nSở hữu lối thiết kế sang trọng, đẳng cấp cùng các bảng màu sắc thời thượng, trẻ trung.', 883),
(34, 1, 'iPhone 15 Pro Max 256GB | Chính hãng VN/A', 33390000, 25042500, '25.webp', 96, 0, 25, 'ĐẶC ĐIỂM NỔI BẬT\r\nThiết kế khung viền từ titan chuẩn hàng không vũ trụ - Cực nhẹ, bền cùng viền cạnh mỏng cầm nắm thoải mái\r\nHiệu năng Pro chiến game thả ga - Chip A17 Pro mang lại hiệu năng đồ họa vô cùng sống động và chân thực\r\nThoả sức sáng tạo và quay phim chuyên nghiệp - Cụm 3 camera sau đến 48MP và nhiều chế độ tiên tiến\r\nNút tác vụ mới giúp nhanh chóng kích hoạt tính năng yêu thích của bạn', 8);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int NOT NULL,
  `hovaten` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tendangnhap` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodienthoai` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint NOT NULL DEFAULT '0',
  `trangthai` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0. Tốt 1. Đã khóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `hovaten`, `tendangnhap`, `matkhau`, `email`, `sodienthoai`, `diachi`, `role`, `trangthai`) VALUES
(1, 'Nguyễn Thiện Giáp', 'giap2004', 'Giap2004', 'giap04@fpt.edu.vn', '0123456789', 'Thường Tín', 0, 0),
(2, 'Nguyễn Thiện Giáp', 'thiengiap2004', 'Thiengiap2004', 'giapntph38266@fpt.edu.vn', '0357864779', 'Hà Nội', 1, 0),
(3, 'Nguyễn Văn C', 'nguyenvanc', 'Nguyenvanc2004', 'vanc@fpt.edu.vn', '0987654321', 'Hà Nội', 0, 0),
(4, 'Nguyễn Văn B', 'bvb2004', 'nguyenvanB123', 'nguyenvanb@gmail.com', '0123456789', 'Hà Nội', 0, 0),
(24, '', 'tonghoangbach123', 'Bach1234', 'tonghoangbach@gmail.com', '0123456789', 'Bắc Giang', 0, 0),
(25, 'Nguyễn Văn A', 'nguyenvana', 'Tuanbacninh123', 'aaaaa@gmail.com', '0123456789', 'Trịnh Văn Bô, Bắc Từ Liêm', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `thongke`
--

CREATE TABLE `thongke` (
  `id` int NOT NULL,
  `ngaydat` date NOT NULL,
  `donhang` int NOT NULL,
  `doanhthu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluongban` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thongke`
--

INSERT INTO `thongke` (`id`, `ngaydat`, `donhang`, `doanhthu`, `soluongban`) VALUES
(3, '2023-10-24', 11, '110000000', 15),
(4, '2023-11-26', 4, '48000000', 4),
(5, '2023-11-28', 2, '30000000', 2),
(6, '2023-11-29', 5, '100000000', 8),
(7, '2023-11-30', 3, '90434000', 6),
(11, '2023-12-01', 3, '69605000', 7),
(12, '2023-12-02', 1, '65240000', 5),
(13, '2023-12-03', 3, '29240000', 5),
(18, '2023-12-04', 2, '45805000', 2),
(19, '2023-12-05', 6, '148988000', 12),
(20, '2023-12-06', 3, '61941000', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaydang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `idtaikhoan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`id`, `image`, `ngaydang`, `tieude`, `noidung`, `idtaikhoan`) VALUES
(1, '3.jpeg', '12-04', '4 nâng cấp đáng mong chờ trên dòng Galaxy S24 sắp ra mắt', 'Những tính năng được đề cập trong bài viết dưới đây sẽ là sự bổ sung tuyệt vời cho mẫu flagship Galaxy S24 dự kiến được Samsung ra mắt vào đầu năm sau.\r\nTheo các nguồn tin rò rỉ, Samsung nhiều khả năng sẽ ra mắt loạt flagship Galaxy S thế hệ tiếp theo vào đầu năm sau. Chúng được kỳ vọng sẽ mang đến hàng loạt nâng cấp, tính năng mới so với thế hệ trước để nâng tầm trải nghiệm sử dụng của người dùng. Trong bài viết dưới đây, chúng ta hãy cùng điểm qua 4 nâng cấp đáng mong chờ trên dòng Galaxy S24 sắp ra mắt.\r\nSamsung sẽ ra mắt dòng Galaxy S24 vào đầu năm sau\r\nSamsung sẽ ra mắt dòng Galaxy S24 vào đầu năm sau\r\nMục lục	\r\nCác tính năng AI hữu ích\r\nSạc nhanh hơn\r\nNhiều bộ nhớ hơn trong Galaxy S24 cơ bản\r\nThêm nhiều năm cập nhật Android \r\nCác tính năng AI hữu ích\r\nSamsung đã không tiết lộ nhiều tham vọng AI của họ vào năm 2023 như các công ty như Google, Meta và Microsoft. Tuy nhiên, theo các báo cáo thì công ty Hàn Quốc vẫn đang tích cực làm việc để cải thiện trải nghiệm sử dụng của người dùng trên các smartphone của họ thông qua trí thông minh nhân tạo.\r\nGalaxy S24 series sẽ có AI thông minh hơn\r\nGalaxy S24 series sẽ có AI thông minh hơn\r\nDựa trên những thông báo gần đây của Samsung, có vẻ như AI sẽ là trung tâm của dòng Galaxy S24, tương tự như cách tiếp cận của Google với Pixel 8 và Pixel 8 Pro. Công ty Hàn Quốc gần đây đã công bố Gauss, một mô hình AI tổng quát mới bao gồm ngôn ngữ, hình ảnh và mã, và Galaxy AI, một \"trải nghiệm\" có thể sẽ đến với S24. Thông tin chi tiết về Gauss và Galaxy AI rất khan hiếm, nhưng Gauss sẽ có thể xử lý các tác vụ như soạn email và tóm tắt tài liệu, trong khi Galaxy AI có thể dịch trực tiếp khi người dùng đang gọi điện thoại.\r\nSạc nhanh hơn\r\nDòng Galaxy S23 cung cấp tốc độ sạc tương tự như các phiên bản tiền nhiệm, đó là 25W trên phiên bản tiêu chuẩn và 45W trên hai mẫu máy còn lại. Điều này tụt hậu khá nhiều so với các đối thủ cạnh tranh. Ví dụ: Lenovo ThinkPhone cung cấp khả năng sạc 68W, có thể sạc từ 0% đến 92% trong 30 phút. Motorola Edge Plus, cũng có tính năng sạc 68W, đã bổ sung pin từ 3% lên 80% trong 30 phút trong quá trình thử nghiệm của CNET. Cả hai đều đánh bại mức sạc 45W của Galaxy S23 Plus, chỉ đạt 11% đến 72% trong cùng một khoảng thời gian.\r\nHy vọng Samsung sẽ cải thiện công nghệ sạc cho dòng Galaxy S24\r\nHy vọng Samsung sẽ cải thiện công nghệ sạc cho dòng Galaxy S24\r\nDo đó, có khá nhiều người đang mong vọng Samsung sẽ nâng cấp công suất sạc của Galaxy S24 Plus và S24 Ultra lên mức 65W, còn S24 là 45W để giúp người dùng không phải chờ đợi quá lâu khi điện thoại nạp lại năng lượng.\r\nNhiều bộ nhớ hơn trong Galaxy S24 cơ bản\r\nHiện tại, với việc người dùng thường tải rất nhiều ứng dụng hay chụp nhiều ảnh cũng như quay video 4K thì điện thoại rất nhanh đầy bộ nhớ. Bên cạnh đó, hầu hết các nhà sản xuất điện thoại đã ngừng trang bị khe cắm thẻ nhớ microSD cho phép bạn bổ sung thêm dung lượng khi cần từ lâu, nghĩa là giờ đây bạn phải dựa vào bộ nhớ tích hợp trong điện thoại và đám mây để lưu trữ dữ liệu của mình.\r\nGalaxy S24 nên có nhiều bộ nhớ trong tối thiểu hơn\r\nGalaxy S24 nên có nhiều bộ nhớ trong tối thiểu hơn\r\nNăm ngoái, Samsung đã tăng dung lượng lưu trữ ở phiên bản rẻ nhất của Galaxy S23 Plus và Ultra từ 128GB lên 256GB, nhưng S23 tiêu chuẩn vẫn chỉ có 128GB dung lượng. Sẽ thật tuyệt khi thấy Samsung nâng cấp dung lượng lưu trữ của Galaxy S24 cơ bản để phù hợp với phần còn lại của dòng sản phẩm trong năm tới. Làm như vậy cũng sẽ giúp mẫu máy kế nhiệm Galaxy S23 có thể cạnh tranh tốt hơn với các đối thủ cùng phân khúc.\r\nThêm nhiều năm cập nhật Android \r\nSamsung là một trong những công ty đi đầu trong việc tăng thời gian hỗ trợ phần mềm cho các flagship, nhưng Google gần đây hiện đã vượt qua họ. Trong khi Samsung đảm bảo người dùng một số smartphone Galaxy của họ sẽ được trải nghiệm tính năng mới của 4 bản cập nhật Android lớn thì Pixel 8 và Pixel 8 Pro của Google sẽ nhận được 7 năm cập nhật phần mềm. Do đo, hy vọng điều này sẽ thúc đẩy Samsung có thể tăng thêm thời gian hỗ trợ phần mềm cho Galaxy S24.', 1),
(2, '1.jpeg', '23-12', 'OnePlus 12 lộ video trên tay, xác nhận có pin 5400 mAh và sạc không dây 50W', 'Ngày mai (5/12), OnePlus sẽ ra mắt OnePlus 12 tại thị trường Trung Quốc. Chính vì vậy mà công ty đã liên tục “nhá hàng” các tính năng của điện thoại này.\r\nMới đây nhất, video trên tay OnePlus 12 vừa được chia sẻ trên mạng. Ngoài ra, các tính năng chính của điện thoại cũng được tiết lộ trong các teaser mới.\r\nhttps://www.youtube.com/shorts/TL3mxNaFbpk\r\nOnePlus đã xác nhận rằng OnePlus 12 có pin 5,400mAh, mang tới thời gian sử dụng lên tới 1.79 ngày. Viên pin được thiết kế để chịu được chu kỳ thông thường lên đến 4 năm, duy trì công suất ít nhất 80% sau 1,600 chu kỳ sạc và xả và thể hiện hiệu suất xả là 99.5%.\r\nTeaser pin\r\nTeaser pin\r\nOnePlus 12 cũng được xác nhận hỗ trợ sạc nhanh có dây SuperVOOC 100W, cho phép sạc đầy chỉ trong 25 phút và có sạc không dây 50W. Nó cũng được tích hợp chức năng sạc ngược không dây và đi kèm chip quản lý năng lượng SuperVOOC S để tối ưu hóa mức tiêu thụ điện năng.\r\nOnePlus 12 có sạc nhanh không dây 50W\r\nOnePlus 12 có sạc nhanh không dây 50W\r\nĐiện thoại hỗ trợ kháng nước IP65\r\nĐiện thoại hỗ trợ kháng nước IP65\r\nTeaser thứ ba ở trên xác nhận rằng OnePlus 12 sẽ có khả năng chống bụi và nước được xếp hạng IP65. Smartphone này sẽ xuất hiện với RAM LPDDR5x lên tới 24GB và dung lượng lưu trữ lên tới 1TB . Ngoài ra, nó sẽ có thiết lập camera tương tự như trên điện thoại màn hình gập OnePlus Open. Cuối cùng, nó gần như chắc chắn sẽ được cung cấp sức mạnh đến từ con chip Snapdragon 8 Gen 3.', 1),
(3, '4.jpg', '12-04', 'Mua điện thoại Xiaomi chưa tới 7 triệu mà còn được giảm thêm đến 1.2 triệu đồng, xem ngay', 'Siêu khuyến mãi! Mua ngay loạt điện thoại Xiaomi dưới 7 triệu và nhận ưu đãi giảm thêm lên đến 1.2 triệu đồng. Cơ hội hiếm có, hãy khám phá ngay để sở hữu chiếc điện thoại mơ ước của bạn với giá cực kỳ hấp dẫn. Đừng bỏ lỡ cơ hội để trải nghiệm công nghệ đỉnh cao với mức giá ưu đãi này. Xem ngay để chọn lựa sản phẩm phù hợp với nhu cầu của bạn và đảm bảo bạn không bỏ lỡ cơ hội tiết kiệm lớn này!\r\nThời gian diễn ra: Đến ngày 30/11/2023. \r\n\r\nLưu ý\r\n\r\nKhuyến mãi có thể kết thúc sớm trước thời hạn nếu hết số lượng sản phẩm.\r\nÔ sản phẩm chưa hiển thị ưu đãi chính xác, để hiện ưu đãi chính xác, khách cần bấm Xem chi tiết.\r\nGiá và khuyến mãi hiện tại áp dụng cho khu vực Hồ Chí Minh, có thể khác so với các tỉnh thành khác. Khách hàng cần chọn khu vực mình sinh sống để xem giá và khuyến mãi chính xác nhất. \r\nXiaomi Redmi 12C 128GB - Đặc biệt \r\nTrả góp 0% \r\nTrả góp 0%Xiaomi Redmi 12C 128GBsim vina BOOM 65KSIM VINA BOOM 65K\r\nXiaomi Redmi 12C 128GB\r\n2.790.000₫\r\n3.990.000₫ -30%\r\n    \r\n\r\n272\r\n\r\nXem đặc điểm nổi bật\r\n\r\nXEM CHI TIẾT\r\n\r\nRedmi 12C trang bị camera kép, trong đó camera chính có độ phân giải lên đến 50 MP và sử dụng công nghệ ghép pixel 4 trong 1, tăng cường độ chi tiết để tạo ra những bức ảnh chất lượng và ấn tượng hơn. Ngoài các chế độ chụp cơ bản, máy còn độc đáo với nhiều tính năng chụp thú vị như siêu độ phân giải, HDR, chụp ban đêm, và chế độ xóa phông.\r\n\r\nĐiện thoại Android này sử dụng con chip MediaTek Helio G85 8 nhân, với mức xung nhịp tối đa đạt 2.0 GHz. Tại thời điểm ra mắt, đây được coi là một con chip đáng chú ý, khi trong cùng phân khúc, các đối thủ vẫn sử dụng Helio G35 hoặc mẫu chip từ Unisoc. Viên pin dung lượng 5.000 mAh cung cấp năng lượng cho điện thoại, và theo thời gian sử dụng thực tế đã được kiểm tra, máy có thể đáp ứng liên tục trong 8 tiếng 23 phút.\r\n\r\nXiaomi Redmi Note 12S \r\nTrả góp 0%Xiaomi Redmi Note 12S\r\nXiaomi Redmi Note 12S\r\nHÀNG PHẢI CHUYỂN VỀ\r\n5.490.000₫\r\n6.690.000₫ -17%\r\n    \r\n\r\n70\r\n\r\nXem đặc điểm nổi bật\r\n\r\nXEM CHI TIẾT\r\n\r\nMàn hình của Xiaomi Redmi Note 12S đạt chất lượng cao với tấm nền AMOLED và tần số quét mượt mà lên đến 90 Hz trên không gian rộng 6.43 inch. Với những tính năng này, bạn có thể tận hưởng mọi nội dung, từ trò chơi hấp dẫn đến những bộ phim ảnh chất lượng cao một cách thoải mái.\r\n\r\nĐược trang bị con chip Mediatek Helio G96, một CPU phổ biến trên nhiều điện thoại Android hiện nay, đảm bảo máy đáp ứng mọi nhu cầu của người dùng, từ đọc báo, lướt web đến chơi những tựa game hot trên thị trường. Với RAM 8 GB và khả năng mở rộng RAM hiện đại, điện thoại này cung cấp khả năng xử lý đa nhiệm mượt mà, cho phép người dùng mở nhiều ứng dụng cùng một lúc mà không gặp trục trặc về hiệu suất.', 3),
(4, '5.jpg', '12-04', 'iPhone 15 Pro Max | 15 Pro giảm giá đầu tháng 12, thiết kế khung Titan cao cấp, chỉ từ 33.89 triệu', 'Bộ đôi iPhone 15 Pro Max | iPhone 15 Pro siêu hot đang giảm giá cực hời đầu tháng 12 này đó. Với hiệu năng siêu khủng cùng thiết kế khung Titan cực chất chắc chắn sẽ làm bạn mê mẩn bởi cái nhìn đầu tiên! Nay chỉ từ 33.89 triệu. Để bỏ lỡ khuyến mãi là tiếc lắm bạn nha.\r\nThời gian ưu đãi: Dự kiến đến 31/12/2023\r\n\r\nLưu ý:\r\n\r\nKhuyến mãi có thể kết thúc sớm trước thời hạn nếu hết số lượng sản phẩm hoặc thông tin khuyến mãi có thay đổi.\r\nGiá và khuyến mãi hiện tại áp dụng cho khu vực Hồ Chí Minh, có thể khác so với các tỉnh thành khác. Khách hàng cần chọn khu vực mình sinh sống để xem giá và khuyến mãi chính xác nhất.\r\nÔ sản phẩm chưa hiển thị ưu đãi chính xác, để hiện ưu đãi chính xác, khách cần bấm Xem chi tiết.\r\niPhone 15 Pro Max 256GB\r\nTrả góp 0%iPhone 15 Pro Max 256GBGiá Rẻ QuáGIÁ RẺ QUÁ\r\niPhone 15 Pro Max 256GB\r\n33.890.000₫\r\n34.990.000₫ -3%\r\n    \r\n\r\n41\r\n\r\nXem đặc điểm nổi bật\r\n\r\nXEM CHI TIẾT\r\niPhone 15 Pro Max 256GB\r\niPhone 15 Pro Max sở hữu diện mạo đẳng cấp cực kỳ sang trọng với khung viền được làm bằng chất liệu Titan cao cấp. Thiết kế hình notch dạng viên thuốc mang đến trải nghiệm sử dụng thú vị hơn, đặc biệt hơn nhờ tính năng Dynamic Island. Dynamic Island giúp bạn dễ dàng kiểm tra thông báo, xem bản đồ mà không cần thoát khỏi ứng dụng bạn đang sử dụng.\r\n\r\nĐặc biệt hơn, smartphone cao cấp đã chuyển từ cổng kết nối Lightning sang Type-C mang lại tốc độ truyền dữ liệu nhanh hơn. Cấu hình cực khủng trên thị trường nhờ trang bị vi xử lý Apple A17 Pro - một con chip mạnh mẽ được thiết kế riêng cho Apple, máy hỗ trợ hệ điều hành mới nhất là iOS 17 mang đến cải tiến đáng kể về hiệu năng và trải nghiệm.\r\n\r\nChụp ảnh sắc nét, sống động và chuyên nghiệp nhờ bộ ba camera đẳng cấp lên đến 48 MP, ngoài ra hỗ trợ thêm chế độ Smart HDR 5 để tối ưu hóa độ sáng giúp ảnh chụp luôn sáng rõ hơn bao giờ hết.\r\n\r\niPhone 15 Pro 512GB\r\nTrả góp 0%\r\niPhone 15 Pro 512GBGiá Rẻ QuáGIÁ RẺ QUÁ\r\niPhone 15 Pro 512GB\r\nHÀNG PHẢI CHUYỂN VỀ\r\n37.490.000₫\r\n37.990.000₫ -1%\r\n    \r\n\r\n4\r\n\r\nXem đặc điểm nổi bật\r\n\r\nXEM CHI TIẾT\r\niPhone 15 Pro 512GB\r\niPhone 15 Pro 512 GB mang đến một thiết kế vuông vắn tinh tế đầy sang trọng. Cũng như iPhone 15 Pro Max, máy được làm từ khung viền Titan cao cấp cung cấp độ cứng và độ bền bỉ vượt trội. Màn hình của máy trang bị tấm nền OLED cho phép hiển thị màu sắc sáng, cung cấp độ tương phản tốt hơn, ngoài ra còn hỗ trợ tiết kiệm năng lượng giúp kéo dài thời gian sử dụng thiết bị.\r\n\r\nĐiện thoại sở hữu tính năng Dynamic Island độc đáo, cho phép bạn sử dụng nhanh trên phần hình notch để tương tác thuận tiện hơn. Máy sử dụng chipset Apple A17 Pro hàng đầu, khả năng xử lý đa nhiệm mạnh mẽ, các tác vụ như chỉnh sửa hình ảnh hay chơi game giải trí đều được xử lý mượt mà.\r\n\r\nTự tin nhiếp ảnh hơn với hệ thống ống kính với độ phân giải siêu cao đến 48 MP, camera tele 12 MP với khả năng zoom quang học tối đa 3X. Đặc biệt, máy hỗ trợ tính năng chống rung luôn giữ cho hình ảnh của bạn luôn sắc nét và ổn định.', 2),
(5, '6.jpg', '12-04', 'Xiaomi cuối cùng cũng đem loại bảo mật tân tiến này lên Xiaomi 14 Ultra', 'Xiaomi 14 Ultra có thể là mẫu smartphone đầu tiên của hãng được trang bị công nghệ này (Ảnh minh họa: AndroidAuthority)\r\nXiaomi có thể đang chuẩn bị cho ra mắt mẫu flagship Xiaomi 14 Ultra mới nhất của mình. Đây có thể sẽ là mẫu smartphone cao cấp đầu tiên của hãng được trang bị cảm biến vân tay siêu âm. Tuy nhiên, công nghệ này của Xiaomi có thể không tốt bằng công nghệ mà Vivo đã trang bị cho những sản phẩm chủ lực gần đây của họ. \r\nNói về các mẫu flagship gần đây như là Xiaomi 14, Vivo X100, Vivo X100 Pro và iQOO 12 đã được nhà sản xuất trang bị cảm biến vân tay quang học dưới màn hình. Tuy nhiên, các thiết bị này có thể đem lại trải nghiệm ấn tượng nhưng phản hồi của người dùng cho thấy loại cảm biến này vẫn cần được cải tiến thêm nữa.\r\n\r\nDigital Chat Station đã tiết lộ về cảm biến vân tay siêu âm trên Xiaomi 14 Ultra\r\nDigital Chat Station đã tiết lộ về cảm biến vân tay siêu âm trên Xiaomi 14 Ultra (Ảnh: Gizmochina)\r\nTrước đó vào năm 2016, Xiaomi cũng đã giới thiệu về cảm biến vân tay siêu âm không xốp đầu tiên trên thế giới ở trên mẫu Xiaomi 5s. Mặc dù, đây là một đặc điểm thu hút bán hàng nhưng công nghệ này đối mặt với những thách thức do đang ở giai đoạn phát triển sơ khai. Kể từ đó Xiaomi đã chuyển sang sử dụng cảm biến quang học trên các thiết bị của mình.\r\n\r\nTuy nhiên, với những tiến bộ trong công nghệ, các giải pháp nhận dạng vân tay siêu âm được cải thiện theo thời gian, vượt qua tốc độ và độ tin cậy của cảm biến quang học thay thế.\r\n\r\nBạn có đánh giá gì về sự thay đổi này của Xiaomi?\r\n\r\nXiaomi 14 Ultra\r\nXiaomi 14 Ultra\r\nTin đồn\r\nXem đặc điểm nổi bật\r\n\r\nXEM CHI TIẾT\r\nTrong lúc chờ đợi sản phẩm ra mắt, bạn đọc có thể tham khảo thêm các mẫu điện thoại thuộc dòng Xiaomi 13T chính hãng với nhiều ưu đãi tại Thế Giới Di Động, bằng cách click vào các box sản phẩm bên dưới nhé!', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_banner_sp` (`idsanpham`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bl_sp` (`idsanpham`),
  ADD KEY `fk_bl_tk` (`idtaikhoan`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ct_dh` (`iddonhang`),
  ADD KEY `fk_ct_sp` (`idsanpham`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dh_tk` (`idtaikhoan`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_sp` (`idsanpham`),
  ADD KEY `fk_cart_tk` (`idtaikhoan`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sp_dm` (`iddm`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thongke`
--
ALTER TABLE `thongke`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tt_tk` (`idtaikhoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `thongke`
--
ALTER TABLE `thongke`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `fk_banner_sp` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fk_bl_sp` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `fk_bl_tk` FOREIGN KEY (`idtaikhoan`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `fk_ct_dh` FOREIGN KEY (`iddonhang`) REFERENCES `donhang` (`id`),
  ADD CONSTRAINT `fk_ct_sp` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_dh_tk` FOREIGN KEY (`idtaikhoan`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `fk_cart_sp` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `fk_cart_tk` FOREIGN KEY (`idtaikhoan`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sp_dm` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);

--
-- Constraints for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `fk_tt_tk` FOREIGN KEY (`idtaikhoan`) REFERENCES `taikhoan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
