<?php

class RegisterModel {

    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function alta($nombre, $apellido, $mail, $password, $tipo=null){
        $sql = "INSERT INTO usuario(`nombre`, `apellido`, `mail`,`tipo` ) VALUES ('$nombre','$apellido','$mail', '$tipo')";
        $id = $this->database->queryResId($sql);
        $hash = md5($mail);
        $sql2 = "INSERT INTO login_usuario(`id`, `mail`, `password`, `authCode`) VALUES ('$id','$mail','$password','$hash')";
        $this->database->execute($sql2);
    }
    public function buscarUsuario($mail)
    {
        $sql = "SELECT `mail`, `password` FROM `login_usuario` WHERE `mail` = '$mail'";
        return $this->database->query($sql);
    }
}