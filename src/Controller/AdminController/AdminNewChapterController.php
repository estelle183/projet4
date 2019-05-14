<?php


namespace App\Controller\AdminController;



class AdminNewChapterController
{

    /**
     * Render the new chapter page
     */
    public function newChapter()
    {
        require ('src/View/admin/newChapter.php');
    }

}