<?php
    session_start();
    if(isset($_SESSION["logedIn"]) && $_SESSION["logedIn"] === true) {
        header('Location: homePage.php');
    }

    $username = $_POST["username"];
    $password = $_POST['password'];

    $registeredUsername = 'Erna';
    $registeredPassword = 'blablabla1*';

    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if ( (strlen($password) >= 8) && $number && $specialChars ) {
        if ( $registeredUsername === $username && $registeredPassword === $password) {
            $_SESSION["logedIn"] = true;
            header('Location: homePage.php');
        } else {
            header('Location: login.php?error=nema vas');
        }
    } else {
        header('Location: login.php');
    }
 ?>
