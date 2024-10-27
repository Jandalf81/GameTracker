INSERT INTO collection (id, name) VALUES
(1, 'The Legend of Zelda');

INSERT INTO platform (id, manufacturer, name) VALUES
(1, 'Nintendo',  'Switch (Ryujinx)'),
(2, 'PC', 'Steam'),
(3, 'Nintendo',  'Switch'),
(4, 'Meta',  'Quest 3');

INSERT INTO game (id, name, developer, publisher, year, platform, collection) VALUES
(1, 'The Legend of Zelda: Echoes of Wisdom', 'Grezzo', 'Nintendo', 2014, 1, 1),
(2, 'Hitman 3: World of Assassination', 'I/O Interactive', 'I/O Interactive', 2022, 2, NULL),
(3, 'Dwarf Fortress', 'Bay 12 Games', 'Kitfox Games', 2022, 2, NULL),
(4, 'Super Smash Bros. Ultimate', 'Nintendo', 'Nintendo', 2015, 1, NULL),
(5, 'Luigi''s Mansion 3', 'Next Level Games', 'Nintendo', 2019, 3, NULL),
(6, 'Super Mario Kart 8 Deluxe', 'Nintendo', 'Nintendo', 2015, 3, NULL),
(7, 'Ragna Rock', NULL, NULL, NULL, 4, NULL),
(8, 'The 7th Guest', NULL, NULL, NULL, 4, NULL),
(9, 'The Light Brigade', NULL, NULL, NULL, 4, NULL),
(10, 'Walkabout Mini Golf', NULL, NULL, NULL, 4, NULL);

INSERT INTO sessionType (id, name) VALUES
(1, 'Single Player'),
(2, 'Competitive Multi Player'),
(3, 'Couch Co-Op Multi Player');

INSERT INTO run(id, game, name) VALUES
(1, 1, '1st Play-Through'),
(2, 2, '1st Play-Through'),
(3, 3, 'Fortress Slingquested'),
(4, 3, 'Fortress Drivenlancers');

INSERT INTO session (id, startedAt, stoppedAt, game, sessionType, run, note) VALUES
(1, '2024-09-22 15:16:12+02:00', '2024-09-22 16:02:49+02:00', 1, 1, 1, NULL),
(2, '2024-09-22 20:32:41+02:00', '2024-09-22 22:08:32+02:00', 1, 1, 1, NULL),
(3, '2024-09-29 13:35:45+02:00', '2024-09-29 16:02:14+02:00', 2, 1, 2, 'Hitman 1: Training, Showstopper'),
(4, '2024-09-29 16:46:58+02:00', '2024-09-29 18:05:42+02:00', 2, 1, 2, 'Hitman 1: Die Welt von Morgen'),
(5, '2024-09-29 20:41:23+02:00', '2024-09-29 22:59:03+02:00', 2, 1, 2, 'Hitman 1: Ein goldener Käfig'),
(6, '2024-10-03 13:18:45+02:00', '2024-10-03 15:05:36+02:00', 1, 1, 1, NULL),
(7, '2024-10-03 15:16:21+02:00', '2024-10-03 18:35:47+02:00', 2, 1, 2, 'Hitman 1: Club 27'),
(8, '2024-10-03 20:18:11+02:00', '2024-10-03 22:11:19+02:00', 2, 1, 2, 'Hitman 1: Die Welt von Morgen'),
(9, '2024-10-04 16:41:00+02:00', '2024-10-04 18:27:00+02:00', 1, 1, 1, NULL),
(10, '2024-10-04 21:35:00+02:00', '2024-10-04 23:06:00+02:00', 1, 1, 1, NULL),
(11, '2024-10-05 13:15:00+02:00', '2024-10-05 19:02:00+02:00', 3, 1, 3, NULL),
(12, '2024-10-06 16:15:00+02:00', '2024-10-06 18:50:00+02:00', 3, 1, 4, NULL),
(13, '2024-10-06 20:29:00+02:00', '2024-10-06 23:45:00+02:00', 3, 1, 4, NULL),
(14, '2024-10-09 20:05:00+02:00', '2024-10-09 21:02:00+02:00', 4, 1, NULL, NULL),
(15, '2024-10-09 21:06:00+02:00', '2024-10-10 00:13:00+02:00', 3, 1, 4, NULL),
(16, '2024-10-10 19:59:00+02:00', '2024-10-10 22:19:00+02:00', 2, 1, 2, 'Hitman 1: Freiheitskämpfer'),
(17, '2024-10-11 15:35:00+02:00', '2024-10-11 16:33:00+02:00', 3, 1, 4, NULL),
(18, '2024-10-11 19:50:00+02:00', '2024-10-11 22:15:00+02:00', 5, 3, NULL, NULL),
(19, '2024-10-12 13:35:00+02:00', '2024-10-12 16:37:00+02:00', 3, 1, 4, NULL),
(20, '2024-10-12 21:05:00+02:00', '2024-10-12 22:15:00+02:00', 5, 3, NULL, NULL),
(21, '2024-10-12 22:15:00+02:00', '2024-10-12 23:05:00+02:00', 6, 2, NULL, NULL),
(22, '2024-10-13 16:20:00+02:00', '2024-10-13 17:13:00+02:00', 2, 1, 2, 'Hitman 1: Situs Inversus'),
(23, '2024-10-13 19:40:00+02:00', '2024-10-13 23:05:00+02:00', 2, 1, 2, 'Hitman 2: Nächtlicher Besuch, Ziellinie'),
(24, '2024-10-17 20:30:00+02:00', '2024-10-17 21:15:00+02:00', 7, 1, NULL, NULL),
(25, '2024-10-17 21:15:00+02:00', '2024-10-17 21:55:00+02:00', 8, 1, NULL, NULL),
(26, '2024-10-17 21:55:00+02:00', '2024-10-17 22:30:00+02:00', 9, 1, NULL, NULL),
(27, '2024-10-20 13:15:50+02:00', '2024-10-20 14:29:48+02:00', 1, 1, 1, 'Jabul-Rune'),
(28, '2024-10-20 20:00:31+02:00', '2024-10-20 21:38:29+02:00', 1, 1, 1, 'Schloss Hyrule'),
(29, '2024-10-23 20:02:09+02:00', '2024-10-23 21:36:37+02:00', 10, 2, 0, 'Mars Gardens (Normal), Wallace & Gromit (Hard)'),
(30, '2024-10-26 14:49:05+02:00', '2024-10-26 16:13:30+02:00', 1, 1, 1, 'Phirone-Sümpfe');