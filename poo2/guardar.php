<?php


require_once("personaje.php");
//$objPersonaje = personaje::guardar();
//Crear un objeto (instancia de una clase)

//var_dump($_POST);

$objPersonaje = new personaje($_POST["nombre"],$_POST["apellido"]);

$objPersonaje->guardar();

echo $objPersonaje->getNombre();
echo $objPersonaje->getApellido();
?>