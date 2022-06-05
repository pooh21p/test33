<?php

class Users
{
    
    function get_user()
    {
        $sent = TOOLS::get_post_vars();
        
        if (!isset($sent['login']) || !isset($sent['password']))
            return null;
        
        return DB::getRow("SELECT * FROM `users` WHERE `login` = ? AND `password` = ?", [$sent['login'], md5($sent['password'])]);
    }
}
