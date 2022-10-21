<!DOCTYPE html>
<html>
    <head>
        <link href="homePage.css" rel="stylesheet">
        <title> Home Page </title>
    </head>
    <body>
        <header class="nav-bar">
            <h2> HOME PAGE </h2>
            <a href="login.php">
                <button class="logout-btn"> Logout </button>
            </a>
        </header>

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
