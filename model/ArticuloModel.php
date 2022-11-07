<?php

class ArticuloModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function ponerEnEspera($titulo, $subtitulo, $edicion, $producto, $seccion, $cuerpo, $escritor)
    {
        $sql = "INSERT INTO articulo(`titulo`, `subtitulo`, `edicion`, `producto`,`seccion`,`cuerpo`,`escritor`) VALUES ('$titulo', '$subtitulo', '$edicion', '$producto', '$seccion','$cuerpo','$escritor')";
        $this->database->execute($sql);
    }
    public function buscarArticulosPendientes()
    {
        $sql = "SELECT articulo.escritor, articulo.titulo, producto.nombre FROM `articulo` join `producto` WHERE articulo.producto = producto.id AND articulo.estado = 0";
        return $this->database->query($sql);
    }
    public function eliminar($titulo, $escritor)
    {
        $sql = "DELETE FROM articulo WHERE `titulo` = '$titulo' AND `escritor` = '$escritor'";
        $this->database->execute($sql);
    }
    public function publicar($titulo, $escritor)
    {
        $sql = "UPDATE articulo SET `estado` = 1 WHERE `titulo` = '$titulo' AND `escritor` = '$escritor'";
        $this->database->execute($sql);
    }
    public function buscarTodosLosArticulosActivos()
    {
        $sql = "SELECT articulo.id AS 'id', producto.nombre AS 'producto', secciones.nombre AS 'seccion', articulo.titulo FROM `producto` JOIN `articulo` JOIN `secciones` WHERE articulo.producto = producto.id AND secciones.id = articulo.seccion AND articulo.estado = 1";
        return $this->database->query($sql);
    }
    public function buscarArticuloEspecifico($id)
    {
        $sql = "SELECT * FROM `articulo` WHERE `id` = '$id'";
        return $this->database->query($sql);
    }


    public function verarticuloporcomprobar($titulo,$escritor)
    {
        $sql = "SELECT * FROM `articulo` WHERE `titulo` = '$titulo'and`escritor`='$escritor'";
        return $this->database->query($sql);

    }
}