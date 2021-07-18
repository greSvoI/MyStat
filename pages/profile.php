<?php

?>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="home-photo">
                Ваше фото
            </div>
        </div>
        <div class="container">
            <div class="box">
                <div>
                    <label class="home-label">
                        <?php
                        echo $user->fl_name;
                        ?>
                    </label>
                </div>
                <div>
                    <label class="home-label">Login :
                        <?php
                        echo $user->login;
                        ?>
                    </label>
                </div>
                <div>
                    <label class="home-label">Password :
                        <?php
                        echo $user->password;
                        ?>
                    </label>

                </div>
            </div>
        </div>
        </div>

    </div>
</div>
