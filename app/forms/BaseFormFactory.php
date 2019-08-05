<?php

namespace App\Forms;

use Nette;
use Nette\Application\UI\Form;


abstract class BaseFormFactory
{
	use Nette\SmartObject;

    const PASSWORD_MIN_LENGTH = 5;

	/**
	 * @return Form
	 */
	public function createForm()
	{
		return new Form;
	}

}
