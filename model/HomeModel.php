<?php

class HomeModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function buscarDatosDelUsuario($mail)
    {
        $sql = "SELECT `mail`, `nombre`, `apellido`, `telefono`,`tipo` FROM `usuario` WHERE `mail` = '$mail'";
        return $this->database->query($sql);
    }

}