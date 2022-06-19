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

    if(isset($_GET['update'])){
        $contain = $_GET['contain'];
        if($contain == 0){
            $shopName = $_GET['shop-name'];
            $shopOwner = $_GET['shop-owner'];
            $address = $_GET['address'];

            $sql = "INSERT INTO `shop_information_table`(`Shop Name`, `Shop Owner`, `Address`) 
                    VALUES ('$shopName','$shopOwner','$address')";
            $query = $connect->query($sql) or die($connect->error);

            echo "
                    <script>
                        alert(`Shop's Information updated...`);
                        window.location.href = 'shop-information.php';
                    </script>
                ";
        }
        else{
            $shopName = $_GET['shop-name'];
            $shopOwner = $_GET['shop-owner'];
            $address = $_GET['address'];

            $sql = "UPDATE `shop_information_table` 
                    SET `Shop Name`='$shopName',`Shop Owner`='$shopOwner',`Address`='$address'";
            $query = $connect->query($sql) or die($connect->error);

            echo "
                    <script>
                        alert(`Shop's Information updated...`);
                        window.location.href = 'shop-information.php';
                    </script>
                ";
        }
    }

    $sql = "SELECT * FROM `shop_information_table` ";
    $query = $connect->query($sql) or die($connect->error);
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
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" href="css/shop-information.css">
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
                        <h1 class="mt-4">Shop's Information</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Shop's Information</li>
                        </ol>
                        <div class="row">

                            <div class="col wrapper-000">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="td-1">Shop Name: </td>
                                            <td><?php if($total > 0){echo $row['Shop Name'];}else{echo "N/A";} ?></td>
                                        </tr>

                                        <tr>
                                            <td class="td-1">Shop Owner: </td>
                                            <td><?php if($total > 0){echo $row['Shop Owner'];}else{echo "N/A";} ?></td>
                                        </tr>

                                        <tr>
                                            <td class="td-1">Address: </td>
                                            <td><?php if($total > 0){echo $row['Address'];}else{echo "N/A";} ?></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="wrapper-001">
                                    <button id="update" class="btn btn-primary"><i class="fa-solid fa-pencil"></i> Update</button>
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

                    <div class="col-12 mb-3"><h3>Shop's Information</h3></div>

                    <div class="col">
                        <form action="" method="GET">

                        <input id="total" type="number" name="contain" value="<?php echo $total; ?>" style="display: none;">
                    
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control input-field-update" name="shop-name" id="floatingInput" placeholder="Shop Name">
                            <label for="floatingInput">Shop Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control input-field-update" name="shop-owner" id="floatingInput" placeholder="Shop Owner">
                            <label for="floatingInput">Shop Owner</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control input-field-update" name="address" id="floatingInput" placeholder="address">
                            <label for="floatingInput">Address</label>
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
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/shop-information.js"></script>
<script src="js/logout.js"></script>


</html>
