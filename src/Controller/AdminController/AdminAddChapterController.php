<?php


namespace App\Controller\AdminController;

use App\Model\ChapterManager;
use App\Model\Chapters;

class AdminAddChapterController
{
    /**
     * Add a new chapter and redirect to chapters list
     * @param $title
     * @param $subtitle
     * @param $content
     */
    public function addChapter($title, $subtitle, $content)
    {
        $chapter = new Chapters();
        $chapter->setTitle ($title);
        $chapter->setSubtitle ($subtitle);
        $chapter->setContent ($content);
        $chManager = new ChapterManager();
        $chManager->addChapter ($chapter);
        header ('Location: admin-liste-chapitres');
    }
}