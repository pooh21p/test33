<h1 > Вход </ h1 > 

 <span style = "color:red"><?=$error; ?></span> 

 <form method = "post"> 
login <br><input name = "login" type = "text" value = "<?php echo (isset($sent['login']) ? $sent['login'] : ''); ?>"><br> 
Password <br><input name = "password" type = "password" value = ""><br> 
 <input type = "submit" value = "Go"> 
 </ form> 
