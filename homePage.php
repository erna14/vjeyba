<?php
    session_start();
    if(!(isset($_SESSION["logedIn"]) && $_SESSION["logedIn"] === true)) {
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/homePage.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/bb131bd96f.js" crossorigin="anonymous"></script>
        <title> Home Page </title>
    </head>
    <body>
        <header class="nav-bar">
            <h2> HOME PAGE </h2>
            <a href="process.php">
                <button name="path" value="logout" class="logout-btn"> Logout </button>
            </a>
        </header>

        <main>
            <div class="container">
                <div class="left-container">
                    <div class="welcome-msg">
                        <?php
                            if(isset($_GET["welcome_message"])){
                                echo $_GET["welcome_message"];
                            }
                        ?>
                    </div>
                    <div class="sidebar">
                        <a class="sidebar-link active">
                            <span><i class="fa-solid fa-house"></i></span> <h3>Home</h3>
                        </a>
                        <a class="sidebar-link">
                            <span><i class="fa-solid fa-bell"></i></span> <h3>Notifications</h3>
                            <!--<div class="notifications">
                                <div class="notification">
                                    <b> Sara Puškar</b>liked your post.
                                    <small class="date"> 46 MINUTES AGO </small>
                                </div>
                                <div class="notification">
                                    <b> Kenan Selimović</b>sent a friend request.
                                    <small class="date"> 1 HOUR AGO </small>
                                </div>
                                <div class="notification">
                                    <b> Anela Coković </b>commented on your post.
                                    <small class="date"> 2 HOURS AGO </small>
                                </div>
                                <div class="notification">
                                    <b> Nikola Sokolović </b>sent a friend request.
                                    <small class="date"> 4 HOUR AGO </small>
                                </div>
                            </div>-->
                        </a>
                        <a class="sidebar-link"> <span><i class="fa-solid fa-envelope"></i></span> <h3>Messages</h3>  </a>
                        <a class="sidebar-link"> <span><i class="fa-solid fa-gear"></i></span> <h3>Settings</h3> </a>
                    </div>
                </div>

                <div class="middle-container">
                    <form class="create-post">
                        <input type="text" placeholder="What's on your mind?">
                        <button class="post-btn"> Post </button>
                    </form>

                    <div class="posts">
                        <div class="post">

                            <div class="post-header">
                                <div class="post-username-time">
                                    <h3>@Erna</h3>
                                    <small>15 MINUTES AGO</small>
                                </div>
                            </div>

                            <div class="post-details">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                    ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                    in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>

                            <div class="post-btns">
                                <span><i class="fa-regular fa-thumbs-up"></i></span>
                                <span><i class="fa-regular fa-comment"></i></span>
                                <span><i class="fa-solid fa-share-nodes"></i></span>
                            </div>

                            <div class="liked-by-info">
                                <p>Liked by <b>Kenan Selimović</b> and <b>2,333,222 others</b></p>
                            </div>

                            <div class="view-comments">
                                View all 20 comments
                            </div>
                        </div>

                        <div class="post">

                            <div class="post-header">
                                <div class="post-username-time">
                                    <h3>@Erna</h3>
                                    <small>15 MINUTES AGO</small>
                                </div>
                            </div>

                            <div class="post-details">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                    ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                    in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>

                            <div class="post-btns">
                                <span><i class="fa-regular fa-thumbs-up"></i></span>
                                <span><i class="fa-regular fa-comment"></i></span>
                                <span><i class="fa-solid fa-share-nodes"></i></span>
                            </div>

                            <div class="liked-by-info">
                                <p>Liked by <b>Kenan Selimović</b> and <b>2,333,222 others</b></p>
                            </div>

                            <div class="view-comments">
                                View all 20 comments
                            </div>
                        </div>

                        <div class="post">

                            <div class="post-header">
                                <div class="post-username-time">
                                    <h3>@Erna</h3>
                                    <small>15 MINUTES AGO</small>
                                </div>
                            </div>

                            <div class="post-details">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                    ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                    in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>

                            <div class="post-btns">
                                <span><i class="fa-regular fa-thumbs-up"></i></span>
                                <span><i class="fa-regular fa-comment"></i></span>
                                <span><i class="fa-solid fa-share-nodes"></i></span>
                            </div>

                            <div class="liked-by-info">
                                <p>Liked by <b>Kenan Selimović</b> and <b>2,333,222 others</b></p>
                            </div>

                            <div class="view-comments">
                                View all 20 comments
                            </div>
                        </div>

                    </div>
                </div>
                <div class="right-container">

                </div>
            </div>
        </main>

        <!--<div class="posts">
            <?php
/*            $userPosts = [
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
            */?>
        </div>-->

    </body>
</html>
