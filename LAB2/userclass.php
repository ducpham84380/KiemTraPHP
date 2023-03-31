<?php //IDEA:
require_once("helpers.php");

class User
{
    private $username;
    private $userEmail;
    private $userID;
    private $status;

    public function __construct($newUser, $email)
    {
        $this->username = $newUser;
        $this->userEmail = $newUser;
        $this->status = 1;
        $this->userID = GetNextUserID();
    }

    public function __destruct()
    {
        $this->username = NULL;
        $this->userEmail = NULL;
        $this->status = NULL;
        $this->userID = NULL;
    }

    public function GetUserName()
    {
        return $this->username;
    }
    public function GetUserEmail()
    {
        return $this->userEmail;
    }
    public function GetUserID()
    {
        return $this->userID;
    }
    public function GetStatus()
    {
        return $this->status;
    }
}