<form action="" method="post">
        <div>
            <div>
                <label class="labelAdmin">For :</label>
                <select class="selectStaff" name="select" id="">
                    <option value="">Студент</option>
                    <option value="">Преподователь</option>
                </select>
            </div>

           <div class="">
               <label for="login" class="labelAdmin">Login :</label>
               <input class="inputAdmin" type="text" name="login">
           </div>

            <div class="">
                <label for="password" class="labelAdmin">Password :</label>
                <input class="inputAdmin" type="text" name="password">
            </div>

            <div class="">
                <label for="f_name" class="labelAdmin">First name :</label>
                <input class="inputAdmin" type="text" name="f_name">
            </div>
            <div>
                <label class="labelAdmin" for="">Group :</label>
                <select class="selectStaff" name="selectGroup" id="">
                    <?php
                     $admin->ShowGroup();
                    ?>
                </select>

               <p>
                   <input list="datalistA" id="inputA">
                   <datalist class="selectStaff" name="selectGroup" id="datalistA">
                       <?php
                       $admin->ShowStudent();
                       ?>
                   </datalist>
               </p>
            </div>
            <div style="text-align: center">
                <button class="btnAdmin">Add database</button>
            </div>
        </div>
    </form>
