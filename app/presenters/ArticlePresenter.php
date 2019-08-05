<?php

namespace App\Presenters;

use App\Forms\ContactFormFactory;
use App\Model\ArticleManager;
use App\Model\AdminManager;
use Nette\Utils\ArrayHash;
use Nette\Application\UI\Form;

/**
 * Class ArticlePresenter
 * @package App\Presenters
 */
class ArticlePresenter extends BasePresenter
{
    /** @var ContactFormFactory  */
    private $contactFormFactory;

    /**
     * ArticlePresenter constructor.
     * @param ArticleManager $articleManager
     * @param AdminManager $adminManager
     * @param ContactFormFactory $contactFormFactory
     */
    public function __construct(ArticleManager $articleManager, AdminManager $adminManager, ContactFormFactory $contactFormFactory)
    {
        parent::__construct($articleManager, $adminManager);
        $this->contactFormFactory = $contactFormFactory;
    }

    /**
     * Načte data do šablony
     */
    public function renderDefault()
    {
        $this->template->articles = $this->articleManager->getArticles();
        $this->template->data = $this->adminManager->getOfficeHours();
        $this->template->days = $this->daysOfWeek;
    }

    /**
     * Vytváří a vrací kontaktní formulář
     * @return Form
     */
    public function createComponentContactForm()
    {
        return $this->contactFormFactory->createContactForm(function (Form $form, ArrayHash $values) {
                $this->flashMessage("Zpráva byla úspěšně odeslána");
                $this->redirect('Article:#kontakt');
        });
    }
}