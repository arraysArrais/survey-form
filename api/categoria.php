<?php

require 'config.php';

$method = strtolower($_SERVER['REQUEST_METHOD']);


if ($method === 'get') {

    $sql = $db->prepare("SELECT c.categoria, count(r.resposta) AS qtd FROM usuarios_respostas ur
    INNER JOIN respostas r ON ur.idRespostas=r.id
    INNER JOIN categoria c ON c.id=r.idCategoria
    GROUP BY c.categoria
    ORDER BY qtd DESC");
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $array['result'][] = [
                'categoria' => $value['categoria'],
                'qtd' => $value['qtd']
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
