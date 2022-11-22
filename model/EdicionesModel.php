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
        $sql = "SELECT `edicion`, COUNT(articulo.id) AS 'cantidadArticulos', `producto` FROM `articulo`WHERE `producto` = '$producto' AND `estado` = 1  GROUP BY `edicion` ORDER BY `edicion` ASC;";
        $data = $this->database->query($sql);
        for($i = 0; $i<count($data); $i++){
            $fecha = $data[$i]["edicion"];
            $data[$i]["secciones"] = $this->database->query("SELECT DISTINCT secciones.nombre FROM articulo JOIN secciones on articulo.seccion = secciones.id WHERE producto = '$producto' AND articulo.edicion = '$fecha';");
        }

        return $data;
    }
}