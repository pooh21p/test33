<?php


for ($i=11; $i<100; $i+=11)
{
	
		$user['email']=$i.'@mail.ru';
		$user['login']=$i;
		$user['password']=md5($i);
		$user['fio']='name_'.$i;
	
		$insert_id = DB::add("INSERT INTO `users` SET  `email` = ?, `login` = ?,  `password` = ?,  `fio` = ? ", array($user['email'], $user['login'], $user['password'], $user['fio']));	
	
}



for ($i=1; $i<100; $i++)
{
	
		$user['email']=$i.'@mail.ru';
		$user['login']=$i;
		$user['password']=md5($i);
		$user['fio']='name_'.$i;
	
		$insert_id = DB::add("INSERT INTO `items` SET  `parent_id` = ?, `id` = ?,  `name` = ?,  `description` = ? ", array(rand(0,$i-1), $i, 'name '.$i, 'description '.$i));	
	
}

