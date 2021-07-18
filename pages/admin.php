<?php
if(isset($_POST['addStudent']) || isset($_POST['addTeacher']))
{

    if(!empty($_POST['fl_name'])&&!empty($_POST['login'])&&!empty($_POST['password']))
    {
      echo  $name = htmlentities($_POST['fl_name']);
      echo  $login = htmlentities($_POST['login']);
      echo  $pass = htmlentities($_POST['password']);
      echo  $select = htmlentities($_POST['select']);
      if(!empty($_POST['select']))
          $user->AddStudent($name,$login,$pass,$select);
      if(empty($_POST['select']))
          $user->AddTeacher($name,$login,$pass);
    }
}
if(isset($_POST['addGroup']))
{
     $user->AddGroup($_POST['name']);
}
if(isset($_POST['addLanguage']))
{
    $path ='../img/titleDZ/'.$_FILES["file"]['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], '../img/titleDZ/'.$_FILES["file"]['name']);
    $user->AddLanguage($_POST['name'],$path);
}
?>
<div class="container-fluid">
    <div class="row">
            <div class="dropdown">
                <button onclick="Addition()" class="dropbtn">Добавить</button>
                <div id="addition"  class="dropdown-content">
                    <a data-value="addStudent" class="addition" >Студент</a>
                    <a data-value="addTeacher" class="addition">Преподователь</a>
                    <a data-value="addGroup" class="addition">Группа</a>
                    <a data-value="addLanguage" class="addition">Предмет</a>
                </div>
            </div>
            <div class="dropdown">
                <button onclick="Addition()" class="dropbtn">Редактировать</button>
                <div id="edit"  class="dropdown-content">
                    <a data-value="editStudent" class="edit" >Студент</a>
                    <a data-value="edit" class="edit">Группа</a>
                    <a data-value="3" class="edit">Преподователь</a>
                </div>
            </div>
            <div class="dropdown">
                <button onclick="Deleting()" class="dropbtn">Удалить</button>
                <div id="del"  class="dropdown-content">
                    <a data-value="1" class="delet" >Студент</a>
                    <a data-value="2" class="delet">Группа</a>
                    <a data-value="3" class="delet">Преподователь</a>
                </div>
            </div>
    </div>

    <form method="post"  action="main.php?page=9"   class="admin-form" id="addStudent">
        <div class="admin-data">
            <label for="">Фио Студента</label>
            <input type="text" name="fl_name" placeholder="ФИО">
            <label for="">Логин Студента</label>
            <input type="text" name="login" placeholder="Логин">
            <label for="">Пароль Студента</label>
            <input type="text" name="password" placeholder="Пароль">
            <label for="">Группа студента</label>
            <br>
            <select name="select" id="">
                <?php
                foreach ($user->group as $item)
                    echo '<option>'.$item['name'].'</option>';
                ?>
            </select>
            <input type="submit" name="addStudent" value="Добавить">
        </div>
    </form>
    <form action="main.php?page=9" method="post" class="admin-form" id="addTeacher">
        <div class="admin-data">
            <label for="">Фио Преподователя</label>
            <input type="text" name="fl_name" placeholder="ФИО">
            <label for="">Логин </label>
            <input type="text" name="login" placeholder="Логин">
            <label for="">Пароль </label>
            <input type="text" name="password" placeholder="Пароль">
            <input type="submit" name="addTeacher" value="Добавить">
            <br>
        </div>
    </form>
    <form action="main.php?page=9" method="post" class="admin-form" id="addGroup">
        <div class="admin-data">
            <label for="">Название группы</label>
            <input type="text" name="name" placeholder="Имя">
            <input type="submit" name="addGroup" value="Добавить">
        </div>
    </form>

    <form action="main.php?page=9" method="post" class="admin-form" id="addLanguage"  enctype="multipart/form-data">
        <div class="admin-data">
            <label for="">Название предмета</label>
            <input type="text" name="name" placeholder="Имя">
            <input type="file" name="file">
            <input type="submit" name="addLanguage" value="Добавить">
        </div>
    </form>

</div>

