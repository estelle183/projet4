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

    public function getChapter (Chapters $chapter) // Récupérer un seul chapitre
    {
        $req = $this->db->prepare ('SELECT id, title, content FROM chapters WHERE id = :id');
        $req->execute (array(
            'id' => $chapter->getId (),
        ));
        $result = $req->fetch (PDO::FETCH_ASSOC);

        $chapter->setTitle ($result['title']);
        $chapter->setContent ($result['content']);

        return $chapter;
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

    public function addChapter (Chapters $chapter) { // Insérer un nouveau chapitre
        $req = $this->db->prepare('INSERT INTO chapters(title, content, creation_date) VALUES (:title, :content, NOW())');
        $affectedLines = $req->execute (array(
            'title' => $chapter->getTitle (),
            'content' => $chapter->getContent ()
        ));

        return $affectedLines;
    }

    public function deleteChapter (Chapters $chapter) { //Supprimer un chapitre
        $req = $this->db->prepare('DELETE FROM chapters WHERE id= :id');
        $affectedLines = $req->execute (array(
            'id' => $chapter->getId (),
        ));

        return $affectedLines;
    }

    public function updateChapter(Chapters $chapter) { //Modifier un chapitre
        $req = $this->db->prepare ('UPDATE chapters SET title= :title, content= :content WHERE id = :id');
        $affectedLines = $req->execute (array(
            'id' => $chapter->getId (),
            'title' => $chapter->getTitle(),
            'content' => $chapter->getContent()
        ));

        return $affectedLines;
    }
}
