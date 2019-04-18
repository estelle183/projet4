<?php

namespace App\Controller\ErrorController;


class ErrorController
{
public function Error404(){
    require ('src/View/erreur404.php');
}
}