<?php



require_once('dbconnect.php');

$fname = $_GET['fname'];
$lname = $_GET['lname'];
$email = $_GET['email'];
$pwd = $_GET['pwd'];


echo "<br>";


$my_query = "";


$my_query = "select * from Users where email = '$email' "; 

$result = mysqli_query($connection, $my_query);

if(mysqli_num_rows($result) > 0)
{
    echo "Sorry! This email already exists. Please choose a different email.";
    
}

else
    
{
    
    $my_query = "INSERT INTO Users (fname, lname, email, pwd) VALUES ('$fname', '$lname', '$email', '$pwd' )";
    
    echo "<br>";
    
    $result = mysqli_query($connection, $my_query);
    
    if($result)
    {
        echo  "Item Successfully Added!";
        
    }
    
    else
    {
        echo "<b>ERROR: unable to post </b>";
        
    }
    
    
}

mysqli_close();

?>