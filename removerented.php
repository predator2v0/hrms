<?php
    include 'connection.php';

    if($con){

        $updid = $_GET['id'];

        $update_query = "update property set rstatus = 0,temail = NULL where id = $updid ";
        // execute query
        $updateresponse = mysqli_query($con,$update_query);

        if($updateresponse){
            ?>
                <script>
                    alert("removed property from rented!!");
                </script>
            <?php
        }else{
            ?>
                <script>
                    alert("unable to perform action!! try again later :)");
                </script>
            <?php
        }
        header('location:rentedproperty.php');
    }
?>