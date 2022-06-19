<?php
require_once('connection.php');
require_once('methods.php');

if(!$_SESSION['esms-user']){
    header("Location:../index.php");
}

if(isset($_GET['logout'])){

    unset($_SESSION['esms-user']);
    header("Location:../index.php");
    exit();
}

$method->addNewUnit($connect);
$method->updateInformation($connect);
$method->remove($connect);
$method->claimPay($connect);

//Display Data
$sql = "SELECT * FROM `units_to_repair_table` ";
$query = $connect->query($sql) or die ($connect->error);
$row = $query->fetch_assoc();
$total = $query->num_rows;

$sql_tech = "SELECT * FROM `technicians_list_table` ";
$query_tech = $connect->query($sql_tech) or die ($connect->error);
$row_tech = $query_tech->fetch_assoc();
$total_tech = $query_tech->num_rows;

$sql_tech0 = "SELECT * FROM `technicians_list_table` ";
$query_tech0 = $connect->query($sql_tech0) or die ($connect->error);
$row_tech0 = $query_tech0->fetch_assoc();
$total_tech0 = $query_tech0->num_rows;
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php $method->title(); ?></title>
        <link rel="stylesheet" href="css/simple-datatables@latest.css">
        <link rel="stylesheet" href="css/table.style.css">
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" href="css/units-to-repair.css">
        <script src="js/jquery.min.js"></script>
    </head>

    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php"><i class="fa-solid fa-face-smile-beam"></i> ADMIN</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4" style="position: absolute; right: 0;">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> <?php echo $_SESSION['esms-user']; ?></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="" onclick="logout()" id="logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                        <a class="nav-link" href="index.php" style="border-bottom: 1px solid gray;">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link" href="units-to-repair.php" style="border-bottom: 1px solid gray;">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                                Units to Repair
                            </a>

                            <a class="nav-link" href="units-claimed-today.php" style="border-bottom: 1px solid gray;">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-check"></i></div>
                                Units Claimed Today
                            </a>

                            <a class="nav-link" href="units-archive.php" style="border-bottom: 1px solid gray;">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-folder"></i></div>
                                Units Archive
                            </a>

                            <a class="nav-link" href="lists-of-technicians.php" style="border-bottom: 1px solid gray;">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                List of Technicians
                            </a>

                            <a class="nav-link" href="shop-information.php" style="border-bottom: 1px solid gray;">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-shop"></i></div>
                                Shop's Information
                            </a>

                            <a class="nav-link" href="account.php" style="border-bottom: 1px solid gray;">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-gear"></i></div>
                                Account Settings
                            </a>

                        </div>
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">

                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Units to Repair</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Units to Repair</li>
                        </ol>
                        
                        <div class="container mb-5">
                            <div class="card my-3">

                                <div class="card-header">
                                    Units List
                                </div>

                                <div class="card-body">
                                    
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>Select</th>
                                                <th>Code Number</th>
                                                <th>Date</th>
                                                <th>Unit Description</th>
                                                <th>Client Name</th>
                                                <th>Contact Number</th>
                                                <th>Status</th>
                                                <th>Print</th>
                                            </tr>
                                        </thead>
                
                                        <tbody>
                                            <?php
                                                if($total > 0){
                                                    do{
                                            ?>
                                                <tr>
                                                    <td><input class="radio" type="radio" name="unit" value="<?php echo $row['Id']; ?>"></td>
                                                    <td><?php echo $row['Code Number']; ?></td>
                                                    <td><?php echo $row['Date']; ?></td>
                                                    <td><?php echo $row['Unit Type'].' '.$row['Unit Brand'].' '.$row['Unit Model']; ?></td>
                                                    <td><?php echo $row['Client First Name'].' '.$row['Client Last Name']; ?></td>
                                                    <td><?php echo $row['Client Contact Number']; ?></td>
                                                    <td class="status"><?php echo $row['Status']; ?></td>
                                                    <td><button class="btn btn-sm btn-primary" onclick="receipt(<?php echo $row['Id']; ?>)"><i class="fa-solid fa-receipt"></i> Print Receipt</button></td>
                                                </tr>

                                            <?php
                                                    }while($row = $query->fetch_assoc());
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>


                                <div class="card-footer">

                                    <div class="row">
                                        <div class="col-3"><button class="btn btn-md btn-primary crud-button me-3 mb-3" id="add-new-unit"><i class="fa-solid fa-plus"></i> Add</button></div>
                                        <div class="col-3"><button class="btn btn-md btn-primary crud-button me-3 mb-3" id="update"><i class="fa-solid fa-pencil"></i> Update</button></div>
                                        <div class="col-3"><button class="btn btn-md btn-primary crud-button me-3 mb-3" id="remove"><i class="fa-solid fa-trash-can"></i> Remove</button></div>
                                        <div class="col-3"><button class="btn btn-md btn-primary crud-button me-3 mb-3" id="claim-paid"><i class="fa-solid fa-calendar-check"></i> Claim & Pay</button></div>
                                    </div>
                                     
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                </main>

            </div>
        </div>


        <!-- Second Window -->
        <div class="container000">
            <div class="wrapper000">

                <div class="close"><button class="btn border">Close</button></div>


                <div class="row">

                    <div class="col-12 mb-3"><h3>Units' & Clients' Information</h3></div>

                    <div class="col-6">
                        <form action="" method="GET">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="current-date" id="floatingInput" placeholder="Current Date">
                            <label for="floatingInput">Current Date</label>
                        </div>
                
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="unit-type" id="floatingInput" placeholder="Unit Type">
                            <label for="floatingInput">Unit Type</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="unit-brand" id="floatingInput" placeholder="unit-brand">
                            <label for="floatingInput">Unit Brand</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="unit-model" id="floatingInput" placeholder="unit-model">
                            <label for="floatingInput">Unit Model</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="client-first-name" id="floatingInput" placeholder="Client First Name">
                            <label for="floatingInput">Client First Name</label>
                        </div>
                
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="client-last-name" id="floatingInput" placeholder="Client Last Name">
                            <label for="floatingInput">Client Last Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="client-contact-number" id="floatingInput" placeholder="Client Contact Number">
                            <label for="floatingInput">Client Contact Number</label>
                        </div>
                    </div>

                    <div class="save-wrapper">
                        <button type="submit" name="save-unit" class="btn btn-primary save-button">Save</button>
                        </form>
                    </div>

                </div>

            </div>

        </div>



        <!-- Third Window -->
        <div class="container001">
            <div class="wrapper001">

                <div class="close"><button class="btn border">Close</button></div>


                <div class="row">

                    <div class="col-12 mb-3">
                        <h3>Units' & Clients' Information</h3>
                        <h3>Update</h3>                        
                    </div>

                    <div class="col-6">
                        <form action="" method="GET">

                        <input class="update-value" type="number" name="id" style="display:none;">

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control update-value" name="current-date" id="floatingInput" placeholder="Current Date">
                            <label for="floatingInput">Current Date</label>
                        </div>
                
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control update-value" name="unit-type" id="floatingInput" placeholder="Unit Type">
                            <label for="floatingInput">Unit Type</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control update-value" name="unit-brand" id="floatingInput" placeholder="unit-brand">
                            <label for="floatingInput">Unit Brand</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control update-value" name="unit-model" id="floatingInput" placeholder="unit-model">
                            <label for="floatingInput">Unit Model</label>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control update-value" name="client-first-name" id="floatingInput" placeholder="Client First Name">
                            <label for="floatingInput">Client First Name</label>
                        </div>
                
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control update-value" name="client-last-name" id="floatingInput" placeholder="Client Last Name">
                            <label for="floatingInput">Client Last Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control update-value" name="client-contact-number" id="floatingInput" placeholder="Client Contact Number">
                            <label for="floatingInput">Client Contact Number</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select name="status" class="form-control" id="floatingInput">
                                <option class="status-0033" value="Fixed">Fixed</option>
                                <option class="status-0033" value="Pending">Pending</option>
                            </select>
                            <label for="floatingInput">Status</label>
                        </div>
                    </div>

                    <div class="save-wrapper">
                        <button type="submit" name="update" class="btn btn-primary save-button">Update</button>
                        </form>
                    </div>

                </div>

            </div>

        </div>


        <!-- Fourth Window -->
        <div class="container002">
            <div class="wrapper002">

                <div class="close"><button class="btn border">Close</button></div>


                <div class="row">

                    <div class="col-12 mb-3">
                        <h3>Receipt Form</h3>                      
                    </div>

                    <div class="col-4">
                        <form action="receipt.php" method="POST">

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="current-date" id="floatingInput" placeholder="Current Date" required>
                            <label for="floatingInput">Current Date</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="warranty-expire" id="floatingInput" placeholder="Warranty Exp. Date" required>
                            <label for="floatingInput">Warranty Exp. Date</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control receipt-value" name="client-name" id="floatingInput" placeholder="Client Name" readonly>
                            <label for="floatingInput">Client Name</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control receipt-value" name="code-number" id="floatingInput" placeholder="Code Number" readonly>
                            <label for="floatingInput">Code Number</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control receipt-value" name="unit-description" id="floatingInput" placeholder="Unit Description" readonly>
                            <label for="floatingInput">Unit Description</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="unit-issue" id="floatingInput" placeholder="Unit Issue" required>
                            <label for="floatingInput">Unit Issue</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control receipt-value" name="status" id="floatingInput" placeholder="Status" readonly>
                            <label for="floatingInput">Status</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <select name="technician-name"class="form-control" id="floatingInput" placeholder="Technician Name">
                                <?php
                                    if($total_tech > 0){
                                        do{
                                ?>
                                <option value="<?php echo $row_tech['First Name'].' '.$row_tech['Last Name']; ?>"><?php echo $row_tech['First Name'].' '.$row_tech['Last Name']; ?></option>
                                <?php
                                        }while($row_tech = $query_tech->fetch_assoc());
                                    }
                                ?>
                            </select>
                            <label for="floatingInput">Technician Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" step="0.01"  class="form-control" name="labor" id="floatingInput" placeholder="Labor" required>
                            <label for="floatingInput">Labor</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input  type="number" step="0.01" class="form-control" name="additional-fees" id="floatingInput" placeholder="Additional Fees" required>
                            <label for="floatingInput">Additional Fees</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input  type="number" step="0.01" class="form-control" name="subtotal" id="floatingInput" placeholder="Subtotal" required>
                            <label for="floatingInput">Subtotal</label>
                        </div>
                    </div>

                    <div class="save-wrapper">
                        <button type="submit" name="print-receipt" class="btn btn-primary save-button">Print Receipt</button>
                        </form>
                    </div>

                </div>

            </div>

        </div>



        <!-- Fifth Window -->
        <div class="container003">
            <div class="wrapper003">

                <div class="close"><button class="btn border">Close</button></div>


                <div class="row">

                    <div class="col-12 mb-3">
                        <h3>Claim & Pay</h3>                      
                    </div>

                    <div class="col-4">
                        <form action="" method="GET">

                        <input type="number" name="id" value="" class="claim-value" style="display:none;">

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="current-date" id="floatingInput" placeholder="Current Date" required>
                            <label for="floatingInput">Current Date</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="warranty-expire" id="floatingInput" placeholder="Warranty Exp. Date" required>
                            <label for="floatingInput">Warranty Exp. Date</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control claim-value" name="client-name" id="floatingInput" placeholder="Client Name" readonly>
                            <label for="floatingInput">Client Name</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control claim-value" name="code-number" id="floatingInput" placeholder="Code Number" readonly>
                            <label for="floatingInput">Code Number</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control claim-value" name="unit-description" id="floatingInput" placeholder="Unit Description" readonly>
                            <label for="floatingInput">Unit Description</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="unit-issue" id="floatingInput" placeholder="Unit Issue" required>
                            <label for="floatingInput">Unit Issue</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control claim-value" name="status" id="floatingInput" placeholder="Status" readonly>
                            <label for="floatingInput">Status</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <select name="technician-name"class="form-control" id="floatingInput" placeholder="Technician Name">
                                <?php
                                    if($total_tech0 > 0){
                                        do{
                                ?>
                                <option value="<?php echo $row_tech0['First Name'].' '.$row_tech0['Last Name']; ?>"><?php echo $row_tech0['First Name'].' '.$row_tech0['Last Name']; ?></option>
                                <?php
                                        }while($row_tech0 = $query_tech0->fetch_assoc());
                                    }
                                ?>
                            </select>
                            <label for="floatingInput">Technician Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" step="0.01"  class="form-control" name="labor" id="floatingInput" placeholder="Labor" required>
                            <label for="floatingInput">Labor</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input  type="number" step="0.01" class="form-control" name="additional-fees" id="floatingInput" placeholder="Additional Fees" required>
                            <label for="floatingInput">Additional Fees</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input  type="number" step="0.01" class="form-control" name="subtotal" id="floatingInput" placeholder="Subtotal" required>
                            <label for="floatingInput">Subtotal</label>
                        </div>
                    </div>

                    <div class="save-wrapper">
                        <button type="submit" name="claim-pay" class="btn btn-primary save-button">Claim & Pay</button>
                        </form>
                    </div>

                </div>

            </div>

        </div>

        
    </body>

<!-- Javascript -->
<script src="js/datatables-simple-demo.js"></script>
<script src="js/simple-datatables@latest.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/units-to-repair.js"></script>
<script src="js/logout.js"></script>


</html>
