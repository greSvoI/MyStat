<div class="container-fluid">
    <div class="row">
            <?php
            if(isset($_SESSION['teacher']) || isset($_SESSION['admin']))
                include_once 'block/uploader.php';
            ?>
        <div>
            <?php
            if($user instanceof Administration || $user instanceof Teacher)
            {
                $user->ShowEducational($user);
            }
            else  $user->ShowEducational($user);
            ?>
      </div>
    </div>
</div>
