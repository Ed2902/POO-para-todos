<?php

require_once ("conexion.php");
class personaje{
    private $id;
    private $nombre;
    private $apellido;
    const TABLA = 'personaje';

        public function getId() {
            return $this->id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getApellido(){
            return $this->apellido;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setApellido($apellido){
            $this->apellido = $apellido;
        }



        public function __construct($nombre,$apellido,$id=null){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
        }

        public function guardar(){
            
            {
                $conexion = new Conexion();
                $consulta = $conexion->prepare('INSERT INTO ' .self::TABLA .'(nombre, apellido)VALUES (:nombre, :apellido)');
                $consulta -> bindParam(':nombre', $this->nombre);
                $consulta -> bindParam(':apellido', $this->apellido);
                $consulta -> execute();
                $this->id = $conexion->lastInsertid();
            }
            $conexion = null;
        }

        public static function mostrar(){
                $conexion = new Conexion();
                $consulta = $conexion->prepare('SELECT id,nombre,apellido FROM ' . self::TABLA . ' ORDER BY nombre');
                $consulta -> execute();
                $registros = $consulta->fetchAll();
                return $registros;

        }
    }
?>