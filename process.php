<?php
    $username = $_POST["username"];
    $password = $_POST['password'];

    $registeredUsername = 'Erna';
    $registeredPassword = 'blablabla1*';

    if ( $registeredUsername === $username && $registeredPassword === $password) {
        header('Location: homePage.php');
    }else {
        //header('Location: login.php');
        echo 'nema vas';
    };
 ?>
