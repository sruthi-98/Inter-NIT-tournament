<?php
	//If cookies are not already present, redirect to home page 
	//for pages other than home,signup,login page
	// those ones that need college code, password, sport and gender
	if(!isset($_COOKIE['college_code'])) 
	{	echo "<script>window.location.href='../User/nit-home.php'</script>";
		exit();
	}
	else if(isset($_COOKIE['college_code']) and $_COOKIE['college_code']=="")
	{	echo "<script>window.location.href='../User/nit-home.php'</script>";
		exit();
	}	
	else if(!isset($_COOKIE['sport'])) 
	{	echo "<script>window.location.href='../User/Profile/profile.php'</script>";
		exit();
	}
	else if(isset($_COOKIE['sport']) and $_COOKIE['sport']=="")
	{	echo "<script>window.location.href='../User/Profile/profile.php'</script>";
		exit();
	}
	else if(!isset($_COOKIE['gender'])) 
	{	echo "<script>window.location.href='../User/Profile/profile.php'</script>";
		exit();
	}
	else if(isset($_COOKIE['gender']) and $_COOKIE['gender']=="")
	{	echo "<script>window.location.href='../User/Profile/profile.php'</script>";
		exit();
	}
?>