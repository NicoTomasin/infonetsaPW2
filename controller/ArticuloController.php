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
        $titulo = $_POST["titulo"] ?? '';
        $subtitulo = $_POST["subtitulo"] ?? '';
        $edicion = $_POST["edicion"] ?? '';
        $producto = $_POST["producto"] ?? '';
        $seccion = $_POST["seccion"] ?? '';
        $cuerpo = $_POST["cuerpo"] ?? '';
        $imagen= addslashes(file_get_contents($_FILES['imagen']['tmp_name'])) ??'';
        $escritor = $_SESSION['UsrMail'];
        $this->model->ponerEnEspera($titulo, $subtitulo, $edicion, $producto, $seccion, $cuerpo, $escritor,$imagen);
        Redirect::doIt('/');
    }
    public function eliminar()
    {
        $titulo = $_POST["titulo"] ?? '';
        $escritor = $_POST["escritor"] ?? '';
        $this->model->eliminar($titulo, $escritor);
        Redirect::doIt('/');
    }
    public function publicar()
    {
        $titulo = $_POST["titulo"] ?? '';
        $escritor = $_POST["escritor"] ?? '';
        $this->model->publicar($titulo, $escritor);
        Redirect::doIt('/');
    }
    public function correccion()
    {
       //TODO:Dar al escritor la chance de editarlo
    }
    public function leer()
    {
        $id = $_POST["id"] ?? '';
        $articulo = $this->model->buscarArticuloEspecifico($id);
        $articulo[0]['imagen'] = base64_encode($articulo[0]['imagen'] );
        $this->renderer->render('Articulo.mustache', $articulo[0]);
    }

    public function verarticuloporcomprobar()
    {
        $titulo = $_POST["titulo"] ?? '';
        $escritor = $_POST["escritor"] ?? '';
        $articulo = $this->model->verarticuloporcomprobar($titulo,$escritor);
        $articulo[0]['imagen'] = base64_encode($articulo[0]['imagen'] );
       $this->renderer->render('Articulo.mustache', $articulo[0]);

    }
    public function default()
    {
        $producto = $_GET["producto"] ?? false;
        if($producto) {
            $articulos = $this->model->buscarArticulosDeUnProducto($producto);

            if($articulos){
                for($i = 0; $i < count($articulos); $i++){
                    $articulos[$i]['imagen'] = base64_encode($articulos[$i]['imagen'] );
                }
                $this->renderer->render('ArticulosPorProducto.mustache', $articulos);
            }else {
                Redirect::doIt('/');
            }

    }else {
        Redirect::doIt('/');
    }

    }










}