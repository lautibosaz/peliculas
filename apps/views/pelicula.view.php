<?php

class PeliculaView {

    function showPeliculas($peliculas){

        include('templates/listaPeliculas.phtml');
    }

    function showPeliculasByGenero($genero, $peliculas){

        include('templates/listaPeliculaPorGenero.phtml');
    }

    function showInfoPelicula($pelicula, $genero){

        include('templates/informacionPelicula.phtml');
    }

    function showAgregarPeliculaGenero($genero, $error){

        include('templates/agregarPeliculaGenero.phtml');
    }

    function showEditarPelicula($genero, $idPelicula, $error){

        include('templates/editarPelicula.phtml');
    }

    function showAgregarPelicula($error, $generos){
        include('templates/agregarPelicula.phtml');
    }
}