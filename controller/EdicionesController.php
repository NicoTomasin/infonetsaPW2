<?php

class EdicionesController
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
        $producto = $_GET["producto"] ?? '';
        $this->renderer->render('Ediciones.mustache', $this->model->buscarEdicionesDeUnProducto($producto));
    }
}





