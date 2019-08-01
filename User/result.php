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
    <title>RESULT</title>
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
            margin-left: 46vw !important;
        }
        hr{
            margin-left: 325% !important;
            width: 100vh;
        }
        th{
            text-align: center;
            padding: 5px;
        }
        td{
            padding: 5px;
        }
        table.result{
            margin: 100px 35vw 100px 35vw;
            text-align: center;
            width: 600px;
            height: 200px;
            max-height: 800px;
            border: 2px solid black;
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
                        
                        <li><a href="schedule.php">Schedule</a></li>
                     
                        <li><a href="gallery.php">Gallery</a></li>
                                     
                        <li><a href="notify.php">Notifications</a></li>
                                     
                        <li><a class="active" href="result.php">Results</a></li>

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
                                <h1>RESULTS</h1> <hr />
                            </div>
<?php

    $dir = "C:/wamp64/www/Results//";

    echo '
            <div class="row"><div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <table border=1 class="result">
            <tr>
            <th>Link to Results</th>
            </tr>';

    // Open a directory, and read its contents
    if (is_dir($dir)){
      if ($dh = opendir($dir)){
        $file = readdir($dh);
        $file = readdir($dh);
        while (($file = readdir($dh)) !== false){
            echo '<tr>';
            echo '<td>';
            echo '<a href="/Results/'.$file.'">'.$file.'</a>';
            echo '</td></tr>';
        }
      }
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