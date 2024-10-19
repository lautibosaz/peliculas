<?php

function sessionAuthMiddleware ($res, $requireLogin = true) {
    if(!session_start()){
        session_start();
    }
    if ($requireLogin) {
        if (isset($_SESSION['ID_Usuario'])) {
            $res->user = new stdClass();
            $res->user->id = $_SESSION['ID_Usuario'];
            $res->user->usuario = (String) $_SESSION['usuario'];
        } else {
            header('Location: ' . BASE_URL . 'Login');
            die();
        }
    }
}

?>