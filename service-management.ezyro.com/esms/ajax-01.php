<?php
require_once('../connection.php');

if(isset($_POST['update'])){
    $userId = $_POST['Id'];
    
    $sql = "SELECT * FROM `users_table` WHERE `Id` = '$userId' ";
    $query = $connect->query($sql) or die ($connect->error);
    $row = $query->fetch_assoc();
    $arr = array();
    array_push($arr, $row['First Name'], $row['Last Name'], $row['Username'], $row['Password']);
    $arr_new = implode(',', $arr);
    echo $arr_new;
    
}

?>