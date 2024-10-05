<?php

//permintindo que outros sites usem nossa API
header("Access-Control-Allow-Origin: *");

//permitindo todos os metodos de requisição
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

//avisasndo que tipo de retorno vai acontecer
header("Content-Type: application/json");

//trazendo o array com o json direto
echo json_encode($array);
exit;



?>