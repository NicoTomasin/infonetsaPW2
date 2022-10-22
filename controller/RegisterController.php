<?php

class RegisterController {
    private $renderer;
    private $model;

    public function __construct($render, $model) {
        $this->renderer = $render;
        $this->model = $model;
    }

    public function list() {
        echo "nada";
    }

    public function alta(){
        $this->renderer->render("RegisterFrom.mustache");
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