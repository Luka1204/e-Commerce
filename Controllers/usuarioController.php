<?php
require_once 'Models/usuario.php';


class usuarioController{
    public function index(){
        echo "Controlador funciona";
    }
    public function registro(){
        require_once 'Views/usuario/registro.php';
    }
    
    public function save(){
        if(isset($_POST)){
            $nombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : false;
            $apellido = isset($_POST['txtApellido']) ? $_POST['txtApellido'] : false;
            $email= isset($_POST['txtEmail']) ? $_POST['txtEmail'] : false;
            $password= isset($_POST['txtPass']) ? $_POST['txtPass'] : false;
            
                 //Array de errores
                 $errores = array();
            
            if($nombre && $apellido && $email && $password){
                $usuario = new Usuario();
                
                
                //Validacion Nombres
                if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
                    $nombre_validated = true;
                    $usuario->setNombre($nombre);
                }else{
                   $nombre_validated = false;
                   $errores['nombre'] ="El nombre no es valido";
                }
                
                
                //Validacion Apellidos
                if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)){
                    $apellido_validated = true;
                    $usuario->setApellidos($apellido);
                }else{
                    $apellido_validated= false;
                    $errores['apellido'] ="El apellido no es valido";
                }
                
                
                if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $email_validated = true;
                    $usuario->setEmail($email);
                }else{
                    $email_validated = false;
                    $errores['email'] ="El email no es valido";
                }
                
                if(!empty($password)){
                    $password_validated = true;
                    $usuario->setPassword($password);
                } else {
                    $password_validated = false;
                    $errores['password'] ="La contraseña esta vacia";
                }
                
                $save = $usuario->save();
                if($save){
                   $_SESSION['register'] = "completed";
               }else{
                   $_SESSION['register'] = "failed";
                   $_SESSION['errores'] = $errores;

               }
                header("Location:".base_url."usuario/registro");   
            }else{
              $_SESSION['register'] = "failed";
            } 
            
        }
              

    }//FIN METODO SAVE
    
    public function login(){
        if(isset($_POST)){
            //Identificar al usuario
            //Consulta a la BD 
            $usuario = new Usuario();
            $usuario->setEmail($_POST['txtEmail']);
            $usuario->setPassword($_POST['txtPass']);
            
            $identity = $usuario->login();

         if(is_object($identity) && $identity){
             $_SESSION['identity'] = $identity;
             
             if($identity->rol == "admin"){
                 $_SESSION['admin'] = true;
             }
         } else {
             $_SESSION['error_login'] = "Identificación Fallida!";
        }
        header("Location:".base_url);
    }
}//FIN METODO LOGIN

public function logout(){
    if(isset($_SESSION['identity'])){
        unset($_SESSION['identity']);
    }
    
     if(isset($_SESSION['admin'])){
        unset($_SESSION['admin']);
    }
    
    header("Location:".base_url);
    
} //FIN METODO LOGOUT


} //FIN CLASE