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
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }


    /**
     * @param string $email
     */
    public function setEmail(string $email): void
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
     * @return \DateTime
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
     * @return bool
     */
    public function getConsent(): ?bool
    {
        return $this->consent;
    }

    /**
     * @param bool $consent
     */
    public function setConsent(bool $consent): void
    {
        $this->consent = $consent;
    }

    /**
     * @return bool
     */
    public function getProcessed(): ?bool
    {
        return $this->processed;
    }

    /**
     * @param bool $processed
     */
    public function setProcessed(bool $processed): void
    {
        $this->processed = $processed;
    }

}