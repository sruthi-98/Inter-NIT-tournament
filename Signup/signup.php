<?php  
	if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['submit']))
	{	
		//Load data from signup form
		$college_code= $_POST["nitlist"];
		$sport=$_POST["sport"];
		$email= $_POST["email"];
		$pwd= $_POST["pwd"];
		/*echo $college_code;
		echo $sport;
		echo $email;
		echo $pwd;*/

		//Set variables for connection
	    $serverName = "localhost";
	    $userName="root";
	    $password = "";
	    $databaseName="db";

		//Create connection
	    $connection = mysqli_connect($serverName,$userName,$password,$databaseName);
	    //Check Connection
	    if(!$connection)
	    {	echo '<script>alert("Failed to connect the database")</script>';
	    	die(" Connection to the database failed : ".mysqli_connect_error());
		}
	    else
		{	echo '<script>console.log("Connected successfully to the database\n")</script>';
		    //Query
		    $insertRecordQuery = "INSERT INTO password (college_code, sport, email, pwd) VALUES ('$college_code', '$sport', '$email', '$pwd')";
		    $res=mysqli_query($connection,$insertRecordQuery);
	    	if($res)
		        echo '<script>console.log("Record inserted successfully\n");</script>';
		    else
		    {	$error = mysqli_error($connection);
		    	echo '<script>alert("Error in record insertion.\nError : '.$error.'\nPlease try again or contact us." );';
				//redirect to signup page on clicking okay button of alert
				echo 'window.history.back();';
				echo '</script>';
			}
			//Close Connection
		    $closeConnection=mysqli_close($connection);
		    //Check closing of connection
		    if($closeConnection)
		    {	echo '<script>console.log("Connection closed successfully\n")</script>';
				if($res)
				{	//Alert to show the username
					echo '<script>';
					echo 'alert("You have successfully signed up.\nKindly note the username for future purpose.\nYour username:'.$college_code.''.$sport.'");';
					//redirect to login page on clicking okay button of alert
					echo 'window.location.href="../Login/nitlogin.html";';
					echo '</script>';
				}  	
			}
		    else
		    {	echo '<script>alert("Error in closing the connection to database\n" );';
				//redirect to signup page on clicking okay button of alert
				echo 'window.history.back();';
				echo '</script>';
			}
		}
	} 		
?>