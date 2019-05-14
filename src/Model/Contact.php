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


    /**
     * @return int
     */
    public function getId() :?int
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
     * @return string
     */
    public function getName() :?string
    {
        return $this->name;
    }


    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }


    /**
     * @param $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }


    /**
     * @return string
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }


    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }


    /**
     * @return string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }


    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }


    /**
     * @return mixed
     */
    public function getDateSend()
    {
        return $this->date_send;
    }


    /**
     * @param \DateTime $date_send
     */
    public function setDateSend($date_send): void
    {
        $this->date_send = $date_send;
    }

    /**
     * @return mixed
     */
    public function getConsent()
    {
        return $this->consent;
    }

    /**
     * @param $consent
     */
    public function setConsent($consent): void
    {
        $this->consent = $consent;
    }

    /**
     * @return mixed
     */
    public function getProcessed()
    {
        return $this->processed;
    }

    /**
     * @param $processed
     */
    public function setProcessed($processed): void
    {
        $this->processed = $processed;
    }

}