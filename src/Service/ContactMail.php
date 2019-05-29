<?php


namespace App\Service;

use App\Model\Contact;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactMail
{
    /**
     * Prepare email for contact form
     * @param Contact $contact
     */
    public function sendContactMailService(Contact $contact) {
        $mail = new PHPMailer(true);
        $userMail = $contact->getEmail ();
        $userName = $contact->getName ();
        $userMessage = $contact->getMessage ();
        try{
            $mail->SMTPDebug = 1;
            //$mail->isSMTP();
            $mail->isSendmail ();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'alaska.billet.simple@gmail.com';
            $mail->Password = 'alaska210';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setLanguage('fr', 'src/vendor/phpmailer/phpmailer/language');


            $mail->setFrom($contact->getEmail (), $contact->getName ());
            $mail->addAddress('contact@billet-simple-alaska.estelle-lorrillere.fr');

            $mail->isHTML(true);
            $mail->Subject = $contact->getSubject();
            $mail->Body = $userMail.'<br/>'.'Nom : '. $userName.'<br/>'.'Message : '. $userMessage;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            echo $e;
        }
    }
}