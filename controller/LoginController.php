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

    public function procesar(){
        $mail = $_POST["mail"]??'';
        $password = $_POST["password"]??'';
        $respuesta = $this->model->buscarUsuario($mail);
        if($password === $respuesta[0]['password']){
            echo"login piola";
        } else {
            Redirect::doIt('/');
        }

    }

}