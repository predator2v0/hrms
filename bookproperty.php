<?php
 session_start();

    if(!$_SESSION['name']){
        ?>
            <script>
                alert("login to continue!!");
            </script>
        <?php
        header('location:login.php');
    } else{
        include 'connection.php';
        if($con){
            $bid = $_GET['id'];
            $bookquery = "update property set bstatus = 1 where id = $bid";
            $bookresult = mysqli_query($con,$bookquery);
            if($bookquery){
                ?>
                <script>
                    alert("property booked successfully!");
                </script>
                <?php
                header('location:dashboard.php');
            }else{
                ?>
                <script>
                    alert("unable to book:) please try again!!");
                </script>
                <?php
            }
        }
    }

?>