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
        $escritor = $_SESSION['UsrMail'];
        $this->model->ponerEnEspera($titulo, $subtitulo, $edicion, $producto, $seccion, $cuerpo, $escritor);
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

        $this->renderer->render('Articulo.mustache', $articulo[0]);
    }
}