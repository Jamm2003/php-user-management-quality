<?php
class Producto extends EntidadBase {
    private $id;
    private $nombre;
    private $precio;
    private $marca;

    public function __construct($adapter) {
        $table = "productos"; // Cambiar el nombre de la tabla a "productos"
        parent::__construct($table, $adapter);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function findById() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = " . $this->id;
        $result = $this->db()->query($query);
    
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
            $this->nombre = $row['nombre'];
            $this->precio = $row['precio'];
            $this->marca = $row['marca'];
        }
    }
    
    public function save() {
        $query = "INSERT INTO " . $this->table . " (nombre, precio, marca)
                  VALUES (
                    '" . $this->nombre . "',
                    '" . $this->precio . "',
                    '" . $this->marca . "'
                  )";
    
        $save = $this->db()->query($query);
    
        return $save;
    }

    public function update() {
        $query = "UPDATE " . $this->table . " SET
                  nombre = '" . $this->nombre . "',
                  precio = '" . $this->precio . "',
                  marca = '" . $this->marca . "'
                  WHERE id = " . $this->id;

        $update = $this->db()->query($query);

        return $update;
    }
}

?>
