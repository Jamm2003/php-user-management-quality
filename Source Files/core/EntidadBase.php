<?php

class EntidadBase
{
    protected $table;
    protected $db;
    protected $conectar;

    public function __construct($table, $adapter)
    {
        $this->table = (string) $table;
        $this->conectar = null;
        $this->db = $adapter;
    }
    public function getConectar()
    {
        return $this->conectar;
    }

    public function db()
    {
        return $this->db;
    }
    public function getAll()
    {
        $resultSet = array();

        $query = $this->db->query("SELECT * FROM $this->table ORDER BY id DESC");

        if ($query) {
            while ($row = $query->fetch_object()) {
                $resultSet[] = $row;
            }
        } else {
            die("Error en la consulta getAll: " . $this->db->error);
        }

        return $resultSet;
    }


    public function getById($id)
    {
        $query = $this->db->query("SELECT * FROM $this->table WHERE id='$id'");

        if ($row = $query->fetch_object()) {
            $resultSet = $row;
        }
        return $resultSet;
    }

    public function getBy($column, $value)
    {
        $query = $this->db->query("SELECT * FROM $this->table WHERE $column='$value'");

        while ($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }

        return $resultSet;
    }

    public function deleteById($id)
    {
        $query = $this->db->query("DELETE FROM $this->table WHERE id=$id");
        return $query;
    }

    public function deleteBy($column, $value)
    {
        $query = $this->db->query("DELETE FROM $this->table WHERE $column='$value'");
        return $query;
    }
    public function updateBy($column, $value, $data)
    {
        $setClause = "";
        foreach ($data as $col => $val) {
            $setClause .= "$col = '$val', ";
        }
        $setClause = rtrim($setClause, ', ');

        $query = $this->db->query("UPDATE $this->table SET $setClause WHERE $column='$value'");
        return $query;
    }


}
