<?php


namespace App\Service;

use App\Model\Admin;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ResetPasswordMail
{
    public function sendResetPasswordMail(Admin $admin) {
        $mail = new PHPMailer(true);

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


            $mail->setFrom('reset.psw@alaska.fr');
            $mail->addAddress($admin->getEmail ());

            $mail->isHTML(true);
            $mail->Subject = 'Demande de changement de mot de passe';
            $mail->Body = '<a href="http://localhost:8888/projet4/admin-nouveau-motdepasse&token='.$admin->getToken () . '">page changement mdp</a>' ;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            echo $e;
        }
    }
}

