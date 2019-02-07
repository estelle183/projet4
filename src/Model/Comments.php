<?php

namespace App\Model;

class Comments
{
    private $_id;
    private $_chapter_id;
    private $_author;
    private $_comment;
    private $_comment_date;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getChapterId()
    {
        return $this->_chapter_id;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->_author;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->_comment;
    }

    /**
     * @return mixed
     */
    public function getCommentDate()
    {
        return $this->_comment_date;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $id = (int) $id;
        if ($id > 0)
        {
            $this->_id = $id;
        }
    }

    /**
     * @param mixed $chapter_id
     */
    public function setChapterId($chapter_id): void
    {
        $chapter_id = (int) $chapter_id;
        if ($chapter_id > 0)
        {
            $this->_chapter_id = $chapter_id;
        }
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        if (is_string($author))
        {
            $this->_author = $author;
        }
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment): void
    {
        if (is_string($comment))
        {
            $this->_comment = $comment;
        }
    }

    /**
     * @param mixed $comment_date
     */
    public function setCommentDate($comment_date): void
    {
        if (is_string($comment_date))
        {
            $this->_comment_date = $comment_date;
        }
    }
}
