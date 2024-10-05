<?php
//arquivo base, opnde vai estar minha coneção com o banco de dados
$db_host = 'localhost';
$db_name =  'devsnotes';
$db_user = 'root';
$db_pass = '';

//variavél que vai me conctar com o banco de dados
$pdo = new PDO ("mysql:dbname=$db_name;host=$db_host", $db_user, $db_pass);

//tdos os arquivos vão ter um array que vai retornar um json
$array = [
    'error' => '',
    'result' => []
];

?>