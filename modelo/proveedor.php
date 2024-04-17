<?php
    class proveedor{
        public $conexion;
        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        //Consultar        
        public function consulta (){
            $con = "SELECT * FROM proveedor ORDER BY id_proveedor, nombre, telefono, direccion, correo";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
               }
               return $vec;
         }
        
         //Eliminar
         public function eliminar($id){
            $del = "DELETE FROM proveedor WHERE id_proveedor = $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec ['resultado'] = "OK";
            $vec ['mensaje'] = "El Proveedor ha sido eliminado";
            return $vec;
         }

         //Insertar
         public function insertar($params){
            $ins = "INSERT INTO proveedor(nombre, telefono, direccion, correo) VALUES ('$params->nombre', '$params->telefono', '$params->direccion', '$params->correo')";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec ['resultado']='OK';
            $vec ['mensaje']= 'El proveedor ha sido guardado';
            return $vec;
         }   
        
         //Editar
         public function editar($id, $params){
            $editar = "UPDATE proveedor SET nombre ='$params->nombre', telefono='$params->telefono', direccion='$params->direccion', correo='$params->correo'
            WHERE id_proveedor = $id";
            mysqli_query($this->conexion, $editar);
            $vec = [];
            $vec ['resultado']='OK';
            $vec ['mensaje']= 'El Proveedor ha sido modificado';
            return $vec;
         }
         
         //Filtro
         public function filtro($valor){
            $filtro = "SELECT * FROM proveedor WHERE nombre LIKE '%$valor%'";
            $res = mysqli_query($this->conexion, $filtro);
            $vec = [];
            while($row = mysqli_fetch_array($res)){
            $vec []= $row;
            }
            return $vec;
        }

        public function contar(){
            $contar = "SELECT COUNT(*) AS total_registros FROM proveedor;";
            $res = mysqli_query($this->conexion, $contar);
            $vec = [];
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
               }
               return $vec;
             }
}