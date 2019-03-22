<?php


namespace App\Controller\AdminController;

use App\Model\ChapterManager;
use App\Model\Chapters;

class AdminAddChapterController
{
    public function addChapter($title, $content)
    {
        $chapter = new Chapters();
        $chapter->setTitle ($title);
        $chapter->setContent ($content);
        $chManager = new ChapterManager();
        $chManager->addChapter ($chapter);
        header ('Location: admin-liste-chapitres');
    }
}