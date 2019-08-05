<?php

namespace App\Forms;

use Nette\Application\UI\Form;
use Nette\Mail\IMailer;
use Nette\Mail\SendException;
use Nette\Utils\ArrayHash;
use Nette\Mail\Message;

class ContactFormFactory extends BaseFormFactory
{
    /** @var string Kontaktní email, na který se budou posílat emaily z kontaktního formuláře. */
    private $contactEmail;

    /** @var IMailer Služba Nette pro odesílání emailů. */
    private $mailer;

    /**
     * Nastavení kontaktního emailu a injektovanou Nette službou pro odesílání emailů.
     * @param string  $contactEmail kontaktní email
     * @param IMailer $mailer       automaticky injektovaná Nette služba pro odesílání emailů
     */
    public function __construct($contactEmail, IMailer $mailer)
    {
        $this->contactEmail = $contactEmail;
        $this->mailer = $mailer;
    }

    /**
     * Kontaktní formulář
     * @param callable $onSucces
     * @return Form
     */
    public function createContactForm(callable $onSucces)
    {
        $form = $this->createForm();
        $form->addText('name')
            ->setRequired(TRUE)
            ->addRule(Form::MIN_LENGTH, 'Jméno musí mít alespoň %d znaky', 3)
            ->setHtmlAttribute('placeholder', 'Vaše jméno');

        $form->addEmail('email')
            ->setRequired(TRUE)
            ->setHtmlAttribute('placeholder', 'Vaš email');

        $form->addText('subject')
            ->setRequired(TRUE)
            ->setHtmlAttribute('placeholder', 'Předmět');

        $form->addTextArea('content')
            ->setHtmlAttribute('placeholder', 'Zpráva');

        $form->addSubmit('submit', 'Poslat zprávu');


        $form->onSuccess[] = function (Form $form, ArrayHash $values) use ($onSucces) {
            try {
                $this->sendWithCaptcha($values->name, $values->email, $values->subject, $values->content, $form);
                $onSucces($form, $values);
            } catch (SendException $e) {
                $form->addError($e->getMessage());
            }
        };

        return $form;
    }

    /**
     * Odešle mail ověřený přes captcha
     * @param $name
     * @param $from
     * @param $subject
     * @param $message
     */
    public function sendWithCaptcha($name, $from, $subject, $message, $form)
    {
        if(isset($_POST['g-recaptcha-response']))
            $captcha = $_POST['g-recaptcha-response'];
        else
            throw new SendException('Chyba');

        $secretKey = "6Ld2mUUUAAAAANHvJNUuXzS5saYKuIHs4Jd7Jz--";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        //$this->printr2($responseKeys);
        if(!$responseKeys['success']){
            throw new SendException('Zprávu se nepodařilo odeslat, proveďte ověření');
        } else {
            $this->send($name, $from, $subject, $message);
        }
    }

    /**
     * Odeslání mailu
     * @param $name
     * @param $from
     * @param $subject
     * @param $message
     */
    private function send($name, $from, $subject, $message)
    {
        $mail = new Message();
        $mail->setFrom($from)
            ->addTo($this->contactEmail)
            ->setSubject($subject)
            ->setBody($message);
        $this->mailer->send($mail);
    }
}