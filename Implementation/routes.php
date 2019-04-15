<?php

    if (isset($_GET['url'])){

        $url = explode("/", $_GET['url']);

        require_once 'controllers/' . $url[0] . 'Controller.php';
        
        $controller = new $url[0];

        if (isset($url[1])){
            $method = $url[1];
            $controller->{$method}();
        }
        else{
            $controller->default();
        }

    }
    else{
        require_once 'controllers/defaultController.php';
        
        $controller = new defaultController;

        $controller->default();
    }

?>