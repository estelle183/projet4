<?php


namespace App\Controller\AdminController;

use App\Model\CommentsManager;
use App\Model\Comments;

class AdminReportedController
{
    public function cancelReportedComment(Comments $comments)
    {
        $coManager = new CommentsManager();
        $result = $coManager->cancelReportedComment($comments);
        header ('Location: admin-modération');
    }
}