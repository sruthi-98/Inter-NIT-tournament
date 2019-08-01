<?php
include('../Includes/redirect_check_code.php');
?>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['upload']))
    {
        notify();
    }
    function notify(){
        $date = date("Y-m-d");
        $notify = $_POST['notify'];
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $databaseName = "db";

        $connection = mysqli_connect($serverName,$userName,$password,$databaseName);
        if(!$connection){
            die("Connection failed: ".mysqli_connect_error());

        }

        $insertquery = " INSERT INTO Notification (date,notification) VALUES ('$date','$notify')";
        if(mysqli_query($connection,$insertquery)){
            echo '<script>alert("Record inserted successfully !!!");</script>';
        }
        else{
            $error = mysqli_error($connection);
            echo '<script>alert("Error in record insertion.\nError : '.$error.'\nPlease try again");</script>';
        }
        mysqli_close($connection);
    }
    echo "<script>window.close();</script>";  
?>