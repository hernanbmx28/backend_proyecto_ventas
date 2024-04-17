<?php
     header('Access-Control-Allow-Origin: *');
     header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
     
     require_once('../conexion.php');
     require_once('../modelo/clientes.php');

$control = $_GET['control'];

$cli = new clientes($conexion);

switch ($control) {
    case 'consulta':
        $vec = $cli->consulta();
    break;
    case 'insertar':
        $json = file_get_contents('php://input');
        //$json= '{"nombre":"Prueba 2"}';
        $params = json_decode($json);
        $vec = $cli->insertar($params);
    break;
    case 'eliminar':
        $id = $_GET['id'];
        $vec = $cli->eliminar($id);
    break;
    case 'editar':
        $json = file_get_contents('php://input');
        $params = json_decode($json);
        $id =$_GET['id'];
        $vec = $cli->editar($id, $params);
    break;
    case 'filtro':
        $dato = $_GET['dato'];
        $vec = $cli->filtro($dato);
    break;
        
    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');


?>