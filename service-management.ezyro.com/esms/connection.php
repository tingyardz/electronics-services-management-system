<?php
session_start();
$serverName = 'localhost';
$userName = 'root';
$password = '';
$dbName = $_SESSION['database-name'];

try{
    $connect = mysqli_connect($serverName,  $userName,  $password, $dbName);
}
catch(Exception $e){
    echo $e->getMessage();
}


?>