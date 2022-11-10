<?php

class SeccionesController
{
    private $renderer;
    private $model;

    public function __construct($render, $model)
    {
        $this->renderer = $render;
        $this->model = $model;
    }

    public function agregar()
    {
        $nombre = $_POST["nombre"] ?? '';
        $this->model->agregarSeccion($nombre);
        Redirect::doIt('/');
    }
    public function eliminar()
    {
        $nombre = $_POST["nombre"] ?? '';
        $this->model->eliminarSeccion($nombre);
        Redirect::doIt('/');
    }


}