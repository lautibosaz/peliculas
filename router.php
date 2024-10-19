<?php

require_once 'libraries/response.php';
require_once 'apps/middlewares/auth.middleware.php';
require_once 'apps/controllers/genero.controller.php';
require_once 'apps/controllers/pelicula.controller.php';
require_once 'apps/controllers/auth.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$res = new Response();

$action = !empty($_GET["action"]) ? $_GET["action"] : '';

$params = explode("/", $action);

switch ($params[0]) {
    case 'Generos':
        sessionAuthMiddleware($res, false);
        $controller = new GeneroController();
        $controller->showGeneros();
        break;
    case 'Peliculas':
        $controller = new PeliculaController();
        if (isset($params[1]) && ($params[1]) === 'AgregarPelicula') {
            sessionAuthMiddleware($res, true);
            $controller->agregarPeliculaPorGenero($params[2]);
        }
        else if (isset($params[1])) {
            sessionAuthMiddleware($res, false);
            $controller->showPeliculasByGenero($params[1]); 
        } else {
            sessionAuthMiddleware($res, false);
            $controller->showPeliculas();
        }
        break;
    case 'AgregarPelicula':
        $controller = new PeliculaController();
        $controller->agregarPelicula();
        break;
    case 'InfoPelicula':
        sessionAuthMiddleware($res, false);
        $controller = new PeliculaController();
        $controller->showInfoPelicula($params[1]);
        break;
    case 'Login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'VerificacionLogueo':
        $controller = new AuthController();
        $controller->authLogin();
        break;
    case 'Logout':
        sessionAuthMiddleware($res);
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'EliminarPelicula':
        $controller = new PeliculaController();
        $controller->eliminarPelicula($params[1], $params[2]);
        break;
    case 'EditarPelicula':
        $controller = new PeliculaController();
        $controller->editarPelicula($params[1], $params[2]);
        break;
    case 'AgregarGenero':
        $controller = new GeneroController();
        $controller->agregarGenero();
        break;
    case 'EditarGenero':
        $controller = new GeneroController();
        $controller->editarGenero($params[1]);
        break;
    case 'EliminarGenero':
        $controller = new GeneroController();
        $controller->eliminarGenero($params[1]);
    default:
        $controller = new GeneroController();
        $controller->showDefault();
        break;
}
