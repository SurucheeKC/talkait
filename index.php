<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="index.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="login">
            <div class="logo">
                <span id="talkait">TalkaIT</span>
                <span id="tai">Talk about it</span>
            </div>

            <form class="login-container" method="post" action="login.php">
                <label>Username </label>
                <input type="text" id="login-email"  name="login-email">
                <label>Password </label>
                <input type="password" id="login-password" name="login-password">
                <input type="submit"id="loginbtn" name="loginbtn" value="Log IN">
                <hr>
                <span id="createAcc">New? Sign up <a id="here" onclick="signup()">here</a></span>
            </form>
        </div>
        <div id="signup-container-modal" style="display: none;">
            <div class="signup-container">
                <form method="post" action="login.php">
                    <button id="signup-closebtn" onclick="sBtnClose()" type="button">x</button>
                    <label>Email :</label>
                    <input type="email" name="signup-email" id="signup-email" placeholder="Enter Email">
                    <label>Username :</label>
                    <input type="text" name="signup-username" id="signup-username" placeholder="Enter Username">
                    <label>Enter Password :</label>
                    <input type="password" name="signup-password" id="signup-password" placeholder="Enter Password">
                    <label>Confirm Password :</label>
                    <input name="confirm-password" type="password" id="signup-password" placeholder="Enter Password">
                    <button id="signupbtn" name="signupbtn">Sign Up</button>

                </form>
            </div>
        </div>
    </div>
    <script src="index.js">
    </script>
</body>

</html>