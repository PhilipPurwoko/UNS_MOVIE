-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2021 pada 07.10
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `video_id` varchar(255) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `movies`
--

INSERT INTO `movies` (`id`, `title`, `category`, `description`, `video_id`, `img_url`, `created_at`) VALUES
(1, 'The Lord of the Rings: The Fellowship of the Ring', 'Adventure', 'A young hobbit, Frodo, who has found the One Ring that belongs to the Dark Lord Sauron, begins his journey with eight companions to Mount Doom, the only place where it can be destroyed.', 'V75dMMIW2B4', 'https://awsimages.detik.net.id/community/media/visual/2020/10/09/the-lord-of-the-rings_43.jpeg', '2021-06-07 19:11:59'),
(2, 'The Conjuring 3', 'Horror', 'A shocking tale of terror, murder and previously known crime experienced by the family of Ed and Lorraine Warren. ', 'https://youtu.be/h9Q4zZS2v1k', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.suara.com%2Fentertainment%2F2021%2F06%2F01%2F174500%2Fsebelum-nonton-the-conjuring-3-ini-beda-hantu-di-seri-1-dan-2&psig=AOvVaw3g7jkqKGvH2YituR4XUbTT&ust=1623213340142000&source=images&cd=vfe&ved=0CAIQ', '2021-06-08 11:36:48'),
(3, 'The Call', 'Thriller', 'One of the most sensational cases from their archive of investigations, begins with a fight for the soul of a boy, then leads them to something they have seen and experienced before.', 'https://youtu.be/hxkKeniT-0Q', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.suara.com%2Fentertainment%2F2021%2F06%2F01%2F174500%2Fsebelum-nonton-the-conjuring-3-ini-beda-hantu-di-seri-1-dan-2&psig=AOvVaw3g7jkqKGvH2YituR4XUbTT&ust=1623213340142000&source=images&cd=vfe&ved=0CAIQ', '2021-06-08 12:08:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_admin`, `created_at`) VALUES
(1, 'philip', '$2y$10$IJuAo0ausi8Jq14hKt4.6u4bXS3kTs7yO7PbG6I2UKnV9G969SBrO', 1, '2021-06-07 19:11:59'),
(2, 'pemweb', '$2y$10$dwCUckPl5bmp05VW.pZBRuJeyEZtLgFsVvpwhSDOyToLq1RXYnUGG', 0, '2021-06-07 19:11:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
