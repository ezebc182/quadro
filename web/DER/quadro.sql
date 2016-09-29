-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2016 a las 17:19:59
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `quadro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anexos`
--

CREATE TABLE `anexos` (
  `id` int(11) NOT NULL,
  `mueble_id` int(11) NOT NULL,
  `alto` float DEFAULT NULL,
  `ancho` float DEFAULT NULL,
  `profundidad` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `anexos`
--

INSERT INTO `anexos` (`id`, `mueble_id`, `alto`, `ancho`, `profundidad`) VALUES
(1, 31, 76, 90, 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `hexadecimal` varchar(7) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`, `nombre`, `hexadecimal`) VALUES
(1, 'marron', '#9C6000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_x_muebles`
--

CREATE TABLE `imagenes_x_muebles` (
  `id_imagen` int(11) NOT NULL,
  `mueble_id` int(11) NOT NULL,
  `tipo_imagen` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tamanio_imagen` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `path_imagen` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `imagenes_x_muebles`
--

INSERT INTO `imagenes_x_muebles` (`id_imagen`, `mueble_id`, `tipo_imagen`, `tamanio_imagen`, `path_imagen`) VALUES
(50, 17, 'jpg', '19009', 'images/files/Bibiliotecas/Teka/Imagen-mini.jpg'),
(51, 17, 'jpg', '444166', 'images/files/Bibiliotecas/Teka/Imagen.jpg'),
(52, 17, 'jpg', '27339', 'images/files/Bibiliotecas/Teka/Materiales-mini.jpg'),
(53, 17, 'jpg', '129557', 'images/files/Bibiliotecas/Teka/Materiales.jpg'),
(54, 17, 'jpg', '29649', 'images/files/Bibiliotecas/Teka/Plano-mini.jpg'),
(55, 17, 'jpg', '131492', 'images/files/Bibiliotecas/Teka/Plano.jpg'),
(56, 18, 'jpg', '20828', 'images/files/Bibiliotecas/Decline/Imagen-mini.jpg'),
(57, 18, 'jpg', '475217', 'images/files/Bibiliotecas/Decline/Imagen.jpg'),
(58, 18, 'jpg', '27339', 'images/files/Bibiliotecas/Decline/Materiales-mini.jpg'),
(59, 18, 'jpg', '129557', 'images/files/Bibiliotecas/Decline/Materiales.jpg'),
(60, 18, 'jpg', '31820', 'images/files/Bibiliotecas/Decline/Plano-mini.jpg'),
(61, 18, 'jpg', '163954', 'images/files/Bibiliotecas/Decline/Plano.jpg'),
(62, 19, 'jpg', '16839', 'images/files/Bibiliotecas/Boxes/Imagen-mini.jpg'),
(63, 19, 'jpg', '381283', 'images/files/Bibiliotecas/Boxes/Imagen.jpg'),
(64, 19, 'jpg', '33505', 'images/files/Bibiliotecas/Boxes/Materiales-mini.jpg'),
(65, 19, 'jpg', '156220', 'images/files/Bibiliotecas/Boxes/Materiales.jpg'),
(66, 19, 'jpg', '27716', 'images/files/Bibiliotecas/Boxes/Plano-mini.jpg'),
(67, 19, 'jpg', '129371', 'images/files/Bibiliotecas/Boxes/Plano.jpg'),
(68, 20, 'jpg', '17674', 'images/files/Bibiliotecas/Duo/Imagen-mini.jpg'),
(69, 20, 'jpg', '397535', 'images/files/Bibiliotecas/Duo/Imagen.jpg'),
(70, 20, 'jpg', '19129', 'images/files/Bibiliotecas/Duo/Materiales-mini.jpg'),
(71, 20, 'jpg', '96267', 'images/files/Bibiliotecas/Duo/Materiales.jpg'),
(72, 20, 'jpg', '29706', 'images/files/Bibiliotecas/Duo/Plano-mini.jpg'),
(73, 20, 'jpg', '128556', 'images/files/Bibiliotecas/Duo/Plano.jpg'),
(74, 21, 'jpg', '29923', 'images/files/Bibiliotecas/Drive/Imagen-mini.jpg'),
(75, 21, 'jpg', '762423', 'images/files/Bibiliotecas/Drive/Imagen.jpg'),
(76, 21, 'jpg', '19129', 'images/files/Bibiliotecas/Drive/Materiales-mini.jpg'),
(77, 21, 'jpg', '96267', 'images/files/Bibiliotecas/Drive/Materiales.jpg'),
(78, 21, 'jpg', '27521', 'images/files/Bibiliotecas/Drive/Plano-mini.jpg'),
(79, 21, 'jpg', '125147', 'images/files/Bibiliotecas/Drive/Plano.jpg'),
(80, 22, 'jpg', '12963', 'images/files/Escritorios/Sampler/Imagen-mini.jpg'),
(81, 22, 'jpg', '341004', 'images/files/Escritorios/Sampler/Imagen.jpg'),
(82, 22, 'jpg', '22043', 'images/files/Escritorios/Sampler/Materiales-mini.jpg'),
(83, 22, 'jpg', '93208', 'images/files/Escritorios/Sampler/Materiales.jpg'),
(84, 22, 'jpg', '16736', 'images/files/Escritorios/Sampler/Plano-mini.jpg'),
(85, 22, 'jpg', '90127', 'images/files/Escritorios/Sampler/Plano.jpg'),
(86, 23, 'jpg', '12810', 'images/files/Escritorios/Filter/Imagen-mini.jpg'),
(87, 23, 'jpg', '314404', 'images/files/Escritorios/Filter/Imagen.jpg'),
(88, 23, 'jpg', '41682', 'images/files/Escritorios/Filter/Materiales-mini.jpg'),
(89, 23, 'jpg', '198766', 'images/files/Escritorios/Filter/Materiales.jpg'),
(90, 23, 'jpg', '17952', 'images/files/Escritorios/Filter/Plano-mini.jpg'),
(91, 23, 'jpg', '92809', 'images/files/Escritorios/Filter/Plano.jpg'),
(92, 24, 'jpg', '19579', 'images/files/Escritorios/Adaptative/Imagen-mini.jpg'),
(93, 24, 'jpg', '612013', 'images/files/Escritorios/Adaptative/Imagen.jpg'),
(94, 24, 'jpg', '17741', 'images/files/Escritorios/Adaptative/Materiales-mini.jpg'),
(95, 24, 'jpg', '83318', 'images/files/Escritorios/Adaptative/Materiales.jpg'),
(96, 24, 'jpg', '19137', 'images/files/Escritorios/Adaptative/Plano-mini.jpg'),
(97, 24, 'jpg', '101645', 'images/files/Escritorios/Adaptative/Plano.jpg'),
(98, 25, 'jpg', '11516', 'images/files/Escritorios/Desk/Imagen-mini.jpg'),
(99, 25, 'jpg', '308777', 'images/files/Escritorios/Desk/Imagen.jpg'),
(100, 25, 'jpg', '22043', 'images/files/Escritorios/Desk/Materiales-mini.jpg'),
(101, 25, 'jpg', '93208', 'images/files/Escritorios/Desk/Materiales.jpg'),
(102, 25, 'jpg', '17931', 'images/files/Escritorios/Desk/Plano-mini.jpg'),
(103, 25, 'jpg', '92728', 'images/files/Escritorios/Desk/Plano.jpg'),
(104, 31, 'jpg', '21484', 'images/files/Escritorios/Bariens/Imagen-mini.jpg'),
(105, 31, 'jpg', '606399', 'images/files/Escritorios/Bariens/Imagen.jpg'),
(106, 31, 'jpg', '35618', 'images/files/Escritorios/Bariens/Materiales-mini.jpg'),
(107, 31, 'jpg', '166566', 'images/files/Escritorios/Bariens/Materiales.jpg'),
(108, 31, 'jpg', '20810', 'images/files/Escritorios/Bariens/Plano-mini.jpg'),
(109, 31, 'jpg', '108540', 'images/files/Escritorios/Bariens/Plano.jpg'),
(112, 2, NULL, 'jpg', 'images/files/Mesas bajas/Cubic/Imagen.jpg'),
(113, 2, NULL, NULL, 'images/files/Mesas bajas/Cubic/Imagen-mini.jpg'),
(114, 2, NULL, NULL, 'images/files/Mesas bajas/Cubic/Materiales.jpg'),
(115, 2, NULL, NULL, 'images/files/Mesas bajas/Cubic/Plano.jpg'),
(116, 3, NULL, NULL, 'images/files/Mesas bajas/Line/Imagen.jpg'),
(117, 3, NULL, NULL, 'images/files/Mesas bajas/Line/Imagen-mini.jpg'),
(120, 3, NULL, NULL, 'images/files/Mesas bajas/Line/Plano.jpg'),
(121, 3, NULL, NULL, 'images/files/Mesas bajas/Line/Materiales.jpg'),
(122, 4, NULL, NULL, 'images/files/Mesas bajas/Compact/Imagen.jpg'),
(123, 4, NULL, NULL, 'images/files/Mesas bajas/Compact/Imagen-mini.jpg'),
(124, 4, NULL, NULL, 'images/files/Mesas bajas/Compact/Materiales.jpg'),
(125, 4, NULL, NULL, 'images/files/Mesas bajas/Compact/Plano.jpg'),
(126, 5, NULL, NULL, 'images/files/Mesas bajas/Cave/Imagen.jpg'),
(127, 5, NULL, NULL, 'images/files/Mesas bajas/Cave/Imagen-mini.jpg'),
(128, 5, NULL, NULL, 'images/files/Mesas bajas/Cave/Materiales.jpg'),
(129, 5, NULL, NULL, 'images/files/Mesas bajas/Cave/Plano.jpg'),
(130, 6, NULL, NULL, 'images/files/Mesas bajas/Square/Imagen.jpg'),
(131, 6, NULL, NULL, 'images/files/Mesas bajas/Square/Imagen-mini.jpg'),
(132, 6, NULL, NULL, 'images/files/Mesas bajas/Square/Materiales.jpg'),
(133, 6, NULL, NULL, 'images/files/Mesas bajas/Square/Plano.jpg'),
(134, 7, NULL, NULL, 'images/files/Mesas Comedor/Density/Imagen.jpg'),
(135, 7, NULL, NULL, 'images/files/Mesas Comedor/Density/Imagen-mini.jpg'),
(136, 7, NULL, NULL, 'images/files/Mesas Comedor/Density/Materiales.jpg'),
(137, 7, NULL, NULL, 'images/files/Mesas Comedor/Density/Plano.jpg'),
(138, 8, NULL, NULL, 'images/files/Mesas Comedor/Obscure/Imagen.jpg'),
(139, 8, NULL, NULL, 'images/files/Mesas bajas/Obscure/Imagen-mini.jpg'),
(140, 8, NULL, NULL, 'images/files/Mesas Comedor/Obscure/Materiales.jpg'),
(141, 8, NULL, NULL, 'images/files/Mesas Comedor/Obscure/Plano.jpg'),
(142, 9, NULL, NULL, 'images/files/Mesas Comedor/Point/Imagen.jpg'),
(143, 9, NULL, NULL, 'images/files/Mesas Comedor/Point/Imagen-mini.jpg'),
(144, 9, NULL, NULL, 'images/files/Mesas Comedor/Point/Materiales.jpg'),
(145, 9, NULL, NULL, 'images/files/Mesas Comedor/Point/Plano.jpg'),
(146, 10, NULL, NULL, 'images/files/Mesas de luz/Plate/Imagen.jpg'),
(147, 10, NULL, NULL, 'images/files/Mesas de luz/Plate/Imagen-mini.jpg'),
(148, 10, NULL, NULL, 'images/files/Mesas de luz/Plate/Materiales.jpg'),
(149, 10, NULL, NULL, 'images/files/Mesas de luz/Plate/Plano.jpg'),
(150, 11, NULL, NULL, 'images/files/Mesas de luz/Quadrate/Imagen.jpg'),
(151, 11, NULL, NULL, 'images/files/Mesas de luz/Quadrate/Imagen-mini.jpg'),
(152, 11, NULL, NULL, 'images/files/Mesas de luz/Quadrate/Materiales.jpg'),
(153, 11, NULL, NULL, 'images/files/Mesas de luz/Quadrate/Plano.jpg'),
(154, 12, NULL, NULL, 'images/files/Muebles TV/Cavity/Imagen.jpg'),
(155, 12, NULL, NULL, 'images/files/Muebles TV/Cavity/Imagen-mini.jpg'),
(156, 12, NULL, NULL, 'images/files/Muebles TV/Cavity/Materiales.jpg'),
(157, 12, NULL, NULL, 'images/files/Muebles TV/Cavity/Plano.jpg'),
(158, 13, NULL, NULL, 'images/files/Muebles TV/Linear/Imagen.jpg'),
(159, 13, NULL, NULL, 'images/files/Muebles TV/Linear/Imagen-mini.jpg'),
(160, 13, NULL, NULL, 'images/files/Muebles TV/Linear/Plano.jpg'),
(161, 13, NULL, NULL, 'images/files/Muebles TV/Linear/Materiales.jpg'),
(162, 14, NULL, NULL, 'images/files/Muebles TV/Scale/Imagen.jpg'),
(163, 14, NULL, NULL, 'images/files/Muebles TV/Scale/Imagen.jpg'),
(164, 14, NULL, NULL, 'images/files/Mesas TV/Scale/Materiales.jpg'),
(165, 14, NULL, NULL, 'images/files/Muebles TV/Scale/Plano.jpg'),
(166, 15, NULL, NULL, 'images/files/Muebles TV/Box/Imagen.jpg'),
(167, 15, NULL, NULL, 'images/files/Muebles TV/Box/Imagen-mini.jpg'),
(168, 15, NULL, NULL, 'images/files/Muebles TV/Box/Materiales.jpg'),
(169, 15, NULL, NULL, 'images/files/Muebles TV/Box/Plano.jpg'),
(170, 16, NULL, NULL, 'images/files/Muebles TV/Cosmos/Imagen.jpg'),
(171, 16, NULL, NULL, 'images/files/Muebles TV/Cosmos/Imagen-mini.jpg'),
(172, 16, NULL, NULL, 'images/files/Muebles TV/Cosmos/Plano.jpg'),
(173, 16, NULL, NULL, 'images/files/Muebles TV/Cosmos/Materiales.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `id` int(11) NOT NULL,
  `alto` float NOT NULL,
  `ancho` float NOT NULL,
  `profundidad` float NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muebles`
--

CREATE TABLE `muebles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo_mueble_id` int(11) NOT NULL,
  `alto` float DEFAULT NULL,
  `ancho` float DEFAULT NULL,
  `profundidad` float DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `materiales` varchar(150) COLLATE utf8_spanish2_ci DEFAULT 'Sin datos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `muebles`
--

INSERT INTO `muebles` (`id`, `nombre`, `fecha_alta`, `fecha_baja`, `descripcion`, `tipo_mueble_id`, `alto`, `ancho`, `profundidad`, `precio`, `materiales`) VALUES
(2, 'Cubic', '2015-07-11 19:06:42', NULL, 'Mesa baja conformada por dos vol&uacutemenes puros que conforman un atractivo conjunto. Realizada en melamina sobre MDF con dos cajones laterales.', 1, 27, 80, 80, 3500, 'Melamina negra sobre MDF.'),
(3, 'Line', '2015-07-11 19:06:42', NULL, 'La simplicidad y el car&aacutecter hacen que Line se adapte a cualquier disposici&oacuten y espacio. Realizada en madera maciza con tratamiento de laca blanca satinada.', 1, 40, 50, 80, 3200, 'Madera maciza con terminacion de laca satinada.'),
(4, 'Compact', '2015-07-11 19:06:42', NULL, 'Compact se caracteriza por la armon&iacutea de sus materiales y el equilibrio de sus vol&uacutemenes. Realizada en una combinaci&oacuten de melaminas sobre MDF. ', 1, 40, 52, 92, 3000, 'Melamina blanca (sobre MDF) en apoyos y Roble Dakar o Ebano negro en estantes.'),
(5, 'Cave', '2015-07-11 19:06:42', NULL, 'Cave nos ofrece una soluci&oacuten perfecta para nuestro living combinando vol&uacutemenes puros con la liviandad del vidrio. ', 1, 40, 50, 90, 3400, 'Melamina blanca y negra (sobre MDF) y estante de vidrio.'),
(6, 'Square', '2015-07-11 19:06:42', NULL, 'Caracterizada por sus lineas puras y su arm&oacutenica combinaci&oacuten de materiales Square se adapta a las necesidades de cualquier espacio. ', 1, 30, 50, 85, 2900, 'Melamina negra (sobre MDF) y roble dakar, ebano negro o haya (sobre MDF).'),
(7, 'Density', '2015-07-11 19:06:42', NULL, 'Density es una mesa que se destaca por su sencillez formal y estructural. Realizada en distintas opciones de melamina sobre MDF permitiendo asi su adaptaci&oacuten a distintos espacios.', 2, 80, 90, 160, 4400, 'Melamina Roble Dakar, Roble español o Ebano negro sobre MDF.'),
(8, 'Obscure', '2015-07-11 19:06:42', NULL, 'Obscure es una mesa que se destaca por el contraste arm&oacutenico generado por sus apoyos de madera maciza y su tapa de melamina negra.', 2, 80, 90, 150, 5900, 'Apoyos en madera maciza Guatambu y tapa de melamina negra sobre MDF.'),
(9, 'Point', '2015-07-11 19:06:42', NULL, 'Con formas puras y simples, Point se adapta de manera armoniosa a cualquier tipo de ambiente y disposici&oacuten.', 2, 83, 130, 130, 3800, 'Melamina Roble Dakar o Ebano negro sobre MDF y base de apoyo en melamina negra.'),
(10, 'Plate', '2015-07-11 19:06:42', NULL, 'Por su forma y composici&oacuten Plate permite organizar y guardar objetos de manera sencilla. Realizado en melamina sobre MDF con un caj&oacuten y dos estantes.', 3, 55, 55, 40, 1500, 'Melamina blanca o negra sobre MDF.'),
(11, 'Quadrate', '2015-07-11 19:06:42', NULL, 'La perfecta combinaci&oacuten de planos y vol&uacutemenes conforman Quadrate, una mesa de luz que se destaca por su est&eacutetica y funcionalidad. ', 3, 55, 45, 35, 1400, 'Melamina Roble Dakar, Ebano negro o Haya sobre MDF.'),
(12, 'Cavity', '2015-07-11 19:06:42', NULL, 'Mueble de TV que sorprende por su simplicidad. Su composici&oacuten morfol&oacutegica convierte a Cavity en un mueble elegante. Posee un amplio caj&oacuten de guardado.', 4, 40, 160, 40, 4100, 'Melamina blanca sobre MDF.'),
(13, 'Linear', '2015-07-11 19:06:42', NULL, 'Su principal caracter&iacutestica es la simplicidad en sus lineas y el equilibrio en su composici&oacuten. Posee dos cajones de guardado.', 4, 30, 200, 45, 3800, 'Melamina negra y blanca sobre MDF.'),
(14, 'Scale', '2015-07-11 19:06:42', NULL, 'Con lineas rectas y una definida geometr&iacutea Scale se apodera del espacio y lo potencia. Posee dos amplios cajones.', 4, 40, 230, 50, 5000, 'Melamina blanca sobre MDF.'),
(15, 'Box', '2015-07-11 19:06:42', NULL, 'Por su pureza y equilibrio, Box se adapta de manera armoniosa a cualquier espacio. Posee dos amplios cajones.', 4, 35, 150, 40, 3700, 'Melamina negra y blanca sobre MDF.'),
(16, 'Cosmos', '2015-07-11 19:06:42', NULL, 'Cosmos ofrece una nueva propuesta por su aspecto moderno y funcional. Posee dos amplios cajones.', 4, 42, 200, 40, 4700, 'Melamina negra sobre MDF.'),
(17, 'Teka', '2015-07-25 21:31:42', NULL, 'Teka es una biblioteca que se destaca por su simplicidad. Es realizada en distintas opciones de melamina sobre MDF permitiendo asi su adaptación a distintos espacios.', 5, 180, 160, 35, 7500, 'Roble Dakar o Ebano negro.'),
(18, 'Decline', '2015-07-25 22:37:39', NULL, 'Decline es una moderna biblioteca que se destaca por sus inovadoras diagonales. La terminacion en Melamina Roble Dakar o Ebano negro junto con sus diagonales hacen de esta biblioteca un mueble unico.', 5, 180, 160, 35, 8200, 'Roble Dakar o Ebano negro.'),
(19, 'Boxes', '2015-07-25 22:42:47', NULL, 'Boxes ademas de contar con comodos espacios para libros y adornos cuenta con 4 cajones y un gran nicho para Tv.Boxes se adapta a multiples terminaciones, especialmente maderas oscuras, pude variar de una Melamina MDF negra a Roble dakar o Ebano negro.', 5, 180, 160, 35, 8900, 'Melamina negra sobre MDF, Roble Dakar o Ebano negro'),
(20, 'Duo', '2015-07-25 22:52:38', NULL, 'Duo tiene una gran capacidad de adaptacion a los diferentes espacios permitiendo tanto el guardado de libros como tambien la exposicion de otros ojetos de decoracion. ', 5, 180, 160, 35, 8200, 'Melamina negra sobre MDF.'),
(21, 'Drive', '2015-07-25 23:00:08', NULL, 'Dive ofrece variedad de usos ademas de su simpleza y adaptacion a diferentes sectores del hogar.', 5, 180, 160, 35, 8800, 'Melamina negra sobre MDF, cuenta con dos puertas de vidrio.'),
(22, 'Sampler', '2015-07-25 23:03:33', NULL, 'Sampler es un escritorio de caracteristicas modernas ideal para el hogar. Se destaca por su simplicidad y pureza especialmente en su version de Melamina Blanca en combinacion con melemina Gris.', 6, 75, 120, 70, 2900, 'Melamina blanca y Melamina gris sobre MDF'),
(23, 'Filter', '2015-07-25 23:21:23', NULL, 'Filter es un escritorio de caracteristicas modernas y gran tamaño, posee ademas 2 cajones.Brinda mayor superficie que un escritorio estandar lo que lo hace un producto distinto en su tipo.', 6, 76, 150, 70, 3700, 'Melamina Roble Dakar, Ebano negro, Roble Español o Haya sobre MDF.'),
(24, 'Adaptative', '2015-07-25 23:26:04', NULL, 'Adaptative es un excelente escritorio de caracteristicas modernas que cuenta con 4 cajones.', 6, 77, 150, 70, 4900, 'Melamina blanca, puede ir en combinacion con melamina de cualquier color en sus cajoneras.'),
(25, 'Desk', '2015-07-25 23:30:17', NULL, 'Desk es un escritorio moderno que se destaca por su elegancia y personalidad.', 6, 75, 120, 70, 3300, 'Melamina blanca y Melamina gris sobre MDF.'),
(31, 'Bariens', '2015-07-26 02:52:23', NULL, 'Bariens es un escritorio de dos modulos ideal para uso de pc, cuenta con 2 cajones y un anexo para su mayor comodidad.', 6, 76, 120, 70, 5900, 'Melamina Roble Dakar, Ebano negro o Haya sobre MDF en combinacion con melamina gris.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentaciones`
--

CREATE TABLE `presentaciones` (
  `mueble_id` int(11) NOT NULL DEFAULT '0',
  `color_id` int(11) NOT NULL DEFAULT '0',
  `medida_id` int(11) NOT NULL DEFAULT '0',
  `precio` float DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_muebles`
--

CREATE TABLE `tipo_muebles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_muebles`
--

INSERT INTO `tipo_muebles` (`id`, `nombre`) VALUES
(1, 'Mesas bajas'),
(2, 'Mesas comedor'),
(3, 'Mesas de luz'),
(4, 'Muebles TV'),
(5, 'Bibiliotecas'),
(6, 'Escritorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `fecha_alta`, `fecha_baja`) VALUES
(1, 'admin', '601f1889667efaebb33b8c12572835da3f027f78', '2016-09-21 12:43:12', NULL),
(2, 'admin', '601f1889667efaebb33b8c12572835da3f027f78', '2016-09-21 12:43:40', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anexos`
--
ALTER TABLE `anexos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_anexo_mueble` (`mueble_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes_x_muebles`
--
ALTER TABLE `imagenes_x_muebles`
  ADD PRIMARY KEY (`id_imagen`,`mueble_id`),
  ADD KEY `fk_ixm_mueble` (`mueble_id`);

--
-- Indices de la tabla `muebles`
--
ALTER TABLE `muebles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_mueble_id` (`tipo_mueble_id`);

--
-- Indices de la tabla `tipo_muebles`
--
ALTER TABLE `tipo_muebles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `imagenes_x_muebles`
--
ALTER TABLE `imagenes_x_muebles`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT de la tabla `muebles`
--
ALTER TABLE `muebles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `tipo_muebles`
--
ALTER TABLE `tipo_muebles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anexos`
--
ALTER TABLE `anexos`
  ADD CONSTRAINT `anexos_ibfk_1` FOREIGN KEY (`mueble_id`) REFERENCES `muebles` (`id`);

--
-- Filtros para la tabla `imagenes_x_muebles`
--
ALTER TABLE `imagenes_x_muebles`
  ADD CONSTRAINT `imagenes_x_muebles_ibfk_1` FOREIGN KEY (`mueble_id`) REFERENCES `muebles` (`id`);

--
-- Filtros para la tabla `muebles`
--
ALTER TABLE `muebles`
  ADD CONSTRAINT `muebles_ibfk_1` FOREIGN KEY (`tipo_mueble_id`) REFERENCES `tipo_muebles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
