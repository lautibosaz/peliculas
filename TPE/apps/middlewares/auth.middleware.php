<?php

function sessionAuthMiddleware($res, $requireLogin = true)
{
    session_start();

    if ($requireLogin) {
        if (isset($_SESSION['ID_Usuario'])) {
            $res->user = new stdClass();
            $res->user->id = $_SESSION['ID_Usuario'];
            $res->user->usuario = (string) $_SESSION['usuario'];
            return;
        } else {
            header('Location: ' . BASE_URL . 'Login');
            die();
        }
    }
}
