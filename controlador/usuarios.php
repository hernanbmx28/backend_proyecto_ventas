<?php
     header('Access-Control-Allow-Origin: *');
     header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
     
     require_once('../conexion.php');
     require_once('../modelo/usuarios.php');

$control = $_GET['control'];

$usu = new usuarios($conexion);

switch ($control) {
    case 'consulta':
        $vec = $usu->consulta();
    break;
    case 'insertar':
        $json = file_get_contents('php://input');
        //$json= '{"nombre":"Prueba 2"}';
        $params = json_decode($json);
        $vec = $usu->insertar($params);
    break;
    case 'eliminar':
        $id = $_GET['id'];
        $vec = $usu->eliminar($id);
    break;
    case 'editar':
        $json = file_get_contents('php://input');
        $params = json_decode($json);
        $id =$_GET['id'];
        $vec = $usu->editar($id, $params);
    break;
    case 'filtro':
        $dato = $_GET['dato'];
        $vec = $usu->filtro($dato);
    break;
        
    }

    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');


?>