<?php
    include 'connection.php';

    if($con){

        $delid = $_GET['id'];

        $delquery = "delete from property where id = $delid ";
        $delresponse = mysqli_query($con,$delquery);

        if($delresponse){
            ?>
                <script>
                    alert("property deleted successfully!!");
                </script>
            <?php
        }else{
            ?>
                <script>
                    alert("unable to delete property!! try again later :)");
                </script>
            <?php
        }
        header('location:viewallproperty.php');
    }
?>