<?php

class AuthView {

    public $user = null;

    public function setUser($user) {
        $this->user = $user;
    }

    public function showLogin($error) {
        session_start();
        $user = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
        include ('templates/formularioLogueo.phtml');
    }
}