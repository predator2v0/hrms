<?php
    session_start();
    include 'connection.php';

    if($con){
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $query = "select * from usr_login where email = '$email' ";
            $resultset = mysqli_query($con,$query);
            $resultcount = mysqli_num_rows($resultset);

            if($resultcount){
                $data = mysqli_fetch_assoc($resultset);

                $_SESSION['id'] = $data['id'];
                $_SESSION['name'] = $data['name'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['contact'] = $data['contact'];
                $_SESSION['age'] = $data['age'];
                $_SESSION['gender'] = $data['gender'];
                $_SESSION['address'] = $data['address'];
                $_SESSION['city'] = $data['city'];
                $_SESSION['state'] = $data['state'];
                $_SESSION['pincode'] = $data['pincode'];
            }
                // echo $_SESSION['id']."</br>";
                // echo $_SESSION['name']."</br>";
                // echo $_SESSION['email']."</br>";
                // echo $_SESSION['contact']."</br>";
                // echo $_SESSION['age']."</br>";
                // echo $_SESSION['gender']."</br>";
                // echo $_SESSION['address']."</br>";
                // echo $_SESSION['city']."</br>";
                // echo $_SESSION['state']."</br>";
                // echo $_SESSION['pincode']."</br>";

        }
    }


?>