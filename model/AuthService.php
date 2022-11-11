<?php

declare(strict_types=1);

class AuthService implements AuthServiceI
{
    private DatabaseInteraction $db;

    public function __construct(DatabaseInteraction $db)
    {
        $this->db = $db;
    }

    private function isUsernameTaken(string $username): bool
    {
        // TODO: Implement isUsernameTaken() method.
        $isTaken = false;
        $db_username = $this->db->query("SELECT * FROM tbl_users WHERE username='$username'");

        if ($db_username->num_rows > 0) {
            $isTaken = true;
        }

        return $isTaken;
    }

    private function isPasswordValid(string $password): bool
    {
        // TODO: Implement isPasswordValid() method.
        $isPassValid = false;

        //Length checker
        $isPasswordLengthValid = false;
        if (strlen($password) >= 8) {
            $isPasswordLengthValid = true;
        }

        //Number and Special Character Checker
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        $passHasNumSpecChar = false;
        if ($number && $specialChars) {
            $passHasNumSpecChar = true;
        }

        //Is Password Valid Checker
        if ($isPasswordLengthValid && $passHasNumSpecChar) {
            $isPassValid = true;
        }

        return $isPassValid;

    }

    private function generateSalt(): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $saltLength = 6;
        $salt = '';

        for ($i = 0; $i < $saltLength; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $salt .= $characters[$index];
        }
        return $salt;
    }

    public function loginUser(string $username, string $password): UserI|string
    {
        $isPasswordValid = $this->isPasswordValid($password);
        if (!$isPasswordValid) {
            return "ERR_PASSWORD_IS_NOT_VALID";
        }

        $findUser = $this->db->query("SELECT * FROM tbl_users WHERE username = '$username'");

        if(is_string($findUser)) {
            return "CAN_NOT_FIND_USER";
        }

        if ($findUser->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($findUser)) {
                $hashedPassword = md5($password . $row["salt"]);

                if ($hashedPassword === $row["passoword"]) {
                    return new User($row["username"],$row["passoword"],$row["salt"]);
                }
            }
        }

    }

    public function singUpUser(string $username, string $password): UserI|string
    {

        $isPasswordValid = $this->isPasswordValid($password);
        if (!$isPasswordValid) {
            return "ERR_PASSWORD_IS_NOT_VALID";
        }

        $isUsernameTaken = $this->isUsernameTaken($username);
        if (true === $isUsernameTaken) {
            return "ERR_USERNAME_IS_TAKEN";
        }

        $salt = $this->generateSalt();
        $hashedPassword = md5($password . $salt);

        $status = $this->db->query("INSERT INTO tbl_users (username, passoword, salt) VALUES ('$username', '$hashedPassword', '$salt')");

        if (is_string($status)) {
            return "INPUT_ERROR";
        }

        $user = new User($username, $hashedPassword, $salt);

        return $user;
    }


    public function logoutUser(): void
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: login.php');
    }
}