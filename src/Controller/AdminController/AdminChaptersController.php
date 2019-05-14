<?php
namespace App\Controller\AdminController;


use App\Model\ChapterManager;

class AdminChaptersController {

    /**
     * Render all chapters
     */
    public function AdminChaptersPage() {
        $chManager = new ChapterManager();
        $chapters = $chManager->getChapters();
        require ('src/View/admin/listChapters.php');
    }


}
