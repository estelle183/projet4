<?php

namespace App\Model;


class CommentsManager extends DbManager
{

    private $db;

    public function __construct()
    {
        $this->db = self::dbConnect();
    }

    public function getChapterComments($chapterId)
    {
        $comments = $this->db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS omment_date_fr FROM comments WHERE chapter_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($chapterId));

        return $comments;
    }

    public function addChapterComment($chapterId, $author, $comment)
    {
        $comments = $this->db->prepare('INSERT INTO comments(chapter_id, author, comment, comment_date) VALUES (?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($chapterId, $author, $comment));

        return $affectedLines;
    }
}

