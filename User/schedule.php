<?php
    //If cookies are not already present, redirect to home page //for pages other than home,signup,login page// those ones that need only college code and password
    if(!isset($_COOKIE['college_code'])) 
    {   echo "<script>window.location.href='../Home/nit-home.html';</script>";
        exit();
    }
    else if(isset($_COOKIE['college_code']) and $_COOKIE['college_code']=="")
    {   echo "<script>window.location.href='../Home/nit-home.html';</script>";
        exit();
    }   
?>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="form.css">
    <title>SCHEDULE</title>
    <style>
    	p.contact{
            height: 50px !important;
            width: 80vw !important;
            margin: 0vw 0vw 0vw 18vw !important;
            position: fixed;
            bottom: 0;
            background-color: white;
        }
    	h1{
    		margin-left: 45vw !important;
    	}
    	th{
            text-align: center;
            padding: 2px;
            border: 1px solid black;
        }
        hr{
        	margin-left: 300% !important;
        	width: 100vh;
        }
        td{
            padding: 2px;
            border: 1px solid black;
        }
    	table.schedule{
    		margin: 100px 0px 100px 35vw;
    		text-align: center;
    		width: 600px;
    		height: 200px;
    		max-height: 800px;
    		border: 1px solid black;
    		text-transform: uppercase;
    		font-size: 16px;
    	}
    </style>	
</head>
<body>
    <div class="container-fluid">
         
            <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="row2-1">
                      <ul>
                      	<li><img src="../Image/nitc_logo.png" /></li>

                      	<li id="code"><label><?php echo $_COOKIE['college_code']?></label><li>
                  
                        <li><a href="Profile/profile.php">Home</a></li>
                        
                        <li><a  href="rules.php">Rules</a></li>

                        <?php
                            if(!isset($_COOKIE['sport'])){
                                echo '<li><a href="Profile/profile.php">Register</a></li>';
                            }
                            else if($_COOKIE['sport'] == 'Hockey'){
                                echo '<li><a href="hockey_male.php">Register</a></li>';
                            }
                            else if($_COOKIE['sport'] == "Handball"){
                                echo '<li><a href="handball_male.php">Register</a></li>';
                            }
                            else{
                                echo '<li><a href="Profile/profile.php">Register</a></li>'; 
                            }
                        ?>

                        <li><a href="arrival.php">Travel Plan</a></li>
                        
                        <li><a class="active" href="schedule.php">Schedule</a></li>
                     
                        <li><a href="gallery.php">Gallery</a></li>
                                     
                        <li><a href="notify.php">Notifications</a></li>
                                     
                        <li><a href="result.php">Results</a></li>

                        <li><a class="logout" href='../Home/nit-home.html'>Log out</a></li>
                                <script type="text/javascript">
                                    $('a.logout').click( function(){

                                        var pairs = document.cookie.split(";");
                                        for (var i=0; i<pairs.length; i++){
                                            cookie = pairs[i].split("=");
                                            console.log(cookie);
                                            console.log(cookie[0]);console.log(cookie[1]);
                                            document.cookie = cookie[0]+"="+ "" + "" + "; path=/";
                                        }
                                    });
                                </script>
                
                       </ul>

                       <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" id="row2-1">
                            <div class="row sticky" id="row2" >
                                <h1>SCHEDULE</h1> <hr />
                       		</div>
<?php

$dir = "C:/wamp64/www/Schedule//";

echo '
		<table border=1 class="schedule">
        <tr>
        <th>Description</th>
        <th>Link to schedule</th>
        </tr>';

// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){

    	//Obtaining description from database
	    $serverName = "localhost";
	    $userName = "root";
	    $password = "";
	    $databaseName = "db";

	    $connection = mysqli_connect($serverName,$userName,$password,$databaseName);
	    if(!$connection){
	        die("Connection failed: ".mysqli_connect_error());

	    }

	    $result = mysqli_query($connection,"SELECT * FROM schedule where file_name = '$file'");
	    $row = mysqli_fetch_array($result);
	    if(gettype($row) != 'NULL'){
	    	 echo '<tr>';
	    	 echo "<td>" . $row['description'] . "</td>";
	    	 echo '<td>';
	    	 echo '<a href="/Schedule/'.$file.'">'.$file.'</a>';
	    	 echo '</td></tr>';
	    }
	   
    }
  }
  //closedir($dh);
}
?>

</table>
</div>
</div>
<div class="row">
<footer>
    <br>
  <font color="black" size="3">
   <p align="center" class="contact">Contact : 989765876,934908723</p>
  </font>
</footer>
</div>
</div>
</body>
</html>