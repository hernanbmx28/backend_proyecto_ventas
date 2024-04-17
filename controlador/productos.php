<?php
     header('Access-Control-Allow-Origin: *');
     header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
     
     require_once('../conexion.php');
     require_once('../modelo/productos.php');

$control = $_GET['control'];

$products = new productos($conexion);

switch ($control) {
    case 'consulta':
        $vec = $products->consulta();
    break;
    case 'insertar':
        $json = file_get_contents('php://input');
        //$json= '{"nombre":"Prueba 2"}';
        $params = json_decode($json);
        $vec = $products->insertar($params);
    break;
    case 'eliminar':
        $id = $_GET['id'];
        $vec = $products->eliminar($id);
    break;
    case 'editar':
        $json = file_get_contents('php://input');
        $params = json_decode($json);
        $id = $_GET['id'];
        $vec = $products->editar($id, $params);
    break;
    case 'filtro':
        $dato = $_GET['dato'];
        $vec = $products->filtro($dato);
    break;
        
    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');


?>

