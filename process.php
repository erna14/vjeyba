<?php
    session_start();
    if(isset($_SESSION["logedIn"]) && $_SESSION["logedIn"] === true) {
        header('Location: homePage.php');
    }

    require('include/DataBaseConnection.php');
    require('include/User.php');

    $username = $_POST["username"];
    $password = $_POST["password"];

    $pathName = $_POST["path"];

    $userObj = new User($username,$password);

    $userObj->connectivityCheck();

    if ($pathName === "signup") {
        //SIGNUP PROCESS
        if (!isset($username) || !isset($password)) {
            header('Location: signUp.php');
            return;
        }
        //USERNAME CHECKER
        $userObj->usernameChecker($pathName);

        //PASSWORD CHECKER
        $userObj->passwordLengthChecker();
        $userObj->passwordNumSpecCharChecker();

        //HASH AND SALT
        $userObj->saltGenerator();
        $userObj->hashPassword();

        $userObj->signUpProcess();

    } elseif ($pathName === "login") {
        //LOGIN PROCESS
        if (!isset($username) || !isset($password)) {
            header('Location: login.php');
            return;
        }
        //$userObj->usernameChecker($pathName);
        $userObj->passwordLengthChecker();
        $userObj->logInProcess();
    }

    //header('Location: login.php?error=nema vas');

    $userObj->dataBaseDeconnect();


 ?>
