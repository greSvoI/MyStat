<?php
?>
<div class="container-fluid">
    <div class="row">
        <?php

        require 'services.php';
        $connection = new mysqli($serverName, $userName, $userPass, $database);
        if($connection->connect_error){
            die("<p>Connection to database failed</p>".$connection->connect_error);
        }

        $sql_query = "SELECT * FROM `educational_materials`,`picture_task`WHERE picture_task.id = educational_materials.id_logo;";
        $res = $connection->query($sql_query);
        if($res->num_rows > 0 )
        {
            while ($row = $res->fetch_assoc())
            {
                ?>
                <div class="homework">
                    <div>
                        <img style="width: 190px; height: 190px" src="<?php echo $row['path']?>" alt="">
                    </div>
                    <div style="color: black">
                        <?php echo $row['name']?>
                    </div>
                    <div class="homework-bottom">
                        <a download="<?php echo  $row['path_file']?>" href="<?php echo  $row['path_file']?>"><?php echo $row['name_materials'] ?></a>
                    </div>

                </div>
                <?php

            }

        }

        ?>
    </div>
</div>
