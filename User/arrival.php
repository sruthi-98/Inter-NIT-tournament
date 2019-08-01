<?php
    //If cookies are not already present, redirect to home page 
    //for pages other than home,signup,login page
    // those ones that need only college code and password and sport
    if(!isset($_COOKIE['college_code'])) 
    {   echo "<script>window.location.href='../Home/nit-home.html';</script>";
        exit();
    }
    else if(isset($_COOKIE['college_code']) and $_COOKIE['college_code']=="")
    {   echo "<script>window.location.href='../Home/nit-home.html';</script>";
        exit();
    }   
    else if(!isset($_COOKIE['sport'])) 
    {   echo "<script>window.location.href='Profile/profile.php';</script>";
        exit();
    }
    else if(isset($_COOKIE['sport']) and $_COOKIE['sport']=="")
    {   echo "<script>window.location.href='Profile/profile.php';</script>";
        exit();
    }
?>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="form.css">
    <title>ARRIVAL FORM</title>
    <style>
        form{
            margin: 0px 0px 0px 0vw !important;
            height: 5vw;
            width: 80vw;
        }
        h3{
            margin-left: 35vw;
        }
        p.contact{
            height: 50px !important;
            width: 80vw !important;
            margin: 0vw 0vw 0vw 18vw !important;
            position: fixed;
            bottom: 0;
            background-color: white;
        }
        input[type="file"]{
            margin: 0px 0px 0px 2vw !important;
            display: initial !important;
        }
        label#arrival{
            margin-left: 30%;
        }
        label.upload{
            margin-left: 23.5vw;
        }
        input{
            margin-left: 50%;
            height: 35px;
            width: 220px;
        }
        select{
            height: 35px;
            width: 220px;
        }
        table{
            margin-left: 22%;
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

                        <li><a class="active" href="arrival.php">Travel Plan</a></li>
                        
                        <li><a href="schedule.php">Schedule</a></li>
                     
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
                    </div>
                    
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" id="row2-1">
                            <div class="row" id="row2" >
                                <h1>TRAVEL PLAN</h1>
                            </div>
                            <ul class="top" id="navbar">
                              <li><a class="active" id="top" href="arrival.php">Arrival</a></li>
                              <li><a id="top" href="return.php">Return</a></li>            
                            </ul>

                        <form action="arrivalAction.php" method="POST" target="_blank" enctype="multipart/form-data">
                            <div class="form-group">
              
              
                                    <h3>ARRIVAL</h3>
                                    <hr />
                                    <font size='3'>
                                    <label id="arrival">Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input type="date" name="doa" id="doa"><br>
                                    
                                    <label id="arrival" for="mode">Mode:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                  
                                    <select name="mode">
                                      <option value="Flight">Flight</option>
                                      <option value="Train">Train</option>
                                      <option value="Bus">Bus</option>
                                    </select><br>
                  
                                    <label id="arrival" for="pick">Pick up point:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                  
                                    <select name="point">
                                      <option value="Airport">Kozhikode Airport</option>
                                      <option value="Railway Station">Kozhikode Railway Station</option>
                                      <option value="Bus stand">Kozhikode Bus Stand</option>
                                    </select>
                                    
                                    <br>
                            
                                    <label class="upload">Upload ticket:</label> 
                                    <input type="file" name="file" id="fileToUpload">
                                    
                                    <br>
                                    </font>
                                    <center><button type="submit" value="Submit">SUBMIT</button></center>
                                    <hr />
                            </div>
                        </form>
                    </div>
        
            </div>
        </div>
        <footer>
                <br>
              <font color="black" size="3">
               <p align="center" class="contact">Contact : 989765876,934908723</p>
              </font>
        </footer>
</body>