--
-- Database: `kittygram`
--

USE KittyGram;

--
-- Dump immagini di profilo
--

INSERT INTO `media` (`media_id`, `file_name`, `post_id`) VALUES
(2, 'astroPic.jpg', NULL),
(3, 'diottaPic.jpg', NULL),
(4, 'gioPic.jpg', NULL),
(5, 'agataPic.jpg', NULL),
(6, 'marcoPic.jpg', NULL),
(7, 'eugiPic.jpg', NULL),
(8, 'volumePic.jpg', NULL),
(9, 'Immagine WhatsApp 2024-05-31 ore 22.26.08_a6887824.jpg', NULL),
(10, 'photo_5967775178991715072_y2.jpg', NULL),
(11, 'Immagine WhatsApp 2024-05-31 ore 22.59.45_edad0bd9.jpg', NULL),
(12, 'Immagine WhatsApp 2024-05-31 ore 23.32.00_a38cd1cd.jpg', NULL),
(13, 'photo_5967775178991715130_y.jpg', NULL),
(14, 'photo_5967775178991715130_y1.jpg', NULL);


--
-- Dump dei dati per la tabella `account`
--

INSERT INTO `account` (`user_id`, `username`, `email`, `password`, `salt`, `first_name`, `last_name`, `user_bio`, `profile_pic_id`, `city_id`) VALUES
(1, 'diottanax', 'fd.diotallevi@gmail.com', 'b6df5d8385489b76c02cd195b1d525575138bcf66a9e561c804a4973cad6aef5807f0f7fd7527a6ca64e67ec6f16e44aad4e8df7508838da1e4169f88502bc66', '6ca2f9876217379c1c1c78bd94d5f31633da45ee0f0843caf433ba8d3f389755ac3077d111cc7ca915aedd4d1440c9f72ab377ad0c85242f6be4b573bb5ab4ed', 'Federico', 'Diotallevi', 'troppi gattini nella mia capa  😞 😞 😞', 3, NULL),
(2, 'astrobaleno', 'astrobaleno@gmail.com', '7369c1343b218ad8dc5727109601b564b5001291b457a887e2416002d3da4c2f603d84e69a1ada1af5a6c0193459c159e0d933004873c5b81b388aec5a5a6a42', '33cbba6da14766fb6301007cad05d5dbd428b0a19b891db6912a98cf560a51050566fca0353d14194bed92ccfa2e0477089ddf352ac32e164d07d646a1fe4c6e', 'Javid', 'Ameri', '\"do not disturb\"', 2, NULL),
(3, 'saint_g', 'saint138@gmail.com', '70c6e65e095f3bdceb39dfed51c2e138bb6e2501484b327a792be8b944f452430d991f371cbf2b4fb8c6f0d5b9abeb44a0914a932fda020d0d541cdbe07b1901', '9e4adcbf57452d8ed089627a2c0a4afff8d65cfa747cdb78adb2c131c28b4534cc0750775f58afef4464eb2433dedb3e5be40091a08f007571d3e54d61b80a59', 'Gioele', 'Santi', 'mi sono autoproclamato CEO di KittyGram >:)', 4, NULL),
(4, 'aagatac', 'agatac@gmail.com', '775d7ea22c54f807c30d5743162ffaa2058b410816e8cadad95b761d840ff76a8b4924f2700e6e22ca499b8e2a9df66c20b8229c26ab5896fd424f5c0bcd5425', '8a7e65230345a5257f5f32406b7c2f55635e4536a42919b6f0850e038d9ecac21ac6e93f54372f2856055bba5c6250a2a7c77fcfe878e43ca711585ee1bf7ab5', 'Agata', 'Campolongo', 'Quando mi vidi\r\nNon c ero', 5, NULL),
(5, 'silvi.marco', 'marcos@gmail.com', 'c15155ee965814445b3a1fbc2016d79d32d93f25473e0b4dd20db309bc20411915473ab8e161b722ca4aa22ade0125a1aaecb8e0a889749208568e54b3e4a91c', '6f481de821dffaaa0519f488723e957bdb9ff871497e002e608eb0847b150f801a9f1e070d4c946547b263e287af0310af5177468dbd8ce5c9a883faf31dd89e', 'Marco', 'Silvi', '📍  Fossombrone\r\n📚  Fisica, UniBo', 6, NULL),
(6, 'volume_campus_cesena', 'volume@gmail.com', 'ae94d57d34f826ea183da9c854f67d63e9178a527df83cb3ec45d43ef01b509aee7c25310d2ea73b8a2cf66d1ae504a3f9c2989a600859f6e2de335a7ddad3bf', '5230f560b21d66ea4f722e71feac195d05aad3fc000e994477ce5475bd0f3ceeea3f65fe42d6eebb3ceaa173646da57f874931229a8640b2ebef47055aa7f2c3', 'VOLUME', 'CESENA', 'Spazio ※ Ascolto ※ Alimento\r\n\r\n\r\n📞 Prenota ora quello che vuoi dal menu: \r\n      32*******5\r\n\r\n🕒 Dal Lunedì al Venerdì: 8:30-18:00\r\n📖 Studio\r\n☕ Caffetteria\r\n🍹 Aperitivi\r\n\r\nwww.aidoru.org/spaces-volume.html', 8, NULL),
(7, 'eugeniasantii', 'gegia@gmail.com', '041b61ec9da10547d90817c4cb6db8e168417bd97144819ea26dc26b812caa4a39e7e01aa92e2d9519982c3ca04bc5d300888a3bf1e6b5f8e5026995a4ad02f0', '9737aef01bf9d309e974edf6e30fc220066b5e49ecb5fe7f87329236383676e8b3b10bb19f12acc28949aea4e99281f02a5278e8993899d7c618c2b1557563ed', 'Eugenia', 'Santi', '📸 Instagram:  @eugeniasantii', 7, NULL),
(8, 'vidaamerii', 'vidaloca@gmail.com', '758bf723234095ff767fac94822371af3262cbd9b7c025c3c419d9278e017e66ccdad877ac593c5847784714eea9643e8beb2ea6cca6c622708e1873f3db541c', 'f6c843771323bd866834afd5867c0fc3f9e846a792096cf286e88b01db486affa85bf66dbe8a6904ed67c7cbd98fe887087ba2e70e62354f3aa50921c4055c15', 'Vida', 'Ameri', 'sì, sono la sorella di astrobaleno', 9, NULL),
(9, 'marti.diotta', 'martidiotta@gmail.com', '547587bfccd6ed21a4335fb5637a7e3b34dc06b833b38a4b3523595277c27227026c1e7d65bdea483afa1f0e86d07938c2b6daa09f9c993b5839ecc97bf7eef6', '174aa151becc8399cf59466b8482f61054275bcf4e96a2ce789a05b8c3e89398c4ac2e377a81bc7e9f3fc8f207b8bf16e6a2312f64895565fd4b9a9601b40830', 'Martina', 'Diotallevi', 'ciao mondo!👾🪼', 11, NULL),
(10, 'gaiuz_mazza', 'gaiuzmazza@gmail.com', '7bb8de75faf168e8fd9665399974224a63e4dd68d1530776cb782d3f3105890c6300179f41cf25e61877aed188e8d8c40bee753f0544982fcfce6d4ba24b64a2', '99ccfd1b803ee4c4099552b2ed1b34cf62823591012b8eee7a53e9f3cb62f908c9c7597fbdaf8f0ddccc70451a31524d26d0750ec82bf89d695021547b06ee14', 'Gaiuz', 'Mazzoni', ':3', 12, NULL),
(11, 'ash_pkmn_trainer', 'ashketchum@gmail.com', '472b619301b8a15dc1e1544a781dc7a8f9094bb710f7b0ecb8d720265ce6b35067c0cd008bca1d81685be04d675c3e3151b89a9fee542fc4678f98293d72533d', 'fbf856c4148b1d60191fb6cafbe231d09815667029a39100354cadca00f924cf2d479ec78d485c7d22b3b2e4a2572073e0b3d0b0ed14459795bfb4d37d62a356', 'Ash', 'Ketchum', 'Diventerò un Maestro di Pokémon!', 10, NULL),
(12, 'nonsononessuno', 'mrdefault@gmail.com', '158b2ee667191b4150d9d24fe412a6de92a40c8d3dffe3de715225e741c6b8af4f66bfd0b71aa04a1f1d616bd79946436822eeb1ebbab3ff2aae844d5093ec42', '6db3a178b1d309f292dbacfcc41527343e6a1f80313a168adebec22d82e8b6a26deab86d6a7428e47eb565e657cf729e87e672f1d9ecea74a16297c13151588e', 'Mr', 'Default', 'fingete che io abbia scritto una bio qui', 1, NULL),
(13, 'pseudemm', 'pseudemm@gmail.com', 'c0f6c91614751acfd5d2be6204005870b9df9526096cae29501465ddbded7579c123686101af16d124902f75d3f041dfc3133eb87adbebfa58bcba6d13c34210', 'db02848c2ba6d12552c3e48e3f1eba2e6ab51661cd22b21455c029e35bbb3797f6481eef2c5e311ba78e6595871a0af69b42373e8bc7e4176248ec4e055f1f0d', 'Emma', 'Nucci', '\"Tall, blonde and Emma Nucci\"', 14, NULL);


