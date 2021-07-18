<?php

$user = new baseClass();
if (isset($_POST['group'])) {
    $name = $_POST['group'];
    foreach ($user->group as $item)
    {
        echo $item['name'];
    }

}