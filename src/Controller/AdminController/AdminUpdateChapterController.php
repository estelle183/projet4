<?php


namespace App\Controller\AdminController;

use App\Model\ChapterManager;
use App\Model\Chapters;

class AdminUpdateChapterController
{
    public function getChapter(Chapters $chapter) //Récupère un seul chapitre pour modification
    {
        $chManager = new ChapterManager();
        $result = $chManager->getChapter($chapter);
        require ('src/View/admin/updateChapter.php');
    }

    public function updateChapter($id, $title, $content) {
        $chapter = new Chapters();
        $chapter->setId ($id);
        $chapter->setTitle($title);
        $chapter->setContent ($content);
        $chManager = new ChapterManager();
        $chManager->updateChapter($chapter);
        header ('Location: admin-liste-chapitres');
    }
}

