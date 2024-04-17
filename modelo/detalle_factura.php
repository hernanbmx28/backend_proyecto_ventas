<?
    class DetalleFactura {
        public $conexion;
    
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }
    
        public function listarDetalleFactura() {
            // Consulta SQL que incluye los datos de la tabla detalle_factura, products y facturas
            $sql = "SELECT f.*, df.id_detalle, df.numero_factura, df.id_producto, p.nombre_producto, df.cantidad, df.precio_venta
                    FROM detalle_factura df
                    INNER JOIN products p ON df.id_producto = p.id_producto
                    INNER JOIN facturas f ON df.numero_factura = f.numero_factura";
        
            // Ejecutar la consulta
            $result = $this->conexion->query($sql);
        
            // Inicializar un array para almacenar los detalles de la factura
            $detalles = array();
        
            // Recorrer los resultados y almacenarlos en el array
            while ($row = $result->fetch_assoc()) {
                $detalles[] = $row;
            }
        
            // Devolver el array con los detalles de la factura
            return $detalles;
        }
    
        public function obtenerDetalleFactura($id_detalle) {
            $sql = "SELECT * FROM detalle_factura WHERE id_detalle = $id_detalle";
            $result = $this->conexion->query($sql);
            $detalle = $result->fetch_assoc();
            return $detalle;
        }
    
        public function agregarDetalleFactura($numero_factura, $id_producto, $cantidad, $precio_venta) {
            $sql = "INSERT INTO detalle_factura (
                        numero_factura, 
                        id_producto, 
                        cantidad, 
                        precio_venta
                    ) VALUES (
                        $numero_factura, 
                        $id_producto, 
                        $cantidad, 
                        $precio_venta
                    )";
            $result = $this->conexion->query($sql);
            return $result;
        }
    
        public function editarDetalleFactura($id_detalle, $numero_factura, $id_producto, $cantidad, $precio_venta) {
            $sql = "UPDATE detalle_factura 
                    SET numero_factura = $numero_factura, 
                        id_producto = $id_producto, 
                        cantidad = $cantidad, 
                        precio_venta = $precio_venta 
                    WHERE id_detalle = $id_detalle";
            $result = $this->conexion->query($sql);
            return $result;
        }
    
        public function eliminarDetalleFactura($id_detalle) {
            $sql = "DELETE FROM detalle_factura WHERE id_detalle = $id_detalle";
            $result = $this->conexion->query($sql);
            return $result;
        }
    }
    