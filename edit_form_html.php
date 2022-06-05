<h1>Редактирование данных <?=($sent['id']>0 ? 'ID='.$sent['id'] : 'Новый элемент');?></h1>

<span style="color:red"><?=$error; ?></span>

<form method="post">
Название<br><input name="name" type="text" value="<?=$item['name'];?>"><br>
Описание<br><textarea name="description"><?=$item['description'];?></textarea><br>
Родитель<br><select name="parent_id">
<option value="0">--Корень--<value>
<?=$options;?></select><br>
<input type="submit" value="Go">
<input name="id" type="hidden" value="<?=$item['id'];?>"><br>
<input name="action" type="hidden" value="save"><br>
</form>
