<?php

class Tools
{
	
    public function get_post_vars()
    {
        $sent = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        return $sent;
    }    
    public function get_get_vars()
    {
        $sent = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        return $sent;
    }    

	function edit_tree_code($parent_id, $depth=0)
	{
		global $items;	
		global $children;	
		
		$result = '';
		if (isset($children[$parent_id]))
		foreach($children[$parent_id] as $id)
		{
			$result .= '<li class="open">'
			 . str_repeat('&nbsp&nbsp', $depth)
			 . ' <a href="?action=edit&id='.$id.'">'.$items[$id]['name'].'</a>'
			 . ' <a href="?action=remove&id='.$id.'">DEL</a>'
			 . '</li>';

			$result .= self::edit_tree_code($id, $depth+1);
		}	
		if ( $depth==0)
			$result = '<ul class="ul_tree">'.$result.'</ul>';
		
		return $result;
	}
	
	function view_tree_code($parent_id, $depth=0)
	{
		global $items;	
		global $children;	
		
		$result = '';
		if (isset($children[$parent_id]))
		foreach($children[$parent_id] as $id)
		{
			$result .= '<li class="c'.$parent_id. ($depth == 0 ? ' open ' : '') .'">'
			 . str_repeat('&nbsp&nbsp', $depth). '<span onclick="javascript:show_description('.$id.')">'.$items[$id]['name'].'</span>'  
			 . (isset($children[$id]) ? ' <span onclick="javascript:toggle_item('.$id.')">+</span>' : '')
			 .'</li>';
			
			$result .= '<div style="display:none" id="cd'.$id.'">'
			 .  $items[$id]['description']
			 .'</div>';

			$result .= self::view_tree_code($id, $depth+1);
		}	
		if ( $depth==0)
			$result = '<ul class="ul_tree">'.$result.'</ul>';
		
		return $result;
		
	}
	
	function options_tree_code($item_id, $current_id=0, $current_parent_id=0, $depth=0)
	{
		
		global $items;	
		global $children;	

		$result = '';
		if (isset($children[$item_id]))
		foreach($children[$item_id] as $id)
		{
			if ($id==$current_id)
				continue;
			$result .= '<option value="'.$id.'"'.($items[$id]['id']==$current_parent_id ? ' selected' : '').'>'
			 . str_repeat('&nbsp&nbsp', $depth)
			 .$items[$id]['name']  
			 .'</option>';
			$result .= self::options_tree_code($id, $current_id, $current_parent_id, $depth+1);
		}	
		return $result;
	}
	
}
