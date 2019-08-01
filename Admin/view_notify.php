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

    echo "<html>
    <head>
        <title>VIEW NOTIFICATION</title>
        <link rel='stylesheet' href='profile.css'>
        <style>
            h1{
                margin: 50px !important;
                font-size: 25px;
                font-weight: 600;
            }
            table{
                background-color: transparent;
                margin: 50px 200px 0px 200px !important;
                text-align: justify;
                table-layout: fixed;
                border-collapse:collapse;
                font-size: 16px;
                border: 1px solid #666;
            }
            th{
                color: #fff;
                text-align: center;
                background-color: rgba(65, 1, 61, 0.9);
            }
            td,th{
                padding: 15px;
            }
        </style>
    </head>
    <body>";
     
    $result = mysqli_query($connection,"SELECT * FROM Notification");

    echo"
    <h1>NOTIFICATION</h1>
    <table border=1>
    <tr>
    <th>Notification ID</th>
    <th>Date</th>
    <th>Notification</th>
    </tr>";
    
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['notification_id'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['notification'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "</body></html>";
    mysqli_close($connection);
?>