-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2025 a las 18:41:47
-- Versión del servidor: 8.4.3
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `almacen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria_reserva`
--

CREATE TABLE `auditoria_reserva` (
  `id_auditoria` int NOT NULL,
  `id_reserva` int DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `accion` varchar(20) DEFAULT NULL,
  `detalle` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `auditoria_reserva`
--

INSERT INTO `auditoria_reserva` (`id_auditoria`, `id_reserva`, `usuario`, `fecha_modificacion`, `accion`, `detalle`) VALUES
(1, 12, 'root@localhost', '2025-10-23 08:48:01', 'UPDATE', 'Reserva modificada. Estado antes: Activa, Estado ahora: Activa. Fecha antes: 2025-10-21, Fecha ahora: 2025-10-21. Cantidad antes: 2, Cantidad ahora: 2'),
(2, 17, 'root@localhost', '2025-10-23 10:01:10', 'UPDATE', 'Reserva modificada. Estado antes: Activa, Estado ahora: Cancelada. Fecha antes: 2025-10-23, Fecha ahora: 2025-10-23. Cantidad antes: 5, Cantidad ahora: 5'),
(3, 15, 'root@localhost', '2025-10-23 10:26:39', 'UPDATE', 'Reserva modificada. Estado antes: Cancelada, Estado ahora: Cancelada. Fecha antes: 2025-10-22, Fecha ahora: 2025-10-22. Cantidad antes: 2, Cantidad ahora: 2'),
(4, 17, 'root@localhost', '2025-10-23 10:59:02', 'UPDATE', 'Reserva modificada. Estado antes: Cancelada, Estado ahora: Cancelada. Fecha antes: 2025-10-23, Fecha ahora: 2025-10-23. Cantidad antes: 5, Cantidad ahora: 5'),
(16, 20, 'root@localhost', '2025-10-23 11:17:30', 'DELETE', 'Reserva eliminada. Cuenta: 11, Viaje: 20, Fecha reserva: 2025-10-23, Pasajeros: 1, Estado: Activa, VIP: no'),
(17, 5, 'root@localhost', '2025-10-23 11:17:34', 'DELETE', 'Reserva eliminada. Cuenta: 3, Viaje: 5, Fecha reserva: 2025-10-20, Pasajeros: 1, Estado: Activa, VIP: no'),
(18, 13, 'root@localhost', '2025-10-23 11:17:47', 'UPDATE', 'Reserva modificada. Estado antes: Activa, Estado ahora: Activa. Fecha antes: 2025-10-22, Fecha ahora: 2025-10-22. Cantidad antes: 1, Cantidad ahora: 1'),
(19, 17, 'root@localhost', '2025-10-23 11:17:55', 'UPDATE', 'Reserva modificada. Estado antes: Cancelada, Estado ahora: Cancelada. Fecha antes: 2025-10-23, Fecha ahora: 2025-10-23. Cantidad antes: 5, Cantidad ahora: 5'),
(20, 12, 'root@localhost', '2025-10-23 11:40:51', 'DELETE', 'Reserva eliminada. Cuenta: 3, Viaje: 12, Fecha reserva: 2025-10-21, Pasajeros: 2, Estado: Activa, VIP: si'),
(21, 13, 'root@localhost', '2025-10-23 11:41:07', 'UPDATE', 'Reserva modificada. Estado antes: Activa, Estado ahora: Activa. Fecha antes: 2025-10-22, Fecha ahora: 2025-10-22. Cantidad antes: 1, Cantidad ahora: 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id_cuenta` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id_cuenta`, `nombre`, `correo`, `contrasena`) VALUES
(1, 'Andres Mancera', 'andres@gmail.com', '$2y$10$HVBNlVJ/mcfB3MUvsVMUMe5s3oJfwfsTUxVEwprI9ohsO6xM1JQrK'),
(2, 'Maria', 'maria@gmail.com', '$2y$10$b1ZkUtTui5orUmQSlwLyJOAK07TSVbKKySPfUtqboLutM9/SZPN..'),
(3, 'adriana', 'adriana@gmail.com', '$2y$10$2xGTi.Wunoid03NYPjJFqOurPhx.qTI4Oh1kKSzMBHOpIKx3oTYwS'),
(4, 'Daniel Luque', 'luque@gmail.com', '$2y$10$zIsQ/9KstIvRk0xTH3EK6eylqklVeERinXdVwg1W71bub.c8uKTP.'),
(5, 'Karen Mariana', 'valderra09@gmail.com', '$2y$10$iKaCfE4xdyvXnKgWzJc5wOAkreZGwayk273YvoA5qKaYaiSd0tTzi'),
(6, 'Administrador', 'admin@gocolombia.com', '$2y$10$./VpbMd2D2Ab8jxrHtyTSunJVKl0FG2AHNri.bCudtkCi0QhqGC1m'),
(7, 'Empleado', 'empleado@gocolombia.com', '$2y$10$fVjEXLhQzfGjAhooMPnnn.n50pta7Rjku/sKKWb08uCVEcPBXB/iG'),
(8, 'Kevin', 'kevin@gmail.com', '$2y$10$9qTz9f5JFqs1Fm/YQXICmOrM/vmkuk.5IcwLK6VgvBIgIgBm56bfW'),
(9, 'danixd', 'dani@gmail.com', '$2y$10$l5NgJZKxegFvHxvTXUapjOw40gmW5NfL6LLKHsIewV6BkT.3K8M0m'),
(10, 'Lucia', 'lucia@gmail.com', '$2y$10$87lVu8SC3/oO.mW0TH51.OcB/0cZWBdJF7ORAyQurg2dx5HRjaVJe'),
(11, 'Andresxd', 'andresxd@gmail.com', '$2y$10$MiZ7MVSznaVafxSdM9f9qer8.jSVtJWmdpGhmSg1n.AgK7JfbKJnu'),
(12, 'Angelica', 'angelica1908@gmail.com', '$2y$10$XFIBSL7CHeoAm6F3pBZr3Oi5sN7W6mkAS4m3jLWdyoBkrZTjGqlDu'),
(13, 'yo', 'yo@gmail.com', '$2y$10$eHHEA.Q8esc2sz93UwVaUOHuUpqz33G/qOr/FHkAutC72CYbowAzK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_rol`
--

CREATE TABLE `cuenta_rol` (
  `id_cuenta` int NOT NULL,
  `id_rol` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenta_rol`
--

INSERT INTO `cuenta_rol` (`id_cuenta`, `id_rol`) VALUES
(6, 1),
(7, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `id_destino` int NOT NULL,
  `ciudad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`id_destino`, `ciudad`) VALUES
(1, 'Amazonas'),
(2, 'BoyacÃ¡'),
(3, 'Huila'),
(4, 'Cartagena'),
(5, 'MedellÃ­n'),
(6, 'San AndrÃ©s'),
(7, 'Leticia (Amazonas)'),
(8, 'Cali'),
(9, 'Villa de Leyva'),
(10, 'Eje Cafetero'),
(11, 'BogotÃ¡'),
(12, 'Bogotá'),
(13, 'Desierto de la Tatacoa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int NOT NULL,
  `id_cuenta` int DEFAULT NULL,
  `id_viaje` int DEFAULT NULL,
  `fecha_reserva` date DEFAULT NULL,
  `cantidad_pasajeros` int DEFAULT NULL,
  `estado` enum('Activa','Cancelada','Completada') DEFAULT 'Activa',
  `vip` enum('si','no') DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_cuenta`, `id_viaje`, `fecha_reserva`, `cantidad_pasajeros`, `estado`, `vip`) VALUES
(1, 3, 1, '2025-10-20', 1, 'Activa', 'no'),
(10, 6, 10, '2025-10-21', 7, 'Activa', 'no'),
(13, 7, 13, '2025-10-22', 1, 'Activa', 'si'),
(14, 10, 14, '2025-10-22', 1, 'Cancelada', 'si'),
(15, 10, 15, '2025-10-22', 2, 'Cancelada', 'no'),
(17, 12, 17, '2025-10-23', 5, 'Cancelada', 'si');

--
-- Disparadores `reserva`
--
DELIMITER $$
CREATE TRIGGER `auditoria_reservas_delete` BEFORE DELETE ON `reserva` FOR EACH ROW BEGIN
    INSERT INTO auditoria_reserva (id_reserva, usuario, fecha_modificacion, accion, detalle)
    VALUES (
        OLD.id_reserva,
        CURRENT_USER(),
        NOW(),
        'DELETE',
        CONCAT(
            'Reserva eliminada. ',
            'Cuenta: ', OLD.id_cuenta,
            ', Viaje: ', OLD.id_viaje,
            ', Fecha reserva: ', OLD.fecha_reserva,
            ', Pasajeros: ', OLD.cantidad_pasajeros,
            ', Estado: ', OLD.estado,
            ', VIP: ', OLD.vip
        )
    );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_auditoria_reserva_update` AFTER UPDATE ON `reserva` FOR EACH ROW BEGIN
  INSERT INTO auditoria_reserva (id_reserva, usuario, fecha_modificacion, accion, detalle)
  VALUES (
    OLD.id_reserva,
    CURRENT_USER(),                -- Usuario que ejecutó la acción
    NOW(),                         -- Fecha y hora del cambio
    'UPDATE',
    CONCAT(
      'Reserva modificada. Estado antes: ', OLD.estado,
      ', Estado ahora: ', NEW.estado,
      '. Fecha antes: ', OLD.fecha_reserva,
      ', Fecha ahora: ', NEW.fecha_reserva,
      '. Cantidad antes: ', OLD.cantidad_pasajeros,
      ', Cantidad ahora: ', NEW.cantidad_pasajeros
    )
  );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_reserva_fecha` BEFORE INSERT ON `reserva` FOR EACH ROW BEGIN
  IF NEW.fecha_reserva IS NULL THEN
    SET NEW.fecha_reserva = CURDATE();
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int NOT NULL,
  `nombre_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Empleado'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE `transporte` (
  `id_transporte` int NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transporte`
--

INSERT INTO `transporte` (`id_transporte`, `tipo`) VALUES
(1, 'Aéreo'),
(2, 'Terrestre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `id_viaje` int NOT NULL,
  `id_transporte` int DEFAULT NULL,
  `id_destino` int DEFAULT NULL,
  `fecha_salida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id_viaje`, `id_transporte`, `id_destino`, `fecha_salida`) VALUES
(1, 2, 1, '1010-10-10'),
(2, 1, 2, '1009-10-10'),
(3, 1, 3, '1009-10-10'),
(4, 1, 4, '1010-10-10'),
(5, 1, 5, '1010-10-10'),
(6, 1, 6, '1010-10-10'),
(7, 1, 7, '1010-10-10'),
(8, 1, 8, '2234-12-12'),
(9, 1, 8, '3333-04-21'),
(10, 1, 4, '3223-04-21'),
(11, 1, 9, '0354-04-12'),
(12, 1, 10, '2015-12-31'),
(13, 1, 6, '1001-10-10'),
(14, 1, 7, '2025-12-30'),
(15, 1, 11, '1010-10-10'),
(16, 1, 4, '1010-10-10'),
(17, 1, 12, '2025-10-25'),
(18, 1, 13, '2025-10-29'),
(19, 1, 4, '2025-10-29'),
(20, 1, 12, '2025-10-29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditoria_reserva`
--
ALTER TABLE `auditoria_reserva`
  ADD PRIMARY KEY (`id_auditoria`),
  ADD KEY `id_reserva` (`id_reserva`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id_cuenta`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `cuenta_rol`
--
ALTER TABLE `cuenta_rol`
  ADD PRIMARY KEY (`id_cuenta`,`id_rol`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`id_destino`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_cuenta` (`id_cuenta`),
  ADD KEY `id_viaje` (`id_viaje`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`id_transporte`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`id_viaje`),
  ADD KEY `id_transporte` (`id_transporte`),
  ADD KEY `id_destino` (`id_destino`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auditoria_reserva`
--
ALTER TABLE `auditoria_reserva`
  MODIFY `id_auditoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id_cuenta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `id_destino` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `transporte`
--
ALTER TABLE `transporte`
  MODIFY `id_transporte` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id_viaje` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuenta_rol`
--
ALTER TABLE `cuenta_rol`
  ADD CONSTRAINT `cuenta_rol_ibfk_1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta` (`id_cuenta`),
  ADD CONSTRAINT `cuenta_rol_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta` (`id_cuenta`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_viaje`) REFERENCES `viaje` (`id_viaje`);

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`id_transporte`) REFERENCES `transporte` (`id_transporte`),
  ADD CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`id_destino`) REFERENCES `destino` (`id_destino`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
