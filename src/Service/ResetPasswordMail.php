<?php


namespace App\Service;

use App\Model\Admin;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ResetPasswordMail
{
    /**
     * Prepare email with link for change password
     * @param Admin $admin
     */
    public function sendResetPasswordMail(Admin $admin) {
        $mail = new PHPMailer(true);

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


            $mail->setFrom('reset.psw@alaska.fr');
            $mail->addAddress($admin->getEmail ());

            $mail->isHTML(true);
            $mail->Subject = 'Modifier mon mot de passe';
            $mail->Body = '<p>Bonjour</p><p>Nous avons re&ccedil;u une demande de modification de mot de passe pour le compte associ&eacute; &agrave; cet adresse email. Choisissez votre nouveau mot de passe en cliquant sur le lien ci-dessous :</p><a href="http://billet-simple-alaska.estelle-lorrillere.fr/admin-nouveau-motdepasse&token='.$admin->getToken () .'">Modifier mon mot de passe</a><br/><p>Jean Forteroche</p>' ;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            echo $e;
        }
    }
}
