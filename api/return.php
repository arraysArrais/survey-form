<?php 

//permitindo requisições de todas as origens
header("Access-Control-Allow-Origin: *");

//tipos de métodos suportados pela api
header("Acess-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

//informando que o tipo de retorno da api é JSON
header("Content-Type: application/json");

echo json_encode($array, JSON_UNESCAPED_UNICODE);
exit;   