--
-- Dump dei dati per la tabella `post`
--

INSERT INTO `post` (`post_id`, `description`, `date`, `user_id`) VALUES
(1, 'pepinooo', '2024-05-31 15:23:53', 2),
(2, 'questo sn letteralmente io :)))', '2024-05-31 15:39:11', 2),
(3, 'hiiiii :3', '2024-05-31 15:41:24', 2),
(4, 'ma che cccarinooooooo', '2024-05-31 16:03:09', 1),
(5, 'troppo bellino pure questo', '2024-05-31 16:09:56', 1),
(6, 'è fuori tema questa??', '2024-05-31 16:37:12', 3),
(7, 'trovato mentre andavo in uni, era abbandonato mi sa...', '2024-05-31 17:03:40', 3),
(8, 'Un nostro cliente ci ha chiesto di pubblicare la foto della cucciolata! ', '2024-05-31 17:22:34', 6),
(9, 'altra cucciolata da un cliente, scriveteci per info!', '2024-05-31 17:47:13', 6),
(10, 'a sinistra sono io e a destra astro ahahahahahhahahah', '2024-05-31 18:00:00', 5),
(11, 'Ciao a tutti, Volume Cesena ha una nuova mascotte!!', '2024-05-31 19:12:46', 6),
(12, 'Proponete voi un nome per il nuovo arrivato!', '2024-05-31 21:11:08', 6),
(13, 'non mi lascia studiare biologia... 🙄', '2024-05-31 21:54:48', 7),
(14, 'è l''ora di uno snack mi sa', '2024-05-31 21:55:17', 7),
(15, 'io sempre 💀', '2024-05-31 21:56:02', 7),
(16, 'percepitemi così', '2024-05-31 22:28:04', 8),
(17, 'this is me btw', '2024-05-31 22:43:19', 10),
(18, 'Lo Skitty della mia amica Vera!', '2024-05-31 22:55:52', 11),
(19, 'Appena atterrato a Paldea! 😍👌', '2024-05-31 22:56:23', 11),
(20, 'Woooow uno Shinx!!! Prima volta che ne vedo uno dal vivo, incredibile! 🥰🥰', '2024-05-31 22:57:13', 11),
(21, 'Ehm questo briccone io non lo voglio...', '2024-05-31 22:57:44', 11),
(22, 'Eiciao, lui è Trinity, il mio speciale gatto western che vorrebbe rifarsi una nuova vita altrove', '2024-05-31 23:09:35', 2),
(23, 'this is me if u even care btw', '2024-06-01 01:20:48', 13),
(24, 'Pay attention, pay attention, finna show you how to get it', '2024-06-01 01:22:45', 13),
(25, 'he smol', '2024-06-01 01:23:02', 13),
(26, 'raga sono seria, qualcuno è interessato ad adottare questi cucciolini?', '2024-06-01 01:23:44', 13);

--
-- Dump dei dati per la tabella `adoption`
--

