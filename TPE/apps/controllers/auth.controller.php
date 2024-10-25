<?php

require_once 'apps/models/user.model.php';
require_once 'apps/views/auth.view.php';

class AuthController {

    private $model;
    private $view;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    function showLogin(){

        return $this->view->showLogin($error='');
    }

    public function authLogin() {

        if (!isset($_POST['user']) || empty($_POST['user'])) {
            $error = 'Falta Completar el nombre de usuario';
            return $this->view->showLogin($error);
        }
    
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            $error = 'Falta Completar la contraseña';
            return $this->view->showLogin($error);
        }
    
        $nombre = htmlspecialchars($_POST['user']);
        $contraseña = htmlspecialchars($_POST['password']);
    
        $userFromDB = $this->model->getUser($nombre);
    
        if ($userFromDB && password_verify($contraseña, $userFromDB->contraseña)) {
            session_start();
            $_SESSION['ID_Usuario'] = $userFromDB->id_usuario;
            $_SESSION['usuario'] = $userFromDB->user;
    
            header('Location: ' . BASE_URL . 'Generos');
            exit();
        } else {
            $error='Usuario o contraseña incorrectos. Intente de nuevo.';
            return $this->view->showLogin($error);
        }
    }
    

    public function logout(){

        session_start();
        session_destroy();
        header('Location: ' . BASE_URL . "Generos");

    }
}