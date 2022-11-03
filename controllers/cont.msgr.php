<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require ("vendor/autoload.php");
$mail = new PHPMailer();


require("models/mod.contents.php");
$modelContt = new Contents();
$contt_error = $modelContt->getContents(0, $_SESSION["lang"]);
$contt_msgr = $modelContt->getContents(9, $_SESSION["lang"]);


if(isset($_POST["send_msg"])) {

    if (
        mb_strlen($_POST["sender"]) >= 4 &&
        mb_strlen($_POST["sender"]) <= 90 &&
        mb_strlen($_POST["message"]) >= 8 &&
        mb_strlen($_POST["message"]) <= 3000 &&
        mb_strlen($_POST["contacts"]) >= 9 &&
        mb_strlen($_POST["contacts"]) <= 400
    ) {
    
        $sender = $_POST["sender"];
        $message = $_POST["message"];
        $contacts = $_POST["contacts"];

        try {
            
            //$mail->SMTPDebug = SMTP::DEBUG_LOWLEVEL;
            $mail->isSMTP();                                            
            $mail->Host = "smtp.gmail.com";                     
            $mail->SMTPAuth = true;                                   
            $mail->Username = "rhcmarques.box@gmail.com";                     
            $mail->Password = "jyxyklhcdlpkrbfv";                              
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  
            $mail->Port = 465;                            

            $mail->setFrom("rhcmarques.box@gmail.com", "$sender");
            $mail->addAddress("tsm_geral@mail.com");   

            $mail->isHTML(true);
            $mail->Subject = "Mensagem de Visitantes/Users";
            $mail->Body = "
                <p>$message</p>
                <p>$contacts</p>
            ";
            $mail->CharSet = "UTF-8";


            $mail->send();
            $support_msg = $contt_error["item_8"] . " " . $contt_error["item_9"];
        } 

        catch (Exception $e) {
            $support_msg = $contt_error["item_6"] . " " . $contt_error["item_7"];
        }

    }

    else {
        $support_msg = $contt_error["item_5"] . " " . $contt_error["item_7"];
    }
}






$title = $contt_msgr["title"];

require("views/view.msgr.php");
