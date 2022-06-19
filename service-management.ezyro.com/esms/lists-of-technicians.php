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

$method->addTechnician($connect);
$method->removeTechnician($connect);
$method->updateTechInfo($connect);

$sql = "SELECT * FROM `technicians_list_table` ";
$query = $connect->query($sql) or die ($connect->error);
$row = $query->fetch_assoc();
$total = $query->num_rows;

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
        <link rel="stylesheet" href="css/lists-of-technicians.css">
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
                        <h1 class="mt-4">List of Technicians</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">List of Technicians</li>
                        </ol>
                        
                        <div class="container mb-5">
                            <div class="card my-3">

                                <div class="card-header">
                                    Technicians List
                                </div>

                                <div class="card-body">
                                    
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>Select</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Contact Number</th>
                                            </tr>
                                        </thead>
                
                                        <tbody>
                                            <?php
                                                if($total > 0){
                                                    do{
                                            ?>
                                                <tr>
                                                    <td><input class="radio" type="radio" name="unit" value="<?php echo $row['Id']; ?>"></td>
                                                    <td><?php echo $row['First Name']; ?></td>
                                                    <td><?php echo $row['Last Name']; ?></td>
                                                    <td><?php echo $row['Contact Number']; ?></td>
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

                    <div class="col-12 mb-3"><h3>Technicians' Information</h3></div>

                    <div class="col">
                        <form action="" method="GET">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="firstname" id="floatingInput" placeholder="First Name">
                            <label for="floatingInput">First Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="lastname" id="floatingInput" placeholder="lastname">
                            <label for="floatingInput">Last Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="contact-number" id="floatingInput" placeholder="Contact Number">
                            <label for="floatingInput">Contact Number</label>
                        </div>

                    </div>

                    <div class="save-wrapper">
                        <button type="submit" name="save" class="btn btn-primary save-button">Save</button>
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
                        <h3>Technicians' Information</h3>
                        <h3>Update</h3>                        
                    </div>

                    <div class="col">
                        <form action="" method="GET">

                        <input class="update-value" type="number" name="id" style="display:none;">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control update-value" name="firstname" id="floatingInput" placeholder="First Name">
                            <label for="floatingInput">First Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control update-value" name="lastname" id="floatingInput" placeholder="lastname">
                            <label for="floatingInput">Last Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control update-value" name="contact-number" id="floatingInput" placeholder="Contact Number">
                            <label for="floatingInput">Contact Number</label>
                        </div>

                    </div>

                    <div class="save-wrapper">
                        <button type="submit" name="update" class="btn btn-primary save-button">Update</button>
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
<script src="js/lists-of-technicians.js"></script>
<script src="js/logout.js"></script>

</html>
