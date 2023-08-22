<?php
namespace Mouro\Core; 

 class Router {
    private static $route=[];

    public static function route($uri,$controller){
        self::$route[$uri]=$controller;

    }
    public static function resolve(){
       
        $uri=$_SERVER["REQUEST_URI"];
        if(isset(self::$route[$uri])){
       
            [$ctrlClass,$action]=self::$route[$uri];
        
            if (class_exists($ctrlClass) && method_exists($ctrlClass,$action)) {
            
                $ctrl = new $ctrlClass();
                $ctrl->{$action}();
            } else {
                dd("Erreur Classe ou Methode");
            }
        } else {
            dd("404");
        }
    }


}
