<?php

namespace App\Notification;

use App\Entity\Contact;
use Twig\Environment;

class ContactNotification{

    protected $mailer;

    protected $renderer;

    public function __construct(\Swift_Mailer $mailer, Environment  $renderer){

        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }

    
    public function notify(Contact $contact){
        $message =(new \Swift_Message('Agence :'.$contact->getProperty()->getTitle()))
                    ->setFrom('noreply@hamdi.com')
                    ->setTo('adam@hamdi.com')
                    ->setReplyTo($contact->getEmail())
                    ->setBody($this->renderer->render('emails/contact.html.twig',[
                        'contact'=>$contact
                    ]),'text/html');
                    $this->mailer->send($message);
    }
}