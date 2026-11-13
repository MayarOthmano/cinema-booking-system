g-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2026 at 07:01 PM
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
-- Database: `cinema_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `showtime_id` int(11) NOT NULL,
  `booking_code` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `bookig_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'confirmed',
  `statusofticket` enum('notscanned','scanned') NOT NULL DEFAULT 'notscanned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `showtime_id`, `booking_code`, `total_price`, `bookig_date`, `status`, `statusofticket`) VALUES
(23, 5, 14, 'BOOK6abcb34ec67c7', 18.00, '2026-09-30 06:59:26', 'confirmed', 'scanned'),
(24, 5, 22, 'BOOK6abd3fdd64556', 12.00, '2026-09-30 16:59:09', 'confirmed', 'notscanned'),
(25, 5, 19, 'BOOK6abd43d4d103b', 15.00, '2026-09-30 17:16:04', 'confirmed', 'notscanned'),
(26, 6, 2, 'BOOK6abe1638b9370', 12.00, '2026-10-01 08:13:44', 'confirmed', 'notscanned'),
(27, 6, 1, 'BOOK6abe17628df74', 10.00, '2026-10-01 08:18:42', 'confirmed', 'notscanned'),
(28, 5, 3, 'BOOK6abea3761a875', 15.00, '2026-10-01 18:16:22', 'confirmed', 'notscanned'),
(29, 5, 37, 'BOOK6ac109c70af62', 15.00, '2026-10-03 13:57:27', 'confirmed', 'notscanned'),
(30, 5, 37, 'BOOK6ac109d5e866d', 15.00, '2026-10-03 13:57:41', 'confirmed', 'notscanned'),
(31, 5, 27, 'BOOK6ac2126aa3986', 5.00, '2026-10-04 08:46:34', 'confirmed', 'notscanned'),
(32, 5, 23, 'BOOK6ac22e4c7e724', 10.00, '2026-10-04 10:45:32', 'confirmed', 'notscanned'),
(33, 5, 23, 'BOOK6ac23503957db', 5.00, '2026-10-04 11:14:11', 'confirmed', 'notscanned'),
(34, 4, 34, 'BOOK6ac63e465779b', 12.00, '2026-10-07 12:42:46', 'confirmed', 'notscanned'),
(35, 5, 19, 'BOOK6acb4839d78ce', 10.00, '2026-10-11 08:26:33', 'confirmed', 'notscanned'),
(36, 5, 19, 'BOOK6acb49aa81b09', 5.00, '2026-10-11 08:32:42', 'confirmed', 'notscanned'),
(37, 10, 3, 'BOOK6acb5775d1cde', 10.00, '2026-10-11 09:31:33', 'confirmed', 'scanned'),
(38, 10, 4, 'BOOK6acb58ce6db7d', 15.00, '2026-10-11 09:37:18', 'confirmed', 'scanned'),
(39, 10, 3, 'BOOK6acb591e252b3', 20.00, '2026-10-11 09:38:38', 'confirmed', 'notscanned'),
(40, 10, 12, 'BOOK6acb5aaeec7d4', 12.00, '2026-10-11 09:45:18', 'confirmed', 'scanned'),
(41, 10, 2, 'BOOK6acb5d6419724', 12.00, '2026-10-11 09:56:52', 'confirmed', 'scanned'),
(42, 5, 3, 'BOOK6ad24715efdd9', 10.00, '2026-10-16 15:47:33', 'confirmed', 'notscanned');

-- --------------------------------------------------------

--
-- Table structure for table `booking_seats`
--

