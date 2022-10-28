
<!DOCTYPE html>
<html>
    <head>
        <link href="css/signUp.css" rel="stylesheet">
        <title> Sign Up </title>
    </head>
    <body>

        <div class="container">
            <div class="signup-form">
                <div class="signup-title-box">
                    <span> Sign Up Form</span>
                </div>
                <form action="process.php" method="post">
                    <input type="hidden" name="path" value="signup">
                    <div class="signup-input">
                        <label> Username </label>
                        <input
                            name="username"
                            type="text"
                            placeholder="Enter your username"
                            required
                        />
                    </div>
                    <div class="signup-input">
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
                    <div style="margin-top: 80px;" class="signup-btn">
                        <button type="submit"> Sign Up </button>
                    </div>
                    <div class="login-option">
                        <span>
                            I'm already a member! <a href="login.php"> Login In </a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>