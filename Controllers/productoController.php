<?php
require_once 'Models/producto.php';
class productoController{
    public function index(){

        $producto = new Producto();
        $productos = $producto->getRandom(6);

        //Renderizamos la vista
        require_once 'Views/producto/destacados.php';
    }


    public function verProducto(){
        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $edit = true;

            $producto = new Producto();
            $producto->setId($id);
            $pro = $producto->getOne();

        }
        require_once 'Views/producto/ver.php';
    }

    public function gestion(){
        Utils::isAdmin();

        $producto = new Producto();
        $productos = $producto->getAll();

        require_once 'Views/producto/gestion.php';
    }
    
    public function crear(){
        require_once 'Views/producto/crear.php';
    }

    public function save(){
        Utils::isAdmin();
        //CONDICIONES POST
        if(isset($_POST)){
           $nombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : false;
           $descripcion= isset($_POST['txtDesc']) ? $_POST['txtDesc'] : false;
           $precio= isset($_POST['txtPrecio']) ? $_POST['txtPrecio'] : false;
           $stock= isset($_POST['txtStock']) ? $_POST['txtStock'] : false;
           $categoria= isset($_POST['txtCat']) ? $_POST['txtCat'] : false;
            $imagen= isset($_FILES['imagen']) ? $_FILES['imagen'] : false;
         
           

           if($nombre && $descripcion && $precio && $stock && $categoria){
               $producto = new Producto();
               $producto->setNombre($nombre);
               $producto->setPrecio($precio);
               $producto->setDescripcion($descripcion);
               $producto->setStock($stock);
               $producto->setCategoria_id($categoria);

               //Guardar imagen
               if(isset($_FILES['imagen'])){
               $filename = $_FILES['imagen']['name'];
               $mimetype = $_FILES['imagen']['type'];
                if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){
                    if(!is_dir('uploads/images')){
                        mkdir('uploads/images', 0777, true);
                    }
                    move_uploaded_file($imagen['tmp_name'], 'uploads/images/'.$filename);
                    $producto->setImagen($filename);
                }
            }
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $producto->setId($id);
                    $save = $producto->edit();
                }else{
                    $save = $producto->save();
               } 
            
            
           
               if($save){
                   $_SESSION['producto'] = "completed";
               }else{
                $_SESSION['producto'] = "failed";
               }
           }else{
            $_SESSION['producto'] = "failed";
           }
        }else{
            $_SESSION['producto'] = "failed";
        }
       
        //FIN CONDICIONES POST
        header('Location:'.base_url.'producto/gestion');
    }


    public function editar(){
        Utils::isAdmin();

        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $edit = true;

            $producto = new Producto();
            $producto->setId($id);
            $pro = $producto->getOne();


            require_once 'Views/producto/crear.php';
        }else{
            header('Location:'.base_url.'producto/gestion');
        }

    }

    public function borrar(){
        Utils::isAdmin();
        var_dump($_GET);

       if(isset($_GET['id'])){
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $delete = $producto->delete();

            if($delete){
                $_SESSION['delete'] = 'completed';
            }else{
                $_SESSION['delete'] = 'failed';
            }

        }else{
            $_SESSION['delete'] = 'failed';
        }
        header('Location:'.base_url.'producto/gestion');
    }
}

