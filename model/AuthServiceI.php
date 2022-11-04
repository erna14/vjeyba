<?php


interface AuthServiceI
{
    public function loginUser(string $username, string $password): UserI;

    public function singUpUser(string $username, string $password): UserI|string;

    public function logoutUser(): void;

}

