<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="../css/сontent.css">
    <link rel="stylesheet" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/homework.css">
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
                            <i class="fa fa-user-o"><a class="sidenav">Профиль</a></i>
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
                </ul>
            </div>
            </div>

        <div class="col-md main">
            <?php

                if(isset($_GET['page']))
                {
                    $page = $_GET['page'];
                    if($page==1) include_once ('home.php');
                    if($page==3) include_once ('homework.php');
                    if($page==4)include_once ('educational.php');
                }


            ?>
        </div>
    </div>
    <div class="footer">

    </div>
</div>
</body>
<script src="../js/main.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="../js/homework.js"></script>
</html>

