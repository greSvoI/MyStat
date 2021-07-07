<form action="" method="post">
   <div class="myContainer">
          <div class="login-logo">
              <img src="../MyStat/img/logo.png">
          </div>
       <div class="wrap-input100">
           <input class="input100" type="text" name="login" placeholder="Login">
           <span class="focus-input100"></span>
           <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
       </div>
       <!--data-validate = "Password is required"-->
       <div class="wrap-input100" data-validate = "Password is required">
           <input class="input100" type="password" name="password" placeholder="Password">
           <span class="focus-input100"></span>
           <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
       </div>

       <div class="container-login100-form-btn">
           <button type="submit" class="login100-form-btn" name="enter_login">
               Enter
           </button>
       </div>
   </div>
</form>
<?php
require 'services.php';

if(isset($_POST['enter_login']))
{
    $email = $_POST['login'];
    $pass = $_POST['password'];

    $connection = new mysqli($serverName, $userName, $userPass, $database);
    if($connection->connect_error){
        die("<p>Connection to database failed</p>".$connection->connect_error);
    }

    header('Location: ../MyStat/pages/main.php');
    $sql_query = "SELECT * FROM personal;";
    $res = $connection->query($sql_query);
    if($res->num_rows > 0 ){
        while ($row = $res->fetch_assoc()) {
            $email_db = $row['login'];
            $pass_db = $row['password'];
            if (strcasecmp($email, $email_db) == 0 || strcasecmp($pass, $pass_db) == 0) {
                {
                    header('Location: main.php');
                }

            }
        }
    }
}

?>