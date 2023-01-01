<?php
require 'functions/checksessionerror.php';
session_start();

if (!empty($_SESSION['token'])) {
    header("Location: admin.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <header class="header">
        <h1 id="title">Login</h2>
    </header>
    <div class="logincontainer">
        <form id="survey-form" action="login_action.php" method="POST">
            <div class="formulario">
                <?php
                checkSessionError();
                ?>
                <label for="username">Usuário: </label>
                <input class="inputform" type="text" name="username" placeholder="Insira seu usuário" required>
            </div>
            <div class="formulario">
                <label for="pass">Senha: </label>
                <input class="inputform" type="password" name="pass" placeholder="Insira sua senha" required>
                <br><br>
            </div><br><br>
            <div class="formulario">
                <input id="submit" type="submit" value="Login">
            </div>
        </form>
    </div>
</body>

</html>