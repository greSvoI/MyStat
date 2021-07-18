<?php
unset($_SESSION['admin'],$_SESSION['login'],$_SESSION['password'],$_SESSION['teacher']);
header('Location: ../index.php');
