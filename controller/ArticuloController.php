<?php
class ArticuloController
{
    private $renderer;
    private $model;

    public function __construct($render, $model)
    {
        $this->renderer = $render;
        $this->model = $model;
    }

    public function crear()
    {
        $titulo = $_POST["titulo"] ?? '';
        $subtitulo = $_POST["subtitulo"] ?? '';
        $fecha = $_POST["fecha"] ?? '';
        $empresa = $_POST["empresa"] ?? '';
        $cuerpo = $_POST["cuerpo"] ?? '';
        $escritor = $_SESSION['UsrMail'];
        $this->model->ponerEnEspera($titulo, $subtitulo, $fecha, $empresa, $cuerpo, $escritor);
        Redirect::doIt('/home/escritor');
    }
    public function eliminar()
    {
        $titulo = $_POST["titulo"] ?? '';
        $escritor = $_POST["escritor"] ?? '';
        $this->model->eliminar($titulo, $escritor);
        Redirect::doIt('/home/editor');
    }
    public function publicar()
    {
        $titulo = $_POST["titulo"] ?? '';
        $escritor = $_POST["escritor"] ?? '';
        $this->model->publicar($titulo, $escritor);
        Redirect::doIt('/home/editor');
    }
    public function correccion()
    {
       //TODO:Dar al escritor la chance de editarlo
    }

}