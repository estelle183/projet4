<?php


namespace App\Controller\ContactController;


use App\Model\Contact;
use App\Model\ContactManager;
use App\Service\ContactMail;

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
    $sendMail = new ContactMail();
    $sendMail->sendContactMailService ($contact);
    $_SESSION['flash'] = "Votre message a bien été envoyé";
    $flash = $_SESSION['flash'];
    header("Location: contact");
}
}