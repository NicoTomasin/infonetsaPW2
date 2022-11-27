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
    public function buscarProductosqueNoEstoySuscripto()
    {
        $date = date('Y-m-d', time());
        $sql = "SELECT distinct * FROM producto
WHERE NOT EXISTS(SELECT * from suscripcion WHERE producto.id=suscripcion.producto and suscripcion.fecha_Fin> '$date')";
        return $this->database->query($sql);
    }


    public function buscarSecciones()
    {
        $sql = "SELECT * FROM `secciones`";
        return $this->database->query($sql);
    }
    public function buscarproductosEnLosQueestoySubscripto()
            {$date = date('Y-m-d', time());
        $sql = "SELECT * FROM `suscripcion` inner join producto on suscripcion.producto=producto.id WHERE fecha_Fin> '$date'";
        return $this->database->query($sql);

    }


}