<?php
    session_start();
    if(isset($_SESSION["logedIn"]) && $_SESSION["logedIn"] === true) {
        header('Location: homePage.php');
    }

    require('include/data.php');

    // ucitati podatke iz data.php

    // provjeriti kombinaciju username i pw iz post parametra da li se podudara

    // ako je validno, redirekt na homepage i pozdravna poruka

    // osigurati da ako nije post requet, tj. nema post parametara u prvom planu, redirekcija odmah na login

    global $registeredUsers;
    $registeredUsersArrayLength = count($registeredUsers);

    $username = $_POST["username"];
    $password = $_POST['password'];

    $registeredUsername = 'Erna';
    $registeredPassword = 'blablabla1*';

    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!isset($username) || !isset($password)) {
        header('Location: login.php');
        return;
    }

    if (strlen($password) < 8) {
        header('Location: login.php?error=Password must be 8 or more characters long!');
        return;
    }

    if(!$number || !$specialChars) {
        header('Location: login.php?error=Password missing number or special character!');
        return;
    }

    for ( $i = 0; $i < $registeredUsersArrayLength; $i++) {
        if (($username === $registeredUsers[$i]["username"]) && ($password === $registeredUsers[$i]["password"])) {
            $_SESSION["logedIn"] = true;
            header('Location: homePage.php?welcome_message=Welcome '.$username);
            return;
        }
    }

    header('Location: login.php?error=nema vas');


    /*if ( $registeredUsername === $username && $registeredPassword === $password) {
        $_SESSION["logedIn"] = true;
        header('Location: homePage.php');
    } else {
        header('Location: login.php?error=nema vas');
    }*/

 ?>
