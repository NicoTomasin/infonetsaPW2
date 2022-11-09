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
        $id = $_POST["id"] ?? false;
        if($id){
            $this->model->ponerEnEsperaDespuesDeEditar($titulo, $subtitulo, $cuerpo, $imagen, $id);
        }else {
            $this->model->ponerEnEspera($titulo, $subtitulo, $edicion, $producto, $seccion, $cuerpo, $escritor,$imagen);
        }

        Redirect::doIt('/');
    }
    public function eliminar()
    {
        $id = $_POST["id"] ?? '';
        $this->model->eliminar($id);
        Redirect::doIt('/');
    }
    public function publicar()
    {
        $id = $_POST["id"] ?? '';
        $this->model->publicar($id);
        Redirect::doIt('/');
    }
    public function correccion()
    {
        $id = $_POST["id"] ?? '';
        $this->model->corregir($id);
        Redirect::doIt('/');
    }
    public function leer()
    {
        $id = $_POST["id"] ?? '';
        $articulo = $this->model->buscarArticuloEspecifico($id);
        $articulo[0]['imagen'] = base64_encode($articulo[0]['imagen'] );
        $this->renderer->render('Articulo.mustache', $articulo[0]);
    }
    public function edicion()
    {
        $id = $_POST["id"] ?? '';
        $datos['usuario']['esEscritor'] = true;
        $datos['articulo'] = $this->model->verarticuloporcomprobar($id);
        $datos['articulo'][0]['imagen'] = base64_encode($datos['articulo'][0]['imagen'] );
        $this->renderer->render('Home.mustache', $datos);
    }

    public function verarticuloporcomprobar()
    {
        $id = $_POST["id"] ?? '';
        $articulo = $this->model->verarticuloporcomprobar($id);
        $articulo[0]['imagen'] = base64_encode($articulo[0]['imagen'] );
       $this->renderer->render('Articulo.mustache', $articulo[0]);

    }
    public function paraeditar()
    {
        $escritor= $_POST["escritor"] ?? '';
        $articulos = $this->model->verarticulosparaeditar($escritor);
        if($articulos){
            for($i = 0; $i < count($articulos); $i++){
                $articulos[$i]['imagen'] = base64_encode($articulos[$i]['imagen'] );
            }
            $this->renderer->render('ArticulosParaEditar.mustache', $articulos);
        }else {
            Redirect::doIt('/');
        }

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