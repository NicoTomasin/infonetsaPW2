<?php

class ArticuloModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function ponerEnEspera($titulo, $subtitulo, $fecha, $empresa, $cuerpo, $escritor)
    {
        $sql = "INSERT INTO articulo(`titulo`, `subtitulo`, `fecha`, `empresa`,`cuerpo`,`escritor`) VALUES ('$titulo', '$subtitulo', '$fecha', '$empresa', '$cuerpo','$escritor')";
        $this->database->execute($sql);
    }
    public function buscarArticulosPendientes()
    {
        $sql = "SELECT * FROM `articulo` WHERE `estado` = 0";
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
}