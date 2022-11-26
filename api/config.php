<?php

$db_host = 'localhost';
$db_name = 'survey';
$db_user = 'root';
$db_pass = '';

$db = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_pass);

$array = [
    'error' => '',
    'result' => []
];