<?php

namespace App\Controller\ErrorController;


class ErrorController
{

    /**
     * Render the error page
     */
public function Error404(){
    require ('src/View/erreur404.php');
}
}