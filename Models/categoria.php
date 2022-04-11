<?php

class Categoria{
    private $id;
    public $nombre;
    private $db;


    public function __construct(){
    $this->db = Database::connect();
}

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setId($id){
        $this->id= $id;
    }

    public function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getCategorias(){
       $categorias = $this->db->query('SELECT * FROM categorias ORDER BY id DESC;');
    
       return $categorias;
    }

    public function getOneC(){
        $categoria = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()};");
        return $categoria->fetch_object();

    }
    

    public function save(){
        $sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
        $save = $this->db->query($sql);
        
        $result = false;
        
        if($save){
            $result = true;
        }

        return $result;
    }

    public function edit(){
        $nombre = $this->nombre;

        $sql = "UPDATE categorias SET nombre = '{$this->getNombre()}' WHERE id = {$this->getId()}";
        $edit = $this->db->query($sql);
        $result = false;
        
        if($edit){
            $result = true;
        }

        return $result;
        

    }







}



?>