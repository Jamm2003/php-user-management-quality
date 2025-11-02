<?php
class Compra extends EntidadBase {
    private $id;
    private $producto_id;
    private $fecha_compra;
    private $cantidad;
    private $gasto;

    public function __construct($adapter) {
        $table = "compras";
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

    public function getFechaCompra() {
        return $this->fecha_compra;
    }

    public function setFechaCompra($fecha_compra) {
        $this->fecha_compra = $fecha_compra;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function getGasto() {
        return $this->gasto;
    }

    public function setGasto($gasto) {
        $this->gasto = $gasto;
    }

    public function save() {
        $query = "INSERT INTO compras (producto_id, fecha_compra, cantidad, gasto) 
                  VALUES (
                    '" . $this->producto_id . "',
                    '" . $this->fecha_compra . "',
                    '" . $this->cantidad . "',
                    '" . $this->gasto . "'
                  )";
    
        $save = $this->db()->query($query);
    
        return $save;
    }

    public function getAll() {
        $resultSet = array();

        $query = $this->db()->query("SELECT compras.*, productos.nombre AS producto_nombre 
                                     FROM compras 
                                     INNER JOIN productos ON compras.producto_id = productos.id
                                     ORDER BY compras.id DESC");

        while ($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }
        return $resultSet;
    }
}

?>