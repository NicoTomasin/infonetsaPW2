<?php

class ProductoModel
{
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }
    public function agregarProducto($nombre, $tipo, $descripcion, $logo)
    {
        $sql = "INSERT INTO producto(`nombre`, `tipo`,`descripcion`,`logo`) VALUES ('$nombre','$tipo', '$descripcion','$logo')";
        $this->database->execute($sql);
    }
    public function eliminarProducto($id)
    {
        $sql = "DELETE FROM producto WHERE `id` = '$id'";
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