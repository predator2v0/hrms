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
    <title>View Property | hrms</title>
    <?php include 'links.php'; ?>
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/viewproperty.css">
</head>
<body class="viewproperty-body">
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
                            <a href="index.html" class="nav-link text-dark"
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
    
    <section class="viewproperty-container">
        <table class="table table-striped table-hover table-bordered">
            <thead class="font-weight-bold">
                <tr class="text-uppercase">
                    <td>sl. no.</td>
                    <td>property name</td>
                    <td>address</td>
                    <td>landmark</td>
                    <td>city</td>
                    <td>state</td>
                    <td>pincode</td>
                    <td>type</td>
                    <td>rooms</td>
                    <td colspan="2">Operations</td>
                </tr>
            </thead>
            <tbody>
            <?php
                include 'connection.php';
                if($_SESSION['name']){
                $mail = $_SESSION['email'];

                $retrive_query = "select * from property where oemail = '$mail' ";
                $resultset = mysqli_query($con,$retrive_query);
                $rows = mysqli_num_rows($resultset);
                $sl = 1;
                while($res = mysqli_fetch_array($resultset)){
            ?>
                <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo $res['pname']; ?></td>
                    <td><?php echo $res['locality']; ?></td>
                    <td><?php echo $res['landmark']; ?></td>
                    <td><?php echo $res['city']; ?></td>
                    <td><?php echo $res['state']; ?></td>
                    <td><?php echo $res['pincode']; ?></td>
                    <td><?php echo $res['regtype']; ?></td>
                    <td><?php 
                            if($res['roomcount'] == 'onebhk')
                                echo "1 BHK";
                            if($res['roomcount'] == 'twobhk')
                                echo "2 BHK";
                            if($res['roomcount'] == 'threebhk')
                                echo "3 BHK";
                            
                        ?>
                    </td>
                    <td><a href="updateproperty.php" data-toggle="tooltip" data-placement="right" title="Update"><i class="fa fa-edit text-success" aria-hidden="true"></i></a></td>
                    <td><a href="#" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></td>
                </tr>
            <?php
                $sl++;
                }
            }
            ?>  
            </tbody>
        </table>
    </section>

    <?php include 'footer.php'; ?>
    <script src="script/viewproperty.js"></script>
</body>
</html>