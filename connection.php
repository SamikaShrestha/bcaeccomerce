<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "bcaecomerce";

$conn = mysqli_connect($host, $user,$password,$db);
if(!$conn){
    die("DataBase not conneteced");
}else{
    echo "Database connected successfullt!";
}

?>