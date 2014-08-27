<?php
function sendServiciosEmail( $datosPost ){
    $para      = 'info@cajabaja.com';
    $asunto    = '[cajabaja.com - Servicios] Solicitud de contacto';
    $mensaje   = '';
    foreach( $datosPost as $key => $value ){
        $mensaje .= "{$key}: $value\n";
    }
    $cabeceras = 'From: '. $datosPost['email'] . "\r\n";

    return mail($para, $asunto, $mensaje, $cabeceras);
}

function sendContactoEmail( $datosPost ){
    $para      = 'info@cajabaja.com';
    $asunto    = '[cajabaja.com - Contacto] Solicitud de contacto';
    $mensaje   = '';
    foreach( $datosPost as $key => $value ){
        $mensaje .= "{$key}: $value\n";
    }
    $cabeceras = 'From: '. $datosPost['email'] . "\r\n";

    return mail($para, $asunto, $mensaje, $cabeceras);
}

function send_contact_mail( $resultCampos ){
    require_once "Mail.php";

    $from = $resultCampos['email'];
    $to = "contact@charming-spain.com";
    $subject = "Contact request from ".$resultCampos['nombre'];
    $body = '';

    foreach ($resultCampos as $clave => $valor){
        if( trim( $valor ) == true ){
            $body .= $clave.': '.$valor."\n";
        }
    }

    $host = "ssl://localhost";
    $port = "465";
    $username = "info@grupokalpana.com";
    $password = "info";

    $headers = array ('From' => $from,
    'To' => $to,
    'Subject' => $subject);
    $smtp = Mail::factory('smtp',
    array ('host' => $host,
        'port' => $port,
        'auth' => 'LOGIN',
        'debug' => false,
        'username' => $username,
        'password' => $password));

    $mail = $smtp->send($to, $headers, $body);

    if (PEAR::isError($mail)) {
        //$resultCampos['enviado'] = $mail->getMessage();
        return false;
    } else {
        //$resultCampos['enviado'] = 'ok';
        return true;
    }
}
?>