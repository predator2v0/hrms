<?php
    session_start();

    // if(!isset($_SESSION['email'])){
    //     header('location:login.php');
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search results | hrms</title>
    <?php include 'links.php'; ?>
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/viewresults.css">
</head>
<body class="viewresults-body">
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
                        <li class="nav-item">
                            <a
                                href="dashboard.php"
                                class="nav-link text-dark"
                                >dashboard </a
                            >
                        </li> 
                        <li class="nav-item signup">
                            <a
                                href="logout.php"
                                class="nav-link text-dark"
                                >logout</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navbar ends -->
    </header>
    
    <section class="viewresults-container">
        <?php
            include 'connection.php';
            if($con){
                if(isset($_POST['submit'])){
                    $pcode = $_POST['pcode'];

                }
            }
        ?>
        <div class="result-box">
            <div class="property-img ">
            <img class="img-fluid" src="img/apartment.jpg" alt="">
            </div>
            <div><p>property name: </p>
            <p>property address: </p></div>

        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>