INSERT INTO `adoption` (`post_id`, `adopted`, `city_id`) VALUES
(7, 0, 2),
(8, 1, 8),
(9, 0, 10),
(21, 0, 4),
(22, 0, 5),
(26, 0, 5);

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
(8, 10, 2, 'ODDIO E VEROOOOOOOO', '2024-05-31 20:12:00'),
(9, 7, 2, 'secondo me spotted è una buona fonte', '2024-05-31 20:14:00'),
(10, 2, 2, 'sii ahahahh', '2024-05-31 21:51:17'),
(11, 13, 2, 'mmm idk mi sembra un po'' una scusa...', '2024-05-31 22:02:23'),
(12, 15, 2, 'us core', '2024-05-31 22:02:35'),
(13, 15, 3, 'confermo', '2024-05-31 22:04:19'),
(14, 14, 3, 'che bollito', '2024-05-31 22:04:28'),
(15, 3, 3, 'astro, so che non te lo dico spesso, ma ti voglio bene in realtà', '2024-05-31 22:05:14'),
(16, 3, 7, 'carinooooo 🥺🥺🥺', '2024-05-31 22:06:15'),
(17, 2, 7, 'ma cosa fa 💀', '2024-05-31 22:06:37'),
(18, 1, 7, 'è un amore', '2024-05-31 22:06:48'),
(19, 13, 1, 'astro ma te perché devi giudicare??', '2024-05-31 22:07:37'),
(20, 1, 1, 'ma sei letteralmente te', '2024-05-31 22:07:52'),
(21, 3, 1, 'he so polite.', '2024-05-31 22:08:14'),
(22, 3, 5, 'zamn he nice tho!!', '2024-05-31 22:09:08'),
(23, 2, 5, 'mm non so fra, per me te sei più tipo da pikachu..', '2024-05-31 22:09:35'),
(24, 1, 5, 'che sguardo esoterico', '2024-05-31 22:09:53'),
(25, 10, 5, 'siamo artisti dopotutto... 🙏😔', '2024-05-31 22:11:14'),
(26, 1, 6, 'grande astro!!!', '2024-05-31 22:13:27'),
(27, 2, 6, 'fighissimo gengar!', '2024-05-31 22:13:50'),
(28, 4, 8, 'diotta ma cosa combini', '2024-05-31 22:15:25'),
(29, 5, 8, 'trovati un lavoro..', '2024-05-31 22:15:35'),
(30, 2, 8, 'jaji sei il miglior fratello del mondo!', '2024-05-31 22:28:21'),
(31, 1, 8, 'piccolo batuffolo di cotone', '2024-05-31 22:28:36'),
(32, 3, 8, 'ma cosa fa con quel papillion', '2024-05-31 22:28:54'),
(33, 1, 9, 'ahahah carinooo', '2024-05-31 22:32:25'),
(34, 2, 9, 'umbreon vs gengar!!!', '2024-05-31 22:33:06'),
(35, 4, 9, 'portalo a casaaaa', '2024-05-31 22:33:53'),
(36, 5, 9, 'fossi così dolce anche con le persone che hai attorno...', '2024-05-31 22:34:12'),
(37, 1, 4, 'ma sei uguale com''è possibile aiuto', '2024-05-31 22:36:08'),
(38, 2, 4, 'l''hai contagiato coi pokémon??', '2024-05-31 22:36:26'),
(39, 3, 4, 'bello c''è poco da dire', '2024-05-31 22:36:40'),
(40, 2, 4, 'ooo comunque ancora devi regalarmi quel peluche pokémon che mi avevi promesso!!!', '2024-05-31 22:37:31'),
(41, 5, 4, 'carino!!', '2024-05-31 22:37:58'),
(42, 10, 1, '...', '2024-05-31 22:38:28'),
(43, 4, 1, 'vida ma te ancora parli??', '2024-05-31 22:38:49'),
(44, 1, 10, 'CHECARINOOO😭😭😭❤️', '2024-05-31 22:40:33'),
(45, 2, 10, 'teeee🔥🔥🔥', '2024-05-31 22:41:36'),
(46, 3, 10, 'hayyyy ^-^', '2024-05-31 22:41:55'),
(47, 12, 10, 'lenticchia!!!', '2024-05-31 22:44:33'),
(48, 11, 3, 'fresco', '2024-05-31 22:45:48'),
(49, 12, 3, 'eolo', '2024-05-31 22:46:32'),
(50, 17, 2, 'gaiuz sei mia sorella tvb ❤️❤️❤️', '2024-05-31 22:48:24'),
(51, 2, 11, 'Hey un momento, io lo conosco quello!!!', '2024-05-31 22:50:34'),
(52, 17, 11, 'Ma è shiny???!!!', '2024-05-31 22:55:25'),
(53, 21, 2, 'lol ahah', '2024-05-31 23:05:15'),
(54, 19, 2, 'mi ricorda la mia ex', '2024-05-31 23:05:45'),
(55, 20, 2, 'sembro iooo', '2024-05-31 23:06:08'),
(56, 22, 1, 'bro ma cos-', '2024-05-31 23:10:19'),
(57, 22, 3, 'che stile però', '2024-05-31 23:11:53'),
(58, 22, 10, 'LO VOGLIO.', '2024-05-31 23:13:14'),
(59, 20, 10, 'che cucciolo🥹🥹🥹', '2024-05-31 23:14:30'),
(60, 18, 10, 'troppo carina!!!', '2024-05-31 23:14:45'),
(61, 21, 10, '💀💀💀', '2024-05-31 23:15:02'),
(62, 16, 2, 'us core', '2024-05-31 23:17:30'),
(63, 16, 8, 'no javid sono io vedi che non capisci', '2024-05-31 23:17:58'),
(64, 16, 2, 'scusa..', '2024-05-31 23:18:41'),
(65, 8, 2, 'penso proprio che farò richiesta! troppo teneri!! 🥹❤️', '2024-06-01 00:35:49'),
(66, 8, 3, 'davvero simpatici, penso che però farò richiesta sull''altro post', '2024-06-01 00:38:13'),
(67, 9, 3, 'vi ho scritto, fate sapere', '2024-06-01 00:38:37'),
(68, 12, 1, 'benjamin', '2024-06-01 00:40:15'),
(69, 11, 1, 'bellissimo cappello, mi ricorda il mio amico astro ahah', '2024-06-01 00:40:39'),
(70, 9, 1, 'che dolci!', '2024-06-01 00:41:16'),
(71, 9, 2, 'tenerissimi anche questi', '2024-06-01 00:42:24'),
(72, 12, 2, 'ha la faccia da \"stellino\"', '2024-06-01 00:42:51'),
(73, 11, 2, 'effettivamente ha uno stile invidiabile 🔥🔥', '2024-06-01 00:43:28'),
(74, 6, 12, 'decisamente, lo capisco persino io che sono un account di default!', '2024-06-01 00:44:18'),
(75, 3, 12, 'simpatico uff peccato non sia adottabile :/', '2024-06-01 00:44:41'),
(76, 3, 6, 'che stile il signorotto!', '2024-06-01 00:47:42'),
(77, 8, 6, 'grazie astro, ci hai convinti, ti abbiamo accettato la richiesta! ci vediamo lunedì al campus!', '2024-06-01 00:48:50'),
(78, 3, 13, 'heloooo :3', '2024-06-01 01:13:30'),
(79, 2, 13, 'è bellissimooo', '2024-06-01 01:14:22'),
(80, 1, 13, 'viduiz cosa scrivi sei pazza', '2024-06-01 01:14:47'),
(81, 16, 13, 'AHBAJJABJAHAJB AJH', '2024-06-01 01:15:11'),
(82, 16, 13, 'SEI TE', '2024-06-01 01:15:16'),
(83, 24, 8, 'ah non sapevo fosse anche lui fan di Rich Amiri', '2024-06-01 01:25:23'),
(84, 23, 8, 'EMMANUCCI GATTO❗❗❗🗣️🗣️🔥🔥🔥', '2024-06-01 01:26:44'),
(85, 25, 8, 'hay :3', '2024-06-01 01:27:09'),
(86, 26, 8, 'carini 😭😭😭', '2024-06-01 01:27:32'),
(87, 23, 13, 'VIDA ANCHE TE HAI KITTYGRAM', '2024-06-01 01:29:17'),
(88, 24, 13, 'lo ascolta sempre', '2024-06-01 01:29:27'),
(89, 25, 13, 'heloo :3', '2024-06-01 01:29:35'),
(90, 23, 8, 'eh sai com''è, l''ha fatto mio fratello....', '2024-06-01 01:30:09'),
(91, 24, 2, 'AW CARINO 😭😭💖💖💖', '2024-06-01 01:31:51'),
(92, 25, 2, 'damn he chillin!', '2024-06-01 01:32:14');

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
(1, 8),
(1, 9),
(1, 10),
(2, 1),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 13),
(3, 1),
(3, 2),
(3, 6),
(3, 7),
(3, 10),
(4, 1),
(4, 2),
(4, 5),
(5, 1),
(5, 2),
(5, 4),
(6, 2),
(7, 2),
(8, 1),
(8, 2),
(8, 4),
(8, 13),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(10, 3),
(10, 6),
(10, 11),
(11, 2),
(11, 10),
(12, 1),
(12, 2),
(12, 3),
(13, 2),
(13, 8);

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
(7, '2024-05-31 18:41:39'),
(8, '2024-05-31 22:14:53'),
(9, '2024-05-31 22:29:36'),
(10, '2024-05-31 22:39:32'),
(10, '2024-05-31 23:12:58'),
(10, '2024-05-31 23:13:01'),
(10, '2024-05-31 23:35:13'),
(10, '2024-05-31 23:35:18'),
(11, '2024-05-31 22:49:53'),
(12, '2024-05-31 23:15:41'),
(12, '2024-06-01 00:43:39'),
(12, '2024-06-01 00:43:43'),
(12, '2024-06-01 00:43:48'),
(13, '2024-06-01 01:10:16');

