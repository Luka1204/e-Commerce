<?php

function controller_Autoload($className){
    include 'Controllers/'.$className.'.php';
}

spl_autoload_register('controller_Autoload');     
    

