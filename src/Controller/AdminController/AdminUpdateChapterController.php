<?php


namespace App\Controller\AdminController;

use App\Model\ChapterManager;
use App\Model\Chapters;

class AdminUpdateChapterController
{
    /**
     * Render a chapter for update
     * @param Chapters $chapter
     */
    public function getChapter(Chapters $chapter)
    {
        $chManager = new ChapterManager();
        $result = $chManager->getChapter($chapter);
        require ('src/View/admin/updateChapter.php');
    }

    /**
     * Update a chapter and redirect to chapters page
     * @param $id
     * @param $title
     * @param $subtitle
     * @param $content
     */
    public function updateChapter($id, $title, $subtitle, $content) {
        $chapter = new Chapters();
        $chapter->setId ($id);
        $chapter->setTitle($title);
        $chapter->setSubtitle ($subtitle);
        $chapter->setContent ($content);
        $chManager = new ChapterManager();
        $chManager->updateChapter($chapter);
        header ('Location: admin-liste-chapitres');
    }
}

