<?php
    session_start();

    if(!isset($_SESSION['email'])){
        header('location:login.php');
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | hrms</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon" />
    <?php include 'links.php'; ?>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body class="dashboard-body">
    <header>
        <!-- navbar section begins -->
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a
                    href="index.php"
                    class="navbar-brand text-dark font-weight-bold"
                    >CustomCastle</a
                >
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#collapsenav"
                >
                    <span>
                        <img
                            src="img/menuHamburger.svg"
                            width="35px"
                            height="35px"
                            alt="menu-hamberger-icon"
                        />
                    </span>
                </button>
                <div
                    class="collapse navbar-collapse text-center"
                    id="collapsenav"
                >
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link text-dark"
                                >home</a
                            >
                        </li>
                        <!-- <li class="nav-item">
                            <a
                                href="#about_us"
                                class="nav-link text-dark"
                                >about us</a
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                href="#contact_us"
                                class="nav-link text-dark"
                                >contact us</a
                            >
                        </li>-->
                        <!-- <li class="nav-item">
                            <a
                                href="login.php"
                                class="nav-link text-dark"
                                >HELLO </a
                            >
                        </li> -->
                        <!-- <li class="nav-item signup">
                            <a
                                href="logout.php"
                                class="nav-link text-dark"
                                >logout</a
                            >
                        </li> -->
                        <div class="btn-group">
                            <button class="btn btn-sm" type="button">
                            <?php echo $_SESSION['name']; ?>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="logout.php">log out</a>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navbar ends -->
    </header>
    <!-- dashboard info from db -->
    <?php
        include 'connection.php';
        if($_SESSION['name']){
            $mail = $_SESSION['email'];
            
            // select all rows
            $totalcountquery  = "select * from property where oemail = '$mail' ";
            $resultset = mysqli_query($con,$totalcountquery);
            $propertycount = mysqli_num_rows($resultset);

            // select the booked properties
            $bookedcountquery = "select * from property where oemail = '$mail' and bstatus = 1 ";
            $bookedresult = mysqli_query($con,$bookedcountquery);
            $bookedcount = mysqli_num_rows($bookedresult); 

            // select the rented properties
            $rentedcountquery = "select * from property where oemail = '$mail' and temail IS NOT NULL";
            $rentedresult = mysqli_query($con,$rentedcountquery);
            $rentedcount = mysqli_num_rows($rentedresult);

            // select the number of tenants
            $tenantcountquery = "select distinct * from property where oemail = '$mail' and temail IS NOT NULL";
            $tenantresult = mysqli_query($con,$tenantcountquery);
            $tenantcount = mysqli_num_rows($tenantresult);

            // select number of houses occupied
            $occupycountquery = " select * from property where temail = '$mail' ";
            $occupyresult = mysqli_query($con,$occupycountquery);
            $occupycount = mysqli_num_rows($occupyresult);
        }
    ?>
    <!-- main content starts -->
    <section class="dashboard-container">
        <h1 class="welcome-heading">hello, <?php echo $_SESSION['name']; ?>!</h1>
        <hr>
        <div class="owner-tools">
            <div class="houses">
                <h1>
                    <?php
                        echo $propertycount;
                    ?>
                </h1>
                <p>houses <span><a href="viewallproperty.php" target="_blank">view</a></span></p>
                
            </div>
            <div class="booked">
                <h1><?php
                        echo $bookedcount;
                    ?></h1>
                <p>booked <span><a href="bookedproperty.php" target = "_blank">view</a></span></p>
            </div>
            <div class="rented">
                <h1><?php
                        echo $rentedcount;
                    ?></h1>
                <p>rented <span><a href="rentedproperty.php" target = "_blank">view</a></span></p>
            </div>
            <div class="tenants">
                <h1><?php
                        echo $tenantcount
                    ?></h1>
                <p>tenants <span><a href="viewtenants.php">view</a></span></p>
            </div>
            <div class="btn-container">
            <button class="btn add-btn" type="submit" name="addproperty" onclick="window.open('addproperty.php')">add property</button>
            <button class="btn remove-btn" type="submit" name ="removeproperty" onclick="window.open('viewallproperty.php')">remove property</button></div>
        </div>
        <hr>
        <div class="tenant-tools">
            <div class="occupied">
                <h1><?php
                        echo $occupycount
                    ?></h1>
                <p>occupied <span><a href="viewoccupied.php">view</a></span></p>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>