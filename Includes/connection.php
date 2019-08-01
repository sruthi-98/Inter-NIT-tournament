<?php
	//Set variables for connection
	$serverName = "localhost";
	$userName="root";
	$password = "";
	$databaseName="db";
	//Create connection
	$connection = mysqli_connect($serverName,$userName,$password,$databaseName);
	//Check Connection
	if(!$connection)
	{	echo '<script>alert("Connection to database failed : '.mysqli_connect_error().'");';
		//go back to the login page
		echo '<script>window.location.href="../Login/login.php";</script>';
		exit();
	}
?>