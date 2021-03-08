<?php
 session_start();
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
<section class="welcome-section">
            <header>
                <!-- navbar section begins -->
                <nav class="navbar navbar-expand-md">
                    <div class="container">
                        <a
                            href="index.html"
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
                                    <a href="#home" class="nav-link text-dark"
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
                                        href="login.php"
                                        class="nav-link text-dark"
                                        >HELLO </a
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
        <!-- main content starts -->
        <section class="dashboard-container">
            <h1 class="welcome-heading">hello <?php echo $_SESSION['username']; ?></h1>
            <hr>
            <div class="owner-tools">
                <div class="houses">
                    <h1>0</h1>
                    <p>houses <span><a href="">view</a></span></p>
                    
                </div>
                <div class="booked">
                    <h1>0</h1>
                    <p>booked <span><a href="">view</a></span></p>
                </div>
                <div class="occupied">
                    <h1>0</h1>
                    <p>occupied <span><a href="">view</a></span></p>
                </div>
                <div class="tenants">
                    <h1>0</h1>
                    <p>tenants <span><a href="">view</a></span></p>
                </div>
                <div class="btn-container">
                <button class="btn add-btn" type="submit" name ="add">add property</button>
                <button class="btn remove-btn" type="submit" name ="remove">remove property</button></div>
            </div>
            <hr>
            <div class="tenant-tools">
                <div class="rented">
                    <h1>0</h1>
                    <p>properties on rent</p>
                </div>
            </div>

        </section>

    <?php include 'footer.php'; ?>
</body>
</html>