<?php 

class UserModel {

    public function __construct(){
        $db = $this->connect();
        $this->__deploy();
    }

    function connect(){

        $db = new PDO('mysql:host=localhost;' . 'dbname=pelicula;charset=utf8', 'root', '');
        return $db;
    }

    function getUser($nombre){

        $db = $this->connect();

        $query = $db-> prepare('SELECT * from usuario WHERE user = ?');
        $query -> execute([$nombre]);

        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }

    private function __deploy(){
        $db = $this->connect();
        $query = $db->query('SHOW TABLES like "usuario"');
        $tables = $query->fetchAll();
        if (count($tables) == 0) {
            $contraseña = password_hash('admin', PASSWORD_DEFAULT);
    
            $sql = <<<END
                CREATE TABLE `usuario` (
                    `id_usuario` int(11) NOT NULL,
                    `user` varchar(20) NOT NULL,
                    `contraseña` varchar(60) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
                INSERT INTO `usuario` (`id_usuario`, `user`, `contraseña`) VALUES(1, 'webadmin', '$contraseña');
            END;
            $db->query($sql);
        }
    }
}