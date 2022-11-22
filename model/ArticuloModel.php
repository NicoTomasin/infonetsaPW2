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
        $this->database->executeStatement($titulo, $subtitulo, $edicion, $producto, $seccion, $cuerpo, $escritor, $imagen);
    }
    public function ponerEnEsperaDespuesDeEditar($titulo, $subtitulo, $cuerpo, $imagen, $id)
    {
        $this->database->executeStatementDespuesDeEditar($titulo, $subtitulo, $cuerpo, $imagen, $id);
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
        $sql = "SELECT articulo.id AS 'id', producto.nombre AS 'producto', secciones.nombre AS 'seccion', articulo.titulo, articulo.imagen FROM `producto` JOIN `articulo` JOIN `secciones` WHERE articulo.producto = producto.id AND secciones.id = articulo.seccion AND articulo.estado = 1";
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
        $sql = "SELECT articulo.id,articulo.titulo,articulo.subtitulo,articulo.edicion,articulo.producto,articulo.seccion,articulo.cuerpo,articulo.estado,articulo.escritor,articulo.imagen 
        FROM `articulo` inner join `producto` on articulo.producto=producto.id WHERE `seccion` = '$id'and`estado`=1";
        return $this->database->query($sql);

    }
    public function verMisArticulos($escritor)
    {
        $sql = "SELECT * FROM `articulo` WHERE `escritor` = '$escritor'";
        return $this->database->query($sql);

    }

    public function buscarArticulosdeunasecciondeunaediciondeunproducto($producto,$edicion,$seccion)
    {
        $sql = "SELECT * FROM `articulo` where `edicion`='$edicion' and `producto`='$producto' and `seccion`='$seccion' AND `estado` = 1";

        return $this->database->query($sql);
    }

        public function buscarDosArticulosRandom()
    {

        $sql = "SELECT * FROM `articulo` WHERE estado = 1 ORDER BY RAND () LIMIT 2 ";

        return $this->database->query($sql);

}}