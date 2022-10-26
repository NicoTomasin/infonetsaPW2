<?php
class PublicacionController
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
        $this->renderer->render("CrearPublicacion.mustache");
    }

}