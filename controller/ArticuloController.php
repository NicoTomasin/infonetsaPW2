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
        echo $titulo, $subtitulo, $fecha, $empresa, $cuerpo;
        //TODO: llamar al model y dar de alta en espera
    }

}