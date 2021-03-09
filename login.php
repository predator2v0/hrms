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
                        $password = mysqli_fetch_assoc($resultset);
                        $matching_password = $password['password'];
                        // for fetching the username
                        $_SESSION['username'] = $password['name'];
                        $is_matching = password_verify($pass, $matching_password);

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
                    type="text"
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
            </form>
        </div>
    <?php include 'footer.php'; ?>
</body>
</html>