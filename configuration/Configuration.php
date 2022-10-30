<?php
include_once ("helpers/Redirect.php");
include_once ("helpers/SessionTypeChecker.php");
include_once('helpers/MySQlDatabase.php');
include_once('helpers/MustacheRenderer.php');
include_once('helpers/Logger.php');
include_once('helpers/Router.php');

include_once ("model/RegisterModel.php");
include_once('model/LoginModel.php');
include_once('model/AuthenticationModel.php');
include_once('model/HomeModel.php');
include_once('model/ArticuloModel.php');

include_once('controller/HomeController.php');
include_once('controller/RegisterController.php');
include_once('controller/LoginController.php');
include_once('controller/AuthenticationController.php');
include_once('controller/ArticuloController.php');

include_once ('dependencies/mustache/src/Mustache/Autoloader.php');

class Configuration {
    private $database;
    private $view;

    public function __construct() {
        $this->database = new MySQlDatabase();
        $this->view = new MustacheRenderer("view/", 'view/partial/');
    }
    public function getRouter() {
        return new Router($this, "home", "default");
    }
    public function getLoginModel() {
        return new LoginModel($this->database);
    }
    private function getRegisterModel() {
        return new RegisterModel($this->database);
    }
    private function getHomeModel() {
        return new HomeModel($this->database);
    }
    private function getAuthenticationModel() {
        return new AuthenticationModel($this->database);
    }
    private function getArticuloModel() {
        return new ArticuloModel($this->database);
    }
    public function getRegisterController(){
        return new RegisterController($this->view, $this->getRegisterModel());
    }
    public function getAuthenticationController(){
        return new AuthenticationController($this->view, $this->getAuthenticationModel());
    }
    public function getLoginController() {
        return new LoginController($this->view, $this->getLoginModel());
    }
    public function getArticuloController() {
        return new ArticuloController($this->view,$this->getArticuloModel());
    }
    public function getHomeController() {
        return new homeController($this->view, $this->getHomeModel());
    }



}