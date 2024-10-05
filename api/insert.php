<?php
/*require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'post') {
    //pegando os filtros dos inputs
    $title = filter_input(INPUT_POST, 'title');
    $body = filter_input(INPUT_POST, 'body');

    if($titlte && $body) {
        $sql = $pdo->prepare("INSERT INTO notes (title, body) VALUES (:title, :body)");
        $sql->bindValue(':title', $title);
        $sql->bindValue(':body', $body);
        $sql->execute();

        //pegando o id que foi retornado
        $id = $pdo -> lastInsertId();

        //preenchendo as informações
        $array['result'] = [
            'id' => $id,
            'title' => $title,
            'body' => $body
        ];
    }else {
        $array['error'] = 'campos não enviados';
    }
   
    
}else {
    $array ['error'] = 'Metodo não permitido (apenas POST)';
}

require('../return.php');*/

require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'post') {
    //pegando os filtros dos inputs
    $title = filter_input(INPUT_POST, 'title');
    $body = filter_input(INPUT_POST, 'body');

    if($title && $body) {
        $sql = $pdo->prepare("INSERT INTO notes (title, body) VALUES (:title, :body)");
        $sql->bindValue(':title', $title);
        $sql->bindValue(':body', $body);
        $sql->execute();

        //pegando o id que foi retornado
        $id = $pdo->lastInsertId();

        //preenchendo as informações
        $array['result'] = [
            'id' => $id,
            'title' => $title,
            'body' => $body
        ];
    } else {
        $array['error'] = 'campos não enviados';
    }
} else {
    $array['error'] = 'Método não permitido (apenas POST)';
}

require('../return.php');

?>