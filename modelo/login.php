<?php
    class Login{
        public $conexion;
        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        //Consultar        
        public function consulta ($username,$clave){
            $con = "SELECT * FROM usuarios WHERE username='$username' && clave='$clave'";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
               }

               if($vec==[]){
                $vec[0]= array("validar"=>"no valida");
               }else{
                $vec[0]['validar']="valida";
               }
               return $vec;
         }

    }