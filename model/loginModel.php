<?php


class LoginModel
{

    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function alta($nombre, $apellido, $mail, $password)
    {
        $sql = "INSERT INTO usuario(`nombre`, `apellido`, `mail`, `password`)
VALUES (`$nombre`,`$apellido`, `$mail`,`$password`)";
        $this->database->execute($sql);
    }
}