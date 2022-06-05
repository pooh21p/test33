<?php

class Items
{
    
    public function get_items()
    {
        $temps = DB::getAll("SELECT * FROM `items`");
        
        $items = array();
        $children = array();
        foreach ($temps as $temp)
        {
            $items[$temp['id']] = $temp;
            $children[$temp['parent_id']][] = $temp['id'];
        }

        return array($items,$children);
    }

    public function delete_item($id)
    {
        global $childrend;
        list(, $childrend) = self::get_items();
        self::delete_items_recursive($id);
    }

    public function delete_items_recursive($id)
    {
        global $childrend;

        if (isset($childrend[$id]))
        foreach ($childrend[$id] as $cid)
        {
            self::delete_items_recursive($cid);
        }    
        
        DB::set("DELETE FROM `items` WHERE `id` = ?", $id);
     }
     
    public function get_item($id)
    {
        $item = DB::getRow("SELECT * FROM `items` WHERE id = ?", $id);
        return $item;
    }

    public function save_item($item)
    {
        if ($item['id'] > 0)
        {    
            DB::set("UPDATE `items` SET name = ?, description = ?, parent_id = ? WHERE id = ?", array($item['name'], $item['description'] , $item['parent_id'], $item['id']));
        } else {
            DB::set("INSERT INTO `items` SET name = ?, description = ?, parent_id = ? ", array($item['name'], $item['description'] , $item['parent_id']));
        }
    }
     
}
