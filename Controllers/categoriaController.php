<?php
require_once 'Models/categoria.php';
require_once 'Models/producto.php';

class categoriaController{
    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getCategorias();

        require_once 'Views/categoria/index.php';
    }


    public function crear(){
        Utils::isAdmin();
        require_once 'Views/categoria/crear.php';
    }

    public function ver(){
     
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            //Conseguir Categoria
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria = $categoria->getOneC();

            //Conseguir Productos;
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCat();
        }

        require_once 'Views/categoria/ver.php';
    }

    public function editar(){
        Utils::isAdmin();  
        require_once 'Views/categoria/editar.php';
        if(isset($_POST) && isset($_POST['txtNombreC'])){
            $categoria = new Categoria;            
            $nombre = $categoria->setNombre($_POST['txtNombreC']);
            $edit = $categoria->edit();
            
            var_dump($categoria);
        }
        
    }

    public function save(){
        Utils::isAdmin();   

        if(isset($_POST) && isset($_POST['txtNombreC'])){

        //Guardar la categoria en bd
        $categoria = new Categoria();
        $categoria->setNombre($_POST['txtNombreC']);
        $save = $categoria->save();
    }
        header("Location:".base_url.'categoria/index');
    }
}

