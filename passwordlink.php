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
    <title>reset password | hrms</title>
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
                        </li>-->
                        <li class="nav-item">
                            <a href="login.php" class="nav-link text-dark"
                                >login</a
                            >
                        </li> 
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
                if(isset($_GET['submit'])){
                    $email = $_GET['email'];

                    $fetch_query = "select * from usr_login where email = '$email' ";
                    $result = mysqli_query($con, $fetch_query);
                    $row_count = mysqli_num_rows($result);
                    if($row_count){
                        $res = mysqli_fetch_assoc($result);
                        $recipent = $res['email'];
                        $subject = "password recovery link";
                        $passwordlink = "http://localhost/hrms/updatepassword.php?id="."{$recipent}";
                        $body = "the recovery link for updating your password is "."{$passwordlink}";
                        $headers = "From:info.customcastle@gmail.com";
                        if(mail($recipent,$subject,$body,$headers)){
                            ?>
                                <script>
                                    alert("password recovery link sent to your email id.");
                                    location.replace("login.php");
                                </script>
                            <?php
                        } else{
                            ?>
                                <script>
                                    alert("unable to send the recovery link. try again :(");
                                </script>
                            <?php
                        }
                    } else{
                        ?>
                                <script>
                                    alert("user not registered!!");
                                </script>
                            <?php
                    }
                }
            }
        ?>
        <!-- form starts -->
        <div class="login-form">
            <form action="" method="GET">
                <h3>Password Recovery Wizard</h3>
                <input
                    type="email"
                    name="email"
                    placeholder="enter registered email"
                /><br />
                <input
                    type="submit"
                    name="submit"
                    value="send link"
                    id="login-btn"
                /><br />
            </form>
            
        </div>
    <?php include 'footer.php'; ?>
</body>
</html>