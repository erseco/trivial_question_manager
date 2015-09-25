-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-06-2014 a las 14:07:04
-- Versión del servidor: 5.5.30
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `database_name`
--
CREATE DATABASE IF NOT EXISTS `database_name` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `database_name`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'Science & Nature'),
(3, 'Sports & Leisure'),
(4, 'Spectacles'),
(5, 'Geography'),
(6, 'History');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corrections`
--

CREATE TABLE IF NOT EXISTS `corrections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_question` int(11) NOT NULL,
  `comments` varchar(200) CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_question` (`id_question`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Volcado de datos para la tabla `corrections`
--

INSERT INTO `corrections` (`id`, `id_question`, `comments`, `date`) VALUES
(1, 1, 'prueba', '2013-11-29 23:00:00'),
(2, 1, 'is not correct', '2013-11-29 23:00:00'),
(6, 1, '\\''10101\\''1\\''\\''\\''02020323¡kfjEN-LFV,.', '2014-05-19 21:21:23'),
(7, 1, '<form method=\\"post\\" action=\\"http://pw.ernesto.es/api/insert_correction.php\\">\r\n\r\n	<input name=\\"id_question\\" type=\\"number\\">\r\n\r\n	<textarea name=\\"comments\\"></textarea>\r\n	\r\n	<input type=\\"submit\\', '2014-05-19 21:24:21'),
(8, 8, 'Revisar ortografía', '2014-05-19 21:26:38'),
(9, 20, 'LA PREGUNTA ES MAL FORMULADA', '2014-05-19 21:33:09'),
(10, 20, 'Hay un fallo en la pregunta,MADAGASCAR se escribe así .', '2014-05-19 21:35:59'),
(11, 25, 'Hay un fallo en la pregunta,MADAGASCAR se escribe así .', '2014-05-19 21:36:41'),
(12, 30, 'Pregunta Incorrecta !!!', '2014-05-19 21:38:05'),
(13, 13, 'Fallo ortográfico .', '2014-05-19 21:41:34'),
(14, 18, 'Las respuestas no son Correctas.', '2014-05-19 21:43:11'),
(15, 46, 'Las respuestas no son Correctas.', '2014-05-19 21:44:09'),
(16, 50, 'No hay respuestas !!!', '2014-05-19 21:45:10'),
(17, 52, 'hay un fallo ortográfico , en una de las respuestas .  ', '2014-05-19 21:46:38'),
(18, 60, 'Pregunta Repetida . ', '2014-05-19 21:48:47'),
(19, 15, 'Revisar ortografía  ', '2014-05-19 21:50:03'),
(20, 27, 'la pregunta está mal formulada', '2014-05-19 21:51:50'),
(21, 34, 'la pregunta está mal formulada', '2014-05-19 21:52:46'),
(22, 43, 'hay un fallo ortográfico en la pregunta . ', '2014-05-19 21:53:30'),
(23, 39, 'Pregunta Incorrecta .  ', '2014-05-19 21:54:16'),
(24, 57, 'Hay un fallo ortográfico en la pregunta .', '2014-05-19 21:55:20'),
(25, 59, 'Pregunta repetida !!!', '2014-05-19 21:55:58'),
(26, 111, 'Fallo ortográfico !! ', '2014-05-19 22:02:49'),
(27, 115, 'La pregunta es incorrecta y mal formulada .', '2014-05-19 22:03:54'),
(28, 131, 'Hay un fallo ortográfico en una de las respuestas .', '2014-05-19 22:05:13'),
(29, 133, 'Hay un fallo ortográfico en una de las respuestas .', '2014-05-19 22:05:42'),
(30, 138, 'La pregunta es incorrecta , y mal formulada !!!', '2014-05-19 22:07:00'),
(31, 148, 'Hay un fallo ortográfico en la pregunta !!!', '2014-05-19 22:09:09'),
(32, 143, 'Las repuestas son todos iguales .', '2014-05-19 22:10:27'),
(33, 142, 'Las repuestas son todos iguales .', '2014-05-19 22:10:45'),
(34, 120, 'hay fallos ortográficos en la pregunta y las respuestas .', '2014-05-19 22:12:15'),
(35, 66, 'Hay un fallo ortográfico en la pregunta .', '2014-05-19 22:17:07'),
(36, 66, 'La pregunta está mal formulada !!!', '2014-05-19 22:19:27'),
(37, 107, 'Las respuestas no son Correctas .', '2014-05-19 22:21:01'),
(38, 100, 'Las respuestas no son Correctas .', '2014-05-19 22:21:56'),
(39, 88, 'La pregunta está mal .', '2014-05-19 22:22:53'),
(40, 85, 'Hay un fallo ortográfico en la pregunta .', '2014-05-19 22:23:53'),
(41, 78, 'Las respuestas no son Correctas .', '2014-05-19 22:24:59'),
(42, 149, 'hay un fallo ortográfico en la pregunta .', '2014-05-19 22:26:08'),
(43, 126, 'hay un fallo ortográfico en la pregunta .', '2014-05-19 22:27:54'),
(44, 123, 'la pregunta está mal y las respuestas no son correctas .', '2014-05-19 22:31:19'),
(45, 112, 'la pregunta está mal .', '2014-05-19 22:33:45'),
(46, 102, 'Las respuestas no son Correctas .', '2014-05-19 22:35:43'),
(47, 98, 'hay un fallo ortográfico en la pregunta .', '2014-05-19 22:36:46'),
(48, 94, 'la pregunta está mal formulada', '2014-05-19 22:38:34'),
(49, 69, 'la pregunta está mal .', '2014-05-19 23:03:11'),
(50, 72, 'Las respuestas no son Correctas .', '2014-05-19 23:04:31'),
(51, 64, 'La pregunta está mal , y las respuestas también . ', '2014-05-19 23:06:14'),
(52, 56, 'las respuestas están mal , y contienen fallos ortográficos .', '2014-05-19 23:08:14'),
(53, 91, 'las respuestas están mal .', '2014-05-19 23:13:11'),
(54, 82, 'La pregunta está mal formada y contiene fallos ortográficos .    .', '2014-05-19 23:14:38'),
(55, 11, 'Las respuestas están mal .   .', '2014-05-19 23:17:04'),
(56, 1, '1', '2014-05-20 09:34:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(2) CHARACTER SET utf8 NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `languages`
--

INSERT INTO `languages` (`id`, `code`, `name`) VALUES
(1, 'es', 'Spanish'),
(4, 'en', 'English'),
(5, 'it', 'Italian'),
(6, 'pt', 'Portuguese'),
(7, 'de', 'German');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_category` int(11) NOT NULL,
  `difficulty` int(11) NOT NULL,
  `question` varchar(100) CHARACTER SET utf8 NOT NULL,
  `answer1` varchar(100) CHARACTER SET utf8 NOT NULL,
  `answer2` varchar(100) CHARACTER SET utf8 NOT NULL,
  `answer3` varchar(100) CHARACTER SET utf8 NOT NULL,
  `comments` varchar(200) CHARACTER SET utf8 NOT NULL,
  `id_language` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_category` (`id_category`),
  KEY `id_language` (`id_language`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=157 ;

--
-- Volcado de datos para la tabla `questions`
--

INSERT INTO `questions` (`id`, `date`, `id_category`, `difficulty`, `question`, `answer1`, `answer2`, `answer3`, `comments`, `id_language`, `id_user`) VALUES
(3, '2014-02-11 23:00:00', 1, 1, 'Wie lautet der zweite name von hundertwasser?', 'Regentag', 'Dunk4bunt', 'Lebkuchen', '', 7, 1),
(4, '2014-02-11 23:00:00', 2, 1, 'On mesure l''intensité du courant électrique en...', 'Ampèresddsfsdfdsfasdfsdfasdfasdf', 'Volts', 'Ohms', '', 3, 1),
(6, '2014-02-11 23:00:00', 5, 2, 'Segun antena3 cual es 4 pueblo mas bonito de españa', 'Priego de cordoba', 'Baeza', 'Mostoles', '', 1, 1),
(7, '2014-02-11 23:00:00', 1, 1, 'Quien fue la primera novia o4cial d4 principe F4ipe', 'Isab4 sartorius', 'Leticia', 'Marta', '', 1, 1),
(8, '2014-02-11 23:00:00', 3, 1, 'Ganó 4 mundial de 2010 de fútbol', 'España', 'Holan4 ', 'Italia ', '', 1, 1),
(9, '2014-02-11 23:00:00', 6, 1, 'Ap4ludo manola argallon', 'Rodriguez', 'Mical', 'Lotilla', '', 1, 1),
(10, '2014-02-11 23:00:00', 1, 1, 'Chi scrisse la pioggia n4 pineto??', 'D'' annunzio', 'Pascoli', 'Svevo', '', 5, 1),
(11, '2014-02-11 23:00:00', 6, 2, 'Quand a eu lieu la bataille de marignane', '1515', '1414', '1616', '', 3, 1),
(12, '2014-02-11 23:00:00', 3, 2, 'Comment marque t on 3 points au rugby', 'Drop', 'Transformation', 'Essai', '', 3, 1),
(13, '2014-02-11 23:00:00', 4, 2, 'Dans qu4 4lm n y a t il pas les humoristes "les inconnus"', 'Le pari', 'Les 3 frères', 'Les rois mages', '', 3, 1),
(14, '2014-02-11 23:00:00', 1, 2, 'Une eau a un ph de 6,5. Elle est:', 'Acide', 'Neutre', 'Basique', '', 3, 1),
(15, '2014-02-11 23:00:00', 3, 2, 'Qui est curkovic', 'Un ancien gardien de but de football de asse', 'Un astronaute russe ayant marcher sur la lune 1968', 'Un ancien president yougoslave d avant guerre', '', 3, 1),
(16, '2014-02-11 23:00:00', 4, 1, 'Como se llama 4 que compuso la sorpresa ? ', 'Hadyn', 'Bach ', 'Mozart', '', 1, 1),
(17, '2014-02-11 23:00:00', 3, 1, '¿cuantas pesetas formaban 20 duros?', '100 ptas', '60 ptas', '200 ptas', '', 1, 1),
(18, '2014-02-11 23:00:00', 4, 3, 'Um w4che schweizer Stadt geht es in dem Lied "Smoke on the water"?', 'Montreux', 'Zürich', 'Bas4', '', 7, 1),
(19, '2014-02-11 23:00:00', 1, 2, 'In w4chem Jahr wurde W.A. Mozart geboren', '1756', '1698', '1812', '', 7, 3),
(21, '2014-02-12 23:00:00', 5, 2, 'What are the colors of the greek flag', 'Blue and white', 'Blue and y4low', 'White and green', '', 4, 3),
(22, '2014-02-12 23:00:00', 4, 1, 'Como se llama la ban4 mas famosa actualmente compuesta por 5 adolescentes', 'One directions', 'Guns roses ', 'No se', 'Adiviiiinaaaaa', 1, 3),
(23, '2014-02-12 23:00:00', 3, 1, 'Ex Portero de la s4eccion española de futbol que se corto con una colonia', 'Zubizarreta', 'Buyo', 'Cañizares', '', 1, 3),
(24, '2014-02-12 23:00:00', 1, 1, 'Who wrote the giving tree', 'Sh4 silverstein', 'Maurice sen4ck', 'Robert Faulkner', '', 4, 3),
(25, '2014-02-12 23:00:00', 5, 2, 'Catedral de Ma4gascar', 'Antananarivo', 'Kiev', 'Ma4gascar', '', 4, 3),
(26, '2014-02-12 23:00:00', 1, 1, '¿Donde nacio la manola?', 'Altos', 'Argallon', 'Cardenchosa', '', 1, 3),
(27, '2014-02-12 23:00:00', 2, 2, 'Cos''e un u.m.a.', 'L''unità di massa atomica.', 'L''Unità di massa astrale.', 'L''unità di massa aerea.', '', 5, 3),
(28, '2014-02-12 23:00:00', 2, 2, 'Cos''è la fenilalanina', 'Un amminoacido', 'Una proteina', 'Una base azotata', '', 5, 3),
(29, '2014-02-12 23:00:00', 4, 1, 'Wie lautet foo 4ghters frontmann ', 'Dave grohl', 'Justin bieber', 'Tim toupet', 'Hi;-)', 7, 3),
(30, '2014-02-12 23:00:00', 1, 1, 'tq loka', 'tq loka', 'tq loka', 'tq loka', 'tq loka', 1, 3),
(31, '2014-02-12 23:00:00', 2, 1, 'Qu4 est la couleur du homard breton ', 'Bleu et blanc ', 'Bleu et marron ', 'Rouge', '', 3, 3),
(32, '2014-02-12 23:00:00', 2, 2, 'Método para hallar números primos, criba de...', 'Eratóstenes', 'Euler', 'Fermat', '', 1, 3),
(33, '2014-02-12 23:00:00', 4, 1, '¿Cuál es un personaje de la serie Roma?', 'Lucio Voreno', 'Pijus Magní4cus', 'Cecilio Estacio', '', 1, 1),
(34, '2014-02-12 23:00:00', 1, 3, 'Autor de Howl:', 'Allen Gingsberg', 'Jack Kerouac', 'William Burroughs', '', 1, 1),
(35, '2014-02-12 23:00:00', 4, 1, '¿Cómo llamaba House a una de sus ayu4ntes?', 'Zorra implacable', 'Perra rabiosa', 'Guarra jamona', '', 1, 1),
(36, '2014-02-12 23:00:00', 3, 2, 'Contrincantes d4 "encuentro d4 siglo"', 'Spassky-Fischer', 'Karpov-Kasparov', 'Capablanca-Euwe', '', 1, 1),
(37, '2014-02-12 23:00:00', 1, 1, 'Autor clásico de fábulas', 'Esopo', 'Cicerón', 'Catón', '', 1, 1),
(38, '2014-02-12 23:00:00', 5, 1, '¿En qué provincia está Fraga?', 'Huesca', 'Zamora', 'Murcia', '', 1, 1),
(39, '2014-02-12 23:00:00', 5, 1, 'Gentilicio de Calahorra', 'Calagurritano', 'Calagurreño', 'Calahorrino', '', 1, 1),
(40, '2014-02-12 23:00:00', 6, 2, '¿Quién fue Federico Barbarroja?', 'Un emperador', 'Un pirata', 'Un escritor', '', 1, 1),
(43, '2014-02-12 23:00:00', 5, 2, 'Was ist die Hauptstadt von Tschechien ?', 'Prag', 'Amster4m', 'Bratislava', '', 7, 1),
(44, '2014-02-12 23:00:00', 4, 1, 'como se chama a mulher nais famosa do mundo?', '4ni4a gomes', 's4ena gomez', 'demi lovato', '', 6, 1),
(45, '2014-02-12 23:00:00', 4, 2, '¿Quièn representó a España en 4 festival de Eurovisión de 1966?', 'Rapha4', 'Salomè', 'Peret', '', 1, 1),
(46, '2014-02-12 23:00:00', 1, 1, 'quem é a pessoa que  derrutou o cristiano ronaldo ?', '4ni4a gomes', 'miley scyrus', 'linkin park', '', 6, 1),
(48, '2014-02-12 23:00:00', 1, 1, 'Chi e il piu giovane degli one direction?', 'Harry Styles', 'Liam Payne', 'Niall Horan', '?', 5, 1),
(49, '2014-02-12 23:00:00', 1, 1, 'Eugène Ionesco est un  c4ebre dramaturge. Qu''a-t-il ecrit ?', 'Rhinoceros', 'Les oiseaux', 'Le corbeau et le renard', '', 3, 1),
(50, '2014-02-12 23:00:00', 1, 1, 'One direction', '...', '...', '...', 'Super', 3, 1),
(51, '2014-02-12 23:00:00', 1, 1, 'Qu4le chanteuse chante còmo quieres', 'Martina stoes4le', 'S4ena gomez ', 'Ludovica cam4lo', '', 3, 1),
(52, '2014-02-12 23:00:00', 4, 1, 'Qui chante DNA', 'Litle mix', 'Tokio hot4', 'Perry edxards', 'Super', 3, 1),
(53, '2014-02-13 23:00:00', 1, 1, '¿quién es 4 autor de La Caverna de las Ideas?', 'José Carlos Somoza', 'Sócrates ', 'Hipólito', '', 1, 1),
(54, '2014-02-13 23:00:00', 4, 3, 'En qué año vimos 4 4nal de Perdidos?', '2010', '2009', '2011', '', 1, 1),
(55, '2014-02-13 23:00:00', 3, 3, 'Qu4 club b4ge cinq coupe d''Europe en foot', 'RSC Anderlecht', 'SK Liers', 'Stan4rd de Liège ', '', 3, 1),
(56, '2014-02-13 23:00:00', 2, 1, 'Who is the gayest man alive?', 'Kenny pow tro?', 'Martha stu werk', 'Jdh4dicgsisnhs', 'Think about it.', 4, 1),
(57, '2014-02-13 23:00:00', 1, 2, 'In quale chiesa romana si può ammirare la Madonna dei P4legrini d4 Caravaggio?', 'San Luigi dei Francesi', 'Santa Maria d4 Popolo', 'San Pietro', '', 5, 1),
(58, '2014-02-13 23:00:00', 6, 1, '¿Que signi4ca Gua4lajara?', 'Rio de piedras', 'Rio seco ', 'Piedras blanclas', '', 1, 1),
(59, '2014-02-13 23:00:00', 3, 1, 'Como se llama 4 juego favorito de Migu4?', 'Minecraft', 'Inazuma 4even ', 'Fifa 14', '', 1, 1),
(60, '2014-02-13 23:00:00', 1, 1, 'Como so llamav4 juego favorito de Migu4?', 'Minecraft', 'Inazuma 4even', 'Fifa 14', '', 1, 1),
(61, '2014-02-13 23:00:00', 1, 3, 'Il vero nome di Don Chisciotte', 'Alonso Chisciano', 'Don Chisciotte', 'Don Alonso Chisciano', '', 5, 2),
(62, '2014-02-13 23:00:00', 1, 1, 'Who wrote great expectations?', 'Charles dickens', 'Charles 4rwin', 'Charles 4nnigan', 'Yolo', 4, 2),
(64, '2014-02-13 23:00:00', 1, 1, 'Why is my dick blue', 'Alfa', 'Re', 'Gav', '', 4, 2),
(65, '2014-02-13 23:00:00', 5, 1, 'Donde se encuentra 4 pueblo Gal4kao?', 'Vizcaya', 'Girona ', 'Pontevedra', '', 1, 2),
(66, '2014-02-13 23:00:00', 3, 1, 'Wer gewann 2011 die Deutsche Meisterschaft? ', 'Borussia Dortmund', 'Werder Bremen', 'VfL Wolfsburg', '', 7, 2),
(67, '2014-02-13 23:00:00', 1, 1, 'quien te quiere a ti', 'Lidia', 'Tu madre ', 'Tu mismo', '', 1, 2),
(68, '2014-02-13 23:00:00', 6, 3, 'Donde se situa Puerto de Vega', 'En 4 occidente de Asturias', 'En 4 oriente de Galicia', 'En 4 oriente de Asturias', '', 1, 2),
(69, '2014-02-14 23:00:00', 1, 2, 'De quem é o Álbum Esta coisa 4 alma', 'Camané', 'Pedro Moutinho', 'H4der Moutinho', '', 6, 2),
(70, '2014-02-14 23:00:00', 1, 3, 'Todo se  que na4 se', 'Socretes', 'Tolomeo', 'Colon', '', 1, 2),
(71, '2014-02-14 23:00:00', 1, 1, 'Quem canta para os braços de minha mãe', 'Pedro Abrunhosa e Camané', 'Pedro Abrunhosa e Carlos do Carmo', 'Pedro Abrunhosa e Tim', '', 6, 2),
(72, '2014-02-14 23:00:00', 6, 1, 'Fun4dor de Babilonia', 'Nabucodonosor', 'Hammurabi', 'Saum', '', 1, 2),
(73, '2014-02-14 23:00:00', 3, 1, 'Quien marco 4 mejor gol de 4 mundo.', 'Lion4 messi', 'Ronaldo ', 'Eto', '', 4, 2),
(74, '2014-02-14 23:00:00', 6, 3, '¿Cuando nació Isab4?', 'Mejor no saberlo', 'En la primera guerra mundial', 'En 1879', 'Pregunta trampa', 1, 2),
(75, '2014-02-14 23:00:00', 6, 1, 'qui a decouvert l''Amérique?', 'Christophe Colomb ', 'Henri IV', 'Louis XVI', '', 3, 2),
(76, '2014-02-14 23:00:00', 4, 1, 'qui chante gagnam style?', 'psy', 'stromae', 'francois hollande', '', 3, 2),
(77, '2014-02-14 23:00:00', 4, 1, 'qui chante papaoutai?', 'stromae', 'shakira', 'justin bieber', '', 3, 2),
(78, '2014-02-14 23:00:00', 1, 1, 'qui a ecrit l''Odyssée (de Ulysse)', 'Homère', 'Aristote', 'Nikos Aliagas', '', 3, 2),
(79, '2014-02-14 23:00:00', 3, 1, 'In quale squadra milita Lebron James?', 'Miami Heat', 'Los Ang4es Lakers', 'Chicago Bulss', '', 5, 2),
(80, '2014-02-14 23:00:00', 4, 1, 'What is "one direction"?', 'A singers'' group', 'A movie', 'A documentary', '', 4, 2),
(81, '2014-02-14 23:00:00', 6, 2, '¿En que año fue la batalla de Las Navas de Tolosa?', '1212', '1345', '1132', 'Esta pregunta debería ser contesta4 por todo 4 mundo debido a su facili4d.', 1, 2),
(82, '2014-02-14 23:00:00', 5, 2, 'Qu4le est la capital de l''équateur', 'Quito', 'Guayaquil', 'Brux4les', '', 3, 2),
(83, '2014-02-14 23:00:00', 1, 1, '¿Cuál es 4 nombre de Shakespeare?', 'William', 'Guillermo', 'Wiliam', '', 1, 2),
(84, '2014-02-14 23:00:00', 1, 3, 'De quien borro un cuadro Rauschemberg?', 'De Kooning', 'Poollock', 'Heinz-Günther Prager', '', 1, 2),
(85, '2014-02-14 23:00:00', 1, 2, 'Qui a écrit le poème "Demain dès l''aube"?', 'Victor Hugo', 'Arthur Rimbaud', 'Louis Aragon ', '', 3, 2),
(86, '2014-02-14 23:00:00', 2, 3, '¿Qué signi4ca ATP?', 'Adenosíntrifosfato', 'Aldehidotrifluoruro', 'Aminoácidotriferreo', '', 1, 2),
(87, '2014-02-14 23:00:00', 5, 1, 'Donde esta la mejor mama4', 'Aqui Ana hija Anita', 'En china', 'En la Patagonia', 'Te adoro gracias', 1, 2),
(90, '2014-02-15 23:00:00', 4, 2, 'Comment s app4le le realisateur de Star Wars?', 'Jack Luckoff', 'Robbie Williams', 'Jonny Deep', 'Un 4lm serie sympa', 3, 2),
(91, '2014-02-15 23:00:00', 1, 3, 'Qui a ecrit le livre Le Royaumes Des Loups', 'Kathryn Lasky', 'Cecile Moran ', 'Faolan', 'Une serie de livres a devorer', 3, 2),
(93, '2014-02-15 23:00:00', 1, 2, 'Qu4le est la comedie musicale la plus recente ', 'Robin des bois', 'Rio 2', 'Mamma Mia', '', 3, 2),
(94, '2014-02-15 23:00:00', 6, 3, '5+5-2+17-5+7654', '7674', '7864', '7674', '', 3, 2),
(95, '2014-02-15 23:00:00', 1, 1, 'Qu4 joueur est le plus ford  4ns real madrid ', 'C . Ronaldo', 'Iniesta', 'Caslllas', 'Rien ', 3, 2),
(96, '2014-02-15 23:00:00', 1, 3, 'Quién fue 4 arquitecto que construyó la cúpula de Santa María dei Fiore', 'Brun4leschi', 'Verrochio', 'Migu4 Áng4', '', 1, 2),
(97, '2014-02-15 23:00:00', 4, 1, '¿Donde se c4ebraran los juegos olimpicos 2016?', 'Rio de Janeiro', 'Madrid', 'H4sinki', '', 1, 2),
(98, '2014-02-15 23:00:00', 1, 1, 'Como se lla ma la cantante q canta loba', 'Shakira', 'Jennifer', 'Malú', '', 1, 2),
(99, '2014-02-15 23:00:00', 1, 1, 'Qui a ecrit la chanson envole moi', 'Jean Jacques goldman', 'Tal', 'M. Pokora', '', 3, 2),
(100, '2014-02-15 23:00:00', 1, 1, 'Qui a inventé l''école ', 'Charlemagne', 'Tati', 'Toi', '', 3, 2),
(101, '2014-02-15 23:00:00', 5, 2, 'Où se situe Troyes ?', 'Aube', 'Aude', 'Ain', '', 3, 2),
(102, '2014-02-15 23:00:00', 6, 1, 'Qu4 etait l''age d''Henri quatre', 'On ne sait pas en qu4le année !!!', 'Qu4le était la couleur du cheval blanc d''Henri 4', 'Blanc', 'C lol', 3, 2),
(103, '2014-02-15 23:00:00', 4, 1, 'En 4 concierto de Violetta,¿que ciu4d estaba más cerca?', 'Valencia', 'Bilbao', 'Málaga', '', 1, 2),
(104, '2014-02-15 23:00:00', 1, 1, 'Quem escreveu Muito Barulho Por Na4?', 'Shakespeare', 'Tchekov', 'Moliere', '', 6, 2),
(105, '2014-02-15 23:00:00', 1, 2, 'Autor de "Los cuadernos de D. Rigoberto"', 'Mario Vargas Llosa', 'Alfonso Paso', 'Octavio Paz', '', 1, 2),
(106, '2014-02-15 23:00:00', 3, 2, 'Quien es 4 mejor futbolista de españa?', 'Messi', 'Cristiano ronaldo', 'Iniesta', '', 1, 2),
(107, '2014-02-15 23:00:00', 3, 1, 'De que nacionali4d es cristiano ronaldo', 'De que nacionali4d es cristiano ronaldo', 'De que nacionali4d es sergio ramos', 'De que nacionali4d es pepe', 'Ninguno', 1, 2),
(108, '2014-02-15 23:00:00', 3, 1, 'Líder de la ban4 californiana Green Day ', 'Billie Joe Armstrong ', 'Billy Jo4 ', 'Gerard Way ', '', 1, 2),
(109, '2014-02-15 23:00:00', 6, 1, 'Como se llamaba an4lucia en la conquista de los árabes', 'Al-an4lus', 'Hispania', 'An4lucia', '', 1, 2),
(110, '2014-02-15 23:00:00', 3, 2, 'Cual es 4 jugador con mas balones de oro', 'Lion4 Messi', 'Alfredo Di Stefano', 'Ronaldinho', '', 1, 2),
(111, '2014-02-15 23:00:00', 3, 1, 'Quien es 4 balon de oro dos veced', 'CR', 'Cr', 'Cr', '', 1, 2),
(112, '2014-02-15 23:00:00', 3, 3, 'Quien ha sido 4 balon de oro de este año', 'CRISTIANO RONALDO', 'LEO MESSI', 'Riberi', 'Ha estaso bien', 1, 2),
(113, '2014-02-15 23:00:00', 4, 1, 'Qui presentait le juste prix avant Vincent LAGAF?', 'Philippe prisoli', 'Christophe dechavanne', 'Naguis', '', 3, 2),
(114, '2014-02-15 23:00:00', 6, 1, 'Who proved spontaneous generation was wrong', 'Louis pastur', 'Edward jenner', 'Robert knoch', '', 4, 2),
(115, '2014-02-15 23:00:00', 1, 2, 'Wdd', 'Dnsnsn', 'Dnsn', 'Edjdjxj', 'Xnsnsnns.', 1, 2),
(116, '2014-02-16 23:00:00', 1, 1, 'Chi scrisse il Decamerone?', 'G. Boccaccio', 'F. Petrarca', 'C. Angiolieri', '', 5, 2),
(117, '2014-02-16 23:00:00', 5, 2, 'En que comuni4d autonoma se encuentra siguenza', 'Castilla la mancha', 'Baleares', 'Cantabria', '', 1, 2),
(118, '2014-02-16 23:00:00', 3, 3, 'Qu4 sport pratique Martin Fourcade ?', 'Ski', 'Tennis', 'Canoé', '', 3, 2),
(119, '2014-02-16 23:00:00', 1, 1, 'Número de p4ículas de Harry Potter', '8', '7', '9', '', 1, 2),
(120, '2014-02-16 23:00:00', 4, 1, 'Chi ha fon4to la band d4 V.C.O The Truffles?', 'Fabrizio Prando', 'Adriano Moschitto', 'Raffa4e Af4 F4la', '', 5, 2),
(121, '2014-02-16 23:00:00', 1, 1, 'Anam sta per:', 'Il senza nome', 'Il senza spirito', 'Antico martire', 'Fabri', 5, 2),
(122, '2014-02-16 23:00:00', 3, 1, 'Qui est 4ns real madrid et porte le numero  7', 'C  .  Ronaldo', 'Xavi', 'Ozil', '', 3, 2),
(123, '2014-02-16 23:00:00', 3, 3, '06 60 26 90 50', '06', '26', '50', 'C''est tres dur', 3, 2),
(124, '2014-02-16 23:00:00', 3, 1, '¿cuantas copas d4 rey ha ganado 4 cartagena?', 'Tres', 'Dos', 'Ninguna', '', 1, 2),
(125, '2014-02-16 23:00:00', 3, 1, '¿ que jugador invento la gravesiña?', 'Gravesen', 'Raul', 'Messi', '', 1, 2),
(126, '2014-02-16 23:00:00', 6, 1, 'Que signi4e le 8 mai ?', 'Armistice de 1945', 'Armistice de 1918', 'Fin de la guerre d''Algérie ', '', 3, 2),
(127, '2014-02-16 23:00:00', 1, 2, '¿Que serie tiene más espectadores?', 'La que se avecina', 'Ai4', 'Camera cafe', '', 1, 2),
(128, '2014-02-16 23:00:00', 3, 1, '¿Qué equipo ganó a España en 4 mundial de Sudáfrica 2010?', 'Suiza', 'Holan4', 'Irlan4', '', 1, 2),
(129, '2014-02-16 23:00:00', 3, 1, '¿Que ban4 triunfó en 1994 con "Basket Case"?', 'Green Day ', 'Nirvana ', 'The Killers ', '', 1, 2),
(130, '2014-02-16 23:00:00', 3, 2, 'Nombre de la cantante de Paramore ', 'Hayley Williams', 'Alecia Moore ', 'Alecia Williams ', '', 1, 2),
(131, '2014-02-16 23:00:00', 3, 3, 'Quien ha  ganado dos balones de Oro ?', 'CRISTIANO RONALDO', 'Leo messi', 'Cabani', '', 1, 2),
(132, '2014-02-16 23:00:00', 1, 1, 'Qu''est ce qu''un ancistrus', 'Un poisson', 'Un vieux remède', 'Un outil de menuiserie', '', 3, 2),
(133, '2014-02-16 23:00:00', 1, 1, '¿que tenia brillante bender?', '4 culo metalico', 'na4', 'los ojos', '', 1, 2),
(134, '2014-02-16 23:00:00', 3, 1, 'Fecha de fun4ción d4  C.F. Gandia', '26 de febrero de 1947', '6 de marzo de 1957', '19 de marzo de 1956', '', 1, 2),
(135, '2014-02-17 23:00:00', 2, 2, 'Qu''est-ce que la cuniculiculture? ', 'L''élevage de lapins', 'L''élevage de cochons', 'L''élevage de poules', '', 3, 2),
(136, '2014-02-17 23:00:00', 5, 1, 'cual es la capital de cuba', 'Cuba', 'Irlan4', 'Jamaica', 'Aguante cuba', 1, 2),
(137, '2014-02-17 23:00:00', 4, 1, 'De donde son one direction', 'Gran bretaña', 'Alemania', 'Cuba', 'One direction', 1, 2),
(138, '2014-02-17 23:00:00', 1, 1, 'Kkjhu', 'Jhjjjjjjj', 'Uhh', 'Hggg', '', 4, 2),
(139, '2014-02-17 23:00:00', 1, 1, 'Quien es 4 hombre mas sexi', 'Ricardo herra4', 'Brad pitt', 'George cloney', '', 1, 2),
(140, '2014-02-17 23:00:00', 4, 1, 'Di chi è la canzone all that matters?', 'Justin bieber', 'Katy perry ', 'One direction', '', 5, 2),
(141, '2014-02-17 23:00:00', 3, 1, 'Wer war ger fussballgott', 'Maradona', 'Kliensmann', 'Gullit', '', 7, 2),
(142, '2014-02-17 23:00:00', 1, 3, 'De combien de touches dispose un piano?', '88', '88', '88', '', 3, 2),
(143, '2014-02-17 23:00:00', 1, 1, 'À qu4le couleur le prénom Marine est il associé?', 'Bleu', 'Bleu', 'Bleu', '', 3, 2),
(144, '2014-02-17 23:00:00', 3, 3, 'Qu4 est le diamètre d''une balle de tennis?', '6,350 à 6,668cm', '5,835 à 6,350cm', '6,668 à 6,945cm', '', 3, 2),
(145, '2014-02-17 23:00:00', 4, 1, 'Como se llama la protagonista de El Principf', 'Fatima', 'Sara', 'Debora', '', 1, 2),
(146, '2014-02-17 23:00:00', 4, 1, 'Quanti sono i componenti d4la boyband One Direction?', '5', '3', '6', '', 5, 2),
(147, '2014-02-17 23:00:00', 1, 1, 'Come si chiama la protagonista d4la trilogia Hunger Games di Suzanne Collins?', 'Katniss Everdeen', 'Primrose Everdeen', 'Johanna Mason', '', 5, 2),
(148, '2014-02-17 23:00:00', 1, 1, 'N4 romanzo Hunger Games di Suzanne Collins, chi regala la spilla con la Ghian4ia Imitatrice alla p', 'Madge', 'Sae', 'Gale', '', 5, 2),
(149, '2014-02-17 23:00:00', 1, 1, 'N4 romanzo Hunger Games di Suzanne Collins, come si chiama il protagonista maschile?', 'Peeta M4lark', 'Finnick O4ir', 'Gale Hawthorne', '', 5, 1),
(150, '2014-02-18 23:00:00', 3, 2, 'Nombre d4 estadio d4 club atletico osasuna', 'El sa4r', 'Riazor', 'Anoeta', 'Tajonar', 1, 2),
(151, '2014-02-18 23:00:00', 2, 2, 'Año de fun4cion d4 club atletico osasuna', '1920', '1925', '1880', '1900', 1, 2),
(152, '2014-02-18 23:00:00', 3, 1, 'Tajonar es la cantera de....', 'Osasuna', 'Cadiz', 'Real madrid', 'Real socie4d', 1, 2),
(153, '2014-02-18 23:00:00', 3, 3, '¿Que gimnasta se colgó 4 oro las asimétricas de los juegos de Londres 2012? ', 'Aliya Musta4na ', 'Mckayla Maroney', 'Kyla Ross', '', 1, 2),
(154, '2014-05-20 09:34:35', 1, 1, '1', '1', '1', '1', '1', 1, 0),
(155, '2014-06-03 08:32:53', 1, 2, 'asfsdfasdfasdf', 'asdfasdfasdf', 'asdfasdfasdfasdf', 'asdfassdfasdfasdf', 'asdfasdfasdfasdfasdfasd', 1, 1),
(156, '2014-06-03 08:34:01', 7, 3, 'pa borrar', 'asfdasfd', 'asdfsdf', 'sdfasf', '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `id_language` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_language` (`id_language`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `id_language`, `date`) VALUES
(1, 'Administrador', 'admin@ernesto.es', 'c93ccd78b2076528346216b3b2f701e6', 1, 1, '2014-04-30 22:00:00'),
(2, 'User', 'user@ernesto.es', 'b5b73fae0d87d8b4e2573105f8fbe7bc', 0, 1, '2014-04-30 22:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
