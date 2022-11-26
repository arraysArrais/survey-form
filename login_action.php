<?php
require 'config/connection.php';
session_start();

$user = filter_input(INPUT_POST, 'username');
$pass = filter_input(INPUT_POST, 'pass');

$hashedpass = password_hash($pass, PASSWORD_DEFAULT);

$dbPassQuery = $db->prepare("select pass from admin where username=:user");
$dbPassQuery->bindValue(':user', $user);
$dbPassQuery->execute();

//busca a senha do usuário inserido e armazena em $dbPassRetrieved
$dbPassRetrieved = $dbPassQuery->fetch(PDO::FETCH_ASSOC);

//verificando se o hash armazenado no banco bate com a senha informada no input do form
if(password_verify($pass, $dbPassRetrieved['pass'])==true){
    $_SESSION['username'] = $user;
    header("Location: admin.php");
}
else{
    $_SESSION['erro'] = "<p class=" . "error" . ">Usuário ou senha inválidos<p><br>";
    header("Location: login.php");
    exit;
}



