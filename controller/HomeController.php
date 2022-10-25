<?php

class homeController {

    private $view;

    public function __construct($view) {
        $this->view = $view;
    }

    public function default() {
        $this->view->render('Home.mustache');
    }
    public function admin() {
        if(SessionTypeChecker::puedeAcceder('ADMIN')){
            $this->view->render('HomeAdmin.mustache');
        }else {
            Redirect::doIt('/');
        }
    }
    public function lector() {
        if(SessionTypeChecker::puedeAcceder('LECTOR')){
            $this->view->render('HomeLector.mustache');
        }else {
            Redirect::doIt('/');
        }
    }
    public function editor() {
        if(SessionTypeChecker::puedeAcceder('EDITOR')){
            $this->view->render('HomeEditor.mustache');
        }else {
            Redirect::doIt('/');
        }
    }
    public function escritor() {
        if(SessionTypeChecker::puedeAcceder('ESCRITOR')){
            $this->view->render('HomeEscritor.mustache');
        }else {
            Redirect::doIt('/');
        }
    }
}