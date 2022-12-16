<?php
session_start();
require 'config/connection.php';

$_SESSION['active'] = 'listar_respostas';

//verifica se o token gravado no banco bate com o token da sessão   
if (empty($_SESSION['token'])) {
    $_SESSION['erro'] = "<p class=" . "error" . ">Você não está logado<p><br>";
    header("Location: login.php");
    exit;
} else {
    try {
        $sql = $db->prepare("SELECT * FROM admin where session_token = :token");
        $sql->bindValue(':token', $_SESSION['token']);
        $sql->execute();

        $data = $sql->fetch(PDO::FETCH_ASSOC);

        if ($_SESSION['token'] === $data['session_token']) {
            $sql = $db->prepare("SELECT u.id, u.nome, u.email, u.cpf, u.data_criacao, c.categoria, r.resposta  FROM usuarios u
      INNER JOIN usuarios_respostas ur ON u.id=ur.idUsuarios
      INNER JOIN respostas r ON ur.idRespostas=r.id
      INNER JOIN categoria c ON r.idCategoria=c.id
      ORDER BY u.id asc");

            $sql->execute();
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $_SESSION['erro'] = "<p class=" . "error" . ">Sessão expirada<p><br>";
            header("Location: login.php");
            exit;
        }
    } catch (Throwable $e) {
        $_SESSION['erro'] = "<p class=" . "error" . ">Erro ao conectar-se ao banco de dados<p><br>";
        header("Location: login.php");
        exit;
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link rel="stylesheet" href="styles.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SurveyForm</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="admin.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="export.php">Exportar dados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $_SESSION['active'] === 'listar_respostas' ? 'active' : '' ?>" href="listar_respostas.php">Listar Respostas</a>
                    </li>

                    <!--<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>-->
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        Bem-vindo(a), <?= $_SESSION['user'] ?>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="table" style="overflow-x:auto;">
        <table border="2">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Data</th>
                <th>Categoria</th>
                <th>Resposta</th>
            </tr>
            <?php foreach ($data as $respostas) : ?>
                <tr>
                    <td><?= $respostas['id'] ?></td>
                    <td><?= $respostas['nome'] ?></td>
                    <td><?= $respostas['email'] ?></td>
                    <td><?= $respostas['cpf'] ?></td>
                    <td><?= date("d/m/y", strtotime($respostas['data_criacao'])) ?></td>
                    <td><?= $respostas['categoria'] ?></td>
                    <td><?= $respostas['resposta'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>