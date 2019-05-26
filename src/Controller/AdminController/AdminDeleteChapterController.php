<?php

namespace App\Controller\AdminController;

use App\Model\ChapterManager;
use App\Model\Chapters;

class AdminDeleteChapterController
{
    /**
     * Render a chapter to delete
     * @param Chapters $chapter
     */
    public function getChapter(Chapters $chapter)
    {
        $chManager = new ChapterManager();
        $result = $chManager->getChapter ($chapter);
        require ('src/View/admin/deleteChapter.php');


    }

    /**
     * Delete a chapter and redirect to chapters list page
     * @param Chapters $chapter
     */
    public function deleteChapter(Chapters $chapter)
    {
        $chManager = new ChapterManager();
        $result = $chManager->deleteChapter($chapter);
        header ('Location: admin-liste-chapitres');
    }
}