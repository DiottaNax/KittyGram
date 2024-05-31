-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 31, 2024 alle 20:15
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kittygram`
--

--
-- Dump dei dati per la tabella `account`
--

INSERT INTO `account` (`user_id`, `username`, `email`, `password`, `salt`, `first_name`, `last_name`, `user_bio`, `profile_pic_id`, `city_id`) VALUES
(1, 'diottanax', 'fd.diotallevi@gmail.com', 'b6df5d8385489b76c02cd195b1d525575138bcf66a9e561c804a4973cad6aef5807f0f7fd7527a6ca64e67ec6f16e44aad4e8df7508838da1e4169f88502bc66', '6ca2f9876217379c1c1c78bd94d5f31633da45ee0f0843caf433ba8d3f389755ac3077d111cc7ca915aedd4d1440c9f72ab377ad0c85242f6be4b573bb5ab4ed', 'Federico', 'Diotallevi', 'troppi gattini nella mia capa  😞 😞 😞', 7, NULL),
(2, 'astrobaleno', 'astrobaleno@gmail.com', '0b629f4463b8c77d84ac0d41f123ffe454b6ac8f7a92dd0e9488cb87454771db1dbc1e3b05cf429213a179904229391125f5478cf59d0b50b58f663ae202f2a9', '4e221de901fafe36f75dbec1366de962a53b6dc8c6100abac1c8983e9e448b5994c7adb90cba11be003f20126034994a1be1adddba51f89a66a26b75a8c80f70', 'Javid', 'Ameri', '\"do not disturb\"', 2, NULL),
(3, 'saint_g', 'saint138@gmail.com', '70c6e65e095f3bdceb39dfed51c2e138bb6e2501484b327a792be8b944f452430d991f371cbf2b4fb8c6f0d5b9abeb44a0914a932fda020d0d541cdbe07b1901', '9e4adcbf57452d8ed089627a2c0a4afff8d65cfa747cdb78adb2c131c28b4534cc0750775f58afef4464eb2433dedb3e5be40091a08f007571d3e54d61b80a59', 'Gioele', 'Santi', 'mi sono autoproclamato CEO di KittyGram >:)', 9, NULL),
(4, 'aagatac', 'agatac@gmail.com', '775d7ea22c54f807c30d5743162ffaa2058b410816e8cadad95b761d840ff76a8b4924f2700e6e22ca499b8e2a9df66c20b8229c26ab5896fd424f5c0bcd5425', '8a7e65230345a5257f5f32406b7c2f55635e4536a42919b6f0850e038d9ecac21ac6e93f54372f2856055bba5c6250a2a7c77fcfe878e43ca711585ee1bf7ab5', 'Agata', 'Campolongo', 'Quando mi vidi\r\nNon c\'ero', 12, NULL),
(5, 'silvi.marco', 'marcos@gmail.com', 'c15155ee965814445b3a1fbc2016d79d32d93f25473e0b4dd20db309bc20411915473ab8e161b722ca4aa22ade0125a1aaecb8e0a889749208568e54b3e4a91c', '6f481de821dffaaa0519f488723e957bdb9ff871497e002e608eb0847b150f801a9f1e070d4c946547b263e287af0310af5177468dbd8ce5c9a883faf31dd89e', 'Marco', 'Silvi', '📍  Fossombrone\r\n📚  Fisica, UniBo', 13, NULL),
(6, 'volume_campus_cesena', 'volume@gmail.com', 'ae94d57d34f826ea183da9c854f67d63e9178a527df83cb3ec45d43ef01b509aee7c25310d2ea73b8a2cf66d1ae504a3f9c2989a600859f6e2de335a7ddad3bf', '5230f560b21d66ea4f722e71feac195d05aad3fc000e994477ce5475bd0f3ceeea3f65fe42d6eebb3ceaa173646da57f874931229a8640b2ebef47055aa7f2c3', 'VOLUME', 'CESENA', 'Spazio ※ Ascolto ※ Alimento\r\n\r\n\r\n📞 Prenota ora quello che vuoi dal menu: \r\n      32*******5\r\n\r\n🕒 Dal Lunedì al Venerdì: 8:30-18:00\r\n📖 Studio\r\n☕ Caffetteria\r\n🍹 Aperitivi\r\n\r\nwww.aidoru.org/spaces-volume.html', 15, NULL),
(7, 'eugeniasantii', 'gegia@gmail.com', '041b61ec9da10547d90817c4cb6db8e168417bd97144819ea26dc26b812caa4a39e7e01aa92e2d9519982c3ca04bc5d300888a3bf1e6b5f8e5026995a4ad02f0', '9737aef01bf9d309e974edf6e30fc220066b5e49ecb5fe7f87329236383676e8b3b10bb19f12acc28949aea4e99281f02a5278e8993899d7c618c2b1557563ed', 'Eugenia', 'Santi', '📸 Instagram:  @eugeniasantii', 14, NULL);

--
-- Dump dei dati per la tabella `adoption`
--

INSERT INTO `adoption` (`post_id`, `adopted`, `city_id`) VALUES
(7, 0, 2),
(8, 0, 8),
(9, 0, 10);

--
-- Dump dei dati per la tabella `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `city_cap`) VALUES
(1, 'Rimini', '47921'),
(2, 'Cesena', '47023'),
(3, 'Riccione', '47832'),
(4, 'Pesaro', '61121'),
(5, 'Fano', '61032'),
(6, 'Cattolica', '47841'),
(7, 'Santarcangelo di Romagna', '47024'),
(8, 'Cesenatico', '47019'),
(9, 'Sarsina', '47027'),
(10, 'Faenza', '48018');

