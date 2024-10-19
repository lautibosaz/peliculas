<?php 

class GeneroModel {

    public function __construct()
    {
        $db = $this->connect();
        $this->__deploy();
    }

    function connect(){

        $db = new PDO('mysql:host=localhost;' . 'dbname=pelicula;charset=utf8', 'root', '');
        return $db;
    }

    function getGeneros(){

        $db = $this->connect();

        $query = $db-> prepare('SELECT * from genero');
        $query -> execute();

        $generos = $query->fetchAll(PDO::FETCH_OBJ);

        return $generos;
    }

    function getGeneroByNombre($nombreGenero) {

        $db = $this->connect();

        $query = $db->prepare('SELECT * FROM genero WHERE genero = ?'); 
        $query->execute([$nombreGenero]);

        $genero = $query->fetch(PDO::FETCH_OBJ); 

        return $genero;
    }

    public function agregarGenero($genero, $descripcion){
        $db = $this->connect();
        try {
            $query = $db->prepare('INSERT INTO `genero`(`genero`, `descripcion`) VALUES (?, ?)');
            $query->execute([$genero, $descripcion]);
            echo 'Serie agregada correctamente';
        } catch (PDOException $e) {
            echo 'Error al agregar la serie: ' . $e->getMessage();
        }
    }

    public function editarGenero($genero, $descripcion, $idGenero){

        $db = $this->connect();
        try {
            $query = $db->prepare('UPDATE genero SET genero=?, descripcion=? WHERE id_genero = ?');
            $query->execute([$genero, $descripcion, $idGenero]);
            
            echo 'Película actualizada correctamente';
        } catch (PDOException $e) {
            echo 'Error al actualizar la película: ' . $e->getMessage();
        }
    }

    public function eliminarGenero($idGenero){
        $db = $this->connect();

        $query = $db->prepare('DELETE FROM genero WHERE id_genero = ?');
        $query->execute([$idGenero]);
    }

    private function __deploy() {
        $db = $this->connect();
        $query = $db->query('SHOW TABLES like "genero"');
        $tables = $query->fetchAll();
        if (count($tables) == 0) {
            $sql = <<<END
                CREATE TABLE `genero` (
                    `id_genero` int(11) NOT NULL,
                    `genero` varchar(45) NOT NULL,
                    `descripcion` varchar(500) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                INSERT INTO `genero` (`id_genero`, `genero`, `descripcion`) VALUES
                (1, 'Terror', 'El cine de terror es un género cinematográfico que se caracteriza por su voluntad de provocar en el espectador sensaciones de pavor, terror, miedo, disgusto, repugnancia, horror, incomodidad o preocupación.'),
                (2, 'Accion', 'El cine de acción es un género cinematográfico donde prima la espectacularidad de las imágenes por medio de efectos especiales de estilo "clásico". La denominación es más un convencionalismo popular, que un género cinematográfico puro acuñado por críticos, estudiosos o cineastas.'),
                (3, 'Drama', 'Como género cinematográfico, el drama siempre plantea conflictos entre los personajes principales de la narración fílmica y provoca una respuesta emotiva en el espectador, a quien conmueve, debido a que interpela su sensibilidad.'),
                (4, 'Comedia', 'El cine de comedia se caracteriza por ser alegre, y diseñado para divertir y provocar en el espectador una risa contagiosa que les lleve a evadirse del mundo real.'),
                (5, 'Romance', 'El cine romántico es un género cinematográfico que se caracteriza por retratar argumentos construidos de eventos y personajes relacionados con la expresión del amor y las relaciones románticas.'),
                (6, 'Ciencia Ficcion', 'El cine de ciencia ficción se ha utilizado en ocasiones para comentar críticamente aspectos políticos o sociales, utopías, distopías o ucronías y para explorar cuestiones filosóficas como la definición del ser humano, sus alcances y futuro o destino, el inicio de su existencia o su predecible final, apocalíptico o no.');
            END;
            $db->query($sql);
        }
    }
}