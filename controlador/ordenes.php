<?php
     header('Access-Control-Allow-Origin: *');
     header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
     
     require_once('../conexion.php');
     require_once('../modelo/ordenes.php');

$control = $_GET['control'];

$ordenes = new ordenes ($conexion);

switch ($control) {
    case 'consulta':

        $vec = $ordenes->consulta();
    break;
    case 'insertar':
        $json = file_get_contents('php://input');
        //$json= '{"nombre":"Prueba 2"}';
        $params = json_decode($json);
        $texto_arreglo = serialize($params->productos);
        $params->productos = $texto_arreglo;

        $vec = $ordenes->insertar($params);
    break;
    case 'productos':
        $id = $_GET['id'];
        $vec = $ordenes->consultap($id);
    break;
    case 'eliminar':
        $id = $_GET['id'];
        $vec = $ordenes->eliminar($id);
    break;    
    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');

?>