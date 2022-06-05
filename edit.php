<?php

    if (strtolower($_SERVER['REQUEST_METHOD'])=='post')
    {
		$sent = TOOLS::get_post_vars();
		$action = $sent['action'] ?? '';


		if ($action=='save')
		{
			ITEMS::save_item($sent);
		}
    } elseif (strtolower($_SERVER['REQUEST_METHOD'])=='get') {
		$sent = TOOLS::get_get_vars();
		$action = $sent['action'] ?? '';

		if ($action=='remove')
		{
			ITEMS::delete_item($sent['id']);
		}

		if (isset($action) )
		if ($action=='edit' || $action=='save')
		{
			if ($sent['id']>0)
			{
				$item = ITEMS::get_item($sent['id']);
			} else {
				$item = array(
					'id' => 0,
					'name' => '',
					'description' => '',
					'parent_id' => 0,
				);
			}
			
			global $items, $children;
			list($items, $children) = ITEMS::get_items();
			$options = TOOLS::options_tree_code(0, $item['id'], $item['parent_id']);
			
			include 'edit_form_html.php';
			return;
		}
    }
    
    list($items,$children) = ITEMS::get_items();
    include 'edit_html.php';
	  