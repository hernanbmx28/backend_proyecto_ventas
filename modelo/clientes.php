<?php
    class clientes{
        public $conexion;
        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        public function consulta (){
            $con = "SELECT * FROM clientes ORDER BY identificacion, nombre_cliente, telefono_cliente, email_cliente, direccion_cliente";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
               }
               return $vec;
         }

        public function eliminar($id){
            $del = "DELETE FROM clientes WHERE id_cliente = $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec ['resultado'] = "OK";
            $vec['mensaje'] = "El cliente ha sido eliminado";
            return $vec;
        }

        public function insertar($params){
            $ins = "INSERT INTO clientes (identificacion, nombre_cliente, telefono_cliente, email_cliente, direccion_cliente) 
            VALUES ('$params->identificacion','$params->nombre_cliente', '$params->telefono_cliente', '$params->email_cliente', '$params->direccion_cliente')";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado']="OK";
            $vec['mensaje']="El cliente ha sido guardado";
            return $vec;
        }

        public function editar($id, $params){
            $editar = "UPDATE clientes SET identificacion='$params->identificacion',nombre_cliente='$params->nombre_cliente', telefono_cliente='$params->telefono_cliente',email_cliente='$params->email_cliente', direccion_cliente='$params->direccion_cliente'
            WHERE id_cliente = $id";
            mysqli_query($this->conexion, $editar);
            $vec = [];
            $vec['resultado']="OK";
            $vec['mensaje']="El cliente ha sido editado";
            return $vec;
        }

        public function filtro($id_cliente) {
            $sql = "SELECT * FROM clientes WHERE identificacion = $id_cliente";
            $result = $this->conexion->query($sql);
            $cliente = $result->fetch_assoc();
            return $cliente;
        }

}


