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
        $nombre = $_POST["nombre"] ?? Redirect::doIt('/');;
        $tipo = $_POST["tipo"] ?? Redirect::doIt('/');;
        $logo = $_POST["logo"] ?? Redirect::doIt('/');;
        $descripcion = $_POST["descripcion"] ?? Redirect::doIt('/');;
        $this->model->agregarProducto($nombre, $tipo,$descripcion,$logo);
        Redirect::doIt('/');
    }
    public function eliminar()
    {
        $id = $_POST["id"] ?? Redirect::doIt('/');;
        $this->model->eliminarProducto($id);
        Redirect::doIt('/');
    }


}