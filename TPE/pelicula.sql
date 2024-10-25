-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2024 a las 04:46:12
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
  `id_genero` int(11) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `genero`, `descripcion`) VALUES
(1, 'Terror', 'El cine de terror es un género cinematográfico que se caracteriza por su voluntad de provocar en el espectador sensaciones de pavor, terror, miedo, disgusto, repugnancia, horror, incomodidad o preocupación.'),
(2, 'Accion', 'El cine de acción es un género cinematográfico donde prima la espectacularidad de las imágenes por medio de efectos especiales de estilo \"clásico\". La denominación es más un convencionalismo popular, que un género cinematográfico puro acuñado por críticos, estudiosos o cineastas.'),
(3, 'Drama', 'Como género cinematográfico, el drama siempre plantea conflictos entre los personajes principales de la narración fílmica y provoca una respuesta emotiva en el espectador, a quien conmueve, debido a que interpela su sensibilidad.'),
(4, 'Comedia', 'El cine de comedia se caracteriza por ser alegre, y diseñado para divertir y provocar en el espectador una risa contagiosa que les lleve a evadirse del mundo real.'),
(5, 'Romance', 'El cine romántico es un género cinematográfico que se caracteriza por retratar argumentos construidos de eventos y personajes relacionados con la expresión del amor y las relaciones románticas.'),
(6, 'Ciencia Ficcion', 'El cine de ciencia ficción se ha utilizado en ocasiones para comentar críticamente aspectos políticos o sociales, utopías, distopías o ucronías y para explorar cuestiones filosóficas como la definición del ser humano, sus alcances y futuro o destino, el inicio de su existencia o su predecible final, apocalíptico o no.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id_pelicula` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `director` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `calificacion` int(11) NOT NULL,
  `estreno` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_pelicula`, `id_genero`, `titulo`, `director`, `descripcion`, `calificacion`, `estreno`) VALUES
(1, 3, 'Joker 2', 'Todd Phillips', 'Del aclamado escritor/director/productor Todd Phillips llega “Guasón 2: Folie À Deux,” la tan esperada continuación de “Guasón” de 2019, ganadora del Premio de la Academia, que recaudó más de $1 mil millones en la taquilla mundial y sigue siendo la película clasificada R más taquillera de todos los tiempos. La nueva película está protagonizada por Joaquin Phoenix una vez más en su papel dual ganador del Oscar como Arthur Fleck/Guasón, junto a la ganadora del Oscar Lady Gaga (“A Star Is Born”). “Guasón 2: Folie À Deux” encuentra a Arthur Fleck institucionalizado en Arkham esperando juicio por sus crímenes como Guasón. Mientras lucha con su doble identidad, Arthur no sólo tropieza con el verdadero amor, sino que también encuentra la música que siempre ha estado dentro de él.', 5, '2024-10-03'),
(3, 2, 'El Jockey', 'Luis Ortega', 'Remo Manfredini es una leyenda del turf, pero su conducta excéntrica y autodestructiva comienza a eclipsar su talento. Abril, jocketa y pareja de Remo, espera un hijo suyo y debe decidir entre continuar con su embarazo o seguir corriendo. Ambos corren caballos para Sirena, un empresario obsesionado con el jockey. Un día Remo sufre un accidente, desaparece del hospital y deambula sin identidad por las calles de Buenos Aires. Sirena lo quiere vivo o muerto mientras Abril intenta encontrarlo antes de que sea demasiado tarde', 6, '2024-09-26'),
(4, 5, 'Romper El Círculo', 'Justin Baldoni', 'ROMPER EL CÍRCULO, la primera novela de Colleen Hoover adaptada para la pantalla grande, cuenta la apasionante historia de Lily Bloom (Blake Lively), una mujer que supera una infancia traumática para embarcarse en una nueva vida en Boston y perseguir el sueño de toda una vida: abrir su propio negocio. Un encuentro casual con el encantador neurocirujano Ryle Kincaid (Justin Baldoni) desencadena una intensa conexión, pero a medida que ambos se enamoran profundamente, Lily empieza a ver en Ryle aspectos que le recuerdan a la relación de sus padres. Cuando el primer amor de Lily, Atlas Corrigan (Brandon Sklenar), repentinamente vuelve a entrar en su vida, su relación con Ryle se ve alterada y Lily se da cuenta de que debe aprender a confiar en su propia fortaleza para tomar una difícil decisión para su futuro.', 6, '2024-08-15'),
(5, 1, 'Beetlejuice Beetlejuice', 'Tim Burton', 'Después de una tragedia, tres generaciones de la familia Deetz regresan a Winter River. Aún atormentada por Beetlejuice, la vida de Lydia da un vuelco cuando su rebelde hija adolescente, Astrid, descubre el misterioso modelo de la ciudad en el ático.', 6, '2024-09-05'),
(6, 4, 'Son Como Niños 2', 'Dennis Dugan', 'Tres años después de la reunión que volvió a unirlo a sus amigos de la infancia, Lenny Feder regresa junto a su familia a su pueblo natal para poder estar más cerca de sus amigos.', 6, '2013-09-19'),
(19, 6, 'Star Wars Episodio IX', 'J. J. Abrams', 'Finn y Poe guían a la Resistencia para detener los planes de la Primera Orden para formar un nuevo imperio, mientras Rey anticipa un enfrentamiento inevitable con Kylo Ren.', 8, '2019-12-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `contraseña` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `user`, `contraseña`) VALUES
(1, 'webadmin', '$2y$10$JZ2mhPdN9GE8MDib8qte4OamkMBr99SKj9V.K935FA0LIAJvVqMly');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id_pelicula`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
