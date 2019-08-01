<?php
include('../Includes/connection.php');
include('../Includes/redirect_check_code.php');
?>

<?php
    session_start();
    $status = $_POST['status'];
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $databaseName = "db";

    $clg = $_SESSION['clg'];
    $sport = $_SESSION['sport'];
    $gender = $_SESSION['gender'];

    $connection = mysqli_connect($serverName,$userName,$password,$databaseName);
    if(!$connection){
        die("Connection failed: ".mysqli_connect_error());

    }

    $result = mysqli_query($connection,"UPDATE team set status='$status' where college_code='$clg' and sport='$sport' and gender='$gender'");
    if($result){
        echo "<script>alert('Record updation successful');</script>";
    }
    else{
        echo "<script>alert('Record updation unsuccessful');</script>";
    }

    //Send mail to the team saying the status:Approved, Waiting or Not approved

    require '../PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail ->IsSmtp();
    $mail ->SMTPDebug = 0;
    $mail ->SMTPAuth = true;
    $mail ->SMTPSecure = 'ssl';
    $mail ->Host = "smtp.gmail.com";
    $mail ->Port = 465; // or 587
    $mail ->IsHTML(true);
    $mail ->Username = "internitc19@gmail.com";//sender of mail
    $mail ->Password = "nitc1234";//sender mail password
    $mail ->SetFrom("internitc19@gmail.com");//sender of mail

    $mail ->Subject = "Status of the registration of ".$clg.":".$sport.":".$gender." for Inter NIT Sports Tournament";
    if($status=='Approved')
        $sta="APPROVED";
    else if($status=='Not Approved')
        $sta="NOT APPROVED";
    if($gender=='M')
        $gen="Male";
    else 
        $gen=='Female';

    $mail ->Body = "Hello ".$clg.", <br><br>The status of the registration of your ".$sport." : ".$gen." team is ".$status."<br><br>NIT Calicut";

    //Query to get email from password table
    $EmailQuery = "SELECT email FROM password WHERE college_code='$clg'";
    $EmailResult=mysqli_query($connection,$EmailQuery);
    $Emailnrow=mysqli_num_rows($EmailResult);
    if(!$EmailResult or !$Emailnrow)
    {   $error = mysqli_error($connection);
        echo '<script>alert("Error in getting email from database.\nError : '.$error.'\nPlease try again or contact us." );';
        //redirect to form page on clicking okay button of alert
        echo 'window.history.back();';
        echo '</script>';
        exit();
    }
    echo '<script>console.log("Got email from database successfully");</script>';
    $row=mysqli_fetch_array($EmailResult);

    $mail ->AddAddress($row['email']);
    if(!$mail->Send())
        echo '<script>console.log("Mail not sent\n");</script>';  
    else
        echo '<script>console.log("Mail sent\n");</script>'; 

    echo "<script>window.location.href='approval.php';</script>";  
    mysqli_close($connection);
 ?>