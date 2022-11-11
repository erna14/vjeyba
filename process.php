<?php
    session_start();
    if(isset($_SESSION["logedIn"]) && $_SESSION["logedIn"] === true) {
        header('Location: homePage.php');
    }

    include('model/DatabaseI.php');
    include('model/DatabaseInteraction.php');
    include ('model/UserI.php');
    include("model/User.php");
    include('model/AuthServiceI.php');
    include('model/AuthService.php');

    $db = new DatabaseInteraction();
    $db->connect();

    if (!$db->hasValidConnection()){
        echo $db->getConnectionError();
    }

    $authService = new AuthService($db);

    $username = $_POST["username"];
    $password = $_POST["password"];
    $pathName = $_POST["path"];

    if ($pathName === "signup") {
        //SIGNUP PROCESS
        if (!isset($username) || !isset($password)) {
            header('Location: signUp.php');
            return;
        }

        $signUp_result = $authService->singUpUser($username, $password);
        if (is_string($signUp_result)){

            header('Location: signUp.php');
            return;
        }

        header("Location: homePage.php?welcome_message=Welcome ". $username);

    } elseif ($pathName === "login") {
        //LOGIN PROCESS
        if (!isset($username) || !isset($password)) {
            header('Location: login.php');
            return;
        }

        $login_result = $authService->loginUser($username, $password);

        if(is_string($login_result)) {
            header('Location: login.php');
            return;
        }
        $_SESSION["logedIn"] = true;
        header("Location: homePage.php?welcome_message=Welcome ". $username);

    } elseif ($pathName === "logout") {
        $authService->logoutUser();
        header('Location: login.php');
    }


    $db->disconnect();

