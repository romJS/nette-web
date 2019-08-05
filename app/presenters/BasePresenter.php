<?php

namespace App\Presenters;

use Nette;
use App\Model;
use App\Model\ArticleManager;
use App\Model\AdminManager;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    /** @var ArticleManager  */
    protected $articleManager;

    /** @var AdminManager  */
    protected $adminManager;

    /**
     * @var array Přejmenované dny eng -> cz
     */
    protected $daysOfWeek = array(
        'Monday' => 'Pondělí', 'Tuesday' => 'Úterý', 'Wednesday' => 'Středa',
        'Thursday' => 'Čtvrtek', 'Friday' => 'Pátek');

    public function __construct(ArticleManager $articleManager, AdminManager $adminManager)
    {
        $this->articleManager = $articleManager;
        $this->adminManager = $adminManager;
    }

    public function startup()
    {
        parent::startup();
        if(!$this->getUser()->isAllowed($this->getName(), $this->getAction())) {
            $this->flashMessage('Nejsi přihlášený nebo nemáš dostatečná oprávnění.');
            $this->redirect(':Administration:login');
        }
    }

    /**
     * Odhlásí uživatele a přesměruje na přihlašovací stránku.
     * @throws AbortException Při přesměrování na přihlašovací stránku.
     */
    public function actionLogout()
    {
        $this->user->logout();
        $this->redirect('login');
    }
}
