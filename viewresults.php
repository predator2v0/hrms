<?php
    session_start();
    error_reporting(0);
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
                        </li> -->
                        
                        <?php
                        if(isset($_SESSION['name'])){
                            ?>
                                <!-- <li class="nav-item">
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
                                </li> -->

                                <div class="btn-group">
                                    <button class="btn btn-sm" type="button">
                                    <?php echo $_SESSION['name']; ?>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="dashboard.php">dashboard</a>
                                        <a class="dropdown-item" href="logout.php">log out</a>
                                    </div>
                                </div>
                            <?php
                        } else{
                            ?>
                                <li class="nav-item">
                                    <a
                                        href="login.php"
                                        class="nav-link text-dark"
                                        >login</a
                                    >
                                </li>
                            <?php
                        }
                        ?>
                        
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
                    $fetch_query = " select * from property where pincode = '$pcode'";
                    $resultset = mysqli_query($con,$fetch_query);
                    $num = mysqli_num_rows($resultset);
                    
                    if(isset($_SESSION['email'])){
                        $usermail = $_SESSION['email'];
                    }
                    
                    while($res = mysqli_fetch_assoc($resultset)){
                        if($res['oemail'] != $usermail){
                            ?>
                                <div class="result-box">
                                    <div class="property-img " >
                                        <img id="bimg1" class="img-fluid" src="<?php echo $res['pic1']; ?>" alt="">
                                    </div>
                                    <div class="property-details">
                                        <p>name: <span><?php echo $res['pname']; ?></span></p>
                                        <p>address: <span><?php echo $res['locality'].",". $res['landmark']; ?></span></p>
                                        <p>city/state: <span><?php echo $res['city'].",". $res['state']; ?></span></p>
                                        <p>pin code: <span><?php echo $res['pincode']; ?></span></p>
                                        <p>type: 
                                            <span>
                                                <?php
                                                    if($res['roomcount'] == 'onebhk'){
                                                        echo $res['regtype'].", 1 BHK";
                                                    } 
                                                    if($res['roomcount'] == 'twobhk'){
                                                        echo $res['regtype'].", 2 BHK";
                                                    } 
                                                    if($res['roomcount'] == 'threebhk'){
                                                        echo $res['regtype'].", 3 BHK";
                                                    } 
                                                ?>
                                            </span>
                                        </p>
                                        <p>price range: <span><?php echo $res['minprice']." - ". $res['maxprice']; ?></span> </p>
                                        <p>rent status:
                                            <span class="text-danger">
                                                <?php 
                                                    if($res['temail'] != null){
                                                        echo "RENTED";
                                                    } else{
                                                        echo "NOT RENTED";
                                                    }
                                                ?>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="owner-details">
                                        <p>owner name: <span><?php echo $res['oname']; ?></span></p>
                                        <p>email: <span class="text-lowercase"><?php echo $res['oemail']; ?></span></p>
                                        <p>contact: <span class="text-lowercase"><?php echo $res['ocontact']; ?></span></p>
                                        <div class="book">
                                            <a href="bookproperty.php?id=<?php echo $res['id']; ?>">book</a>
                                        </div>
                                    </div>
                                </div>
                     <?php
                        }
                    }
                    if($num == 0){
                        ?>
                            <h1 class="text-center font-weight-bold text-success">SORRY!! NO RESULTS FOUND :)</h1>
                        <?php
                    }
                }
            }
        ?>
        
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>