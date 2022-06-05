<?php
    
    if (strtolower($_SERVER['REQUEST_METHOD'])=='post')
    {
		//$sent = TOOLS::get_post_vars();
        $user = USERS::get_user();
        if ($user)
        {
            $_SESSION['login'] = $user['login'];
            header('Location: '.$base.'/user');
        
        } else {
            $error="Ошибка: неверный логин или пароль!";
        }
    }
    
    include 'login_html.php';
	  