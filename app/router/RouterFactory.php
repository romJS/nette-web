<?php

namespace App;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;


class RouterFactory
{
	use Nette\StaticClass;

	/**
	 * @return Nette\Application\IRouter
	 */
	public static function createRouter()
	{
		$router = new RouteList;
		$router[] = new Route('<action>', [
		    'presenter' => 'Administration',
            'action' =>  [
                Route::FILTER_STRICT => true,
                Route::FILTER_TABLE => [
                    // řetězec v URL => akce presenteru
                    'administrace' => 'default',
                    'prihlaseni' => 'login',
                    'odhlasit' => 'logout',
                    'registrace' => 'register',
                    'editor' => 'edit',
                    'hodiny' => 'officeHours',
                ]
            ]
        ]);
        $router[] = new Route('<presenter>/<action>[/<id>]', 'Article:default');
		return $router;
	}
}
