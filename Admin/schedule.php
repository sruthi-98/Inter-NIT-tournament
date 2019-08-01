<?php
include('../Includes/connection.php');
include('../Includes/redirect_check_code.php');
?>

<html>
    <head>
        <title>
            UPLOAD SCHEDULE
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="admin.css">

        <style>
            @import url("admin.css");
            p{
                margin: 15px !important;
            }
            h5{
                font-size: 16px;
            }
            form.delete{
                margin: 5vw 5vw 0vw 5vw;
            }
            a.delete{
                font-size: 15px;
                letter-spacing: 1px;
                text-transform: uppercase;
                text-decoration: none;
                color: black;
                margin: 1.5vw 1.5vw 1.5vw 0.5vw;
            }
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

                                <li><a  class="active" href="schedule.php">Schedule</a></li>

                                <li><a href="photo.php">Photo</a></li>
                
                                <li><a href="notify.php">Notifications</a></li>
                  
                                <li><a href="approval.php">Approval</a></li>
                
                                <li><a href="travelplan.php">Travel Plan Statistics</a></li>

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

                            <h1 id="schedule">SCHEDULE</h1>
                            <form action="upload_file.php" method="post" target="_blank" enctype="multipart/form-data">
                                <h4>UPLOAD SCHEDULE</h4> <hr />
                                <p>ENTER DESCRIPTION</p>
                                <textarea rows="8" cols="35" name="description" required="required"></textarea>
                                <br><br>
                                <input type="file" name="file" size="50" />
                                <br />
                                <input type="submit" value="UPLOAD" name="submit" />
                            </form>

                            <br /><br />
                            <h4>DELETE SCHEDULE</h4> <hr />
                            <form class="delete" method="POST" action="del_schedule.php">
                                <?php $thelist = '';
                                    
                                    if ($handle = opendir('../Schedule/')) {
                                        $thelist .= '<h5>UPLOADED SCHEDULE FILES</h5><hr />';
                                        while (false !== ($file = readdir($handle)))
                                        {
                                            if ($file != "." && $file != "..")
                                            {
                                                    $thelist .= '<input type="checkbox" name="file[]" value="'.$file.'"></td><td><a class="delete" href="'.$file.'">'.$file.'</a><br>';
                                            }
                                        }
                                        
                                        closedir($handle);
                                    } 
                                    echo $thelist;
                                ?>
                                <br>
                                <input type="submit" value="DELETE" name="submit" />
                            </form>

                            <br><br>
                            
                            
                        </div>
                
                    </div>
                
                </div>
    </body>
</html>