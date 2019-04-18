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

    public function getContacts()
    {
        $req = $this->db->query('SELECT id, name, email, subject, message, DATE_FORMAT(date_send, \'%d/%m/%Y à %Hh%imin%ss\') AS dateSend, consent, processed FROM contact ORDER BY dateSend DESC');
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
        $contacts = [];

        foreach ($results as $result)
        {
            $contact = new Contact($result);
            $contacts[] = $contact;
        }

        return $contacts;
    }

    public function processedMail(Contact $contact) // Traiter un message
    {
        $req = $this->db->prepare ('UPDATE contact SET processed = 1 WHERE id = :id');
        $affectedLines = $req->execute (array(
            'id' => $contact->getId (),
        ));

        return $affectedLines;

    }

    public function getOneMail (Contact $contact) // Récupérer un mail
    {
        $req = $this->db->prepare ('SELECT id, name, email, subject, message, DATE_FORMAT(date_send, \'%d/%m/%Y à %Hh%imin%ss\') AS dateSend, consent, processed FROM contact WHERE id = :id');
        $req->execute (array(
            'id' => $contact->getId (),
        ));
        $result = $req->fetch (PDO::FETCH_ASSOC);

        $contact->setName ($result['name']);
        $contact->setEmail ($result['email']);
        $contact->setSubject ($result['subject']);
        $contact->setMessage ($result['message']);
        $contact->setDateSend ($result['dateSend']);
        $contact->setConsent ($result['consent']);
        $contact->setProcessed ($result['processed']);

        return $contact;
    }

    public function processedMailCount() {
        $req = $this->db->query('SELECT COUNT(*) AS nbProcessed FROM contact WHERE processed = 0');
        $result = $req->fetchColumn ();

        return $result;
    }

}