<?php
    //If cookies are not already present, redirect to home page 
    //for pages other than home,signup,login page
    // those ones that need only college code and password and sport
    if(!isset($_COOKIE['college_code'])) 
    {   echo "<script>window.location.href='../Home/nit-home.php';</script>";
        exit();
    }
    else if(isset($_COOKIE['college_code']) and $_COOKIE['college_code']=="")
    {   echo "<script>window.location.href='../Home/nit-home.php';</script>";
        exit();
    }   
    else if(!isset($_COOKIE['sport'])) 
    {   echo "<script>window.location.href='Profile/profile.php';</script>";
        exit();
    }
    else if(isset($_COOKIE['sport']) and $_COOKIE['sport']=="")
    {   echo "<script>window.location.href='Profile/profile.php';</script>";
        exit();
    }
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
    }
	if($_SERVER['REQUEST_METHOD']=='POST' and (isset($_POST['submit']) or isset($_POST['save'])))
	{	
		//get cookies needed
        $college_code = $_COOKIE['college_code'];
        $sport = $_COOKIE['sport'];
        $gender = $_COOKIE['gender'];

		//Load team data from HTML form 
        $team_name= $_POST["team"]; 
        $champion = $_POST["champ"];
        $state_player=$_POST["sp"];

        //Query to check if team details are already present
        $query1="SELECT * from team WHERE college_code='$college_code' and sport='$sport' and gender='$gender'";
        $result1=mysqli_query($connection,$query1);
        $nrow1=mysqli_num_rows($result1);
        if(!$result1)
        {   $error1 = mysqli_error($connection);
            echo '<script>alert("Error in checking if team details are already in database.\nError : '.$error1.'\nPlease try again or contact us." );';
            //redirect to form page on clicking okay button of alert
            echo 'window.history.back();';
            echo '</script>';
            exit();
        }
        echo '<script>console.log("Query to check if team details already present executed successfully");</script>';

        //if team details are already there, update it else insert it
        if(!$nrow1)
        {   
            //Query to get email from password table
            $EmailQuery = "SELECT email FROM password WHERE college_code='$college_code'";
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
             $contact_email=$row['email'];

             if(isset($_POST['submit']))
                $submit='Yes';
            else
                $submit='No';

            //Query to insert the details into team table
            $query2="INSERT INTO team ( college_code, sport, gender, team_name, contact_email, champion, state_player, status, submit) VALUES ('$college_code', '$sport', '$gender', '$team_name', '$contact_email', '$champion', '$state_player', 'Waiting','No')";
            $result2=mysqli_query($connection,$query2);
            if(!$result2)
            {   $error2 = mysqli_error($connection);
                echo '<script>alert("Error in inserting team details to the database.\nError : '.$error2.'\nPlease try again or contact us." );';
                //redirect to form page on clicking okay button of alert
                echo 'window.history.back();';
                echo '</script>';
                exit();
            }
            echo '<script>console.log("Team details are inserted successfully");</script>';
        }
        else
        {   //Query to update the details into team table
            if(isset($_POST['submit']))
                $query2="UPDATE team SET team_name='$team_name', champion = '$champion', state_player = '$state_player', status = 'Waiting',submit='Yes'";
            else
                $query2="UPDATE team SET team_name='$team_name', champion = '$champion', state_player = '$state_player', status = 'Waiting'";
            $result2=mysqli_query($connection,$query2);
            if(!$result2)
            {   $error2 = mysqli_error($connection);
                echo '<script>alert("Error in updating team details to the database.\nError : '.$error2.'\nPlease try again or contact us." );';
                //redirect to form page on clicking okay button of alert
                echo 'window.history.back();';
                echo '</script>';
                exit();
            }
            echo '<script>console.log("Team details are updated successfully");</script>';
        }

        for($i=1; $i<=20; $i++)
        {   
            //Load member details from the form
            $name = $_POST['name'.$i];
            $email = $_POST['email'.$i];
            $mob = $_POST['pno'.$i];
            $food = $_POST['food'.$i];

            //Change dob for database purpose
            $dob=date("Y-m-d", strtotime($_POST['dob'.$i]));

            if ($i == 1)
                $role = 'Captain';
            else if($i>=2 and $i<=17)
                $role = 'Player';
            else
                $role = 'Official';
        

            //Query to check if member details are already present
            $query3="SELECT * from member WHERE college_code='$college_code' and sport='$sport' and gender='$gender' and member_id='$i'";
            $result3=mysqli_query($connection,$query3);
            $nrow3=mysqli_num_rows($result3);
            if(!$result3)
            {   $error3 = mysqli_error($connection);
                echo '<script>alert("Error in getting email from database.\nError : '.$error3.'\nPlease try again or contact us." );';
                //redirect to form page on clicking okay button of alert
                echo 'window.history.back();';
                echo '</script>';
                exit();
            }
            echo '<script>console.log("Query to check if member details already present executed successfully");</script>';

            //If the name exists update it else insert it
            if(!$nrow3)
            {   if($name!="")
                {   $insertquery = "INSERT INTO member (member_id, college_code, sport, gender, name, email, mobile, dob, food, role) VALUES ('$i','$college_code','$sport','$gender','$name','$email','$mob','$dob','$food','$role')";
                    $result4=mysqli_query($connection,$insertquery);
                    if(!$result4)
                    {   $error4 = mysqli_error($connection);
                        echo '<script>alert("Error in member insertion.\nError : '.$error4.'\nPlease try again or contact us." );';
                        //redirect to form page on clicking okay button of alert
                        echo 'window.history.back();';
                        echo '</script>';
                        exit();
                    }
                    echo    '<script>console.log("Member details of '.$i.' inserted successfully\n");</script>';
                }
            }
            else
            {   if($name=="" and $email=="" and $mob=="")
                {   //Query to delete the record
                    $query2="DELETE FROM member WHERE member_id='$i'";
                    $result2=mysqli_query($connection,$query2);
                    if(!$result2)
                    {   $error = mysqli_error($connection);
                        echo '<script>alert("Error in record deletion .\nError : '.$error.'\nPlease try again or contact us." );';
                        //redirect to form page on clicking / button of alert
                        echo 'window.history.back();';
                        echo '</script>';
                        exit();
                    }
                        echo '<script>console.log("Member details of '.$i.' deleted successfully\n");</script>';
                }
                else
                {   //Query to update if name already present
                    $query2="UPDATE member SET name='$name',email='$email',mobile='$mob',dob='$dob',food='$food',role='$role' WHERE college_code='$college_code' and sport='$sport' and gender='$gender' and member_id='$i'";
                    $result2=mysqli_query($connection,$query2);
                    if(!$result2)
                    {   $error = mysqli_error($connection);
                        echo '<script>alert("Error in record updation .\nError : '.$error.'\nPlease try again or contact us." );';
                        //redirect to form page on clicking / button of alert
                        echo 'window.history.back();';
                        echo '</script>';
                        exit();
                    }
                        echo '<script>console.log("Member details of '.$i.' updated successfully\n");</script>';
                }
            }
        }
        if(isset($_POST['save']))
        {   echo '<script>alert("The details have been SAVED successfully.");';
            //redirect to the previous form page on clicking alert
            echo 'window.close();';
            echo '</script>';
            exit();
        }
	}
    if($_SERVER['REQUEST_METHOD']=='POST' and (isset($_POST['preview']) or isset($_POST['submit']))){
        //Load values from cookies
        $college_code = $_COOKIE['college_code'];
        $sport = $_COOKIE['sport'];
        $gender = $_COOKIE['gender'];

        //Process data for email purpose
        if($gender=='M')    $gen="MALE";    else    $gen="FEMALE";

        //Send email only if submit button of form
        if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['submit']))
        {   //Send email
            require '../PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer();
            $mail ->IsSmtp();
            $mail ->SMTPDebug = 0;
            $mail ->SMTPAuth = true;
            $mail ->SMTPSecure = 'ssl';
            $mail ->Host = "smtp.gmail.com";
            $mail ->Port = 465; // or 587
            $mail ->IsHTML(true);
            $mail ->Username = "mail";//sender of mail
            $mail ->Password = "password";//sender mail password
            $mail ->SetFrom("mail");//sender of mail

            $mail ->Subject = "Team Sheet of ".$college_code.":".$sport.":".$gen." for Inter NIT Sports Tournament";
            $mail ->Body = "Hello Admin, <br><br>The attachment with this has the team details and player details given upon registration for your reference.<br><br>NIT Calicut";
            //write address of admin
            $mail ->AddAddress("admin_mail");
        }

        //ob_start();
        //Create pdf for attachment
        require('../fpdf/fpdf.php');
        //ob_end_clean();    header("Content-Encoding: None", true);
        class PDF extends FPDF
        {   // Page footer
            function Footer()
            {   // Position at 1.5 cm from bottom
                $this->SetY(-15);
                // Arial italic 8
                $this->SetFont('Arial','I',10);
                // Page number
                $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
            }
        }
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',14);
        //Query to get team details
        $Query="SELECT team_name,contact_email,champion,state_player FROM team WHERE college_code='$college_code' AND sport='$sport' AND gender='$gender'";
        //result table of the query
        $result=mysqli_query($connection,$Query);
        //echo gettype($result);
        //if result table has at least one row
        if(!$result)
        {   $error = mysqli_error($connection);
            echo '<script>alert("Error in getting team details from database.\nError : '.$error.'\nPlease try again or contact us." );';
            //redirect to forgot password page on clicking okay button of alert
            echo 'window.history.back();';
            echo '</script>';
            exit();
        }
        echo '<script>console.log("Query for team details has executed successfully\n");</script>';
        //fetch each row from the result table//expected one row only
        while($row=mysqli_fetch_array($result)) 
        {   //get team details from query result
            $team_name = $row['team_name'];
            $contact_email=$row['contact_email'];
            $champ=$row['champion'];
            $sp=$row['state_player'];
            
            //Enter team details to the pdf
            $pdf->Cell(190,10,'TEAM SHEET OF '.$college_code.':'.$sport.' FOR '.$gen.'',1,1);
            $pdf->Cell(0,10,'',0,1);
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(0,10,'NIT               :   '.$college_code.'',0,1);
            $pdf->Cell(0,10,'Sport             :   '.$sport.'',0,1);
            $pdf->Cell(0,10,'Gender            :   '.$gen.'',0,1);
            $pdf->Cell(0,10,'',0,1);
            $pdf->Cell(0,10,'Team Name         :   '.$team_name.'',0,1);
            $pdf->Cell(0,10,'Contact Email     :   '.$contact_email.'',0,1);
            $pdf->Cell(0,10,'',0,1);
            $pdf->Cell(0,10,'Number of championships won in last three years   :   '.$champ.'',0,1);
            $pdf->Cell(0,10,'Number of state players                           :   '.$sp.'',0,1);
            $pdf->AddPage();
        }
        $count=0;
        for($i=1; $i<=20; $i++)
        {   $Query="SELECT * FROM member WHERE college_code='$college_code' AND sport='$sport' AND gender='$gender' AND member_id='$i'";
            $result=mysqli_query($connection,$Query);
            if(!$result)
            {   $error = mysqli_error($connection);
                echo '<script>alert("Error in loading member details from database.\nError : '.$error.'\nPlease try again or contact us." );';
                //refresh the page on clicking okay button of alert
                echo '</script>';
                header("Refresh:0");
                exit();
            }
            $row=mysqli_fetch_array($result);
            $nrow=mysqli_num_rows($result);
            if($nrow)
            {   //Load member details from the table
                $name = $row['name'];
                $email = $row['email'];
                $mob = $row['mobile'];
                $food = $row['food'];
                $dob = date("Y-m-d", strtotime($row['dob']));
                $role=$row['role'];
                
                $count=$count+1;
                if($count>4)
                {   $pdf->AddPage();
                    $count=1;
                }
                $pdf->SetFont('Arial','B',12);
                if($i==1)
                    $pdf->Cell(190,10,'CAPTAIN',0,1,'C');
                else if ($i>=2 and $i<=17)
                    $pdf->Cell(190,10,'PLAYER',0,1,'C');
                else
                    $pdf->Cell(190,10,'OFFICIAL',0,1,'C');
                $pdf->SetFont('Arial','',10);
                $pdf->Cell(0,8,'Name              :   '.$name.'',0,1);
                $pdf->Cell(0,8,'Email             :   '.$email.'',0,1);
                $pdf->Cell(0,8,'Mobile No.        :   '.$mob.'',0,1);
                $pdf->Cell(0,8,'Food              :   '.$food.'',0,1);
                $pdf->Cell(0,8,'Date of birth     :   '.$dob.'',0,1);
                $pdf->Cell(0,8,'',0,1);
            }
        }
        ob_end_clean();
        $pdf->Output();
        if(isset($_POST['submit']))
        {   $attachment= $pdf->Output("TEAM SHEET OF $college_code : $sport : $gen.pdf", 'S');
            $mail->AddStringAttachment($attachment, "TEAM SHEET OF $college_code $sport $gen.pdf" );
            ob_end_flush();
            if(!$mail->Send())
                echo '<script>console.log("Mail not sent\n")</script>';  
            else
                echo '<script>console.log("Mail sent\n")</script>'; 
            echo '<script>console.log("You have successfully SUBMITTED your registration details for approval." );';
            //redirect to pdf preview page on clicking okay button of alert
            //echo 'window.location.href="preview.php";';
            echo '</script>';
            exit();
        }
    }
?>