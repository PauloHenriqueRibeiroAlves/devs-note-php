<?php
require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'put') {
    //para pegar informções que não sejam get ou input no PHP tem que usar essa fução
    parse_str(file_get_contents('php://input'), $input);

    //preenchendo as informações na variável
    /*$id = (!empty($input['id'])) ? $input ['id'] : null;*/
    //php acima de 4. alguma coisa
    $id = $input['id'] ?? null;
    $title = $input['title'] ?? null;
    $body = $input['body'] ?? null;

    //para limpar os filtros
    $id = filter_var($id);
    $title = filter_var($title);
    $body = filter_var($body);

    if($id && $title && $body) {
        //buscando se á alguma anotação com o mesmo id
        $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
        $sql -> bindValue(':id', $id);
        $sql -> execute();

        if($sql->rowCount() > 0) {
            //fazendo atualização nos dados que encontrar
            $sql = $pdo->prepare("UPDATE notes SET title = :title, body = :body WHERE id = :id");
            //mandando as informações
            $sql->bindValue(':id', $id);
            $sql->bindValue(':title', $title);
            $sql->bindValue(':body', $body);
            $sql->execute();

            //montando o retorno da atualização
            $array['result'] = [
                'id' => $id,
                'title' => $title,
                'body' => $body
            ];
        }else {
            $array['error'] = 'ID inexistente';
        }
    }else {
        $array['error'] = 'Dados não enviados';
    }
    
}else {
    $array ['error'] = 'Metodo não permitido (apenas PUT)';
}

require('../return.php');


?>