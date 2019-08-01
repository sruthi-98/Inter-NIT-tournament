<?php
include('../Includes/connection.php');
include('../Includes/redirect_check_code.php');
?>

<html>
    <head>
        <title>
            TRAVEL PLAN STATISTICS
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="admin.css">

        <style>
            @import url("admin.css");
        </style>
        
    </head>
    <body>

            <div class="primary-nav">


                <button href="#" class="hamburger">
                <span class="screen-reader-text">Menu</span>
                </button>
                
                    <nav role="navigation" class="navbar">
                
                        <span class="admin">ADMIN</span>
                
                        <div class="overflow-container">
                
                            <ul class="menu-dropdown">
                
                                <li><a href="dashAction.php">Dashboard</a></li>

                                <li><a href="schedule.php">Schedule</a></li>

                                <li><a href="photo.php">Photo</a></li>

                                <!--<li><a href="#video">Video</a></li>-->
                
                                <li><a href="notify.php">Notifications</a></li>
                  
                                <li><a href="approval.php">Approval</a></li>
                
                                <li><a class="active" href="travelplan.php">Travel Plan Statistics</a></li>

                                <li><a href="view.php">Database View</a></li>

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
                
                    </nav>
                
                </div>
                
                <div class="new-wrapper">
                
                    <div id="main">
                
                        <div id="main-contents">
                            <h1 id="plan">TRAVEL PLAN STATISTICS</h1> <hr />
                            <form action="travelplan.php" method="POST">
                                    <button type="submit" value="submit" name="view" id="sub">VIEW</button>
                            </form>

                            <br><br>
                            
                        </div>
                
                    </div>
                
                </div>
    </body>
</html>