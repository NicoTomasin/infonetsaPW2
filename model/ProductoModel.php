<?php

class ProductoModel
{
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }
    public function agregarProducto($nombre, $tipo)
    {
        $sql = "INSERT INTO producto(`nombre`, `tipo`) VALUES ('$nombre','$tipo')";
        $this->database->execute($sql);
    }
    public function buscarTiposDeProductos()
    {
        $sql = "SELECT * FROM `tipo_producto`";
        return $this->database->query($sql);
    }
    public function buscarProductos()
    {
        $sql = "SELECT * FROM `producto`";
        return $this->database->query($sql);
    }
    public function buscarSecciones()
    {
        $sql = "SELECT * FROM `secciones`";
        return $this->database->query($sql);
    }


}