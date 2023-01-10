<?php


//script to connect the database
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "" ;
$database = "mit";
// Create a Connection object 
$conn = mysqli_connect($servername, $username, $password, $database);

// die if connection is failed
// if (!$conn){
//     die("Sorry we failed to connect: " . mysqli_connect_error());
// }
// else{
//     echo "Connection was successful!";
// }

?>