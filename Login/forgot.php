<?php
	if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['submit']))
	{
		//Load from form
		$uname= $_POST["uname"];

		//Make the data suitable for the database
		$sport=substr($uname,-2);
		$college_code=substr($uname,0,-2);

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
	    	die(" Connection to database failed : ".mysqli_connect_error());
		}
	    else
		{	echo '<script>console.log("Connected successfully to the database\n")</script>';
			
			//Query
			$Query = "SELECT email,pwd FROM password WHERE college_code='$college_code' AND sport='$sport'";
			
			//result table of the query
			$result=mysqli_query($connection,$Query);
			
			//if result table has at least one row
	    	if($result)
	    	{	echo '<script>console.log("Query for password and email has executed successfully\n");</script>';
	    		//fetch each row from the result table
				while($row=mysqli_fetch_array($result)) 
				{	
					//Send mail to the user with the given password 
					$mailto = $row['email'];
					$mailSub = "Password for Inter NIT Sports Tournament 2019";
					$mailMsg = "Hello ".$uname.",<br><br>     Your password for your account in Inter NIT Sports Tournament : ".$row['pwd']."<br><br>Please try to login again.<br><br>NIT Calicut.";
					require '../PHPMailer/PHPMailerAutoload.php';
					$mail = new PHPMailer();
					$mail ->IsSmtp();
					$mail ->SMTPDebug = 0;
					$mail ->SMTPAuth = true;
					$mail ->SMTPSecure = 'ssl';
					$mail ->Host = "smtp.gmail.com";
					$mail ->Port = 465; // or 587
					$mail ->IsHTML(true);
					$mail ->Username = "preethiannjacob2019@gmail.com";
					$mail ->Password = "preethiannjacob@nitc";
					$mail ->SetFrom("preethiannjacob2019@gmail.com");
					$mail ->Subject = $mailSub;
					$mail ->Body = $mailMsg;
					$mail ->AddAddress($mailto);
					if($mail->Send())
					{	
						//Alert message for saying we have sent the mail
						echo '<script>';
						echo 'alert("Password is mailed to '.$mailto.' \nPlease check the mail.");';
						//redirect to login page on clicking okay button of alert
						echo 'window.location.href="../Login/nitlogin.html";';
						echo '</script>';
					}
					else
					{	
						//Alert message for saying we could not sent the mail
						echo '<script>';
						echo 'alert("Error in sending password to '.$mailto.' \n.Please try again.");';
						//redirect to login page on clicking okay button of alert
						echo 'window.location.href="../Login/nitlogin.html";';
						echo '</script>';
					}
				}
				// Free result set
    			mysqli_free_result($result);
			}
			else
			{
				echo '<script>alert("Error in getting data from database.\nError : '.$error.'\nPlease try again or contact us." );';
				//redirect to forgot password page on clicking okay button of alert
				echo 'window.history.back();';
				echo '</script>';
			}
		}
		//Close Connection
	    $closeConnection=mysqli_close($connection);
	    
	    //Check closing of connection
	    if($closeConnection)
	    	echo '<script>console.log("Connection closed successfully\n")</script>';
		else
	        echo '<script>alert("Error in closing the connection to database\n" );</script>';
	}
?>