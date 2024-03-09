<?php  
// Script to connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "chatroom";
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    die("Failed to connect".mysqli_connect_error($conn));
}
?>


