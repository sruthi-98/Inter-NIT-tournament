<?php
    //If cookies are not already present, redirect to home page //for pages other than home,signup,login page// those ones that need only college code and password
    if(!isset($_COOKIE['college_code'])) 
    {   echo "<script>window.location.href='../../Home/nit-home.html';</script>";
        exit();
    }
    else if(isset($_COOKIE['college_code']) and $_COOKIE['college_code']=="")
    {   echo "<script>window.location.href='../../Home/nit-home.html';</script>";
        exit();
    }   
?>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../form.css">
    <link rel="stylesheet" href="profile.css">
    <title>USER PROFILE</title>
</head>
<body>
    <div class="container-fluid">
          
            <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="row2-1">
                      <ul>
                        <li><img src="../../Image/nitc_logo.png" /></li>

                        <li id="code"><label><?php echo $_COOKIE['college_code']?></label><li>
                  
                        <li><a class="active" href="profile.php">Home</a></li>
                        
                        <li><a  href="../rules.php">Rules</a></li>

                        <?php
                            if(!isset($_COOKIE['sport'])){
                                echo '<li><a href="profile.php">Register</a></li>';
                            }
                            else if($_COOKIE['sport'] == 'Hockey'){
                                echo '<li><a href="../hockey_male.php">Register</a></li>';
                            }
                            else if($_COOKIE['sport'] == "Handball"){
                                    echo '<li><a href="../handball_male.php">Register</a></li>';
                            }
                            else{
                                 echo '<li><a href="profile.php">Register</a></li>';
                            }
                            
                        ?>

                        <li><a href="../arrival.php">Travel Plan</a></li>
                        
                        <li><a href="../schedule.php">Schedule</a></li>
                     
                        <li><a href="../gallery.php">Gallery</a></li>
                                     
                        <li><a href="../notify.php">Notifications</a></li>
                                     
                        <li><a href="../result.php">Results</a></li>

                        <li><a class="logout" href='../../Home/nit-home.html'>Log out</a></li>
                                <script type="text/javascript">
                                    $('a.logout').click( function(){

                                        var pairs = document.cookie.split(";");
                                        for (var i=0; i<pairs.length; i++){
                                            cookie = pairs[i].split("=");
                                            console.log(cookie);
                                            console.log(cookie[0]);console.log(cookie[1]);
                                            document.cookie = cookie[0]+"="+ "" + "" + "; path=/";
                                        }
                                        var pairs = document.cookie.split(";");
                                        console.log(pairs);
                                    });
                                </script>
                
                      </ul>
                    </div>
                    <h1>USER PROFILE</h1>
                                                <br><br>
                            <p class="sport">Select the sport</p>
                            <hr/>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="row2-1"><br><br>
                                <a class="hockey" onclick="location.href='../hockey_male.php'">
                                    <img class="sport" src="../../Image/hockey.jpg">
                                </a>
                                <script type="text/javascript">
                                    $('a.hockey').click( function(){
                                          var d = new Date();
                                          d.setTime(d.getTime() + (24*60*60*1000));
                                          var expires = "expires="+ d.toUTCString();
                                          document.cookie = "sport" + "=" + "Hockey" + ";" + expires + ";path=/";
                                          document.cookie = "gender" + "=" + "M" + ";" + expires + ";path=/";
                                    });
                                </script>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-14" id="row2-1"><br><br>
                                    <a class="handball" onclick="location.href='../handball_male.php'" >
                                        <img id="handball" class="sport" src="../../Image/handball.jpg">
                                    </a>
                                    <script type="text/javascript">
                                    $('a.handball').click( function(){
                                          var d = new Date();
                                          d.setTime(d.getTime() + (24*60*60*1000));
                                          var expires = "expires="+ d.toUTCString();
                                          document.cookie = "sport" + "=" + "Handball" + ";" + expires + ";path=/";
                                          document.cookie = "gender" + "=" + "M" + ";" + expires + ";path=/";
                                    });
                                </script>
                            
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
</html>