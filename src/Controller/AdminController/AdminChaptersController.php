<?php
namespace App\Controller\AdminController;


use App\Model\ChapterManager;

class AdminChaptersController {

    public function AdminChaptersPage() { //Récupère tous les chapitres
        $chManager = new ChapterManager();
        $chapters = $chManager->getChapters();
        require ('src/View/admin/listChapters.php');
    }


}
