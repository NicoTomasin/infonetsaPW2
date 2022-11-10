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
        $logo = $_POST["logo"] ?? '';
        $descripcion = $_POST["descripcion"] ?? '';
        $this->model->agregarProducto($nombre, $tipo,$descripcion,$logo);
        Redirect::doIt('/');
    }
    public function eliminar()
    {
        $id = $_POST["id"] ?? '';
        $this->model->eliminarProducto($id);
        Redirect::doIt('/');
    }


}