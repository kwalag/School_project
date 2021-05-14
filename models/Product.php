<?php

class Product
{

    const SHOW_BY_DEFAULT = 10;

    /**
     * Returns an array of products
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
        //$count - количество товаров которое хотим получить

    {
        $count = intval($count);
        $db = Db::getConnection();
        $productsList = array();

        $result = $db->query('SELECT id, name, price, is_new, image FROM product '
                . 'WHERE status = 1 '
                . 'ORDER BY id DESC '                
                . 'LIMIT ' . $count);
        
            // echo "<pre>";
            //     var_dump($result);
            // echo "</pre>";        

        //все полученные данные кладем в результирующий массив
        if (is_array($result) || is_object($result))
        {
            foreach($result as $row){
                $productsList[] = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'price' => $row['price'],
                    'is_new' => $row['is_new'],
                    'image' => $row['image']
                );
            }
        }

        return $productsList;
    }


    public static function getProductsListByCategory($categoryId = false)
    {
        if ($categoryId) {
            echo $categoryId;
            echo "<br>";

            $db = DB::getConnection();            
            $products = array();
            $categoryId = substr($categoryId, 1);
            // $categoryId = intval($categoryId);

            $result = $db->query("SELECT id, name, price, image, is_new FROM product "
                    . "WHERE status = '1' AND category_id = '$categoryId' "
                    . "ORDER BY id DESC "                
                    . "LIMIT ".self::SHOW_BY_DEFAULT);
            
                    // echo "<pre>";
                    //     var_dump($result);
                    // echo "</pre>";       
                    
                    // echo "<pre>";
                    //     var_dump($result);
                    // echo "</pre>";   

            if (is_array($result) || is_object($result))
            {
                foreach($result as $row){
                    $products[] = array(
                        'id' => $row['id'],
                        'name' => $row['name'],
                        'price' => $row['price'],
                        'is_new' => $row['is_new'],
                        'image' => $row['image']
                    );
                }
            }
            // print_r($products);
            return $products;       
        }
    }

    public static function getProductById($id)
    {
        
        // $id = intval($id);
        $id = substr($id, 1);
        echo $id;
         if ($id) {                        
             $db = DB::getConnection();
            echo $id;
             $result = $db->query('SELECT * FROM product WHERE id=' . $id);
             $result->setFetchMode(PDO::FETCH_ASSOC);
             
             return $result->fetch();
         }
     
    }

}