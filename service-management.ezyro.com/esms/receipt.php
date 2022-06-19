<?php
require_once('connection.php');
$sql = "SELECT * FROM `shop_information_table` ";
$query = $connect->query($sql) or die($connect->error);
$row = $query->fetch_assoc();
$total = $query->num_rows;


if(isset($_POST['print-receipt'])){
    $currentDate = $_POST['current-date'];
    $warrantyExp = $_POST['warranty-expire'];
    $clientName = $_POST['client-name'];
    $codeNumber = $_POST['code-number'];
    $unitDescription = $_POST['unit-description'];
    $unitIssue = $_POST['unit-issue'];
    $status = $_POST['status'];
    $technicianName = $_POST['technician-name'];
    $labor = $_POST['labor'];
    $additionalFees = $_POST['additional-fees'];
    $subtotal = $_POST['subtotal'];
}

if($total == 0){
    echo "
            <script>
                alert('Please fill your shop information first!');
                window.location.href='shop-information.php';
            </script>
        ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/receipt.css">
    <script src="js/jquery.min.js"></script>
    
</head>
<body onload="window.print()">

    <div class="container">

        <div class="header">
            <h3><?php echo $row['Shop Name'];  ?></h3>
            <p><?php echo $row['Shop Owner']; ?> 
                <br>
                <?php echo $row['Address']; ?>
            </p>
        </div>

        <table>
            <tbody>

                <tr>
                    <td>Client Name: <?php echo $clientName; ?></td>
                    <td>Status: <?php echo $status; ?></td>
                </tr>

                <tr>
                    <td>Current Date: <?php echo $currentDate; ?></td>
                    <td>Warranty Exp. Date: <?php echo $warrantyExp; ?></td>
                </tr>

                <tr>
                    <td>Code Number: <?php echo $codeNumber; ?></td>
                    <td>Technician Name: <?php echo $technicianName; ?></td>
                </tr>

                <tr>
                    <td>Unit Description: <?php echo $unitDescription; ?></td>
                    <td>Labor: <?php echo $labor; ?></td>
                </tr>

                <tr>
                    <td>Unit Issue: <?php echo $unitIssue; ?></td>
                    <td>Additional Fees: <?php echo $additionalFees; ?></td>
                </tr>

                <tr>
                    <td></td>
                    <td>Subtotal: <?php echo $subtotal; ?></td>
                </tr>

            </tbody>
        </table>
    </div>
    
</body>

<!-- Javascript -->
<script src="js/receipt.js"></script>


</html>