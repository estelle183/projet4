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

    /**
     * Get all chapters
     * @return array
     */
    public function getChapters()
    {
        $req = $this->db->query('SELECT id, title, subtitle, content, DATE_FORMAT(creation_date, \' %d/%m/%Y à %Hh %imin %ss\') AS creationDate, DATE_FORMAT(update_date, \' %d/%m/%Y à %Hh %imin %ss\')  AS updateDate FROM chapters ORDER BY creation_date DESC ');
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
        $chapters = [];

        foreach ($results as $result)
        {
            $chapter = new Chapters($result);
            $chapters[] = $chapter;
        }

        return $chapters;
    }

    /**
     * Get three last chapters
     * @return array
     */
    public function getThreeLastChapters()
    {
        $req = $this->db->query('SELECT id, title, subtitle, content, DATE_FORMAT(creation_date, \' %d/%m/%Y à %Hh %imin %ss\') AS creationDate, DATE_FORMAT(update_date, \' %d/%m/%Y à %Hh %imin %ss\')  AS updateDate FROM chapters ORDER BY creation_date DESC LIMIT 0, 3');
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
        $chapters = [];

        foreach ($results as $result)
        {
            $chapter = new Chapters($result);
            $chapters[] = $chapter;
        }

        return $chapters;
    }

    /**
     * Get one chapter
     * @param Chapters $chapter
     * @return Chapters
     */
    public function getChapter (Chapters $chapter)
    {
        $req = $this->db->prepare ('SELECT id, title, subtitle, content, DATE_FORMAT(creation_date, \' %d/%m/%Y à %Hh %imin %ss\') AS creationDate, DATE_FORMAT(update_date, \' %d/%m/%Y à %Hh %imin %ss\')  AS updateDate FROM chapters WHERE id = :id');
        $req->execute (array(
            'id' => $chapter->getId (),
        ));
        $result = $req->fetch (PDO::FETCH_ASSOC);

        $chapter->setTitle ($result['title']);
        $chapter->setSubtitle ($result['subtitle']);
        $chapter->setContent ($result['content']);
        $chapter->setCreationDate ($result['creationDate']);
        $chapter->setUpdateDate ($result['updateDate']);

        return $chapter;
    }

    /**
     * Get one chapter with his comments
     * @param Chapters $chapters
     * @return Chapters|bool
     */
    public function getChapterWithComments (Chapters $chapters)
    {
        $req = $this->db->prepare ('SELECT ch.id, ch.title, ch.subtitle, ch.content, DATE_FORMAT(ch.creation_date, \' %d/%m/%Y à %Hh %imin %ss\') AS creationDate, DATE_FORMAT(ch.update_date, \' %d/%m/%Y à %Hh %imin %ss\') AS updateDate, co.id AS co_id, co.author, co.comment, DATE_FORMAT(co.comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDate, co.reported, co.moderate FROM chapters ch LEFT JOIN comments co ON co.chapter_id = ch.id WHERE ch.id = ?');
        $req->execute (array($chapters->getId ()));
        $result = $req->fetchAll (PDO::FETCH_ASSOC);
        if ($result) {
            $comments = [];

            foreach ($result as $data) {
                $chapters->setTitle ($data['title']);
                $chapters->setSubtitle ($data['subtitle']);
                $chapters->setContent ($data['content']);
                $chapters->setCreationDate ($data['creationDate']);
                $chapters->setUpdateDate ($data['updateDate']);

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
        } else {
            return false;
        }
    }

    /**
     * Add a new chapter
     * @param Chapters $chapter
     * @return bool
     */
    public function addChapter (Chapters $chapter) {
        $req = $this->db->prepare('INSERT INTO chapters(title, subtitle, content, creation_date) VALUES (:title, :subtitle, :content, NOW())');
        $affectedLines = $req->execute (array(
            'title' => $chapter->getTitle (),
            'subtitle'=>$chapter->getSubtitle (),
            'content' => $chapter->getContent ()
        ));

        return $affectedLines;
    }

    /**
     * Delete a chapter
     * @param Chapters $chapter
     * @return bool
     */
    public function deleteChapter (Chapters $chapter) {
        $req = $this->db->prepare('DELETE FROM chapters WHERE id= :id');
        $affectedLines = $req->execute (array(
            'id' => $chapter->getId (),
        ));

        return $affectedLines;
    }

    /**
     * Update a chapter
     * @param Chapters $chapter
     * @return bool
     */
    public function updateChapter(Chapters $chapter) {
        $req = $this->db->prepare ('UPDATE chapters SET title= :title, subtitle= :subtitle, content= :content, update_date= NOW() WHERE id = :id');
        $affectedLines = $req->execute (array(
            'id' => $chapter->getId (),
            'title' => $chapter->getTitle(),
            'subtitle'=> $chapter->getSubtitle (),
            'content' => $chapter->getContent()
        ));

        return $affectedLines;
    }

    /**
     * Count the number of chapters
     * @return string
     */
    public function chapterCount() {
        $req = $this->db->query('SELECT COUNT(*) AS nbChapters FROM chapters');
        $result = $req->fetchColumn ();

        return $result;

    }
}
