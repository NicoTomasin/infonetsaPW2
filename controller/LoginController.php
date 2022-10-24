<?php

class LoginController {
    private $renderer;
    private $model;

    public function __construct($render, $model) {
        $this->renderer = $render;
        $this->model = $model;
    }

    public function default(){
        $this->renderer->render("Login.mustache");
    }

    public function procesarAlta(){
        $nombre = $_POST["nombre"]??'';
        $apellido = $_POST["apellido"]??'';
        $mail = $_POST["mail"]??'';
        $password = $_POST["password"]??'';

        $this->model->alta($nombre,$apellido,$mail,$password);

        Redirect::doIt('/');
    }

}