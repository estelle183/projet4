<?php

namespace App\Controller\AdminController;


use App\Model\ContactManager;
use App\Model\Contact;

class AdminContactsController
{
    public function adminContactsPage() {
        $coManager = new ContactManager();
        $contacts = $coManager->getContacts ();
        require('src/View/admin/contactManagement.php');

    }

    public function adminProcessedMail(Contact $contact) {
        $coManager = new ContactManager();
        $result = $coManager->processedMail ($contact);
        header ('Location: admin-gestion-contacts');
    }

    public function getMail(Contact $contact) //Récupère un seul mail
    {
        $coManager = new ContactManager();
        $result = $coManager->getOneMail ($contact);
        require ('src/View/admin/oneMail.php');


    }

    public function adminAllContactsPage() {
        $coManager = new ContactManager();
        $contacts = $coManager->getContacts ();
        require('src/View/admin/allContacts.php');

    }
}