<?php

class DataBaseConnection {
    private $username;
    private $password;
    private $dataBaseConn;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setDataBaseConn($dataBaseConn)
    {
        $this->dataBaseConn = $dataBaseConn;
    }

    public function getDataBaseConn()
    {
        return $this->dataBaseConn;
    }

    public function connectivityCheck(){
        $this->setDataBaseConn(mysqli_connect("localhost", "Erna", "password1*", "users_db"));

        if (!$this->getDataBaseConn()) {
            echo mysqli_connect_error();
        }
    }

    public function signUpProcess(){
        $username = $this->getUsername();
        $password = $this->getPassword();

        $registerUser = "INSERT INTO tbl_users VALUES ('0', '$username','$password')";
        $result = mysqli_query($this->getDataBaseConn(), $registerUser);

        if ( $result ){
            $_SESSION["logedIn"] = true;
            header('Location: homePage.php?welcome_message=Welcome '.$username);
            return;
        }

        header('Location: login.php?error=nema vas');
    }

    public function logInProcess() {
        $username = $this->getUsername();
        $password = $this->getPassword();

        $findUser = "SELECT * FROM tbl_users WHERE username = '$username' AND passoword = '$password'";
        $findUserResult = $this->getDataBaseConn()->query($findUser);

        if ($findUserResult) {
            if (mysqli_num_rows($findUserResult) > 0) {
                $_SESSION["logedIn"] = true;
                header('Location: homePage.php?welcome_message=Welcome '.$username);
                return;
            }
        }

        header('Location: login.php?error=nema vas');
    }

    public function passwordLengthChecker() {
        if (strlen($this->getPassword()) < 8) {
            header('Location: login.php?error=Password must be 8 or more characters long!');
            return;
        }
    }

    public function passwordNumSpecCharChecker() {
        $number = preg_match('@[0-9]@', $this->getPassword());
        $specialChars = preg_match('@[^\w]@', $this->getPassword());

        if(!$number || !$specialChars) {
            header('Location: login.php?error=Password missing number or special character!');
            return;
        }
    }

    public function logOutProcess() {
        session_start();
        session_unset();
        session_destroy();

        header("Location: login.php");
    }

    public function dataBaseDeconnect() {
        mysqli_close($this->getDataBaseConn());
    }
}


