<?php 
    
    require_once 'config/Config.php';    

    spl_autoload_register(function($libs){

        $route='libs/' . $libs . '.php';
       
        if(isset($route)){
            include_once $route; 
        }

    });

