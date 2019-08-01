<?php
include('../Includes/connection.php');
include('../Includes/redirect_check_code.php');
?>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" or isset($_POST['submit'])){
       upload_and_insert();
    }
    function upload_and_insert(){
        $clg = $_COOKIE['college_code'];
        $sport = $_COOKIE['sport'];
        $date = $_POST['dor'];
        $mode = $_POST['mode'];
        $point = $_POST['point'];
        //$file = $_POST['fileToUpload'];
        $arrivalReturn = "R";
        $serverName = 'localhost';
        $userName = 'root';
        $password = '';
        $databaseName = 'db';
                                        
        $connection = mysqli_connect($serverName,$userName,$password,$databaseName);
        if(!$connection){
            die('Connection failed: '.mysqli_connect_error());
        }
        
        //Upload path where file is to be uploaded
        $targetDir = "C:\wamp64\www\Ticket\\";  
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        $file = $fileName;
        $insertquery = " INSERT INTO travel (college_code,sport,arrivalReturn,date,mode,place,file) VALUES ('$clg','$sport','$arrivalReturn','$date','$mode','$point','$fileName')";

        $allowTypes = array('pdf');
        if (file_exists($targetFilePath)) {
            echo "<script>alert('Sorry, file already exists.');</script> <br>";
        }
        else if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath) and mysqli_query($connection,$insertquery)){
                echo "<script>alert('The file has been uploaded and record inserted successfully.');</script> <br>";
            }
            else{
                $error = mysqli_error($connection);
                if($error){
                    echo '<script>alert("Error in record insertion.\nError : '.$error.'\nPlease try again");</script>';
                }
                else{
                     echo "<script>alert('Sorry, there was an error uploading your file.');</script> <br>";
                }
            }
        }
        else{
            echo "<script>alert('Sorry, PDF files are allowed to upload.');</script> <br>";
        }
        mysqli_close($connection);

    }
    echo "<script>window.close();</script>";  
?>


