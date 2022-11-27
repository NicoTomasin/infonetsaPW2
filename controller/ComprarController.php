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
        $producto = $_POST["producto"] ?? Redirect::doIt('/');;
        $edicion = $_POST["edicion"] ?? Redirect::doIt('/');;
        $usuario = $_SESSION['UsrMail'] ?? Redirect::doIt('/');;
        $this->model->comprarEdicion($usuario, $producto, $edicion);
        Redirect::doIt('/');
    }
    public function suscripcion()
    {
        $producto = $_POST["producto"] ?? Redirect::doIt('/');;
        $usuario = $_SESSION['UsrMail'] ?? Redirect::doIt('/');;
        $date = date('Y-m-d', time());
        $expirationDate = date('Y-m-d', strtotime("+1 months", strtotime($date)));
        $this->model->suscripcion($usuario, $producto, $date, $expirationDate);
        Redirect::doIt('/');
    }
    public function extender()
    {
        $producto = $_POST["productosSubscriptos"] ?? Redirect::doIt('/');;
        $usuario = $_SESSION['UsrMail'] ?? Redirect::doIt('/');;
        $date = date('Y-m-d', time());
        $expirationDate = date('Y-m-d', strtotime("+1 months", strtotime($date)));
        $this->model->extender($usuario, $producto, $date, $expirationDate);
        Redirect::doIt('/');
    }

}