<?php
/*Datos de conexion a la base de datos*/
$servidor = "localhost";//DB_HOST:  generalmente suele ser "127.0.0.1"
$usuario = "root";//Usuario de tu base de datos
$clave ="";//Contraseña del usuario de la base de datos
$bd = "bd_inventario";//Nombre de la base de datos
 

$conexion = mysqli_connect($servidor, $usuario, $clave) or die('No encontro el servidor');
mysqli_select_db($conexion, $bd) or die('No se encontro la base de datos');
mysqli_set_charset($conexion,"utf8");

