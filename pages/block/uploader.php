<?php
?>
<div class="homework-nav">
    Выбор группы
    <select name="selectGroup" id="selectHomeWork" class="selectHomeWork">
        <?php

        ?>
    </select>

    <button onclick="homeworkUp()" id="btnUpload" class="btnHomeWork">Upload Home work</button>

    <div class="homeworkUpload" id="divUpload">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div>
                <label class="labelUpload">
                    <input type="text" class="inputUpload" name="number_dz" placeholder="HomeWork №">
                </label>
            </div>

            <div>
                <select name="language" class="selectHomeWork">
                    <option >Angular</option>
                    <option >PHP</option>
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
