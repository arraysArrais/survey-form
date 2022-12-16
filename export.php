<?php
session_start();
require 'config/connection.php';
require __DIR__ . "/vendor/autoload.php";

use League\Csv\Writer;


//verifica se o token gravado no banco bate com o token da sessão   
if (empty($_SESSION['token'])) {
  $_SESSION['erro'] = "<p class=" . "error" . ">Você não está logado</p><br>";
  header("Location: login.php");
  exit;
} 

else {
  try {
    $sql = $db->prepare("SELECT * FROM admin where session_token = :token");
    $sql->bindValue(':token', $_SESSION['token']);
    $sql->execute();

    $data = $sql->fetch(PDO::FETCH_ASSOC);

    if ($_SESSION['token'] === $data['session_token']) {
      $dbData = $db->prepare("SELECT u.id, u.nome, u.email, u.cpf, u.data_criacao, c.categoria, r.resposta  FROM usuarios u
      INNER JOIN usuarios_respostas ur ON u.id=ur.idUsuarios
      INNER JOIN respostas r ON ur.idRespostas=r.id
      INNER JOIN categoria c ON r.idCategoria=c.id
      ORDER BY u.id asc");

      $dbData->setFetchMode(PDO::FETCH_ASSOC);
      $dbData->execute();

      $csv = Writer::createFromFileObject(new SplTempFileObject());
      $csv->insertOne(['id', 'nome', 'email', 'cpf', 'data_criacao', 'categoria', 'resposta']);
      $csv->insertAll($dbData);
      $csv->output('respostas.csv');
    } else {
      $_SESSION['erro'] = "<p class=" . "error" . ">Sessão expirada<p><br>";
      header("Location: login.php");
      exit;
    }
  } 
  
  catch (Throwable $e) {
    $_SESSION['erro'] = "<p class=" . "error" . ">Erro ao buscar informações no banco de dados<p><br>";
    header("Location: login.php");
    exit;
  }
}
