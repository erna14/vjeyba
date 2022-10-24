<?php
    session_start();
    if(isset($_SESSION["logedIn"]) && $_SESSION["logedIn"] === true) {
        header('Location: homePage.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="login.css" rel="stylesheet">
        <title> Login </title>
    </head>
    <body>
        <?php
            if(isset($_GET["error"])){
                echo $_GET["error"];
            }
        ?>
        <div class="container">
            <div class="login-form">
                <div class="login-title-box">
                    <span>Login Form</span>
                </div>
                <form method="post" action="process.php">
                    <div class="login-input">
                        <label> Username </label>
                        <input
                            name="username"
                            type="text"
                            placeholder="Enter your username"
                            required
                        />
                    </div>
                    <div class="login-input">
                        <label> Password </label>
                        <input
                            name="password"
                            type="password"
                            placeholder="Enter your password"
                        />
                        <p style="color: gray; font-size: 12px; padding-top: 5px;" class="password-rqt-txt">
                            Must be 8 or more characters long, contain at least 1 number and 1 special character!
                        </p>
                    </div>
                    <div style="margin-top: 80px;" class="login-btn">
                        <button type="submit"> Login </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

