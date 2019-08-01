<?php
include('../Includes/connection.php');
include('../Includes/redirect_check_code.php');
?>

<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $databaseName = "db";

    $connection = mysqli_connect($serverName,$userName,$password,$databaseName);
    if(!$connection){
        die("Connection failed: ".mysqli_connect_error());

    }

    $result = mysqli_query($connection,"SELECT * FROM travel");

    echo "<html>
    	  <head>
            <title>TRAVEL PLAN STATISTICS</title>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	        <style>
	        	@import url('admin.css');
	            body{
	                background-color: #eee;
	                font-family: 'Work Sans', sans-serif;
	            }
                a{
                    font-size: 15px;
                    letter-spacing: 1px;
                    color: black;
                    margin: 1.5vw 1.5vw 1.5vw 0.5vw;
                }
	            h1{
	                text-align: center;
	                font-size: 28px;
	                font-weight: 600;
	            }
	            table{
	                margin: 30px 150px 0px 150px;
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
	        </style>
	    </head>";

     echo"
     <div class='primary-nav'>


                <button href='#' class='hamburger'>
                <span class='screen-reader-text'>Menu</span>
                </button>
                
                    <nav role='navigation' class='navbar'>
                
                        <span class='admin'>ADMIN</span>
                
                        <div class='overflow-container'>
                
                            <ul class='menu-dropdown'>
                
                                <li><a href='dash.php'>Dashboard</a></li>

                                <li><a href='schedule.php'>Schedule</a></li>

                                <li><a href='photo.php'>Photo</a></li>
                
                                <li><a href='notify.php'>Notifications</a></li>
                  
                                <li><a href='approval.php'>Approval</a></li>
                
                                <li><a class='active' href='plan.php'>Travel Plan Statistics</a></li>

                                <li><a href='view.php'>Database View</a></li> 
                                <li><a href='result.php'>Results</a></li>

                                <li><a class='logout' href='../Home/nit-home.html'>Log out</a></li>
                                <script type='text/javascript'>
                                    $('a.logout').click( function(){

                                        var pairs = document.cookie.split(';');
                                        for (var i=0; i<pairs.length; i++){
                                            cookie = pairs[i].split('=');
                                            console.log(cookie);
                                            console.log(cookie[0]);console.log(cookie[1]);
                                            document.cookie = cookie[0]+'='+ '' + '' + '; path=/';
                                        }
                                    });
                                </script>
                
                            </ul>
                
                        </div>
                
                    </nav>
                
                </div>
                div class='new-wrapper'>
                
                    <div id='main'>
                
                        <div id='main-contents'>
						    <h1>TRAVEL PLAN STATISTICS</h1> 
						    <br><h4>TRAVEL PLAN DETAILS</h4> <hr />
						    <table border=1>
						    <tr>
						    <th>College Code</th>
						    <th>Sport</th>
                            <th>Arrival(A)/Return(R)</th>
                            <th>Team count</th>
                            <th>Ticket Detail</th>
						    </tr>";
    
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['college_code'] . "</td>";
        echo "<td>" . $row['sport'] . "</td>";
        $clg = $row['college_code'];
        $sport =  $row['sport'];
        $result2 = mysqli_query($connection,"SELECT count(*) FROM member WHERE college_code='$clg' and sport='$sport'");
        $row2 = mysqli_fetch_array($result2);
        $count = $row2[0];
        echo "<td>" . $row['arrivalReturn'] . "</td>";
        echo "<td>" . $count . "</td>";
        echo '<td><a href="/Ticket/'.$row['file'].'">'.$row['file'].'</a></td>';
        echo "</tr>";
    }
    echo "</table></div></div></div></html>";
