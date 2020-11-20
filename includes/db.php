<!-- to create our connection to phpmyadmin -->

<?php

// creating array that contains our connection information 
$db['db_host'] = "localhost:3307";
$db['db_user'] = "root";
$db['db_pass'] = "root";
$db['db_name'] = "iparkit";


// creating constants for our connection array for better security 
foreach ($db as $key => $value) {

    define(strtoupper($key), $value);
}
// Connecting to the database

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($connection) {
    // echo "Connected to DB!";
} else {
    die("Cannot connect to DB");
}







?>