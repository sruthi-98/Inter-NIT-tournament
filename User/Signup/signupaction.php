<?php
  //If cookies are already present, redirect to profile page //for home,signup,login page
  if(isset($_COOKIE['college_code'])) 
  { if($_COOKIE['college_code']!="")
    {	if($_COOKIE['college_code']=="admin")
    		echo '<script>window.location.href="../../Admin/admin.php";</script>';
    	else
    		echo '<script>window.location.href="../Profile/profile.php"</script>';
    }
  }
?>
<?php  
	if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['submit']))
	{	
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
			echo '<script>window.location.href="../../Login/nitlogin.php";</script>';
			exit();
		}

		//Load data from signup form
		$college_code= $_POST["nitlist"];
		$email= $_POST["email"];
		//$pwd= md5($_POST["pwd"]);
		$pwd= $_POST["pwd"];

		$insertRecordQuery = "INSERT INTO password (college_code, email, pwd) VALUES ('$college_code', '$email', '$pwd')";
	    $result=mysqli_query($connection,$insertRecordQuery);
	    if(!$result)
	    {	$error = mysqli_error($connection);
	    	echo '<script>alert("Error in signing up.\nError : '.$error.'\nPlease try again or contact us." );';
			//redirect to signup page on clicking okay button of alert
			echo 'window.history.back();';
			echo '</script>';
			exit();
		}
		else
		{	//Alert to show the username
				echo '<script>';
				echo 'alert("You have successfully signed up.\nKindly note the username for future purpose.\nYour username:'.$college_code.'");';
				//redirect to login page on clicking okay button of alert
				echo 'window.location.href="../../Login/nitlogin.php";';
				echo '</script>';
				exit();
		}
		// Free result set
		mysqli_free_result($result);			
			
		//Close Connection
	    $closeConnection=mysqli_close($connection);
	    
	    //Check closing of connection
	    if($closeConnection)
	    	echo '<script>console.log("Connection closed successfully\n")</script>';
		else
	        echo '<script>console.log("Error in closing the connection to database\n" );</script>';
	}
?>