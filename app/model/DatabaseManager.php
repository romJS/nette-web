<?php

namespace App\Model;

use Nette\Database\Context;
use Nette\SmartObject;

abstract class DatabaseManager
{
    use SmartObject;

    /** @var Context  */
    protected $database;

    /**
     * DatabaseManager constructor.
     * @param Context $database
     */
    public function __construct(Context $database)
    {
        $this->database = $database;
    }
}