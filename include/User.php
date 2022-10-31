<?php

class User extends DataBaseConnection {
    private $username;
    private $password; // hashed password
    private $plainPassword;
    private $salt;

    public function __construct($username, $plainPassword)
    {
        $this->username = $username;
        $this->plainPassword = $plainPassword;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    public function usernameChecker($path) {
        $username = $this->getUsername();
        $dataBase = $this->getDataBaseConn();
        $db_username = "SELECT * FROM tbl_users WHERE username='$username'";
        $find_db_username = mysqli_query($dataBase, $db_username);
        if(mysqli_num_rows($find_db_username) > 0){
            if ($path === 'signup') {
                header('Location: signUp.php?error=This username is already taken!');
            } elseif ($path === 'login') {
                header('Location: login.php?error=Something went wrong!');
            }
            return;
        }
    }

    public function passwordLengthChecker()
    {
        if (strlen($this->getPlainPassword()) < 8) {
            header('Location: login.php?error=Password must be 8 or more characters long!');
            return;
        }
    }

    public function passwordNumSpecCharChecker()
    {
        $number = preg_match('@[0-9]@', $this->getPlainPassword());
        $specialChars = preg_match('@[^\w]@', $this->getPlainPassword());

        if (!$number || !$specialChars) {
            header('Location: login.php?error=Password missing number or special character!');
            return;
        }
    }

    public function saltGenerator() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $saltLength = 6;
        $salt = '';

        for ($i = 0; $i < $saltLength; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $salt .= $characters[$index];
        }
        $this->setSalt($salt);
    }

    public function hashPassword() {
        $saltedPassword = $this->getPlainPassword() . $this->getSalt();
        $hashedPassword = md5($saltedPassword);
        $this->setPassword($hashedPassword);
    }

    public function signUpProcess()
    {
        $username = $this->getUsername();
        $password = $this->getPassword();
        $salt = $this->getSalt();

        $registerUser = "INSERT INTO tbl_users VALUES ('0', '$username','$password', '$salt')";
        $result = mysqli_query($this->getDataBaseConn(), $registerUser);

        if ($result) {
            $_SESSION["logedIn"] = true;
            header('Location: homePage.php?welcome_message=Welcome ' . $username);
            return;
        }

        header('Location: login.php?error=nema vas');
    }

    public function logInProcess()
    {
        $username = $this->getUsername();
        $plainPassword = $this->getPlainPassword();
        $db = $this->getDataBaseConn();

        $findUser = "SELECT * FROM tbl_users WHERE username = '$username'";
        $findUserResult = $db->query($findUser);

        if (mysqli_num_rows($findUserResult) > 0) {
            while ($row = mysqli_fetch_assoc($findUserResult)) {
                var_dump($row);
                $hashedPassword = md5($plainPassword . $row["salt"]);
                if($hashedPassword === $row["passoword"]) {
                    $_SESSION["logedIn"] = true;
                    header('Location: homePage.php?welcome_message=Welcome ' . $username);
                    return;
                }
            }
        }
        //header('Location: login.php?error=nema vas');
    }

    public function logOutProcess()
    {
        session_start();
        session_unset();
        session_destroy();

        header("Location: login.php");
    }

}