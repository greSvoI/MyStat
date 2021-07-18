<?php
if(isset($_POST['btnUpload']))
{

    $language = $_POST['language'];
    $task = $_POST['task'];
    if(empty($task)) {
        header('Location: http://localhost:63342/MyStat/pages/main.php?page=3');
        return;
    }
    //$user->AddHomework();
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


    if(!empty($_POST['selectGroup']))
    {
        $group = $_POST['selectGroup'];
        $path_file ='../uploads/'.strtolower($language).'/'.$_FILES["file"]['name'];

        $sql_query = "SELECT id FROM groups WHERE groups.name = '$group'";
        $res = $connection->query($sql_query);
        if($res->num_rows > 0 )
        {
            $row = $res->fetch_assoc();
            $id_group = $row['id'];
        }

            if (move_uploaded_file($_FILES['file']['tmp_name'], __DIR__.'/../../uploads/'.strtolower($language).'/'.$_FILES["file"]['name'])) {
                echo "Uploaded HomeWork";
            } else {
                echo "File was not uploaded";
            }


        $sql_query = "INSERT INTO homework_task (task,id_picture,path_file,id_group) VALUES ('$task','$id_logo','$path_file','$id_group');";
        if($connection->query($sql_query) === TRUE)
        {

                header('Location: http://localhost:63342/MyStat/pages/main.php?page=3');
        }
        else echo "<p>".$connection->error."</p>";
    }

    if(empty($_POST['selectGroup']))
    {
        if (move_uploaded_file($_FILES['file']['tmp_name'], __DIR__.'/../../uploads/educational/'.$_FILES["file"]['name'])) {
            echo "Uploaded";
        } else {
            echo "File was not uploaded";
        }
        $path_file ='../uploads/educational/'.$_FILES["file"]['name'];
        $sql_query = "INSERT INTO educational_materials (id_logo,name_materials,path_file) VALUES ('$id_logo','$task','$path_file');";
        if($connection->query($sql_query) === TRUE)
        {
            header('Location: http://localhost:63342/MyStat/pages/main.php?page=4');
        }
        else echo "<p>".$connection->error."</p>";
    }

}
