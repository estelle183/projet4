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

    public function getChapters()
    {
        $req = $this->db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \' % d /%m /%Y à % Hh % imin % ss\') AS creation_date_fr FROM chapters ORDER BY creation_date DESC');
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
        $chapters = [];

        foreach ($results as $result)
        {
            $chapter = new Chapters($result);
            $chapters[] = $chapter;
        }

        return $chapters;
    }

    public function getChapter($chapterId)
    {
        $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \' % d /%m /%Y à % Hh % imin % ss\') AS creation_date_fr FROM chapters WHERE id = ?');
        $req->execute(array($chapterId));
        $chapter = $req->fetch();

        return $chapter;
    }
}
