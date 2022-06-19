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

    $sql = "SELECT * FROM `units_to_repair_table` ";
    $query = $connect->query($sql) or die ($connect->error);
    $total = $query->num_rows;

    $sql01 = "SELECT * FROM `units_claimed_today` ";
    $query01 = $connect->query($sql01) or die ($connect->error);
    $total01 = $query01->num_rows;

    $sql02 = "SELECT * FROM `technicians_list_table` ";
    $query02 = $connect->query($sql02) or die ($connect->error);
    $total02 = $query02->num_rows;

    $sql03 = "SELECT * FROM `units_archive` ";
    $query03 = $connect->query($sql03) or die ($connect->error);
    $total03 = $query03->num_rows;
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
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/all.min.css">
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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body" style="font-size: 36px; text-align: center;"><?php echo $total; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="units-to-repair.php" style="text-decoration: none; font-size: 18px;"><i class="fa-solid fa-screwdriver-wrench"></i> Units to Repair</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body" style="font-size: 36px; text-align: center;"><?php echo $total01; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="units-claimed-today.php" style="text-decoration: none; font-size: 18px;"><i class="fa-solid fa-calendar-check"></i> Units Claimed Today</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body" style="font-size: 36px; text-align: center;"><?php echo $total02; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="lists-of-technicians.php" style="text-decoration: none; font-size: 18px;"><i class="fa-solid fa-users"></i> Lists of Technicians</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body" style="font-size: 36px; text-align: center;"><?php echo $total03; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="units-archive.php" style="text-decoration: none; font-size: 18px;"><i class="fa-solid fa-folder"></i> Units Archive</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        
                    </div>
                </main>

            </div>
        </div>
        
    </body>

<!-- Javascript -->
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/logout.js"></script>

</html>
