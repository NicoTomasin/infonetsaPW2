<?php

class homeController {

    private $view;

    public function __construct($view) {
        $this->view = $view;
    }

    public function default() {
        $this->view->render('Home.mustache');
    }
}