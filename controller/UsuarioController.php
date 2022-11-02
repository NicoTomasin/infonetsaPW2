<?php

class UsuarioController{

    private $view;
    private $model;
    private $modelArticulos;
    private $modelProducto;
    public function __construct($view,$model,$modelArticulos,$modelProducto) {
        $this->view = $view;
        $this->model = $model;
        $this->modelArticulos = $modelArticulos;
        $this->modelProducto = $modelProducto;
    }
    public function datosDelUsuario()
    {
        $datos['usuario'] =  $this->model->buscarDatosDelUsuario($_SESSION['UsrMail']);
        $datos['tiposDeProductos'] =  $this->modelProducto->buscarTiposDeProductos();
        $datos['secciones'] =  $this->modelProducto->buscarSecciones();
        $datos['productos'] =  $this->modelProducto->buscarProductos();
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
    public function datosDelLector()
    {
        $datos =  $this->datosDelUsuario();
        $datos['articulos'] =  $this->modelArticulos->buscarTodosLosArticulosActivos();
        return $datos;
    }
}