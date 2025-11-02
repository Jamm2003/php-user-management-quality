<?php

class Comprascontroller extends ControladorBase
{
    public $conectar;
    public $adapter;

    public function __construct()
    {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }

    public function index()
    {
        // Crear el objeto de compra
        $compra = new Compra($this->adapter);

        // Obtener todas las compras
        $allcompras = $compra->getAll();

        // Producto
        $producto = new Producto($this->adapter);
        $allproducts = $producto->getAll();

        // Cargar la vista index y pasar valores
        $this->view("index", array(
            "allcompras" => $allcompras,
            "allproducts" => $allproducts,
            "Hola" => "Soy Víctor"
        ));
    }

    public function crear()
    {
        if (isset($_POST["producto_id"]) && isset($_POST["fecha_compra"]) && isset($_POST["cantidad"]) && isset($_POST["gasto"])) {
            // Crear una compra
            $compra = new Compra($this->adapter);
            $compra->setProductoId($_POST["producto_id"]);
            $compra->setFechaCompra($_POST["fecha_compra"]);
            $compra->setCantidad($_POST["cantidad"]);
            $compra->setGasto($_POST["gasto"]);
            $save = $compra->save();
        }
        $this->redirect("Compras", "index");
    }

    public function borrar()
    {
        if (isset($_GET["id"])) {
            $id = (int)$_GET["id"];

            $compra = new Compra($this->adapter);
            $compra->deleteById($id);
        }
        $this->redirect("Compras", "index");
    }

    // Otras acciones relacionadas con compras...

    public function hola()
    {
        // Implementación específica de "hola" para compras
    }
}
