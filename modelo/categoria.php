<?php
    class categoria{
        public $conexion;
        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        //Consultar        
        public function consulta (){
            $con = "SELECT * FROM categoria ORDER BY id_categoria, nombre";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
               }
               return $vec;
         }
        
         //Eliminar
         public function eliminar($id){
            $del = "DELETE FROM categoria WHERE id_categoria = $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec ['resultado'] = "OK";
            $vec ['mensaje'] = "La categoria ha sido eliminada";
            return $vec;
         }

         //Insertar
         public function insertar($params){
            $ins = "INSERT INTO categoria(nombre) VALUES ('$params->nombre')";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec ['resultado']='OK';
            $vec ['mensaje']= 'La categoria ha sido guardada';
            return $vec;
         }   
        
         //Editar
         public function editar($id, $params){
            $editar = "UPDATE categoria SET nombre ='$params->nombre' WHERE id_categoria = $id";
            mysqli_query($this->conexion, $editar);
            $vec = [];
            $vec ['resultado']='OK';
            $vec ['mensaje']= 'La categoria ha sido modificada';
            return $vec;
         }
         
         //Filtro
         public function filtro($id_categoria) {
            $sql = "SELECT * FROM categoria WHERE nombre = $id_categoria";
            $result = $this->conexion->query($sql);
            $categoria = $result->fetch_assoc();
            return $categoria;
        }
    }