<?php 

return array (
    'host' => 'localhost',
    'port' => '5432',
    'db_name' => 'phpshop',
    'user' => 'postgres',
    'password' => '',
);

//  $bdConfig = array();
//  //pgsql:host=localhost;port=5432;dbname=testdb;user=bruce;password=mypass
 
//  $bdConfig['type'] = 'pgsql';
//  $bdConfig['host'] = 'localhost';
//  $bdConfig['port'] = '5432';
//  $bdConfig['socket'] =  null; // 'unix_socket=/tmp/mysql.sock';
//  $bdConfig['username'] = 'postgres';
//  $bdConfig['password'] = '1234';
//  $bdConfig['dbname'] = 'TaskManager';
//  $bdConfig['charset'] = 'utf8';

//  if($bdConfig['socket']) {
//     $db_dsn = $bdConfig['type'].':'.$bdConfig['socket'];
//     // $db_dsn = "pgsql:unix_socket=/tmp/mysql.sock"
// } else {
//     $db_dsn = $bdConfig['type'].':host='.$bdConfig['host'].';port='.$bdConfig['port'];
//     // $db_dsn = "pgsql:host=localhost;port=5432"
// }

// $db_dsn .=';dbname='.$bdConfig['dbname'];
// //  $db_dsn = pgsql:host=localhost;port=5432;dbname=testdb;
// define('DB', $bdConfig); 
// define('DB_DSN', $db_dsn);
