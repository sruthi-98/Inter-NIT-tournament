<?php
include('../Includes/connection.php');
include('../Includes/redirect_check_code.php');
?>

<html>
    <head>
        <title>
            DASHBOARD
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
                
                                <li><a class="active" href="dashAction.php">Dashboard</a></li>

                                <li><a href="schedule.php">Schedule</a></li>

                                <li><a href="photo.php">Photo</a></li>

                                <!--<li><a href="#video">Video</a></li>-->
                
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
                            <h1>DASHBOARD</h1> 
                            <br><h4>GENERAL STATISTICS</h4><hr />

                            <?php
                                $serverName = 'localhost';
                                $userName = 'root';
                                $password = '';
                                $databaseName = 'db';
                            
                                $connection = mysqli_connect($serverName,$userName,$password,$databaseName);
                                if(!$connection){
                                    die('Connection failed: '.mysqli_connect_error());
                            
                                }

                                echo '
                                <style>
                                        h1{
                                            font-size: 25px;
                                            font-weight: 600;
                                        }
                                        table{
                                            margin: 30px 80px 0px 80px;
                                            text-align: justify;
                                            table-layout: fixed;
                                            border-collapse:collapse;
                                            font-size: 16px;
                                            border: 1px solid black;
                                        }
                                        th{
                                            text-align: center;
                                        }
                                        td,th{
                                            padding: 10px;
                                        }
                                    </style>';
                                
                                echo '
                                <table border=1>
                                        <tr>
                                        <th>Sport</th>
                                        <th>Gender</th>
                                        <th>Total Number of Applicants</th>
                                        <th>Number of Applicants in Waiting state</th>
                                        </tr>';

                                $result1 =  mysqli_query($connection,'SELECT count(*) FROM team where sport="Hockey" and gender="M"');
                                $count1 = mysqli_fetch_array($result1);
                                $result2 =  mysqli_query($connection,'SELECT count(*) FROM team where sport="Hockey" and gender="M" and status="Waiting"');
                                $count2 = mysqli_fetch_array($result2);
                                echo '<tr>';
                                        echo '<td>Hockey</td>';
                                        echo '<td>Male</td>';
                                        echo '<td>' .intval($count1[0]) . '</td>';
                                        echo '<td>' .intval($count2[0]) . '</td>';
                                        echo '</tr>';
                                
                                $result1 =  mysqli_query($connection,'SELECT count(*) FROM team where sport="Hockey" and gender="F"');
                                $count1 = mysqli_fetch_array($result1);
                                $result2 =  mysqli_query($connection,'SELECT count(*) FROM team where sport="Hockey" and gender="F" and status="Waiting"');
                                $count2 = mysqli_fetch_array($result2);
                                echo '<tr>';
                                        echo '<td>Hockey</td>';
                                        echo '<td>Female</td>';
                                        echo '<td>' .intval($count1[0]) . '</td>';
                                        echo '<td>' .intval($count2[0]) . '</td>';
                                        echo '</tr>';

                                $result1 =  mysqli_query($connection,'SELECT count(*) FROM team where sport="Handball" and gender="M"');
                                $count1 = mysqli_fetch_array($result1);
                                $result2 =  mysqli_query($connection,'SELECT count(*) FROM team where sport="Handball" and gender="M" and status="Waiting"');
                                $count2 = mysqli_fetch_array($result2);
                                echo '<tr>';
                                        echo '<td>Handball</td>';
                                        echo '<td>Male</td>';
                                        echo '<td>' .intval($count1[0]) . '</td>';
                                        echo '<td>' .intval($count2[0]) . '</td>';
                                        echo '</tr>';

                                $result1 =  mysqli_query($connection,'SELECT count(*) FROM team where sport="Handball" and gender="F"');
                                $count1 = mysqli_fetch_array($result1);
                                $result2 =  mysqli_query($connection,'SELECT count(*) FROM team where sport="Handball" and gender="F" and status="Waiting"');
                                $count2 = mysqli_fetch_array($result2);
                                echo '<tr>';
                                        echo '<td>Handball</td>';
                                        echo '<td>Female</td>';
                                        echo '<td>' .intval($count1[0]) . '</td>';
                                        echo '<td>' .intval($count2[0]) . '</td>';
                                        echo '</tr></table>';

                                mysqli_close($connection);
                            ?>
                            <br><br>

                            
                            
                        </div>
                
                    </div>
                
                </div>
    </body>
</html>