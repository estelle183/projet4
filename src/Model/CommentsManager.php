<?php

namespace App\Model;

use \PDO;

class CommentsManager extends DbManager
{

    private $db;

    public function __construct()
    {
        $this->db = self::dbConnect ();
    }

    /*public function getChapterComments() // Requête à supprimer ?
    {
        $req = $this->db->prepare('SELECT author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDate FROM comments ORDER BY comment_date DESC');
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
        $comments = [];

        foreach ($results as $result)
        {
            $comment = new Comments($result);
            $comments[] = $comment;
        }


        return $comments;
    }*/

    public function addChapterComment(Comments $comment) // Insérer un commentaire
    {
        $req = $this->db->prepare ('INSERT INTO comments(chapter_id, author, comment, comment_date, reported, moderate) VALUES (:chapter_id, :author, :comment, NOW(), false, false)');
        $affectedLines = $req->execute (array(
            'chapter_id' => $comment->getChapterId (),
            'author' => $comment->getAuthor (),
            'comment' => $comment->getComment ()
        ));

        return $affectedLines;
    }

    public function ReportedComment(Comments $comment)
    {
        $req = $this->db->prepare ('UPDATE comments SET reported = true WHERE id = ?');
        $affectedLines = $req->execute (array(
            'id' => $comment->getId (),
        ));

        return $affectedLines;

    }
}

