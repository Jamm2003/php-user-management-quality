<?php
class ProductosModel extends ModeloBase {
    protected $table;

    public function __construct($adapter) {
        $this->table = "productos";
        parent::__construct($this->table, $adapter);
    }

    // Métodos de consulta

    public function getUnProducto() {
        $query = "SELECT * FROM productos WHERE marca = 'Diana'";
        $producto = $this->ejecutarSql($query);
        return $producto;
    }
}
?>