--
-- Dump dei dati per la tabella `media`
--

INSERT INTO `media` (`file_name`, `post_id`) VALUES
('gatto13.jpg', 1),
('gatto15.jpg', 2),
('gatto11.jpg', 3),
('gatto2.jpg', 4),
('gatto1.jpg', 5),
('cane-scodinzolante.gif', 6),
('gatto7.jpg', 7),
('cucciolata.jpg', 8),
('cucciolata2.jpg', 9),
('gatto5.jpg', 10),
('verticale5.jpg', 11),
('verticale4.jpg', 12),
('verticale2.jpg', 13),
('photo_5962984611124462184_y.jpg', 14),
('8714a2f01457ae5652ffd435924746a6.jpg', 15),
('photo_5962984611124462186_y.jpg', 16),
('orizzontale5.jpg', 17),
('Skitty_di_Vera.jpg', 18),
('photo_5967775178991715068_y.jpg', 19),
('photo_5967775178991715070_y.jpg', 20),
('photo_5967775178991715069_x.jpg', 21),
('b813319c28f86933ab45dec76ac898a3.jpg', 22),
('photo_5967775178991715131_y.jpg', 23),
('photo_5967775178991715132_y.jpg', 24),
('photo_5967775178991715134_y.jpg', 25),
('photo_5967775178991715135_y.jpg', 26),
('photo_5967775178991715133_y.jpg', 26);

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
(35, 5, 2, 10, '2024-05-31 20:12:17', 'Commented your post: \"ODDIO E VEROOOOOOOO\"', 0),
(36, 3, 2, 7, '2024-05-31 20:13:53', 'sent you an adoption request!', 0),
(37, 3, 2, 7, '2024-05-31 20:13:56', 'really liked your post!', 0),
(38, 3, 2, 7, '2024-05-31 20:14:11', 'Commented your post: \"secondo me spotted è una buona fonte\"', 0),
(39, 6, 2, 11, '2024-05-31 20:34:57', 'really liked your post!', 0),
(40, 6, 2, 12, '2024-05-31 20:35:00', 'really liked your post!', 0),
(41, 2, 7, NULL, '2024-05-31 21:53:36', 'started following you!', 0),
(42, 7, 2, 13, '2024-05-31 22:01:49', 'really liked your post!', 0),
(43, 7, 2, 14, '2024-05-31 22:01:53', 'really liked your post!', 0),
(44, 7, 2, 15, '2024-05-31 22:01:56', 'really liked your post!', 0),
(45, 7, 2, 13, '2024-05-31 22:02:23', 'Commented your post: \"mmm idk mi sembra un po'' una scusa...\"', 0),
(46, 7, 2, 15, '2024-05-31 22:02:35', 'Commented your post: \"us core\"', 0),
(47, 7, 3, 15, '2024-05-31 22:04:14', 'really liked your post!', 0),
(48, 7, 3, 15, '2024-05-31 22:04:19', 'Commented your post: \"confermo\"', 0),
(49, 7, 3, 14, '2024-05-31 22:04:22', 'really liked your post!', 0),
(50, 7, 3, 14, '2024-05-31 22:04:28', 'Commented your post: \"che bollito\"', 0),
(51, 7, 3, 13, '2024-05-31 22:04:32', 'really liked your post!', 0),
(52, 2, 3, 3, '2024-05-31 22:04:54', 'really liked your post!', 0),
(53, 2, 3, 3, '2024-05-31 22:05:14', 'Commented your post: \"astro, so che non te lo dico spesso, ma ti voglio bene in re...\"', 0),
(54, 2, 7, 3, '2024-05-31 22:05:39', 'really liked your post!', 0),
(55, 2, 7, 3, '2024-05-31 22:06:15', 'Commented your post: \"carinooooo 🥺🥺🥺\"', 0),
(56, 2, 7, 2, '2024-05-31 22:06:22', 'really liked your post!', 0),
(57, 2, 7, 2, '2024-05-31 22:06:38', 'Commented your post: \"ma cosa fa 💀\"', 0),
(58, 2, 7, 1, '2024-05-31 22:06:42', 'really liked your post!', 0),
(59, 2, 7, 1, '2024-05-31 22:06:48', 'Commented your post: \"è un amore\"', 0),
(60, 7, 1, 13, '2024-05-31 22:07:21', 'really liked your post!', 0),
(61, 7, 1, 13, '2024-05-31 22:07:37', 'Commented your post: \"astro ma te perché devi giudicare??\"', 0),
(62, 2, 1, 1, '2024-05-31 22:07:52', 'Commented your post: \"ma sei letteralmente te\"', 0),
(63, 2, 1, 3, '2024-05-31 22:08:14', 'Commented your post: \"he so polite.\"', 0),
(64, 1, 5, 5, '2024-05-31 22:08:53', 'really liked your post!', 0),
(65, 2, 5, 3, '2024-05-31 22:09:00', 'really liked your post!', 0),
(66, 2, 5, 3, '2024-05-31 22:09:08', 'Commented your post: \"zamn he nice tho!!\"', 0),
(67, 2, 5, 2, '2024-05-31 22:09:14', 'really liked your post!', 0),
(68, 2, 5, 2, '2024-05-31 22:09:35', 'Commented your post: \"mm non so fra, per me te sei più tipo da pikachu..\"', 0),
(69, 2, 5, 1, '2024-05-31 22:09:43', 'really liked your post!', 0),
(70, 2, 5, 1, '2024-05-31 22:09:53', 'Commented your post: \"che sguardo esoterico\"', 0),
(71, 2, 6, NULL, '2024-05-31 22:12:55', 'started following you!', 0),
(72, 2, 6, 3, '2024-05-31 22:13:00', 'really liked your post!', 0),
(73, 2, 6, 2, '2024-05-31 22:13:02', 'really liked your post!', 0),
(74, 2, 6, 1, '2024-05-31 22:13:05', 'really liked your post!', 0),
(75, 2, 6, 1, '2024-05-31 22:13:27', 'Commented your post: \"grande astro!!!\"', 0),
(76, 2, 6, 2, '2024-05-31 22:13:50', 'Commented your post: \"fighissimo gengar!\"', 0),
(77, 2, 8, NULL, '2024-05-31 22:15:09', 'started following you!', 0),
(78, 1, 8, NULL, '2024-05-31 22:15:14', 'started following you!', 0),
(79, 1, 8, 4, '2024-05-31 22:15:18', 'really liked your post!', 0),
(80, 1, 8, 4, '2024-05-31 22:15:25', 'Commented your post: \"diotta ma cosa combini\"', 0),
(81, 1, 8, 5, '2024-05-31 22:15:29', 'really liked your post!', 0),
(82, 1, 8, 5, '2024-05-31 22:15:35', 'Commented your post: \"trovati un lavoro..\"', 0),
(83, 2, 8, 3, '2024-05-31 22:16:09', 'really liked your post!', 0),
(84, 2, 8, 2, '2024-05-31 22:16:12', 'really liked your post!', 0),
(85, 2, 8, 1, '2024-05-31 22:16:14', 'really liked your post!', 0),
(86, 2, 8, 2, '2024-05-31 22:28:21', 'Commented your post: \"jaji sei il miglior fratello del mondo!\"', 0),
(87, 2, 8, 1, '2024-05-31 22:28:36', 'Commented your post: \"piccolo batuffolo di cotone\"', 0),
(88, 2, 8, 3, '2024-05-31 22:28:54', 'Commented your post: \"ma cosa fa con quel papillion\"', 0),
(89, 2, 9, NULL, '2024-05-31 22:31:55', 'started following you!', 0),
(90, 2, 9, 1, '2024-05-31 22:31:56', 'really liked your post!', 0),
(91, 2, 9, 1, '2024-05-31 22:32:25', 'Commented your post: \"ahahah carinooo\"', 0),
(92, 2, 9, 2, '2024-05-31 22:32:30', 'really liked your post!', 0),
(93, 2, 9, 2, '2024-05-31 22:33:06', 'Commented your post: \"umbreon vs gengar!!!\"', 0),
(94, 2, 9, 3, '2024-05-31 22:33:10', 'really liked your post!', 0),
(95, 1, 9, 5, '2024-05-31 22:33:14', 'really liked your post!', 0),
(96, 1, 9, 4, '2024-05-31 22:33:37', 'really liked your post!', 0),
(97, 1, 9, 4, '2024-05-31 22:33:53', 'Commented your post: \"portalo a casaaaa\"', 0),
(98, 1, 9, 5, '2024-05-31 22:34:12', 'Commented your post: \"fossi così dolce anche con le persone che hai attorno...\"', 0),
(99, 5, 4, 10, '2024-05-31 22:35:39', 'really liked your post!', 0),
(100, 2, 4, 3, '2024-05-31 22:35:50', 'really liked your post!', 0),
(101, 2, 4, 2, '2024-05-31 22:35:52', 'really liked your post!', 0),
(102, 2, 4, 1, '2024-05-31 22:35:54', 'really liked your post!', 0),
(103, 2, 4, 1, '2024-05-31 22:36:08', 'Commented your post: \"ma sei uguale com''è possibile aiuto\"', 0),
(104, 2, 4, 2, '2024-05-31 22:36:26', 'Commented your post: \"l''hai contagiato coi pokémon??\"', 0),
(105, 2, 4, 3, '2024-05-31 22:36:40', 'Commented your post: \"bello c''è poco da dire\"', 0),
(106, 2, 4, 2, '2024-05-31 22:37:31', 'Commented your post: \"ooo comunque ancora devi regalarmi quel peluche pokémon che ...\"', 0),
(107, 1, 4, 5, '2024-05-31 22:37:41', 'really liked your post!', 0),
(108, 1, 4, 4, '2024-05-31 22:37:51', 'really liked your post!', 0),
(109, 1, 4, 5, '2024-05-31 22:37:58', 'Commented your post: \"carino!!\"', 0),
(110, 6, 1, 11, '2024-05-31 22:38:19', 'really liked your post!', 0),
(111, 6, 1, 12, '2024-05-31 22:38:21', 'really liked your post!', 0),
(112, 5, 1, 10, '2024-05-31 22:38:24', 'really liked your post!', 0),
(113, 5, 1, 10, '2024-05-31 22:38:28', 'Commented your post: \"...\"', 0),
(114, 2, 10, NULL, '2024-05-31 22:39:50', 'started following you!', 0),
(115, 2, 10, 3, '2024-05-31 22:39:53', 'really liked your post!', 0),
(116, 2, 10, 2, '2024-05-31 22:39:55', 'really liked your post!', 0),
(117, 2, 10, 1, '2024-05-31 22:39:57', 'really liked your post!', 0),
(118, 2, 10, 1, '2024-05-31 22:40:33', 'Commented your post: \"CHECARINOOO😭😭😭❤️\"', 0),
(119, 2, 10, 2, '2024-05-31 22:41:36', 'Commented your post: \"teeee🔥🔥🔥\"', 0),
(120, 2, 10, 3, '2024-05-31 22:41:55', 'Commented your post: \"hayyyy ^-^\"', 0),
(121, 6, 10, NULL, '2024-05-31 22:44:20', 'started following you!', 0),
(122, 6, 10, 12, '2024-05-31 22:44:23', 'really liked your post!', 0),
(123, 6, 10, 12, '2024-05-31 22:44:33', 'Commented your post: \"lenticchia!!!\"', 0),
(124, 6, 10, 11, '2024-05-31 22:44:38', 'really liked your post!', 0),
(125, 1, 10, NULL, '2024-05-31 22:45:06', 'started following you!', 0),
(126, 3, 10, NULL, '2024-05-31 22:45:10', 'started following you!', 0),
(127, 10, 3, NULL, '2024-05-31 22:45:30', 'started following you!', 0),
(128, 6, 3, 11, '2024-05-31 22:45:39', 'really liked your post!', 0),
(129, 6, 3, 11, '2024-05-31 22:45:48', 'Commented your post: \"fresco\"', 0),
(130, 6, 3, 12, '2024-05-31 22:45:53', 'really liked your post!', 0),
(131, 6, 3, 12, '2024-05-31 22:46:32', 'Commented your post: \"eolo\"', 0),
(132, 10, 1, NULL, '2024-05-31 22:46:53', 'started following you!', 0),
(133, 10, 1, 17, '2024-05-31 22:46:56', 'really liked your post!', 0),
(134, 10, 2, NULL, '2024-05-31 22:47:17', 'started following you!', 0),
(135, 10, 2, 17, '2024-05-31 22:48:08', 'really liked your post!', 0),
(136, 10, 2, 17, '2024-05-31 22:48:24', 'Commented your post: \"gaiuz sei mia sorella tvb ❤️❤️❤️\"', 0),
(137, 2, 11, NULL, '2024-05-31 22:50:06', 'started following you!', 0),
(138, 2, 11, 3, '2024-05-31 22:50:10', 'really liked your post!', 0),
(139, 2, 11, 2, '2024-05-31 22:50:11', 'really liked your post!', 0),
(140, 2, 11, 1, '2024-05-31 22:50:13', 'really liked your post!', 0),
(141, 2, 11, 2, '2024-05-31 22:50:34', 'Commented your post: \"Hey un momento, io lo conosco quello!!!\"', 0),
(142, 10, 11, NULL, '2024-05-31 22:54:25', 'started following you!', 0),
(143, 10, 11, 17, '2024-05-31 22:54:27', 'really liked your post!', 0),
(144, 10, 11, 17, '2024-05-31 22:55:25', 'Commented your post: \"Ma è shiny???!!!\"', 0),
(145, 1, 9, NULL, '2024-05-31 23:02:13', 'started following you!', 1),
(146, 9, 1, NULL, '2024-05-31 23:04:08', 'started following you!', 0),
(147, 9, 2, NULL, '2024-05-31 23:04:46', 'started following you!', 0),
(148, 11, 2, 20, '2024-05-31 23:04:58', 'really liked your post!', 0),
(149, 11, 2, 19, '2024-05-31 23:05:01', 'really liked your post!', 0),
(150, 11, 2, 18, '2024-05-31 23:05:04', 'really liked your post!', 0),
(151, 11, 2, 21, '2024-05-31 23:05:11', 'really liked your post!', 0),
(152, 11, 2, 21, '2024-05-31 23:05:15', 'Commented your post: \"lol ahah\"', 0),
(153, 11, 2, 19, '2024-05-31 23:05:45', 'Commented your post: \"mi ricorda la mia ex\"', 0),
(154, 11, 2, 20, '2024-05-31 23:06:08', 'Commented your post: \"sembro iooo\"', 0),
(155, 2, 1, 22, '2024-05-31 23:10:11', 'really liked your post!', 0),
(156, 2, 1, 22, '2024-05-31 23:10:19', 'Commented your post: \"bro ma cos-\"', 0),
(157, 2, 1, 22, '2024-05-31 23:11:09', 'sent you an adoption request!', 0),
(158, 2, 3, 22, '2024-05-31 23:11:45', 'really liked your post!', 0),
(159, 2, 3, 22, '2024-05-31 23:11:53', 'Commented your post: \"che stile però\"', 0),
(160, 2, 3, 22, '2024-05-31 23:12:43', 'sent you an adoption request!', 0),
(161, 2, 10, 22, '2024-05-31 23:13:09', 'really liked your post!', 0),
(162, 2, 10, 22, '2024-05-31 23:13:14', 'Commented your post: \"LO VOGLIO.\"', 0),
(163, 2, 10, 22, '2024-05-31 23:13:45', 'sent you an adoption request!', 0),
(164, 11, 10, NULL, '2024-05-31 23:13:57', 'started following you!', 0),
(165, 11, 10, 20, '2024-05-31 23:14:00', 'really liked your post!', 0),
(166, 11, 10, 20, '2024-05-31 23:14:30', 'Commented your post: \"che cucciolo🥹🥹🥹\"', 0),
(167, 11, 10, 19, '2024-05-31 23:14:34', 'really liked your post!', 0),
(168, 11, 10, 18, '2024-05-31 23:14:38', 'really liked your post!', 0),
(169, 11, 10, 18, '2024-05-31 23:14:45', 'Commented your post: \"troppo carina!!!\"', 0),
(170, 11, 10, 21, '2024-05-31 23:14:51', 'really liked your post!', 0),
(171, 11, 10, 21, '2024-05-31 23:15:02', 'Commented your post: \"💀💀💀\"', 0),
(172, 2, 12, NULL, '2024-05-31 23:15:56', 'started following you!', 0),
(173, 1, 12, NULL, '2024-05-31 23:15:59', 'started following you!', 0),
(174, 3, 12, NULL, '2024-05-31 23:16:02', 'started following you!', 0),
(175, 2, 12, 1, '2024-05-31 23:16:42', 'really liked your post!', 0),
(176, 2, 12, 2, '2024-05-31 23:16:45', 'really liked your post!', 0),
(177, 2, 12, 3, '2024-05-31 23:16:48', 'really liked your post!', 0),
(178, 2, 12, 22, '2024-05-31 23:16:53', 'really liked your post!', 0),
(179, 8, 2, 16, '2024-05-31 23:17:18', 'really liked your post!', 0),
(180, 8, 2, 16, '2024-05-31 23:17:30', 'Commented your post: \"us core\"', 1),
(181, 4, 8, NULL, '2024-05-31 23:18:14', 'started following you!', 0),
(182, 8, 2, NULL, '2024-05-31 23:18:35', 'started following you!', 0),
(183, 8, 2, 16, '2024-05-31 23:18:41', 'Commented your post: \"scusa..\"', 0),
(184, 8, 1, NULL, '2024-05-31 23:18:58', 'started following you!', 0),
(185, 8, 1, 16, '2024-05-31 23:19:00', 'really liked your post!', 0),
(186, 6, 2, 8, '2024-06-01 00:35:12', 'really liked your post!', 0),
(187, 6, 2, 9, '2024-06-01 00:35:18', 'really liked your post!', 0),
(188, 6, 2, 8, '2024-06-01 00:35:49', 'Commented your post: \"penso proprio che farò richiesta! troppo teneri!! 🥹❤️\"', 0),
(189, 6, 2, 8, '2024-06-01 00:37:12', 'sent you an adoption request!', 0),
(190, 10, 3, 17, '2024-06-01 00:37:26', 'really liked your post!', 0),
(191, 6, 3, 9, '2024-06-01 00:37:37', 'really liked your post!', 0),
(192, 6, 3, 8, '2024-06-01 00:37:47', 'really liked your post!', 0),
(193, 6, 3, 8, '2024-06-01 00:38:13', 'Commented your post: \"davvero simpatici, penso che però farò richiesta sull''altro ...\"', 0),
(194, 6, 3, 9, '2024-06-01 00:38:37', 'Commented your post: \"vi ho scritto, fate sapere\"', 0),
(195, 6, 3, 9, '2024-06-01 00:39:35', 'sent you an adoption request!', 0),
(196, 6, 1, 12, '2024-06-01 00:40:15', 'Commented your post: \"benjamin\"', 0),
(197, 6, 1, 11, '2024-06-01 00:40:39', 'Commented your post: \"bellissimo cappello, mi ricorda il mio amico astro ahah\"', 0),
(198, 6, 1, 9, '2024-06-01 00:40:46', 'really liked your post!', 0),
(199, 6, 1, 8, '2024-06-01 00:40:53', 'really liked your post!', 0),
(200, 6, 1, 9, '2024-06-01 00:41:16', 'Commented your post: \"che dolci!\"', 0),
(201, 6, 1, 9, '2024-06-01 00:42:04', 'sent you an adoption request!', 0),
(202, 6, 2, 9, '2024-06-01 00:42:24', 'Commented your post: \"tenerissimi anche questi\"', 0),
(203, 6, 2, 12, '2024-06-01 00:42:51', 'Commented your post: \"ha la faccia da \"stellino\"\"', 0),
(204, 6, 2, 11, '2024-06-01 00:43:28', 'Commented your post: \"effettivamente ha uno stile invidiabile 🔥🔥\"', 0),
(205, 3, 12, 6, '2024-06-01 00:43:56', 'really liked your post!', 0),
(206, 3, 12, 6, '2024-06-01 00:44:18', 'Commented your post: \"decisamente, lo capisco persino io che sono un account di de...\"', 0),
(207, 1, 12, 5, '2024-06-01 00:44:21', 'really liked your post!', 0),
(208, 1, 12, 4, '2024-06-01 00:44:24', 'really liked your post!', 0),
(209, 2, 12, 3, '2024-06-01 00:44:41', 'Commented your post: \"simpatico uff peccato non sia adottabile :/\"', 0),
(210, 3, 12, 7, '2024-06-01 00:45:03', 'really liked your post!', 0),
(211, 3, 12, 7, '2024-06-01 00:46:52', 'sent you an adoption request!', 0),
(212, 2, 12, 22, '2024-06-01 00:47:16', 'sent you an adoption request!', 0),
(213, 2, 6, 3, '2024-06-01 00:47:42', 'Commented your post: \"che stile il signorotto!\"', 0),
(214, 2, 13, NULL, '2024-06-01 01:13:16', 'started following you!', 0),
(215, 2, 13, 2, '2024-06-01 01:13:19', 'really liked your post!', 0),
(216, 2, 13, 3, '2024-06-01 01:13:22', 'really liked your post!', 0),
(217, 2, 13, 3, '2024-06-01 01:13:30', 'Commented your post: \"heloooo :3\"', 0),
(218, 2, 13, 2, '2024-06-01 01:14:22', 'Commented your post: \"è bellissimooo\"', 0),
(219, 2, 13, 1, '2024-06-01 01:14:24', 'really liked your post!', 0),
(220, 2, 13, 1, '2024-06-01 01:14:47', 'Commented your post: \"viduiz cosa scrivi sei pazza\"', 1),
(221, 8, 13, NULL, '2024-06-01 01:14:59', 'started following you!', 0),
(222, 8, 13, 16, '2024-06-01 01:15:07', 'really liked your post!', 0),
(223, 8, 13, 16, '2024-06-01 01:15:11', 'Commented your post: \"AHBAJJABJAHAJB AJH\"', 0),
(224, 8, 13, 16, '2024-06-01 01:15:16', 'Commented your post: \"SEI TE\"', 0),
(225, 13, 8, NULL, '2024-06-01 01:24:15', 'started following you!', 0),
(226, 13, 8, 24, '2024-06-01 01:24:19', 'really liked your post!', 0),
(227, 13, 8, 24, '2024-06-01 01:25:23', 'Commented your post: \"ah non sapevo fosse anche lui fan di Rich Amiri\"', 0),
(228, 13, 8, 23, '2024-06-01 01:25:27', 'really liked your post!', 0),
(229, 13, 8, 23, '2024-06-01 01:26:44', 'Commented your post: \"EMMANUCCI GATTO❗❗❗🗣️🗣️🔥🔥🔥\"', 0),
(230, 13, 8, 25, '2024-06-01 01:26:49', 'really liked your post!', 0),
(231, 13, 8, 25, '2024-06-01 01:27:09', 'Commented your post: \"hay :3\"', 1),
(232, 13, 8, 26, '2024-06-01 01:27:17', 'really liked your post!', 0),
(233, 13, 8, 26, '2024-06-01 01:27:32', 'Commented your post: \"carini 😭😭😭\"', 0),
(234, 13, 8, 26, '2024-06-01 01:27:55', 'sent you an adoption request!', 0),
(235, 13, 8, 23, '2024-06-01 01:30:09', 'Commented your post: \"eh sai com''è, l''ha fatto mio fratello....\"', 0),
(236, 13, 2, NULL, '2024-06-01 01:30:28', 'started following you!', 0),
(237, 13, 2, 25, '2024-06-01 01:30:31', 'really liked your post!', 0),
(238, 13, 2, 24, '2024-06-01 01:30:35', 'really liked your post!', 0),
(239, 13, 2, 23, '2024-06-01 01:30:39', 'really liked your post!', 0),
(240, 13, 2, 26, '2024-06-01 01:30:43', 'really liked your post!', 0),
(241, 13, 2, 26, '2024-06-01 01:31:09', 'sent you an adoption request!', 0),
(242, 13, 2, 24, '2024-06-01 01:31:51', 'Commented your post: \"AW CARINO 😭😭💖💖💖\"', 0),
(243, 13, 2, 25, '2024-06-01 01:32:14', 'Commented your post: \"damn he chillin!\"', 0);

