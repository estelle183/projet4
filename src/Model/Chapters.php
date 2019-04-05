<?php

namespace App\Model;


class Chapters

{
    private $id;
    private $title;
    private $subtitle;
    private $content;
    private $creation_date;
    private $update_date;
    private $comments = [];

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

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }


    public function getContent(): ?string
    {
        return $this->content;
    }


    public function getCreationDate()
    {
        return $this->creation_date;
    }

    public function getUpdateDate()
    {
        return $this->update_date;
    }

    /**
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }


    public function setId(int $id): void
    {

            $this->id = $id;

    }


    public function setTitle(string $title): void
    {

            $this->title = $title;
    }

    public function setSubtitle($subtitle): void
    {
        $this->subtitle = $subtitle;
    }


    public function setContent(string $content): void
    {

            $this->content = $content;

    }


    public function setCreationDate($creation_date): void
    {
        if (is_string($creation_date)) {
            $this->creation_date = $creation_date;
        }
    }

    public function setUpdateDate($update_date): void
    {
        $this->update_date = $update_date;
    }

    /**
     * @param array $comments
     */
    public function setComments(array $comments): void
    {
        $this->comments = $comments;
    }
}