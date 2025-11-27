-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2025 at 07:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_taskmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `color` varchar(20) DEFAULT '#000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `color`) VALUES
(1, 'Development', '#3b82f6'),
(2, 'Marketing', '#ef4444'),
(3, 'UI/UX Design', '#8b5cf6'),
(4, 'Server Maintenance', '#64748b'),
(5, 'Human Resources', '#10b981');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` date DEFAULT curdate(),
  `task_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `date`, `task_id`) VALUES
(1, 'ERD sudah saya cek, tolong revisi bagian relasi tabel user dan tasks ya.', '2025-11-20', 1),
(2, 'Siap pak, revisi akan segera dikerjakan hari ini.', '2025-11-21', 1),
(3, 'Saya butuh akses ke aset gambar logo perusahaan untuk desain ini.', '2025-11-26', 2),
(4, 'Data absensi sudah lengkap, tinggal menunggu tanda tangan HRD.', '2025-11-25', 3),
(5, 'Bug ini agak aneh, hanya terjadi di browser Firefox. Sedang diinvestigasi.', '2025-11-26', 4),
(6, 'Warna biru pada mockup terlalu gelap, coba dibuat lebih cerah sedikit.', '2025-11-27', 5),
(7, 'Backup selesai tanpa error. Log sudah disimpan.', '2025-11-27', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Pending','In Progress','Completed') DEFAULT 'Pending',
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `status`, `user_id`, `category_id`) VALUES
(1, 'Desain Database', 'Buat ERD untuk proyek baru', 'In Progress', 1, 1),
(2, 'Buat Kampanye Medsos', 'Rancang konten Instagram dan Facebook untuk promo akhir tahun', 'Pending', 2, 2),
(3, 'Rekap Absensi Bulanan', 'Cek data kehadiran karyawan bulan Oktober dan hitung lembur', 'Completed', 5, 5),
(4, 'Fix Bug Login', 'Perbaiki error 500 saat user login menggunakan akun Google', 'In Progress', 4, 1),
(5, 'Redesign Homepage', 'Buat mockup baru untuk halaman depan website agar lebih modern', 'In Progress', 1, 3),
(6, 'Backup Data Server', 'Lakukan backup mingguan database utama ke cloud storage', 'Pending', 4, 4),
(7, 'Meeting Klien Baru', 'Presentasi proposal proyek ke PT Maju Mundur', 'Completed', 1, 2),
(8, 'DPBO', 'Mengerjakan TP', 'In Progress', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('Admin','Staff','Manager') DEFAULT 'Staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`) VALUES
(1, 'Adi Pradana', 'adi@test.com', 'Manager'),
(2, 'Budi Santoso', 'budi@test.com', 'Staff'),
(3, 'Citra Eka', 'citra@test.com', 'Admin'),
(4, 'Dedi Suryadi', 'dedi@test.com', 'Staff'),
(5, 'Eka Pratiwi', 'eka@test.com', 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
