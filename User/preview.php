<?php
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
?>

<?php
	//Load values from cookies
    $college_code = $_COOKIE['college_code'];
    $sport = $_COOKIE['sport'];
    $gender = $_COOKIE['gender'];

    //Send email only if submit button of form
    if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['submit']))
	{	//Send email
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

	    $mail ->Subject = "Team Sheet of ".$college_code.":".$sport.":".$gender." for Inter NIT Sports Tournament";
	    $mail ->Body = "Hello Admin, <br><br>The attachment with this has the team details and player details given upon registration for your reference.<br><br>NIT Calicut";
	    //write address of admin
	    $mail ->AddAddress("admin_mail");
	}

    //Create pdf for attachment
    require('../fpdf/fpdf.php');
    class PDF extends FPDF
    {   
        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
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
    $Query="SELECT team_name,contact_email,champion,state_player,professional FROM team WHERE college_code='$college_code' AND sport='$sport' AND gender='$gender'";

    //result table of the query
    $result=mysqli_query($connection,$Query);
    //echo gettype($result);

    //if result table has at least one row
    if(!$result)
    {  	echo '<script>alert("Error in getting team details from database.\nError : '.$error.'\nPlease try again or contact us." );';
        //redirect to forgot password page on clicking okay button of alert
        echo 'window.history.back();';
        echo '</script>';
        exit();
    }

    echo '<script>console.log("Query for team details has executed successfully\n");</script>';

    //fetch each row from the result table//expected one row only
    while($row=mysqli_fetch_array($result)) 
    {   //echo "ivdund";
        //get team details from query result
        $team_name = $row['team_name'];
        $contact_email=$row['contact_email'];
        $champ=$row['champion'];
        $sp=$row['state_player'];

        //Process data for email purpose
        if($gender=='M')    $gen="MALE";    else    $gen="FEMALE";

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

    // Free result set
    mysqli_free_result($result);

    $count=0;
	for($i=1; $i<=19; $i++)
	{   
		$Query="SELECT * FROM member WHERE college_code='$college_code' AND sport='$sport' AND gender='$gender' AND member_id='$i'";
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
		{
			//Load member details from the table
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
		    else if ($i>=2 and $i<=16)
		        $pdf->Cell(190,10,'PLAYER',0,1,'C');
		    else
		        $pdf->Cell(190,10,'OFFICIAL',0,1,'C');
		    $pdf->SetFont('Arial','',10);
		    $pdf->Cell(0,8,'Name              :   '.$name.'',0,1);
		    $pdf->Cell(0,8,'Email             :   '.$email.'',0,1);
		    $pdf->Cell(0,8,'Mobile No.        :   '.$mob.'',0,1);
		    $pdf->Cell(0,8,'Food              :   '.$foo.'',0,1);
		    $pdf->Cell(0,8,'Date of birth     :   '.$dob.'',0,1);
		    $pdf->Cell(0,8,'',0,1);
	    
		}
	}
	$pdf->Output();
	if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['submit']))
	{
		$attachment= $pdf->Output("TEAM SHEET OF $college_code : $sport : $gender.pdf", 'S');
		$mail->AddStringAttachment($attachment, "TEAM SHEET OF $college_code$sport$gender.pdf" );

		if(!$mail->Send())
		echo '<script>console.log("Mail not sent\n")</script>';  
		else
		echo '<script>console.log("Mail sent\n")</script>'; 
	}

?>