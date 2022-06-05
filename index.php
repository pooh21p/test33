<?php
    session_start();
    
    require_once 'db.php';
    require_once 'users.php';
    require_once 'items.php';
    require_once 'tools.php';
    
    $base = preg_replace( '@/[^/]*$@', '', $_SERVER['SCRIPT_NAME']);

    $user = USERS::get_user();

    require_once 'router.php';

    $error='';

	if (isset($_SESSION['login']))
		include 'header1.php';
	else
		include 'header0.php';

    if ($route_found)
        include $route_found.'.php';
