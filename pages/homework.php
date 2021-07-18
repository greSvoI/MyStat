<?php
    /*header('Refresh:5');*/
?>
<div class="container-fluid" style="overflow: auto">
    <div class="row">
        <?php
        if($user instanceof Administration || $user instanceof Teacher)
            include_once 'block/uploader.php';
        ?>
        <div>
            <?php
            /*$files = scandir('../uploads');
            for ($i = 2; $i <count($files);$i++)
            {
                echo $files[$i];
                */?><!--

                <div class="homework">
                            <div>

                            </div>
                            <div class="homework-bottom">
                                <a download="<?php /*echo  $files[$i]*/?>" href="../uploads/<?php /*echo  $files[$i]*/?>"><?php /*echo  $files[$i]*/?></a>
                            </div>


                </div>-->
            <?php

            /*require 'block/services.php';
            $connection = new mysqli($serverName, $userName, $userPass, $database);
            if($connection->connect_error){
                die("<p>Connection to database failed</p>".$connection->connect_error);
            }

            $sql_query = "SELECT * FROM `homework_task`,`picture_task` WHERE homework_task.id_picture = picture_task.id;";
            $res = $connection->query($sql_query);*/
           /* if($connection->query($sql_query) === TRUE){
                echo "<p>Data added!</p>";
            }
            else{
                echo "<p>".$connection->error."</p>";
            }*/
            if($user instanceof Administration || $user instanceof Teacher)
            {
                $user->ShowHomework($user);
            }
            else  $user->ShowHomework($user);
            /*if($res->num_rows > 0 )
            {
                while ($row = $res->fetch_assoc())
            {
                    */?><!--
                <div class="homework">
                    <div>

                        <img style="width: 190px; height: 190px" src="<?php /*echo $row['path']*/?>" alt="">
                    </div>
                    <div style="color: black">
                        <?php /*echo $row['task']*/?>
                    </div>
                    <div class="homework-bottom">
                        <a download="<?php /*echo  $row['path_file']*/?>" href="<?php /*echo  $row['path_file']*/?>"> Home work № <?php /*echo $row['number'] */?></a>
                    </div>

                </div>-->
<!--            --><?php
/*
            }

            }

            */?>

        </div>
    </div>
</div>
