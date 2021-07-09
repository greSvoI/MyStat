<?php
    session_start();
if(isset($_POST['enter_login']))
{
    $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $pass;
    //login($login,$pass);
}
if(isset($_SESSION['login']) && isset($_SESSION['password']))
{
    login($_SESSION['login'],$_SESSION['password']);
}
function login($login,$pass)
{
    require 'pages/block/services.php';
    if(empty($login)||empty($pass)) return;

    $connection = new mysqli($serverName, $userName, $userPass, $database);

    if($connection->connect_error){
        die("<p>Connection to database failed</p>".$connection->connect_error);
    }
    $sql_query = "SELECT * FROM employee WHERE login= '$login' AND password= '$pass'";
    $res =  $connection->query($sql_query);

    if(mysqli_num_rows($res) == 1)
    {
        if($pass[0]=='a')
        {
            $_SESSION['admin']='admin';
        }

        if($pass[0]=='p')
        {
            $_SESSION['teacher']='teacher';
            unset($_SESSION['admin']);//на всяк
        }
        header('Location: pages/main.php');
    }
    $sql_query = "SELECT * FROM student WHERE login= '$login' AND password= '$pass'";
    $res =  $connection->query($sql_query);

    if(mysqli_num_rows($res) == 1)
    {
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = $_POST['password'];
        unset($_SESSION['teacher'],$_SESSION['admin']);
        header('Location: pages/main.php');
    }
   unset($_SESSION['login'],$_SESSION['password']);

}

?>
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
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/homework.js"></script>
</html>
