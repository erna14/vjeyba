<?php

interface AuthServiceI
{

    public function isUsernameTaken(string $username): bool;

    public function loginUser(string $username, string $password): UserI;

    public function singUpUser(string $username, string $password): UserI;

    public function isPasswordValid(string $password): bool;

    public function generateSalt(): string;

    public function logoutUser(): void;

}

