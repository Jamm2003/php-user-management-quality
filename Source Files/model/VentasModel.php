<?php
class VentasModel extends ModeloBase {
    protected $table;

    public function __construct($adapter) {
        $this->table = "ventas"; // Cambiar el nombre de la tabla si es necesario
        parent::__construct($this->table, $adapter);
    }

    public function getVentasPorProducto($productoId) {
        $query = "SELECT * FROM ventas WHERE producto_id = $productoId";
        $ventas = $this->ejecutarSql($query);
        return $ventas;
    }
}
?>