<?php
include('../Includes/connection.php');
include('../Includes/redirect_check_code.php');
?>

<html>
    <head>
        <link rel="stylesheet" href="view.css">

        <style>
            @import url("admin.css");
            h4,hr{
                margin: 15px;
            }
            .box{
                    margin: 10% 20% 10% 20%;
                    text-align: center;
                    border: 1px solid black;
                    width: 60%;
            }
        </style>
        <title>DATABASE VIEW</title>
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
                
                                <li><a href="notify.php">Notifications</a></li>
                  
                                <li><a href="approval.php">Approval</a></li>
                
                                <li><a href="travelplan.php">Travel Plan Statistics</a></li>

                                <li><a  class="active" href="view.php">Database View</a></li>

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
                                <h1>DATABASE VIEW</h1> 
                                <br><h4>TEAM DETAILS</h4> <hr />
                                <div class='box'>
                                    <h4>SELECT THE TEAM WHOSE DETAILS ARE TO BE VIEWED</h4> <hr />
                                    <br>
                                    <form action='viewAction.php' method='POST'>
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
                                        <label><input type='radio' name='gender' value='M' checked="checked" />Male</label>
                                        <label><input type='radio' name='gender' value='F' />Female</label> <br> <br>
                                        <button type='submit' value='submit' name='submit'>SUBMIT</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>            
    </body>
</html>