<?php

namespace App\Model;

use Nette;
use Nette\Security\Passwords;
use Nette\Security\IAuthenticator;
use Nette\Database\UniqueConstraintViolationException;


/**
 * Users management.
 */
class UserManager extends DatabaseManager implements IAuthenticator
{
	use Nette\SmartObject;

	const
		TABLE_NAME = 'user',
		COLUMN_ID = 'user_id',
		COLUMN_NAME = 'username',
		COLUMN_PASSWORD_HASH = 'password',
		COLUMN_EMAIL = 'email',
		COLUMN_ROLE = 'role';

	/**
	 * Performs an authentication.
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		list($username, $password) = $credentials;

		$row = $this->database->table(self::TABLE_NAME)->where(self::COLUMN_NAME, $username)->fetch();

		if (!$row) {
			throw new Nette\Security\AuthenticationException('The username is incorrect.', self::IDENTITY_NOT_FOUND);

		} elseif (!Passwords::verify($password, $row[self::COLUMN_PASSWORD_HASH])) {
			throw new Nette\Security\AuthenticationException('The password is incorrect.', self::INVALID_CREDENTIAL);

		} elseif (Passwords::needsRehash($row[self::COLUMN_PASSWORD_HASH])) {
			$row->update([
				self::COLUMN_PASSWORD_HASH => Passwords::hash($password),
			]);
		}

		$arr = $row->toArray();
		unset($arr[self::COLUMN_PASSWORD_HASH]);
		return new Nette\Security\Identity($row[self::COLUMN_ID], $row[self::COLUMN_ROLE], $arr);
	}


	/**
	 * Adds new user.
	 * @param  string
	 * @param  string
	 * @return void
	 * @throws DuplicateNameException
	 */
	public function register($user)
	{
		try {
		    $this->database->table(self::TABLE_NAME)->insert([
                self::COLUMN_NAME => $user->username,
                self::COLUMN_PASSWORD_HASH => Passwords::hash($user->password),
            ]);
		} catch (UniqueConstraintViolationException $e) {
			throw new DuplicateNameException;
		}
	}

    /**
     * Upraví uživatele
     * @param $user
     */
	public function updateUser($user)
    {
        try {
            $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $user->user_id)->update([
                self::COLUMN_NAME => $user->username,
                self::COLUMN_PASSWORD_HASH => Passwords::hash($user->password),
                self::COLUMN_ROLE => $user->role,
            ]);
        } catch (UniqueConstraintViolationException $e) {
            throw new \InvalidArgumentException();
        }
    }

    /** Vrátí všechny uživatele */
	public function getUsers()
    {
        return $this->database->table(self::TABLE_NAME)->order(self::COLUMN_ID);
    }

    /** Vrátí uživatele podle ID */
    public function getUser($id = null)
    {
        return $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->fetch();
    }
}



class DuplicateNameException extends \Exception
{}
