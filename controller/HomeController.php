<?php

class homeController {

    private $view;
    private $model;
    private $modelArticulos;
    public function __construct($view,$model,$modelArticulos) {
        $this->view = $view;
        $this->model = $model;
        $this->modelArticulos = $modelArticulos;

    }

    public function default() {
        $this->view->render('Home.mustache');
    }
    private function datosDelUsuario()
    {
        $datos =  $this->model->buscarDatosDelUsuario($_SESSION['UsrMail']);
        return array(
            'mail' => $datos[0]['mail'],
            'nombre' => $datos[0]['nombre'],
            'apellido' => $datos[0]['apellido'],
            'telefono' => $datos[0]['telefono'],
            'tipo' => $datos[0]['tipo'],
        );
    }
    private function datosDelUsuarioEditor()
    {
        $datos =  $this->datosDelUsuario();
        $datos['articulosPendientes'] =  $this->modelArticulos->buscarArticulosPendientes();
        return $datos;

    }
    public function admin() {
        if(SessionTypeChecker::puedeAcceder('ADMIN')){
            $this->view->render('HomeAdmin.mustache', $this->datosDelUsuario());
        }else {
            Redirect::doIt('/');
        }
    }
    public function lector() {
        if(SessionTypeChecker::puedeAcceder('LECTOR')){
            $this->view->render('HomeLector.mustache', $this->datosDelUsuario());
        }else {
            Redirect::doIt('/');
        }
    }
    public function editor() {
        if(SessionTypeChecker::puedeAcceder('EDITOR')){
            $this->view->render('HomeEditor.mustache', $this->datosDelUsuarioEditor());
        }else {
            Redirect::doIt('/');
        }
    }
    public function escritor() {
        if(SessionTypeChecker::puedeAcceder('ESCRITOR')){
            $this->view->render('HomeEscritor.mustache', $this->datosDelUsuario());
        }else {
            Redirect::doIt('/');
        }
    }
}