<?php


namespace App\Controller\AdminController;

use App\Model\ChapterManager;
use App\Model\Chapters;

class AdminAddChapterController
{
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