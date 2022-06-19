<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/index.style.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body>
    <div class="container-main-page">
        <div class="wrapper">
            <h2><em>Electronic Service Management System</em></h2>
            <div class="sub-wrapper">

                    <div class="inp-wrapper" id="error-message">
                        <p>Please check your username or password!</p>
                    </div>

                <form action="" method="POST">

                    <div class="inp-wrapper" id="first-inp-wrapper">
                        <div class="username-wrapper"><input id="username" name="username" type="text" placeholder="Enter your username" required></div>
                        <div class="icon-wrapper"><i class="fa-solid fa-user"></i></div>
                    </div>

                    <div class="inp-wrapper" id="second-inp-wrapper">
                        <div class="password-wrapper"><input id="password" name="password" type="password" placeholder="Enter your password" required></div>
                        <div class="icon-wrapper"><i class="fa-solid fa-lock"></i></div>
                    </div>

                    <button type="submit" name="login"><strong>Login</strong></button>

                </form>
            </div>
        </div>
    </div>
</body>

<!-- PHP -->
<?php
    require_once('connection.php');

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM `users_table` WHERE `Username` = '$username' AND `Password` = '$password' ";
        $query = $connect->query($sql) or die ($connect->error);
        $row = $query->fetch_assoc();
        $total = $query->num_rows;

        if($total == 1){
            $destination = $row['Destination'];
            session_start();
            $_SESSION['esms-user'] = $row['First Name'].' '.$row['Last Name'];
            $_SESSION['database-name'] = $row['Database Name'];
            $_SESSION['user-id'] = $row['Id'];
            header("Location:$destination");
        }
        else{
            echo "
                    <script>
                        document.querySelector('#error-message').style.display='block';
                        setTimeout(() => {
                            document.querySelector('#error-message').style.display='none';                
                        }, 3000);
                    </script>
                ";
        }
    }
?>

<!-- Javascript -->
<script src="index.js"></script>

</html>