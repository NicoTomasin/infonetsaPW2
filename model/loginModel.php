<?php


class LoginModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function buscarUsuario($mail)
    {
        $sql = "SELECT `mail`, `password` FROM `usuario` WHERE `mail` = '$mail'";
        return $this->database->query($sql);
    }
}