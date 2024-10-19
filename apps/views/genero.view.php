<?php

class GeneroView {

    function showGeneros($generos){

        include('templates/listaGeneros.phtml');
    }

    function showAgregarGenero($error){

        include('templates/agregarGenero.phtml');
    }

    function showEditarGenero($idGenero, $error){

        include('templates/editarGenero.phtml');
    }
    
}