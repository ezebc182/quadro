<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 17/06/15
 * Time: 20:20
 */
function verificarCaptcha($captcha)
{
    $secretKey = "6Lcg4QoTAAAAAG3R-CQAnub22yLBzOZRNdmShdd3";
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);

    if ($response . success == false) {
        echo json_encode(array("Valido" => false));
    } else {
        echo json_encode(array("Valido" => true));
    }
}

function EnviarEmail()
{
    require_once 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->setLanguage("es");
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'mail.quadroequipamiento.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'no-reply@quadroequipamiento.com'; // SMTP username
    $mail->Password = 'N0r3PlyQu4dr0'; // SMTP password
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';

    $to = 'no-reply@quadroequipamiento.com';
    $from = filter_input(INPUT_POST, 'Email');

    $mail->From = $from;
    $mail->FromName = 'Quadro | diseño - equipamiento';
    $mail->addAddress($to, 'No responder'); // Add a recipient
    if (isset($_POST['Asunto'])) {

        $mail->Subject = '[Compra] ' . filter_input(INPUT_POST, 'Nombre') . ": " . filter_input(INPUT_POST, 'Asunto');
    } else {
        $mail->Subject = '[Mensaje] ';
    }
    $mail->isHTML(true);

    $mail->Body = '<p>Nuevo mensaje desde la web:</p><br>';
    $mail->Body .= '<table>';
    $mail->Body .= '<thead>';
    $mail->Body .= '<tr>';
    $mail->Body .= '</tr>';
    $mail->Body .= '</thead>';
    $mail->Body .= '<tbody style="background-color: #a85489;color:#333333;>';
    $mail->Body .= '<tr>';
    $mail->Body .= 'Datos del cliente: </br>';
    $mail->Body .= 'Nombre: ' . filter_input(INPUT_POST, 'Nombre') . '</br>';
    $mail->Body .= 'Email: ' . filter_input(INPUT_POST, 'Email') . '</br>';
    $mail->Body .= 'Telefono:' . filter_input(INPUT_POST, 'Telefono') . '</br>';
    $mail->Body .= 'Mensaje: ' . filter_input(INPUT_POST, 'Mensaje') . '</br>';
    $mail->Body .= '</tr>';
    $mail->Body .= '</tbody>';
    $mail->Body .= '</table>';
    $mail->AltBody = "Para ver este mensaje, por favor utilice un visor de emails compatible con HTML."; // optional, comment out and test


    if (!$mail->send()) {
        echo json_encode(array(
            "Mensaje" => "Fail",
            "Error" => $mail->ErrorInfo
        ));

    } else {
        echo json_encode(array(
            "Mensaje" => "Ok"
        ));
    }
}


if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if (isset($_POST['funcion'])) {
        switch ($_POST['funcion']) {
            case 'verificar-captcha':
                $captcha = filter_input(INPUT_POST, 'captcha');
                verificarCaptcha($captcha);
                break;
            case 'enviar-email':
                EnviarEmail();
                break;
        }
    }


} else {
    header('location: ../../Paginas/401.php');
}
