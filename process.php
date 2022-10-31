<?php
    session_start();
    if(isset($_SESSION["logedIn"]) && $_SESSION["logedIn"] === true) {
        header('Location: homePage.php');
    }

    require ('include/DataBaseConnection.php');
    require('include/User.php');

    $username = $_POST["username"];
    $password = $_POST["password"];

    $pathName = $_POST["path"];

    $saltLength = 6;

    function saltGenerator($saltLength) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $salt = '';

        for ($i = 0; $i < $saltLength; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $salt .= $characters[$index];
        }
        return $salt;
    }

    $userObj = new User($username,$password);

    $userObj->connectivityCheck();

    if ($pathName === "signup") {
        //SIGNUP PROCESS
        if (!isset($username) || !isset($password)) {
            header('Location: signUp.php');
            return;
        }

        $userObj->passwordLengthChecker();
        $userObj->passwordNumSpecCharChecker();
        $userObj->signUpProcess();

    } elseif ($pathName === "login") {
        //LOGIN PROCESS
        if (!isset($username) || !isset($password)) {
            header('Location: login.php');
            return;
        }
        $userObj->passwordLengthChecker();
        $userObj->logInProcess();

    }

    //header('Location: login.php?error=nema vas');

    $userObj->dataBaseDeconnect();


 ?>
