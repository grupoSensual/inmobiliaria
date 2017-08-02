-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-07-2017 a las 21:43:52
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdtucasa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbclientes`
--

CREATE TABLE IF NOT EXISTS `tbclientes` (
  `idclientes` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contrasena` varchar(70) NOT NULL,
  PRIMARY KEY (`idclientes`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `tbclientes`
--

INSERT INTO `tbclientes` (`idclientes`, `nombre`, `apellidos`, `email`, `contrasena`) VALUES
(1, 'Julia', 'de las Doblas', 'doblas@gmail.com', '$2y$10$SYUIK.UexFYsqCMvRH3bK.CHUATJi4QDKZzATdmwPPxl.jUmVu8hG'),
(2, 'Juanjo', 'Martin Rueda', 'martin@hotmail.com', '$2y$10$k2wrxYIyRWaPli7OrL124uJNg3drrggk6rPVSs4Augf6aYmQmRnUq'),
(3, 'Ana', 'Perea Gomez', 'perea@yahoo.com', '$2y$10$udqKoZHXIj5qjww5V6zFl.O9tzwPZf/I9swkZvHkI8puVBWc65vo6'),
(4, 'Alvaro', 'Santos Gomez', 'santos@hotmail.com', '$2y$10$7PGIj1tQ9saUAfjJpI2gROPDyk/KvSZ6DYyTvC4668rhjYh9z69ga'),
(5, 'Olga', 'Gimenez Dardos', 'gimenez@hotmail.com', '$2y$10$CVxT6geEAtZy8XzvHni3D.F3u9sWrUZJNCH6AQ7N8yfZDbmxrKJ.e'),
(6, 'Pedro', 'Aldea Primo', 'aldea@gmail.com', '$2y$10$6VDQDafaRfZzzqfB9wv4jeAxiFFy2.9.pH1t7HWKkbnxD/W8QudhO'),
(7, 'Antonio', 'Recio Gerona', 'recio@gmail.com', '$2y$10$1W55gdsae6zU3LEPKIY.KueRzJGRw81Fdd.pCdGE.yV0n72947vDW'),
(8, 'Ramon', 'Sanchez Pizjuan', 'sanchez@hotmail.com', '$2y$10$qbkous4n0BmYV3OS2re5aODa6QQU6fguuduPvtQxDZWPbOWXnl4kC'),
(9, 'Luis', 'Santiago Gomez', 'santiago@yahoo.com', '$2y$10$bv75BGC0D6DE8dnl9MruM.6jktJlGtnaoxPK/n9t0fRrhynUC4Xey'),
(10, 'Fernando', 'Anaya Pili', 'anaya@gmail.com', '$2y$10$FYAMgEtfeEcaSBhIKpK7s.5o6FQZnnUi8Ye19eHnfvV5kAhqEwYuu'),
(11, 'Monica', 'Galinda Ferita', 'galinda@yahoo.com', '$2y$10$REKYWrQzkLaoW.j2pyYMUO0rNwgAfoqJeOnj6ZCyqHCs4GunEfDfu'),
(12, 'Andrea', 'Camino Rodri', 'camino@hotmail.com', '$2y$10$1yJpAzfWCmOsn8Lz7hvMAeXpLJd.CGijQU4l4GkPy.b9t3nko4NTa'),
(13, 'Miguel', 'Fregona Alto', 'fregona@gmail.com', '$2y$10$D7KFqCxmhfyw9aRHMh2n3eqtSQQhD71Mo8B5wwrAGtrgaqZWiPjAG'),
(14, 'Samuel', 'Mesino Felino', 'mesino@hotmail.com', '$2y$10$oKv01/P/JV/Lx9rzM5rw5epLiOikaLA46C9R7YR/ck2nt4mRtSRWK'),
(15, 'Elena', 'Terina Puero', 'terina@hotmail.con', '$2y$10$7BB6hwrTzWoiNVvH4FIcbenEM.NS7JOxHiPXATBY9G.PawVpJ9MSG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbimagenes`
--

CREATE TABLE IF NOT EXISTS `tbimagenes` (
  `idimagen` int(11) NOT NULL AUTO_INCREMENT,
  `idinmueble` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  PRIMARY KEY (`idimagen`),
  KEY `tbinmueble_idx` (`idinmueble`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=126 ;

--
-- Volcado de datos para la tabla `tbimagenes`
--

INSERT INTO `tbimagenes` (`idimagen`, `idinmueble`, `imagen`) VALUES
(1, 1, 'uploads/11.jpg'),
(2, 1, 'uploads/13.jpg'),
(3, 1, 'uploads/14.jpg'),
(4, 1, 'uploads/15.jpg'),
(5, 2, 'uploads/27.jpg'),
(6, 2, 'uploads/28.jpg'),
(7, 2, 'uploads/29.jpg'),
(8, 2, 'uploads/212.jpg'),
(9, 3, 'uploads/39.jpg'),
(10, 3, 'uploads/344.jpg'),
(11, 3, 'uploads/348.jpg'),
(12, 3, 'uploads/349.jpg'),
(13, 4, 'uploads/41.jpg'),
(14, 4, 'uploads/43.jpg'),
(15, 4, 'uploads/44.jpg'),
(16, 4, 'uploads/47.jpg'),
(17, 4, 'uploads/48.jpg'),
(18, 5, 'uploads/511.jpg'),
(19, 5, 'uploads/512.jpg'),
(20, 5, 'uploads/513.jpg'),
(21, 5, 'uploads/514.jpg'),
(22, 5, 'uploads/516.jpg'),
(23, 6, 'uploads/644.jpg'),
(24, 6, 'uploads/645.jpg'),
(25, 6, 'uploads/648.jpg'),
(26, 6, 'uploads/649.jpg'),
(27, 6, 'uploads/650.jpg'),
(28, 7, 'uploads/736.jpg'),
(29, 7, 'uploads/739.jpg'),
(30, 7, 'uploads/740.JPG'),
(31, 7, 'uploads/748.jpg'),
(32, 8, 'uploads/817.jpg'),
(33, 8, 'uploads/827.jpg'),
(34, 8, 'uploads/829.jpg'),
(35, 9, 'uploads/91 - copia.jpg'),
(36, 9, 'uploads/918.jpg'),
(37, 9, 'uploads/920.jpg'),
(38, 9, 'uploads/943.JPG'),
(39, 10, 'uploads/1016.jpg'),
(40, 10, 'uploads/1037.jpg'),
(41, 10, 'uploads/1038.jpg'),
(42, 10, 'uploads/1045.jpg'),
(43, 11, 'uploads/1140.JPG'),
(44, 11, 'uploads/1143.JPG'),
(45, 11, 'uploads/1144.jpg'),
(46, 11, 'uploads/1149.jpg'),
(47, 12, 'uploads/129.jpg'),
(48, 12, 'uploads/1210.jpg'),
(49, 12, 'uploads/1213.jpg'),
(50, 12, 'uploads/1214.jpg'),
(51, 12, 'uploads/1218.jpg'),
(52, 13, 'uploads/1337.jpg'),
(53, 13, 'uploads/1339.jpg'),
(54, 13, 'uploads/1349.jpg'),
(55, 13, 'uploads/1350.jpg'),
(56, 14, 'uploads/1417.jpg'),
(57, 14, 'uploads/1418.jpg'),
(58, 14, 'uploads/1421.jpg'),
(59, 14, 'uploads/1422.jpg'),
(60, 15, 'uploads/153.jpg'),
(61, 15, 'uploads/154.jpg'),
(62, 15, 'uploads/155.jpg'),
(63, 15, 'uploads/156.jpg'),
(64, 16, 'uploads/1611.jpg'),
(65, 16, 'uploads/1613.jpg'),
(66, 16, 'uploads/1637.jpg'),
(67, 16, 'uploads/1644.jpg'),
(68, 16, 'uploads/1649.jpg'),
(69, 17, 'uploads/1731.jpg'),
(70, 17, 'uploads/1735.jpg'),
(71, 17, 'uploads/1736.jpg'),
(72, 17, 'uploads/1739.jpg'),
(73, 18, 'uploads/1816.jpg'),
(74, 18, 'uploads/1839.jpg'),
(75, 18, 'uploads/1843.JPG'),
(76, 18, 'uploads/1850.jpg'),
(77, 19, 'uploads/191 - copia.jpg'),
(78, 19, 'uploads/1916.jpg'),
(79, 19, 'uploads/1918.jpg'),
(80, 19, 'uploads/1946.jpg'),
(81, 20, 'uploads/201.jpg'),
(82, 20, 'uploads/207.jpg'),
(83, 20, 'uploads/2010.jpg'),
(84, 20, 'uploads/2013.jpg'),
(85, 21, 'uploads/2120.jpg'),
(86, 21, 'uploads/2124.jpg'),
(87, 21, 'uploads/2127.jpg'),
(88, 21, 'uploads/2139.jpg'),
(89, 21, 'uploads/2148.jpg'),
(90, 22, 'uploads/221 - copia.jpg'),
(91, 22, 'uploads/2223.jpg'),
(92, 22, 'uploads/2236.jpg'),
(93, 22, 'uploads/2248.jpg'),
(94, 23, 'uploads/2321.jpg'),
(95, 23, 'uploads/2339.jpg'),
(96, 23, 'uploads/2340.JPG'),
(97, 23, 'uploads/2350.jpg'),
(98, 24, 'uploads/2411.jpg'),
(99, 24, 'uploads/2418.jpg'),
(100, 24, 'uploads/2421.jpg'),
(101, 24, 'uploads/2440.JPG'),
(102, 25, 'uploads/257.jpg'),
(103, 25, 'uploads/259.jpg'),
(104, 25, 'uploads/2511.jpg'),
(105, 25, 'uploads/2513.jpg'),
(106, 26, 'uploads/264.jpg'),
(107, 26, 'uploads/268.jpg'),
(108, 26, 'uploads/2617.jpg'),
(109, 26, 'uploads/2625.jpg'),
(110, 26, 'uploads/2627.jpg'),
(111, 27, 'uploads/2716.jpg'),
(112, 27, 'uploads/2718.jpg'),
(113, 27, 'uploads/2719.jpg'),
(114, 27, 'uploads/2746.jpg'),
(115, 28, 'uploads/281 - copia.jpg'),
(116, 28, 'uploads/2840.JPG'),
(117, 28, 'uploads/2845.jpg'),
(118, 28, 'uploads/2849.jpg'),
(119, 29, 'uploads/295.jpg'),
(120, 29, 'uploads/2920.jpg'),
(121, 29, 'uploads/2936.jpg'),
(122, 30, 'uploads/306.jpg'),
(123, 30, 'uploads/307.jpg'),
(124, 30, 'uploads/3011.jpg'),
(125, 30, 'uploads/3013.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbinmuebles`
--

CREATE TABLE IF NOT EXISTS `tbinmuebles` (
  `idinmueble` int(11) NOT NULL AUTO_INCREMENT,
  `idcliente` int(11) NOT NULL,
  `habitaciones` int(11) NOT NULL,
  `banios` int(11) NOT NULL,
  `precio` double NOT NULL,
  `zona` varchar(60) NOT NULL,
  `superficie` int(11) NOT NULL,
  `antiguedad` int(11) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `modalidad` varchar(45) NOT NULL,
  PRIMARY KEY (`idinmueble`),
  KEY `idcliente_idx` (`idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `tbinmuebles`
--

INSERT INTO `tbinmuebles` (`idinmueble`, `idcliente`, `habitaciones`, `banios`, `precio`, `zona`, `superficie`, `antiguedad`, `descripcion`, `modalidad`) VALUES
(1, 1, 2, 2, 1200, 'Madrid', 120, 15, 'descripcion modificada', 'Alquiler'),
(2, 1, 4, 3, 400000, 'Aravaca', 200, 10, 'vadgaryjr jyujthjdfg w rtyhtey  gsfg qert', 'Venta'),
(3, 1, 2, 1, 100, 'Getafe', 60, 3, 'asdfadf fgsfgsrqwe sfgwartg wwrtgwrgad sdfg g ae\r\nfgsfg th eth', 'Alquiler'),
(4, 2, 3, 4, 510000, 'Madrid', 67, 15, 'mola mucho el piso', 'Venta'),
(5, 2, 2, 2, 540000, 'Aravaca', 90, 15, 'este no mola tanto', 'Venta'),
(6, 2, 2, 2, 120000, 'Galapagar', 120, 23, 'compramelo jaaaaaaaaaaa richal', 'Venta'),
(7, 3, 3, 2, 800, 'Albacete', 70, 16, 'Albacete caga y vete', 'Alquiler'),
(8, 3, 3, 3, 500000, 'Tres Cantos', 300, 9, 'Esta zona mola un monton', 'Venta'),
(9, 3, 1, 1, 700, 'Madrid', 50, 3, 'sfghh ethet yer tetyh etyh', 'Alquiler'),
(10, 6, 2, 2, 1000, 'Alcorcon', 65, 11, 'dfgsrtg rtywrty th wtry wrtywr wfg wret', 'Alquiler'),
(11, 4, 3, 3, 1200, 'Tres Cantos', 90, 4, 'fdghfghwsfw r wtywr wrg wrtwrt yrths g', 'Alquiler'),
(12, 5, 3, 4, 300000, 'Madrid', 210, 12, 'dfhsfgh  rthet edr garetg h h h rshws', 'Venta'),
(13, 5, 2, 2, 200000, 'Moncloa', 80, 17, 'adfga rtgwrtg rtg areg agsdfvsdfg aerg qaetra gfd bvsfg rt ywsrtg rgaergwsr tgwrtg', 'Venta'),
(14, 5, 2, 1, 120000, 'Getafe', 60, 14, 'zgs adfgarga rsrfgasdfaer arg sfg aergae trafvad gsfh sgeg sr s', 'Venta'),
(15, 5, 3, 2, 1300, 'Las Rozas', 100, 12, 'gjedgjmryuryu tyuetyuryuetuy etyuetuye ttyu etyu ety hetuye yuj e', 'Alquiler'),
(16, 5, 1, 1, 1000, 'Pozuelo', 50, 5, 'dfghjdtthdghe yjetyjr dty jtey jetyujet yhstyhetyuj', 'Alquiler'),
(17, 9, 1, 2, 50000, 'Las Matas', 56, 15, 'sdfgsfhetyh wtrhet uyetyherth w5e6y fwrtg', 'Venta'),
(18, 9, 1, 2, 500, 'Alpedrete', 70, 12, 'sdfrestby rtghetjhjkjliop gawrfeqe tytj gwewry5 y dfvdfrg tey', 'Alquiler'),
(19, 7, 3, 2, 180000, 'Alcobendas', 100, 19, 'sdgrtluyiotutryhwer srtwuuioyioyfghet yjuyi yetrywe tukr yerty ryurehe', 'Venta'),
(20, 7, 3, 2, 1500, 'Madrid', 120, 17, 'sdgtrwryw wytwtyw wrtywrty wrgwrty yj', 'Alquiler'),
(21, 8, 2, 2, 1200, 'Cuatro Caminos', 80, 11, 'dfgdgrer rgdfgfgh dyhwrt wrtg fgsfdg aertgq gs gdfg a afghrty  trgrtgwrtyw', 'Alquiler'),
(22, 8, 3, 3, 430000, 'Barajas', 200, 12, 'xsgjdghjdg tdjrtwr tyjgj mwrtg wretty ejnsfg asrtg yety et yhetrhe rt6yefgs', 'Venta'),
(23, 8, 3, 2, 700, 'San Sebastian', 70, 17, 'scfhsh trh dli hwsrtg wetwsrt ytrhsrfgsrtyesty rth yuj f ghsrthe yujdg hety tyue', 'Alquiler'),
(24, 6, 2, 1, 850, 'San Blas', 54, 11, 'fghrtywtry tryhetyu tesyet etryhs rtyws ywsystry sfbsfg', 'Alquiler'),
(25, 6, 2, 2, 750, 'Usera', 52, 19, 'aertyrywrt ty try wetuyetyu wwtyetu et hwrty twtr rty etet', 'Alquiler'),
(26, 15, 4, 3, 432000, 'Villaverde', 210, 15, 'agadgareg rtgqreg argwtr rtg rtgywsr taretgwre rtgsfg srgwrgw', 'Venta'),
(27, 15, 4, 1, 130000, 'Retiro', 86, 5, 'srtytyuuioi u twert qertt srgsgwetr teyu fhjdgwrt teyhsgbrty tyd', 'Venta'),
(28, 15, 1, 1, 550, 'Ciudad Lineal', 54, 3, 'dfwtry etyety tyh tuetyu jtyj ety uedtyh tetr', 'Alquiler'),
(29, 12, 4, 2, 400000, 'El Pardo', 124, 6, 'gsdfgrg rtgr th ujryuj et hwrtg qerwer sertsrtytyhtdyh', 'Venta'),
(30, 12, 3, 2, 143000, 'Madrid', 76, 22, 'srtyrtys rtysrtysr tsth strhsrtye ty wtrghsrghtr ydtyhtyteyetyu eteyuteur ty', 'Venta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbparametros`
--

CREATE TABLE IF NOT EXISTS `tbparametros` (
  `numimgpermi` int(11) NOT NULL,
  `maximodeinmubleventa` int(11) NOT NULL,
  `maximodesolicitudes` int(11) NOT NULL,
  `idparametro` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idparametro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbparametros`
--

INSERT INTO `tbparametros` (`numimgpermi`, `maximodeinmubleventa`, `maximodesolicitudes`, `idparametro`) VALUES
(5, 3, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsolicitudes`
--

CREATE TABLE IF NOT EXISTS `tbsolicitudes` (
  `idcliente` int(11) NOT NULL,
  `idinmueble` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comentarios` varchar(70) NOT NULL,
  `idsolicitud` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idsolicitud`),
  KEY `tbinmueble_idx` (`idinmueble`),
  KEY `tbclientes_idx` (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbimagenes`
--
ALTER TABLE `tbimagenes`
  ADD CONSTRAINT `idinmueble` FOREIGN KEY (`idinmueble`) REFERENCES `tbinmuebles` (`idinmueble`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbinmuebles`
--
ALTER TABLE `tbinmuebles`
  ADD CONSTRAINT `idcliente` FOREIGN KEY (`idcliente`) REFERENCES `tbclientes` (`idclientes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbsolicitudes`
--
ALTER TABLE `tbsolicitudes`
  ADD CONSTRAINT `tbclientes` FOREIGN KEY (`idcliente`) REFERENCES `tbclientes` (`idclientes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbinmueble` FOREIGN KEY (`idinmueble`) REFERENCES `tbinmuebles` (`idinmueble`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
