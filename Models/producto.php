<?php 
class Producto{
    private $id;
    private $categoria_id;

    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db ;

    public function __construct(){
        $this->db=Database::connect();
    }

    //Getters
    function getId(){
        return $this->id;
    }

    function getNombre(){
        return $this->nombre;
    } 

    function getCategoria_id(){
        return  $this->categoria_id;
    }

    function getDescripcion(){
        return $this->descripcion;
    }

    function getPrecio(){
        return $this->precio;
    }

    function getStock(){
        return $this->stock;
    }

    function getOferta(){
        return $this->oferta;
    }
    function getFecha(){
        return $this->oferta;
    }

    function getImagen(){
        return $this->imagen;
    }


    //Setters
    function setId($id){
        $this->id = $id;
    }

    function setCategoria_id($categoria_id){
        $this->categoria_id = $categoria_id;
    }

    function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDescripcion($descripcion){
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function setPrecio($precio){
        $this->precio = $precio;
    }

    function setStock($stock){
        $this->stock = $stock;
    }
    function setOferta($oferta){
        $this->oferta = $this->db->real_escape_string($oferta);
    }
    function setFecha($fecha){
        $this->fecha = $fecha;
    }
    function setImagen($imagen){
        $this->imagen = $this->db->real_escape_string($imagen);
    }
    
    public function getAll(){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $productos;
    }
    public function getAllCat(){
        $sql = "SELECT p.*, c.nombre AS 'catName' FROM productos p "
        ."INNER JOIN categorias c ON c.id = p.categoria_id "
        ."WHERE p.categoria_id = {$this->getCategoria_id()}"
        ." ORDER BY id DESC;";
        $productos = $this->db->query($sql);
        return $productos;
    }
    public function getOne(){
        $producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}");
        return $producto->fetch_object();
    }
    public function getRandom($limit){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
        return $productos;
    }

    public function save(){
        $sql = "INSERT INTO productos VALUES (NULL,{$this->getCategoria_id()},'{$this->getNombre()}', 
        '{$this->getDescripcion()}',{$this->getPrecio()},{$this->getStock()},NULL,CURDATE(),'{$this->getImagen()}')";
        $save = $this->db->query($sql);
        
   
        $result = false;
        
     
        if($save){
            $result = true;
        }
        echo $this->db->error;

    }

    public function delete(){
        $sql = "DELETE FROM productos WHERE id ={$this->id}";
        $delete = $this->db->query($sql);
        $result = false;
        
        if($delete){
            $result = true;
        }

        return $result;

    }

    public function edit(){
        $sql = "UPDATE productos SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()}, categoria_id={$this->getCategoria_id()}";
        
       if($this->getImagen() != null){
        $sql.=", imagen='{$this->getImagen()}' ";
       }
        $sql.="WHERE id={$this->id} ";

        $save = $this->db->query($sql);
       
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    
}

    ?>