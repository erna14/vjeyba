<?php

declare(strict_types=1);

class User implements UserI
{
    private int $ID;
    private string $username;
    private string $password;
    private string $salt;

    public function __construct($username, $password, $salt)
    {
        $this->username = $username;
        $this->password = $password;
        $this->salt = $salt;
    }

    public function getID():int
    {
        return $this->ID;
    }
    public function setID($ID)
    {
        $this->ID = $ID;
    }


    public function getUsername():string
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }


    public function getPassword():string
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }


    public function getSalt():string
    {
        return $this->salt;
    }
    public function setSalt(string $salt)
    {
        $this->salt = $salt;
    }




}