<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php'; ?>
    <title>add property | hrms</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/addproperty.css">
</head>
<body class="addproperty-body">
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
    <!-- property registration form backend script [php] -->
    <?php
        include 'connection.php';

        if($con){
            if(isset($_POST['submit'])){
                
            }
        }
    ?>
    <!-- property registration form frontend -->
    <section class="addproperty-container">
        <h1 class="welcome-heading">hello, <?php echo $_SESSION['name']; ?>!</h1>
        <hr>
        <div class="addproperty-form">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="property-info">
                    <h3>property information</h3>
                    <div class="ipfield">
                        <label>property name:</label>
                        <input type="text" name="p_name" required>
                    </div>
                    <div class="ipfield">
                        <label>locality:</label>
                        <input type="text" name="p_locality" required>
                    </div>
                    <div class="ipfield">
                        <label>landmark:</label>
                        <input type="text" name="p_landmark" required>
                    </div>
                    <div class="ipfield">
                        <label>city:</label>
                        <input type="text" name="p_city" required>
                    </div>
                    <div class="ipfield">
                        <label>state:</label>
                        <input type="text" name="p_state" required>
                    </div>
                    <div class="ipfield">
                        <label>pincode:</label>
                        <input type="text" name="p_pincode" required>
                    </div>
                    <div class="ipfield">
                        <label>registration type:</label>
                        <select name="p_regtype" id="">
                            <option value="">--select--</option>
                            <option value="apartment">apartment</option>
                            <option value="hostel">hostel</option>
                            <option value="house">house</option>
                            <option value="office">office</option>
                            <option value="shop">shop</option>
                        </select>
                    </div>
                    <div class="ipfield">
                        <label>property type:</label>
                        <select name="p_type" id="">
                            <option value="">--select--</option>
                            <option value="onebhk">1 BHK</option>
                            <option value="twobhk">2 BHK</option>
                            <option value="threebhk">3 BHK</option>
                        </select>
                    </div>
                    
                </div>
                <div class="owner-info">
                    <h3>owner information</h3>
                    <div class="ipfield">
                        <label>name:</label>
                        <input type="text" name="o_name" value="<?php echo $_SESSION['name']; ?>" required>
                    </div>
                    <div class="ipfield">
                        <label>email:</label>
                        <input type="email" name="o_email" value="<?php echo $_SESSION['email']; ?>" required disabled>
                    </div>
                    <div class="ipfield">
                        <label>contact no:</label>
                        <input type="text" name="o_contact" value="<?php echo $_SESSION['contact']; ?>" required>
                    </div>
                </div>
                <div class="property-image">
                    <h3>upload image</h3>
                    <div class="ipfield">
                        <label>image 1:</label>
                        <input class="img-upload" type="file" name="p_pic1" required>
                    </div>
                    <div class="ipfield">
                        <label>image 2:</label>
                        <input class="img-upload" type="file" name="p_pic2" required>
                    </div>
                </div>
                <div class="submit-reset">
                <input type="submit" name="submit" value="register">
                <input type="reset" name="reset">
                </div>
            </form>
        </div>
    </section>
    <?php include 'footer.php'; ?>
</body>
</html>