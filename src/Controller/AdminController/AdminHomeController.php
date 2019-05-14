<?php

namespace App\Controller\AdminController;


use App\Model\ChapterManager;
use App\Model\CommentsManager;
use App\Model\ContactManager;

class AdminHomeController
{
    /**
     * Render the admin homepage
     */
    public function adminHomePage()
    {
        require ("src/View/admin/adminHome.php");
    }

    /**
     * Render the number of chapters, reported comments, moderate comments and mail
     */
    public function adminChapterCount()
    {
        $chManager = new ChapterManager();
        $nbChapters = $chManager->chapterCount ();
        $coManager = new CommentsManager();
        $nbComments = $coManager->commentsCount ();
        $nbReports = $coManager->commentsReportedCount ();
        $nbModerate = $coManager->commentsModerateCount ();
        $contactManager = new ContactManager();
        $nbProcessed = $contactManager->processedMailCount ();
        require ("src/View/admin/adminHome.php");
    }

    public function adminCommentCount()
    {

    }
}