<?php
	//If cookies are not already present, redirect to home page //for pages other than home,signup,login page// those ones that need only college code and password
	if(!isset($_COOKIE['college_code'])) 
	{	echo "<script>window.location.href='../Home/nit-home.html'</script>";
		exit();
	}
	else if(isset($_COOKIE['college_code']) and $_COOKIE['college_code']=="")
	{	echo "<script>window.location.href='../Home/nit-home.html'</script>";
		exit();
	}	
?>