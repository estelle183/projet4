<?php
namespace App\Controller\ChaptersController;


use App\Model\ChapterManager;
use App\Model\Chapters;

class ChapterController { //Récupère le chapitre sélectionné et ses commentaires

    public function ChapterWithComments(Chapters $chapter) {
        $chManager = new ChapterManager();
        $result = $chManager->getChapterWithComments($chapter);
        require ('src/View/chapter/oneChapter.php');

    }

}