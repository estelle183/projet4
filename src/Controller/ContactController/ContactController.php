<?php


namespace App\Controller\ContactController;


use App\Model\Contact;
use App\Model\ContactManager;

class ContactController
{
public function contactForm() {
    require("src/View/contact/contact.php");
}

public function sendContactForm($name, $email, $subject, $message, $consent) {
    $contact = new Contact();
    $contact->setName ($name);
    $contact->setEmail ($email);
    $contact->setSubject ($subject);
    $contact->setMessage ($message);
    $contact->setConsent ($consent);
    $newContact = new ContactManager();
    $newContact->addContact ($contact);
    $_SESSION['flash'] = "Votre message a bien été envoyé";
    $flash = $_SESSION['flash'];
    header("Location: contact");
}
}