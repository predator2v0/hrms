<?php
	$user = "root";
	$password = "";
	$server = "localhost";
	$db = "hrms";

	$con = mysqli_connect($server,$user,$password,$db);

    /*
	if($con){
		?>
		<script>alert("connection successful");</script>
		<?php
	}else{
		?>
		<script>alert("connection failed"); </script>
		<?php
	}
    */
?>