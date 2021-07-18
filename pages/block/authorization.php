<?php
session_start();
if(isset($_POST['enter_login']))
{
    $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $pass;
}
if(isset($_SESSION['login']) && isset($_SESSION['password']))
{
    login($_SESSION['login'],$_SESSION['password']);
}
function login($login,$pass)
{
    require ('pages/block/services.php');
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
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $pass;
            unset($_SESSION['teacher']);
            session_write_close();
        }

        if($pass[0]=='p')
        {
            $_SESSION['teacher']='teacher';
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $pass;
            unset($_SESSION['admin']);//на всяк
            session_write_close();
        }
        $connection->close();
        header('Location: pages/main.php');
    }
    $sql_query = "SELECT * FROM student WHERE login= '$login' AND password= '$pass'";
    $res =  $connection->query($sql_query);

    if(mysqli_num_rows($res) == 1)
    {

        $_SESSION['login'] = $login;
        $_SESSION['password'] = $pass;
        unset($_SESSION['teacher'],$_SESSION['admin']);
        $connection->close();
        session_write_close();
        header('Location: pages/main.php');
    }
    unset($_SESSION['login'],$_SESSION['password']);
    $connection->close();
}
