<?php

class SeccionesModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function agregarSeccion($nombre)
    {
        $sql = "INSERT INTO secciones(`nombre`) VALUES ('$nombre')";
        $this->database->execute($sql);
    }
    public function eliminarSeccion($nombre)
    {
        $sql = "DELETE FROM secciones WHERE `nombre` = '$nombre'";
        $this->database->execute($sql);
    }
    public function buscarSecciones()
    {
        $sql = "SELECT * FROM `secciones`";
        return $this->database->query($sql);
    }
}