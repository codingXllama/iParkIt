<?php

include "includes/db.php";


if (isset($_POST['login'])) {

    $user_unsafe = $_POST['username'];
    $pass_unsafe = $_POST['password'];


    $userName = mysqli_real_escape_string($connection, $user_unsafe);
    $userPass = mysqli_real_escape_string($connection, $pass_unsafe);


    $query = mysqli_query($connection, "select * froom login where username='$userName' and password ='$userPass'")
        or die(mysqli_error($connection));
}
