<?php


namespace App\Controller\AdminController;
use App\Model\Admin;
use App\Model\AdminManager;
use App\Service\ResetPasswordMail;


class AdminNewPasswordController
{
    public function adminForgotPasswordPage() {
        require ('src/View/admin/AdminForgotPassword.php');
    }

    public function checkEmail ($email) {
        $admin = new Admin();
        $admin->setEmail ($email);
        $adManager = new AdminManager();
        $check = $adManager->adminPassword ($admin);

        if ($check['email'] !== null && $check['email'] == $admin->getEmail ()) {
            $token = uniqid ("fpsel", true);
            $admin->setToken ($token);
            $adManager->addToken ($admin);
            $sendMail = new ResetPasswordMail();
            $sendMail->sendResetPasswordMail ($admin);
        }

        $_SESSION['flash'] = "Un e-mail vous a été envoyé";
        $flash = $_SESSION['flash'];
        header('Location: admin-oubli-motdepasse');

    }

    public function resetPasswordForm($token) {

$admin = new Admin();
$admin->setToken ($token);
$adManager = new AdminManager();
$checkAdmin = $adManager->adminToken ($admin);

if ($token == $checkAdmin->getToken ()) {
    $tokenDate = new \DateTime($checkAdmin->getTokenDate ());
    $date = new \DateTime();
    $dif = $date->diff($tokenDate);
    if ($dif->i < 30) {
        require ('src/View/admin/AdminNewPassword.php');
    } else {
        require ('src/View/erreur404.php');
    }
} else {
    require ('src/View/erreur404.php');
}

    }

    public function changePassword ($token, $password) {
        $admin = new Admin();
        $admin->setToken ($token);
        $admin->setPassword ($password);
        $adManager = new AdminManager();
        $adManager->changePassword ($admin);
        header('Location: admin-connexion');
        }

}