<?php
require_once('connection.php');

if(isset($_POST['update0'])){
    $id = $_POST['slot'];
    $sql = "SELECT * FROM `units_to_repair_table` WHERE `Id` = '$id' ";
    $query = $connect->query($sql) or die ($connect->error);
    $row = $query->fetch_assoc();

    $arr = array();
    array_push($arr, $row['Id'], $row['Date'],  $row['Unit Type'],  $row['Unit Brand'], $row['Unit Model'], 
                $row['Client First Name'],  $row['Client Last Name'],  $row['Client Contact Number'], $row['Status']);

    $arr_new = implode(',', $arr);

    echo $arr_new;
}
elseif(isset($_POST['update1'])){
    $id = $_POST['slot'];
    $sql = "SELECT * FROM `technicians_list_table` WHERE `Id` = '$id' ";
    $query = $connect->query($sql) or die ($connect->error);
    $row = $query->fetch_assoc();

    $arr = array();
    array_push($arr, $row['Id'], $row['First Name'],  $row['Last Name'],  $row['Contact Number']);

    $arr_new = implode(',', $arr);

    echo $arr_new;
}
elseif(isset($_POST['update2'])){
    $id = $_POST['Id'];
    if($id == 0){
        echo "N/A, N/A, N/A";
    }
    elseif($id > 0){
        $sql = "SELECT * FROM `shop_information_table` WHERE `Id` = '$id' ";
        $query = $connect->query($sql) or die ($connect->error);
        $row = $query->fetch_assoc();

        $arr = array();
        array_push($arr, $row['Shop Name'],  $row['Shop Owner'],  $row['Address']);

        $arr_new = implode(',', $arr);

        echo $arr_new;
    }
    
}
elseif(isset($_POST['update3'])){
    $id = $_POST['slot'];
    $sql = "SELECT * FROM `units_to_repair_table` WHERE `Id` = '$id' ";
    $query = $connect->query($sql) or die ($connect->error);
    $row = $query->fetch_assoc();

    $arr = array();
    array_push($arr, $row['Client First Name'].' '.$row['Client Last Name'], $row['Code Number'], $row['Unit Type'].' '.$row['Unit Brand'].' '.$row['Unit Model'], 
                 $row['Status']);

    $arr_new = implode(',', $arr);

    echo $arr_new;
    
}
elseif(isset($_POST['update4'])){
    $id = $_POST['slot'];
    $sql = "SELECT * FROM `units_to_repair_table` WHERE `Id` = '$id' ";
    $query = $connect->query($sql) or die ($connect->error);
    $row = $query->fetch_assoc();

    $arr = array();
    array_push($arr, $row['Id'], $row['Client First Name'].' '.$row['Client Last Name'], $row['Code Number'], $row['Unit Type'].' '.$row['Unit Brand'].' '.$row['Unit Model'], 
                 $row['Status']);

    $arr_new = implode(',', $arr);

    echo $arr_new;
    
}

?>