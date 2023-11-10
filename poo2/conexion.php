<?php

class Conexion extends PDO{
    private $tipo_da_base = "mysql";
    private $host = "localhost";
    private $nombre_de_base = "personaje";
    private $usuario = "root";
    private $contrasena = "";
    public function __construct()
    {
        try {
            parent::__construct("{$this->tipo_da_base}:dbname={$this->nombre_de_base};
            host={$this->host};charset=utf8", $this->usuario, $this->contrasena);
        } catch (PDOException $e) {
            echo "Ha surgio un error y no se puede conectar a la base de datos. Detalle: ". $e->getMessage();
            exit;
        }
    }
}



?>