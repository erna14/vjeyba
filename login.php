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
                    </div>
                    <div style="margin-top: 40px;" class="login-btn">
                        <button type="submit"> Login </button>
                    </div>
                    <div class="signup-option">
                        <span>
                            Not a member? <a href="signUp.php"> Sign Up </a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

