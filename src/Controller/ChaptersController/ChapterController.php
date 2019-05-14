<?php
namespace App\Controller\ChaptersController;


use App\Model\ChapterManager;
use App\Model\Chapters;

class ChapterController {

    /**
     * Render the selected chapter and his comments
     * @param Chapters $chapter
     */
    public function ChapterWithComments(Chapters $chapter)
    {
            $chManager = new ChapterManager();
            $result = $chManager->getChapterWithComments ($chapter);
           if($result != false) {
               require ('src/View/chapter/oneChapter.php');
           } else {
            require ('src/View/erreur404.php');
        }
    }

}