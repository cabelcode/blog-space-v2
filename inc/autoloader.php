<?php
function autoloader($className){
    if(file_exists(__DIR__ . "/../controllers/" . $className . ".php" )){
        require __DIR__ . "/../controllers/" .$className . ".php";
    }else if(file_exists( __DIR__ . "/../core/" . $className . ".php" )){
        require __DIR__ . "/../core/" . $className . ".php";
    }
}

spl_autoload_register( 'autoloader' ); 


