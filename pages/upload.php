<?php
if(isset($_POST['btnUpload']))
{

    $number = (int)trim($_POST['number_dz']);
    $language = $_POST['language'];
    $task = '\''.htmlentities($_POST['task'].'\'');
    $file = $_FILES['file'];
    move_uploaded_file($file['tmp_name'],'../uploads/'.strtolower($language).'/'.$file['name']);

    $path_file =  '\'../uploads/'.strtolower($language).'/'.$file['name'].'\'';

    require 'services.php';
    $connection = new mysqli($serverName, $userName, $userPass, $database);
    if($connection->connect_error){
        die("<p>Connection to database failed</p>".$connection->connect_error);
    }

    $sql_query = "SELECT * FROM picture_task WHERE picture_task.name = '$language';";
    $res = $connection->query($sql_query);
    if($res->num_rows > 0 )
    {
        $row = $res->fetch_assoc();
        $id_logo = $row['id'];
    }
     $sql_query = "INSERT INTO homework_task (id_picture,number,path_file,task) VALUES ($id_logo,$number,$path_file,$task);";

    if($connection->query($sql_query) === TRUE)
    {
        header('Location: main.php?page=3');
    }
    else echo "<p>".$connection->error."</p>";

}
