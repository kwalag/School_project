<?php

class Category 
{
 
    public static function getCategoriesList()
    {
        $db = DB::getConnection();

        $categoryList = array();

        $result = $db->query('SELECT id, name FROM public.category '
                    . 'ORDER BY sort_order ASC');

        foreach($result as $row){
            $categoryList[] = array(
                'id' => $row['id'],
                'name' => $row['name']
            );
        }

        return $categoryList;
    }
}