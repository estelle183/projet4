<?php


namespace App\Controller\AdminController;

use App\Model\ChapterManager;
use App\Model\Chapters;

class AdminNewChapterController
{
 public function addChapter($title, $content) {
     $chapter = new Chapters();
     $chapter->setTitle ($title);
     $chapter->setContent ($content);
     $chManager = new ChapterManager();
     $chManager->addChapter ($chapter);
     header ('Location: admin-liste-chapitres');
     }

 public function newChapter() {
     require ('src/View/admin/newChapter.php');
 }


}