--
-- Dump dei dati per la tabella `post_like`
--

INSERT INTO `post_like` (`post_id`, `user_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(2, 1),
(2, 2),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(4, 2),
(4, 4),
(4, 8),
(4, 9),
(4, 12),
(5, 2),
(5, 4),
(5, 5),
(5, 8),
(5, 9),
(5, 12),
(6, 2),
(6, 12),
(7, 2),
(7, 12),
(8, 1),
(8, 2),
(8, 3),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 4),
(11, 1),
(11, 2),
(11, 3),
(11, 10),
(12, 1),
(12, 2),
(12, 3),
(12, 10),
(13, 1),
(13, 2),
(13, 3),
(14, 2),
(14, 3),
(15, 2),
(15, 3),
(16, 1),
(16, 2),
(16, 13),
(17, 1),
(17, 2),
(17, 3),
(17, 11),
(18, 2),
(18, 10),
(19, 2),
(19, 10),
(20, 2),
(20, 10),
(21, 2),
(21, 10),
(22, 1),
(22, 2),
(22, 3),
(22, 10),
(22, 12),
(23, 2),
(23, 8),
(24, 2),
(24, 8),
(25, 2),
(25, 8),
(26, 2),
(26, 8);

--
-- Dump dei dati per la tabella `user_adopting`
--

INSERT INTO `user_adopting` (`post_id`, `user_id`, `cell`, `presentation`) VALUES
(7, 2, '3335380866', 'Ciao Gio, sto cercando un gattino da adottare e questo sembrerebbe molto carino.\r\nPotresti scrivermi su whatsapp please??'),
(7, 12, '4445670899', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora in'),
(8, 2, '3335380866', 'eiciao ragazzi sono astro! sarei molto interessato ad adottare i micini in questione poiché finora ho sempre solo avuto gatti neri ahah! fatemi sapere, il mio numero lo avete :)\r\n\r\nun saluto, Astro'),
(9, 1, '3703440358', 'ciao ragazzi, sarei molto interessato, contattatemi il prima possibile perfavore! :D'),
(9, 3, '3459208503', 'Ciao, io sarei interessato perché mia mamma odia i topi e da un po'' cercava un amico felino che potesse aiutarla contro i suoi nemici mortali, fate sapere\r\n\r\ngrazie'),
(22, 1, '3703440358', 'yo astro sono diotta, io sarei disposto ad occuparmi di Trinity se vuoi, dopotutto me la cavo bene coi gatti'),
(22, 3, '3459208503', 'Ciao bel, Trinity mi ispira però non riesco a venire a Fano a prenderlo, puoi salire tu a Sarsina?'),
(22, 10, '3441239870', 'ti pregoooo voglio troppo il gatto cowboy! andrebbe virale su tiktok!!!!'),
(22, 12, '44476899', 'farò la richiesta più lunga possibile:\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, s'),
(26, 2, '3335380866', 'eiciao emma, io sarei interessato, scrivimi su whatsapp o su ig vedi tu ciaooo :3'),
(26, 8, '3233567869', 'ti prego emmaaaa li voglio troppo io!!!');
