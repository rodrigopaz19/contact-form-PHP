<?php
    if(isset($_POST)) {
        error_reporting(0);

        //Get variables from form
        $name = $_POST["nombre"];
        $email = $_POST["correo"];
        $subject = $_POST["asunto"];
        $message = $_POST["mensaje"];

        //Get the domain from data was send
        $domain = $_SERVER["HTTP_HOST"];

        //Set parameters for email
        $to = "rodrigopaz.dev@gmail.com";
        $subject = "Contacto desde el formulario del sitio $domain: $subject";
        $message = "
            <p>Datos enviados desde el sitio: $domain</p>
            <ul>
                <li>Nombre: <b>$name</b></li>
                <li>Correo: <b>$email</b></li>
                <li>Asunto: $subject</li>
                <li>Mensaje: $message</li>
            </ul>
        ";
        $headers = "MIME-Version: 1.0\r\n"."Content-Type: text/html; charset=UTF-8\r\n"."From: Envio Automatico. No Responder <no-reply@$domain>";

        //Send email
        $send_email = mail($to,$subject,$message,$headers);

        //Send response to client
        if($send_email) {
            $response = [
                "error" => false,
                "message" => "Tu mensaje ha sido enviado con exito"
            ];
        } else {
            $response = [
                "error" => true,
                "message" => "Tu mensaje NO fue enviado. Favor intenta de nuevo"
            ];
        }

        //Set response header
        header("Cotent-Type: application/json");
        header("Access-Control-Allow-Origin: *"); //Permitimos el envio de datos cruzados desde el servidor
        echo json_encode($response);
        exit;
    }
