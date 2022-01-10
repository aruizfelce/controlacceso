-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2022 a las 23:34:38
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matriz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesos`
--

CREATE TABLE `accesos` (
  `idMatriz` int(11) NOT NULL,
  `cedula` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `empresa` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `cargo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `territorio` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `localidad` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `tse` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `idEmpresa` int(11) NOT NULL,
  `empresa` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `empresaNombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `empresaTelefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `empresaEmail` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `personaContacto` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `empresaTelefonoAlternativo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `empresaDireccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `empresaLogo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `primaryColor` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `secondaryColor` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `successColor` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `infoColor` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `warningColor` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `errorColor` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`idEmpresa`, `empresa`, `empresaNombre`, `empresaTelefono`, `empresaEmail`, `personaContacto`, `empresaTelefonoAlternativo`, `empresaDireccion`, `empresaLogo`, `primaryColor`, `secondaryColor`, `successColor`, `infoColor`, `warningColor`, `errorColor`, `deleted_at`) VALUES
(1, 'Farmacia', 'Farmacia Argentina', '04128655271', 'farmacia@gmail.com', 'Luis Rodrìguez', '', '', '1618520180_4b6b5c564c69d517bc42.jpeg', '#007BFF', '#6E79EB', '#E7E7E7', '#526F9C', '#F07A6A', '#FF0004', NULL),
(2, 'Empresa1', 'Empresa 1, C.A.', '0281-45824124', 'empresa1@gmail.com', 'Jose Perez', '', '', '1617377062_6658e9f19718c43d8096.jpeg', '#4C61CA', '#4C9ACA', '#62935B', '#935B84', '#EDED71', '#CA4C52', NULL),
(3, 'Empresa2', 'Empresa 2, S.A.', '0212-123456', 'empresa2@gmail.com', 'Carlos Campos', '', '', '1617461409_388c0b33be00717ec612.jpg', '#00A2FF', '#00FFDB', '#43FF00', '#00A2FF', '#FFCF00', '#F2776B', NULL),
(4, 'Empresa3', 'Empresa 3, C.A.', '04128652411', 'empresa3@gmail.com', 'Carlos Castillo', '', 'Av. Principal', '1617455957_18c204f0b85a08b21fb3.jpeg', '#FF0047', '#D05B72', '#5B9FD0', '#5BD060', '#E6D74D', '#FC1702', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'administrador'),
(2, 'demo'),
(4, 'empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tse`
--

CREATE TABLE `tse` (
  `idTSE` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `usuarioEmpresa` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuarioNombre` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `usuarioApellido` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `usuarioEmail` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `rol` int(11) NOT NULL,
  `usuarioDocumento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `numeroLegajo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuarioEmpresa`, `usuario`, `usuarioNombre`, `usuarioApellido`, `password`, `usuarioEmail`, `rol`, `usuarioDocumento`, `numeroLegajo`) VALUES
(1, 1, 'aruizfelce@gmail.com', 'Antonio', 'Ruiz', '123456', 'antonioruiz@gmail.com', 1, '11826424', '456'),
(2, 3, 'alexandra@gmail.com', 'Alexandra', 'Longart', '$2y$10$Pg/UZ7PMGnfTtw/jsHp52OFQ7eu15Ay3NUjn4jR.Rl0W9xEzcTwCK', 'alexandra@gmail.com', 2, '13167425', ''),
(3, 2, 'anthony@gmail.com', 'Anthony Alejandro', 'Ruiz', '$2y$10$TlK/RbLCLeuDkG/6WjoOneTcvaCzJ3NIRQb7PXY.jFKNzanmRtqBO', 'anthony@gmail.com', 4, '30131661', ''),
(9, 3, 'mauriciorisso@gmail.com', 'Mauricio', 'Risso', '$2y$10$QQkQcfI1heiykL698xLbkOP7hmwqy7enlUyC1WZZc8gX0Yk.6JWEy', 'mauriciorisso@gmail.com', 4, '', ''),
(10, 3, 'luisrodriguez@gmail.com', 'Luis Jose', 'Rodriguez', '$2y$10$T/OWS7Ajb2A.mEg45CDdvOEJ.XMPZovw8iGa19Nzi5Ll.kT/vChYi', 'luisrodriguez@gmail.com', 4, '123456', ''),
(11, 1, 'yaquelin@gmail.com', 'Yaquelin', 'Rodriguez', '$2y$10$nKIoFZhTu2KtLikIMPl.9uktg2GDoBRozWF7kh0htkT5pixP4D.mS', 'yaquelin@gmail.com', 4, '1123121', ''),
(12, 2, 'franklim@gmail.com', 'Franklim', 'Guerra', '$2y$10$/.s8XRGDiXKw02eEXfGvmeAoAiE8kObPWP6Y4e/JWGLRPFZBOLJAu', 'franklim@gmail.com', 4, '', ''),
(14, 3, 'pedro@gmail.com', 'Pedro', 'Perez Perez', '$2y$10$iqTjhKZ8d0ShG37OAewp7eHTpH6ckN5M7orVwHHqbR5eLFY2kC/Hi', 'pedro@gmail.com', 2, '11254456', ''),
(15, 3, 'david@gmail.com', 'David Eduardo', 'Herrera', '$2y$10$ijzw1tuxxADOuRdlsm2/JeIYv0.3dLSIf06tKVM1Qxai6jHO07B4C', 'david@gmail.com', 4, '17542012', ''),
(24, 2, 'aruizfelce2@gmail.com', 'Marlon', 'Perez', '$2y$10$ShhQoACci9WvvPMwsk/dAecStqAXXkkWPvn59PxovoXrltb06g316', 'aruizfelce2@gmail.com', 4, '123456', ''),
(26, 4, 'eduardo@gmail.com', 'Eduardo Jose', 'Rodriguez', '$2y$10$JLflq1P.5ym8sCR8d5bgG.BNWIG.MPdbAYrhVwPslxiMUEabhEnmm', 'eduardo2@gmail.com', 4, '12345621', ''),
(44, 3, 'alvaro@gmail.com', 'Alvaro', 'Martin', '$2y$10$z9wqISgvnmbunw6bAn2ZT.KcdKWmjeN3drovK.ozlkNkFXPQJswdu', '', 4, '12345678', ''),
(45, 3, 'carlos@gmail.com', 'Carlos', 'Morales', '$2y$10$/0I7mfG1GPyFFiMYbBkN/urfZJlCDodtZoxEf3rk2nQxNbWR5faIq', '', 4, '1234567', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD PRIMARY KEY (`idMatriz`),
  ADD KEY `FK_tse` (`tse`) USING BTREE;

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tse`
--
ALTER TABLE `tse`
  ADD PRIMARY KEY (`idTSE`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `usuarioEmpresa` (`usuarioEmpresa`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesos`
--
ALTER TABLE `accesos`
  MODIFY `idMatriz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tse`
--
ALTER TABLE `tse`
  MODIFY `idTSE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD CONSTRAINT `accesos_ibfk_2` FOREIGN KEY (`tse`) REFERENCES `tse` (`idTSE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tse`
--
ALTER TABLE `tse`
  ADD CONSTRAINT `fk_tse` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`usuarioEmpresa`) REFERENCES `empresas` (`idEmpresa`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
