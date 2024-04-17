<?
    class Tmp {
        public $conexion;
    
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }
    
        public function listarTmp() {
            $sql = "SELECT * FROM tmp";
            $result = $this->conexion->query($sql);
            $tmps = array();
            while ($row = $result->fetch_assoc()) {
                $tmps[] = $row;
            }
            return $tmps;
        }
    
        public function obtenerTmp($id_tmp) {
            $sql = "SELECT * FROM tmp WHERE id_tmp = $id_tmp";
            $result = $this->conexion->query($sql);
            $tmp = $result->fetch_assoc();
            return $tmp;
        }
    
        public function agregarTmp($id_producto, $cantidad_tmp, $precio_tmp, $session_id) {
            $sql = "INSERT INTO tmp (
                        id_producto, 
                        cantidad_tmp, 
                        precio_tmp, 
                        session_id
                    ) VALUES (
                        $id_producto, 
                        $cantidad_tmp, 
                        $precio_tmp, 
                        '$session_id'
                    )";
            $result = $this->conexion->query($sql);
            return $result;
        }
    
        public function editarTmp($id_tmp, $id_producto, $cantidad_tmp, $precio_tmp, $session_id) {
            $sql = "UPDATE tmp 
                    SET id_producto = $id_producto, 
                        cantidad_tmp = $cantidad_tmp, 
                        precio_tmp = $precio_tmp, 
                        session_id = '$session_id' 
                    WHERE id_tmp = $id_tmp";
            $result = $this->conexion->query($sql);
            return $result;
        }
    
        public function eliminarTmp($id_tmp) {
            $sql = "DELETE FROM tmp WHERE id_tmp = $id_tmp";
            $result = $this->conexion->query($sql);
            return $result;
        }
    }
    