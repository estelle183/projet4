<?php

namespace App\Controller\AdminController;

use App\Model\ChapterManager;
use App\Model\Chapters;

class AdminDeleteChapterController
{
    public function getChapter(Chapters $chapter) //Récupère un seul chapitre pour suppression
    {
        $chManager = new ChapterManager();
        $result = $chManager->getChapter ($chapter);
        require ('src/View/admin/deleteChapter.php');


    }

    public function deleteChapter(Chapters $chapter)
    {
        $chManager = new ChapterManager();
        $result = $chManager->deleteChapter($chapter);
        header ('Location: admin-liste-chapitres');
    }
}