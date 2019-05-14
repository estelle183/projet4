<?php


namespace App\Controller\AuthorController;


class AuthorController
{
    /**
     * Show the author page
     */
    public function Author(){
        require ('src/View/author/author.php');
    }
}

