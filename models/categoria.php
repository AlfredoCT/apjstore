<?php

class categoria{
    private $id;
    private $nombres;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }

    function getNombres(){
        return $this->nombres;
    }

    function setId($id){
        $this->id = $id;
    }

    function setNombre($nombres){
        $this->nombres = $this->db->real_escape_string($nombres);
    }

    public function getAll(){
        $sql = "SELECT * FROM categorias ORDER BY id DESC";
        $categorias = $this->db->query($sql);
        return $categorias;
    }

    public function save(){
        $sql = "INSERT INTO categorias VALUES(
            NULL, '{$this->getNombres()}')";
        $save = $this->db->query($sql);
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM categorias where id = {$this->id}";
        $delete = $this->db->query($sql);
        return $delete;

        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }


}