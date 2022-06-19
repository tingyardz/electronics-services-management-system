<?php
$serverName = 'localhost';
$userName = 'root';
$password = '';
$dbName = 'ezyro_31767275_users_db';

try{
    $connect = mysqli_connect($serverName,  $userName,  $password, $dbName);
}
catch(Exception $e){
    echo $e->getMessage();
}
?>