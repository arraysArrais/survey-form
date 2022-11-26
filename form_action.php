<?php
session_start();
require 'config/connection.php';
require 'functions/valida_cpf.php';

$nome = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);


//se não passar pelo filtro de e-mail
if($email === false){
    $_SESSION['erro'] = "<p class=" . "error" . ">ERRO! Email inválido!<p>";
    header("Location: index.php");
    exit;
}

//verificando se o cpf é válido
if(validaCPF($cpf)==true){

//recebo as respostas num array
$arrayRespostas = filter_input(INPUT_POST, 'resposta', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);


$pdo = $db->query("select * from usuarios where email='$email'");
$validaCpf = $db->query("select * from usuarios where cpf='$cpf'");

//verificando se e-mail já existe
if ($pdo->rowCount() > 0) {
    $_SESSION['erro'] = "<p class=" . "error" . ">ERRO! Email já existente!<p>";
    header("Location: index.php");
    exit;
} 
//verificando se cpf já existe
else if ($validaCpf->rowCount() > 0) {
    $_SESSION['erro'] = "<p class=" . "error" . ">ERRO! CPF já existente!<p>";
    header("Location: index.php");
    exit;
} else {
    //inserindo usuário na base
    $pdo = $db->prepare("INSERT INTO usuarios (nome, email, cpf) VALUES (:nome, :email, :cpf)");
    $pdo->bindValue(':nome', $nome);
    $pdo->bindValue(':email', $email);
    $pdo->bindValue(':cpf', $cpf);
    $pdo->execute();

    //pegando ID do usuário que acabou de ser inserido
    $id = $db->lastInsertId();

    //inserindo respostas
    foreach ($arrayRespostas as $key => $value) {
        $resposta = $value;

        $pdo = $db->prepare("INSERT INTO usuarios_respostas (idUsuarios, idRespostas) VALUES (:id, :resposta)");
        $pdo->bindValue(':id', $id);
        $pdo->bindValue(':resposta', $resposta);
        $pdo->execute();
    }
}

$_SESSION['sucesso'] = "<p class=" . "success" . ">Obrigado por nos emprestar um pouquinho do seu tempo :)<p>";
header("Location: index.php");
exit;
}

else{
    $_SESSION['erro'] = "<p class=" . "error" . ">ERRO! CPF inválido!<p>";
    header("Location: index.php");
    exit;
}
