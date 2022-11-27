<?php

class UsuarioController{

    private $view;
    private $model;
    private $modelArticulos;
    private $modelProducto;
    private $modelSecciones;
    public function __construct($view,$model,$modelArticulos,$modelProducto,$modelSecciones) {
        $this->view = $view;
        $this->model = $model;
        $this->modelArticulos = $modelArticulos;
        $this->modelProducto = $modelProducto;
        $this->modelSecciones = $modelSecciones;
    }
    public function datosDelUsuario()
    {
        $datos['usuario'] =  $this->model->buscarDatosDelUsuario($_SESSION['UsrMail']);
        $datos['tiposDeProductos'] =  $this->modelProducto->buscarTiposDeProductos();
        $datos['secciones'] =  $this->modelSecciones->buscarSecciones();
        $datos['productosSubscriptos']= $this->modelProducto->buscarproductosEnLosQueestoySubscripto();
        $datos['productos'] =  $this->modelProducto->buscarProductosqueNoEstoySuscripto();
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
        for($i = 0; $i < count($datos['articulosPendientes']); $i++){
            $datos['articulosPendientes'][$i]['imagen'] = base64_encode($datos['articulosPendientes'][$i]['imagen'] );
        }
        $datos['articulosActivos'] =  $this->modelArticulos->buscarTodosLosArticulosActivos();
        for($i = 0; $i < count($datos['articulosActivos']); $i++){
            $datos['articulosActivos'][$i]['imagen'] = base64_encode($datos['articulosActivos'][$i]['imagen'] );
        }
        return $datos;

    }
    public function datosDelLector()
    {
        $datos =  $this->datosDelUsuario();
        $datos['articulos'] =  $this->modelArticulos->buscarTodosLosArticulosActivos();
        return $datos;
    }
}