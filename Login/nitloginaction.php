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

		//Load data from login form
		$college_code= $_POST["uname"];
		//$pwd=md5($_POST["psw"]);
		$pwd=$_POST["psw"];
		$remember=$_POST["remember"];

		//Query to access password database
		$query="SELECT * FROM password WHERE college_code='$college_code' AND pwd='$pwd'";
		$result=mysqli_query($connection,$query);
		$nrow=mysqli_num_rows($result);
		//echo $result;
		
		//if result table has at least one row //expected one row only
		if($nrow==0)
		{	echo "<script>alert('Invalid Username or password');</script>";
			echo '<script>window.history.back();</script>';
		}
		else
		{	echo '<script>console.log("Query for password database executed successfully\n");</script>';
			
			//fetch each row from result//expected one row only
			$row=mysqli_fetch_array($result);
			
			//SET Cookies
			if($remember=="on")
				$time=time()+3600*24*30;//1 month
			else
				$time=time()+86400;//1 day

			echo "<script>
                  document.cookie = 'college_code' + '=' + '$college_code' + ';' + '$time' + ';path=/';
			      document.cookie = 'pwd' + '=' + '$pwd' + ';' + '$time' + ';path=/';
			      </script>";

			//setcookie("college_code",$college_code,$time, "/");
			//setcookie("pwd", $pwd, $time, "/");

			//Alert to show the username
			echo '<script>';
			echo 'alert("Welcome!\n'.$uname.' have successfully logged in.");';
			echo '</script>';

			if($college_code=="admin")
			{	//redirect to admin profile on clicking okay button of alert
				echo '<script>window.location.href="../Admin/admin.php";</script>';
				exit();
			}
			else
			{	//redirect to user profile page on clicking okay button of alert
				echo '<script>window.location.href="../User/Profile/profile.php";</script>';
				exit();
			}
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