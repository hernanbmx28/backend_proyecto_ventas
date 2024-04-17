<?php
     header('Access-Control-Allow-Origin: *');
     header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
     
     require_once('../conexion.php');
     require_once('../modelo/login.php');

     $username = $_GET['username'];
     $clave = $_GET['clave'];
     
     $login = new login($conexion);
     $vec= $login->consulta($username, $clave);


    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');


?>