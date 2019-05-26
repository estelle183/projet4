<?php

namespace App\Model;

class Comments
{
    private $id;
    private $chapter_id;
    private $author;
    private $comment;
    private $comment_date;
    private $reported;
    private $moderate;




    public function __construct($values = null)
    {
        if ($values != null)
        {
            $this->hydrate($values);
        }
    }

    public function hydrate(array $values)
    {
        foreach ($values as $key=>$value)
        {
            $elements = explode('_', $key);
            $newKey = '';
            foreach ($elements as $el)
            {
                $newKey .= ucfirst($el);
            }
            $method = 'set'. ucfirst($newKey);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
        return $this;
    }


    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


    /**
     * @return int
     */
    public function getChapterId(): ?int
    {
        return $this->chapter_id;
    }

    /**
     * @param int $chapter_id
     */
    public function setChapterId($chapter_id): void
    {
        $chapter_id = (int) $chapter_id;
        if ($chapter_id > 0)
        {
            $this->chapter_id = $chapter_id;
        }
    }

    /**
     * @return string
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {

            $this->author = $author;

    }

    /**
     * @return string
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {

            $this->comment = $comment;

    }

    /**
     * @return \DateTime
     */
    public function getCommentDate()
    {
        return $this->comment_date;
    }

    /**
     * @param \DateTime $comment_date
     */
    public function setCommentDate($comment_date): void
    {
        if (is_string($comment_date))
        {
            $this->comment_date = $comment_date;
        }
    }

    /**
     * @return bool
     */
    public function getReported(): ?bool
    {
        return $this->reported;
    }


    /**
     * @param bool $reported
     */
    public function setReported(bool $reported): void
    {
        $this->reported = $reported;
    }


    /**
     * @return bool
     */
    public function getModerate(): ?bool
    {
        return $this->moderate;
    }


    /**
     * @param bool $moderate
     */
    public function setModerate(bool $moderate): void
    {
        $this->moderate = $moderate;
    }
}
