<?php

    $data = json_decode(file_get_contents("php://input")); 
    
    if (!isset($data->nome) || !isset($data->email) || !isset($data->secao) || !isset($data->assunto) || !isset($data->mensagem)) {
        echo json_encode(['status'=>1,'mensagem'=>'Erro']);
        exit;
    } else {
        $to = 'packetloss@packetloss.com.br';
        $from = $data->email;
        
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= "From: \"Site\" <" . $from . ">\r\n" . "Reply-To: " . $from . "\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        
        $body = "Nome: " . $data->nome . "\n";
        $body .= "E-mail: " . $data->email . "\n";
        $body .= "Seção: " . $data->secao . "\n";
        $body .= "Assunto: " . $data->assunto . "\n";
        $body .= "Mensagem: \n\n" . $data->mensagem;
        
        if (@mail($to, 'Contato do site: ' . $data->secao, $body, $headers, '-f' . $from)) {
            echo json_encode(['status'=>0,'mensagem'=>'E-mail enviado com sucesso']);
        } else {
            echo json_encode(['status'=>1,'mensagem'=>'Erro ao enviar e-mail']);            
        }
    }