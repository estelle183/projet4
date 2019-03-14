<?php

namespace App\Model;

use \PDO;

class ChapterManager extends DbManager
{
    private $db;

    public function __construct()
    {
        $this->db = self::dbConnect();
    }

    public function getChapters() //Récupérer tous les chapitres
    {
        $req = $this->db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \' %d/%m/%Y à %Hh %imin %ss\') AS creationDate FROM chapters ORDER BY creation_date DESC ');
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
        $chapters = [];

        foreach ($results as $result)
        {
            $chapter = new Chapters($result);
            $chapters[] = $chapter;
        }

        return $chapters;
    }

    public function getChapterWithComments (Chapters $chapters) // Récupérer un seul chapitre et ses commentaires associés
    {
        $req = $this->db->prepare('SELECT ch.id, ch.title, ch.content, DATE_FORMAT(ch.creation_date, \' %d/%m/%Y à %Hh %imin %ss\') AS creationDate, co.id AS co_id, co.author, co.comment, DATE_FORMAT(co.comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDate, co.reported, co.moderate FROM chapters ch LEFT JOIN comments co ON co.chapter_id = ch.id WHERE ch.id = ?');
        $req->execute(array($chapters->getId ()));
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $comments = [];

        foreach ($result as $data) {
            $chapters->setTitle ($data['title']);
            $chapters->setContent ($data['content']);
            $chapters->setCreationDate ($data['creationDate']);

            if ($data['co_id']) {
                $comment = new Comments();
                $comment->setId ($data['co_id']);
                $comment->setAuthor ($data['author']);
                $comment->setComment ($data['comment']);
                $comment->setCommentDate ($data['commentDate']);
                $comment->setReported ($data['reported']);
                $comment->setModerate ($data['moderate']);
                $comments[] = $comment;
            }
        }

        $chapters->setComments ($comments);

        return $chapters;
    }

    //Administration

}
