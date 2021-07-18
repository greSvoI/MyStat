<?php

abstract class baseClass
{
    public $connection;
    public  $student = array();
    public $employee = array();
    public $educational=array();
    public $homework=array();
    public $teacher_gr=array();
    public $group = array();
    private $data=array();
    public $picture=array();

    /*abstract function AddTeacher($name,$login,$pass);
    abstract function AddStudent($name,$login,$pass,$select);
    abstract function AddHomework();*/

    public function __set($name, $value)
    {
        $this->data[$name]=$value;
    }
    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __construct()
    {
        $this->Connect();
        $this->loadDataBase();
    }

    public function Connect(){

        $this->connection = new mysqli('localhost', 'root', '', 'mystat_db');

    }
    public function getUser($user)
    {

        if($this->connection->connect_error){
            die("<p>Connection to database failed</p>".$this->connection->connect_error);
        }
        $sql_query = "SELECT * FROM student WHERE login= '$user->login' AND password= '$user->password'";

        $res =  $this->connection->query($sql_query);

        if(mysqli_num_rows($res) == 1)
        {
            $row = $res->fetch_assoc();
            $user->id=$row['id'];
            $user->fl_name=$row['fl_name'];
            $user->id_group=$row['id_group'];
        }
        $sql_query = "SELECT * FROM employee WHERE login= '$user->login' AND password= '$user->password'";
        $res =  $this->connection->query($sql_query);
        if(mysqli_num_rows($res)==1)
        {
            $row = $res->fetch_assoc();
            $user->id=$row['id'];
            $user->fl_name=$row['fl_name'];
        }

        $this->connection->close();
    }
    public function loadDataBase()
    {
        if($this->connection->connect_error){
            die("<p>Connection to database failed</p>".$this->connection->connect_error);
        }
        $sql_query = "SELECT * FROM `student`,`groups` WHERE student.id_group = groups.id;";
        $res =  $this->connection->query($sql_query);
        $i=0;
        if($res->num_rows>0)
            while ($row = $res->fetch_assoc())
            {
                $this->student[$i]['id']=$row['id'];
                $this->student[$i]['login']=$row['login'];
                $this->student[$i]['password']=$row['password'];
                $this->student[$i]['fl_name']=$row['fl_name'];
                $this->student[$i]['group']=$row['name'];
                $i++;
            }
        $sql_query = "SELECT * FROM `employee`;";
        $res =  $this->connection->query($sql_query);
        $i=0;
        if($res->num_rows>0)
            while ($row = $res->fetch_assoc())
            {
                $this->employee[$i]['id']=$row['id'];
                $this->employee[$i]['login']=$row['login'];
                $this->employee[$i]['password']=$row['password'];
                $this->employee[$i]['fl_name']=$row['fl_name'];
                $i++;
            }
        $sql_query = "SELECT * FROM `educational_materials`,`picture_task` WHERE educational_materials.id_logo = picture_task.id;";
        $res =  $this->connection->query($sql_query);
        $i=0;
        if($res->num_rows>0)
            while ($row = $res->fetch_assoc())
            {
                $this->educational[$i]['id']=$row['id'];
                $this->educational[$i]['id_logo']=$row['id_logo'];
                $this->educational[$i]['name_materials']=$row['name_materials'];
                $this->educational[$i]['name']=$row['name'];
                $this->educational[$i]['path_logo']=$row['path'];
                $this->educational[$i]['path_file']=$row['path_file'];
                $i++;
            }

        $sql_query = "SELECT * FROM `homework_task`,`picture_task` WHERE homework_task.id_picture = picture_task.id;";
        $res =  $this->connection->query($sql_query);
        $i=0;
        if($res->num_rows>0)
            while ($row = $res->fetch_assoc())
            {
                $this->homework[$i]['number_dz']=$row['number'];
                $this->homework[$i]['task']=$row['task'];
                $this->homework[$i]['path_icon']=$row['path'];
                $this->homework[$i]['path_file']=$row['path_file'];
                $this->homework[$i]['id_group']=$row['id_group'];
                $i++;
            }

        $sql_query = "SELECT * FROM `groups`;";
        $res =  $this->connection->query($sql_query);
        $i=0;
        if($res->num_rows>0)
            while ($row = $res->fetch_assoc())
            {
                $this->group[$i]['id']=$row['id'];
                $this->group[$i]['name']=$row['name'];
                $i++;
            }

        $sql_query = "SELECT * FROM `employee`,teachers_group,groups WHERE employee.id = teachers_group.id_teachers AND teachers_group.id_group = groups.id;";
        $res =  $this->connection->query($sql_query);
        $i=0;
        if($res->num_rows>0)
            while ($row = $res->fetch_assoc())
            {
                $this->teacher_gr[$i]['id_teacher']=$row['id'];
                $this->teacher_gr[$i]['fl_name']=$row['fl_name'];
                $this->teacher_gr[$i]['id_group']=$row['id_group'];
                $this->teacher_gr[$i]['name']=$row['name'];
                $i++;
            }

        $sql_query ="SELECT * FROM picture_task";
        $res =  $this->connection->query($sql_query);
        $i=0;
        if($res->num_rows>0)
            while ($row = $res->fetch_assoc())
            {
                $this->picture[$i]['id']=$row['id'];
                $this->picture[$i]['name']=$row['name'];
                $this->picture[$i]['path']=$row['path'];
                $i++;
            }
    }

}
