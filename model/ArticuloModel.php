<?php

class ArticuloModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function ponerEnEspera($titulo, $subtitulo, $edicion, $producto, $seccion, $cuerpo, $escritor,$imagen)
    {
        $sql = "INSERT INTO articulo(`titulo`, `subtitulo`, `edicion`, `producto`,`seccion`,`cuerpo`,`escritor`,`imagen`) VALUES ('$titulo', '$subtitulo', '$edicion', '$producto', '$seccion','$cuerpo','$escritor','$imagen')";
        $this->database->execute($sql);
    }
    public function buscarArticulosPendientes()
    {
        $sql = "SELECT articulo.escritor, articulo.titulo, producto.nombre, articulo.cuerpo, articulo.imagen, articulo.id FROM `articulo` join `producto` WHERE articulo.producto = producto.id AND articulo.estado = 0";
        return $this->database->query($sql);
    }
    public function eliminar($id)
    {
        $sql = "DELETE FROM articulo WHERE `id` = '$id'";
        $this->database->execute($sql);
    }
    public function ponerEnEsperaDespuesDeEditar($titulo, $subtitulo, $cuerpo, $imagen, $id)
    {
        $sql = "UPDATE articulo SET `titulo` = '$titulo', `subtitulo`= '$subtitulo',`cuerpo` = '$cuerpo',`imagen` = '$imagen', `estado` = 0 WHERE `id` = '$id'";
        $this->database->execute($sql);
    }
    public function publicar($id)
    {
        $sql = "UPDATE articulo SET `estado` = 1 WHERE `id` = '$id'";
        $this->database->execute($sql);
    }
    public function corregir($id)
    {
        $sql = "UPDATE articulo SET `estado` = 2 WHERE `id` = '$id'";
        $this->database->execute($sql);
    }
    public function buscarTodosLosArticulosActivos()
    {
        $sql = "SELECT articulo.id AS 'id', producto.nombre AS 'producto', secciones.nombre AS 'seccion', articulo.titulo FROM `producto` JOIN `articulo` JOIN `secciones` WHERE articulo.producto = producto.id AND secciones.id = articulo.seccion AND articulo.estado = 1";
        return $this->database->query($sql);
    }
    public function verarticulosparaeditar($escritor)
    {
        $sql = "SELECT articulo.escritor, articulo.titulo, producto.nombre, articulo.cuerpo, articulo.imagen, articulo.id FROM `articulo` join `producto` WHERE articulo.producto = producto.id AND articulo.estado = 2 AND articulo.escritor = '$escritor'";
        return $this->database->query($sql);
    }
    public function buscarArticuloEspecifico($id)
    {
        $sql = "SELECT * FROM `articulo` WHERE `id` = '$id'";
        return $this->database->query($sql);
    }
    public function verarticuloporcomprobar($id)
    {
        $sql = "SELECT * FROM `articulo` WHERE `id` = '$id'";
        return $this->database->query($sql);

    }
    public function buscarArticulosDeUnProducto($id)
    {
        $sql = "SELECT * FROM `articulo` WHERE `producto` = '$id'and`estado`=1";
        return $this->database->query($sql);

    }
    public function verMisArticulos($escritor)
    {
        $sql = "SELECT * FROM `articulo` WHERE `escritor` = '$escritor'";
        return $this->database->query($sql);

    }

}