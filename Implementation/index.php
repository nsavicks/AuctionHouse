<?php

    require_once 'include/dbConf.php';

    if (isset($_GET['url'])){

        $url = explode("/", $_GET['url']);
        $controllerName = $url[0] . 'Controller';
        if (isset($url[1])){
            $method = $url[1];
        }

    }

    require_once 'views/page_layout.php';

?>