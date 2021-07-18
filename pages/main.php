<?php
session_start();

include '../model/baseClass.php';
include '../model/administration.php';
include '../model/student.php';
include '../model/teacher.php';


$user=null;
if(isset($_POST['test']))
{
    header('Location : main.php');
}
if(isset($_SESSION['admin']))
{
    $user = new Administration();
    $user->login=$_SESSION['login'];
    $user->password=$_SESSION['password'];
    $user->getUser($user);

}
elseif (isset($_SESSION['teacher']))
{
    $user = new Teacher();
    $user->login=$_SESSION['login'];
    $user->password=$_SESSION['password'];
    $user->getUser($user);
}
else {

    $user=new Student();
    $user->login=$_SESSION['login'];
    $user->password=$_SESSION['password'];
    $user->getUser($user);
}
$page=1;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="../css/allmain.css">
    <link rel="stylesheet" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
   <link rel="stylesheet" href="../css/homework.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/profile.css">

</head>
<body>
<div class="container-fluid">
    <div class="row" >
        <div class="col-md-1 sidebar"  id="sidebar">
            <div>
                <ul class="sidebar-nav">
                    <li>
                        <div class="sidebar-content">
                            <i class="fa fa-bar-chart"><a href="main.php?page=1" class="sidenav">Главная</a></i>
                        </div>
                    </li>
                    <li>
                        <div class="sidebar-content">
                            <i class="fa fa-eye"><a class="sidenav">Успеваемость</a></i>
                        </div>
                    </li>
                    <li role="presentation">
                        <div class="sidebar-content">
                            <i class="fa fa-file-code-o"><a href="main.php?page=3" class="sidenav">Домашнее задание</a></i>
                        </div>
                    </li>
                    <li>
                        <div class="sidebar-content">
                            <i class="fa fa-book"><a href="main.php?page=4" class="sidenav">Учебные материалы</a></i>
                        </div>
                    </li>
                    <li>
                        <div class="sidebar-content">
                            <i class="fa fa-envelope-open-o"><a class="sidenav">Новости</a></i>
                        </div>
                    </li>
                    <li>
                        <div class="sidebar-content">
                            <i class="fa fa-user-o"><a href="main.php?page=6" class="sidenav">Профиль</a></i>
                        </div>
                    </li>
                    <li>
                        <div class="sidebar-content">
                            <i class="fa fa-comments"><a class="sidenav">Вакансии</a></i>
                        </div>
                    </li>
                    <li>
                        <div class="sidebar-content">
                            <i class="fa fa-address-book"><a class="sidenav">Контакты</a></i>
                        </div>
                    </li>
                    <li>
                        <div class="sidebar-content">
                            <i class="fa fa-credit-card"><a class="sidenav">Оплата Обучения</a></i>
                        </div>
                    </li>
                    <?php

                    if(isset($_SESSION['admin']))
                    {
                    ?>
                    <li>
                        <div class="sidebar-content">
                            <i class="fa fa-edit"><a href="main.php?page=9" class="sidenav">Управление</a></i>
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                    <li>
                        <div class="sidebar-content">
                            <i class="fa fa-eject"><a href="main.php?page=10" class="sidenav">Выйти</a></i>
                        </div>
                    </li>
                </ul>
            </div>
            </div>
        <div class="col-md main">
            <?php
                if(isset($_GET['page']))
                {
                    $page = $_GET['page'];
                    if($page==1) include_once('home.php');
                    if($page==3) include_once ('homework.php');
                    if($page==4)include_once ('educational.php');
                    if($page==6)include_once ('profile.php');
                    if($page==9)include_once ('admin.php');
                    if($page==10)include_once ('block/exit.php');
                }
            ?>
        </div>
    </div>
    <div class="footer">
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="../js/main.js"></script>
<script type="text/javascript" src="../js/ajax.js"></script>
<script src="../js/homework.js"></script>
<script src="../js/admin.js"></script>
</html>

