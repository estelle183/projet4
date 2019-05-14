<?php

namespace App\Controller\AdminController;


use App\Model\ContactManager;
use App\Model\Contact;

class AdminContactsController
{
    /**
     * Show contacts page
     */
    public function adminContactsPage() {
        $coManager = new ContactManager();
        $contacts = $coManager->getContacts ();
        require('src/View/admin/contactManagement.php');

    }

    /**
     * Processed select mail and redirect to the contacts page
     * @param Contact $contact
     */
    public function adminProcessedMail(Contact $contact) {
        $coManager = new ContactManager();
        $result = $coManager->processedMail ($contact);
        header ('Location: admin-gestion-contacts');
    }

    /**
     * Render one email
     * @param Contact $contact
     */
    public function getMail(Contact $contact) //Récupère un seul mail
    {
        $coManager = new ContactManager();
        $result = $coManager->getOneMail ($contact);
        require ('src/View/admin/oneMail.php');


    }

    /**
     * Render all email
     */
    public function adminAllContactsPage() {
        $coManager = new ContactManager();
        $contacts = $coManager->getContacts ();
        require('src/View/admin/allContacts.php');

    }
}