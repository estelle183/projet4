<?php

namespace App\Model;


class Chapters

{
    private $id;
    private $title;
    private $content;
    private $creation_date;
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


    public function getContent(): ?string
    {
        return $this->content;
    }


    public function getCreationDate()
    {
        return $this->creation_date;
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


    public function setContent($content): void
    {
        if (is_string($content))
        {
            $this->content = $content;
        }
    }


    public function setCreationDate($creation_date): void
    {
        if (is_string($creation_date)) {
            $this->creation_date = $creation_date;
        }
    }

    /**
     * @param array $comments
     */
    public function setComments(array $comments): void
    {
        $this->comments = $comments;
    }
}