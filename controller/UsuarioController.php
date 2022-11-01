<?php

class UsuarioController{

    private $view;
    private $model;
    private $modelArticulos;
    public function __construct($view,$model,$modelArticulos) {
        $this->view = $view;
        $this->model = $model;
        $this->modelArticulos = $modelArticulos;
    }
    public function datosDelUsuario()
    {
        $datos['usuario'] =  $this->model->buscarDatosDelUsuario($_SESSION['UsrMail']);
        switch ($datos['usuario'][0]['tipo']){
            case '1':
                $datos['usuario']['esAdmin'] = true;
                break;
            case '2':
                $datos['usuario']['esLector'] = true;
                break;
            case '3':
                $datos['usuario']['esEscritor'] = true;
                break;
            case '4':
                $datos['usuario']['esEditor'] = true;
                break;
        }
        return $datos;
    }
    public function datosDelUsuarioEditor()
    {
        $datos =  $this->datosDelUsuario();
        $datos['articulosPendientes'] =  $this->modelArticulos->buscarArticulosPendientes();
        return $datos;

    }
}