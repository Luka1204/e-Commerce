<?php

class Utils{
    
    public static function mostrarError($errores, $campo){
        $alerta = '';
        if(isset($errores[$campo]) && !empty($campo)){
          $alerta = "<strong class='alert_red'>".$errores[$campo]."</strong>" ;                  
        }
           return $alerta;
    }
    
     public static function deleteSession($name){
        if(isset( $_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);        
        }
        return $name;
    }

    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    public static function showCategorias(){
        require_once'Models/categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getCategorias();

        return $categorias;
    } 

    public static function statsCarrito(){
        $stats= array(
            'count'=> 0,
            'total'=> 0
        );
        
        if(isset($_SESSION['cart'])){
            $stats['count'] = count($_SESSION['cart']);
        
            foreach($_SESSION['cart'] as $index => $value){
                $stats['total'] += $value['precio'] * $value['unidades'];

            }
        }

        return $stats;
    }

    
    
}