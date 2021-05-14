<?php

class DB extends PDO
{

    public static function getConnection()
    {
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        $dsn = "pgsql:host={$params['host']};port={$params['port']};
        dbname={$params['db_name']}";
        
        $db = new PDO($dsn, $params['user'], $params['password']);

        $db->exec("set names utf8");
        //pgsql:host=localhost;port=5432;dbname=testdb;user=bruce;password=mypass

        return $db;
    }
}