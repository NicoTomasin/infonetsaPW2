<?php
class MySQlDatabase {
    private $conexion;

    public function __construct($host_param = null,$user_param= null,$pass_param= null,$db_param= null) {
        $config = parse_ini_file("configuration/config.ini");

        $host = $host_param ?:  $config['host'];
        $user = $user_param ?: $config['user'];
        $pass = $pass_param ?:  $config['pass'];
        $db = $db_param ?: $config['db'];

        $this->conexion = new mysqli(
            $host,
            $user,
            $pass,
            $db);
    }

    public function __destruct() {
        $this->conexion->close();
    }

    public function query($sql) {
        $respuesta = $this->conexion->query($sql);
        return $respuesta->fetch_all(MYSQLI_ASSOC);
    }

    public function execute($sql) {
        $this->conexion->query($sql);
    }
    public function queryResId($sql) {
        $this->conexion->query($sql);
        $last_id = mysqli_insert_id($this->conexion);
        return $last_id;
    }
    public function executeStatement($titulo, $subtitulo, $edicion, $producto, $seccion, $cuerpo, $escritor, $imagen) {
        $sql = "INSERT INTO articulo(`titulo`, `subtitulo`, `edicion`, `producto`,`seccion`,`cuerpo`,`escritor`,`imagen`) VALUES (?, ?, '$edicion', ?, ?, ?, ?, '$imagen');";
        $stmt =  $this->conexion->prepare($sql);
        $stmt->bind_param("ssssss", $titulo, $subtitulo, $producto, $seccion, $cuerpo, $escritor);
        $stmt->execute();
    }
    public function executeStatementDespuesDeEditar($titulo, $subtitulo, $cuerpo, $imagen, $id) {
        $sql = "UPDATE articulo SET `titulo` = ?, `subtitulo`= ?,`cuerpo` = ?,`imagen` = '$imagen', `estado` = 0 WHERE `id` = '$id'";
        $stmt =  $this->conexion->prepare($sql);
        $stmt->bind_param("sss", $titulo, $subtitulo,$cuerpo);
        $stmt->execute();
    }
}