<?php

class PeliculaModel
{


    public function __construct()
    {
        $db = $this->connect();
        $this->__deploy();
    }


    function connect()
    {

        $db = new PDO('mysql:host=localhost;' . 'dbname=pelicula;charset=utf8', 'root', '');
        return $db;
    }

    function getPeliculas()
    {

        $db = $this->connect();

        $query = $db->prepare('SELECT * from peliculas');
        $query->execute();

        $peliculas = $query->fetchAll(PDO::FETCH_OBJ);

        return $peliculas;
    }

    function getGeneros()
    {

        $db = $this->connect();

        $query = $db->prepare('SELECT * from genero');
        $query->execute();

        $generos = $query->fetchAll(PDO::FETCH_OBJ);

        return $generos;
    }

    function getGeneroByNombre($nombreGenero)
    {

        $db = $this->connect();

        $query = $db->prepare('SELECT * FROM genero WHERE genero = ?');
        $query->execute([$nombreGenero]);

        $genero = $query->fetch(PDO::FETCH_OBJ);

        return $genero;
    }

    function getGeneroByID($idGenero)
    {

        $db = $this->connect();

        $query = $db->prepare('SELECT * FROM genero WHERE id_genero = ?');
        $query->execute([$idGenero]);

        $genero = $query->fetch(PDO::FETCH_OBJ);

        return $genero;
    }

    function getPeliculasByGenero($idGenero)
    {

        $db = $this->connect();

        $query = $db->prepare('SELECT * from peliculas WHERE id_genero = ?');
        $query->execute([$idGenero]);

        $peliculas = $query->fetchAll(PDO::FETCH_OBJ);

        return $peliculas;
    }

    function getPeliculaByNombre($nombrePelicula)
    {

        $db = $this->connect();

        $query = $db->prepare('SELECT * from peliculas WHERE titulo = ?');
        $query->execute([$nombrePelicula]);

        $pelicula = $query->fetch(PDO::FETCH_OBJ);

        return $pelicula;
    }

    public function agregarPeliculaPorGenero($idGenero, $titulo, $director, $descripcion, $calificacion, $estreno)
    {
        $db = $this->connect();
        try {
            $query = $db->prepare('INSERT INTO `peliculas`(`id_genero`, `titulo`, `director`, `descripcion`, `calificacion`, `estreno`) VALUES (?, ?, ?, ?, ?, ?)');
            $query->execute([$idGenero, $titulo, $director, $descripcion, $calificacion, $estreno]);
            echo 'Serie agregada correctamente';
        } catch (PDOException $e) {
            echo 'Error al agregar la serie: ' . $e->getMessage();
        }
    }

    public function editarPelicula($idGenero, $titulo, $director, $descripcion, $calificacion, $estreno, $idPelicula)
    {

        $db = $this->connect();
        try {
            $query = $db->prepare('UPDATE peliculas SET id_genero=?, titulo=?, director=?, descripcion=?, calificacion=?, estreno=? WHERE id_pelicula = ?');
            $query->execute([$idGenero, $titulo, $director, $descripcion, $calificacion, $estreno, $idPelicula]);

            echo 'Película actualizada correctamente';
        } catch (PDOException $e) {
            echo 'Error al actualizar la película: ' . $e->getMessage();
        }
    }

    public function eliminarPelicula($idPelicula)
    {

        $db = $this->connect();

        $query = $db->prepare('DELETE FROM peliculas WHERE id_pelicula = ?');
        $query->execute([$idPelicula]);
    }

