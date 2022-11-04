<?php

declare(strict_types=1);

class AuthService implements AuthServiceI
{
    private DatabaseInteraction $db;
    private User $user;

    public function __construct(DatabaseInteraction $db, User $user)
    {
        $this->db = $db;
        $this->user = $user;
    }

    public function isUsernameTaken(string $username): bool
    {
        // TODO: Implement isUsernameTaken() method.
        $isTaken = false;
        $username = $this->user->getUsername();
        $dataBase = $this->db->getDataBase();
        $db_username = $this->db->query("SELECT * FROM tbl_users WHERE username='$username'");
        $find_db_username = mysqli_query($dataBase, $db_username);
        if(mysqli_num_rows($find_db_username) > 0) {
            $isTaken = true;
        }

        return $isTaken;
    }

    public function loginUser(string $username, string $password): UserI
    {
        // TODO: Implement loginUser() method.

    }

    public function singUpUser(string $username, string $password): UserI|string
    {
        // TODO: Implement singUpUser() method.
        $username = $this->user->getUsername();
        $password = $this->user->getPassword();
        $salt = $this->user->getSalt();

        $this->db->query("INSERT INTO tbl_users VALUES ('0','$username', '$password', '$salt')");

        $user = new User($username, $password, $salt);

        return $user;
    }

    public function isPasswordValid(string $password): bool
    {
        // TODO: Implement isPasswordValid() method.
        $isPassValid = false;

        //Length checker
        $isPasswordLengthValid = false;
        if (strlen($this->$password) >= 8) {
            $isPasswordLengthValid = true;
        }

        //Number and Special Character Checker
        $number = preg_match('@[0-9]@', $this->getPlainPassword());
        $specialChars = preg_match('@[^\w]@', $this->getPlainPassword());
        $passHasNumSpecChar = false;
        if($number && $specialChars) {
            $passHasNumSpecChar = true;
        }

        //Is Password Valid Checker
        if ($isPasswordLengthValid && $passHasNumSpecChar) {
            $isPassValid = true;
        }

        return $isPassValid;

    }

    public function generateSalt(): string
    {
        // TODO: Implement generateSalt() method.
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $saltLength = 6;
        $salt = '';

        for ($i = 0; $i < $saltLength; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $salt .= $characters[$index];
        }
        return $salt;
    }

    public function logoutUser(): void
    {
        // TODO: Implement logoutUser() method.
        session_start();
        session_unset();
        session_destroy();
        header('Location: login.php');
    }
}