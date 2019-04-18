<?php
namespace App\Controller\AdminController;


use App\Model\CommentsManager;
use App\Model\Comments;

class AdminCommentsController {

    public function adminReportedComments() {
        $coManager = new CommentsManager();
        $comments = $coManager->getComments();

        require ('src/View/admin/reportedComments.php');
    }

    public function adminModerateComments() {
        $coManager = new CommentsManager();
        $comments = $coManager->getComments();
        require ('src/View/admin/moderateComments.php');
    }



}

