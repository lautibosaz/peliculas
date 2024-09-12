-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2024 a las 01:30:10
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pelicula`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(45) NOT NULL,
  `genero` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `genero`) VALUES
(1, 'Terror'),
(2, 'Accion'),
(3, 'Drama'),
(4, 'Comedia'),
(5, 'Romance');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` int(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `director` varchar(45) NOT NULL,
  `resumen` varchar(500) NOT NULL,
  `calificacion` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `nombre`, `director`, `resumen`, `calificacion`) VALUES
(1, 'Batman (1989)', 'Tim Burton', 'El caballero oscuro conocido como Batman defiende a la corrupta e insegura ciudad de Gotham de su enemigo principal, un payaso homicida conocido como Joker.', 4),
(2, 'No Hables Con Extraños', 'James Watkins', 'Cuando una familia estadounidense es invitada a pasar el fin de semana en la idílica finca de una familia británica con la que hicieron amistad durante las vacaciones, lo que comienza como unas vacaciones de ensueño pronto se convierte en una pesadilla psicológica. De Blumhouse, productora de ‘El teléfono negro, Huye y El hombre invisible’, llega un intenso thriller de suspenso para nuestra era moderna, protagonizado por el ganador del premio BAFTA, James McAvoy (Fragmentado, Glass) en una inter', 4),
(3, 'Beetlejuice Beetlejuice', 'Tim Burton', '¡Beetlejuice ha vuelto! Después de una tragedia familiar inesperada, tres generaciones de la familia Deetz regresan a su hogar en Winter River. Aún atormentada por Beetlejuice, la vida de Lydia da un vuelco cuando su rebelde hija adolescente, Astrid, descubre el misterioso modelo de la ciudad en el ático y el portal al Más Allá se abre accidentalmente. Con problemas en ambos reinos, es solo cuestión de tiempo hasta que alguien diga el nombre de Beetlejuice tres veces y el travieso demonio regres', 4),
(4, 'Mascotas En Apuros', 'Kevin Donovan', 'Gracie y Pedro son mascotas que no tienen nada en común. Gracie es una perrita snob de pura raza que se considera «la mejor del espectáculo», mientras que Pedro es un descarado gato rescatado que prefiere su cena recién sacada de la basura. Después de que la familia emprende una gran mudanza, la pelea entre Gracie y Pedro destruye la cinta de equipaje del aeropuerto, dejando a las mascotas perdidas y varadas sin sus collares en un mundo aterrador y desconocido.', 2),
(5, 'Longlegs: Coleccionista De Almas', 'Oz Perkins', 'Lee Harker, una novata agente del FBI, ha sido asignada a un enigmático caso sin resolver de un obscuro asesino en serie. ​A medida que la investigación avanza, las pistas se vuelven confusas y las evidencias se ocultan en las sombras, esto hasta que Harker se dé cuenta de que un vínculo personal le une con el asesino y que debe actuar rápidamente para evitar otro siniestro asesinato.', 2),
(6, 'Alien Romulus', 'Fede Álvarez', '#Alien: Romulus está llegando. Estreno en agosto, solo en cines.', 3),
(7, 'Romper El Circulo', 'Justin Baldoni', 'ROMPER EL CÍRCULO, la primera novela de Colleen Hoover adaptada para la pantalla grande, cuenta la apasionante historia de Lily Bloom (Blake Lively), una mujer que supera una infancia traumática para embarcarse en una nueva vida en Boston y perseguir el sueño de toda una vida: abrir su propio negocio. Un encuentro casual con el encantador neurocirujano Ryle Kincaid (Justin Baldoni) desencadena una intensa conexión, pero a medida que ambos se enamoran profundamente, Lily empieza a ver en Ryle asp', 3),
(8, 'Deadpool Y Wolverine', 'Shawn Levy', 'Marvel Studios presenta lo que podría ser su mayor error hasta el momento: Deadpool y Wolverine. Wade Wilson, ahora llevando una vida más tranquila, deja atrás sus días como el mercenario excéntrico y moralmente flexible conocido como Deadpool. Sin embargo, cuando su mundo enfrenta una amenaza seria, Wade se ve obligado a ponerse el traje de nuevo, aunque con cierta reticencia. De alguna manera, tendrá que convencer a un Wolverine igualmente reacio a… Bueno, la verdad es que las sinopsis son un ', 4),
(9, 'Mi Villano Favorito 4', 'Chris Renaud', 'En la primera película de Mi villano favorito en siete años, Gru, el supervillano favorito del mundo que ahora es agente de la Liga Anti-Villanos, regresa para una nueva y emocionante era de caos de los Minions en Mi villano favorito 4 de Illumination. Tras el éxito de taquilla de 2022 con Minions: Nace un villano, que recaudó casi mil millones de dólares globales, la mayor franquicia global de animación de la historia comienza ahora un nuevo capítulo en el que Gru (El nominado al Oscar® Steve C', 3),
(10, 'Intensamente 2', 'Kelsey Mann', 'La película de Disney y Pixar INTENSA-MENTE 2 regresa a la mente de la recién adolescente Riley justo cuando el cuartel general está sufriendo una repentina demolición para hacer sitio a algo totalmente inesperado: ¡nuevas emociones! Alegría, Tristeza, Furia, Temor y Desagrado, que llevan mucho tiempo llevando a cabo una operación exitosa, no están seguros de cómo sentirse cuando aparece Ansiedad. Y parece que no está sola. Maya Hawke da su voz en inglés a Ansiedad, junto a Amy Poehler como Aleg', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `genero`
--
ALTER TABLE `genero`
  ADD CONSTRAINT `genero_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pelicula` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
