<?php


class UserSession
{
	public function __construct()
	{
		if(session_status() == PHP_SESSION_NONE)
		{

			session_start();
		}
	}

    public function create($userId, $firstName, $lastName, $email)
    {

        $_SESSION['user'] =
        [
            'Id'    => $userId,
            'FirstName' => $firstName,
            'LastName'  => $lastName,
            'Mail'     => $mail
        ];
    }

    public function destroy()
    {
      
        $_SESSION = array();
        session_destroy();
    }

    public function getEmail()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }

        return $_SESSION['user']['Mail'];
    }

    public function getFirstName()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }

        return $_SESSION['user']['FirstName'];
    }

    public function getFullName()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }

        return $_SESSION['user']['FirstName'].' '.$_SESSION['user']['LastName'];
    }

    public function getLastName()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }

        return $_SESSION['user']['LastName'];
    }

    public function getUserId()
    {
        if($this->isAuthenticated() == false)
        {
            return null;
        }

        return $_SESSION['user']['Id'];
    }

	public function isAuthenticated()
	{
		if(array_key_exists('user', $_SESSION) == true)
		{
			if(empty($_SESSION['user']) == false)
			{
				return true;
			}
		}

		return false;
	}
}
