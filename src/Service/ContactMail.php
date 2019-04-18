<?php


namespace App\Service;

use App\Model\Contact;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactMail
{
    public function sendContactMailService(Contact $contact) {
        $mail = new PHPMailer(true);
        $userMail = $contact->getEmail ();
        $userName = $contact->getName ();
        $userMessage = $contact->getMessage ();
        try{
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'estelle183@gmail.com';
            $mail->Password = 'maximedaniel221088';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setLanguage('fr', 'src/vendor/phpmailer/phpmailer/language');


            $mail->setFrom($contact->getEmail (), $contact->getName ());
            $mail->addAddress('estelle183@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = $contact->getSubject();
            $mail->Body = $userMail.'<br/>'.'Nom :'. $userName.'<br/>'.'Message :'. $userMessage;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            echo $e;
        }
    }
}