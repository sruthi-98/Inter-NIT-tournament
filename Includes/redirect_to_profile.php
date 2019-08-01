<?php
	//If cookies are already present, redirect to profile page //for home,signup,login page
	if(isset($_COOKIE['college_code']))	
	{	if($_COOKIE['college_code']!="")
			echo "<script>window.location.href='../User/Profile/profile.php'</script>";
	}
?>