<?php
    $username = "root";
    $password = "";
    $server = "localhost";
    $db = "hrms";

    $con = mysqli_connect($server,$username,$password,$db);
    // if($con){
    //     echo "connection successful";
    // }else{
    //     echo "connection failed";
    // }
    if($con){
        if(isset($_POST['submit'])){
        $u_name = $_POST['u_name'];
        $u_email = $_POST['u_email'];
        $u_message = $_POST['u_message'];

        $insert_query = "insert into contact_us(u_name, u_email, u_message) values('$u_name','$u_email','$u_message')";
        $res = mysqli_query($con,$insert_query);

        header("Location: http://localhost/hrms/index.html");
    }
    }
  
?>