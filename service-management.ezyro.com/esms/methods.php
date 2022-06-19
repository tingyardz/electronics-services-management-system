<?php
class Methods{

    public function title(){
        echo "Electronic Services Management System";
    }

    public function claimPay($connect){
        if(isset($_GET['claim-pay'])){
            $id = $_GET['id'];
            $currentDate = $_GET['current-date'];
            $warrantyExp = $_GET['warranty-expire'];
            $clientName = $_GET['client-name'];
            $codeNumber = $_GET['code-number'];
            $unitDescription = $_GET['unit-description'];
            $unitIssue = $_GET['unit-issue'];
            $status = $_GET['status'];
            $technicianName = $_GET['technician-name'];
            $labor = $_GET['labor'];
            $additionalFees = $_GET['additional-fees'];
            $subtotal = $_GET['subtotal'];
        
            $sql = "INSERT INTO `units_claimed_today`(`Date`, `Technician Name`, `Unit Description`, `Unit Issue`, `Labor`, `Additional Fees`, `Subtotal`) 
                    VALUES ('$currentDate','$technicianName','$unitDescription','$unitIssue','$labor','$additionalFees','$subtotal')";
            $query = $connect->query($sql) or die ($connect->error);
        
            $sql = "INSERT INTO `units_archive`(`Date Repaired`, `Warranty Exp Date`, `Client Name`, `Code Number`, `Unit Description`, `Unit Issue`, `Technician Name`) 
                    VALUES ('$currentDate','$warrantyExp','$clientName','$codeNumber','$unitDescription','$unitIssue','$technicianName')";
            $query = $connect->query($sql) or die ($connect->error);

            $sql = "DELETE FROM `units_to_repair_table` WHERE `Id` = $id ";
            $query = $connect->query($sql) or die ($connect->error);
        
                echo "
                        <script>
                            alert('Successful Transaction!');
                            window.location.href = 'units-to-repair.php';
                        </script>
                    ";
        }
    }

    public function updateTechInfo($connect){
        if(isset($_GET['update'])){

            $id = $_GET['id'];
            $firstname = $_GET['firstname'];
            $lastname = $_GET['lastname'];
            $contactNumber = $_GET['contact-number'];
        
        
            $sql = "UPDATE `technicians_list_table` 
                    SET `First Name`='$firstname',`Last Name`='$lastname',`Contact Number`='$contactNumber' WHERE `Id` = '$id'";
            $query = $connect->query($sql) or die ($connect->error);
        
            echo "
                <script>
                    alert(`The technicians' information has been updated.`);
                    window.location.href = 'lists-of-technicians.php';
                </script>
            ";
        
        }
    }

    public function removeTechnician($connect){
        if(isset($_GET['remove'])){
            $id = $_GET['remove'];
            $sql = "DELETE FROM `technicians_list_table` WHERE `Id` = '$id' ";
            $query = $connect->query($sql) or die ($connect->error);
            header('Location:lists-of-technicians.php');
        }
    }

    public function addTechnician($connect){
        if(isset($_GET['save'])){
            $firstname = $_GET['firstname'];
            $lastname = $_GET['lastname'];
            $contactNumber = $_GET['contact-number'];
        
            $sql = "INSERT INTO `technicians_list_table`(`First Name`, `Last Name`, `Contact Number`) 
                    VALUES ('$firstname','$lastname','$contactNumber')";
            $query = $connect->query($sql) or die ($connect->error);
        
            echo "
                <script>
                    alert('The new technician has been successfully added.');
                    window.location.href = 'lists-of-technicians.php';
                </script>
                ";
        }
    }

    public function remove($connect){
        if(isset($_GET['remove'])){
            $id = $_GET['remove'];
            $sql = "DELETE FROM `units_to_repair_table` WHERE `Id` = '$id' ";
            $query = $connect->query($sql) or die ($connect->error);
            header('Location:units-to-repair.php');
        }
    }

    public function updateInformation($connect){

        if(isset($_GET['update'])){

            $id = $_GET['id'];
            $currentDate = $_GET['current-date'];
            $unitType = $_GET['unit-type'];
            $unitBrand = $_GET['unit-brand'];
            $unitModel = $_GET['unit-model']; 
            $clientFirstName = $_GET['client-first-name'];
            $clientLastName = $_GET['client-last-name'];
            $clientContactNumber = $_GET['client-contact-number'];
            $status = $_GET['status'];
        
        
            $sql = "UPDATE `units_to_repair_table` 
                    SET `Date`='$currentDate',`Unit Type`='$unitType',`Unit Brand`='$unitBrand',`Unit Model`='$unitModel',`Client First Name`='$clientFirstName',`Client Last Name`='$clientLastName',`Client Contact Number`='$clientContactNumber',`Status`='$status' WHERE `Id` = '$id'";
            $query = $connect->query($sql) or die ($connect->error);
        
            echo "
                <script>
                    alert(`The unit's information has been updated.`);
                    window.location.href = 'units-to-repair.php';
                </script>
            ";
        
        }

    }

    public function addNewUnit($connect){

        if(isset($_GET['save-unit'])){

            $codeNumber = abs( crc32( uniqid() ) ); 
            $currentDate = $_GET['current-date'];
            $unitType = $_GET['unit-type'];
            $unitBrand = $_GET['unit-brand'];
            $unitModel = $_GET['unit-model']; 
            $clientFirstName = $_GET['client-first-name'];
            $clientLastName = $_GET['client-last-name'];
            $clientContactNumber = $_GET['client-contact-number'];
            $status = 'Pending';
        
            $sql = "SELECT * FROM `units_to_repair_table` WHERE `Code Number` = '$codeNumber' ";
            $query = $connect->query($sql) or die ($connect->error);
            $total = $query->num_rows;
        
            while($total > 0){
        
                $codeNumber = abs( crc32( uniqid() ) ); 
                $sql = "SELECT * FROM `units_to_repair_table` WHERE `Code Number` = '$codeNumber' ";
                $query = $connect->query($sql) or die ($connect->error);
                $total = $query->num_rows;
        
            }
        
            $sql = "INSERT INTO `units_to_repair_table`(`Code Number`, `Date`, `Unit Type`, `Unit Brand`, `Unit Model`, `Client First Name`, `Client Last Name`, `Client Contact Number`, `Status`) 
                    VALUES ('$codeNumber','$currentDate','$unitType','$unitBrand','$unitModel','$clientFirstName','$clientLastName','$clientContactNumber','$status')";
            $query = $connect->query($sql) or die ($connect->error);
        
            echo "
                <script>
                    alert('The new unit has been successfully added.');
                    window.location.href = 'units-to-repair.php';
                </script>
            ";
        
        }
    }




}

$method = new Methods();





?>