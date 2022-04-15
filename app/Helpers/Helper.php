<?php

namespace App\Helpers;

class Helper
{
    public static function menu($menus, $parent_id = 0, $char = '')
    {   
        $html = '';
        
        foreach($menus as $key => $menu)
        {
            if($menu->parent_id == $parent_id)
            {
                $html .= '
                    <tr>
                        <td>'. $menu->id .'</td>
                        <td>'. $char . $menu->name .'</td>
                        <td>'. $menu->active .'</td>
                        <td>'. $menu->update_at .'</td>
                        <td>Remove and fix</td>
                    </tr>
                ';

                unset($menu[$key]);

                $html .= self::menu($menu, $menu->id, $char .'--');
            }
        }
        
        return $html;
    }
}