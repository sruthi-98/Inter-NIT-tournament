<?php
include('../Includes/connection.php');
include('../Includes/redirect_check_code.php');
?>

<html>
    <head>
        <title>
            UPLOAD RESULT
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
                
                                <li><a href="travelplan.php">Travel Plan Statistics</a></li>

                                <li><a href="view.php">Database View</a></li>

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
                
                        </div>
                
                    </nav>
                
                </div>
                
                <div class="new-wrapper">
                
                    <div id="main">
                
                        <div id="main-contents">
                            <h1 id="result">RESULTS</h1> 
                            <br>
                            <h4>UPLOAD RESULT</h4> <hr />
                            <form action="upload_result.php" method="post" target="_blank" enctype="multipart/form-data">
                                <input type="file" name="file[]" size="50" multiple="multiple" />
                                <br />
                                <input type="submit" value="UPLOAD" name="submit" />
                            </form>

                            <br><br>
                            
                        </div>
                
                    </div>
                
                </div>
    </body>
</html>