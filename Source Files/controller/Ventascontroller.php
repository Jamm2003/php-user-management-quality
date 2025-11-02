<?php

class VentasController extends ControladorBase
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
        // Crear el objeto de venta
        $venta = new Venta($this->adapter);

        // Obtener todas las ventas
        $allventas = $venta->getAll();

        // Producto
        $producto = new Producto($this->adapter);
        $allproducts = $producto->getAll();

        // Cargar la vista index y pasar valores
        $this->view("index", array(
            "allventas" => $allventas,
            "allproducts" => $allproducts,
            "Hola" => "Soy Víctor"
        ));
    }

    public function crear()
    {
        if (isset($_POST["producto_id"]) && isset($_POST["fecha"]) && isset($_POST["cantidad"])) {
            // Crear una venta
            $venta = new Venta($this->adapter);
            $venta->setProductoId($_POST["producto_id"]);
            $venta->setFecha($_POST["fecha"]);
            $venta->setCantidad($_POST["cantidad"]);
            $save = $venta->save();
        }
        $this->redirect("Ventas", "index");
    }

    public function borrar()
    {
        if (isset($_GET["id"])) {
            $id = (int)$_GET["id"];

            $venta = new Venta($this->adapter);
            $venta->deleteById($id);
        }
        $this->redirect("Ventas", "index");
    }

    // Otras acciones relacionadas con ventas...

    public function hola()
    {
        // Implementación específica de "hola" para ventas
    }
}
