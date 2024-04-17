<?php

class ordenes {
    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }


  public function consulta (){
       $con = "SELECT * FROM ventas ORDER BY id_venta, fecha, fo_cliente, productos, subtotal, total, fo_vendedor";
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
           }
           return $vec;
     }

    public function insertar($params){
        $ins = "INSERT INTO ventas (fecha, fo_cliente, productos, subtotal, total, fo_vendedor) 
        VALUES ('$params->fecha', '$params->fo_cliente', '$params->productos', '$params->subtotal', $params->total, '$params->fo_vendedor' )";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado']="OK";
        $vec['mensaje']="La ventana ha sido guardado";
        return $vec;
    }

    public function consultap($id){
        $con = "SELECT productos from ventas WHERE id_venta = $id";
        $res = mysqli_query($this->conexion, $con);
        $row = mysqli_fetch_array($res);
        $vec = unserialize($row[0]);

        return $vec;

    }


    public function eliminar($id){
        $del = "DELETE FROM ventas WHERE id_venta = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec ['resultado'] = "OK";
        $vec ['mensaje'] = "El Pedido ha sido eliminado";
        return $vec;
     }

}

?>