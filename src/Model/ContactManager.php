<?php

namespace App\Model;

use \PDO;

class ContactManager extends DbManager
{
    private $db;

    public function __construct()
    {
        $this->db = self::dbConnect();
    }

    public function addContact(Contact $contact) // Insérer un contact
    {
        $req = $this->db->prepare ('INSERT INTO contact(name, email, subject, message, date_send, consent) VALUES (:name, :email, :subject, :message, NOW(), :consent)');
        $affectedLines = $req->execute (array(
            'name' => $contact->getName(),
            'email' => $contact->getEmail (),
            'subject' => $contact->getSubject (),
            'message' => $contact->getMessage (),
            'consent' => $contact->getConsent ()
        ));

        return $affectedLines;
    }

}