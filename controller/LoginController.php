<?php

class LoginController
{
    private $renderer;
    private $model;

    public function __construct($render, $model)
    {
        $this->renderer = $render;
        $this->model = $model;
    }

    public function default()
    {
        $this->renderer->render("Login.mustache");
    }

    public function procesar()
    {
        $mail = $_POST["mail"] ?? Redirect::doIt('/');;
        $password = md5($_POST["password"]) ?? Redirect::doIt('/');;
        $respuestaPass = $this->model->buscarUsuario($mail);
        $respuestaEstado = $this->model->buscarEstadoDeUsuario($mail); 

        if ($respuestaPass && $password === $respuestaPass[0]['password']) {
            if($respuestaEstado[0]['estado']){
                $res = $this->model->buscarTipoDeUsuario($mail);
                $_SESSION['UsrType'] = $res[0]['tipo'];
                $_SESSION['UsrMail'] = $mail;
                Redirect::doIt('/home');
            } else {
                Redirect::doIt("/authentication?mail=$mail");
            }
        } else {
            Redirect::doIt('/');
        }

    }
    public function logout()
    {
        session_destroy();
        Redirect::doIt('/');
    }
}