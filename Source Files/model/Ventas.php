<?php 
class Venta extends EntidadBase {
    private $id;
    private $producto_id;
    private $fecha;
    private $cantidad;

    public function __construct($adapter) {
        $table = "ventas";
        parent::__construct($table, $adapter);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getProductoId() {
        return $this->producto_id;
    }

    public function setProductoId($producto_id) {
        $this->producto_id = $producto_id;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function save() {
        $query = "INSERT INTO ventas (producto_id, fecha, cantidad) 
                  VALUES (
                    '" . $this->producto_id . "',
                    '" . $this->fecha . "',
                    '" . $this->cantidad . "'
                  )";
    
        $save = $this->db()->query($query);
    
        return $save;
    }
    public function getAll() {
        $resultSet = array();

        $query = $this->db()->query("SELECT ventas.*, productos.nombre AS producto_nombre 
                                     FROM ventas 
                                     INNER JOIN productos ON ventas.producto_id = productos.id
                                     ORDER BY ventas.id DESC");

        while ($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }
        return $resultSet;
    }
}
?>