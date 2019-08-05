<?php

namespace App\Presenters;

use App\Forms\AdminFormFactory;
use App\Model\ArticleManager;
use App\Model\AdminManager;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;

/**
 * Class AdministrationPresenter
 * @package App\Presenters
 */
class AdministrationPresenter extends BasePresenter
{
    /** @var AdminFormFactory  */
    private $adminFormFactory;

    /**
     * AdministrationPresenter constructor.
     * @param ArticleManager $articleManager
     * @param AdminFormFactory $adminFormFactory
     */
    public function __construct(ArticleManager $articleManager,AdminManager $adminManager, AdminFormFactory $adminFormFactory)
    {
        parent::__construct($articleManager, $adminManager);
        $this->adminFormFactory = $adminFormFactory;
        $this->setLayout('adminLayout');
    }

    /**
     * Před vykreslováním stránky pro přihlášení přesměruje do administrace, pokud je uživatel již přihlášen.
     * @throws AbortException Když dojde k přesměrování.
     */
    public function actionLogin()
    {
        if ($this->user->isLoggedIn()) $this->redirect('Administration:');
    }

    /**
     * Odstraní článek
     * @param null $url
     * @throws \Nette\Application\AbortException
     */
    public function actionRemove($url = null)
    {
        $this->articleManager->removeArticle($url);
        $this->flashMessage('Článek byl úspěšně odstraněn.');
        $this->redirect('Administration:default');
    }

    /**
     * Načte data do šablony
     */
    public function renderDefault()
    {
        $this->template->articles = $this->articleManager->getArticles();
        if ($this->user->isLoggedIn()) $this->template->username = $this->user->identity->username;
    }

    /**
     * Načte data do formuláře pro editaci článků
     * @param null $url
     */
    public function actionEdit($url = null)
    {
        if($url) {
            if(!($article = $this->articleManager->getArticle($url)))
                $this->flashMessage("Článek nebyl nalezen");
            else $this['editorForm']->setDefaults($article);
        }
    }

    /**
     * Načte data do šablony
     */
    public function renderOfficeHours()
    {
        //$this->template->data = dump($this->adminManager->getOfficeHours());
        //$this->template->days = $this->daysOfWeek;
        $data = $this->adminManager->getOfficeHours();
        $this['hoursForm']->setDefaults($data);
    }

    /**
     * Vytváří a vrací přihlašovací formulář pomocí továrny.
     * @return Form přihlašovací formulář
     */
    protected function createComponentLoginForm()
    {
        return $this->adminFormFactory->createSingInForm(function () {
            $this->flashMessage('Byl jste úspěšně přihlášen.');
            $this->redirect('Administration:');
        });
    }

    /**
     * Vytváří a vrací registrační formulář pomocí továrny.
     * @return Form registrační formulář
     */
    protected function createComponentRegisterForm()
    {
        return $this->adminFormFactory->createSingUpForm(function (Form $form, ArrayHash $values) {
            $this->flashMessage('Uživatel byl úspěšně zaregistrován.');
            //$this->user->login($values->username, $values->password); // Přihlásíme se.
            $this->redirect('User:manage');
        });
    }

    /**
     * Formulář pro editaci článků
     * @return Form
     */
    protected function createComponentEditorForm()
    {
        return $this->adminFormFactory->createEditorForm(function (Form $form, ArrayHash $values){
            $this->flashMessage('Článek byl úspěšně uložen.');
            $this->redirect('Administration:');
        });
    }

    /**
     * Formulář pro editaci ordinačních hodin
     * @return
     */
    protected function createComponentHoursForm()
    {
        return $this->adminFormFactory->createUpdateHoursForm(function (Form $form, ArrayHash $values) {
            $this->flashMessage('Data byla aktualizována.');
            $this->redirect('Administration:officeHours');
        });
    }
}