<?php

class ProductoController
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
        $tipo = $_POST["tipo"] ?? '';
        $this->model->agregarProducto($nombre, $tipo);
        Redirect::doIt('/');
    }



}