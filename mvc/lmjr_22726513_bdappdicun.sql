-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-12-2019 a las 23:33:58
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lmjr_22726513_bdappdicun`
--
CREATE DATABASE IF NOT EXISTS `lmjr_22726513_bdappdicun` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `lmjr_22726513_bdappdicun`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--
-- Creación: 19-11-2018 a las 03:10:59
--

CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL COMMENT 'id del administrador',
  `email_adm` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'correo administrador',
  `pass_admin` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'contraseña',
  `nombre_completo` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre completo del administrador',
  `usuario_admin` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre del usuario',
  `tel_admin` int(50) NOT NULL COMMENT 'telefono administrador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `administradores`:
--

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_admin`, `email_adm`, `pass_admin`, `nombre_completo`, `usuario_admin`, `tel_admin`) VALUES
(1, 'ranndy-90@hotmail.com', 'Ra1234', 'Ranndy Salas Umana', 'ad_Ranndy', 86133055);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--
-- Creación: 08-12-2018 a las 03:41:59
--

CREATE TABLE `empresa` (
  `id_emp` int(11) NOT NULL COMMENT 'id empresa',
  `nomb_emp` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre empresa',
  `email_emp` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'correo empresa',
  `pass_emp` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Password de la Empresa',
  `num_emp` varchar(8) COLLATE utf8_spanish_ci NOT NULL COMMENT 'primer numero',
  `num2_emp` varchar(8) COLLATE utf8_spanish_ci DEFAULT '0' COMMENT 'segundo numero',
  `repre_emp` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'representante',
  `cat_emp` varchar(50) COLLATE utf8_spanish_ci DEFAULT 'Gratuito' COMMENT 'categoria de la empresa si es de Paga o Gratuita',
  `pais_emp` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Pais donde Reside la Empresa',
  `prov_emp` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Provincia donde Reside la Empresa',
  `cant_emp` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Cantón donde Reside la Empresa',
  `dist_emp` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Distrito donde Reside la Empresa',
  `dirc_emp` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Dirección donde Reside la Empresa',
  `codpos_emp` varchar(5) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Código Postal donde Reside la Empresa',
  `lat_emp` varchar(11) COLLATE utf8_spanish_ci NOT NULL COMMENT 'latitud maps',
  `long_emp` varchar(11) COLLATE utf8_spanish_ci NOT NULL COMMENT 'longitud maps',
  `logo_emp` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Dirección donde esta el logo de la Empresa',
  `img_emp` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'imagen empresa',
  `stats_emp` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'estatus ',
  `fech_Reg_emp` date NOT NULL COMMENT 'fehca de registro de la Empresa',
  `fech_login_emp` date DEFAULT NULL COMMENT 'fecha del ultimo Login de la empresa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `empresa`:
--

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_emp`, `nomb_emp`, `email_emp`, `pass_emp`, `num_emp`, `num2_emp`, `repre_emp`, `cat_emp`, `pais_emp`, `prov_emp`, `cant_emp`, `dist_emp`, `dirc_emp`, `codpos_emp`, `lat_emp`, `long_emp`, `logo_emp`, `img_emp`, `stats_emp`, `fech_Reg_emp`, `fech_login_emp`) VALUES
(6, 'AppDicun', 'admin@appdicun.com', '$2a$07$asxx54ahjppf45sd87a5aujSV2PYqqi3qMqgWtNJTof32wMUZCChi', '12345678', '12345678', 'Ranndy Salas UmaÃ±a', 'Gratuito', 'COSTA RICA', 'SAN JOSÃ‰', 'PERÃ‰Z ZELEDÃ“N', 'DANIEL FLORES', 'FRENTE A PLAZA MONTE GENERAL', '65432', '9.32621', '-83.668', NULL, NULL, 'ok', '2018-11-21', '0000-00-00'),
(7, 'Kamasutra', 'kamasutrapz@gmail.com', '$2a$07$asxx54ahjppf45sd87a5aujSV2PYqqi3qMqgWtNJTof32wMUZCChi', '87654321', '87654321', 'La Dayanara', 'Gratuito', 'IJI', 'IJ', 'IJ', 'IJ', 'IJ', '65432', '9.32621', '-83.668', NULL, NULL, 'ok', '2018-11-21', NULL),
(8, 'RedEstudiantil', 'soporte@redestudiantil.com', '$2a$07$asxx54ahjppf45sd87a5aujSV2PYqqi3qMqgWtNJTof32wMUZCChi', '87654321', '87654321', 'Fernely Artavia ', 'Premiun', 'CR', 'CR', 'CR', 'CR', 'CR', '12345', '9.32621', '-83.668', NULL, NULL, 'ok', '2018-11-22', NULL),
(9, 'BM Supermercado', 'soporte@bm.com', '$2a$07$asxx54ahjppf45sd87a5aujSV2PYqqi3qMqgWtNJTof32wMUZCChi', '12345678', '12345678', 'Alejandro Salguero', 'Premiun', 'OK', 'OK', 'OK', 'OK', 'OK', '12345', '9.32621', '-83.668', NULL, NULL, 'ok', '2018-11-22', NULL),
(10, 'Ulatina', 'ranndy.salas90@gmail.com', '$2a$07$asxx54ahjppf45sd87a5aujSV2PYqqi3qMqgWtNJTof32wMUZCChi', '86133055', '86133055', 'Ulatina', 'Gratuita', 'Costa Rica', 'SAN JOSE', 'PEREZ', 'DANIEL', 'DANUK', '12345', '9.326214856', '-83.6679777', NULL, NULL, 'ok', '2018-12-12', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--
-- Creación: 10-12-2018 a las 21:13:21
--

CREATE TABLE `publicidad` (
  `id_publi` int(11) NOT NULL COMMENT 'id publicacion',
  `fk_id_emp` int(11) NOT NULL COMMENT 'Foren Key de Empresa en la tabla Publicidad',
  `nomb_publi` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre publicación',
  `nomb_imag_publi` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Nombre de la imagen',
  `ruta_imag_publi` varchar(500) COLLATE utf8_spanish_ci NOT NULL COMMENT 'imagen publicacion',
  `precio_publi` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'precio objetos publicados',
  `descri_publi` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Descrioción de la publicación',
  `cond_publi` varchar(1) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Condicion de la publicación Visible verdadera o falso',
  `dest_publi` varchar(1) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Condición de la publicidad, destacados Verdadero o Falso',
  `inicio_publi` date NOT NULL COMMENT 'inicio de publicacion',
  `final_publi` date NOT NULL DEFAULT '0000-00-00' COMMENT 'termina publicacion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `publicidad`:
--   `fk_id_emp`
--       `empresa` -> `id_emp`
--

--
-- Volcado de datos para la tabla `publicidad`
--

INSERT INTO `publicidad` (`id_publi`, `fk_id_emp`, `nomb_publi`, `nomb_imag_publi`, `ruta_imag_publi`, `precio_publi`, `descri_publi`, `cond_publi`, `dest_publi`, `inicio_publi`, `final_publi`) VALUES
(2, 6, 'Birra 2x1', '1544503810_1086.jpg', 'download/1544503810_1086.jpg', '1000', 'La Birra a 2x1 solo en su bar Preferido Bar la pista', '1', '0', '2018-12-10', '2018-12-17'),
(3, 8, 'Pura Navidad', '1544553383_5818.jpg', 'download/1544553383_5818.jpg', '800', 'Promo de birra Exageradamente Buena', '1', '1', '2018-12-11', '2018-12-18'),
(4, 6, 'Pizza Barata', '1544559522_7268.jpg', 'download/1544559522_7268.jpg', '4000', 'Pizza barata en su lslalal', '1', '0', '2018-12-11', '0000-00-00'),
(5, 6, 'Banner', '1544561783_1487.jpg', 'download/1544561783_1487.jpg', 'Gratis', 'Banner Gratis', '1', '0', '2018-12-11', '0000-00-00'),
(6, 6, 'Anime', '1544579052_6279.jpg', 'download/1544579052_6279.jpg', '1000', 'Revista', '1', '0', '2018-12-11', '0000-00-00'),
(7, 6, 'LEGO', '1544580275_9079.jpg', 'download/1544580275_9079.jpg', '7000', 'Caja de Lego de gran tamaÃ±o', '1', '0', '2018-12-11', '0000-00-00'),
(8, 6, 'Cube', '1544581809_7639.jpeg', 'download/1544581809_7639.jpeg', '4000', 'Cubo Cube a buen precio', '1', '0', '2018-12-11', '0000-00-00'),
(9, 6, 'Anime', '1544582130_7849.jpg', 'download/1544582130_7849.jpg', '800', 'Revista', '1', '0', '2018-12-11', '0000-00-00'),
(10, 6, 'Birra 2x1', '1544582630_4084.png', 'download/1544582630_4084.png', '1000', 'La Birra a 2x1 solo en su bar Preferido Bar la pista', '1', '0', '2018-12-11', '0000-00-00'),
(11, 8, 'Moto Barata', '1544596522_1105.jpg', 'download/1544596522_1105.jpg', '1000000', 'Moto deportiva muy Barata', '1', '0', '2018-12-12', '0000-00-00'),
(12, 6, 'Foto en la Playa', '1576527624_8442.jpg', 'download/1576527624_8442.jpg', '12345', '4k', '1', '0', '2019-12-16', '0000-00-00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_emp`),
  ADD KEY `email_emp` (`email_emp`);

--
-- Indices de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD PRIMARY KEY (`id_publi`),
  ADD KEY `Publicidad_id_Empresas` (`fk_id_emp`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del administrador', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id empresa', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  MODIFY `id_publi` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id publicacion', AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD CONSTRAINT `Publicidad_id_Empresas` FOREIGN KEY (`fk_id_emp`) REFERENCES `empresa` (`id_emp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
