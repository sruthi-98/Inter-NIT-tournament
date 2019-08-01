<?php
include('../Includes/connection.php');
include('../Includes/redirect_check_code.php');
?>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit'])){
        upload();
    }
    function upload(){
        $countfiles = count($_FILES['image']['name']);
        
        //Upload path where image is to be uploaded
        $targetDir = "C:\wamp64\www\Images\\";  
        for($i=0; $i<$countfiles; $i++){
            $fileName = basename($_FILES["image"]["name"][$i]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            $allowTypes = array('png','jpeg','jpg');
            if (file_exists($targetFilePath)) {
                echo "<script>alert('Sorry, file already exists.');</script> <br>";
            }
            else if(in_array($fileType, $allowTypes)){
                if(move_uploaded_file($_FILES["image"]["tmp_name"][$i], $targetFilePath)){
                    echo '<script>alert("The image '.$fileName.' has been uploaded.");</script>';
                }
                else{
                    echo "<script>alert('Sorry, there was an error uploading your image.');</script> <br>";
                }
            }
            else{
                echo "<script>alert('Sorry, PNG,JPEG and JPG files are allowed to upload.');</script> <br>";
            }
       }   
            
    }
    echo "<script>window.close();</script>";  
?>

