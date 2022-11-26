<?php

require 'config.php';

$method = strtolower($_SERVER['REQUEST_METHOD']);


if ($method === 'get') {

    $sql = $db->prepare("SELECT u.id, u.nome, u.email, u.cpf, u.data_criacao, c.categoria, r.resposta  FROM usuarios u
    INNER JOIN usuarios_respostas ur ON u.id=ur.idUsuarios
    INNER JOIN respostas r ON ur.idRespostas=r.id
    INNER JOIN categoria c ON r.idCategoria=c.id
    ORDER BY u.id ASC");
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $array['result'][] = [
                'id' => $value['id'],
                'nome' => $value['nome'],
                'email' => $value['cpf'],
                'data_criacao' => $value['data_criacao'],
                'categoria' =>$value['categoria'],
                'resposta' => $value['resposta']
            ];
        }
    } else {
        http_response_code(404);
        $array['error'] = 'Não foram encontrados resultados na base!';
    }
} else {
    http_response_code(405);
    $array['error'] = 'Método não permitido, favor utilizar GET';
}

require 'return.php';
