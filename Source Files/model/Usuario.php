<?php

class Usuario extends EntidadBase
{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;

    public function __construct($adapter)
    {
        $table = "usuarios";
        parent::__construct($table, $adapter);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function findById()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = " . $this->id;
        $result = $this->db()->query($query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
            $this->nombre = $row['nombre'];
            $this->apellido = $row['apellido'];
            $this->email = $row['email'];
            $this->password = $row['password'];

        }
    }

    public function save()
    {
        $query = "INSERT INTO usuarios (nombre, apellido, email, password)
                  VALUES (
                    '" . $this->nombre . "',
                    '" . $this->apellido . "',
                    '" . $this->email . "',
                    '" . $this->password . "'
                  )";

        $save = $this->db()->query($query);

        return $save;
    }

    public function update()
    {
        $query = "UPDATE usuarios SET
                  nombre = '" . $this->nombre . "',
                  apellido = '" . $this->apellido . "',
                  email = '" . $this->email . "',
                  password = '" . $this->password . "'
                  WHERE id = " . $this->id;

        $update = $this->db()->query($query);

        return $update;
    }
}
