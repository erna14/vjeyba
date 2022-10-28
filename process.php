<?php
    session_start();
    if(isset($_SESSION["logedIn"]) && $_SESSION["logedIn"] === true) {
        header('Location: homePage.php');
    }
    //require('include/data.php');

    include 'include/DataBaseConnection.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    $pathName = $_POST["path"];

    $userObj = new DataBaseConnection($username,$password);

    //$userObj->setDataBaseConn(mysqli_connect("localhost", "Erna", "password1*", "users_db"));

    //if (!isset($username) || !isset($password)) {
        //header('Location: login.php');
        //return;
    //}

    $userObj->connectivityCheck();

    if ($pathName === "signup") {
        //SIGNUP PROCESS
            $userObj->passwordLengthChecker();
            $userObj->passwordNumSpecCharChecker();
            $userObj->signUpProcess();

    } elseif ($pathName === "login") {
        //LOGIN PROCESS
        $userObj->passwordLengthChecker();
        $userObj->logInProcess();

    }

    //header('Location: login.php?error=nema vas');

    $userObj->dataBaseDeconnect();


 ?>
