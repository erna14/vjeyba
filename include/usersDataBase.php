<?php
    $dataBaseConn = mysqli_connect("localhost", "Erna", "password1*", "users_db");

    if (!$dataBaseConn) {
        echo mysqli_connect_error();
    }

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "INSERT INTO tbl_users VALUES ('0', '$username','$password')";
    $result = mysqli_query($dataBaseConn, $sql);

    if ( $result ){
        header("Location: homePage.php");
    } else {
        echo "NEE";
    }

    mysqli_close($dataBaseConn);

