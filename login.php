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
    <title>login | hrms</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/login.css">

</head>
<body>
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
                        </li>
                        <li class="nav-item">
                            <a href="#login" class="nav-link text-dark"
                                >login</a
                            >
                        </li> -->
                        <li class="nav-item signup">
                            <a
                                href="register.php"
                                class="nav-link text-dark"
                                >register</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navbar ends -->
    </header>
        <!-- login script starts -->
        <?php
            include 'connection.php';
            if($con){
                if(isset($_POST['submit'])){
                    $email = $_POST['email'];
                    $pass = $_POST['password'];

                //    check if the user exists in the database.
                    $search_query = "select * from usr_login where email = '$email' ";
                    $resultset = mysqli_query($con, $search_query);
                    $usr_count = mysqli_num_rows($resultset);

                // if user exists, password matching
                    if($usr_count){
                        $userdata = mysqli_fetch_assoc($resultset);
                        
                        // get password and match
                        $matching_password = $userdata['password'];
                        $is_matching = password_verify($pass, $matching_password);

                        // fetch all data
                            $_SESSION['id'] = $userdata['id'];
                            $_SESSION['name'] = $userdata['name'];
                            $_SESSION['email'] = $userdata['email'];
                            $_SESSION['contact'] = $userdata['contact'];
                            $_SESSION['age'] = $userdata['age'];
                            $_SESSION['gender'] = $userdata['gender'];
                            $_SESSION['address'] = $userdata['address'];
                            $_SESSION['city'] = $userdata['city'];
                            $_SESSION['state'] = $userdata['state'];
                            $_SESSION['pincode'] = $userdata['pincode'];

                //  allow access if match found
                        if($is_matching){
                            ?>
                            <script>
                                alert("login successful");
                                location.replace("dashboard.php");
                            </script>
                            <?php
                        }else{
                            ?>
                            <script>
                                alert("login failed! wrong password!");
                                location.replace("login.php");
                            </script>
                            <?php
                        }
                    }else{
                        ?>
                            <script>
                                alert("user not found");
                                location.replace("login.php");
                            </script>
                            <?php
                    }
                }
            }
        ?>
        <!-- form starts -->
        <div class="login-form">
            <form action="" method="POST">
                <h3>Login</h3>
                <input
                    type="email"
                    name="email"
                    placeholder="Username"
                /><br />
                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                /><br />
                <input
                    type="submit"
                    name="submit"
                    value="Login"
                    id="login-btn"
                /><br />
                <a href="passwordlink.php">forgot password? reset it here</a>
            </form>
            
        </div>
    <?php include 'footer.php'; ?>
</body>
</html>