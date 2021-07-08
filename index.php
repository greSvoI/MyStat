<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/icons/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/util.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/other.css">
    <link rel="stylesheet" href="css/сontent.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <title>MyStat</title>
</head>
<body>
<div class="myContainer">
    <div class="wrap-login100">
        <form action="" method="post" class="login100-form">
            <div class="wrap-login100">

                <div class="login-logo">
                    <img src="../MyStat/img/logo.png">
                </div>

                <div>
                    <label  for="text" class="myLabel">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input class="myInput" type="text" name="login" placeholder="Login">
                    </label>
                </div>


                <div>
                    <label for="password" class="myLabel">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input class="myInput" type="password" name="password" placeholder="Password">
                    </label>
                </div>


                <div >
                    <button type="submit" class="myBtn" name="enter_login">
                        Enter
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>
<?php
header('Refresh:10');
require 'pages/services.php';
global $teachers;
if(isset($_POST['enter_login']))
{
    $email = $_POST['login'];
    $pass = $_POST['password'];

    $connection = new mysqli($serverName, $userName, $userPass, $database);
    if($connection->connect_error){
        die("<p>Connection to database failed</p>".$connection->connect_error);
    }

    header('Location: ../MyStat/pages/main.php');
    $sql_query = "SELECT * FROM personal;";
    $res = $connection->query($sql_query);
    if($res->num_rows > 0 ){
        while ($row = $res->fetch_assoc()) {
            $email_db = $row['login'];
            $pass_db = $row['password'];
            if (strcasecmp($email, $email_db) == 0 || strcasecmp($pass, $pass_db) == 0) {
                {
                    if($pass[0]=='p')
                        $teachers = true;
                    header('Location: main.php');

                }

            }
        }
    }
}

?>
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/homework.js"></script>
</html>
