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

<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    	<link rel="stylesheet" href="form.css">
    	<title>GALLERY</title>
		<style>
			p.contact{
	            height: 50px !important;
	            width: 80vw !important;
	            margin: 0vw 0vw 0vw 18vw !important;
	            position: fixed;
	            bottom: 0;
	            background-color: white;
	        }
			* {
			  box-sizing: border-box;
			}
			img.gallery{
	            margin: 0px 0px 10px 0px !important;
	            width: 100% !important;
	        }
	        h1{
	    		margin-left: 45vw !important;
	    	}
	        hr{
	            margin-left: 300% !important;
	            width: 100vh;
	        }
			div.row#gallery{
			  /*float: left;*/
			  width: 50vw;
			  height: 100%;
			  padding: 10px;
			  margin: 2vw 0vw 2vw 27.5vw;
			  /*margin-top: 70px;*/
			}

			/* Clearfix (clear floats) */
			
			@media screen and (max-width: 1000px) {
			  .column {
			    width: 100%;
			  }
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
                        
                        <li><a href="schedule.php">Schedule</a></li>
                     
                        <li><a class="active" href="gallery.php">Gallery</a></li>
                                     
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
                                <h1>GALLERY</h1> <hr />
                            </div><br>

						<?php
						$files = glob("../Images/"."*.*");
						$countFiles = count($files); 
		
						for ($i=0; $i<$countFiles; $i++)
						{
						    $num = $files[$i];
						    
						    echo '<div class="row" id="gallery">
						    		<img class="gallery" src="'.$num.'">
						  		</div>';
						   
						}
						?>
						</div>
					</div>
					<div class="row" style="position: relative;">
						<footer style="position: absolute;">
						    <br>
						  <font color="black" size="3">
						   <p align="center" class="contact">Contact : 989765876,934908723</p>
						  </font>
						</footer>
					</div>
				</div>		
		</body>
</html>