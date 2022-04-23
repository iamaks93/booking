<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
define('DB',[
    'HOST' => 'localhost',
    'USER' => 'root',
    'PASS' => 'root',
    'DB' => 'vehicle_booking',
    'CHAR_SET' => 'utf8',
]);
//Domain URL
define('DOMAIN_URL','http://'.$_SERVER['HTTP_HOST'].'/v_book/');