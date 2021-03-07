<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register | hrms</title>
    <?php include 'links.php'?>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
</head>
<body class="register-body">

<!-- include header navbar -->
<?php include 'header.php';?>

<!-- backend script for registration form -->
<?php
    include 'connection.php';

    if($con){
        if(isset($_POST['submit'])){
            $name = mysqli_real_escape_string($con,$_POST['u_name']);
            $email = mysqli_real_escape_string($con,$_POST['u_email']);
            $contact = mysqli_real_escape_string($con,$_POST['u_phno']);
            $age = mysqli_real_escape_string($con,$_POST['u_age']);
            $gender = mysqli_real_escape_string($con,$_POST['gender']);

            $address = mysqli_real_escape_string($con, $_POST['u_addr']);
            $city = mysqli_real_escape_string($con, $_POST['u_city']);
            $state = mysqli_real_escape_string($con, $_POST['u_state']);
            $pincode = mysqli_real_escape_string($con, $_POST['u_pincode']);

            $password = mysqli_real_escape_string($con, $_POST['u_password']);
            $cpassword = mysqli_real_escape_string($con, $_POST['u_cpassword']);


            //check if registered email is present already
            $emailquery = "select * from usr_login where email = '$email' ";
            $resultset = mysqli_query($con, $emailquery);
            $emailcount = mysqli_num_rows($resultset);

            if($emailcount > 0){
                ?>
                <script>
                    alert("email already registered!");
                </script>
                <?php
            }else{
                if($password == $cpassword){
                    $pass = password_hash($password, PASSWORD_BCRYPT);
                    $insertquery = "insert into usr_login(name,email,contact,age,gender,address,city,state,pincode,password) values('$name','$email','$contact',$age,'$gender','$address','$city','$state','$pincode','$pass')";
                    $executequery = mysqli_query($con,$insertquery);
                    if($executequery){
                        ?>
                <script>
                    alert("User registered successfully");
                </script>
                <?php
                    }else{
                        ?>
                <script>
                    alert("Unable to register!!");
                </script>
                <?php
                    }
                }else{
                    ?>
                <script>
                    alert("password and confrim password does not match!");
                </script>
                <?php
                }
            }
        }
    }
?>

<!-- registration form -->
<section class="register-container">
    <form action="" method="POST">
        <div class="personal-info">
            <h3>personal information</h3>
            <div class="ipfield">
                <label>name:</label>
                <input type="text" name="u_name">
            </div>
            <div class="ipfield">
                <label>email:</label>
                <input type="email" name="u_email">
            </div>
            <div class="ipfield">
                <label>contact no:</label>
                <input type="phone" name="u_phno">
            </div>
            <div class="ipfield">
                <label>age:</label>
                <input type="text" name="u_age">
            </div>
            <div class="ipfield">
                <label>gender:</label>
                <div class="gender-select">
                <input type="radio" name="gender" value="male">male
                <input type="radio" name="gender" value="female">female
                <input type="radio" name="gender" value="other">other
                </div>
            </div>
        </div>

        <div class="contact-info">
            <h3>contact information</h3>
            <div class="ipfield">
                <label>address:</label>
                <input type="text" name="u_addr">
            </div>
            <div class="ipfield">
                <label>city:</label>
                <input type="text" name="u_city">
            </div>
            <div class="ipfield">
                <label>state:</label>
                <input type="text" name="u_state">
            </div>
            <div class="ipfield">
                <label>pincode:</label>
                <input type="text" name="u_pincode">
            </div>
        </div>

        <div class="password-info">
            <h3>password setting</h3>
            <div class="ipfield">
                <label>password:</label>
                <input type="password" name="u_password">
            </div>
            <div class="ipfield">
                <label>confirm password:</label>
                <input type="password" name="u_cpassword">
            </div>
        </div>
        <div class="submit-reset">
            <input type="submit" name="submit" value="register">
            <input type="reset" name="reset">
        </div>
    </form>
</section>
<?php include 'footer.php';?>
</body>
</html>