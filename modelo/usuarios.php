<?php
    class usuarios{
        public $conexion;
        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        public function consulta (){
            $con = "SELECT * FROM usuarios ORDER BY nombre, apellido, rol, username, email";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
               }
               return $vec;
         }

        public function eliminar($id){
            $del = "DELETE FROM usuarios WHERE user_id = $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec ['resultado'] = "OK";
            $vec['mensaje'] = "El Usuario ha sido eliminado";
            return $vec;
        }


        public function insertar($params){
            $ins = "INSERT INTO usuarios (nombre, apellido, rol, username, clave, email) 
            VALUES ('$params->nombre', '$params->apellido', '$params->rol', '$params->username', '$params->clave', '$params->email')";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado']="OK";
            $vec['mensaje']="El Usuario ha sido creado";
            return $vec;
        }

        public function editar($id, $params){
            $editar = "UPDATE usuarios 
                    SET nombre = '$params->nombre', 
                        apellido = '$params->apellido', 
                        rol = '$params->rol',
                        username = '$params->username', 
                        clave = '$params->clave', 
                        email = '$params->email' 
                    WHERE user_id = $id";
            mysqli_query($this->conexion, $editar);
            $vec = [];
            $vec['resultado']="OK";
            $vec['mensaje']="El Usuario ha sido editado";
            return $vec;
        }

        public function filtro($id) {
            $sql = "SELECT * FROM usuarios WHERE user_id = $id";
            $result = $this->conexion->query($sql);
            $usuarios = $result->fetch_assoc();
            return $usuarios;
        }

}

