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
<?php include 'header.php'?>
<section class="register-container">
    <form action="">
        <div class="personal-info">
            <h3>personal information</h3>
            <div class="ipfield">
                <label>name:</label>
                <input type="text">
            </div>
            <div class="ipfield">
                <label>email:</label>
                <input type="email">
            </div>
            <div class="ipfield">
                <label>contact no:</label>
                <input type="phone">
            </div>
            <div class="ipfield">
                <label>age:</label>
                <input type="text">
            </div>
            <div class="ipfield">
                <label>gender:</label>
                <input type="radio">male
                <input type="radio">female
                <input type="radio">other
            </div>
        </div>
        <div class="contact-info">
            <h3>contact information</h3>
            <div class="ipfield">
                <label>address:</label>
                <input type="text">
            </div>
            <div class="ipfield">
                <label>city:</label>
                <input type="text">
            </div>
            <div class="ipfield">
                <label>state:</label>
                <input type="text">
            </div>
            <div class="ipfield">
                <label>zip code:</label>
                <input type="text">
            </div>
        </div>
        <div class="password-info">
            <h3>password setting</h3>
            <div class="ipfield">
                <label>password:</label>
                <input type="password">
            </div>
            <div class="ipfield">
                <label>confirm password:</label>
                <input type="password">
            </div>
        </div>
        <div class="submit-reset">
            <input type="submit">
            <input type="reset">
        </div>
    </form>
</section>
<?php include 'footer.php'?>
</body>
</html>