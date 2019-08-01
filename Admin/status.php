<?php
include('../Includes/connection.php');
include('../Includes/redirect_check_code.php');
?>

<?php
    session_start();
    $clg = $_POST['code'];
    $sport = $_POST['sport'];
    $gender = $_POST['gender'];

    $_SESSION['clg'] = $clg;
    $_SESSION['sport'] = $sport;
    $_SESSION['gender'] = $gender;

    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $databaseName = "db";

    $connection = mysqli_connect($serverName,$userName,$password,$databaseName);
    if(!$connection){
        die("Connection failed: ".mysqli_connect_error());

    }

    $result = mysqli_query($connection,"SELECT * FROM team where college_code='$clg' and sport='$sport' and gender='$gender'");
    $row = mysqli_fetch_array($result);
    if(mysqli_num_rows($result) == 0){
        echo "<script>alert('The selected team did not register');</script>";
        echo "<script>window.history.back();</script>";
    }
    else if($row['status'] == 'Approved'){
        echo "<script>alert('The selected team is already approved');</script>";
        echo "<script>window.history.back();</script>";
    }
    else{
        echo "<html>
        <head>
            <title>APPROVAL</title>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            <style>
                @import url('admin.css');
                hr,h4{
                    margin: 15px;
                }
                body{
                    background-color: #eee;
                    font-family: 'Work Sans', sans-serif;
                }
                h1{
                    text-align: center;
                    font-size: 25px;
                    font-weight: 600;
                }
                table{
                    margin: 30px;
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
                input[type='text']{
                    width: 30%;
                    height: 5%;
                    margin-left: 25px;
                    letter-spacing: 2px;
                    font-weight: bold;
                    padding: 10px;
                }
                input[type='radio']{
                        margin-left: 25px;
                        padding: 10px;
                }
                label{
                        margin: 25px;
                        font-size: 15px;
                }
                button[type='submit']{
                        text-align: center;
                        width: 30%;
                        height: 6%;
                        background-color: #888;
                        border-radius: 10px;
                        padding: 10px;
                        margin-top: 2%;
                        margin-bottom: 2%;
                        margin-left: 35%;
                        margin-right: 35%;
                        color: black;
                        font-weight: bold;
                }
                .box{
                    margin: 30px;
                    text-align: center;
                    border: 1px solid black;
                    width: 92.5%;
                }
            </style>
        </head>
        <body>
        <div class='primary-nav'>


                <button href='#' class='hamburger'>
                <span class='screen-reader-text'>Menu</span>
                </button>
                
                    <nav role='navigation' class='navbar'>
                
                        <span class='admin'>ADMIN</span>
                
                        <div class='overflow-container'>
                
                            <ul class='menu-dropdown'>
                
                                <li><a href='dashAction.php'>Dashboard</a></li>

                                <li><a href='schedule.php'>Schedule</a></li>

                                <li><a href=''photo.php'>Photo</a></li>
                
                                <li><a href='notify.php'>Notifications</a></li>
                  
                                <li><a  class='active' href=''approval.php'>Approval</a></li>
                
                                <li><a href='plan.php'>Travel Plan Statistics</a></li>

                                <li><a href='db.php'>Database View</a></li> 
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
                            <h1>TEAM STATUS</h1>
                            <br><h4>TEAM DETAILS</h4> <hr />
                            <table border=1>
                            <tr>
                            <th>College Code</th>
                            <th>Sport</th>
                            <th>Gender</th>
                            <th>Team Name</th>
                            <th>Contact Email</th>
                            <th>Number of Champions</th>
                            <th>Number of State players</th>
                            <th>Status</th>
                            </tr>";

        
            echo "<tr>";
            echo "<td>" . $row['college_code'] . "</td>";
            echo "<td>" . $row['sport'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['team_name'] . "</td>";
            echo "<td>" . $row['contact_email'] . "</td>";
            echo "<td>" . $row['champion'] . "</td>";
            echo "<td>" . $row['state_player'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        echo "</table>";

        $result = mysqli_query($connection,"SELECT * FROM member where college_code='$clg' and sport='$sport' and gender='$gender' ORDER BY role");
        if(mysqli_num_rows($result) > 0){
            echo"
            <h4>PLAYER DETAILS</h4>  <hr />                
                <table border=1>
                <tr>
                <th>College Code</th>
                <th>Sport</th>
                <th>Gender</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Date of Birth</th>
                <th>Type of Food</th>
                <th>Role</th>
                </tr>";

             while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>" . $row['college_code'] . "</td>";
                echo "<td>" . $row['sport'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['dob'] . "</td>";
                echo "<td>" . $row['food'] . "</td>";
                echo "<td>" . $row['role'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

        }
        else{
            echo "<script>alert('The selected team did not complete registration');</script>";
            echo "<script>window.history.back();</script>";
        }

        echo "<br><h4>APPROVE STATUS</h4><hr />
        <div class='box'>
            <form action='update.php' method='POST'>
                <label><h4>STATUS</h4></label> <br> <br>
                <label><input type='radio' name='status' value='Approved' />Approved</label>
                <label><input type='radio' name='status' value='Not Approved' />Not Approved</label> <br> <br>
                <button type='submit' value='submit' name='submit' >SUBMIT</button>
            </form>
        </div></div></div></div></body></html>";
    }
    //echo "<script>window.close();</script>";  
?>