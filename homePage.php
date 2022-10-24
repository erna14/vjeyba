<?php
    session_start();
    if(!(isset($_SESSION["logedIn"]) && $_SESSION["logedIn"] === true)) {
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="homePage.css" rel="stylesheet">
        <title> Home Page </title>
    </head>
    <body>
        <header class="nav-bar">
            <h2> HOME PAGE </h2>
            <a href="logOutProcess.php">
                <button class="logout-btn"> Logout </button>
            </a>
        </header>

        <?php
        if(isset($_GET["welcome_message"])){
            echo $_GET["welcome_message"];
        }
        ?>

        <div class="posts">
            <?php
            $userPosts = [
                'Post 1',
                'Post 2',
                'Post 3'
            ];

            $outPut = '<b>Posts:</b> <br>';
            $outPut .= '<ul>';

            foreach ($userPosts as $userPost) {
                $outPut .= '<li>'. $userPost . '</li>';
            };

            $outPut .='</ul>';

            echo $outPut;
            ?>
        </div>

    </body>
</html>
