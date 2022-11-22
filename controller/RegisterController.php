<?php


class RegisterController {
    private $renderer;
    private $model;
    private $mailer;
    public function __construct($render, $model,$mailer) {
        $this->renderer = $render;
        $this->model = $model;
        $this->mailer = $mailer;
    }

    public function default() {
        $this->renderer->render("Register.mustache");
    }

    public function alta(){
        $nombre = $_POST["nombre"]??'';;
        $apellido = $_POST["apellido"]??'';;
        $mail = $_POST["mail"]??Redirect::doIt('/');;
        $password = md5($_POST["password"])??Redirect::doIt('/');;
        $tipo = $_POST["tipo"]??"2";
        $res = $this->model->buscarUsuario($mail);
        $hash = md5($mail);
        if($res){
            Redirect::doIt("/"); //yaexiste
        } else {
            $this->model->alta($nombre,$apellido,$mail,$password, $tipo);
            $this->mailer->enviar($mail, "<a href='http://localhost/authentication/procesar?mail=$mail&hash=$hash' class='myButton'>Validar Mail</a>");
            Redirect::doIt("/authentication");
        }

    }

}