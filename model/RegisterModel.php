<?php

class RegisterModel {

    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function alta($nombre, $apellido, $mail, $password){
        $sql = "INSERT INTO usuario(`nombre`, `apellido`, `mail`, `password`) VALUES ('$nombre','$apellido','$mail','$password')";
        $id = $this->database->queryResId($sql);
        $hash = md5($mail);
        $sql2 = "INSERT INTO login_usuario(`id`, `mail`, `password`, `authCode`) VALUES ('$id','$mail','$password','$hash')";
        $this->database->execute($sql2);
    }
}