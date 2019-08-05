<?php

namespace App\Forms;

use App\Model\UserException;
use App\Model\UserManager;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;

class UserFormFactory extends BaseFormFactory
{
    /** @var UserManager  */
    private $userManager;

    /**
     * UserFormFactory constructor.
     * @param UserManager $userManager
     */
    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * Vytvoří a vrátí formulář pro editaci uživatele.
     * @param callable $onSuccess
     * @return Form
     */
    public function createEditUser(callable $onSuccess)
    {
        $form = $this->createForm();
        $form->addHidden('user_id');
        $form->addText('username', 'Jméno')
            ->setRequired('Zadejte své jméno');

        $form->addPassword('password', 'Heslo')
            ->setOption('description', sprintf('minimálně %d znaků', self::PASSWORD_MIN_LENGTH))
            ->setRequired('Zadejte heslo')
            ->addRule($form::MIN_LENGTH, NULL, self::PASSWORD_MIN_LENGTH);
        $form->addPassword('password_repeat', 'Heslo znovu')->setOmitted()->setRequired(false)
            ->addRule(Form::EQUAL, 'Hesla nesouhlasí.', $form['password']);

        $role = [
            'member' => 'Člen',
            'admin' => 'Admin',
        ];

        $form->addSelect('role', 'Role', $role)
            ->setPrompt('Zvolte oprávnění');

        $form->addSubmit('register', 'Upravit');

        $form->onSuccess[] = function (Form $form, ArrayHash $values) use ($onSuccess) {
            try {
                $this->userManager->updateUser($values);
                $onSuccess($form, $values);
            } catch (UserException $e) {
                $form->addError('Chyba');
                return;
            }
        };
        return $form;
    }
}