<?php

if (isset($_POST['apelido']) && isset($_POST['mensagem'])) {
    extract($_POST);
    $fp = fopen('chat.json', 'a+');
    fwrite($fp, json_encode(['apelido'=> $apelido, 'mensagem'=> $mensagem]));
    fclose($fp);
} else {
    echo json_decode(file_get_contents("chat.json"));
}