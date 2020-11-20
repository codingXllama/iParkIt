<?php



require_once('includes/db.php');


$email = $_GET['email'];
$pwd = $_GET['pw'];


echo "<br>";


$my_query = "";


$my_query = "select * from login where email = '$email' and pw = '$pwd'";

$result = mysqli_query($connection, $my_query);

if (mysqli_num_rows($result) > 0) {
    echo "Congrats, you are now logged in";
    header('Location:user.php');    
} else {

    echo "Invalid email / password";
}
