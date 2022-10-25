<?php


class AuthenticationModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function buscarUsuarioParaAutenticar($mail)
    {
        $sql = "SELECT `estado` FROM `usuario` WHERE `mail` = '$mail'";
        return $this->database->query($sql);
    }
    public function buscarHashDeUsuario($mail)
    {
        $sql = "SELECT `authCode` FROM `login_usuario` WHERE `mail` = '$mail'";
        return $this->database->query($sql);
    }
    public function authenticarUsuario($mail)
    {
        $sql = "UPDATE `usuario` SET `estado`= 1 WHERE `mail` = '$mail'";
        return $this->database->execute($sql);
    }
}