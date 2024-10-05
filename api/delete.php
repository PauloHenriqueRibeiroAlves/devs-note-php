<?php
require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'delete') {
    //para pegar informções que não sejam get ou input no PHP tem que usar essa fução
    parse_str(file_get_contents('php://input'), $input);

    //preenchendo as informações na variável
    /*$id = (!empty($input['id'])) ? $input ['id'] : null;*/
    //php acima de 4. alguma coisa
    $id = $input['id'] ?? null;

    //para limpar os filtros
    $id = filter_var($id);

    if($id) {
        //buscando se á alguma anotação com o mesmo id
        $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
        $sql -> bindValue(':id', $id);
        $sql -> execute();

        if($sql->rowCount() > 0) {
            //fazendo atualização nos dados que encontrar
            $sql = $pdo->prepare("DELETE FROM notes WHERE id = :id");
            //mandando as informações
            $sql->bindValue(':id', $id);
            $sql->execute();

            
        }else {
            $array['error'] = 'ID inexistente';
        }
    }else {
        $array['error'] = 'id não enviados';
    }
    
}else {
    $array ['error'] = 'Metodo não permitido (apenas DELETE)';
}

require('../return.php');


?>