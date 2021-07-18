<?php
?>
<div class="homework-nav">

    <button onclick="homeworkUp()" id="btnUpload" class="btnHomeWork">Upload Home work</button>

    <div class="homeworkUpload" id="divUpload">
        <form action="../pages/block/upload.php" method="post" enctype="multipart/form-data">
            Выбор группы
            <br>
            <?php
            if($page !=4)
            {?>
            <select name="selectGroup" id="selectHomeWork" class="selectHomeWork">
                <?php
                for($i=0;$i<count($user->group);$i++)
                {
                    echo '<option>'.$user->group[$i]['name'].'</option>';
                }
                }?>
            </select>


            <div>
                <select name="language" class="selectHomeWork">
                    <?php
                    for($i=0;$i<count($user->picture);$i++)
                    {
                        echo '<option>'.$user->picture[$i]['name'].'</option>';
                    }
                    ?>
                </select>
            </div>

            <div>
                <label class="labelUpload">
                    <input type="text" class="inputUpload" name="task" placeholder="Task topic">
                </label>
            </div>

            <div>
                <input type="file" name="file">
                <button type="submit" value="Upload" class="btnHomeWork" name="btnUpload">Upload</button>
            </div>
        </form>
    </div>
</div>
