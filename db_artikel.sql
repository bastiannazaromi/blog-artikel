-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 25, 2025 at 10:24 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_artikel`
--

-- --------------------------------------------------------

--
-- Table structure for table `Tb_admin`
--

CREATE TABLE `Tb_admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Tb_admin`
--

INSERT INTO `Tb_admin` (`username`, `password`) VALUES
('superadmin', '12345678'),
('admin.2', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `Tb_artikel`
--

CREATE TABLE `Tb_artikel` (
  `id` int(3) NOT NULL,
  `judul_artikel` varchar(50) NOT NULL,
  `isi_artikel` text NOT NULL,
  `id_penulis` int(3) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Tb_artikel`
--

INSERT INTO `Tb_artikel` (`id`, `judul_artikel`, `isi_artikel`, `id_penulis`, `tanggal`) VALUES
(1, 'Artikel sample', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id fugiat hic dignissimos tenetur minima? Adipisci ut, at quae distinctio unde eos quia dolore, provident facilis nihil voluptatibus. Tempore illo molestiae inventore nobis qui et voluptatem suscipit vero voluptatum labore obcaecati ex dignissimos explicabo, veniam asperiores ipsa velit accusamus deleniti, rem soluta eius dicta consectetur laborum illum! Praesentium, nihil alias accusamus iste assumenda obcaecati sapiente dolorem maiores vitae pariatur recusandae debitis inventore, minima reprehenderit iusto asperiores consequatur esse minus ea labore dignissimos? Qui provident aspernatur vero atque nam accusantium nulla neque iure est aut. At ad dolor quibusdam fugit delectus expedita soluta sapiente quae iusto illo, similique dignissimos excepturi eaque adipisci cupiditate ullam repudiandae dolorem! Necessitatibus incidunt earum autem facilis quae pariatur, illum voluptatem, tempore eum, consequuntur non placeat. Quidem accusantium, impedit culpa iste a accusamus vero cumque nihil blanditiis numquam odio repellat? Quaerat quas repellendus unde distinctio ipsam eligendi eveniet repudiandae sit, autem, nulla temporibus aut illum fugit libero nihil voluptatum nam amet placeat! Corporis numquam distinctio, eveniet impedit molestias earum facere veritatis. Voluptatem ratione minima reprehenderit deserunt ex corporis nisi consequuntur saepe, labore molestias suscipit enim eos aut accusantium sint nesciunt veniam accusamus dolorem voluptas dolor! Quas assumenda, rerum suscipit, \r\n\r\nipsum nam nihil laudantium qui voluptatem aperiam voluptas odit cum ratione architecto. Sunt dicta voluptatibus obcaecati blanditiis qui fugiat architecto odit temporibus inventore assumenda ipsum sequi in explicabo, expedita delectus. Eveniet eius dolores, nihil pariatur necessitatibus sapiente magnam expedita.', 3, '2025-08-25'),
(3, 'Sertifikasi Kompetensi', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur culpa, eaque quas, tenetur quo non fugit corporis nobis, eligendi laudantium eos laborum provident unde illo. Modi pariatur assumenda harum quibusdam?', 1, '2025-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `Tb_detail`
--

CREATE TABLE `Tb_detail` (
  `id` int(3) NOT NULL,
  `id_artikel` int(3) NOT NULL,
  `id_komentar` int(3) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Tb_detail`
--

INSERT INTO `Tb_detail` (`id`, `id_artikel`, `id_komentar`, `createdAt`) VALUES
(2, 3, 2, '2025-08-25 06:23:21'),
(3, 3, 3, '2025-08-25 07:09:38'),
(6, 1, 6, '2025-08-25 07:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `Tb_komentar`
--

CREATE TABLE `Tb_komentar` (
  `id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `isi_komentar` text NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Tb_komentar`
--

INSERT INTO `Tb_komentar` (`id`, `nama`, `isi_komentar`, `email`) VALUES
(2, 'Bastian', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe tenetur quasi blanditiis neque? Aliquam eum harum accusantium repudiandae cupiditate ab sed optio asperiores? Sequi tempore aliquid excepturi nesciunt ipsa ducimus.', 'bastian.nazaromi@gmail.com'),
(3, 'Theo', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis esse, id veniam reiciendis doloribus dicta velit, officiis deserunt dolorum magnam, neque dignissimos ratione at placeat autem earum rem sed beatae quia. Perspiciatis ut aliquam voluptate sed! Tempore quis fugit aspernatur voluptas eius laudantium asperiores iusto sit voluptatem rem. Voluptas, laborum.', 'theo@gmail.com'),
(6, 'Leao', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque hic officia, voluptas itaque inventore tempore at voluptatem rerum ad doloremque earum esse ipsam magnam architecto quos voluptatum ipsa laboriosam ipsum placeat possimus saepe iste tempora! Doloribus labore, cumque atque ut nobis autem maiores voluptates rem dolor, blanditiis dolorem cupiditate est mollitia. Praesentium quia voluptatum sapiente! Maxime, voluptate sit? Suscipit natus facere exercitationem provident consectetur maxime asperiores illo, ducimus dicta. Cum illum alias tenetur minima maiores explicabo accusamus optio repellendus. Provident odio facilis neque officia accusantium distinctio qui sit, nisi veritatis, tempora ea dolorem inventore reprehenderit tenetur maxime ab pariatur delectus?', 'leao@gmai.com');

-- --------------------------------------------------------

--
-- Table structure for table `Tb_penulis`
--

CREATE TABLE `Tb_penulis` (
  `id_penulis` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Tb_penulis`
--

INSERT INTO `Tb_penulis` (`id_penulis`, `username`, `password`, `status`) VALUES
(1, 'Zihan', '12345678', 1),
(2, 'Raffasya', '12345678', 1),
(3, 'Biantara', '12345678', 1),
(5, 'Penulis A', '11111111', 0),
(6, 'contoh', '12345678', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Tb_artikel`
--
ALTER TABLE `Tb_artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penulis` (`id_penulis`);

--
-- Indexes for table `Tb_detail`
--
ALTER TABLE `Tb_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artikel` (`id_artikel`),
  ADD KEY `id_komentar` (`id_komentar`);

--
-- Indexes for table `Tb_komentar`
--
ALTER TABLE `Tb_komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Tb_penulis`
--
ALTER TABLE `Tb_penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Tb_artikel`
--
ALTER TABLE `Tb_artikel`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Tb_detail`
--
ALTER TABLE `Tb_detail`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Tb_komentar`
--
ALTER TABLE `Tb_komentar`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Tb_penulis`
--
ALTER TABLE `Tb_penulis`
  MODIFY `id_penulis` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Tb_artikel`
--
ALTER TABLE `Tb_artikel`
  ADD CONSTRAINT `id_penulis` FOREIGN KEY (`id_penulis`) REFERENCES `Tb_penulis` (`id_penulis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Tb_detail`
--
ALTER TABLE `Tb_detail`
  ADD CONSTRAINT `id_artikel` FOREIGN KEY (`id_artikel`) REFERENCES `Tb_artikel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_komentar` FOREIGN KEY (`id_komentar`) REFERENCES `Tb_komentar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
