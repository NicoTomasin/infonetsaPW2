<?php


class AuthenticationController
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
        $this->renderer->render("Authentication.mustache");
        $mail = $_GET["mail"] ?? '';
        echo md5($mail);

    }
    public function success()
    {
        $this->renderer->render("AuthenticationSuccess.mustache");
    }

    public function procesar()
    {
        $mail = $_GET["mail"] ?? '';
        $hashObtenido = $_GET["hash"] ?? '';
        $respuesta = $this->model->buscarUsuarioParaAutenticar($mail);
        if($respuesta[0]['estado']){
            Redirect::doIt('/');
        } else {
            $hashEsperado = $this->model->buscarHashDeUsuario($mail);
            echo var_dump($hashEsperado);
            if($hashObtenido == $hashEsperado[0]['authCode']){
                $this->model->authenticarUsuario($mail);
                Redirect::doIt('/authentication/success');
            }else{
                Redirect::doIt('/');
            }
        }



    }

}