<?php
class UsuariosController extends ControladorBase {
    public $conectar;
    public $adapter;

    public function __construct() {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }

    public function index() {
        // Creamos el objeto usuario
        $usuario = new Usuario($this->adapter);

        // Conseguimos todos los usuarios
        $allusers = $usuario->getAll();

        // Producto
        $producto = new Producto($this->adapter);
        $allproducts = $producto->getAll();

        // Cargamos la vista index y le pasamos valores
        $this->view("index", array(
            "allusers" => $allusers,
            "allproducts" => $allproducts,
            "Hola" => "Soy Víctor"
        ));
    }

    public function crear() {
        if (isset($_POST["nombre"])) {
            // Creamos un usuario
            $usuario = new Usuario($this->adapter);
            $usuario->setNombre($_POST["nombre"]);
            $usuario->setApellido($_POST["apellido"]);
            $usuario->setEmail($_POST["email"]);
            $usuario->setPassword(hash("sha256", $_POST["password"]));
            $save = $usuario->save();
        }
        $this->redirect("Usuarios", "index");
    }

    public function borrar() {
        if (isset($_GET["id"])) { 
            $id = (int)$_GET["id"];
            
            // Creamos un usuario
            $usuario = new Usuario($this->adapter);
            $usuario->deleteById($id); 
        }
        $this->redirect();
    }
    public function modificar() {
        if (isset($_GET["id"])) {
            $id = (int)$_GET["id"];
    
            // Crear una instancia de Usuario
            $usuario = new Usuario($this->adapter);
            $usuario->setId($id);
    
            // Obtener los datos del usuario por su ID
            $usuario->findById();
    
            // Cargar la vista de edición
            $this->view("editarUsuario", array("usuario" => $usuario));
        }
    }

    public function actualizar() {
        if (isset($_POST["id"]) && isset($_POST["nombre"])) {
            // Creamos un usuario
            $usuario = new Usuario($this->adapter);
            
            // Cargamos el usuario existente por su ID
            $usuario->setId($_POST["id"]);
            
            // Actualizamos los campos del usuario
            $usuario->setNombre($_POST["nombre"]);
            $usuario->setApellido($_POST["apellido"]);
            $usuario->setEmail($_POST["email"]);
            $usuario->setPassword(hash("sha256", $_POST["password"]));

            // Llamamos al método update para guardar los cambios
            $update = $usuario->update();
            
            if ($update) {
                echo "Usuario actualizado correctamente.";
            } else {
                echo "Error al actualizar el usuario.";
            }
        }
        // Redirigir a la vista de edición o a donde sea necesario
    }

    public function hola() {
        // Creamos el objeto usuario
        $usuario = new Usuario($this->adapter);
        
        $usuarios = new UsuariosModel($this->adapter);
        $usu = $usuarios->getUnUsuario();
        var_dump($usu);
    }
}

?>