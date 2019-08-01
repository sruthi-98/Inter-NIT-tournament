<?php
  include('beginformaction.php');
  //If cookies are not already present, redirect to home page 
  //for pages other than home,signup,login page
  // those ones that need only college code and password and sport
  if(!isset($_COOKIE['college_code'])) 
  { echo "<script>window.location.href='../Home/nit-home.html';</script>";
    exit();
  }
  else if(isset($_COOKIE['college_code']) and $_COOKIE['college_code']=="")
  { echo "<script>window.location.href='../Home/nit-home.html';</script>";
    exit();
  } 
  else if(!isset($_COOKIE['sport'])) 
  { echo "<script>window.location.href='Profile/profile.php';</script>";
    exit();
  }
  else if(isset($_COOKIE['sport']) and $_COOKIE['sport']=="")
  { echo "<script>window.location.href='Profile/profile.php';</script>";
    exit();
  }
?>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="form.css">
    <title>REGISTRATION FORM</title>
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

                        <li><a class="active" href="handball_male.php">Register</a></li>

                        <li><a href="arrival.php">Travel Plan</a></li>
                        
                        <li><a href="schedule.php">Schedule</a></li>
                     
                        <li><a href="gallery.php">Gallery</a></li>
                                     
                        <li><a href="notify.php">Notifications</a></li>
                                     
                        <li><a href="result.php">Results</a></li>

                        <li><a class="logout" onclick="location.href='../Home/nit-home.html'">Log out</a></li>
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
                            <div class="row sticky" id="row2" >
                                <h1>HANDBALL</h1> 
                            </div>
                            <ul class="top sticky" id="navbar">
                              <li><a class="male" id="top" href="handball_male.php">Male Team</a></li>
                              <script type="text/javascript">
                                $('a.male').click( function(){
                                      var d = new Date();
                                      d.setTime(d.getTime() + (24*60*60*1000));
                                      var expires = "expires="+ d.toUTCString();
                                      document.cookie = "gender" + "=" + "M" + ";" + expires + ";path=/";
                                });
                              </script>

                              <li><a class="female active" id="top" href="handball_female.php">Female Team</a></li>
                              <script type="text/javascript">
                                $('a.female').click( function(){
                                      var d = new Date();
                                      d.setTime(d.getTime() + (24*60*60*1000));
                                      var expires = "expires="+ d.toUTCString();
                                      document.cookie = "gender" + "=" + "F" + ";" + expires + ";path=/";
                                });
                              </script>  

                            </ul>
                        
                            <form action="formaction.php" method="POST" target="_blank">
                                <div class="form-group">
                                  <h3>Team Details</h3>   
                                  <label for="tname" id="t">Team name:</label>
                                  <input type="text" id="ti" height="1" name="team" value="<?php echo( htmlspecialchars( $team_name ) ); ?>" required ><br>
                                  <label for="champ" id="c">Champions in last three years?:</label>
                                  <label><input type="radio" name="champ" id="ci" value="Yes" <?php echo ($champion=='Yes')?'checked':'' ?>> Yes</label>
                                  <label><input type="radio" name="champ" value="No" <?php echo ($champion=='No')?'checked':'' ?> > No</label><br>
                                  <label for="sp" id="s">No of state players:</label>
                                  <input name="sp" type="text" id="si" value="<?php echo( htmlspecialchars( $state_player ) ); ?>">
                                  <hr/>

                                  <h3>Captain</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name1" value="<?php echo( htmlspecialchars( $name[1] ) ); ?>" ><br>
                                  <label for="email" id="e" >Email:</label>
                                  <input type="text"  name="email1" id="ei" value="<?php echo( htmlspecialchars( $email[1] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno1" id="mi" value="<?php echo( htmlspecialchars( $mob[1] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food1" value="Veg" <?php echo ($food[1]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food1" value="Non Veg" <?php echo ($food[1]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob1" id="di" value="<?php echo( htmlspecialchars( $dob[1] ) ); ?>">
                                   <hr/>
                                   
                                   <h3>Player 1</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name2" value="<?php echo( htmlspecialchars( $name[2] ) ); ?>" ><br>
                                  <label for="email" id="e">Email:</label>
                                  <input type="text"  name="email2" id="ei" value="<?php echo( htmlspecialchars( $email[2] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno2" id="mi" value="<?php echo( htmlspecialchars( $mob[2] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food2" value="Veg" <?php echo ($food[2]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food2" value="Non Veg" <?php echo ($food[2]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob2" id="di" value="<?php echo( htmlspecialchars( $dob[2] ) ); ?>">
                                   <hr/>
                                   
                                   <h3>Player 2</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name3" value="<?php echo( htmlspecialchars( $name[3] ) ); ?>" ><br>
                                  <label for="email" id="e">Email:</label>
                                  <input type="text"  name="email3" id="ei" value="<?php echo( htmlspecialchars( $email[3] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno3" id="mi"  value="<?php echo( htmlspecialchars( $mob[3] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food3" value="Veg"  <?php echo ($food[3]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food3" value="Non Veg" <?php echo ($food[3]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob3" id="di" value="<?php echo( htmlspecialchars( $dob[3] ) ); ?>">
                                   <hr/>
                                   
                                   <h3>Player 3</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name4" value="<?php echo( htmlspecialchars( $name[4] ) ); ?>" ><br>
                                  <label for="email" id="e">Email:</label>
                                  <input type="text"  name="email4" id="ei" value="<?php echo( htmlspecialchars( $email[4] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno4" id="mi"  value="<?php echo( htmlspecialchars( $mob[4] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food4" value="Veg"  <?php echo ($food[4]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food4" value="Non Veg" <?php echo ($food[4]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob4" id="di" value="<?php echo( htmlspecialchars( $dob[4] ) ); ?>">
                                   <hr/>
                                   
                                   <h3>Player 4</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name5" value="<?php echo( htmlspecialchars( $name[5] ) ); ?>" ><br>
                                  <label for="email" id="e">Email:</label>
                                  <input type="text"  name="email5" id="ei" value="<?php echo( htmlspecialchars( $email[5] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno5" id="mi" value="<?php echo( htmlspecialchars( $mob[5] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food5" value="Veg" <?php echo ($food[5]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food5" value="Non Veg" <?php echo ($food[5]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob5" id="di" value="<?php echo( htmlspecialchars( $dob[5] ) ); ?>">
                                   <hr/>
                                   
                                   <h3>Player 5</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name6" value="<?php echo( htmlspecialchars( $name[6] ) ); ?>" ><br>
                                  <label for="email" id="e">Email:</label>
                                  <input type="text"  name="email6" id="ei" value="<?php echo( htmlspecialchars( $email[6] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno6" id="mi" value="<?php echo( htmlspecialchars( $mob[6] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food6" value="Veg" <?php echo ($food[6]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food6" value="Non Veg" <?php echo ($food[6]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob6" id="di" value="<?php echo( htmlspecialchars( $dob[6] ) ); ?>">
                                   <hr/>
                                   
                                   <h3>Player 6</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name7" value="<?php echo( htmlspecialchars( $name[7] ) ); ?>" ><br>
                                  <label for="email" id="e">Email:</label>
                                  <input type="text"  name="email7" id="ei" value="<?php echo( htmlspecialchars( $email[7] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno7" id="mi" value="<?php echo( htmlspecialchars( $mob[7] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food7" value="Veg" <?php echo ($food[7]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food7" value="Non Veg" <?php echo ($food[7]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob7" id="di" value="<?php echo( htmlspecialchars( $dob[7] ) ); ?>">
                                   <hr/>
                                   
                                   <h3>Player 7</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name8" value="<?php echo( htmlspecialchars( $name[8] ) ); ?>" ><br>
                                  <label for="email" id="e">Email:</label>
                                  <input type="text"  name="email8" id="ei" value="<?php echo( htmlspecialchars( $email[8] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno8" id="mi" value="<?php echo( htmlspecialchars( $mob[8] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food8" value="Veg" <?php echo ($food[8]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food8" value="Non Veg" <?php echo ($food[8]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob8" id="di" value="<?php echo( htmlspecialchars( $dob[8] ) ); ?>">
                                   <hr/>
                                   
                                   <h3>Player 8</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name9" value="<?php echo( htmlspecialchars( $name[9] ) ); ?>" ><br>
                                  <label for="email" id="e">Email:</label>
                                  <input type="text"  name="email9" id="ei" value="<?php echo( htmlspecialchars( $email[9] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno9" id="mi" value="<?php echo( htmlspecialchars( $mob[9] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food9" value="Veg" <?php echo ($food[9]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food9" value="Non Veg" <?php echo ($food[9]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob9" id="di" value="<?php echo( htmlspecialchars( $dob[9] ) ); ?>">
                                   <hr/>
                                   
                                   <h3>Player 9</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name10" value="<?php echo( htmlspecialchars( $name[10] ) ); ?>" ><br>
                                  <label for="email" id="e">Email:</label>
                                  <input type="text"  name="email10" id="ei" value="<?php echo( htmlspecialchars( $email[10] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno10" id="mi" value="<?php echo( htmlspecialchars( $mob[10] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food10" value="Veg" <?php echo ($food[10]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food10" value="Non Veg" <?php echo ($food[10]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob10" id="di" value="<?php echo( htmlspecialchars( $dob[10] ) ); ?>">
                                   <hr/>
                                   
                                   <h3>Player 10</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name11" value="<?php echo( htmlspecialchars( $name[11] ) ); ?>" ><br>
                                  <label for="email" id="e">Email:</label>
                                  <input type="text"  name="email11" id="ei" value="<?php echo( htmlspecialchars( $email[11] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno11" id="mi" value="<?php echo( htmlspecialchars( $mob[11] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food11" value="Veg" <?php echo ($food[11]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food11" value="Non Veg" <?php echo ($food[11]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob11" id="di" value="<?php echo( htmlspecialchars( $dob[11] ) ); ?>">
                                   <hr/>
                                   
                                   <h3>Player 11</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name12" value="<?php echo( htmlspecialchars( $name[12] ) ); ?>" ><br>
                                  <label for="email" id="e">Email:</label>
                                  <input type="text"  name="email12" id="ei" value="<?php echo( htmlspecialchars( $email[12] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno12" id="mi" value="<?php echo( htmlspecialchars( $mob[12] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food12" value="Veg" <?php echo ($food[12]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food12" value="Non Veg" <?php echo ($food[12]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob12" id="di" value="<?php echo( htmlspecialchars( $dob[12] ) ); ?>">
                                   <hr/>
                                   
                                   <h3>Player 12</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name13" value="<?php echo( htmlspecialchars( $name[13] ) ); ?>" ><br>
                                  <label for="email" id="e">Email:</label>
                                  <input type="text"  name="email13" id="ei" value="<?php echo( htmlspecialchars( $email[13] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno13" id="mi" value="<?php echo( htmlspecialchars( $mob[13] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food13" value="Veg" <?php echo ($food[13]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food13" value="Non Veg" <?php echo ($food[13]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob13" id="di" value="<?php echo( htmlspecialchars( $dob[13] ) ); ?>">
                                   <hr/>
                                   
                                   <h3>Player 13</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name14" value="<?php echo( htmlspecialchars( $name[14] ) ); ?>" ><br>
                                  <label for="email" id="e">Email:</label>
                                  <input type="text"  name="email14" id="ei" value="<?php echo( htmlspecialchars( $email[14] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno14" id="mi" value="<?php echo( htmlspecialchars( $mob[14] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food14" value="Veg" <?php echo ($food[14]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food14" value="Non Veg" <?php echo ($food[14]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob14" id="di" value="<?php echo( htmlspecialchars( $dob[14] ) ); ?>">
                                   <hr/>
                                   
                                   <h3>Player 14</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name15" value="<?php echo( htmlspecialchars( $name[15] ) ); ?>" ><br>
                                  <label for="email" id="e">Email:</label>
                                  <input type="text"  name="email15" id="ei" value="<?php echo( htmlspecialchars( $email[15] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno15" id="mi" value="<?php echo( htmlspecialchars( $mob[15] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food15" value="Veg" <?php echo ($food[15]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food15" value="Non Veg" <?php echo ($food[15]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob15" id="di" value="<?php echo( htmlspecialchars( $dob[15] ) ); ?>">
                                   <hr/>
                                   
                                   <h3>Player 15</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name16" value="<?php echo( htmlspecialchars( $name[16] ) ); ?>" ><br>
                                  <label for="email" id="e">Email:</label>
                                  <input type="text"  name="email16" id="ei" value="<?php echo( htmlspecialchars( $email[16] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno16" id="mi" value="<?php echo( htmlspecialchars( $mob[16] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food16" value="Veg" <?php echo ($food[16]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food16" value="Non Veg" <?php echo ($food[16]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob16" id="di" value="<?php echo( htmlspecialchars( $dob[16] ) ); ?>">
                                   <hr/>
                                   
                                   <h3>Player 16</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name17" value="<?php echo( htmlspecialchars( $name[17] ) ); ?>" ><br>
                                  <label for="email" id="e">Email:</label>
                                  <input type="text"  name="email17" id="ei" value="<?php echo( htmlspecialchars( $email[17] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno17" id="mi" value="<?php echo( htmlspecialchars( $mob[17] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food17" value="Veg" <?php echo ($food[17]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food17" value="Non Veg" <?php echo ($food[17]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob17" id="di" value="<?php echo( htmlspecialchars( $dob[17] ) ); ?>">
                                   <hr/>
                                   
                                   <h3>Official 1</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name18" value="<?php echo( htmlspecialchars( $name[18] ) ); ?>" ><br>
                                  <label for="email" id="e">Email:</label>
                                  <input type="text"  name="email18" id="ei" value="<?php echo( htmlspecialchars( $email[18] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno18" id="mi" value="<?php echo( htmlspecialchars( $mob[18] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food18" value="Veg" <?php echo ($food[18]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food18" value="Non Veg" <?php echo ($food[18]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob18" id="di" value="<?php echo( htmlspecialchars( $dob[18] ) ); ?>">
                                   <hr/>
                                   
                                   <h3>Official 2</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name19" value="<?php echo( htmlspecialchars( $name[19] ) ); ?>" ><br>
                                  <label for="email" id="e">Email:</label>
                                  <input type="text"  name="email19" id="ei" value="<?php echo( htmlspecialchars( $email[19] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno19" id="mi" value="<?php echo( htmlspecialchars( $mob[19] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food19" value="Veg" <?php echo ($food[19]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food19" value="Non Veg" <?php echo ($food[19]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob19" id="di" value="<?php echo( htmlspecialchars( $dob[19] ) ); ?>">
                                   <hr/>
                                   
                                   <h3>Official 3</h3>
                                  <label for="name" id="n">Name:</label>
                                  <input type="text"  id="ni" name="name20" value="<?php echo( htmlspecialchars( $name[20] ) ); ?>" ><br>
                                  <label for="email" id="e">Email:</label>
                                  <input type="text"  name="email20" id="ei" value="<?php echo( htmlspecialchars( $email[20] ) ); ?>"><br>
                                  <label for="pno" id="m">Mobile no:</label>
                                  <input type="text" name="pno20" id="mi" value="<?php echo( htmlspecialchars( $mob[20] ) ); ?>"><br>
                                  <label for="food" id="f">Food:</label>
                                  <label id="fi"><input type="radio" name="food20" value="Veg" <?php echo ($food[20]=='Veg')?'checked':'' ?>> Veg</label>
                                  <label id="n0"><input type="radio" name="food20" value="Non Veg" <?php echo ($food[20]=='Non Veg')?'checked':'' ?>> Non Veg</label><br>
                                  <label for="dob" id="d">Date of birth:</label>
                                  <input type="date" name="dob20" id="di" value="<?php echo( htmlspecialchars( $dob[20] ) ); ?>">
                                   <hr/>
                                   
                                   <p id="declare"><input type="checkbox" name="dec" value="dec" required>I hereby declare that the details furnished above are true and correct to the best of my knowledge and belief and I undertake to inform you of any changes therein, immediately.</p>
                                  <center>
                                    <button type="save" value="Save" name="save">Save</button>
                                    <button type="preview" value="preview" name="preview" >Preview</button>
                                    <button type="submit" value="Submit" name="submit" >Submit</button>
                                  </center>

                                  <footer>
                                    <br>
                                  <font color="black" size="3">
                                   <p align="center" class="contact">Contact : 989765876,934908723</p>
                                  </font>
                                </footer>
                                </div>
                            </form>    
                            </div>
                    </div>
              </div>
    </div>
</body>