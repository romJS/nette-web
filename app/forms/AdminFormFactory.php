<?php

namespace App\Forms;

use App\Model\AdminManager;
use App\Model\ArticleManager;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;
use Nette\Database\UniqueConstraintViolationException;
use Nette\Security\AuthenticationException;
use Nette\Security\User;
use App\Model\UserException;
use App\Model\DuplicateNameException;

class AdminFormFactory extends BaseFormFactory
{
    /** @var ArticleManager  */
    private $articleManager;

    /** @var User */
    private $user;

    /** @var AdminManager  */
    private $adminManager;

    /**
     * AdminFormFactory constructor.
     * @param ArticleManager $articleManager
     * @param User $user
     */
    public function __construct(ArticleManager $articleManager, User $user, AdminManager $adminManager)
    {
        $this->articleManager = $articleManager;
        $this->user = $user;
        $this->adminManager = $adminManager;
    }

    /**
     * Vytváří a vrací formulář pro editaci článků.
     * @return Form formulář pro editaci článků
     */
    public function createEditorForm(callable $onSuccess)
    {
        // Vytvoření formuláře a definice jeho polí.
        $form = $this->createForm();
        $form->addHidden('article_id');
        $form->addText('title', 'Titulek')->setRequired();
        $form->addText('url', 'URL')->setRequired();
        $form->addText('description', 'Popisek')->setRequired();
        $form->addTextArea('content', 'Obsah');
        $form->addSubmit('save', 'Uložit článek');

        // Funkce se vykonaná při úspěšném odeslání formuláře a zpracuje zadané hodnoty.
        $form->onSuccess[] = function (Form $form, ArrayHash $values) use ($onSuccess){
            try {
                $this->articleManager->saveArticle($values);
                $onSuccess($form, $values);
            } catch (UniqueConstraintViolationException $e) {
                $form->addError('Článek s touto URL adresou již existuje.');
            }
        };
        return $form;
    }

    /**
     * Vytváří a vrací formulář pro přihlášení uživatele.
     * @return Form
     */
    public function createSingInForm(callable $onSuccess)
    {
        $form = $this->createForm();
        $form->addText('username', 'Jméno')
            ->setRequired('Zadejte prosím své jméno');

        $form->addPassword('password', 'Heslo')
            ->setRequired('Zadejte prosím heslo');

        $form->addCheckbox('remember', 'Pamatovat si mě');

        $form->addSubmit('send', 'Přihlásit');

        $form->onSuccess[] = function (Form $form, $values) use ($onSuccess) {
            try {
                $this->user->setExpiration($values->remember ? '14 days' : '20 minutes');
                $this->user->login($values->username, $values->password);
            } catch (AuthenticationException $e) {
                $form->addError('Chybně zadáno jméno nebo heslo');
                return;
            }
            $onSuccess();
        };
        return $form;
    }

    /**
     * Vytváří a vrací formulář pro registraci uživatele.
     * @return Form
     */
    public function createSingUpForm(callable $onSuccess)
    {
        $form = $this->createForm();
        $form->addText('username', 'Jméno')
            ->setRequired('Zadejte své jméno');

//		$form->addText('email', 'Your e-mail:')
//			->setRequired('Please enter your e-mail.')
//			->addRule($form::EMAIL);

        $form->addPassword('password', 'Heslo')
            ->setOption('description', sprintf('minimálně %d znaků', self::PASSWORD_MIN_LENGTH))
            ->setRequired('Zadejte heslo')
            ->addRule($form::MIN_LENGTH, NULL, self::PASSWORD_MIN_LENGTH);
        $form->addPassword('password_repeat', 'Heslo znovu')->setOmitted()->setRequired(false)
            ->addRule(Form::EQUAL, 'Hesla nesouhlasí.', $form['password']);

        $form->addSubmit('register', 'Registrovat');

        $form->onSuccess[] = function (Form $form, ArrayHash $values) use ($onSuccess) {
            try {
                $this->userManager->register($values);
                $onSuccess($form, $values);
            } catch (DuplicateNameException $e) {
                $form->addError('Toto jméno je už použito');
                return;
            }
        };
        return $form;
    }

    /**
     * Vytvoří a vrátí formulář pro editaci ordinačních hodin
     * @param callable $onSuccess
     * @return Form
     */
    public function createUpdateHoursForm(callable $onSuccess)
    {
        $form = new Form();

        $sub1 = $form->addContainer('Monday');
        $sub1->addText('ill');
        $sub1->addText('for_invited');
        $sub1->addText('prevention_and_vaccination');
        $sub1->addHidden('hours_id');

        $sub2 = $form->addContainer('Tuesday');
        $sub2->addText('ill');
        $sub2->addText('for_invited');
        $sub2->addText('prevention_and_vaccination');
        $sub2->addHidden('hours_id');

        $sub3 = $form->addContainer('Wednesday');
        $sub3->addText('ill');
        $sub3->addText('for_invited');
        $sub3->addText('prevention_and_vaccination');
        $sub3->addHidden('hours_id');

        $sub4 = $form->addContainer('Thursday');
        $sub4->addText('ill');
        $sub4->addText('for_invited');
        $sub4->addText('prevention_and_vaccination');
        $sub4->addHidden('hours_id');

        $sub5 = $form->addContainer('Friday');
        $sub5->addText('ill');
        $sub5->addText('for_invited');
        $sub5->addText('prevention_and_vaccination');
        $sub5->addHidden('hours_id');

        $form->addSubmit('save', 'Uložit');

        $form->onSuccess[] = function (Form $form, ArrayHash $values) use ($onSuccess) {
            try {
                $this->adminManager->updateOfficeHours($values);
                $onSuccess($form, $values);
            } catch (UserException $e) {
                $form->addError('Chyba');
            }
        };
        return $form;
    }
}