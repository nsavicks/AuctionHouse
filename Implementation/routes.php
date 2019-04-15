<?php

    if (isset($controllerName)){

        require_once 'controllers/' . $controllerName . '.php';
        
        $controller = new $controllerName;

        if (isset($method)){
            $controller->{$method}();
        }
        else{
            $controller->default();
        }

    }
    else{
        require_once 'controllers/DefaultController.php';
        
        $controller = new DefaultController;

        $controller->default();
    }

?>