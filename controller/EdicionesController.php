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
        $producto = $_GET["producto"] ?? Redirect::doIt('/');;
        $data["ediciones"] = $this->model->buscarEdicionesDeUnProducto($producto);
        $data["usuario"] = $_SESSION['UsrMail'];
        $this->renderer->render('Ediciones.mustache', $data);
    }
}





