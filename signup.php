<?php



require_once("includes/db.php");

$fname = $_GET['firstName'];
$password = $_GET['pw'];
$lname = $_GET['lastName'];
$email = $_GET['email'];





echo "<br>";





$my_query = "select * from login where email = '$email' ";

$result = mysqli_query($connection, $my_query);

if (mysqli_num_rows($result) > 0) {
    echo "Sorry! This email already exists. Please choose a different email.";
    include "includes/nav.php";
} else {
    // Inserting into a new table   
    $my_query = "INSERT INTO login (firstName,lastName, email, pw) VALUES ('$fname', '$lname', '$email', '$password' )";

    echo "<br>";

    $result = mysqli_query($connection, $my_query);

    if ($result) {
        echo  "<script type='text/javascript'> alert('Account Successfully Created');";
        header('Location:login.php');
    } else {
        echo "<b>ERROR: unable to post </b>";
    }
}
