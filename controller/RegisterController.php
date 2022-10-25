<?php

class RegisterController {
    private $renderer;
    private $model;

    public function __construct($render, $model) {
        $this->renderer = $render;
        $this->model = $model;
    }

    public function default() {
        $this->renderer->render("Register.mustache");
    }

    public function alta(){
        $nombre = $_POST["nombre"]??'';
        $apellido = $_POST["apellido"]??'';
        $mail = $_POST["mail"]??'';
        $password = md5($_POST["password"])??'';
        $res = $this->model->buscarUsuario($mail);
        if($res){
            Redirect::doIt("/"); //yaexiste
        } else {
            $this->model->alta($nombre,$apellido,$mail,$password);
            Redirect::doIt("/authentication?mail=$mail");
        }

    }

}