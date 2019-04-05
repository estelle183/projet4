<?php


namespace App\Model;


class Contact
{
    private $id;
    private $name;
    private $email;
    private $subject;
    private $message;
    private $date_send;
    private $consent;
    private $processed;

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


    public function getId()
    {
        return $this->id;
    }


    public function setId($id): void
    {
        $this->id = $id;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name): void
    {
        $this->name = $name;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email): void
    {
        $this->email = $email;
    }


    public function getSubject()
    {
        return $this->subject;
    }


    public function setSubject($subject): void
    {
        $this->subject = $subject;
    }


    public function getMessage()
    {
        return $this->message;
    }


    public function setMessage($message): void
    {
        $this->message = $message;
    }


    public function getDateSend()
    {
        return $this->date_send;
    }


    public function setDateSend($date_send): void
    {
        $this->date_send = $date_send;
    }


    public function getConsent()
    {
        return $this->consent;
    }


    public function setConsent($consent): void
    {
        $this->consent = $consent;
    }


    public function getProcessed()
    {
        return $this->processed;
    }


    public function setProcessed($processed): void
    {
        $this->processed = $processed;
    }

}