CREATE TABLE `booking_seats` (
  `bookingseats_id` int(11) NOT NULL,
  `seat_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `showtime_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_seats`
--

INSERT INTO `booking_seats` (`bookingseats_id`, `seat_id`, `booking_id`, `showtime_id`) VALUES
(15, 61, 23, 14),
(16, 62, 23, 14),
(17, 63, 23, 14),
(18, 61, 24, 22),
(19, 62, 24, 22),
(20, 41, 25, 19),
(21, 42, 25, 19),
(22, 43, 25, 19),
(23, 65, 26, 2),
(24, 66, 26, 2),
(25, 41, 27, 1),
(26, 42, 27, 1),
(27, 41, 28, 3),
(28, 42, 28, 3),
(29, 43, 28, 3),
(30, 41, 29, 37),
(31, 42, 29, 37),
(32, 43, 29, 37),
(33, 41, 30, 37),
(34, 42, 30, 37),
(35, 43, 30, 37),
(36, 41, 31, 27),
(37, 41, 32, 23),
(38, 42, 32, 23),
(39, 43, 33, 23),
(40, 61, 34, 34),
(41, 62, 34, 34),
(42, 44, 35, 19),
(43, 45, 35, 19),
(44, 52, 36, 19),
(45, 44, 37, 3),
(46, 45, 37, 3),
(47, 61, 38, 4),
(48, 62, 38, 4),
(49, 63, 38, 4),
(50, 46, 39, 3),
(51, 47, 39, 3),
(52, 51, 39, 3),
(53, 54, 39, 3),
(54, 67, 40, 12),
(55, 71, 40, 12),
(56, 69, 41, 2),
(57, 74, 41, 2),
(58, 49, 42, 3),
(59, 59, 42, 3);

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `hall_id` int(11) NOT NULL,
  `hall_name` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`hall_id`, `hall_name`, `capacity`) VALUES
(1, 'Hall1', 20),
(2, 'Hall2', 20);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `release` date NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `status` enum('now_showing','coming_soon','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `description`, `duration`, `release`, `picture`, `trailer`, `category`, `status`) VALUES
(1, 'The Gangster, the Cop, the Devil', 'A gritty action-thriller about a ruthless crime boss who survives a random attack by an elusive serial killer. To track down the maniac, the gangster forms an uneasy and dangerous alliance with a rebellious local detective, combining police investigative skills with underworld resources to hunt down the killer before time runs out.', 110, '2019-05-15', 'https://image.tmdb.org/t/p/original/oHlM4abRm6BzrRcz9Nup1uidw9H.jpg', 'https://youtu.be/xvE8oahbjcI', 'Action, Crime', 'inactive'),
(2, 'A Hard Day', 'A tense action-thriller following a corrupt homicide detective who, while rushing to his mother\'s funeral, accidentally hits a pedestrian with his car. In a desperate attempt to cover up the crime, he hides the body in his mother\'s coffin. However, his nightmare escalates when an anonymous witness claims to have seen the entire incident and begins blackmailing him.', 111, '2014-05-29', 'https://i.pinimg.com/1200x/55/e1/d0/55e1d04e0177bbac17db9e82669755dc.jpg', 'https://youtu.be/fMHH08BRAOg?si=DyELmuP-F8qT1foZ', 'Action, Thriller', 'now_showing'),
(3, 'The Roundup: No Way Out', 'A high-octane crime action film following the no-nonsense detective Ma Seok-do, who transfers to a new regional investigation unit. He and his team team up to track down a ruthless new culprit involved in a massive drug smuggling case, leading to explosive confrontations and relentless pursuit.', 105, '2023-05-31', 'https://i.pinimg.com/1200x/8e/4b/7e/8e4b7e6551737885109b152c088e2dc2.jpg', 'https://youtu.be/PmqABHW0qfc?si=mx00lWIxeffbskk6', 'Action, Crime', 'inactive'),
(4, 'Miracle in Cell No. 7', ' A deeply emotional and heartwarming drama about a wrongfully accused intellectually disabled father who is imprisoned for a crime he didn\'t commit. Inside the penitentiary, with the help of his tough cellmates, he manages to secretly bring his young daughter into the prison, creating a touching bond that transforms the lives of everyone around them.', 132, '2019-10-11', 'https://resizing.flixster.com/qGZZD6PLROeJm76InpH6rqGaRwA=/620x336/v2/https://resizing.flixster.com/-XZAfHZM39UwaGJIFWKAE8fS0ak=/v3/t/assets/p18101727_i_h10_aa.jpg', 'https://youtu.be/G2wPoBy2JQI?si=ZJdfnYwInQz71LCl', 'Drama', 'coming_soon'),
(5, 'A Company Man', 'A sleek and action-packed thriller following a professional hitman working for a seemingly ordinary front company that is actually a contract killer organization. When he falls in love with a former singer and decides to leave the violent underworld behind for a normal life, he becomes an immediate target for his ruthless former employers who want him eliminated.', 96, '2012-10-11', 'https://i.pinimg.com/1200x/c5/ae/d2/c5aed2f89339550e0cbfb33888d3f8f1.jpg', 'https://youtu.be/x7CU15xuGnU?si=CmHB5GyS9774sgDu', 'Action, Thriller', 'coming_soon'),
(6, 'Gifted Hands: The Ben Carson Story', ' An inspiring biographical drama based on the true story of Ben Carson, who overcomes poverty, poor grades, and racial prejudice in his youth to rise above the odds. Encouraged by his devoted mother, he discovers a passion for learning and medicine, ultimately becoming a world-renowned pediatric neurosurgeon who performs a groundbreaking separation of conjoined twins.', 90, '2009-02-07', 'https://i.pinimg.com/736x/c5/d0/8e/c5d08e58192ab230431b73b1bb7cfbfd.jpg', 'https://youtu.be/t0vSS_hCsMc?si=8UBFCZMJQQsLFDwH', 'Biography, Drama', 'coming_soon'),
(7, 'Train to Busan', 'A father and his daughter must fight to survive when a zombie outbreak spreads across a train traveling from Seoul to Busan.', 118, '2016-07-20', 'https://i.pinimg.com/1200x/ed/46/3e/ed463e5586b6bffab7307d604ebb7731.jpg', 'https://youtu.be/1ovgxN2VWNc?si=P1cIllbuyUD2KADq', 'Action, Horror', 'now_showing'),
(8, 'World War Z', 'A former United Nations investigator travels across the world trying to stop a rapidly spreading zombie pandemic.', 116, '2013-06-21', 'https://i.pinimg.com/736x/03/ba/ce/03bace56e530c021e8977ac603f47141.jpg', 'https://youtu.be/Md6Dvxdr0AQ?si=KUk_MxPV80UkCgUf', 'Action, Horror, Thriller', 'now_showing'),
(9, 'Alien', 'The crew of a commercial spaceship encounters a deadly alien creature while returning to Earth.', 117, '1979-06-22', 'https://i.pinimg.com/1200x/2f/21/86/2f218681cf5e1b798a6664a039844b96.jpg', 'https://youtu.be/svnAD0TApb8?si=LnKj5H0X4uEfiFOR', 'Horror, Sci-Fi, Action', 'now_showing'),
(10, 'Predator', 'A team of elite soldiers enters a jungle and discovers that they are being hunted by a mysterious and deadly creature.', 107, '1987-06-12', 'https://i.pinimg.com/736x/7b/66/0e/7b660ed75cbf8851ecc8f19dd50dbc27.jpg', 'https://youtu.be/43R9l7EkJwE?si=Cyuxkk-Pf9DnrAhV', 'Action, Horror, Sci-Fi', 'coming_soon'),
(11, 'I Am Legend', 'A scientist struggles to survive alone in New York City after a virus transforms most of humanity into dangerous creatures.', 101, '2007-12-14', 'https://i.pinimg.com/1200x/50/36/7a/50367aeeb0fe9382af93215e9ac035ca.jpg', 'https://youtu.be/GU-juw2MdI8?si=nlaKpPTQPqrP7zqL', 'Action, Horror, Sci-Fi', 'coming_soon'),
(12, 'A Quiet Place Part II', 'The Abbott family leaves their home and faces new dangers in a world where deadly creatures hunt anything that makes a sound.', 97, '2021-05-28', 'https://i.pinimg.com/1200x/77/eb/d5/77ebd5670717d98e257368217e2ee9ae.jpg', 'https://youtu.be/BpdDN9d9Jio?si=p2Y6iDmgBI2esuzg', 'Action, Horror, Thriller', 'coming_soon'),
(13, 'Resident Evil', 'A group of survivors enters an underground laboratory and must fight deadly creatures after a dangerous virus is released.', 100, '2002-03-15', 'https://i.pinimg.com/736x/63/a2/cf/63a2cf6873cabe3962dc55a48242858b.jpg', 'https://youtu.be/mNd1gb19A-c?si=520fF7EbNkv9jMWN', 'Action, Horror, Sci-Fi', 'coming_soon'),
(14, 'The Descent', 'A group of women exploring an underground cave system become trapped and discover that they are not alone in the darkness.', 99, '2005-07-08', 'https://i.pinimg.com/736x/b3/43/c4/b343c4a10dccf94c3c5145b1a4a9e97d.jpg', 'https://youtu.be/CSYg7Z1KS_I?si=QrT2Ghxm_eaS-Hhb', 'Horror, Thriller, Adventure', 'now_showing'),
(15, 'Evil Dead Rise', 'Two sisters must fight to survive after an ancient evil is unleashed inside an apartment building.', 96, '2023-04-21', 'https://i.pinimg.com/1200x/42/6d/10/426d10f8ebe014e4c90cb1e745ff38f1.jpg', 'https://youtu.be/smTK_AeAPHs?si=0eeeC0F07xoiR5vH', 'Horror, Action', 'coming_soon'),
(16, 'Godzilla Minus One', 'In postwar Japan, a devastated country faces a new threat when a giant monster emerges from the sea.', 125, '2023-11-03', 'https://i.pinimg.com/736x/85/41/e5/8541e5f358bcc17f9e501e5d51484784.jpg', 'https://youtu.be/nAYKaslCXPc?si=lYKpBzQsIZqBtFzB', 'Action, Horror, Sci-Fi', 'now_showing'),
(17, 'Echoes of the Red Desert', 'A young geologist discovers an ancient signal beneath the shifting sands of a remote desert. As she investigates, she uncovers a hidden civilization whose technology threatens to reshape the modern world. Torn between scientific curiosity and global consequences, she must decide whether to reveal the truth or bury it forever.', 128, '2024-11-15', 'https://i.pinimg.com/736x/74/0c/5d/740c5d28fd0d6c5119c686d06ab94629.jpg', 'https://www.youtube.com/watch?v=example123', 'action', 'coming_soon');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `seat_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `seat_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`seat_id`, `hall_id`, `seat_name`, `status`) VALUES
(41, 1, 'A1', 'available'),
(42, 1, 'A2', 'available'),
(43, 1, 'A3', 'available'),
(44, 1, 'A4', 'available'),
(45, 1, 'A5', 'available'),
(46, 1, 'B1', 'available'),
(47, 1, 'B2', 'available'),
(48, 1, 'B3', 'available'),
(49, 1, 'B4', 'available'),
(50, 1, 'B5', 'available'),
(51, 1, 'C1', 'available'),
(52, 1, 'C2', 'available'),
(53, 1, 'C3', 'available'),
(54, 1, 'C4', 'available'),
(55, 1, 'C5', 'available'),
(56, 1, 'D1', 'available'),
(57, 1, 'D2', 'available'),
(58, 1, 'D3', 'available'),
(59, 1, 'D4', 'available'),
(60, 1, 'D5', 'available'),
(61, 2, 'A1', 'available'),
(62, 2, 'A2', 'available'),
(63, 2, 'A3', 'available'),
(64, 2, 'A4', 'available'),
(65, 2, 'A5', 'available'),
(66, 2, 'B1', 'available'),
(67, 2, 'B2', 'available'),
(68, 2, 'B3', 'available'),
(69, 2, 'B4', 'available'),
(70, 2, 'B5', 'available'),
(71, 2, 'C1', 'available'),
(72, 2, 'C2', 'available'),
(73, 2, 'C3', 'available'),
(74, 2, 'C4', 'available'),
(75, 2, 'C5', 'available'),
(76, 2, 'D1', 'available'),
(77, 2, 'D2', 'available'),
(78, 2, 'D3', 'available'),
(79, 2, 'D4', 'available'),
(80, 2, 'D5', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `showtime`
--

CREATE TABLE `showtime` (
  `showtime_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `show_date` date NOT NULL,
  `show_time` time NOT NULL,
  `ticket_price` decimal(11,0) NOT NULL,
  `status` enum('available','unavailable') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `showtime`
--

INSERT INTO `showtime` (`showtime_id`, `movie_id`, `hall_id`, `show_date`, `show_time`, `ticket_price`, `status`) VALUES
(1, 1, 1, '2026-09-15', '18:00:00', 5, 'unavailable'),
(2, 1, 2, '2026-09-15', '21:00:00', 6, 'unavailable'),
(3, 2, 1, '2026-10-14', '21:00:00', 5, ''),
(4, 2, 2, '2026-10-14', '18:00:00', 5, ''),
(5, 3, 1, '2026-10-30', '18:00:00', 5, ''),
(6, 3, 2, '2026-09-16', '21:00:00', 6, ''),
(7, 4, 1, '2026-09-17', '18:00:00', 5, ''),
(8, 4, 2, '2026-09-17', '21:00:00', 6, ''),
(9, 5, 1, '2026-09-15', '15:00:00', 5, ''),
(10, 5, 2, '2026-09-16', '15:00:00', 5, ''),
(11, 6, 1, '2026-09-17', '15:00:00', 5, ''),
(12, 6, 2, '2026-09-17', '18:00:00', 6, ''),
(13, 1, 1, '2026-09-18', '19:00:00', 5, ''),
(14, 2, 2, '2026-09-18', '21:30:00', 6, ''),
(15, 3, 1, '2026-09-19', '18:00:00', 5, ''),
(16, 4, 2, '2026-09-19', '21:00:00', 6, ''),
(17, 5, 1, '2026-10-14', '15:00:00', 5, ''),
(18, 6, 2, '2026-09-20', '18:00:00', 6, ''),
(19, 7, 1, '2026-10-01', '18:00:00', 5, ''),
(20, 7, 2, '2026-10-01', '21:00:00', 6, ''),
(21, 8, 1, '2026-10-02', '18:00:00', 5, ''),
(22, 8, 2, '2026-10-09', '21:00:00', 6, ''),
(23, 9, 1, '2026-10-03', '18:00:00', 5, ''),
(24, 9, 2, '2026-10-10', '21:00:00', 6, ''),
(25, 10, 1, '2026-10-04', '18:00:00', 5, ''),
(26, 10, 2, '2026-10-04', '21:00:00', 6, ''),
(27, 11, 1, '2026-10-05', '18:00:00', 5, ''),
(28, 11, 2, '2026-10-05', '21:00:00', 6, ''),
(29, 12, 1, '2026-10-06', '18:00:00', 5, ''),
(30, 12, 2, '2026-10-06', '21:00:00', 6, ''),
(31, 13, 1, '2026-10-07', '18:00:00', 5, ''),
(32, 13, 2, '2026-10-07', '21:00:00', 6, ''),
(33, 14, 1, '2026-10-08', '18:00:00', 5, ''),
(34, 14, 2, '2026-10-08', '21:00:00', 6, ''),
(35, 15, 1, '2026-10-09', '18:00:00', 5, ''),
(36, 15, 2, '2026-10-09', '21:00:00', 6, ''),
(37, 16, 1, '2026-10-10', '18:00:00', 5, ''),
(38, 16, 2, '2026-10-10', '21:00:00', 6, ''),
(39, 1, 1, '2026-10-19', '10:00:00', 21, ''),
(40, 2, 2, '2026-10-21', '19:00:00', 8, ''),
(41, 1, 2, '2026-09-12', '21:09:00', 9, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `created_at`, `role`) VALUES
(4, 'reem', 'mayar5cs@gmail.com', '$2y$10$I7wqbUeqw7peEo9yU77rFO23NMgl1xrFPxwA8IACOdYbKGb/EkdEK', '2026-09-14 10:05:02', 2),
(5, 'mayar', 'mayarothman937@gmail.com', '$2y$10$bvUQ.R.KESvJT.detIKggOJJSkw6T4Yb8EfBRqEts5mkyiRP1dale', '2026-09-29 21:53:50', 2),
(6, 'laila', 'laila@gmail.com', '$2y$10$KWaKP3B.H9FzH4WnkyQJlOqez06zKMIAMLj0EHGdY6037jMmnrJ7q', '2026-10-01 08:12:45', 2),
(9, 'reem', 'reem@gmail.com', '$2y$10$lhtNmU1nSc/.Nmku45Xltu6jDtEXJRpaF12aB22DuDIXmBpDPOdBe', '2026-10-07 16:24:18', 1),
(10, 'M', 'Ma@gmail.com', '$2y$10$DIp1WlngyXNBRopqljbchugDyFvVonVdzK7ZOxxB1CdNbzivcpKl6', '2026-10-11 09:30:16', 2),
(11, 'Mayar', 'mayar5@gmail.com', '$2y$10$3DuY0RVEUvi1MmwuFLRsfeanKAFGO2ZcdxPthS7yG4M8nJelmZN4C', '2026-10-12 14:37:54', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `showtime_id` (`showtime_id`);

--
-- Indexes for table `booking_seats`
--
ALTER TABLE `booking_seats`
  ADD PRIMARY KEY (`bookingseats_id`),
  ADD UNIQUE KEY `bookingseats_id` (`bookingseats_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `seat_id` (`seat_id`),
  ADD KEY `booking_seats_ibfk_1` (`showtime_id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`hall_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`),
  ADD KEY `hall_id` (`hall_id`);

--
-- Indexes for table `showtime`
--
ALTER TABLE `showtime`
  ADD PRIMARY KEY (`showtime_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `hall_id` (`hall_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `booking_seats`
--
ALTER TABLE `booking_seats`
  MODIFY `bookingseats_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `hall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `showtime`
--
ALTER TABLE `showtime`
  MODIFY `showtime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`showtime_id`) REFERENCES `showtime` (`showtime_id`);

--
-- Constraints for table `booking_seats`
--
ALTER TABLE `booking_seats`
  ADD CONSTRAINT `booking_seats_ibfk_1` FOREIGN KEY (`showtime_id`) REFERENCES `showtime` (`showtime_id`),
  ADD CONSTRAINT `booking_seats_ibfk_2` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`seat_id`);

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`hall_id`);

--
-- Constraints for table `showtime`
--
ALTER TABLE `showtime`
  ADD CONSTRAINT `showtime_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`),
  ADD CONSTRAINT `showtime_ibfk_2` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`hall_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
