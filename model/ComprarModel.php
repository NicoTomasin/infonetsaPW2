<?php

class ComprarModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function comprarEdicion($usuario, $producto, $edicion)
    {
        $sql = "INSERT INTO compra(`usuario`, `producto`, `edicion`) VALUES ('$usuario', '$producto', '$edicion')";
        $this->database->execute($sql);
    }
    public function suscripcion($usuario, $producto, $date, $expirationDate)
    {
        $sql = "INSERT INTO suscripcion(`usuario`, `producto`, `fecha_Inicio`,`fecha_Fin`) VALUES ('$usuario', '$producto', '$date','$expirationDate')";
        $this->database->execute($sql);
    }
}
