<?php
require 'pages/block/authorization.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/icons/favicon.ico">
    <link rel="stylesheet" href="css/allmain.css">
    <link rel="stylesheet" href="css/login.css">
    <title>MyStat</title>
</head>
<body>
<div class="login-container">

        <form action="" method="post" class="login-form">
            <div class="login-div">

                <div class="login-logo">
                    <img src="../MyStat/img/logo.png">
                </div>

                <div>
                    <label  for="text" class="login-label">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input class="login-input" type="text" name="login" placeholder="Login">
                    </label>
                </div>


                <div>
                    <label for="password" class="login-label">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input class="login-input" type="password" name="password" placeholder="Password">
                    </label>
                </div>


                <div >
                    <button type="submit" class="login-btn" name="enter_login">
                        Enter
                    </button>
                </div>

            </div>
        </form>
</div>
</body>
</html>