--
-- Dump dei dati per la tabella `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `user_id`, `message`, `date`) VALUES
(1, 1, 2, 'vi piace??', '2024-05-31 18:45:00'),
(2, 2, 1, 'ma quello che abbraccia è gengar??', '2024-05-31 18:51:00'),
(3, 7, 3, 'confermo, mi sono informato da spotted Cesena', '2024-05-31 18:54:00'),
(4, 1, 3, 'il mio è più bello', '2024-05-31 19:16:00'),
(5, 7, 1, '...non era meglio sentire con un veterinario?', '2024-05-31 19:19:00'),
(6, 8, 6, 'Aspettiamo vostre richieste!', '2024-05-31 19:52:00'),
(7, 6, 2, 'gio...', '2024-05-31 20:11:00'),
(8, 10, 2, 'ODDIO E\' VEROOOOOOOO', '2024-05-31 20:12:00'),
(9, 7, 2, 'secondo me spotted è una buona fonte', '2024-05-31 20:14:00');

--
-- Dump dei dati per la tabella `follow`
--

INSERT INTO `follow` (`follower`, `followed`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 1),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 1),
(3, 2),
(3, 6),
(3, 7),
(4, 1),
(4, 2),
(4, 5),
(5, 1),
(5, 2),
(5, 4);

--
-- Dump dei dati per la tabella `login_attempts`
--

INSERT INTO `login_attempts` (`user_id`, `date_and_time`) VALUES
(1, '2024-05-31 18:36:17'),
(1, '2024-05-31 19:18:55'),
(2, '2024-05-31 18:36:45'),
(3, '2024-05-31 18:37:11'),
(4, '2024-05-31 18:38:43'),
(5, '2024-05-31 18:39:09'),
(6, '2024-05-31 18:41:02'),
(7, '2024-05-31 18:41:39');

--
-- Dump dei dati per la tabella `media`
--

INSERT INTO `media` (`media_id`, `file_name`, `post_id`) VALUES
(1, 'default-pic.png', NULL),
(2, 'astroPic.jpg', NULL),
(3, 'gatto13.jpg', 1),
(4, 'gatto15.jpg', 2),
(5, 'gatto11.jpg', 3),
(6, 'gatto2.jpg', 4),
(7, 'diottaPic.jpg', NULL),
(8, 'gatto1.jpg', 5),
(9, 'gioPic.jpg', NULL),
(10, 'cane-scodinzolante.gif', 6),
(11, 'gatto7.jpg', 7),
(12, 'agataPic.jpg', NULL),
(13, 'marcoPic.jpg', NULL),
(14, 'eugiPic.jpg', NULL),
(15, 'volumePic.jpg', NULL),
(16, 'cucciolata.jpg', 8),
(17, 'cucciolata2.jpg', 9),
(18, 'gatto5.jpg', 10);

--
-- Dump dei dati per la tabella `notification`
--

INSERT INTO `notification` (`notification_id`, `for_user_id`, `from_user_id`, `post_id`, `date`, `message`, `seen`) VALUES
(1, 3, 2, NULL, '2024-05-31 18:42:31', 'started following you!', 0),
(2, 7, 2, NULL, '2024-05-31 18:42:37', 'started following you!', 0),
(3, 1, 2, NULL, '2024-05-31 18:42:42', 'started following you!', 1),
(4, 4, 2, NULL, '2024-05-31 18:42:47', 'started following you!', 0),
(5, 5, 2, NULL, '2024-05-31 18:43:01', 'started following you!', 0),
(6, 6, 2, NULL, '2024-05-31 18:43:10', 'started following you!', 0),
(7, 2, 1, NULL, '2024-05-31 18:46:58', 'started following you!', 0),
(8, 5, 1, NULL, '2024-05-31 18:47:03', 'started following you!', 0),
(9, 6, 1, NULL, '2024-05-31 18:47:07', 'started following you!', 0),
(10, 4, 1, NULL, '2024-05-31 18:47:23', 'started following you!', 0),
(11, 7, 1, NULL, '2024-05-31 18:47:41', 'started following you!', 0),
(12, 2, 1, 2, '2024-05-31 18:51:00', 'Commented your post: \"ma quello che abbraccia è gengar??\"', 0),
(13, 2, 1, 2, '2024-05-31 18:51:02', 'really liked your post!', 0),
(14, 2, 1, 1, '2024-05-31 18:51:07', 'really liked your post!', 0),
(15, 2, 1, 3, '2024-05-31 18:51:09', 'really liked your post!', 0),
(16, 1, 3, NULL, '2024-05-31 18:51:58', 'started following you!', 0),
(17, 2, 3, NULL, '2024-05-31 18:52:02', 'started following you!', 0),
(18, 7, 3, NULL, '2024-05-31 18:52:07', 'started following you!', 0),
(19, 6, 3, NULL, '2024-05-31 18:52:12', 'started following you!', 0),
(20, 2, 3, 1, '2024-05-31 19:14:32', 'really liked your post!', 0),
(21, 2, 3, 1, '2024-05-31 19:16:44', 'Commented your post: \"il mio è più bello\"', 0),
(22, 3, 1, NULL, '2024-05-31 19:19:08', 'started following you!', 0),
(23, 3, 1, 7, '2024-05-31 19:19:31', 'Commented your post: \"...non era meglio sentire con un veterinario?\"', 0),
(24, 1, 4, NULL, '2024-05-31 19:36:39', 'started following you!', 0),
(25, 2, 4, NULL, '2024-05-31 19:36:44', 'started following you!', 0),
(26, 5, 4, NULL, '2024-05-31 19:36:52', 'started following you!', 0),
(27, 1, 5, NULL, '2024-05-31 20:09:37', 'started following you!', 0),
(28, 2, 5, NULL, '2024-05-31 20:09:44', 'started following you!', 0),
(29, 4, 5, NULL, '2024-05-31 20:09:49', 'started following you!', 0),
(30, 1, 2, 4, '2024-05-31 20:11:27', 'really liked your post!', 0),
(31, 3, 2, 6, '2024-05-31 20:11:46', 'really liked your post!', 0),
(32, 3, 2, 6, '2024-05-31 20:11:53', 'Commented your post: \"gio...\"', 0),
(33, 1, 2, 5, '2024-05-31 20:12:01', 'really liked your post!', 0),
(34, 5, 2, 10, '2024-05-31 20:12:07', 'really liked your post!', 0),
(35, 5, 2, 10, '2024-05-31 20:12:17', 'Commented your post: \"ODDIO E\' VEROOOOOOOO\"', 0),
(36, 3, 2, 7, '2024-05-31 20:13:53', 'sent you an adoption request!', 0),
(37, 3, 2, 7, '2024-05-31 20:13:56', 'really liked your post!', 0),
(38, 3, 2, 7, '2024-05-31 20:14:11', 'Commented your post: \"secondo me spotted è una buona fonte\"', 0);

--
-- Dump dei dati per la tabella `post`
--

INSERT INTO `post` (`post_id`, `description`, `date`, `user_id`) VALUES
(1, 'pepinooo', '2024-05-31', 2),
(2, 'questo sn letteralmente io :)))', '2024-05-31', 2),
(3, 'hiiiii :3', '2024-05-31', 2),
(4, 'ma che cccarinooooooo', '2024-05-31', 1),
(5, 'troppo bellino pure questo', '2024-05-31', 1),
(6, 'è fuori tema questa??', '2024-05-31', 3),
(7, 'trovato mentre andavo in uni, era abbandonato mi sa...', '2024-05-31', 3),
(8, 'Un nostro cliente ci ha chiesto di pubblicare la foto della cucciolata! ', '2024-05-31', 6),
(9, 'altra cucciolata da un cliente, scriveteci per info!', '2024-05-31', 6),
(10, 'a sinistra sono io e a destra astro ahahahahahhahahah', '2024-05-31', 5);

--
-- Dump dei dati per la tabella `post_like`
--

INSERT INTO `post_like` (`post_id`, `user_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(10, 2);

--
-- Dump dei dati per la tabella `user_adopting`
--

INSERT INTO `user_adopting` (`post_id`, `user_id`, `cell`, `presentation`) VALUES
(7, 2, '3335380866', 'Ciao Gio, sto cercando un gattino da adottare e questo sembrerebbe molto carino.\r\nPotresti scrivermi su whatsapp please??');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
