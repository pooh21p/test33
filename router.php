<?php
    
    $uri = $_SERVER['REQUEST_URI'];

    if (isset($_SESSION['login']))
    {    
        $route_found = 'edit';
    } else {
        $route_found = 'view';
    }    

    $routes = array(
        'user / login' => 'login',
        'user / logout' => 'logout',
    );

    foreach ($routes as $route_key => $route )
    {
        if (substr($uri, - strlen($route_key)) == $route_key)
            $route_found = $route;
    }
