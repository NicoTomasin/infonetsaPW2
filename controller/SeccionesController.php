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
    public function default()
    {
        $edicion= $_POST["edicion"] ?? '';
        $producto = $_POST["producto"] ?? '';
        $secciones=$this->model->seccionesporproducto($producto);
        $this->renderer->render("SeccionesDelProducto.mustache",$secciones);
    }



}