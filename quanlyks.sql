-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 30, 2024 lúc 05:00 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlyks`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_thiet_bi`
--

CREATE TABLE `chi_tiet_thiet_bi` (
  `ma_cttb` int(11) NOT NULL,
  `ma_phong` int(11) NOT NULL,
  `ma_thiet_bi` int(11) NOT NULL,
  `so_luong_trong_phong` int(11) NOT NULL,
  `tinh_trang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_thiet_bi`
--

INSERT INTO `chi_tiet_thiet_bi` (`ma_cttb`, `ma_phong`, `ma_thiet_bi`, `so_luong_trong_phong`, `tinh_trang`) VALUES
(1, 2, 3, 1, 'đang sử dụng'),
(2, 3, 2, 1, 'đang sử dụng'),
(5, 4, 4, 1, 'đang sử dụng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_vat_tu`
--

CREATE TABLE `chi_tiet_vat_tu` (
  `ma_ctvt` int(11) NOT NULL,
  `ma_phong` int(11) NOT NULL,
  `ma_vat_tu` int(11) NOT NULL,
  `so_luong_trong_phong` int(11) NOT NULL,
  `tinh_trang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_vat_tu`
--

INSERT INTO `chi_tiet_vat_tu` (`ma_ctvt`, `ma_phong`, `ma_vat_tu`, `so_luong_trong_phong`, `tinh_trang`) VALUES
(1, 1, 1, 3, 'đang sử dụng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma_hoa_don` int(11) NOT NULL,
  `ma_o` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ma_nv` int(11) NOT NULL,
  `ngay_lap_hoa_don` varchar(20) NOT NULL,
  `thanh_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` int(11) NOT NULL,
  `ho_ten` varchar(100) NOT NULL,
  `gioi_tinh` varchar(20) NOT NULL,
  `cccd` varchar(50) NOT NULL,
  `ngay_sinh` varchar(20) NOT NULL,
  `dia_chi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `ho_ten`, `gioi_tinh`, `cccd`, `ngay_sinh`, `dia_chi`) VALUES
(1, 'Nguyễn Thanh Trúc', 'Nữ', '283982930', '03/02/2002', 'Trà Vinh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_phong`
--

CREATE TABLE `loai_phong` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(100) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia_phong` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_phong`
--

INSERT INTO `loai_phong` (`ma_loai`, `ten_loai`, `so_luong`, `gia_phong`) VALUES
(1, 'DELUXE TWIN', 10, '590.0000'),
(2, 'SUITE DOUBLE', 5, '590.000'),
(3, 'SUITE KING', 6, '690.000'),
(4, 'FAMILY TWIN WINDOW', 1, '890.000'),
(5, 'ROYAL THE ROSE', 3, '1.190.000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `ma_nv` int(11) NOT NULL,
  `ho_ten` varchar(100) NOT NULL,
  `gioi_tinh` varchar(20) NOT NULL,
  `cccd` varchar(50) NOT NULL,
  `ngay_sinh` varchar(20) NOT NULL,
  `sdtnv` varchar(255) NOT NULL,
  `dia_chi` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `quyen` int(11) NOT NULL,
  `tinh_trang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`ma_nv`, `ho_ten`, `gioi_tinh`, `cccd`, `ngay_sinh`, `sdtnv`, `dia_chi`, `user`, `pass`, `quyen`, `tinh_trang`) VALUES
(1, 'Nguyễn Thị Cẩm Xuyên', 'Nữ', '084302004430', '21/01/2002', '0768894581', 'Càng Long, Trà Vinh', 'xuyen@gmail.com', '123', 0, 'Hoạt động'),
(2, 'Nguyễn Thanh Trúc', 'Nữ', '084302004645', '03/02/2002', '0564520610', 'D5, Trà Vinh', 'truc@gmail.com', '123456', 0, 'Hoạt động');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `o`
--

CREATE TABLE `o` (
  `ma_o` int(11) NOT NULL,
  `ma_phieu_dat` int(11) NOT NULL,
  `ma_loai` int(11) NOT NULL,
  `ma_phong` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ma_nv` int(11) NOT NULL,
  `ngay_den` varchar(20) NOT NULL,
  `thoi_gian_den` varchar(20) NOT NULL,
  `ngay_di` varchar(20) NOT NULL,
  `thoi_gian_di` varchar(20) NOT NULL,
  `so_tien_da_coc` int(11) NOT NULL,
  `tong_so_tien_can_tra` int(11) NOT NULL,
  `so_tien_thuc_nhan` int(11) NOT NULL,
  `tinh_trang` varchar(50) NOT NULL,
  `gia_han_o` varchar(255) NOT NULL,
  `ghi_chu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieu_dat`
--

CREATE TABLE `phieu_dat` (
  `ma_phieu_dat` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ma_loai` int(11) NOT NULL,
  `ma_nv` int(11) NOT NULL,
  `ngay_dat` varchar(20) NOT NULL,
  `ngay_nhan` varchar(20) NOT NULL,
  `ngay_tra` varchar(20) NOT NULL,
  `so_luong_nguoi_lon` int(11) NOT NULL,
  `so_luong_tre_em` int(11) NOT NULL,
  `so_luong_phong_dat` int(11) NOT NULL,
  `tien_coc` varchar(20) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `trang_thai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieu_dat`
--

INSERT INTO `phieu_dat` (`ma_phieu_dat`, `ma_kh`, `ma_loai`, `ma_nv`, `ngay_dat`, `ngay_nhan`, `ngay_tra`, `so_luong_nguoi_lon`, `so_luong_tre_em`, `so_luong_phong_dat`, `tien_coc`, `tong_tien`, `trang_thai`) VALUES
(2, 1, 1, 1, '30/05/2024', '06/06/2024', '10/06/2024', 2, 0, 1, '500000', 1000000, 'Chưa xác nhận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `ma_phong` int(11) NOT NULL,
  `ma_loai` int(11) NOT NULL,
  `ten_phong` varchar(100) NOT NULL,
  `dien_tich` varchar(100) NOT NULL,
  `chi_tiet_phong` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`ma_phong`, `ma_loai`, `ten_phong`, `dien_tich`, `chi_tiet_phong`) VALUES
(1, 4, '101', '20m', 'đơn'),
(2, 2, '103', '20m', 'hihi'),
(3, 3, '104', '30,', 'đôi'),
(4, 4, '105', '40m2', 'đôi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thiet_bi`
--

CREATE TABLE `thiet_bi` (
  `ma_thiet_bi` int(11) NOT NULL,
  `ten_thiet_bi` varchar(100) NOT NULL,
  `so_luong_tong` int(11) NOT NULL,
  `so_luong_ton` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thiet_bi`
--

INSERT INTO `thiet_bi` (`ma_thiet_bi`, `ten_thiet_bi`, `so_luong_tong`, `so_luong_ton`) VALUES
(1, 'Tivi 55inch', 10, 5),
(2, 'Tivi 65inch', 10, 6),
(3, 'Máy lạnh', 10, 7),
(4, 'Máy sấy tóc', 12, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin_tuc`
--

CREATE TABLE `tin_tuc` (
  `ma_tin_tuc` int(11) NOT NULL,
  `ma_nv` int(11) NOT NULL,
  `ten_tin_tuc` varchar(100) NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `ngay_dang` varchar(20) NOT NULL,
  `trang_thai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vat_tu`
--

CREATE TABLE `vat_tu` (
  `ma_vat_tu` int(11) NOT NULL,
  `ten_vat_tu` varchar(100) NOT NULL,
  `so_luong_tong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vat_tu`
--

INSERT INTO `vat_tu` (`ma_vat_tu`, `ten_vat_tu`, `so_luong_tong`) VALUES
(1, 'Khăn tắm', 11),
(2, 'Bàn chải đánh răng', 10);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi_tiet_thiet_bi`
--
ALTER TABLE `chi_tiet_thiet_bi`
  ADD PRIMARY KEY (`ma_cttb`),
  ADD KEY `ma_phong` (`ma_phong`),
  ADD KEY `ma_thiet_bi` (`ma_thiet_bi`);

--
-- Chỉ mục cho bảng `chi_tiet_vat_tu`
--
ALTER TABLE `chi_tiet_vat_tu`
  ADD PRIMARY KEY (`ma_ctvt`),
  ADD KEY `ma_vat_tu` (`ma_vat_tu`),
  ADD KEY `ma_phong` (`ma_phong`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD KEY `ma_kh` (`ma_kh`),
  ADD KEY `ma_nv` (`ma_nv`),
  ADD KEY `ma_o` (`ma_o`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Chỉ mục cho bảng `loai_phong`
--
ALTER TABLE `loai_phong`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`ma_nv`);

--
-- Chỉ mục cho bảng `o`
--
ALTER TABLE `o`
  ADD PRIMARY KEY (`ma_o`),
  ADD KEY `ma_kh` (`ma_kh`),
  ADD KEY `ma_phong` (`ma_phong`),
  ADD KEY `ma_nv` (`ma_nv`),
  ADD KEY `ma_loai` (`ma_loai`),
  ADD KEY `ma_phieu_dat` (`ma_phieu_dat`);

--
-- Chỉ mục cho bảng `phieu_dat`
--
ALTER TABLE `phieu_dat`
  ADD PRIMARY KEY (`ma_phieu_dat`),
  ADD KEY `ma_loai` (`ma_loai`),
  ADD KEY `ma_nhan_vien` (`ma_nv`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`ma_phong`),
  ADD KEY `ma_loai` (`ma_loai`);

--
-- Chỉ mục cho bảng `thiet_bi`
--
ALTER TABLE `thiet_bi`
  ADD PRIMARY KEY (`ma_thiet_bi`);

--
-- Chỉ mục cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD PRIMARY KEY (`ma_tin_tuc`),
  ADD KEY `ma_nv` (`ma_nv`);

--
-- Chỉ mục cho bảng `vat_tu`
--
ALTER TABLE `vat_tu`
  ADD PRIMARY KEY (`ma_vat_tu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chi_tiet_thiet_bi`
--
ALTER TABLE `chi_tiet_thiet_bi`
  MODIFY `ma_cttb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_vat_tu`
--
ALTER TABLE `chi_tiet_vat_tu`
  MODIFY `ma_ctvt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `loai_phong`
--
ALTER TABLE `loai_phong`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `ma_nv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `o`
--
ALTER TABLE `o`
  MODIFY `ma_o` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phieu_dat`
--
ALTER TABLE `phieu_dat`
  MODIFY `ma_phieu_dat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `ma_phong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `thiet_bi`
--
ALTER TABLE `thiet_bi`
  MODIFY `ma_thiet_bi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  MODIFY `ma_tin_tuc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vat_tu`
--
ALTER TABLE `vat_tu`
  MODIFY `ma_vat_tu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_thiet_bi`
--
ALTER TABLE `chi_tiet_thiet_bi`
  ADD CONSTRAINT `chi_tiet_thiet_bi_ibfk_1` FOREIGN KEY (`ma_phong`) REFERENCES `phong` (`ma_phong`),
  ADD CONSTRAINT `chi_tiet_thiet_bi_ibfk_2` FOREIGN KEY (`ma_thiet_bi`) REFERENCES `thiet_bi` (`ma_thiet_bi`);

--
-- Các ràng buộc cho bảng `chi_tiet_vat_tu`
--
ALTER TABLE `chi_tiet_vat_tu`
  ADD CONSTRAINT `chi_tiet_vat_tu_ibfk_1` FOREIGN KEY (`ma_vat_tu`) REFERENCES `vat_tu` (`ma_vat_tu`),
  ADD CONSTRAINT `chi_tiet_vat_tu_ibfk_2` FOREIGN KEY (`ma_phong`) REFERENCES `phong` (`ma_phong`);

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`),
  ADD CONSTRAINT `hoa_don_ibfk_2` FOREIGN KEY (`ma_nv`) REFERENCES `nhan_vien` (`ma_nv`),
  ADD CONSTRAINT `hoa_don_ibfk_3` FOREIGN KEY (`ma_o`) REFERENCES `o` (`ma_o`);

--
-- Các ràng buộc cho bảng `o`
--
ALTER TABLE `o`
  ADD CONSTRAINT `o_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`),
  ADD CONSTRAINT `o_ibfk_2` FOREIGN KEY (`ma_phong`) REFERENCES `phong` (`ma_phong`),
  ADD CONSTRAINT `o_ibfk_3` FOREIGN KEY (`ma_nv`) REFERENCES `nhan_vien` (`ma_nv`),
  ADD CONSTRAINT `o_ibfk_4` FOREIGN KEY (`ma_loai`) REFERENCES `loai_phong` (`ma_loai`),
  ADD CONSTRAINT `o_ibfk_5` FOREIGN KEY (`ma_phieu_dat`) REFERENCES `phieu_dat` (`ma_phieu_dat`);

--
-- Các ràng buộc cho bảng `phieu_dat`
--
ALTER TABLE `phieu_dat`
  ADD CONSTRAINT `phieu_dat_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `loai_phong` (`ma_loai`),
  ADD CONSTRAINT `phieu_dat_ibfk_2` FOREIGN KEY (`ma_nv`) REFERENCES `nhan_vien` (`ma_nv`),
  ADD CONSTRAINT `phieu_dat_ibfk_3` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`);

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `loai_phong` (`ma_loai`);

--
-- Các ràng buộc cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD CONSTRAINT `tin_tuc_ibfk_1` FOREIGN KEY (`ma_nv`) REFERENCES `nhan_vien` (`ma_nv`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
