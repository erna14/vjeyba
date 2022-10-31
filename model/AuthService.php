<?php

declare(strict_types=1);


class AuthService implements AuthServiceI
{
    private DatabaseInteraction $db;

    public function __construct(DatabaseInteraction $db)
    {
        $this->db = $db;
    }

    public function isUsernameTaken(string $username): bool
    {
        // TODO: Implement isUsernameTaken() method.
    }

    public function loginUser(string $username, string $password): UserI
    {
        // TODO: Implement loginUser() method.
    }

    public function singUpUser(string $username, string $password): UserI|string
    {
        // obavis sve provjere sto ti treba vako nako

        $this->db->query("insert into.....");

        $user = new User($username, $password, $salt);

        return $user;
        // TODO: Implement singUpUser() method.
    }

    public function isPasswordValid(string $password): bool
    {
        // TODO: Implement isPasswordValid() method.
    }

    public function generateSalt(): string
    {
        // TODO: Implement generateSalt() method.
    }

    public function logoutUser(): void
    {
        // TODO: Implement logoutUser() method.
    }
}