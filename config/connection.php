<?php


$db_host = 'localhost';
$db_name = 'survey';
$db_user = 'root';
$db_pass = '';

try {
    $db = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_pass);
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Throwable $e) {
    // $_SESSION['erro'] = "<p class=" . "error" . ">" . $e->getMessage() . "<p><br>";
    $_SESSION['erro'] = "<p class=" . "error" . ">Erro ao conectar-se ao banco de dados<p><br>";
    //echo "<p class="."error".">Erro ao conectar-se ao banco de dados</p>";


    $now = date("d/m/Y H:i:s", time());

    $errorMsg = "\n" . 'datetime: ' . $now . "\n" . 'error: ' . $e->getMessage() . "\n" . 'file: ' . $e->getFile() . "\n" . 'line: ' . $e->getLine() . "\n";

    if (file_exists(__DIR__ . '/log/errorLog.txt')) {
        $file = fopen(__DIR__ . '/log/errorLog.txt', 'a');
        fwrite($file, $errorMsg);
        fclose($file);
    } else {
        file_put_contents(__DIR__ . '/log/errorLog.txt', $errorMsg);
    }
}