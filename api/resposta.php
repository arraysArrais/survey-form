<?php

require 'config.php';

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method === 'get') {

    $sql = $db->prepare("SELECT r.resposta, COUNT(r.resposta) AS qtd FROM usuarios_respostas ur
    INNER JOIN respostas r ON ur.idRespostas=r.id
    INNER JOIN categoria c ON c.id=r.idCategoria
    GROUP BY r.resposta
    ORDER BY qtd DESC");
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $array['result'][] = [
                'resposta' => $value['resposta'],
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
