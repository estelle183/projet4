<?php
namespace App\Controller\AdminController;


use App\Model\ChapterManager;
use App\Model\Chapters;

class AdminChapterController { //Récupère le chapitre sélectionné et ses commentaires

    public function AdminChapterWithComments(Chapters $chapter) {
        $chManager = new ChapterManager();
        $result = $chManager->getChapterWithComments($chapter);
        require ('src/View/admin/oneChapter.php');

    }

}
