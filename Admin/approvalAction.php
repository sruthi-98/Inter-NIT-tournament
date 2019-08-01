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

    $result = mysqli_query($connection,"SELECT college_code, sport, gender, status FROM team where status='Waiting' and submit='Yes'");
    if(mysqli_num_rows($result) == 0){
        echo "<script>alert('No teams are in Waiting state');</script>";
        echo "<script>window.location.href='approval.php'</script>";  
    }
    else{

        echo "<html>
        <head>
            <title>APPROVAL</title>
            <style>
                @import url('admin.css');
                hr,h4{
                    margin: 15px;
                }
                h5{
                    font-size: 16px;
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
                    margin-left: 25% !important;
                    margin: 10px;
                    width: 60%;
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
                select{
                    width: 30%;
                    height: 6%;
                    margin-left: 25px;
                    letter-spacing: 2px;
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
                    margin-left: 25%;
                    text-align: center;
                    border: 1px solid black;
                    width: 60%;
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
                
                                <li><a href='travelplan.php'>Travel Plan Statistics</a></li>

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

                            <h1>TEAM STATUS</h1> <br>
                            <h4>LIST OF TEAMS IN WAITING STATE</h4> <hr />
                            <table border=1>
                            <tr>
                            <th>College Code</th>
                            <th>Sport</th>
                            <th>Gender</th>
                            <th>Status</th>
                            </tr>";
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['college_code'] . "</td>";
            echo "<td>" . $row['sport'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($connection);

        echo"
        <br><h4>STATUS APPROVAL</h4> <hr />
        <div class='box'>
            <h5>ENTER THE DETAILS OF TEAM WHOSE STATUS IS TO BE CHANGED</h5> <hr />
            <br>
            <form action='status.php' method='POST'>
                <label>COLLEGE CODE:</label> <br> <br>
                <select name='code'>
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
                </select> <br> <br>
                <label>SPORT:</label> <br> <br>
                <select name='sport'>
                    <option value='Handball'>Handball</option>
                    <option value='Hockey'>Hockey</option>
                </select> <br> <br>
                <label>GENDER:</label> <br> <br>
                <label><input type='radio' name='gender' value='M' checked='checked'/>Male</label>
                <label><input type='radio' name='gender' value='F' />Female</label> <br> <br>
                <button type='submit' value='submit' name='submit'>SUBMIT</button>
            </form>
        </div>
        </div>
        </div>
        </div>
        </body>
        </html>";
    }
    
?>