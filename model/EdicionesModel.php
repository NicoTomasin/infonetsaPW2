<?php

class EdicionesModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }


    public function buscarEdicionesDeUnProducto($producto)
    {
        $sql = "SELECT DISTINCT `edicion`,`producto` FROM `articulo` WHERE `producto` = '$producto' ORDER BY `edicion` ASC";
        return $this->database->query($sql);
    }
}