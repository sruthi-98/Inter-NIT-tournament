<?php
    //If cookies are not already present, redirect to home page //for pages other than home,signup,login page// those ones that need only college code and password
    if(!isset($_COOKIE['college_code'])) 
    {   echo "<script>window.location.href='../Home/nit-home.html'</script>";
        exit();
    }
    else if(isset($_COOKIE['college_code']) and $_COOKIE['college_code']=="")
    {   echo "<script>window.location.href='../Home/nit-home.html'</script>";
        exit();
    }   

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit'])){
        delete();
    }
    function delete(){
        //Set variables for connection
        $serverName = "localhost";
        $userName="root";
        $password = "";
        $databaseName="db";
        //Create connection
        $connection = mysqli_connect($serverName,$userName,$password,$databaseName);
        //Check Connection
        if(!$connection)
        {   echo '<script>alert("Connection to database failed : '.mysqli_connect_error().'");';
            //go back to the login page
            echo '<script>window.location.href="../Login/login.php";</script>';
            exit();
        }

        error_reporting(E_ALL);
        if(isset($_POST['submit'])) {
            foreach($_POST['file'] as $file) {
                $path= "../Schedule/".$file;
                if(isset($path)) {
                    if (unlink($path)) {
                        echo '<script>alert("The file '.$file.' is deleted successfully");</script> <br />';
                         $query = "DELETE FROM schedule WHERE file_name ='$file'";
                         $result=mysqli_query($connection,$query);
                         if(!$result)
                         {   
                             $error = mysqli_error($connection);
                             echo '<script>alert("Error in deleting '.$file.' from database.\nError : '.$error.'\nPlease try again or contact us." );';
                             echo '</script>';
                         }
                    } 
                    else{
                        echo '<script>alert("The file '.$file.' can not be deleted");</script><br />';
                    }
                }
            }
            echo "<script>window.history.back();</script>";  
        }
    }    
?>



