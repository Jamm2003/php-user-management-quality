<?php 
class ProductosController extends ControladorBase {
    public $conectar;
    public $adapter;

    public function __construct() {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }

    public function index() {
        // Producto
        $producto = new Producto($this->adapter);
        $allproducts = $producto->getAll();

        // Usuario
        $usuario = new Usuario($this->adapter);
        $allusers = $usuario->getAll();

        // Cargamos la vista index y le pasamos valores
        $this->view("index", array(
            "allproducts" => $allproducts,
            "allusers" => $allusers,
            "Hola" => "Soy Víctor"
        ));
    }

    public function crear() {
        if (isset($_POST["nombre"])) {
            // Creamos un producto
            $producto = new Producto($this->adapter);
            $producto->setNombre($_POST["nombre"]);
            $producto->setPrecio($_POST["precio"]);
            $producto->setMarca($_POST["marca"]);
            $save = $producto->save();
        }
        $this->redirect("Productos", "index");
    }

    public function borrar() {
        if (isset($_GET["id"])) { 
            $id = (int)$_GET["id"];
            
            // Creamos un producto
            $producto = new Producto($this->adapter);
            $producto->deleteById($id); 
        }
        $this->redirect();
    }
    
    public function modificar() {
        if (isset($_GET["id"])) {
            $id = (int)$_GET["id"];
    
            // Crear una instancia de Producto
            $producto = new Producto($this->adapter);
            $producto->setId($id);
    
            // Obtener los datos del producto por su ID
            $producto->findById();
    
            // Cargar la vista de edición
            $this->view("editarProducto", array("producto" => $producto));
        }
    }

    public function actualizar() {
        if (isset($_POST["id"]) && isset($_POST["nombre"])) {
            // Crear una instancia de Producto
            $producto = new Producto($this->adapter);
            
            // Cargamos el producto existente por su ID
            $producto->setId($_POST["id"]);
            
            // Actualizamos los campos del producto
            $producto->setNombre($_POST["nombre"]);
            $producto->setPrecio($_POST["precio"]);
            $producto->setMarca($_POST["marca"]);

            // Llamamos al método update para guardar los cambios
            $update = $producto->update();
            
            if ($update) {
                echo "Producto actualizado correctamente.";
            } else {
                echo "Error al actualizar el producto.";
            }
        }
        // Redirigir a la vista de edición o a donde sea necesario
    }

    public function hola() {
        // Creamos el objeto producto
        $producto = new Producto($this->adapter);
        
        $productos = new ProductosModel($this->adapter);
        $pro = $productos->getUnProducto();
        var_dump($pro);
    }
}

?>