<?php

class homeController {

    private $view;
    private $controllerUsuario;
    public function __construct($view,$controllerUsuario) {
        $this->view = $view;
        $this->controllerUsuario = $controllerUsuario;

    }
    public function default() {
        if(isset($_SESSION['UsrMail'])){

            if(SessionTypeChecker::puedeAcceder('EDITOR')){
                $this->view->render('Home.mustache', $this->controllerUsuario->datosDelUsuarioEditor($_SESSION['UsrMail']));
            }else if(SessionTypeChecker::puedeAcceder('LECTOR')){
                $this->view->render('Home.mustache', $this->controllerUsuario->datosDelLector($_SESSION['UsrMail']));
            }else{
                $this->view->render('Home.mustache', $this->controllerUsuario->datosDelUsuario($_SESSION['UsrMail']));
            }
        } else{
            $this->view->render('Home.mustache');
        }

    }
}