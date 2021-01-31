<?php
$file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'json' . DIRECTORY_SEPARATOR . 'chat.json';
$data = json_decode(file_get_contents("php://input"));
$method = $_SERVER["REQUEST_METHOD"]; //GET POST PUT HEAD DELETE PATCH OPTIONS

if (
    // isset($data->id) && 
    isset($data->apelido) && 
    isset($data->mensagem)
) {
    $fp = fopen($file, 'a+');
    flock($fp, LOCK_EX);
    fwrite($fp, json_encode(['id'=>1, 'apelido'=> $data->apelido, 'mensagem'=> $data->mensagem]) . ',' . PHP_EOL);
    flock($fp, LOCK_UN);
    fclose($fp);

    //echo json_decode(file_get_contents($file));
} else {
    //$json = json_decode(file_get_contents($file));
    //$id = end($json)->id;
    echo file_get_contents($file);
}