    private function __deploy()
    {
        $db = $this->connect();
        $query = $db->query('SHOW TABLES like "peliculas"');
        $tables = $query->fetchAll();
        if (count($tables) == 0) {
            $sql = <<<END
                CREATE TABLE `peliculas` (
                    `id_pelicula` int(11) NOT NULL,
                    `id_genero` int(11) NOT NULL,
                    `titulo` varchar(45) NOT NULL,
                    `director` varchar(45) NOT NULL,
                    `descripcion` text NOT NULL,
                    `calificacion` int(11) NOT NULL,
                    `estreno` date NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
                INSERT INTO `peliculas` (`id_pelicula`, `id_genero`, `titulo`, `director`, `descripcion`, `calificacion`, `estreno`) VALUES
                (1, 3, 'Joker 2', 'Todd Phillips', 'Del aclamado escritor/director/productor Todd Phillips llega “Guasón 2: Folie À Deux,” la tan esperada continuación de “Guasón” de 2019, ganadora del Premio de la Academia, que recaudó más de $1 mil millones en la taquilla mundial y sigue siendo la película clasificada R más taquillera de todos los tiempos. La nueva película está protagonizada por Joaquin Phoenix una vez más en su papel dual ganador del Oscar como Arthur Fleck/Guasón, junto a la ganadora del Oscar Lady Gaga (“A Star Is Born”). “Guasón 2: Folie À Deux” encuentra a Arthur Fleck institucionalizado en Arkham esperando juicio por sus crímenes como Guasón. Mientras lucha con su doble identidad, Arthur no sólo tropieza con el verdadero amor, sino que también encuentra la música que siempre ha estado dentro de él.', 5, '2024-10-03'),
                (2, 2, 'El Jockey', 'Luis Ortega', 'Remo Manfredini es una leyenda del turf, pero su conducta excéntrica y autodestructiva comienza a eclipsar su talento. Abril, jocketa y pareja de Remo, espera un hijo suyo y debe decidir entre continuar con su embarazo o seguir corriendo. Ambos corren caballos para Sirena, un empresario obsesionado con el jockey. Un día Remo sufre un accidente, desaparece del hospital y deambula sin identidad por las calles de Buenos Aires. Sirena lo quiere vivo o muerto mientras Abril intenta encontrarlo antes de que sea demasiado tarde', 6, '2024-09-26'),
                (3, 5, 'Romper El Círculo', 'Justin Baldoni', 'ROMPER EL CÍRCULO, la primera novela de Colleen Hoover adaptada para la pantalla grande, cuenta la apasionante historia de Lily Bloom (Blake Lively), una mujer que supera una infancia traumática para embarcarse en una nueva vida en Boston y perseguir el sueño de toda una vida: abrir su propio negocio. Un encuentro casual con el encantador neurocirujano Ryle Kincaid (Justin Baldoni) desencadena una intensa conexión, pero a medida que ambos se enamoran profundamente, Lily empieza a ver en Ryle aspectos que le recuerdan a la relación de sus padres. Cuando el primer amor de Lily, Atlas Corrigan (Brandon Sklenar), repentinamente vuelve a entrar en su vida, su relación con Ryle se ve alterada y Lily se da cuenta de que debe aprender a confiar en su propia fortaleza para tomar una difícil decisión para su futuro.', 6, '2024-08-15'),
                (4, 1, 'Beetlejuice Beetlejuice', 'Tim Burton', 'Después de una tragedia, tres generaciones de la familia Deetz regresan a Winter River. Aún atormentada por Beetlejuice, la vida de Lydia da un vuelco cuando su rebelde hija adolescente, Astrid, descubre el misterioso modelo de la ciudad en el ático.', 6, '2024-09-05'),
                (5, 4, 'Son Como Niños 2', 'Dennis Dugan', 'Tres años después de la reunión que volvió a unirlo a sus amigos de la infancia, Lenny Feder regresa junto a su familia a su pueblo natal para poder estar más cerca de sus amigos.', 6, '2013-09-19'),
                (6, 6, 'Star Wars Episodio IX', 'J. J. Abrams', 'Finn y Poe guían a la Resistencia para detener los planes de la Primera Orden para formar un nuevo imperio, mientras Rey anticipa un enfrentamiento inevitable con Kylo Ren.', 8, '2019-12-19');
            END;
            $db->query($sql);
        }
    }
}
