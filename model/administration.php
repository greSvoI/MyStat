<?php

class Administration extends baseClass
{


    public function ShowHomework($user)
    {
        $pos = false;
        if($user instanceof Student){
            $pos=true;
        }
        for($i=0;$i<count($this->homework);$i++)
        {
            if($pos)
            {
                if($user->id_group==$this->homework[$i]['id_group'])
                    $this->homework($i);
            }
            else $this->homework($i);

        }
    }
    private function homework($i)
    {
        ?>
        <div class="homework">
            <div>
                <img style="width: 190px; height: 190px" src="<?php echo $this->homework[$i]['path_icon'] ?>" alt="">
            </div>
            <div style="color: black">

            </div>
            <div class="homework-bottom">
                <a download="" href="<?php echo  $this->homework[$i]['path_file']?>"> <?php echo $this->homework[$i]['task'] ?></a>
            </div>

        </div>
        <?php
    }
    public function ShowEducational()
    {
        for($i=0;$i<count($this->educational);$i++)
        {
            ?>
            <div class="homework">
                <div>
                    <img style="width: 190px; height: 190px" src="<?php echo $this->educational[$i]['path_logo']?>" alt="">
                </div>
                <div style="color: black">
                    <?php /*echo $this->educational[$i]['name_materials']*/?>
                </div>
                <div class="homework-bottom">
                    <a download="<?php /*echo  $this->educational[$i]['path_file']*/?>" href="<?php echo  $this->educational[$i]['path_file']?>"><?php echo $this->educational[$i]['name_materials'] ?></a>
                </div>
            </div>
            <?php
        }
    }
    public function AddStudent($name,$login,$pass,$select)
    {

        //$this->Connect();
        $this->connection = new mysqli('localhost', 'root', '', 'mystat_db');
        if ($this->connection->connect_error) {
            die("<p>Connection to database failed</p>" . $this->connection->connect_error);
        }

        $sql_query = "SELECT id FROM groups WHERE groups.name = '$select'";
        $id=null;
        $res = $this->connection->query($sql_query);
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $id = $row['id'] . '<br>';
            }

            $sql_query = "INSERT INTO student (fl_name,id_group,login,password) VALUES ('$name','$id','$login','$pass')";

            if ($this->connection->query($sql_query) === TRUE)
            {
                $this->connection->close();
                header('Location: main.php?page=9');
            }
            else
                echo $this->connection->error;
                 $this->connection->close();


        }
    }
    public function AddTeacher($name,$login,$pass)
    {
        $this->Connect();
        if ($this->connection->connect_error) {
            die("<p>Connection to database failed</p>" . $this->connection->connect_error);
        }
        $sql_query = "INSERT INTO employee (fl_name,login,password) VALUES ('$name','$login','$pass')";
        if ($this->connection->query($sql_query) === TRUE)
        {
            $this->connection->close();
            header('Location: main.php?page=9');
        }
        else
            echo $this->connection->error;
        $this->connection->close();
    }
    public function AddHomeWork()
    {

    }
    public function AddEducational()
    {

    }
    public function AddGroup($name)
    {
        $this->Connect();
        if ($this->connection->connect_error) {
            die("<p>Connection to database failed</p>" . $this->connection->connect_error);
        }
        $sql_query = "INSERT INTO groups (name) VALUES('$name')";
        if ($this->connection->query($sql_query) === TRUE)
        {
            $this->connection->close();
            header('Location: main.php?page=9');
        }
        else
            echo $this->connection->error;
        $this->connection->close();
    }
    public function AddLanguage($name,$path)
    {
        $this->Connect();
        if ($this->connection->connect_error) {
            die("<p>Connection to database failed</p>" . $this->connection->connect_error);
        }
        $sql_query = "INSERT INTO picture_task (name,path) VALUES('$name','$path')";
        if ($this->connection->query($sql_query) === TRUE)
        {
            $this->connection->close();
            header('Location: main.php?page=9');
        }
        else
            echo $this->connection->error;
        $this->connection->close();
    }

}

