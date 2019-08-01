<?php
  //If cookies are already present, redirect to profile page //for home,signup,login page
  if(isset($_COOKIE['college_code'])) 
  { if($_COOKIE['college_code']!="")
    { if($_COOKIE['college_code']=="admin")
        echo '<script>window.location.href="../Admin/admin.php";</script>';
      else
        echo '<script>window.location.href="../User/Profile/profile.php"</script>';
    }
  }
?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Forgot password</title>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../nitlogin.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  </head>
  <body>
    <div class="container-fluid">
        <div class="row" id="row1" >
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="row1-1">
                          <img src="../../Image/blacklogo.png" width="115" height="140"/>
                  </div>
        
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <form name="login" action="forgotaction.php" method="POST">
                        <legend align="center">FORGOT PASSWORD</legend>
                        <div class="container-fluid">
                          <label for="uname"><b>Username</b></label><br>
                          <input type="text" placeholder="Enter Username" name="uname" required>
                          <br> 
                          <button type="submit" name="submit">Submit</button>
                        </div>
                      </form>  
                  </div>
        </div>
    </div>

    <footer class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="row4-1">
        <p>Contact : 989765876,934908723</p>
      </div>    
    </footer>

  </body>
</html>