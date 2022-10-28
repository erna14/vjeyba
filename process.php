<?php
    session_start();
    if(isset($_SESSION["logedIn"]) && $_SESSION["logedIn"] === true) {
        header('Location: homePage.php');
    }

    
    //require('include/data.php');

    $dataBaseConn = mysqli_connect("localhost", "Erna", "password1*", "users_db");

    if (!$dataBaseConn) {
        echo mysqli_connect_error();
    }

    $username = $_POST["username"];
    $password = $_POST["password"];

    $findUser = "SELECT * FROM tbl_users WHERE username = '$username' AND passoword = '$password'";
    //$findUserResult = $dataBaseConn->query($findUser);
    $findUserResult = $dataBaseConn->query($findUser);
    //global $registeredUsers;
    //$registeredUsersArrayLength = count($registeredUsers);

    //$username = $_POST["username"];
    //$password = $_POST['password'];

    //$registeredUsername = 'Erna';
    //$registeredPassword = 'blablabla1*';

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

    if ($findUserResult) {
        if (mysqli_num_rows($findUserResult) > 0) {
            $_SESSION["logedIn"] = true;
            header('Location: homePage.php?welcome_message=Welcome '.$username);
            return;
        }
    }

    header('Location: login.php?error=nema vas');

    //for ( $i = 0; $i < $registeredUsersArrayLength; $i++) {
      //  if (($username === $registeredUsers[$i]["username"]) && ($password === $registeredUsers[$i]["password"])) {
            //$_SESSION["logedIn"] = true;
            //$_SESSION["username"] = $username;
            //header('Location: homePage.php?welcome_message=Welcome '.$username);
            //return;
        //}
    //}

    //header('Location: login.php?error=nema vas');


    /*if ( $registeredUsername === $username && $registeredPassword === $password) {
        $_SESSION["logedIn"] = true;
        header('Location: homePage.php');
    } else {
        header('Location: login.php?error=nema vas');
    }*/

    mysqli_close($dataBaseConn);
 ?>
