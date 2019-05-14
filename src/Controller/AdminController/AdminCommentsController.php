<?php
namespace App\Controller\AdminController;


use App\Model\CommentsManager;
use App\Model\Comments;

class AdminCommentsController {

    /**
     * Show all reported comments
     */
    public function adminReportedComments() {
        $coManager = new CommentsManager();
        $comments = $coManager->getComments();

        require ('src/View/admin/reportedComments.php');
    }

    /**
     * Show all moderate comments
     */
    public function adminModerateComments() {
        $coManager = new CommentsManager();
        $comments = $coManager->getComments();
        require ('src/View/admin/moderateComments.php');
    }



}

