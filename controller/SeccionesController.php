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
        $nombre = $_POST["nombre"] ?? Redirect::doIt('/');;
        $this->model->agregarSeccion($nombre);
        Redirect::doIt('/');
    }
    public function eliminar()
    {
        $nombre = $_POST["nombre"] ?? Redirect::doIt('/');
        $this->model->eliminarSeccion($nombre);
        Redirect::doIt('/');
    }
    public function default()
    {   header('Cache-Control: no cache');
        session_cache_limiter('private_no_expire');
        if(isset($_SESSION['UsrMail'])){

            $usuario = $_SESSION['UsrMail'];
            $edicion= $_POST["edicion"] ?? Redirect::doIt('/');
            $producto = $_POST["producto"] ?? Redirect::doIt('/');
            if($this->model->verificarCompra($producto,$edicion,$usuario)){
                $secciones=$this->model->seccionesporproducto($producto,$edicion);
                if(isset($secciones)){}else
                {
                    Redirect::doIt('login.php');
                }

                $this->renderer->render("SeccionesDelProducto.mustache",$secciones);

            }else {
                Redirect::doIt("/ediciones?producto=$producto");
            }

        } else {
            Redirect::doIt('/');
        }

    }



}