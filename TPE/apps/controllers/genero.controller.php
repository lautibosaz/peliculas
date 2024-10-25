<?php

require_once 'apps/models/genero.model.php';
require_once 'apps/views/genero.view.php';

class GeneroController
{

    private $model;
    private $view;

    function __construct(){
        $this->model = new GeneroModel();
        $this->view = new GeneroView();
    }

    function showGeneros(){

        $genero = $this->model->getGeneros();

        $this->view->showGeneros($genero);
    }

    function showDefault(){
        header("Location: " . BASE_URL . "Generos");
        die();
    }

    public function agregarGenero(){
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view->showAgregarGenero($error = '');
        }

        else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $genero = htmlspecialchars($_POST['genero']);
            $descripcion = htmlspecialchars($_POST['descripcion']);

            if (empty($genero) || empty($descripcion)) {
                $error = "Faltan campos por completar";
                $this->view->showAgregarGenero($error);
                return;
            }

            $this->model->agregarGenero($genero, $descripcion);

            header("Location: " . BASE_URL . "Generos");
            die();
        }
    }

    public function editarGenero($nombreGenero){

        $Genero = $this->model->getGeneroByNombre($nombreGenero);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view->showEditarGenero($Genero, $error='');
        }

        else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $genero = htmlspecialchars($_POST['genero']);
            $descripcion = htmlspecialchars($_POST['descripcion']);

            if (empty($genero) || empty($descripcion)) {
                $error = "Faltan campos por completar";
                $this->view->showEditarGenero($Genero, $error);
                return;
            }

            $idGenero = $Genero->id_genero;

            $this->model->editarGenero($genero, $descripcion, $idGenero);

            header("Location: " . BASE_URL . "Generos");
            die();
        }
    }

    public function eliminarGenero($genero)
    {
        $genero = $this->model->getGeneroByNombre($genero);
        $idGenero = $genero->id_genero;

        $this->model->eliminargENERO($idGenero);

        header("Location: " . BASE_URL . "Generos");
    }
}
