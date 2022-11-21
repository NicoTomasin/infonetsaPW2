<?php

class ArticuloController
{
    private $renderer;
    private $model;

    public function __construct($render, $model)
    {
        $this->renderer = $render;
        $this->model = $model;
    }

    public function crear()
    {
        if (isset($_SESSION['UsrMail']) && SessionTypeChecker::puedeAcceder('ESCRITOR')) {
            $titulo = $_POST["titulo"] ?? '';
            $subtitulo = $_POST["subtitulo"] ?? '';
            $edicion = $_POST["edicion"] ?? '';
            $producto = $_POST["producto"] ?? '';
            $seccion = $_POST["seccion"] ?? '';
            $cuerpo = $_POST["cuerpo"] ?? '';
            if ($_FILES) {
                $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
            } else {
                $imagen = null;
            }
            $escritor = $_SESSION['UsrMail'];
            $id = $_POST["id"] ?? false;
            if ($id) {
                $this->model->ponerEnEsperaDespuesDeEditar($titulo, $subtitulo, $cuerpo, $imagen, $id);
            } else {
                $this->model->ponerEnEspera($titulo, $subtitulo, $edicion, $producto, $seccion, $cuerpo, $escritor, $imagen);
            }
            Redirect::doIt('/');
        } else {
            Redirect::doIt('/');
        }

    }

    public function eliminar()
    {
        if (isset($_SESSION['UsrMail']) && SessionTypeChecker::puedenAcceder('ESCRITOR', "EDITOR")) {
            $id = $_POST["id"] ?? '';
            $this->model->eliminar($id);
            //TODO:if ESCRITOR notificar que se elimino correctamente
            //TODO:if EDITOR notificar que se elimino correctamente y notificar ESCRITOR que x EDITOR elimino su publicacion
            Redirect::doIt('/');
        } else {
            Redirect::doIt('/');
        }
    }

    public function publicar()
    {
        if (isset($_SESSION['UsrMail']) && SessionTypeChecker::puedeAcceder('EDITOR')) {
            $id = $_POST["id"] ?? '';
            $this->model->publicar($id);
            //TODO:Notificar al escritor que se publico su articulo
            Redirect::doIt('/');
        } else {
            Redirect::doIt('/');
        }

    }

    public function correccion()
    {
        if (isset($_SESSION['UsrMail']) && SessionTypeChecker::puedeAcceder('EDITOR')) {
            $id = $_POST["id"] ?? '';
            $this->model->corregir($id);
            //TODO: Notificar a escritor que se necesita edicion
            Redirect::doIt('/');
        } else {
            Redirect::doIt('/');
        }

    }

    public function leer()
    {
        //TODO:Validar compra
        $id = $_POST["id"] ?? '';
        $articulo = $this->model->buscarArticuloEspecifico($id);
        $articulo[0]['imagen'] = base64_encode($articulo[0]['imagen']);
        $this->renderer->render('Articulo.mustache', $articulo[0]);
    }

    public function edicion()
    {
        if (isset($_SESSION['UsrMail']) && SessionTypeChecker::puedeAcceder('ESCRITOR')) {
            $id = $_POST["id"] ?? '';
            $datos['usuario']['esEscritor'] = true;
            $datos['articulo'] = $this->model->verarticuloporcomprobar($id);
            $datos['articulo'][0]['imagen'] = base64_encode($datos['articulo'][0]['imagen']);
            $this->renderer->render('Home.mustache', $datos);
        } else {
            Redirect::doIt('/');
        }

    }

    public function verarticuloporcomprobar()
    {
        if (isset($_SESSION['UsrMail']) && SessionTypeChecker::puedenAcceder('ESCRITOR', "EDITOR")) {
            $id = $_POST["id"] ?? '';
            $articulo = $this->model->verarticuloporcomprobar($id);
            $articulo[0]['imagen'] = base64_encode($articulo[0]['imagen']);
            $this->renderer->render('Articulo.mustache', $articulo[0]);
        } else {
            Redirect::doIt('/');
        }
    }

    public function paraeditar()
    {
        if (isset($_SESSION['UsrMail']) && SessionTypeChecker::puedeAcceder('ESCRITOR')) {
            $escritor = $_POST["escritor"] ?? '';
            $articulos = $this->model->verarticulosparaeditar($escritor);
            if ($articulos) {
                for ($i = 0; $i < count($articulos); $i++) {
                    $articulos[$i]['imagen'] = base64_encode($articulos[$i]['imagen']);
                }
                $this->renderer->render('ArticulosParaEditar.mustache', $articulos);
            } else {
                Redirect::doIt('/');
            }
        } else {
            Redirect::doIt('/');
        }

    }

    public function misarticulos()
    {
        if (isset($_SESSION['UsrMail']) && SessionTypeChecker::puedeAcceder('ESCRITOR')) {
            $escritor = $_POST["escritor"] ?? '';
            $articulos = $this->model->verMisArticulos($escritor);
            if ($articulos) {
                for ($i = 0; $i < count($articulos); $i++) {
                    $articulos[$i]['imagen'] = base64_encode($articulos[$i]['imagen']);
                }
                $this->renderer->render('MisArticulos.mustache', $articulos);
            } else {
                Redirect::doIt('/');
            }
        } else {
            Redirect::doIt('/');
        }
    }

    public function vista()
    {
        $producto = $_POST["producto"] ?? false;
        $edicion = $_POST["edicion"] ?? false;
        $seccion = $_POST["id"] ?? false;


        if ($producto) {
            if ($edicion) {
                if ($seccion) {
                    $articulos = $this->model->buscarArticulosdeunasecciondeunaediciondeunproducto($producto, $edicion, $seccion);


                    if ($articulos) {
                        for ($i = 0; $i < count($articulos); $i++) {
                            $articulos[$i]['imagen'] = base64_encode($articulos[$i]['imagen']);
                        }
                        $this->renderer->render('ArticulosPorProducto.mustache',$articulos );


                    }else {
                        Redirect::doIt('/');
                    }
                }
            }
        }
    }


    /*  {
         $producto = $_POST["seccion"] ?? false;
         if ($producto) {
             $articulos = $this->model->buscarArticulosDeUnProducto($producto);

             if ($articulos) {
                 for ($i = 0; $i < count($articulos); $i++) {
                     $articulos[$i]['imagen'] = base64_encode($articulos[$i]['imagen']);
                 }
 $this->renderer->render('ArticulosPorProducto.mustache', $articulos);
 } else {
     Redirect::doIt('/');
 }

 } else {
     Redirect::doIt('/');
 }
 }*/


    public function default()
    {
        $producto = $_GET["seccion"] ?? false;
        if ($producto) {
            $articulos = $this->model->buscarArticulosDeUnProducto($producto);

            if ($articulos) {
                for ($i = 0; $i < count($articulos); $i++) {
                    $articulos[$i]['imagen'] = base64_encode($articulos[$i]['imagen']);
                }
                $this->renderer->render('ArticulosPorProducto.mustache', $articulos);
            } else {
                Redirect::doIt('/');
            }

        } else {
            Redirect::doIt('/');
        }
    }

    public function dosArticulosRandom()
    {
        $articulos = $this->model->buscarDosArticulosRandom();

        if ($articulos) {
            for ($i = 0; $i < count($articulos); $i++) {
                $articulos[$i]['imagen'] = base64_encode($articulos[$i]['imagen']);
            }
            return $articulos;

        }
    }
}