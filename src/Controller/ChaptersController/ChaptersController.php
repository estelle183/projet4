<?php
namespace App\Controller\ChaptersController;



use App\Model\ChapterManager;

class ChaptersController {

    /**
     * Show all chapters
     */
    public function ChaptersPage() {
        $chManager = new ChapterManager();
        $chapters = $chManager->getChapters();
        require ('src/View/chapter/listChapters.php');
    }

}