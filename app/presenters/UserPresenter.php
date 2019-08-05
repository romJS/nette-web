<?php

namespace App\Presenters;

use App\Forms\SignUpFormFactory;
use App\Forms\UserFormFactory;
use App\Model\AdminManager;
use App\Model\ArticleManager;
use App\Model\UserManager;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;

/**
 * Class UserPresenter
 * @package App\Presenters
 */
class UserPresenter extends BasePresenter
{
    /** @var UserManager  */
    private $userManager;

    /** @var UserFormFactory  */
    private $userFormFactory;

    /**
     * UserPresenter constructor.
     * @param ArticleManager $articleManager
     * @param UserManager $userManager
     */
    public function __construct(ArticleManager $articleManager,AdminManager $adminManager, UserManager $userManager, UserFormFactory $userFormFactory)
    {
        parent::__construct($articleManager, $adminManager);
        $this->userManager = $userManager;
        $this->userFormFactory = $userFormFactory;
        $this->setLayout('adminLayout');
    }

    /**
     * Načte data do formuláře pro editaci uživatele
     * @param null $id
     */
    public function actionEdit($id = null)
    {
        if($id){
            if(!$user = $this->userManager->getUser($id))
                $this->flashMessage("Uživatel nebyl nalezen");
            else
                $this['editUserForm']->setDefaults($user);
        }
    }

    /** Načte uživatele do šablony manage */
    public function renderManage()
    {
        $this->template->users = $this->userManager->getUsers();
    }

    /**
     * Vytváří a vrací registrační formulář pomocí továrny.
     * @return Form registrační formulář
     */
    protected function createComponentEditUserForm()
    {
        return $this->userFormFactory->createEditUser(function (Form $form, ArrayHash $values) {
            $this->flashMessage('Uživatel byl úspěšně upraven');
            $this->redirect("User:manage");

        });
    }
}