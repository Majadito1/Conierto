-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 04:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `concierto`
--

-- --------------------------------------------------------

--
-- Table structure for table `arena`
--

CREATE TABLE `arena` (
  `id` int(11) NOT NULL,
  `teatro_id` int(11) DEFAULT NULL,
  `nombre_arena` varchar(50) DEFAULT NULL,
  `asientos` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `arena`
--

INSERT INTO `arena` (`id`, `teatro_id`, `nombre_arena`, `asientos`, `precio`) VALUES
(5, 3, ' 1', 50, 70),
(6, 3, '2', 15, 60),
(7, 4, '3', 20, 75),
(8, 14, '4', 34, 120),
(9, 3, '5', 30, 70);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `book_id` varchar(20) NOT NULL,
  `ticket_id` varchar(30) NOT NULL,
  `estadio_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `arena_id` int(11) DEFAULT NULL,
  `nro_asientos` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_ticket` date DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`book_id`, `ticket_id`, `estadio_id`, `user_id`, `show_id`, `arena_id`, `nro_asientos`, `cantidad`, `fecha_ticket`, `fecha`, `estado`) VALUES
('BKID5706817', 'TICKID3168151', 14, 24, 12, 7, 1, 75, '2018-07-06', '2018-06-23', 1),
('BKID6103677', 'TICKID4386894', 3, 30, 10, 5, 1, 70, '2018-07-01', '2023-04-02', 1),
('BKID8514733', 'TICKID6388831', 3, 31, 10, 5, 1, 70, '2023-07-25', '2023-04-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `concierto`
--

CREATE TABLE `concierto` (
  `concierto_id` int(11) NOT NULL,
  `estadio_id` int(11) DEFAULT NULL,
  `nombre_concierto` varchar(100) DEFAULT NULL,
  `artista` varchar(100) DEFAULT NULL,
  `desc` varchar(1000) NOT NULL,
  `fecha_debut` date DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `concierto`
--

INSERT INTO `concierto` (`concierto_id`, `estadio_id`, `nombre_concierto`, `artista`, `desc`, `fecha_debut`, `imagen`, `estado`) VALUES
(1, 3, 'The Eras Tour', 'Taylor Swift', '\r\nTaylor Alison Swift (Pensilvania, 1989), es una cantante, compositora y actriz estadounidense y una de las artistas con mayores ventas discográficas del mundo, más de 50 millones de álbumes y 150 millones de descargas digitales.', '2021-05-01', 'images/swift.jpg', 0),
(2, 4, 'Black Pink\r\n', 'Jennie Kim, Lalisa Manobal, Jisoo Kim, Rose', 'Blackpink,es un grupo femenino surcoreano formado por la empresa YG Entertainment, el 8 de agosto 2016 en Seúl, Corea del Sur. Está conformado por Jisoo, Jennie, Rosé y Lisa. El grupo saltó a la escena musical con su EP \"Square One\" de 2016.', '2022-07-11', 'images/bp.jpg', 0),
(3, 14, 'Twice', 'Nayeon, Jeongyeon, Momo, Sana, Jihyo, Mina, Dahyun, Chaeyoung y Tzuyu', 'TWICE debutó el 20 de octubre de 2015) es un grupo de chicas de Corea del Sur de nueve miembros formado a través del programa de supervivencia Sixteen bajo JYP Entertainment.\r\n', '2023-03-17', 'images/twice.jpg', 0),
(8, 3, 'R to V', 'Red Velvet: Joy, Wendy, Irene, Seulgi, Yeri', 'Red Velvet es un grupo de chicas formado por SM Entertainment en 2014. El debut oficial del grupo fue el 4 de agosto de 2014 con el lanzamiento del sencillo \"Happiness\". El primer miniálbum, Ice Cream Cake, obtuvo el primer lugar en la lista Gaon Chart. Y los siguientes EPs, The Velvet (2015), Russian Roulette (2016) y Rookie (2017) obtuvieron un éxito similar. Red Velvet recibió varios premios por su música, coreografía y popularidad, incluyendo un Golden Disk como \"Premio al nuevo artista\" y un Melon Music a la \"Mejor coreografía femenina\" en 2015.', '2023-02-19', 'images/redvelvet.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `estadio`
--

CREATE TABLE `estadio` (
  `id` int(11) NOT NULL,
  `nombre_estadio` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `estadio`
--

INSERT INTO `estadio` (`id`, `nombre_estadio`, `direccion`, `pais`, `ciudad`) VALUES
(3, 'Tahuichi', 'No me ubico', 'LATAM', 'Santa Cruz'),
(4, 'Estadio Azteca', 'Barrio en Mexico', 'Mexico', 'Ciudad de Mexico'),
(8, 'Estadio Univalle', 'Campus Santa Cruz', 'Bolivia', 'Santa Cruz');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `contrasenha` varchar(50) DEFAULT NULL,
  `tipo_usuario` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_id`, `usuario`, `contrasenha`, `tipo_usuario`) VALUES
(42, 28, 'ts@hotmail.com', 'ts', 0),
(43, 29, 'aa@123.com', '1234567', 0),
(44, 30, 'bbb@123.com', '1234567', 0),
(45, 31, 'aa@123.com', '12345678', 0),
(46, 32, 'edwin@h.com', '1234567', 0);

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `noombre` varchar(100) DEFAULT NULL,
  `artista` varchar(100) DEFAULT NULL,
  `fecha_noticias` date DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`id`, `noombre`, `artista`, `fecha_noticias`, `descripcion`, `imagen`) VALUES
(3, 'Black Pink\r\n', 'Jisoo', '2023-03-31', 'Jisoo hizo su debut como solista!\r\n\r\n\r\n', 'new/jisoo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registro`
--

CREATE TABLE `registro` (
  `user_id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `totalPagar` decimal(8,2) DEFAULT NULL,
  `ultimaActualizacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registro`
--

INSERT INTO `registro` (`user_id`, `nombre`, `email`, `telefono`, `edad`, `genero`, `totalPagar`, `ultimaActualizacion`) VALUES
(28, 'ts', 'ts@hotmail.com', '6940000000', 12, 'Male', '1600.00', '2018-06-25 16:34:13'),
(29, 'n', 'aa@123.com', '6940000000', 20, 'Male', '500.00', '0000-00-00 00:00:00'),
(30, 'bb', 'bbb@123.com', '6940000000', 20, 'Masculino', '360.00', '2023-04-03 02:34:30'),
(31, 'n', 'aa@123.com', '6940000000', 20, 'Femenino', '430.00', '2023-04-10 13:45:02'),
(32, 'Edwin', 'edwin@h.com', '6940000000', 35, 'Masculino', '500.00', '2023-04-10 14:09:43');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `show_id` int(11) DEFAULT NULL,
  `fecha_id` int(11) DEFAULT NULL,
  `estadio_id` int(11) DEFAULT NULL,
  `condierto_id` int(11) DEFAULT NULL,
  `fecha_comienzo` date DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `estado_r` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`show_id`, `fecha_id`, `estadio_id`, `condierto_id`, `fecha_comienzo`, `estado`, `estado_r`) VALUES
(10, 1, 3, 1, '2018-05-01', 1, 1),
(11, 2, 4, 2, '2018-06-01', 1, 1),
(12, 3, 14, 3, '2018-07-01', 1, 1),
(13, 4, 3, 8, '2018-08-01', 1, 1),
(14, 5, 4, 14, '2018-09-01', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `show_fecha`
--

CREATE TABLE `show_fecha` (
  `fecha_id` int(11) NOT NULL,
  `arena_id` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `hora_comienzo` time DEFAULT NULL,
  `fecha_show` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `show_fecha`
--

INSERT INTO `show_fecha` (`fecha_id`, `arena_id`, `nombre`, `hora_comienzo`, `fecha_show`) VALUES
(1, 5, 'Rock', '12:00:00', '2023-07-25'),
(2, 6, 'Rock', '16:00:00', '2023-10-24'),
(3, 7, 'Rock', '18:00:00', '2023-05-31'),
(4, 8, 'Rock', '21:00:00', '2023-11-03'),
(5, 9, 'Rock', '20:00:00', '2018-07-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arena`
--
ALTER TABLE `arena`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `concierto`
--
ALTER TABLE `concierto`
  ADD PRIMARY KEY (`concierto_id`);

--
-- Indexes for table `estadio`
--
ALTER TABLE `estadio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `show_fecha`
--
ALTER TABLE `show_fecha`
  ADD PRIMARY KEY (`fecha_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estadio`
--
ALTER TABLE `estadio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `registro`
--
ALTER TABLE `registro`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
