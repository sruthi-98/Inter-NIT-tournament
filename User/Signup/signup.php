<?php
  //If cookies are already present, redirect to profile page //for home,signup,login page
  if(isset($_COOKIE['college_code'])) 
  { if($_COOKIE['college_code']!="")
    { if($_COOKIE['college_code']=="admin")
        echo '<script>window.location.href="../../Admin/admin.php";</script>';
      else
        echo '<script>window.location.href="../Profile/profile.php"</script>';
    }
  }
?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIGNUP</title>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="signup.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  </head>
  <body>
    <div class="container-fluid">
      <div class="row" id="row1" >
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="row1-1">
              <img src="../../Image/blacklogo.png" width="115" height="140"/>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <form name="login" action="signupaction.php" method="POST">
              <legend align="center"></legend>
              <div class="container-fluid">
                <!--<label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>-->
                <label for="cname">College name:</label>
    		        <font color="black">
                  <select name="nitlist">
                      <option value='MANIT'>MANIT</option>
                      <option value='MNIT'>MNIT</option>
                      <option value='MNNIT'>MNNIT</option>
                      <option value='NITA'>NITA</option>
                      <option value='NITANP'>NITANP</option>
                      <option value='NITAP'>NITAP</option>
                      <option value='NITC'>NITC</option>
                      <option value='NITD'>NITD</option>
                      <option value='NITDGP'>NITDGP</option>
                      <option value='NITG'>NITG</option>
                      <option value='NITH'>NITH</option>
                      <option value='NITJ'>NITJ</option>
                      <option value='NITJSR'>NITJSR</option>
                      <option value='NITK'>NITK</option>
                      <option value='NITKKR'>NITKKR</option>
                      <option value='NITM'>NITM</option>
                      <option value='NITMN'>NITMN</option>
                      <option value='NITMZ'>NITMZ</option>
                      <option value='NITN'>NITN</option>
                      <option value='NITP'>NITP</option>
                      <option value='NITPY'>NITPY</option>
                      <option value='NITRKL'>NITRKL</option>
                      <option value='NITRR'>NITRR</option>
                      <option value='NITS'>NITS</option>
                      <option value='NITSKM'>NITSKM</option>
                      <option value='NITSRI'>NITSRI</option>
                      <option value='NITT'>NITT</option>
                      <option value='NITUK'>NITUK</option>
                      <option value='NITW'>NITW</option>
                      <option value='SVNIT'>SVNIT</option>
                      <option value='VNIT'>VNIT</option>
      		        </select>
      		      </font>  
                <br>
  		          <label for="psw">Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="email" name="email" required>
  		          <br>
                <label for="psw">Password:</label>
                <input type="password" name="pwd" required>               
                <button type="submit" name="submit">Sign up</button>
              </div>
            </form>          
        </div>
      </div>  
    </div>
    <footer class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="row4-1">
        <p class="contact">Contact : 989765876,934908723</p>
      </div>    
    </footer>
  </body>
</html>