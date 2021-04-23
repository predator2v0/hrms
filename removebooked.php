<?php
    include 'connection.php';

    if($con){

        $updid = $_GET['id'];

        $update_query = "update property set bstatus = 0 where id = $updid ";
        // execute query
        $updateresponse = mysqli_query($con,$update_query);

        if($updateresponse){
            ?>
                <script>
                    alert("removed property from booked!!");
                </script>
            <?php
        }else{
            ?>
                <script>
                    alert("unable to cancel booking!! try again later :)");
                </script>
            <?php
        }
        header('location:bookedproperty.php');
    }
?>