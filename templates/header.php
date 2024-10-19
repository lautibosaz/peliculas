<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <base href="<?php echo BASE_URL ?>">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="header">
            <h1>ShowTime!
                <?php
                if (isset($_SESSION['usuario'])) {
                    echo "<span>" . htmlspecialchars($_SESSION['usuario']) . "</span>";
                }
                ?>
            </h1>
            <nav>
                <ul>
                    <li><a href="Generos">Generos</a></li>
                    <li><a href="Peliculas">Peliculas</a></li>
                    <?php
                    if (isset($_SESSION['usuario'])) {
                        echo "<li><a href='Logout'>Logout</a></li>";
                    } else {
                        echo "<li><a href='Login'>Login</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </header>