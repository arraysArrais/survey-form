<?php
//verifica se o usuário está logado para acessar a página
session_start();
if (!empty($_SESSION['username'])) {
  $user = $_SESSION['username'];
} else {
  header("Location: index.php");
  exit;
}

require 'config/connection.php';
require __DIR__ . "/vendor/autoload.php";

use League\Csv\Writer;

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
