<?php

require_once 'apps/models/pelicula.model.php';
require_once 'apps/views/pelicula.view.php';

class PeliculaController
{

    private $model;
    private $modelGenero;
    private $view;

    function __construct(){
        $this->model = new PeliculaModel();
        $this->view = new PeliculaView();
        $this->modelGenero = new GeneroModel();
    }

    function showPeliculas(){

        $peliculas = $this->model->getPeliculas();
        $generos = $this->modelGenero->getGeneros();

        $this->view->showPeliculas($peliculas, $generos);
    }

    function showPeliculasByGenero($nombreGenero){

        $genero = $this->model->getGeneroByNombre($nombreGenero);
        $idGenero = $genero->id_genero;
        $peliculas = $this->model->getPeliculasByGenero($idGenero);

        $this->view->showPeliculasByGenero($genero, $peliculas);
    }

    function showInfoPelicula($nombrePelicula){

        $pelicula = $this->model->getPeliculaByNombre($nombrePelicula);
        $genero = $this->model->getGeneroByID($pelicula->id_genero);

        $this->view->showInfoPelicula($pelicula, $genero->genero);
    }

    public function agregarPeliculaPorGenero($nombreGenero){

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view->showAgregarPeliculaGenero($nombreGenero, $error = '');
        }

        else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $genero = $this->model->getGeneroByNombre($nombreGenero);
            $idGenero = $genero->id_genero;

            $titulo = htmlspecialchars($_POST['titulo']);
            $director = htmlspecialchars($_POST['director']);
            $descripcion = htmlspecialchars($_POST['descripcion']);
            $calificacion = htmlspecialchars($_POST['calificacion']);
            $estreno = htmlspecialchars($_POST['estreno']);

            if (empty($titulo) || empty($director) || empty($descripcion) || empty($calificacion) || empty($estreno)) {
                $error = "Faltan campos por completar";
                return $this->view->showAgregarPeliculaGenero($nombreGenero, $error);
            } else if ($calificacion < 0 || $calificacion > 10){
                $error = "Ingrese un valor entre 0 y 10 para la calificacion";
                return $this->view->showAgregarPeliculaGenero($nombreGenero, $error);
            }

            $this->model->agregarPeliculaPorGenero($idGenero, $titulo, $director, $descripcion, $calificacion, $estreno);

            header("Location: " . BASE_URL . "Peliculas/" . urldecode(htmlspecialchars($nombreGenero)));
            die();
        }
    }

    public function agregarPelicula(){
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $generos = $this->model->getGeneros();
            $this->view->showAgregarPelicula($error = '', $generos);
        }

        else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $generos = $this->model->getGeneros();

            $idGenero = htmlspecialchars($_POST['genero']);
            $titulo = htmlspecialchars($_POST['titulo']);
            $director = htmlspecialchars($_POST['director']);
            $descripcion = htmlspecialchars($_POST['descripcion']);
            $calificacion = htmlspecialchars($_POST['calificacion']);
            $estreno = htmlspecialchars($_POST['estreno']);

            if (empty($titulo) || empty($director) || empty($descripcion) || empty($calificacion) || empty($estreno)) {
                $error = "Faltan campos por completar";
                return $this->view->showAgregarPelicula($error, $generos);
            } else if ($calificacion < 0 || $calificacion > 10){
                $error = "Ingrese un valor entre 0 y 10 para la calificacion";
                return $this->view->showAgregarPelicula($error, $generos);
            }

            $this->model->agregarPeliculaPorGenero($idGenero, $titulo, $director, $descripcion, $calificacion, $estreno);

            header("Location: " . BASE_URL . "Peliculas");
            die();
        }
    }

    public function editarPelicula($nombreGenero, $idPelicula){

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view->showEditarPelicula($nombreGenero, $idPelicula, $error = '');
        }

        else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $genero = $this->model->getGeneroByNombre($nombreGenero);
            $idGenero = $genero->id_genero;

            $titulo = htmlspecialchars($_POST['titulo']);
            $director = htmlspecialchars($_POST['director']);
            $descripcion = htmlspecialchars($_POST['descripcion']);
            $calificacion = htmlspecialchars($_POST['calificacion']);
            $estreno = htmlspecialchars($_POST['estreno']);

            if (empty($titulo) || empty($director) || empty($descripcion) || empty($calificacion) || empty($estreno)) {
                $error = "Faltan campos por completar";
                return $this->view->showAgregarPelicula($nombreGenero, $error);
            } else if ($calificacion < 0 || $calificacion > 10){
                $error = "Ingrese un valor entre 0 y 10 para la calificacion";
                return $this->view->showAgregarPelicula($nombreGenero, $error);
            }

            $this->model->editarPelicula($idGenero, $titulo, $director, $descripcion, $calificacion, $estreno, $idPelicula);

            header("Location: " . BASE_URL . "Peliculas/" . urldecode(htmlspecialchars($nombreGenero)));
            die();
        }
    }

    public function eliminarPelicula($genero, $idPelicula){

        if (isset($idPelicula)) {
            $this->model->eliminarPelicula($idPelicula);

            header("Location: " . BASE_URL . "Peliculas/" . urldecode(htmlspecialchars($genero)));
        }
    }
}
