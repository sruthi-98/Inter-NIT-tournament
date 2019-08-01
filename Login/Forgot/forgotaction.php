<?php
  //If cookies are already present, redirect to profile page //for home,signup,login page
  if(isset($_COOKIE['college_code'])) 
  { if($_COOKIE['college_code']!="")
    {	if($_COOKIE['college_code']=="admin")
    		echo '<script>window.location.href="../Admin/admin.php";</script>';
    	else
    		echo '<script>window.location.href="../User/Profile/profile.php"</script>';
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
			echo '<script>window.history.back();</script>';
			exit();
		}

		//Load from form
		$college_code= $_POST["uname"];
		//Query
		$Query = "SELECT email,pwd FROM password WHERE college_code='$college_code'";

		//result table of the query
		$result=mysqli_query($connection,$Query);
		$nrow=mysqli_num_rows($result);
		
		//if result table has at least one row//expected only one row
    	if($nrow)
    	{	echo '<script>console.log("Query for password and email has executed successfully\n");</script>';
    		$row=mysqli_fetch_array($result);
    		//Send mail to the user with the given password 
			$mailto = $row['email'];
			$mailSub = "Password for Inter NIT Sports Tournament 2019";
			$mailMsg = "Hello ".$college_code.",<br><br>     Your password for your account in Inter NIT Sports Tournament : ".$row['pwd']."<br><br>Please try to login again.<br><br>NIT Calicut.";
			require '../../PHPMailer/PHPMailerAutoload.php';
			$mail = new PHPMailer();
			$mail ->IsSmtp();
			$mail ->SMTPDebug = 0;
			$mail ->SMTPAuth = true;
			$mail ->SMTPSecure = 'ssl';
			$mail ->Host = "smtp.gmail.com";
			$mail ->Port = 465; // or 587
			$mail ->IsHTML(true);
			$mail ->Username = "internitc19@gmail.com";
			$mail ->Password = "nitc1234";
			$mail ->SetFrom("internitc19@gmail.com");
			$mail ->Subject = $mailSub;
			$mail ->Body = $mailMsg;
			$mail ->AddAddress($mailto);
			if($mail->Send())
			{	
				//Alert message for saying we have sent the mail
				echo '<script>';
				echo 'alert("Password is mailed to '.$mailto.' \nPlease check the mail.");';
				//redirect to login page on clicking okay button of alert
				echo 'window.location.href="../nitlogin.php";';
				echo '</script>';
			}
			else
			{	
				//Alert message for saying we could not sent the mail
				echo '<script>';
				echo 'alert("Error in sending password to '.$mailto.' \n.Please try again.");';
				//redirect to login page on clicking okay button of alert
				echo 'window.history.back();';
				echo '</script>';
			}
    	}
    	else
    	{	echo "<script>alert('Invalid username.Please SIGN UP.');";
    		//redirect to sign up page on clicking okay button of alert
			echo 'window.location.href="../../User/Signup/signup.php";';
			echo '</script>';
		}
    	// Free result set
    	mysqli_free_result($result);
	}
?>