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

    public function getComments()
    {
        $req = $this->db->query('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDate, reported, moderate FROM comments ORDER BY comment_date DESC');
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
        $comments = [];

        foreach ($results as $result)
        {
            $comment = new Comments($result);
            $comments[] = $comment;
        }

        return $comments;
    }

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

    public function reportedComment(Comments $comment) // Signaler un commentaire
    {
        $req = $this->db->prepare ('UPDATE comments SET reported = 1 WHERE id = :id');
        $affectedLines = $req->execute (array(
            'id' => $comment->getId (),
        ));

        return $affectedLines;

    }

    public function cancelReportedComment(Comments $comment) // Annuler le signalement d'un commentaire
    {
        $req = $this->db->prepare ('UPDATE comments SET reported = 0 WHERE id = :id');
        $affectedLines = $req->execute (array(
            'id' => $comment->getId (),
        ));

        return $affectedLines;
    }

    public function moderateComment(Comments $comment) // Modérer un commentaire
    {
        $req = $this->db->prepare ('UPDATE comments SET moderate = 1 WHERE id = :id');
        $affectedLines = $req->execute (array(
            'id' => $comment->getId (),
        ));

        return $affectedLines;
    }

    public function cancelModerateComment(Comments $comment) // Annuler la modération d'un commentaire
    {
        $req = $this->db->prepare ('UPDATE comments SET moderate = 0 WHERE id = :id');
        $affectedLines = $req->execute (array(
            'id' => $comment->getId (),
        ));

        return $affectedLines;
    }

    public function commentsCount() {
        $req = $this->db->query('SELECT COUNT(*) AS nbComments FROM comments');
        $result = $req->fetchColumn ();

        return $result;

    }

    public function commentsReportedCount() {
        $req = $this->db->query('SELECT COUNT(*) AS nbReport FROM comments WHERE reported = 1 && moderate = 0');
        $result = $req->fetchColumn ();

        return $result;
    }

    public function commentsModerateCount() {
        $req = $this->db->query('SELECT COUNT(*) AS nbReport FROM comments WHERE moderate = 1');
        $result = $req->fetchColumn ();

        return $result;
    }


}

