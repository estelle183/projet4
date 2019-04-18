<?php


namespace App\Controller\AdminController;


use App\Model\Admin;
use App\Model\AdminManager;

class AdminLoginController
{
public function adminLoginPage() {

require ('src/View/admin/adminLogin.php');
}

public function checkLogin($pseudo, $password) {
    $admin = new Admin();
    $admin->setLogin ($pseudo);
    $admin->setPassword ($password);
    $adManager = new AdminManager();
    $check = $adManager->adminLogin ($admin);
    $_SESSION['connect'] = 0;
    $time = $_SERVER['REQUEST_TIME'];
    $timeout_duration = 20;

    if ($check['login'] !== null && $check['login'] == $admin->getLogin ()) {
        if (password_verify ($admin->getPassword (), $check['password'])) {
            if (isset($_SESSION['LAST_ACTIVITY']) &&
                ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
                session_unset();
                session_destroy();
                session_start();
            }
            $_SESSION['pseudo'] = $check['login'];
            $_SESSION['connect'] = 1;
            header('Location: admin-accueil');
        } else {
            echo "Mauvais mdp";
        }
    } else {
        echo "Mauvais login";
    }
    $_SESSION['LAST_ACTIVITY'] = $time;
}

}