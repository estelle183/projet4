<?php


namespace App\Controller\CommentsController;


use App\Model\CommentsManager;
use App\Model\Comments;

class CommentsController
{

    /**
     * Add a new comment and redirect to the chapter page
     * @param $chapterId
     * @param $author
     * @param $message
     */
    public function addComment($chapterId, $author, $message)
    {
        $comment = new Comments();
        $comment->setChapterId ($chapterId);
        $comment->setAuthor ($author);
        $comment->setComment ($message);
        $coManager = new CommentsManager();
        $coManager->addChapterComment ($comment);
        $_SESSION['flash'] = "Votre commentaire a bien été ajouté";
        $flash = $_SESSION['flash'];
        header ('Location: chapitre&id=' . $chapterId . "#ancre");
    }


    /**
     * Report a comment and redirect to the chapter page
     * @param Comments $comments
     * @param $chapterId
     */
    public function reportedComment(Comments $comments, $chapterId)
    {
        $coManager = new CommentsManager();
        $result = $coManager->reportedComment($comments);
        $_SESSION['flash'] = "Le commentaire a bien été reporté";
        $flash = $_SESSION['flash'];
        header ('Location: chapitre&id=' . $chapterId);
    }

}

