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
        $sql = "SELECT `mail`, `password` FROM `login_usuario` WHERE `mail` = '$mail'";
        return $this->database->query($sql);
    }
    public function buscarTipoDeUsuario($mail)
    {
        $sql = "SELECT `tipo` FROM `usuario` WHERE `mail` = '$mail'";
        return $this->database->query($sql);
    }
    public function buscarEstadoDeUsuario($mail)
    {
        $sql = "SELECT `estado` FROM `usuario` WHERE `mail` = '$mail'";
        return $this->database->query($sql);
    }
}