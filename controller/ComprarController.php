<?php

class ComprarController
{
    private $renderer;
    private $model;

    public function __construct($render, $model)
    {
        $this->renderer = $render;
        $this->model = $model;
    }

    public function edicion()
    {
        $producto = $_POST["producto"] ?? '';
        $edicion = $_POST["edicion"] ?? '';
        $usuario = $_SESSION['UsrMail'] ?? '';
        $this->model->comprarEdicion($usuario, $producto, $edicion);
        Redirect::doIt('/');
    }
    public function suscripcion()
    {
        $producto = $_POST["producto"] ?? '';
        $usuario = $_SESSION['UsrMail'] ?? '';
        $date = date('Y-m-d', time());
        $expirationDate = date('Y-m-d', strtotime("+3 months", strtotime($date)));
        $this->model->suscripcion($usuario, $producto, $date, $expirationDate);
        Redirect::doIt('/');
    }
}